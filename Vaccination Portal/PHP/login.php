<?php 
        require 'config.php';
?>
	<?php 
		//check for form submission
		if(isset($_POST['lsubmit']))
		{
			$errors = array();
		//check if the username an password has been entered
			if(isset($_POST['email']) || strlen(trim($_POST['email'])<1))
			{	
				$errors[]='Username is Missing/Invalid';	
			
			}
			if(isset($_POST['password']) || strlen(trim($_POST['password'])<1))
			{	
				$errors[]='Password is Missing/Invalid';	
			
			}
		//check if there any errors in the form
			if(empty($errors))
			{
			//save username and password into variable
				$email = mysqli_real_escape_string($conn,$_POST['email']);
				$password = mysqli_real_escape_string($conn,$_POST['password']);
			
			//prepare database query
				$sql = "SELECT * FROM registereduser
						WHERE uemail={$email} AND upassword={$password}
						LIMIT 1";
				
				$result_set = mysqli_query($conn,$sql);

				if($result_set) 
				{
					//querry successful
					if(mysqli_num_rows($result_set) == 1)
					{
						//redirect to userProfile.php
						header('location:UserProfile.php');//valid user found
					}
					else
					{
						$errors[]='Invalid Username or Password';
					}
					

				}
				else
				{
					$errors[] = 'Database Query faild';
				}

	
			}


		}
	
	?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../CSS/Formstyle.css">
        <script src="../JAVA SCRIPT/javascript.js"></script>
    </head>
    <center>
    <h1>Enter your details to login to the website</h1>
    </center>
<div class="sform">
    <center>
<form name="theform" method="post" action="login.php" >
    <?php
    /* 
        if(isset($errors) && !empty($errors)){
            echo '<p class="inv">Invalid Username / Password </p>';
        }
        */
    ?>
   
    Username :                            
    <input type="email" id="email" name="email" placeholder="Enter your email address" required><br>

    Password :
    <input type="text" id="password" name="password" placeholder="Enter your password" required><br>
</center>
  
    <center>
        <input type="submit" value="Login" name="lsubmit" ><a herf="UserProfile.php"></a>
    </center>
   

</form>
</div>

</html>