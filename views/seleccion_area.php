

<!--Pasar absolutamente de esto lo dejo por si lo nesecito de referencia-->


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
            <h1 class="display-4">Lisat de </h1>
            <p class="lead">Seleccione el area para hacer la cita</p>
        </div>
    </div>
    <div class="row">
        <?php
        $areas = json_decode(file_get_contents("http://localhost:8080/DWF/v1/paciente/areas"), true);

        for ($i = 0; $i < count($areas); $i++) {
            ?>
            <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="https://th.bing.com/th/id/R.cde47105770f0f1ac96cfd5d38a0b744?rik=hFIF75VALfsZTA&pid=ImgRaw&r=0" class="card-img-top" alt="hospital fondo">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $areas[$i]["nombreArea"] ?></h5>
                            <p class="card-text">Si decea hacer una sita en esta area, hacer click en el boton de siguiente</p>
                            <a class="btn btn-success" href="doctoresList.php?idArea=<?php echo $areas[$i]["areaId"]?>">Siguiente</a>
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