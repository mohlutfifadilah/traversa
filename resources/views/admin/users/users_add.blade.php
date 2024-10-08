@extends('admin.template.main')
@section('title', 'Admin | Pengguna')
@section('content')
    <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <h5 class="card-header">Tambah Pengguna</h5>
                            <!-- Account -->
                            <div class="card-body">
                                <form method="POST" action="{{ route('users.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                                <label for="email" class="form-label">E-mail</label>
                                                <input class="form-control @if(session('email')) is-invalid @endif @error('email') is-invalid @enderror" type="text" id="email" name="email" value="" placeholder="" />
                                                @error('email')
                                                    <small id="email" class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                                @if (session('email'))
                                                    <small id="email" class="text-danger">
                                                        {{ session('email') }}
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

