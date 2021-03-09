<!DOCTYPE html>
<html>
<head>
	<title> INSERT | POO </title>
</head>
<body>
	<?php
		require_once "../dao/crudaluno.php";

		$aluno = new CrudAluno();

        if (isset($_POST['Cadastrar'])) {
                        
            $nome = $_POST['nome'];
            $endereco = $_POST['endereco'];

            if ( (!is_string($nome)) || (!is_string($endereco)) ) {
            	header('Location: ../formulario/index.php');
            	die();
            }
                        
            $aluno->setNome($nome);
            $aluno->setEndereco($endereco);
                        
        	if ($aluno->Insert()) {
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