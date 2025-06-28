 {{-- <!-- Modern Hero Section -->
    <div class="relative min-h-[100dvh] overflow-hidden flex items-center justify-center">
        <!-- Background Elements -->
        <div class="fixed inset-0">
            <!-- Gradient Mesh -->
            <div class="absolute inset-0 bg-gradient-to-br from-violet-600/20 via-transparent to-cyan-600/20 opacity-50"></div>
            
            <!-- Animated Shapes - Responsive sizes -->
            <div class="absolute top-1/4 -left-20 w-[20rem] sm:w-[30rem] lg:w-[40rem] h-[20rem] sm:h-[30rem] lg:h-[40rem] bg-gradient-to-br from-violet-600/30 to-fuchsia-600/30 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-1/4 -right-20 w-[20rem] sm:w-[30rem] lg:w-[40rem] h-[20rem] sm:h-[30rem] lg:h-[40rem] bg-gradient-to-br from-cyan-600/30 to-blue-600/30 rounded-full blur-3xl animate-float [animation-delay:-6s]"></div>
            
            <!-- Glass Layer with reduced blur on mobile -->
            <div class="absolute inset-0 backdrop-blur-[50px] sm:backdrop-blur-[100px]"></div>
        </div>

        <!-- Content Container with better padding for mobile -->
        <div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-20">
            <!-- Main Grid with improved mobile layout -->
            <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center">
                <!-- Left Column - Text Content -->
                <div class="space-y-6 sm:space-y-8 text-center lg:text-left">
                    <!-- Badge - Adjusted for mobile -->
                    <div class="animate-reveal [animation-delay:0.2s] flex justify-center lg:justify-start">
                        <div class="inline-flex items-center px-3 py-1.5 border border-white/10 rounded-full bg-white/5 backdrop-blur-lg transform hover:scale-105 transition-transform">
                            <div class="w-2 h-2 rounded-full bg-violet-500 animate-pulse"></div>
                            <span class="ml-2 text-xs sm:text-sm text-white/70 tracking-wider">NEXT GENERATION</span>
                        </div>
                    </div>

                    <!-- Main Title - Responsive text sizes -->
                    <div class="animate-reveal [animation-delay:0.4s]">
                        <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold">
                            <span class="inline-block bg-gradient-to-r from-violet-300 via-cyan-300 to-violet-300 bg-[length:200%_auto] animate-gradient bg-clip-text text-transparent">Future of</span>
                            <span class="block mt-2 text-white">Digital Design</span>
                        </h1>
                    </div>

                    <!-- Description - Adjusted line length -->
                    <p class="text-base sm:text-lg text-white/60 max-w-xl mx-auto lg:mx-0 animate-reveal [animation-delay:0.6s]">
                        Experience the next evolution of digital interfaces. Where minimalism meets innovation, creating seamless and intuitive experiences.
                    </p>

                    <!-- CTA Section - Better mobile layout -->
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 animate-reveal [animation-delay:0.8s]">
                        <!-- Primary Button - Full width on mobile -->
                        <button class="group relative w-full sm:w-auto px-6 py-3 min-w-[160px]">
                            <div class="absolute inset-0 bg-gradient-to-r from-violet-600 to-cyan-600 rounded-lg"></div>
                            <div class="absolute inset-0 bg-gradient-to-r from-violet-600 to-cyan-600 rounded-lg blur-lg group-hover:opacity-60 transition-opacity duration-500"></div>
                            <div class="relative flex items-center justify-center gap-2">
                                <span class="text-white font-medium">Explore Interface</span>
                                <svg class="w-5 h-5 text-white transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </div>
                        </button>

                        <!-- Secondary Button - Full width on mobile -->
                        <button class="w-full sm:w-auto px-6 py-3 rounded-lg border border-white/10 bg-white/5 backdrop-blur-lg text-white/70 hover:bg-white/10 hover:text-white transition-all min-w-[160px]">
                            Documentation
                        </button>
                    </div>
                </div>

                <!-- Right Column - Visual Element with better mobile scaling -->
                <div class="relative h-[400px] sm:h-[500px] lg:h-[600px] mt-8 lg:mt-0 animate-reveal [animation-delay:1s]">
                    <!-- Morphing Shape Container -->
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="relative w-[280px] sm:w-[350px] lg:w-[400px] h-[280px] sm:h-[350px] lg:h-[400px] animate-morph">
                            <!-- Glass Card with improved mobile appearance -->
                            <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-white/5 backdrop-blur-lg rounded-[inherit] border border-white/10 shadow-2xl"></div>
                            
                            <!-- Floating Elements - Responsive spacing -->
                            <div class="absolute inset-4 sm:inset-6 flex flex-col justify-between p-4 sm:p-6">
                                <!-- Top Section -->
                                <div class="space-y-3 sm:space-y-4">
                                    <div class="w-8 sm:w-12 h-8 sm:h-12 rounded-full bg-gradient-to-r from-violet-500 to-cyan-500 animate-pulse"></div>
                                    <div class="h-1.5 sm:h-2 w-20 sm:w-24 bg-white/20 rounded-full"></div>
                                    <div class="h-1.5 sm:h-2 w-24 sm:w-32 bg-white/10 rounded-full"></div>
                                </div>
                                
                                <!-- Middle Section -->
                                <div class="flex justify-between items-center">
                                    <div class="space-y-2">
                                        <div class="h-6 sm:h-8 w-20 sm:w-24 rounded-lg bg-gradient-to-r from-violet-500/20 to-cyan-500/20"></div>
                                        <div class="h-1.5 sm:h-2 w-12 sm:w-16 bg-white/20 rounded-full"></div>
                                    </div>
                                    <div class="w-12 sm:w-16 h-12 sm:h-16 rounded-full bg-gradient-to-r from-violet-500/30 to-cyan-500/30 animate-float"></div>
                                </div>
                                
                                <!-- Bottom Section -->
                                <div class="space-y-2 sm:space-y-3">
                                    <div class="h-1.5 sm:h-2 w-full bg-white/10 rounded-full"></div>
                                    <div class="h-1.5 sm:h-2 w-3/4 bg-white/20 rounded-full"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

<!-- Hero -->
<div class="relative overflow-hidden">
  <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-7">
    <div class="max-w-2xl text-center mx-auto">
      <h1 class="block text-3xl font-bold text-gray-800 sm:text-4xl md:text-5xl dark:text-white">Designed for you to get more <span class="text-blue-600">simple</span></h1>
      <p class="mt-3 text-lg text-gray-800 dark:text-neutral-400">Build your business here. Take it anywhere.</p>
    </div>

    <div class="mt-10 relative max-w-5xl mx-auto">
      <div class="w-full object-cover h-96 sm:h-120 bg-[url('https://images.unsplash.com/photo-1606868306217-dbf5046868d2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1020&q=80')] bg-no-repeat bg-center bg-cover rounded-xl"></div>

      <div class="absolute inset-0 size-full">
        <div class="flex flex-col justify-center items-center size-full">
          <a class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-full border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 3 19 12 5 21 5 3"/></svg>
            Play the overview
          </a>
        </div>
      </div>

      <div class="absolute bottom-12 -start-20 -z-1 size-48 bg-linear-to-b from-orange-500 to-white p-px rounded-lg dark:to-neutral-900">
        <div class="bg-white size-48 rounded-lg dark:bg-neutral-900"></div>
      </div>

      <div class="absolute -top-12 -end-20 -z-1 size-48 bg-linear-to-t from-blue-600 to-cyan-400 p-px rounded-full">
        <div class="bg-white size-48 rounded-full dark:bg-neutral-900"></div>
      </div>
    </div>
  </div>
</div>
<!-- End Hero -->