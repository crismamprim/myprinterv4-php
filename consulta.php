<?php
       $data1 = $_GET["datainicial"];
       $data2 = $_GET["datafinal"]; 
       $setor1  = $_GET["setor"];
?>

<?php
/*
  if (isset($_GET["datainicial"]) && !empty($_GET["datainicial"]) 
  {
    if (isset($_GET["datafinal"]) && !empty($_GET["datafinal"]) 
    {
      if (isset($_GET["setor1"]) && !empty($_GET["setor1"]) 
      {
        $data1 = $_GET["datainicial"];
        $data2 = $_GET["datafinal"]; 
        $setor1  = $_GET["setor"];
      }
    }
  }
*/
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
    <?php
      setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
      date_default_timezone_set('America/Sao_Paulo');
    ?>

  <body>
       
    <nav class="navbar navbar-expand-sm navbar-light" style="background-color:#3e4444;">
      <a class="navbar-brand" href="#">
        <img src="./img/if_Web_64.png" width="45" height="45" class="d-inline-block align-top" alt="">
      </a>
       
    
      <?php
        include './conexao/pdo.php';
      ?>
       <div class="btn-group">
        <button type="button" class="btn btn-danger">Menu</button>
        <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
          <span class="caret"></span>
        </button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="consulta.php?datainicial=0000-00-00&datafinal=0000-00-00&setor=">Consultar recargas</a>
          <a class="dropdown-item" href="consultaCompra.php?datainicial=0000-00-00&datafinal=0000-00-00&fornecedor=">Consultar compra</a>
        </div>
      </div>
    </nav>
    
    <br>
    
    <div class="container">
        <h4>Consultar recargas</h4>
        <hr>

        <div class="row">
          <div class="col-sm-10">
            <form class="form-inline" method="get" action="consulta.php">
                <div class="form-group">
                  <label for="">Data inicial</label>
                  <input type="date" id="" name="datainicial" class="form-control mx-sm-2">
                </div>
                 <div class="form-group">
                  <label for="">Data final</label>
                  <input type="date" id="" name="datafinal" class="form-control mx-sm-2">
                </div>
                 <div class="form-group">
                  <label for="">Setor</label>
                  <select class="form-control mx-sm-2"  name="setor" required>
                          <option value="">Selecione</option>
                            <?php
                              $sql = "SELECT * FROM setor";
                              $sql = $pdo->query($sql);
                                     
                              foreach($sql->fetchAll() as $lista)
                              {
                                $setor  = $lista["nome"];
                            ?>
                          <option value="<?php echo $setor ?>"><?php echo $setor ?></option>
                          <?php }?>
                        </select>
                </div>
               
                <button type="submit" class="btn btn-primary">Consultar</button>

                    <?php
                   

                      $sql = "SELECT pedido_troca.id, 
                              pedido_troca.setor_id, 
                              pedido_troca.data_troca,
                              pedido_troca.total_folhas,
                              pedido_troca.cor1, 
                              pedido_troca.cor2, 
                              pedido_troca.cor3, 
                              pedido_troca.cor4, 
                              setor.nome
                        FROM pedido_troca, setor 
                        WHERE data_troca BETWEEN '$data1' AND '$data2'
                        AND pedido_troca.setor_id = setor.id 
                        AND setor.nome = '$setor1' 
                        ORDER BY data_troca DESC"; 


                        $sql = $pdo->query($sql);
                       
                    ?>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                      <table class="table table-hover table-sm">
                        <div class="alert alert-info" role="alert">
                          <?php
                              echo $setor1.":";
                              echo " <strong>De</strong> ".strftime('%d/%m/%Y', strtotime($data1));
                              echo " <strong>a</strong> ".strftime('%d/%m/%Y', strtotime($data2));
                          ?>
                        </div>
                        <thead>
                          <tr>
                            <th>Data da troca</th>
                            <th>Preta</th>
                            <th>Azul</th>
                            <th>Amarela</th>
                            <th>Magenta</th>
                            <th>Folhas</th>
                            <th>Ações</th>
                          </tr>
                        </thead>
                            <?php
                              foreach ($sql->fetchAll() as $lista) {
                                 
                                $id2  = $lista["id"];
                                $nome = $lista["nome"];
                                $cor1 = $lista["cor1"];
                                $cor2 = $lista["cor2"];
                                $cor3 = $lista["cor3"];
                                $cor4 = $lista["cor4"];
                                $data = $lista["data_troca"];
                                $folhas = $lista["total_folhas"];
                              ?>
                        <tbody>
                          <tr>
                            <td><?php echo strftime('%d/%m/%Y', strtotime($data)); ?></td>
                            <td><?php echo $cor1; ?></td>
                            <td><?php echo $cor2; ?></td>
                            <td><?php echo $cor3; ?></td>
                            <td><?php echo $cor4; ?></td>
                            <td><?php echo number_format($folhas, 0, '.','.'); ?></td>
                            <td><a class="material-icons vivid-blue" data-toggle="tooltip" data-placement="top" title="Editar" href="funcoes/editarTroca.php?id=<?php echo $id2?>">create</a></td>
                            <td><a class="material-icons vivid-red" data-toggle="modal" data-target="#editarTroca" href="/?funcao=editar&id=<?php echo $id?>">delete</a></td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                   
            </form>
          </div>
        </div>
        <a href="index.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Voltar</a>
    </div>
    <br>
    <br>
    <?php include_once "rodape.php"; ?>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $('.dropdown-toggle').dropdown()
    </script>
   
    <script>
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
    </script>
  </body>
</html>