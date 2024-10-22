@extends('template.main')
@section('title', 'Beranda')
@section('content')
    <!-- hero -->
        <section class="w-full" id="home">
            <!-- <div class="p-2 hero ">
            <div class="item-hero relative md:top-32 w-2/4">
                <h1 class="font-bold text-4xl lg:text-9xl">Traversa</h1>
                <p class="text-1xl lg:text-3xl">Agen Travel Terpecaya Mudah dan Aman</p>
            </div>
            </div> -->
            <div class="helo">
                <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#DF2935" fill-opacity="1" d="M0,96L1440,320L1440,0L0,0Z"></path></svg> -->
                <div class="grid grid-cols-12">
                    <div class="col-span-6 items-center content-center">
                        <h1 class="font-bold p-3 text-4xl text-center lg:text-9xl">Traversa</h1>
                        <p class="text-1xl p-3 lg:text-3xl text-center">Agen Travel Terpecaya Mudah dan Aman</p>
                    </div>
                    <div class="col-span-6 justify-center items-center">
                        <img src="{{ asset('home2.png') }}" width="700" alt="">
                    </div>
                </div>

            </div>

        </section>

        <!-- content -->
        <section class="mt-3 p-5">
            <h1 class="text-3xl text-center font-bold">Kenapa Harus <span class="text-berem">Traversa ?</span></h1>
            <div class="flex flex-col md:flex-row items-center gap-5 mt-5">
                <div class="card border flex flex-col justify-center items-center p-2 drop-shadow shadow-bayangan">
                    <img src="{{ asset('icon/car.png') }}" width="50" alt="Banyak Pilihan">
                    <h1 class="font-bold">Banyak Pilihan Mobil</h1>
                    <p class="text-justify md:text-start opacity-50 p-5">Dengan memilih traversa anda tidak perlu takut mobil tidak sesuai dengan muatan yang anda bawa karena disini anda bisa memilih sendiri</p>
                </div>
                <div class="card border flex flex-col justify-center items-center p-2 drop-shadow shadow-bayangan">
                    <img src="{{ asset('icon/salary.png') }}" width="50" alt="Banyak Pilihan">
                    <h1 class="font-bold">Harga Terjangkau</h1>
                    <p class="text-justify md:text-start opacity-50 p-5">Jenis mobil yang dipilih juga mempengaruhi harga tergantung kapasitas muatan tapi tenang saja karena harganya sangat ramah dikantong</p>
                </div>
                <div class="card border flex flex-col justify-center items-center p-2 drop-shadow shadow-bayangan">
                    <img src="{{ asset('icon/destination.png') }}" width="50" alt="Banyak Pilihan">
                    <h1 class="font-bold">Dari rumah ke tujuan</h1>
                    <p class="text-justify md:text-start opacity-50 p-5">Tentu saja kami akan menjemput anda dan mengantarkan sampai tujuan anda hanya perlu menuggu dirumah</p>
                </div>
            </div>
        </section>

        <!-- Armada -->
        <section class="mt-3 p-5" id="armada">
            <h1 class="text-3xl text-center font-bold">Armada Terbaik Kami</h1>
            <div class="flex flex-col md:flex-row justify-around items-center gap-5 mt-5 sm:w-full">
                <div class="card border flex flex-col p-2 drop-shadow shadow-bayangan h-3/4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#DF2935" fill-opacity="1" d="M0,256L480,160L960,0L1440,64L1440,0L960,0L480,0L0,0Z"> </path></svg>
                    <img src="{{ asset('armada2/avanza.png') }}" width="400" alt="Mobil">
                    <h1 class="font-bold text-center">Mobil Avanza</h1>
                    <ul class="p-5">
                        <li>Kapasitas : 7 Orang</li>
                        <li>Berat Max : 540kg</li>
                        <li>Kategori : Reguler</li>
                    </ul>
                </div>
                <div class="card border flex flex-col p-2 drop-shadow shadow-bayangan h-3/4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#DF2935" fill-opacity="1" d="M0,256L480,160L960,0L1440,64L1440,0L960,0L480,0L0,0Z"> </path></svg>
                    <img src="{{ asset('armada2/luxio.png') }}" width="400" alt="Mobil">
                    <h1 class="font-bold text-center">Mobil Luxio</h1>
                    <ul class="p-5">
                        <li>Kapasitas : 9 Orang</li>
                        <li>Berat Max : 1000kg</li>
                        <li>Kategori : Reguler</li>
                    </ul>
                </div>
                <div class="card border flex flex-col p-2 drop-shadow shadow-bayangan h-3/4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#DF2935" fill-opacity="1" d="M0,256L480,160L960,0L1440,64L1440,0L960,0L480,0L0,0Z"> </path></svg>
                    <img src="{{ asset('armada2/elf-short.png') }}" width="400" alt="Mobil">
                    <h1 class="font-bold text-center">Elf Short</h1>
                    <ul class="p-5">
                        <li>Kapasitas : 12 Orang</li>
                        <li>Berat Max : 1000kg</li>
                        <li>Kategori : Carter dan Wisata</li>
                    </ul>
                </div>
            </div>
            <div class="flex md:justify-end item mt-5">
                <a href="/list-armada" class="bg-berem w-full text-center text-white p-2 md:w-1/4">Lihat armada lainya</a>
            </div>
        </section>
        <!-- testimoni -->
         <section id="testi" class="p-5">
             <h1 class="text-3xl text-center font-bold mb-8">Testimoni Pelanggan</h1>
             <div class="grid grid-cols-12 justify-center items-center content-center gap-5">
                <div class="col-span-6 md:col-span-3">
                    <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
                        <img class="w-full h-52 rounded-t-xl" src="../public/tertimoni/testi1.jpg" alt="Card Image">
                        <div class="p-4 md:p-5">
                          <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                            Bapak Asep Surasep
                          </h3>
                          <p class="mt-1 text-gray-500 dark:text-neutral-400">
                            Menyewa jasa traversa untuk keberangkatan menuju bandung dengan menggunakan rute Cilacap - Bandung pada tanggal 20 Oktober 2024
                          </p>
                          <p class="mt-5 text-xs text-gray-500 dark:text-neutral-500">
                            Di upload 5 menit yang lalu

                          </p>
                        </div>
                      </div>

                </div>
                <div class="col-span-6 md:col-span-3">
                    <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
                        <img class="w-full h-52 rounded-t-xl" src="../public/tertimoni/testi2.jpg" alt="Card Image">
                        <div class="p-4 md:p-5">
                          <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                            Bapak Asep Surasep
                          </h3>
                          <p class="mt-1 text-gray-500 dark:text-neutral-400">
                            Menyewa jasa traversa untuk keberangkatan menuju bandung dengan menggunakan rute Cilacap - Bandung pada tanggal 20 Oktober 2024
                          </p>
                          <p class="mt-5 text-xs text-gray-500 dark:text-neutral-500">
                            Di upload 5 menit yang lalu

                          </p>
                        </div>
                      </div>

                </div>
                <div class="col-span-6 md:col-span-3">
                    <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
                        <img class="w-full h-52 rounded-t-xl" src="../public/tertimoni/testi3.jpg" alt="Card Image">
                        <div class="p-4 md:p-5">
                          <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                            Bapak Asep Surasep
                          </h3>
                          <p class="mt-1 text-gray-500 dark:text-neutral-400">
                            Menyewa jasa traversa untuk keberangkatan menuju bandung dengan menggunakan rute Cilacap - Bandung pada tanggal 20 Oktober 2024
                          </p>
                          <p class="mt-5 text-xs text-gray-500 dark:text-neutral-500">
                            Di upload 5 menit yang lalu

                          </p>
                        </div>
                      </div>

                </div>
                <div class="col-span-6 md:col-span-3">
                    <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
                        <img class="w-full h-52 rounded-t-xl" src="../public/tertimoni/testi1.jpg" alt="Card Image">
                        <div class="p-4 md:p-5">
                          <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                            Bapak Asep Surasep
                          </h3>
                          <p class="mt-1 text-gray-500 dark:text-neutral-400">
                            Menyewa jasa traversa untuk keberangkatan menuju bandung dengan menggunakan rute Cilacap - Bandung pada tanggal 20 Oktober 2024
                          </p>
                          <p class="mt-5 text-xs text-gray-500 dark:text-neutral-500">
                            Di upload 5 menit yang lalu

                          </p>
                        </div>
                      </div>
                </div>
            </div>
         </section>
         <!-- kontak -->
           <section id="kontak">
            <h1 class="text-3xl text-center font-bold" style="margin-bottom: 5px;">Tentang Kami</h1>
                <div class="relative flex items-top justify-center min-h-screen bg-white dark:bg-gray-900 sm:items-center sm:pt-0">
                    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                        <div class="mt-8 overflow-hidden">
                            <div class="grid grid-cols-1 md:grid-cols-2">
                                <div class="p-6 mr-2 bg-gray-100 dark:bg-gray-800 sm:rounded-lg">
                                    <h1 class="text-4xl sm:text-5xl text-gray-800 dark:text-white font-extrabold tracking-tight">
                                        Traversa
                                    </h1>
                                    <p class="text-normal text-lg sm:text-2xl font-medium text-gray-600 dark:text-gray-400 mt-2">
                                        <!-- Agen Travel terpercaya mudah dan aman yang mengantarkan perjalanan anda dengan nyaman ke tempat tujuan -->
                                         Merupakan agen travel yang sangat dipercaya oleh konsumen yang dimana telah beroperasi sejak 2019 dan sudah berpengalaman dalam mengantarkan costumer dalam perjalanan yang sangat nyaman dan harga terjangkau jadi tunggu apalagi
                                    </p>

                                    <div class="flex items-center mt-8 text-gray-600 dark:text-gray-400">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        <div class="ml-4 text-md tracking-wide font-semibold w-40">
                                            Jalan jandi aspal nomor 100
                                        </div>
                                    </div>

                                    <div class="flex items-center mt-4 text-gray-600 dark:text-gray-400">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                        </svg>
                                        <div class="ml-4 text-md tracking-wide font-semibold w-40">
                                            081234567890
                                        </div>
                                    </div>

                                    <div class="flex items-center mt-2 text-gray-600 dark:text-gray-400">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                        <div class="ml-4 text-md tracking-wide font-semibold w-40">
                                            traversa@gmail.aja
                                        </div>
                                    </div>
                                </div>

                                <form class="p-6 flex flex-col justify-center">
                                    <div class="flex flex-col">
                                        <label for="name" class="hidden">Nama</label>
                                        <input type="name" name="nama" id="name" placeholder="Nama" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none">
                                    </div>

                                    <div class="flex flex-col mt-2">
                                        <label for="email" class="hidden">Email</label>
                                        <input type="email" name="email" id="email" placeholder="Email" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none">
                                    </div>

                                    <div class="flex flex-col mt-2">
                                        <label for="tel" class="hidden">Telepon</label>
                                        <input type="tel" name="tel" id="tel" placeholder="Nomor Telepon" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none">
                                    </div>

                                    <div class="flex flex-col mt-2">
                                        <label for="pesan" class="hidden">Pesan</label>
                                        <textarea name="pesan" id="pesan" placeholder="Pesan" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none"></textarea>
                                    </div>

                                    <button type="submit" class="md:w-32 bg-indigo-600 hover:bg-blue-dark text-white font-bold py-3 px-6 rounded-lg mt-3 hover:bg-indigo-500 transition ease-in-out duration-300">
                                        Kirim
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
@endsection
