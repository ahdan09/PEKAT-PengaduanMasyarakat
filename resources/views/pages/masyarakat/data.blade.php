<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Pengaduan') }}
    </h2>
</x-slot>


<div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-gray-800 overflow-hidden shadow-md rounded-lg">
      <div class="p-12 text-gary-50 overflow-x-auto">
        <x-button-link-primary class="mb-1" href="{{ route('pengaduan.index') }}"><i class="fa-solid fa-bullhorn mr-1"></i>
          {{ __('Lapor') }}</x-button-link-primary>
          @if(Auth::user()->role === 'admin')
            <x-button-link-primary class="mb-1 ml-3" href="{{ route('admin.laporan.cetak') }}"><i class="fa-solid fa-file-arrow-up mr-1"></i>
              {{ __('PDF') }}</x-button-link-primary>
          @endif
        {{-- dropdown --}}
        <div class="dropdown dropdown-end" style="margin-left: 790px;"> 
          <label tabindex="0" class=" text-gray-50 rounded-md bg-transparent hover:bg-none ml-auto">Tampilan<i class="fa-solid fa-caret-down ml-2"></i></label>
          <ul tabindex="0" class="dropdown-content z-[1] menu p-1 shadow rounded-box w-52 bg-gray-700 text-gray-50"> 
              <li><a href="{{ route('lihat.pengaduan') }}">Aduan anda</a></li>
              <li><a href="{{ route('pengaduans.index') }}">Semua aduan</a></li>
          </ul>
        </div>
        
        <h1 class="text-3xl font-bold my-8 text-gray-50">Aduan Anda</h1>
        @if ($items->isEmpty())
          <h1 class="text-lg font-medium my-5 text-center">Anda belum mengirimkan aduan. Silakan kirim aduan Anda sekarang!</h1>
        @else
          <div class="grid grid-cols-2 gap-5 lg:grid-cols-4">
            @forelse ($items as $item)
              <div class="card card-compact w-65 bg-base-100 shadow-xl">
                <figure class="rounded-t-lg block overflow-hidden relative w-full h-[150px]">
                  <img src="{{ Storage::url($item->foto) }}" alt=""/>
                </figure>
                <div class="card-body bg-gray-600 rounded-b-lg text-gray-100">
                  <h2 class="card-title truncate">{{ $item->judul }}</h2>
                  <p><i class="fa-solid fa-user mr-2"></i>{{ $item->user->nama }}</p>
                  <p class="mt-1"><i class="fa-solid fa-calendar mr-2"></i>{{ $item->created_at->format('d M Y, H:i') }}</p>
                  <p class="mt-1">
                  @if($item->status == 'belum diproses')
                    <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-md dark:text-gray-100 dark:bg-red-700"><i class="fa-solid fa-clock mr-2"></i>belum diproses</span>
                  @elseif($item->status == 'sedang proses')
                    <span class="px-2 py-1 font-semibold leading-tight text-orange-500 bg-orange-100 rounded-md dark:text-gray-100 dark:bg-orange-500"><i class="fa-solid fa-hourglass-start mr-2"></i>sedang diproses</span>
                  @else
                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-md dark:bg-green-700 dark:text-gray-100"><i class="fa-solid fa-check mr-2"></i>Selesai</span>
                  @endif
                </p>
                <div class="text-md mt-2 border-t dark:border-gray-300 text-center">                    
                  <a href="{{ route('pengaduan.show',['pengaduan' => $item->id_pengaduan]) }}">
                      <button class="mt-2">Detail</button>
                    </a>           
                  </div>
                </div>
              </div>
            @empty
              <!-- Jika tidak ada data -->
            @endforelse
          </div>
        @endif
      </div>
    </div>
  </div>
</div>

@include('vendor.sweetalert.alert')
</x-app-layout>

<footer class="footer footer-center p-4 bg-cyan-600 text-md font-semibold text-white">
  <aside>
    <p>© {{ now()->year }} PEKAT | By ahdann</p>
  </aside>
</footer>
