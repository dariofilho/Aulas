var Calculo = function(numero1, numero2) {
	
	this.numero1 = numero1;
	this.numero2 = numero2;
	
	this.somar = function(numeros) {
		
		if(numeros == undefined) {
			return this.numero1 + this.numero2;
		} else if(arguments.length == 2) {
			return arguments[0] + arguments[1];
		}
	};
	
	
	this.multiplicar = function() {
		return this.numero1 * this.numero2;
	};
	
	this.dividir = function() {
		return this.numero1 / this.numero2;
	};
	
	this.subtrair = function() {
		return this.numero1 - this.numero2;
	};
};


