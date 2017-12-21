<!DOCTYPE html>
<html lang="pt-br">

  <head>
  	<title>SGI - Sistema de gerenciamento de impressoras</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">

  	<link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/normalize.css">
  	<link rel="stylesheet" href="css/base.css">
  	<link rel="stylesheet" href="css/layout.css">
  	<link rel="stylesheet" href="css/componentes.css">
  </head>

 <body>

 	  <header class="layout-cabecalho ">
 	  	  <img class="layout-cabecalho--logo" src="img/printer.png" width="50" height="50">
 	  	  <h1 class="layout-cabecalho--titulo"><strong>SGI</strong> - Sistema de gerenciamento de impressoras</h1>
        <?php
          include './conexao/pdo.php';
        ?>
 	  </header>

 	  <nav class="navegacao">
 	  	  <div class="navegacao__menu">
  	  	 <ul class="menu">
    	  	 	<li class="menu__item"><a class="btn btn-default"><span>Home</span></a></li>
          </ul>
 	  	  </div>
 	  </nav>

    <div class="layout-tabela">
          <div class="row">
            <div class="container-a">
             <div class="col-sm-6">
                <div class="">
                <table class="tabela">
                      <thead>
                        <tr>
                          <th>Data troca</th>
                          <th>Preta</th>
                          <th>Azul</th>
                          <th>Amarela</th>
                          <th>Magenta</th>
                          <th>Folhas</th>
                          <th>EDITAR</th>
                          <th>EXCLUIR</th>
                        </tr>
                      </thead>
                      <?php 
                        $sql  = "SELECT pedido_troca.id, pedido_troca.setor_id, pedido_troca.data_troca,pedido_troca.total_folhas,pedido_troca.cor1, pedido_troca.cor2, pedido_troca.cor3, pedido_troca.cor4, setor.nome
                        FROM pedido_troca, setor
                        WHERE pedido_troca.setor_id = setor.id
                        AND setor.nome = 'Sala medico' 
                        ORDER BY data_troca desc";
                              
                        $sql = $pdo->query($sql);
                            
                          foreach($sql->fetchAll() as $lista)
                          {
                            $id        = $lista["id"];
                            $setor     = $lista["nome"];
                            $dataTroca = $lista["data_troca"];
                            $cor1      = $lista["cor1"];
                            $cor2      = $lista["cor2"];
                            $cor3      = $lista["cor3"];
                            $cor4      = $lista["cor4"];
                            $folhas    = $lista["total_folhas"];
                          ?>
                      <tbody>
                        <tr>
                          <td><?php  echo date('d/m/Y',  strtotime($dataTroca));?></td>
                          <td><?php echo $cor1; ?></td>
                          <td><?php echo $cor2; ?></td>
                          <td><?php echo $cor3; ?></td>
                          <td><?php echo $cor4; ?></td>
                          <td><?php echo number_format($folhas, 0, '.','.'); ?></td>
                          <td><a href="funcoes/editar.php?id=<?php echo $id ?>"><img class="tabela__img" src="img/editar.png"></a></td>
                          <td><img class="tabela__img" src="img/deletar.png"></td>
                        </tr>
                         <?php } ?>
                      </tbody>
                    </table>
                </div>
             </div>
            </div>
          </div>
        </div>

        <HR>
        <?php
          // calcula o valor total
       
                  
                      $sql = "SELECT compra.id, 
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
                       
               
               
                
                              foreach ($sql->fetchAll() as $lista) {
                                 
                                $id2  = $lista["id"];
                                $data = $lista["data"];
                                $fornecedor = $lista["nome"];
                                $marca = $lista["marca"];
                                $modelo = $lista["modelo"];
                                $descricao = $lista["descricao"];
                                $valor = $lista["valor"];
                              //  $total = $lista["total"];
                              //  $registros = $lista["registros"];

                              //  $valorTotal = $total;

                               $total = array($valor);
                               $a = array_sum($total);

                              
                           
                        } echo "valor: ".$a;



                              
                              ?>
                        




  </body>
</html>