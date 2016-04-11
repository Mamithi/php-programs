<!DOCTYPE>
<?php 
$dbconnect=new mysqli ('localhost','root','','ozeki');

?>

<html>
<fieldset>
<title id=color>Patient registration form</title>
<fieldset id=field>
<link rel="stylesheet" type="text/css" href="css/hack.css">

<body>
<form method="post">

  <p id="text">Search for an existing Patient: <input type="text" id="search" class="box" /></p>
            <div id="search_results" class="text"></div>
            <h1 id="text"> Register a new patient </h1>
	<table>
<tr>
     	<td id="text">First Name:</td>
     	<td><input type="text" name="fname" required="required" placeholder="first name" id="box" /></td>

</tr>

<tr>
          <td id="text">Last Name:</td>
          <td><input type="text" name="lname" required="required" placeholder="last name"  id="box"/></td>
</tr>
<tr>
          <td id="text">Gender:</td>
          <td id="text">Male<input type="checkbox" name="gender" value="MALE"  /></td>
          <td id="text">Female<input type="checkbox" name="gender" value="FEMALE"/></td>
</tr>
<tr>
          <td id="text">Date of Birth:</td>
          <td id="text"><input type="date" name="dob" required="required"  id="box"/></td>
</tr>
<tr>
          <td id="text">Phone Number:</td>
          <td id="text"><input type="text" name="phone" required="required"  id="box"/></td>
</tr>
<tr>
          <td id="text">ID Number:</td>
          <td id="text"><input type="text" name="id" required="required"  id="box"/></td>
</tr>

<tr>
          <td id="text">County of Residence:</td>
          <td id="text"><input type="text" name="county" required="required"  id="box"/></td>
</tr>
<tr>
     	<td id="text">Dosage starting Date</td>
     	<td id="text"><input type="date" name="start" required="required"  id="box"/></td>
</tr>
<tr>
          <td id="text">Dosage Duration:</td>
          <td id="text"><input type="number" name="duration" required="required"  /></td>
</tr>
<tr>
          <td id="text">Next Appointment Date:</td>
          <td id="text"><input type="date" name="next" required="required"  id="box"/></td>
</tr>
<tr>
          <td id="text">Message:</td>
          <td id="text"><input type="textarea" name="message" required="required"   id="box"/></td>
</tr>


	</table>


	          <tr>
          <td id="text"><input type="submit" name="submit" value="Submit" required="required"  id="box" /></td>
     </tr>
     </form>
     <script type="text/javascript" charset="utf8" src="js/jquery.js"></script>
     <script type="text/javascript" src="js/search.js"></script>
</body>
</fieldset>
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