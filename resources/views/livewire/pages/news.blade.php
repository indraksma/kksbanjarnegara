<div class="min-h-screen dark:bg-gray-900 px-4 py-8">
  <div class="flex flex-col md:grid md:grid-cols-[250px_1fr_300px] gap-6 px-4 md:px-6 lg:px-8">

    <!-- Sidebar Tatanan -->
    <div x-data="{ open: false }" class="order-1 md:order-none w-full md:w-auto md:sticky md:top-[100px] bg-white dark:bg-gray-800 p-4 border border-gray-200 dark:border-gray-700 rounded-lg h-fit self-start">

      <button @click="open = !open" class="md:hidden w-full text-left text-lg font-semibold text-gray-800 dark:text-white mb-4 flex justify-between items-center">
        Tatanan
        <svg :class="{'rotate-180': open}" class="transition-transform w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
        </svg>
      </button>

      <div :class="{ 'hidden': !open }" class="md:block">
        <h2 class="hidden md:block text-lg font-semibold text-gray-800 dark:text-white mb-4">Tatanan</h2>
        <ul class="space-y-1 text-sm text-gray-700 dark:text-gray-300">

          {{-- Tombol Semua --}}
          <li>
            <a 
              href="{{ route('news') }}"
              onclick="Livewire.navigate(this.href, { preserveScroll: true, replace: true }); return false;"
              class="w-full text-left block px-3 py-2 rounded-lg transition duration-150 ease-in-out
                hover:text-blue-700 dark:hover:text-blue-400 cursor-pointer
                border-l-4 {{ is_null($filterStepId) ? 'border-blue-600 text-blue-700 dark:text-blue-400 font-semibold' : 'border-transparent' }}"
            >
              Semua
            </a>
          </li>

          {{-- Tombol per Step --}}
          @foreach ($steps as $step)
            <li>
              <a 
                href="{{ route('news', ['tatanan' => Str::slug($step->step)]) }}"
                onclick="Livewire.navigate(this.href, { preserveScroll: true, replace: true }); return false;"
                class="w-full text-left block px-3 py-2 rounded-lg transition duration-150 ease-in-out
                  hover:text-blue-700 dark:hover:text-blue-400 cursor-pointer
                  border-l-4 {{ $filterStepId === $step->id ? 'border-blue-600 text-blue-700 dark:text-blue-400 font-semibold' : 'border-transparent' }}"
              >
                {{ $step->step }}
              </a>
            </li>
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
            @foreach ($indikators as $indikator)
              <li>
                <button wire:click="filterByIndikator({{ $indikator->id }})"
                    wire:loading.attr="disabled"
                    wire:target="filterByIndikator"
                    class="pl-4 w-full text-left border-l-4 cursor-pointer {{ $filterIndikatorId === $indikator->id ? 'border-blue-600 text-gray-900 dark:text-white font-semibold' : 'border-transparent hover:text-gray-900 dark:hover:text-white' }}">
                    {{ $indikator->nama }}
                </button>
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
              <input
                type="text"
                placeholder="Cari berita..."
                wire:model.live.debounce.500ms="search"
                class="w-full pl-10 pr-10 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all"
              />
              <!-- Icon search -->
              <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 103.6 3.6a7.5 7.5 0 0012.45 12.45z" />
                </svg>
              </div>
              <!-- Spinner loading -->
              <div wire:loading.flex wire:target="search" class="absolute inset-y-0 right-3 flex items-center">
                <svg class="w-5 h-5 animate-spin text-blue-500" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"/>
                </svg>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- Loading Spinner -->
      <div wire:loading.flex wire:target="filterByStep,filterByIndikator" class="justify-center items-center py-6">
          <div class="flex items-center space-x-2 text-sm text-blue-600 dark:text-blue-400">
              <svg class="animate-spin h-5 w-5" viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle>
                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z" />
              </svg>
              <span>Memuat berita...</span>
          </div>
      </div>

      <!-- Grid Berita -->
      @if ($beritas->isEmpty())
          <div class="text-center col-span-full py-10 text-gray-500 dark:text-gray-400 text-lg font-medium">
              Berita tidak ditemukan.
          </div>
      @else
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
              @foreach ($beritas as $berita)
                <div class="flex flex-col bg-white dark:bg-gray-800 transition-all duration-300 overflow-hidden">
                    <a href="{{ route('news.detail', ['slug' => $berita->slug]) }}" wire:navigate class="block">
                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-50 object-cover rounded-lg">
                    </a>
                    <div class="flex flex-col flex-1 py-2">
                        <h2 class="text-base font-semibold mb-2 line-clamp-2 leading-snug">
                            <a href="{{ route('news.detail', ['slug' => $berita->slug]) }}" wire:navigate title="{{ $berita->judul }}" class="text-gray-800 dark:text-white hover:underline">
                                {{ $berita->judul }}
                            </a>
                        </h2>
                        <div class="text-sm text-green-600 dark:text-green-400 font-medium">
                            {{ $berita->indikator?->nama ?? 'Indikator' }} 
                            <span class="text-gray-500 dark:text-gray-400 font-normal"> • {{ \Carbon\Carbon::parse($berita->tanggal_publish)->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
              @endforeach
          </div>
      @endif

      <!-- Pagination -->
      <div class="mt-10">
          {{ $beritas->links() }}
      </div>

    </main>
  </div>
</div>
