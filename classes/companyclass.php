<?php
include ('connection.php');


class Data extends Database 
{
		  public function savecompany($companyname){
			$obj="INSERT INTO company (`companyname`) VALUES('$companyname') ";
 		$query=$this->db->prepare($obj);
 		$query->execute();

	}
	public function getAllcompanyData(){
 			$obj="SELECT *FROM company";
 			$query=$this->db->prepare($obj);
 			$query->execute();
 			$result=$query->fetchALL(PDO::FETCH_ASSOC);
 			return $result;
 		}
 			 public function getSinglecompanyData($id){
		$obj="SELECT * FROM company WHERE company_id=$id";
	
	 $query=$this->db->prepare($obj);
	 $query->execute();
	 $result=$query->fetch(PDO::FETCH_ASSOC);
	 return $result;
	}
 		 public function deletecompanyData($id)
 	{
	 	$obj="DELETE FROM company WHERE company_id=$id";
	 	$query=$this->db->prepare($obj);
		$query->execute();

	 }
	 public function updatecompanyData($companyname,$id)
	 {
	 	 $obj="UPDATE company SET companyname='$companyname' WHERE company_id=$id";
	 

	 	$query=$this->db->prepare($obj);
		$query->execute();

	 }

}




