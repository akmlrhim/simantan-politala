@if ($details->count() > 0)
  <table style="width: 100%; border-collapse: collapse; margin-top: 12px;border:none;">
    @foreach ($details as $d)
      <tr>
        <td style="width: 120px; vertical-align: top;">{{ ucfirst(str_replace('_', ' ', $d->key)) }}</td>
        <td style="width: 10px;">:</td>
        <td>{{ $d->value }}</td>
      </tr>
    @endforeach
  </table>
@endif
