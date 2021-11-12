<?php
    session_start();

    function obtener_edad_segun_fecha($fecha_nacimiento){
        $nacimiento = new DateTime($fecha_nacimiento);
        $ahora = new DateTime(date("Y-m-d"));
        $diferencia = $ahora->diff($nacimiento);
        return $diferencia->format("%y");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del paciente</title>
</head>
<link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous"
    />
    <style>
        .w-90{
            width: 90%;
        }
    </style>
<body>
<?php
include "../components/navbar.php"
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="jumbotron">
                    <h1 class="display-4">Hola, <?php echo $_SESSION['nombrePaciente']?>!</h1>
                    <div class="card" style="width: 18rem;">
                        <div class="card-header">
                            Tus datos
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Correo: <?php echo $_SESSION['correo']?></li>
                            <li class="list-group-item">Nombre: <?php echo $_SESSION['nombrePaciente']?></li>
                            <li class="list-group-item">Apellido: <?php echo $_SESSION['apellidoPaciente']?></li>
                            <li class="list-group-item">DUI: <?php echo $_SESSION['duiPaciente']?></li>
                            <li class="list-group-item">
                                Genero: 
                                <?php 
                                    if($_SESSION['sexo'] == "M"){
                                        echo "Masculino";
                                    }else{
                                        echo "Femenino";
                                    }
                                ?>
                            </li>
                            <li class="list-group-item">Edad: <?php echo obtener_edad_segun_fecha(substr($_SESSION['fnacimiento'], 0, 10))?></li>
                        </ul>
                    </div>
                    <hr class="my-4">
                    <p>A continuacion le mostramos las opciones que puede consultar</p>
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse" id="navbarText">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link" href="citasVigentes.php">Ver citas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/registropaciente">Calificar citas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="mailto:hospitallasalud01@gmail.com?Subject=Solicitar%20una%20cita">Pedir cita</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</body>
</html>