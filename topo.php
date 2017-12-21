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
          <a class="dropdown-item" data-toggle="modal" data-target="#cadastarTroca" href="#">Cadastar troca</a>
          <a class="dropdown-item" data-toggle="modal" data-target="#cadastarCompra" href="#">Cadastar compra</a>
          <a class="dropdown-item" data-toggle="modal" data-target="#resumo" href="#">Cadastar perido de trocas</a>
           <hr>
          <a class="dropdown-item" href="consulta.php?datainicial=0000-00-00&datafinal=0000-00-00&setor=">Consultar recargas</a>
          <a class="dropdown-item" href="consultaCompra.php?datainicial=0000-00-00&datafinal=0000-00-00&fornecedor=">Consultar compra</a>
        </div>
      </div>
</nav>
      <div class="hora-data-sistema">
        <span class="badge badge-light data" >
          <?php $diaAtual = date('Y/m/d');
                $horaAtual = date('H \h\ i \m'); 
                $dataAtual = date('d/m/Y');
            echo strftime('%A, %d de %B de %Y', strtotime($diaAtual));
          
          ?>
        </span>        
      <span class="badge badge-light hora" id="time" ></span>
      </div>