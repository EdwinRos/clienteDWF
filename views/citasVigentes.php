<?php
session_start();
setlocale(LC_ALL,"es_ES");
$idPaciente = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <style>
    .carta{
        transition: all 1s ease;
    }
    
    .carta:hover {
        color: #fff;
        background: rgb(20,57,89);
background: linear-gradient(0deg, rgba(20,57,89,1) 0%, rgba(61,121,173,1) 4%, rgba(90,132,168,0.48783263305322133) 23%);

        -webkit-box-shadow: 10px 10px 43px 0px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: 10px 10px 43px 0px rgba(0, 0, 0, 0.75);
        box-shadow: 10px 10px 43px 0px rgba(0, 0, 0, 0.75);
        transition: 0.5s;

    }
    </style>
    <title>Futuras citas</title>
</head>
<?php
 include "../components/navbar.php";
?>
<div class="container mt-5 mb-5">
    <a href="http://localhost/clienteDWF/views/detallesPaciente.php" class="btn btn-primary">Regresar</a>
    <div class="row">
        <div class="col">
            <h1 class="display-4">Listado de citas </h1>
            <p class="lead">Estimado <?php echo $_SESSION['nombrePaciente']?>, se detallan sus citas para los proximos dias.</p>
        </div>
    </div>
    <div class="row">
        <?php
        $citas = json_decode(file_get_contents("http://localhost:8080/DWF/v1/paciente/citas/$idPaciente"), true);
        if(count($citas) <1){
         ?>
            <div class="col">
                <h1 class="display-4">Aun no ha pasado una consulta con uno de nuestros profesionales</h1>
                 <p class="lead">Puede agendar una cita con uno de nuestro recepcionistas haciendo uso del boton en su pagina de inicio</p>
                 <hr>
            </div>
         <?php
        }else{
        for ($i = 0; $i < count($citas); $i++) {
        
            $doctor = $citas[$i]["idDoctor"];
            $area = $doctor["idArea"];
            ?>
        <div class="col">
            <div class="card carta" style="width: 18rem;">
                <img src="https://th.bing.com/th/id/R.cde47105770f0f1ac96cfd5d38a0b744?rik=hFIF75VALfsZTA&pid=ImgRaw&r=0"
                    class="card-img-top" alt="hospital fondo">
                <div class="card-body">
                    <h5 class="card-title"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#253439"
                            class="bi bi-bookmark-dash-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zM6 6a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1H6z" />
                        </svg> <?php echo $citas[$i]["titulo"] ?></h5>
                    <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#253439"
                            class="bi bi-paperclip" viewBox="0 0 16 16">
                            <path
                                d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z" />
                        </svg> <b>Extras: </b><?php echo $citas[$i]["extras"]?></p>
                    <?php
                          $hora = $citas[$i]["horaCita"];
                          $fecha = $citas[$i]["fechaCita"];
                          $date = new DateTime(substr($fecha,0,10).$hora);
                          $date ->modify("+12 hours");
                         
                        ?>
                    <P class="card-text"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#253439"
                            class="bi bi-calendar-event" viewBox="0 0 16 16">
                            <path
                                d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z" />
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                        </svg> <b>fecha y hora de su cita: <br></b><?php echo $date->format("g:ia \n  j/d/y"); ?></P>
                    <P class="card-text"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#253439"
                            class="bi bi-person-badge-fill" viewBox="0 0 16 16">
                            <path
                                d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z" />
                        </svg> <b>Con el doctor: <br></b>
                        <?php echo $doctor["nombreDoctor"]. $doctor["apellidoDoctor"] ?>
                    </P>
                    <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#253439"
                            class="bi bi-building" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z" />
                            <path
                                d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z" />
                        </svg> <b>En el area de:</b>
                        <?php echo $area["nombreArea"] ?>
                    </p>
                </div>
            </div>
        </div>
        <?php
        }
    }
        ?>
    </div>
</div>
</div>
</body>

</html>

<body>