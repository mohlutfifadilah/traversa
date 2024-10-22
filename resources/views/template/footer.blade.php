<!-- footer -->
    <footer class="bg-hideng text-white ">
        <div class="flex md:flex-row justify-around items-center">
            <div class="p-3 ">
                <img src="{{ asset('t.png') }}" class="float-left p-2" alt="Logo" width="100">
                <h1>Traversa</h1>
                <p>Agen travel terpercaya mudah aman dan cepat yang bisa di andalkan dalam perjalanan anda</p>
            </div>
            <div class="p-3">
                <h1>Kontak Kami</h1>
                <ul>
                    <li><ion-icon name="call-outline"></ion-icon>081234567890</li>
                    <li><ion-icon name="logo-facebook"></ion-icon>Traversa Page</li>
                    <li><ion-icon name="location-outline"></ion-icon>Jalan candi aspal no 17 </li>
                </ul>
            </div>
            <div class="p-3">
                <h1>Pelayanan</h1>
                <ul class="">
                    <li>Tentang Kami</li>
                    <li>Testimoni</li>
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
