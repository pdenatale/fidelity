<?php
  if ($_POST["submit"]) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $from = 'MarcaMovil App. Form'; 
    $to = 'pablo.denatale@gmail.com'; 
    $subject = 'Message from MarcaMovil Contact Form';
    
    $body ="From: $name\n E-Mail: $email\n Message:\n $message";
    // Check if name has been entered
    if (!$_POST['name']) {
      $errName = 'Ingrese su nombre.';
    }
    
    // Check if email has been entered and is valid
    if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $errEmail = 'Ingrese una dirección válida.';
    }
    
    //Check if message has been entered
    if (!$_POST['message']) {
      $errMessage = 'Ingrese su mensaje.';
    }
    
    // If there are no errors, send the email
    if (!$errName && !$errEmail && !$errMessage) {
      if (mail ($to, $subject, $body, $from)) {
        $result='<div class="alert alert-success">Gracias! El equipo de MarcaMovil se pondrá en contacto con Ud.</div>';
      } else {
        $result='<div class="alert alert-danger">Intente más tarde por favor.</div>';
      }

      echo $result;

    } else {
      $open_modal = true;
    }

    
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>MarcaMovil, tené tu App.!</title>

    <meta name="description" content="¡MarcaMovil te permite tener tu propia App. a un precio muy bajo!">
    <meta name="keywords" content="">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    
    <link data-turbolinks-track="true" href="./assets/application-f73ce5c0156f81e841d01c2a59ea98f0.css" media="all" rel="stylesheet" />
    <script data-turbolinks-track="true" src="./assets/application-89247b4cb5147c4765954b5bab9670ae.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-backstretch/2.0.4/jquery.backstretch.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
    <!--meta content="authenticity_token" name="csrf-param" />
    <meta content="mJHeP+aLE80HTWd9W4g3T+J905Y9nX2pWdunTeu39AE=" name="csrf-token" /-->
    
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script-->

<style>
#grad1 {
    /*height: 200px;*/
    background: -webkit-linear-gradient(left top, lightblue , white); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(bottom right, lightblue, white); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(bottom right, lightblue, white); /* For Firefox 3.6 to 15 */
    background: linear-gradient(to bottom right, lightblue, white); /* Standard syntax (must be last) */
}
</style>
  </head>

  <body>
    <?php include_once("analyticstracking.php") ?>
    <div id="grad1" class="container">

      <div class="row">
        <div class="col-sm-4" style="text-align:center">
      </div>
    
      <div class="col-sm-4" style="margin-top:10px;text-align:center">
        <img src="./imgs/logoMM1.png" style="width:200px;max-width:100%" class="img-rounded">

        <div style="clear:both; height:20px;"></div>
        
        <div class="well">
          <div style="color:#777; font-size:18px;font-family:'Quicksand';margin-bottom:15px;">En MarcaMovil tenemos la solución para que puedas tener tu App! Empezá hoy a crearla!</div>
         <hr>

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#inviteModal">
            ¡Crear mi App!
          </button>

          </div>
        </div>
      </div>

      <!-- Logos -->
      <div class="text-center">
        <img src="./imgs/logoAmarte.png" class="img-thumbnail" alt="A.Marte" width="111" height="120">
        <img src="./imgs/logoMuu1.png" class="img-thumbnail" alt="MuuLecheria" width="123" height="120">
      </div>

      <div style="clear:both; height:200px;"></div>

      <!-- Modal -->
      <div class="modal fade" id="inviteModal" tabindex="-1" role="dialog" aria-labelledby="inviteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Solicitar App.</h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" role="form" method="post" action="index.php">
              <div style="display:block">
                <div class="form-group" >
                  <label for="name" class="col-sm-2 control-label">Nombre</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre y Apellido" value="<?php echo htmlspecialchars($_POST['name']); ?>">
                    <?php echo "<p class='text-danger'>$errName</p>";?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" placeholder="juanperez@gmail.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
                    <?php echo "<p class='text-danger'>$errEmail</p>";?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="message" class="col-sm-2 control-label">Mensaje</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" rows="4" name="message" placeholder="Solicito una app para..."><?php echo htmlspecialchars($_POST['message']);?></textarea>
                    <?php echo "<p class='text-danger'>$errMessage</p>";?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-10 col-sm-offset-2">
                    <input id="submit" name="submit" type="submit" value="Confirmar" class="btn btn-primary">
                  </div>
                </div>
              </form> 
            </div>
          </div>
        </div>
      </div>
    </div>

<!-- Abro el Modal si hay algun error -->
<?php if ($_POST["submit"] && $open_modal) { ?>
        <script>
          $('#inviteModal').modal(options);
          var options = {
              "show" : "true"
          }
        </script>
<?php } ?>

  </body>
</html>