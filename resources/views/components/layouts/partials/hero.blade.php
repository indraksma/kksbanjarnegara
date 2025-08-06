<section class="relative h-screen overflow-hidden bg-gray-700">
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat opacity-70 mix-blend-multiply bg-fixed" style="background-image: url('{{ asset('images/bg-bna.png') }}');"></div>
    
    <div class="relative z-10 flex items-center justify-center h-full px-4 pb-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full max-w-6xl mx-auto items-center">
            <!-- KIRI: Teks Sambutan -->
            <div class="text-center md:text-left">
                <h1 class="text-4xl md:text-5xl font-bold tracking-tight text-white">
                    Selamat Datang di KKS Banjarnegara
                </h1>
                <p class="mt-6 text-xl md:text-2xl text-gray-300">
                    Kabupaten Kota Sehat Banjarnegara
                </p>
            </div>

            <!-- KANAN: Komponen Berita -->
            @livewire('pages.hero-news')
        </div>
    </div>
</section>


{{-- 
<div class="relative overflow-hidden">
  <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-7">
    <div class="max-w-2xl text-center mx-auto">
      <h1 class="block text-3xl font-bold text-gray-800 sm:text-4xl md:text-5xl dark:text-white">Selamat Datang di  <span class="text-blue-600">KKS Banjarnegara</span></h1>
      <p class="mt-3 text-lg text-gray-800 dark:text-neutral-400">Kabupaten Kota Sehat Banjarnegara</p>
    </div>

    <div class="mt-10 relative max-w-5xl mx-auto h-96 sm:h-120 rounded-xl overflow-hidden">
  <!-- Gambar background -->
  <img src="{{ asset('images/bg-bna.png') }}"
       alt="Hero Background"
       class="absolute top-0 left-0 object-cover w-full h-full opacity-70 mix-blend-multiply" />

  <!-- Tombol tengah -->
  <div class="absolute inset-0 flex flex-col justify-center items-center">
    <a class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-full border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">
      <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none"
           viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round"
           stroke-linejoin="round">
        <polygon points="5 3 19 12 5 21 5 3" />
      </svg>
      Play the overview
    </a>
  </div>

  <!-- Ornamen kiri bawah -->
  <div class="absolute bottom-12 -start-20 -z-1 size-48 bg-gradient-to-b from-orange-500 to-white p-px rounded-lg dark:to-neutral-900">
    <div class="bg-white size-48 rounded-lg dark:bg-neutral-900"></div>
  </div>

  <!-- Ornamen kanan atas -->
  <div class="absolute -top-12 -end-20 -z-1 size-48 bg-gradient-to-t from-blue-600 to-cyan-400 p-px rounded-full">
    <div class="bg-white size-48 rounded-full dark:bg-neutral-900"></div>
  </div>
</div>

  </div>
</div> --}}
