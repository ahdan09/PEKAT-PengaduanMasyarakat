<div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-gray-800 overflow-hidden shadow-md rounded-lg">
          <div class="p-12 text-gray-50 overflow-x-auto">

            @if(Auth::user()->role === 'admin' || Auth::user()->role === 'petugas')
            @if ($petugasOrAdmin)
            <div class=" absolute right-40 ">
                <td class="px-6 py-4">
                  <form action="{{ route('tanggapan.destroy', $ktrgan->id_keterangan) }}" method="POST" style="display: inline-block;">
                      @csrf
                      @method('DELETE')
                      <button onclick="confirmDeleteTanggapan(event)" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-cyan-500 dark:hover:bg-cyan-600 focus:outline-none dark:focus:ring-cyan-700" aria-label="Delete">
                          <i class="fa-solid fa-trash"></i>
                      </button>                    
                  </form>
                </td>
            </div>
              @endif  
              @endif

              @if (empty($ktrgan))
                  <p class="text-center">Aduan belum ditanggapi oleh petugas, mohon tunggu.</p>
              @else
                  @if ($petugasOrAdmin)
                      <p class="text-gray-800 dark:text-gray-200 text-base font-semibold">
                        <i class="fa-regular fa-user mr-2"></i>{{ $petugasOrAdmin->role }}</p>
                      {{-- <p class="text-gray-200 font-medium text-sm">{{ $petugasOrAdmin->role }}</p> --}}
                      <p class="text-base  font-semibold text-gray-200 mb-4"><i class="fa-solid fa-calendar mr-2"></i>{{ $ktrgan->created_at->format('d M Y, H:i') }}</p>
                  @endif
                  <div class="border-t py-2 border-gray-400">
                      <p class="text-base font-medium  text-gray-200">{{ $ktrgan->keterangan}}</p>
                  </div>
              @endif


          </div>
      </div>
  </div>
</div>

<script>
    function confirmDeleteTanggapan(event) {
        event.preventDefault();

        console.log("Button clicked"); 
    
        Swal.fire({
            title: 'Apa kamu yakin?',
            text: 'Anda tidak akan dapat memulihkan Tanggapan ini!',
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

@include('vendor.sweetalert.alert')