<div x-data="{ selectedTatanan: null }" class=" pt-5">
  @php
    $tatanans = collect([
      ['no' => 1, 'judul' => 'Kehidupan Masyarakat Sehat Mandiri', 'jumlah' => 29],
      ['no' => 2, 'judul' => 'Permukiman dan Fasilitas Umum', 'jumlah' => 22],
      ['no' => 3, 'judul' => 'Satuan Pendidikan', 'jumlah' => 11],
      ['no' => 4, 'judul' => 'Pasar', 'jumlah' => 13],
      ['no' => 5, 'judul' => 'Perkantoran dan Perindustrian', 'jumlah' => 11],
      ['no' => 6, 'judul' => 'Pariwisata', 'jumlah' => 12],
      ['no' => 7, 'judul' => 'Transportasi dan Tertib Lalu Lintas Jalan', 'jumlah' => 11],
      ['no' => 8, 'judul' => 'Perlindungan Sosial', 'jumlah' => 13],
      ['no' => 9, 'judul' => 'Penanggulangan Bencana', 'jumlah' => 14],
    ])->map(function ($tatanan) {
        // Status
        if ($tatanan['no'] <= 6) {
          $status = 'Tercapai';
        } elseif ($tatanan['no'] <= 8) {
          $status = 'Proses';
        } else {
          $status = 'Belum';
        }

        // Dummy indikator
        $indikator = [];
        for ($i = 1; $i <= $tatanan['jumlah']; $i++) {
          $indikator[] = [
            'nama' => "Indikator $i",
            'skor' => $status === 'Tercapai' ? rand(90, 100) : null,
            'file' => $status === 'Tercapai' ? "file-bukti-$i.pdf" : null,
          ];
        }

        return array_merge($tatanan, compact('status', 'indikator'));
    });
  @endphp

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-center gap-x-6 gap-y-15 max-w-7xl mx-auto p-6">
    @foreach ($tatanans as $index => $tatanan)
      @php
        // Tentukan status dan ikon
        if ($tatanan['no'] <= 6) {
          $status = 'Tercapai';
          $statusColor = 'text-green-600';
          $statusIcon = '<path d="M10 15l-3.5-3.5 1.41-1.41L10 12.17l5.09-5.09 1.41 1.41z"/>';
        } elseif ($tatanan['no'] <= 8) {
          $status = 'Proses';
          $statusColor = 'text-yellow-500';
          $statusIcon = '<path fill-rule="evenodd" d="M12 22c5.522 0 10-4.478 10-10S17.522 2 12 2 2 6.478 2 12s4.478 10 10 10zm1-17v6h5v2h-7V5h2z" clip-rule="evenodd"/>';
        } else {
          $status = 'Belum';
          $statusColor = 'text-red-600';
          $statusIcon = '<path fill-rule="evenodd" d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20zM8.293 8.293a1 1 0 0 1 1.414 0L12 10.586l2.293-2.293a1 1 0 1 1 1.414 1.414L13.414 12l2.293 2.293a1 1 0 0 1-1.414 1.414L12 13.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L10.586 12 8.293 9.707a1 1 0 0 1 0-1.414z" clip-rule="evenodd"/>';
        }
      @endphp
      <div class="relative flex flex-col h-full w-full max-w-xs border-2 border-dashed dark:border-0 mx-auto rounded-xl bg-gradient-to-br from-white to-gray-50 bg-clip-border text-gray-700 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
        
        <!-- Header Icon -->
        <div class="relative mx-4 -mt-6 h-40 overflow-hidden rounded-xl bg-clip-border shadow-lg group">
          <!-- Background layers -->
          <div class="absolute inset-0 bg-gradient-to-r from-blue-600 via-blue-500 to-indigo-600 opacity-90"></div>
          <div class="absolute inset-0 bg-[linear-gradient(to_right,rgba(255,255,255,0.1)_1px,transparent_1px),linear-gradient(to_bottom,rgba(255,255,255,0.1)_1px,transparent_1px)] bg-[size:20px_20px] animate-pulse"></div>

          <!-- Content overlay -->
          <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white px-2">
            <!-- Icon -->
            <div class="mb-2">
              @php

          
                $iconPaths = [
                  'Kehidupan Masyarakat Sehat Mandiri' => ' <path d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />',
                  'Permukiman dan Fasilitas Umum' => '<path d="M19.006 3.705a.75.75 0 1 0-.512-1.41L6 6.838V3a.75.75 0 0 0-.75-.75h-1.5A.75.75 0 0 0 3 3v4.93l-1.006.365a.75.75 0 0 0 .512 1.41l16.5-6Z" />
                  <path fill-rule="evenodd" d="M3.019 11.114 18 5.667v3.421l4.006 1.457a.75.75 0 1 1-.512 1.41l-.494-.18v8.475h.75a.75.75 0 0 1 0 1.5H2.25a.75.75 0 0 1 0-1.5H3v-9.129l.019-.007ZM18 20.25v-9.566l1.5.546v9.02H18Zm-9-6a.75.75 0 0 0-.75.75v4.5c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75V15a.75.75 0 0 0-.75-.75H9Z" clip-rule="evenodd" />',
                  'Satuan Pendidikan' => '<path d="M11.7 2.805a.75.75 0 0 1 .6 0A60.65 60.65 0 0 1 22.83 8.72a.75.75 0 0 1-.231 1.337 49.948 49.948 0 0 0-9.902 3.912l-.003.002c-.114.06-.227.119-.34.18a.75.75 0 0 1-.707 0A50.88 50.88 0 0 0 7.5 12.173v-.224c0-.131.067-.248.172-.311a54.615 54.615 0 0 1 4.653-2.52.75.75 0 0 0-.65-1.352 56.123 56.123 0 0 0-4.78 2.589 1.858 1.858 0 0 0-.859 1.228 49.803 49.803 0 0 0-4.634-1.527.75.75 0 0 1-.231-1.337A60.653 60.653 0 0 1 11.7 2.805Z" />
                  <path d="M13.06 15.473a48.45 48.45 0 0 1 7.666-3.282c.134 1.414.22 2.843.255 4.284a.75.75 0 0 1-.46.711 47.87 47.87 0 0 0-8.105 4.342.75.75 0 0 1-.832 0 47.87 47.87 0 0 0-8.104-4.342.75.75 0 0 1-.461-.71c.035-1.442.121-2.87.255-4.286.921.304 1.83.634 2.726.99v1.27a1.5 1.5 0 0 0-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.66a6.727 6.727 0 0 0 .551-1.607 1.5 1.5 0 0 0 .14-2.67v-.645a48.549 48.549 0 0 1 3.44 1.667 2.25 2.25 0 0 0 2.12 0Z" />
                  <path d="M4.462 19.462c.42-.419.753-.89 1-1.395.453.214.902.435 1.347.662a6.742 6.742 0 0 1-1.286 1.794.75.75 0 0 1-1.06-1.06Z" />',
                  'Pasar' => ' <path d="M5.223 2.25c-.497 0-.974.198-1.325.55l-1.3 1.298A3.75 3.75 0 0 0 7.5 9.75c.627.47 1.406.75 2.25.75.844 0 1.624-.28 2.25-.75.626.47 1.406.75 2.25.75.844 0 1.623-.28 2.25-.75a3.75 3.75 0 0 0 4.902-5.652l-1.3-1.299a1.875 1.875 0 0 0-1.325-.549H5.223Z" />
                  <path fill-rule="evenodd" d="M3 20.25v-8.755c1.42.674 3.08.673 4.5 0A5.234 5.234 0 0 0 9.75 12c.804 0 1.568-.182 2.25-.506a5.234 5.234 0 0 0 2.25.506c.804 0 1.567-.182 2.25-.506 1.42.674 3.08.675 4.5.001v8.755h.75a.75.75 0 0 1 0 1.5H2.25a.75.75 0 0 1 0-1.5H3Zm3-6a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75v3a.75.75 0 0 1-.75.75h-3a.75.75 0 0 1-.75-.75v-3Zm8.25-.75a.75.75 0 0 0-.75.75v5.25c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75v-5.25a.75.75 0 0 0-.75-.75h-3Z" clip-rule="evenodd" />',
                  'Perkantoran dan Perindustrian' => ' <path fill-rule="evenodd" d="M4.5 2.25a.75.75 0 0 0 0 1.5v16.5h-.75a.75.75 0 0 0 0 1.5h16.5a.75.75 0 0 0 0-1.5h-.75V3.75a.75.75 0 0 0 0-1.5h-15ZM9 6a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5H9Zm-.75 3.75A.75.75 0 0 1 9 9h1.5a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM9 12a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5H9Zm3.75-5.25A.75.75 0 0 1 13.5 6H15a.75.75 0 0 1 0 1.5h-1.5a.75.75 0 0 1-.75-.75ZM13.5 9a.75.75 0 0 0 0 1.5H15A.75.75 0 0 0 15 9h-1.5Zm-.75 3.75a.75.75 0 0 1 .75-.75H15a.75.75 0 0 1 0 1.5h-1.5a.75.75 0 0 1-.75-.75ZM9 19.5v-2.25a.75.75 0 0 1 .75-.75h4.5a.75.75 0 0 1 .75.75v2.25a.75.75 0 0 1-.75.75h-4.5A.75.75 0 0 1 9 19.5Z" clip-rule="evenodd" />',
                  'Pariwisata' => '<path d="M12 9a3.75 3.75 0 1 0 0 7.5A3.75 3.75 0 0 0 12 9Z" />
                  <path fill-rule="evenodd" d="M9.344 3.071a49.52 49.52 0 0 1 5.312 0c.967.052 1.83.585 2.332 1.39l.821 1.317c.24.383.645.643 1.11.71.386.054.77.113 1.152.177 1.432.239 2.429 1.493 2.429 2.909V18a3 3 0 0 1-3 3h-15a3 3 0 0 1-3-3V9.574c0-1.416.997-2.67 2.429-2.909.382-.064.766-.123 1.151-.178a1.56 1.56 0 0 0 1.11-.71l.822-1.315a2.942 2.942 0 0 1 2.332-1.39ZM6.75 12.75a5.25 5.25 0 1 1 10.5 0 5.25 5.25 0 0 1-10.5 0Zm12-1.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />',
                  'Transportasi dan Tertib Lalu Lintas Jalan' => ' <path d="M21.721 12.752a9.711 9.711 0 0 0-.945-5.003 12.754 12.754 0 0 1-4.339 2.708 18.991 18.991 0 0 1-.214 4.772 17.165 17.165 0 0 0 5.498-2.477ZM14.634 15.55a17.324 17.324 0 0 0 .332-4.647c-.952.227-1.945.347-2.966.347-1.021 0-2.014-.12-2.966-.347a17.515 17.515 0 0 0 .332 4.647 17.385 17.385 0 0 0 5.268 0ZM9.772 17.119a18.963 18.963 0 0 0 4.456 0A17.182 17.182 0 0 1 12 21.724a17.18 17.18 0 0 1-2.228-4.605ZM7.777 15.23a18.87 18.87 0 0 1-.214-4.774 12.753 12.753 0 0 1-4.34-2.708 9.711 9.711 0 0 0-.944 5.004 17.165 17.165 0 0 0 5.498 2.477ZM21.356 14.752a9.765 9.765 0 0 1-7.478 6.817 18.64 18.64 0 0 0 1.988-4.718 18.627 18.627 0 0 0 5.49-2.098ZM2.644 14.752c1.682.971 3.53 1.688 5.49 2.099a18.64 18.64 0 0 0 1.988 4.718 9.765 9.765 0 0 1-7.478-6.816ZM13.878 2.43a9.755 9.755 0 0 1 6.116 3.986 11.267 11.267 0 0 1-3.746 2.504 18.63 18.63 0 0 0-2.37-6.49ZM12 2.276a17.152 17.152 0 0 1 2.805 7.121c-.897.23-1.837.353-2.805.353-.968 0-1.908-.122-2.805-.353A17.151 17.151 0 0 1 12 2.276ZM10.122 2.43a18.629 18.629 0 0 0-2.37 6.49 11.266 11.266 0 0 1-3.746-2.504 9.754 9.754 0 0 1 6.116-3.985Z" />',
                  'Perlindungan Sosial' => ' <path fill-rule="evenodd" d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z" clip-rule="evenodd" />
                  <path d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z" />',
                  'Penanggulangan Bencana' => ' <path fill-rule="evenodd" d="M12 6.75a5.25 5.25 0 0 1 6.775-5.025.75.75 0 0 1 .313 1.248l-3.32 3.319c.063.475.276.934.641 1.299.365.365.824.578 1.3.64l3.318-3.319a.75.75 0 0 1 1.248.313 5.25 5.25 0 0 1-5.472 6.756c-1.018-.086-1.87.1-2.309.634L7.344 21.3A3.298 3.298 0 1 1 2.7 16.657l8.684-7.151c.533-.44.72-1.291.634-2.309A5.342 5.342 0 0 1 12 6.75ZM4.117 19.125a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.008a.75.75 0 0 1-.75-.75v-.008Z" clip-rule="evenodd" />
                  <path d="m10.076 8.64-2.201-2.2V4.874a.75.75 0 0 0-.364-.643l-3.75-2.25a.75.75 0 0 0-.916.113l-.75.75a.75.75 0 0 0-.113.916l2.25 3.75a.75.75 0 0 0 .643.364h1.564l2.062 2.062 1.575-1.297Z" />
                  <path fill-rule="evenodd" d="m12.556 17.329 4.183 4.182a3.375 3.375 0 0 0 4.773-4.773l-3.306-3.305a6.803 6.803 0 0 1-1.53.043c-.394-.034-.682-.006-.867.042a.589.589 0 0 0-.167.063l-3.086 3.748Zm3.414-1.36a.75.75 0 0 1 1.06 0l1.875 1.876a.75.75 0 1 1-1.06 1.06L15.97 17.03a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />',
                ];
              @endphp

              <svg viewBox="0 0 24 24" fill="currentColor" class="w-16 h-16 text-white/90 transition-transform group-hover:scale-110 duration-300">
                {!! $iconPaths[$tatanan['judul']] ?? '<circle cx="12" cy="12" r="10"/>' !!}
              </svg>
            </div>

            <!-- Tatanan info -->
            <div>
              <h4 class="text-xl font-bold leading-tight">Tatanan {{ $tatanan['no'] }}</h4>
            </div>
          </div>
        </div>


       <div class="p-6 flex flex-col justify-between flex-grow">
          <!-- Bagian atas -->
          <div>
            <h5 class="mb-2 text-xl font-semibold text-gray-900 group-hover:text-blue-600 transition-colors duration-300">
              {{ $tatanan['judul'] }}
            </h5>
           
          </div>

          <!-- Bagian bawah: Jumlah indikator + status -->
          <div class="mt-auto pt-4 border-t border-gray-200 space-y-2">
            <p class="text-sm font-medium text-gray-700">
              Jumlah Indikator: {{ $tatanan['jumlah'] }}
            </p>

            <div class="flex items-center gap-2">
              <svg class="w-5 h-5 {{ $statusColor }}" fill="currentColor" viewBox="0 0 24 24">
                {!! $statusIcon !!}
              </svg>
              <span class="text-sm font-semibold {{ $statusColor }}">{{ $status }}</span>
            </div>
          </div>

        </div>

        <!-- Button -->
        <div class="p-6 pt-0 mt-auto">
          <button
            class="group w-full inline-flex items-center justify-center px-6 py-3 font-bold text-white rounded-lg bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 shadow-lg shadow-blue-500/30 hover:shadow-blue-500/40 transition-all duration-300 hover:-translate-y-0.5"
            data-hs-overlay="#modal-{{ $index }}"
          >
            <span class="flex items-center gap-2">
              Lihat Detail
              <svg viewBox="0 0 24 24" stroke="currentColor" fill="none" class="w-5 h-5 transform transition-transform group-hover:translate-x-1">
                <path d="M17 8l4 4m0 0l-4 4m4-4H3" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" />
              </svg>
            </span>
          </button>
        </div>

      </div>
    @endforeach
  </div>




  <!-- Modal -->
  @foreach ($tatanans as $i => $tatanan)
    <div id="modal-{{ $i }}" class="hs-overlay hidden fixed inset-0 z-80 overflow-y-auto pointer-events-none">
      <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 transition-all sm:max-w-4xl m-4 mx-auto h-[calc(100%-56px)] flex items-center">
        <div class="w-full max-h-full overflow-hidden flex flex-col bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-neutral-700 pointer-events-auto">

          {{-- Header --}}
          <div class="flex justify-between items-start gap-4 py-4 px-6 border-b border-gray-200 dark:border-neutral-700">
            <div class="flex items-center gap-3 flex-wrap">
              <h3 class="text-xl font-bold text-gray-800 dark:text-white">
                Tatanan {{ $tatanan['no'] }}: {{ $tatanan['judul'] }}
              </h3>
              <span @class([
                'text-xs uppercase tracking-wide font-semibold px-3 py-1 rounded-full ring-1 ring-inset shadow-sm',
                'bg-green-100 text-green-800 ring-green-300' => $tatanan['status'] === 'Tercapai',
                'bg-yellow-100 text-yellow-800 ring-yellow-300' => $tatanan['status'] === 'Proses',
                'bg-red-100 text-red-800 ring-red-300' => $tatanan['status'] === 'Belum',
              ])>
                {{ $tatanan['status'] }}
              </span>


            </div>

            <button class="size-8 flex justify-center items-center rounded-full bg-gray-100 dark:bg-neutral-700 text-gray-700 dark:text-neutral-300 hover:bg-gray-200 dark:hover:bg-neutral-600"
              data-hs-overlay="#modal-{{ $i }}">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
              </svg>
            </button>
          </div>

          {{-- Body --}}
          <div class="p-6 overflow-y-auto text-gray-800 dark:text-gray-200">
            <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-neutral-700">
              <table class="w-full text-sm text-center bg-white dark:bg-gray-800">
                <thead class="bg-gray-100 dark:bg-neutral-700 text-gray-700 dark:text-gray-200">
                  <tr>
                    <th class="px-4 py-3">Indikator</th>
                    <th class="px-4 py-3">Skor</th>
                    <th class="px-4 py-3">File Bukti</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                  @php $total = 0; @endphp
                  @foreach ($tatanan['indikator'] as $indikator)
                    @php $total += $indikator['skor'] ?? 0; @endphp
                    <tr class="hover:bg-gray-50 dark:hover:bg-neutral-700">
                      <td class="px-4 py-3">{{ $indikator['nama'] }}</td>
                      <td class="px-4 py-3 font-semibold">
                        {{ $indikator['skor'] ?? '-' }}
                      </td>
                      <td class="px-4 py-3">
                        @if ($indikator['file'])
                          <a href="{{ asset('storage/' . $indikator['file']) }}" target="_blank" class="text-blue-600 hover:underline">Lihat</a>
                        @else
                          <span class="text-gray-400 italic">Kosong</span>
                        @endif
                      </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
  <tr class="bg-gray-100 dark:bg-neutral-700 font-semibold text-gray-800 dark:text-white">
    <td colspan="3" class="px-4 py-3 text-center">
      Total Skor: <span class="text-blue-700 dark:text-blue-400">{{ $total }}</span>
    </td>
  </tr>
</tfoot>

              </table>
            </div>
          </div>

          {{-- Footer --}}
          <div class="flex justify-end items-center gap-x-2 py-3 px-6 border-t border-gray-200 dark:border-neutral-700">
            <button data-hs-overlay="#modal-{{ $i }}"
              class="py-2 px-4 rounded-lg text-sm font-medium bg-gray-100 text-gray-800 hover:bg-gray-200 dark:bg-neutral-700 dark:text-white dark:hover:bg-neutral-600">
              Tutup
            </button>
          </div>

        </div>
      </div>
    </div>
  @endforeach




</div>


