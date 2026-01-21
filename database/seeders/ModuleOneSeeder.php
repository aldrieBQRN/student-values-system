<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module;
use App\Models\Lesson;

class ModuleOneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Content Source: HG-G11-Q1-Mod1-RTP.pdf.docx
     * Design: World-Class UI, Clean Text (No Citations), 100% Accurate Content
     */
    public function run(): void
    {
        // 1. Create the Module
        $module = Module::firstOrCreate(
            ['title' => 'Module 1: The Superhero in ME'],
            [
                'description' => 'Discover your strengths, differentiate self-worth from self-esteem, and empower yourself during crises.',
                'order_sequence' => 1,
            ]
        );

        // 2. Clear existing lessons to avoid duplicates
        Lesson::where('module_id', $module->id)->delete();

        // ---------------------------------------------------------
        // LESSON 1: Introductory Message (Learner)
        // ---------------------------------------------------------
        Lesson::create([
            'module_id' => $module->id,
            'title' => 'Introductory Message: For the Learner',
            'duration_minutes' => 5,
            'content_body' => <<<HTML
                <div class="font-sans text-slate-600 antialiased max-w-5xl mx-auto">
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-8 rounded-[2rem] border border-blue-100 mb-10 shadow-sm relative overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="p-3 bg-white rounded-xl shadow-sm text-blue-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <h3 class="text-2xl md:text-3xl font-extrabold text-blue-900 tracking-tight">Welcome to this Module!</h3>
                            </div>
                            <div class="space-y-5 text-base leading-relaxed text-blue-900/80">
                                <p>
                                    As part of examining your life while trying to adjust to the new normal, it is important to evaluate your <strong>strengths and weaknesses</strong>. Doing it will help you to the adjustments that you will need for the next stage of your life. This could help you understand the things that happen around you and to effectively deal with different challenges.
                                </p>
                                <p>
                                    Work on the tasks seriously; seek help if you believe you need to. Remember, in life there are things that we cannot control. There will be negative events that will challenge our positive dispositions. However, let us not be disheartened; <span class="font-bold text-blue-700">we have the means on how to overcome it – you have that in you!</span>
                                </p>
                                <p class="italic font-medium">
                                    Embark on this journey of overcoming your weaknesses and optimizing your strengths in transforming into a better version of yourself!
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-10">
                        <h4 class="font-bold text-slate-800 text-lg mb-6 px-2 flex items-center gap-3">
                            <span class="w-1.5 h-6 bg-indigo-500 rounded-full"></span>
                            This self-learning module has six interactive activities:
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex items-start gap-4 bg-white p-5 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-all">
                                <div class="w-10 h-10 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center font-bold text-sm shrink-0 border border-teal-100">1</div>
                                <div><h5 class="font-bold text-slate-800 text-base mb-1">Let’s Try This</h5><p class="text-slate-500 text-sm leading-relaxed">Helps you get ready to learn.</p></div>
                            </div>
                            <div class="flex items-start gap-4 bg-white p-5 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-all">
                                <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center font-bold text-sm shrink-0 border border-indigo-100">2</div>
                                <div><h5 class="font-bold text-slate-800 text-base mb-1">Let’s Explore This</h5><p class="text-slate-500 text-sm leading-relaxed">Guides you towards what you need to learn.</p></div>
                            </div>
                            <div class="flex items-start gap-4 bg-white p-5 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-all">
                                <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center font-bold text-sm shrink-0 border border-amber-100">3</div>
                                <div><h5 class="font-bold text-slate-800 text-base mb-1">Keep in Mind</h5><p class="text-slate-500 text-sm leading-relaxed">Gives you the lessons that you need to learn and understand.</p></div>
                            </div>
                            <div class="flex items-start gap-4 bg-white p-5 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-all">
                                <div class="w-10 h-10 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center font-bold text-sm shrink-0 border border-rose-100">4</div>
                                <div><h5 class="font-bold text-slate-800 text-base mb-1">You Can Do It</h5><p class="text-slate-500 text-sm leading-relaxed">Helps you apply the lessons learned in daily activities.</p></div>
                            </div>
                            <div class="flex items-start gap-4 bg-white p-5 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-all">
                                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-sm shrink-0 border border-emerald-100">5</div>
                                <div><h5 class="font-bold text-slate-800 text-base mb-1">What I Have Learned</h5><p class="text-slate-500 text-sm leading-relaxed">Tests and evaluates your learning.</p></div>
                            </div>
                            <div class="flex items-start gap-4 bg-white p-5 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-all">
                                <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center font-bold text-sm shrink-0 border border-purple-100">6</div>
                                <div><h5 class="font-bold text-slate-800 text-base mb-1">Share Your Thoughts</h5><p class="text-slate-500 text-sm leading-relaxed">Helps you express your thoughts, opinions and feelings.</p></div>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-slate-100 pt-8 mt-10 text-center">
                        <p class="text-slate-400 italic text-sm font-medium">"Make sure to read, think, follow, and enjoy every task that you are asked to do. Have fun! Stay safe and healthy!"</p>
                    </div>
                </div>
HTML
        ]);

        // ---------------------------------------------------------
        // LESSON 2: Introduction & Objectives
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
                                This module will discuss appropriate ways on how to improve your self-care and live up to your full potentials.
                                It will also help you in differentiating <span class="font-bold text-indigo-600">self-worth</span> from your <span class="font-bold text-teal-600">self-esteem</span> to better understand the factors that influence your inner sense of value.
                            </p>
                            <p class="mt-4">
                                The module will present various activities that will help you develop and strengthen your self-worth. Thus, it is recommended that you should accomplish every activity.
                                As an additional challenge, there are activities in this module that will help you discover your worth amidst the COVID-19 pandemic.
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
                                <span class="text-base text-slate-700 font-medium leading-relaxed">Identify your positive traits, characteristics, and accomplishments by exploring yourself;</span>
                            </li>
                            <li class="flex items-start gap-4">
                                <div class="w-6 h-6 rounded-full bg-teal-100 text-teal-700 flex items-center justify-center mt-0.5 shrink-0">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <span class="text-base text-slate-700 font-medium leading-relaxed">Demonstrate self-worth as you engage in learning activities; and</span>
                            </li>
                            <li class="flex items-start gap-4">
                                <div class="w-6 h-6 rounded-full bg-teal-100 text-teal-700 flex items-center justify-center mt-0.5 shrink-0">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <span class="text-base text-slate-700 font-medium leading-relaxed">Appreciate your feelings, thoughts, desires and values through positive self-talk.</span>
                            </li>
                        </ul>
                    </div>
                </div>
HTML
        ]);

        // ---------------------------------------------------------
        // LESSON 3: Let's Try This
        // ---------------------------------------------------------
        Lesson::create([
            'module_id' => $module->id,
            'title' => 'Let’s Try This: Valuing Moments',
            'duration_minutes' => 15,
            'content_body' => <<<HTML
                <div class="font-sans text-slate-600 antialiased space-y-10 max-w-5xl mx-auto">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-slate-100 pb-6">
                         <div>
                             <h3 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">Let’s Try This</h3>
                             <p class="text-slate-500 text-sm mt-1">Reflecting on your interactions</p>
                         </div>
                         <div class="flex items-center gap-2">
                            <span class="bg-indigo-50 text-indigo-700 text-xs font-bold px-3 py-1 rounded-lg uppercase tracking-wider border border-indigo-100">Activity</span>
                         </div>
                    </div>

                    <div class="bg-indigo-50 p-6 rounded-[1.5rem] border border-indigo-100 text-indigo-900 text-base leading-relaxed">
                        <p class="font-medium">
                            Try to remember the last time you felt valued by others and the way you made others felt valued.
                            Identify the incidents, your thoughts or ideas about the situations, your feelings and your behavior or action.
                            Please type your answers in the templates below.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-200">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center border border-teal-100">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <h4 class="font-bold text-lg text-slate-900">The last time I felt valued</h4>
                            </div>
                            <div class="space-y-5">
                                <div>
                                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Incident</label>
                                    <textarea class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-teal-500 focus:bg-white transition-all outline-none text-slate-700 placeholder-slate-400 h-24 resize-none shadow-inner text-sm" placeholder="Describe what happened..."></textarea>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Thoughts</label>
                                    <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-teal-500 focus:bg-white transition-all outline-none text-slate-700 placeholder-slate-400 shadow-inner text-sm" placeholder="What was on your mind?">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Feelings</label>
                                    <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-teal-500 focus:bg-white transition-all outline-none text-slate-700 placeholder-slate-400 shadow-inner text-sm" placeholder="How did you feel?">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Behavior</label>
                                    <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-teal-500 focus:bg-white transition-all outline-none text-slate-700 placeholder-slate-400 shadow-inner text-sm" placeholder="What did you do?">
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-200">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-12 h-12 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center border border-indigo-100">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                                </div>
                                <h4 class="font-bold text-lg text-slate-900">The last time I made others feel valued</h4>
                            </div>
                            <div class="space-y-5">
                                <div>
                                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Incident</label>
                                    <textarea class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-indigo-500 focus:bg-white transition-all outline-none text-slate-700 placeholder-slate-400 h-24 resize-none shadow-inner text-sm" placeholder="Describe what happened..."></textarea>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Thoughts</label>
                                    <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-indigo-500 focus:bg-white transition-all outline-none text-slate-700 placeholder-slate-400 shadow-inner text-sm" placeholder="What was on your mind?">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Feelings</label>
                                    <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-indigo-500 focus:bg-white transition-all outline-none text-slate-700 placeholder-slate-400 shadow-inner text-sm" placeholder="How did you feel?">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Behavior</label>
                                    <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-indigo-500 focus:bg-white transition-all outline-none text-slate-700 placeholder-slate-400 shadow-inner text-sm" placeholder="What did you do?">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-amber-50 p-8 rounded-[2rem] border border-amber-100 mt-10">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="p-2 bg-white rounded-lg text-amber-500 shadow-sm"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg></div>
                            <h4 class="font-bold text-amber-900 text-lg">Processing Questions</h4>
                        </div>
                        <div class="space-y-6">
                            <div>
                                <label class="block font-bold text-amber-900/80 mb-2 text-sm">1. Did you find it difficult/easy to answer? Why?</label>
                                <textarea class="w-full bg-white border border-amber-200 rounded-xl p-4 focus:ring-1 focus:ring-amber-500 focus:border-amber-500 outline-none text-slate-700 h-24 placeholder-amber-900/30 resize-none shadow-sm text-sm" placeholder="Type your answer here..."></textarea>
                            </div>
                            <div>
                                <label class="block font-bold text-amber-900/80 mb-2 text-sm">2. What do you notice with your answers?</label>
                                <textarea class="w-full bg-white border border-amber-200 rounded-xl p-4 focus:ring-1 focus:ring-amber-500 focus:border-amber-500 outline-none text-slate-700 h-24 placeholder-amber-900/30 resize-none shadow-sm text-sm" placeholder="Type your answer here..."></textarea>
                            </div>
                            <div>
                                <label class="block font-bold text-amber-900/80 mb-2 text-sm">3. What is your reaction upon seeing all your answers?</label>
                                <textarea class="w-full bg-white border border-amber-200 rounded-xl p-4 focus:ring-1 focus:ring-amber-500 focus:border-amber-500 outline-none text-slate-700 h-24 placeholder-amber-900/30 resize-none shadow-sm text-sm" placeholder="Type your answer here..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
HTML
        ]);

        // ---------------------------------------------------------
        // LESSON 4: Let's Explore This (Mirror Mirror)
        // ---------------------------------------------------------
        Lesson::create([
            'module_id' => $module->id,
            'title' => 'Let’s Explore This: Mirror Mirror',
            'duration_minutes' => 15,
            'content_body' => <<<HTML
                <div class="font-sans text-slate-600 antialiased space-y-10 max-w-4xl mx-auto">
                     <div class="flex items-center justify-between border-b border-slate-100 pb-6">
                         <div>
                             <h3 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">Mirror Mirror on the Wall</h3>
                             <p class="text-slate-500 text-sm mt-1">A self-reflection activity</p>
                         </div>
                         <span class="bg-indigo-50 text-indigo-700 text-xs font-bold px-3 py-1.5 rounded-lg border border-indigo-100">Activity</span>
                    </div>

                    <p class="text-base leading-relaxed text-slate-700 bg-slate-50 p-6 rounded-2xl border border-slate-100">
                        Think of a person whom you want to talk to (can be friend, teacher, guidance counselor, brother, sister or cousin, parent or guardian).
                    </p>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm text-center">
                            <div class="w-8 h-8 rounded-full bg-slate-800 text-white flex items-center justify-center font-bold mb-3 mx-auto text-sm">1</div>
                            <p class="text-sm font-medium">Write his/her name separately on a 1/4 size paper using a permanent marker or a pen.</p>
                        </div>
                        <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm text-center">
                            <div class="w-8 h-8 rounded-full bg-slate-800 text-white flex items-center justify-center font-bold mb-3 mx-auto text-sm">2</div>
                            <p class="text-sm font-medium">Face the mirror, post the name of your chosen person on the mirror. Imagine that that person is facing you.</p>
                        </div>
                        <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm text-center">
                            <div class="w-8 h-8 rounded-full bg-slate-800 text-white flex items-center justify-center font-bold mb-3 mx-auto text-sm">3</div>
                            <p class="text-sm font-medium">Talk to yourself in the mirror and to the person you chose guided by the following instructions.</p>
                        </div>
                    </div>

                    <div class="space-y-5">
                        <div class="bg-white p-6 rounded-[1.5rem] border border-slate-200 shadow-sm hover:border-indigo-200 transition-colors">
                            <div class="flex items-center gap-3 mb-3">
                                <span class="p-2 bg-indigo-50 rounded-lg text-indigo-600"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg></span>
                                <span class="text-xs font-bold text-indigo-600 uppercase tracking-widest">Step A: To Yourself</span>
                            </div>
                            <p class="text-sm text-slate-500 italic mb-2">Imagine that you are looking at the mirror, and from the mirror you see yourself. Please talk to yourself and say:</p>
                            <div class="bg-indigo-50/50 p-6 rounded-xl border border-indigo-100">
                                <label class="block font-bold text-indigo-900 text-lg mb-2 text-center">“I am proud of you because you are...”</label>
                                <input type="text" class="w-full bg-white border border-indigo-200 rounded-lg p-3 focus:ring-1 focus:ring-indigo-500 outline-none text-indigo-900 font-medium text-center placeholder-indigo-300" placeholder="Type your answer here...">
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-[1.5rem] border border-slate-200 shadow-sm hover:border-pink-200 transition-colors">
                            <div class="flex items-center gap-3 mb-3">
                                <span class="p-2 bg-pink-50 rounded-lg text-pink-600"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg></span>
                                <span class="text-xs font-bold text-pink-600 uppercase tracking-widest">Step B: Friends</span>
                            </div>
                            <p class="text-sm text-slate-500 italic mb-2">Then, your friends pop up in the mirror (post the name of your friends in the mirror), please tell your friends that:</p>
                            <div class="bg-pink-50/50 p-6 rounded-xl border border-pink-100">
                                <label class="block font-bold text-pink-900 text-lg mb-2 text-center">“You should be happy with me because I’m...”</label>
                                <input type="text" class="w-full bg-white border border-pink-200 rounded-lg p-3 focus:ring-1 focus:ring-pink-500 outline-none text-pink-900 font-medium text-center placeholder-pink-300" placeholder="Type your answer here...">
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-[1.5rem] border border-slate-200 shadow-sm hover:border-emerald-200 transition-colors">
                            <div class="flex items-center gap-3 mb-3">
                                <span class="p-2 bg-emerald-50 rounded-lg text-emerald-600"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg></span>
                                <span class="text-xs font-bold text-emerald-600 uppercase tracking-widest">Step C: Teachers</span>
                            </div>
                            <p class="text-sm text-slate-500 italic mb-2">Then, your teachers pop up in the mirror (post the name of your teachers in the mirror), please tell them that:</p>
                            <div class="bg-emerald-50/50 p-6 rounded-xl border border-emerald-100">
                                <label class="block font-bold text-emerald-900 text-lg mb-2 text-center">“You should be happy with me because I’m...”</label>
                                <input type="text" class="w-full bg-white border border-emerald-200 rounded-lg p-3 focus:ring-1 focus:ring-emerald-500 outline-none text-emerald-900 font-medium text-center placeholder-emerald-300" placeholder="Type your answer here...">
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-[1.5rem] border border-slate-200 shadow-sm hover:border-orange-200 transition-colors">
                            <div class="flex items-center gap-3 mb-3">
                                <span class="p-2 bg-orange-50 rounded-lg text-orange-600"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></span>
                                <span class="text-xs font-bold text-orange-600 uppercase tracking-widest">Step D: Siblings/Cousins</span>
                            </div>
                            <p class="text-sm text-slate-500 italic mb-2">Then, your brothers/sisters pop up in the mirror (post the name of your brothers/sisters/cousins), please tell them that:</p>
                            <div class="bg-orange-50/50 p-6 rounded-xl border border-orange-100">
                                <label class="block font-bold text-orange-900 text-lg mb-2 text-center">“You should be happy with me because I’m...”</label>
                                <input type="text" class="w-full bg-white border border-orange-200 rounded-lg p-3 focus:ring-1 focus:ring-orange-500 outline-none text-orange-900 font-medium text-center placeholder-orange-300" placeholder="Type your answer here...">
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-[1.5rem] border border-slate-200 shadow-sm hover:border-purple-200 transition-colors">
                            <div class="flex items-center gap-3 mb-3">
                                <span class="p-2 bg-purple-50 rounded-lg text-purple-600"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg></span>
                                <span class="text-xs font-bold text-purple-600 uppercase tracking-widest">Step E: Parents/Guardians</span>
                            </div>
                            <p class="text-sm text-slate-500 italic mb-2">Then, your parents pop up in the mirror (post the name of your parents/guardian or whom you consider as your parent in the mirror), please tell them that:</p>
                            <div class="bg-purple-50/50 p-6 rounded-xl border border-purple-100">
                                <label class="block font-bold text-purple-900 text-lg mb-2 text-center">“You should be proud of me because I’m...”</label>
                                <input type="text" class="w-full bg-white border border-purple-200 rounded-lg p-3 focus:ring-1 focus:ring-purple-500 outline-none text-purple-900 font-medium text-center placeholder-purple-300" placeholder="Type your answer here...">
                            </div>
                        </div>
                    </div>

                    <div class="bg-slate-50 p-8 rounded-[2rem] border border-slate-100 mt-10">
                        <h4 class="font-bold text-slate-800 text-lg mb-6">Processing Questions:</h4>
                        <div class="space-y-6">
                            <div>
                                <label class="block font-bold text-slate-700 mb-2 text-sm">1. How did you find the activity?</label>
                                <textarea class="w-full bg-white border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-indigo-500 outline-none h-20 resize-none text-sm" placeholder="Type here..."></textarea>
                            </div>
                            <div>
                                <label class="block font-bold text-slate-700 mb-2 text-sm">2. How do you feel about talking to yourself? Your friends? Teachers? Family?</label>
                                <textarea class="w-full bg-white border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-indigo-500 outline-none h-20 resize-none text-sm" placeholder="Type here..."></textarea>
                            </div>
                            <div>
                                <label class="block font-bold text-slate-700 mb-2 text-sm">3. What have you discovered about yourself during your self-talk?</label>
                                <textarea class="w-full bg-white border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-indigo-500 outline-none h-20 resize-none text-sm" placeholder="Type here..."></textarea>
                            </div>
                            <div>
                                <label class="block font-bold text-slate-700 mb-2 text-sm">4. How is the activity helping you enhance your self-worth?</label>
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
            'title' => 'Keep in Mind: Self-Worth vs. Self-Esteem',
            'duration_minutes' => 10,
            'content_body' => <<<HTML
                <div class="font-sans text-slate-600 antialiased space-y-12 max-w-4xl mx-auto">
                    <div class="text-center">
                        <span class="bg-teal-50 text-teal-700 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-widest border border-teal-100">Key Concept</span>
                        <h3 class="text-2xl md:text-3xl font-extrabold text-slate-900 mt-4 mb-2">Let’s Clarify!</h3>
                        <p class="text-base text-slate-500 max-w-2xl mx-auto">
                            Self-worth and self-esteem are two different things, despite the fact that they are used interchangeably. It is you who can determine how outside factors influence your self-worth. These factors are actions or reactions and judgments of other people.
                        </p>
                        <p class="text-base text-slate-500 max-w-2xl mx-auto mt-4">
                            Researches say that an individual who validates his/her self-worth from external factors may more likely have low self-worth. However, individuals who consider their internal aspects tend to develop a healthy inner sense of value.
                        </p>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-indigo-50 p-8 rounded-[2rem] border border-indigo-100 text-center">
                            <h4 class="text-xl font-bold text-indigo-900 mb-2">Self-Esteem</h4>
                            <p class="text-indigo-800/80 text-sm leading-relaxed">Self-esteem is concerned more on your <strong>confidence</strong> and <strong>healthy admiration</strong> of yourself. Often based on external feedback.</p>
                        </div>
                        <div class="bg-teal-50 p-8 rounded-[2rem] border border-teal-100 text-center">
                            <h4 class="text-xl font-bold text-teal-900 mb-2">Self-Worth</h4>
                            <p class="text-teal-800/80 text-sm leading-relaxed">Self-worth is how you value yourself—an <strong>inner sense of value</strong>. Based on internal aspects rather than external validation.</p>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-10">
                        <div>
                            <h4 class="font-bold text-slate-900 text-lg mb-8 flex items-center gap-3">
                                <span class="w-1.5 h-6 bg-teal-500 rounded-full"></span>
                                How to Improve your Self-worth
                            </h4>
                            <ul class="space-y-6 list-none">
                                <li class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                                    <strong class="text-slate-800 text-sm block mb-1">Stop comparing yourself to others.</strong>
                                    <span class="text-xs text-slate-500 leading-relaxed block">Evaluating yourself based on standards of other people may lead you to self-destruction or may develop maladaptive behavior.</span>
                                </li>
                                <li class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                                    <strong class="text-slate-800 text-sm block mb-1">Challenge the critical inner self.</strong>
                                    <span class="text-xs text-slate-500 leading-relaxed block">Find effort to see who you really are. Listen to your inner voice.</span>
                                </li>
                                <li class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                                    <strong class="text-slate-800 text-sm block mb-1">Appreciate yourself.</strong>
                                    <span class="text-xs text-slate-500 leading-relaxed block">Start understanding and appreciating your own feelings, thoughts, desires and values.</span>
                                </li>
                            </ul>
                            <div class="mt-4 p-4 bg-teal-50 rounded-xl border border-teal-100 text-xs text-teal-800 italic">
                                If you will challenge your critical inner voice and stop comparing yourself to others, you can begin to get a feeling for your own self-worth.
                            </div>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900 text-lg mb-8 flex items-center gap-3">
                                <span class="w-1.5 h-6 bg-indigo-500 rounded-full"></span>
                                How to Improve and Raise Your Self-esteem
                            </h4>
                            <ul class="space-y-6 list-none">
                                <li class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                                    <strong class="text-slate-800 text-sm block mb-1">Be with people who treat you well.</strong>
                                    <span class="text-xs text-slate-500 leading-relaxed block">Some people act in ways that tear you down. Others lift you up by what they say and do. Learn to tell the difference. Choose friends who help you feel OK about yourself. Find people that you can be yourself with. Be that type of friend to others.</span>
                                </li>
                                <li class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                                    <strong class="text-slate-800 text-sm block mb-1">Set goals and work toward them.</strong>
                                    <span class="text-xs text-slate-500 leading-relaxed block">If you want to feel good about yourself, do things that are good for you. Maybe you want to eat a healthier diet, get more fit, or study better. Make a goal. Then make a plan on how to do it. Stick with your plan. Track your progress. Be proud of what you've done so far. Say to yourself, "I've been following my plan to work out every day for 45 minutes. I feel good about it. I know I can keep it up."</span>
                                </li>
                                <li class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                                    <strong class="text-slate-800 text-sm block mb-1">Give and help.</strong>
                                    <span class="text-xs text-slate-500 leading-relaxed block">Giving is one the best ways to build self-esteem. Tutor a classmate, help clean up your neighborhood, help in a donation drive campaign. Help out at home. Make it a habit to be kind and fair. Do things that make you proud of the kind of person you are. When you do things that make a difference (even a small one) your self-esteem will grow.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
HTML
        ]);

        // ---------------------------------------------------------
        // LESSON 6: You Can Do It
        // ---------------------------------------------------------
        Lesson::create([
            'module_id' => $module->id,
            'title' => 'You Can Do It: Self-Affirmation',
            'duration_minutes' => 10,
            'content_body' => <<<HTML
                <div class="font-sans text-slate-600 antialiased space-y-8 max-w-4xl mx-auto">
                    <div class="bg-rose-50 p-8 rounded-[2rem] border border-rose-100 mb-6">
                        <h3 class="text-2xl md:text-3xl font-bold text-rose-900 mb-2">Self-Affirmation Exercise</h3>
                        <p class="text-rose-800/80 text-sm font-medium">Complete the sentences below.</p>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <label class="block font-bold text-slate-700 text-sm mb-2 uppercase tracking-wide">1. My proudest moment was...</label>
                            <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-teal-500 outline-none text-sm shadow-sm font-medium" placeholder="Type here...">
                        </div>
                        <div>
                            <label class="block font-bold text-slate-700 text-sm mb-2 uppercase tracking-wide">2. My strengths are...</label>
                            <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-teal-500 outline-none text-sm shadow-sm font-medium" placeholder="Type here...">
                        </div>
                        <div>
                            <label class="block font-bold text-slate-700 text-sm mb-2 uppercase tracking-wide">3. My source of joy is...</label>
                            <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-teal-500 outline-none text-sm shadow-sm font-medium" placeholder="Type here...">
                        </div>
                        <div>
                            <label class="block font-bold text-slate-700 text-sm mb-2 uppercase tracking-wide">4. My friends really appreciate me as a...</label>
                            <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-teal-500 outline-none text-sm shadow-sm font-medium" placeholder="Type here...">
                        </div>
                        <div>
                            <label class="block font-bold text-slate-700 text-sm mb-2 uppercase tracking-wide">5. I can overcome all the challenges in life because...</label>
                            <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-teal-500 outline-none text-sm shadow-sm font-medium" placeholder="Type here...">
                        </div>
                        <div>
                            <label class="block font-bold text-slate-700 text-sm mb-2 uppercase tracking-wide">6. I will reach my dreams because...</label>
                            <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-teal-500 outline-none text-sm shadow-sm font-medium" placeholder="Type here...">
                        </div>
                    </div>
                </div>
HTML
        ]);

        // ---------------------------------------------------------
        // LESSON 7: What I Have Learned
        // ---------------------------------------------------------
        Lesson::create([
            'module_id' => $module->id,
            'title' => 'What I Have Learned',
            'duration_minutes' => 5,
            'content_body' => <<<HTML
                <div class="font-sans text-slate-600 antialiased space-y-8 max-w-4xl mx-auto">
                     <div class="flex items-center gap-3 mb-6">
                         <span class="bg-emerald-100 text-emerald-800 text-xs font-bold px-3 py-1 rounded-lg uppercase tracking-wider border border-emerald-200">Reflection</span>
                    </div>

                    <div class="bg-gradient-to-br from-emerald-50 to-teal-50 p-8 rounded-[2rem] border border-emerald-100 shadow-sm">
                        <p class="font-medium text-base leading-relaxed text-slate-800 mb-8">
                            Think of our current crisis (Covid-19 Pandemic) situation. Recall a moment where you have done something that you felt confident and your sense of self-worth is high.
                        </p>

                        <div class="space-y-6">
                            <div class="bg-white/80 p-6 rounded-2xl backdrop-blur-sm border border-emerald-100">
                                <label class="block text-emerald-900 font-bold mb-2 text-sm">1. What can you say to yourself in that situation?</label>
                                <textarea class="w-full bg-emerald-50/50 border border-emerald-200 rounded-xl p-4 focus:ring-1 focus:ring-emerald-500 outline-none text-slate-800 h-24 resize-none text-sm" placeholder="Type here..."></textarea>
                            </div>
                            <div class="bg-white/80 p-6 rounded-2xl backdrop-blur-sm border border-emerald-100">
                                <label class="block text-emerald-900 font-bold mb-2 text-sm">2. What have you done?</label>
                                <textarea class="w-full bg-emerald-50/50 border border-emerald-200 rounded-xl p-4 focus:ring-1 focus:ring-emerald-500 outline-none text-slate-800 h-24 resize-none text-sm" placeholder="Type here..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
HTML
        ]);

        // ---------------------------------------------------------
        // LESSON 8: Share Your Thoughts
        // ---------------------------------------------------------
        Lesson::create([
            'module_id' => $module->id,
            'title' => 'Share Your Thoughts and Feelings',
            'duration_minutes' => 5,
            'content_body' => <<<HTML
                <div class="font-sans text-slate-600 antialiased space-y-10 max-w-4xl mx-auto">
                    <p class="font-medium text-lg text-slate-700 bg-slate-50 p-6 rounded-[2rem] border border-slate-100 text-center">
                        Answer the following questions.
                    </p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm">
                            <div class="w-8 h-8 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center font-bold text-xs mb-4">Q1</div>
                            <label class="block font-bold text-slate-900 mb-3 text-sm">What positive statement would you say to yourself to be reminded of your strengths and values?</label>
                            <textarea class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-4 focus:ring-1 focus:ring-purple-500 outline-none text-slate-700 h-32 resize-none text-sm" placeholder="Type here..."></textarea>
                        </div>

                        <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm">
                            <div class="w-8 h-8 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center font-bold text-xs mb-4">Q2</div>
                            <label class="block font-bold text-slate-900 mb-3 text-sm">How will you deal with life obstacles or negative feelings?</label>
                            <textarea class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-4 focus:ring-1 focus:ring-purple-500 outline-none text-slate-700 h-32 resize-none text-sm" placeholder="Type here..."></textarea>
                        </div>

                        <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm">
                            <div class="w-8 h-8 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center font-bold text-xs mb-4">Q3</div>
                            <label class="block font-bold text-slate-900 mb-3 text-sm">What would you do to empower yourself?</label>
                            <textarea class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-4 focus:ring-1 focus:ring-purple-500 outline-none text-slate-700 h-32 resize-none text-sm" placeholder="Type here..."></textarea>
                        </div>

                        <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm">
                            <div class="w-8 h-8 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center font-bold text-xs mb-4">Q4</div>
                            <label class="block font-bold text-slate-900 mb-3 text-sm">What are your realizations as to your capability in handling and surviving the current health crisis right now?</label>
                            <textarea class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-4 focus:ring-1 focus:ring-purple-500 outline-none text-slate-700 h-32 resize-none text-sm" placeholder="Type here..."></textarea>
                        </div>
                    </div>

                    <div class="bg-slate-900 p-10 rounded-[2.5rem] text-center mt-12">
                        <p class="italic text-slate-300 text-lg font-serif">
                            "Remember, in life there are things that we cannot control. However, let us not be disheartened; we have the means on how to overcome it – you have that in you!"
                        </p>
                    </div>
                </div>
HTML
        ]);
    }
}
