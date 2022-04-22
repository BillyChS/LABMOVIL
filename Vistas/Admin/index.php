<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <div class="pt-5 container">
        <div class="p-3 text-center">
            <button class="pb-2 btn btn-primary"><i class="fas fa-address-card"></i> Agregar Carrera</button>
        </div>
        <table id="ejemplo" class="table table-hover table-dark">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Codigo de Carrera</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Cursos Asociados</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td><button class="btn btn-primary"><i class="fas fa-book"></i></button></td>
                </tr>
                <tr class="text-center">
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td><button class="btn btn-primary"><i class="fas fa-book"></i></button></td>
                </tr>
                <tr class="text-center">
                    <th scope="row">3</th>
                    <td>Jacob</td>
                    <td>@twitter</td>
                    <td>@mdo</td>
                    <td><button class="btn btn-primary"><i class="fas fa-book"></i></button></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

<script src="https//cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="//unpkg.com/alpinejs" defer></script>

<link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"></script>

<script src="https://kit.fontawesome.com/a3c8152c06.js" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('#ejemplo').DataTable();
    });
</script>

</html>