<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Catálogo de productos</title>
</head>
<body>
<table class="table table-hover">
<thead>
  <tr>
    <th colspan="3">Catálogo de productos</th>
    <th colspan="5"><b><FONT COLOR="darkred">Nombre de Empresa: </FONT></b>{{$company->name}}</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td><b>ID</b></td>
    <td><b>Familia</b></td>
    <td><b>Producto</b></td>
    <td><b>Descripción</b></td>
    <td><b>Precio</b></td>
    <td><b>Color</b></td>
    <td><b>Peso</b></td>
    <td><b>Tamaño</b></td>
  </tr>
  @foreach($products as $p)
  <tr>
    <td>{{$p->p_id}}</td>
    <td>{{$p->f_name}}</td>
    <td>{{$p->a_name}}</td>
    <td>{{$p->a_desc}}</td>
    <td>{{$p->p_price}}</td>
    <td>{{$p->a_color}}</td>
    <td>{{$p->a_weight}}</td>
    <td>{{$p->a_size}}</td>
  </tr>
  @endforeach
</tbody>
</table>
</body>
</html>
