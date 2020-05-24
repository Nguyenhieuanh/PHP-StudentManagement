<?php


class Student
{
    protected $name;
    protected $age;
    protected $phone;
    protected $email;
    protected $address;
    protected $image;

    public function __construct($name, $age, $phone, $email, $address, $image)
    {
        $this->name = $name;
        $this->age = $age;
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;
        $this->image = $image;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setName($name)
    {
        return $this->name = $name;
    }

    public function setAge($age)
    {
        return $this->age = $age;
    }

    public function setAddress($address)
    {
        return $this->address = $address;
    }

    public function setPhone($phone)
    {
        return $this->phone = $phone;
    }

    public function setEmail($email)
    {
        return $this->email = $email;
    }

    public function setImage($image)
    {
        return $this->image = $image;
    }

}