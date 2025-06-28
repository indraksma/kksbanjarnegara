{{-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4 max-w-7xl mx-auto">
  @for ($i = 1; $i <= 9; $i++)
    <div class="card mx-auto">
      <div class="top-section">
        <div class="border"></div>
        <div class="icons">
          <div class="logo">[SVG]</div>
          <div class="social-media">[Icon]</div>
        </div>
      </div>
      <div class="bottom-section">
        <span class="title">Card {{ $i }}</span>
        <div class="row row1">
          <div class="item">
            <span class="big-text">123</span>
            <span class="regular-text">Item A</span>
          </div>
          <div class="item">
            <span class="big-text">456</span>
            <span class="regular-text">Item B</span>
          </div>
          <div class="item">
            <span class="big-text">789</span>
            <span class="regular-text">Item C</span>
          </div>
        </div>
      </div>
    </div>
  @endfor
</div> --}}


<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-7xl mx-auto p-6">
  @for ($i = 1; $i <= 9; $i++)
    <div class="bg-white rounded-2xl shadow-md overflow-hidden transform transition duration-300 hover:scale-[1.03]">
      <img src="https://picsum.photos/seed/{{ $i }}/400/300"
           alt="Illustration {{ $i }}"
           class="w-full h-48 object-cover" loading="lazy">
      
      <div class="p-5 flex flex-col h-full">
        <h2 class="text-xl font-semibold text-gray-800 mb-2">TATANAN {{ $i }}</h2>
        <p class="text-gray-600 text-sm flex-grow">
          This is a short description for card number {{ $i }}. It features modern Tailwind UI design.
        </p>
        <div class="mt-4">
          <a href="#" class="inline-block text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg px-4 py-2 transition">
            Learn More
          </a>
        </div>
      </div>
    </div>
  @endfor
</div>

