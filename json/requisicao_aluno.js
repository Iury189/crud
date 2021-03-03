function buscaDados(){
    // Variavel cd_aluno que retorna o elemento cd_aluno
    var cd_aluno = document.querySelector("#cd_aluno").value;
    // Verifica se o option selecionado e vazio (value="")
    if(!cd_aluno){
    	// Apaga os valores dos elementos do formulario
      	document.forms[0].reset();
      	// Aborta o resto da funcao 
      	return;
   	}
    // Instancia a classe XMLHttpReques
    ajax = new XMLHttpRequest();
    // Especifica o Method e a url que sera chamada
    ajax.open("GET","/crud/json/id_aluno.php?cd_aluno="+cd_aluno,true);
    // Executa na resposta do ajax
    ajax.onreadystatechange = function(){
        // Se completar a requisicao
    	if(ajax.readyState == 4){
    	   // Se retornar
    		if(ajax.status == 200){
        		// Converte a string retornada para dados em JSON no JS
        		var retornoJson = JSON.parse(ajax.responseText);
        		// Preenche os campos com o retorno dos dados em cada campo
        		document.querySelector("#nome").value = retornoJson[0].nome;
        		document.querySelector("#endereco").value = retornoJson[0].endereco;
    		}
    	}
    }
    // Envia a solicitacao
    ajax.send();
}