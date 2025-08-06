@php
    $tatananLabels = [
        1 => 'Kehidupan Masyarakat Sehat Mandiri',
        2 => 'Permukiman dan Fasilitas Umum',
        3 => 'Satuan Pendidikan',
        4 => 'Pasar',
        5 => 'Perkantoran dan Perindustrian',
        6 => 'Pariwisata',
        7 => 'Transportasi dan Tertib Lalu Lintas Jalan',
        8 => 'Perlindungan Sosial',
        9 => 'Penanggulangan Bencana',
    ];
@endphp

<div class="max-w-7xl mx-auto px-4 py-8">
    <!-- Judul & Pencarian -->
    <div class="mb-6 text-center">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Daftar Berita</h1>
        <div class="max-w-md mx-auto">
            <input
                type="text"
                placeholder="Cari berita..."
                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
        </div>
    </div>

    <!-- Tombol Filter Tatanan -->
    <div class="w-full overflow-x-auto mb-6">
        <div class="flex flex-wrap justify-center gap-2 px-2 max-w-5xl mx-auto">
            <button class="flex-shrink-0 px-4 py-2 rounded-full bg-blue-600 text-white hover:bg-blue-700 transition text-sm whitespace-nowrap">
                Semua
            </button>

            @foreach ($tatananLabels as $key => $label)
                <button class="flex-shrink-0 px-4 py-2 rounded-full bg-gray-200 dark:bg-gray-700 hover:bg-blue-100 dark:hover:bg-blue-800 text-gray-700 dark:text-gray-100 text-sm whitespace-nowrap">
                    {{ $label }}
                </button>
            @endforeach
        </div>
    </div>



    <!-- Grid Card Berita -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">
        @for ($i = 1; $i <= 12; $i++)
            <div class="flex flex-col bg-white dark:bg-gray-800 transition-all duration-300 overflow-hidden">
                <!-- Gambar -->
                <a href="{{ route('news.detail', ['slug' => 'berita-dummy-'.$i]) }}" wire:navigate class="block">
                    <div>
                        <img src="https://i.ibb.co/MyTSFsmC/bg-bna.png"
                            alt="Gambar Berita"
                            class="w-full h-50 object-cover rounded-lg">
                    </div>
                </a>

                <!-- Konten -->
                <div class="flex flex-col flex-1 py-2">
                    <!-- Judul -->
                    <h2 class="text-base font-semibold mb-2 line-clamp-2 leading-snug">
                        <a href="{{ route('news.detail', ['slug' => 'berita-dummy-'.$i]) }}" wire:navigate
                           title="Judul Berita Dummy {{ $i }} - Ini adalah Judul Berita yang Cukup Panjang dan Mungkin Terpotong"
                        class="text-gray-800 dark:text-white hover:underline">
                            Judul Berita Dummy {{ $i }} - Ini adalah Judul Berita yang Cukup Panjang dan Mungkin Terpotong
                        </a>
                    </h2>


                    <!-- Meta -->
                    <div class="text-sm text-green-600 dark:text-green-400 font-medium">
                        Indikator
                        <span class="text-gray-500 dark:text-gray-400 font-normal"> • {{ now()->subDays($i)->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
        @endfor
    </div>


    <!-- Pagination Dummy -->
    <div class="mt-8 flex justify-center">
        <nav class="inline-flex gap-1 rounded-md shadow-sm" aria-label="Pagination">
            <a href="#" class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white rounded-l hover:bg-gray-300 dark:hover:bg-gray-600">«</a>
            @for ($p = 1; $p <= 5; $p++)
                <a href="#"
                   class="px-4 py-2 {{ $p == 1 ? 'bg-blue-600 text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white hover:bg-gray-300 dark:hover:bg-gray-600' }}">
                    {{ $p }}
                </a>
            @endfor
            <a href="#" class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white rounded-r hover:bg-gray-300 dark:hover:bg-gray-600">»</a>
        </nav>
    </div>
</div>
