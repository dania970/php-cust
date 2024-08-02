<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete_id']) && !empty($_POST['delete_id'])) {
        $id = intval($_POST['delete_id']);

        $stmt = $conn->prepare("DELETE FROM employees WHERE ID = ?");
        if ($stmt) {
            $stmt->bind_param('i', $id);

            if ($stmt->execute()) {
                $successMessage = "Employee with ID $id has been deleted successfully!";
            } else {
                $errorMessage = "Error deleting employee: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $errorMessage = "Failed to prepare the statement.";
        }
    }

    if (isset($_POST['update_id']) && !empty($_POST['update_id'])) {
        $id = intval($_POST['update_id']);
        $name = $_POST['update_name'];
        $salary = floatval($_POST['update_salary']);
        $off_days = intval($_POST['update_off_days']);

        $stmt = $conn->prepare("UPDATE employees SET NAME = ?, SALARY = ?, OFF_DAYS = ? WHERE ID = ?");
        if ($stmt) {
            $stmt->bind_param('sdii', $name, $salary, $off_days, $id);

            if ($stmt->execute()) {
                $successMessage = "Employee with ID $id has been updated successfully!";
            } else {
                $errorMessage = "Error updating employee: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $errorMessage = "Failed to prepare the statement.";
        }
    }

    if (isset($_POST['create_name']) && !empty($_POST['create_name'])) {
        $name = $_POST['create_name'];
        $salary = floatval($_POST['create_salary']);
        $off_days = intval($_POST['create_off_days']);

        $stmt = $conn->prepare("INSERT INTO employees (NAME, SALARY, OFF_DAYS) VALUES (?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param('sdi', $name, $salary, $off_days);

            if ($stmt->execute()) {
                $successMessage = "New employee has been created successfully!";
            } else {
                $errorMessage = "Error creating employee: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $errorMessage = "Failed to prepare the statement.";
        }
    }
}

$sql = "SELECT ID, NAME, SALARY, OFF_DAYS FROM employees";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Manage Employees</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }

        h2 {
            color: #333;
        }

        .message {
            padding: 10px;
            margin: 20px 0;
            border-radius: 5px;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        form {
            margin: 20px 0;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
        }

        form input[type="text"],
        form input[type="number"] {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: calc(100% - 22px);
            box-sizing: border-box;
        }

        form input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .actions form {
            display: inline;
        }

        .actions input[type="submit"] {
            padding: 5px 10px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Manage Employees</h2>

        <?php if (isset($successMessage)) : ?>
            <div class="message success"><?php echo htmlspecialchars($successMessage); ?></div>
        <?php endif; ?>

        <?php if (isset($errorMessage)) : ?>
            <div class="message error"><?php echo htmlspecialchars($errorMessage); ?></div>
        <?php endif; ?>

        <h3>Create New Employee</h3>
        <form method="post" action="">
            <label>Name:</label>
            <input type="text" name="create_name" required>
            <label>Salary:</label>
            <input type="number" step="0.01" name="create_salary" required>
            <label>Off Days:</label>
            <input type="number" name="create_off_days" required>
            <input type="submit" value="Create Employee">
        </form>

        <h3>Manage Employees</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Salary</th>
                <th>Off Days</th>
                <th>Actions</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['ID']}</td>";
                    echo "<td>{$row['NAME']}</td>";
                    echo "<td>{$row['SALARY']}</td>";
                    echo "<td>{$row['OFF_DAYS']}</td>";
                    echo "<td class='actions'>
                            <form method='post' action='' style='display:inline;'>
                                <input type='hidden' name='delete_id' value='{$row['ID']}'>
                                <input type='submit' value='Delete'>
                            </form>
                            <form method='post' action='' style='display:inline;'>
                                <input type='hidden' name='update_id' value='{$row['ID']}'>
                                <input type='text' name='update_name' value='{$row['NAME']}' required>
                                <input type='number' step='0.01' name='update_salary' value='{$row['SALARY']}' required>
                                <input type='number' name='update_off_days' value='{$row['OFF_DAYS']}' required>
                                <input type='submit' value='Update'>
                            </form>
                        </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No records found</td></tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>