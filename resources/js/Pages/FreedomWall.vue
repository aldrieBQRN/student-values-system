<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import { ref } from "vue";

// Props passed from the Controller
const props = defineProps({
    posts: Array,
});

// The Form State (Inertia helper)
const form = useForm({
    content: "",
    mood: "grateful", // default mood
});

// Design System: Mood Colors
const moodStyles = {
    grateful: "bg-amber-50 text-amber-900 border-amber-200 shadow-amber-100",
    stressed: "bg-slate-100 text-slate-700 border-slate-200 shadow-slate-100",
    anxious: "bg-indigo-50 text-indigo-900 border-indigo-200 shadow-indigo-100",
    motivated: "bg-teal-50 text-teal-900 border-teal-200 shadow-teal-100",
    hopeful: "bg-sky-50 text-sky-900 border-sky-200 shadow-sky-100",
    tired: "bg-stone-100 text-stone-700 border-stone-200 shadow-stone-100",
};

// Function to submit post
const submitPost = () => {
    form.post(route("freedom-wall.store"), {
        onSuccess: () => form.reset("content"), // Clear input on success
        preserveScroll: true, // Don't jump to top
    });
};
</script>

<template>
    <Head title="Freedom Wall" />

    <AuthenticatedLayout>
        <div class="max-w-3xl mx-auto text-center mb-10">
            <h1 class="text-3xl font-bold text-slate-800">The Freedom Wall</h1>
            <p class="text-slate-500 mt-2">
                A safe, anonymous space to share how you're really feeling.
            </p>
        </div>

        <div
            class="max-w-2xl mx-auto bg-white rounded-3xl p-6 shadow-sm border border-slate-100 mb-12"
        >
            <form @submit.prevent="submitPost">
                <textarea
                    v-model="form.content"
                    class="w-full bg-slate-50 border-0 rounded-xl p-4 text-slate-700 placeholder-slate-400 focus:ring-2 focus:ring-teal-500/20 focus:bg-white transition-all resize-none"
                    rows="3"
                    placeholder="What's on your mind? (It's anonymous)"
                ></textarea>
                <div
                    v-if="form.errors.content"
                    class="text-red-500 text-sm mt-1"
                >
                    {{ form.errors.content }}
                </div>

                <div
                    class="flex flex-col sm:flex-row justify-between items-center mt-4 gap-4"
                >
                    <div
                        class="flex flex-wrap gap-2 justify-center sm:justify-start"
                    >
                        <button
                            type="button"
                            v-for="(style, moodKey) in moodStyles"
                            :key="moodKey"
                            @click="form.mood = moodKey"
                            :class="[
                                'px-3 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all',
                                form.mood === moodKey
                                    ? style +
                                      ' ring-2 ring-offset-1 ring-slate-200 scale-105'
                                    : 'bg-slate-50 text-slate-400 hover:bg-slate-100',
                            ]"
                        >
                            {{ moodKey }}
                        </button>
                    </div>

                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="bg-teal-600 hover:bg-teal-700 text-white px-6 py-2 rounded-xl font-bold shadow-lg shadow-teal-600/20 transition-all active:scale-95 disabled:opacity-50 disabled:cursor-not-allowed"
                    >
                        {{ form.processing ? "Posting..." : "Post" }}
                    </button>
                </div>
            </form>
        </div>

        <div class="columns-1 md:columns-2 lg:columns-3 gap-6 space-y-6">
            <TransitionGroup
                enter-active-class="transition-all duration-500 ease-out"
                enter-from-class="opacity-0 translate-y-8 scale-95"
                enter-to-class="opacity-100 translate-y-0 scale-100"
                move-class="transition-all duration-500"
            >
                <div
                    v-for="post in posts"
                    :key="post.id"
                    class="break-inside-avoid mb-6 rounded-2xl p-6 border shadow-[0_2px_10px_rgba(0,0,0,0.02)] transition-all hover:-translate-y-1"
                    :class="moodStyles[post.mood] || 'bg-white'"
                >
                    <p class="text-lg font-medium leading-relaxed opacity-90">
                        "{{ post.text }}"
                    </p>

                    <div
                        class="mt-4 flex justify-between items-center opacity-60"
                    >
                        <div class="flex items-center gap-1.5">
                            <span
                                class="w-2 h-2 rounded-full bg-current"
                            ></span>
                            <span class="text-xs font-bold uppercase">{{
                                post.mood
                            }}</span>
                        </div>
                        <span class="text-xs">{{ post.time_ago }}</span>
                    </div>
                </div>
            </TransitionGroup>

            <div
                v-if="posts.length === 0"
                class="text-center py-20 col-span-full"
            >
                <p class="text-slate-400">
                    The wall is empty. Be the first to share.
                </p>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
