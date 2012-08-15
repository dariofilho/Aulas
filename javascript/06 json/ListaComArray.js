function getProduto(lista, idDoProduto) {
	var i = 0, 
		l = lista.produtos.length,
		produto = null;
	
	for(; i< l; i++) {
		produto = lista.produtos[i];
		if(produto.id == idDoProduto) {
			return produto;
		}
	}
	return produto;
}

var produto = getProduto(listaDeProdutos,398498);

listaDeProdutos.produtos
//Objeto Lista
var listaDeProdutos = {
	categoria: 45,
	total: 20,
	produtos: [{
		id: "87346",
		nome: "Cabo de rede",
		descricao: "Cabo de rede rj45",
	},{
		id: "398498",
		nome: "Cabo de audio",
		descricao: "Cabo de audio p2",
	}]
}

//Objeto Produto
{
	id: "1",
	nome: "Cabo de rede",
	descricao: "Cabo de rede rj45",
}