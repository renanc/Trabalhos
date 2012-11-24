<?php

	// Este página programa é o clássico Jogo da Velha Multiplayer
	//Autor: Renan Casaca e Gabriel Poletto
	include 'lib.php';
	
	$arquivo = fopen("BD.txt","r+");
	if($arquivo == NULL)
		printf("ERRO");
	while (!feof ($arquivo)) {	
    	fscanf($arquivo, "%s", $jogada11);
    	fscanf($arquivo, "%s", $jogada12);
    	fscanf($arquivo, "%s", $jogada13);
    	fscanf($arquivo, "%s", $jogada21);
    	fscanf($arquivo, "%s", $jogada22);
    	fscanf($arquivo, "%s", $jogada23);
    	fscanf($arquivo, "%s", $jogada31);
    	fscanf($arquivo, "%s", $jogada32);
    	fscanf($arquivo, "%s", $jogada33);
    	fscanf($arquivo, "%s", $vez);
	}
	fclose($arquivo);
	
	// BLOCO JOGADA
	$pos11 = "";
	$pos12 = "";
	$pos13 = "";
	$pos21 = "";
	$pos22 = "";
	$pos23 = "";
	$pos31 = "";
	$pos32 = "";
	$pos33 = "";
	if($vez==1){
		if($jogada11 == "b.png")
			$pos11 = "http://localhost/index.php?pos=11";
		if($jogada12 == "b.png")
			$pos12 = "http://localhost/index.php?pos=12";
		if($jogada13 == "b.png")
			$pos13 = "http://localhost/index.php?pos=13";
		if($jogada21 == "b.png")
			$pos21 = "http://localhost/index.php?pos=21";
		if($jogada22 == "b.png")
			$pos22 = "http://localhost/index.php?pos=22";
		if($jogada23 == "b.png")
			$pos23 = "http://localhost/index.php?pos=23";
		if($jogada31 == "b.png")
			$pos31 = "http://localhost/index.php?pos=31";
		if($jogada32 == "b.png")
			$pos32 = "http://localhost/index.php?pos=32";
		if($jogada33 == "b.png")
			$pos33 = "http://localhost/index.php?pos=33";	
	}

	if($vez==1){
		echo 'Your Turn';
	} else {
		echo 'Player 2 Turn'; 
	}
		
	if(isset($_GET['pos'])){
		$pos = $_GET['pos'];
		if($vez==1){
			$trocou_imagem = trocaImagem($pos);
    		if($trocou_imagem == 1){
    			$arquivo = fopen("BD.txt","r+");
				if($arquivo==NULL)
					printf("ERRO");
				for($i=0;$i<9;$i++)
    				fgets($arquivo);
   				fprintf($arquivo, "%d", 2);
				fclose($arquivo);
				$pos11 = "";
				$pos12 = "";
				$pos13 = "";
				$pos21 = "";
				$pos22 = "";
				$pos23 = "";
				$pos31 = "";
				$pos32 = "";
				$pos33 = "";
    		}
		}
	}	

	// LÓGICA DO JOGO
	// Possibilidade 1
	if($jogada11=="x.png" && $jogada21=="x.png" && $jogada31=="x.png"){
		echo '<div class="win"> YOU WIN!! </div>';
		verificaFim();
	}
	elseif($jogada11=="o.png" && $jogada21=="o.png" && $jogada31=="o.png"){
		echo '<div class="lose"> YOU LOSE!! </div>';
		verificaFim();
	}
	// Possibilidade 2
	elseif($jogada12=="x.png" && $jogada22=="x.png" && $jogada32=="x.png"){
		echo '<div class="win"> YOU WIN!! </div>';
		verificaFim();
	}
	elseif($jogada12=="o.png" && $jogada22=="o.png" && $jogada32=="o.png"){
		echo '<div class="lose"> YOU LOSE!! </div>';
		verificaFim();
	}
	// Possibilidade 3
	elseif($jogada13=="x.png" && $jogada23=="x.png" && $jogada33=="x.png"){
		echo '<div class="win"> YOU WIN!! </div>';
		verificaFim();
	}
	elseif($jogada13=="o.png" && $jogada23=="o.png" && $jogada33=="o.png"){
		echo '<div class="lose"> YOU LOSE!! </div>';
		verificaFim();
	}
	// Possibilidade 4
	elseif($jogada11=="x.png" && $jogada12=="x.png" && $jogada13=="x.png"){
		echo '<div class="win"> YOU WIN!! </div>';
		verificaFim();
	}
	elseif($jogada11=="o.png" && $jogada12=="o.png" && $jogada13=="o.png"){
		echo '<div class="lose"> YOU LOSE!! </div>';
		verificaFim();
	}
	// Possibilidade 5
	elseif($jogada21=="x.png" && $jogada22=="x.png" && $jogada23=="x.png"){
		echo '<div class="win"> YOU WIN!! </div>';
		verificaFim();
	}
	elseif($jogada21=="o.png" && $jogada22=="o.png" && $jogada23=="o.png"){
		echo '<div class="lose"> YOU LOSE!! </div>';
		verificaFim();
	}
	// Possibilidade 6
	elseif($jogada31=="x.png" && $jogada32=="x.png" && $jogada33=="x.png"){
		echo '<div class="win"> YOU WIN!! </div>';
		verificaFim();
	}
	elseif($jogada31=="o.png" && $jogada32=="o.png" && $jogada33=="o.png"){
		echo '<div class="lose"> YOU LOSE!! </div>';
		verificaFim();
	}
	// Possibilidade 7
	elseif($jogada11=="x.png" && $jogada22=="x.png" && $jogada33=="x.png"){
		echo '<div class="win"> YOU WIN!! </div>';
		verificaFim();
	}
	elseif($jogada11=="o.png" && $jogada22=="o.png" && $jogada33=="o.png"){
		echo '<div class="lose"> YOU LOSE!! </div>';
		verificaFim();
	}
	// Possibilidade 8
	elseif($jogada13=="x.png" && $jogada22=="x.png" && $jogada31=="x.png"){
		echo '<div class="win"> YOU WIN!! </div>';
		verificaFim();
	}
	elseif($jogada13=="o.png" && $jogada22=="o.png" && $jogada31=="o.png"){
		echo '<div class="lose"> YOU LOSE!! </div>';
		verificaFim();
	}
	elseif($jogada11!="b.png" && $jogada12!="b.png" && $jogada13!="b.png" && $jogada21!="b.png" && $jogada22!="b.png" && $jogada23!="b.png" && $jogada31!="b.png" && $jogada32!="b.png" && $jogada33!="b.png"){
		echo '<div class="draw"> YOU LOSE!! </div>';
		verificaFim();
	}
		
	// Função para fazer a troca da imagem
	function trocaImagem($posicao){
		$arquivo = fopen("BD.txt","r+");
		while (!feof ($arquivo)) {	
    		fscanf($arquivo, "%s", $jogada11);
    		fscanf($arquivo, "%s", $jogada12);
    		fscanf($arquivo, "%s", $jogada13);
    		fscanf($arquivo, "%s", $jogada21);
    		fscanf($arquivo, "%s", $jogada22);
    		fscanf($arquivo, "%s", $jogada23);
    		fscanf($arquivo, "%s", $jogada31);
    		fscanf($arquivo, "%s", $jogada32);
    		fscanf($arquivo, "%s", $jogada33);
    		fscanf($arquivo, "%s", $vez);
		}
		rewind($arquivo);
		if($posicao=="11" && $jogada11 == "b.png"){
    		fprintf($arquivo, "%s", "x.png");
    		return 1;
		}
    	if($posicao=="12" && $jogada12 == "b.png"){
   			//$lugar = fseek($arquivo, 5);
   			//printf("Retorno do fseek: %d", $lugar);
			fgets($arquivo);    			
	  		fprintf($arquivo, "%s", "x.png");
	  		return 1;
    	}
    	if($posicao=="13" && $jogada13 == "b.png"){
    		fgets($arquivo);
   			fgets($arquivo);
   			fprintf($arquivo, "%s", "x.png");
   			return 1;
   		}	
   		if($posicao=="21" && $jogada21 == "b.png"){
   			for($i=0;$i<3;$i++)
    			fgets($arquivo);
   			fprintf($arquivo, "%s", "x.png");
   			return 1;
   		}
		if($posicao=="22" && $jogada22 == "b.png"){
    		for($i=0;$i<4;$i++)
   				fgets($arquivo);
   			fprintf($arquivo, "%s", "x.png");
   			return 1;
   		}
		if($posicao=="23" && $jogada23 == "b.png"){
    		for($i=0;$i<5;$i++)
    			fgets($arquivo);
   			fprintf($arquivo, "%s", "x.png");
   			return 1;
    	}
		if($posicao=="31" && $jogada31 == "b.png"){
   			for($i=0;$i<6;$i++)
   				fgets($arquivo);
   			fprintf($arquivo, "%s", "x.png");
   			return 1;
   		}
		if($posicao=="32" && $jogada32 == "b.png"){
    		for($i=0;$i<7;$i++)
    			fgets($arquivo);
    		fprintf($arquivo, "%s", "x.png");
    		return 1;
    	}
		if($posicao=="33" && $jogada33 == "b.png"){
    		for($i=0;$i<8;$i++)
    			fgets($arquivo);
    		fprintf($arquivo, "%s", "x.png");
    		return 1;
    	}
		fclose($arquivo);
	}
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
	<html>
	<head>
		<link rel="stylesheet" type="text/css" href="http://localhost/layout.css">
		<meta http-equiv="refresh" content="1">
		<title>Tic Tac Toe</title>
	</head>
		<body>
		<form action="jogador1.php" method="get">
			<div id="link"><b>Link Player 2: <a href="http://localhost/jogador2.php">http://localhost/jogador2.php"</a></b></div>
			<b id="titulo">Tic Tac Toe - Multiplayer</b>
			<div>
			<table>	
			<tr>
			<td><a href="<?php echo $pos11 ?>"><img alt="Imagem" src="<?php echo $jogada11 ?>"></a></td>
			<td><a href="<?php echo $pos12 ?>"><img alt="Imagem" src="<?php echo $jogada12 ?>"></a></td>
			<td><a href="<?php echo $pos13 ?>"><img alt="Imagem" src="<?php echo $jogada13 ?>"></a></td>
			</tr>
			<tr>
			<td><a href="<?php echo $pos21 ?>"><img alt="Imagem" src="<?php echo $jogada21 ?>"></a></td>
			<td><a href="<?php echo $pos22 ?>"><img alt="Imagem" src="<?php echo $jogada22 ?>"></a></td>
			<td><a href="<?php echo $pos23 ?>"><img alt="Imagem" src="<?php echo $jogada23 ?>"></a></td>
			</tr>
			<tr>
			<td><a href="<?php echo $pos31 ?>"><img alt="Imagem" src="<?php echo $jogada31 ?>"></a></td>
			<td><a href="<?php echo $pos32 ?>"><img alt="Imagem" src="<?php echo $jogada32 ?>"></a></td>
			<td><a href="<?php echo $pos33 ?>"><img alt="Imagem" src="<?php echo $jogada33 ?>"></a></td>
			</tr>
			</table>
			</div>
		</form>
	</body>
</html>
