//Vamos usar o APP existente. Caso não exista, criamos um objeto.
var APP = APP || {};

APP.Interface = {
	_operacaoPadrao: "operacaoSoma",

	setUp: function() {
		var opcaoMarcada, formulario, entrada;
		
		//Marcar a operação padrão
		opcaoMarcada = document.getElementById(this._operacaoPadrao);
		opcaoMarcada.checked = true;

		//Adicionar o listener de submit no formulario
		formulario = document.getElementById("formularioCalculadora");
		formulario.addEventListener("submit", this.calcular, true);

		//Ativar o campo de entrada
		entrada = document.getElementById('entrada');
		entrada.focus();

	},

	calcular: function(event){
		var operacao, elementoResultado, resultado, entrada, novoResultado;

		//0 - Desabilitar envio das informações
		event.preventDefault();

		//1 - Descobrir a operação 
		operacao = document.querySelector('input[name="operacao"]:checked').value;

		//2 - Capturar o valor de resultado
		elementoResultado = document.getElementById('resultado');
		resultado = elementoResultado.textContent;

		//3 - Capturar o valor inserido
		entrada = document.getElementById('entrada').value;

		//4 - Fazer o casting para float
		resultado = parseFloat(resultado);
		entrada = parseFloat(entrada);

		//5 - Executar a operação
		novoResultado = APP.Operacoes[operacao](resultado, entrada);

		//6 - Apresentar o novo resultado
		elementoResultado.textContent = novoResultado;
		
	}
} 