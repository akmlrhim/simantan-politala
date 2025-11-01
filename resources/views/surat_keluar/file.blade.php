<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Surat Keluar {{ $data->hal }}</title>
  <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">

  <link rel="stylesheet" href="{{ public_path('css-file/surat-keluar.css') }}">
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
        <span class="ckeditor">{!! $isiSurat !!}</span>
      </td>
    </tr>
  </table>

  <div class="signature" style="margin-top: 50px; width: 100%;">
    <table
      style="width: 100%; border: none; border-collapse: collapse; font-family: 'Times New Roman', Times, serif; font-size: 12pt;">
      <tr>
        <td style="width: 60%;"></td>
        <td style="width: 40%; text-align: right;">
          <p class="bold" style="margin: 0; text-align: right; white-space: normal;">
            Ketua Jurusan Komputer dan Bisnis
          </p>

          <div class="ttd" style="margin-top: 10px; margin-bottom: 10px;text-align: center">
            <img src="{{ public_path('ttd/ttd_kajur_kombis.png') }}" alt="Tanda Tangan"
              style="width: 70px; height: auto; object-fit: contain;" />
          </div>

          <p class="bold" style="margin: 0;">Khairul Anwar Hafizd, M.Kom.</p>
          <p class="bold" style="margin: 0;">NIP. 198906012019031015</p>
        </td>
      </tr>
    </table>
  </div>

  <div class="page-break"></div>

</body>

</html>
