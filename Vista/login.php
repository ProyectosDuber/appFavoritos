<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div>
            <form action="" method="" id="login">
                <input type="text" name="username" id="username" placeholder="Username" /><br>
                <input type="password" name="password" id="password" placeholder="Password" /><br><br>
                <input type="submit" name="iniciar" id="iniciar" value="Iniciar Sesion"/>
                
            </form>
            
            <p>
                <?php
              include '../Modelo/clUsuario.php'; 
              
              $usuario = clUsuario::buscar("SELECT * FROM Usuarios where username=? and password=?", array("duber","123"));
              
              echo $usuario->getIdUsuario();
              
              
                ?>
                
                
            </p>
        </div>
    </body>
</html>
