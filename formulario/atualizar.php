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
            
            $cd_aluno = $_POST['cd_aluno'];           
            $nome = $_POST['nome'];
            $endereco = $_POST['endereco'];

            if ( (!is_int($cd_aluno)) || (!is_string($nome)) || (!is_string($endereco)) ) {
            	header('Location: ../formulario/index.php');
            	die();
            }
            
            $aluno->setAluno($cd_aluno);            
            $aluno->setNome($nome);
            $aluno->setEndereco($endereco);
                        
            if ($aluno->Update()) {
            	header('Location: ../formulario/index.php');
            	die();
            } else {
            	echo "Erro.";
            	echo '<p><a href="../formulario/index.php"><button>Refazer operação</button></a></p>';
            	die();
            }
            
        } else {
            echo "Erro, refaça a operação";
            echo '<p><a href="../formulario/index.php"><button>Refazer operação</button></a></p>';
            die();
        }
	?>
</body>
</html>