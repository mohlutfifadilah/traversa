@extends('admin.template.main')
@section('title', 'Admin | Armada')
@section('content')
   <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data /</span> Armada</h4>

              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="m-0">Armada</h5>
                    <a href="{{ route('armada.create') }}" class="btn btn-success btn-sm"><i class="bx bx-plus-circle"></i> Tambah</a>
                </div>
                <div class="table-responsive text-nowrap mb-3">
                    <table id="dataTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Kategori</th>
                                <th>Nama</th>
                                <th>Kapasitas</th>
                                <th>Berat</th>
                                <th>Pilihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($armada as $a)
                            @php
                                $kategori = \App\Models\Kategori::find($a->id_kategori);
                            @endphp
                            <tr>
                                <td>
                                    @if ($a->foto)
                                        <img src="{{ asset('storage/armada/' . $kategori->nama_kategori . '/' . $a->foto) }}" alt="user-avatar"
                                            class="img-fluid" height="250" width="250" id="profileImage" />
                                    @else
                                        <p class="text-center">-</p>
                                    @endif
                                </td>
                                <td>{{ $kategori->nama_kategori }}</td>
                                <td>{{ $a->nama_armada }}</td>
                                <td>{{ $a->kapasitas }}</td>
                                <td>{{ $a->berat }}</td>
                                <td>
                                    <div class="d-flex flex-wrap justify-content-center">
                                        {{-- Tombol Edit --}}
                                        <a class="btn btn-sm btn-warning text-white mb-2 mb-md-0 me-md-2"
                                            href="{{ route('armada.edit', $a->id) }}">
                                            <i class="bx bx-edit"></i> Ubah
                                        </a>

                                        {{-- Tombol Hapus --}}
                                        <form id="delete-form-{{ $a->id }}" action="{{ route('armada.destroy', $a->id) }}"
                                            method="post" class="mb-2 mb-md-0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="confirmDelete({{ $a->id }}, 'Armada')">
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
