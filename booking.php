

<?php
include_once(__DIR__.'/queries.php');

$signup = false;


if(isset($_POST["submit"])){
    $uname= $_POST['name'];
    $phone = $_POST['number'];
    $email= $_POST['email'];
    $movie = $_POST['movie'];
    // print_r(__DIR__);
    // var_dump(file_exists("__DIR__.'/user.class.php'"));
    // echo "check";
    if(User::check_email($email)){
        echo "email";
        $error= User::insert_user($uname,$phone,$email,$movie);
        $signup = true;
    }  
}

if($signup){
    if(!$error){
        echo 'something went wrong';
        
    }else{ ?>

<!-- this is signup = true and error = true   -->
<?php
User::getmovie();

$options='<option value="" disabled selected value></option>';

foreach(User::$rows as $data ){
    $options .= '<option value="' . $data["movie_name"] . '">' . $data["movie_name"] . '</option>';
    echo $data['movie_name'];
}

?>



        <html>

<head>
    <link rel="stylesheet" href="style.css">
    <title>Signup</title>

    
</head>

<body>

            <center>
    <div>
    <form action="" method="POST" onSubmit="return confirm('Confirm to Submit!')";>
        <h3> &#127903;Movie Ticket Booking &#127909;</h3>
        <table class='t'>
        <tr><td>Name:</td>
        <td><input type="text" name="name" required=required></td></tr><br>
        <tr><td>Phone:</td>
        <td><input type="tel" name="number" required="required" minlength=10 maxlength=10></td></tr><br>
        <tr><td>Email:</td>
        <td><input type="email" name="email" required="required" ></td></tr><br>
        
        <tr><td>Movie:</td>
        <td><select name="movie">
        <?php echo $options; ?>
 <td></select></td></tr></br> 
                 
        
        
</td></tr></br> 
        
</table>
        <input type="submit" value="Submit" name="submit">
        <input type="reset" name="reset">
</form>
</div>
</center>


</body>

<?php

User::getuserdata($email);

echo "<table border='1' style='background-color:lightgreen;'>";
            echo "<tr><th>Name</th><th>Phone</th><th>Email</th><th>Movie</th>";
            

            foreach(User::$rows as $data ){
                echo "<tr><td>".$data['name']."</td><td>".$data['phone']."</td>
                <td>".$data['email']."</td><td>".$data['movie']."</td></tr>";
            }
            echo "</table>";
    }
}else{
    ?>
<!--  this is the else part of signup = false  -->
<html>

<head>
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <center>
    <div>
    <form action="" method="POST" onSubmit="return confirm('Confirm to Submit!')";>
        <h3> &#127903;Movie Ticket Booking &#127909;</h3>
        <table class='t'>
        <tr><td>Name:</td>
        <td><input type="text" name="name" required=required></td></tr><br>
        <tr><td>Phone:</td>
        <td><input type="tel" name="number" required="required" minlength=10 maxlength=10></td></tr><br>
        <tr><td>Email:</td>
        <td><input type="email" name="email" required="required" ></td></tr><br>
        

        <tr><td>Movie:</td>
        <td><select name="movie">
        <?php echo $options; ?>
 <td></select></td></tr></br> 

        
        
</table>
        <input type="submit" value="Submit" name="submit">
        <input type="reset" name="reset">
</form>
</div>
</center>


</body>
<?php

}
?>
</html>
