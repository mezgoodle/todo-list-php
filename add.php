<?php
    if (isset($_POST['sendTask'])) {
        $task = $_POST['task'];
        if (trim($task) == '') {
            echo 'Enter a task';
            exit();
        }

        require_once('./db.php');

        $sql = 'INSERT INTO tasks(task) VALUES(:task)';
        $query = $pdo->prepare($sql);
        $query->execute(['task' => $task]);

        header('Location: /');
    }
    