@extends('admin.template.main')
@section('title', 'Admin | Kategori')
@section('content')
    <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <h5 class="card-header">Ubah Kategori</h5>
                            <!-- Account -->
                            <div class="card-body">
                                <form method="POST" action="{{ route('kategori.update', $kategori->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                                                <input class="form-control @if(session('nama_kategori')) is-invalid @endif @error('nama_kategori') is-invalid @enderror" type="text" id="nama_kategori" name="nama_kategori" value="{{ $kategori->nama_kategori }}" placeholder="" />
                                                @error('nama_kategori')
                                                    <small id="nama_kategori" class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                                @if (session('nama_kategori'))
                                                    <small id="nama_kategori" class="text-danger">
                                                        {{ session('nama_kategori') }}
                                                    </small>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <button type="submit" class="btn btn-warning me-2">Ubah</button>
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

