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
                    <form action="index.php?controller=usuario&action=buscarUsuario" method="POST">
                        <div class="row">
                            <h1>Buscar usuario</h1>
                            <hr>
                            <div class="col-10">
                                <label for="nombres" class="form-label">Nombre</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="nombre" name="nombre">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">Buscar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php if (isset($datosVista)) { ?>
                        <div class="row">
                            <hr>
                            <div class="col-12">
                                <table class="table table-striped table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Apellido</th>
                                            <th scope="col">Edad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($datosVista["data"] as $usuario) : ?>
                                            <tr>
                                                <th scope="row"><?php echo $usuario['id'] ?></th>
                                                <th><?php echo $usuario['nombres'] ?></th>
                                                <th><?php echo $usuario['apellidos'] ?></th>
                                                <th><?php echo $usuario['edad'] ?></th>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</body>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>