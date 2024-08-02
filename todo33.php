<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>

</head>

<body>
    <div class="container">
        <h1>Todo List</h1>
        <form action="ex44.php" method="POST">
            <input type="text" name="task" placeholder="Enter a new task" required>
            <button type="submit" name="submit">Add Task</button>
        </form>


        <ul class="task-list">

        </ul>
    </div>
    <?php
    session_start();
    if (!isset($_SESSION['tasks'])) {
        $_SESSION['tasks'] = array();
    }

    // Handle task addition
    if (isset($_POST['submit']) && !empty($_POST['task'])) {
        $new_task = $_POST['task'];
        array_push($_SESSION['tasks'], array('task' => $new_task));
    }


    // Display tasks
    foreach ($_SESSION['tasks'] as $key => $task) {
        $task_text = htmlspecialchars($task['task']);
        echo "<li >$task_text 
          </li>";
    }
    ?>
</body>

</html>