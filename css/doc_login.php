<?php
$dbconnect=new mysqli('localhost','root','','hiv');
session_start();
?>

<html>
<fieldset>
<fieldset id=log>
<title>log in</title>
<head>
</head>
<body>
<form action='' method='POST'>
<link rel="stylesheet" type="text/css" href="hack.css"/>
          <h1 id="print">Doctor log in</h1>
         <p id="prin"> Please log in by entering the username and the password created. </p>
<table align="center"  cellspacing="40px">
	<tr>
<td id="text">Username</td>
<td id="text"><input type="text" name="uname" required='required' id="box"   /></td>
	</tr>
	<tr>
<td id="text">Password</td>
<td><input type="password" name="pass" required='required'  id="box" /></td>
    </tr>

</table>
</fieldset>
</fieldset>
</div>
          <tr>
          <td><input type="submit" name="submit" value="LOGIN" required="required" id="D"  /></td>
          </tr>

</form>
</body>
</html>


<?php
if(isset($_POST['submit'])){


if($dbconnect)
{
	echo "conected successfully";
}
  

             $user_name=$_POST['uname'];
             $pword=$_POST['pass'];
             $query='SELECT  * FROM doctors WHERE USERNAME=? AND PASSWORD=?';
             $stmt=$dbconnect->stmt_init();
             $stmt->prepare($query);
             $stmt->bind_param('ss',$user_name,$pword);
             $stmt->execute();
             
             $stmt->store_result();

             if($stmt->num_rows)
             {
             	$_SESSION['user']=$user_name;
             echo "<script>alert('You have successfully logged in.')</script>";
            echo "<script>window.open('patient_registration.php','_self')</script>";
             }
             else
             {
             	echo "<script>alert('Login not successful, please check your username and password combination ')</script>";
            }


}
?>

