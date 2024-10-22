<nav x-data="{open:false}" class="sticky top-0 z-50">
        <div class="w-full z-50">
            <div class="flex p-2 justify-around items-center bg-hideng text-white">
                <img src="{{ asset('t.png') }}" alt="Logo" width="50" class="oder-1">
                <img src="{{ asset('stack.png') }}" alt="Menu" width="50" @click="open = !open" class="order-2 lg:hidden">
                <div class="hidden lg:block">
                    <ul class="flex gap-6 mr-6 z-50">
                        <li>
                            <a href="{{ Request::segment(1) === '' ? '#home' : '/#home' }}">Beranda</a>
                        </li>
                        <li>
                            <a href="{{ Request::segment(1) === '' ? '#armada' : '/#armada' }}">Armada</a>
                        </li>
                        <li>
                            <a href="{{ Request::segment(1) === '' ? '#testi' : '/#testi' }}">Testimoni</a>
                        </li>
                        <li>
                            <a href="{{ Request::segment(1) === '' ? '#kontak' : '/#kontak' }}">Tentang kami</a>
                        </li>
                    </ul>
                </div>
                <a href="/pesan"><button class="order-3 bg-berem text-white p-2 text-center hidden lg:inline-block">Pesan Sekarang</button></a>
            </div>
        </div>
        <!-- bawah -->
        <div class="fixed bottom-0 right-0 left-0 lg:hidden bg-white z-10" x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90">
            <ul class="flex flex-row gap-2 p-2 justify-around">
                <li class="flex flex-col justify-center items-center gap-1 ">
                    <ion-icon name="home-outline"></ion-icon>
                    <a href="{{ Request::segment(1) === '' ? '#home' : '/#home' }}">Beranda</a>
                </li>
                <li class="flex flex-col justify-center items-center gap-1">
                    <ion-icon name="car-outline"></ion-icon>
                    <a href="{{ Request::segment(1) === '' ? '#armada' : '/#armada' }}">Armada</a>
                </li>
                <li class="flex flex-col justify-center items-center gap-1">
                    <ion-icon name="navigate-outline"></ion-icon>
                    <a href="{{ Request::segment(1) === '' ? '#testi' : '/#testi' }}">Testimoni</a>
                </li>
                <li class="flex flex-col justify-center items-center gap-1">
                    <ion-icon name="people-outline"></ion-icon>
                    <a href="{{ Request::segment(1) === '' ? '#kontak' : '/#kontak' }}">Tentang Kami</a>
                </li>
                <li class="flex flex-col justify-center items-center gap-1 font-bold text-berem">
                   <a href="/pesan"> <button type="button" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent text-white hover:bg-gray-900 focus:outline-none focus:bg-gray-900 disabled:opacity-50 disabled:pointer-events-none dark:bg-white dark:text-neutral-800" style="background-color: red; color: white;">
                    Pesan Sekarang
                  </button></a>
                </li>
            </ul>
        </div>
    </nav>
