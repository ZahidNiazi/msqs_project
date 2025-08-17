 <!-- Footer -->
    <footer class="bg-gradient-to-r from-green-900 to-green-700 text-white pt-10 pb-6 px-4 mt-16">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row md:justify-between gap-8">
            <!-- About -->
            <div class="flex-1 mb-8 md:mb-0">
                <div class="flex items-center mb-3">
                    <img src="https://img.icons8.com/color/96/000000/brain.png" alt="Logo"
                        class="h-10 w-10 rounded-full mr-2 shadow-lg border-2 border-white" />
                    <span class="logo-text text-white bg-none text-2xl">MCQs Mind</span>
                </div>
                <p class="text-gray-200 text-sm mb-2">
                    MCQs Mind is Pakistan's leading MCQs and quiz platform for all competitive exams, interviews, and
                    academic subjects. Access thousands of expertly crafted MCQs, past papers, and quizzes for CSS, PMS,
                    PPSC, FPSC, NTS, and more.
                </p>
                <div class="flex space-x-4 mt-2">
                    <a href="#" class="hover:text-yellow-300"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="hover:text-yellow-300"><i class="fab fa-x-twitter"></i></a>
                    <a href="#" class="hover:text-yellow-300"><i class="fab fa-youtube"></i></a>
                    <a href="#" class="hover:text-yellow-300"><i class="fab fa-tiktok"></i></a>
                    <a href="#" class="hover:text-yellow-300"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
            <!-- Quick Links -->
            <div class="flex-1">
                <h3 class="font-semibold text-lg mb-3 flex items-center gap-2"><i class="fas fa-link"></i> Quick Links
                </h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-yellow-300 flex items-center"><i
                                class="fas fa-home mr-2"></i>Home</a></li>
                    <li><a href="#" class="hover:text-yellow-300 flex items-center"><i
                                class="fas fa-info-circle mr-2"></i>About Us</a></li>
                    <li><a href="#" class="hover:text-yellow-300 flex items-center"><i
                                class="fas fa-envelope mr-2"></i>Contact Us</a></li>
                    <li><a href="#" class="hover:text-yellow-300 flex items-center"><i
                                class="fas fa-shield-alt mr-2"></i>Privacy Policy</a></li>
                </ul>
            </div>
            <!-- Useful Resources -->
            <div class="flex-1">
                <h3 class="font-semibold text-lg mb-3 flex items-center gap-2"><i class="fas fa-book"></i> Useful
                    Resources</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-yellow-300 flex items-center"><i
                                class="fas fa-users mr-2"></i>Community Forum</a></li>
                    <li><a href="#" class="hover:text-yellow-300 flex items-center"><i
                                class="fas fa-lightbulb mr-2"></i>Preparation Tips</a></li>
                </ul>
            </div>
            <!-- Newsletter Subscription -->
            <div class="flex-1">
                <h3 class="font-semibold text-lg mb-3 flex items-center gap-2"><i class="fas fa-envelope"></i>
                    Newsletter</h3>
                <p class="text-gray-200 text-sm mb-2">Subscribe to get the latest MCQs, quizzes, and updates directly
                    in your inbox!</p>
                <form class="flex flex-col sm:flex-row items-center gap-2" onsubmit="newsletterAlert(event)">
                    <input type="email" required placeholder="Enter your email"
                        class="newsletter-input px-4 py-2 rounded text-black w-full sm:w-auto" />
                    <button type="submit"
                        class="px-4 py-2 bg-yellow-300 text-green-900 font-semibold rounded hover:bg-yellow-400 transition">Subscribe</button>
                </form>
                <div id="newsletter-success" class="hidden mt-2 text-green-200"></div>
            </div>
        </div>
        <div class="border-t border-green-600 mt-8 pt-4 text-sm text-center text-gray-300">
            <div class="flex flex-wrap items-center justify-center gap-4 mb-2">
                <span>Copyright © 2025 MCQs Mind. All rights reserved.</span>
                <span>
                    <i class="fas fa-lock mr-1"></i>
                    Secure & Reliable | <i class="fas fa-check-circle mr-1"></i> Trusted by thousands
                </span>
            </div>
            <div class="flex justify-center gap-2 mt-2">
                <img src="https://img.icons8.com/fluency/48/multiple-choice.png" class="h-6" alt="MCQs Icon"
                    title="Multiple Choice" />
                <img src="https://img.icons8.com/fluency/48/question-mark.png" class="h-6" alt="Question Icon"
                    title="Quiz" />
                <img src="https://img.icons8.com/fluency/48/brainstorm.png" class="h-6" alt="Brainstorm Icon"
                    title="Brain" />
                <img src="https://img.icons8.com/fluency/48/checked-checkbox.png" class="h-6" alt="Checkbox Icon"
                    title="Answer" />
                <img src="https://img.icons8.com/fluency/48/exam.png" class="h-6" alt="Exam Icon"
                    title="Exam" />
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Newsletter alert with email validation
        function newsletterAlert(event) {
            event.preventDefault();
            const emailInput = event.target.querySelector('input[type="email"]');
            const email = emailInput.value;
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const successDiv = document.getElementById('newsletter-success');
            if (emailRegex.test(email)) {
                successDiv.textContent = "Thank you for subscribing! Please check your email for confirmation.";
                successDiv.classList.remove('hidden');
                emailInput.value = ''; // Clear the input
            } else {
                successDiv.textContent = "Please enter a valid email address.";
                successDiv.classList.remove('hidden');
            }
        }
    </script>
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function () {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>

</body>

</html>