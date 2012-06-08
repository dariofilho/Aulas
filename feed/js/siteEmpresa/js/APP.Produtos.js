var APP = APP || {};

APP.Produtos = {
	setUp: function(){
		console.debug('Estou em Produtos');
	},
	
	Lista: {
		setUp: function(){
			$("ul#lista").on('click', 'li.produto', function(event) {
				var li = $(event.currentTarget);
				var id = li.data('id');
				APP.Produtos.Produto.Carregamento.porId(id);
			});
		},
		
		montar: function(produtos) {
			$(produtos).each(function(indice, produto){
				//Com jQuery
				$("<li>")
					.text(produto.nome)
					.addClass('produto')
					.appendTo("ul#lista")
					.data('id',produto.id);
				
				//Sem jQuery
				// var 	li = document.createElement('li');
				//		li.textContent = produto.nome;
				// 				
				// var	lista = document.getElementById('lista');
				//		lista.appendChild(li);
			});
		},
		
		Carregamento: {
			setUp: function() {
				this.carregar();
			},
			
			carregar: function(){
				
				if(APP.Repositorio.existe('lista','produtos')) {
					var produtos = APP.Repositorio.carregar('lista', 'produtos');
					APP.Produtos.Lista.montar(produtos);
				} else if(APP.OnLine._status) {
					var propriedadesDoCarregamento = {
						url: 'json_produtos.php',
						dataType: 'JSON',
						beforeSend: this.carregando,
						success: this.carregou,
						error: this.naoCarregou
					};
					$.ajax(propriedadesDoCarregamento);
				} else {
					alert('Não foi possível carregar a lista de produtos.');
				}
			},
			carregando: function(){
				console.debug('Aguarde...');
			},
			
			carregou: function(data, text, xhr){
				if(data.status && data.status == true) {
					APP.Repositorio.adicionar('lista', 'produtos', data.produtos);
					APP.Produtos.Lista.montar(data.produtos);
				} else {
					APP.Produtos.Lista.Carregamento.naoCarregou();
				}
			},
			naoCarregou: function(){
				console.debug('Não foi possível carregar os dados...');
			}
		}
	},
	
	Produto: {
		setUp: function() {
			//this.Carregamento.porId(1);
		},
		
		montar: function(produto) {
			$("#produto h1").text(produto.nome);
			$("#produto .descricao").text(produto.descricao);
			$("#produto .preco").text(produto.preco);
		
		},
		
		Carregamento: {
			setUp: function() {},
			porId: function(id) {
				this.carregar(id);
			},
			carregar: function(idProduto) {
				//Parâmetros da conexão
				var parametros = {
					url: 'json_produto.php',
					dataType: 'JSON',
					data:{
						id: idProduto
					},
					beforeSend: this.carregando,
					success: this.carregou,
					error: this.naoCarregou
				};
				
				//Realizar a chamada
				$.ajax(parametros);
			},
			carregando: function() {
				//Aguarde...
				console.debug('Carregando informações do produto.')
			},
			carregou: function(data,text,xhr) {
				if(data.status && data.status == true) {
					APP.Produtos.Produto.montar(data.produto);
				} else {
					APP.Produtos.Produto.Carregamento.naoCarregou();
				}
			},
			naoCarregou: function() {
				//O produto não pôde ser carregado
			}
		}
	}
	
};