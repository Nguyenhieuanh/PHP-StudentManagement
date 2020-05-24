<?php
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    include "../class/Student.php";
    include "../class/StudentsManagement.php";

    $index = $_GET['index'];

    $studentsManagement = new StudentsManagement("../data/data.json");
    $student = $studentsManagement->getStudentByIndex($index);
    $target_dir = "../upload/";
    $imageDelete = $target_dir . basename($student->getImage());
    unlink($imageDelete);
    $studentsManagement->deleteStudent($index);
    header("Location: ../index.php");
}
