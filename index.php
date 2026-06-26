<?php
include('dbconnection.php');

$search = "";

if(isset($_GET['search']))
{
    $search = $_GET['search'];

    $result = mysqli_query(
        $con,
        "SELECT * FROM users
         WHERE fname LIKE '%$search%'
         OR lname LIKE '%$search%'"
    );
}
else
{
    $result = mysqli_query(
        $con,
        "SELECT * FROM users"
    );
}
?>

<!DOCTYPE html>
<html>
<head>
<title>View Records</title>

<link rel="stylesheet"
href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

</head>

<body>

<div class="container mt-5">

<h2>User Records</h2>

<a href="create.php" class="btn btn-success mb-3">
Add New User
</a>

<form method="GET" class="mb-3">
<input
type="text"
name="search"
class="form-control"
placeholder="Search user by name"
value="<?php echo $search; ?>">
</form>

<table class="table table-bordered table-striped">

<tr>
<th>ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Phone</th>
<th>Email</th>
<th>Address</th>
<th>Actions</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['fname']; ?></td>
<td><?php echo $row['lname']; ?></td>
<td><?php echo $row['contactno']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['address']; ?></td>

<td>

<a href="edit.php?id=<?php echo $row['id']; ?>"
class="btn btn-warning btn-sm">
Edit
</a>

<a href="delete.php?id=<?php echo $row['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Delete this record?')">
Delete
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>