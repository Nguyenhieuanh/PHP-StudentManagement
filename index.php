<?php
include "class/StudentsManagement.php";
include "class/Student.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $searchName = $_REQUEST['searchName'];
}

$studentManagement = new StudentsManagement("data/data.json");
$students = $studentManagement->searchByName($searchName);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lý nhân sự</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>
    th, td {
        text-align: center;
    }
</style>
<body>


<br>
<div class="container">
    <div style="float: left; position: absolute"><h2>Students List</h2></div>
    <form method="post" style="margin: 15px; width: 400px;">
        <br/>
        <div style="margin-left: 700px; overflow: hidden; width: 500px">
            <div style="float: left;">
                <input class="form-control" type="text" name="searchName" placeholder="Search by Name" style=" width: 300px; margin-right: 10px">
            </div>
            <div style="float: left">
                <button type="submit" class="btn btn-outline-secondary">Search</button>
            </div>
        </div>
    </form>
    <table class="table table-striped">
        <tr class="table-active">
            <th style="text-align: center">STT</th>
            <th>Full name</th>
            <th style="text-align: center">Age</th>
            <th>Phone number</th>
            <th>Email</th>
            <th>Address</th>
            <th>Image</th>
            <th>&ensp;</th>
        </tr>
        <?php foreach ($students as $index => $student): ?>
            <tr>
                <td style="text-align: center"><?php echo $index + 1 ?></td>
                <td><?php echo $student->getName() ?></td>
                <td style="text-align: center"><?php echo $student->getAge()?></td>
                <td><?php echo $student->getPhone()?></td>
                <td><?php echo $student->getEmail()?></td>
                <td><?php echo $student->getAddress()?></td>
                <td><img width="70px" src="<?php echo "upload/". $student->getImage()?>"></td>
                <td><a onclick="return confirm('Are you sure you want to delete ?')"
                       href="action/delete.php?index=<?php echo $index?>">Delete</a>
                    <span>|</span>
                    <a href="view/edit.php?index=<?php echo $index?>">Update</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br/>
    <div class="card" style="width: 10rem;">
        <a href="view/add.php" class="btn btn-primary stretched-link">Add new Student</a>
    </div>
</div>
</body>
</html>