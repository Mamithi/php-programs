<?php
$dbconnect = new mysqli('localhost', 'root', '', 'ozeki');
$rowid = $_GET['rowid'];
echo '<link rel="stylesheet" type="text/css" href="css/hack.css">';
echo '<fieldset>';
echo '<fieldset id=field>';
echo '<h1 id="text"> Medication form for a patient </h1>';
      $search_results = "SELECT * FROM patients WHERE pid LIKE '$rowid';";
      $result = @mysqli_query($dbconnect, $search_results);
      $result_count = @mysqli_num_rows($result);      
     echo '<table>';
          if( @mysqli_num_rows($result) > 0)
          {
               
               while($row = $result->fetch_assoc())
               {    
                echo '<tr id="text3"><td><strong>Patient</strong></td><td><strong>Details</strong></td></tr>';                
                echo '<tr><td id="text3">First Name</td><td id="text4">', $row['FIRSTNAME'],'</td></tr>';
                echo '<tr><td id="text3">Last Name</td><td id="text4">', $row['LASTNAME'],'</td></tr>';
                echo '<tr><td id="text3">Date Of Birth</td><td id="text4">', $row['GENDER'],'</td></tr>';
                echo '<tr><td id="text3">Gender</td><td id="text4">', $row['DOB'],'</td></tr>';
                echo '<tr><td id="text3">Phone Number</td><td id="text4">', $row['PHONE'],'</td></tr>';
                echo '<tr><td id="text3">County</td><td id="text4">', $row['COUNTY'],'</td></tr>';
                echo '<tr><td id="text3">Id Number</td><td id="text4">', $row['ID'],'</td></tr>';
                echo '<tr><td id="text3">Medicine:</td>';
                echo '<tr><td id="text3"><input type="text" name="medicine" required="required" id="box"  /></td></tr>';
                echo '<tr><td id="text3">Dosage Duration:</td>';
                echo '<tr><td id="text3"><input type="number" name="duration" required="required" id="box" /></td></tr>';
                echo '<tr><td id="text3">Was the medicine given:</td>';
                echo '<tr><td>Yes<input type="checkbox" name="given" value="Yes"  /></td></tr>';
                echo '<tr><td>No<input type="checkbox" name="given" value="No"  /></td></tr>';
                echo '<tr><td id="text3">Next Appointment Date:</td>';
                echo '<tr><td id="text3"><input type="date" name="appointment" required="required" id="box" /></td></tr>';
                // echo '<tr><td><input type="submit" name="submit" value="Submit" required="required"  /></td></tr>';
               }    
          }
      echo '<tr><td><input type="submit" name="submit" value="Submit" required="required" id="box" /></td></tr>';
      echo '</table>';
      
      
      if(isset($_POST['submit'])){

     $stmt= $dbconnect->stmt_init();
     $query='INSERT INTO medicines(FIRSTNAME,LASTNAME,DOB,GENDER,PHONE,COUNTY,ID,MEDICINE,DURATION,GIVEN,APPOINTMENT) VALUES(?,?,?,?,?,?,?,?,?,?,?)';

     if($stmt->prepare($query)){
          $stmt->bind_param('sssssssssss',$row['FIRSTNAME'],$row['LASTNAME'],$row['DOB'],$row['GENDER'],
               $row['PHONE'],$row['COUNTY'],$row['ID'],$_POST['medicine'],$_POST['duration'],$_POST['given'],$_POST['appointment']);

          $stmt->execute();
      echo "<script>alert('The process is successful.')</script>";
     }
     else
     {
          echo "<script>alert('The process has failed.')</script>";
     }
     } 
     echo '</fieldset>';
     echo '</fieldset>';

?>
