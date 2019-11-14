<?php
include ('connection.php');
class Pos extends Database
{
	public function SaveposData($medicine,$quantity,$price){
		// echo count($medicine);
		// die();
	for($i=0; $i<count($medicine);$i++)
	{
		$medicine1=$medicine[$i];
	   $qty=$quantity[$i];
	   $pri=$price[$i];
	   $total = $qty*$pri;
	   
	  $date=Date('Y-m-d');
	  // var_dump($date);
	  // die();
     $sql="INSERT INTO pos (`medicine`,`quantity`,`price`,`total`,`date`) VALUES('$medicine1','$qty','$pri','$total','$date')";
	 
		$query=$this->db->prepare($sql);
		$query->execute();


		 $sql="SELECT * FROM medicon WHERE medicon_id=$medicine1";
	    $query=$this->db->prepare($sql);
 			$query->execute();
 			$result=$query->fetch(PDO::FETCH_ASSOC);
 			$remaning=$result['remaning'];
 			$sold=$result['sold'];
 		   $total=$remaning-$qty;
 		 //     var_dump($total);
 			// die();
 		   $last=$total+$sold;
 		   // var_dump($last);
 		   // die();
 		 
 			
      $sql="UPDATE medicon SET sold='$last',remaning='$total' WHERE medicon_id=$medicine1"; 
 	
	 	$query=$this->db->prepare($sql);
		$query->execute();



	
	

		
	}
}
	public function getAllmedicineData(){
 			$obj="SELECT medicon_id, 
company.companyname,category.categoryname,medicon.drugname,medicon.Manufacturedate,medicon.expirydate,medicon.price,medicon.retailsprice,medicon.quantity FROM medicon inner join category ON category.category_id=medicon.category INNER join company on company.company_id=medicon.company";
 			$query=$this->db->prepare($obj);
 			$query->execute();
 			$result=$query->fetchALL(PDO::FETCH_ASSOC);
 			return $result;
 		}

 		 public function getSinglemedicineData($medicon_id){
		$obj="SELECT * FROM medicon WHERE medicon_id=$medicon_id";
	
	 $query=$this->db->prepare($obj);
	 $query->execute();
	 $result=$query->fetch(PDO::FETCH_ASSOC);
	 return $result;
	}
	public function getAllposData(){

	 $obj="SELECT pos_id,medicon.drugname,pos.quantity,pos.price,pos.total,pos.date from medicon INNER JOIN pos ON medicon.medicon_id=pos.medicine";

		$query=$this->db->prepare($obj);
		$query->execute();
		$result=$query->fetchALL(PDO::FETCH_ASSOC);
		return $result;
	}
	public function DeleteposData($id){
 $sql="DELETE FROM pos WHERE pos_id=$id"; 
		$query=$this->db->prepare($sql);
		$query->execute();
	}
	 public function getSingleposData($pos_id){

		$obj="SELECT pos_id,medicon.drugname,pos.quantity,pos.price,pos.total,pos.date from medicon INNER JOIN pos ON medicon.medicon_id=pos.medicine WHERE pos_id=$pos_id ";
	
	 $query=$this->db->prepare($obj);
	 $query->execute();
	 $result=$query->fetch(PDO::FETCH_ASSOC);
	 return $result;
	}
	
	
}

?>