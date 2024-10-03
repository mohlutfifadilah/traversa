@extends('admin.template.main')
@section('title', 'Admin | Riwayat')
@section('content')
   <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data /</span> Riwayat</h4>

              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="m-0">Riwayat</h5>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('riwayat-export-excel') }}" class="btn btn-sm btn-success me-2 mb-2 mt-2">
                            <i class="bx bxs-file-export"></i> Export Excel
                        </a>
                        <a href="{{ route('riwayat-export-pdf') }}" class="btn btn-sm btn-danger me-2 mb-2 mt-2">
                            <i class="bx bxs-file-pdf"></i> Export PDF
                        </a>
                    </div>
                </div>
                <div class="table-responsive text-nowrap mb-3">
                    <table id="dataTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama Lengkap</th>
                                <th>Penjemputan</th>
                                <th>Tujuan</th>
                                <th>Waktu</th>
                                <th>Bayar</th>
                                <th>Status</th>
                                <th>Pilihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoice as $i)
                            @php
                                $status = \App\Models\Status::find($i->id_status);
                            @endphp
                            <tr>
                                <td>{{ $i->kode_transaksi }}</td>
                                <td>{{ $i->nama_lengkap }}</td>
                                <td>{{ $i->alamat_penjemputan }}</td>
                                <td>{{ $i->alamat_tujuan }}</td>
                                <td>{{ $i->tanggal_jam }}</td>
                                @if($i->is_paid != 1)
                                    <td><span class="badge rounded-pill bg-warning"><i class="bx bx-no-entry"></i>Belum</span></td>
                                @else
                                    <td><span class="badge rounded-pill bg-success"><i class="bx bx-check-circle"></i>Lunas</span></td>
                                @endif
                                @if($i->id_status != 2)
                                    <td><span class="badge rounded-pill bg-warning"><i class="bx bx-no-entry"></i>{{ $status->nama_status }}</span></td>
                                @else
                                    <td><span class="badge rounded-pill bg-success"><i class="bx bx-check-circle"></i>{{ $status->nama_status }}</span></td>
                                @endif
                                <td>
                                    <div class="d-flex flex-wrap justify-content-center">
                                        {{-- Tombol Info --}}
                                        <a class="btn btn-sm btn-info text-white mb-2 mb-md-0 me-md-2"
                                            href="{{ route('riwayat.show', $i->id) }}">
                                            <i class="bx bx-info-circle"></i> Detail
                                        </a>

                                        {{-- Tombol Edit --}}
                                        {{-- <a class="btn btn-sm btn-warning text-white mb-2 mb-md-0 me-md-2"
                                            href="{{ route('riwayat.edit', $i->id) }}">
                                            <i class="bx bx-edit"></i> Ubah
                                        </a> --}}

                                        {{-- Tombol Hapus --}}
                                        <form id="delete-form-{{ $i->id }}" action="{{ route('riwayat.destroy', $i->id) }}"
                                            method="post" class="mb-2 mb-md-0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="confirmDelete({{ $i->id }}, 'Riwayat')">
                                                <i class="bx bx-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
            <!-- / Content -->
@endsection
