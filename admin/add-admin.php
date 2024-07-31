<?php
	include("partials/menu.php");
?>

<div class="main-content">
	<div class="wrapper">
		<h1>Add Admin</h1>
		<br><br>
		<?php 
			if(isset($_SESSION['add']))
			{
				echo $_SESSION['add'];//displaying session message 
				unset($_SESSION['add']);//Removing Session message
			}
		?>


		<form action="" method="POST">
			<table border="0" id="jpt" width="100%">
				<tr>
					<td>Full Name:</td>
					<td><input type="text" name="full_name" placeholder="Name here"></td>
					

				</tr>
				<tr>
					<td>Username:</td>
					<td><input type="text" name="username" placeholder="username here"></td>

				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="password" name="password" placeholder="password here"></td>

				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" name="submit" value="Add Admin" class="btn-secondary">
					</td>
				</tr>

			</table>
			
		</form>
		
	</div>

</div>


<?php
	include("partials/footer.php");
?>
<?php 
	//Process the value from FORM and save it in Database
	//check whether the submit button is clicked or not 
	if(isset($_POST['submit']))

		//isset is function of php,it check whether certain properties is set or not.
	{
		//button clicked
		//echo "Button Clicked";

		// 1.get data from form 
		 $full_name = $_POST['full_name'];
		 $username = $_POST['username'];
		 $password = md5($_POST['password']); //md5 encrypt the password


		 // 2.sql query to save data into database
		 $sql ="INSERT INTO tbl_admin SET
		 full_name='$full_name',
		 username='$username',
		 password='$password';

		 ";
		 
		 
		 // 3.Executing Query and saving data into database
		$res = mysqli_query($conn, $sql) or die(mysqli_error());

		//4. Check whether the(query is executed) data is iserted of not and display appropriate message
		if($res==TRUE)	
		{
			//Data Inserted
			//echo"Data Inserted";

			//Create a session variable to display message
			$_SESSION['add']="<div class='success'>Admin Added Successfully!!</div>";

			//Redirect Page to manage admin
			header("location:".SITEURL.'admin/manage-admin.php');
		}
		else
		{
			//failed to Insert Data
			//echo"Not Inserted";

			//Create a session variable to display message
			$_SESSION['add']="<div class='error'>Failed to add admin</div> ";
			
			//Redirect Page to Add Admin
			header("location:".SITEURL.'admin/add-admin.php');
		}
	}		
	
?>