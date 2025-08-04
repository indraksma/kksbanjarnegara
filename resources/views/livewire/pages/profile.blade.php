<div>
     
   <section class="pt-0 pb-0 relative">
      <!-- Background Overlay -->
      <div class="absolute inset-0 bg-cover bg-center bg-no-repeat opacity-70 mix-blend-multiply bg-fixed" style="background-image: url('{{ asset('images/bg-bna.png') }}');"></div>

      <!-- Konten -->
      <div class="relative z-10 bg-blue-900/80 dark:bg-blue-900/0 py-12 px-4 sm:px-8 text-center">
         <h1 class="text-3xl sm:text-4xl text-white font-bold mb-2 tracking-widest">
            VISI DAN MISI
         </h1>
         <p class="text-lg text-white tracking-widest">
            KABUPATEN BANJARNEGARA
         </p>
      </div>

   </section>


   <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16 text-gray-800 dark:text-gray-100">
      <div class="max-w-3xl mx-auto px-6 sm:px-8">

         <!-- Card Wrapper -->
         <div class="bg-white dark:bg-gray-800 rounded-xl shadow-xl ring-1 ring-gray-200 dark:ring-gray-700 overflow-hidden">

            <!-- Visi -->
            <div class="animated-bg text-white text-center p-10 rounded-xl overflow-hidden shadow-lg relative">
               <h3 class="text-3xl font-semibold mb-3">Visi</h3>
               <p class="text-lg italic font-medium max-w-xl mx-auto">
                  “Mewujudkan Banjarnegara yang Maju dan Sejahtera”
               </p>
            </div>
            <!-- Misi -->
            <div class="p-8 bg-gray-50 dark:bg-gray-900">
            <h3 class="text-xl font-semibold text-blue-700 dark:text-blue-400 mb-4">Misi</h3>
            <ul class="space-y-4">
               @php
                  $misi = [
                  "Meningkatkan Infrastruktur dan Pelayanan Publik",
                  "Mendorong Pertumbuhan Ekonomi Lokal",
                  "Meningkatkan Kualitas dan Akses Pendidikan, Kesehatan, dan Kesejahteraan Sosial",
                  "Mewujudkan Pembangunan Berkelanjutan dan Ramah Lingkungan",
                  "Mewujudkan Pemerintahan yang Baik dan Transparan"
                  ];
               @endphp

               @foreach ($misi as $item)
               <li class="flex items-start gap-3">
                  <svg class="w-5 h-5 text-blue-600 mt-1" fill="none" stroke="currentColor" stroke-width="2"
                  viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                  </svg>
                  <span>{{ $item }}</span>
               </li>
               @endforeach
            </ul>
            </div>

         </div>
      </div>
   </section>

   <section class="pt-0 pb-0 relative">
      <!-- Background Overlay -->
      <div class="absolute inset-0 bg-cover bg-center bg-no-repeat opacity-70 mix-blend-multiply bg-fixed" style="background-image: url('{{ asset('images/bg-bna.png') }}');"></div>

      <!-- Konten -->
      <div class="relative z-10 bg-blue-900/80 dark:bg-blue-900/0 py-12 px-4 sm:px-8 text-center">
         <h1 class="text-3xl sm:text-4xl text-white font-bold mb-2 tracking-widest">GEOGRAFIS WILAYAH</h1>
         <p class="text-lg text-white tracking-widest">KABUPATEN BANJARNEGARA</p>
      </div>
   </section>  



   <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
      <!-- Prolog -->
      <div class="mb-12">
         
         <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
            Berdasarkan Data dan Informasi dari Dinas Kependudukan dan Pencatatan Sipil Kabupaten Banjarnegara tahun 2024, Kabupaten Banjarnegara merupakan salah satu bagian wilayah Provinsi Jawa Tengah dengan luas wilayah sekitar 106.97 Ha atau 3,10% dari luas Provinsi Jawa Tengah. Kabupaten ini terdiri dari <strong>20 kecamatan</strong> dan <strong>278 desa/kelurahan</strong>, dengan suhu berkisar antara 20°C - 26°C. 
            <br><br>
            Berbatasan dengan: <br>
            • <strong>Utara</strong>: Kab. Pekalongan & Batang<br>
            • <strong>Selatan</strong>: Kab. Kebumen<br>
            • <strong>Barat</strong>: Kab. Banyumas & Purbalingga<br>
            • <strong>Timur</strong>: Kab. Wonosobo
         </p>
      </div>

      <!-- Statistik -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
   
         <!-- Kecamatan, Desa, Kelurahan -->
         <div class="bg-blue-50 dark:bg-blue-900 rounded-xl p-6 shadow-sm text-center">
            <div class="mb-4">
               <div class="text-4xl font-bold text-blue-700 dark:text-white">20</div>
               <p class="text-sm font-medium tracking-wide uppercase text-gray-600 dark:text-gray-300">Kecamatan</p>
            </div>

            <div class="flex justify-center items-center gap-x-6">
               <div>
                  <div class="text-3xl font-semibold text-blue-600 dark:text-blue-200">266</div>
                  <p class="text-sm font-medium tracking-wide uppercase text-gray-600 dark:text-gray-300">Desa</p>
               </div>
               <div class="border-l border-gray-300 dark:border-gray-600 h-8"></div>
               <div>
                  <div class="text-3xl font-semibold text-blue-600 dark:text-blue-200">12</div>
                  <p class="text-sm font-medium tracking-wide uppercase text-gray-600 dark:text-gray-300">Kelurahan</p>
               </div>
            </div>
         </div>


         <!-- Puskesmas -->
         <div class="bg-green-50 dark:bg-green-900 rounded-xl p-6 shadow-sm text-center">
   
            <div class="mb-4">
               <div class="text-4xl font-bold text-green-700 dark:text-white">35</div>
               <p class="text-sm font-medium tracking-wide uppercase text-gray-600 dark:text-gray-300">Puskesmas</p>
            </div>

            <div class="flex justify-center items-center gap-x-6">
               <div>
                  <div class="text-3xl font-semibold text-green-600 dark:text-green-200">15</div>
                  <p class="text-sm font-medium tracking-wide uppercase text-gray-600 dark:text-gray-300">Ranap</p>
               </div>
               <div class="border-l border-gray-300 dark:border-gray-600 h-8"></div>
               <div>
                  <div class="text-3xl font-semibold text-green-600 dark:text-green-200">20</div>
                  <p class="text-sm font-medium tracking-wide uppercase text-gray-600 dark:text-gray-300">Non Ranap</p>
               </div>
            </div>
         </div>


         <!-- Sekolah/Madrasah -->
         <div class="bg-yellow-50 dark:bg-yellow-900 rounded-xl p-6 shadow-sm text-center">

            <div class="mb-4">
               <div class="text-4xl font-bold text-yellow-700 dark:text-white">1.029</div>
               <p class="text-sm font-medium tracking-wide uppercase text-gray-600 dark:text-gray-300">Sekolah/Madrasah</p>
            </div>


            <div class="text-sm">
               <div class="flex items-center justify-center gap-x-2">
                  <span class="text-sm font-semibold text-gray-800 dark:text-white">832</span>
                  <span class="text-gray-800 dark:text-white text-xs font-medium px-2 py-0.5 rounded-full">SD/MI</span>
               </div>
               <div class="flex items-center justify-center gap-x-2">
                  <span class="text-sm font-semibold text-gray-800 dark:text-white">140</span>
                  <span class=" text-gray-800 dark:text-white text-xs font-medium px-2 py-0.5 rounded-full">SMP/MTs</span>
               </div>
               <div class="flex items-center justify-center gap-x-2">
                  <span class="text-sm font-semibold text-gray-800 dark:text-white">57</span>
                  <span class=" text-gray-800 dark:text-white text-xs font-medium px-2 py-0.5 rounded-full">SMA/SMK/MA</span>
               </div>
            </div>

         </div>


         <!-- Pasar -->
         <div class="bg-red-50 dark:bg-red-900 rounded-xl p-6 shadow-sm text-center">
            <div class="mb-4">
               <div class="text-4xl font-bold  text-red-700 dark:text-white">23</div>
               <p class="text-sm font-medium tracking-wide uppercase text-gray-600 dark:text-gray-300">Pasar</p>
            </div>
            <div class="mt-2 text-sm text-gray-700 dark:text-gray-200">
            Tersebar di berbagai kecamatan
            </div>
         </div>
      </div>
   </section>


   <section class="pt-0 pb-0 relative">
      <!-- Background Overlay -->
      <div class="absolute inset-0 bg-cover bg-center bg-no-repeat opacity-70 mix-blend-multiply bg-fixed" style="background-image: url('{{ asset('images/bg-bna.png') }}');"></div>

      <!-- Konten -->
      <div class="relative z-10 bg-blue-900/80 dark:bg-blue-900/0 py-12 px-4 sm:px-8 text-center">
         <h1 class="text-3xl sm:text-4xl text-white font-bold mb-2 tracking-widest">DEMOGRAFIS</h1>
         <p class="text-lg text-white tracking-widest">KABUPATEN BANJARNEGARA</p>
      </div>
   </section>

   <!-- Demografi -->
   <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
      
      <div class="mb-12">
         <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
           Data dari Dinas Kependudukan dan Catatan Sipil Kabupaten Banjarnegara Tahun 2024, jumlah Penduduk Kabupaten Banjarnegara per tanggal 31 Desember 2024 adalah <strong>1.071.977</strong> jiwa terdiri dari <strong>545.513 laki-laki</strong> (50,88%) dan <strong>526.464 perempuan</strong> (49,11%) tergabung dalam <strong>319.507 rumah tangga</strong>.
         </p>
      </div>
     

      <!-- Statistik Demografi -->
     <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

         <!-- Total Penduduk -->
         <div class="bg-blue-50 dark:bg-blue-900 rounded-xl p-6 shadow-sm text-center">
            <div class="mb-4">
               <div class="text-4xl font-bold text-neutral dark:text-white">1.071.977</div>
               <p class="text-sm font-medium tracking-wide uppercase text-gray-600 dark:text-gray-300">Total Penduduk</p>
            </div>
         </div>

         <!-- Laki-laki -->
         <div class="bg-blue-50 dark:bg-blue-900 rounded-xl p-6 shadow-sm text-center">
            <div class="mb-4">
               <div class="text-4xl font-bold text-blue-700 dark:text-white">545.513</div>
               <p class="text-sm font-medium tracking-wide uppercase text-gray-600 dark:text-gray-300">Laki-laki (50,88%)</p>
            </div>
         </div>

         <!-- Perempuan -->
         <div class="bg-blue-50 dark:bg-blue-900 rounded-xl p-6 shadow-sm text-center">
            <div class="mb-4">
               <div class="text-4xl font-bold  text-pink-600 dark:text-white">526.464</div>
               <p class="text-sm font-medium tracking-wide uppercase text-gray-600 dark:text-gray-300">Perempuan (49,11%)</p>
            </div>
         </div>

         <!-- Rumah Tangga -->
         <div class="bg-blue-50 dark:bg-blue-900 rounded-xl p-6 shadow-sm text-center">
            <div class="mb-4">
               <div class="text-4xl font-bold text-teal-700 dark:text-white">319.507</div>
               <p class="text-sm font-medium tracking-wide uppercase text-gray-600 dark:text-gray-300">Rumah Tangga</p>
            </div>
         </div>


      </div>

   </section>


</div>