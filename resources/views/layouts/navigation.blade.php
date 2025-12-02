<div class="flex flex-col h-full bg-gradient-to-b from-slate-800 to-slate-900 text-white shadow-xl">

    <!-- Sidebar Header -->
    <div class="p-4 bg-gradient-to-r from-slate-700 to-slate-600 border-b border-slate-500 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                <i class="fa fa-graduation-cap text-white text-sm"></i>
            </div>
            <h1 class="text-lg font-bold text-slate-100">SMK Kesatuan</h1>
        </div>
        <button @click="$dispatch('close-sidebar')" class="lg:hidden text-slate-400 hover:text-white transition-colors duration-200">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>

    <!-- MENU ITEMS -->
    <nav class="flex-grow p-4 space-y-2">

        <a href="{{ route('dashboard') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-gradient-to-r from-blue-600 to-blue-700 border-l-4 border-blue-400 shadow-md text-white' : 'hover:bg-gradient-to-r hover:from-slate-700 hover:to-slate-600' }} transition-all duration-300 hover:shadow-lg hover:scale-105">
            <i class="fa fa-home"></i> Dashboard
        </a>

        <a href="{{ route('tahun-ajar.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('tahun-ajar.*') ? 'bg-gradient-to-r from-blue-600 to-blue-700 border-l-4 border-blue-400 shadow-md text-white' : 'hover:bg-gradient-to-r hover:from-slate-700 hover:to-slate-600' }} transition-all duration-300 hover:shadow-md hover:scale-105">
            <i class="fa fa-calendar"></i> Tahun Ajar
        </a>

        <a href="{{ route('jurusan.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('jurusan.*') ? 'bg-gradient-to-r from-blue-600 to-blue-700 border-l-4 border-blue-400 shadow-md text-white' : 'hover:bg-gradient-to-r hover:from-slate-700 hover:to-slate-600' }} transition-all duration-300 hover:shadow-md hover:scale-105">
            <i class="fa fa-building"></i> Jurusan
        </a>

        <a href="{{ route('kelas.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('kelas.*') ? 'bg-gradient-to-r from-blue-600 to-blue-700 border-l-4 border-blue-400 shadow-md text-white' : 'hover:bg-gradient-to-r hover:from-slate-700 hover:to-slate-600' }} transition-all duration-300 hover:shadow-md hover:scale-105">
            <i class="fa fa-book"></i> Kelas
        </a>

        <a href="{{ route('siswa.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('siswa.*') ? 'bg-gradient-to-r from-blue-600 to-blue-700 border-l-4 border-blue-400 shadow-md text-white' : 'hover:bg-gradient-to-r hover:from-slate-700 hover:to-slate-600' }} transition-all duration-300 hover:shadow-md hover:scale-105">
            <i class="fa fa-users"></i> Siswa
        </a>

        <a href="{{ route('user.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('user.*') ? 'bg-gradient-to-r from-blue-600 to-blue-700 border-l-4 border-blue-400 shadow-md text-white' : 'hover:bg-gradient-to-r hover:from-slate-700 hover:to-slate-600' }} transition-all duration-300 hover:shadow-md hover:scale-105">
            <i class="fa fa-user"></i> User
        </a>

    </nav>

    <!-- LOGOUT -->
    <div class="p-4 border-t border-slate-500">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gradient-to-r hover:from-red-600 hover:to-red-700 transition-all duration-300 hover:shadow-md hover:scale-105 w-full text-left">
                <i class="fa fa-sign-out"></i> Logout
            </button>
        </form>
    </div>

</div>
