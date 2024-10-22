@extends('admin.template.main')
@section('title', 'Admin | Dashboard')
@section('content')
    <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <!-- Order Statistics -->
                <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                  <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                      <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Pemesanan</h5>
                        {{-- <small class="text-muted">42.82k Total Sales</small> --}}
                      </div>
                      {{-- <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="orederStatistics"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                          <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                          <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                          <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                      </div> --}}
                    </div>
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-column align-items-center gap-1">
                          <h2 class="mb-2">{{ $count_invoice }}</h2>
                          <span>Total Pemesanan</span>
                        </div>
                        <div id="orderStatisticsChart"></div>
                      </div>
                      <ul class="p-0 m-0">
                        @foreach ($invoice as $i)
                        @php
                            $pembayaran = \App\Models\Pembayaran::find($i->id_jenis_pembayaran);
                            $count_pembayaran = \App\Models\Invoice::where('id_jenis_pembayaran', $i->id_jenis_pembayaran)->get()->count();
                        @endphp
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                     <img src="{{ asset('sneat/img/icons/unicons/cc-success.png') }}" alt="User" class="rounded" />
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                    <h6 class="mb-0">{{ $pembayaran->nama_pembayaran }}</h6>
                                    <small class="text-muted"></small>
                                    </div>
                                    <div class="user-progress">
                                    <small class="fw-semibold">{{ $count_pembayaran }}</small>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </div>
                <!--/ Order Statistics -->
                <!-- Pendapatan Armada -->
                <div class="col-md-6 col-lg-4 order-2 mb-4">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="card-title m-0 me-2">Pendapatan Armada</h5>
                      {{-- <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="transactionID"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                          <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                          <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                          <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                        </div>
                      </div> --}}
                    </div>
                    <div class="card-body">
                      <ul class="p-0 m-0">
                        @foreach ($armadas as $a)
                            @if ($a->id_armada)
                                @php
                                    $armada = \App\Models\Armada::find($a->id_armada);
                                @endphp
                                <li class="d-flex mb-4 pb-1">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <img src="{{ asset('sneat/img/icons/unicons/car-solid-24.png') }}" alt="Credit Card" class="rounded" />
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                        <small class="text-muted d-block mb-1">Armada</small>
                                        <h6 class="mb-0">{{ $armada->nama_armada }}</h6>
                                        </div>
                                        <div class="user-progress d-flex align-items-center gap-1">
                                        <h6 class="mb-0">@currency($a->total_tarif)</h6>
                                        <span class="text-muted">++</span>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </div>
                <!--/ Transactions -->
                <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                  <div class="row">
                    <div class="col-12 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                              <div class="card-title">
                                <h5 class="text-nowrap mb-2">Pemasukan</h5>
                                <span class="badge bg-label-warning rounded-pill">{{ $year }}</span>
                              </div>
                              <div class="mt-sm-auto">
                                <small class="text-success text-nowrap fw-semibold"
                                  ><i class="bx bx-chevron-up"></i> {{ $month }}</small
                                >
                                <h3 class="mb-0">@currency($totalTarifBulanIni)</h3>
                              </div>
                            </div>
                            <div id="profileReportChart"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="{{ asset('sneat/img/icons/unicons/money-regular-24.png') }}" alt="Credit Card" class="rounded" />
                            </div>
                            {{-- <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt4"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                              </div>
                            </div> --}}
                          </div>
                          <span class="d-block mb-1">Total Pemasukan</span>
                          <h3 class="card-title text-nowrap mb-2">@currency($income)</h3>
                          {{-- <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i> -14.82%</small> --}}
                        </div>
                      </div>
                    </div>
                    <div class="col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="{{ asset('sneat/img/icons/unicons/car-solid-24.png') }}" alt="Credit Card" class="rounded" />
                            </div>
                            {{-- <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt1"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                              </div>
                            </div> --}}
                          </div>
                          <span class="fw-semibold d-block mb-1">Total Armada</span>
                          <h3 class="card-title mb-2">{{ $count_armada }}</h3>
                          {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small> --}}
                        </div>
                      </div>
                    </div>
                    <!-- </div>
    <div class="row"> -->

                  </div>
                </div>
              </div>
              </div>
            </div>
            <!-- / Content -->

            <script>
                var labels1 = @json($labels1);  // Mengirimkan data dari controller ke JavaScript
                var labelsLength1 = labels1.length;  // Mendapatkan panjang data

                var totals1 = @json($totals1);

                function getRandomColor() {
                    var letters = '0123456789ABCDEF';
                    var color = '#';
                    for (var i = 0; i < 6; i++) {
                        color += letters[Math.floor(Math.random() * 16)];
                    }
                    return color;
                }

                // Ambil data dari Laravel
                const tarifPerBulan = @json($tarifPerBulan); // Data tarif per bulan dari backend
            </script>

@endsection
