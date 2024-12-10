<html>

<head>
	<title>Surat Keputusan</title>
	<style>
		table {
			width: 100%;
			border-collapse: collapse;
		}

		table,
		th,
		td {
			border: 1px solid black;
		}

		th,
		td {
			padding: 10px;
			text-align: left;
		}

		body {
			font-family: 'Times New Roman', Times, serif, sans-serif;
			line-height: 1.2;
			margin: 0;
			padding: 0;
		}

		p {
			line-height: 1.2;
			margin: 0;
		}
	</style>
</head>

<body>
	<div class="container">
		<h1>Surat Keputusan</h1>
		<p><strong>Nomor:</strong> <?= $telaah_staf->nomor_surat; ?></p>
		<p><strong>Tentang:</strong> <?= $telaah_staf->perihal; ?></p>
		<br>
		<p><strong>Isi:</strong></p>
		<div>
			<?= $telaah_staf->isi_surat; ?>
		</div>
		<br>
		<p>Keputusan ini berlaku mulai tanggal 1 Januari 2023.</p>
		<div class="signature">
			<p>Hormat kami,</p>
			<p><strong>Direktur</strong></p>
		</div>
	</div>
</body>

</html>