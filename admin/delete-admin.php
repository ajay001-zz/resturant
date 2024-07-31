<?php 
	 
	//incluse constrants.php file here
	include('../config/constants.php');

	//1. Get the Id of Admin to be deleted
	$id=$_GET['id'];

	//2. Create Sql query to delete admin
	$sql ="DELETE FROM tbl_admin WHERE id=$id";

	//Execute the query
	$res =mysqli_query($conn, $sql);

	//check whether the query executed sucessfully or not
	if($res==true)
	{
		//query executed succesfully and admin detelted
		//echo"Admin Deleted!!

		//create Session variable to display message
		$_SESSION['delete']="<div class='success'>Admin Deleted Successfully.!!!</div>";

		//Redirect to manage admin page
		header('location:'.SITEURL.'admin/manage-admin.php');


	}
	else
	{
		//failed to delete admin
		//echo"Failed to Delete Admin";
		$_SESSION['delete']="<div class='error'>Failed to Delete Admin.Try Again.!!!</div>";
		header('location:'.SITEURL.'admin/manage-admin.php');
	}
	//3.Redirect to Manage admin Page with message(success or error)

?>
