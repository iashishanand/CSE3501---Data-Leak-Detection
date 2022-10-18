<!DOCTYPE html>
<html lang="en">
<head>
	<title>Data Leakage Detection</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="stylesheet.css" type="text/css" />
	<link rel="stylesheet" href="../stylesheet.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php
session_start(); //Start the session
if (!isset($_SESSION['name'])) {
        echo "Please Login";
		//$_SESSION['error'] = "Please Login First";
		echo "<script type=\"text/javascript\">"." alert('Please Login'); " ."</script>";
		} if (!$_SESSION['name']){
		      echo  header("Location: http://localhost/GuiltyModel/data-leakage-detection/adminlogin.php");
		}
		else{
		define('ADMIN',$_SESSION['name']); //Get the user name from the previously registered super global variable
		//if(!session_is_registered("admin")){ //If session not registered
		//header("location:login.php"); // Redirect to login.php page
		//}
		//else //Continue to current page
		header( 'Content-Type: text/html; charset=utf-8' );
		//include'includes/conn.php';
 	}
?>
<body>
	<nav>
        <h3><a href="admin.php">HOME</a></h3>
		<h3><a href="m_user.php">USERS</a></h3>
		<h3><a href="m_arti.php" class="admin-active-nav">ARTICLES</a></h3>
        <h3><a href="upload.php">UPLOAD</a></h3>
		<h3><a href="leakfile.php">LEAK USER</a></h3>
        <h3><a href="sendkey.php">REQUESTS</a></h3>
        <h3><a href="logout.php">LOGOUT</a></h3>
    </nav>	
	<table>
		<thead>
			<th>Article Subject</th>
			<th>Upload Date</th>
			<th>File Name</th>
			<th>Key</th>
			<th>Delete</a></th>
		</thead>
		<tbody>
		<?php
			require("config.php");
				$row="";
				$con = mysqli_connect("localhost","root",$dbPass);
				if (!$con)
					echo('Could not connect: ' . mysqli_error());
				else
				{
					mysqli_select_db( $con,"dataleakage");
					$sql = 'SELECT * FROM presentation';
					$retval = mysqli_query(  $con,$sql );
					if(! $retval )
					{
						die('Could not get data: ' . mysqli_error());
					}
					while($row = mysqli_fetch_assoc($retval))
					{
						echo 
						"<tr>
							<td> {$row['subject']} </td> " .
							"<td> {$row['time']} </td> " .
							"<td> {$row['fname']} </td> " .
							"<td> {$row['Topic']} </td> " .
							"<td><a href='m_article.php?id=". "{$row['subject']}'><img src='../img/delete.png' alt='delete' /></a>" ."</td>
							</tr>";
					} 
				}
				mysqli_close($con);
		?> 	
		</tbody>	                          
</table>
</body>
</html>