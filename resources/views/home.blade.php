@extends('template.main')
@section('title', 'Beranda')
@section('content')
    <!-- hero -->
        <section class="w-full">
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
        <section class="mt-3 p-5">
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
                <a href="armada.html" class="bg-berem w-full text-center text-white p-2 md:w-1/4">Lihat armada lainya</a>
            </div>
        </section>
@endsection
