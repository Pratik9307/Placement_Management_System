<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Into Database</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .container {
            background-color: #ffffff;
            width: 400px;
            border-radius: 10px;
            border: 1px solid #ddd;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .child-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .child-container div {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .child-container div h5 {
            flex-basis: 40%;
            margin: 0;
            color: #555;
        }

        .child-container div input {
            flex-basis: 55%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: border 0.3s;
        }

        .child-container div input:focus {
            border-color: #007BFF;
            outline: none;
        }

        .Sub-btn {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .Sub-btn input {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .Sub-btn input:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .Sub-btn input:active {
            transform: translateY(1px);
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <h1>Insert Into Database</h1>
        <div class="container">
            <div class="child-container">
                <div>
                    <h5>ROLL_NO</h5>
                    <input type="text" name="rollno" required>
                </div>
                <div>
                    <h5>CANDIDATE_NAME</h5>
                    <input type="text" name="name" required>
                </div>
                <div>
                    <h5>EMAIL_ID</h5>
                    <input type="email" name="email" required>
                </div>
                <div>
                    <h5>COMPANY_NAME</h5>
                    <input type="text" name="company" required>
                </div>
                <div>
                    <h5>PACKAGE</h5>
                    <input type="text" name="package" required>
                </div>
            </div>
            <div class="Sub-btn">  
                <input type="submit" name="Submit" value="Submit">
            </div>
        </div>
    </form>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "database_management";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['Submit'])) {
        $RollNo = $_POST['rollno'];
        $Name = $_POST['name'];
        $email = $_POST['email'];
        $company = $_POST['company'];
        $package = $_POST['package'];

        $sql = "INSERT INTO records_students (ROLL_NO, CANDIDATE_NAME, EMAIL_ID, COMPANY_NAME, PACKAGE) VALUES ('$RollNo', '$Name', '$email', '$company', '$package')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Data inserted!');</script>";
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
    }

    $conn->close();
    ?>
</body>
</html>
