<?php
include "../action/create.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
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
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form class="needs-validation" enctype="multipart/form-data" action="../action/create.php" method="post"
      style="margin-left: 20px; margin-top: 30px">
    <h2 style="margin-left: 13px">Add New Student</h2>
    <br/>
    <div class="col-md-4 mb-3">
        <label for="validationTooltip01">Full name</label>
        <input type="text" class="form-control" id="validationTooltip01" name="name" required>
        <div class="valid-tooltip">
            Looks good!
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <label for="validationTooltip05">Age</label>
        <input type="number" class="form-control" id="validationTooltip05" name="age" required>
        <div class="invalid-tooltip">
            Please provide a phone number.
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <label for="validationTooltip05">Phone number</label>
        <input type="text" class="form-control" id="validationTooltip05" name="phone" required>
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
                   aria-describedby="validationTooltipUsernamePrepend" name="email" required>
            <div class="invalid-tooltip">
                Please provide a valid email.
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="validationTooltip03">Address</label>
        <input type="text" class="form-control" id="validationTooltip03" name="address" required>
        <div class="invalid-tooltip">
            Please provide a valid address.
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="validationTooltip03">Image</label>
        <input type="file" accept="image/*" onchange="preview_image(event)" class="form-control" id="validationTooltip03" name="image" required>
        <img id="output_image">
        <br/>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-primary" onclick="window.location='../index.php'">Cancel</button>
    </div>
</form>
</body>
</html>
</body>
</html>
