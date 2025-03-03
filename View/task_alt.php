<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/eee.css">
    <title>ALtere</title>
</head>
<body>
    <?php ?>
    <form action="../Controller/controller.php" method="post" id="form">
        <input type="hidden" name="alt">
        <input class="form-control me-2" type="search" placeholder="Search" value="<?php echo $_POST['id']?>" name="id" readonly>
        <input class="form-control me-2" type="search" placeholder="Tarefa"  name="task">
        <input class="form-control me-2" type="search" placeholder="Descrição" name="description">
        <input class="form-control me-2" type="search" placeholder="Pessoas" name="person">
        <input type="date" name="date" >
        <button class="btn btn-outline-success" type="submit" id="botao_task">alt demanda</button>

      </form>
</body>
</html>
</body>
</html>