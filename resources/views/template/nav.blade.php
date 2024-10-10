<nav x-data="{open:false}">
        <div class=" w-full">
            <div class="flex p-2 justify-between items-center bg-hideng text-white">
                <img src="{{ asset('20240621_160737.png') }}" alt="Logo" width="50">
                <img src="{{ asset('stack.png') }}" alt="Menu" width="50" @click="open = !open" class="lg:hidden">
                <div class="hidden lg:block">
                    <ul class="flex gap-6 mr-6">
                        <li>
                            <a href="/">Beranda</a>
                        </li>
                        <li>
                            <a href="rute.html">Rute</a>
                        </li>
                        <li>
                            <a href="armada.html">Armada</a>
                        </li>
                    </ul>
                </div>
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
                <li class="flex flex-col justify-center items-center gap-1 font-bold">
                    <ion-icon name="home-outline"></ion-icon>
                    <a href="/">Beranda</a>
                </li>
                <li class="flex flex-col justify-center items-center gap-1 opacity-50">
                    <ion-icon name="navigate-outline"></ion-icon>
                    <a href="rute.html">Rute</a>
                </li>
                <li class="flex flex-col justify-center items-center gap-1 opacity-50">
                    <ion-icon name="car-outline"></ion-icon>
                    <a href="armada.html">Armada</a>
                </li>
                <li class="flex flex-col justify-center items-center gap-1 opacity-50">
                    <ion-icon name="people-outline"></ion-icon>
                    <a href="kontak.html">Pelayanan</a>
                </li>
            </ul>
        </div>
    </nav>
