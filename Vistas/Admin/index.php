<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
    <script src="//unpkg.com/alpinejs" defer></script>


    <title>Create</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: arial;
            text-decoration: none;
        }

        body {
            background: #5c2fab;
        }
    </style>



</head>

<body class="">
    <div class="pt-5 container">
        <h1 class="text-center text-white"><i class="fas fa-user-tie"></i></h1>
        <h1 class="text-center  text-white pt-3 pb-5">Perfil de Administrador</h1>
        <div class=" col-12 accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="text-center accordion-header" id="headingOne">
                    <button class="text-center accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Mantenimiento de Cursos
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="col-12 accordion-body">

                        <div class="container col-5">
                            <form action="http://localhost/LABMOVIL/rutas/cursos.php" class="buscador">
                                <div class="input-group mb-3">
                                    <input id="inputCarrera" type="text" class="form-control form-control-lg" placeholder="Buscar ">
                                    <button type="button" id="buscarCursos" class=" input-group-text btn-success"><i class="bi bi-search me-2"></i> Buscar</button>
                                </div>
                            </form>
                        </div>

                        <table id="tabla" class=" table table-dark table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">Codigo Curso</th>
                                    <th scope="col">Codigo Carrera</th>
                                    <th scope="col">No Ciclo</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Creditos</th>
                                    <th scope="col">Horas Semanales</th>
                                </tr>
                            </thead>
                            <tbody id="tbody_carreras" class="text-center">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="text-center accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Mantenimiento de Carreras
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="container col-5">
                            <form action="http://localhost/LABMOVIL/rutas/cursos.php" class="buscador">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control form-control-lg" placeholder="Buscar">
                                    <button type="submit" class="input-group-text btn-success"><i class="bi bi-search me-2"></i> Buscar</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-12">
                            <table id="tabla" class=" table table-dark table-hover">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">Codigo Carrera</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Titulo</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_carreras" class="text-center">

                                </tbody>
                            </table>

                            <div class=" p-5 offset-1 col-10">

                                <h3 class="text-center">Agregar Curso</h3>
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

                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Mantenimiento de Profesores
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Mantenimiento de Alumnos
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Mantenimiento de Ciclos
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Oferta Academica
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


<script src="//unpkg.com/alpinejs" defer></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


<script src="https://kit.fontawesome.com/a3c8152c06.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    var tabla = document.querySelector("#tabla");

    var dataTable = new DataTable(tabla);
    var carreras


    const ObtenerCarreras = async () => {
        try {
            var respuesta = await axios.get('http://localhost/LABMOVIL/rutas/cursos.php')
            carreras = respuesta.data

            for (let carrera of carreras) {
                console.log(carrera)
                var tr = document.createElement("tr")
                var thbody = document.getElementById("tbody_carreras")

                const codigo_curso = document.createElement("td");
                const codigo_carrera = document.createElement("td");
                const no_ciclo = document.createElement("td");
                const nombre = document.createElement("td");
                const creditos = document.createElement("td");
                const horas_semanales = document.createElement("td");

                codigo_curso.textContent = carrera["Codigo_Curso"]
                codigo_carrera.innerText = carrera["Codigo_Carrera"]
                no_ciclo.innerText = carrera["No_Ciclo"]
                nombre.innerText = carrera["Nombre"]
                creditos.innerText = carrera["Creditos"]
                horas_semanales.innerText = carrera["Horas_Semanales"]
                tr.appendChild(codigo_curso)
                tr.appendChild(codigo_carrera)
                tr.appendChild(no_ciclo)
                tr.appendChild(nombre)
                tr.appendChild(creditos)
                tr.appendChild(horas_semanales)

                thbody.appendChild(tr)

            }
        } catch (error) {
            console.log(error)
        }
    }

    ObtenerCarreras();





    const botonBuscarCursos = document.getElementById('buscarCursos').addEventListener('click', function() {
        var valor = document.getElementById('inputCarrera').nodeValue();
        console.log(valor)
        window.location.href = `http://localhost/LABMOVIL/rutas/cursos.php?Nombre=${valor}`
    })

    var tabla = document.querySelector("#tabla");
    var dataTable = new DataTable(tabla);
    var carreras
</script>


</html>