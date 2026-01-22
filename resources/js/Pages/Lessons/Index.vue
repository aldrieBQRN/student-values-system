<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, router, usePage } from "@inertiajs/vue3";
import { ref, onMounted, onUnmounted, watch, computed, nextTick } from "vue";
import confetti from "canvas-confetti";
import Swal from "sweetalert2";

const props = defineProps({
    modules: Array,
    activeLesson: Object,
    savedAnswers: Object,
});

const page = usePage();
const showCongratsModal = ref(false);
const completedModuleTitle = ref("");
const showSummaryModal = ref(false);
const summaryData = ref(null);

// --- Toast & Celebration Logic ---
const showToast = ref(false);
const toastMessage = ref("");
const toastType = ref("success");

const motivationalQuotes = [
    "Great job! Keep the momentum going!",
    "You're doing amazing!",
    "Another step forward!",
    "Knowledge power up!",
    "Fantastic work!",
];

watch(
    () => page.props.flash,
    (flash) => {
        // 1. Lesson Completed
        if (flash.lesson_completed) {
            fireSmallConfetti();
            triggerToast(
                "success",
                motivationalQuotes[
                    Math.floor(Math.random() * motivationalQuotes.length)
                ],
            );
        }
        // 2. Full Module Completion
        if (flash.module_completed) {
            if (isLastLesson.value) {
                completedModuleTitle.value = flash.module_completed;
                showCongratsModal.value = true;
                fireBigConfetti();
            } else {
                fireSmallConfetti();
                triggerToast("success", "Module 100% Completed! Great job.");
            }
        }
        // 3. Module Summary
        if (flash.module_summary) {
            summaryData.value = flash.module_summary;
            showSummaryModal.value = true;
        }
    },
    { deep: true },
);

const triggerToast = (type, message) => {
    toastType.value = type;
    toastMessage.value = message;
    showToast.value = true;
    setTimeout(() => {
        showToast.value = false;
    }, 4000);
};

const fireSmallConfetti = () => {
    confetti({ particleCount: 100, spread: 70, origin: { y: 0.6 } });
};
const fireBigConfetti = () => {
    var duration = 3000;
    var animationEnd = Date.now() + duration;
    var defaults = { startVelocity: 30, spread: 360, ticks: 60, zIndex: 9999 };
    var interval = setInterval(function () {
        var timeLeft = animationEnd - Date.now();
        if (timeLeft <= 0) return clearInterval(interval);
        var particleCount = 50 * (timeLeft / duration);
        confetti({
            ...defaults,
            particleCount,
            origin: { x: Math.random(), y: Math.random() - 0.2 },
        });
    }, 250);
};

// --- Computed Properties ---
const currentModule = computed(() => {
    if (!props.modules || !props.activeLesson) return null;
    return props.modules.find((module) =>
        module.lessons.some((lesson) => lesson.id === props.activeLesson.id),
    );
});

const lessonNavigation = computed(() => {
    if (!props.activeLesson || !currentModule.value)
        return { prev: null, next: null };
    const moduleLessons = currentModule.value.lessons;
    const currentIndex = moduleLessons.findIndex(
        (l) => l.id === props.activeLesson.id,
    );
    return {
        prev: currentIndex > 0 ? moduleLessons[currentIndex - 1] : null,
        next:
            currentIndex < moduleLessons.length - 1
                ? moduleLessons[currentIndex + 1]
                : null,
    };
});

const isLastLesson = computed(() => {
    if (!currentModule.value || !props.activeLesson) return false;
    const lessons = currentModule.value.lessons;
    return lessons[lessons.length - 1].id === props.activeLesson.id;
});

const isModuleLocked = computed(() => {
    return currentModule.value && currentModule.value.progress === 100;
});

// --- Input Harvesting ---
const lessonContentRef = ref(null);
const studentAnswers = ref({});
const totalInputs = ref(0);
const isDirty = ref(false);

const initializeInputs = () => {
    if (!lessonContentRef.value) return;

    const inputs = lessonContentRef.value.querySelectorAll(
        "input, textarea, select",
    );
    totalInputs.value = inputs.length;
    studentAnswers.value = {};
    isDirty.value = false;

    inputs.forEach((input, index) => {
        input.classList.add("transition-all", "duration-300");

        if (isModuleLocked.value) {
            input.disabled = true;
            input.classList.add(
                "opacity-70",
                "cursor-not-allowed",
                "bg-slate-100",
            );
        } else {
            input.disabled = false;
            input.classList.remove(
                "opacity-70",
                "cursor-not-allowed",
                "bg-slate-100",
            );
        }

        if (props.savedAnswers && props.savedAnswers[index] !== undefined) {
            const savedValue = props.savedAnswers[index];
            input.value = savedValue;
            studentAnswers.value[index] = savedValue;
        }

        const updateHandler = (e) => {
            studentAnswers.value[index] = e.target.value;
            isDirty.value = true;
            if (e.target.value.trim() !== "")
                input.classList.remove("ring-2", "ring-rose-500", "bg-rose-50");
        };
        input.addEventListener("input", updateHandler);
        input.addEventListener("change", updateHandler);
    });
};

watch(
    () => props.activeLesson,
    async () => {
        await nextTick();
        initializeInputs();
    },
    { immediate: true },
);

// --- Actions ---
const saveAndNavigate = (targetUrl) => {
    if (isModuleLocked.value) {
        router.visit(targetUrl);
        return;
    }
    if (isDirty.value) {
        router.post(
            route("lessons.complete", props.activeLesson.id),
            {
                answers: studentAnswers.value,
                save_only: true,
            },
            {
                preserveScroll: true,
                onSuccess: () => router.visit(targetUrl),
            },
        );
    } else {
        router.visit(targetUrl);
    }
};

const performSubmission = () => {
    router.post(
        route("lessons.complete", props.activeLesson.id),
        {
            answers: studentAnswers.value,
        },
        { preserveScroll: true },
    );
};

const markAsComplete = () => {
    if (!props.activeLesson) return;
    if (isModuleLocked.value) return;

    // 1. Validation
    if (totalInputs.value > 0) {
        let missing = false;
        const inputs = lessonContentRef.value.querySelectorAll(
            "input, textarea, select",
        );
        inputs.forEach((input, index) => {
            const val = studentAnswers.value[index];
            if (!val || val.trim() === "") {
                missing = true;
                input.classList.add("ring-2", "ring-rose-500", "bg-rose-50");
                if (!missing)
                    input.scrollIntoView({
                        behavior: "smooth",
                        block: "center",
                    });
            }
        });
        if (missing) {
            triggerToast("error", `Please complete all fields.`);
            return;
        }
    }

    // 2. Logic: Handle Confirmation
    if (isLastLesson.value) {
        // Check if there are ANY incomplete lessons in the module (excluding current)
        const hasIncompletePrerequisites = currentModule.value.lessons.some(
            (l) => l.id !== props.activeLesson.id && !l.is_completed,
        );

        // If Prerequisites are missing -> DO NOT SHOW CONFIRMATION.
        // Just submit, so backend can trigger the Summary Modal.
        if (hasIncompletePrerequisites) {
            performSubmission();
            return;
        }

        // If All Prerequisites are done -> SHOW CONFIRMATION.
        Swal.fire({
            title: "Submit Module?",
            text: "You are about to finish this module. Once submitted, your answers will be locked and cannot be edited.",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#0f172a",
            cancelButtonColor: "#94a3b8",
            confirmButtonText: "Yes, Submit!",
            cancelButtonText: "Not yet",
            customClass: {
                popup: "rounded-2xl",
                confirmButton: "rounded-xl px-6 py-3 font-bold",
                cancelButton: "rounded-xl px-6 py-3 font-bold",
            },
        }).then((result) => {
            if (result.isConfirmed) {
                performSubmission();
            }
        });
    } else {
        // Normal lesson - submit immediately
        performSubmission();
    }
};

// --- Mobile & Helpers ---
const showMobileMenu = ref(false);
const toggleMobileMenu = () => (showMobileMenu.value = !showMobileMenu.value);
const closeMobileMenu = () => (showMobileMenu.value = false);
watch(showMobileMenu, (val) => {
    document.body.style.overflow = val ? "hidden" : "";
});

const getModuleTheme = (index) => {
    const themes = [
        {
            bg: "bg-teal-50",
            border: "border-teal-100",
            iconBg: "bg-teal-100",
            iconColor: "text-teal-600",
            bar: "bg-teal-500",
        },
        {
            bg: "bg-indigo-50",
            border: "border-indigo-100",
            iconBg: "bg-indigo-100",
            iconColor: "text-indigo-600",
            bar: "bg-indigo-500",
        },
        {
            bg: "bg-rose-50",
            border: "border-rose-100",
            iconBg: "bg-rose-100",
            iconColor: "text-rose-600",
            bar: "bg-rose-500",
        },
        {
            bg: "bg-amber-50",
            border: "border-amber-100",
            iconBg: "bg-amber-100",
            iconColor: "text-amber-600",
            bar: "bg-amber-500",
        },
    ];
    return themes[index % themes.length];
};

const scrollPercentage = ref(0);
const updateScrollProgress = () => {
    if (!props.activeLesson) return;
    const docHeight =
        document.documentElement.scrollHeight -
        document.documentElement.clientHeight;
    scrollPercentage.value =
        (document.documentElement.scrollTop / docHeight) * 100;
};
onMounted(() => window.addEventListener("scroll", updateScrollProgress));
onUnmounted(() => window.removeEventListener("scroll", updateScrollProgress));
</script>

<template>
    <Head title="My Lessons" />

    <AuthenticatedLayout>
        <div
            :class="[
                'max-w-7xl mx-auto py-8 px-4 sm:px-6',
                activeLesson ? 'relative flex flex-col lg:flex-row gap-12' : '',
            ]"
        >
            <div v-if="!activeLesson" class="w-full animate-fade-in">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <div
                        class="inline-flex items-center gap-2 bg-white border border-slate-200 rounded-full px-4 py-1.5 mb-6 shadow-sm"
                    >
                        <span
                            class="w-2 h-2 rounded-full bg-teal-500 animate-pulse"
                        ></span>
                        <span
                            class="text-xs font-bold text-slate-600 uppercase tracking-widest"
                            >Homeroom Guidance</span
                        >
                    </div>
                    <h1
                        class="text-4xl md:text-6xl font-extrabold text-slate-900 tracking-tight mb-6"
                    >
                        Your Learning Library
                    </h1>
                    <p
                        class="text-lg md:text-xl text-slate-500 leading-relaxed"
                    >
                        Track your progress, discover new insights, and continue
                        your journey of self-reflection.
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div
                        v-if="modules.length === 0"
                        class="col-span-full flex flex-col items-center justify-center py-24 bg-slate-50 border-2 border-dashed border-slate-200 rounded-[2.5rem]"
                    >
                        <div class="text-6xl mb-4 opacity-50">📚</div>
                        <p class="text-slate-400 font-medium">
                            No modules available yet.
                        </p>
                    </div>

                    <div
                        v-for="(module, index) in modules"
                        :key="module.id"
                        class="group bg-white rounded-[2rem] border border-slate-200 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 flex flex-col overflow-hidden relative"
                    >
                        <div
                            :class="[
                                'h-48 relative p-8 flex flex-col justify-between overflow-hidden',
                                getModuleTheme(index).bg,
                            ]"
                        >
                            <div
                                :class="[
                                    'absolute -right-6 -top-6 w-32 h-32 rounded-full opacity-50 blur-2xl',
                                    getModuleTheme(index).iconBg,
                                ]"
                            ></div>
                            <div
                                class="flex justify-between items-start relative z-10"
                            >
                                <div
                                    :class="[
                                        'w-12 h-12 rounded-2xl flex items-center justify-center shadow-sm',
                                        getModuleTheme(index).iconBg,
                                        getModuleTheme(index).iconColor,
                                    ]"
                                >
                                    <svg
                                        v-if="index % 3 === 0"
                                        class="w-6 h-6"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z"
                                        ></path>
                                    </svg>
                                    <svg
                                        v-else-if="index % 3 === 1"
                                        class="w-6 h-6"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                                        ></path>
                                    </svg>
                                    <svg
                                        v-else
                                        class="w-6 h-6"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"
                                        ></path>
                                    </svg>
                                </div>
                                <span
                                    v-if="module.progress === 100"
                                    class="bg-white/80 backdrop-blur text-emerald-600 text-xs font-bold px-3 py-1 rounded-full shadow-sm border border-emerald-100 flex items-center gap-1"
                                >
                                    <svg
                                        class="w-3 h-3"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="3"
                                            d="M5 13l4 4L19 7"
                                        ></path>
                                    </svg>
                                    Completed
                                </span>
                                <span
                                    v-else
                                    class="bg-white/60 backdrop-blur text-slate-500 text-xs font-bold px-3 py-1 rounded-full border border-slate-200"
                                    >Module {{ index + 1 }}</span
                                >
                            </div>
                            <div class="relative z-10">
                                <h3
                                    class="text-2xl font-bold text-slate-900 leading-tight group-hover:text-teal-600 transition-colors"
                                >
                                    {{ module.title }}
                                </h3>
                            </div>
                        </div>
                        <div class="p-8 flex-1 flex flex-col">
                            <p
                                class="text-slate-500 text-sm leading-relaxed mb-8 line-clamp-3"
                            >
                                {{ module.description }}
                            </p>
                            <div class="mt-auto">
                                <div
                                    class="flex justify-between text-xs font-bold text-slate-400 mb-2 uppercase tracking-wide"
                                >
                                    <span>Progress</span>
                                    <span
                                        :class="getModuleTheme(index).iconColor"
                                        >{{ module.progress }}%</span
                                    >
                                </div>
                                <div
                                    class="h-2.5 w-full bg-slate-100 rounded-full overflow-hidden"
                                >
                                    <div
                                        :class="[
                                            'h-full rounded-full transition-all duration-1000 ease-out',
                                            getModuleTheme(index).bar,
                                        ]"
                                        :style="{
                                            width: module.progress + '%',
                                        }"
                                    ></div>
                                </div>
                            </div>
                            <div class="mt-8 pt-6 border-t border-slate-100">
                                <Link
                                    v-if="module.lessons.length > 0"
                                    :href="
                                        route('lessons', {
                                            lesson: module.lessons[0].id,
                                        })
                                    "
                                    class="w-full group/btn relative inline-flex justify-center items-center gap-2 text-sm font-bold text-white bg-slate-900 hover:bg-slate-800 px-6 py-4 rounded-xl transition-all overflow-hidden"
                                >
                                    <span
                                        class="relative z-10 flex items-center gap-2"
                                    >
                                        {{
                                            module.progress > 0
                                                ? "Continue Module"
                                                : "Start Module"
                                        }}
                                        <svg
                                            class="w-4 h-4 transform group-hover/btn:translate-x-1 transition-transform"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M14 5l7 7m0 0l-7 7m7-7H3"
                                            ></path>
                                        </svg>
                                    </span>
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <template v-else>
                <div class="fixed top-16 left-0 w-full h-1 z-30 bg-transparent">
                    <div
                        class="h-full bg-teal-500 transition-all duration-150 ease-out shadow-[0_0_10px_rgba(20,184,166,0.5)]"
                        :style="{ width: scrollPercentage + '%' }"
                    ></div>
                </div>

                <div class="lg:hidden mb-6 w-full sticky top-20 z-20">
                    <div
                        class="bg-white/90 backdrop-blur-md border border-slate-200 shadow-lg rounded-2xl px-5 py-4 flex items-center justify-between"
                    >
                        <div class="flex-1 min-w-0 pr-4">
                            <Link
                                :href="route('lessons')"
                                class="text-[10px] font-extrabold text-teal-600 hover:text-teal-700 uppercase tracking-widest flex items-center gap-1.5 mb-1"
                            >
                                <svg
                                    class="w-3.5 h-3.5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 19l-7-7 7-7"
                                    ></path>
                                </svg>
                                Back to Library
                            </Link>
                            <div
                                class="text-base font-bold text-slate-900 truncate"
                            >
                                {{ currentModule?.title }}
                            </div>
                        </div>
                        <button
                            @click="toggleMobileMenu"
                            class="shrink-0 flex items-center justify-center w-10 h-10 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl transition-all active:scale-95"
                        >
                            <svg
                                class="w-6 h-6"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"
                                ></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div
                    v-if="showMobileMenu"
                    @click="closeMobileMenu"
                    class="fixed inset-0 bg-slate-900/60 z-40 lg:hidden backdrop-blur-sm transition-opacity"
                ></div>

                <aside
                    :class="[
                        'fixed lg:sticky top-0 lg:top-24 left-0 h-full lg:h-[calc(100vh-8rem)] z-50 lg:z-0',
                        'w-80 lg:w-80 bg-white lg:bg-transparent shadow-2xl lg:shadow-none',
                        'transition-transform duration-300 ease-out transform lg:transform-none border-r border-slate-100 lg:border-none',
                        showMobileMenu
                            ? 'translate-x-0'
                            : '-translate-x-full lg:translate-x-0',
                        'overflow-y-auto custom-scrollbar lg:pr-4',
                    ]"
                >
                    <div
                        class="lg:hidden p-6 border-b border-slate-100 bg-slate-50/95 sticky top-0 backdrop-blur-md z-10 flex items-center justify-between"
                    >
                        <h2 class="font-bold text-slate-900 text-lg">
                            Module Navigation
                        </h2>
                        <button
                            @click="closeMobileMenu"
                            class="p-2 bg-white rounded-full text-slate-500 shadow-sm border border-slate-200"
                        >
                            ✕
                        </button>
                    </div>

                    <div
                        class="bg-white lg:rounded-3xl p-6 lg:p-8 lg:shadow-xl lg:shadow-slate-200/50 lg:border lg:border-slate-200 min-h-screen lg:min-h-0"
                    >
                        <div class="mb-8 pb-6 border-b border-slate-100">
                            <div class="flex justify-between items-center mb-2">
                                <h3
                                    class="text-xs font-extrabold text-slate-400 uppercase tracking-wider"
                                >
                                    Current Module
                                </h3>
                                <span
                                    class="text-[10px] font-bold bg-teal-50 text-teal-700 px-2.5 py-1 rounded-full border border-teal-100"
                                    >{{ currentModule?.progress }}%
                                    Complete</span
                                >
                            </div>
                            <p
                                class="font-extrabold text-xl text-slate-900 leading-tight"
                            >
                                {{ currentModule?.title }}
                            </p>
                        </div>

                        <div v-if="currentModule" class="relative">
                            <div
                                class="absolute left-5 top-6 bottom-6 w-0.5 bg-slate-200 -translate-x-1/2 z-0"
                            ></div>
                            <div class="space-y-1">
                                <Link
                                    v-for="(
                                        lesson, index
                                    ) in currentModule.lessons"
                                    :key="lesson.id"
                                    :href="
                                        route('lessons', { lesson: lesson.id })
                                    "
                                    @click="closeMobileMenu"
                                    class="group relative flex gap-4 items-start py-3 transition-all duration-200"
                                >
                                    <div
                                        class="relative z-10 shrink-0 flex items-center justify-center w-10 h-10 bg-white rounded-full"
                                    >
                                        <div
                                            v-if="lesson.is_completed"
                                            class="w-8 h-8 rounded-full bg-emerald-500 flex items-center justify-center shadow-md shadow-emerald-200 border-2 border-white ring-2 ring-emerald-50"
                                        >
                                            <svg
                                                class="w-4 h-4 text-white"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="3"
                                                    d="M5 13l4 4L19 7"
                                                ></path>
                                            </svg>
                                        </div>
                                        <div
                                            v-else-if="
                                                activeLesson.id === lesson.id
                                            "
                                            class="relative w-8 h-8 flex items-center justify-center"
                                        >
                                            <span
                                                class="absolute inline-flex h-full w-full rounded-full bg-teal-400 opacity-20 animate-ping"
                                            ></span>
                                            <div
                                                class="relative w-8 h-8 rounded-full border-[3px] border-teal-500 bg-white flex items-center justify-center shadow-lg shadow-teal-100/50"
                                            >
                                                <div
                                                    class="w-2.5 h-2.5 bg-teal-500 rounded-full"
                                                ></div>
                                            </div>
                                        </div>
                                        <div
                                            v-else
                                            class="w-8 h-8 rounded-full border-2 border-slate-200 bg-slate-50 flex items-center justify-center group-hover:border-slate-300 transition-colors"
                                        >
                                            <div
                                                class="w-2 h-2 bg-slate-300 rounded-full group-hover:bg-slate-400 transition-colors"
                                            ></div>
                                        </div>
                                    </div>
                                    <div class="flex-1 pt-2">
                                        <span
                                            :class="[
                                                'text-sm font-bold block leading-snug mb-1 transition-colors',
                                                activeLesson.id === lesson.id
                                                    ? 'text-teal-700'
                                                    : 'text-slate-600 group-hover:text-slate-900',
                                                lesson.is_completed &&
                                                activeLesson.id !== lesson.id
                                                    ? 'text-slate-500'
                                                    : '',
                                            ]"
                                        >
                                            {{ lesson.title }}
                                        </span>
                                        <span
                                            class="text-[10px] text-slate-400 font-bold uppercase tracking-wider flex items-center gap-1"
                                        >
                                            <svg
                                                class="w-3 h-3"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                                ></path>
                                            </svg>
                                            {{ lesson.duration_minutes }} mins
                                        </span>
                                    </div>
                                </Link>
                            </div>
                        </div>
                    </div>
                </aside>

                <main
                    class="flex-1 w-full min-w-0 bg-white rounded-2xl p-6 md:p-12 shadow-sm border border-slate-200 min-h-[600px] animate-fade-in relative flex flex-col"
                >
                    <div class="hidden lg:block mb-8">
                        <Link
                            :href="route('lessons')"
                            class="inline-flex items-center gap-2 text-slate-400 hover:text-teal-600 font-bold text-xs uppercase tracking-widest transition-colors group"
                        >
                            <span
                                class="bg-slate-50 group-hover:bg-teal-50 p-2 rounded-lg transition-colors border border-slate-200 group-hover:border-teal-100"
                            >
                                <svg
                                    class="w-4 h-4"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M10 19l-7-7m0 0l7-7m-7 7h18"
                                    ></path>
                                </svg>
                            </span>
                            Back to Library
                        </Link>
                    </div>

                    <div class="border-b border-slate-100 pb-8 mb-10">
                        <div class="flex items-center gap-3 mb-4">
                            <span
                                v-if="activeLesson.is_completed"
                                class="bg-emerald-50 text-emerald-600 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider flex items-center gap-1.5 border border-emerald-100"
                            >
                                <svg
                                    class="w-3.5 h-3.5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="3"
                                        d="M5 13l4 4L19 7"
                                    ></path>
                                </svg>
                                Completed
                            </span>
                            <span
                                v-else
                                class="bg-teal-50 text-teal-600 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider border border-teal-100"
                                >Current Lesson</span
                            >
                            <span class="text-slate-300">|</span>
                            <span
                                class="text-slate-400 text-xs font-bold uppercase tracking-wider flex items-center gap-1"
                            >
                                <svg
                                    class="w-4 h-4"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                    ></path>
                                </svg>
                                {{ activeLesson.duration_minutes }} Mins Read
                            </span>
                        </div>
                        <h1
                            class="text-3xl md:text-5xl font-extrabold text-slate-900 leading-tight tracking-tight"
                        >
                            {{ activeLesson.title }}
                        </h1>
                    </div>

                    <div
                        class="prose prose-slate prose-lg max-w-none text-slate-600 leading-loose flex-1 mb-20"
                    >
                        <div
                            ref="lessonContentRef"
                            v-html="activeLesson.content_body"
                        ></div>
                    </div>

                    <div
                        class="mt-auto pt-8 border-t border-slate-100 sticky bottom-0 bg-white/95 backdrop-blur-md pb-6 -mb-6 px-4 md:px-0 z-20"
                    >
                        <div
                            class="flex flex-row items-center justify-between gap-4 max-w-3xl mx-auto w-full"
                        >
                            <div class="shrink-0">
                                <button
                                    v-if="lessonNavigation.prev"
                                    @click="
                                        saveAndNavigate(
                                            route('lessons', {
                                                lesson: lessonNavigation.prev
                                                    .id,
                                            }),
                                        )
                                    "
                                    class="w-12 h-12 md:w-14 md:h-14 flex items-center justify-center rounded-2xl bg-white border border-slate-200 text-slate-400 hover:text-slate-800 hover:border-slate-300 hover:bg-slate-50 transition-all shadow-sm"
                                >
                                    <svg
                                        class="w-6 h-6"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2.5"
                                            d="M15 19l-7-7 7-7"
                                        ></path>
                                    </svg>
                                </button>
                                <div
                                    v-else
                                    class="w-12 h-12 md:w-14 md:h-14"
                                ></div>
                            </div>

                            <button
                                @click="markAsComplete"
                                :disabled="
                                    isModuleLocked ||
                                    (activeLesson.is_completed &&
                                        !isLastLesson &&
                                        totalInputs === 0)
                                "
                                :class="[
                                    'flex-1 max-w-xs px-4 md:px-6 py-3.5 md:py-4 rounded-2xl font-bold text-sm md:text-base transition-all shadow-lg hover:shadow-xl hover:-translate-y-1 flex justify-center items-center gap-2 md:gap-3 whitespace-nowrap',
                                    isModuleLocked
                                        ? 'bg-emerald-50 text-emerald-600 border border-emerald-200 shadow-none cursor-default hover:translate-y-0'
                                        : activeLesson.is_completed &&
                                            !isLastLesson &&
                                            totalInputs === 0
                                          ? 'bg-white border-2 border-emerald-500 text-emerald-600 shadow-none cursor-default hover:translate-y-0'
                                          : activeLesson.is_completed &&
                                              !isLastLesson
                                            ? 'bg-white border-2 border-emerald-500 text-emerald-600 hover:bg-emerald-50 shadow-emerald-100'
                                            : 'bg-slate-900 text-white hover:bg-slate-800 shadow-slate-300',
                                ]"
                            >
                                <span
                                    v-if="isModuleLocked"
                                    class="flex items-center gap-2"
                                >
                                    <svg
                                        class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2.5"
                                            d="M5 13l4 4L19 7"
                                        ></path>
                                    </svg>
                                    Module Completed
                                </span>

                                <span
                                    v-else-if="
                                        isLastLesson &&
                                        currentModule.progress < 100
                                    "
                                >
                                    Submit Module
                                </span>

                                <span
                                    v-else-if="activeLesson.is_completed"
                                    class="flex items-center gap-2"
                                >
                                    <svg
                                        class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2.5"
                                            d="M5 13l4 4L19 7"
                                        ></path>
                                    </svg>
                                    {{
                                        totalInputs > 0
                                            ? "Update Answers"
                                            : "Completed"
                                    }}
                                </span>

                                <span v-else>
                                    {{
                                        isLastLesson
                                            ? "Submit Module"
                                            : "Mark Complete"
                                    }}
                                </span>
                            </button>

                            <div class="shrink-0">
                                <button
                                    v-if="lessonNavigation.next"
                                    @click="
                                        saveAndNavigate(
                                            route('lessons', {
                                                lesson: lessonNavigation.next
                                                    .id,
                                            }),
                                        )
                                    "
                                    class="w-12 h-12 md:w-14 md:h-14 flex items-center justify-center rounded-2xl bg-white border border-slate-200 text-slate-400 hover:text-teal-600 hover:border-teal-200 hover:bg-teal-50 transition-all shadow-sm"
                                >
                                    <svg
                                        class="w-6 h-6"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2.5"
                                            d="M9 5l7 7-7 7"
                                        ></path>
                                    </svg>
                                </button>
                                <div
                                    v-else
                                    class="w-12 h-12 md:w-14 md:h-14"
                                ></div>
                            </div>
                        </div>
                    </div>
                </main>
            </template>
        </div>

        <Teleport to="body">
            <div
                v-if="showSummaryModal"
                class="fixed inset-0 z-[9999] flex items-center justify-center px-4 animate-fade-in"
            >
                <div
                    class="absolute inset-0 bg-slate-900/80 backdrop-blur-sm"
                    @click="showSummaryModal = false"
                ></div>
                <div
                    class="bg-white rounded-[2rem] shadow-2xl p-8 max-w-lg w-full relative transform transition-all scale-100 overflow-hidden"
                >
                    <div class="text-center mb-6">
                        <div
                            class="inline-flex items-center justify-center w-16 h-16 bg-amber-100 text-amber-600 rounded-full mb-4"
                        >
                            <svg
                                class="w-8 h-8"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
                                ></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-extrabold text-slate-900">
                            Almost There!
                        </h2>
                        <p class="text-slate-500 text-sm mt-2">
                            You've reached the end of
                            <span class="font-bold text-slate-800">{{
                                summaryData?.module_title
                            }}</span
                            >, but some lessons are incomplete.
                        </p>
                    </div>
                    <div
                        class="space-y-3 mb-8 max-h-[60vh] overflow-y-auto custom-scrollbar pr-2"
                    >
                        <div
                            v-for="(lessonItem, index) in summaryData?.lessons"
                            :key="lessonItem.id"
                            :class="[
                                'flex items-center justify-between p-4 rounded-xl border transition-all',
                                lessonItem.is_completed
                                    ? 'bg-emerald-50/50 border-emerald-100'
                                    : 'bg-white border-slate-200 hover:border-indigo-300 shadow-sm cursor-pointer group',
                            ]"
                            @click="
                                !lessonItem.is_completed &&
                                router.visit(
                                    route('lessons', { lesson: lessonItem.id }),
                                )
                            "
                        >
                            <div
                                class="flex items-center gap-3 overflow-hidden"
                            >
                                <div
                                    v-if="lessonItem.is_completed"
                                    class="shrink-0 w-6 h-6 rounded-full bg-emerald-500 flex items-center justify-center text-white text-xs"
                                >
                                    <svg
                                        class="w-3.5 h-3.5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="3"
                                            d="M5 13l4 4L19 7"
                                        ></path>
                                    </svg>
                                </div>
                                <div
                                    v-else
                                    class="shrink-0 w-6 h-6 rounded-full border-2 border-slate-300 group-hover:border-indigo-400"
                                ></div>
                                <span
                                    :class="[
                                        'text-sm font-bold truncate',
                                        lessonItem.is_completed
                                            ? 'text-emerald-900 line-through opacity-60'
                                            : 'text-slate-700',
                                    ]"
                                >
                                    {{ index + 1 }}. {{ lessonItem.title }}
                                </span>
                            </div>
                            <div
                                v-if="!lessonItem.is_completed"
                                class="text-slate-300 group-hover:text-indigo-500 group-hover:translate-x-1 transition-all"
                            >
                                <svg
                                    class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 5l7 7-7 7"
                                    ></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-3">
                        <button
                            @click="showSummaryModal = false"
                            class="w-full py-3.5 rounded-xl font-bold bg-slate-900 text-white hover:bg-slate-800 shadow-lg transition-all"
                        >
                            I'll Finish Them Now
                        </button>
                    </div>
                </div>
            </div>

            <div
                v-if="showCongratsModal"
                class="fixed inset-0 z-[9999] flex items-center justify-center px-4 animate-fade-in"
            >
                <div
                    class="absolute inset-0 bg-slate-900/80 backdrop-blur-sm"
                    @click="showCongratsModal = false"
                ></div>
                <div
                    class="bg-white rounded-3xl shadow-2xl p-8 md:p-10 max-w-md w-full relative transform transition-all scale-100 text-center"
                >
                    <button
                        @click="showCongratsModal = false"
                        class="absolute top-4 right-4 p-2 text-slate-400 hover:text-slate-600 rounded-full hover:bg-slate-100 transition-colors"
                    >
                        <svg
                            class="w-6 h-6"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"
                            ></path>
                        </svg>
                    </button>
                    <div
                        class="mx-auto w-20 h-20 bg-yellow-100 text-yellow-600 rounded-full flex items-center justify-center mb-6 animate-bounce"
                    >
                        <svg
                            class="w-10 h-10"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"
                            ></path>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-extrabold text-slate-900 mb-2">
                        Fantastic Job!
                    </h2>
                    <p class="text-slate-600 text-lg mb-8">
                        You have officially completed:<br /><span
                            class="text-teal-600 font-bold"
                            >{{ completedModuleTitle }}</span
                        >
                    </p>
                    <div class="flex gap-3">
                        <button
                            @click="showCongratsModal = false"
                            class="flex-1 py-3.5 rounded-xl font-bold border border-slate-200 text-slate-600 hover:bg-slate-50 transition-colors"
                        >
                            Stay Here
                        </button>
                        <Link
                            :href="route('lessons')"
                            class="flex-1 py-3.5 rounded-xl font-bold bg-teal-600 text-white hover:bg-teal-700 shadow-lg hover:shadow-teal-500/30 transition-all"
                            >Back to Library</Link
                        >
                    </div>
                </div>
            </div>
        </Teleport>

        <Teleport to="body">
            <Transition
                enter-active-class="transition ease-out duration-300"
                enter-from-class="transform opacity-0 -translate-y-4 scale-90"
                enter-to-class="transform opacity-100 translate-y-0 scale-100"
                leave-active-class="transition ease-in duration-200"
                leave-from-class="transform opacity-100 translate-y-0 scale-100"
                leave-to-class="transform opacity-0 -translate-y-4 scale-90"
            >
                <div
                    v-if="showToast"
                    :class="[
                        'fixed top-24 left-1/2 -translate-x-1/2 z-[9999] backdrop-blur-md px-6 py-4 rounded-full shadow-2xl flex items-center gap-4 max-w-[90vw] md:max-w-md border ring-4',
                        toastType === 'error'
                            ? 'bg-rose-50/95 border-rose-200 ring-rose-100/50 text-rose-800'
                            : 'bg-white/95 border-slate-200 ring-slate-100/50 text-slate-800',
                    ]"
                >
                    <div
                        v-if="toastType === 'error'"
                        class="text-2xl animate-bounce"
                    >
                        <svg
                            class="w-8 h-8"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"
                            ></path>
                        </svg>
                    </div>
                    <div v-else class="text-2xl animate-bounce">
                        <svg
                            class="w-8 h-8"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                            ></path>
                        </svg>
                    </div>
                    <div>
                        <p
                            :class="[
                                'font-bold text-sm md:text-base',
                                toastType === 'error'
                                    ? 'text-rose-600'
                                    : 'text-teal-600',
                            ]"
                        >
                            {{
                                toastType === "error"
                                    ? "Action Required"
                                    : "Success!"
                            }}
                        </p>
                        <p class="text-sm md:text-base font-medium opacity-90">
                            {{ toastMessage }}
                        </p>
                    </div>
                </div>
            </Transition>
        </Teleport>
    </AuthenticatedLayout>
</template>
