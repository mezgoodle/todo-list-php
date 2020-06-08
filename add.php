<?php
    if (isset($_POST['sendTask'])) {
        $task = $_POST['task'];
        if (trim($task) == '') {
            echo 'Enter a task';
            exit();
        }

        $dsn = 'mysql:host=localhost;dbname=todo-list';
        $pdo = new PDO($dsn, 'root', '');

        $sql = 'INSERT INTO tasks(task) VALUES(:task)';
        $query = $pdo->prepare($sql);
        $query->execute(['task' => $task]);

        header('Location: /');
    }
    