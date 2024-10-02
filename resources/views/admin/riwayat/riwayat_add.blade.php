@extends('admin.template.main')
@section('title', 'Admin | Armada')
@section('content')
    <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <h5 class="card-header">Tambah Armada</h5>
                            <!-- Account -->
                            <div class="card-body">
                                <form method="POST" action="{{ route('armada.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                                <label for="foto" class="form-label">Foto</label>
                                                <input class="form-control @if(session('foto')) is-invalid @endif @error('foto') is-invalid @enderror" type="file" id="foto" name="foto" value="" placeholder="" />
                                                @error('foto')
                                                    <small id="foto" class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                                @if (session('foto'))
                                                    <small id="foto" class="text-danger">
                                                        {{ session('foto') }}
                                                    </small>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                                <label for="kategori" class="form-label">Kategori</label>
                                                <select class="form-control @if(session('kategori')) is-invalid @endif @error('kategori') is-invalid @enderror" id="kategori" name="kategori">
                                                    <option selected disabled value="">Pilih Kategori</option>
                                                    @foreach ($kategori as $k)
                                                        <option value="{{ $k->id }}" {{ old('kategori') == $k->id ? 'selected' : '' }}>{{ $k->nama_kategori }}</option>
                                                    @endforeach
                                                </select>
                                                @error('kategori')
                                                    <small id="kategori" class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                                @if (session('kategori'))
                                                    <small id="kategori" class="text-danger">
                                                        {{ session('kategori') }}
                                                    </small>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                                <label for="nama_armada" class="form-label">Nama Armada</label>
                                                <input class="form-control @if(session('nama_armada')) is-invalid @endif @error('nama_armada') is-invalid @enderror" type="text" id="nama_armada" name="nama_armada" value="" placeholder="" />
                                                @error('nama_armada')
                                                    <small id="nama_armada" class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                                @if (session('nama_armada'))
                                                    <small id="nama_armada" class="text-danger">
                                                        {{ session('nama_armada') }}
                                                    </small>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                                <label for="kapasitas" class="form-label">Kapasitas</label>
                                                <input class="form-control @if(session('kapasitas')) is-invalid @endif @error('kapasitas') is-invalid @enderror" type="text" id="kapasitas" name="kapasitas" value="" placeholder="Ex : 6" />
                                                @error('kapasitas')
                                                    <small id="kapasitas" class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                                @if (session('kapasitas'))
                                                    <small id="kapasitas" class="text-danger">
                                                        {{ session('kapasitas') }}
                                                    </small>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                                <label for="berat" class="form-label">Berat</label>
                                                <input class="form-control @if(session('berat')) is-invalid @endif @error('berat') is-invalid @enderror" type="text" id="berat" name="berat" value="" placeholder="Ex : 120kg" />
                                                <div id="berat" class="form-text text-danger">
                                                    * Dalam satuan kg
                                                </div>
                                                @error('berat')
                                                    <small id="berat" class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                                @if (session('berat'))
                                                    <small id="berat" class="text-danger">
                                                        {{ session('berat') }}
                                                    </small>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <button type="submit" class="btn btn-success me-2">Tambah</button>
                                    </div>
                                </form>
                            </div>
                    <!-- /Account -->
                  </div>
                  {{-- <div class="card">
                    <h5 class="card-header">Delete Account</h5>
                    <div class="card-body">
                      <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                          <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                          <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                        </div>
                      </div>
                      <form id="formAccountDeactivation" onsubmit="return false">
                        <div class="form-check mb-3">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            name="accountActivation"
                            id="accountActivation"
                          />
                          <label class="form-check-label" for="accountActivation"
                            >I confirm my account deactivation</label
                          >
                        </div>
                        <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
                      </form>
                    </div>
                  </div> --}}
                </div>
              </div>
            </div>
            <!-- / Content -->
@endsection

