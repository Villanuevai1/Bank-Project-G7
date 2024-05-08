<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch transactions data from 'data' table
$sql = "SELECT * FROM data";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <style>
        .container {
            max-width: 900px;
            font-family: sans-serif;
            margin: auto;
        }
        th {
            text-align: center;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-spacing: 0;
            border-collapse: collapse;
        }
        table th,
        table td {
            padding: 15px 0;
            border-bottom: 1px solid #cacaca;
            text-align: left;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <?php include('php/backend_Adminnavbar.php'); ?>

    <div class="container">
        <h2>Transaction History</h2>
        <table>
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Payer</th>
                    <th>Payer Acc ID</th>
                    <th>Payee</th>
                    <th>Payee Acc ID</th>
                    <th>Amount</th>
                    <th>Date & Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['sno'] . "</td>";
                        echo "<td>" . $row['payer'] . "</td>";
                        echo "<td>" . $row['payerAcc'] . "</td>";
                        echo "<td>" . $row['payee'] . "</td>";
                        echo "<td>" . $row['payeeAcc'] . "</td>";
                        echo "<td>$" . $row['amount'] . "</td>"; // Assuming amount is numeric (currency)
                        echo "<td>" . $row['time'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No transactions found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
// Close database connection
$conn->close();
?>

