<?php
include ('connection.php');


class Medicon extends Database
{
	public function SaveMedicalData($drugname,$category,$company,$Manufacturedate,$expirydate,$price,$retailsprice,$quantity){
	 $obj="INSERT INTO medicon(`drugname`,`category`,`company`,`Manufacturedate`,`expirydate`,`price`,`retailsprice`,`quantity`) VALUES('$drugname','$category','$company','$Manufacturedate','$expirydate','$price','$retailsprice','$quantity')"; 
		$query=$this->db->prepare($obj);
 		$query->execute();
	}
		public function getAllmediconData(){
 			$obj="SELECT medicon_id, 
company.companyname,category.categoryname,medicon.drugname,medicon.Manufacturedate,medicon.expirydate,medicon.price,medicon.retailsprice,medicon.quantity,medicon.remaning,medicon.sold FROM medicon inner join category ON category.category_id=medicon.category INNER join company on company.company_id=medicon.company";
 			$query=$this->db->prepare($obj);
 			$query->execute();
 			$result=$query->fetchALL(PDO::FETCH_ASSOC);
 			return $result;
 		}

	public function getAllcompanyData(){
 			$obj="SELECT *FROM company";
 			$query=$this->db->prepare($obj);
 			$query->execute();
 			$result=$query->fetchALL(PDO::FETCH_ASSOC);
 			return $result;
 		}

	public function getAllcategoryData(){
 			$obj="SELECT *FROM category";
 			$query=$this->db->prepare($obj);
 			$query->execute();
 			$result=$query->fetchALL(PDO::FETCH_ASSOC);
 			return $result;
 		}
 			 public function deletemediconData($id)
 	{
	 	$obj="DELETE FROM medicon WHERE medicon_id=$id";
	 	$query=$this->db->prepare($obj);
		$query->execute();

	 }
	  public function getSinglemediconData($id){
		$obj="SELECT * FROM medicon WHERE medicon_id=$id";
	
	 $query=$this->db->prepare($obj);
	 $query->execute();
	 $result=$query->fetch(PDO::FETCH_ASSOC);
	 return $result;
	}
	 public function updatemediconData($drugname,$category,$company,$Manufacturedate,$expirydate,$price,$retailsprice,$quantity,$remaning,$medicon_id)
	 {
	 	 $obj="UPDATE medicon SET drugname='$drugname',category='$category',company='$company',Manufacturedate='$Manufacturedate',expirydate='$expirydate',price='$price',retailsprice='$retailsprice',quantity='$quantity',remaning='$remaning' WHERE medicon_id=$medicon_id"; 

	 	$query=$this->db->prepare($obj);
		$query->execute();

	 }
}





?>