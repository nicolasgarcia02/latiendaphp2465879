<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>PAISES SUDAMERICA</title>
</head>
<body>
  <h1>PAISES SUDAMERICA</h1>
  <table class="table table-dark">
    <thead>
      <tr>
        <th class="bg-info">PAISES</th>
        <th class="bg-danger">CAPITAL</th>
        <th class="bg-warning">MONEDA</th>
        <th class="bg-success">POBLACIÓN</th>
        <th class="bg-primary">CIUDADES</th>
      </tr>
    </thead>
    <tbody>
      @foreach($paises as $pais => $infopais)
      <tr>
        <td rowspan="{{ count($infopais['Ciudades']) }}"> {{ $pais }} </td>
        <td rowspan="{{ count($infopais['Ciudades']) }}"> {{ $infopais["Capital"] }} </td>
        <td rowspan="{{ count($infopais['Ciudades']) }}"> {{ $infopais["Moneda"] }} </td>
        <td rowspan="{{ count($infopais['Ciudades']) }}"> {{ $infopais["Población"] }} </td>
        @foreach($infopais["Ciudades"] as $ciudad)
        <td> {{ $ciudad }} </td>
      </tr>
      @endforeach
      @endforeach
    </tbody>
    <tfoot></tfoot>
  </table>
</body>
</html>