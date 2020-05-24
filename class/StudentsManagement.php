<?php


class StudentsManagement
{
    protected $studentList = [];
    protected $filePath;

    public function __construct($filePath)
    {
        return $this->filePath = $filePath;
    }

    public function getDataJson()
    {
        $dataJson = file_get_contents($this->filePath);
        return json_decode($dataJson);
    }

    public function addStudent($student)
    {
        $students = $this->getDataJson();
        $data = [
            "name" => $student->getName(),
            "age" => $student->getAge(),
            "phone" => $student->getPhone(),
            "email" => $student->getEmail(),
            "address" => $student->getAddress(),
            "image" => $student->getImage()
        ];
        array_push($students, $data);
        $this->saveDataJson($students);
    }

    public function getStudents()
    {
        $students = $this->getDataJson();
        foreach ($students as $obj) {
            $student = new Student($obj->name, $obj->age, $obj->phone, $obj->email, $obj->address, $obj->image);
            array_push($this->studentList, $student);
        }
        return $this->studentList;
    }

    public function saveDataJson($data)
    {
        $dataJson = json_encode($data);
        file_put_contents($this->filePath, $dataJson,JSON_PRETTY_PRINT);
    }

    public function getStudentByIndex($index)
    {
        $dataArr = $this->getDataJson();
        return new Student($dataArr[$index]->name, $dataArr[$index]->age, $dataArr[$index]->phone, $dataArr[$index]->email, $dataArr[$index]->address, $dataArr[$index]->image);
    }

    public function updateStudent($index, $student)
    {
        $students = $this->getDataJson();
        $data = [
            "name" => $student->getName(),
            "age" => $student->getAge(),
            "phone" => $student->getPhone(),
            "email" => $student->getEmail(),
            "address" => $student->getAddress(),
            "image" => $student->getImage()
        ];
        $students[$index] = $data;
        $this->saveDataJson($students);
    }

    public function deleteStudent($index)
    {
        $students = $this->getDataJson();
        array_splice($students, $index, 1);
        $this->saveDataJson($students);
    }

    function searchByName($searchName)
    {
        $dataArr = $this->getDataJson();
        if (empty($searchName)) {
            return $this->getStudents();
        }
        $search_name = [];
        foreach ($dataArr as $obj) {
            if (!empty($searchName) && ($searchName == $obj->name)) {
                $student = new Student($obj->name, $obj->age, $obj->phone, $obj->email, $obj->address, $obj->image);
                array_push($search_name, $student);
            }
        }
        return $search_name;
    }
}