<html>
	 <head>
      <title>Select Club Member</title>
   </head>
   <body  bgcolor=White>
  
   <br>
   <br>
     <h1 style="color:SlateBlue;">Select Club Member </h1>
   <br>
	<br>	
	
		
			
			
			
			<?php
			
			$db = mysqli_connect("localhost", "root", "201511062", "canclub");
			
				$query_all = $db->query("select photo,id,firstname, lastname,birthdate,username, email,department,isPresident from clubmember where isPresident=0");
				
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
			
			echo "	</tr>";
			
				    
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
			
		
  			
			
				    
				    
		
if(isset($_POST["submit"])){
	
	
			$id=$_POST["clubmember_id"];

			$query_str="DELETE FROM clubmember WHERE id = '$id'";
			
				if ($db->query($query_str) === TRUE) {
		
			echo "<br/><br/><span>Data deleted successfully...!!</span>";
			header('Location:http://localhost/deleteclubMembers.php');
				}
				

		
			else{
			echo "<p>Deletion Failed  </p>";
			}}	

			?>
			
		
			
			<br><br>
			 <form  method="post"  >
			 
			


<label> Club Member id: </label> <input name = "clubmember_id"> </input><br>
			
			<br>

			
			 <input name="submit" type="submit"   value="Delete selected club member"/>
			 </form>
			
		</body>
		</html>