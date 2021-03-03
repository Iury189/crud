<?php
	// Arquivo crudaluno.php
	require_once "../dao/crudaluno.php";
	// variavel cd_aluno
	$cd_aluno = $_GET["cd_aluno"]; // Importante ser $_GET para a requisicao funcionar
	// Se a selecao for possivel de realizar
	try {
		// Query que faz a selecao do cd_cliente
		$selecao = "SELECT * FROM aluno WHERE cd_aluno = :cd_aluno LIMIT 1";
		// Prepara a conexao com o banco para comecar a operacao
		$seleciona = BD::prepare($selecao);
		// Vincula um valor a um paramentro
		$seleciona->bindValue(':cd_aluno', $cd_aluno, PDO::PARAM_INT);
		// Executa a operacao
		$seleciona->execute();
		// Retorna uma matriz contendo todas as linhas do conjunto de resultados
		$linhas = $seleciona->fetchAll(PDO::FETCH_ASSOC);
		// Funcao que converte um array PHP em dados para JSON 
		echo json_encode($linhas);
	// Se a selecao nao for possível de realizar
	} catch (PDOException $falha_selecao) {
		echo "A listagem de dados não foi feita".$falha_selecao->getMessage();
	} catch (Exception $falha) {
		echo "Erro não característico do PDO".$falha->getMessage();
	}
?>