<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module;
use App\Models\Lesson;

class ModuleThreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Content Source: HG G6 Q1 Mod1 RTP (3).docx
     * Design: World-Class UI, Clean Text (No Citations), 100% Accurate Content
     */
    public function run(): void
    {
        // 1. Create the Module
        $module = Module::firstOrCreate(
            ['title' => 'Embracing the Best in Me'],
            [
                'description' => 'Identify your likes, talents, and interests, understand self-awareness, and learn to demonstrate appropriate behavior in various situations.',
                'order_sequence' => 3,
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
                    <div class="bg-gradient-to-br from-orange-50 to-amber-50 p-8 rounded-[2rem] border border-orange-100 mb-10 shadow-sm relative overflow-hidden">
                        <div class="relative z-10">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="p-3 bg-white rounded-xl shadow-sm text-orange-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <h3 class="text-2xl md:text-3xl font-extrabold text-orange-900 tracking-tight">Welcome to Module 3!</h3>
                            </div>
                            <div class="space-y-5 text-base leading-relaxed text-orange-900/80">
                                <p>
                                    This module will engage you in a meaningful learning experience as you journey to better understand yourself. You will discover changes as part of your development and realize your strengths and weaknesses, your interests, talents, abilities, skills, and values.
                                </p>
                                <p class="font-bold text-orange-800">
                                    This will guide you as you discover and embrace the best in you!
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-[2rem] p-8 border border-slate-200 shadow-sm relative overflow-hidden">
                        <div class="flex flex-col md:flex-row md:items-center gap-5 mb-8 relative z-10">
                            <div class="w-12 h-12 rounded-xl bg-orange-50 text-orange-600 flex items-center justify-center border border-orange-100 shadow-sm">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-xl text-slate-800">Learning Objectives</h4>
                                <p class="text-slate-500 text-sm">At the end of this module, you are expected to:</p>
                            </div>
                        </div>

                        <ul class="space-y-4 relative z-10">
                            <li class="flex items-start gap-4">
                                <div class="w-6 h-6 rounded-full bg-orange-100 text-orange-700 flex items-center justify-center mt-0.5 shrink-0">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <span class="text-base text-slate-700 font-medium leading-relaxed">Enumerate your personal interests, abilities, skills, values, strengths and weaknesses as part of your development;</span>
                            </li>
                            <li class="flex items-start gap-4">
                                <div class="w-6 h-6 rounded-full bg-orange-100 text-orange-700 flex items-center justify-center mt-0.5 shrink-0">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <span class="text-base text-slate-700 font-medium leading-relaxed">Explain the importance of self-awareness in achieving self understanding and acceptance;</span>
                            </li>
                            <li class="flex items-start gap-4">
                                <div class="w-6 h-6 rounded-full bg-orange-100 text-orange-700 flex items-center justify-center mt-0.5 shrink-0">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <span class="text-base text-slate-700 font-medium leading-relaxed">Examine appropriate and inappropriate behaviors observed in different situations; and</span>
                            </li>
                            <li class="flex items-start gap-4">
                                <div class="w-6 h-6 rounded-full bg-orange-100 text-orange-700 flex items-center justify-center mt-0.5 shrink-0">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <span class="text-base text-slate-700 font-medium leading-relaxed">Appreciate changes by showing appropriate behavior in different situations.</span>
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
            'title' => 'Let’s Try This: This Is Me',
            'duration_minutes' => 20,
            'content_body' => <<<HTML
                <div class="font-sans text-slate-600 antialiased space-y-10 max-w-5xl mx-auto">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-slate-100 pb-6">
                         <div>
                             <h3 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">This Is Me</h3>
                             <p class="text-slate-500 text-sm mt-1">Identify your strengths and weaknesses</p>
                         </div>
                         <div class="flex items-center gap-2">
                            <span class="bg-teal-50 text-teal-700 text-xs font-bold px-3 py-1 rounded-lg uppercase tracking-wider border border-teal-100">Activity</span>
                         </div>
                    </div>

                    <div class="bg-teal-50 p-6 rounded-[1.5rem] border border-teal-100 text-teal-900 text-base leading-relaxed">
                        <p class="font-medium">
                            Write your strengths in Box 1, weaknesses in Box 2, and your skills, interest, talents, abilities and values in Box 3.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-200">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold">1</div>
                                <h4 class="font-bold text-slate-800">Strengths</h4>
                            </div>
                            <p class="text-xs text-slate-400 mb-3 italic">Example: I can express my thoughts clearly in writing.</p>
                            <textarea class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-emerald-500 outline-none text-slate-700 h-40 resize-none text-sm" placeholder="List your strengths..."></textarea>
                        </div>

                        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-200">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center font-bold">2</div>
                                <h4 class="font-bold text-slate-800">Weaknesses</h4>
                            </div>
                            <p class="text-xs text-slate-400 mb-3 italic">Example: I don’t feel confident speaking in front of many people.</p>
                            <textarea class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-rose-500 outline-none text-slate-700 h-40 resize-none text-sm" placeholder="List your weaknesses..."></textarea>
                        </div>

                        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-200">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center font-bold">3</div>
                                <h4 class="font-bold text-slate-800">Skills & Talents</h4>
                            </div>
                            <p class="text-xs text-slate-400 mb-3 italic">Example: I love to draw and play musical instruments.</p>
                            <textarea class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-indigo-500 outline-none text-slate-700 h-40 resize-none text-sm" placeholder="List your skills, talents, interests..."></textarea>
                        </div>
                    </div>

                    <div class="bg-amber-50 p-8 rounded-[2rem] border border-amber-100 mt-10">
                        <h4 class="font-bold text-amber-900 text-lg mb-6">Processing Questions:</h4>
                        <div class="space-y-6">
                            <div>
                                <label class="block font-bold text-amber-900/80 mb-2 text-sm">1. What are your thoughts and feelings while doing the activity?</label>
                                <textarea class="w-full bg-white border border-amber-200 rounded-xl p-4 focus:ring-1 focus:ring-amber-500 focus:border-amber-500 outline-none text-slate-700 h-24 resize-none text-sm" placeholder="Type here..."></textarea>
                            </div>
                            <div>
                                <label class="block font-bold text-amber-900/80 mb-2 text-sm">2. What are your strengths and weaknesses that you discovered recently?</label>
                                <textarea class="w-full bg-white border border-amber-200 rounded-xl p-4 focus:ring-1 focus:ring-amber-500 focus:border-amber-500 outline-none text-slate-700 h-24 resize-none text-sm" placeholder="Type here..."></textarea>
                            </div>
                            <div>
                                <label class="block font-bold text-amber-900/80 mb-2 text-sm">3. How did your skills, interests, talents, abilities and values help you in discovering your strengths and weaknesses?</label>
                                <textarea class="w-full bg-white border border-amber-200 rounded-xl p-4 focus:ring-1 focus:ring-amber-500 focus:border-amber-500 outline-none text-slate-700 h-24 resize-none text-sm" placeholder="Type here..."></textarea>
                            </div>
                            <div>
                                <label class="block font-bold text-amber-900/80 mb-2 text-sm">4. How does this pandemic affect your thoughts and feelings about yourself?</label>
                                <textarea class="w-full bg-white border border-amber-200 rounded-xl p-4 focus:ring-1 focus:ring-amber-500 focus:border-amber-500 outline-none text-slate-700 h-24 resize-none text-sm" placeholder="Type here..."></textarea>
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
            'title' => 'Let’s Explore This: Pathways to Self Discovery',
            'duration_minutes' => 30,
            'content_body' => <<<HTML
                <div class="font-sans text-slate-600 antialiased space-y-10 max-w-5xl mx-auto">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-slate-100 pb-6">
                         <div>
                             <h3 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">Pathways to Self Discovery</h3>
                             <p class="text-slate-500 text-sm mt-1">Understanding appropriate behaviors</p>
                         </div>
                         <div class="flex items-center gap-2">
                            <span class="bg-indigo-50 text-indigo-700 text-xs font-bold px-3 py-1.5 rounded-lg uppercase tracking-wider border border-indigo-100">Worksheet</span>
                         </div>
                    </div>

                    <p class="text-base leading-relaxed text-slate-700 bg-slate-50 p-6 rounded-2xl border border-slate-100">
                        In this activity, you will have a deeper understanding about yourself by examining your thoughts, feelings and beliefs.
                        This will help you in understanding appropriate and inappropriate behaviors in a given situation.
                        <br><br>
                        <strong>Instructions:</strong> Fill in your responses for each situation. Remember that there is no right or wrong answer.
                    </p>

                    <div class="bg-slate-50 p-6 rounded-[2rem] border border-slate-200 mb-6">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="bg-slate-200 text-slate-600 text-xs font-bold px-2 py-1 rounded">Example</span>
                            <h4 class="font-bold text-slate-800">1. Submission of Homework beyond deadline</h4>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 text-sm">
                            <div class="bg-white p-4 rounded-xl border border-slate-200">
                                <span class="block text-xs font-bold text-slate-400 mb-1">Thoughts</span>
                                <p>"It’s okay, at least I submitted"</p>
                            </div>
                            <div class="bg-white p-4 rounded-xl border border-slate-200">
                                <span class="block text-xs font-bold text-slate-400 mb-1">Feelings</span>
                                <p>I feel nervous because my teacher might not accept my homework</p>
                            </div>
                            <div class="bg-white p-4 rounded-xl border border-slate-200">
                                <span class="block text-xs font-bold text-slate-400 mb-1">Beliefs</span>
                                <p>Submission beyond deadline is better than none</p>
                            </div>
                            <div class="bg-white p-4 rounded-xl border border-slate-200">
                                <span class="block text-xs font-bold text-slate-400 mb-1">Behavior</span>
                                <p class="text-rose-600 font-bold">Inappropriate</p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-8">
                        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-200">
                            <h4 class="font-bold text-slate-800 mb-4">2. Playing mobile/online games during class hours</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Thoughts (What do you think?)">
                                <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Feelings (How do you feel?)">
                                <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Beliefs (Personal beliefs?)">
                                <select class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500">
                                    <option value="" disabled selected>Behavior (Appropriate/Inappropriate?)</option>
                                    <option>Appropriate</option>
                                    <option>Inappropriate</option>
                                </select>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-200">
                            <h4 class="font-bold text-slate-800 mb-4">3. Reading other materials related to the lessons</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Thoughts">
                                <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Feelings">
                                <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Beliefs">
                                <select class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500"><option disabled selected>Behavior</option><option>Appropriate</option><option>Inappropriate</option></select>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-200">
                            <h4 class="font-bold text-slate-800 mb-4">4. Telling the truth even if there will be consequences</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Thoughts">
                                <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Feelings">
                                <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Beliefs">
                                <select class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500"><option disabled selected>Behavior</option><option>Appropriate</option><option>Inappropriate</option></select>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-200">
                            <h4 class="font-bold text-slate-800 mb-4">5. Talking to complete strangers and sharing personal information</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Thoughts">
                                <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Feelings">
                                <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Beliefs">
                                <select class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500"><option disabled selected>Behavior</option><option>Appropriate</option><option>Inappropriate</option></select>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-200">
                            <h4 class="font-bold text-slate-800 mb-4">6. Engaging in activities that may cause harm</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Thoughts">
                                <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Feelings">
                                <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Beliefs">
                                <select class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500"><option disabled selected>Behavior</option><option>Appropriate</option><option>Inappropriate</option></select>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-200">
                            <h4 class="font-bold text-slate-800 mb-4">7. Helping younger siblings in doing household chores</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Thoughts">
                                <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Feelings">
                                <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Beliefs">
                                <select class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500"><option disabled selected>Behavior</option><option>Appropriate</option><option>Inappropriate</option></select>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-200">
                            <h4 class="font-bold text-slate-800 mb-4">8. Participating in activities that will help me in discovering new skills and abilities</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Thoughts">
                                <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Feelings">
                                <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Beliefs">
                                <select class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500"><option disabled selected>Behavior</option><option>Appropriate</option><option>Inappropriate</option></select>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-200">
                            <h4 class="font-bold text-slate-800 mb-4">9. Reporting to authorities about bullying incidents</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Thoughts">
                                <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Feelings">
                                <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Beliefs">
                                <select class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500"><option disabled selected>Behavior</option><option>Appropriate</option><option>Inappropriate</option></select>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-200">
                            <h4 class="font-bold text-slate-800 mb-4">10. Communicating with family members about personal experiences</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Thoughts">
                                <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Feelings">
                                <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500" placeholder="Beliefs">
                                <select class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:ring-1 focus:ring-indigo-500"><option disabled selected>Behavior</option><option>Appropriate</option><option>Inappropriate</option></select>
                            </div>
                        </div>
                    </div>

                    <div class="bg-indigo-50 p-8 rounded-[2rem] border border-indigo-100 mt-10">
                        <h4 class="font-bold text-indigo-900 text-lg mb-6">Processing Questions:</h4>
                        <div class="space-y-6">
                            <div>
                                <label class="block font-bold text-indigo-900/80 mb-2 text-sm">1. How can your thoughts, feelings and beliefs help you in determining if the behavior in a certain situation is appropriate or inappropriate?</label>
                                <textarea class="w-full bg-white border border-indigo-200 rounded-xl p-4 focus:ring-1 focus:ring-indigo-500 outline-none text-slate-700 h-24 resize-none text-sm" placeholder="Type here..."></textarea>
                            </div>
                            <div>
                                <label class="block font-bold text-indigo-900/80 mb-2 text-sm">2. What have you discovered about yourself after doing this activity?</label>
                                <textarea class="w-full bg-white border border-indigo-200 rounded-xl p-4 focus:ring-1 focus:ring-indigo-500 outline-none text-slate-700 h-24 resize-none text-sm" placeholder="Type here..."></textarea>
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
            'title' => 'Keep in Mind: B.E.S.T.',
            'duration_minutes' => 10,
            'content_body' => <<<HTML
                <div class="font-sans text-slate-600 antialiased space-y-12 max-w-5xl mx-auto">
                    <div class="text-center max-w-3xl mx-auto">
                        <span class="bg-indigo-50 text-indigo-700 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-widest border border-indigo-100">Key Concept</span>
                        <h3 class="text-2xl md:text-3xl font-extrabold text-slate-900 mt-4 mb-4">Developing Your Best Version</h3>
                        <p class="text-base text-slate-500 leading-relaxed">
                            Like other children your age, you may have many questions about the changes that happen to you. This is normal because you are now in the adolescence stage and this may be challenging and confusing. During this stage of development, you will experience physical, emotional and psychological changes. These may have effects on your personal interests, abilities, skills and values as well.
                        </p>
                        <p class="text-base text-slate-500 leading-relaxed mt-4 font-medium">
                            As you continue in developing your best version, remember B.E.S.T:
                        </p>
                    </div>

                    <div class="space-y-8">
                        <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm flex flex-col md:flex-row gap-6 hover:shadow-md transition-all">
                            <div class="w-16 h-16 rounded-2xl bg-teal-50 text-teal-600 flex items-center justify-center text-3xl font-extrabold shrink-0 border border-teal-100">B</div>
                            <div class="flex-1">
                                <h4 class="font-bold text-slate-900 text-xl mb-3 flex items-center gap-2">
                                    Be true to yourself & Be responsible for your actions
                                </h4>
                                <p class="text-sm text-slate-600 leading-relaxed mb-4">
                                    Can you still recall your answers in the activity “This is Me!”? Who is the person being referred to with these activities? Yes, it’s You! You possess these strengths, skills, talents and values that led you to where you are right now and you should be proud of yourself. You need to be aware that you are capable of doing great things.
                                </p>

                                <div class="bg-teal-50/50 p-5 rounded-xl border border-teal-100 mb-4">
                                    <h5 class="text-xs font-bold text-teal-700 uppercase tracking-wider mb-2">Handling Challenges</h5>
                                    <p class="text-xs text-slate-600 leading-relaxed">
                                        During this process of development, however, there are challenges that may affect you. This is normal and being aware of your personal weakness is being true to yourself. You cannot pretend to be somebody else, because if you will do that, you will surely burden yourself and this may cause you problems. Your weaknesses may stem from a bad decision or a negative experience. Just take it easy. Learn from the experience and do not repeat the same mistakes. Accept it for that is who you are, and next time, remember to choose the right decision.
                                    </p>
                                </div>

                                <div class="bg-white border border-slate-200 p-5 rounded-xl">
                                    <h5 class="text-xs font-bold text-slate-700 uppercase tracking-wider mb-3">This IS You:</h5>
                                    <ul class="space-y-2 list-none text-sm text-slate-600">
                                        <li class="flex items-start gap-2"><span class="text-teal-500 font-bold">✓</span> I can plan for my future even if I am still young.</li>
                                        <li class="flex items-start gap-2"><span class="text-teal-500 font-bold">✓</span> I can accomplish the task entrusted to me such as doing my assignments, doing my chores or being helpful to others.</li>
                                        <li class="flex items-start gap-2"><span class="text-teal-500 font-bold">✓</span> I know how to follow house and school rules.</li>
                                        <li class="flex items-start gap-2"><span class="text-teal-500 font-bold">✓</span> I do not say bad words, I am respectful and I don’t hurt my siblings or others.</li>
                                        <li class="flex items-start gap-2"><span class="text-teal-500 font-bold">✓</span> I am aware of my weaknesses and I can change to be the best.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm flex flex-col md:flex-row gap-6 hover:shadow-md transition-all">
                            <div class="w-16 h-16 rounded-2xl bg-rose-50 text-rose-600 flex items-center justify-center text-3xl font-extrabold shrink-0 border border-rose-100">E</div>
                            <div class="flex-1">
                                <h4 class="font-bold text-slate-900 text-xl mb-3">Exemplify positive behavior & Establish healthy relationships</h4>
                                <p class="text-sm text-slate-600 leading-relaxed mb-4">
                                    Are you aware now of who you are and the many good things that you can do? Good! Keep on doing it and nurture it. It is a must that you strive to be the best version that you can be by showing positive actions and behaviors.
                                </p>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="bg-rose-50 p-4 rounded-xl border border-rose-100">
                                        <span class="block text-xs font-bold text-rose-700 uppercase mb-2">Before</span>
                                        <ul class="space-y-2 text-xs text-rose-900/80">
                                            <li>• Used to have tantrums or easily get hurt.</li>
                                            <li>• Took a lot of things for granted.</li>
                                            <li>• Friendship was only about playtime.</li>
                                            <li>• Took parents/friends for granted.</li>
                                        </ul>
                                    </div>
                                    <div class="bg-emerald-50 p-4 rounded-xl border border-emerald-100">
                                        <span class="block text-xs font-bold text-emerald-700 uppercase mb-2">Now</span>
                                        <ul class="space-y-2 text-xs text-emerald-900/80">
                                            <li>• Cannot be like that; you have capacity to understand.</li>
                                            <li>• Everything has its meaning and importance.</li>
                                            <li>• Be a true friend; aware and helpful to needs.</li>
                                            <li>• They are important to you.</li>
                                        </ul>
                                    </div>
                                </div>
                                <p class="mt-4 text-sm font-bold text-slate-700 text-center">Build healthy relationships with them with care and respect.</p>
                            </div>
                        </div>

                        <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm flex flex-col md:flex-row gap-6 hover:shadow-md transition-all">
                            <div class="w-16 h-16 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-3xl font-extrabold shrink-0 border border-amber-100">S</div>
                            <div class="flex-1">
                                <h4 class="font-bold text-slate-900 text-xl mb-3">Share your talents and skills & Set your personal goals</h4>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="space-y-3">
                                        <span class="flex items-center gap-2 text-xs font-bold text-amber-600 uppercase tracking-wider"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg> Setting Goals</span>
                                        <p class="text-xs text-slate-600 leading-relaxed">
                                            You might say that you are still young and should not be bothered about life or goals. You know what? As young as you are, you can already set what you would like in the years to come. You need to set your personal goals even if it is on a short-term basis.
                                        </p>
                                        <div class="bg-amber-50 p-3 rounded-lg border border-amber-100 italic text-xs text-amber-800">
                                            “Should I go back to sleep or finish my school project?”<br>
                                            “Must I follow what my mother told me about taking care of my siblings or to keep on playing video/online games?”
                                        </div>
                                        <p class="text-xs text-slate-600 font-medium">These are just a few and simple examples but this is a start. Aim to be better than who you are before.</p>
                                    </div>

                                    <div class="space-y-3">
                                        <span class="flex items-center gap-2 text-xs font-bold text-amber-600 uppercase tracking-wider"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg> Sharing Talents</span>
                                        <p class="text-xs text-slate-600 leading-relaxed">
                                            Talents and skills are not meant to be hidden, it must be shared. You have your talents or your skills – share it with everybody.
                                        </p>
                                        <ul class="text-xs text-slate-600 list-disc pl-4 space-y-1">
                                            <li>Contribute if your group has a task.</li>
                                            <li>Volunteer to be of great help if you have resources.</li>
                                            <li>Share your ideas on how to do things.</li>
                                            <li>If you are good at something (drawing, Math), help others be good too.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm flex flex-col md:flex-row gap-6 hover:shadow-md transition-all">
                            <div class="w-16 h-16 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center text-3xl font-extrabold shrink-0 border border-purple-100">T</div>
                            <div class="flex-1">
                                <h4 class="font-bold text-slate-900 text-xl mb-3">Talk to your parents or other significant adults</h4>
                                <p class="text-sm text-slate-600 leading-relaxed mb-4">
                                    Sharing your thoughts, feelings and experiences to your parents or other significant adults in your life, will help you in making decisions in life. By now, you should already realize how important family is. Spend quality time and communicate with them.
                                </p>
                                <div class="bg-purple-50 p-4 rounded-xl border border-purple-100 flex items-start gap-3">
                                    <svg class="w-5 h-5 text-purple-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                    <p class="text-xs text-purple-900 font-medium">
                                        They will protect you. Your parents will be there for you. You can talk to them about your personal experiences. A lot of issues and concerns may be resolved with their help. They know you far better than anybody else.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
HTML
        ]);

        // ---------------------------------------------------------
        // LESSON 5: You Can Do It (The New Me)
        // ---------------------------------------------------------
        Lesson::create([
            'module_id' => $module->id,
            'title' => 'You Can Do It: The New Me',
            'duration_minutes' => 10,
            'content_body' => <<<HTML
                <div class="font-sans text-slate-600 antialiased space-y-8 max-w-4xl mx-auto">
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-8 rounded-[2rem] border border-blue-100 text-center">
                        <h3 class="text-2xl font-bold text-blue-900 mb-2">The New Me</h3>
                        <p class="text-blue-800/80 text-sm">Complete the sentences below to reflect on your personal growth.</p>
                    </div>

                    <div class="space-y-6">
                        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm">
                            <label class="block font-bold text-slate-700 text-sm mb-3">1. As I have discovered many changes within me, what I like most among them is...</label>
                            <textarea class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-blue-500 outline-none text-slate-700 h-24 resize-none text-sm" placeholder="Type here..."></textarea>
                        </div>
                        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm">
                            <label class="block font-bold text-slate-700 text-sm mb-3">2. These changes in my “New Me” help me to...</label>
                            <textarea class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-blue-500 outline-none text-slate-700 h-24 resize-none text-sm" placeholder="Type here..."></textarea>
                        </div>
                        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm">
                            <label class="block font-bold text-slate-700 text-sm mb-3">3. I feel ________________ about these changes.</label>
                            <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-blue-500 outline-none text-slate-700 text-sm" placeholder="Type your feeling here...">
                        </div>
                    </div>
                </div>
HTML
        ]);

        // ---------------------------------------------------------
        // LESSON 6: What I Have Learned
        // ---------------------------------------------------------
        Lesson::create([
            'module_id' => $module->id,
            'title' => 'What I Have Learned: This is Me!',
            'duration_minutes' => 15,
            'content_body' => <<<HTML
                <div class="font-sans text-slate-600 antialiased space-y-10 max-w-5xl mx-auto">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-slate-100 pb-6">
                         <div>
                             <h3 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">This is Me!</h3>
                             <p class="text-slate-500 text-sm mt-1">Applying what you've learned</p>
                         </div>
                         <div class="flex items-center gap-2">
                            <span class="bg-indigo-50 text-indigo-700 text-xs font-bold px-3 py-1 rounded-lg uppercase tracking-wider border border-indigo-100">Worksheet</span>
                         </div>
                    </div>

                    <p class="text-base leading-relaxed text-slate-700 bg-slate-50 p-6 rounded-2xl border border-slate-100">
                        Read the situations below and answer what you will do and why.
                    </p>

                    <div class="space-y-6">
                        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm">
                            <h4 class="font-bold text-slate-800 text-sm mb-4">1. You are about to go to school when your mother asked you to stay at home and take care of your baby brother/sister.</h4>
                            <div class="grid md:grid-cols-2 gap-4">
                                <textarea class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 focus:ring-1 focus:ring-indigo-500 outline-none h-20 resize-none text-sm" placeholder="What will you do?"></textarea>
                                <textarea class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 focus:ring-1 focus:ring-indigo-500 outline-none h-20 resize-none text-sm" placeholder="Why will you do it?"></textarea>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm">
                            <h4 class="font-bold text-slate-800 text-sm mb-4">2. Your classmate invited you to attend her/his birthday party after class but it is far away from your home.</h4>
                            <div class="grid md:grid-cols-2 gap-4">
                                <textarea class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 focus:ring-1 focus:ring-indigo-500 outline-none h-20 resize-none text-sm" placeholder="What will you do?"></textarea>
                                <textarea class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 focus:ring-1 focus:ring-indigo-500 outline-none h-20 resize-none text-sm" placeholder="Why will you do it?"></textarea>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm">
                            <h4 class="font-bold text-slate-800 text-sm mb-4">3. Just like your friends, you stayed at home for several months due to quarantine. You learned from them that they use gadget 24/7 to ease their boredom.</h4>
                            <div class="grid md:grid-cols-2 gap-4">
                                <textarea class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 focus:ring-1 focus:ring-indigo-500 outline-none h-20 resize-none text-sm" placeholder="What will you do?"></textarea>
                                <textarea class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 focus:ring-1 focus:ring-indigo-500 outline-none h-20 resize-none text-sm" placeholder="Why will you do it?"></textarea>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm">
                            <h4 class="font-bold text-slate-800 text-sm mb-4">4. Many of your classmates told you that you are better than they are because you belong to a well-off family – you have gadgets, nice dresses and packed foods.</h4>
                            <div class="grid md:grid-cols-2 gap-4">
                                <textarea class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 focus:ring-1 focus:ring-indigo-500 outline-none h-20 resize-none text-sm" placeholder="What will you do?"></textarea>
                                <textarea class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 focus:ring-1 focus:ring-indigo-500 outline-none h-20 resize-none text-sm" placeholder="Why will you do it?"></textarea>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm">
                            <h4 class="font-bold text-slate-800 text-sm mb-4">5. You enjoy chatting with your friends this pandemic time that is why you sleep late at night.</h4>
                            <div class="grid md:grid-cols-2 gap-4">
                                <textarea class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 focus:ring-1 focus:ring-indigo-500 outline-none h-20 resize-none text-sm" placeholder="What will you do?"></textarea>
                                <textarea class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 focus:ring-1 focus:ring-indigo-500 outline-none h-20 resize-none text-sm" placeholder="Why will you do it?"></textarea>
                            </div>
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
            'title' => 'Share Your Thoughts & Feelings',
            'duration_minutes' => 15,
            'content_body' => <<<HTML
                <div class="font-sans text-slate-600 antialiased space-y-12 max-w-4xl mx-auto">
                    <div class="bg-orange-50 p-8 rounded-[2rem] border border-orange-100">
                        <h3 class="text-2xl font-bold text-orange-900 mb-2">Situation Analysis</h3>
                        <p class="text-orange-800/80 text-sm leading-relaxed">
                            You are assigned to take charge of your younger siblings for a week because your parents are required to stay in their respective work places due to health protocols. They gave you instructions regarding food, safety and money in cases of emergency for the whole week.
                        </p>
                    </div>

                    <div class="space-y-6">
                        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm">
                            <label class="block font-bold text-slate-800 text-sm mb-3">1. How do you feel about the task?</label>
                            <textarea class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-orange-500 outline-none text-slate-700 h-24 resize-none text-sm" placeholder="Type your answer here..."></textarea>
                        </div>
                        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm">
                            <label class="block font-bold text-slate-800 text-sm mb-3">2. What is your plan of action to accomplish the task?</label>
                            <textarea class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-orange-500 outline-none text-slate-700 h-24 resize-none text-sm" placeholder="Type your answer here..."></textarea>
                        </div>
                        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm">
                            <label class="block font-bold text-slate-800 text-sm mb-3">3. How will this experience help you in your development?</label>
                            <textarea class="w-full bg-slate-50 border border-slate-200 rounded-xl p-4 focus:ring-1 focus:ring-orange-500 outline-none text-slate-700 h-24 resize-none text-sm" placeholder="Type your answer here..."></textarea>
                        </div>
                    </div>

                    <div class="bg-slate-900 p-10 rounded-[2.5rem] text-center mt-16">
                        <p class="italic text-slate-300 text-lg font-serif">
                            "Now that you have gained knowledge about yourself... you open yourself to new possibilities for personal growth. Continue your Journey!"
                        </p>
                    </div>
                </div>
HTML
        ]);
    }
}
