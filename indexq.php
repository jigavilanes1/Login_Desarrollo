<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="css/style.css" rel="stylesheet" type="text/css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="js/script.js"></script>
   <title>Login</title>

</head>

<body>
   <?php
   session_start();
   ?>
   <div class="overlay">
      <form onsubmit="return false;" class="row g-3 border p-3 form">
         <div class="con">
            <header class="head-form">
               <h2>Log In</h2>
               <p>Ingrese con su usuario y contraseña</p>
            </header>
            <br>
            <div class="field-set">
               <label for="usuario" class="form-label">Usuario</label>
               <br>
               <span class="input-item">
                  <i class="fa fa-user-circle"></i>
               </span>
               <input class="form-input" id="usuario" type="text" placeholder="Ingrese su usuario" required>
               <br>
               <label for="password" id="password" class="form-label">Password</label>
               <br>
               <span class="input-item">
                  <i class="fa fa-key"></i>
               </span>
               <input class="form-input" type="password" placeholder="Ingrese su contraseña" id="pass" name="pass">
               <br>
               <button class="log-in" name="btningresar" onclick="Login();"> Ingresar </button>
            </div>
            <div class="other">
               <button class="btn submits frgt-pass">Olvido su contraseña</button>
               <button class="btn submits sign-up"><a href="html/registrarse.php" >Registrarse
                     <i class="fa fa-user-plus" aria-hidden="true"></i>
               </button>
            </div>
         </div>
         </form>
   </div>
</body>

</html>