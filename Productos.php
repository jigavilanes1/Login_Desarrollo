<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <title>Productos</title>
</head>

<body onload="BuscarTodos();">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand">Usuario:
                    <?php session_start();
                    if (!isset($_SESSION['usuario']) && !isset($_SESSION['password'])) {
                        header('Location: index.php');
                        exit();
                    }
                    echo $_SESSION['usuario'];
                    ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </a>
            </div>
            <ul class="nav navbar-nav navbar-right ">
                <li><button class="btn btn-danger" onclick="window.location.href='Salir.php';">Cerrar sesión</button></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <form onsubmit="return false;" class="row g-3">
                <div class="col-md-6">
                    <input type="hidden" id="id">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre">
                </div>
                <div class="col-md-6">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="precio">
                </div>
                <div class="col-md-6">
                    <label for="marca" class="form-label">Marca</label>
                    <select id="marca" class="form-select">
                        <option selected>Seleccione...</option>
                        <option value="View Sonic">View Sonic</option>
                        <option value="Dell">Dell</option>
                        <option value="Toshiba">Toshiba</option>
                    </select>
                </div>
                <div class="col-6">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="text" class="form-control" id="foto">
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-primary" onclick="GuardarActualizar();">Guardar</button>
                </div>
            </form>
        </div>
        <br>
        <div class="row">
            <div class="alert alert-success" role="alert" id="res">
                ...
            </div>
        </div>
        <div class="row">
            <table class="table table-striped">
                <thead align="center">
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>PRECIO</th>
                        <th>MARCA</th>
                        <th>FOTO</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="datos">
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>