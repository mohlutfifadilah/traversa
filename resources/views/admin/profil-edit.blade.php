@extends('admin.template.main')
@section('title', 'Admin | Profil')
@section('content')
    <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <h5 class="card-header">Admin | Profil</h5>
                            <!-- Account -->
                            <div class="card-body">
                        <form id="formAccountSettings" method="POST" action="{{ route('profil-user-update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        @if (Auth::user()->foto)
                            <img
                            src="{{ asset('storage/profil/' . Auth::user()->foto) }}"
                            alt="user-avatar"
                            class="d-block rounded"
                            height="100"
                            width="100"
                            id="profileImage"
                            />
                        @else
                            <img
                            src="{{ asset('sneat/img/avatars/1.png') }}"
                            alt="user-avatar"
                            class="d-block rounded"
                            height="100"
                            width="100"
                            id="profileImage"
                            />
                        @endif
                        <div class="button-wrapper">
                          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block"><i class="bx bx-upload"></i></span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input
                              type="file"
                              id="upload"
                              class="account-file-input"
                              hidden
                              accept="image/png, image/jpeg"
                              name="foto"
                            />
                          </label>
                          {{-- <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                          </button> --}}

                          <p class="text-muted mb-0">JPG atau PNG. Max : 2mb</p>
                            @error('foto')
                                <small id="foto" class="text-danger mt-4">
                                    {{ $message }}
                                </small>
                            @enderror
                            @if (session('foto'))
                                <small id="role" class="text-danger mt-4">
                                    {{ session('foto') }}
                                </small>
                            @endif
                        </div>
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input
                              class="form-control @if(session('email')) is-invalid @endif @error('email') is-invalid @enderror"
                              type="text"
                              id="email"
                              name="email"
                              value="{{ $user->email }}"
                              placeholder=""
                            />
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
                          <button type="submit" class="btn btn-primary me-2">Simpan</button>
                          <a class="btn btn-outline-danger" href="{{ route('change-password', Auth::user()->id) }}">Ganti Password</a>
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
            <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var inputFile = document.getElementById('upload');
                        var profileImage = document.getElementById('profileImage');

                        inputFile.addEventListener('change', function(event) {
                            var reader = new FileReader();
                            reader.onload = function() {
                                profileImage.src = reader.result;
                                profileImage.style.display = 'block'; // Tampilkan gambar
                            };
                            reader.readAsDataURL(event.target.files[0]);
                        });
                    });
                </script>
@endsection

