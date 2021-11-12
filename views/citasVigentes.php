<?php
session_start();

$idPaciente = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
            crossorigin="anonymous"
    />
    <style>
        .carta:hover{
            -webkit-box-shadow: 10px 10px 43px 0px rgba(0,0,0,0.75);
            -moz-box-shadow: 10px 10px 43px 0px rgba(0,0,0,0.75);
            box-shadow: 10px 10px 43px 0px rgba(0,0,0,0.75);
            transition: 0.5s;
        }
    </style>
    <title>Areas</title>
</head>
<?php
 include "../components/navbar.php";
?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="display-4">Lisat de citas </h1>
            <p class="lead">Paciente, se detallan sus citas para los proximos dias.</p>
        </div>
    </div>
    <div class="row">
        <?php
        $citas = json_decode(file_get_contents("http://localhost:8080/DWF/v1/paciente/citas/$idPaciente"), true);

        for ($i = 0; $i < count($citas); $i++) {
            $doctor = $citas[$i]["idDoctor"];
            $area = $doctor["idArea"];
            ?>
            <div class="col">
                <div class="card carta"  style="width: 18rem;">
                    <img src="https://th.bing.com/th/id/R.cde47105770f0f1ac96cfd5d38a0b744?rik=hFIF75VALfsZTA&pid=ImgRaw&r=0" class="card-img-top" alt="hospital fondo">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $citas[$i]["titulo"] ?></h5>
                        <p class="card-text"><b>Extras: </b><?php echo $citas[$i]["extras"]?></p>
                        <?php
                          $hora = $citas[$i]["horaCita"];
                          $fecha = $citas[$i]["fechaCita"];
                          $date = new DateTime(substr($fecha,0,10).$hora);
                          $date ->modify("+12 hours");

                        ?>
                        <P class="card-text"><b>fecha y hora de su cita: <br></b><?php echo $date->format("g:ia \n l jS F Y"); ?></P>
                        <P class="card-text"><b>Con el doctor: <br></b>
                            <?php echo $doctor["nombreDoctor"]. $doctor["apellidoDoctor"] ?>
                        </P>
                        <p class="card-text"><b>En el area de:</b>
                          <?php echo $area["nombreArea"] ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
</div>
</body>
</html>
<body>