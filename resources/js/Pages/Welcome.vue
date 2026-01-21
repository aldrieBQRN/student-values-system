<script setup>
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});

// Smooth scroll function for the "Explore" button
const scrollToFeatures = () => {
    document.getElementById("features").scrollIntoView({ behavior: "smooth" });
};
</script>

<template>
    <Head title="Welcome to GuidedMind" />

    <div
        class="min-h-screen bg-slate-50 font-sans text-slate-600 overflow-hidden relative selection:bg-teal-200 selection:text-teal-900"
    >
        <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden">
            <div
                class="absolute -top-[10%] -right-[10%] w-[40rem] h-[40rem] bg-teal-200/20 rounded-full blur-3xl animate-float-slow mix-blend-multiply"
            ></div>
            <div
                class="absolute top-[20%] -left-[10%] w-[35rem] h-[35rem] bg-purple-200/20 rounded-full blur-3xl animate-float-slower mix-blend-multiply animation-delay-2000"
            ></div>
            <div
                class="absolute bottom-[10%] right-[20%] w-[30rem] h-[30rem] bg-sky-200/20 rounded-full blur-3xl animate-float-slow mix-blend-multiply animation-delay-4000"
            ></div>
        </div>

        <nav class="fixed top-6 left-0 right-0 max-w-7xl mx-auto px-6 z-50">
            <div
                class="bg-white/80 backdrop-blur-md border border-white/60 rounded-full px-6 py-4 flex justify-between items-center shadow-[0_8px_30px_rgba(0,0,0,0.04)] transition-all hover:shadow-[0_8px_30px_rgba(0,0,0,0.08)]"
            >
                <div class="flex items-center gap-2.5">
                    <div
                        class="w-8 h-8 rounded-lg bg-gradient-to-br from-teal-400 to-sky-500 shadow-lg shadow-teal-500/20"
                    ></div>
                    <span
                        class="font-bold text-xl text-slate-800 tracking-tight"
                        >GuidedMind</span
                    >
                </div>

                <div v-if="canLogin" class="flex items-center gap-6">
                    <Link
                        v-if="$page.props.auth.user"
                        :href="route('dashboard')"
                        class="font-bold text-slate-700 hover:text-teal-600 transition-colors"
                    >
                        Dashboard →
                    </Link>

                    <template v-else>
                        <Link
                            :href="route('login')"
                            class="hidden md:inline-block font-bold text-slate-500 hover:text-slate-800 transition-colors"
                        >
                            Log in
                        </Link>

                        <Link
                            v-if="canRegister"
                            :href="route('register')"
                            class="bg-slate-900 text-white px-6 py-2.5 rounded-full font-bold shadow-lg shadow-slate-900/20 hover:bg-slate-800 hover:shadow-xl hover:-translate-y-0.5 transition-all"
                        >
                            Get Started
                        </Link>
                    </template>
                </div>
            </div>
        </nav>

        <main class="relative z-10 pt-40 pb-20 px-6 max-w-7xl mx-auto">
            <div
                class="flex flex-col lg:flex-row items-center gap-16 lg:gap-24"
            >
                <div
                    class="flex-1 text-center lg:text-left space-y-8 animate-fade-in-up"
                >
                    <div
                        class="inline-flex items-center gap-2 bg-white border border-teal-100 text-teal-700 px-4 py-1.5 rounded-full text-sm font-bold tracking-wide shadow-sm"
                    >
                        <span
                            class="w-2 h-2 rounded-full bg-teal-400 animate-pulse"
                        ></span>
                        For College Students
                    </div>

                    <h1
                        class="text-5xl md:text-7xl font-bold text-slate-900 leading-[1.1] tracking-tight"
                    >
                        Navigate student life with
                        <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-teal-500 to-sky-500"
                            >confidence.</span
                        >
                    </h1>

                    <p
                        class="text-xl text-slate-500 leading-relaxed max-w-lg mx-auto lg:mx-0"
                    >
                        A safe digital sanctuary to learn values, reflect
                        anonymously on the
                        <span class="font-semibold text-slate-700"
                            >Freedom Wall</span
                        >, and master real-life scenarios.
                    </p>

                    <div
                        class="flex flex-col sm:flex-row items-center gap-4 justify-center lg:justify-start pt-4"
                    >
                        <Link
                            :href="route('register')"
                            class="w-full sm:w-auto px-8 py-4 bg-coral-400 text-white rounded-2xl font-bold text-lg shadow-xl shadow-coral-400/25 hover:bg-coral-500 hover:-translate-y-1 hover:shadow-2xl transition-all"
                        >
                            Start Your Journey
                        </Link>
                        <button
                            @click="scrollToFeatures"
                            class="w-full sm:w-auto px-8 py-4 bg-white text-slate-600 border border-slate-200 rounded-2xl font-bold text-lg hover:bg-slate-50 hover:border-slate-300 transition-all flex items-center justify-center gap-2 group"
                        >
                            <span>Explore Features</span>
                            <span
                                class="group-hover:translate-y-1 transition-transform"
                                >↓</span
                            >
                        </button>
                    </div>

                    <div
                        class="pt-6 flex items-center justify-center lg:justify-start gap-4 text-sm font-semibold text-slate-400"
                    >
                        <div class="flex -space-x-2">
                            <div
                                class="w-8 h-8 rounded-full bg-slate-200 border-2 border-white"
                            ></div>
                            <div
                                class="w-8 h-8 rounded-full bg-slate-300 border-2 border-white"
                            ></div>
                            <div
                                class="w-8 h-8 rounded-full bg-slate-400 border-2 border-white"
                            ></div>
                        </div>
                        <p>Join 500+ students today</p>
                    </div>
                </div>

                <div
                    class="flex-1 w-full max-w-lg lg:max-w-none perspective-1000"
                >
                    <div
                        class="relative bg-white/60 backdrop-blur-xl border border-white/50 p-6 md:p-8 rounded-[2.5rem] shadow-[0_40px_100px_-20px_rgba(0,0,0,0.1)] animate-float-hero"
                    >
                        <div
                            class="absolute inset-0 bg-gradient-to-tr from-white/40 to-transparent rounded-[2.5rem] pointer-events-none"
                        ></div>

                        <div
                            class="bg-slate-50 rounded-2xl p-6 border border-slate-100 shadow-inner overflow-hidden"
                        >
                            <div class="flex justify-between items-center mb-8">
                                <div class="space-y-2">
                                    <div
                                        class="h-4 w-32 bg-slate-200 rounded-full"
                                    ></div>
                                    <div
                                        class="h-8 w-48 bg-slate-800 rounded-lg"
                                    ></div>
                                </div>
                                <div
                                    class="w-10 h-10 rounded-full bg-teal-100"
                                ></div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div
                                    class="h-32 bg-white rounded-xl shadow-sm border border-slate-100 p-4 space-y-3"
                                >
                                    <div
                                        class="w-8 h-8 rounded-lg bg-coral-100"
                                    ></div>
                                    <div
                                        class="h-3 w-full bg-slate-100 rounded-full mt-4"
                                    ></div>
                                    <div
                                        class="h-3 w-1/2 bg-slate-100 rounded-full"
                                    ></div>
                                </div>
                                <div
                                    class="h-32 bg-white rounded-xl shadow-sm border border-slate-100 p-4 space-y-3 opacity-75"
                                >
                                    <div
                                        class="w-8 h-8 rounded-lg bg-sky-100"
                                    ></div>
                                    <div
                                        class="h-3 w-full bg-slate-100 rounded-full mt-4"
                                    ></div>
                                    <div
                                        class="h-3 w-1/2 bg-slate-100 rounded-full"
                                    ></div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="absolute -bottom-6 -left-6 bg-white p-4 rounded-2xl shadow-xl border border-slate-100 flex items-center gap-3 animate-bounce-slow"
                        >
                            <div
                                class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-600"
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
                                        d="M5 13l4 4L19 7"
                                    ></path>
                                </svg>
                            </div>
                            <div>
                                <p
                                    class="text-xs text-slate-400 font-bold uppercase"
                                >
                                    Status
                                </p>
                                <p class="text-sm font-bold text-slate-800">
                                    Feeling Motivated
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <section
            id="features"
            class="relative z-10 py-24 bg-white/50 backdrop-blur-sm border-t border-slate-100"
        >
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center max-w-2xl mx-auto mb-20">
                    <h2
                        class="text-3xl md:text-4xl font-bold text-slate-800 mb-6"
                    >
                        More than just a classroom.
                    </h2>
                    <p class="text-lg text-slate-500">
                        GuidedMind is built to help you grow emotionally and
                        ethically through interactive experiences.
                    </p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <div
                        class="p-8 rounded-3xl bg-white border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all group"
                    >
                        <div
                            class="w-14 h-14 bg-amber-50 rounded-2xl flex items-center justify-center text-3xl mb-6 group-hover:scale-110 transition-transform"
                        >
                            🛡️
                        </div>
                        <h3 class="text-xl font-bold text-slate-800 mb-3">
                            The Freedom Wall
                        </h3>
                        <p class="text-slate-500 leading-relaxed">
                            A completely anonymous space to vent, share
                            gratitude, or find solidarity with other students.
                        </p>
                    </div>

                    <div
                        class="p-8 rounded-3xl bg-white border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all group"
                    >
                        <div
                            class="w-14 h-14 bg-indigo-50 rounded-2xl flex items-center justify-center text-3xl mb-6 group-hover:scale-110 transition-transform"
                        >
                            🎮
                        </div>
                        <h3 class="text-xl font-bold text-slate-800 mb-3">
                            Interactive Scenarios
                        </h3>
                        <p class="text-slate-500 leading-relaxed">
                            Face real-life dilemmas. Make choices. See the
                            consequences immediately in a safe environment.
                        </p>
                    </div>

                    <div
                        class="p-8 rounded-3xl bg-white border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all group"
                    >
                        <div
                            class="w-14 h-14 bg-teal-50 rounded-2xl flex items-center justify-center text-3xl mb-6 group-hover:scale-110 transition-transform"
                        >
                            🌱
                        </div>
                        <h3 class="text-xl font-bold text-slate-800 mb-3">
                            Values Modules
                        </h3>
                        <p class="text-slate-500 leading-relaxed">
                            Bite-sized, beautiful lessons on self-worth,
                            empathy, and resilience designed for reading.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-24 relative z-10">
            <div class="max-w-7xl mx-auto px-6">
                <div
                    class="bg-slate-900 rounded-[3rem] p-12 md:p-20 text-center relative overflow-hidden"
                >
                    <div
                        class="absolute top-0 right-0 w-64 h-64 bg-teal-500/10 rounded-full blur-3xl"
                    ></div>
                    <div
                        class="absolute bottom-0 left-0 w-64 h-64 bg-purple-500/10 rounded-full blur-3xl"
                    ></div>

                    <h2
                        class="text-3xl md:text-4xl font-bold text-white mb-12 relative z-10"
                    >
                        Student Stories
                    </h2>

                    <div
                        class="grid md:grid-cols-2 gap-8 relative z-10 text-left"
                    >
                        <div
                            class="bg-white/10 backdrop-blur-md p-8 rounded-3xl border border-white/10"
                        >
                            <p class="text-lg text-slate-200 italic mb-6">
                                "I always felt alone with my academic stress.
                                The Freedom Wall showed me that everyone is
                                fighting the same battles. It's my daily safe
                                space."
                            </p>
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-10 h-10 bg-teal-500 rounded-full flex items-center justify-center font-bold text-white"
                                >
                                    S
                                </div>
                                <div>
                                    <p class="font-bold text-white">Sarah M.</p>
                                    <p class="text-xs text-slate-400">
                                        Psychology Student
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div
                            class="bg-white/10 backdrop-blur-md p-8 rounded-3xl border border-white/10"
                        >
                            <p class="text-lg text-slate-200 italic mb-6">
                                "The scenarios are actually fun. Instead of
                                boring quizzes, I feel like I'm playing a game
                                that actually teaches me how to handle group
                                work."
                            </p>
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-10 h-10 bg-purple-500 rounded-full flex items-center justify-center font-bold text-white"
                                >
                                    J
                                </div>
                                <div>
                                    <p class="font-bold text-white">James R.</p>
                                    <p class="text-xs text-slate-400">
                                        Engineering Student
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer
            class="bg-white py-12 border-t border-slate-100 text-center relative z-10"
        >
            <p class="text-slate-400 font-medium">
                © 2026 GuidedMind. Built with ❤️ for students.
            </p>
        </footer>
    </div>
</template>

<style>
/* 1. Fade Up Entrance */
.animate-fade-in-up {
    animation: fadeInUp 0.8s ease-out forwards;
}

/* 2. Floating Hero Animation */
.animate-float-hero {
    animation: floatHero 6s ease-in-out infinite;
}

/* 3. Background Blob Movements */
.animate-float-slow {
    animation: floatBlob 10s ease-in-out infinite;
}
.animate-float-slower {
    animation: floatBlob 15s ease-in-out infinite reverse;
}

/* 4. Bounce for badge */
.animate-bounce-slow {
    animation: bounce 3s infinite;
}

/* Keyframes */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes floatHero {
    0%,
    100% {
        transform: translateY(0px) rotate(-1deg);
    }
    50% {
        transform: translateY(-15px) rotate(1deg);
    }
}

@keyframes floatBlob {
    0%,
    100% {
        transform: translate(0, 0);
    }
    33% {
        transform: translate(30px, -50px);
    }
    66% {
        transform: translate(-20px, 20px);
    }
}
</style>
