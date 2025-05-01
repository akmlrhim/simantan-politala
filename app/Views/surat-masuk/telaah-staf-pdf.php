<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<title>Telaah Staf <?= $telaah_staf->asal_surat; ?></title>
	<link rel="shortcut icon" href="<?= base_url(); ?>img/logo_politala.png" type="image/x-icon">
	<style>
		@page {
			size: A4;
			margin: 2cm 2.5cm 3cm 2.5cm;
		}

		body {
			font-family: 'Times New Roman', Times, serif;
			font-size: 12pt;
			line-height: 1.2;
			margin: 0;
			padding: 0;
		}

		.ckeditor table {
			width: 100%;
			border-collapse: collapse;
			margin: 20px 0;
			font-family: 'Times New Roman', Times, serif, sans-serif;
			font-size: 16px;
			color: #000;
			border: 1px solid #000;
		}

		.ckeditor table th {
			background-color: #4CAF50 !important;
			font-weight: bold;
			color: #fff;
			padding: 3px;
			text-align: center;
			border: 1px solid #000;
		}

		.ckeditor table td {
			text-align: center;
			padding: 3px;
			border: 1px solid #000;
		}

		.ckeditor {
			line-height: 0;
		}

		.ckeditor table,
		.ckeditor table * {
			line-height: normal !important;
		}

		h1 {
			text-align: center;
			font-size: 12pt;
			text-transform: uppercase;
			margin-bottom: 10px;
		}

		.content {
			text-align: justify;
		}

		.content p {
			margin: 5px 0;
		}

		.signature {
			margin-top: 50px;
			text-align: right;
		}

		.signature p {
			margin: 0;
		}

		.ttd {
			margin-top: 70px;
		}
	</style>

</head>

<body>

	<table width="100%">
		<tr>
			<td width="15%" align="center">
				<img src="data:image/png;base64,<?= base64_encode(file_get_contents(FCPATH . 'img/logo_politala.png')) ?>" alt="Logo" style="width: 100%;">
			</td>
			<td align="center">
				<span style="font-size: 14pt; font-weight: bold;">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI</span><br>
				<span style="font-size: 14pt; font-weight: bold;">POLITEKNIK NEGERI TANAH LAUT</span><br>
				<span style="font-size: 10pt;">
					Jalan A. Yani KM.6.0, Desa Panggung, Kab. Tanah Laut, Prov. Kalimantan Selatan 70815<br>
					Telp. (0512) 2021065 Surel <a href="mailto:mail@politala.ac.id">mail@politala.ac.id</a>
				</span>
			</td>
		</tr>
	</table>

	<hr style="border: 1px solid black; border-top: 4px double black; margin-top: 5px; margin-bottom: 20px;">

	<h1 style="margin-bottom: 20px;">TELAAHAN STAF</h1>

	<table style="font-family: 'Times New Roman', Times, serif; font-size: 12pt; line-height: 1.2;">
		<tr>
			<td style="width: 70px; padding: 2px;">Kepada</td>
			<td style="width: 10px; padding: 2px;">:</td>
			<td style="padding: 2px;">Direktur Politeknik Negeri Tanah Laut</td>
		</tr>
		<tr>
			<td style="padding: 2px;">Dari</td>
			<td style="padding: 2px;">:</td>
			<td style="padding: 2px;">Jurusan Komputer dan Bisnis</td>
		</tr>
		<tr>
			<td style="padding: 2px;">Perihal</td>
			<td style="padding: 2px;">:</td>
			<td style="padding: 2px;"><?= $telaah_staf->perihal; ?></td>
		</tr>
	</table>

	<br>

	<table style="width:100%">
		<tr>
			<td>
				<strong>Perihal : </strong><br>
				<p style="text-align: justify; margin: 0; line-height: normal;">
					Berdasarkan surat yang diterima dari <?= $telaah_staf->asal_surat; ?> dengan nomor <?= $telaah_staf->nomor_surat; ?> tanggal <?= date('d F Y', strtotime($telaah_staf->tanggal_surat)); ?>, perihal <?= $telaah_staf->perihal; ?>, kami sampaikan hal-hal sebagai berikut:
				</p>
			</td>
		</tr>
		<br>
		<tr>
			<td>
				<strong style="margin: 0; line-height: 1.2;">Isi surat :</strong><br>
				<span class="ckeditor"><?= $telaah_staf->isi_surat; ?></span>
			</td>
		</tr>

		<tr>
			<td>
				<strong style="margin: 0; line-height: 1.2;">Fakta dan Data :</strong><br>
				<span class="ckeditor"><?= $telaah_staf->fakta_dan_data; ?></span>
			</td>
		</tr>

		<tr>
			<td>
				<strong style="margin: 0; line-height: 1.2;">Saran Tindak :</strong><br>
				<span class="ckeditor"><?= $telaah_staf->saran_dan_tindak; ?></span>
			</td>
		</tr>
	</table>



	<div class="signature">
		<p>Pelaihari, <?= $created_at; ?></p>
		<p class="bold"><?= $telaah_staf->jabatan; ?></p>
		<div class="ttd">
			<p class="bold"><?= $telaah_staf->nama_lengkap; ?></p>
			<p class="bold">NIP. <?= $telaah_staf->nip; ?></p>
		</div>
	</div>

	<div class="page-break"></div>

</body>

</html>