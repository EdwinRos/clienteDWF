<?php
$areaID = $_GET['idArea'];
echo $areaID;
$doctores = json_decode(file_get_contents("http://localhost:8080/DWF/v1/paciente/doctores/$areaID"), true)
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
    <title>Areas</title>
</head>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="display-4">Seleccione un doctor</h1>
            <p class="lead">Seleccione Un doctor con el que desea hacer la cita</p>
        </div>
    </div>
    <div class="row">
        <?php
        for ($i = 0; $i < count($doctores); $i++) {
            ?>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <form   >

                    </form>
                    <img src="https://th.bing.com/th/id/R.cde47105770f0f1ac96cfd5d38a0b744?rik=hFIF75VALfsZTA&pid=ImgRaw&r=0" class="card-img-top" alt="hospital fondo">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $doctores[$i]["nombreDoctor"];?> <?php echo $doctores[$i]["apellidoDoctor"];?></h5>
                        <p class="card-text"><b>Contacto: </b><?php echo $doctores[$i]["correoDoctor"]?></p>
                        <p class="card-text">Seleccione siguiente para continuar la agendacion de cita</p>
                        <input type="submit" class="btn btn-success" value="siguiente">
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
