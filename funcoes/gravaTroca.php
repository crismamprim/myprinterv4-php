<?php

$dsn = "mysql:dbname=erp;host=localhost";
$dbuser = "root";
$dbpass = "";


	$id           = $_POST['setor'];
	$dataTroca    = $_POST['data'];
	$cor1         = $_POST['cor1'];
	$cor2         = $_POST['cor2'];
	$cor3         = $_POST['cor3'];
	$cor4         = $_POST['cor4'];
	$numeroFolhas = $_POST['folhas'];
	
	try{
		$pdo = new PDO($dsn, $dbuser, $dbpass);
		
		$sql = "INSERT INTO pedido_troca SET setor_id   = '$id', 
										     data_troca = '$dataTroca', 
		                                     cor1 = '$cor1',
											 cor2 = '$cor2', 
		                                     cor3 = '$cor3',
		                                     cor4 = '$cor4',
										     total_folhas = '$numeroFolhas' ";
		$sql = $pdo->query($sql);
		
		header('location:../index.php');
		echo "Gravado";
		
		} catch (PDOException $ex) {
			echo "Erro ao inserir registro".$ex->getMessage();
		}	
	
