<!DOCTYPE>
<?php 
$dbconnect=new mysqli ('localhost','root','','ozeki');

?>

<html>
<fieldset>
<p id=color>PATIENT REGISTRATION FORM</p>
<fieldset id=field>
<div id="table">
<title>Patient registration form</title>
<h1 id="print"> Fill the below form </h1>
<body>
<form method="post">
<link rel="stylesheet" type="text/css" href="hack.css"/>
<div>
Search for a Patient: <input type="text" id="search"/>
            <div id="search_results"></div>
           </div>
	<table align="center" cellspacing="10px" cellpadding="10px">
<tr>
     	<td id="text">First Name:</td>
     	<td><input type="text" name="fname" required="required" placeholder="first name"id="box"  /></td>

</tr>

<tr>
          <td id="text">Last Name:</td>
          <td><input type="text" name="lname" required="required" placeholder="first name" id="box" /></td>
</tr>
<tr>
          <td id="text">Gender:</td>
          <td>Male<input type="checkbox" name="gender" value="MALE"/></td>
          <td>Female<input type="checkbox" name="gender" value="FEMALE"/></td>
</tr>
<tr>
          <td id="text">Date of Birth:</td>
          <td><input type="date" name="dob" required="required" id="box"  /></td>
</tr>
<tr>
          <td id="text">Phone Number:</td>
          <td><input type="text" name="phone" required="required" id="box" /></td>
</tr>
<tr>
          <td id="text">ID Number:</td>
          <td><input type="text" name="id" required="required" id="box" /></td>
</tr>

<tr>
          <td id="text">County of Residence:</td>
          <td><input type="text" name="county" required="required" id="box"  /></td>
</tr>
<tr>
     	<td id="text">Dosage starting Date</td>
     	<td><input type="date" name="start" required="required"  id="box"/></td>
</tr>
<tr>
          <td id="text">Dosage Duration:</td>
          <td><input type="number" name="duration" required="required" id="box"  /></td>
</tr>
<tr>
          <td id="text">Next Appointment Date:</td>
          <td><input type="date" name="next" required="required" id="box" /></td>
</tr>
<tr>
          <td id="text">Message:</td>
          <td><input type="textarea" name="message" required="required" id="box"  /></td>
</tr>


	</table>
</div>
</fieldset>
</fieldset>
	          <tr>
          <td><input type="submit" name="submit" value="Submit" required="required" id="D" /></td>
     </tr>
     </form>
     <script type="text/javascript" charset="utf8" src="../js/jquery.js"></script>
     <script type="text/javascript" src="../js/search.js"></script>
</body>
</html>

<?php
if(isset($_POST['submit'])){
     

$stmt= $dbconnect->stmt_init();
$query='INSERT INTO patients(FIRSTNAME,LASTNAME,DOB,GENDER,PHONE,ID,COUNTY,START,DURATION,NEXT,TEXTA) VALUES(?,?,?,?,?,?,?,?,?,?,?)';

if($stmt->prepare($query)){
     $stmt->bind_param('sssssssssss',$_POST['fname'],$_POST['lname'],$_POST['gender'],$_POST['dob'],
          $_POST['phone'],$_POST['id'],$_POST['county'],$_POST['start'],$_POST['duration'],$_POST['next'],$_POST['message']);

     $stmt->execute();
echo "<script>alert('You have successfully filled the form.')</script>";
}
else
{
	echo "<script>alert('Registration has failled, please try again.')</script>";
}
} 
?>   