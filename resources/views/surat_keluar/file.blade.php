<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Surat Keluar {{ $data->hal }}</title>
  <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
  <style>
    @page {
      size: A4;
      margin: 2cm 2.5cm 3cm 2.5cm;
    }

    body {
      font-family: 'Times New Roman', Times, serif;
      font-size: 12pt;
      line-height: 1;
      margin: 0;
      padding: 0;
    }

    .ckeditor {
      line-height: 1.3;
      white-space: pre-wrap;
      word-break: break-word;
      margin: 0;
      padding: 0;
      text-align: justify
    }

    .ckeditor p {
      margin: 2px 0;
      padding: 0;
    }

    .ckeditor ol,
    .ckeditor ul {
      margin: 4px 0 4px 1.5rem;
      padding-left: 1.2rem;
    }

    .ckeditor ol {
      list-style-type: decimal;
    }

    .ckeditor ul {
      list-style-type: disc;
    }

    .ckeditor li {
      margin: 0;
      padding: 0;
    }

    .ckeditor table {
      width: 100% !important;
      max-width: 100% !important;
      border-collapse: collapse;
      font-size: 11pt;
      table-layout: fixed;
      word-wrap: break-word;
      box-sizing: border-box;
    }

    .ckeditor table th,
    .ckeditor table td {
      box-sizing: border-box;
      padding: 2px 4px;
      border: 1px solid #000;
      word-break: break-word;
      overflow-wrap: break-word;
      text-align: center;
    }

    table,
    p {
      page-break-inside: avoid;
    }

    .ckeditor table,
    .ckeditor table * {
      line-height: normal !important;
    }

    /* Padatkan semua elemen anak */
    .ckeditor>* {
      margin-top: 2px;
      margin-bottom: 2px;
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

    .tgl_surat {
      margin-top: 10px;
      text-align: right;
    }
  </style>
</head>

<body>

  <table style="width:100%">
    <tr>
      <td width="15%" align="center">
        <img src="{{ public_path('img/logo_politala.webp') }}" alt="Logo" style="width: 100%;">
      </td>
      <td align="center">
        <span style="font-size: 14pt; font-weight: bold;">KEMENTERIAN PENDIDIKAN TINGGI,
          SAINS, DAN TEKNOLOGI</span><br>
        <span style="font-size: 14pt; font-weight: bold;">POLITEKNIK NEGERI TANAH
          LAUT</span><br>
        <span style="font-size: 10pt;">
          Jalan A. Yani KM.6.0, Desa Panggung, Kab. Tanah Laut, Prov. Kalimantan Selatan
          70815<br>
          Telp. (0512) 2021065 Surel <a href="mailto:mail@politala.ac.id">mail@politala.ac.id</a>
        </span>
      </td>
    </tr>
  </table>

  <hr style="border: 1px solid black; border-top: 4px double black; margin-top: 5px;">

  <div class="tgl_surat">
    <p>Pelaihari,
      {{ \Carbon\Carbon::parse($data->tanggal_surat)->locale('id')->translatedFormat('d F Y') }}
    </p>
  </div>

  <table style="font-family: 'Times New Roman', Times, serif; font-size: 12pt; line-height: 1.2;">
    <tr>
      <td style="width: 70px; padding: 2px;">Nomor</td>
      <td style="width: 10px; padding: 2px;">:</td>
      <td style="padding: 2px;">{{ $data->nomor_surat }}</td>
    </tr>
    <tr>
      <td style="padding: 2px;">Hal</td>
      <td style="padding: 2px;">:</td>
      <td style="padding: 2px;">{{ $data->hal }}</td>
    </tr>
  </table>

  <br>

  <table style="width:100%">
    <tr>
      <td>
        <span class="ckeditor">{!! $data->isi_surat !!}</span>
      </td>
    </tr>
  </table>

  <div class="signature">
    <p class="bold">{{ $data->user->jabatan }}</p>
    <div class="ttd">
      <p class="bold">{{ $data->user->nama }}</p>
      <p class="bold">NIP. {{ $data->user->nip }}</p>
    </div>
  </div>

  <div class="page-break"></div>

</body>

</html>
