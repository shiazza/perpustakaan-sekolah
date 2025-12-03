<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T-Book - Modern School Library System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brown': {
                            50: '#fdf8f6',
                            100: '#f2e8e5',
                            200: '#eaddd7',
                            300: '#e0cec7',
                            400: '#d2bab0',
                            500: '#bfa094',
                            600: '#a18072',
                            700: '#977669',
                            800: '#846358',
                            900: '#43302b',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .gradient-bg { background: linear-gradient(135deg, #a18072 0%, #846358 100%); }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-4px); box-shadow: 0 10px 25px rgba(129, 99, 88, 0.15); }
        .fade-in { animation: fadeIn 0.6s ease-in; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(15px); } to { opacity: 1; transform: translateY(0); } }
        .smooth-scroll { scroll-behavior: smooth; }
    </style>
</head>
<body class="bg-brown-50 smooth-scroll">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm fixed w-full top-0 z-50 border-b border-brown-100">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <span class="text-2xl font-bold text-brown-700">T-Book</span>
                </div>
                <div class="hidden md:flex items-center space-x-6">
                    <a href="#features" class="text-brown-700 hover:text-brown-900 text-sm font-medium transition">Features</a>
                    <a href="#how-it-works" class="text-brown-700 hover:text-brown-900 text-sm font-medium transition">How It Works</a>
                    <a href="#benefits" class="text-brown-700 hover:text-brown-900 text-sm font-medium transition">Benefits</a>
                    <a href="#contact" class="text-brown-700 hover:text-brown-900 text-sm font-medium transition">Contact</a>
                    <button class="bg-brown-600 text-white px-5 py-2 rounded-lg text-sm font-medium hover:bg-brown-700 transition">Login</button>
                    <button class="bg-brown-600 text-white px-5 py-2 rounded-lg text-sm font-medium hover:bg-brown-700 transition">Register</button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative pt-24 pb-20 px-4 overflow-hidden bg-gradient-to-br from-brown-50 via-brown-100 to-brown-200">
        <!-- Decorative Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="book-pattern" x="0" y="0" width="100" height="100" patternUnits="userSpaceOnUse">
                        <path d="M20 30 L20 70 M25 30 L25 70 M30 30 L30 70 M35 30 L35 70" stroke="#a18072" stroke-width="2" fill="none"/>
                        <rect x="18" y="28" width="20" height="44" stroke="#a18072" stroke-width="2" fill="none" rx="2"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#book-pattern)"/>
            </svg>
        </div>
        
        <div class="max-w-6xl mx-auto relative z-10">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div class="fade-in">
                    <div class="inline-block bg-brown-600 text-white px-4 py-1 rounded-full text-xs font-semibold mb-4">
                        🎓 Trusted by 500+ Schools
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold text-brown-900 mb-4 leading-tight">
                        Your School Library,
                        <span class="text-brown-600"> Reimagined</span>
                    </h1>
                    <p class="text-lg text-brown-700 mb-6">
                        Transform your traditional library into a modern digital hub. Empower students to borrow books online, anytime, anywhere.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-3 mb-8">
                        <button class="bg-brown-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-brown-700 transition shadow-lg flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                            Start Free Trial
                        </button>
                        <button class="bg-white border-2 border-brown-300 text-brown-700 px-6 py-3 rounded-lg font-semibold hover:border-brown-400 transition flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Watch Demo
                        </button>
                    </div>
                    <div class="flex items-center gap-6 text-sm text-brown-700">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-brown-600 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <span>4.9/5 Rating</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-brown-600 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>No Credit Card</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-brown-600 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Setup in 5 min</span>
                        </div>
                    </div>
                </div>

                <!-- Right Illustration/Visual -->
                <div class="relative fade-in">
                    <!-- Book Stack Illustration -->
                    <div class="relative">
                        <!-- Main Card -->
                        <div class="bg-white rounded-2xl shadow-2xl p-8 transform rotate-2">
                            <div class="bg-gradient-to-br from-brown-500 to-brown-700 rounded-xl p-6 mb-4">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center">
                                        <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <div class="text-white font-bold text-lg">T-Book</div>
                                            <div class="text-brown-200 text-xs">Digital Library</div>
                                        </div>
                                    </div>
                                    <div class="bg-green-400 text-green-900 px-3 py-1 rounded-full text-xs font-bold">
                                        Available
                                    </div>
                                </div>
                                <div class="h-32 bg-white bg-opacity-10 rounded-lg mb-4 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                </div>
                                <div class="text-white font-semibold mb-1">The Great Gatsby</div>
                                <div class="text-brown-200 text-sm">by F. Scott Fitzgerald</div>
                            </div>
                            <button class="w-full bg-brown-600 text-white py-3 rounded-lg font-semibold hover:bg-brown-700 transition">
                                Borrow Now
                            </button>
                        </div>
                        
                        <!-- Floating Stats -->
                        <div class="absolute -top-4 -right-4 bg-white rounded-xl shadow-lg p-4 transform -rotate-6">
                            <div class="text-2xl font-bold text-brown-700">1M+</div>
                            <div class="text-xs text-brown-600">Books Borrowed</div>
                        </div>
                        
                        <div class="absolute -bottom-4 -left-4 bg-white rounded-xl shadow-lg p-4 transform rotate-6">
                            <div class="flex items-center">
                                <div class="flex -space-x-2 mr-3">
                                    <div class="w-8 h-8 bg-brown-400 rounded-full border-2 border-white"></div>
                                    <div class="w-8 h-8 bg-brown-500 rounded-full border-2 border-white"></div>
                                    <div class="w-8 h-8 bg-brown-600 rounded-full border-2 border-white"></div>
                                </div>
                                <div>
                                    <div class="text-sm font-bold text-brown-700">50K+</div>
                                    <div class="text-xs text-brown-600">Students</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wave Separator -->
        <div class="absolute bottom-0 left-0 w-full">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 120L60 110C120 100 240 80 360 70C480 60 600 60 720 65C840 70 960 80 1080 85C1200 90 1320 90 1380 90L1440 90V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="white"/>
            </svg>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-16 px-4 bg-white">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-brown-900 mb-2">Powerful Features</h2>
                <p class="text-brown-600">Everything you need to manage a modern school library</p>
            </div>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-brown-50 p-6 rounded-xl card-hover border border-brown-200">
                    <div class="w-12 h-12 bg-brown-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-brown-900 mb-2">Online Book Borrowing</h3>
                    <p class="text-brown-700 text-sm">Students can browse and borrow books directly from their devices. Simple, fast, and available 24/7.</p>
                </div>

                <div class="bg-brown-50 p-6 rounded-xl card-hover border border-brown-200">
                    <div class="w-12 h-12 bg-brown-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-brown-900 mb-2">Smart Search Engine</h3>
                    <p class="text-brown-700 text-sm">Advanced search filters by title, author, genre, and availability. Find the perfect book in seconds.</p>
                </div>

                <div class="bg-brown-50 p-6 rounded-xl card-hover border border-brown-200">
                    <div class="w-12 h-12 bg-brown-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-brown-900 mb-2">Real-Time Notifications</h3>
                    <p class="text-brown-700 text-sm">Automatic reminders for due dates, availability alerts, and new arrivals. Never miss a deadline.</p>
                </div>

                <div class="bg-brown-50 p-6 rounded-xl card-hover border border-brown-200">
                    <div class="w-12 h-12 bg-brown-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-brown-900 mb-2">Analytics Dashboard</h3>
                    <p class="text-brown-700 text-sm">Track borrowing trends, popular books, and student engagement with comprehensive reports.</p>
                </div>

                <div class="bg-brown-50 p-6 rounded-xl card-hover border border-brown-200">
                    <div class="w-12 h-12 bg-brown-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-brown-900 mb-2">Secure & Reliable</h3>
                    <p class="text-brown-700 text-sm">Bank-level security for student data. Cloud-based system ensures 99.9% uptime.</p>
                </div>

                <div class="bg-brown-50 p-6 rounded-xl card-hover border border-brown-200">
                    <div class="w-12 h-12 bg-brown-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-brown-900 mb-2">Mobile Friendly</h3>
                    <p class="text-brown-700 text-sm">Fully responsive design works seamlessly on smartphones, tablets, and desktops.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section id="how-it-works" class="py-16 px-4 bg-brown-50">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-brown-900 mb-2">How It Works</h2>
                <p class="text-brown-600">Get started in three simple steps</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-brown-600 rounded-full flex items-center justify-center text-2xl font-bold text-white mx-auto mb-4">1</div>
                    <h3 class="text-xl font-bold text-brown-900 mb-2">Browse Catalog</h3>
                    <p class="text-brown-700 text-sm">Explore thousands of books with our intuitive search and filter system. View availability in real-time.</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-brown-600 rounded-full flex items-center justify-center text-2xl font-bold text-white mx-auto mb-4">2</div>
                    <h3 class="text-xl font-bold text-brown-900 mb-2">Request Online</h3>
                    <p class="text-brown-700 text-sm">Submit your borrowing request with one click. Get instant confirmation and pickup details.</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-brown-600 rounded-full flex items-center justify-center text-2xl font-bold text-white mx-auto mb-4">3</div>
                    <h3 class="text-xl font-bold text-brown-900 mb-2">Collect & Enjoy</h3>
                    <p class="text-brown-700 text-sm">Pick up your book from the library counter or locker. Automatic reminders help you return on time.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section id="benefits" class="py-16 px-4 bg-white">
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-2 gap-10 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-brown-900 mb-6">Why Schools Love T-Book</h2>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-brown-600 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-3">
                                <h4 class="text-base font-semibold text-brown-900 mb-1">Reduce Administrative Work</h4>
                                <p class="text-brown-700 text-sm">Automate borrowing, returns, and overdue tracking. Save librarians hours every week.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-brown-600 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-3">
                                <h4 class="text-base font-semibold text-brown-900 mb-1">Increase Student Engagement</h4>
                                <p class="text-brown-700 text-sm">Students read 40% more when they can browse and reserve books online.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-brown-600 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-3">
                                <h4 class="text-base font-semibold text-brown-900 mb-1">Data-Driven Decisions</h4>
                                <p class="text-brown-700 text-sm">Make informed decisions about book purchases based on real borrowing data.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-brown-600 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-3">
                                <h4 class="text-base font-semibold text-brown-900 mb-1">Cost-Effective Solution</h4>
                                <p class="text-brown-700 text-sm">Affordable pricing with no hidden fees. Free training and ongoing support included.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-brown-100 to-brown-200 rounded-2xl p-8 shadow-lg">
                    <div class="text-center">
                        <div class="text-5xl font-bold text-brown-800 mb-3">500+</div>
                        <p class="text-lg text-brown-700 mb-6">Schools Already Trust T-Book</p>
                        <div class="space-y-3">
                            <div class="bg-white rounded-lg p-4 shadow-sm">
                                <div class="text-2xl font-bold text-brown-700 mb-1">50,000+</div>
                                <p class="text-brown-600 text-sm">Active Students</p>
                            </div>
                            <div class="bg-white rounded-lg p-4 shadow-sm">
                                <div class="text-2xl font-bold text-brown-700 mb-1">1M+</div>
                                <p class="text-brown-600 text-sm">Books Borrowed</p>
                            </div>
                            <div class="bg-white rounded-lg p-4 shadow-sm">
                                <div class="text-2xl font-bold text-brown-700 mb-1">99.9%</div>
                                <p class="text-brown-600 text-sm">Satisfaction Rate</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="gradient-bg py-16 px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Ready to Transform Your Library?</h2>
            <p class="text-lg text-brown-100 mb-6">Join hundreds of schools making reading accessible and fun for every student.</p>
            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <button class="bg-white text-brown-700 px-6 py-3 rounded-lg font-semibold hover:bg-brown-50 transition shadow-lg">Start 30-Day Free Trial</button>
                <button class="bg-brown-800 border border-brown-700 text-white px-6 py-3 rounded-lg font-semibold hover:bg-brown-900 transition">Schedule a Demo</button>
            </div>
            <p class="text-brown-100 text-sm mt-4">No credit card required • Setup in 5 minutes • Cancel anytime</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-16 px-4 bg-brown-50">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-brown-900 mb-2">Get In Touch</h2>
            <p class="text-brown-600 mb-10">Have questions? Our team is here to help.</p>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="w-12 h-12 bg-brown-600 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h4 class="font-semibold text-brown-900 mb-1 text-sm">Email Us</h4>
                    <p class="text-brown-700 text-sm">support@t-book.com</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="w-12 h-12 bg-brown-600 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                    </div>
                    <h4 class="font-semibold text-brown-900 mb-1 text-sm">Call Us</h4>
                    <p class="text-brown-700 text-sm">+1 (555) 123-4567</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="w-12 h-12 bg-brown-600 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h4 class="font-semibold text-brown-900 mb-1 text-sm">Visit Us</h4>
                    <p class="text-brown-700 text-sm">123 Education St, City</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-brown-900 text-white py-10 px-4">
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <div>
                    <h3 class="text-xl font-bold mb-3">T-Book</h3>
                    <p class="text-brown-300 text-sm">Empowering schools with modern library management solutions.</p>
                </div>
                <div>
                    <h4 class="font-semibold mb-3 text-sm">Product</h4>
                    <ul class="space-y-2 text-brown-300 text-sm">
                        <li><a href="#" class="hover:text-white transition">Features</a></li>
                        <li><a href="#" class="hover:text-white transition">Pricing</a></li>
                        <li><a href="#" class="hover:text-white transition">Demo</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-3 text-sm">Company</h4>
                    <ul class="space-y-2 text-brown-300 text-sm">
                        <li><a href="#" class="hover:text-white transition">About Us</a></li>
                        <li><a href="#" class="hover:text-white transition">Careers</a></li>
                        <li><a href="#" class="hover:text-white transition">Blog</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-3 text-sm">Support</h4>
                    <ul class="space-y-2 text-brown-300 text-sm">
                        <li><a href="#" class="hover:text-white transition">Help Center</a></li>
                        <li><a href="#" class="hover:text-white transition">Contact</a></li>
                        <li><a href="#" class="hover:text-white transition">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-brown-800 pt-6 text-center text-brown-400 text-sm">
                <p>&copy; 2024 T-Book. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>