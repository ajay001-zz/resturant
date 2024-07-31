<?php include('partials/menu.php'); ?>

<div class="main-content">
	<div class="wrapper">
		<h1>change Password</h1>
		<br><br>

		<?php
			if(isset($_GET['id']))
			{
				$id=$_GET['id'];
			}

		?>

		<form action="" method="POST">
			<table class="tbl-30">
				<tr>
					<td>Current Password:</td>
					<td>
						<input type="password" name="current_password" placeholder="current Password">
					</td>
				</tr>
				<tr>
					<td>New Password:</td>
					<td>
						<input type="password" name="new_password" placeholder="New Password">
					</td>
				</tr>

			</table>
			<tr>
					<td>Confirm Password:</td>
					<td>
						<input type="password" name="confirm_password" placeholder="Confirm Password">
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<br>
						<input type="submit" name="submit" value="Change Passowrd" class="btn-secondary">
						
					</td>
				</tr>


		</form>
	</div>
</div>

<?php 
   //check whether the submit button is clicked or not
	if(isset($_POST['submit']))
	{
		//echo "clicked";


		// 1.Get the data from form
		$id=$_POST['id'];
		$current_password = md5($_POST['current_password']);
		$new_password = md5($_POST['new_password']);
		$confirm_password = md5($_POST['confirm_password']);
		

		//2.Check whether the user with current ID and current Password Exist or not
		$sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";
		//Execute query
		$res = mysqli_query($conn, $sql);
		if ($res==true) {
			//check whether data is available or not
			$count=mysqli_num_rows($res);
			
			if ($count==1) {
				//user exist and password can be changed
				//echo "user found";
				
				//check whether the new password and confirm match or not
				if($new_password==$confirm_password)
				{
					//update the password
					$sql2 = "UPDATE tbl_admin SET 
						password='$new_password'
						WHERE id=$id 
					";
					//Execute the query
					$res2 = mysqli_query($conn, $sql2);

					//check whether the query executed or not

					if($res2==true)
					{
						//Display success message
						$_SESSION['change-pwd'] ="<div class='success'>password changed.</div>";

						//Rediret the user
						header('location:'.SITEURL.'admin/manage-admin.php');
					}
					else
					{
						//Display Error Message
						$_SESSION['change-pwd'] ="<div class='error'>failed to password changed.</div>";

						//Rediret the user
						header('location:'.SITEURL.'admin/manage-admin.php');

					}
				}
				else
				{
					//redirect to manage admin page with error message
					$_SESSION['pwd-not-match'] ="<div class='error'>password did not match.</div>";

					//Rediret the user
					header('location:'.SITEURL.'admin/manage-admin.php');
				}
			}
			else
			{
				//use doesnot exist set message and redirect
				$_SESSION['user-not-found'] ="<div class='error'>User Not found.</div>";

				//Rediret the user
				header('location:'.SITEURL.'admin/manage-admin.php');
			}
			
		}


		//3.Check whether the New Password and confirm PAssword match or not




		//4.change password of all above is true
	}
	

?>


<?php include('partials/footer.php'); ?>