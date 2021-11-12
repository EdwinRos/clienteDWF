<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <span class="navbar-brand">Paciente</span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-center w-85">
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