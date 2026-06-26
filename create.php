<?php

include('dbconnection.php');

if(isset($_POST['submit']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contactno = $_POST['contactno'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $query = "INSERT INTO users
    (fname,lname,contactno,email,address)
    VALUES
    ('$fname','$lname','$contactno','$email','$address')";

    if(mysqli_query($con, $query))
    {
        echo "<script>
        alert('Data Inserted Successfully');
        window.location='index.php';
        </script>";
    }
    else
    {
        echo "<script>
        alert('Failed to Insert Data');
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">

<title>User Registration</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<style>
body {
    color: #fff;
    background: #63738a;
    font-family: 'Roboto', sans-serif;
}

.form-control {
    height: 40px;
}

.signup-form {
    width: 500px;
    margin: 50px auto;
}

.signup-form form {
    background: #f2f3f7;
    padding: 30px;
    border-radius: 5px;
    color: #333;
}

.signup-form h2 {
    text-align: center;
    margin-bottom: 20px;
}

.btn-success {
    width: 100%;
}
</style>

</head>

<body>

<div class="signup-form">

<form method="POST">

<h2>User Registration</h2>

<div class="form-group">
<div class="row">

<div class="col">
<input type="text"
class="form-control"
name="fname"
placeholder="First Name"
required>
</div>

<div class="col">
<input type="text"
class="form-control"
name="lname"
placeholder="Last Name"
required>
</div>

</div>
</div>

<div class="form-group">
<input type="text"
class="form-control"
name="contactno"
placeholder="Phone Number"
required>
</div>

<div class="form-group">
<input type="email"
class="form-control"
name="email"
placeholder="Email Address"
required>
</div>

<div class="form-group">
<textarea
class="form-control"
name="address"
placeholder="Address"
required></textarea>
</div>

<div class="form-group">
<button
type="submit"
name="submit"
class="btn btn-success">
Submit
</button>
</div>

</form>

<div class="text-center">
<a href="index.php" class="text-white">
View Records
</a>
</div>

</div>

</body>
</html>