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

            @if ($berita->indikator && $berita->indikator->step)
                <li><span class="mx-1">/</span></li>
                <li>
                    <a href="{{ route('news') }}?tatanan={{ Str::slug($berita->indikator->step->step) }}"
                    onclick="Livewire.navigate(this.href, { preserveScroll: true, replace: true }); return false;"
                    class="text-gray-500 dark:text-white hover:underline">
                        {{ $berita->indikator->step->step }}
                    </a>
                </li>
            @endif

            <li><span class="mx-1">/</span></li>
            <li class="text-gray-800 dark:text-white font-semibold truncate max-w-[200px] md:max-w-xs lg:max-w-sm">
                {{ $berita->judul }}
            </li>
        </ol>
    </nav>



    <!-- Gambar Utama -->
    <div class="mb-6">
        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
            class="w-full h-[250px] md:h-[350px] object-cover rounded-lg shadow-md">
    </div>


    <!-- Judul -->
    <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">
        {{ $berita->judul }}
    </h1>

    <!-- Meta Info -->
    <div class="text-sm text-gray-600 dark:text-gray-400 mb-6 flex items-center gap-4 flex-wrap">
        <span>Ditulis oleh <strong>{{ $berita->penulis ?? 'Admin' }}</strong></span>

        @if ($berita->indikator?->step)
            <span>
                Tatanan {{ $berita->indikator->step->no }}: 
                <a 
                    href="{{ route('news', ['tatanan' => Str::slug($berita->indikator->step->step)]) }}"
                    onclick="Livewire.navigate(this.href, { preserveScroll: true, force: true }); return false;"
                    class="text-blue-600 hover:underline dark:text-blue-400"
                >
                    {{ $berita->indikator->step->step }}
                </a>
            </span>
        @endif

        @if ($berita->indikator)
            <span>
                Indikator:
                <a href="{{ route('news') }}?tatanan={{ Str::slug($berita->indikator->step->step) }}&indikator={{ $berita->indikator->id }}"
                onclick="Livewire.navigate(this.href, { preserveScroll: true, replace: true }); return false;"
                class="text-blue-600 hover:underline dark:text-blue-400">
                    {{ $berita->indikator->nama }}
                </a>
            </span>
        @endif



        

        <span>Dipublikasikan: {{ \Carbon\Carbon::parse($berita->tanggal_publish)->translatedFormat('d F Y') }}</span>
    </div>


    <!-- Isi Berita -->
    <div class="prose dark:prose-invert max-w-none text-gray-700 dark:text-gray-100 mb-10">
        {!! nl2br(e($berita->isi)) !!}
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
                <span>Kembali ke Daftar Berita</span>
            </a>
        </div>

    </div>


    <!-- Rekomendasi Berita Lainnya -->
    <div class="border-t border-gray-300 dark:border-gray-700 pt-8">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Berita Lainnya</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($beritaLainnya as $b)
                <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden hover:shadow-lg transition">
                    <div class="aspect-w-16 aspect-h-9 bg-gray-200 dark:bg-gray-700">
                        <img src="{{ asset('storage/' . $b->gambar) }}" alt="Gambar"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <h3 class="text-sm font-semibold text-gray-800 dark:text-white mb-2 line-clamp-2">
                            {{ $b->judul }}
                        </h3>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mb-2 line-clamp-2">
                            {{ Str::limit(strip_tags($b->isi), 100) }}
                        </p>
                        <a href="{{ route('news.detail', ['slug' => $b->slug]) }}" wire:navigate
                        class="text-blue-600 dark:text-blue-400 hover:underline text-sm">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
