<section class="px-5 py-10 bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100 shadow-sm border-b border-gray-200 dark:border-neutral-700">
	<div class="container grid grid-cols-12 mx-auto gap-y-6 md:gap-10">
		<div class="flex flex-col justify-between col-span-12 py-2 space-y-8 md:space-y-16 md:col-span-3">
			<div class="flex flex-col space-y-8 md:space-y-12">
				@foreach ($beritaTerbaru as $berita)
					<div class="flex flex-col space-y-2">
						<h3 class="flex items-center space-x-2">
							<span class="flex-shrink-0 w-2 h-2 rounded-full bg-violet-400 dark:bg-violet-600"></span>
							<span class="text-xs font-bold uppercase">Terbaru</span>
						</h3>
						<a href="{{ route('news.detail', ['slug' => $berita->slug]) }}" wire:navigate class="font-serif hover:underline">
							{{ \Str::limit($berita->judul, 60) }}
						</a>
						<p class="text-xs">{{ $berita->tanggal_publish }}</p>
					</div>
				@endforeach
			</div>
			<div class="flex flex-col w-full space-y-2">
				<div class="flex w-full h-1 bg-opacity-10 bg-violet-400 dark:bg-violet-600">
					<div class="w-1/2 h-full bg-violet-400 dark:bg-violet-600"></div>
				</div>
				<a href="{{ route('news') }}" wire:navigate class="flex items-center justify-between w-full">	
					<span class="text-xs font-bold tracking-wider uppercase">Lihat Berita Lainnya</span>
					<svg viewBox="0 0 24 24" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-4 stroke-current text-violet-400 dark:text-violet-600">
						<line x1="5" y1="12" x2="19" y2="12"></line>
						<polyline points="12 5 19 12 12 19"></polyline>
					</svg>
				</a>
			</div>
		</div>
		<div class="relative flex col-span-12 bg-gray-500 dark:bg-gray-500 bg-center bg-no-repeat bg-cover xl:col-span-6 lg:col-span-5 md:col-span-9 min-h-96" style="background-image: url('https://source.unsplash.com/random/239x319');">
			<span class="absolute px-1 pb-2 text-xs font-bold uppercase border-b-2 left-6 top-6 text-gray-100 dark:text-gray-800 border-violet-400 dark:border-violet-600">banjarnegara, jawa tengah</span>
			<a class="flex flex-col items-center justify-end p-6 text-center sm:p-8 group dark:via- flex-grow-1 bg-gradient-to-b from-gray-900 dark:from-gray-50 to-gray-900 dark:to-gray-50">
				<span class="flex items-center mb-4 space-x-2 text-violet-400 dark:text-violet-600">
					<span class="relative flex-shrink-0 w-2 h-2 rounded-full bg-violet-400 dark:bg-violet-600">
						<span class="absolute flex-shrink-0 w-3 h-3 rounded-full -left-1 -top-1 animate-ping bg-violet-400 dark:bg-violet-600"></span>
					</span>
					<span class="text-sm font-bold">Live</span>
				</span>
				<h1 class="font-serif text-2xl font-semibold group-hover:underline text-gray-100 dark:text-gray-800">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet alias expedita atque nisi?</h1>
			</a>
		</div>
		<div class="hidden py-2 xl:col-span-3 lg:col-span-4 md:hidden lg:block">
			<div class="mb-8 border-b-2 border-opacity-10 border-violet-400 dark:border-violet-600">
				<nav class="flex space-x-5" aria-label="Tabs" role="tablist">
					<button type="button" id="news-tab-latest" class="pb-5 text-xs font-bold uppercase hs-tab-active:text-violet-600 hs-tab-active:dark:text-violet-600 hs-tab-active:border-violet-400 hs-tab-active:dark:border-violet-600 cursor-pointer" data-hs-tab="#news-tabpanel-latest" aria-controls="news-tabpanel-latest" role="tab" aria-selected="true">Terbaru</button>
					<button type="button" id="news-tab-popular" class="pb-5 text-xs font-bold uppercase hs-tab-active:text-violet-600 hs-tab-active:dark:text-violet-600 hs-tab-active:border-violet-400 hs-tab-active:dark:border-violet-600 cursor-pointer" data-hs-tab="#news-tabpanel-popular" aria-controls="news-tabpanel-popular" role="tab" aria-selected="false">Popular</button>
				</nav>
			</div>
			<div>
				<div id="news-tabpanel-popular" class="hidden" role="tabpanel" aria-labelledby="news-tab-popular">
					@php
						$beritaPopuler = [
							['judul' => 'Optimalisasi Layanan Kesehatan di Banjarnegara', 'waktu' => '1 jam lalu', 'kategori' => 'Kesehatan'],
							['judul' => 'Perbaikan Infrastruktur Jalan Raya Tahun Ini', 'waktu' => '2 jam lalu', 'kategori' => 'Infrastruktur'],
							['judul' => 'Pendidikan Berbasis Digital di Sekolah Negeri', 'waktu' => '3 jam lalu', 'kategori' => 'Pendidikan'],
							['judul' => 'Pengembangan UMKM di Banjarnegara Meningkat', 'waktu' => '5 jam lalu', 'kategori' => 'Ekonomi'],
						];
					@endphp
					<div class="flex flex-col divide-y divide-gray-700 dark:divide-gray-300">
						@foreach ($beritaPopuler as $populer)
							<div class="flex px-1 py-4">
								<img alt="" class="flex-shrink-0 object-cover w-20 h-20 mr-4 bg-gray-500 dark:bg-gray-500" src="https://source.unsplash.com/random/24{{ $loop->index }}x32{{ $loop->iteration }}">
								<div class="flex flex-col flex-grow">
									<a rel="noopener noreferrer" href="#" class="font-serif hover:underline">{{ $populer['judul'] }}</a>
									<p class="mt-auto text-xs">{{ $populer['waktu'] }}
										<a rel="noopener noreferrer" href="#" class="block text-blue-400 dark:text-blue-600 lg:ml-2 lg:inline hover:underline">{{ $populer['kategori'] }}</a>
									</p>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
