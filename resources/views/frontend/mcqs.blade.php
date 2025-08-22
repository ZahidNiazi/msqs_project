@extends('layouts.frontend.app')
@section('content')
    <style>
        .custom-scrollbar::-webkit-scrollbar {
            height: 6px;
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: linear-gradient(90deg, #0f5a2f 0%, #31c48d 100%);
            border-radius: 3px;
        }

        .custom-scrollbar {
            scrollbar-width: thin;
            scrollbar-color: #31c48d #e5e7eb;
        }

        .logo-text {
            background: linear-gradient(90deg, #0f5a2f 0%, #31c48d 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: bold;
            font-size: 2rem;
            letter-spacing: 2px;
        }

        .newsletter-input:focus {
            outline: none;
            border-color: #31c48d;
            box-shadow: 0 0 0 2px #31c48d33;
        }

        .question-section {
            margin-bottom: 1.5rem;
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .question-section:hover {
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }

        .question-number {
            background: linear-gradient(135deg, #22c55e, #16a34a);
            color: white;
            font-weight: bold;
            font-size: 1rem;
            padding: 0.3rem 0.8rem;
            border-radius: 0.5rem;
            min-width: 2rem;
            text-align: center;
        }

        .question-text {
            font-weight: bold;
            font-size: 1rem;
            color: #065f46;
        }

        .answer-options label {
            display: flex;
            align-items: center;
            font-size: 0.9rem;
            margin: 0.5rem 0;
            padding: 0.5rem;
            border-radius: 0.5rem;
            transition: background-color 0.3s ease;
            background-color: #f0fdf4;
        }

        .answer-options label:hover {
            background-color: #dcfce7;
        }

        .answer-options input[type="radio"] {
            margin-right: 0.5rem;
            accent-color: #22c55e;
        }

        .btn-group {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .btn-answer,
        .btn-discuss,
        .btn-save {
            font-size: 0.9rem;
            padding: 0.5rem 1.2rem;
            border-radius: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-answer {
            background: linear-gradient(135deg, #22c55e, #16a34a);
            color: white;
        }

        .btn-answer:hover {
            background: linear-gradient(135deg, #16a34a, #22c55e);
            transform: translateY(-2px);
        }

        .btn-discuss {
            background: linear-gradient(135deg, #4ade80, #22c55e);
            color: #065f46;
        }

        .btn-discuss:hover {
            background: linear-gradient(135deg, #22c55e, #4ade80);
            color: white;
        }

        .btn-save {
            background: linear-gradient(135deg, #ef4444, #b91c1c);
            color: white;
        }

        .btn-save:hover {
            background: linear-gradient(135deg, #b91c1c, #ef4444);
            transform: translateY(-2px);
        }

        .answer-box {
            border: 2px solid #22c55e;
            border-radius: 0.5rem;
            padding: 1rem;
            margin-top: 1rem;
            background: #ecfdf5;
            color: #065f46;
            font-weight: bold;
        }

        .match-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1rem;
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .match-table th,
        .match-table td {
            padding: 0.8rem;
            text-align: left;
        }

        .match-table th {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            color: #065f46;
            font-weight: bold;
        }

        .match-table tbody tr:nth-child(odd) td {
            background-color: #f0fdf4;
        }

        .pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 2rem;
        }

        .pagination button {
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            border: 2px solid #d1d5db;
            background-color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .pagination button:hover:not(.active) {
            background-color: #d1fae5;
        }

        .pagination button.active {
            background: linear-gradient(135deg, #22c55e, #16a34a);
            color: white;
            border-color: #22c55e;
        }

        .notes-section {
            margin-bottom: 2rem;
            padding: 1.5rem;
            border-radius: 0.5rem;
            background: #f0fdf4;
            border: 2px solid #22c55e;
        }

        .notes-section h3 {
            font-weight: bold;
            font-size: 1.25rem;
            color: #065f46;
            margin-bottom: 1rem;
        }

        .notes-section h4 {
            font-weight: bold;
            font-size: 1.1rem;
            color: #065f46;
            margin-top: 1rem;
            margin-bottom: 0.5rem;
        }

        .notes-section p,
        .notes-section ul {
            color: #374151;
            margin-bottom: 1rem;
        }

        .notes-section ul {
            list-style-type: disc;
            padding-left: 1.5rem;
        }

        .notes-page {
            display: none;
        }

        .notes-page.active {
            display: block;
        }

        .notes-pagination {
            display: flex;
            justify-content: flex-end;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .notes-pagination button {
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            background: linear-gradient(135deg, #22c55e, #16a34a);
            color: white;
            border: none;
        }

        .notes-pagination button:hover {
            background: linear-gradient(135deg, #16a34a, #22c55e);
            transform: translateY(-2px);
        }

        .notes-pagination button:disabled {
            background: #d1d5db;
            cursor: not-allowed;
            transform: none;
        }
    </style>
    <!-- Hero Banner -->
    <section
        class="bg-gradient-to-r from-green-700 to-green-400 text-white py-8 px-6 flex flex-col sm:flex-row items-center justify-between max-w-7xl mx-auto mt-6 rounded-lg shadow-md">
        <div class="font-bold text-2xl flex items-center">
            <i class="fas fa-lightbulb mr-3 text-yellow-300"></i>
            {{ $selectedCategory->title ?? ($selectedCategory->title ?? 'All Categories') }} – Sharpen Your Knowledge!
        </div>
        <span
            class="bg-yellow-300 text-green-900 px-4 py-2 rounded-full font-semibold ml-0 sm:ml-6 text-sm mt-4 sm:mt-0">NEW</span>
    </section>
    @if (isset($selectedCategory) && $selectedCategory->file)
        <img src="{{ asset('assets/banner/' . $selectedCategory->file) }}" alt="{{ $selectedCategory->name }}"
            class="w-full max-w-7xl mx-auto h-64 object-cover mt-5 rounded-lg shadow-md block">
    @endif

    <!-- Main Content and Right Sidebar Wrapper -->
    <div class="container mx-auto py-10 md:px-0 sm:px-6 max-w-7xl flex flex-col md:flex-row gap-8">
        <!-- Main Content: Notes and Questions -->
        <main class="flex-1 min-w-0">
            <div class="bg-white p-6 rounded shadow">
                <h2 class="text-xl font-bold mb-4 flex items-center gap-2">
                    <i class="fas fa-book-open text-yellow-500"></i>
                    {{ $selectedCategory->title ?? ($selectedCategory->title ?? 'All Categories') }} MCQs
                </h2>
                <!-- Notes Section -->
                <div class="notes-section">
                    <h3 class="flex items-center gap-2">
                        <i class="fas fa-book text-green-600"></i>
                        Topic Notes: {{ $selectedCategory->title ?? ($selectedCategory->title ?? 'All Categories') }}
                    </h3>
                    <p>
                        {{ $selectedCategory->description ?? ($selectedCategory->description ?? 'General Description') }}
                    </p>

                    <div class="notes-page" data-page="2">
                        <h4>Plato</h4>
                        <ul>
                            <li><strong>Biography:</strong> Ancient Greek philosopher (427–347 BCE), student of Socrates and
                                teacher of Aristotle, founder of the Academy in Athens.</li>
                            <li><strong>Important Ideas:</strong>
                                <ul>
                                    <li>Theory of Forms: Ideas or forms are eternal, perfect realities, while physical
                                        objects are imperfect reflections.</li>
                                    <li>Philosopher-King: Rulers should be wise philosophers to ensure just governance.</li>
                                    <li>Ideal State: A society divided into guardians, auxiliaries, and producers.</li>
                                </ul>
                            </li>
                            <li><strong>Books:</strong>
                                <ul>
                                    <li>The Republic</li>
                                    <li>Phaedo</li>
                                    <li>Symposium</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="notes-page" data-page="3">
                        <h4>Aristotle</h4>
                        <ul>
                            <li><strong>Biography:</strong> Greek philosopher (384–322 BCE), student of Plato, tutor to
                                Alexander the Great, and founder of the Lyceum.</li>
                            <li><strong>Important Ideas:</strong>
                                <ul>
                                    <li>Four Causes: Explains phenomena through material, formal, efficient, and final
                                        causes.</li>
                                    <li>Virtue Ethics: Ethical behavior arises from cultivating virtues through habit.</li>
                                    <li>Polity: A mixed government combining elements of democracy and oligarchy.</li>
                                </ul>
                            </li>
                            <li><strong>Books:</strong>
                                <ul>
                                    <li>Nicomachean Ethics</li>
                                    <li>Politics</li>
                                    <li>Metaphysics</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="notes-page" data-page="4">
                        <h4>John Locke</h4>
                        <ul>
                            <li><strong>Biography:</strong> English philosopher (1632–1704), known as the "Father of
                                Liberalism," influential in the Enlightenment.</li>
                            <li><strong>Important Ideas:</strong>
                                <ul>
                                    <li>Consent Theory: Government legitimacy derives from the consent of the governed.</li>
                                    <li>Limited Government: State power should be restricted to protect individual rights.
                                    </li>
                                    <li>Natural Rights: Life, liberty, and property are inherent rights of individuals.</li>
                                </ul>
                            </li>
                            <li><strong>Books:</strong>
                                <ul>
                                    <li>Two Treatises of Government (1689)</li>
                                    <li>An Essay Concerning Human Understanding (1689)</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Question 1 -->
                @php
                    $perPage = $mcqs->perPage();
                    $currentPage = $mcqs->currentPage();
                    $startIndex = ($currentPage - 1) * $perPage + 1;
                @endphp

                @foreach ($mcqs as $index => $mcq)
                    <section class="question-section" tabindex="0" aria-label="Question {{ $startIndex + $index }}">
                        <div class="flex items-start space-x-4 mb-4">
                            <div class="question-number">{{ $startIndex + $index }}</div>
                            <div class="question-text">
                                {{ $mcq->question }}
                            </div>
                        </div>
                        <form class="answer-options" role="radiogroup">
                            <label>
                                {!! $mcq->correct_option == 'a' ? '<b>A. ' . e($mcq->option_a) . '</b>' : 'A. ' . e($mcq->option_a) !!}
                            </label>

                            <label>
                                {!! $mcq->correct_option == 'b' ? '<b>B. ' . e($mcq->option_b) . '</b>' : 'B. ' . e($mcq->option_b) !!}
                            </label>

                            <label>
                                {!! $mcq->correct_option == 'c' ? '<b>C. ' . e($mcq->option_c) . '</b>' : 'C. ' . e($mcq->option_c) !!}
                            </label>

                            <label>
                                {!! $mcq->correct_option == 'd' ? '<b>D. ' . e($mcq->option_d) . '</b>' : 'D. ' . e($mcq->option_d) !!}
                            </label>
                        </form>
                        <div class="btn-group mt-3">
                            <button class="btn-answer" type="button" onclick="toggleAnswer({{ $mcq->id }})">
                                <i class="fas fa-check-circle"></i> Answer & Solution
                            </button>

                            <a href="{{ url('report/' . $mcq->id) }}" class="text-white btn-discuss">
                                <i class="fas fa-comments"></i> Discuss in Board
                            </a>
                        </div>

                        <div id="answer-box-{{ $mcq->id }}" class="answer-box mt-3" aria-live="polite" hidden>
                            <div>
                                <strong>Answer:</strong>
                                @if ($mcq->correct_option == 'a')
                                    {{ $mcq->option_a }}
                                @elseif($mcq->correct_option == 'b')
                                    {{ $mcq->option_b }}
                                @elseif($mcq->correct_option == 'c')
                                    {{ $mcq->option_c }}
                                @elseif($mcq->correct_option == 'd')
                                    {{ $mcq->option_d }}
                                @endif
                            </div>

                            <div class="mt-2">
                                @if (!empty($mcq->explanation))
                                    {{ $mcq->explanation }}
                                @else
                                    No explanation is given for this question.
                                    <a href="#" class="underline">Let's Discuss on Board</a>
                                @endif
                            </div>
                        </div>
                    </section>
                @endforeach
                <!-- Pagination -->
                <nav class="pagination" aria-label="Pagination">
                    <div class="pagination-container text-center mt-4">
                        {{ $mcqs->links() }}
                    </div>
                </nav>
            </div>
        </main>
        <!-- Right Sidebar -->
        <aside class="w-full md:w-72 flex-shrink-0 hidden md:block">
            <div class="mt-3 mb-3">
                @include('frontend.frontsidebar')
            </div>

            <div class="bg-white rounded shadow p-6 mb-8">
                <h3 class="text-lg font-bold mb-4 flex items-center gap-2">
                    <i class="fas fa-list text-green-500"></i>
                    Main Headings
                </h3>
                <ul class="space-y-3 text-[15px] font-semibold text-gray-700">
                    <li><a href="index.html" class="hover:text-green-600 flex items-center"><i
                                class="fas fa-home mr-2"></i>Home</a></li>
                    <li><a href="#" class="hover:text-green-600 flex items-center"><i
                                class="fas fa-trophy mr-2"></i>Competitive Exams</a></li>
                    <li><a href="#" class="hover:text-green-600 flex items-center"><i
                                class="fas fa-book-open mr-2"></i>Core Subjects</a></li>
                    <li><a href="#" class="hover:text-green-600 flex items-center"><i
                                class="fas fa-graduation-cap mr-2"></i>Exam Categories</a></li>
                    <li><a href="#" class="hover:text-green-600 flex items-center"><i
                                class="fas fa-puzzle-piece mr-2"></i>Subject MCQs</a></li>
                    <li><a href="#" class="hover:text-green-600 flex items-center"><i
                                class="fas fa-comments mr-2"></i>Interview</a></li>
                </ul>
            </div>
            <div class="bg-white rounded shadow p-6 mb-8">
                <h3 class="text-lg font-bold mb-4 flex items-center gap-2">
                    <i class="fas fa-star text-yellow-500"></i>
                    New MCQs
                </h3>
                <ul class="space-y-2 text-[15px]">
                    <li><a href="#" class="hover:text-green-600">What is the capital of Australia?</a></li>
                    <li><a href="#" class="hover:text-green-600">Who wrote "To Kill a Mockingbird"?</a></li>
                    <li><a href="#" class="hover:text-green-600">First law of thermodynamics relates to?</a></li>
                    <li><a href="#" class="hover:text-green-600">Which enzyme breaks down protein?</a></li>
                    <li><a href="#" class="hover:text-green-600">Latest MCQ: 2025 CSS GK</a></li>
                </ul>
                <a href="#" class="block text-green-600 mt-3 font-semibold hover:underline">View All MCQs</a>
            </div>
            <div class="bg-white rounded shadow p-6">
                <h3 class="text-lg font-bold mb-4 flex items-center gap-2">
                    <i class="fas fa-file-alt text-blue-500"></i>
                    Past Papers
                </h3>
                <ul class="space-y-2 text-[15px]">
                    <li><a href="#" class="hover:text-green-600">CSS 2024 Past Paper</a></li>
                    <li><a href="#" class="hover:text-green-600">PMS 2023 Past Paper</a></li>
                    <li><a href="#" class="hover:text-green-600">FPSC 2023 GK Paper</a></li>
                    <li><a href="#" class="hover:text-green-600">NTS 2024 English</a></li>
                    <li><a href="#" class="hover:text-green-600">MDCAT 2024 Biology</a></li>
                </ul>
                <a href="#" class="block text-green-600 mt-3 font-semibold hover:underline">View All Past Papers</a>
            </div>
        </aside>
    </div>
@endsection
<script>
    function toggleAnswer(id) {
        let box = document.getElementById(`answer-box-${id}`);
        box.hidden = !box.hidden;
    }
</script>
