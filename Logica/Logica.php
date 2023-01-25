<?php
    require_once("../Model/ProductoModel.php");
    require_once("../Model/LoginModel.php");

    $data = json_decode(file_get_contents("php://input"));

    switch ($data->operacion) {
        case "Guardar":
            $ProductoModel = new Producto();
            $ProductoModel->setId($data->id);
            $ProductoModel->setNombre($data->nombre);
            $ProductoModel->setPrecio($data->precio);
            $ProductoModel->setMarca($data->marca);
            $ProductoModel->setFoto($data->foto);
            if($ProductoModel->getId() == "") {
                $ProductoModel->insertarProducto();
                echo "Guardado";
            } else {
                $ProductoModel->actualizarProducto();
                echo "Actualizado";
            }
            break;

        case "BuscarTodos":
            $ProductoModel = new Producto();
            $resultado = $ProductoModel->BuscarTodos();
            foreach($resultado as $fila) {                
                echo "<tr align='center'><td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td><td>$fila[4]</td>
                <td><button class='btn btn-danger' onclick='Eliminar($fila[0]);'>Eliminar</button>
                <button class='btn btn-warning' onclick='BuscarPorId($fila[0]);'>Editar</button></td></tr>";
            }
            break;

        case "Eliminar":
            $ProductoModel = new Producto();
            $ProductoModel->setId($data->id);
            $ProductoModel->eliminarProducto();
            echo "Eliminado";
            break;

        case "BuscarPorId":
            $ProductoModel = new Producto();
            $ProductoModel->setId($data->id);
            echo $ProductoModel->BuscarProducto();            
            break;

        case "Login":
            session_start();
            $LoginModel = new Login();
            $LoginModel->setUsuario($data->usuario);
            $LoginModel->setPassword($data->password);
            if($LoginModel->BuscarUsuario()) {
                echo 'Correcto';
                $_SESSION["usuario"] = $LoginModel->getUsuario();
                $_SESSION["pasword"] = $LoginModel->getPassword();
            } else {
                echo '<div class="alert alert-danger col-lg-4 offset-lg-4" role="alert" id="res">
                Usuario o contraseña incorrectos</div>';
            }
            break;
        
        case "Registrar":
            $LoginModel = new Login();
            $LoginModel->setUsuario($data->usuario);
            $LoginModel->setPassword($data->password);          
            $LoginModel->insertarLogin();
            echo '<div class="alert alert-success col-lg-4 offset-lg-4" role="alert" id="res">
            Usuario registrado correctamente</div>';            
            break;
    }
