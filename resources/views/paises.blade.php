<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Paises</title>
</head>
<body>
    <h1 align="center">Paises de la religion</h1>
    <table class="p-3 mb-2 bg-white text-dark" align="center">
       <thead>
           <tr>
               <th class="p-3 mb-2 bg-white text-primary"> Pais </th>
               <th class="p-3 mb-2 bg-white text-success"> Capital </th>
               <th class="p-3 mb-2 bg-white text-danger"> Moneda </th>
               <th class="p-3 mb-2 bg-white text-warning" > Poblacion </th>
               <th class="p-3 mb-2 bg-info text-white"> Ciudades </th>
           </tr>
       </thead>
       <tbody>
           @foreach($paises as $pais => $infopais)
               <tr>
                   <td class="text-primary" rowspan="{{ count($infopais['ciudades']) }}">
                       {{ $pais }}
                   </td>
                   <td class="text-success" rowspan="{{ count($infopais['ciudades']) }}">
                       {{ $infopais["capital"] }}
                   </td>
                   <td class="text-danger" rowspan="{{ count($infopais['ciudades']) }}">
                       {{ $infopais["moneda"] }}
                   </td>
                   <td class="text-warning" rowspan="{{ count($infopais['ciudades']) }}">
                       {{ $infopais["poblacion"] }}
                   </td>
                   @foreach($infopais["ciudades"] as $ciudad)
                   <td class="p-3 mb-2 bg-info text-white">
                       {{ $ciudad }}
                   </td>
               </tr>
                   @endforeach
           @endforeach
       </tbody>
       <tfoot></tfoot>
    </table>
</body>
</html>