<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Homepage</title>
    <link href='//fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body {
            margin: 50px 0 0 0;
            padding: 0;
            width: 100%;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            text-align: center;
            color: #aaa;
            font-size: 18px;
        }

        h1 {
            color: #111185;
            letter-spacing: -3px;
            font-family: 'Lato', sans-serif;
            font-size: 100px;
            font-weight: 200;
            margin-bottom: 0;
        }

        div{
            box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px;
        }









    </style>
</head>
<body>
<div>
<h1>Tasks</h1><br>
<form action="/tasks/add" method="post">
    <label for="task_name">Task:</label>
    <input id="task_name" type="text" name="task_name">
    <input type="submit" value="Add the task"/>
</form><br>
<?php
foreach ($tasks as $task) {
    echo '<span>' . $task['task_name'] . '</span>' . ' <form action="/tasks/completed/' . $task['id'] . '" method="post"><input type="submit" value="✓"></form>' . '<form action="/editTask/' .$task['id'] . '" method="get"> <input type="submit" value="✎"></form>' . '<br>';
}
?>

<p><a href="/completedTasks">See completed tasks</a></p>
</div>
</body>
</html>
