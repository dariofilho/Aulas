<?
	/**
	* Connection
	*
	* Este script tem como objetivo estabelecer conexões
	* com o banco de dados do projeto Flip 2.0  
	*
	* @author     Felipe Andrade <felipe@i2mobile.com.br>
	* @copyright  2011 i2 Mobile Solutions
	* @license    Commercial
	* @version    Release: @1.0.0@
	* @link       http://www.i2mobile.com.br
	* @since     18-February-2011
	* @deprecated NO
	*/

		
	class Connection2
	{
		private $info = array(
			'host'=>'200.147.22.158',
			'user'=>'i2tecnologia',
			'pass'=>'i2tec',
			'base'=>'jornal2'
		);
		private $xcon;
		
		/**
		 * Construtor da classe
		 *
		 */
		public function __construct()
		{		
			$argv = func_get_args();		
			switch(func_num_args())
			{
				default:
				case 0:
					self::__construct0();
					break;
				case 4:
					self::__construct4($argv[0], $argv[1], $argv[2], $argv[3]);
					break;			
			}
		}
		
		/**
		 * Construtor Defaut da classe
		 * 
		 */
		private function __construct0()
		{
			$this->connect();
		}
		
		/**
		 * Construtor Com parâmetros de conexão
		 * 
		 * @param object $host
		 * @param object $user
		 * @param object $pass
		 * @param object $base
		 */	
		private function __construct4($host, $user, $pass, $base)
		{
			$this->info['host'] = $host;
			$this->info['user'] = $user;
			$this->info['pass'] = $pass;
			$this->info['base'] = $base;
			$this->connect();
		}
		
		/**
		 * Conecta a base de dados
		 *
		 * @return ConnectionString
		 */
		public function connect()
		{
			$xcon = mysql_connect($this->info['host'], $this->info['user'], $this->info['pass'])or die(mysql_error());
			mysql_select_db($this->info['base'],$xcon)or die(mysql_error());
			
			return $xcon;
		}
		
		/**
		 * Executa uma query
		 *
		 * @param StringSQL $sql
		 * @return QueryLink
		 */
		public function query($sql)
		{
			return mysql_query($sql);
		}
		
		/**
		 * Retorna o ID da ultima entidade 
		 * inserida na base de dados
		 *
		 * @return Int
		 */
		public function insert_id()
		{
			return mysql_insert_id();
		}
		
		/**
		 * Retorna o resultado de uma query como
		 * objeto
		 *
		 * @param QueryLink $query
		 * @return Int
		 */
		public function fetch_object($query)
		{
			return mysql_fetch_object($query); 
		}
		
		/**
		 * Retorna o resultado de uma Query como um array
		 *
		 * @param QueryLink $query
		 * @return Array
		 */
		public function fetch_array($query){
			return mysql_fetch_array($query);
		}
		
		/**
		 * Retorna o numero de linhas de uma Query 
		 *
		 * @param QueryLink $query
		 * @return Int
		 */
		public function num_rows($query)
		{
			return mysql_num_rows($query);
		}
		
		/**
		 * Retorna o numero de itens afetados pela ultima query 
		 *
		 * @return Int
		 */
		public function affected_rows()
		{
			return mysql_affected_rows();
		}
		
		/**
		 * Fecha a conexão com a base de dados
		 *
		 */
		public function close(){
			mysql_close($xcon);
		}
		
		
		public function validaData($data) {
			if(!$_SESSION['_USER_DIASACESSO']) return TRUE;
			$toValidateWeekDay = date("w", strtotime($data));
			$accountWeekDays = str_split($_SESSION['_USER_DIASACESSO']);
			return ($accountWeekDays[$toValidateWeekDay] == 1) ? TRUE : FALSE;
		}
		
		public function validaConteudo($data,$conteudo) {
			if($this->validaData($data)) {
				return $conteudo;
			}
			return "A modalidade da sua assinatura n&atilde;o permite acesso a este conte&uacute;do.";
		}
	}
   
?>