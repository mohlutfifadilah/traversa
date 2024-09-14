@extends('admin.template.main')
@section('title', 'Admin | Ganti Password')
@section('content')
    <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <h5 class="card-header">Admin | Ganti Password</h5>
                            <hr class="my-0" />
                            <div class="card-body">
                                <div class="row">
                            <form id="formAccountSettings" method="POST" action="{{ route('update-password', $user->id) }}">
                                @csrf
                                @method('PUT')
                          <div class="mb-3 col-md-6">
                            <label for="oldPassword" class="form-label">Password Lama</label>
                            <input
                              class="form-control @if(session('oldPassword')) is-invalid @endif @error('oldPassword') is-invalid @enderror"
                              type="password"
                              id="oldPassword"
                              name="oldPassword"
                              value=""
                              placeholder=""
                            />
                            @error('oldPassword')
                                <small id="oldPassword" class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                            @if (session('oldPassword'))
                                <small id="oldPassword" class="text-danger">
                                    {{ session('oldPassword') }}
                                </small>
                            @endif
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="newPassword" class="form-label">Password Baru</label>
                            <input
                              class="form-control @if(session('newPassword')) is-invalid @endif @error('newPassword') is-invalid @enderror"
                              type="password"
                              id="newPassword"
                              name="newPassword"
                              value=""
                              placeholder=""
                            />
                            @error('newPassword')
                                <small id="newPassword" class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                            @if (session('newPassword'))
                                <small id="newPassword" class="text-danger">
                                    {{ session('newPassword') }}
                                </small>
                            @endif
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input
                              class="form-control @if(session('newPassword')) is-invalid @endif @error('newPassword') is-invalid @enderror"
                              type="password"
                              id="password_confirmation"
                              name="password_confirmation"
                              value=""
                              placeholder=""
                            />
                          </div>
                        </div>
                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2">Simpan</button>
                          <a class="btn btn-outline-secondary" href="{{ route('profil-user-edit', Auth::user()->id) }}">Kembali</a>
                        </div>
                      </form>
                    </div>
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

