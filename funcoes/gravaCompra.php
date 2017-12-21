<?php

$dsn = "mysql:dbname=erp;host=localhost";
$dbuser = "root";
$dbpass = "";


	$id         = $_POST['fornecedor'];
	$data       = $_POST['data'];
	$fornecedor = $_POST['fornecedor'];
	$marca      = $_POST['marca'];
	$modelo     = $_POST['modelo'];
	$descricao   = $_POST['descricao'];
	$valor      = $_POST['valor'];
	$qtd        = $_POST['qtd'];

	$valor1 = str_replace("," ,".",str_replace(".","",$valor));
	
	
	try{
		$pdo = new PDO($dsn, $dbuser, $dbpass);
		
		$sql = "INSERT INTO compra SET fornecedor_id = '$id', 
										     marca 	= '$marca', 
		                                     modelo = '$modelo',
											 descricao = '$descricao', 
		                                     data  = '$data',
		                                     qtd   = '$qtd',
		                                     valor = '$valor1'";
		$sql = $pdo->query($sql);
		
		
		echo "<div class='alert alert-info' role='alert'>
                          Gravado....
                        </div>";
        header('location:../index.php');
		
		} catch (PDOException $ex) {
			echo "Erro ao inserir registro".$ex->getMessage();
		}	
	
