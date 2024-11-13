@extends('template.main')
@section('title', 'Beranda')
@section('content')
    <section x-data="{ selectedCategory: 'all' }" class="py-4">
        <div class="heroo mt-0">
            <p class="text-3xl text-center p-2 font-bold text-white">Armada</p>
        </div>
        <div class="grid grid-cols-12 gap-5 justify-center items-center">
            <div class="col-span-12 p-5">
                <h1 class="text-3xl mb-5">Kategori</h1>

                <!-- Tombol Semua -->
                <button @click="selectedCategory = 'all'"
                        :class="selectedCategory === 'all' ? 'bg-berem text-white' : 'bg-hideng text-white'"
                        class="p-2 text-center mr-5">
                    Semua
                </button>

                <!-- Tombol dinamis berdasarkan kategori dari database -->
                @foreach ($kategori as $k)
                    <button @click="selectedCategory = '{{ $k->id }}'"
                            :class="selectedCategory === '{{ $k->id }}' ? 'bg-berem text-white' : 'bg-hideng text-white'"
                            class="p-2 text-center mr-5">
                        {{ $k->nama_kategori }}
                    </button>
                @endforeach
            </div>

            <!-- ALL -->
            @foreach ($armada as $a)
                @php
                    $kategori = \App\Models\Kategori::find($a->id_kategori);
                @endphp
                <div x-show="selectedCategory === 'all' || selectedCategory == '{{ $a->id_kategori }}'" class="col-span-12 md:col-span-4">
                    <div class="card p-2 drop-shadow shadow-bayangan">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#DF2935" fill-opacity="1" d="M0,256L480,160L960,0L1440,64L1440,0L960,0L480,0L0,0Z"></path></svg>
                        <img src="{{ asset('storage/armada/' . $kategori->nama_kategori . '/' . $a->foto) }}" alt="Mobil" class="w-full h-64 object-contain">
                        <h1 class="font-bold text-center mt-3">{{ $a->nama_armada }}</h1>
                        <ul class="p-5">
                            <li class="mb-3">Kategori : <span class="bg-red-500 text-white px-2 py-1 rounded">{{ $kategori->nama_kategori }}</span></li>
                            <li class="mb-3">Kapasitas : {{ $a->kapasitas }} Orang</li>
                            <li>Berat Max : {{ $a->berat }}</li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
