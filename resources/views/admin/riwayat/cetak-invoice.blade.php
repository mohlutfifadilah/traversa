<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>INVOICE - {{ $invoice->kode_transaksi }}</title>

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				position: relative;
			}

			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
				position: relative;
				background-color: white;
				z-index: 1;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}

			/* Style untuk tanda tangan satu di sebelah kanan */
			.signature-section {
				margin-top: 50px;
				display: flex;
				justify-content: flex-end;
			}

			.signature-box {
				width: 45%;
				text-align: center;
				padding-top: 10px;
			}

			.signature-box img {
				width: 150px;
				height: auto;
			}

			.signature-box .name {
				margin-top: 10px;
				font-weight: bold;
                border-top: 1px solid #000;
			}
		</style>
	</head>

	<body>
        @php
            $armada = \App\Models\Armada::find($invoice->id_armada);
            $status = \App\Models\Status::find($invoice->id_status);
            $pembayaran = \App\Models\Pembayaran::find($invoice->id_jenis_pembayaran);
        @endphp

		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img
										src="{{ public_path('t.jpg') }}"
										style="width: 100%; max-width: 300px"
									/>
								</td>

								<td>
									# Kode Transaksi: {{ $invoice->kode_transaksi }}<br />
									Dicetak: {{ now() }}
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									{{ $invoice->nama_lengkap }}<br />
									{{ $invoice->email }}<br />
									{{ $invoice->no_whatsapp }}
								</td>

								<td>
									{{ $armada->nama_armada }} / {{ $invoice->jumlah_penumpang }} orang<br />
									{{ $invoice->barang }}<br />
                                    @if ($invoice->is_paid != 1)
                                        Status : Belum Lunas
                                    @else
                                        Status : Lunas
                                    @endif
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Jenis Pembayaran</td>

					<td>{{ $pembayaran->nama_pembayaran }}</td>
				</tr>

				<tr class="heading">
					<td>Rincian</td>

					<td>Harga</td>
				</tr>

				<tr class="item last">
					<td>{{ $invoice->tanggal_jam }}<br />{{ $invoice->alamat_penjemputan }} -> {{ $invoice->alamat_tujuan }}</td>

					<td>@currency($invoice->tarif)</td>
				</tr>

				<tr class="total">
					<td></td>

					<td>@currency($invoice->tarif)</td>
				</tr>
			</table>

            <!-- Bagian Tanda Tangan Satu di Sebelah Kanan -->
			<div class="signature-section">
				<div class="signature-box">
					<img src="{{ public_path('t.png') }}" alt="Tanda Tangan Penerima" />
					<p class="name">Penerima</p>
				</div>
			</div>
		</div>
	</body>
</html>
