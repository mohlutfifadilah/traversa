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
                                                @if (is_null($invoice->tarif) | !is_int($invoice->tarif))
                                                    <p class="text-danger">-,</p>
                                                @else
                                                    <p>@currency($invoice->tarif)</p>
                                                @endif
                                            </dd>

                                            <dt class="col-sm-5">Status</dt>
                                            <dd class="col-sm-7">
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
                                                <form action="{{ route('submit_tarif', $invoice->id) }}" method="POST" id="formTarif">
                                                    @csrf
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
                                                                <label for="tarif" class="form-label">Tarif</label>
                                                                <input
                                                                type="text"
                                                                id="tarif"
                                                                class="form-control"
                                                                name="tarif"
                                                                placeholder="Masukkan tarif"
                                                                />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                        Batal
                                                        </button>
                                                        <button type="submit" class="btn btn-success"><i class="bx bx-message-alt-check"></i> Submit</button>
                                                    </div>
                                                </form>
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
            <script>
                var rupiah1 = document.getElementById("tarif");
                rupiah1.addEventListener("keyup", function(e) {
                    rupiah1.value = convertRupiah(this.value, "Rp. ");
                });
                rupiah1.addEventListener('keydown', function(event) {
                    return isNumberKey(event);
                });

                document.getElementById('formTarif').addEventListener('submit', function() {
                    // Hilangkan "Rp." dan titik saat form disubmit
                    rupiah1.value = rupiah1.value.replace(/[^,\d]/g, "");
                });

                function convertRupiah(angka, prefix) {
                    var number_string = angka.replace(/[^,\d]/g, "").toString(),
                    split  = number_string.split(","),
                    sisa   = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                    if (ribuan) {
                        separator = sisa ? "." : "";
                        rupiah += separator + ribuan.join(".");
                    }

                    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
                    return prefix == undefined ? rupiah : rupiah ? prefix + rupiah : "";
                }

                function isNumberKey(evt) {
                    key = evt.which || evt.keyCode;
                    if ( 	key != 188 // Comma
                        && key != 8 // Backspace
                        && key != 17 && key != 86 & key != 67 // Ctrl c, ctrl v
                        && (key < 48 || key > 57) // Non digit
                        )
                    {
                        evt.preventDefault();
                        return;
                    }
                }
            </script>
@endsection

