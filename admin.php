<?php
include 'db.php';

$search = "";
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $conn->real_escape_string($_GET['search']);
}
$sql = "SELECT ID, NAME, SALARY, OFF_DAYS FROM employees WHERE NAME LIKE '%$search%'";
$result = $conn->query($sql);
$employees = [];
$max_salary = PHP_INT_MIN;
$min_salary = PHP_INT_MAX;
$total_salary = 0;
$total_adjusted_salary = 0;
$deduction_per_day = 10;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $employees[] = $row;
        $salary = $row['SALARY'];
        $deduction = $row['OFF_DAYS'] * $deduction_per_day;
        $adjusted_salary = $salary - $deduction;

        $total_salary += $salary;
        $total_adjusted_salary += $adjusted_salary;

        if ($salary > $max_salary) {
            $max_salary = $salary;
        }
        if ($salary < $min_salary) {
            $min_salary = $salary;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Salary Summary</title>
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
        }

        form {
            margin: 20px 0;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #deb1ab;
        }

        form input[type="text"] {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }

        form input[type="submit"] {
            background-color: #95b5e8;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #f8d7da;
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
            border: 1px solid #cdcfd1;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #679c9b;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .summary {
            margin: 20px 0;
        }

        .deduction-cell {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Employee Salary Summary</h2>
        <form method="get" action="">
            <label for="search">Search by Name:</label>
            <input type="text" id="search" name="search" value="<?php echo htmlspecialchars($search); ?>">
            <input type="submit" value="Search">
        </form>
        <h3>Employee Salary Details</h3>
        <?php if (count($employees) > 0) : ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Original Salary</th>
                    <th>Days Off</th>
                    <th>Deduction</th>
                    <th>Adjusted Salary</th>
                </tr>
                <?php foreach ($employees as $employee) : ?>
                    <?php
                    $deduction = $employee['OFF_DAYS'] * $deduction_per_day;
                    $adjusted_salary = $employee['SALARY'] - $deduction;
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($employee['ID']); ?></td>
                        <td><?php echo htmlspecialchars($employee['NAME']); ?></td>
                        <td><?php echo number_format($employee['SALARY'], 2); ?></td>
                        <td><?php echo number_format($employee['OFF_DAYS'], 2); ?></td>
                        <td class="deduction-cell"><?php echo number_format($deduction, 2); ?></td>
                        <td><?php echo number_format($adjusted_salary, 2); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <div class="summary">
                <table>
                    <tr>
                        <th>Highest Salary</th>
                        <td><?php echo number_format($max_salary, 2); ?></td>
                    </tr>
                    <tr>
                        <th>Lowest Salary</th>
                        <td><?php echo number_format($min_salary, 2); ?></td>
                    </tr>
                    <tr>
                        <th>Total Salary (Before Deductions)</th>
                        <td><?php echo number_format($total_salary, 2); ?></td>
                    </tr>
                    <tr>
                        <th>Total Adjusted Salary (After Deductions)</th>
                        <td><?php echo number_format($total_adjusted_salary, 2); ?></td>
                    </tr>
                </table>
            </div>
        <?php else : ?>
            <p>No salary data found.</p>
        <?php endif; ?>
    </div>
</body>

</html>