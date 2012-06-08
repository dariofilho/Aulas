<?
include("../primatio/Connection.class.php");
include("../primatio/Noticia.class.php");
include("../primatio/Multimidia.class.php");
$noticia = new Noticia();
	
if(isset($_GET['id'])){
	$id = $_GET['id'];
	if(is_numeric($id)) {
		$noticia = $noticia->noticiaArray($id);
		$data = implode("/",array_reverse(explode("-", $noticia->news->data)));
		
		$listaRelacionamentos = new ListaRelacionamentos();
		$relacionamentos = $listaRelacionamentos->listarRelacionamentos(implode("/",explode("/",$noticia->news->data)));
		
		$gruposMultimidia = array();
		foreach($relacionamentos as $relacionamento) {
			if($relacionamento['not_codigo'] == $id) {
				$gruposMultimidia['tipo'.$relacionamento['flag_multi']][] = $relacionamento;
			}
		}
		$noticia->multimidia = $gruposMultimidia;
		
		echo json_encode($noticia);
	}
}
?>