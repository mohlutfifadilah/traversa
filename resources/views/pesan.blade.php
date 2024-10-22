@extends('template.main')
@section('title', 'Beranda')
@section('content')
    <section class="">
        <div class="heroo mt-0">
            <p class=" text-3xl text-center p-2 font-bold text-white">Info Pemesanan</p>
        </div>
       <div class="container mx-auto grid grid-cols-12 p-5">
          <div class="col-span-12 ">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#DF2935" fill-opacity="1" d="M0,256L480,160L960,0L1440,64L1440,0L960,0L480,0L0,0Z"> </path></svg>
            <div class="p-5 drop-shadow shadow-bayangan">
                <div class="card ">
                    <h1 class="font-bold text-center mb-4">Silahkan Isi Formulir Dibawah Ini</h1>
                <div class="form">
                    <form action="{{ route('submit_pesan') }}" class="form-group" id="whatsappForm" method="POST">
                        @csrf
                        <div class="py-4">
                            <h3 class="text-danger">
                                Data Diri
                            </h3>
                        </div>
                        <div class="relative mb-3" data-te-input-wrapper-init>
                            <input
                                type="text"
                                class="peer block min-h-[auto] w-full rounded border border-transparent bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-100 ease-linear text-black focus:placeholder:opacity-100 peer-focus:text-black peer-focus:border-black data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none light:text-neutral-200 light:placeholder:text-neutral-200 light:peer-focus:text-black light:peer-focus:border-black [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                id="exampleFormControlInput2"
                                placeholder="Nama Lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required/>
                            <label
                                for="exampleFormControlInput2"
                                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-gray-700 transition-all duration-100 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-black peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none light:text-neutral-200 light:peer-focus:text-black"
                            >Nama Lengkap</label>
                        </div>
                        <div class="relative mb-3" data-te-input-wrapper-init>
                            <input
                                type="text"
                                class="peer block min-h-[auto] w-full rounded border border-transparent bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-100 ease-linear text-black focus:placeholder:opacity-100 peer-focus:text-black peer-focus:border-black data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none light:text-neutral-200 light:placeholder:text-neutral-200 light:peer-focus:text-black light:peer-focus:border-black [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                id="exampleFormControlInput2"
                                placeholder="Email" name="email" required value="{{ old('email') }}"/>
                            <label
                                for="exampleFormControlInput2"
                                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-gray-700 transition-all duration-100 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-black peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none light:text-neutral-200 light:peer-focus:text-black"
                            >Email</label>
                        </div>
                        <div class="relative mb-3" data-te-input-wrapper-init>
                            <input
                                type="text"
                                class="peer block min-h-[auto] w-full rounded border border-transparent bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-100 ease-linear text-black focus:placeholder:opacity-100 peer-focus:text-black peer-focus:border-black data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none light:text-neutral-200 light:placeholder:text-neutral-200 light:peer-focus:text-black light:peer-focus:border-black [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                id="exampleFormControlInput2"
                                placeholder="No Whatsapp" name="no_whatsapp" required value="{{ old('no_whatsapp') }}"/>
                            <label
                                for="exampleFormControlInput2"
                                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-gray-700 transition-all duration-100 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-black peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none light:text-neutral-200 light:peer-focus:text-black"
                            >No Whatsapp</label>
                        </div>
                        @error('no_whatsapp')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                        <div class="py-4">
                            <h3 class="text-danger">
                                Data Pemesanan
                            </h3>
                        </div>
                        <div
                            id="datepicker-translated"
                            class="relative mb-3"
                            data-te-input-wrapper-init>
                            <input
                                type="text" name="tanggal"
                                class="peer block min-h-[auto] w-full rounded border border-white bg-white px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-100 ease-linear text-black focus:placeholder:opacity-100 peer-focus:text-black peer-focus:border-black data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none light:text-neutral-200 light:placeholder:text-neutral-200 light:peer-focus:text-black light:peer-focus:border-black [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                placeholder="Tanggal Keberangkatan" id="datepicker-input" data-te-datepicker-toggle-ref data-te-datepicker-toggle-button-ref required value="{{ old('tanggal') }}"/>
                            <label
                                for="datepicker-input"
                                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-gray-700 transition-all duration-100 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-black peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none light:text-neutral-200 light:peer-focus:text-black"
                            >Tanggal Keberangkatan</label>
                        </div>
                        <div class="relative mb-3"
                                data-te-format24="true"
                                id="timepicker-format"
                                data-te-input-wrapper-init>
                            <input
                                type="text" name="jam"
                                class="peer block min-h-[auto] w-full rounded border border-transparent bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-100 ease-linear text-black focus:placeholder:opacity-100 peer-focus:text-black peer-focus:border-black data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none light:text-neutral-200 light:placeholder:text-neutral-200 light:peer-focus:text-black light:peer-focus:border-black [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                data-te-toggle="timepicker"
                                    id="form14" required value="{{ old('jam') }}"/>
                            <label
                                for="form14"
                                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-gray-700 transition-all duration-100 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-black peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none light:text-neutral-200 light:peer-focus:text-black"
                            >Jam Keberangkatan</label>
                        </div>
                        <div class="relative mb-3" data-te-input-wrapper-init>
                            <input
                                type="text"
                                class="peer block min-h-[auto] w-full rounded border border-transparent bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-100 ease-linear text-black focus:placeholder:opacity-100 peer-focus:text-black peer-focus:border-black data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none light:text-neutral-200 light:placeholder:text-neutral-200 light:peer-focus:text-black light:peer-focus:border-black [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                id="exampleFormControlInput2"
                                placeholder="Alamat Penjemputan" name="alamat_penjemputan" required value="{{ old('alamat_penjemputan') }}"/>
                            <label
                                for="exampleFormControlInput2"
                                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-gray-700 transition-all duration-100 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-black peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none light:text-neutral-200 light:peer-focus:text-black"
                            >Alamat Penjemputan</label>
                        </div>
                        <div class="relative mb-3" data-te-input-wrapper-init>
                            <input
                                type="text"
                                class="peer block min-h-[auto] w-full rounded border border-transparent bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-100 ease-linear text-black focus:placeholder:opacity-100 peer-focus:text-black peer-focus:border-black data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none light:text-neutral-200 light:placeholder:text-neutral-200 light:peer-focus:text-black light:peer-focus:border-black [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                id="exampleFormControlInput2"
                                placeholder="Alamat Tujuan" name="alamat_tujuan" required value="{{ old('alamat_tujuan') }}"/>
                            <label
                                for="exampleFormControlInput2"
                                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-gray-700 transition-all duration-100 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-black peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none light:text-neutral-200 light:peer-focus:text-black"
                            >Alamat Tujuan</label>
                        </div>
                        <!--Large input-->
                        <div class="relative mb-3" data-te-input-wrapper-init>
                            <input
                                type="number"
                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] text-default-700 outline-none transition-all duration-100 ease-linear focus:placeholder:opacity-100 peer-focus:text-default data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none light:text-neutral-200 light:placeholder:text-neutral-200 light:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                id="exampleFormControlInput2"
                                placeholder="Jumlah Penumpang" name="jumlah_penumpang" required value="{{ old('jumlah_penumpang') }}"/>
                            <label
                                for="exampleFormControlInput2"
                                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-dark-700 transition-all duration-100 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none light:text-neutral-200 light:peer-focus:text-primary"
                                >Jumlah Penumpang
                            </label>
                        </div>
                        <!--Large input-->
                        <div class="relative mb-3" data-te-input-wrapper-init>
                            <input
                                type="text"
                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] text-default-700 outline-none transition-all duration-100 ease-linear focus:placeholder:opacity-100 peer-focus:text-default data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none light:text-neutral-200 light:placeholder:text-neutral-200 light:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                id="exampleFormControlInput2"
                                placeholder="Barang" name="barang" value="{{ old('barang') }}"/>
                            <label
                                for="exampleFormControlInput2"
                                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-dark-700 transition-all duration-100 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none light:text-neutral-200 light:peer-focus:text-primary"
                                >Barang
                            </label>
                        </div>
                        <div class="py-4">
                            <h3 class="text-danger">
                                Pembayaran
                            </h3>
                        </div>
                        <div class="mt-3">
                            <label class="block font-medium text-sm text-gray-700 mb-1" for="jenis_pembayaran"> Jenis Pembayaran </label>
                            <select name="jenis_pembayaran" class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none light:bg-neutral-900 light:border-neutral-700 light:text-neutral-400 light:placeholder-neutral-500 light:focus:ring-neutral-600" id="jenis_pembayaran">
                                    <option value="" readonly disabled>Pilih Jenis Pembayaran</option>
                                @foreach ($jenis_pembayaran as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama_pembayaran }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-4">
                            <button class="w-full text-white p-2" style="background-color: rgb(229, 62, 62);" type="submit">Pesan Sekarang</button>
                        </div>
                    </form>
                </div>
          </div>
       </div>
    </section>
@endsection
