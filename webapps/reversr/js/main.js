$("#entrada")

	.on("blur", function(event){
		var entrada = $(this).val(); 
		var resultado = entrada.split("").reverse().join("");

		$("#resultado").val(resultado).select();

		localStorage.setItem('entrada', entrada);
		localStorage.setItem('resultado', resultado);
	})
	.val(localStorage.getItem('entrada'));

$("#resultado")
	.val(localStorage.getItem('resultado'));