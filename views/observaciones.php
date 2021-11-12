<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <title>Observaciones</title>
</head>

<body>
    <?php 
    include "../components/navbar.php";
    ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="display-4">Observaciones</h1>
                <p class="lead">Ingrese la informacion en base a su experiencia</p>
                <hr>
            </div>
        </div>
        <div class="row">
            <form action="../controllers/registro.php" method="post">
                <input type="hidden" name="action" value="observacion"/>
                <input hidden name="idDoctor" value="<?php echo $_GET["idDoctor"] ?>"/>
                <input type="hidden" name="citasId" value="<?php echo $_GET["idCita"] ?>"/>
                <div class="col">
                    <label for="customRange2" class="form-label">Deslice el boton de acuerdo a su nivel de
                        satisfaction</label>
                    <div id="rango">

                    </div>

                    <input type="range" id="nota" class="form-range mt-3" name="recordDoctor" value="1" min="1" max="5">
                    <label for="" class="form-label">Observaciones</label>
                    <textarea class="form-control" name="observacion" placeholder="Deja tus comentarios aca"
                        id="floatingTextarea2" style="height: 100px"></textarea>
                    <div class="row mt-3">
                        <input type="submit" value="enviar" class="btn btn-success">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
    const valor = document.getElementById("nota").addEventListener('click', () => {
        let nota = document.getElementById("nota").value;

        if (nota <= 1) {
            document.getElementById("rango").innerHTML =
                "<div class='alert alert-danger' role='alert'>mala  &#128531;</div>"
        } else if (nota <= 2) {
            document.getElementById("rango").innerHTML =
                "<div class='alert alert-warning' role='alert'>Regular, podria mejorar &#128533;</div>"
        } else if (nota <= 3) {
            document.getElementById("rango").innerHTML =
                "<div class='alert alert-secondary' role='alert'> Ni bien, ni mal... &#x1F600;</div>"
        } else if (nota <= 4) {
            document.getElementById("rango").innerHTML =
                "<div class='alert alert-primary' role='alert'> Muy satisfecho con la atencion &#128540; </div> "
        } else if (nota == 5) {
            document.getElementById("rango").innerHTML =
                "<div class='alert alert-success' role='alert'>Son unos magos!! &#x1F9D9;</div>"
        }

    })
    </script>
</body>

</html>