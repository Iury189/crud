<!DOCTYPE html>
<html>
<head>
	<title> UPDATE | POO </title>
</head>
<body>
	<?php
		require_once "../dao/crudaluno.php";

		$aluno = new CrudAluno();

        if (isset($_POST['Atualizar'])) {
            
            $cd_aluno = filter_input(INPUT_POST, 'cd_aluno', FILTER_SANITIZE_NUMBER_INT);        
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
            $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
            
            $aluno->setAluno($cd_aluno);            
            $aluno->setNome($nome);
            $aluno->setEndereco($endereco);
                        
            if ($aluno->Update()) {
            	header('Location: ../formulario/index.php');
            } else {
            	echo "Erro.";
            	echo '<p><a href="../formulario/index.php"><button>Refazer operação</button></a></p>';
            }

        } else {
            echo "Erro, refaça a operação";
            echo '<p><a href="../formulario/index.php"><button>Refazer operação</button></a></p>';
        }
	?>
</body>
</html>