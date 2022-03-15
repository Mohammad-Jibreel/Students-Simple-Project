<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&family=Tajawal:wght@300&display=swap" rel="stylesheet">

    <style>

body {
    background-color:whitesmoke;
    font-family: 'Tajawal', sans-serif;
}
#mother {
    width:100%;
    font-size:20px;


}
main{
float:right;
border:1px solid gray;
padding:5px;

}

input {
    padding:4px;
    border:2px solid black;
    text-align:center;
    font-size:17px;
    font-family: 'Tajawal', sans-serif;

}

aside {
text-align:center;
width:300px;
float:left;
border:1px solid black;
padding:10px;
font-size:20px;
background-color:silver;
color:white;


}

#tabl {
    width:890px;
    font-size:20px;
    text-align:center;

}
#tabl th {
    background-color:silver;
    color:black;
    font-size:20px;
    padding:10px;

}

aside button {
    width:190px;
    padding:8px;
    margin-top:7px;
    font-size:17px;
    font-family: 'Tajawal', sans-serif;
    font-weight:bold;

}





    </style>
</head>
<body dir="ltr">

<?php
#connect with database 

$host='localhost';
$user='root';
$pass='';
$db='student';
$con=mysqli_connect($host,$user,$pass,$db);
$res=mysqli_query($con,"select * from student");
#button variable
$id='';
$name='';
$address='';

if(isset($_POST['id'])){
$id=$_POST['id'];
}

if(isset($_POST['name'])){
$name=$_POST['name'];
}


if(isset($_POST['id'])){

$address=$_POST['address'];

}
$sqls='';

if(isset($_POST['add'])) {
    $sqls = "INSERT INTO student (id, name, address)
VALUES ('$id', '$name', '$address')";
    mysqli_query($con,$sqls);
    header("location:home.php");
}

if(isset($_POST['delete'])) {
    $sqls="DELETE FROM student WHERE id=$id";

    mysqli_query($con,$sqls);
    header("location:home.php");
}
?>
    <div id="mother">


    <form  method="POST">
        <!--admin panel -->
        <aside>

         <div id="div">
     <img src="https://www.pngrepo.com/png/227904/512/graduated-student.png" width="200px" alt="logo">
      <h3>admin panel</h3>
      <label for="id">ID Student</label><br>
      <input type="text" name="id" id="id"><br>
      <label for="name">student name</label><br>
      <input type="text" name="name" id="name"><br>
      <label for="address">stduent address</label><br>
      <input type="text" name="address" id="address"> <br>

      <button name="add"> add student</button>
      <button name="delete"> delete student</button>

         </div>
        </aside>
                <!--show student info -->

      <main>
        
      <table id="tabl">

     <tr>
         <th>student id</th>
         <th>student name</th>
         <th>student address</th>

     </tr>

     <?php
 while($row=mysqli_fetch_array($res)) {
     echo "<tr>";
     echo "<td>" . $row['id'] ."</td>";
     echo "<td>" . $row['name'] ."</td>";
     echo "<td>" . $row['address'] ."</td>";

     echo "</tr>";
 }


?>

      </table>
</main>

    </form>





    </div>
</body>
</html>