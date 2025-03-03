<?php
include_once "../Model/Model.php";

if (!session_start()){
    session_start();
}

if(isset($_POST['alt']) || isset($_POST['include'])){
$person = explode(",", $_POST['person']);
$data = json_encode([$_POST['task'], $_POST['description'], $person, 
$_POST['date']], JSON_UNESCAPED_UNICODE);

if (isset($_POST['include'])) {
    $md = new Model();
    $md->setData($data);
    $md->include($data);
    header("location:../index.php");
}

if (isset($_POST['alt'])) {

    $person = explode(",", $_POST['person']);
    $data = json_encode([$_POST['id'], $_POST['task'], $_POST['description'], $person, $_POST['date']], JSON_UNESCAPED_UNICODE);
    
    $md = new Model();
    $md->setData($data);
    $md->update($data);
    header("location:../index.php");
}
}
if (isset($_POST['desativar'])) {
    var_dump($_POST);
    $data = json_encode([$_POST['id']],  JSON_UNESCAPED_UNICODE);
    var_dump($data);
    $md = new Model();
    $md->getData();
    $md->done($data);
    header("location:../index.php");
}

if (isset($_POST['log'])) {
    session_start();
    $password = hash("sha256", $_POST['senha']);
    $data = json_encode([$_POST['email'], $password], JSON_UNESCAPED_UNICODE);
    
    $md = new Model();
    $md->setData($data);

    if($md->log($data)){
        $_SESSION['logado'] = true;
        header("location:../index.php");
    }else{
        echo 'Deu pau!';
    }
   // header("location:../index.php");
}


if (isset($_POST['search'])) {
    $data = trim($_POST['search']); 
    if (!empty($data)) {
        $md = new Model();
        $searchResults = $md->search($data);
        $_SESSION['tasks'] = $searchResults;

    }
    header('Location: ../view/search_results.php'); 
    exit;
}




if (isset($_POST['include_user'])) {
    $password = hash("sha256", $_POST['senha']);
    $data = json_encode([$_POST['email'], $password], JSON_UNESCAPED_UNICODE);
    
    $md = new Model();
    $md->setData($data);

    $md->include_user($data);
}