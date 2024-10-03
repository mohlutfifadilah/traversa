<!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="#" class="app-brand-link">
              <span class="app-brand-logo demo">
                <img src="{{ asset('t.png') }}" alt="" width="40" height="40">
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2">traversa</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item {{ Request::segment(1) === 'dashboard' ? 'active' : '' }}">
              <a href="/dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Data</span>
            </li>
            <li class="menu-item {{ Request::segment(1) === 'users' ? 'active' : '' }}">
              <a href="{{ route('users.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div data-i18n="Analytics">Pengguna</div>
              </a>
            </li>
            <li class="menu-item {{ Request::segment(1) === 'kategori' ? 'active' : '' }}">
              <a href="{{ route('kategori.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-category"></i>
                <div data-i18n="Analytics">Kategori</div>
              </a>
            </li>
            <li class="menu-item {{ Request::segment(1) === 'armada' ? 'active' : '' }}">
              <a href="{{ route('armada.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-car"></i>
                <div data-i18n="Analytics">Armada</div>
              </a>
            </li>
            <!-- Pemesanan -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Pemesanan</span></li>
            <!-- Cards -->
            <li class="menu-item {{ Request::segment(1) === 'invoice' ? 'active' : '' }}">
              <a href="{{ route('invoice.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-food-menu"></i>
                <div data-i18n="Basic">Invoice</div>
                @php
                    $count = \App\Models\Invoice::where('id_status', 1)->where('is_paid', 0)->where('tarif', '<=', 0)->count();
                @endphp
                @if ($count != 0)
                    <div class="badge rounded-pill bg-label-danger text-uppercase fs-tiny ms-auto">{{ $count }}</div>
                @endif
              </a>
            </li>
            <li class="menu-item {{ Request::segment(1) === 'riwayat' ? 'active' : '' }}">
              <a href="{{ route('riwayat.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-history"></i>
                <div data-i18n="Basic">Riwayat</div>
              </a>
            </li>
          </ul>
        </aside>
        <!-- / Menu -->
