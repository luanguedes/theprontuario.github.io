var form = document.getElementById('cadastro');
if (form != null && form.addEventListener) {                   
    form.addEventListener("submit", validaCadastro);
} else if (form != null && form.attachEvent) {                  
    form.attachEvent("onsubmit", validaCadastro);
}


var inputCNS = document.getElementById('cns');
if (inputCNS != null && inputCNS.addEventListener) {                   
    inputCNS.addEventListener("keypress", function(){mascaraTexto(this, '###.####.####.####')});
} else if (inputCNS != null && inputCNS.attachEvent) {                  
    inputCNS.attachEvent("onkeypress", function(){mascaraTexto(this, '###.####.####.####')});
}




var inputTelefone = document.getElementById('telefone');
if (inputTelefone != null && inputTelefone.addEventListener) {                   
    inputTelefone.addEventListener("keypress", function(){mascaraTexto(this, '## ####-####')});
} else if (inputTelefone != null && inputTelefone.attachEvent) {                  
    inputTelefone.attachEvent("onkeypress", function(){mascaraTexto(this, '## ####-####')});

}


var linkExclusaoPaciente = document.querySelectorAll(".exclusao_paciente");
if (linkExclusaoPaciente != null) { 
	for ( var i = 0; i < linkExclusaoPaciente.length; i++ ) {
		(function(i){
			var id_paciente = linkExclusaoPaciente[i].getAttribute('rel');

			if (linkExclusaoPaciente[i].addEventListener){
		    	linkExclusaoPaciente[i].addEventListener("click", function(){confirmaExclusaoPaciente(id_paciente);});
			}else if (linkExclusaoPaciente[i].attachEvent) { 
				linkExclusaoPaciente[i].attachEvent("onclick", function(){confirmaExclusaoPaciente(id_paciente);});
			}
		})(i);
	}
}

var linkExclusaoProfissional = document.querySelectorAll(".exclusao_profissional");
if (linkExclusaoProfissional != null) { 
	for ( var i = 0; i < linkExclusaoProfissional.length; i++ ) {
		(function(i){
			var id_profissional = linkExclusaoProfissional[i].getAttribute('rel');

			if (linkExclusaoProfissional[i].addEventListener){
		    	linkExclusaoProfissional[i].addEventListener("click", function(){confirmaExclusaoProfissional(id_profissional);});
			}else if (linkExclusaoProfissional[i].attachEvent) { 
				linkExclusaoProfissional[i].attachEvent("onclick", function(){confirmaExclusaoProfissional(id_profissional);});
			}
		})(i);
	}
}

var linkExclusaoEspecialidade = document.querySelectorAll(".exclusao_especialidade");
if (linkExclusaoEspecialidade != null) { 
	for ( var i = 0; i < linkExclusaoEspecialidade.length; i++ ) {
		(function(i){
			var id_especialidade = linkExclusaoEspecialidade[i].getAttribute('rel');

			if (linkExclusaoEspecialidade[i].addEventListener){
		    	linkExclusaoEspecialidade[i].addEventListener("click", function(){confirmaExclusaoEspecialidade(id_especialidade);});
			}else if (linkExclusaoEspecialidade[i].attachEvent) { 
				linkExclusaoEspecialidade[i].attachEvent("onclick", function(){confirmaExclusaoEspecialidade(id_especialidade);});
			}
		})(i);
	}
}

function validaCadastro(evt){
	var nome = document.getElementById('nome');
	var sexo = document.getElementById('sexo');
	var data_nascimento = document.getElementById('data_nascimento');
	var cns = document.getElementById('cns');
	var nome_mae = document.getElementById('nome_mae');
	var endereco = document.getElementById('endereco');
	var telefone = document.getElementById('telefone');
	var status = document.getElementById('status');
	var filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	var contErro = 0;
 
 

	caixa_nome = document.querySelector('.msg-nome');
	if(nome.value == ""){
		caixa_nome.innerHTML = "Favor preencher o Nome";
		caixa_nome.style.display = 'block';
		contErro += 1;
	}else{
		caixa_nome.style.display = 'none';
	}
 

	caixa_sexo = document.querySelector('.msg-sexo');
	if(email.value == ""){
		caixa_email.innerHTML = "Favor preencher o Sexo";
		caixa_email.style.display = 'block';
		contErro += 1;
	}else if(filtro.test(email.value)){
		caixa_email.style.display = 'none';
	}
 

	caixa_data = document.querySelector('.msg-data');
	if(data_nascimento.value == ""){
		caixa_data.innerHTML = "Favor preencher a Data de Nascimento";
		caixa_data.style.display = 'block';
		contErro += 1;
	}else{
		caixa_data.style.display = 'none';
	}
 
	caixa_cns = document.querySelector('.msg-cns');
	if(cpf.value == ""){
		caixa_cpf.innerHTML = "Favor preencher o CNS";
		caixa_cpf.style.display = 'block';
		contErro += 1;
	}else{
		caixa_cpf.style.display = 'none';
	}

	caixa_nome_mae = document.querySelector('.msg-nome_mae');
	if(celular.value == ""){
		caixa_celular.innerHTML = "Favor preencher o Nome da Mãe";
		caixa_celular.style.display = 'block';
		contErro += 1;
	}else{
		caixa_celular.style.display = 'none';
	}
 
	caixa_telefone = document.querySelector('.msg-telefone');
	if(telefone.value == ""){
		caixa_telefone.innerHTML = "Favor preencher o Telefone";
		caixa_telefone.style.display = 'block';
		contErro += 1;
	}else{
		caixa_telefone.style.display = 'none';
	}
 
	caixa_endereco = document.querySelector('.msg-endereco');
	if(celular.value == ""){
		caixa_celular.innerHTML = "Favor preencher o Endereço";
		caixa_celular.style.display = 'block';
		contErro += 1;
	}else{
		caixa_celular.style.display = 'none';
	}
 
	caixa_status = document.querySelector('.msg-status');
	if(status.value == ""){
		caixa_status.innerHTML = "Favor preencher o Status";
		caixa_status.style.display = 'block';
		contErro += 1;
	}else{
		caixa_status.style.display = 'none';
	}

	caixa_especialidade = document.querySelector('.msg-especialidade');
	if(nome.value == ""){
		caixa_nome.innerHTML = "Favor preencher a Especialidade";
		caixa_nome.style.display = 'block';
		contErro += 1;
	}else{
		caixa_nome.style.display = 'none';
	}
 
	if(contErro > 0){
		evt.preventDefault();
	}
}
 
function mascaraTexto(t, mask){
	var i = t.value.length;
	var saida = mask.substring(1, 0);
	var texto = mask.substring(i);
 
	if (texto.substring(0,1) != saida){
		t.value += texto.substring(0,1);
	}
}
 
 function confirmaExclusaoPaciente(id){
	retorno = confirm("Deseja realmente excluir esse Paciente?")
	if (retorno){

	    //Cria um formulário
	    var formulario = document.createElement("form");
	    formulario.action = "action/action_paciente.php";
	    formulario.method = "post";

		// Cria os inputs e adiciona ao formulário
	    var inputAcao = document.createElement("input");
	    inputAcao.type = "hidden";
	    inputAcao.value = "excluir";
	    inputAcao.name = "acao";
	    formulario.appendChild(inputAcao); 

	    var inputId = document.createElement("input");
	    inputId.type = "hidden";
	    inputId.value = id;
	    inputId.name = "id";
	    formulario.appendChild(inputId);

	    //Adiciona o formulário ao corpo do documento
	    document.body.appendChild(formulario);

	    //Envia o formulário
	    formulario.submit();
	}
}

function confirmaExclusaoProfissional(id){
	retorno = confirm("Deseja realmente excluir esse Profissional?")

	if (retorno){

	    //Cria um formulário
	    var formulario = document.createElement("form");
	    formulario.action = "action/action_profissional.php";
	    formulario.method = "post";

		// Cria os inputs e adiciona ao formulário
	    var inputAcao = document.createElement("input");
	    inputAcao.type = "hidden";
	    inputAcao.value = "excluir";
	    inputAcao.name = "acao";
	    formulario.appendChild(inputAcao); 

	    var inputId = document.createElement("input");
	    inputId.type = "hidden";
	    inputId.value = id;
	    inputId.name = "id";
	    formulario.appendChild(inputId);

	    //Adiciona o formulário ao corpo do documento
	    document.body.appendChild(formulario);

	    //Envia o formulário
	    formulario.submit();
	}
}


function confirmaExclusaoEspecialidade(id){
	retorno = confirm("Deseja realmente excluir essa Especialidade?")

	if (retorno){

	    //Cria um formulário
	    var formulario = document.createElement("form");
	    formulario.action = "action/action_especialidade.php";
	    formulario.method = "post";

		// Cria os inputs e adiciona ao formulário
	    var inputAcao = document.createElement("input");
	    inputAcao.type = "hidden";
	    inputAcao.value = "excluir";
	    inputAcao.name = "acao";
	    formulario.appendChild(inputAcao); 

	    var inputId = document.createElement("input");
	    inputId.type = "hidden";
	    inputId.value = id;
	    inputId.name = "id";
	    formulario.appendChild(inputId);

	    //Adiciona o formulário ao corpo do documento
	    document.body.appendChild(formulario);

	    //Envia o formulário
	    formulario.submit();
	}
}

