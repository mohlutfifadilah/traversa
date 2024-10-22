document.getElementById("whatsappForm").addEventListener("submit", function (event) {
    event.preventDefault();

    let nama    = document.getElementById("nama").value;
    let telepon = document.getElementById("telepon").value;
    let rute 	= document.getElementById("rute").value;
    let jumlah = document.getElementById("jumlah").value;
    let mobil = document.getElementById("mobil").value;
    let contact = document.getElementById("cp").value;
    let tgl = document.getElementById("tgl").value;
    let jemput = document.getElementById("alamat1").value;
    let tujuan = document.getElementById("alamat2").value;
    let jam = document.getElementById("jam").value;
    let barang = document.getElementById("barang").value;
    // let encodedMessage = encodeURIComponent(
    //     "Halo Traversa saya dengan	 \n" +
    //     "Nama 	                : " + nama + "\n" +
    //     "Ingin memesan mobil    : " + mobil + "\n" +
    //     "Dengan jumlah orang    : " + jumlah +"\n" +
    //     "Tanggal keberangkatan  : " + tgl +"\n" +
    //     "Rute   : "+rute
    // );

    let encodedMessage = encodeURIComponent(
        `
INPO PNP TRAVERSA TRAVEL TOUR
        • Nama Lengkap : ${nama}
        • Alamat Penjemputan : ${jemput}
        • Alamat Tujuan : ${tujuan}
        • Tanggal Keberangkatan : ${tgl}
        • Jam Keberangkatan : 
            ${jam} WIB
        • Jumlah Penumpang : ${jumlah}
        • Nomor Telepon : ${telepon}
        • Barang yang dibawa : 
            ${barang}

STANDAR LAYANAN KAMI DOOR TO DOOR 
Untuk pemesanan kembali bisa langsung menghubungi nomor 085600009887 
TERIMAKASIH TELAH MENGGUNAKAN JASA KAMI
        `
    );


    let link;

      // Check if user is on a mobile device
      if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        link = `whatsapp://send?phone=${contact}&text=${encodedMessage}`;
    } else { // Desktop device
        link = `https://api.whatsapp.com/send?phone=${contact}&text=${encodedMessage}`;
    }


    window.open(link, '_blank');
});