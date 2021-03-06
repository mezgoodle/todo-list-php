<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo list</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>TODO list</h1>
    <form action="/add.php" method="post">
        <input type="text" class="form-control" name="task" id="task" placeholder="Need to do..">
        <button type="submit" name="sendTask" class="btn btn-success">Send task</button>
    </form>
    <br>

    <?php 
        require_once('./db.php');

        echo '<ul class="list-group list-group-flush">';
        $query = $pdo->query('SELECT * FROM `tasks` ORDER BY `id` DESC');
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            echo '<li class="list-group-item list-group-item-action"><b>'.$row->task.'</b><a href="/delete.php?id='.$row->id.'"><button type="button" class="btn btn-danger">Delete</button></a></li>';
        }
        echo '</ul>';
    ?>
</div>
</body>
</html>