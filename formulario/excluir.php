<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> DELETE | POO </title>
</head>
<body>
	<?php  
		require_once "../dao/crudaluno.php";
        
		$aluno = new CrudAluno();

        if (isset($_POST['Excluir'])) {
                        
            $cd_aluno = filter_input(INPUT_POST, 'cd_aluno', FILTER_SANITIZE_NUMBER_INT);
                        
            $aluno->setAluno($cd_aluno);
                        
            if ($aluno->Delete()) {
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