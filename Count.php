<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
    <style>
        table{
            border:2;
            width:40%;
            display:flex;
            justify-content:center;
            align-items:center;
        }
        table {
            border: 2px solid black; /* Added border style */
            width: 80%; /* Adjusted table width */
            margin: 20px auto; /* Centered table */
            border-collapse: collapse; /* Merge borders */
        }

        th, td {
            border: 1px solid black; /* Table cell border */
            padding: 10px; /* Cell padding */
            text-align: center; /* Center text */
        }

        th {
            background-color: #f2f2f2; /* Header background color */
        }
    </style>
</head>
<body>
   <table border="2" >
        <tr>
               <th> ROLL_NO</th>
               <th> CANDIDATE_NAME</th>
               <th> EMAIL_ID</th>
               <th> COMPANY_NAME</th>
               <th> PACKAGE</th>
        </tr>
   </table>
    
</body>
</html>
<?php
// Assuming your database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


function displayResults($data) {
    // Define styles for alternating row colors
    $rowStyles = [
        "even" => "background-color: #f9f9f9;",
        "odd" => "background-color: #ffffff;",
    ];

    if ($data->num_rows > 0) {
        $isEven = true; // Track whether the row index is even or odd
        while ($row = $data->fetch_assoc()) {
            $rowClass = $isEven ? "even" : "odd"; // Alternate row class
            $style = $rowStyles[$rowClass]; // Apply appropriate style

            echo "<tr style='$style'>
                    <td class='cell'>" . htmlspecialchars($row["ROLL_NO"]) . "</td>
                    <td class='cell'>" . htmlspecialchars($row["CANDIDATE_NAME"]) . "</td>
                    <td class='cell'>" . htmlspecialchars($row["EMAIL_ID"]) . "</td>
                    <td class='cell'>" . htmlspecialchars($row["COMPANY_NAME"]) . "</td>
                    <td class='cell'>" . htmlspecialchars($row["PACKAGE"]) . "</td>
                  </tr>";
            $isEven = !$isEven; // Toggle for next row
        }
    } else {
        echo "<tr><td colspan='5'>No results found</td></tr>";
    }
}


global $conn;
// Query to get all data from your_table_name
$sql = "SELECT * FROM records_students";
$result = $conn->query($sql);
displayResults($data);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "ROLL_NO: " . $row["ROLL_NO"]. " CANDIDATE_NAME: " . $row["CANDIDATE_NAME"]. "  EMAIL_ID: " . $row["EMAIL_ID"]. " COMPANY_NAME: " . $row["COMPANY_NAME"]." PACKAGE: " . $row["PACKAGE"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
