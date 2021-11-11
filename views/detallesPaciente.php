<?php
session_start();
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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <span class="navbar-brand">Paciente<?php echo $_SESSION['nombrePaciente']?></span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-center w-90">
                    <li class="nav-item">
                        <span class="nav-link active">Es un gusto atenderle</span>
                    </li>
                </ul>
                <form action="../controllers/registro.php" method="post">
                    <span class="navbar-text">
                        <input type="hidden" name="action" value="logOut">
                        <button type="submit" class="btn btn-primary">Cerrar sesion</button>
                    </span>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="jumbotron">
                    <h1 class="display-4">Hello, world!</h1>
                    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                    <hr class="my-4">
                    <p>A continuacion le mostramos las opciones que puede consultar</p>
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse" id="navbarText">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link" href="/registropaciente">Ver citas</a>
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