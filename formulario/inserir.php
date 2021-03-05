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
                        
            $nome = strval($_POST['nome']);
            $endereco = strval($_POST['endereco']);
                        
            $aluno->setNome($nome);
            $aluno->setEndereco($endereco);
                        
        	if ($aluno->Insert()) {
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