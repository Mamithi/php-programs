<?php
			$dbconnect = new mysqli("localhost", "root", "", "ozeki");
      echo '<link rel="stylesheet" type="text/css" href="css/hack.css">';
			// Check connection
			if ($dbconnect->connect_error) {
			     die("Connection failed: " . $dbconnect->connect_error);
			} 
if(isset($_POST['search_term']))
{
	 $search_term = mysqli_real_escape_string($dbconnect, $_POST['search_term']);
     if(!empty($search_term) )
     {
     	$search_results = "SELECT * FROM patients WHERE ID LIKE '$search_term';";
      $result = @mysqli_query($dbconnect, $search_results);
      $result_count = @mysqli_num_rows($result);
      $suffix = ($result_count != 1) ? 's' : ' ';
        echo '<p>Your Search for <strong>', $search_term, '</strong> returned <strong>', $result_count, '</strong> result', $suffix,' </p>';
     	echo '<table id="text">';
      
      echo '<tr>';
  		if( @mysqli_num_rows($result) > 0)
  		{
  			
  			while($row = $result->fetch_assoc())
              	{    
                echo '<tr id="text2">';
                echo '<td>Firstname</td><td>Lastname</td><td>Date Of Birth</td><td>Gender</td><td>Phone Number</td><td>COUNTY</td><td>ID</td>';
                echo '</tr>';        		
              	echo '<td id="text2">', $row['FIRSTNAME'],'</td>';
                echo '<td id="text2">', $row['LASTNAME'],'</td>';
                echo '<td id="text2">', $row['DOB'],'</td>';
                echo '<td id="text2">', $row['GENDER'],'</td>';
                echo '<td id="text2">', $row['PHONE'],'</td>';
                echo '<td id="text2">', $row['COUNTY'],'</td>';
                echo '<td id="text2">', $row['ID'],'</td>';
              
                echo "<td id='text2'><a href='medication.php?rowid=".$row['pid']."'>Give Medication</a></td>";
                

              	}	
  		}
      echo '</tr>';
      echo '</table>';
       }
      
  		$dbconnect->close(); 
       
  }
  ?>