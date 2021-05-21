<?php
session_start();
?>
<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <img src="Udemlogo.png" style="position: sticky ; top:0px; left:0px; height:100px; width:200px;">
  <button style="position:fixed; right:110px;top: 10px; color:white; background: transparent; border:0px;">Home |</button>
  <form action="logout.php" method="POST">
    <input type="submit" id="logout" value="Sign Out" style="position:fixed; right:50px;top: 10px; color:yellow; background: transparent; border:0px;">
  </form>
  <div id= "bApp">
    <div style="position: relative; float: right; top:30px;">
      <h1>Alumnos</h1>
      <table>
        <tr>
          <td>Grupo</td>
          <td>Nombre</td>
          <td>Correo</td>
          <td>Teléfono</td>
          <td>Acción</td>
        </tr>
        <?php
          include "dbConn.php";
          $instruccion = "SELECT idGrupo, nombre, correo, telefono from joven";
          $consulta = mysqli_query ($conexion,$instruccion) or die ("Fallo en consulta");
          while ($fila = mysqli_fetch_array($consulta)) {
          ?>
          <tr>
            <td><?php echo $fila['idGrupo']; ?></td>
            <td><?php echo $fila['nombre']; ?></td>
            <td><?php echo $fila['correo']; ?></td>
            <td><?php echo $fila['telefono']; ?></td>
            <td><a href="delete.php?id=<?php echo $fila['correo']; ?>">Delete</a></td>
          </tr>
          <?php
          }
          ?>

      </table>
      <h1>Capacitadores</h1>
      <table>
        <tr>
          <td>Nombre</td>
          <td>Correo</td>
          <td>Teléfono</td>
          <td>Acción</td>
        </tr>
        <?php

          $instruccionC = "SELECT nombreCap, correo, telCap from capacitador";
          $consultaC = mysqli_query ($conexion,$instruccionC) or die ("Fallo en consulta");
          while ($filaC = mysqli_fetch_array($consultaC)) {
          ?>
          <tr>
            <td><?php echo $filaC['nombreCap']; ?></td>
            <td><?php echo $filaC['correo']; ?></td>
            <td><?php echo $filaC['telCap']; ?></td>
            <td><a href="delete.php?id=<?php echo $filaC['correo']; ?>">Delete</a></td>
          </tr>
          <?php
          }
          ?>

      </table>
    </div>
    <div style="position: relative;left:30px; padding-bottom:120px; width:440px;">
      <form style="position: relative; border: 2px solid black; width: 430px; padding:0px; top:30px;">
        <legend style=" text-align: center; background-color:#403b33; color:white;">Acciones</legend>
        <div style=" padding-left:10px;">
                <br>
                <label>Generar Reporte:</label><br><br>
                <p>del <input type="date" name="" value=" 04/29/2020"> al  <input type="date" name="" value=" 04/29/2021"></p><br>
                  <button style="background-color:#403b33; color:white; position: relative;; left: 100px; display: inline-block; height:40px; width: 100px;">Generar</button><br><br><br>
                  <label> Agregar Estudiantes:</label><br>
                  <!--FALTA AGREGAR EL POP UP-->
                  <button style="background-color:#403b33; color:white; position: relative;; left: 100px; display: inline-block; height:40px; width: 100px;">Ir</button><br><br><br>
                  <label> Cambiar password:</label><br>
                  <!--FALTA AGREGAR EL POP UP-->
                  <button style="background-color:#403b33; color:white; position: relative;; left: 100px; display: inline-block; height:40px; width: 100px;">Editar</button><br><br><br>
        </div>
      </form>
      <form style="border: 2px solid black; width: 430px; padding:0px; position: relative; top: 40px;">
          <legend style="text-align: center; vertical-align:; background-color:#403b33; color:white; ">Alumnos<input type="checkbox"style="position: relative; left: 130px;" >send to everyone</input></legend>
          <div style="height:200px; overflow-y: scroll;">
          <button  class="accordion" type="button">Grupo 1 <input type="checkbox" style=" position: relative; left:300px;"></input></button>
          <div class="panel">
             <p>Joven 1<input  type="image"src="WhatsApp-logo.png" style="position:relative; height:20px; width:40px; padding:0px;"><input  type="image"src="MailLogo.png" style="position:relative; height:20px; width:30px; padding:0px;">  </input><input type="checkbox" style=" position: relative; left:200px;"></input></p>
          </div>
          <button  class="accordion" type="button">Grupo 2 <input type="checkbox" style=" position: relative; left:300px;"></input></button>
          <div class="panel">
             <p>Joven 1<input  type="image"src="WhatsApp-logo.png" style="position:relative; height:20px; width:40px; padding:0px;"><input  type="image"src="MailLogo.png" style="position:relative; height:20px; width:30px; padding:0px;">  </input><input type="checkbox" style=" position: relative; left:200px;"></input></p>
          </div>
          <button  class="accordion" type="button">Grupo 2 <input type="checkbox" style=" position: relative; left:300px;"></input></button>
          <div class="panel">
             <p>Joven 1<input  type="image"src="WhatsApp-logo.png" style="position:relative; height:20px; width:40px; padding:0px;"><input  type="image"src="MailLogo.png" style="position:relative; height:20px; width:30px; padding:0px;">  </input><input type="checkbox" style=" position: relative; left:200px;"></input></p>
          </div>
        </div>
    </form>

  </div>

  </div>
  <footer>
    <div style=" position:fixed; right:10px;">
        <a href="https://www.w3schools.com/tags/tag_footer.asp" id="a" style="padding-left:30px; padding-bottom: 10px;"> Numero de Contacto</a>
        <a href="https://www.w3schools.com/tags/tag_footer.asp" id="a" style="padding-right:260px; padding">| Correo</a>
          <a href="#" class="fa fa-facebook" ></a>
            <a href="#" class="fa fa-instagram" ></a>
            <a href="#" class="fa fa-twitter" ></a>
            <a href="#" class="fa fa-google">+</a>
            <img src="188.png" style=" height:78px; width:150px; padding-left:100px; padding-right:10px; bottom:0px;">
    </div>
  </footer>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var panel = this.nextElementSibling;
      if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
          } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
          }
        });
      }
</script>

</body>
</html>
