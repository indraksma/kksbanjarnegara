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

    $indikatorList = [
        'Ketersediaan air bersih',
        'Pengelolaan sampah',
        'Kegiatan edukasi masyarakat',
        'Kolaborasi dengan OPD terkait',
        'Dokumentasi kegiatan',
        'Penyuluhan kesehatan lingkungan',
        'Kebersihan lingkungan',
        'Penerangan jalan umum',
        'Sarana cuci tangan pakai sabun',
        'Penerapan kawasan tanpa rokok',
        'Pengelolaan limbah cair',
        'Tersedianya tempat sampah terpilah',
        'Pemanfaatan lahan pekarangan',
        'Kegiatan posyandu aktif',
        'Pelatihan kader kesehatan',
        'Akses sanitasi layak',
        'Pemantauan kualitas air minum',
        'Kegiatan PHBS',
        'Pemeriksaan makanan jajanan',
        'Penerapan protokol kesehatan',
        'Tersedianya sarana olahraga',
        'Penanganan stunting',
        'Pendidikan gizi keluarga',
        'Partisipasi masyarakat dalam pembangunan',
        'Pengawasan perokok di fasilitas umum',
        'Sosialisasi perilaku hidup bersih',
        'Penerapan bank sampah',
        'Kerja sama antar desa/kelurahan',
        'Monitoring penyakit berbasis lingkungan'
    ];
    $aktif = 0;
@endphp

<div class="min-h-screen dark:bg-gray-900 px-4 py-8">
  <div class="flex flex-col md:grid md:grid-cols-[250px_1fr_300px] gap-6 px-4 md:px-6 lg:px-8">

    <!-- Sidebar Tatanan -->
    <div x-data="{ open: false }" class="order-1 md:order-none w-full md:w-auto md:sticky md:top-[100px] bg-white dark:bg-gray-800 p-4 border border-gray-200 dark:border-gray-700 rounded-lg h-fit self-start">

      <button @click="open = !open" class="md:hidden w-full text-left text-lg font-semibold text-gray-800 dark:text-white mb-4 flex justify-between items-center">
        Tatanan
        <svg :class="{'rotate-180': open}" class="transition-transform w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
      </button>
      <div :class="{ 'hidden': !open }" class="md:block">
        <h2 class="hidden md:block text-lg font-semibold text-gray-800 dark:text-white mb-4">Tatanan</h2>
        <ul class="space-y-1 text-sm text-gray-700 dark:text-gray-300">
          <li><a href="#" class="block px-3 py-2 rounded hover:text-gray-900 dark:hover:text-white text-blue-600 font-semibold">Semua</a></li>
          @foreach ($tatananLabels as $label)
            <li><a href="#" class="block px-3 py-2 rounded hover:text-gray-900 dark:hover:text-white">{{ $label }}</a></li>
          @endforeach
        </ul>
      </div>
    </div>

    <!-- Sidebar Indikator -->
    <div x-data="{ open: false }" class="order-2 md:order-3 w-full md:w-auto md:sticky md:top-[100px] bg-white dark:bg-gray-800 p-4 border border-gray-200 dark:border-gray-700 rounded-lg h-fit self-start max-h-[calc(100vh-120px)]">


      <button @click="open = !open" class="md:hidden w-full text-left text-lg font-semibold text-gray-800 dark:text-white mb-4 flex justify-between items-center">
        Indikator Terkait
        <svg :class="{'rotate-180': open}" class="transition-transform w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
      </button>
      <div :class="{ 'hidden': !open }" class="md:block">
        <h3 class="hidden md:block text-lg font-semibold text-gray-800 dark:text-white mb-4">Indikator Terkait</h3>
        <div class="overflow-y-auto max-h-[calc(100vh-180px)]
          [&::-webkit-scrollbar]:w-2
          [&::-webkit-scrollbar-track]:rounded-full
          [&::-webkit-scrollbar-track]:bg-gray-100
          [&::-webkit-scrollbar-thumb]:rounded-full
          [&::-webkit-scrollbar-thumb]:bg-gray-300
          dark:[&::-webkit-scrollbar-track]:bg-neutral-700
          dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
          <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-300 border-l border-transparent">
            @foreach ($indikatorList as $index => $indikator)
              <li class="pl-4 border-l-4 cursor-pointer {{ $index === $aktif ? 'border-blue-600 text-gray-900 dark:text-white font-semibold' : 'border-transparent hover:text-gray-900 dark:hover:text-white' }}">
                {{ $indikator }}
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>

    <!-- Konten -->
    <main class="order-3 md:order-2 pb-20">
      <!-- Sticky Header -->
      <div class="sticky top-[100px] z-20 bg-gradient-to-r from-white/80 to-gray-100/80 dark:from-gray-900/80 dark:to-gray-800/80 backdrop-blur-md border border-gray-200 dark:border-gray-700 shadow-sm rounded-xl px-6 py-4 mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
          <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Daftar Berita</h1>
          <div class="w-full sm:w-[300px]">
            <div class="relative">
              <input type="text" placeholder="Cari berita..." class="w-full pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all" />
              <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 103.6 3.6a7.5 7.5 0 0012.45 12.45z" /></svg>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Grid Berita -->
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @for ($i = 1; $i <= 9; $i++)
          <div class="flex flex-col bg-white dark:bg-gray-800 transition-all duration-300 overflow-hidden">
            <a href="{{ route('news.detail', ['slug' => 'berita-dummy-'.$i]) }}" wire:navigate class="block">
              <img src="images/bg-bna.png" alt="Gambar Berita" class="w-full h-50 object-cover rounded-lg">
            </a>
            <div class="flex flex-col flex-1 py-2">
              <h2 class="text-base font-semibold mb-2 line-clamp-2 leading-snug">
                <a href="{{ route('news.detail', ['slug' => 'berita-dummy-'.$i]) }}" wire:navigate title="Judul Berita Dummy {{ $i }} - Ini adalah Judul Berita yang Cukup Panjang dan Mungkin Terpotong" class="text-gray-800 dark:text-white hover:underline">
                  Judul Berita Dummy {{ $i }} - Ini adalah Judul Berita yang Cukup Panjang dan Mungkin Terpotong
                </a>
              </h2>
              <div class="text-sm text-green-600 dark:text-green-400 font-medium">
                Indikator <span class="text-gray-500 dark:text-gray-400 font-normal"> • {{ now()->subDays($i)->diffForHumans() }}</span>
              </div>
            </div>
          </div>
        @endfor
      </div>

      <!-- Pagination -->
      <div class="mt-10 flex justify-center">
        <nav class="inline-flex gap-1 rounded-md shadow-sm" aria-label="Pagination">
          <a href="#" class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white rounded-l hover:bg-gray-300 dark:hover:bg-gray-600">«</a>
          @for ($p = 1; $p <= 5; $p++)
            <a href="#" class="px-4 py-2 {{ $p === 1 ? 'bg-blue-600 text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white hover:bg-gray-300 dark:hover:bg-gray-600' }}">{{ $p }}</a>
          @endfor
          <a href="#" class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white rounded-r hover:bg-gray-300 dark:hover:bg-gray-600">»</a>
        </nav>
      </div>
    </main>
  </div>
</div>
