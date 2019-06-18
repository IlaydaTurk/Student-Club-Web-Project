<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<style>
html,body{
background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');
background-size: cover;
background-repeat: no-repeat;
height: 100%;
font-family: 'Numans', sans-serif;
}



.container{
height: 100%;
align-content: center;
text-align: center;
color: #FFFFFF;

}

.register{
    background: -webkit-linear-gradient(left, rgba(0,0,0,0.5), rgba(0,0,0,0.5));
    margin-top: 5%;
    padding: 3%;
	height: 500px;
	width: 500px;
	
}

password,username{
width: 50px;
background-color: #FFC312;
color: black;
border:0 !important;
}
.register-right{
    background:rgba(0,0,0,0.5);
    border-top-left-radius: 20% 70%;
    border-bottom-left-radius: 10% 50%;
	padding: 20%;
    margin-top: 20%;
}

@-webkit-keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}

.register-form{
    padding: 20%;
    margin-top: 20%;
	width: 400px;
	height:400px;
}
.btnRegister{
    float: right;
    margin-top: 10%;
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    background: #0062cc;
    color: #fff;
    font-weight: 600;
    width: 50%;
    cursor: pointer;
}



.register-heading{
    text-align: center;
    margin-top: 8%;
    margin-bottom: -15%;
    color: #FFFFFF;
}
</style>
<body>

 <form class="form-horizontal" method="post" >

<div class="container register">
<br> <h3 style="color:White;">Welcome CanClub HomePage </h3>
               
                    
                   <div class="col-md-9 register-right">
                       
                         <div class="tab-content" id="myTabContent">
						                             <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                              
                               
                                       
										<div class="form-group">
                                            <input name="username" type="text" class="form-control" placeholder="UserName *" value="" />
                                        </div>
										
                                        <div class="form-group">
                                            <input name="password" type="password" class="form-control" placeholder="Password *" value="" />
                                        </div>
                                      
									
                                        
                                    </div>
                                   
							</div>
                                     
                                        <input name="submit" type="submit" class="btnRegister"  value="Sign In"/>
                                    </div>
									<p><a href="http://localhost/signUp.php">Sign Up</a></p>
                              
  </div>
                          
                                   
                              
								
                             
</form>
<?php
	session_start();
	
	$field_names = array("username","password");
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
		$username=$_POST["username"];
		$password=$_POST["password"];
		$_SESSION["username"] = $_POST["username"];
		$_SESSION["password"] = $_POST["password"];
		$query_str="select *from clubmember where username =\"" .$username . "\" and password = \"".$password. "\" ";
		
		
		if ($query_str==true){
			$query_all = $db->query("select username, isPresident,firstname,lastname,id from clubmember where username =\"" .$username . "\""); 
			
			$row = $query_all->fetch_assoc();
			$_SESSION["firstname"] = $row["firstname"];
			$_SESSION["lastname"] = $row["lastname"];
			$_SESSION["email"] = $row["email"];
			$_SESSION["id"] = $row["id"];
			$_SESSION["photo"] = $row["photo"];
			$_SESSION["department"] = $row["department"];
			$_SESSION["birthdate"] = $row["birthdate"];
			
			
			if($row["isPresident"] == 1){
			
			
			header('Location:http://localhost/PresidentPage.php');
		}
			else{
					
		header('Location:http://localhost/clubMemberPage.php');
			}
		}
		else {
			echo("password or username mismatch");
			
		
		}
		}
	
	?>
</body>
</html>