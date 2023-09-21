<div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-gray-800 overflow-hidden shadow-md rounded-lg">
      <div class="p-12 text-gary-50 overflow-x-auto">
    <form action="{{ route('tanggapan.store')}} " method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id_pengaduan" value="{{ $item->id_pengaduan }} ">
        <label class="block text-sm">
            <div class="max-w-xl">
              <div class="form-control">
                  <x-input-label for="keterangan" :value="__('Tanggapan')"  />
                  <x-textarea id="keterangan" name="keterangan" type="text" class="mt-1 block w-full" :placeholder="'Masukan Tanggapan aduan..'" required/>
                  <x-input-error class="mt-2" :messages="$errors->get('keterangan')" />
              </div>
          </div>
        </label>

        <label class="block mt-4 text-sm mb-5">
          <x-input-label for="status" :value="__('Status Aduan')"  />
      
          <select
              class="bg-gray-900 text-white border-gray-900 focus:border-blue-700 focus:ring-blue-700 rounded-md shadow-sm"
              name="status" required>
              <option value="belum diproses">Belum di Proses</option>
              <option value="sedang proses">Sedang di Proses</option>
              <option value="selesai">Selesai</option>
          </select>
      </label>


      <x-primary-button>Kirim</x-primary-button>
      <x-button-link-secondary href="{{ route('pengaduan.show',['pengaduan' => $item->id_pengaduan]) }}">Batal</x-button-link-secondary>
    </form>
   </div>
  </div>
 </div>
</div>
