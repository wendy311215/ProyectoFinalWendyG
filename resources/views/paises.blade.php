<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!DOCTYPE html>
<html lang= "en">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk crossorigin="anonymous"> <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Lista de paises   </h1>
    <table class="table table-hover table bordered">
        <thead>
            <tr>
                <th> pais  </th>
                <th> Capital </th>
                <th> Moneda</th>
                <th>Poblacion</th>
                <th>Ciudades Principales</th>
            </tr>
        </thead>
        <tbody>
            <!-- recorro la tabla foreach blade -->
            @foreach($paises as  $pais => $infopais )
                <tr>
                    <td rowspan="3">  {{  $pais  }}    </td>
                    <td rowspan="3">  {{  $infopais["capital"]   }} </td>
                    <td rowspan="3">  {{  $infopais["moneda"]   }} </td>
                    <td rowspan="3">  {{  $infopais["poblacion"]   }} </td>
                    <td class="text-success"> {{ $infopais ["ciudades"] [0]  }} </td>
                </tr>
                <tr>
                <th class="text-success"> 
                {{ $infopais ["ciudades"] [1]  }} 
                </th>
                </tr>
                <tr>
                <th class="text-success">
                 {{ $infopais ["ciudades"] [2]  }} 
                </th>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>