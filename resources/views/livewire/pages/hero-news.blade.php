<div 
    x-data="{
        current: 0,
        beritas: @js($beritas),
        interval: null,
        init() {
            this.startAutoSlide();
        },
        startAutoSlide() {
            this.interval = setInterval(() => {
                this.current = (this.current + 1) % this.beritas.length;
            }, 5000);
        },
        goTo(index) {
            this.current = index;
            clearInterval(this.interval);
            this.startAutoSlide();
        }
    }" 
    x-init="init"
    class="relative overflow-hidden rounded-2xl shadow-xl h-80 bg-white/10 dark:bg-white/5 backdrop-blur-md ring-1 ring-white/30"
>
    <!-- Slide container -->
    <div class="relative w-full h-full">
        <template x-for="(berita, index) in beritas" :key="index">
            <div
                x-show="current === index"
                x-transition:enter="transition-opacity duration-500"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition-opacity duration-500"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="absolute inset-0 transition-all duration-500"
            >
                <!-- Gambar dan konten -->
                <img :src="berita.gambar" alt="" class="w-full h-full object-cover rounded-2xl">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent rounded-2xl"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent p-6 flex flex-col justify-end">
                    
                    <span class="inline-flex px-3 py-1 bg-orange-500 text-white text-xs font-semibold rounded mb-2 w-fit"
                        x-text="`${berita.tatanan}`">
                    </span>

                    <h2 class="text-white text-xl md:text-2xl font-bold leading-snug" x-text="berita.judul"></h2>

                    <a :href="'/berita/' + berita.slug" wire:navigate class="mt-4 inline-flex items-center gap-2 text-white text-sm hover:underline">
                        <div class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-white/20 hover:bg-white/30 transition">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </div>
                        <span>Selengkapnya</span>
                    </a>

                </div>
            </div>
        </template>
    </div>

    <!-- Navigasi bernomor -->
    <div class="absolute bottom-4 right-4 flex space-x-2 z-20">
        <template x-for="(berita, index) in beritas" :key="'nav-'+index">
            <button
                class="w-6 h-6 rounded-full flex items-center justify-center text-xs font-medium border border-white transition"
                :class="{
                    'bg-white text-black': current === index,
                    'bg-white/30 text-white': current !== index
                }"
                @click="goTo(index)"
                x-text="index + 1"
            ></button>
        </template>
    </div>
</div>
