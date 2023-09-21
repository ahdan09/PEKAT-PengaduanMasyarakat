<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-gray-800 overflow-hidden shadow-sm rounded-md">
        <div class="p-6 text-gray-100">
        <div class="relative overflow-x-auto  sm:rounded-lg">
          <div class="flex items-center justify-between pb-4 bg-white dark:bg-gray-800">
              <div>
                <x-button-link-primary class="mb-1" href="{{ route('users.create') }}"><i class="fa-solid fa-user-plus mr-1"></i>
                    {{ __('Tambah') }}</x-button-link-primary>
        
                <x-button-link-primary class="mb-1 ml-3" href="{{ route('user.export') }}"><i class="fa-solid fa-file-arrow-up mr-1"></i>
                    {{ __('PDF') }}</x-button-link-primary>
                    <h1 class="text-3xl font-bold my-6 text-gray-50">Data User</h1>
                  <!-- Dropdown menu -->
                  <div id="dropdownAction" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-800 dark:divide-gray-600">
                      <ul class="py-1 text-sm text-gray-800 dark:text-gray-200" aria-labelledby="dropdownActionButton">
                          <li>
                              <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Reward</a>
                          </li>
                          <li>
                              <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Promote</a>
                          </li>
                          <li>
                              <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Activate account</a>
                          </li>
                      </ul>
                      <div class="py-1">
                          <a href="#" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete User</a>
                      </div>
                  </div>
              </div>
          </div>
          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-900 dark:text-gray-400">
                  <tr>
                      <th scope="col" class="p-4 rounded-tl-lg">
                          #
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Nama
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Email
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Role
                      </th>
                      <th scope="col" class="px-6 py-3 rounded-tr-lg">
                          Action
                      </th>
                  </tr>
              </thead>
              <tbody>
                @php
                $currentPage = $users->currentPage();
                $perPage = $users->perPage();
                $startNumber = ($currentPage - 1) * $perPage + 1;
                @endphp
                @foreach ($users as $user)
                  <tr class="bg-white border-b dark:bg-gray-700 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <td class="w-4 p-4">
                        {{ $startNumber++ }}
                      </td>
                      <td class="px-6 py-4">
                          {{ $user->nama }}
                      </td>
                      <td class="px-6 py-4">
                        {{ $user->email }}
                      </td>
                      <td class="px-6 py-4">
                        {{ $user->role }}
                      </td>
                      <td class="px-6 py-4">
                          <a href="{{ route('users.edit', $user->id) }}" class="font-medium text-cyan-600 dark:text-cyan-600 hover:underline"><i class="fa-solid fa-pen"></i></a>
                          <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button
                            onclick="confirmDelete(event)"
                            class="ml-8 font-medium text-cyan-600 dark:text-cyan-600 hover:underline"
                             aria-label="Delete">
                             <i class="fa-solid fa-trash"></i>
                           </button>                    
                          </form>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
                <div class="mt-6">
                    {{ $users->links('vendor.pagination.pagination-costum') }}
                </div>
            </div>
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

