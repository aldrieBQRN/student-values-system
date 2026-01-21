<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module;
use App\Models\Lesson;

class ModuleFourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Content Source: HG-G7 Module 6 RTP.docx
     * Design: World-Class UI, Fixed Vertical Line Alignment, 100% Content
     */
    public function run(): void
    {
        // 1. Create the Module
        $module = Module::firstOrCreate(
            ['title' => 'I am Strong'],
            [
                'description' => 'Identify personal strengths and weaknesses, learn ways to develop them, and achieve academic success.',
                'order_sequence' => 4,
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
                    <div class="bg-gradient-to-br from-indigo-50 to-blue-50 p-8 rounded-[2rem] border border-indigo-100 mb-10 shadow-sm relative overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="p-3 bg-white rounded-xl shadow-sm text-indigo-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                </div>
                                <h3 class="text-2xl md:text-3xl font-extrabold text-indigo-900 tracking-tight">Introduction</h3>
                            </div>
                            <div class="space-y-5 text-base leading-relaxed text-indigo-900/80">
                                <p>
                                    Every person is unique. As a learner, it is important that you become aware of yourself, about the things that you can do and about your limitations.
                                </p>
                                <p class="font-medium">
                                    Knowing your strengths and weaknesses will help you in learning new things, seeing opportunities, overcoming difficulties, forming good relationships and attaining success in life.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-[2rem] p-8 border border-slate-200 shadow-sm relative overflow-hidden">
                        <div class="flex flex-col md:flex-row md:items-center gap-5 mb-8 relative z-10">
                            <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center border border-teal-100 shadow-sm">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
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
                                <span class="text-base text-slate-700 font-medium leading-relaxed">Identify your personal strengths and weaknesses;</span>
                            </li>
                            <li class="flex items-start gap-4">
                                <div class="w-6 h-6 rounded-full bg-teal-100 text-teal-700 flex items-center justify-center mt-0.5 shrink-0">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <span class="text-base text-slate-700 font-medium leading-relaxed">Exhibit ways in developing strengths and overcoming weaknesses; and</span>
                            </li>
                            <li class="flex items-start gap-4">
                                <div class="w-6 h-6 rounded-full bg-teal-100 text-teal-700 flex items-center justify-center mt-0.5 shrink-0">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <span class="text-base text-slate-700 font-medium leading-relaxed">Recognize the importance of developing strengths and overcoming weaknesses in achieving academic success.</span>
                            </li>
                        </ul>
                    </div>
                </div>
HTML
        ]);

        // ---------------------------------------------------------
        // LESSON 2: Let's Try This
        // ---------------------------------------------------------
        Lesson::create([
            'module_id' => $module->id,
            'title' => 'Let’s Try This: Boxes of Strength',
            'duration_minutes' => 10,
            'content_body' => <<<HTML
                <div class="font-sans text-slate-600 antialiased space-y-10 max-w-5xl mx-auto">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-slate-100 pb-6">
                         <div>
                             <h3 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">Boxes of Strength</h3>
                             <p class="text-slate-500 text-sm mt-1">Identify the traits that best describe you</p>
                         </div>
                         <div class="flex items-center gap-2">
                            <span class="bg-indigo-50 text-indigo-700 text-xs font-bold px-3 py-1 rounded-lg uppercase tracking-wider border border-indigo-100">Activity</span>
                         </div>
                    </div>

                    <div class="bg-indigo-50 p-6 rounded-[1.5rem] border border-indigo-100 text-indigo-900 text-base leading-relaxed">
                        <p class="font-medium">
                            List down five (5) strengths that best describe you. Choose your answers from the phrases provided in the boxes below.
                        </p>
                    </div>

                    <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm">
                        <h4 class="font-bold text-slate-700 mb-4 text-sm uppercase tracking-wide">Choose from these strengths:</h4>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-3 text-xs md:text-sm text-slate-600">
                            <div class="p-3 bg-slate-50 rounded-lg border border-slate-100">I am honest</div>
                            <div class="p-3 bg-slate-50 rounded-lg border border-slate-100">I am trustworthy</div>
                            <div class="p-3 bg-slate-50 rounded-lg border border-slate-100">I am cooperative</div>
                            <div class="p-3 bg-slate-50 rounded-lg border border-slate-100">I am responsible</div>
                            <div class="p-3 bg-slate-50 rounded-lg border border-slate-100">I am helpful</div>
                            <div class="p-3 bg-slate-50 rounded-lg border border-slate-100">I am hardworking</div>
                            <div class="p-3 bg-slate-50 rounded-lg border border-slate-100">I am a good listener</div>
                            <div class="p-3 bg-slate-50 rounded-lg border border-slate-100">I wait for my turn</div>
                            <div class="p-3 bg-slate-50 rounded-lg border border-slate-100">I am sensitive to others</div>
                            <div class="p-3 bg-slate-50 rounded-lg border border-slate-100">I have a good sense of humor</div>
                            <div class="p-3 bg-slate-50 rounded-lg border border-slate-100">I can tell the truth</div>
                            <div class="p-3 bg-slate-50 rounded-lg border border-slate-100">I can apologize</div>
                            <div class="p-3 bg-slate-50 rounded-lg border border-slate-100">I like talking to people</div>
                            <div class="p-3 bg-slate-50 rounded-lg border border-slate-100">I use right words</div>
                            <div class="p-3 bg-slate-50 rounded-lg border border-slate-100">I learn new words</div>
                            <div class="p-3 bg-slate-50 rounded-lg border border-slate-100">I express my feelings</div>
                            <div class="p-3 bg-slate-50 rounded-lg border border-slate-100">I remember details</div>
                            <div class="p-3 bg-slate-50 rounded-lg border border-slate-100">I solve math problems</div>
                            <div class="p-3 bg-slate-50 rounded-lg border border-slate-100">I can stay focused</div>
                            <div class="p-3 bg-slate-50 rounded-lg border border-slate-100">I control my emotions</div>
                            <div class="p-3 bg-slate-50 rounded-lg border border-slate-100">I am creative</div>
                        </div>
                    </div>

                    <div class="bg-emerald-50 p-8 rounded-[2rem] border border-emerald-100">
                        <h4 class="font-bold text-emerald-900 text-lg mb-4">My Top 5 Strengths</h4>
                        <div class="space-y-3">
                            <input type="text" class="w-full bg-white border border-emerald-200 rounded-xl p-3 focus:ring-1 focus:ring-emerald-500 outline-none text-emerald-900 placeholder-emerald-300" placeholder="1.">
                            <input type="text" class="w-full bg-white border border-emerald-200 rounded-xl p-3 focus:ring-1 focus:ring-emerald-500 outline-none text-emerald-900 placeholder-emerald-300" placeholder="2.">
                            <input type="text" class="w-full bg-white border border-emerald-200 rounded-xl p-3 focus:ring-1 focus:ring-emerald-500 outline-none text-emerald-900 placeholder-emerald-300" placeholder="3.">
                            <input type="text" class="w-full bg-white border border-emerald-200 rounded-xl p-3 focus:ring-1 focus:ring-emerald-500 outline-none text-emerald-900 placeholder-emerald-300" placeholder="4.">
                            <input type="text" class="w-full bg-white border border-emerald-200 rounded-xl p-3 focus:ring-1 focus:ring-emerald-500 outline-none text-emerald-900 placeholder-emerald-300" placeholder="5.">
                        </div>
                    </div>

                    <div class="bg-slate-50 p-8 rounded-[2rem] border border-slate-200">
                        <h4 class="font-bold text-slate-800 text-lg mb-6">Processing Questions:</h4>
                        <div class="space-y-6">
                            <div>
                                <label class="block font-bold text-slate-700 mb-2 text-sm">1. What do you notice with your answers?</label>
                                <textarea class="w-full bg-white border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-indigo-500 outline-none h-20 resize-none text-sm" placeholder="Type here..."></textarea>
                            </div>
                            <div>
                                <label class="block font-bold text-slate-700 mb-2 text-sm">2. How do you feel about your responses?</label>
                                <textarea class="w-full bg-white border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-indigo-500 outline-none h-20 resize-none text-sm" placeholder="Type here..."></textarea>
                            </div>
                            <div>
                                <label class="block font-bold text-slate-700 mb-2 text-sm">3. Why is it important to recognize your strengths and weaknesses?</label>
                                <textarea class="w-full bg-white border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-indigo-500 outline-none h-20 resize-none text-sm" placeholder="Type here..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
HTML
        ]);

        // ---------------------------------------------------------
        // LESSON 3: Let's Explore This
        // ---------------------------------------------------------
        Lesson::create([
            'module_id' => $module->id,
            'title' => 'Let’s Explore This: Improve and Overcome',
            'duration_minutes' => 10,
            'content_body' => <<<HTML
                <div class="font-sans text-slate-600 antialiased space-y-10 max-w-5xl mx-auto">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-slate-100 pb-6">
                         <div>
                             <h3 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">Improve and Overcome</h3>
                             <p class="text-slate-500 text-sm mt-1">Enhancing your capabilities</p>
                         </div>
                         <div class="flex items-center gap-2">
                            <span class="bg-indigo-50 text-indigo-700 text-xs font-bold px-3 py-1 rounded-lg uppercase tracking-wider border border-indigo-100">Worksheet</span>
                         </div>
                    </div>

                    <p class="text-base leading-relaxed text-slate-700 bg-slate-50 p-6 rounded-2xl border border-slate-100">
                        List down <strong>five strengths</strong> that you think you need to have. Choose from the "Boxes of Strength" in the previous activity. Then, explain why you want to enhance it and how you will do it.
                    </p>

                    <div class="space-y-6">
                        <div class="bg-slate-50 p-6 rounded-[2rem] border border-slate-200">
                            <div class="flex items-center gap-2 mb-4">
                                <span class="bg-slate-200 text-slate-600 text-xs font-bold px-2 py-1 rounded">Example</span>
                            </div>
                            <div class="grid md:grid-cols-3 gap-4 text-sm">
                                <div>
                                    <span class="block text-xs font-bold text-slate-400 mb-1">Strength to Develop</span>
                                    <p class="font-medium text-slate-800">I like to learn new words or terminologies.</p>
                                </div>
                                <div>
                                    <span class="block text-xs font-bold text-slate-400 mb-1">Why?</span>
                                    <p class="text-slate-600">I am having difficulty understanding lessons because I am not familiar with the words.</p>
                                </div>
                                <div>
                                    <span class="block text-xs font-bold text-slate-400 mb-1">How?</span>
                                    <p class="text-slate-600">Set specific reading time; use a dictionary; ask for help.</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-200">
                            <h4 class="font-bold text-slate-800 mb-4">Your Action Plan</h4>
                            <div class="space-y-6">
                                <div class="grid md:grid-cols-3 gap-4">
                                    <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Strength 1 to Develop">
                                    <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Why?">
                                    <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="How will I do it?">
                                </div>
                                <div class="grid md:grid-cols-3 gap-4">
                                    <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Strength 2 to Develop">
                                    <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Why?">
                                    <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="How will I do it?">
                                </div>
                                <div class="grid md:grid-cols-3 gap-4">
                                    <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Strength 3 to Develop">
                                    <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Why?">
                                    <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="How will I do it?">
                                </div>
                                <div class="grid md:grid-cols-3 gap-4">
                                    <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Strength 4 to Develop">
                                    <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Why?">
                                    <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="How will I do it?">
                                </div>
                                <div class="grid md:grid-cols-3 gap-4">
                                    <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Strength 5 to Develop">
                                    <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Why?">
                                    <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="How will I do it?">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-indigo-50 p-8 rounded-[2rem] border border-indigo-100 mt-10">
                        <h4 class="font-bold text-indigo-900 text-lg mb-6">Processing Questions:</h4>
                        <div class="space-y-6">
                            <div>
                                <label class="block font-bold text-indigo-900/80 mb-2 text-sm">1. Do you think this exercise can help you in understanding yourself better?</label>
                                <textarea class="w-full bg-white border border-indigo-200 rounded-xl p-4 focus:ring-1 focus:ring-indigo-500 outline-none text-slate-700 h-20 resize-none text-sm" placeholder="Type here..."></textarea>
                            </div>
                            <div>
                                <label class="block font-bold text-indigo-900/80 mb-2 text-sm">2. How can this help you in achieving academic success?</label>
                                <textarea class="w-full bg-white border border-indigo-200 rounded-xl p-4 focus:ring-1 focus:ring-indigo-500 outline-none text-slate-700 h-20 resize-none text-sm" placeholder="Type here..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
HTML
        ]);

        // ---------------------------------------------------------
        // LESSON 4: Keep in Mind
        // ---------------------------------------------------------
        Lesson::create([
            'module_id' => $module->id,
            'title' => 'Keep in Mind: S.T.R.E.N.G.T.H',
            'duration_minutes' => 15,
            'content_body' => <<<HTML
                <div class="font-sans text-slate-600 antialiased space-y-12 max-w-5xl mx-auto">
                    <div class="text-center max-w-3xl mx-auto">
                        <span class="bg-teal-50 text-teal-700 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-widest border border-teal-100">Key Concept</span>
                        <h3 class="text-2xl md:text-3xl font-extrabold text-slate-900 mt-4 mb-4">Know Yourself Better</h3>
                        <p class="text-base text-slate-500 leading-relaxed">
                            Part of your development as an adolescent is to know yourself better. Knowing what you are capable of helps develop your identity and self-confidence. Appreciating your strengths and overcoming your weaknesses is key to achieving success.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm hover:border-teal-200 transition-all">
                            <h4 class="text-teal-600 font-extrabold text-lg mb-2">S - Social Skills</h4>
                            <p class="text-sm text-slate-600">Example: talking with people, getting along with groups.</p>
                        </div>
                        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm hover:border-indigo-200 transition-all">
                            <h4 class="text-indigo-600 font-extrabold text-lg mb-2">T - Talents</h4>
                            <p class="text-sm text-slate-600">Example: acting, baking, guitar playing, organizing events, dancing.</p>
                        </div>
                        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm hover:border-rose-200 transition-all">
                            <h4 class="text-rose-600 font-extrabold text-lg mb-2">R - Resilience</h4>
                            <p class="text-sm text-slate-600">Ability to recover quickly from difficult situations.</p>
                        </div>
                        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm hover:border-amber-200 transition-all">
                            <h4 class="text-amber-600 font-extrabold text-lg mb-2">E - Emotional Skills</h4>
                            <p class="text-sm text-slate-600">Example: being a good listener, sensitivity to others, apologizing, handling emotions.</p>
                        </div>
                        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm hover:border-emerald-200 transition-all">
                            <h4 class="text-emerald-600 font-extrabold text-lg mb-2">N - Numerical & Logical Skills</h4>
                            <p class="text-sm text-slate-600">Example: understanding patterns, mental math, solving puzzles.</p>
                        </div>
                        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm hover:border-blue-200 transition-all">
                            <h4 class="text-blue-600 font-extrabold text-lg mb-2">G - Growth Mindset</h4>
                            <p class="text-sm text-slate-600">Perseverance in times of difficulty; strong desire to learn and develop abilities.</p>
                        </div>
                        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm hover:border-purple-200 transition-all">
                            <h4 class="text-purple-600 font-extrabold text-lg mb-2">T - Truthfulness</h4>
                            <p class="text-sm text-slate-600">Accuracy in description of self and others, meeting commitments and promises made.</p>
                        </div>
                        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm hover:border-pink-200 transition-all">
                            <h4 class="text-pink-600 font-extrabold text-lg mb-2">H - Health</h4>
                            <p class="text-sm text-slate-600">Your physical and mental health influence your thoughts, feelings, and behavior.</p>
                        </div>
                    </div>
                </div>
HTML
        ]);

        // ---------------------------------------------------------
        // LESSON 5: You Can Do It
        // ---------------------------------------------------------
        Lesson::create([
            'module_id' => $module->id,
            'title' => 'You Can Do It: My Way to Overcome',
            'duration_minutes' => 10,
            'content_body' => <<<HTML
                <div class="font-sans text-slate-600 antialiased space-y-8 max-w-4xl mx-auto">
                    <div class="bg-gradient-to-r from-teal-50 to-emerald-50 p-8 rounded-[2rem] border border-teal-100 text-center">
                        <h3 class="text-2xl font-bold text-teal-900 mb-2">Visualize Success</h3>
                        <p class="text-teal-800/80 text-sm">Describe a situation where you are overcoming a weakness.</p>
                    </div>

                    <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm">
                        <p class="text-sm text-slate-500 mb-4 italic">Example: Trying to learn how to cook, trying to ride a bike, or reading a difficult book.</p>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Your Description</label>
                        <textarea class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-6 focus:ring-1 focus:ring-teal-500 outline-none text-slate-700 h-48 resize-none text-base leading-relaxed" placeholder="Describe what you are doing to overcome your weakness..."></textarea>
                    </div>
                </div>
HTML
        ]);

        // ---------------------------------------------------------
        // LESSON 6: What I Have Learned
        // ---------------------------------------------------------
        Lesson::create([
            'module_id' => $module->id,
            'title' => 'What I Have Learned: My Steps to Academic Success',
            'duration_minutes' => 10,
            'content_body' => <<<HTML
                <div class="font-sans text-slate-600 antialiased space-y-10 max-w-4xl mx-auto">
                    <div class="bg-blue-50 p-8 rounded-[2rem] border border-blue-100 text-center">
                        <h3 class="text-2xl font-bold text-blue-900 mb-2">Steps to Academic Success</h3>
                        <p class="text-blue-800/80 text-sm">Why do I have to overcome my weaknesses? Create a plan on how you are going to achieve academic success.</p>
                    </div>

                    <div class="relative">
                        <div class="absolute left-12 top-12 bottom-12 w-0.5 bg-slate-200 hidden md:block"></div>

                        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm relative md:ml-24 mb-6">
                            <div class="hidden md:flex absolute -left-24 top-1/2 -translate-y-1/2 w-24 justify-center items-center">
                                <div class="w-10 h-10 bg-blue-500 text-white rounded-full flex items-center justify-center font-bold shadow-lg z-10 border-4 border-white">1</div>
                            </div>
                            <label class="block font-bold text-slate-800 text-sm mb-3">Step 1: What makes achieving academic success difficult for you?</label>
                            <textarea class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-blue-500 outline-none text-slate-700 h-24 resize-none text-sm" placeholder="Type here..."></textarea>
                        </div>

                        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm relative md:ml-24 mb-6">
                            <div class="hidden md:flex absolute -left-24 top-1/2 -translate-y-1/2 w-24 justify-center items-center">
                                <div class="w-10 h-10 bg-blue-500 text-white rounded-full flex items-center justify-center font-bold shadow-lg z-10 border-4 border-white">2</div>
                            </div>
                            <label class="block font-bold text-slate-800 text-sm mb-3">Step 2: What do you need to do first to overcome it?</label>
                            <textarea class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-blue-500 outline-none text-slate-700 h-24 resize-none text-sm" placeholder="Type here..."></textarea>
                        </div>

                        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm relative md:ml-24 mb-6">
                            <div class="hidden md:flex absolute -left-24 top-1/2 -translate-y-1/2 w-24 justify-center items-center">
                                <div class="w-10 h-10 bg-blue-500 text-white rounded-full flex items-center justify-center font-bold shadow-lg z-10 border-4 border-white">3</div>
                            </div>
                            <label class="block font-bold text-slate-800 text-sm mb-3">Step 3: What do you need to do last?</label>
                            <textarea class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-blue-500 outline-none text-slate-700 h-24 resize-none text-sm" placeholder="Type here..."></textarea>
                        </div>

                        <div class="bg-amber-50 p-8 rounded-[2rem] border border-amber-200 shadow-md relative md:ml-24 border-2 border-dashed">
                            <div class="hidden md:flex absolute -left-24 top-1/2 -translate-y-1/2 w-24 justify-center items-center">
                                <div class="w-12 h-12 bg-amber-400 text-white rounded-full flex items-center justify-center font-bold shadow-lg z-10 border-4 border-white text-xl">★</div>
                            </div>
                            <label class="block font-extrabold text-amber-900 text-lg mb-3 text-center uppercase tracking-widest">What do you plan to achieve?</label>
                            <textarea class="w-full bg-white border border-amber-200 rounded-xl p-4 focus:ring-1 focus:ring-amber-500 outline-none text-slate-700 h-32 resize-none text-sm placeholder-amber-300 font-medium text-center" placeholder="Write your goal here..."></textarea>
                        </div>
                    </div>
                </div>
HTML
        ]);

        // ---------------------------------------------------------
        // LESSON 7: Share Your Thoughts
        // ---------------------------------------------------------
        Lesson::create([
            'module_id' => $module->id,
            'title' => 'Share Your Thoughts: 3-2-1 Reflection',
            'duration_minutes' => 5,
            'content_body' => <<<HTML
                <div class="font-sans text-slate-600 antialiased space-y-12 max-w-4xl mx-auto">
                    <div class="text-center">
                        <h3 class="text-2xl md:text-3xl font-extrabold text-slate-900 mb-2">Reflection</h3>
                        <p class="text-slate-500 text-sm">Look back at what you have learned.</p>
                    </div>

                    <div class="space-y-8">
                        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm">
                            <h4 class="font-bold text-slate-800 mb-4 flex items-center gap-2">
                                <span class="bg-indigo-100 text-indigo-700 w-8 h-8 flex items-center justify-center rounded-full text-sm font-bold">3</span>
                                Important things I learned from this lesson
                            </h4>
                            <div class="space-y-3">
                                <input type="text" class="w-full bg-slate-50 border-none rounded-xl p-3 focus:ring-1 focus:ring-indigo-500" placeholder="1.">
                                <input type="text" class="w-full bg-slate-50 border-none rounded-xl p-3 focus:ring-1 focus:ring-indigo-500" placeholder="2.">
                                <input type="text" class="w-full bg-slate-50 border-none rounded-xl p-3 focus:ring-1 focus:ring-indigo-500" placeholder="3.">
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm">
                            <h4 class="font-bold text-slate-800 mb-4 flex items-center gap-2">
                                <span class="bg-rose-100 text-rose-700 w-8 h-8 flex items-center justify-center rounded-full text-sm font-bold">2</span>
                                Things I want to learn more
                            </h4>
                            <div class="space-y-3">
                                <input type="text" class="w-full bg-slate-50 border-none rounded-xl p-3 focus:ring-1 focus:ring-rose-500" placeholder="1.">
                                <input type="text" class="w-full bg-slate-50 border-none rounded-xl p-3 focus:ring-1 focus:ring-rose-500" placeholder="2.">
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm">
                            <h4 class="font-bold text-slate-800 mb-4 flex items-center gap-2">
                                <span class="bg-emerald-100 text-emerald-700 w-8 h-8 flex items-center justify-center rounded-full text-sm font-bold">1</span>
                                How do I feel about this lesson?
                            </h4>
                            <textarea class="w-full bg-slate-50 border-none rounded-xl p-4 h-24 resize-none focus:ring-1 focus:ring-emerald-500" placeholder="Express your feelings..."></textarea>
                        </div>
                    </div>
                </div>
HTML
        ]);
    }
}
