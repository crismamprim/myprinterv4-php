<?php

$dsn = "mysql:dbname=erp;host=localhost";
$dbuser = "root";
$dbpass = "";


	$id           = $_POST['setor'];
	$data_inicial = $_POST['datainicial'];
	$data_final   = $_POST['datafinal'];
	
	
	try{
		$pdo = new PDO($dsn, $dbuser, $dbpass);
		
		$sql = "INSERT INTO resumo SET setor_id = '$id', 
										     data_inicial = '$data_inicial', 
		                                     data_final   = '$data_final'";

		$sql = $pdo->query($sql);
		
		header('location:../index.php');
		
		} catch (PDOException $ex) {
			echo "Erro ao inserir registro".$ex->getMessage();
		}	
	
