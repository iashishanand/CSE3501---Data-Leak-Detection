<?php 
session_start();
require("config.php");
$con = mysqli_connect("localhost","root",$dbPass);
if (!$con)
    echo('Could not connect: ' . mysqli_error());
else {
    mysqli_select_db($con,"dataleakage" );
    $k1=$_POST['s1'];
    $k2=$_POST['s2'];
    $k3=$_POST['s3'];
    $k4=$_POST['s4'];
    // $qry = "EXISTS(SELECT 1 FROM record WITH(NOLOCK) WHERE sendto = '$k3')";
    // $res=mysqli_query($con,$qry);
    // echo $result;
//$qry="SELECT * FROM presentation WHERE Topic = '$k1' ";
//$result=mysql_query($qry)or die ("Could not insert data into DB: " . mysql_error());;
if($k1==$k2){	
    $qry = "EXISTS(SELECT 1 FROM record WITH(NOLOCK) WHERE sendto = '$k3')";
    $res=mysqli_query($con,$qry);
    echo "<script>	alert('<?php $res?>');
	</script>";
    if(!$res){
        $sql = "INSERT INTO record(subject,topic,sendto,time,legal) VALUES ('" . $_POST["s4"] ."','" . $_POST["s2"] . "','" . $_POST["s3"] ."','".date("y/m/d")."','no');";
        mysqli_query($con,$sql);
     }
echo'enter success      
'.$file = './download/'.$_GET['id'];
   	$title=$_GET['id'];
    header("Pragma: public");
    header('Content-disposition: attachment; filename='.$title);
    header('Content-Transfer-Encoding: binary');
    ob_clean();
    flush();
    $chunksize = 1 * (1024 * 1024); // how many bytes per chunk
    if (filesize($file) > $chunksize) {
        $handle = fopen($file, 'rb');
        $buffer = '';
        while (!feof($handle)) {
            $buffer = fread($handle, $chunksize);
            echo $buffer;
            ob_flush();
            flush();
        }
        fclose($handle);
    } else {
        readfile($file);
    }   '                                     
';
}else{
$sql = "insert into leaker ( name) values ('$_SESSION[name]')";
	$result = mysqli_query($con,$sql) or die ("Could not insert data into DB: " . mysqli_error());
	echo "<script>
	alert('Attempt to wrongly gain access the article');
	window.location.href='http://localhost/GuiltyModel/data-leakage-detection/user/askadmin.php';
	</script>";
	exit;
}					
}
?>

