@extends('layouts.frontend.app')
@section('content')
    <!-- Hero Banner -->

        <section class="w-full max-w-7xl mx-auto pt-10">
            <img
                src="{{ asset('img/banner2.png') }}"
                alt="Banner"
                class="w-full h-[200px] object-cover rounded-lg shadow-md"
            >
        </section>
    <section
        class="bg-gradient-to-r from-green-700 via-blue-600 to-purple-600 text-white py-12 px-6 flex flex-col sm:flex-row items-center justify-between max-w-7xl mx-auto mt-6 rounded-lg shadow-md">
        <div class="font-bold text-2xl sm:text-3xl flex items-center">
            <i class="fas fa-lightbulb mr-3 text-yellow-300"></i>
            Welcome to <span class="ml-2 text-white font-extrabold">MCQs Mind</span> – Sharpen Your Knowledge!
        </div>
        <span
            class="bg-yellow-300 text-green-900 px-4 py-2 rounded-full font-semibold text-sm mt-4 sm:mt-0 sm:ml-6">NEW</span>
    </section>

    <div class="container mx-auto py-10 px-4 sm:px-6 max-w-7xl">
        <div class="row">
            <!-- Left Content (col-8) -->
            <div class="col-md-8">
                <div class="bg-white p-6 rounded shadow mt-4">
                    <h2 class="text-xl font-bold mb-4 flex items-center gap-2">
                        <i class="fas fa-book-open text-green-500"></i>
                        Core/Compulsory Subjects
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Your subject blocks here -->
                        <div
                            class="flex items-center bg-red-500 text-white p-4 rounded hover:bg-red-600 transition duration-300 cursor-pointer">
                            <i class="fas fa-globe mr-3"></i>
                            <span class="flex-1">General Knowledge</span>
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <div
                            class="flex items-center bg-blue-500 text-white p-4 rounded hover:bg-blue-600 transition duration-300 cursor-pointer">
                            <i class="fas fa-flag mr-3"></i>
                            <span class="flex-1">Pakistan Studies/Affairs</span>
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <div
                            class="flex items-center bg-green-500 text-white p-4 rounded hover:bg-green-600 transition duration-300 cursor-pointer">
                            <i class="fas fa-newspaper mr-3"></i>
                            <span class="flex-1">Current Affairs</span>
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <div
                            class="flex items-center bg-pink-500 text-white p-4 rounded hover:bg-pink-600 transition duration-300 cursor-pointer">
                            <i class="fas fa-mosque mr-3"></i>
                            <span class="flex-1">Islamic Studies/Islamiat</span>
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <div
                            class="flex items-center bg-purple-500 text-white p-4 rounded hover:bg-purple-600 transition duration-300 cursor-pointer">
                            <i class="fas fa-spell-check mr-3"></i>
                            <span class="flex-1">English</span>
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <div
                            class="flex items-center bg-orange-500 text-white p-4 rounded hover:bg-orange-600 transition duration-300 cursor-pointer">
                            <i class="fas fa-flask mr-3"></i>
                            <span class="flex-1">Everyday Science</span>
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <div
                            class="flex items-center bg-teal-500 text-white p-4 rounded hover:bg-teal-600 transition duration-300 cursor-pointer">
                            <i class="fas fa-language mr-3"></i>
                            <span class="flex-1">Urdu</span>
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <div
                            class="flex items-center bg-yellow-500 text-white p-4 rounded hover:bg-yellow-600 transition duration-300 cursor-pointer">
                            <i class="fas fa-calculator mr-3"></i>
                            <span class="flex-1">Mathematics/General Ability</span>
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <div
                            class="flex items-center bg-indigo-500 text-white p-4 rounded hover:bg-indigo-600 transition duration-300 cursor-pointer">
                            <i class="fas fa-desktop mr-3"></i>
                            <span class="flex-1">Computer Science/IT</span>
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <div
                            class="flex items-center bg-gray-500 text-white p-4 rounded hover:bg-gray-600 transition duration-300 cursor-pointer">
                            <i class="fas fa-brain mr-3"></i>
                            <span class="flex-1">IQ (Intelligence Questions)</span>
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-6 rounded shadow mt-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach ($categories as $category)
                            @php
                                $colors = ['red','blue','green','pink','purple','orange','teal','yellow','indigo','gray'];
                                $icons = ['fa-globe','fa-flag','fa-newspaper','fa-mosque','fa-spell-check','fa-flask','fa-language','fa-calculator','fa-desktop','fa-brain'];
                                $color = $colors[$loop->index % count($colors)];
                                $icon = $icons[$loop->index % count($icons)];
                            @endphp

                            <div class="bg-{{ $color }}-500 text-white rounded shadow">
                                {{-- Category box --}}
                                <div class="flex items-center justify-between p-4 cursor-pointer hover:bg-{{ $color }}-600 transition duration-300"
                                     onclick="toggleSubcategories({{ $category->id }}, {{ $category->subcategories->count() }})">
                                    <div class="flex items-center">
                                        <i class="fas {{ $icon }} mr-3"></i>
                                        <span>{{ $category->name }}</span>
                                    </div>
                                    @if($category->subcategories->count() > 0)
                                        <i class="fas fa-chevron-down" id="arrow-{{ $category->id }}"></i>
                                    @else
                                        <i class="fas fa-arrow-right"></i>
                                    @endif
                                </div>

                                {{-- Subcategories dropdown --}}
                                @if($category->subcategories->count() > 0)
                                    <div id="subcat-{{ $category->id }}" class="hidden bg-white text-gray-800">
                                        @foreach ($category->subcategories as $subcategory)
                                            <a href="{{ url('/all-mcqs/' . $subcategory->id) }}"
                                               class="block px-6 py-3 hover:bg-gray-100 border-t border-gray-200">
                                                {{ $subcategory->name }}
                                            </a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
            <!-- Right Sidebar -->
            <div class="col-md-4">
            <aside class="w-full md:w-100 flex-shrink-0 hidden md:block">
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
                    <a href="#" class="block text-green-600 mt-3 font-semibold hover:underline">View All Past
                        Papers</a>
                </div>
            </aside>
            </div>
        </div>
    </div>
@endsection
<script>
    function toggleSubcategories(categoryId, subCount) {
        if (subCount === 0) {
            // No subcategories → direct link
            window.location.href = '/all-mcqs/' + categoryId;
            return;
        }

        let dropdown = document.getElementById('subcat-' + categoryId);
        let arrow = document.getElementById('arrow-' + categoryId);

        if (dropdown.classList.contains('hidden')) {
            dropdown.classList.remove('hidden');
            arrow.classList.remove('fa-chevron-down');
            arrow.classList.add('fa-chevron-up');
        } else {
            dropdown.classList.add('hidden');
            arrow.classList.remove('fa-chevron-up');
            arrow.classList.add('fa-chevron-down');
        }
    }
    </script>
