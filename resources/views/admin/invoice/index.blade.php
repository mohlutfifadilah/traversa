@extends('admin.template.main')
@section('title', 'Admin | Invoice')
@section('content')
   <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data /</span> Invoice</h4>

              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="m-0">Invoice</h5>
                    {{-- <a href="{{ route('invoice.create') }}" class="btn btn-success btn-sm"><i class="bx bx-plus-circle"></i> Tambah</a> --}}
                </div>
                <div class="table-responsive text-nowrap mb-3">
                    <table id="dataTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>Penjemputan</th>
                                <th>Tujuan</th>
                                <th>Waktu</th>
                                <th>Status</th>
                                <th>Pilihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoice as $i)
                            @php
                                $status = \App\Models\Status::find($i->id);
                            @endphp
                            <tr>
                                <td>{{ $i->nama_lengkap }}</td>
                                <td>{{ $i->email }}</td>
                                <td>{{ $i->alamat_penjemputan }}</td>
                                <td>{{ $i->alamat_tujuan }}</td>
                                <td>{{ $i->tanggal_jam }}</td>
                                <td><span class="badge rounded-pill bg-warning"><i class="bx bx-no-entry"></i> {{ $status->nama_status }}</span></td>
                                <td>
                                    <div class="d-flex flex-wrap justify-content-center">
                                        {{-- Tombol Info --}}
                                        <a class="btn btn-sm btn-info text-white mb-2 mb-md-0 me-md-2"
                                            href="{{ route('invoice.show', $i->id) }}">
                                            <i class="bx bx-info-circle"></i> Detail
                                        </a>

                                        {{-- Tombol Edit --}}
                                        {{-- <a class="btn btn-sm btn-warning text-white mb-2 mb-md-0 me-md-2"
                                            href="{{ route('invoice.edit', $i->id) }}">
                                            <i class="bx bx-edit"></i> Ubah
                                        </a> --}}

                                        {{-- Tombol Hapus --}}
                                        <form id="delete-form-{{ $i->id }}" action="{{ route('invoice.destroy', $i->id) }}"
                                            method="post" class="mb-2 mb-md-0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="confirmDelete({{ $i->id }}, 'Invoice')">
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
