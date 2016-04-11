<!DOCTYPE>
<?php
$dbconnect= new mysqli('localhost','root','','hiv');
?>

<html>
<fieldset>
<p id=color>DOCTOR REGISTRATION FORM</p>
<fieldset id=field>
<title>administrator</title>
<head></head>
<body>
<link href="border.css" type="text" rel="stylesheet">
<form action='' method='POST'>
<link rel="stylesheet" type="text/css" href="hack.css"/>

          <h1 id="print">Personal details</h1>
<table align="center"  cellspacing="25px">
     
     <tr>
     	<td id="text">First Name:</td>
     	<td><input type="text" name="fname" required="required" id="box" /></td>
     </tr>
     
     <tr>
     	<td id="text">Sur Name:</td>
     	<td><input type="text" name="sname" required="required" id="box"  /></td>
     </tr>
     <tr>
     	
     <td id="text">Last Name:</td>
     	<td><input type="text" name="lname" required="required" id="box"  /></td>
     </tr>
     <tr>
     	
     <td id="text">ID Number:</td>
     	<td><input type="text" name="adidno" required="required"  id="box" /></td>
     </tr>
     <tr>
          
     <td id="text">User Name:</td>
          <td><input type="text" name="uname" required="required"  id="box" /></td>
     </tr>
     <tr>
          
     <td id="text">Password:</td>
          <td><input type="password" name="pass" required="required"  id="box" /></td>
     </tr>
     <tr>
     	<td id="text">E-mail address:</td>
     	<td><input type="text" name="email" required="required" id="box"  /></td>
     </tr>

     <tr>
     	<td id="text">Telephone Number:</td>
     	<td><input type="text" name="tel" required="required" id="box" /></td>
     </tr>
</table>
</fieldset>
</fieldset>
	</div>
          <tr>
          <td><input type="submit" name="submit" value="REGISTER" required="required" id="D"  /></td>

     </tr>

</form>
</body>
</html>

<?php
$valid=filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
if(isset($_POST['submit'])){
	if($dbconnect)
	//{echo 'connection successful';}


     if($valid){

          $stmt=$dbconnect->stmt_init();
          $query='INSERT INTO doctors(FIRSTNAME,SURNAME,LASTNAME,IDNUM,USERNAME,PASSWORD,EMAIL,PHONE) VALUES(?,?,?,?,?,?,?,?)';

 if($stmt->prepare($query)){
     $stmt->bind_param('ssssssss' ,$_POST['fname'],$_POST['sname'],$_POST['lname'],$_POST['adidno'],$_POST['uname'],$_POST['pass'],$_POST['email'],$_POST['tel']);
   
          $stmt->execute();
echo "<script>alert('You have successfully filled the form and registered.')</script>";
}
}
else{
     echo"<script>alert('please check your email')</script>";
}
}
?>