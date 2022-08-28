<?php 
require "config.php";
if(!empty($_POST))
{
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $email = $_POST['email'];
    $query = mysqli_query($con,"insert into ajax(`name`,`email`) VALUES('$name','$email')");
    if($query){
        $output = "";
        $output .= "
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        ";
        $select = mysqli_query($con,"SELECT * FROM ajax ORDER BY id DESC");
        while($row = mysqli_fetch_assoc($select)){
        $output .="
        <tr>
            <td>" . $row['name'] . "</td>  
            <td>".$row['email']."</td>
            <td><a href=''><img src='icons/edit.svg' width='30px;'></a></td>
            <td><a href=''><img src='icons/delete.svg' width='30px;''></a></td>
        </tr>
        ";
        } 
    }
    echo $output;
}
?>