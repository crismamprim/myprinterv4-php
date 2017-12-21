<?php
       $data1 = $_GET["datainicial"];
       $data2 = $_GET["datafinal"]; 
       $fornecedor1  = $_GET["fornecedor"];
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
      <h4>Compras</h4>
      <hr>
      <div class="row">
        <div class="col-3">
          <div class="card bg-light mb-3" style="max-width: 20rem;">
            <div class="card-header">Computec</div>
            <div class="card-body">
              <img class="carrinho" src="img/moeda-64.png">
              <h4 class="titulo">Valor total</h4>
              <?php
                 $sql = "SELECT SUM(valor) AS total,  compra.id, 
                                compra.fornecedor_id, 
                                compra.marca,
                                compra.modelo,
                                compra.descricao, 
                                compra.data,
                                compra.valor, 
                                fornecedor.nome,
                                fornecedor.id
                                
                          FROM compra, fornecedor 
                          WHERE compra.fornecedor_id = fornecedor.id 
                          AND fornecedor.nome = 'COMPUTEC' 
                          ORDER BY data DESC"; 


                          $sql = $pdo->query($sql);
                          $sql = $sql->fetch();

                          $valorTotal = $sql['total'];

              ?>
              <p class="etiqueta__total">R$ <?php echo number_format($valorTotal, 2, ',','.');?></p> 
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <br>
    <div class="container">
        <h4>Consultar compras</h4>
        <hr>

        <div class="row">
          <div class="col-sm-10">
            <form class="form-inline" method="get" action="consultaCompra.php">
                <div class="form-group">
                  <label for="">Data inicial:</label>
                  <input type="date" id="" name="datainicial" class="form-control mx-sm-2">
                </div>
                 <div class="form-group">
                  <label for="">Data final:</label>
                  <input type="date" id="" name="datafinal" class="form-control mx-sm-2">
                </div>
                 <div class="form-group">
                  <label for="">Fornecedor:</label>
                  <select class="form-control mx-sm-2"  name="fornecedor" required>
                          <option value="">Selecione</option>
                            <?php
                              $sql = "SELECT * FROM fornecedor";
                              $sql = $pdo->query($sql);
                                     
                              foreach($sql->fetchAll() as $lista)
                              {
                                $fornecedor  = $lista["nome"];
                            ?>
                          <option value="<?php echo $fornecedor ?>"><?php echo $fornecedor ?></option>
                          <?php }?>
                        </select>
                </div>
               
                <button type="submit" class="btn btn-primary">Consultar</button>

                    <?php
                  
                      $sql = "SELECT compra.id, 
                              compra.fornecedor_id, 
                              compra.marca,
                              compra.modelo,
                              compra.descricao, 
                              compra.data,
                              compra.valor, 
                              fornecedor.nome
                             
                              
                        FROM compra, fornecedor 
                        WHERE data BETWEEN '$data1' AND '$data2'
                        AND compra.fornecedor_id = fornecedor.id 
                        AND fornecedor.nome = '$fornecedor1' 
                        ORDER BY data DESC"; 


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
                              echo $fornecedor1.":";
                              echo " <strong>De</strong> ".strftime('%d/%m/%Y', strtotime($data1));
                              echo " <strong>a</strong> ".strftime('%d/%m/%Y', strtotime($data2));
                          ?>
                        </div>
                        <thead>
                          <tr>
                            <th>Data de compra</th>
                            <th>Fornecedor</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Descrição</th>
                            <th>Valor</th>
                            <th>Ações</th>
                          </tr>
                        </thead>
                            <?php
                              foreach ($sql->fetchAll() as $lista) {
                                 
                                $id2  = $lista["id"];
                                $data = $lista["data"];
                                $fornecedor = $lista["nome"];
                                $marca = $lista["marca"];
                                $modelo = $lista["modelo"];
                                $descricao = $lista["descricao"];
                                $valor = $lista["valor"];

                              ?>
                        <tbody>
                          <tr>
                            <td><?php echo strftime('%d/%m/%Y', strtotime($data)); ?></td>
                            <td><?php echo $fornecedor; ?></td>
                            <td><?php echo $marca; ?></td>
                            <td><?php echo $modelo; ?></td>
                            <td><?php echo $descricao; ?></td>
                            <td><?php echo number_format($valor,2,",","."); ?></td>
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
    <div class="layout-rodape" style="background-color:#3e4444;">
      <div class="container">
        <br>
        <div class="row">
           <div class="alert alert-warning" role="alert">
              Ultima atualização: 16/11/2017
          </div>
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
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
    </script>
  </body>
</html>