<html>
	 <head>
      <title>List All Club Members</title>
   </head>
   <body  bgcolor=White>
   <br>
   <br>
     <h1 style="color:SlateBlue;">List All Club Members </h1>
   <br>
	<br>	
		<?php
			
			$db = mysqli_connect("localhost", "root", "201511062", "canclub");
  			
			$query_all = $db->query("select photo,id,firstname, lastname,birthdate,username, email,department,isPresident from clubmember");
			
			
			echo "<table border = 1> ";//style='border:1px'>";
			echo "	<tr>"; //<th>";
			echo "		<td> id </td>"; 
			echo "		<td> photo </td>"; 
			echo "      <td> firstname </td>"; 
			echo "      <td> lastname </td>"; 
			echo "      <td> birthdate </td>"; 
			echo "      <td> username</td>"; 
			echo "      <td> email </td>"; 
			echo "      <td> department </td>"; 
			echo "      <td> isPresident </td>"; 
			
			echo "	</tr>";//</th>";
			
				    
			while($row = $query_all->fetch_assoc()) {
				
				
				$id = $row["id"];
				$imgData = $row["photo"];;
				$firstname = $row["firstname"];
				$lastname = $row["lastname"];
				$birthdate = $row["birthdate"];
				$username = $row["username"];
				$email = $row["email"];
				$department = $row["department"];
				$isPresident = $row["isPresident"];
				
				echo "<tr>";  
				echo "		<td> $id </td>"; 
				
			echo'		<td> <img src="data:image/jpeg;base64,'.base64_encode($row['photo'] ).'" height="80" width="80" class="img-thumnail" /> </td>'; 
	
			echo "		<td> $firstname </td>"; 
			echo "      <td> $lastname </td>"; 
			echo "      <td> $birthdate </td>"; 
			echo "      <td> $username </td>"; 
			echo "      <td> $email </td>"; 
			echo "      <td> $department </td>"; 
			echo "      <td> $isPresident </td>"; 
				echo "</tr>";
				$count++; 	
			}	
			echo "</table>";	
			
	
		?>
		</body>
		</html>