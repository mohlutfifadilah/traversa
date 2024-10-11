@extends('template.main')
@section('title', 'Beranda')
@section('content')
    <section x-data="{reguler:true,reguler2:false}" class="">
        <div class="heroo mt-0">
            <p class=" text-3xl text-center p-2 font-bold text-white">Armada</p>
        </div>
       <div class="grid grid-cols-12 gap-5 justify-center items-center">
            <div class="col-span-12 p-5">
                <h1 class="text-3xl mb-5">Kategori</h1>
                <button  @click="reguler = !reguler,reguler2 = !reguler2" class="bg-hideng text-white p-2 text-center">Reguler</button>
                <button @click="reguler2 = !reguler2 ,reguler = !reguler" class="bg-hideng text-white p-2 text-center">Carter & Wisata</button>
                <a href="pesanan.html"><button class="bg-berem  text-white p-2 text-center">Pesan Mobil Sekarang</button></a>
            </div>
            <!-- reguler -->
            <div x-show="reguler" class="col-span-12 md:col-span-4">
                <div class="card p-2 drop-shadow shadow-bayangan">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#DF2935" fill-opacity="1" d="M0,256L480,160L960,0L1440,64L1440,0L960,0L480,0L0,0Z"> </path></svg>
                        <img src="../public/armada2/avanza.png" width="400" alt="Mobil">
                        <h1 class="font-bold text-center">Mobil Avanza</h1>
                    <ul class="p-5">
                        <li>Kapasitas : 7 Orang</li>
                        <li>Berat Max : 540kg</li>
                        <li>Kategori : Reguler</li>
                    </ul>
            </div>
            </div>
            <div x-show="reguler" class="col-span-12 md:col-span-4">
                <div class="card p-2 drop-shadow shadow-bayangan">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#DF2935" fill-opacity="1" d="M0,256L480,160L960,0L1440,64L1440,0L960,0L480,0L0,0Z"> </path></svg>
                    <img src="../public/armada2/xenia.png" width="400" alt="Mobil">
                    <h1 class="font-bold text-center">Mobil Xenia</h1>
                <ul class="p-5">
                    <li>Kapasitas : 7 Orang</li>
                    <li>Berat Max : 1060kg</li>
                    <li>Kategori : Reguler</li>
                </ul>
            </div>
            </div>
            <div x-show="reguler" class="col-span-12 md:col-span-4">
                <div class="card p-2 drop-shadow shadow-bayangan">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#DF2935" fill-opacity="1" d="M0,256L480,160L960,0L1440,64L1440,0L960,0L480,0L0,0Z"> </path></svg>
                    <img src="../public/armada2/luxio.png" width="400" alt="Mobil">
                    <h1 class="font-bold text-center">Mobil Luxio</h1>
                <ul class="p-5">
                    <li>Kapasitas : 8 Orang</li>
                    <li>Berat Max : 1000kg</li>
                    <li>Kategori : Reguler</li>
                </ul>
            </div>
            </div>
            <div x-show="reguler" class="col-span-12 md:col-span-4">
                <div class="card p-2 drop-shadow shadow-bayangan">
                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#DF2935" fill-opacity="1" d="M0,256L480,160L960,0L1440,64L1440,0L960,0L480,0L0,0Z"> </path></svg>
                        <img src="../public/armada2/inova.png" width="400" alt="Mobil">
                        <h1 class="font-bold text-center">Mobil Inova</h1>
                    <ul class="p-5">
                        <li>Kapasitas : 7 Orang</li>
                        <li>Berat Max : 605kg</li>
                        <li>Kategori : Reguler</li>
                    </ul>
            </div>
            </div>
            <!-- Wisata -->
            <div x-show="reguler2" class="col-span-12 md:col-span-4">
                <div class="card p-2 drop-shadow shadow-bayangan">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#DF2935" fill-opacity="1" d="M0,256L480,160L960,0L1440,64L1440,0L960,0L480,0L0,0Z"> </path></svg>
                    <img src="../public/armada2/elf-short.png" width="400" alt="Mobil">
                    <h1 class="font-bold text-center">Elf Short</h1>
                <ul class="p-5">
                    <li>Kapasitas : 15 Orang</li>
                    <li>Berat Max : 1000kg</li>
                    <li>Kategori : Carter dan Wisata</li>
                </ul>
            </div>
            </div>
            <div x-show="reguler2" class="col-span-12 md:col-span-4">
                <div class="card p-2 drop-shadow shadow-bayangan">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#DF2935" fill-opacity="1" d="M0,256L480,160L960,0L1440,64L1440,0L960,0L480,0L0,0Z"> </path></svg>
                    <img src="../public/armada2/elf-long.png" width="400" alt="Mobil">
                    <h1 class="font-bold text-center">Elf Long</h1>
                <ul class="p-5">
                    <li>Kapasitas : 20 Orang</li>
                    <li>Berat Max : 1500kg</li>
                    <li>Kategori : Carter dan Wisata</li>
                </ul>
            </div>
            </div>
            <div x-show="reguler2" class="col-span-12 md:col-span-4">
                <div class="card p-2 drop-shadow shadow-bayangan">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#DF2935" fill-opacity="1" d="M0,256L480,160L960,0L1440,64L1440,0L960,0L480,0L0,0Z"> </path></svg>
                    <img src="../public/armada2/hiace.png" width="400" alt="Mobil">
                    <h1 class="font-bold text-center">Hiace</h1>
                <ul class="p-5">
                    <li>Kapasitas : 9 Orang</li>
                    <li>Berat Max : 800kg</li>
                    <li>Kategori : Carter dan Wisata</li>
                </ul>
            </div>
            </div>
            <div x-show="reguler2" class="col-span-12 md:col-span-4">
                <div class="card p-2 drop-shadow shadow-bayangan">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#DF2935" fill-opacity="1" d="M0,256L480,160L960,0L1440,64L1440,0L960,0L480,0L0,0Z"> </path></svg>
                    <img src="../public/armada2/comuter.png" width="400" alt="Mobil">
                    <h1 class="font-bold text-center">Hiace Commuter</h1>
                <ul class="p-5">
                    <li>Kapasitas : 15 Orang</li>
                    <li>Berat Max : 1200kg</li>
                    <li>Kategori : Carter dan Wisata</li>
                </ul>
            </div>
            </div>
            <div x-show="reguler2" class="col-span-12 md:col-span-4">
                <div class="card p-2 drop-shadow shadow-bayangan">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#DF2935" fill-opacity="1" d="M0,256L480,160L960,0L1440,64L1440,0L960,0L480,0L0,0Z"> </path></svg>
                    <img src="../public/armada2/medium-bus.png" width="400" alt="Mobil">
                    <h1 class="font-bold text-center">Bus Medium</h1>
                <ul class="p-5">
                    <li>Kapasitas : 33 Orang</li>
                    <li>Berat Max : 8000kg</li>
                    <li>Kategori : Carter dan Wisata</li>
                </ul>
            </div>
            </div>
            <div x-show="reguler2" class="col-span-12 md:col-span-4">
                <div class="card p-2 drop-shadow shadow-bayangan">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#DF2935" fill-opacity="1" d="M0,256L480,160L960,0L1440,64L1440,0L960,0L480,0L0,0Z"> </path></svg>
                    <img src="../public/armada2/bus-gede.png" width="400" alt="Mobil">
                    <h1 class="font-bold text-center">Bus Besar</h1>
                <ul class="p-5">
                    <li>Kapasitas : 55 Orang</li>
                    <li>Berat Max : 1600kg</li>
                    <li>Kategori : Carter dan Wisata</li>
                </ul>
            </div>
            </div>
       </div>
    </section>
@endsection
