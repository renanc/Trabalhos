<?php
	// Função para imprimir cabeçalho da página
	function imprimeHeader(){
		echo '<html>';
		echo '<head>';
		echo '<link rel="stylesheet" type="text/css" href="http://localhost/layout.css"/>';
		// http-equiv faz refresh automatico da página
		// echo '<meta http-equiv="refresh" content="1">';
		echo '<title>Tic Tac Toe</title>';
		echo '<body>';
	}
	
	// Função para imprimir rodapé da página
	function imprimeRodape(){
		echo '</body>';
		echo '</html>';
	}
	
	function novoJogo(){
		$arquivo = fopen("BD.txt","r+");
		for($i=0;$i<8;$i++){
    		fprintf($arquivo, "b.png");
    		fgets($arquivo);
		}
		fgets($arquivo);
		fprintf($arquivo, 1);
    	echo 'CHAMOU NOVO JOGO';
		fclose($arquivo);
	}
	function verificaFim(){
		echo '<a href="index.php?novo=1">NOVO JOGO</a>';
		if(isset($_GET['novo']))
			$novo = $_GET['novo'];
		if(isset($novo)){
			$novo = $_GET['novo'];
			novoJogo();	
		}
	}
?>