<?php
session_start(); 
include_once "../Model/model.php"; 
if(isset($_SESSION['tasks'])){
$show = $_SESSION['tasks'];
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
unset($_SESSION['tasks']);
} else {
    echo "Nenhuma tarefa encontrada.";
}