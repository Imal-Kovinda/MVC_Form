<?php include '../model/database.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="insert.css">
    <title>Home</title>
    <style>
        body{
            background-color: rgb(56,56,56);
            margin: 0px;
        }
        .Form{
            padding: 8px;
            margin: 30px auto auto auto;
            border-radius: 8px;
            width: 400px;
            height: auto;
            background-color: white;
            font-family: Arial, Helvetica, sans-serif;

        }
        .container{
            margin: auto auto auto 15px;
        }
        input{
            width: 250px;
            height: 30px;
            border-radius: 4px;
            border: ridge;
            margin: 3px auto auto auto;
        }
        .button{
            border-radius: 4px;
            width: 60px;
            height: 35px;
            margin: 5px 62px auto auto;
            background-color: #0099ff;
            color: white;
            border: none;
            float: right;
        }
        #search{
            width: 60px;
            height: 35px;
            padding: 5px;
            border-radius: 4px;
            margin: 5px auto auto auto;
            background-color: #0099ff;
            color: white;
            border: none;
        }
        #stu{
            width: 230px;
            height: 35px;
            border-radius: 4px;
            background-color: #0099ff;
            color: white;
            margin: auto auto auto 15px;
            border: none;
        }
        .result{
            margin: auto auto 15px 15px;
            width: 280px;
            height: auto;
            padding: 15px;
            background-color: white;
            border-radius: 4px;
            border: ridge;

        }
        
        h2,h3{
            color: #0099ff;
            font-family: Arial, Helvetica, sans-serif;
        }
        .find{
            margin: 10px auto auto 15px;
        }
    </style>
</head>
<body>
    <div class="Form">
        <form class="container" action="index.php" method="POST">
            <h2>Registration Form</h2>
            First Name: <br>
            <input type="text" name="fName" id="fName"><br><br>
            Last Name: <br>
            <input type="text" name="lName" id="lName"><br><br>
            Password: <br>
            <input type="Password" name="passwd" id="passwd"><br><br>
            <input class="button" type="submit"  name="submit" value="Submit">
            <br>
        </form>

        <div class="find">
            <h3>Find a Student</h3>
            <form class="sub" action="index.php" method="POST">
                <input type="text" name="find" id="find">
                <input id="search" type="submit"  name="search" value="Search">
            </form>
            <br>
            <form action="index.php" class="stud" method="POST">
                <input type="submit" name="all" id="stu" value="Display All Students" >
            </form>
            <br>
            <h3>Search Results</h3>
        </div>
        <?php
            if(isset($_POST['submit'])){
                require '../controller/ctrl.php';
                $ctrl = new UseCtrl();
                $ctrl->createStudent($_POST['fName'],$_POST['lName'],$_POST['passwd']);
            }
            
            
        ?>
        <div class="result">
            <?php
                if(isset($_POST['search'])){
                    require '../view/user_view.php';
                    $ser = new UserView();
                    $ser->showStudent($_POST['find']);
                }

                if(isset($_POST['all'])){
                    require '../view/user_view.php';
                    $sho = new UserView();
                    $sho->displayAll();
                }
            ?>
        </div>
    </div>
</body>
</html>
