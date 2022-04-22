<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <title>Create</title>
</head>

<body>
    <div class="pt-5 container">
        <div class="offset-2 col-8">
            <form id="form">
                <div class="mb-3">
                    <label for="Codigo de Carrera" class="form-label">Codigo_carrera</label>
                    <input type="text" class="form-control" id="" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="Nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="">
                </div>
                <div class="mb-3">
                    <label for="Titulo" class="form-label">Titulo</label>
                    <input type="text" class="form-control" id="">
                </div>
                <button type="submit" class="enviar btn btn-primary">Agregar</button>
            </form>

        </div>
    </div>
</body>


<script src="//unpkg.com/alpinejs" defer></script>



<script src="https://kit.fontawesome.com/a3c8152c06.js" crossorigin="anonymous"></script>

<script>
    document.querySelector('form').addEventListener('submit', e => {
            e.preventDefault()
            const data = Object.fromEntries(
                new FormData(e.target)
            )
            alert(JSON.stringify(data))
        }

    )
</script>


</html>