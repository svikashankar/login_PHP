<?php
	$username=$_POST['username'];
	$password=$_POST['password'];
	$login=$_SERVER['HTTP_REFERER'];
	if((!$username) or (!$password))
	{
	header("Location:$login");
	exit();
	}
	$conn=mysql_connect('localhost:8081','root','vikas93');
	if($conn==null)
	{
		die('Error Connecting Database');
	}
	
	mysql_select_db('id4378182_antishell',$conn);//DataBAse Name


	$sql="select count(*) AS cc from websiteusers where userName='".$username."' and pass='".$password."'";//Table Name , USername, password
	$rs=mysql_query($sql);
	$rows=mysql_fetch_array($rs);

	if($rows["cc"]==1)
	{
	echo("<h2> welcome ". $username."</h2>");
	}
	else
	{
	// header("Location:$login");
		 
		echo("<h2> wrong username or password </h2>");
	exit();
	}
	
?>
