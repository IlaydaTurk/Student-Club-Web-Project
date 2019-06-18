<html>
	 <head>
      <title>Trend Activities</title>
   </head>
   <body  bgcolor=White>
   <br>
   <br>
     <h1 style="color:SlateBlue;">Trend Activities </h1>
   <br>
	<br>	
	<table border="1px">
         <tr>
            <th> Activity Id</th>
            <th>Activity Type</th>
			<th>Activity Description</th>
			<th>Activity Approve Count</th>
			<th>Activity Disapprove Count</th>
			
         </tr>


		<?php
			
			$db = mysqli_connect("localhost", "root", "201511062", "canclub");
  			
			$query_all = $db->query("select * from activity where DATE(CURDATE()) <= DATE(finish_date) ORDER BY approve_count DESC  LIMIT 5");
			
			
				    
				while($row = $query_all->fetch_assoc()) {
				
				$activity_id = $row["activity_id"];
				$activity_type = $row["activity_type"];
				$activity_description = $row["activity_description"];
				$approve_count= $row["approve_count"];
				$disapprove_count= $row["disapprove_count"];
				
				
				
				
				echo "<tr>";  
				echo "		<td> $activity_id  </td>"; 
				echo "		<td> $activity_type </td>"; 
				echo "		<td> $activity_description </td>"; 
				echo "		<td> $approve_count </td>"; 
				echo "		<td> $disapprove_count </td>";
				
				
			
				echo "</tr>";
				$count++; 	
			}	?>
			</table><br>
			<br>	
			
	
		
		</body>
		</html>