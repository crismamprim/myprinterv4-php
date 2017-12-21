<!DOCTYPE html>
<html lang="pt-br">

  <head>
	  <title>SGI - Sistema de gerenciamento de impressoras</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  </head>
    <?php
      setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
      date_default_timezone_set('America/Sao_Paulo');
    ?>

  <body>
       
	    <nav class="navbar navbar-expand-sm navbar-light" style="background-color:#3e4444;">
	      <a class="navbar-brand" href="#">
	        <img src="../img/if_Web_64.png" width="45" height="45" class="d-inline-block align-top" alt="">
	      </a>
	       
	      <?php
	        include '../conexao/pdo.php';
	      ?>
	    </nav>

	    <?php


			$id =$_GET['id'];

			$sql  =	"SELECT * FROM pedido_troca
							  WHERE id = '$id'";

			$sql = $pdo->query($sql);
				
			foreach($sql->fetchAll() as $lista)
			{
				$dataTroca = $lista["data_troca"];
				$cor1      = $lista["cor1"];
				$cor2      = $lista["cor2"];
				$cor3      = $lista["cor3"];
				$cor4      = $lista["cor4"];
				$folhas    = $lista["total_folhas"];
			}

			echo "<br>";
			echo $dataTroca;
			echo "<br>";
			echo $cor1;
			echo "<br>";
			echo $cor2;
			echo "<br>";
			echo $cor3;
			echo "<br>";
			echo $cor4;
			echo "<br>";
			echo $folhas;	
		?>

		<div class="container">
			<div class="row">
				<div class="col-6">
				
					<form class="" id="valida" method="POST" action="./funcoes/gravaTroca.php" novalidate>
					<span class="border border-primary">
                    <div class="form-group row">
                      <label for="setor" class="col-sm-2 col-form-label">Setor</label>
                      <div class="col-sm-6">
                        <select class="form-control" name="setor" required>
                          <option value="">Selecione</option>
                            <?php
                              $sql = "SELECT * FROM setor";
                              $sql = $pdo->query($sql);
                                     
                              foreach($sql->fetchAll() as $lista)
                              {
                                $id     = $lista["id"];
                                $setor  = $lista["nome"];
                            ?>
                          <option value="<?php echo $id ?>"><?php echo $setor ?></option>
                          <?php }?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="data" class="col-sm-2 col-form-label">Data</label>
                      <div class="col-sm-6">
                        <input type="date" name="data" class="form-control" id="validaData" value="<?php echo $dataTroca?>" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="preta" class="col-sm-2 col-form-label">Preta</label>
                      <div class="col-sm-6">
                        <select class="form-control" name="cor1" required>
                          <option value="">Selecione</option>
                          <option value="Sim">Sim</option>
                          <option value="N/A">N/A</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="azul" class="col-sm-2 col-form-label">Azul</label>
                      <div class="col-sm-6">
                        <select class="form-control" name="cor2" required>
                          <option value="">Selecione</option>
                          <option value="Sim">Sim</option>
                          <option value="N/A">N/A</option>
                        </select>
                      </div>
                    </div>
                     <div class="form-group row">
                      <label for="amerela" class="col-sm-2 col-form-label">Amarela</label>
                      <div class="col-sm-6">
                        <select class="form-control" name="cor3" required>
                          <option value="">Selecione</option>
                          <option value="Sim">Sim</option>
                          <option value="N/A">N/A</option>
                        </select>
                      </div>
                    </div>
                     <div class="form-group row">
                      <label for="magenta" class="col-sm-2 col-form-label">Magenta</label>
                      <div class="col-sm-6">
                        <select class="form-control" name="cor4" required>
                          <option value="">Selecione</option>
                          <option value="Sim">Sim</option>
                          <option value="N/A">N/A</option>
                        </select>
                      </div>
                    </div>
                     <div class="form-group row">
                      <label for="folhas" class="col-sm-2 col-form-label">Folhas</label>
                      <div class="col-sm-6">
                        <input type="text" name="folhas" class="form-control" value="<?php echo $folhas?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="folhas" class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-6">
                        <button class="btn btn-primary" type="submit">Gravar</button>
                      </div>
                    </div>
                  </form>
				</div>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	    <script type="text/javascript">
	      	$('.dropdown-toggle').dropdown()
	    </script>
	    <script>

			// Example starter JavaScript for disabling form submissions if there are invalid fields
	    	(function() {
	      	'use strict';

		      window.addEventListener('load', function() {
		        var form = document.getElementById('valida');
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
	    <script>
	      $(function () {
	        $('[data-toggle="tooltip"]').tooltip()
	      })
	    </script>
   </body>
</html>












