<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="View/CSS/eee.css?v=2">
    <title>Management Persona</title>
</head>
<body>
    <form action="controller/controller.php" method="post" id="form">
        <input type="hidden" name="include">
        <input class="form-control me-2" type="search" placeholder="Tarefa" value="" name="task">
        <input class="form-control me-2" type="search" placeholder="Descrição" value="" name="description">
        <input class="form-control me-2" type="search" placeholder="Pessoas" value="" name="person">
        <input type="date" name="date" id="" placeholder="data de entrega">
        <button class="btn btn-outline-success" type="submit" id="botao_task">Incluir demanda</button>
      </form>
      <p>To do:</p>
<div id= "search"> 
    <form action="Controller/Controller.php" method="post" id="search">
        <input class="form-control me-2" type="search" placeholder="procure..." value="" name="search">
       
        <button type="submit">Buscar</button>
    </form>
</div>
</body>
</html>

<?php
session_start();
if (isset($_SESSION['logado'])){
include_once "Model/model.php";
?>

<?php
$all = new Model();

$show = $all->showToDo();

foreach ($show as $infos) {
    echo "<p><div id='task'>";
    echo "Nome: " . $infos["name"] . "<br>";
    echo "Descrição: " . $infos["description"] . "<br>";
    echo "Pessoa: " . $infos["person"] . "<br>";
    echo "Data de Entrega: " . $infos["submit_date"] . "<br>";

    echo "<div class='botoes-container'><form method='post' action='view/task_alt.php'>";
    echo '<input type="hidden" name="id" value="' . $infos["id"] . '">';
    echo '<button type="submit" id="botao_task" name="action" value="alt">Alterar</button>';
    echo "</form>";

    echo "<form method='post' action='Controller/controller.php'>";
    echo '<input type="hidden" name="desativar" value="' . $infos["id"] . '">';
    echo '<input type="hidden" name="id" value="' . $infos["id"] . '">';
    echo '<button type="submit" id="botao_task" name="action" value="desativar">Feito</button>';
    echo "</div></div></form>";

}
echo '<p>Done:</p>';
$showDone = $all->showDone();

foreach ($showDone as $infos) {
    echo "<p><div id='doneTasks'>";
    echo "Nome: " . $infos["name"] . "<br>";
    echo "Descrição: " . $infos["description"] . "<br>";
    echo "Pessoa: " . $infos["person"] . "<br>";
    echo "Data de Entrega: " . $infos["submit_date"] . "<br>";
    echo "</div>";
}

}else{
    header('location:view/login.php');
    echo 'SEM LOGIN NAO VAI ENTRAR BEJO';
}
?>


</script>
