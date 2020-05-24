<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "../class/Student.php";
    include "../class/StudentsManagement.php";

    $index = $_GET['index'];
    $name = $_REQUEST['name'];
    $age = $_REQUEST['age'];
    $phone = $_REQUEST['phone'];
    $email = $_REQUEST['email'];
    $address = $_REQUEST['address'];
    $img = $_FILES['image']['name'];

    $studentsManagement = new StudentsManagement("../data/data.json");
    $student = $studentsManagement->getStudentByIndex($index);

    if (!empty($img)) {
        $target_dir = "../upload/";
        $imageDelete = $target_dir . basename($student->getImage());
        unlink($imageDelete);
        $target_file = $target_dir . basename(time() . '-' . $img);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
        $student->setImage($target_file);
    }
//    } else {
//        $target_dir = "../upload/";
//        $img = $target_dir . basename($student->getImage());
//    }

    $student->setName($name);
    $student->setAge($age);
    $student->setAddress($address);
    $student->setPhone($phone);
    $student->setEmail($email);
    $student->setAddress($address);
    $studentsManagement->updateStudent($index, $student);
    header("Location: ../index.php");
}