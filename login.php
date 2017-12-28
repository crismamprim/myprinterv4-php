<?php
	session_start();

	if (isset($_POST['email']) && empty($_POST['email']) == false) {
		$email = addslashes($_POST['email']);
		$senha = md5(addslashes($_POST['senha']));
	}

	include './conexao/pdo.php';

	try {

		$sql = $pdo->query("SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'");

		if($sql->rowCount() > 0) {
			
			$dado = $sql->fetch();

			$_SESSION['id'] = $dado['id'];

			header("Location: index.php");

			//print_r($dado);
		}
		
	} catch (PDOException $e) {
		echo "Falhou: " .$e->getMessage();
	}

?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
	<title>SGI - Sistema de gerenciamento de impressoras</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  </head>

  <body>
  	<div class="topo">
  		<h2 class="p-5 mb-2 bg-dark text-white"></h2>
  	</div>
  	<br>
  	<br>
  	<div class="container-fluid">
  		<div class="row">
  			<div class="col-md-4">
  			</div>
  			<div class="col-md-4">
  				<h2 class="text-info text-center">Faça o Login</h2>
  				<br>
  				<form class="container" id="needs-validation" novalidate method="POST">
				  <div class="form-grou">
				    <label for="email">Email</label>
				    <input type="email" class="form-control" name="email" placeholder="Email" required>
				
				  </div>
				  <div class="form-group">
				    <label for="senha">Senha</label>
				    <input type="password" class="form-control" name="senha" placeholder="Senha" required>
				 
				  </div>
				  <button type="submit" class="btn btn-primary btn-lg btn-block">Entrar</button>
				</form>
  			</div>
  			<div class="col-md-4">

  			</div>
  		</div>
  	</div>


  	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';

  window.addEventListener('load', function() {
    var form = document.getElementById('needs-validation');
    form.addEventListener('submit', function(event) {
      if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    }, false);
  }, false);
})();
</script>
  </body>
</html>
