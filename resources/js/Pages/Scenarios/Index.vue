<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

defineProps({ scenarios: Array });
</script>

<template>
    <Head title="Scenarios" />
    <AuthenticatedLayout>
        <h1 class="text-3xl font-bold text-slate-800 mb-8">
            Real-life Scenarios
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <Link
                v-for="scenario in scenarios"
                :key="scenario.id"
                :href="route('scenarios.show', scenario.id)"
                class="block bg-white rounded-3xl p-8 border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all group"
            >
                <div
                    class="w-12 h-12 bg-indigo-100 rounded-2xl flex items-center justify-center text-indigo-600 mb-6 group-hover:scale-110 transition-transform"
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
                            d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"
                        ></path>
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                        ></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-800 mb-2">
                    {{ scenario.title }}
                </h3>
                <p class="text-slate-500 line-clamp-2">
                    {{ scenario.situation }}
                </p>
                <div
                    class="mt-6 flex items-center text-sm font-bold text-indigo-500"
                >
                    Start Scenario <span class="ml-2">→</span>
                </div>
            </Link>
        </div>
    </AuthenticatedLayout>
</template>
