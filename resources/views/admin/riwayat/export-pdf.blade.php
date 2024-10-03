<!DOCTYPE html>
<html>
<head>
	<title>Data Invoice</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        img {
            object-fit: cover;
        }
	</style>
	<center>
		<h1>Data Invoice</h4>
	</center>

	<table class='table table-bordered' width="100%" style="border-collapse: collapse;">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Transaksi</th>
            <th>Armada</th>
            <th>Tanggal dan Jam</th>
            <th>Nama Lengkap</th>
            <th>Email</th>
            <th>No Whatsapp</th>
            <th>Alamat Penjemputan</th>
            <th>Alamat Tujuan</th>
            <th>Jumlah Penumpang</th>
            <th>Barang</th>
            <th>Taris</th>
            <th>Jeni Pembayaran</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @php
            $increment=1
        @endphp
        @foreach($invoice as $i)
        <tr>
            <td>{{ $increment++ }}</td>
            <td>{{$i->kode_transaksi}}</td>
            <td>{{$i->nama_armada}}</td>
            <td>{{$i->tanggal_jam}}</td>
            <td>{{$i->nama_lengkap}}</td>
            <td>{{$i->email}}</td>
            <td>{{$i->no_whatsapp}}</td>
            <td>{{$i->alamat_penjemputan}}</td>
            <td>{{$i->alamat_tujuan}}</td>
            <td>{{$i->jumlah_penumpang}}</td>
            <td>{{$i->barang}}</td>
            <td>{{$i->tarif}}</td>
            <td>{{$i->nama_pembayaran}}</td>
            <td>{{$i->nama_status}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
