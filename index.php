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
       
   <?php include_once "topo.php"; ?>

      <div class="modal fade" id="cadastarTroca">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal cadastro troca -->
              <div class="modal-header">
                <h4 class="modal-title">Cadastrar troca</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
     
              <!-- Modal body -->
              <div class="modal-body">
                <di class="container-fluid">
                  <form class="" id="valida" method="POST" action="./funcoes/gravaTroca.php" novalidate>
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
                        <input type="date" name="data" class="form-control" id="validaData" required>
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
                        <input type="text" name="folhas" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="folhas" class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-6">
                        <button class="btn btn-primary" type="submit">Gravar</button>
                      </div>
                    </div>
                  </form>
                </di>
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
              </div>

            </div>
          </div>
        </div>

        <div class="modal fade" id="cadastarCompra">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal cadastro compra -->
              <div class="modal-header">
                <h4 class="modal-title">Cadastrar compra</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
     
              <!-- Modal body -->
              <div class="modal-body">
                <di class="container-fluid">
                  <form class="" id="valida" method="POST" action="./funcoes/gravaCompra.php" novalidate>
                    <div class="form-group row">
                      <label for="data" class="col-sm-2 col-form-label">Data:</label>
                      <div class="col-sm-6">
                        <input type="date" name="data" class="form-control" id="valida" required>
                      </div>
                    </div>
                     <div class="form-group row">
                      <label for="magenta" class="col-sm-2 col-form-label">Fornecedor:</label>
                      <div class="col-sm-6">
                        <select class="form-control" name="fornecedor" required>
                         <option value="">Selecione</option>
                            <?php
                              $sql = "SELECT * FROM fornecedor";
                              $sql = $pdo->query($sql);
                                     
                              foreach($sql->fetchAll() as $lista)
                              {
                                $id     = $lista["id"];
                                $nome  = $lista["nome"];
                            ?>
                          <option value="<?php echo $id ?>"><?php echo $nome ?></option>
                          <?php }?>
                        </select>
                      </div>
                    </div>
                     <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Marca:</label>
                      <div class="col-sm-6">
                        <input type="text" name="marca" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Modelo:</label>
                      <div class="col-sm-6">
                        <input type="text" name="modelo" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Descrição:</label>
                      <div class="col-sm-6">
                        <textarea name="descricao" class="form-control countdown" rows="3" required></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Valor:</label>
                      <div class="col-sm-6">
                        <input type="text" name="valor" class="form-control" id="demo4" data-thousands="." data-decimal="," data-prefix="R$ " required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="folhas" class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-6">
                        <button class="btn btn-primary" type="submit">Gravar</button>
                      </div>
                    </div>
                  </form>
                </di>
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
              </div>

            </div>
          </div>
        </div>
        <div class="modal fade" id="resumo">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal resumo -->
              <div class="modal-header">
                <h4 class="modal-title">Cadastrar periodo de troca</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
     
              <!-- Modal body -->
              <div class="modal-body">
                <di class="container-fluid">
                  <form class="" id="valida" method="POST" action="./funcoes/gravaResumo.php"  novalidate>
                    <div class="form-group row">
                      <label for="setor" class="col-sm-3 col-form-label">Setor</label>
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
                      <label for="data" class="col-sm-3 col-form-label">Data inicial</label>
                      <div class="col-sm-6">
                        <input type="date" name="datainicial" class="form-control" required>
                      </div>
                    </div>
                     <div class="form-group row">
                      <label for="folhas" class="col-sm-3 col-form-label">Data final</label>
                      <div class="col-sm-6">
                        <input type="date" name="datafinal" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="folhas" class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-6">
                        <button class="btn btn-primary" type="submit">Gravar</button>
                      </div>
                    </div>
                  </form>
                </di>
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
              </div>

            </div>
          </div>
        </div>
    <br>
    <br>
    <div class="container">
      <div class="row">

        <div class="col-3">
          <div class="card bg-light mb-3" style="max-width: 20rem;">
            <div class="card-header">Sala medicos</div>
            <div class="card-body">
              <img class="" src="img/paper.png">
              <h4 class="card-title">Total de folhas</h4>
              <?php 
                $sql = "SELECT pedido_troca.setor_id, 
                                setor.id, 
                                setor.nome, SUM(total_folhas)AS total
                        FROM pedido_troca, setor
                        WHERE pedido_troca.setor_id = setor.id
                        AND setor.nome = 'Sala médico'";
                          
                        $sql = $pdo->query($sql);

                        if($sql->rowCount() > 0){
                            
                          foreach($sql->fetchAll() as $total)
                          {
                            $totalFolhas = $total["total"];
                            $totalFolhasFormat = number_format($totalFolhas, 0, '.','.');
                               ?>
                           <p class="etiqueta__total"># <?php echo $totalFolhasFormat; ?></p>
                        <?php }?>
                        <?php }else{

                    echo "<br>";
                    echo "<div class='alert alert-info' role='alert'>
                          Não foram encontrados registros....
                        </div>";
                    }?>
                <?php
                  // calcula total de registros e total de folhas
                  $sql = "SELECT COUNT(*) as total, SUM(total_folhas) as folha
                          FROM  pedido_troca, setor 
                          WHERE pedido_troca.setor_id = setor.id
                          AND setor.nome = 'Sala médico'";

                          $sql = $pdo->query($sql);
                          $sql = $sql->fetch();

                          $totalRegistro = $sql['total'];
                          $folha = $sql['folha'];

                          $registro = $totalRegistro;
                          $totalFolhas = $folha;

                  // retorna a data da primeira troca
                  $sql = "SELECT * FROM  pedido_troca, setor 
                        WHERE pedido_troca.setor_id = setor.id
                        AND setor.nome = 'Sala médico'
                        ORDER BY data_troca ASC";

                        $sql = $pdo->query($sql);
                        $sql = $sql->fetch();

                        $data1 = $sql['data_troca'];

                  // retorna a data da ultima troca
                  $sql = "SELECT * FROM  pedido_troca, setor 
                        WHERE pedido_troca.setor_id = setor.id
                        AND setor.nome = 'Sala médico'
                        ORDER BY data_troca DESC";

                        $sql = $pdo->query($sql);
                        $sql = $sql->fetch();

                        $data2 = $sql['data_troca']; 

                    $dataInicial = date_create($data1);
                    $dataFinal   = date_create($data2);

                    $intervalo = date_diff($dataInicial, $dataFinal);
                    $dias = $intervalo->format('%a');
                    
                    $mes = $dias / 24;

                    $consumoDiaSalaMedico = $totalFolhas / $dias;
                    $consumoMesSalaMedico = $totalFolhas / $mes;

                 ?>
                 <hr>
                 <img class="" src="img/printer-64.png">
                 <h5 class="texto-consumo">Consumo</h5>
                 <br>
                 <h6>Dia: <span class="badge badge-info"><?php echo number_format($consumoDiaSalaMedico, 0, '.','.'); ?></span></h6>
                 <h6>Mês: <span class="badge badge-info"><?php echo number_format($consumoMesSalaMedico, 0, '.','.'); ?></span></h6>
            </div>
          </div>
        </div>
        <div class="col-3">
        <div class="card bg-light mb-3" style="max-width: 20rem;">
          <div class="card-header">Recepção</div>
            <div class="card-body">
              <img class="" src="img/paper.png">
              <h4 class="card-title">Total de folhas</h4>
              <?php 
                $sql = "SELECT pedido_troca.setor_id, 
                                setor.id, 
                                setor.nome, SUM(total_folhas)AS total
                        FROM pedido_troca, setor
                        WHERE pedido_troca.setor_id = setor.id
                        AND setor.nome = 'Recepcao'";
                          
                $sql = $pdo->query($sql);

                if($sql->rowCount() > 0){
                            
                foreach($sql->fetchAll() as $total)
                {
                  $totalFolhas = $total["total"];
                  $totalFolhasFormat = number_format($totalFolhas, 0, '.','.');
                  ?>
                  <p class="etiqueta__total"># <?php echo $totalFolhasFormat; ?></p>
              <?php }?>
               <?php }else{

                    echo "<br>";
                    echo "<div class='alert alert-info' role='alert'>
                          Não foram encontrados registros....
                        </div>";
                    }?>
                <?php
                  // calcula total de registros e total de folhas
                  $sql = "SELECT COUNT(*) as total, SUM(total_folhas) as folha
                          FROM  pedido_troca, setor 
                          WHERE pedido_troca.setor_id = setor.id
                          AND setor.nome = 'Recepcao'";

                          $sql = $pdo->query($sql);
                          $sql = $sql->fetch();

                          $totalRegistro = $sql['total'];
                          $folha = $sql['folha'];

                          $registro = $totalRegistro;
                          $totalFolhas = $folha;

                  // retorna a data da primeira troca
                  $sql = "SELECT * FROM  pedido_troca, setor 
                        WHERE pedido_troca.setor_id = setor.id
                        AND setor.nome = 'Recepcao'
                        ORDER BY data_troca ASC";

                        $sql = $pdo->query($sql);
                        $sql = $sql->fetch();

                        $data1 = $sql['data_troca'];

                  // retorna a data da ultima troca
                  $sql = "SELECT * FROM  pedido_troca, setor 
                        WHERE pedido_troca.setor_id = setor.id
                        AND setor.nome = 'Recepcao'
                        ORDER BY data_troca DESC";

                       $sql = $pdo->query($sql);
                        $sql = $sql->fetch();

                        $data2 = $sql['data_troca']; 

                    $dataInicial = date_create($data1);
                    $dataFinal   = date_create($data2);

                    $intervalo = date_diff($dataInicial, $dataFinal);
                    $dias = $intervalo->format('%a');
                    
                    $mes = $dias / 24;

                    $consumoDiaRecepcao = $totalFolhas / $dias;
                    $consumoMesRecepcao = $totalFolhas / $mes;

                 ?>
                 <hr>
                 <img class="" src="img/printer-64.png">
                 <h5 class="texto-consumo">Consumo</h5>
                 <br>
                 <h6>Dia: <span class="badge badge-info"><?php echo number_format($consumoDiaRecepcao, 0, '.','.'); ?></span></h6>
                 <h6>Mês: <span class="badge badge-info"><?php echo number_format($consumoMesRecepcao, 0, '.','.'); ?></span></h6>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card bg-light mb-3" style="max-width: 20rem;">
            <div class="card-header">Administração</div>
            <div class="card-body">
              <img class="" src="img/paper.png">
              <h4 class="card-title">Total de folhas</h4>
              <?php 
                $sql = "SELECT pedido_troca.setor_id, setor.id, setor.nome, SUM(total_folhas)AS total
                FROM pedido_troca, setor
                WHERE pedido_troca.setor_id = setor.id
                AND setor.nome = 'Administracao'";
                          
                $sql = $pdo->query($sql);

                if($sql->rowCount() > 0){
                            
                foreach($sql->fetchAll() as $total)
                {
                  $totalFolhas = $total["total"];
                  $totalFolhasFormat = number_format($totalFolhas, 0, '.','.');
                        ?>
                  <p class="etiqueta__total"># <?php echo $totalFolhasFormat; ?></p>
              <?php }?>
              <?php }else{

                    echo "<br>";
                    echo "<div class='alert alert-info' role='alert'>
                          Não foram encontrados registros....
                        </div>";
                    }?>
                    <?php
                  // calcula total de registros e total de folhas
                  $sql = "SELECT COUNT(*) as total, SUM(total_folhas) as folha
                          FROM  pedido_troca, setor 
                          WHERE pedido_troca.setor_id = setor.id
                          AND setor.nome = 'Administracao'";

                          $sql = $pdo->query($sql);
                          $sql = $sql->fetch();

                          $totalRegistro = $sql['total'];
                          $folha = $sql['folha'];

                          $registro = $totalRegistro;
                          $totalFolhas = $folha;

                  // retorna a data da primeira troca
                  $sql = "SELECT * FROM  pedido_troca, setor 
                        WHERE pedido_troca.setor_id = setor.id
                        AND setor.nome = 'Administracao'
                        ORDER BY data_troca ASC";

                        $sql = $pdo->query($sql);
                        $sql = $sql->fetch();

                        $data1 = $sql['data_troca'];

                  // retorna a data da ultima troca
                  $sql = "SELECT * FROM  pedido_troca, setor 
                        WHERE pedido_troca.setor_id = setor.id
                        AND setor.nome = 'Administracao'
                        ORDER BY data_troca DESC";

                         $sql = $pdo->query($sql);
                        $sql = $sql->fetch();

                        $data2 = $sql['data_troca']; 

                    $dataInicial = date_create($data1);
                    $dataFinal   = date_create($data2);

                    $intervalo = date_diff($dataInicial, $dataFinal);
                    $dias = $intervalo->format('%a');
                    
                    $mes = $dias / 24;

                    $consumoDiaAdmin = $totalFolhas / $dias;
                    $consumoMesAdmin = $totalFolhas / $mes;

                 ?>
                 <hr>
                 <img class="" src="img/printer-64.png">
                 <h5 class="texto-consumo">Consumo</h5>
                 <br>
                 <h6>Dia: <span class="badge badge-info"><?php echo number_format($consumoDiaAdmin, 0, '.','.'); ?></span></h6>
                 <h6>Mês: <span class="badge badge-info"><?php echo number_format($consumoMesAdmin, 0, '.','.'); ?></span></h6>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card text-white bg-danger mb-3" style="max-width: 20rem;">
            <div class="card-header">Consumo geral</div>
            <div class="card-body">
              <img class="" src="img/papel-branco.png">
              <h4 class="card-title title-branco">Total de folhas</h4>
              <?php 
                $sql = "SELECT SUM(total_folhas)AS total
                FROM pedido_troca";         
                              
                $sql = $pdo->query($sql);

                if($sql->rowCount() > 0){
                            
                foreach($sql->fetchAll() as $total)
                {
                  $totalFolhas = $total["total"];
                  $totalFolhasFormat = number_format($totalFolhas, 0, '.','.');
                           
                            ?>
                  <p class="etiqueta__total texto-branco"># <?php echo $totalFolhasFormat ?></p>
              <?php } ?>
               <?php }else{

                    echo "<br>";
                    echo "<div class='alert alert-info' role='alert'>
                          Não foram encontrados registros....
                        </div>";
                    }?>

                <hr class="linha-hr-consumo-geral">
                <?php
                  $consumoGeralDia = $consumoDiaAdmin + $consumoDiaRecepcao + $consumoDiaSalaMedico;
                  $consumoGeralMes = $consumoMesAdmin + $consumoMesRecepcao + $consumoMesSalaMedico;
                  
                 ?>
                 <img class="" src="img/printer-64-branca.png">
                 <h5 class="texto-consumo-geral">Consumo</h5>
                 <br>
                 <h6>Dia: <span class="badge badge-light"><?php echo number_format($consumoGeralDia, 0, '.','.'); ?></span></h6>
                 <h6>Mês: <span class="badge badge-light"><?php echo number_format($consumoGeralMes, 0, '.','.'); ?></span></h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-3">
          <div class="card bg-light mb-3" style="max-width: 20rem;">
            <div class="card-header">Sala medicos</div>
            <div class="card-body">
              <img class="" src="img/troca-2.png">
              <h4 class="card-title">Ultimas recargas</h4>
              <?php 
                $sql  = "SELECT pedido_troca.id, pedido_troca.setor_id, pedido_troca.data_troca,pedido_troca.total_folhas,pedido_troca.cor1, pedido_troca.cor2, pedido_troca.cor3, pedido_troca.cor4, setor.nome
                  FROM pedido_troca, setor
                  WHERE pedido_troca.setor_id = setor.id
                  AND setor.nome = 'Sala medico' 
                  ORDER BY data_troca DESC LIMIT 2";            
                              
                  $sql = $pdo->query($sql);

                  if($sql->rowCount() > 0){
                            
                  foreach($sql->fetchAll() as $lista)
                  {
                    $dataTroca = $lista["data_troca"];
                    $folhas    = $lista["total_folhas"];
                            
                    ?>
                    <p class="etiqueta__data__nova"><?php echo strftime('%A, %d de %B de %Y', strtotime($dataTroca)); ?></p>
                    <p class="etiqueta__total"># <?php echo number_format($folhas, 0, '.','.'); ?></p>
                    <hr class="etiqueta__hr">
                  <?php } ?>
                  <?php }else{

                    echo "<br>";
                    echo "<div class='alert alert-info' role='alert'>
                          Não foram encontrados registros....
                        </div>";
                    }?>
                     <img class="" src="img/calendar-64-2.png">
                     <h6 class="texto-media">Intervalo</h6>
                    <?php 
                  $sql  = "SELECT resumo.id, 
                                  resumo.setor_id,
                                  resumo.data_inicial, 
                                  resumo.data_final, 
                                  setor.nome,
                                  setor.id
                          FROM resumo, setor
                          WHERE resumo.setor_id = setor.id
                          AND setor.nome = 'Sala médico'
                          ORDER BY data_final DESC LIMIT 2";
                              
                          $sql = $pdo->query($sql);

                           if($sql->rowCount() > 0){
                            
                            foreach($sql->fetchAll() as $lista)
                              {
                                $data1 = $lista["data_inicial"];
                                $data2 = $lista["data_final"];

                                $dataInicial = date_create($data1);
                                $dataFinal   = date_create($data2);

                                $intervalo = date_diff($dataInicial, $dataFinal);
                              ?>
                            <br>
                     
              
                            <div class="alert alert-info alert-font-size" role="alert">
                                <?php
                                  $mes = $intervalo -> format('%m');
                                  $dia = $intervalo -> format('%d');

                                
                              if ($mes == '0' && $dia == '0') {
                                echo "Ta Fudido....Acabou";
                              }
                              if ($mes == '0' && $dia == '1') {
                                echo $dia. " Dia";
                              }
                              if ($mes == '0' && $dia > '1') {
                                echo $dia. " Dias";
                              }
                              if ($mes == '1' && $dia == '0') {
                                echo $mes. " Mes";
                              }
                              if ($mes == '1' && $dia == '1') {
                                echo $mes. " Mes e ". $dia. " Dia";
                              }
                              if ($mes == '1' && $dia > '1') {
                                echo $mes. " Mes e " .$dia. " Dias";
                              }

                              if ($mes > '1' && $dia == '0') {
                                echo $mes. " Meses";
                              }

                              if ($mes > '1' && $dia == '1') {
                                echo $mes. " Meses e " .$dia. " Dia";

                              }

                              if ($mes > '1' && $dia > '1') {
                                echo $mes. " Meses e " .$dia. " Dias";   
                              }
                              echo "<br>";
                              echo "<strong>De</strong> ".strftime('%d/%m/%Y', strtotime($data1));
                              echo " <strong>a</strong> ".strftime('%d/%m/%Y', strtotime($data2));
                            ?>
                            </div>

                    <?php } ?>
                    <?php }else{

                    echo "<br>";
                    echo "<div class='alert alert-info' role='alert'>
                            Não foram encontrados registros....
                        </div>";
                    }?>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card bg-light mb-3" style="max-width: 20rem;">
            <div class="card-header">Recepção</div>
            <div class="card-body">
              <img class="" src="img/troca-2.png">
              <h4 class="card-title">Ultimas recargas</h4>
              <?php 
                $sql  = "SELECT pedido_troca.id, pedido_troca.setor_id, pedido_troca.data_troca,pedido_troca.total_folhas,pedido_troca.cor1, pedido_troca.cor2, pedido_troca.cor3, pedido_troca.cor4, setor.nome
                  FROM pedido_troca, setor
                  WHERE pedido_troca.setor_id = setor.id
                  AND setor.nome = 'Recepcao' 
                  ORDER BY data_troca DESC LIMIT 2";            
                              
                  $sql = $pdo->query($sql);
                      
                    if($sql->rowCount() > 0){

                    foreach($sql->fetchAll() as $lista)
                    {
                      $dataTroca = $lista["data_troca"];
                      $folhas    = $lista["total_folhas"];
                            
                      ?>
                    <p class="etiqueta__data__nova"><?php echo strftime('%A, %d de %B de %Y', strtotime($dataTroca)); ?></p>
                     <p class="etiqueta__total"># <?php echo number_format($folhas, 0, '.','.'); ?></p>
                     <hr class="etiqueta__hr">
              <?php } ?>
              <?php }else{

                    echo "<br>";
                    echo "<div class='alert alert-info' role='alert'>
                          Não foram encontrados registros....
                        </div>";
                    }?>
                     <img class="" src="img/calendar-64-2.png">
                     <h6 class="texto-media">Intervalo</h6>
                    <?php 
                  $sql  = "SELECT resumo.id, 
                                  resumo.setor_id,
                                  resumo.data_inicial, 
                                  resumo.data_final, 
                                  setor.nome,
                                  setor.id
                          FROM resumo, setor
                          WHERE resumo.setor_id = setor.id
                          AND setor.nome = 'Recepção'
                          ORDER BY data_final DESC LIMIT 2";
                              
                          $sql = $pdo->query($sql);

                           if($sql->rowCount() > 0){
                            
                            foreach($sql->fetchAll() as $lista)
                              {
                                $data1 = $lista["data_inicial"];
                                $data2 = $lista["data_final"];

                                $dataInicial = date_create($data1);
                                $dataFinal   = date_create($data2);

                                $intervalo = date_diff($dataInicial, $dataFinal);
                              ?>
                            <br>
                     
              
                            <div class="alert alert-info alert-font-size" role="alert">
                                <?php
                                  $mes = $intervalo -> format('%m');
                                  $dia = $intervalo -> format('%d');

                                
                              if ($mes == '0' && $dia == '0') {
                                echo "Ta Fudido....Acabou";
                              }
                              if ($mes == '0' && $dia == '1') {
                                echo $dia. " Dia";
                              }
                              if ($mes == '0' && $dia > '1') {
                                echo $dia. " Dias";
                              }
                              if ($mes == '1' && $dia == '0') {
                                echo $mes. " Mes";
                              }
                              if ($mes == '1' && $dia == '1') {
                                echo $mes. " Mes e ". $dia. " Dia";
                              }
                              if ($mes == '1' && $dia > '1') {
                                echo $mes. " Mes e " .$dia. " Dias";
                              }

                              if ($mes > '1' && $dia == '0') {
                                echo $mes. " Meses";
                              }

                              if ($mes > '1' && $dia == '1') {
                                echo $mes. " Meses e " .$dia. " Dia";

                              }

                              if ($mes > '1' && $dia > '1') {
                                echo $mes. " Meses e " .$dia. " Dias";   
                              }
                              echo "<br>";
                              echo "<strong>De</strong> ".strftime('%d/%m/%Y', strtotime($data1));
                              echo " <strong>a</strong> ".strftime('%d/%m/%Y', strtotime($data2));
                            ?>
                            </div>

                     <?php } ?>
                     <?php }else{

                    echo "<br>";
                    echo "<div class='alert alert-info' role='alert'>
                          Não foram encontrados registros....
                        </div>";
                    }?>
            </div>
          </div>
        </div>
          <div class="col-3">
          <div class="card bg-light mb-3" style="max-width: 20rem;">
            <div class="card-header">Administrção</div>
            <div class="card-body">
              <img class="" src="img/troca-2.png">
              <h4 class="card-title">Ultimas recargas</h4>
              <?php 
                $sql  = "SELECT pedido_troca.id, 
                                pedido_troca.setor_id, 
                                pedido_troca.data_troca,
                                pedido_troca.total_folhas,
                                pedido_troca.cor1, 
                                pedido_troca.cor2, 
                                pedido_troca.cor3, 
                                pedido_troca.cor4, 
                                setor.nome
                        FROM pedido_troca, setor
                        WHERE pedido_troca.setor_id = setor.id
                        AND setor.nome = 'Administração' 
                        ORDER BY data_troca DESC LIMIT 2";            
                        
                         $sql = $pdo->query($sql);
                       
                       if($sql->rowCount() > 0){

                        foreach($sql->fetchAll() as $lista)
                        {
                          $dataTroca = $lista["data_troca"];
                          $folhas    = $lista["total_folhas"];
                                
                          ?>
                    <p class="etiqueta__data__nova"><?php echo strftime('%A, %d de %B de %Y', strtotime($dataTroca)); ?></p>
                     <p class="etiqueta__total"># <?php echo number_format($folhas, 0, '.','.'); ?></p>
                     <hr class="etiqueta__hr">
              <?php } ?>          
               <?php }else{

                    echo "<br>";
                    echo "<div class='alert alert-info' role='alert'>
                          Não foram encontrados registros....
                        </div>";
                    }?>
                     <img class="" src="img/calendar-64-2.png">
                     <h6 class="texto-media">Intervalo</h6>
                    <?php 
                      $sql  = "SELECT resumo.id, 
                                  resumo.setor_id,
                                  resumo.data_inicial, 
                                  resumo.data_final, 
                                  setor.nome,
                                  setor.id
                          FROM resumo, setor
                          WHERE resumo.setor_id = setor.id
                          AND setor.nome = 'Administração'
                          ORDER BY data_final DESC LIMIT 2";
                              
                              
                          $sql = $pdo->query($sql);
                            
                          foreach($sql->fetchAll() as $lista)
                            {
                              $data1 = $lista["data_inicial"];
                              $data2 = $lista["data_final"];

                              $dataInicial = date_create($data1);
                              $dataFinal   = date_create($data2);

                              $intervalo = date_diff($dataInicial, $dataFinal);
                            ?>
                            <br>
                  
                            <div class="alert alert-info alert-font-size" role="alert">
                                <?php
                                  $mes = $intervalo -> format('%m');
                                  $dia = $intervalo -> format('%d');

                                
                              if ($mes == '0' && $dia == '0') {
                                echo "Ta Fudido....Acabou";
                              }
                              if ($mes == '0' && $dia == '1') {
                                echo $dia. " Dia";
                              }
                              if ($mes == '0' && $dia > '1') {
                                echo $dia. " Dias";
                              }
                              if ($mes == '1' && $dia == '0') {
                                echo $mes. " Mes";
                              }
                              if ($mes == '1' && $dia == '1') {
                                echo $mes. " Mes e ". $dia. " Dia";
                              }
                              if ($mes == '1' && $dia > '1') {
                                echo $mes. " Mes e " .$dia. " Dias";
                              }

                              if ($mes > '1' && $dia == '0') {
                                echo $mes. " Meses";
                              }

                              if ($mes > '1' && $dia == '1') {
                                echo $mes. " Meses e " .$dia. " Dia";

                              }

                              if ($mes > '1' && $dia > '1') {
                                echo $mes. " Meses e " .$dia. " Dias";   
                              }
                              echo '<br>';
                              echo "<strong>De</strong> ".strftime('%d/%m/%Y', strtotime($data1));
                              echo "<strong>a</strong> ".strftime('%d/%m/%Y', strtotime($data2));
                            ?>
                            </div>

                     <?php } ?>

            </div>
          </div>
        </div>

        <!-- retorna o dia da proxima troca -->
        <div class="col-3">
          <div class="card bg-info mb-3" style="max-width: 20rem;">
            <div class="card-header text-white">Proximas recargas</div>
            <div class="card-body">
              <img class="" src="img/calendar-48-2-branco.png">
                  <?php

                  $sql = "SELECT COUNT(*) AS total  FROM  pedido_troca, setor 
                        WHERE pedido_troca.setor_id = setor.id
                        AND setor.nome = 'Sala médico'";


                  $sql = $pdo->query($sql);
                  $sql = $sql->fetch();

                       $totalRegistro = $sql['total'];
                        
                       $registro = $totalRegistro;

                  // retorna a data da primeira troca
                  $sql = "SELECT * FROM  pedido_troca, setor 
                        WHERE pedido_troca.setor_id = setor.id
                        AND setor.nome = 'Sala médico'
                        ORDER BY data_troca ASC";

                        $sql = $pdo->query($sql);
                        $sql = $sql->fetch();

                        $data1 = $sql['data_troca'];

                  // retorna a data da ultima troca
                  $sql = "SELECT * FROM  pedido_troca, setor 
                        WHERE pedido_troca.setor_id = setor.id
                        AND setor.nome = 'Sala médico'
                        ORDER BY data_troca DESC";

                        $sql = $pdo->query($sql);
                        $sql = $sql->fetch();

                        $data2 = $sql['data_troca']; 

                    $dataInicial = date_create($data1);
                    $dataFinal   = date_create($data2);

                    $intervalo = date_diff($dataInicial, $dataFinal);
                    $dias  = $intervalo->format('%a');
                    $media = $dias / 24;
                    $mediaTroca = $media / $registro;

                    $mediaRecarga = number_format($mediaTroca, 0, '.','.');
                    $proximaTroca = date('d/m/Y', strtotime( " + $mediaRecarga month", strtotime($data2)));

                  ?>
                  <br>
                  <?php



                     if ($proximaTroca == $dataAtual) 
                    {
                      echo "<div class='alert alert-danger alert-font-size' role='alert'><h6>Sala médico</h6>".
                              "Média de troca: "."<strong>".$mediaRecarga." Meses</strong>".
                              "<br>".
                              "Proxima troca: "."<strong>".date('d/m/Y', strtotime("+ $mediaRecarga month", strtotime($data2)))."</strong>".
                              "</div>" ;
                     }  
                   if ($proximaTroca > $dataAtual) 
                    {
                      echo "<div class='alert alert-warning alert-font-size' role='alert'><h6>Sala médico</h6>".
                              "Média de troca: "."<strong>".$mediaRecarga." Meses</strong>".
                              "<br>".
                              "Proxima troca: "."<strong>".date('d/m/Y', strtotime("+ $mediaRecarga month", strtotime($data2)))."</strong>".
                          "</div>" ;
                    }
                    else
                      {
                        echo "<div class='alert alert-light alert-font-size' role='alert'><h6>Sala médico</h6>".
                              "Média de troca: "."<strong>".$mediaRecarga." Meses</strong>".
                              "<br>".
                              "Proxima troca: "."<strong>".date('d/m/Y', strtotime("+ $mediaRecarga month", strtotime($data2)))."</strong>".
                          "</div>" ;
                      }
                 
                   ?>
                  <?php

                  $sql = "SELECT COUNT(*) AS total  FROM  pedido_troca, setor 
                        WHERE pedido_troca.setor_id = setor.id
                        AND setor.nome = 'Recepção'";


                  $sql = $pdo->query($sql);
                  $sql = $sql->fetch();

                       $totalRegistro = $sql['total'];
                        
                       $registro = $totalRegistro;

                  // retorna a data da primeira troca
                  $sql = "SELECT * FROM  pedido_troca, setor 
                        WHERE pedido_troca.setor_id = setor.id
                        AND setor.nome = 'Recepção'
                        ORDER BY data_troca ASC";

                        $sql = $pdo->query($sql);
                        $sql = $sql->fetch();

                        $data1 = $sql['data_troca'];

                  // retorna a data da ultima troca
                  $sql = "SELECT * FROM  pedido_troca, setor 
                        WHERE pedido_troca.setor_id = setor.id
                        AND setor.nome = 'Recepção'
                        ORDER BY data_troca DESC";

                        $sql = $pdo->query($sql);
                        $sql = $sql->fetch();

                        $data2 = $sql['data_troca']; 

                    $dataInicial = date_create($data1);
                    $dataFinal   = date_create($data2);

                    $intervalo = date_diff($dataInicial, $dataFinal);
                    $dias = $intervalo->format('%a');
                    $media = $dias / 24;
                    $mediaTroca = $media / $registro;

                    $mediaRecarga = number_format($mediaTroca, 0, '.','.');

                   

                  ?>
                  <div class="alert alert-light alert-font-size" role="alert">
                      <h6>Recepção</h6>
                        <?php echo 'Média de troca: '."<strong>".$mediaRecarga." Meses</strong>"; ?>
                        <br>
                       <?php echo 'Proxima troca: '."<strong>".date('d/m/Y', strtotime( " + $mediaRecarga month", strtotime($data2)))."</strong>"; ?>
                  </div>

                  <?php

                  $sql = "SELECT COUNT(*) AS total  FROM  pedido_troca, setor 
                        WHERE pedido_troca.setor_id = setor.id
                        AND setor.nome = 'Administração'";


                  $sql = $pdo->query($sql);
                  $sql = $sql->fetch();

                       $totalRegistro = $sql['total'];
                        
                          $registro = $totalRegistro;

                  // retorna a data da primeira troca
                  $sql = "SELECT * FROM  pedido_troca, setor 
                        WHERE pedido_troca.setor_id = setor.id
                        AND setor.nome = 'Administração'
                        ORDER BY data_troca ASC";

                        $sql = $pdo->query($sql);
                        $sql = $sql->fetch();

                        $data1 = $sql['data_troca'];

                  // retorna a data da ultima troca
                  $sql = "SELECT * FROM  pedido_troca, setor 
                        WHERE pedido_troca.setor_id = setor.id
                        AND setor.nome = 'Administração'
                        ORDER BY data_troca DESC";

                        $sql = $pdo->query($sql);
                        $sql = $sql->fetch();

                        $data2 = $sql['data_troca']; 

                    $dataInicial = date_create($data1);
                    $dataFinal   = date_create($data2);

                    $intervalo = date_diff($dataInicial, $dataFinal);
                    $dias = $intervalo->format('%a');
                    $media = $dias / 24;
                    $mediaTroca = $media / $registro;

                    $mediaRecarga = number_format($mediaTroca, 0, '.','.');

                  ?>
                  <div class="alert alert-light alert-font-size" role="alert">
                      <h6>Administração</h6>
                      <?php echo 'Média de troca: '."<strong>".$mediaRecarga." Meses</strong>"; ?>
                        <br>
                       <?php echo 'Proxima troca: '."<strong>".date('d/m/Y', strtotime( " + $mediaRecarga month", strtotime($data2)))."</strong>"; ?>
                  </div>

            </div>
          </div>

      </div>

    </div>
    </div>
    <div class="conatainer">
      
    </div>
    <br>
    <br>
    <?php include_once "rodape.php"; ?>
   
    <!-- LISTAR TABELA 
    <hr>
    <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <?php
                $sql = "SELECT COUNT(*) as total 
                        FROM  pedido_troca, setor 
                        WHERE pedido_troca.setor_id = setor.id
                        AND setor.nome = 'Administração'";

                $sql = $pdo->query($sql);
                $sql = $sql->fetch();
                $totalRegistro = $sql['total'];
                $registro = $totalRegistro;
            ?>
            <?php

              $sql  = "SELECT pedido_troca.id, 
                              pedido_troca.setor_id, 
                              pedido_troca.data_troca,
                              pedido_troca.total_folhas,
                              pedido_troca.cor1, 
                              pedido_troca.cor2, 
                              pedido_troca.cor3, 
                              pedido_troca.cor4, 
                              setor.nome
                    FROM pedido_troca, setor
                    WHERE pedido_troca.setor_id = setor.id
                    AND setor.nome = 'Administração' 
                    ORDER BY data_troca DESC LIMIT 6";

             $sql = $pdo->query($sql);

            ?>
            <table class="table table-hover table-sm">
              <h5>Adiministração <span class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top" title="Total de recargas"><?php echo $registro; ?></span></h5> 
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
                  foreach ($sql->fetchAll() as $lista) 
                  {
                    $id   = $lista["id"];
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
                  <td><a class="material-icons vivid-blue" data-toggle="tooltip" data-placement="top" title="Editar" href="funcoes/editarTroca.php?id=<?php echo $id?>">create</a></td>
                  <td><a class="material-icons vivid-red" data-toggle="modal" data-target="#editarTroca" href="/?funcao=editar&id=<?php echo $id?>">delete</a></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <div class="col-sm-6">
            <?php
                $sql = "SELECT COUNT(*) as total, SUM(total_folhas) as folhas
                        FROM  pedido_troca, setor 
                        WHERE pedido_troca.setor_id = setor.id
                        AND setor.nome = 'Recepção'";

                $sql = $pdo->query($sql);
                $sql = $sql->fetch();
                $totalRegistro = $sql['total'];
                $registro = $totalRegistro;
                $folha = $sql['folhas'];
            ?>
            <?php

              $sql  = "SELECT pedido_troca.id, 
                              pedido_troca.setor_id, 
                              pedido_troca.data_troca,
                              pedido_troca.total_folhas,
                              pedido_troca.cor1, 
                              pedido_troca.cor2, 
                              pedido_troca.cor3, 
                              pedido_troca.cor4, 
                              setor.nome
                    FROM pedido_troca, setor
                    WHERE pedido_troca.setor_id = setor.id
                    AND setor.nome = 'Recepção' 
                    ORDER BY data_troca DESC LIMIT 6";

             $sql = $pdo->query($sql);

            ?>
            <table class="table table-hover table-sm">
              <h5>Recepção <span class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top" title="Total de recargas"><?php echo $registro; ?></span></h5> 
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
                  foreach ($sql->fetchAll() as $lista) 
                  {
                    $id   = $lista["id"];
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
                  <td class="material-icons vivid-blue" data-toggle="tooltip" data-placement="top" title="Editar">create</td>
                  <td class="material-icons vivid-red" data-toggle="tooltip" data-placement="top" title="Deletar">delete</td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-6">
            <?php
                $sql = "SELECT COUNT(*) as total 
                        FROM  pedido_troca, setor 
                        WHERE pedido_troca.setor_id = setor.id
                        AND setor.nome = 'Sala médico'";

                $sql = $pdo->query($sql);
                $sql = $sql->fetch();
                $totalRegistro = $sql['total'];
                $registro = $totalRegistro;
            ?>
            <?php

              $sql  = "SELECT pedido_troca.id, 
                              pedido_troca.setor_id, 
                              pedido_troca.data_troca,
                              pedido_troca.total_folhas,
                              pedido_troca.cor1, 
                              pedido_troca.cor2, 
                              pedido_troca.cor3, 
                              pedido_troca.cor4, 
                              setor.nome
                    FROM pedido_troca, setor
                    WHERE pedido_troca.setor_id = setor.id
                    AND setor.nome = 'Sala médico' 
                    ORDER BY data_troca DESC LIMIT 6";

             $sql = $pdo->query($sql);

            ?>
            <table class="table table-hover table-sm">
              <h5>Sala médico <span class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top" title="Total de recargas"><?php echo $registro; ?></span></h5> 
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
                  foreach ($sql->fetchAll() as $lista) 
                  {
                    $id   = $lista["id"];
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
                  <td><a class="material-icons vivid-blue" data-toggle="tooltip" data-placement="top" title="Editar" href="funcoes/editarTroca.php?id=<?php echo $id?>">create</a></td>
                  <td><a class="material-icons vivid-red" data-toggle="modal" data-target="#editarTroca" href="/?funcao=editar&id=<?php echo $id?>">delete</a></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
    </div>
    -->

  
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
    <script>
    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }

    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        // add a zero in front of numbers<10
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('time').innerHTML = h + ":" + m + ":" + s;
        t = setTimeout(function () {
            startTime()
        }, 500);
    }
    startTime();
    </script>

    <script src="js/vcountdown.js"></script>
    <script src="js/maskMoney.js"></script>
    
    <script type="text/javascript">
          VCountdown.init({
              target: '.countdown',
              maxChars: 255
          });

          VCountdown.init({
              target: '.countdown2'
          });
      </script>
      
      <script type="text/javascript">
      $(function(){
       $("#demo4").maskMoney({symbol:'', 
      showSymbol:true, thousands:'.', decimal:',', symbolStay: true});
       })
    </script>

  </body>
</html>