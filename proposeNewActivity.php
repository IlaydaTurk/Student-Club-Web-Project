
<html>
	 <head>
      <title>Propose New Activity</title>
   </head>
   <body  bgcolor=White>
   <br>
   <br>
     <h1 style="color:SlateBlue;">Propose New Activity</h1>
   <br>
	<br>	

		<form method = "post">
			
			<label> Activity Type: </label> <br> 
			<input name = "activity_type"  > </input> <br>
			<label> Activity Description: </label> <br>
			<textarea name = "activity_description" cols = "40" rows = "6" > </textarea> <br> 	
			
					
			<input type="submit" value="Submit" />
		</form>
	
<?php
session_start();


		$field_names = array("activity_type","activity_description");
		$n_fields = 2;
		$count=0;
		for($i=0;$i<$n_fields; $i++) {
		$field_name=$field_names[$i];
			if(array_key_exists($field_name, $_POST)){ 
				$count++;
			
			}
		}
		
		$db=new mysqli("localhost","root","201511062", "canclub");
		$activity_type=$_POST["activity_type"];
		$activity_description=$_POST["activity_description"];
		$proposed_id = $_SESSION["id"]; 
		$start_date = date('Y-m-d H:i:s');
		$finish_date=date('Y-m-d', strtotime($start_date. ' + 15 days'));
		
		if($activity_type !=''||$activity_description !=''){
			
			
			$field_names = array("activity_type","activity_description");
			$n_fields = 2;
			$count=0;
			for($i=0;$i<$n_fields; $i++) {
			$field_name=$field_names[$i];
			if(array_key_exists($field_name, $_POST)){ 
				$count++;
			
			}
		
		if($count==$n_fields){
			$query_str1="select *from activity where activity_type =\"" .$activity_type . "\" and activity_description = \"".$activity_description. "\" LIMIT 1";
			$result =$db->query($query_str1);
		$n_rows= $result -> num_rows;
		
		if ($n_rows==1){
			
				 echo "The activity is already present in the activities table" ;
		
		}
		
		else {
			$query_str="INSERT INTO activity(activity_type,activity_description,proposed_id,approve_count,disapprove_count,comment,start_date,finish_date)VALUES('$activity_type' , '$activity_description', '$proposed_id',0,0,NULL,'$start_date','$finish_date')";		
			
			if ($db->query($query_str) === TRUE) {
		
			echo "<br/><br/><span>Activity Inserted successfully...!!</span>";
			header('Location:http://localhost/voteActivities.php');
			}
		
			else{
			echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
			}
			}
		}
			
				
		}
		}
		
			
		
	?>
	
	
	</body>
	</html>