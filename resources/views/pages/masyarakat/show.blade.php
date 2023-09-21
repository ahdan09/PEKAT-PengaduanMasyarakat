<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Detail Aduan') }}
    </h2>
</x-slot>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-800 overflow-hidden shadow-md rounded-lg">
          <div class="p-12 text-gary-50 overflow-x-auto">

            <div class="card lg:card-side bg-gray-700 shadow-xl ">
              <a href="{{ Storage::url($item->foto) }}" data-fslightbox="gallery">
                <figure><img style="min-width: 800px; max-width: 800px;" class="h-96" src="{{ Storage::url($item->foto) }}" alt=""/></figure>
            </a>
              <div class="card-body">
                  <h1 class="font-semibold text-4xl text-gray-200">{{ $item->judul }}</h1>
                  <div class="grid grid-cols-2 justify-between relative gap-3">
                  <p class="text-xs lg:text-sm text-gray-200 mt-4">
                      <i class="fa-solid fa-user mr-2"></i>
                      <span class="font-medium inline-block align-middle">{{ $item->user->nama }}</span>
                    </p>

                      <p class="text-xs lg:text-sm text-gray-200 absolute pt-20 ">
                        <i class="fa-solid fa-calendar mr-2"></i>
                        <span class="inline-block align-middle font-medium">{{ $item->created_at->format('d M Y, H:i') }}</span>
                    </p>

                  <p class="text-xs lg:text-sm text-gray-200 absolute pt-12"><i class="fa-solid fa-envelope mr-2"></i>{{ $item->user->email }}</p>
                  <p class="text-xs lg:text-sm text-gray-500 absolute pt-28">
                  @if($item->status == 'belum diproses')
                      <span class="px-2 py-1 inline-block align-middle font-semibold leading-tight text-red-700 bg-red-100 rounded-md dark:text-red-100 dark:bg-red-700"><i class="fa-solid fa-clock mr-2"></i>belum diproses</span>
                  @elseif($item->status == 'sedang proses')
                      <span class="px-2 py-1 inline-block align-middle font-semibold leading-tight text-orange-700 bg-orange-100 rounded-md dark:text-white dark:bg-orange-600"><i class="fa-solid fa-hourglass-start mr-2"></i>sedang diproses</span>
                  @else
                      <span class="px-2 py-1 inline-block align-middle font-semibold leading-tight text-green-700 bg-green-100 rounded-md dark:bg-green-700 dark:text-green-100"><i class="fa-solid fa-check mr-2"></i>Selesai</span>
                  @endif
                </p>
                </div>
                
                @if(Auth::user()->role === 'admin')
                  <div class="card-actions absolute right-2 bottom-2">
                      <td class="px-6 py-4">
                          <form action="{{ route('pengaduans.destroy', $item->id_pengaduan) }}" method="POST" style="display: inline-block;">
                              @csrf
                              @method('DELETE')
                              <button onclick="confirmDeletePengaduan(event)" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-cyan-500 dark:hover:bg-cyan-600 focus:outline-none dark:focus:ring-cyan-700" aria-label="Delete">
                                  <i class="fa-solid fa-trash"></i>
                              </button>                    
                          </form>
                      </td>
                  </div>
                  @endif
              </div>
          </div>
          

        <div class="text-center flex-1 dark:text-gray-200 py-4">
          <h1 class="mb-8 text-xl  font-bold">Deskripsi Aduan</h1>
          <p class="text-gray-800 dark:text-gray-200 font-medium">
            {{ $item->isi_laporan}}
          </p>
        </div>
        <div class="px-4 pt-4 flex">
          <x-button-link-primary class="mb-1 ml-3" href="{{ route('pengaduans.index') }}"><i class="fa-solid fa-arrow-left mr-2"></i>
            {{ __('Kembali') }}</x-button-link-primary>
        </div>
       </div>
      </div>
     </div>
    </div>

    @if(Auth::user()->role === 'admin' || Auth::user()->role === 'petugas')
    @include('pages.admin.tanggapan.add')
    @endif
   
    @include('pages.admin.tanggapan.Tanggapan')
  

      <div class="px-4 py-2 mb-2 flex justify-center">
        <x-button-link-primary class="mb-1 ml-3" href="{{ route('pengaduans.index') }}"><i class="fa-solid fa-arrow-left mr-2"></i>
          {{ __('Kembali') }}</x-button-link-primary>
      </div>

    </div>
  </main>
  @include('vendor.script')
  @include('vendor.sweetalert.alert')
  <script>
    function confirmDeletePengaduan(event) {
        event.preventDefault();

        Swal.fire({
        title: 'Apa kamu yakin?',
        text: 'Anda tidak akan dapat memulihkan pengaduan ini!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batalkan'
    }).then((result) => {
        if (result.isConfirmed) {
            event.target.closest('form').submit();
        }
    });
  }
</script>
</x-app-layout>

<footer class="footer footer-center p-4 bg-cyan-500 text-md font-semibold text-white">
  <aside>
    <p>Copyright © 2023 - All right reserved by ACME Industries Ltd</p>
  </aside>
</footer>
