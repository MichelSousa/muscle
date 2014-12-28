<?php 

 //SINGLETON
 //Desenvolvido por Michel damasceno
 // version 1.2

   class Model{
	 
	 private $db;
	 private static $instance;
	 protected $_table = 'categoria';
	 protected $id = null;
	 private $nome = null;
	 
	 public function  ConectaDB(){
		
     if(!isset(self::$instance)){
	
		self::$instance  = $this->db = new PDO("mysql:host=localhost;dbname=viwebsit_muscle","viwebsit_muscle","number8"); 
	   }
	   return self::$instance;
	}
		
	public function getId(){
		   return $this->id;
	 }
		
	public function setId($id){
	       $this->id = $id;
	 }
			
	public function find(){
		$selecionar = $this->db->prepare('SELECT * FROM '. $this->_table. ' WHERE pid = :id');
		$selecionar->bindValue(':id', $this->getId());
		$selecionar->execute();
		return $selecionar->fetchAll(PDO::FETCH_ASSOC);
		}	
		
	 public function Insert($sql){
		  $insert = $this->db->prepare($sql);
		 return  $insert->execute();
	   }
	   
	 /*INSERE DADOS APARTIR DE UM ARRAY*/
	 public function InsertOrdem($dados)
	 {
	  if(is_array($dados)){
		 $array  =  array_keys($dados);
		 for($pos =0 ;$pos <count($array);$pos++){
	       $array[$pos];
           $dados[$array[$pos]];
         }

        $colunas = implode(",",$array); 
        $valores = "'".implode("','",$dados)."'";
        $sql = "INSERT INTO " . $this->_table . "($colunas)values($valores)";
	    $query = $this->db->prepare($sql);
	    $query->execute();
		 }else{
			 echo utf8_decode("N�o � um array");
		 }
	 }
	 
	 public function Selecionar(){
		 
		$selecionar = $this->db->prepare('SELECT * FROM '. $this->_table);
		$selecionar->execute();
		return $selecionar->fetchAll(PDO::FETCH_ASSOC);
	 }
	 
	 public function SelecionarDados($sql){
		 
		  $selecionar = $this->db->prepare($sql);
		  $selecionar->execute();
		  return $selecionar->fetchAll(PDO::FETCH_ASSOC);
		 
		 }
		 
	public function Update($sql){
		 $update = $this->db->prepare($sql);
		 return  $update->execute();
		}	
	
	public function Delete(){
		 $sql =  "DELETE  FROM  " . $this->_table ." WHERE id = :id";		
		 $delete = $this->db->prepare($sql);
		 $delete->bindValue(':id',$this->getId()); 
		 return  $delete->execute();

		}
    public function Contar($sql){
		$contar = $this->db->prepare($sql);
	    $contar->execute();
		return $contar->rowCount();
		
		}			 

  }	 

?>