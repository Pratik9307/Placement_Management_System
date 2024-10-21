<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
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

<form method="POST">
    <div style="text-align: center; margin-bottom: 20px;">
        <button name="Armstrong">Show Armstrong Students</button>
        <button name="Klassic">Show Klassic Students</button>
        <button name="Jscontrol">Show JS_Control Students</button>
        <button name="Tefologhic">Show Tefologic Students</button>
        <button name="toyota">Show Toyota Students</button>
        <button name="Renata">Show Renata Students</button>
        <button name="Byjus">Show Byjus Students</button>
        <button name="wallspace">Show Wallspace Students</button>
        <button name="Deloitte">Show Deloitte Students</button>
        <button name="Report">Show All Students</button>
        <button name="insert">Insert Data</button>
        <button name="log-out">Log Out</button>
    </div>
	
</form>

<table>
    <thead>
        <tr>
            <th>ROLL_NO</th>
            <th>CAN DIDATE_NAME</th>
            <th>EMAIL_ID</th>
            <th>COMPANY_NAME</th>
            <th>PACKAGE</th>
        </tr>
    </thead>
    <tbody>
        <!-- Data rows will be inserted here by PHP -->
    </tbody>
</table>

<table>
   
    <?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "database_management";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        echo "Connection failed: ", $conn->connect_error;
    }

     // Function to display results in table format
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
	
    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["Armstrong"])) {
            $sql = "SELECT `ROLL_NO`, `CANDIDATE_NAME`, `EMAIL_ID`, `COMPANY_NAME`, `PACKAGE` FROM `records_students` WHERE COMPANY_NAME='Armstrong';";
            $data = $conn->query($sql);
            displayResults($data);
        }
	}
global $conn;
global $num1;
global $count;
// All Count of Student
if(isset($_POST["totalcount"])) {
	// Return the fixed value of 85
	$num1=200;
	echo $num1;
} 	



//  all Placed Student Data
if(isset($_POST["PlacedStudent"])) {
	$sql ="SELECT COUNT(*) AS Placed_Student FROM records_students";
$result = $conn->query($sql); 
if ($result->num_rows > 0) {
    // Fetch the total count from the result
    $row = $result->fetch_assoc();
    $Placed_Student1= $row["Placed_Student"];
    // Display the total count
	$count=intval($Placed_Student1);
    echo  $count;
} else {
    echo "0 results";
}
}

if(isset($_POST["Waitlisted"])) {
	$result1=$num1-$count;
	echo $result1;

} 


if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(isset($_POST["Armstrong"])){
		$sql="SELECT `ROLL_NO`, `CANDIDATE_NAME`, `EMAIL_ID`, `COMPANY_NAME`, `PACKAGE` FROM `records_students` WHERE COMPANY_NAME=\"Armstrong\";";
		$data=$conn->query($sql);
		displayResults($data);
		if($data->num_rows > 0){
			while($row=$data->fetch_assoc()){
				echo "ROLL_NO:".$row["ROLL_NO"],"CANDIDATE_NAME :".$row["CANDIDATE_NAME"],"EMAIL_ID:".$row["EMAIL_ID"],"COMPANY_NAME :".$row["COMPANY_NAME"],"PACKAGE :".$row["PACKAGE"],"LPA <br>";
			}
		}
	}
	if(isset($_POST["Klassic"])){
		$sql="SELECT `Roll_No`, `CANDIDATE_NAME`, `EMAIL_ID`, `COMPANY_NAME`, `PACKAGE` FROM `records_students` WHERE COMPANY_NAME=\"Klassic wheel\";";
		$data=$conn->query($sql);
		displayResults($data);
		if($data->num_rows > 0){
			while($row=$data->fetch_assoc()){
				echo "ROLL_NO:".$row["ROLL_NO"],"CANDIDATE_NAME :".$row["CANDIDATE_NAME"],"EMAIL_ID :".$row["EMAIL_ID"],"COMPANY_NAME :".$row["COMPANY_NAME"],"PACKAGE :".$row["PACKAGE"],"LPA <br>";
			}
		}
	}
	if(isset($_POST["Jscontrol"])){
		$sql="SELECT `ROLL_NO`, `CANDIDATE_NAME`, `EMAIL_ID`, `COMPANY_NAME`, `PACKAGE` FROM `records_students` WHERE COMPANY_NAME=\"JS_Control\";";
		$data=$conn->query($sql);
		displayResults($data);
		if($data->num_rows > 0){
			while($row=$data->fetch_assoc()){
				echo "ROLL_NO:".$row["ROLL_NO"],"CANDIDATE_NAME :".$row["CANDIDATE_NAME"],"EMAIL_ID:".$row["EMAIL_ID"],"COMPANY_NAME :".$row["COMPANY_NAME"],"PACKAGE :".$row["PACKAGE"],"LPA <br>";
			}
		}
	}
	if(isset($_POST["Tefologhic"])){
		$sql="SELECT `ROLL_NO`, `CANDIDATE_NAME`, `EMAIL_ID`, `COMPANY_NAME`, `PACKAGE` FROM `records_students` WHERE COMPANY_NAME=\"Tefologic\";";
		$data=$conn->query($sql);
		displayResults($data);
		if($data->num_rows > 0){
			while($row=$data->fetch_assoc()){
				echo "ROLL_NO:".$row["ROLL_NO"],"CANDIDATE_NAME :".$row["CANDIDATE_NAME"],"EMAIL_ID:".$row["EMAIL_ID"],"COMPANY_NAME :".$row["COMPANY_NAME"],"PACKAGE :".$row["PACKAGE"],"LPA <br>";
			}
		}
	}
	if(isset($_POST["toyota"])){
		$sql="SELECT `ROLL_NO`, `CANDIDATE_NAME`, `EMAIL_ID`, `COMPANY_NAME`, `PACKAGE` FROM `records_students` WHERE COMPANY_NAME=\"Toyota\";";
		$data=$conn->query($sql);
		displayResults($data);
		if($data->num_rows > 0){
			while($row=$data->fetch_assoc()){
				echo "ROLL_NO:".$row["ROLL_NO"],"CANDIDATE_NAME :".$row["CANDIDATE_NAME"],"EMAIL_ID:".$row["EMAIL_ID"],"COMPANY_NAME :".$row["COMPANY_NAME"],"PACKAGE :".$row["PACKAGE"],"LPA <br>";
			}
		}
	}
	if(isset($_POST["Renata"])){
		$sql="SELECT `ROLL_NO`, `CANDIDATE_NAME`, `EMAIL_ID`, `COMPANY_NAME`, `PACKAGE` FROM `records_students` WHERE COMPANY_NAME=\"Renata\";";
		$data=$conn->query($sql);
		displayResults($data);
		if($data->num_rows > 0){
			while($row=$data->fetch_assoc()){
				echo "ROLL_NO:".$row["ROLL_NO"],"CANDIDATE_NAME :".$row["CANDIDATE_NAME"],"EMAIL_ID:".$row["EMAIL_ID"],"COMPANY_NAME :".$row["COMPANY_NAME"],"PACKAGE :".$row["PACKAGE"],"LPA <br>";
			}
		}
	}
	if(isset($_POST["Byjus"])){
		$sql="SELECT `ROLL_NO`, `CANDIDATE_NAME`, `EMAIL_ID`, `COMPANY_NAME`, `PACKAGE` FROM `records_students` WHERE COMPANY_NAME=\"Byjus\";";
		$data=$conn->query($sql);
		displayResults($data);
		if($data->num_rows > 0){
			while($row=$data->fetch_assoc()){
				echo "ROLL_NO:".$row["ROLL_NO"],"CANDIDATE_NAME :".$row["CANDIDATE_NAME"],"EMAIL_ID:".$row["EMAIL_ID"],"COMPANY_NAME :".$row["COMPANY_NAME"],"PACKAGE :".$row["PACKAGE"],"LPA  <br>";
			}
		}
	}
	if(isset($_POST["wallspace"])){
		$sql="SELECT `ROLL_NO`, `CANDIDATE_NAME`, `EMAIL_ID`, `COMPANY_NAME`, `PACKAGE` FROM `records_students` WHERE COMPANY_NAME=\"Wallspace\";";
		$data=$conn->query($sql);
		displayResults($data);
		if($data->num_rows > 0){
			while($row=$data->fetch_assoc()){
				echo "ROLL_NO:".$row["ROLL_NO"],"CANDIDATE_NAME :".$row["CANDIDATE_NAME"],"EMAIL_ID:".$row["EMAIL_ID"],"COMPANY_NAME :".$row["COMPANY_NAME"],"PACKAGE :".$row["PACKAGE"],"LPA  <br>";
			}
		}
	}
	if(isset($_POST["Deloitte"])){
		$sql="SELECT `ROLL_NO`, `CANDIDATE_NAME`, `EMAIL_ID`, `COMPANY_NAME`, `PACKAGE` FROM `records_students` WHERE COMPANY_NAME=\"Deloitte\";";
		$data=$conn->query($sql);
		displayResults($data);
		if($data->num_rows > 0){
			while($row=$data->fetch_assoc()){
				echo "ROLL_NO:".$row["ROLL_NO"],"CANDIDATE_NAME :".$row["CANDIDATE_NAME"],"EMAIL_ID:".$row["EMAIL_ID"],"COMPANY_NAME :".$row["COMPANY_NAME"],"PACKAGE :".$row["PACKAGE"],"LPA  <br>";
			}
		}
	}
	if(isset($_POST["Report"])){
		$sql = "SELECT * FROM records_students";
        $result = $conn->query($sql);


if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "ROLL_NO: " . $row["ROLL_NO"]. " CANDIDATE_NAME: " . $row["CANDIDATE_NAME"]. "  EMAIL_ID: " . $row["EMAIL_ID"]. " COMPANY_NAME: " . $row["COMPANY_NAME"]." PACKAGE: " . $row["PACKAGE"]. "<br>";
    }
} else {
    echo "0 results";
}
	}
	
	// Process form submission only if the button named "Insert_Data" is clicked
if (isset($_POST['insert'])) {
    // Your PHP code to insert data into the database or perform any other action goes here

    // Redirect to another PHP page after processing the data
    header("Location: insert.php");
    exit(); // Ensure no further code is executed after redirection
}
if (isset($_POST['log-out'])) {
    // Your PHP code to insert data into the database or perform any other action goes here

    // Redirect to another PHP page after processing the data
    header("Location: index.php");
    exit(); // Ensure no further code is executed after redirection
}
	
	
	
}
$conn->close();
?>
