<?php
session_start();
?>
<html>
<head>
<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="css/style1.css">
	<?php

        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $un =$_POST["uname"];
            $ps=$_POST["pass"];

            include "config1.php";

            $sql="select * from register where userid='$un' and password='$ps'";

            $table=$conn->query($sql);

            if($conn->affected_rows>0)
            {
                $_SESSION["islogged"]=true;

                $_SESSION["username"]=$un;
				$row=mysqli_fetch_array($table);
				$role=$row['Role'];
				
				
				if($role=="admin")
				{
					header("Location: venu.php");
				}
				else{
                header("Location: mydetail.php");
				}
            }
            else{
                echo "<h1>Invalid User</h1>";
            }



        }
		?>

</head>
<style type="text/css">
	body {
    background-image:url(31194.jpg);
	background-size:cover;
	font-family:verdana;
	font-size:10px;
	margin:0;
	line-height:14px;
	background-repeat:no-repeat;
    }
	h1{
		color:#fff;
		font-size:80px;
	}
	h2{
		margin:0;
	padding:0 0 20px;
		text-align:center;
		font-size:22px;
	}
</style>
<body>
<br>
<br>
<br>
<h1>Library Managment System</h1>
	<div class="loginbox">
		<h2>Login Here</h2>
		<form method="post">
			<p>Username</p>
			<input type="text" name="uname" placeholder="Enter Username">
			<p>Password</p>
			<input type="password" name="pass" placeholder="Enter Password">
			<input type="submit" name="btn1" value="Login">
			<a href="#">Forgot Your password</a><br>
			<a href="reg.php">Don't have an account</a>
		</form>
	
	</div>

</body>
</html>