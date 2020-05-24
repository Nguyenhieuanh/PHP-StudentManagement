<?php
include "../class/Student.php";
include "../class/StudentsManagement.php";
$index = $_GET['index'];
$studentsManagement = new StudentsManagement("../data/data.json");
$student = $studentsManagement->getStudentByIndex($index);

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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script type='text/javascript'>
    function preview_image(event)
    {
        let reader = new FileReader();
        reader.onload = function()
        {
            let output = document.getElementById('output_image');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
<style>
    #output_image
    {
        max-width:300px;
    }
</style>
<body>
<form class="needs-validation" enctype="multipart/form-data" action="../action/update.php?index=<?php echo $index?>" method="post"
      style="margin-left: 20px; margin-top: 30px">
    <h2 style="margin-left: 13px">Edit Student</h2>
    <br/>
    <div class="col-md-4 mb-3">
        <label for="validationTooltip01">Full name</label>
        <input type="text" class="form-control" id="validationTooltip01" name="name"
               value="<?php echo $student->getName() ?>" required>
        <div class="valid-tooltip">
            Looks good!
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <label for="validationTooltip05">Age</label>
        <input type="number" class="form-control" id="validationTooltip05" name="age"
               value="<?php echo $student->getAge() ?>" required>
        <div class="invalid-tooltip">
            Please provide a phone number.
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <label for="validationTooltip05">Phone number</label>
        <input type="text" class="form-control" id="validationTooltip05" name="phone"
               value="<?php echo $student->getPhone() ?>" required>
        <div class="invalid-tooltip">
            Please provide a phone number.
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <label for="validationTooltipUsername">Email</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
            </div>
            <input type="text" class="form-control" id="validationTooltipUsername"
                   aria-describedby="validationTooltipUsernamePrepend" name="email"
                   value="<?php echo $student->getEmail() ?>" required>
            <div class="invalid-tooltip">
                Please provide a valid email.
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="validationTooltip03">Address</label>
        <input type="text" class="form-control" id="validationTooltip03" name="address"
               value="<?php echo $student->getAddress() ?>" required>
        <div class="invalid-tooltip">
            Please provide a valid address.
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="validationTooltip03">Image</label>
        <input type="file" class="form-control" id="validationTooltip03" name="image" accept="image/*" onchange="preview_image(event)">
        <img id="output_image">
        <br/>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-primary" onclick="window.location='../index.php'">Cancel</button>
    </div>
</form>
</body>
</html>