<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module;
use App\Models\Lesson;

class ModuleTwoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Content Source: HG-G12-Q1-Mod1-RTP.docx
     * Design: World-Class UI, Clean Text (No Citations), 100% Accurate Content
     */
    public function run(): void
    {
        // 1. Create the Module
        $module = Module::firstOrCreate(
            ['title' => 'Self-Analysis: A Step to My Improvement'],
            [
                'description' => 'Identify your strengths and weaknesses, enhance different aspects of your personality, and commit to valuing yourself.',
                'order_sequence' => 2,
            ]
        );

        // 2. Clear existing lessons to avoid duplicates
        Lesson::where('module_id', $module->id)->delete();

        // ---------------------------------------------------------
        // LESSON 1: Introduction & Objectives
        // ---------------------------------------------------------
        Lesson::create([
            'module_id' => $module->id,
            'title' => 'Introduction & Learning Objectives',
            'duration_minutes' => 5,
            'content_body' => <<<HTML
                <div class="font-sans text-slate-600 antialiased space-y-10 max-w-5xl mx-auto">
                    <div>
                        <div class="flex items-center gap-3 mb-4">
                            <span class="w-1.5 h-6 bg-teal-500 rounded-full"></span>
                            <span class="text-teal-600 font-bold tracking-widest text-xs uppercase">Module 1 Overview</span>
                        </div>
                        <h3 class="text-2xl md:text-3xl font-extrabold text-slate-900 mb-6 tracking-tight">Introduction</h3>
                        <div class="prose prose-lg prose-slate max-w-none text-slate-600 leading-loose">
                            <p>
                                In this module, <strong>self-awareness</strong> is being highlighted. Since people like you are in constant change where family, school, community and others play a vital role, you have to be mindful on your strengths and weaknesses.
                            </p>
                            <p class="mt-4">
                                Hence, self-evaluation is greatly needed nowadays, especially during this time of pandemic. You need to assess what you have done so far in terms of managing the kind of life you have now and how your strengths and weaknesses helped in facing the challenges brought about by the difficult situation.
                            </p>
                        </div>
                    </div>

                    <div class="bg-white rounded-[2rem] p-8 border border-slate-200 shadow-sm relative overflow-hidden">
                        <div class="flex flex-col md:flex-row md:items-center gap-5 mb-8 relative z-10">
                            <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center border border-teal-100 shadow-sm">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-xl text-slate-800">Learning Objectives</h4>
                                <p class="text-slate-500 text-sm">At the end of this module, you are expected to:</p>
                            </div>
                        </div>

                        <ul class="space-y-4 relative z-10">
                            <li class="flex items-start gap-4">
                                <div class="w-6 h-6 rounded-full bg-teal-100 text-teal-700 flex items-center justify-center mt-0.5 shrink-0">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <span class="text-base text-slate-700 font-medium leading-relaxed">Identify your strengths and weaknesses and their role on your personal development;</span>
                            </li>
                            <li class="flex items-start gap-4">
                                <div class="w-6 h-6 rounded-full bg-teal-100 text-teal-700 flex items-center justify-center mt-0.5 shrink-0">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <span class="text-base text-slate-700 font-medium leading-relaxed">Show ways to enhance strengths and overcome weaknesses on different aspects of personality: physical, physiological, mental, spiritual, social, moral and emotional; and</span>
                            </li>
                            <li class="flex items-start gap-4">
                                <div class="w-6 h-6 rounded-full bg-teal-100 text-teal-700 flex items-center justify-center mt-0.5 shrink-0">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <span class="text-base text-slate-700 font-medium leading-relaxed">Express an oath of commitment in valuing yourself.</span>
                            </li>
                        </ul>
                    </div>
                </div>
HTML
        ]);

        // ---------------------------------------------------------
        // LESSON 2: Let's Try This (Mirroring Therapy)
        // ---------------------------------------------------------
        Lesson::create([
            'module_id' => $module->id,
            'title' => 'Let’s Try This: Mirroring Therapy',
            'duration_minutes' => 10,
            'content_body' => <<<HTML
                <div class="font-sans text-slate-600 antialiased space-y-10 max-w-5xl mx-auto">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-slate-100 pb-6">
                         <div>
                             <h3 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">Mirroring Therapy</h3>
                             <p class="text-slate-500 text-sm mt-1">Act out your emotional reactions</p>
                         </div>
                         <div class="flex items-center gap-2">
                            <span class="bg-indigo-50 text-indigo-700 text-xs font-bold px-3 py-1 rounded-lg uppercase tracking-wider border border-indigo-100">Activity</span>
                         </div>
                    </div>

                    <div class="bg-indigo-50 p-6 rounded-[1.5rem] border border-indigo-100 text-indigo-900 text-base leading-relaxed">
                        <p class="font-medium">
                            Face in front of a mirror and act out your emotional reactions on the following scenarios or aspects of your personality.
                            Try to observe yourself and evaluate your emotional reactions. Write down your answers below.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-200 hover:shadow-md transition-all">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-10 h-10 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                                <h4 class="font-bold text-slate-800">Your facial structure</h4>
                            </div>
                            <textarea class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-teal-500 outline-none text-slate-700 h-24 resize-none text-sm" placeholder="Describe your reaction..."></textarea>
                        </div>

                        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-200 hover:shadow-md transition-all">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg></div>
                                <h4 class="font-bold text-slate-800">The circle of friends that you have</h4>
                            </div>
                            <textarea class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-indigo-500 outline-none text-slate-700 h-24 resize-none text-sm" placeholder="Describe your reaction..."></textarea>
                        </div>

                        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-200 hover:shadow-md transition-all">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg></div>
                                <h4 class="font-bold text-slate-800">Your current academic performance</h4>
                            </div>
                            <textarea class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-amber-500 outline-none text-slate-700 h-24 resize-none text-sm" placeholder="Describe your reaction..."></textarea>
                        </div>

                        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-200 hover:shadow-md transition-all">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg></div>
                                <h4 class="font-bold text-slate-800">Living with family</h4>
                            </div>
                            <textarea class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-purple-500 outline-none text-slate-700 h-24 resize-none text-sm" placeholder="Describe your reaction..."></textarea>
                        </div>

                        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-200 hover:shadow-md transition-all">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-10 h-10 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg></div>
                                <h4 class="font-bold text-slate-800">Personal relationship with God</h4>
                            </div>
                            <textarea class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-rose-500 outline-none text-slate-700 h-24 resize-none text-sm" placeholder="Describe your reaction..."></textarea>
                        </div>

                        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-200 hover:shadow-md transition-all">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-10 h-10 rounded-xl bg-pink-50 text-pink-600 flex items-center justify-center"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                                <h4 class="font-bold text-slate-800">Your current relationship status</h4>
                            </div>
                            <textarea class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-pink-500 outline-none text-slate-700 h-24 resize-none text-sm" placeholder="Describe your reaction..."></textarea>
                        </div>

                        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-200 hover:shadow-md transition-all">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg></div>
                                <h4 class="font-bold text-slate-800">Your body posture</h4>
                            </div>
                            <textarea class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-blue-500 outline-none text-slate-700 h-24 resize-none text-sm" placeholder="Describe your reaction..."></textarea>
                        </div>

                        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-200 hover:shadow-md transition-all">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-10 h-10 rounded-xl bg-orange-50 text-orange-600 flex items-center justify-center"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg></div>
                                <h4 class="font-bold text-slate-800">Attitude towards difficulties in life</h4>
                            </div>
                            <textarea class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-orange-500 outline-none text-slate-700 h-24 resize-none text-sm" placeholder="Describe your reaction..."></textarea>
                        </div>
                    </div>

                    <div class="bg-amber-50 p-8 rounded-[2rem] border border-amber-100 mt-10">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="p-2 bg-white rounded-lg text-amber-500 shadow-sm"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg></div>
                            <h4 class="font-bold text-amber-900 text-lg">Processing Questions</h4>
                        </div>
                        <div class="space-y-6">
                            <div>
                                <label class="block font-bold text-amber-900/80 mb-2 text-sm">1. How did you feel about the activity?</label>
                                <textarea class="w-full bg-white border border-amber-200 rounded-xl p-4 focus:ring-1 focus:ring-amber-500 focus:border-amber-500 outline-none text-slate-700 h-24 placeholder-amber-900/30 resize-none shadow-sm text-sm" placeholder="Type your answer here..."></textarea>
                            </div>
                            <div>
                                <label class="block font-bold text-amber-900/80 mb-2 text-sm">2. Was it easy or difficult? Why?</label>
                                <textarea class="w-full bg-white border border-amber-200 rounded-xl p-4 focus:ring-1 focus:ring-amber-500 focus:border-amber-500 outline-none text-slate-700 h-24 placeholder-amber-900/30 resize-none shadow-sm text-sm" placeholder="Type your answer here..."></textarea>
                            </div>
                            <div>
                                <label class="block font-bold text-amber-900/80 mb-2 text-sm">3. Were you able to mirror emotional reactions you had towards the different scenarios in your life and aspects of your personality? How?</label>
                                <textarea class="w-full bg-white border border-amber-200 rounded-xl p-4 focus:ring-1 focus:ring-amber-500 focus:border-amber-500 outline-none text-slate-700 h-24 placeholder-amber-900/30 resize-none shadow-sm text-sm" placeholder="Type your answer here..."></textarea>
                            </div>
                            <div>
                                <label class="block font-bold text-amber-900/80 mb-2 text-sm">4. What strengths and weaknesses have you noticed or identified?</label>
                                <textarea class="w-full bg-white border border-amber-200 rounded-xl p-4 focus:ring-1 focus:ring-amber-500 focus:border-amber-500 outline-none text-slate-700 h-24 placeholder-amber-900/30 resize-none shadow-sm text-sm" placeholder="Type your answer here..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
HTML
        ]);

        // ---------------------------------------------------------
        // LESSON 4: Let's Explore This (Personal Goal Development)
        // ---------------------------------------------------------
        Lesson::create([
            'module_id' => $module->id,
            'title' => 'Let’s Explore This: Personal Goal Worksheet',
            'duration_minutes' => 10,
            'content_body' => <<<HTML
                <div class="font-sans text-slate-600 antialiased space-y-10 max-w-5xl mx-auto">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-slate-100 pb-6">
                         <div>
                             <h3 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">Personal Goal Development</h3>
                             <p class="text-slate-500 text-sm mt-1">Plan your self-improvement action</p>
                         </div>
                         <div class="flex items-center gap-2">
                            <span class="bg-indigo-50 text-indigo-700 text-xs font-bold px-3 py-1.5 rounded-lg uppercase tracking-wider border border-indigo-100">Worksheet</span>
                         </div>
                    </div>

                    <p class="text-base leading-relaxed text-slate-700 bg-slate-50 p-6 rounded-2xl border border-slate-100">
                        Based on your identified strengths and weaknesses from the previous activity, write your personal development action plan.
                        Identify a <strong>Personal Goal</strong> and define behaviors to Stop, Minimize, Continue, Improve, and Start.
                    </p>

                    <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm">
                        <div class="mb-8 border-b border-slate-100 pb-6">
                            <label class="block text-xs font-extrabold text-slate-400 uppercase tracking-wider mb-2">Your Main Goal</label>
                            <input type="text" class="w-full text-xl md:text-2xl font-bold text-slate-800 placeholder-slate-300 border-none focus:ring-0 p-0" placeholder="e.g., Get better grades this year...">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div class="bg-rose-50 p-5 rounded-2xl border border-rose-100">
                                <label class="block text-xs font-bold text-rose-600 uppercase tracking-wider mb-2 flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> Stop
                                </label>
                                <textarea class="w-full bg-white border border-rose-200 rounded-xl p-3 focus:ring-1 focus:ring-rose-500 outline-none text-sm h-24 resize-none" placeholder="e.g., Sleeping late at night..."></textarea>
                            </div>
                            <div class="bg-orange-50 p-5 rounded-2xl border border-orange-100">
                                <label class="block text-xs font-bold text-orange-600 uppercase tracking-wider mb-2 flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> Minimize
                                </label>
                                <textarea class="w-full bg-white border border-orange-200 rounded-xl p-3 focus:ring-1 focus:ring-orange-500 outline-none text-sm h-24 resize-none" placeholder="e.g., Using gadgets for gaming..."></textarea>
                            </div>
                            <div class="bg-blue-50 p-5 rounded-2xl border border-blue-100">
                                <label class="block text-xs font-bold text-blue-600 uppercase tracking-wider mb-2 flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg> Continue
                                </label>
                                <textarea class="w-full bg-white border border-blue-200 rounded-xl p-3 focus:ring-1 focus:ring-blue-500 outline-none text-sm h-24 resize-none" placeholder="e.g., Keeping my notes orderly..."></textarea>
                            </div>
                            <div class="bg-indigo-50 p-5 rounded-2xl border border-indigo-100">
                                <label class="block text-xs font-bold text-indigo-600 uppercase tracking-wider mb-2 flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg> Improve
                                </label>
                                <textarea class="w-full bg-white border border-indigo-200 rounded-xl p-3 focus:ring-1 focus:ring-indigo-500 outline-none text-sm h-24 resize-none" placeholder="e.g., Reading in advance..."></textarea>
                            </div>
                            <div class="bg-emerald-50 p-5 rounded-2xl border border-emerald-100 md:col-span-2 lg:col-span-1">
                                <label class="block text-xs font-bold text-emerald-600 uppercase tracking-wider mb-2 flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> Start
                                </label>
                                <textarea class="w-full bg-white border border-emerald-200 rounded-xl p-3 focus:ring-1 focus:ring-emerald-500 outline-none text-sm h-24 resize-none" placeholder="e.g., Developing a daily personal study plan..."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="bg-slate-50 p-8 rounded-[2rem] border border-slate-200 mt-10">
                        <h4 class="font-bold text-slate-800 text-lg mb-6">Processing Questions:</h4>
                        <div class="space-y-6">
                            <div>
                                <label class="block font-bold text-slate-700 mb-2 text-sm">How did you find this activity?</label>
                                <textarea class="w-full bg-white border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-indigo-500 outline-none h-20 resize-none text-sm" placeholder="Type here..."></textarea>
                            </div>
                            <div>
                                <label class="block font-bold text-slate-700 mb-2 text-sm">How would this help you to attain your personal goal?</label>
                                <textarea class="w-full bg-white border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-indigo-500 outline-none h-20 resize-none text-sm" placeholder="Type here..."></textarea>
                            </div>
                            <div>
                                <label class="block font-bold text-slate-700 mb-2 text-sm">What could be the possible barriers in achieving your personal goals?</label>
                                <textarea class="w-full bg-white border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-indigo-500 outline-none h-20 resize-none text-sm" placeholder="Type here..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
HTML
        ]);

        // ---------------------------------------------------------
        // LESSON 5: Keep in Mind
        // ---------------------------------------------------------
        Lesson::create([
            'module_id' => $module->id,
            'title' => 'Keep in Mind: 5 Dimensions of Personality',
            'duration_minutes' => 10,
            'content_body' => <<<HTML
                <div class="font-sans text-slate-600 antialiased space-y-12 max-w-4xl mx-auto">
                    <div class="text-center max-w-3xl mx-auto">
                        <span class="bg-teal-50 text-teal-700 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-widest border border-teal-100">Key Concept</span>
                        <h3 class="text-2xl md:text-3xl font-extrabold text-slate-900 mt-4 mb-4">Areas to Focus & Improve</h3>
                        <p class="text-base text-slate-500 leading-relaxed mb-4">
                            You are now in Grade 12 which is the last level in basic education. Hence, it would be important that you are aware on your adjustments as a teenager in the different developmental aspects of personality. How do you think you’re dealing with it?
                        </p>
                        <p class="text-base text-slate-500 leading-relaxed mb-4">
                            A group of researchers led by Amanda Eller states that a balanced person might develop an active role by interpreting the expectations of the social actors from the home and work domains and from other institution. It is where he/she studies and adopts boundaries with degrees of permeability that enable a state of greater balance between the said domains.
                        </p>
                        <p class="text-base text-slate-500 leading-relaxed">
                            When it comes to life, happiness, and well-being, there isn’t one single area of life that we need to focus on. Instead, life is multi-dimensional and dynamic. The following dimensions will guide you on the areas to focus and improve.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm hover:border-emerald-200 hover:-translate-y-1 transition-all">
                            <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center mb-4"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg></div>
                            <h4 class="font-bold text-slate-900 text-lg mb-2">Physical</h4>
                            <p class="text-xs text-slate-500 leading-relaxed">
                                Your adolescence period is a good time for you to take more responsibility for your physical health. You can learn to make healthy food choices, be active, and engage in your own healthcare. It is highly recommended that you have at least 60 minutes of physical activity each day. Support from family and friends will help increase your physical activity as adolescent. In addition, learning the healthy habits like drinking enough water and eating enough fruits and vegetables, is important to maintain your good nutrition. Valuing your physical health by taking care of your body through the following: exercise regularly, eat a healthy diet, maintain a healthy weight, get enough sleep, keep up with vaccinations, brush and floss your teeth, and avoid listening to loud music.
                            </p>
                        </div>

                        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm hover:border-blue-200 hover:-translate-y-1 transition-all">
                            <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center mb-4"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg></div>
                            <h4 class="font-bold text-slate-900 text-lg mb-2">Mental</h4>
                            <p class="text-xs text-slate-500 leading-relaxed">
                                It is important for you to maintain good mental health habits, including coping, resilience, and good judgment among your age group to achieve overall wellbeing. It sets the stage for positive mental health in adulthood. Mood swings, for example, are common during adolescence. Some adolescents might experience a serious mental health adjustment, such as depression and/or anxiety disorders, at some point in life. That is why for a healthy mental aspect, you as an adolescent must remember that talking about your feelings with a trusted person can help. He/she could be a member of your family or a close friend. Definitely he/she can support you in maintaining a sound mind and positive outlook in every challenge as an adolescent.
                            </p>
                        </div>

                        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm hover:border-rose-200 hover:-translate-y-1 transition-all">
                            <div class="w-12 h-12 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center mb-4"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                            <h4 class="font-bold text-slate-900 text-lg mb-2">Emotional</h4>
                            <p class="text-xs text-slate-500 leading-relaxed">
                                The adolescent healthy emotional development is marked by a gradually increasing ability to perceive, assess, and manage emotions. This is a biological process driven by physical and cognitive changes and heavily influenced by context and environment. You generally become more aware of your own feelings and the feelings of others, but these perceptions may still be weak. You sometimes might expect to keep your emotions from interfering with performance in school, task and other activities, but doing so may be challenging in a complex environment. You may be excited to take on new challenges to become more independent, whereas others may need more support to build confidence. The process of emotional development gives you the opportunity to build skills, discover unique qualities, and develop strengths for optimal healthy emotion.
                            </p>
                        </div>

                        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm hover:border-indigo-200 hover:-translate-y-1 transition-all">
                            <div class="w-12 h-12 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center mb-4"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg></div>
                            <h4 class="font-bold text-slate-900 text-lg mb-2">Social</h4>
                            <p class="text-xs text-slate-500 leading-relaxed">
                                You as an adolescent must continue to refine how you relate with others. Questions like “Who am I?” and “Who do I want to be?” may direct you to have a deeper understanding of yourself. You may adopt the values and roles that your parents expect from you and later on develop your own identity that might be different from your parents but similar with your peer group. This is common as peer relationships can become a central focus in your life. It is recommended that you build relationship with your peers through social interrelated activities. You may establish healthy relationship with them through freedom to be yourself, mutual respect of both people in the partnership, support, privacy, boundaries and communication.
                            </p>
                        </div>

                        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm hover:border-purple-200 hover:-translate-y-1 transition-all md:col-span-2 lg:col-span-1 lg:col-start-2">
                            <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center mb-4"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg></div>
                            <h4 class="font-bold text-slate-900 text-lg mb-2">Spiritual</h4>
                            <p class="text-xs text-slate-500 leading-relaxed">
                                Religion has a strong influence to our country even up to now. The teenagers who are guided and nurtured by a clear belief system and spiritual activities are much less likely to go off the rails during adolescence. The experiences and observations you have in your spiritual aspect could continuously refine your belief system. It is better to be surrounded by adults who can be your good role model and a source of inspiration to improve your life direction than to be with people who are very prone to be off-track in life.
                            </p>
                        </div>
                    </div>

                    <div class="bg-indigo-50 p-8 rounded-[2rem] border border-indigo-100 text-center mt-8">
                        <p class="text-indigo-900/80 text-sm leading-relaxed">
                            Therefore, after internalizing the five dimensions of human individual, it is important to include personal development plan to manage your strengths and weaknesses. A Personal Development Plan is an action plan for self-development within the context of education, relationships, career, or for self-improvement. It provides an awareness and reflection that will help you set and reach personal goals and improve on various aspects of your life across various life stages.
                        </p>
                    </div>
                </div>
HTML
        ]);

        // ---------------------------------------------------------
        // LESSON 6: You Can Do It (Poem)
        // ---------------------------------------------------------
        Lesson::create([
            'module_id' => $module->id,
            'title' => 'You Can Do It: Poem Writing Challenge',
            'duration_minutes' => 15,
            'content_body' => <<<HTML
                <div class="font-sans text-slate-600 antialiased space-y-8 max-w-4xl mx-auto">
                    <div class="bg-gradient-to-r from-purple-50 to-indigo-50 p-8 rounded-[2rem] border border-purple-100 text-center">
                        <span class="text-3xl mb-4 block">✍️</span>
                        <h3 class="text-2xl font-bold text-purple-900 mb-2">Let’s be Creative!</h3>
                        <p class="text-purple-800/80 text-sm">Write a poem of at least four lines about your personal insights on how you value yourself. You may read the poem with your family at home or share it with your friends in your social media accounts.</p>
                    </div>

                    <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm">
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-4">Your Poem</label>
                        <textarea class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-6 focus:ring-1 focus:ring-purple-500 outline-none text-slate-700 h-64 resize-none text-lg font-serif leading-relaxed placeholder-slate-400 text-center italic" placeholder="Write your masterpiece here..."></textarea>
                    </div>
                </div>
HTML
        ]);

        // ---------------------------------------------------------
        // LESSON 7: What I Have Learned (Pledge)
        // ---------------------------------------------------------
        Lesson::create([
            'module_id' => $module->id,
            'title' => 'What I Have Learned: Pledge of Commitment',
            'duration_minutes' => 5,
            'content_body' => <<<HTML
                <div class="font-sans text-slate-600 antialiased space-y-10 max-w-4xl mx-auto">
                    <div class="bg-emerald-50 p-8 rounded-[2rem] border border-emerald-100 text-center">
                        <h3 class="text-2xl font-bold text-emerald-900 mb-2">Pledge of Commitment</h3>
                        <p class="text-emerald-800/80 text-sm">Make your own “Pledge of Commitment” stating that despite the many challenges you are facing now, still you are able to manage life with courage and determination.</p>
                    </div>

                    <div class="relative bg-white p-10 rounded-[2rem] border-2 border-slate-200 shadow-xl shadow-slate-100/50">
                        <div class="absolute top-6 left-6 text-6xl text-slate-100 font-serif leading-none">“</div>

                        <div class="relative z-10 text-center">
                            <h4 class="text-lg font-bold text-slate-900 mb-6 uppercase tracking-widest">Pledge of Commitment </h4>
                            <textarea class="w-full bg-transparent border-b-2 border-slate-200 focus:border-emerald-500 outline-none text-slate-700 h-40 resize-none text-xl md:text-2xl font-medium text-center leading-relaxed placeholder-slate-300" placeholder="I commit to..."></textarea>
                        </div>

                        <div class="absolute bottom-6 right-6 text-6xl text-slate-100 font-serif leading-none rotate-180">“</div>
                    </div>
                </div>
HTML
        ]);

        // ---------------------------------------------------------
        // LESSON 8: Share Your Thoughts (Three Big Steps)
        // ---------------------------------------------------------
        Lesson::create([
            'module_id' => $module->id,
            'title' => 'Share Your Thoughts: Three Big Steps',
            'duration_minutes' => 10,
            'content_body' => <<<HTML
                <div class="font-sans text-slate-600 antialiased space-y-12 max-w-4xl mx-auto">
                    <div class="text-center">
                        <h3 class="text-2xl md:text-3xl font-extrabold text-slate-900 mb-2">My Three Big Steps</h3>
                        <p class="text-slate-500 text-sm">In Achieving Personal Development</p>
                    </div>

                    <div class="space-y-6">
                        <div class="flex flex-col md:flex-row gap-6 items-center">
                            <div class="w-16 h-16 rounded-full bg-teal-500 text-white flex items-center justify-center text-2xl font-bold shrink-0 shadow-lg shadow-teal-200">1</div>
                            <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm flex-1 w-full">
                                <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Step 1</label>
                                <input type="text" class="w-full bg-slate-50 border-none rounded-xl p-4 focus:ring-1 focus:ring-teal-500 text-slate-700 font-medium" placeholder="What is your first step?">
                            </div>
                        </div>

                        <div class="h-8 w-0.5 bg-slate-200 mx-auto md:ml-8"></div>

                        <div class="flex flex-col md:flex-row gap-6 items-center">
                            <div class="w-16 h-16 rounded-full bg-indigo-500 text-white flex items-center justify-center text-2xl font-bold shrink-0 shadow-lg shadow-indigo-200">2</div>
                            <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm flex-1 w-full">
                                <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Step 2</label>
                                <input type="text" class="w-full bg-slate-50 border-none rounded-xl p-4 focus:ring-1 focus:ring-indigo-500 text-slate-700 font-medium" placeholder="What is your next step?">
                            </div>
                        </div>

                        <div class="h-8 w-0.5 bg-slate-200 mx-auto md:ml-8"></div>

                        <div class="flex flex-col md:flex-row gap-6 items-center">
                            <div class="w-16 h-16 rounded-full bg-rose-500 text-white flex items-center justify-center text-2xl font-bold shrink-0 shadow-lg shadow-rose-200">3</div>
                            <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm flex-1 w-full">
                                <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Step 3</label>
                                <input type="text" class="w-full bg-slate-50 border-none rounded-xl p-4 focus:ring-1 focus:ring-rose-500 text-slate-700 font-medium" placeholder="What is your final step?">
                            </div>
                        </div>
                    </div>

                    <div class="bg-slate-900 p-10 rounded-[2.5rem] text-center mt-16">
                        <p class="italic text-slate-300 text-lg font-serif">
                            "Congratulations! You have come this far. Share the insights you learned."
                        </p>
                    </div>
                </div>
HTML
        ]);
    }
}
