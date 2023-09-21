<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Kelola User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-12 text-gray-800 overflow-x-auto">
                    <header>
                        <h2 class="text-lg font-medium text-white">
                            {{ __('Ubah User') }}
                        </h2>

                    </header>
                    <form action="{{ route('users.update', $user->id) }}" method="post" class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="max-w-xl">
                            <div class="form-control ">
                                <x-input-label for="nik" :value="__('Nik')" required />
                                <x-text-input id="nik" name="nik" type="text" class="mt-1 block w-full" :value="$user->nik" readonly required autofocus autocomplete="nik" />
                                <x-input-error class="mt-2" :messages="$errors->get('nik')" />
                            </div>
                        </div>

                        <div class="max-w-xl">
                            <div class="form-control">
                                <x-input-label for="nama" :value="__('Nama')" required />
                                <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full" :value="$user->nama" required autofocus autocomplete="nama" />
                                <x-input-error class="mt-2" :messages="$errors->get('Nama')" />
                            </div>
                        </div>

                        <div class="max-w-xl">
                            <div class="form-control">
                                <x-input-label for="email" :value="__('Email')" required />
                                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="$user->email" required autofocus autocomplete />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>
                        </div>

                        <div class="max-w-xl">
                            <div class="form-control">
                                <x-input-label for="role" :value="__('Role')" required />
                                <x-select-input id="role" name="role" :options="$roleOptions" required :selected="$user->role" />
                                <x-input-error class="mt-2" :messages="$errors->get('role')" />
                            </div>
                        </div>

                        <div class="max-w-xl">
                            <div class="form-control">
                                <x-input-label for="password" :value="__('Password')" required />
                                <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" :value="old('password')" autofocus autocomplete />
                                <x-input-error class="mt-2" :messages="$errors->get('password')" />
                            </div>
                        </div>

                        <x-primary-button>Simpan</x-primary-button>
                        <x-button-link-secondary href="{{ route('users.index') }}">Batal</x-button-link-secondary>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
