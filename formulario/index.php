<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> POO CRUD </title>
	<script type="text/javascript" src="/crud/json/requisicao_aluno.js"></script>
</head>
<body>
	<?php
		require_once "../dao/crudaluno.php";
		$aluno = new CrudAluno();

		$sql = "SELECT cd_aluno, nome FROM aluno";
        $stm = BD::prepare($sql);
        $stm->execute();
        $linhas = $stm->fetchAll(PDO::FETCH_ASSOC);
	?>
	<fieldset>
		<legend> Cadastrar aluno </legend>
			<form method="POST" autocomplete="off" action="../formulario/inserir.php">
				<p> Nome: <input type="text" name="nome" size=30 required=""> </p>
				<p> Endereço: <input type="text" name="endereco" size=30 required=""> </p>
				<button name="Cadastrar"> Cadastrar </button>
			</form>
	</fieldset>
	<br>
	<fieldset> 
		<legend> Listar alunos </legend>
		<p> Procurar aluno: <input id="aluno"/> </p>
		<table id="lista" border="1">
        <tr> 
        	<th> ID </th>
            <th> Nome </th>
            <th> Endereço </th>
            <th> Ações </th>
        </tr>
        <?php 
            foreach ($aluno->Select() as $key){
                echo '<tr>';
                echo '<td>'.$key->cd_aluno.'</td>';
                echo '<td>'.$key->nome.'</td>';
                echo '<td>'.$key->endereco.'</td>';
                echo '<td>'."<a href='../formulario/index.php'>INSERT</a> ".
                "<a href='../formulario/index.php'>SELECT</a> ".
                "<a href='../formulario/index.php'>UPDATE</a> ".
                "<a href='../formulario/index.php'>DELETE</a>".'</td>';
                echo '</tr>'; echo '</p>';
            }
        ?>
    </table>
    <script type="text/javascript" src="/crud/js/select_aluno.js"></script>  
	</fieldset>
	<br>
	<fieldset>
		<legend> Atualizar aluno </legend>
			<form method="POST" autocomplete="off" action="../formulario/atualizar.php">
		        <p> ID aluno:
		            <select name="cd_aluno" onclick="buscaDados()" id="cd_aluno" required="">
		                <option value=""> Nenhum </option>
		                <?php foreach($linhas as $key): ?>
		                    <option value="<?= $key['cd_aluno'] ?>"><?= $key['nome'] ?></option>
		                <?php endforeach ?>
		            </select>
		        </p>
				<p> Nome: <input type="text" name="nome" id="nome" size=30 required=""> </p>
				<p> Endereço: <input type="text" name="endereco" id="endereco" size=30 required=""> </p>
				<button name="Atualizar"> Atualizar </button>
			</form>
	</fieldset>
	<br>
	<fieldset>
		<legend> Excluir aluno </legend>
			<form method="POST" autocomplete="off" action="../formulario/excluir.php">
				<p> ID aluno:
					<select name="cd_aluno" required="">
						<option value=""> Nenhum </option>
			  			<?php foreach($linhas as $key): ?>
		    				<option value="<?= $key['cd_aluno'] ?>"><?= $key['nome'] ?></option>
						<?php endforeach ?>
					</select>
				</p>
				<button name="Excluir"> Excluir </button>
			</form>
	    </form>
	</fieldset>
</body>
</html>