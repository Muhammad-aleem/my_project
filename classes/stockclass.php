<?php
include ('connection.php');
 
 
class Stock extends Database
{

	public function SavestokData($medicon_id,$quantity,$date){
	 $sql="INSERT INTO stock(`medicon_id`,`quantity`,`date`) VALUES('$medicon_id','$quantity','$date')";
		$query=$this->db->prepare($sql); 
	    $query->execute(); 

	    $sql="SELECT * FROM medicon WHERE medicon_id=medicon_id";
	    $query=$this->db->prepare($sql);
 			$query->execute();
 			$result=$query->fetch(PDO::FETCH_ASSOC);
 			$remaning=$result['remaning'];
 		   $total=$remaning+$quantity;
 			// var_dump($total);
 			// die();
  $sql="UPDATE medicon SET remaning='$total' WHERE medicon_id=$medicon_id";
 	
	 	$query=$this->db->prepare($sql);
		$query->execute();

	}
	public function getAllstockData(){
 			$obj="SELECT stock_id,medicon.drugname,medicon.category,medicon.company,medicon.Manufacturedate,medicon.expirydate,medicon.expirydate,medicon.retailsprice,medicon.quantity,medicon.remaning,medicon.sold,stock.quantity,stock.date FROM medicon INNER join stock ON medicon.medicon_id=stock.medicon_id";
 			$query=$this->db->prepare($obj);
 			$query->execute();
 			$result=$query->fetchALL(PDO::FETCH_ASSOC);
 			return $result;
 		}

public function getAllmediconData(){
 			$obj="SELECT medicon_id, 
company.companyname,category.categoryname,medicon.drugname,medicon.Manufacturedate,medicon.expirydate,medicon.price,medicon.retailsprice,medicon.quantity FROM medicon inner join category ON category.category_id=medicon.category INNER join company on company.company_id=medicon.company";
 			$query=$this->db->prepare($obj);
 			$query->execute();
 			$result=$query->fetchALL(PDO::FETCH_ASSOC);
 			return $result;
 		}
 		public function deletestockData($id)
 	{
	 	$obj="DELETE FROM stock WHERE stock_id=$id";
	 	$query=$this->db->prepare($obj);
		$query->execute();

	 }
	 public function getSinglestockData($id){
		$obj="SELECT * FROM stock WHERE stock_id=$id";
	
	 $query=$this->db->prepare($obj);
	 $query->execute();
	 $result=$query->fetch(PDO::FETCH_ASSOC);
	 return $result;
	}
	 public function updatestockData($medicon_id,$quantity,$date,$stock_id)
	 {
	 	   $obj="UPDATE stock SET medicon_id='$medicon_id',quantity='$quantity',date='$date' WHERE stock_id=$stock_id"; 

	 	$query=$this->db->prepare($obj);
		$query->execute();

	 }
	
}



?>