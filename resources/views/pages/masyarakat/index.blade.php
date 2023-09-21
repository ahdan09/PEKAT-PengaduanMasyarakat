<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Lapor') }}
    </h2>
</x-slot>
<div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-12 text-gray-800 overflow-x-auto">
              <header>
                  <h2 class="text-lg font-medium text-white">
                      {{ __('Unggah Aduan') }}
                  </h2>

              </header>
              <form action="{{ route('pengaduan.store') }}" method="post" enctype="multipart/form-data" class="mt-6 space-y-6">
                  @csrf

                  <div class="max-w-xl">
                      <div class="form-control">
                          <x-input-label for="judul" :value="__('Judul Aduan')" required />
                          <x-text-input id="judul" name="judul" type="text" class="mt-1 block w-full" :placeholder="'Masukan judul aduan..'" :value="old('judul')" required autofocus />
                          <x-input-error class="mt-2" :messages="$errors->get('judul')" />
                      </div>
                  </div>

                  <div class="max-w-xl">  
                      <div class="form-control">
                          <x-input-label for="foto" :value="__('Gambar/Foto')" />
                            <input
                            class="block w-full border text-sm border-gray-800 focus:border-blue-700 focus:ring-blue-700 rounded-md shadow-sm cursor-pointer bg-gray-900 file-input text-white"
                              type="file" value="{{ old('foto')}}" name="foto" required/>
                        </div>
                  </div>

                  <div class="max-w-xl">
                      <div class="form-control">
                          <x-input-label for="isi_laporan" :value="__('Deskripsi Aduan')"  />
                          <x-textarea id="isi_laporan" name="isi_laporan" type="text" class="mt-1 block w-full" :placeholder="'Masukan detail aduan, dan sertakan lokasi'" required/>
                          <x-input-error class="mt-2" :messages="$errors->get('isi_laporan')" />
                      </div>
                  </div>

                  <x-primary-button>Simpan</x-primary-button>
                  <x-button-link-secondary href="{{ route('lihat.pengaduan') }}">Batal</x-button-link-secondary>
              </form>
          </div>
      </div>
  </div>
</div>
</x-app-layout>