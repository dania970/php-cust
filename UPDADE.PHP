<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_salaries'])) {

    $stmt = $conn->prepare("UPDATE employees SET SALARY = ? WHERE ID = ?");

    if ($stmt) {
        foreach ($_POST['salaries'] as $id => $salary) {
            $salary = floatval($salary);
            $stmt->bind_param('di', $salary, $id);
            $stmt->execute();
        }
        $successMessage = "Salaries updated successfully!";
        $stmt->close();
    } else {
        $errorMessage = "Failed to prepare the statement.";
    }
}
$sql = "SELECT ID, NAME, SALARY FROM employees";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Update salary</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #cfd1d1;
        }

        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .message {
            padding: 10px;
            margin: 20px 0;
            border-radius: 5px;
            text-align: center;
        }

        .success {
            background-color: #deb1ab;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #deb1ab;
        }

        form {
            margin: 20px 0;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #c4bfbe;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        form input[type="number"] {
            padding: 10px;
            border: 1px solid #c4bfbe;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }

        form input[type="submit"] {
            background-color: #d38ef5;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #c4bfbe;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #bfbfbf;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
            background-color: #e8cef5;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .actions {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Update Employee Salaries</h2>

        <?php if (isset($successMessage)) : ?>
            <div class="message success"><?php echo htmlspecialchars($successMessage); ?></div>
        <?php endif; ?>

        <?php if (isset($errorMessage)) : ?>
            <div class="message error"><?php echo htmlspecialchars($errorMessage); ?></div>
        <?php endif; ?>
        <form method="post" action="">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Current Salary</th>
                    <th>New Salary</th>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['ID']}</td>";
                        echo "<td>{$row['NAME']}</td>";
                        echo "<td>" . number_format($row['SALARY'], 2) . "</td>";
                        echo "<td><input type='number' step='0.01' name='salaries[{$row['ID']}]' value='" . number_format($row['SALARY'], 2) . "'></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No employees found</td></tr>";
                }
                ?>
            </table>
            <input type="submit" name="update_salaries" value="Update Salaries">
        </form>
    </div>
</body>

</html>