@extends('admin.template.main')
@section('title', 'Admin | Riwayat')
@section('content')
    <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <h5 class="card-header">Detail Riwayat</h5>
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
                                            <dt class="col-sm-5">Kode Transaksi</dt>
                                            <dd class="col-sm-7">
                                                <p>{{ $invoice->kode_transaksi }}</p>
                                            </dd>

                                            <dt class="col-sm-5">Armada</dt>
                                            <dd class="col-sm-7">
                                                <p>{{ $armada->nama_armada }}</p>
                                            </dd>

                                            <dt class="col-sm-5">Alamat Penjemputan</dt>
                                            <dd class="col-sm-7">
                                                <p>{{ $invoice->alamat_penjemputan }}</p>
                                            </dd>

                                            <dt class="col-sm-5">Alamat Tujuan</dt>
                                            <dd class="col-sm-7">
                                                <p>{{ $invoice->alamat_tujuan }}</p>
                                            </dd>

                                            <dt class="col-sm-5">Waktu</dt>
                                            <dd class="col-sm-7">
                                                <p>{{ $invoice->tanggal_jam }}</p>
                                            </dd>

                                            <dt class="col-sm-5">Jumlah Penumpang</dt>
                                            <dd class="col-sm-7">
                                                <p>{{ $invoice->jumlah_penumpang }}</p>
                                            </dd>

                                            <dt class="col-sm-5">Barang</dt>
                                            <dd class="col-sm-7">
                                                <p>{{ $invoice->barang }}</p>
                                            </dd>

                                            <dt class="col-sm-5">Tarif</dt>
                                            <dd class="col-sm-7">
                                                @if (is_null($invoice->tarif) || !is_int($invoice->tarif))
                                                <p class="text-danger">-,</p>
                                                @else
                                                <p>@currency($invoice->tarif)</p>
                                                @endif
                                            </dd>

                                            <dt class="col-sm-5">Jenis Pembayaran</dt>
                                            <dd class="col-sm-7">
                                                <p>{{ $pembayaran->nama_pembayaran }}</p>
                                            </dd>

                                            <dt class="col-sm-5">Bayar</dt>
                                            <dd class="col-sm-7">
                                                @if($invoice->is_paid != 1)
                                                    <p><span class="badge rounded-pill bg-warning"><i class="bx bx-no-entry"></i> Belum</span></p>
                                                @else
                                                    <p><span class="badge rounded-pill bg-success"><i class="bx bx-check-circle"></i> Lunas </span></p>
                                                @endif
                                            </dd>

                                            <dt class="col-sm-5">Status</dt>
                                            <dd class="col-sm-7">
                                                @if($invoice->id_status != 2)
                                                    <p><span class="badge rounded-pill bg-warning"><i class="bx bx-no-entry"></i> {{ $status->nama_status }}</span></p>
                                                @else
                                                    <p><span class="badge rounded-pill bg-success"><i class="bx bx-check-circle"></i> {{ $status->nama_status }}</span></p>
                                                @endif
                                            </dd>

                                        </dl>
                                    </div>
                                </div>
                                <hr>
                                <div class="d-flex flex-wrap justify-content-end">

                                    <a class="btn btn-sm btn-danger text-white mb-2 mb-md-0 me-md-2 ms-3"
                                        href="{{ route('cetak_invoice', $invoice->id) }}">
                                        <i class="bx bxs-file-pdf"></i> Cetak Invoice
                                    </a>

                                    @if ($invoice->is_paid != 1 || $invoice->id_status != 2)
                                        {{-- Tombol Hapus --}}
                                        <form id="paid-{{ $invoice->id }}" action="{{ route('riwayat_paid', $invoice->id) }}" method="post" class="ms-3 mb-2 mb-md-0 mr-5">
                                            @csrf
                                            <button type="button" class="btn btn-sm btn-success mr-5" onclick="confirmPaid({{ $invoice->id }})">
                                                <i class="bx bx-check-circle"></i> Konfirmasi Pembayaran
                                            </button>
                                        </form>
                                    @endif

                                    <a class="btn btn-sm btn-secondary text-white mb-2 mb-md-0 me-md-2 ms-3"
                                        href="{{ route('riwayat.index') }}">
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

