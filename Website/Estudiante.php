<?php
session_start();
include "dbConn.php";
$videoLink = "";
?>
<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
  <link rel="stylesheet" href="styles.css">
</head>
<?php
$mail =  $_SESSION['logged_in_user_name'];
?>
<body>
<img src="Udemlogo.png" style="position: sticky; top:0px; left:0px; height:100px; width:200px;">
  <button style="position:fixed; right:110px;top: 10px; color:white; background: transparent; border:0px;">Home |</button>
  <form action="logout.php" method="POST">
    <input type="submit" id="logout" value="Sign Out" style="position:fixed; right:50px;top: 10px; color:yellow; background: transparent; border:0px;">
  </form>
  <div id= "bApp">
    <div style="position:relative;  min-width:1000px; max-width:1420px;">
    <div style="position: relative;left:30px; padding-bottom:150px; padding-right:0px; padding-left:0px;width:440px; float: left;">
      <form action="AgregarDatos.php" style="position: relative; border: 2px solid black; width: 430px; padding-bottom: 30px; top:30px;">
        <legend style=" text-align: center; background-color:#403b33; color:white;"><?php echo $mail; ?></legend>
        <div style=" padding-left:10px;">
              <label>Editar Documentos:</label> <br>
              <input type="submit" id="docs" value="Editar" style="background-color:#403b33; color:white; position: relative; left: 100px; display: inline-block; height: 50px; width: 100px;">
              <br><br><br>
              <label> Cambiar password:</label><br><br><br>
              <!--FALTA AGREGAR EL POP UP-->
              <button class="open-button"  onclick="openForm2()" style="background-color:#403b33; color:white; position: relative;; left: 100px; display: inline-block; height:40px; width: 100px;">Editar</button>
                  <div class="form-popup" id="myForm2" style="position: fixed; top: 200px; left:500px; width:400px; height:300px; background-color:white">
                    <legend style=" text-align: center; background-color:#403b33; color:white;">Cracion de usuario   <button type="button" class="btn cancel" onclick="closeForm2()" style="position:relative; left:120px;">X</button> </legend>
                    <form action="/action_page.php" class="form-container">
                      <label ><b>Password</b></label><br>
                      <input type="password" placeholder="Password" name="psw" required style=" position:relative; left: 30px;"><br>
                      <label ><b> de nuevo Password</b></label><br>
                      <input type="password" placeholder="Password" name="psw" required style=" position:relative; left: 30px;"><br>
                      <button type="submit" class="btn" style=" position:relative; left: 45px;">Change</button>
                    </form>
                 </div>
        </div>
      </form>
      <?php
      include "dbConn.php";
      $instruccion = "SELECT capacitador.telCap, capacitador.correo, capacitador.nombreCap FROM joven,grupo,capacitador WHERE joven.correo = '".$mail."' AND joven.idGrupo = grupo.idGrupo AND capacitador.idC = grupo.idC";
      $consulta = mysqli_query ($conexion,$instruccion) or die ("Fallo en consulta");
        while ($fila = mysqli_fetch_array($consulta)) {
        ?>
      <form action = "/action_page.php" style="border: 2px solid black;  height:200px; width:430px; padding:0px; position: relative; top:50px;">
          <legend style="text-align: center; vertical-align:; background-color:#403b33; color:white; ">  <?php echo $fila['nombreCap']; ?></legend>
          <img src="download (4).png" style=" position:  relative; vertical-align:center; display:inline-block; border: 2px solid black;height:90%; width:40%;">
          <div style="display: inline-block; padding-left:10px;">

              <label for = "fname"> WhatsApp:</label><br>
              <label for="tel">
                <?php echo $fila['telCap']; ?>
              </label><a href="https:api.whatsapp.com/send?phone=<?php echo $fila['telCap'];?>"><img type="image" src="WhatsApp-logo.png" style="position:relative; height:20px; width:40px; padding:0px;"></a><br><br>
              <label for="lname"> E-mail: </label><br>
              <label style=""> <?php echo$fila['correo']; ?></label>
              <br><br><br><br>
            </div>
          <?php } ?>
      </div>
      <div style="position: relative; float: right; top:30px;">
        <?php
        $instruccion = "SELECT videos.links FROM joven,videos,grupo WHERE joven.correo = '".$mail."' AND grupo.idGrupo = joven.idGrupo  AND grupo.idGrupo = videos.idGrupo";
        $consulta = mysqli_query ($conexion,$instruccion) or die ("Fallo en consulta");
        $videoLink = mysqli_fetch_array($consulta)[0];
        $consulta = mysqli_query ($conexion,$instruccion) or die ("Fallo en consulta");
        ?>
        <div id="video">
          <iframe width= "500" height="300" src="<?php echo $videoLink; ?>"> </iframe>
        </div>
          <p></p>
          <div style="position: relative; left:200px;">
            <?php
            while($fila = mysqli_fetch_array($consulta)){
              $videoLink =  $fila['links'];
            ?>
          <button type="button" onclick=" changeVideo()<?php $videoLink =  $fila['links'];?>" img class="circle" disable default></button>
          <?php
            }
          ?>
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
    function changeVideo()
    {

      $('#video').load(window.Location.href + "#video");
    }
    function openForm2() {
      document.getElementById("myForm2").style.display = "block";
    }

    function closeForm2() {
      document.getElementById("myForm2").style.display = "none";
    }
</script>
</body>
</html>
