<?php

    require_once("../Model/LoginModel.php");
  
    session_start();
    
    $nombre = $_POST['usuarioI'];
    $password = MD5($_POST['passwordI']);
    $password= hash('sha256',$password);

    $usuario = new Login();
    $usuario->setUsuario($_usuario);
    $usuario->setPassword($password);

    
    $arr = $usuario->insertarLogin();
    if($arr != null){
        echo  "<SCRIPT>alert('usuario guardado');</SCRIPT>";
        
    }else{
        echo " <SCRIPT>alert('usuario guardado');</SCRIPT>;";
    }
    
    ?>