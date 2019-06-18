<html>
	 <head>
      <title>Comment Activities</title>
   </head>
   <body  bgcolor=White>
   <br>
   <br>
     <h1 style="color:SlateBlue;">Comment Activities </h1>
   <br>
	<br>
      <table border="1px">
         <tr>
            <th> Activity Id</th>
            <th>Activity Type</th>
			<th>Activity Description</th>
			<th>Comments</th>
         </tr>
		 <?php

		 

	$db = mysqli_connect("localhost", "root", "201511062", "canclub");
  			
			$query_all = $db->query("select activity_id,activity_type,activity_description,comment,finish_date from activity where DATE(CURDATE()) <= DATE(finish_date) ");
						    
			while($row = $query_all->fetch_assoc()) {
				
				$activity_id = $row["activity_id"];
				$activity_type = $row["activity_type"];
				$activity_description = $row["activity_description"];
				$comment = $row["comment"];
				
				
				echo "<tr>";  
				echo "		<td> $activity_id  </td>"; 
				echo "		<td> $activity_type </td>"; 
				echo "		<td> $activity_description </td>"; 
				echo "		<td> $comment </td>"; 
				
			
				echo "</tr>";
				$count++; 	
			}	?>
			</table><br>
			<br>

	<form method ="post">
	<label> Activity Id:</label> <input name = "activity_id" size="2"> </input><br><br>
			<label> Comments </label> <input name = "comment" size="10"> </input><br><br>
			
                        
			<br><br>
			<input type="submit" value="Submit" />
		</form>
		



<?php


	session_start();
 
		

		$field_names = array("activity_id","comment");
		$n_fields = 2;
		$count=0;
		for($i=0;$i<$n_fields; $i++) {
		$field_name=$field_names[$i];
			if(array_key_exists($field_name, $_POST)){ 
				$count++;
			
			}
		}
		if($count==$n_fields){
			
		$db=new mysqli("localhost","root","201511062", "canclub");
		$activity_id= $_POST["activity_id"];
		$comment1 = $_POST["comment"];
		$username=$_SESSION["username"];
		$comment1 .= $username ;
		$comment .=" ".$comment1;
		
		$query_1 = "UPDATE activity SET comment =  '".$comment."' WHERE activity_id = '".$activity_id."' "; 
		$result1 =$db->query($query_1);
		if(result1==TRUE){
			header('Location:http://localhost/addComment.php');
		
		
		
		
		}
		
	}
		
			
	
	?>


</body>
</html>