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
    <link rel="stylesheet" href="../static/css/cards-paciente.css">
<body>
<?php
include "../components/navbar.php"
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <div class="container mb-3">
                    <div class="container">
                    <div class="row">
                        <div class="col-md-6 d-flex justify-content-center align-items-center">
                            <div>
                            <h1 class="display-4 text-center mt-5 mb-5">Hola, <?php echo $_SESSION['nombrePaciente']?>!</h1>
                            <p>A continuacion le mostramos las opciones que puede consultar</p>
                            <br>
                            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                <div class="container-fluid">
                                    <div class="collapse navbar-collapse" id="navbarText">
                                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                            <li class="nav-item">
                                                <a class="nav-link" href="citasVigentes.php">Ver citas</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="citas_calificar.php">Calificar citas</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="citas_calificar.php">Mi expediente</a>
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
                        <div class="col-md-6 mt-5">
                            <div class="profile-card-4 text-center">
                                <img src="https://512pixels.net/downloads/macos-wallpapers-thumbs/10-14-Night-Thumb.jpg" class="img img-responsive w-100">
                                <div class="profile-content">
                                <div class="profile-name">
                                    <?php echo $_SESSION['nombrePaciente']?> <?php echo $_SESSION['apellidoPaciente']?>
                                    <p>Paciente de Hospital la salud</p>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="profile-overview">
                                            <p>Correo</p>
                                            <h6><?php echo $_SESSION['correo']?></h6>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="profile-overview">
                                            <p>DUI</p>
                                            <h6><?php echo $_SESSION['duiPaciente']?></h6>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="profile-overview">
                                            <p>Genero</p>
                                            <h6>
                                                <?php 
                                                    if($_SESSION['sexo'] == "M"){
                                                        echo "Masculino";
                                                    }else{
                                                        echo "Femenino";
                                                    }
                                                ?>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="profile-overview">
                                            <p>Edad</p>
                                            <h6><?php echo obtener_edad_segun_fecha(substr($_SESSION['fnacimiento'], 0, 10))?></h6>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>