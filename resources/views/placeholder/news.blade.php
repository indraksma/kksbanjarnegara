<div class="min-h-screen dark:bg-gray-900 px-4 py-8 animate-pulse">
  <div class="grid grid-cols-1 md:grid-cols-[250px_1fr_300px] gap-6 px-4 md:px-6 lg:px-8">

    <!-- Sidebar Tatanan -->
    <div class="order-1 md:order-none w-full md:w-auto h-[520px] bg-gray-200 rounded-lg pt-2"></div>

    <!-- Konten Utama -->
    <main class="order-3 md:order-2 w-full pb-20">
      
      <!-- Judul & Pencarian -->
      <div class="h-20 bg-gray-200 rounded-xl w-full px-6 py-4 mb-5"></div>

      <!-- Grid Berita -->
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @for ($i = 0; $i < 6; $i++)
        <div class="h-52 bg-gray-200 rounded-lg w-full mb-3"></div>
        @endfor
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @for ($i = 0; $i < 3; $i++)
        <div class="h-16 bg-gray-200 rounded-lg w-full mb-3"></div>
        @endfor
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @for ($i = 0; $i < 6; $i++)
        <div class="h-52 bg-gray-200 rounded-lg w-full mb-3"></div>
        @endfor
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @for ($i = 0; $i < 3; $i++)
        <div class="h-16 bg-gray-200 rounded-lg w-full mb-3"></div>
        @endfor
      </div>

      <!-- Pagination -->
      <div class="mt-10 flex justify-center">
        <div class="h-10 bg-gray-200 rounded-lg w-40"></div>
      </div>
    </main>

    <!-- Sidebar Indikator -->
    <div class="order-2 md:order-3 w-full md:w-auto h-[520px] bg-gray-200 rounded-lg pt-2"></div>

  </div>
</div>
