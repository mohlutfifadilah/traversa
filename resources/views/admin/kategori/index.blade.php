@extends('admin.template.main')
@section('title', 'Admin | Kategori')
@section('content')
   <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data /</span> Kategori</h4>

              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="m-0">Kategori</h5>
                    <a href="{{ route('kategori.create') }}" class="btn btn-success btn-sm"><i class="bx bx-plus-circle"></i> Tambah</a>
                </div>
                <div class="table-responsive text-nowrap mb-3">
                    <table id="dataTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama Kategori</th>
                                <th>Pilihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategori as $k)
                            <tr>
                                <td>{{ $k->nama_kategori }}</td>
                                <td>
                                    <div class="d-flex flex-wrap justify-content-center">
                                        {{-- Tombol Edit --}}
                                        <a class="btn btn-sm btn-warning text-white mb-2 mb-md-0 me-md-2"
                                            href="{{ route('kategori.edit', $k->id) }}">
                                            <i class="bx bx-edit"></i> Ubah
                                        </a>

                                        {{-- Tombol Hapus --}}
                                        <form id="delete-form-{{ $k->id }}" action="{{ route('kategori.destroy', $k->id) }}"
                                            method="post" class="mb-2 mb-md-0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="confirmDelete({{ $k->id }}, 'Kategori')">
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
