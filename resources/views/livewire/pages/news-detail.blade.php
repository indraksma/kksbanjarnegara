<div class="max-w-4xl mx-auto px-4 py-5">

    <!-- Breadcrumbs -->
    <nav class="text-sm text-gray-600 dark:text-gray-400 mb-4" aria-label="Breadcrumb">
        <ol class="list-reset flex flex-wrap items-center space-x-1">
            <li>
                <a href="/" class="hover:underline text-gray-500 dark:text-white" wire:navigate>Home</a> 
            </li>
            <li><span class="mx-1">/</span></li>
            <li>
                <a href="{{ route('news') }}" class="hover:underline text-gray-500 dark:text-white" wire:navigate>Berita</a>
            </li>
            <li><span class="mx-1">/</span></li>
            <li>
                <a href="{{ route('news') }}" class="hover:underline text-gray-500 dark:text-white" wire:navigate>Tatanan 2</a>
            </li>
            <li><span class="mx-1">/</span></li>
            <li class="text-gray-800 dark:text-white font-semibold truncate max-w-[200px] md:max-w-xs lg:max-w-sm">
                Judul Berita Dummy - Kehidupan Masyarakat Sehat Mandiri
            </li>
        </ol>
    </nav>

    <!-- Gambar Utama -->
    <div class="w-auto h-100 mb-6">
        <img src="https://flowbite.s3.amazonaws.com/docs/jumbotron/conference.jpg" alt="Gambar Utama"
             class="w-full h-full object-cover rounded-lg shadow-md">
    </div>

    <!-- Judul -->
    <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">
        Judul Berita Dummy - Kehidupan Masyarakat Sehat Mandiri
    </h1>

    <!-- Meta Info -->
    <div class="text-sm text-gray-600 dark:text-gray-400 mb-6 flex items-center gap-4 flex-wrap">
        <span>Ditulis oleh <strong>Admin</strong></span>
        <span>Indikator: 3</span>
        <span>Dipublikasikan: 08 Juli 2025</span>
    </div>

    <!-- Isi Berita -->
    <div class="prose text-gray-600 dark:text-gray-100 dark:prose-invert max-w-none mb-10">
        <p>
            Ini adalah isi lengkap dari berita dummy. Berita ini membahas mengenai kegiatan masyarakat dalam mewujudkan kehidupan sehat mandiri, termasuk pelatihan kesehatan, edukasi gizi, dan promosi PHBS.
        </p>
        <br>
        <p>
            Dalam acara ini turut hadir berbagai tokoh masyarakat, tenaga kesehatan, serta perwakilan dari OPD terkait. Tujuannya adalah membangun kesadaran masyarakat akan pentingnya perilaku hidup bersih dan sehat.
        </p>
        <br>
        <p>
            Harapannya, kegiatan ini mampu meningkatkan indeks kesehatan dan memperkuat tatanan pertama dalam penilaian KKS tahun ini.
        </p>
    </div>

    <!-- Bagikan & Kembali -->
    <div class="border-y border-gray-300 dark:border-gray-700 py-4 mt-8 flex flex-col sm:flex-row items-center justify-between gap-4">
        <!-- Kiri: Bagikan -->
        <div class="flex items-center gap-4 text-sm text-gray-800 dark:text-gray-200">
            <span class="font-medium">Bagikan</span>

            <!-- Copy Link -->
            <button
                onclick="navigator.clipboard.writeText(window.location.href); alert('Link disalin!');"
                class="text-gray-600 cursor-pointer dark:text-gray-300 hover:text-blue-500"
                title="Salin Link"
            >
                <i class="fas fa-link"></i>
            </button>

            <!-- Facebook -->
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" title="Bagikan ke Facebook" class="text-blue-600 hover:text-blue-700">
                <i class="fab fa-facebook"></i>
            </a>

            <!-- X (Twitter) -->
            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}" target="_blank" title="Bagikan ke X" class="text-gray-800 dark:text-white hover:text-black">
                <i class="fab fa-x-twitter"></i>
            </a>

            <!-- WhatsApp -->
            <a href="https://wa.me/?text={{ urlencode(request()->fullUrl()) }}" target="_blank" title="Bagikan ke WhatsApp" class="text-green-500 hover:text-green-600">
                <i class="fab fa-whatsapp"></i>
            </a>
        </div>



        <!-- Kanan: Tombol Kembali -->
        <div>
            <a href="{{ route('news') }}" wire:navigate
               title="Kembali ke Daftar Berita"
            class="inline-flex items-center gap-2 text-blue-600 dark:text-blue-400 hover:text-blue-700 text-sm font-medium">
                <!-- Ikon -->
                <div class="flex items-center justify-center w-8 h-8   text-blue-600 dark:text-blue-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="m12 8-4 4 4 4"></path>
                        <path d="M16 12H8"></path>
                    </svg>
                </div>
                <span>Kembali ke List</span>
            </a>
        </div>

    </div>


    <!-- Rekomendasi Berita Lainnya -->
    <div class="border-t border-gray-300 dark:border-gray-700 pt-8">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Berita Lainnya</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @for ($i = 1; $i <= 3; $i++)
                <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden hover:shadow-lg transition">
                    <div class="aspect-w-16 aspect-h-9 bg-gray-200 dark:bg-gray-700">
                        <img src="https://source.unsplash.com/random/400x300?sig={{ $i }}&news" alt="Gambar"
                             class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <h3 class="text-sm font-semibold text-gray-800 dark:text-white mb-2">
                            Judul Berita Populer {{ $i }}
                        </h3>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mb-2 line-clamp-2">
                            Ringkasan singkat dari berita populer nomor {{ $i }}. Konten ini sangat menarik dan informatif.
                        </p>
                        <a href="{{ route('news.detail', ['slug' => 'berita-populer-' . $i]) }}"
                           class="text-blue-600 dark:text-blue-400 hover:underline text-sm">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</div>