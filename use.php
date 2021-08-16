<?php
class User extends Database{
    protected function searchStudent($firstname){
        $sql = "SELECT * FROM student WHERE fName = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$firstname]);

        $result = $stmt->fetchAll();
        return $result;
    }
    //getall
    public function getAllStudents(){
        $sql = "SELECT * FROM student";
        $stmt = $this->connect()->query($sql);
        $row = $stmt->fetchAll();

        foreach($row as $line){
            echo 'Full Name:  ' .$line['fName'] .'  ' .$line['lName'] .'<br>';
        }

        // while($row = $stmt->fetch()){
        //     echo 'Full Name:  ' .$row['fName'] .'  ' .$row['lName'] .'<br>';

        // }
    }
    //insert
    public function insert($FirstName,$LastName,$password){
        $enpassword = sha1($password);
        $sql = "INSERT INTO student (fName, lName, passwd) VALUES (?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$FirstName,$LastName,$enpassword]);

    }
}
?>