@php
  use Carbon\Carbon;
@endphp

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Telahan Staf</title>
  <style>
    @page {
      size: A4;
      margin: 0cm;
    }

    html,
    body {
      font-family: 'Times New Roman', Times, serif;
      font-size: 12pt;
      line-height: 1.2;
      color: #000;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .container {
      width: 100%;
      padding: 0 0.1cm;
      box-sizing: border-box;
    }

    .ckeditor {
      white-space: pre-wrap;
      word-break: break-word;
      text-align: justify;
    }

    .ckeditor p {
      margin: 3px 0;
    }

    .ckeditor ol,
    .ckeditor ul {
      margin: 4px 0 4px 1.3rem;
      padding-left: 1.1rem;
    }

    .ckeditor table {
      width: 100%;
      border-collapse: collapse;
      font-size: 11pt;
      table-layout: fixed;
    }

    .ckeditor th,
    .ckeditor td {
      padding: 3px 4px;
      border: 1px solid #000;
      text-align: center;
      word-wrap: break-word;
    }

    hr {
      border: 1px solid black;
      border-top: 4px double black;
      margin-top: 6px;
      margin-bottom: 15px;
    }

    h1 {
      text-align: center;
      font-size: 13pt;
      text-transform: uppercase;
      margin-bottom: 12px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    td {
      vertical-align: top;
      padding: 2px;
    }

    .signature {
      margin-top: 60px;
      text-align: right;
      page-break-inside: avoid;
    }

    .signature p {
      margin: 0;
    }

    .ttd {
      margin-top: 60px;
    }

    .kop img {
      width: 85px;
    }

    .kop td {
      vertical-align: middle;
    }

    @media screen {
      body {
        background-color: #ffffff;
      }

      .container {
        width: 16cm;
        margin: 1.5cm auto;
        padding: 0;
        background-color: #ffffff;
        border: 1px solid #ffffff;
        box-shadow: #ffffff;
      }
    }
  </style>
</head>

<body>
  <div class="container">

    <table class="kop" width="100%">
      <tr>
        <td width="15%" align="center" style="padding-right: 10px;">
          <img src="{{ public_path('img/logo_politala.webp') }}" alt="Logo">
        </td>
        <td align="center">
          <span style="font-size: 14pt; font-weight: bold;">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN
            TEKNOLOGI</span><br>
          <span style="font-size: 14pt; font-weight: bold;">POLITEKNIK NEGERI TANAH LAUT</span><br>
          <span style="font-size: 10pt;">
            Jalan A. Yani KM.6.0, Desa Panggung, Kab. Tanah Laut, Prov. Kalimantan Selatan 70815<br>
            Telp. (0512) 2021065 • Surel: <a href="mailto:mail@politala.ac.id">mail@politala.ac.id</a>
          </span>
        </td>
      </tr>
    </table>

    <hr>

    <h1>TELAHAN STAF</h1>

    <table style="font-size: 12pt; line-height: 1.2; margin-bottom: 12px;">
      <tr>
        <td style="width: 70px;">Kepada</td>
        <td style="width: 10px;">:</td>
        <td>Direktur Politeknik Negeri Tanah Laut</td>
      </tr>
      <tr>
        <td>Dari</td>
        <td>:</td>
        <td>{{ $data->suratDari->nama ?? '-' }}</td>
      </tr>
      <tr>
        <td>Perihal</td>
        <td>:</td>
        <td>{{ $data->perihalSurat->nama ?? '-' }}</td>
      </tr>
    </table>

    <table style="width:100%;">
      <tr>
        <td>
          <strong>Perihal :</strong><br>
          <p style="text-align: justify; margin: 0;">
            Berdasarkan surat yang diterima dari {{ $data->suratMasuk->asal_surat ?? '-' }},
            dengan nomor {{ $data->suratMasuk->nomor_surat ?? '-' }} tanggal
            {{ isset($data->suratMasuk->tanggal_surat)
                ? Carbon::parse($data->suratMasuk->tanggal_surat)->locale('id')->translatedFormat('d F Y')
                : '-' }},
            perihal {{ $data->suratMasuk->perihal ?? '-' }},
            kami sampaikan hal-hal sebagai berikut:
          </p>
        </td>
      </tr>

      <br>

      <tr>
        <td>
          <strong>Isi Surat :</strong><br>
          <div class="ckeditor">{!! $data->isi ?? '-' !!}</div>
        </td>
      </tr>

      <br>

      <tr>
        <td>
          <strong>Fakta dan Data :</strong><br>
          <div class="ckeditor">{!! $data->fakta_data ?? '-' !!}</div>
        </td>
      </tr>

      <br>

      <tr>
        <td>
          <strong>Saran Tindak :</strong><br>
          <div class="ckeditor">{!! $data->saran_tindak ?? '-' !!}</div>
        </td>
      </tr>
    </table>

    <div class="signature" style="margin-top: 50px; width: 100%;">
      <table
        style="width: 100%; border: none; border-collapse: collapse; font-family: 'Times New Roman', Times, serif; font-size: 12pt;">
        <tr>
          <td style="width: 60%;"></td>
          <td style="width: 40%; text-align: right;">
            <p style="margin: 0; text-align: right; white-space: normal;">
              Tanah Laut, {{ $data->created_at->translatedFormat('d F Y') }}
            </p>
            <p style="margin: 0; text-align: right; white-space: normal;">
              Ketua Jurusan Komputer dan Bisnis
            </p>

            <div class="ttd" style="margin-top: 10px; margin-bottom: 10px;text-align: center">
              <img src="{{ public_path('ttd/ttd_kajur_kombis.png') }}" alt="Tanda Tangan"
                style="width: 70px; height: auto; object-fit: contain;" />
            </div>

            <p style="margin: 0;">Khairul Anwar Hafizd, M.Kom.</p>
            <p style="margin: 0;">NIP. 198906012019031015</p>
          </td>
        </tr>
      </table>
    </div>

  </div>
</body>

</html>
