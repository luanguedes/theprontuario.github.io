var form = document.getElementById("cadastro");
if (form.addEventListener) {                   
    form.addEventListener("submit", validaCadastro);
} else if (form.attachEvent) {                  
    form.attachEvent("onsubmit", validaCadastro);
}
 

var inputCNS = document.getElementById("cns");
if (inputCNS.addEventListener) {                   
    inputCNS.addEventListener("keypress", function(){mascaraTexto(this, '###.####.####.####')});
} else if (inputCPF.attachEvent) {                  
    inputCPF.attachEvent("onkeypress", function(){mascaraTexto(this, '###.####.####.####')});
}
 

var inputDataNascimento = document.getElementById("data_nascimento");
if (inputDataNascimento.addEventListener) {                   
    inputDataNascimento.addEventListener("keypress", function(){mascaraTexto(this, '##/##/####')});
} else if (inputDataNascimento.attachEvent) {                  
    inputDataNascimento.attachEvent("onkeypress", function(){mascaraTexto(this, '##/##/####')});
}
 

var inputTelefone = document.getElementById("telefone");
if (inputTelefone.addEventListener) {                   
    inputTelefone.addEventListener("keypress", function(){mascaraTexto(this, '## ####-####')});
} else if (inputTelefone.attachEvent) {                  
    inputTelefone.attachEvent("onkeypress", function(){mascaraTexto(this, '## ####-####')});
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
	var contErro = ;
 
 

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
 
	if(contErro > ){
		evt.preventDefault();
	}
}
 
function mascaraTexto(t, mask){
	var i = t.value.length;
	var saida = mask.substring(1,);
	var texto = mask.substring(i);
 
	if (texto.substring(,1) != saida){
		t.value += texto.substring(,1);
	}
}
 
