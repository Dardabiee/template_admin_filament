<!DOCTYPE html>
<html lang="id">

<head>
    <script>
        (function() {
            var theme = localStorage.getItem('theme');
            if (theme === 'dark' || (!theme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        })();
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Non Core</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   @vite('resources/css/app.css')
    <link rel="icon" type="image/webp" href="../images/logo-holding Background Removed.png">

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#eff6ff',
                            500: '#3b82f6',
                            600: '#2563eb',
                            900: '#1e3a8a',
                        }
                    },
                    keyframes: {
                        shimmer: {
                            '0%': { transform: 'translateX(-100%)' },
                            '100%': { transform: 'translateX(100%)' }
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
                        }
                    },
                    animation: {
                        shimmer: 'shimmer 1.5s infinite cubic-bezier(0.4, 0, 0.2, 1)',
                        float: 'float 3s ease-in-out infinite',
                    }
                }
            }
        }
    </script>

    <style>
        .glass-card {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.4);
        }

        .dark .glass-card {
            background: rgba(30, 41, 59, 0.75);
            border: 1px solid rgba(71, 85, 105, 0.4);
        }

        * {
            transition: background-color 0.3s ease, border-color 0.3s ease, color 0.3s ease;
        }

        /* Custom scrollbar for aesthetic */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }

        .dark ::-webkit-scrollbar-thumb {
            background: #475569;
        }
        
        /* Prevent scroll during loading */
        body.loading-active {
            overflow: hidden;
        }
    </style>
</head>

<body
    class="loading-active bg-slate-50 text-slate-800 dark:bg-slate-900 dark:text-slate-100 min-h-screen flex flex-col antialiased bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] dark:bg-none">

    <!-- Loading Screen Start -->
    <div id="pageLoader" class="fixed inset-0 z-[9999] flex flex-col items-center justify-center bg-slate-50 dark:bg-slate-900 transition-all duration-700 ease-in-out opacity-100 backdrop-blur-sm">
        <div class="flex flex-col items-center animate-float">
            <!-- Ganti src di bawah dengan path logo utama yang Anda inginkan -->
            <img src="../images/logo-holding Background Removed.png" alt="Logo Loading" class="w-24 h-24 md:w-28 md:h-28 object-contain mb-8 drop-shadow-xl">
            
            <div class="flex flex-col items-center w-48">
                <div class="w-full h-1.5 bg-slate-200 dark:bg-slate-800 rounded-full overflow-hidden mb-3">
                    <div class="w-full h-full bg-gradient-to-r from-brand-500 to-blue-600 origin-left animate-shimmer rounded-full"></div>
                </div>
                <p class="text-sm font-medium text-slate-500 dark:text-slate-400 tracking-widest uppercase animate-pulse">Menyiapkan Portal</p>
            </div>
        </div>
    </div>
    <!-- Loading Screen End -->

    <nav class="sticky top-0 z-50 glass-card shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20 gap-4">

                <div class="flex-shrink-0">
                    <a href="/admin/login"
                        class="group relative inline-flex items-center justify-center px-6 py-2.5 text-sm font-semibold text-white transition-all duration-300 ease-out bg-gradient-to-r from-brand-500 to-blue-500 rounded-full shadow-md shadow-brand-500/30 hover:shadow-lg hover:shadow-brand-500/50 hover:-translate-y-0.5 hover:scale-105 active:scale-95 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2 dark:focus:ring-offset-slate-900">
                        <i
                            class="fas fa-sign-in-alt mr-2 text-base transition-transform duration-300 group-hover:translate-x-0.5"></i>
                        <span>Login</span>
                    </a>
                </div>

                <div class="flex items-center justify-end flex-1 gap-2 sm:gap-4">

                    <div class="relative w-full max-w-[180px] sm:max-w-xs md:max-w-sm">
                        <input type="text" id="searchInput" placeholder="Cari 9 sub bisnis..."
                            class="w-full pl-10 pr-4 py-2.5 rounded-full border border-slate-200 dark:border-slate-700 bg-white/50 dark:bg-slate-800/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-brand-500 text-sm shadow-sm transition-all">
                        <svg class="w-4 h-4 text-slate-400 absolute left-4 top-3.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>

                    {{-- <button id="themeToggle"
                        class="p-2.5 rounded-full bg-white dark:bg-slate-800 shadow-sm border border-slate-200 dark:border-slate-700 hover:text-brand-500 hover:scale-105 active:scale-95 transition-all duration-300 flex-shrink-0">
                        <svg id="sunIcon" class="w-5 h-5 hidden dark:block text-amber-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                        <svg id="moonIcon" class="w-5 h-5 block dark:hidden text-slate-600" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                            </path>
                        </svg>
                    </button> --}}

                </div>

            </div>
        </div>
    </nav>

    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 w-full">
        <div class="mb-10 text-center md:text-left flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <h1 class="text-4xl font-bold mb-3">Portal <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-brand-500 to-blue-600">Non-Core</span>
                </h1>
                <p class="text-slate-500 dark:text-slate-400 max-w-2xl text-lg">Akses cepat ke seluruh unit bisnis
                    Non-Core</p>
            </div>
            <div class="relative block sm:hidden mt-4">
                <input type="text" id="searchInputMobile" placeholder="Cari unit bisnis..."
                    class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-brand-500 text-sm shadow-sm">
                <svg class="w-5 h-5 text-slate-400 absolute left-3 top-3" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div>

        <div id="gridContainer" class="flex flex-wrap justify-center gap-6">

            <div class="business-card w-full md:w-[calc(50%-0.75rem)] xl:w-[calc(33.333%-1rem)] group glass-card rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-5 pb-5 border-b border-slate-200 dark:border-slate-700/50">
                    <div class="h-10 w-28 sm:h-12 sm:w-32 flex-shrink-0 flex items-center justify-start">
                        <img src="assets/img/sub-bisnis/pengenumroh/logo.png" alt="Logo PU" class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300 origin-left">
                    </div>
                    <div>
                        <h2 class="text-lg font-bold card-title leading-tight">Pengenumroh.com</h2>
                        <span class="text-xs text-brand-500 font-medium">Penyedia Umroh & Haji Khusus</span>
                    </div>
                </div>
                <ul class="space-y-2">
                    <li><a target="_blank" href="https://pengenumroh.com/" class="flex items-center justify-between p-2.5 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                            <span class="font-medium text-sm">Company Profile</span>
                            <span class="text-xs bg-slate-200 dark:bg-slate-700 px-2 py-1 rounded-md">Web</span>
                        </a></li>
                    <li><a target="_blank" href="https://produk.pengenumroh.com/" class="flex items-center justify-between p-2.5 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                            <span class="font-medium text-sm">Marketplace</span>
                            <span class="text-xs bg-slate-200 dark:bg-slate-700 px-2 py-1 rounded-md">Web</span>
                        </a></li>
                    <li><a target="_blank" href="https://agen.pengenumroh.com/" class="flex items-center justify-between p-2.5 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                            <span class="font-medium text-sm">Agen</span>
                            <span class="text-xs bg-slate-200 dark:bg-slate-700 px-2 py-1 rounded-md">Web</span>
                        </a></li>
                    <li><a target="_blank" href="https://karir.pengenumroh.com/" class="flex items-center justify-between p-2.5 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                            <span class="font-medium text-sm">Karir</span>
                            <span class="text-xs bg-slate-200 dark:bg-slate-700 px-2 py-1 rounded-md">Web</span>
                        </a></li>
                </ul>
            </div>

            <div class="business-card w-full md:w-[calc(50%-0.75rem)] xl:w-[calc(33.333%-1rem)] group glass-card rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-5 pb-5 border-b border-slate-200 dark:border-slate-700/50">
                    <div class="h-10 w-28 sm:h-12 sm:w-32 flex-shrink-0 flex items-center justify-start">
                        <img src="assets/img/sub-bisnis/samlog/logo.png" alt="Logo Global" class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300 origin-left">
                    </div>
                    <div>
                        <h2 class="text-lg font-bold card-title leading-tight">Sahabat Multi Logistik</h2>
                        <span class="text-xs text-brand-500 font-medium">Penyedia Layanan Logistik</span>
                    </div>
                </div>
                <ul class="space-y-2">
                    <li><a target="_blank" href="https://sahabatmulti.com/" class="flex items-center justify-between p-2.5 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                            <span class="font-medium text-sm">Company Profile</span>
                            <span class="text-xs bg-slate-200 dark:bg-slate-700 px-2 py-1 rounded-md">Web</span>
                        </a></li>
                    <li><a target="_blank" href="https://karir.sahabatmulti.com/" class="flex items-center justify-between p-2.5 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                            <span class="font-medium text-sm">Karir</span>
                            <span class="text-xs bg-slate-200 dark:bg-slate-700 px-2 py-1 rounded-md">Web</span>
                        </a></li>
                </ul>
            </div>

            <div class="business-card w-full md:w-[calc(50%-0.75rem)] xl:w-[calc(33.333%-1rem)] group glass-card rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-5 pb-5 border-b border-slate-200 dark:border-slate-700/50">
                    <div class="h-10 w-28 sm:h-12 sm:w-32 flex-shrink-0 flex items-center justify-start">
                        <img src="assets/img/sub-bisnis/sebelaswarna/logo.webp" alt="Logo Finance" class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300 origin-left">
                    </div>
                    <div>
                        <h2 class="text-lg font-bold card-title leading-tight">Sebelaswarna</h2>
                        <span class="text-xs text-brand-500 font-medium">Event Organizer (EO)</span>
                    </div>
                </div>
                <ul class="space-y-2">
                    <li><a target="_blank" href="https://sebelaswarna.com/" class="flex items-center justify-between p-2.5 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                            <span class="font-medium text-sm">Company Profile</span>
                            <span class="text-xs bg-slate-200 dark:bg-slate-700 px-2 py-1 rounded-md">Web</span>
                        </a></li>
                </ul>
            </div>

            <div class="business-card w-full md:w-[calc(50%-0.75rem)] xl:w-[calc(33.333%-1rem)] group glass-card rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-5 pb-5 border-b border-slate-200 dark:border-slate-700/50">
                    <div class="h-10 w-28 sm:h-12 sm:w-32 flex-shrink-0 flex items-center justify-start">
                        <img src="assets/img/sub-bisnis/mobileautocare/logo.webp" alt="Logo Global" class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300 origin-left">
                    </div>
                    <div>
                        <h2 class="text-lg font-bold card-title leading-tight">Mobileautocare (MAC)</h2>
                        <span class="text-xs text-brand-500 font-medium">Perawatan Kendaraan</span>
                    </div>
                </div>
                <ul class="space-y-2">
                    <li><a target="_blank" href="https://mobileautocare.co.id/" class="flex items-center justify-between p-2.5 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                            <span class="font-medium text-sm">Company Profile</span>
                            <span class="text-xs bg-slate-200 dark:bg-slate-700 px-2 py-1 rounded-md">Web</span>
                        </a></li>
                </ul>
            </div>

            <div class="business-card w-full md:w-[calc(50%-0.75rem)] xl:w-[calc(33.333%-1rem)] group glass-card rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-5 pb-5 border-b border-slate-200 dark:border-slate-700/50">
                    <div class="h-10 w-28 sm:h-12 sm:w-32 flex-shrink-0 flex items-center justify-start">
                        <img src="assets/img/sub-bisnis/sobatwisata/logo.png" alt="Logo Sobatwisata" class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300 origin-left dark:hidden">
                        <img src="assets/img/sub-bisnis/sobatwisata/logo-putih.png" alt="Logo Sobatwisata White" class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300 origin-left hidden dark:block">
                    </div>
                    <div>
                        <h2 class="text-lg font-bold card-title leading-tight">Sobatwisata</h2>
                        <span class="text-xs text-brand-500 font-medium">Penyedia layanan transportasi</span>
                    </div>
                </div>
                <ul class="space-y-2">
                    <li><a target="_blank" href="https://www.sobatwisata.id/" class="flex items-center justify-between p-2.5 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                            <span class="font-medium text-sm">Company Profile</span>
                            <span class="text-xs bg-slate-200 dark:bg-slate-700 px-2 py-1 rounded-md">Web</span>
                        </a></li>
                </ul>
            </div>

            <div class="business-card w-full md:w-[calc(50%-0.75rem)] xl:w-[calc(33.333%-1rem)] group glass-card rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-5 pb-5 border-b border-slate-200 dark:border-slate-700/50">
                    <div class="h-10 w-28 sm:h-12 sm:w-32 flex-shrink-0 flex items-center justify-start">
                        <img src="assets/img/sub-bisnis/qubagift/logo.png" alt="Logo Logistik" class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300 origin-left">
                    </div>
                    <div>
                        <h2 class="text-lg font-bold card-title leading-tight">Qubagift</h2>
                        <span class="text-xs text-brand-500 font-medium">Penyedia Oleh-oleh Haji & Umrah</span>
                    </div>
                </div>
                <ul class="space-y-2">
                    <li><a target="_blank" href="https://www.qubagift.com/" class="flex items-center justify-between p-2.5 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                            <span class="font-medium text-sm">Company Profile</span>
                            <span class="text-xs bg-slate-200 dark:bg-slate-700 px-2 py-1 rounded-md">Web</span>
                        </a></li>
                </ul>
            </div>

            <div class="business-card w-full md:w-[calc(50%-0.75rem)] xl:w-[calc(33.333%-1rem)] group glass-card rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-5 pb-5 border-b border-slate-200 dark:border-slate-700/50">
                    <div class="h-10 w-28 sm:h-12 sm:w-32 flex-shrink-0 flex items-center justify-start">
                        <img src="assets/img/sub-bisnis/bymoment/logo.webp" alt="Logo Bymoment" class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300 origin-left dark:hidden">
                        <img src="assets/img/sub-bisnis/bymoment/logo-putih.webp" alt="Logo Bymoment White" class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300 origin-left hidden dark:block">
                    </div>
                    <div>
                        <h2 class="text-lg font-bold card-title leading-tight">Bymoment</h2>
                        <span class="text-xs text-brand-500 font-medium">Wedding Organizer (WO)</span>
                    </div>
                </div>
                <ul class="space-y-2">
                    <li><a target="_blank" href="https://www.bymoment.id/" class="flex items-center justify-between p-2.5 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                            <span class="font-medium text-sm">Company Profile</span>
                            <span class="text-xs bg-slate-200 dark:bg-slate-700 px-2 py-1 rounded-md">Web</span>
                        </a></li>
                </ul>
            </div>

            <div class="business-card w-full md:w-[calc(50%-0.75rem)] xl:w-[calc(33.333%-1rem)] group glass-card rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-5 pb-5 border-b border-slate-200 dark:border-slate-700/50">
                    <div class="h-10 w-28 sm:h-12 sm:w-32 flex-shrink-0 flex items-center justify-start">
                        <img src="assets/img/sub-bisnis/carstensz/logo.png" alt="Logo CS" class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300 origin-left">
                    </div>
                    <div>
                        <h2 class="text-lg font-bold card-title leading-tight">Carstensz Trans</h2>
                        <span class="text-xs text-brand-500 font-medium">Penyedia layanan transportasi</span>
                    </div>
                </div>
                <ul class="space-y-2">
                    <li><a target="_blank" href="https://carstensztrans.co.id/" class="flex items-center justify-between p-2.5 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                            <span class="font-medium text-sm">Company Profile</span>
                            <span class="text-xs bg-slate-200 dark:bg-slate-700 px-2 py-1 rounded-md">Web</span>
                        </a></li>
                </ul>
            </div>

            <div class="business-card w-full md:w-[calc(50%-0.75rem)] xl:w-[calc(33.333%-1rem)] group glass-card rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-5 pb-5 border-b border-slate-200 dark:border-slate-700/50">
                    <div class="h-10 w-28 sm:h-12 sm:w-32 flex-shrink-0 flex items-center justify-start">
                        <img src="assets/img/sub-bisnis/navigeta/logo.png" alt="Logo Global" class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300 origin-left">
                    </div>
                    <div>
                        <h2 class="text-lg font-bold card-title leading-tight">Navigeta</h2>
                        <span class="text-xs text-brand-500 font-medium">Armada Transportasi Online</span>
                    </div>
                </div>
                <ul class="space-y-2">
                    <li><a href="https://navigeta.id/" class="flex items-center justify-between p-2.5 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                            <span class="font-medium text-sm">Company Profile</span>
                            <span class="text-xs bg-slate-200 dark:bg-slate-700 px-2 py-1 rounded-md">Web</span>
                        </a></li>
                </ul>
            </div>

            <div class="business-card w-full md:w-[calc(50%-0.75rem)] xl:w-[calc(33.333%-1rem)] group glass-card rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-5 pb-5 border-b border-slate-200 dark:border-slate-700/50">
                    <div class="h-10 w-28 sm:h-12 sm:w-32 flex-shrink-0 flex items-center justify-start">
                        <img src="assets/img/sub-bisnis/hayfamadina/hayfamadina.png" alt="Logo HayfaMadina" class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300 origin-left">
                    </div>
                    <div>
                        <h2 class="text-lg font-bold card-title leading-tight">Hayfa Madina</h2>
                        <span class="text-xs text-brand-500 font-medium">Penyedia Umroh & Haji</span>
                    </div>
                </div>
                <ul class="space-y-2">
                    <li><a href="https://www.hayfamadina.id/" class="flex items-center justify-between p-2.5 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                            <span class="font-medium text-sm">Company Profile</span>
                            <span class="text-xs bg-slate-200 dark:bg-slate-700 px-2 py-1 rounded-md">Web</span>
                        </a></li>
                </ul>
            </div>

        </div>

        <div id="emptyState" class="hidden text-center py-20 w-full">
            <svg class="w-16 h-16 mx-auto text-slate-300 dark:text-slate-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <h3 class="text-xl font-semibold">Unit bisnis tidak ditemukan</h3>
            <p class="text-slate-500 mt-2">Coba gunakan kata kunci pencarian yang lain.</p>
        </div>

    </main>

    <footer class="border-t border-slate-200 dark:border-slate-800/50 py-8 mt-auto backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 text-center text-slate-500 dark:text-slate-400 text-sm">
            &copy; 2026 Non-Core Portal. All rights reserved. Designed By IT Dept
        </div>
    </footer>

    <script>
        // Loading Screen Logic
        window.addEventListener('DOMContentLoaded', () => {
            const loader = document.getElementById('pageLoader');
            const body = document.body;

            setTimeout(() => {
                loader.classList.remove('opacity-100');
                loader.classList.add('opacity-0', 'pointer-events-none'); // Disable interaksi saat fade out
                
                setTimeout(() => {
                    loader.style.display = 'none';
                    body.classList.remove('loading-active'); // Mengembalikan scroll bar
                }, 700); // Menyesuaikan dengan durasi tailwind transition (duration-700)
            }, 3000); // Tampil 3 Detik
        });

        // Theme Logic
        const themeToggleBtn = document.getElementById('themeToggle');
        const htmlElement = document.documentElement;

        if (themeToggleBtn) {
            themeToggleBtn.addEventListener('click', () => {
                htmlElement.classList.toggle('dark');
                localStorage.setItem('theme', htmlElement.classList.contains('dark') ? 'dark' : 'light');
            });
        }

        // Search Logic
        const searchInputDesktop = document.getElementById('searchInput');
        const searchInputMobile = document.getElementById('searchInputMobile');
        const cards = document.querySelectorAll('.business-card');
        const emptyState = document.getElementById('emptyState');

        function performSearch(e) {
            const searchTerm = e.target.value.toLowerCase();
            let visibleCount = 0;

            if (e.target.id === 'searchInput') searchInputMobile.value = searchTerm;
            if (e.target.id === 'searchInputMobile') searchInputDesktop.value = searchTerm;

            cards.forEach(card => {
                const textContent = card.innerText.toLowerCase();
                if (textContent.includes(searchTerm)) {
                    card.style.display = 'block'; 
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            emptyState.classList.toggle('hidden', visibleCount !== 0);
        }

        searchInputDesktop.addEventListener('input', performSearch);
        if (searchInputMobile) searchInputMobile.addEventListener('input', performSearch);
    </script>
</body>

</html>