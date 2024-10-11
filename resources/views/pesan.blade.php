@extends('template.main')
@section('title', 'Beranda')
@section('content')
    <section>
      <div class="heroo mt-0">
        <p class=" text-3xl text-center p-2 font-bold text-white">Rute Perjalanan</p>
    </div>
       <div class="grid grid-cols-12  justify-center items-center">
        <div class="col-span-12 md:col-span-6">
          <div class="p-4 overflow-y-auto">
            <div class="space-y-4 p-5">
              <div class="">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Rute</h3>
                <ul class="text-gray-800 dark:text-neutral-200">
                  <li class="list-disc">Cilacap - Jabodetabek</li>
                  <li class="list-disc">Cilacap - Merak - Lampung</li>
                  <li class="list-disc">Cilacap - Palembang</li>
                  <li class="list-disc">Cilacap - Bandung</li>
                  <li class="list-disc">Cilacap - Tegal - Perkalongan</li>
                  <li class="list-disc">Cilacap - Purworejo - Semarang</li>
                  <li class="list-disc">Cilacap - Jogja - Solo</li>
                  <li class="list-disc">Cilacap - Madura</li>
                  <li class="list-disc">Cilacap - Surabaya - Malang</li>
                  <li class="list-disc">Cilacap - Banyuwangi - Denpasar</li>
                  <li class="list-disc">Carter Drop Off / Pulang Pergi Semua Wilayah Jawa - Bali - Sumatra</li>
                </ul>
              </div>

              <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Parawisata</h3>
                <ul class="text-gray-800 dark:text-neutral-200">
                  <li class="list-disc">Big Bus</li>
                  <li class="list-disc">Medium Bus</li>
                  <li class="list-disc">Elf Long / Micro Bus / Hiace</li>
                  <li class="list-disc">Family Tour 7 Seater</li>
                </ul>
              </div>

              <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
                  Ekspedisi & Towing (Jawa , Sumatra , Bali , Lombok , Kalimantan)
                </h3>
                <ul class="text-gray-800 dark:text-neutral-200">
                  <li class="list-disc">Pickup / Engkel</li>
                  <li class="list-disc">Colt Deaser Roda 6</li>
              <li class="list-disc">Fuso 6 Roda & 10 Roda</li>
              </div>
            </div>
          </div>
        </div>
        <div class="hidden md:block col-span-6">
            <img src="{{ asset('rute.png') }}" alt="Rute">
        </div>
       </div>
    </section>
@endsection
