<!-- footer -->
    <footer class="bg-hideng text-white pb-3">
        <div class="flex md:flex-row justify-around items-center">
            <div class="">
                <img src="{{ asset('1.png') }}" class="float-left mr-3" alt="Logo" width="80">
                <h1 class="mb-2">Himalayan</h1>
                <p>Agen travel terpercaya mudah aman dan cepat yang bisa di andalkan dalam perjalanan anda</p>
            </div>
            <div class="p-3">
                <h1 class="p-5">Kontak</h1>
                <ul>
                    <li class="ml-3 mb-3"><ion-icon name="call-outline" class="mr-2"></ion-icon>085600009887</li>
                    <li class="ml-3 mb-3"><ion-icon name="logo-facebook" class="mr-2"></ion-icon>Himalayan Travel</li>
                    <li class="ml-3"><ion-icon name="location-outline" class="mr-2"></ion-icon>Cilacap, Jawa Tengah</li>
                </ul>
            </div>
            <div class="p-3">
                <h1 class="p-5">Pelayanan</h1>
                <ul class="">
                    <li class="ml-3 mb-3"><a href="{{ Request::segment(1) === '' ? '#home' : '/#home' }}">Beranda</a></li>
                    <li class="ml-3 mb-3"><a href="{{ Request::segment(1) === '' ? '#armada' : '/#armada' }}">Armada</a></li>
                    <li class="ml-3"><a href="/pesan">Pemesanan</a></li>
                </ul>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    <script>
        const datepickerTranslated = new te.Datepicker(
            document.querySelector("#datepicker-translated"),
            {
                title: "Tanggal Keberangkatan",
                monthsFull: [
                "Januari",
                "Februari",
                "Maret",
                "April",
                "Mei",
                "Juni",
                "Juli",
                "Agustus",
                "September",
                "Oktober",
                "November",
                "Desember",
                ],
                monthsShort: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "Mei",
                "Jun",
                "Jul",
                "Agu",
                "Sep",
                "Okt",
                "Nov",
                "Des",
                ],
                weekdaysFull: [
                "Minggu",
                "Senin",
                "Selasa",
                "Rabu",
                "Kamis",
                "Jum'at",
                "Sabtu",
                ],
                weekdaysShort: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
                weekdaysNarrow: ["M", "S", "S", "R", "K", "J", "S"],
                okBtnText: "Ok",
                clearBtnText: "Clear",
                cancelBtnText: "Cancel",
                format: 'dd-mm-yyyy',
                disablePast: true
            }
            );
        const picker = document.querySelector("#timepicker-format");
        const tpFormat24 = new te.Timepicker(picker, {
            format24: true,
        });
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/preline@2.5.0/dist/preline.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
