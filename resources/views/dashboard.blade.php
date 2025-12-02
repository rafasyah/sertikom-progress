<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-blue-500">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="p-3 bg-blue-500 rounded-full">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                        Total Siswa
                                    </dt>
                                    <dd class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                                        {{ $totalSiswa }}
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-green-500">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="p-3 bg-green-500 rounded-full">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                        Total Jurusan
                                    </dt>
                                    <dd class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                                        {{ $totalJurusan }}
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-purple-500">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="p-3 bg-purple-500 rounded-full">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                        Total Kelas
                                    </dt>
                                    <dd class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                                        {{ $totalKelas }}
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-orange-500">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="p-3 bg-orange-500 rounded-full">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                        Total User
                                    </dt>
                                    <dd class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                                        {{ $totalUser }}
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           <!-- Siswa Terbaru and Distribusi Siswa Per Jurusan Side by Side -->
<div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-8">

    <!-- Siswa Terbaru -->
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg h-full flex flex-col">
        <div class="p-6 flex-grow flex flex-col">
            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Siswa Terbaru</h3>

            <!-- Mobile Card Layout -->
            <div class="block sm:hidden space-y-4">
                @forelse($latestSiswa as $siswa)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-4">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
                                        {{ $siswa->nisn }}
                                    </span>
                                </div>
                                <h3 class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $siswa->nama_lengkap }}</h3>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                    {{ $siswa->jurusan->nama_jurusan }} • {{ $siswa->kelas->nama_kelas }} • {{ $siswa->tahun_ajar->nama_tahun_ajar }}
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6 text-center">
                        <div class="flex flex-col items-center">
                            <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                            <h3 class="text-sm font-medium text-gray-900 dark:text-gray-100 mb-1">Belum ada data siswa</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Siswa terbaru akan muncul di sini.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Desktop Table Layout -->
            <div class="hidden sm:block overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 flex-grow">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 h-full">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-3 sm:px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">NISN</th>
                            <th class="px-3 sm:px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Nama</th>
                            <th class="hidden sm:table-cell px-3 sm:px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Jurusan</th>
                            <th class="hidden md:table-cell px-3 sm:px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Kelas</th>
                            <th class="hidden lg:table-cell px-3 sm:px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Tahun Ajar</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($latestSiswa as $siswa)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                                <td class="px-3 sm:px-6 py-4 text-sm font-medium text-gray-900 dark:text-gray-100">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
                                        {{ $siswa->nisn }}
                                    </span>
                                </td>
                                <td class="px-3 sm:px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                                    <div>{{ $siswa->nama_lengkap }}</div>
                                    <div class="sm:hidden text-xs text-gray-500 mt-1">
                                        {{ $siswa->jurusan->nama_jurusan }} • {{ $siswa->kelas->nama_kelas }}
                                    </div>
                                </td>
                                <td class="hidden sm:table-cell px-3 sm:px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $siswa->jurusan->nama_jurusan }}</td>
                                <td class="hidden md:table-cell px-3 sm:px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $siswa->kelas->nama_kelas }}</td>
                                <td class="hidden lg:table-cell px-3 sm:px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $siswa->tahun_ajar->nama_tahun_ajar }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                        </svg>
                                        <h3 class="text-sm font-medium text-gray-900 dark:text-gray-100 mb-1">Belum ada data siswa</h3>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Siswa terbaru akan muncul di sini.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

  <!-- Distribusi Siswa Per Jurusan (fixed, proportional, clickable small-text legend buttons) -->
<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6">
        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
            Distribusi Siswa Per Jurusan
        </h3>

        <!-- Chart Wrapper (responsive height) -->
        <div class="w-full flex justify-center">
            <div class="w-full max-w-md" style="height: 300px; min-height: 250px;">
                <canvas id="jurusanPieChart" aria-label="Distribusi Siswa Per Jurusan" role="img"></canvas>
            </div>
        </div>

        <!-- Proportional clickable legend buttons (small text) -->
        <div id="jurusanLegend" class="flex flex-wrap gap-2 justify-center mt-6"></div>
    </div>
</div>

<!-- single Chart.js include -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Data from server
    const dataJurusan = @json($siswaPerJurusan->pluck('siswa_count'));
    const labelJurusan = @json($siswaPerJurusan->pluck('nama_jurusan'));

    // Ensure we have enough colors for labels (generate extras if needed)
    const baseColors = [
        'rgba(255, 99, 132, 0.9)',
        'rgba(54, 162, 235, 0.9)',
        'rgba(255, 206, 86, 0.9)',
        'rgba(75, 192, 192, 0.9)',
        'rgba(153, 102, 255, 0.9)',
        'rgba(255, 159, 64, 0.9)',
        'rgba(99, 255, 132, 0.9)',
        'rgba(54, 99, 235, 0.9)'
    ];

    function randomColor(opacity = 0.9) {
        const r = Math.floor(80 + Math.random() * 160);
        const g = Math.floor(80 + Math.random() * 160);
        const b = Math.floor(80 + Math.random() * 160);
        return `rgba(${r}, ${g}, ${b}, ${opacity})`;
    }

    const colors = labelJurusan.map((_, i) => baseColors[i] ?? randomColor());

    // Chart setup
    const ctx = document.getElementById('jurusanPieChart').getContext('2d');

    const pieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labelJurusan,
            datasets: [{
                data: dataJurusan,
                backgroundColor: colors,
                borderColor: '#111827', // subtle border for contrast
                borderWidth: 1,
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
            plugins: {
                legend: { display: false }, // we use custom legend
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const label = context.label || '';
                            const val = context.parsed ?? 0;
                            const total = context.chart._metasets ? context.chart._metasets[context.datasetIndex].total : context.chart._metasets;
                            // Use default tooltip content (label and value)
                            return label + ': ' + val;
                        }
                    }
                }
            }
        }
    });

    // Build responsive, clickable legend buttons
    (function buildLegendButtons() {
        const legendContainer = document.getElementById('jurusanLegend');
        legendContainer.innerHTML = '';

        // Responsive width based on screen size
        const isMobile = window.innerWidth < 640;
        const fixedWidth = isMobile ? 120 : 150;

        labelJurusan.forEach((label, index) => {
            const value = +dataJurusan[index] || 0;

            const btn = document.createElement('button');
            btn.type = 'button';
            btn.className =
                'text-xs font-semibold text-white px-2 sm:px-3 py-1 rounded-lg shadow flex items-center justify-center transition-opacity duration-150';
            btn.style.backgroundColor = colors[index];
            btn.style.width = fixedWidth + 'px';
            btn.style.whiteSpace = 'nowrap';
            btn.style.overflow = 'hidden';
            btn.style.textOverflow = 'ellipsis';
            btn.setAttribute('aria-pressed', 'true');
            btn.setAttribute('title', `${label} (${value})`);

            btn.innerHTML = `<span class="truncate">${label} (${value})</span>`;

        // Click toggles chart slice
        btn.addEventListener('click', () => {
            pieChart.toggleDataVisibility(index);
            pieChart.update();

            const hidden = pieChart.getDataVisibility(index) === false;
            if (hidden) {
                btn.classList.add('opacity-50');
                btn.setAttribute('aria-pressed', 'false');
            } else {
                btn.classList.remove('opacity-50');
                btn.setAttribute('aria-pressed', 'true');
            }
        });

        legendContainer.appendChild(btn);
    });
})();

       

</script>



</div>

    </div>
</x-app-layout>
