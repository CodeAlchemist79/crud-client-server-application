<?php

include('dbconnection.php');

$id = $_GET['id'];

$result = mysqli_query(
    $con,
    "SELECT * FROM users WHERE id='$id'"
);

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contactno = $_POST['contactno'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    mysqli_query(
        $con,
        "UPDATE users SET
        fname='$fname',
        lname='$lname',
        contactno='$contactno',
        email='$email',
        address='$address'
        WHERE id='$id'"
    );

    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Edit User</title>

<link rel="stylesheet"
href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

</head>

<body>

<div class="container mt-5">

<h2>Edit User</h2>

<form method="POST">

<input
type="text"
name="fname"
class="form-control mb-3"
value="<?php echo $row['fname']; ?>"
required>

<input
type="text"
name="lname"
class="form-control mb-3"
value="<?php echo $row['lname']; ?>"
required>

<input
type="text"
name="contactno"
class="form-control mb-3"
value="<?php echo $row['contactno']; ?>"
required>

<input
type="email"
name="email"
class="form-control mb-3"
value="<?php echo $row['email']; ?>"
required>

<textarea
name="address"
class="form-control mb-3"
required><?php echo $row['address']; ?></textarea>

<button
type="submit"
name="update"
class="btn btn-success">
Update User
</button>

<a href="index.php"
class="btn btn-secondary">
Back
</a>

</form>

</div>

</body>
</html>