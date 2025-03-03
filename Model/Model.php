<?php
include_once "Banco_dados.php";

class Model{
private $data;

public function setData($data){
    $this->data = $data;
}

public function getData(){
   return $this->data;
}

public function include($data){
    $data = json_decode($data, true);
    $bd = new BancoDados();

    $sql = "INSERT INTO `tasks` (`name`, `description`, `person`, `submit_date`) 
    VALUES (:name, :description, :person, :date)";

    $person =  json_encode($data[2], JSON_UNESCAPED_UNICODE);
    $date = date('Y-m-d', strtotime($data[3])); 
    
    $stmt = $bd->PDO->prepare($sql);
    $stmt->bindParam(':name', $data[0]);
    $stmt->bindParam(':description', $data[1]);
    $stmt->bindParam(':person', $person, PDO::PARAM_STR);
    $stmt->bindParam(':date', $date);

    $stmt->execute();
}

public function update($data){
    $data = json_decode($data, true);
    $bd = new BancoDados();
    $sql = "UPDATE `tasks` 
    SET `name` = :name, 
        `description` = :description, 
        `person` = :person, 
        `submit_date` = :date
    WHERE `id` = :id";

    $person =  json_encode($data[3], JSON_UNESCAPED_UNICODE);
    $date = date('Y-m-d', strtotime($data[4])); 
    
    $stmt = $bd->PDO->prepare($sql);
    $stmt->bindParam(':id', $data[0], PDO::PARAM_INT);
    $stmt->bindParam(':name', $data[1]);
    $stmt->bindParam(':description', $data[2]);
    $stmt->bindParam(':person', $person, PDO::PARAM_STR);
    $stmt->bindParam(':date', $date);

    $stmt->execute();
}

public function done($data){
    $bd = new BancoDados();
    $data = json_decode($data, true);
    $sql = "update `tasks` set `status` = 0 where `id` = :id";

    $stmt = $bd->PDO->prepare($sql);
    $stmt->bindParam(':id', $data[0], PDO::PARAM_INT);

    $stmt->execute();
}
public function log($data){
    $bd = new BancoDados();
    $data = json_decode($data, true);
    $sql = "select * from `users` where `login` = :login and `password` = :password";

    
    $stmt = $bd->PDO->prepare($sql);
    $stmt->bindParam(':login', $data[0]);
    $stmt->bindParam(':password', $data[1]);
    $stmt->execute();
    if ($stmt->rowCount() == 1 ){
        return true;
    }else{
        return false;
    }

}
public function showToDo(){
    $bd = new Bancodados;
    $sql = "select * from tasks 
    where `status` = 1";

    $stmt = $bd->PDO->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function showDone(){
    $bd = new Bancodados;
    $sql = "select * from tasks 
    where `status` = 0";

    $stmt = $bd->PDO->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function search($data) {
    var_dump($data);
    $bd = new BancoDados();
    
    $sql = "SELECT * FROM `tasks` 
            WHERE `person` LIKE :pessoa 
            OR `name` LIKE :pessoa 
            OR `description` LIKE :pessoa";

    $stmt = $bd->PDO->prepare($sql);
    $searchTerm = "%" . $data . "%";
    $stmt->bindParam(':pessoa', $searchTerm, PDO::PARAM_STR);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


public function include_user($data){
    $data = json_decode($data, true);
    $bd = new BancoDados();

    $sql = "INSERT INTO `users` (`login`, `password`) 
    VALUES (:login, :password)";

    $stmt = $bd->PDO->prepare($sql);
    $stmt->bindParam(':login', $data[0]);
    $stmt->bindParam(':password', $data[1]);
    $stmt->execute();
    header("location:../login.php");
}
}






?>