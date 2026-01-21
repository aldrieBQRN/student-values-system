<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps({
    scenario: Object,
});

// State to track the game
const selectedOptionId = ref(null);
const isRevealed = ref(false);

const handleChoice = (optionId) => {
    selectedOptionId.value = optionId;

    // Small delay to allow the fade-out animation to start before showing result
    setTimeout(() => {
        isRevealed.value = true;
    }, 400);
};

// Helper to check if this specific card should be visible
const isVisible = (id) => {
    return selectedOptionId.value === null || selectedOptionId.value === id;
};
</script>

<template>
    <Head :title="scenario.title" />

    <AuthenticatedLayout>
        <div class="mb-6">
            <Link
                :href="route('scenarios.index')"
                class="text-slate-400 hover:text-teal-600 flex items-center gap-2 transition-colors"
            >
                ← Back to Scenarios
            </Link>
        </div>

        <div class="max-w-4xl mx-auto">
            <div
                class="bg-white rounded-3xl p-8 md:p-12 shadow-lg border border-slate-100 text-center mb-12 relative overflow-hidden"
            >
                <div
                    class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-teal-400 to-sky-400"
                ></div>

                <h2
                    class="text-sm font-bold text-teal-600 tracking-widest uppercase mb-4"
                >
                    Current Scenario
                </h2>
                <h1 class="text-3xl md:text-4xl font-bold text-slate-800 mb-6">
                    {{ scenario.title }}
                </h1>
                <p
                    class="text-xl text-slate-600 leading-relaxed max-w-2xl mx-auto"
                >
                    {{ scenario.situation }}
                </p>
            </div>

            <div class="relative min-h-[400px]">
                <div
                    class="grid gap-6 transition-all duration-500 ease-in-out"
                    :class="
                        selectedOptionId === null
                            ? 'md:grid-cols-3'
                            : 'grid-cols-1'
                    "
                >
                    <div
                        v-for="option in scenario.options"
                        :key="option.id"
                        v-show="isVisible(option.id)"
                        @click="
                            selectedOptionId === null
                                ? handleChoice(option.id)
                                : null
                        "
                        :class="[
                            'bg-white rounded-2xl p-8 border cursor-pointer transition-all duration-500 transform',
                            selectedOptionId === null
                                ? 'hover:-translate-y-2 hover:shadow-xl hover:border-teal-200'
                                : 'cursor-default border-teal-500 shadow-2xl scale-100',
                        ]"
                    >
                        <div
                            v-if="!isRevealed"
                            class="flex flex-col h-full justify-between"
                        >
                            <h3 class="text-xl font-bold text-slate-700">
                                {{ option.choice_text }}
                            </h3>
                            <div
                                class="mt-8 text-teal-600 font-bold text-sm flex items-center gap-2 group"
                            >
                                Choose this path
                                <span
                                    class="group-hover:translate-x-1 transition-transform"
                                    >→</span
                                >
                            </div>
                        </div>

                        <div v-else class="text-center py-8 animate-fade-in-up">
                            <div
                                class="w-16 h-16 bg-teal-100 text-teal-600 rounded-full flex items-center justify-center mx-auto mb-6"
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
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                    ></path>
                                </svg>
                            </div>

                            <h3 class="text-2xl font-bold text-slate-800 mb-4">
                                The Consequence
                            </h3>
                            <p
                                class="text-lg text-slate-600 leading-relaxed mb-8"
                            >
                                {{ option.consequence_text }}
                            </p>

                            <Link
                                :href="route('scenarios.index')"
                                class="inline-block bg-slate-800 text-white px-8 py-3 rounded-xl font-bold hover:bg-slate-700 transition-colors"
                            >
                                Complete Scenario
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style>
/* Custom simple animation for the reveal */
.animate-fade-in-up {
    animation: fadeInUp 0.5s ease-out forwards;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
