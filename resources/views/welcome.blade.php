<x-app-layout>
    <div class="pt-28 px-16 bg-gray-800">
        <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
            <!--Left Col-->
            <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left text-gray-100">
                <h1 class="my-4 text-4xl font-bold leading-tight">
                    Layanan Pengaduan Masyarakat Online
                </h1>
                <p class="leading-normal text-1xl mb-8">
                    Sampaikan laporan masalah Anda di sini, kami akan memprosesnya
                    dengan cepat.
                </p>
                <x-button-link-primary class="mb-1" href="{{ route('pengaduan.index') }}"><i
                        class="fa-solid fa-bullhorn mr-1"></i>
                    {{ __('Laporkan!') }}</x-button-link-primary>

            </div>
            <!--Right Col-->
            <div class="w-1/2 md:w-3/5 text-center">
                <img class="object-fill mx-auto max-w-[500px] max-h-[500px] transform transition hover:scale-110 duration-300 ease-in-out"
                    src="{{ asset('img/bg.png') }}" />
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" bg-gray-900 overflow-hidden rounded-lg">
                <h1 class="text-3xl font-bold my-5 text-gray-50 text-center mt-10">Bagaimana Alur Pengaduan ?</h1>
                <div class="p-12 text-gary-50 overflow-x-auto flex flex-wrap -mx-1 lg:-mx-4">
                    <!-- Column -->
                    <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/4">
                        <!-- Article -->
                        <article class="overflow-hidden rounded-lg shadow-lg  text-gray-200 bg-gray-800 h-full">
                            <img alt="Tulis"
                                class="block h-auto w-full lg:w-28 mx-auto my-10 transform transition hover:scale-125 duration-300 ease-in-out"
                                src="{{ asset('img/icon/writing.png') }}" />
                            <header class="leading-tight p-2 md:p-4 text-center ">
                                <h1 class="text-lg font-bold">1. Tulis Laporan</h1>
                                <p class="text-grey-darker text-sm py-4">
                                    Laporkan keluhan atau aspirasi anda dengan jelas dan lengkap
                                </p>
                            </header>
                        </article>
                        <!-- END Article -->
                    </div>
                    <!-- END Column -->
                    <!-- Column -->
                    <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/4">
                        <!-- Article -->
                        <article class="overflow-hidden rounded-lg shadow-lg text-gray-200 bg-gray-800 h-full">
                            <img alt="Proses"
                                class="block h-auto w-full lg:w-28 mx-auto my-10 transform transition hover:scale-125 duration-300 ease-in-out"
                                src="{{ asset('img/icon/verification.png') }}" />
                            <header class="leading-tight p-2 md:p-4 text-center">
                                <h1 class="text-lg font-bold">2. Proses Verifikasi</h1>
                                <p class="text-grey-darker text-sm py-4">
                                    laporan Anda akan diverifikasi dan diteruskan kepada instansi berwenang
                                </p>
                            </header>
                        </article>
                        <!-- END Article -->
                    </div>
                    <!-- END Column -->
                    <!-- Column -->
                    <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/4">
                        <!-- Article -->
                        <article class="overflow-hidden rounded-lg shadow-lg  text-gray-200 bg-gray-800 h-full">
                            <img alt="Ditindak"
                                class="block h-auto w-full lg:w-28 mx-auto my-10 transform transition hover:scale-125 duration-300 ease-in-out"
                                src="{{ asset('img/icon/followup.png') }}" />
                            <header class="leading-tight p-2 md:p-4 text-center">
                                <h1 class="text-lg font-bold">3. Tindak Lanjut</h1>
                                <p class="text-grey-darker text-sm py-4">
                                    instansi akan menindaklanjuti dan membalas laporan Anda
                                </p>
                            </header>
                        </article>
                        <!-- END Article -->
                    </div>
                    <!-- END Column -->
                    <!-- Column -->
                    <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/4">
                        <!-- Article -->
                        <article class="overflow-hidden rounded-lg shadow-lg  text-gray-200 bg-gray-800 h-full">
                            <img alt="Selesai"
                                class="block h-auto w-full lg:w-28 mx-auto my-10 transform transition hover:scale-125 duration-300 ease-in-out"
                                src="{{ asset('img/icon/checked.png') }}" />
                            <header class="leading-tight p-2 md:p-4 text-center">
                                <h1 class="text-lg font-bold">4. Selesai</h1>
                                <p class="text-grey-darker text-sm py-4">
                                    Laporan Anda akan terus ditindaklanjuti hingga terselesaikan
                                </p>
                            </header>
                        </article>
                        <!-- END Article -->
                    </div>
                    <!-- END Column -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<footer class="footer footer-center p-4 bg-cyan-600 text-md font-semibold text-white">
    <aside>
      <p>© {{ now()->year }} PEKAT | By ahdann</p>
    </aside>
  </footer>
