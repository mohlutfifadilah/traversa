@extends('admin.template.main')
@section('title', 'Admin | Invoice')
@section('content')
    <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <h5 class="card-header">Detail Invoice</h5>
                            <!-- Account -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <dl class="row mt-2">
                                            <dt class="col-sm-3">Nama Lengkap</dt>
                                            <dd class="col-sm-9">
                                                <p>{{ $invoice->nama_lengkap }}</p>
                                            </dd>

                                            <dt class="col-sm-3">Email</dt>
                                            <dd class="col-sm-9">
                                                <p>{{ $invoice->email }}</p>
                                            </dd>

                                            <dt class="col-sm-3">No Whatsapp</dt>
                                            <dd class="col-sm-9">
                                                <p>{{ $invoice->no_whatsapp }}</p>
                                            </dd>
                                        </dl>
                                    </div>
                                    <div class="col-md-6">
                                        <dl class="row mt-2">
                                            <dt class="col-sm-3">Armada</dt>
                                            <dd class="col-sm-9">
                                                <p>{{ $armada->nama_armada }}</p>
                                            </dd>

                                            <dt class="col-sm-3">Alamat Penjemputan</dt>
                                            <dd class="col-sm-9">
                                                <p>{{ $invoice->alamat_penjemputan }}</p>
                                            </dd>

                                            <dt class="col-sm-3">Alamat Tujuan</dt>
                                            <dd class="col-sm-9">
                                                <p>{{ $invoice->alamat_tujuan }}</p>
                                            </dd>

                                            <dt class="col-sm-3">Waktu</dt>
                                            <dd class="col-sm-9">
                                                <p>{{ $invoice->tanggal_jam }}</p>
                                            </dd>

                                            <dt class="col-sm-3">Jumlah Penumpang</dt>
                                            <dd class="col-sm-9">
                                                <p>{{ $invoice->jumlah_penumpang }}</p>
                                            </dd>

                                            <dt class="col-sm-3">Barang</dt>
                                            <dd class="col-sm-9">
                                                <p>{{ $invoice->barang }}</p>
                                            </dd>

                                            <dt class="col-sm-3">Tarif</dt>
                                            <dd class="col-sm-9">
                                                @if (!$invoice->tarif)
                                                    <p class="text-danger">-,</p>
                                                @endif
                                            </dd>

                                            <dt class="col-sm-3">Status</dt>
                                            <dd class="col-sm-9">
                                                <p><span class="badge rounded-pill bg-warning"><i class="bx bx-no-entry"></i> {{ $status->nama_status }}</span></p>
                                            </dd>

                                        </dl>
                                    </div>
                                </div>
                                <hr>
                                <div class="d-flex flex-wrap justify-content-end">
                                    <button class="btn btn-sm btn-success text-white mb-2 mb-md-0 me-md-2" data-bs-toggle="modal" data-bs-target="#modalCenter">
                                        <i class="bx bx-message-alt-check"></i> Submit
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalCenterTitle">Konfirmasi</h5>
                                                <button
                                                type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal"
                                                aria-label="Close"
                                                ></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="nameWithTitle" class="form-label">Name</label>
                                                        <input
                                                        type="text"
                                                        id="nameWithTitle"
                                                        class="form-control"
                                                        placeholder="Enter Name"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                Batal
                                                </button>
                                                <button type="button" class="btn btn-success"><i class="bx bx-message-alt-check"></i> Submit</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="btn btn-sm btn-secondary text-white mb-2 mb-md-0 me-md-2"
                                        href="{{ route('invoice.index') }}">
                                        <i class="bx bx-arrow-back"></i> Kembali
                                    </a>
                                </div>
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

