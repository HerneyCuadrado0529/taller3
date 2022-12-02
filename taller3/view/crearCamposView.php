<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>MVC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                Desarrollo Web
            </a>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php include('inc/sidebar.php'); ?>
            <div class="col-9">
                <div class="container-fluid">
                    <div class="row">
                        <h1>Crear Campo extra</h1>
                        <hr>
                        <div class="col-12">
                            <form action="index.php?controller=campos&action=registrarCampos" method="POST">
                                <div class="mb-3">
                                    <label for="nombres" class="form-label">Usuario</label>
                                    <select type="text" class="form-control" id="usuario" name="usuario">
                                        <option value="">--seleccionar--</option>
                                        <?php foreach($datosVista["data"] as $usuario){
                                            echo '<option value="'.$usuario['id'].'">'.$usuario['nombres']. ' ' . $usuario['apellidos'].'</option>';

                                        }?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="pais" class="form-label">Pais</label>
                                    <input type="text" class="form-control" id="pais" name="pais">
                                </div>
                                <div class="mb-3">
                                    <label for="ciudad" class="form-label">Ciudad</label>
                                    <input type="text" class="form-control" id="ciudad" name="ciudad">
                                </div>
                                <div class="mb-3">
                                    <label for="fecha_ingreso" class="form-label">Ingreso</label>
                                    <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso">
                                </div>
                                <div class="mb-3">
                                    <label for="fecha_nacimiento" class="form-label">Nacimiento</label>
                                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
                                </div>
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Telefono</label>
                                    <input type="number" class="form-control" id="telefono" name="telefono">
                                </div>
                                <div class="mb-3">
                                    <label for="altura" class="form-label">Altura</label>
                                    <input type="number" class="form-control" id="altura" name="altura">
                                </div>
                                <div class="mb-3">
                                    <label for="correo" class="form-label">Correo</label>
                                    <input type="email" class="form-control" id="correo" name="correo">
                                </div>

                                <button type="submit" class="btn btn-primary">Registrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>