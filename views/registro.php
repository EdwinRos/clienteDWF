<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- CSS only -->
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
            crossorigin="anonymous"
    />
    <style>
        body{
            background-color: rgba(203, 221, 250, 0.53);
        }
        input:active{
            border-right: #253439;
        }
       .contenedor{
           display: flex;
           justify-content: center;
           align-items: center;
           height: 100vh;
       }
       .carta-registro{
           border-radius: 10px;
           background-color: white;
       }
    </style>
    <title>Registro</title>
</head>

<body>
<div class="container contenedor">
    <div class="row carta-registro">
        <div class="col" style="padding: 0; margin: 0;">
            <img src="https://i.ibb.co/dfyPkNT/Hos.png" class="img-fluid" alt="Responsive image">
        </div>
        <div class="col div-img">
            <form action="/controllers/registro.php" method="post" class="mt-3 ">
                <h1 class="display-4" style="color: #253439">Registro nuevo paciente</h1>
                <p class="lead" style="color: #253439">LLene los campos con su informacion</p>
                <label for="" class="form-label">Nombres</label>
                <input hidden="hidden" name="action" value="registro"/>
                <input
                        type="text"
                        name="nombrePaciente"
                        id="nombre"
                        class="form-control"
                        placeholder="Nombres"
                        required
                        autocomplete="nope"
                />
                <label for="" class="form-label">Apellidos</label>
                <input
                        type="text"
                        name="apellidoPaciente"
                        id="apellidos"
                        class="form-control mb-3"
                        placeholder="apellidos"
                        required
                />
                <label for="" class="form-label">Sexo</label>
                <select
                        class="form-select"
                        id="sexo"
                        name="sexo"
                        aria-label="Default select example"
                >
                    <option value="F">Femenino</option>
                    <option value="M">Masculino</option>
                </select>
                <label for="" class="form-label">Usuario</label>
                <input
                        type="text"
                        name="usuario"
                        id="usuario"
                        class="form-control"
                        placeholder="Usuario"
                        required
                />
                <label for="" class="form-label">Telefono</label>
                <input
                        type="text"
                        name="telefono"
                        id="telefono"
                        class="form-control"
                        placeholder="Telefono"
                        required
                />
                <label for="" class="form-label">Correo Electronico</label>
                <input
                        type="email"
                        name="correoPaciente"
                        id="correo"
                        class="form-control"
                        placeholder="Correo"
                        required
                />
                <label for="" class="form-label">DUI</label>
                <input
                        type="text"
                        name="duiPaciente"
                        id="dui"
                        class="form-control"
                        placeholder="DUI"
                        required
                />
                <label for="" class="form-label">Fecha de nacimiento</label>
                <input type="date" name="fechaNacimiento" id="fecha" class="form-control"/>
                <input hidden name="estado" value="1"/>

                <input type="submit" class="btn btn-success mt-3" value="Registrarce">
            </form>
        </div>
    </div>
</div>
</body>
</html>
