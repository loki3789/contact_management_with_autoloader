<?php
class  Database
{
    function getConnection()
    {
	$host="localhost";
        $dbname="contacts-manager-database";
        $username="root";
        $password="root";
	$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		
	return $pdo;
    }
    
    function update($pdo, $table, $data)
    {
		$query =  "UPDATE `".$table."` SET ".
			"`name` = '".$data['name']."', ".
			"`email` = '".$data['email']."', ".
			"`phonenumber` = '".$data['phonenumber']."', ".
			"`birthdate` = '".$data['birthdate']."' WHERE `id` = ".$data['id']." ;"
		;
                $stmt = $pdo->prepare($query);
		$result=$stmt->execute(); 

		return $result;
    }

    function add($pdo, $table, $data)
    {
		$query = "INSERT INTO `".$table."`(name, email, phonenumber, birthdate) VALUES ('".$data['name']."', '".$data['email']."', '".$data['phonenumber']."', '".
					$data['birthdate']."') ;";
                $stmt = $pdo->prepare($query);
		$result=$stmt->execute(); 

		return $result;
    }

    function delete($pdo, $table, $id)
    {
		$query = "DELETE FROM `".$table."` WHERE `id` = ".$id." ;";

		$stmt = $pdo->prepare($query);
		$result=$stmt->execute(); 

		return $result;
                
    }
     function all($pdo, $table)
    {
        $query =  "SELECT * FROM `".$table."` ;";
        $stmt =  $pdo->query($query);

        return $stmt;
    }

    function getDataBy($pdo, $table, $name)
    {
        $query = "SELECT * FROM `".$table."` WHERE `name` LIKE '".$name."%' ;";
        $stmt = $pdo->query($query);

        return $stmt;
    }
}