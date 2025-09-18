@extends('layouts.frontend.app')
@section('content')
    <!-- Full styles (combine with your main stylesheet if preferred) -->
    <style>
        /* ---------- Custom scroll & branding ---------- */
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

        /* ---------- Layout & cards ---------- */
        .question-section {
            margin-bottom: 1.5rem;
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.06);
            transition: box-shadow 0.3s ease;
            background: #ffffff;
        }

        .question-section:hover {
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.09);
        }

        .question-number {
            background: linear-gradient(135deg, #22c55e, #16a34a);
            color: white;
            font-weight: bold;
            font-size: 1rem;
            padding: 0.28rem 0.7rem;
            border-radius: 0.4rem;
            min-width: 2rem;
            text-align: center;
        }

        .question-text {
            font-weight: 700;
            font-size: 1rem;
            color: #065f46;
        }

        /* ---------- Answer options base (no bolding) ---------- */
        .answer-options label {
            display: flex;
            align-items: center;
            justify-content: space-between; /* text left, icon right */
            font-size: 0.95rem;
            margin: 0.35rem 0;
            padding: 0.5rem 0.6rem;
            border-radius: 0.5rem;
            transition: background-color 0.2s ease;
            background-color: #f0fdf4;
        }

        .answer-options label:hover {
            background-color: #dcfce7;
        }

        .option-text {
            flex: 1;
            margin-right: 0.75rem;
            color: #065f46;
            line-height: 1.25;
        }

        /* ---------- Option icons (hidden until answer shown) ---------- */
        .option-icon {
            font-size: 1.15rem;
            width: 1.4rem;
            text-align: center;
            opacity: 0;
            transform: translateX(4px);
            transition: opacity 0.18s ease, transform 0.18s ease;
        }

        .option-icon.show-icon {
            opacity: 1;
            transform: translateX(0);
        }

        .option-icon.correct { color: #16a34a; } /* green */
        .option-icon.wrong { color: #dc2626; }   /* red */

        /* ---------- Buttons ---------- */
        .btn-group {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .btn-answer,
        .btn-discuss {
            font-size: 0.9rem;
            padding: 0.5rem 1.2rem;
            border-radius: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.15s ease;
            border: none;
        }

        .btn-answer {
            background: linear-gradient(135deg, #22c55e, #16a34a);
            color: white;
        }

        .btn-answer:hover { transform: translateY(-2px); }

        .btn-discuss {
            background: linear-gradient(135deg, #4ade80, #22c55e);
            color: #065f46;
        }

        .btn-discuss:hover { color: white; transform: translateY(-2px); }

        /* ---------- Answer box / explanation ---------- */
        .answer-box {
            border: 2px solid #22c55e;
            border-radius: 0.5rem;
            padding: 1rem;
            margin-top: 1rem;
            background: #ecfdf5;
            color: #065f46;
            font-weight: 600;
        }

        .explanation-text { font-weight: 500; color: #064e3b; }

        /* ---------- Misc ---------- */
        .match-table { width: 100%; border-collapse: collapse; margin-bottom: 1rem; border-radius: 0.5rem; overflow: hidden; }
        .match-table th, .match-table td { padding: 0.8rem; text-align: left; }
        .match-table th { background: linear-gradient(135deg, #d1fae5, #a7f3d0); color: #065f46; font-weight: bold; }
        .match-table tbody tr:nth-child(odd) td { background-color: #f0fdf4; }

        .pagination { display: flex; justify-content: center; gap: 0.5rem; margin-top: 2rem; }
        .pagination button { padding: 0.5rem 1rem; border-radius: 0.5rem; border: 2px solid #d1d5db; background-color: white; font-weight: bold; cursor: pointer; transition: background-color 0.3s ease; }
        .pagination button:hover:not(.active) { background-color: #d1fae5; }
        .pagination button.active { background: linear-gradient(135deg, #22c55e, #16a34a); color: white; border-color: #22c55e; }

        .notes-section { margin-bottom: 2rem; padding: 1.5rem; border-radius: 0.5rem; background: #f0fdf4; border: 2px solid #22c55e; }
        .notes-section h3 { font-weight: bold; font-size: 1.25rem; color: #065f46; margin-bottom: 1rem; }
        .notes-section p, .notes-section ul { color: #374151; margin-bottom: 1rem; }

        .option-icon[aria-hidden="true"] { visibility: hidden; } /* helpful fallback */

        @media (max-width: 576px) {
            .option-icon { font-size: 1rem; }
            .question-text { font-size: 0.95rem; }
        }
    </style>

    <!-- Page header / hero -->
    <section class="bg-gradient-to-r from-green-700 to-green-400 text-white py-8 px-6 flex flex-col sm:flex-row items-center justify-between max-w-7xl mx-auto mt-6 rounded-lg shadow-md">
        <div class="font-bold text-2xl flex items-center">
            <i class="fas fa-lightbulb mr-3 text-yellow-300"></i>
            {{ $selectedCategory->title ?? 'All Categories' }} – Sharpen Your Knowledge!
        </div>
        <span class="bg-yellow-300 text-green-900 px-4 py-2 rounded-full font-semibold text-sm mt-4 sm:mt-0">NEW</span>
    </section>

    @if (isset($selectedCategory) && $selectedCategory->file)
        <img src="{{ asset('assets/banner/' . $selectedCategory->file) }}" alt="{{ $selectedCategory->name }}" class="w-full max-w-7xl mx-auto h-64 object-cover mt-5 rounded-lg shadow-md block">
    @endif

    <!-- Main layout -->
    <div class="container mx-auto py-10 md:px-0 sm:px-6 max-w-7xl flex flex-col md:flex-row gap-8">
        <main class="flex-1 min-w-0">
            <div class="bg-white p-6 rounded shadow">
                <h2 class="text-xl font-bold mb-4 flex items-center gap-2">
                    <i class="fas fa-book-open text-yellow-500"></i>
                    {{ $selectedCategory->title ?? 'All Categories' }} MCQs
                </h2>

                <!-- Notes section (kept from your original) -->
                <div class="notes-section">
                    <h3 class="flex items-center gap-2">
                        <i class="fas fa-book text-green-600"></i>
                        Topic Notes: {{ $selectedCategory->title ?? 'All Categories' }}
                    </h3>
                    <p>{{ $selectedCategory->description ?? 'General Description' }}</p>

                    <div class="notes-page" data-page="2">
                        <h4>Plato</h4>
                        <ul>
                            <li><strong>Biography:</strong> Ancient Greek philosopher (427–347 BCE), student of Socrates and teacher of Aristotle, founder of the Academy in Athens.</li>
                            <li><strong>Important Ideas:</strong>
                                <ul>
                                    <li>Theory of Forms</li>
                                    <li>Philosopher-King</li>
                                    <li>Ideal State</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- Additional notes pages could be included -->
                </div>

                @php
                    $perPage = $mcqs->perPage();
                    $currentPage = $mcqs->currentPage();
                    $startIndex = ($currentPage - 1) * $perPage + 1;
                @endphp

                <!-- MCQs loop -->
                @foreach ($mcqs as $index => $mcq)
                    <section class="question-section" tabindex="0" aria-label="Question {{ $startIndex + $index }}" id="question-{{ $mcq->id }}">
                        <div class="flex items-start space-x-4 mb-4">
                            <div class="question-number">{{ $startIndex + $index }}</div>
                            <div class="question-text">{{ $mcq->question }}</div>
                        </div>

                        <!-- Options: plain text, icons are added dynamically when answer toggles -->
                        <form class="answer-options" role="radiogroup" data-correct="{{ $mcq->correct_option }}">
                            <label data-option="a" data-is-correct="{{ $mcq->correct_option === 'a' ? '1' : '0' }}">
                                <span class="option-text">A. {{ $mcq->option_a }}</span>
                                <i class="fa-solid option-icon" aria-hidden="true"></i>
                            </label>

                            <label data-option="b" data-is-correct="{{ $mcq->correct_option === 'b' ? '1' : '0' }}">
                                <span class="option-text">B. {{ $mcq->option_b }}</span>
                                <i class="fa-solid option-icon" aria-hidden="true"></i>
                            </label>

                            <label data-option="c" data-is-correct="{{ $mcq->correct_option === 'c' ? '1' : '0' }}">
                                <span class="option-text">C. {{ $mcq->option_c }}</span>
                                <i class="fa-solid option-icon" aria-hidden="true"></i>
                            </label>

                            <label data-option="d" data-is-correct="{{ $mcq->correct_option === 'd' ? '1' : '0' }}">
                                <span class="option-text">D. {{ $mcq->option_d }}</span>
                                <i class="fa-solid option-icon" aria-hidden="true"></i>
                            </label>
                        </form>

                        <div class="btn-group mt-3">
                            <button class="btn-answer" type="button" onclick="toggleAnswer({{ $mcq->id }})">
                                <i class="fas fa-check-circle"></i> Answer & Solution
                            </button>

                            <a href="{{ url('report/' . $mcq->id) }}" class="btn-discuss">
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

                            <div class="mt-2 explanation-text">
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

        <!-- Right Sidebar (kept from your structure) -->
        <aside class="w-full md:w-72 flex-shrink-0 hidden md:block">
            <div class="mb-3">
                @include('frontend.frontsidebar')
            </div>

            <div class="bg-white rounded shadow p-6 mb-8">
                <h3 class="text-lg font-bold mb-4 flex items-center gap-2">
                    <i class="fas fa-list text-green-500"></i>
                    Useful Links
                </h3>
                <ul class="space-y-3 text-[15px] font-semibold text-gray-700">
                    <li><a href="index.html" class="hover:text-green-600 flex items-center"><i class="fas fa-home mr-2"></i>Home</a></li>
                    <li><a href="#" class="hover:text-green-600 flex items-center"><i class="fas fa-trophy mr-2"></i>Competitive Exams</a></li>
                    <li><a href="#" class="hover:text-green-600 flex items-center"><i class="fas fa-book-open mr-2"></i>Core Subjects</a></li>
                    <li><a href="#" class="hover:text-green-600 flex items-center"><i class="fas fa-graduation-cap mr-2"></i>Exam Categories</a></li>
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
                </ul>
                <a href="#" class="block text-green-600 mt-3 font-semibold hover:underline">View All Past Papers</a>
            </div>
        </aside>
    </div>

    <!-- JS: toggle answer box and show icons -->
    <script>
        function toggleAnswer(id) {
            const box = document.getElementById(`answer-box-${id}`);
            const willShow = box.hidden; // if hidden now, we will show
            box.hidden = !box.hidden;

            const questionSection = document.getElementById(`question-${id}`);
            if (!questionSection) return;

            const labels = questionSection.querySelectorAll('.answer-options label');

            labels.forEach((label) => {
                const isCorrect = label.dataset.isCorrect === '1';
                const iconEl = label.querySelector('.option-icon');

                // Clear previous classes
                iconEl.className = 'fa-solid option-icon'; // reset base classes

                if (willShow) {
                    if (isCorrect) {
                        iconEl.classList.add('show-icon', 'correct', 'fa-circle-check');
                        iconEl.setAttribute('title', 'Correct');
                        iconEl.setAttribute('aria-hidden', 'false');
                    } else {
                        iconEl.classList.add('show-icon', 'wrong', 'fa-circle-xmark');
                        iconEl.setAttribute('title', 'Wrong');
                        iconEl.setAttribute('aria-hidden', 'false');
                    }
                } else {
                    // hide icon when closing
                    iconEl.classList.remove('show-icon', 'correct', 'wrong', 'fa-circle-check', 'fa-circle-xmark');
                    iconEl.setAttribute('aria-hidden', 'true');
                    iconEl.removeAttribute('title');
                }
            });

            // scroll into view when opening for focus
            if (willShow) {
                setTimeout(() => {
                    box.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }, 120);
            }
        }
    </script>
@endsection
