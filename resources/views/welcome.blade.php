<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MySchool System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .fade-in {
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="antialiased bg-gray-100 dark:bg-gray-900">

    <!-- HERO SECTION -->
    <section class="relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-600 to-blue-500 opacity-90"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 py-32 text-center text-white fade-in">
            <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight">
               SMK Kesatuan Mandiri
            </h1>
            <p class="mt-4 text-lg md:text-xl opacity-90">
                Sistem pendataan siswa, kelas, jurusan, dan tahun ajaran yang modern, cepat, dan mudah digunakan.
            </p>

            <div class="mt-8 flex justify-center space-x-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                           class="px-6 py-3 rounded-xl bg-white text-indigo-700 font-semibold shadow hover:bg-gray-100 transition">
                            Go to Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="px-6 py-3 rounded-xl bg-white text-indigo-700 font-semibold shadow hover:bg-gray-100 transition">
                            Login
                        </a>
                        <a href="{{ route('register') }}"
                           class="px-6 py-3 rounded-xl border-2 border-white text-white font-semibold rounded-xl hover:bg-white hover:text-indigo-700 transition">
                            Register
                        </a>
                    @endauth
                @endif
            </div>
        </div>
    </section>

    <!-- FEATURES SECTION -->
    <section class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-100 fade-in">
                Fitur Utama Sistem
            </h2>

            <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-8 fade-in">

                <div class="bg-white dark:bg-gray-900 p-8 rounded-xl shadow hover:shadow-md transition">
                    <div class="text-indigo-600 dark:text-indigo-400 text-4xl mb-4">📚</div>
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100">
                        Manajemen Data Siswa
                    </h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">
                        Kelola data siswa dengan cepat, rapi, dan terstruktur.
                    </p>
                </div>

                <div class="bg-white dark:bg-gray-900 p-8 rounded-xl shadow hover:shadow-md transition">
                    <div class="text-indigo-600 dark:text-indigo-400 text-4xl mb-4">🏫</div>
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100">
                        Manajemen Kelas & Jurusan
                    </h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">
                        Atur kelas dan jurusan dengan mudah dan cepat.
                    </p>
                </div>

                <div class="bg-white dark:bg-gray-900 p-8 rounded-xl shadow hover:shadow-md transition">
                    <div class="text-indigo-600 dark:text-indigo-400 text-4xl mb-4">📊</div>
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100">
                        Dashboard Statistik
                    </h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">
                        Pantau data penting melalui dashboard visual.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="py-8 bg-gray-900 text-center text-gray-400">
        <p>© {{ date('Y') }} MySchool System. All rights reserved.</p>
    </footer>

</body>
</html>
