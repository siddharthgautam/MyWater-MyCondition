
<?php
$username = "AnD";
$password = "AnD";
$hostname = "localhost"; 
$database = "AnD";

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password, $database)
  or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";
mysql_select_db($database) or die(mysql_error()); ?>
<!DOCTYPE html>
<html>
<title>Water Save it!</title>
<head>
<!added for bootstrap>
<link rel="stylesheet" href="styles/bootstrap-responsive.css" media="screen" />
<link rel="stylesheet" href="styles/bootstrap.css" media="screen" /><!added for bootstrap>
<!added for bootstrap>
<link rel="stylesheet" href="styles/style.css" media="screen" />
<link rel="stylesheet" href="styles/media-queries.css" />


<script type="text/javascript" src="./scripts/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="./scripts/jquery.isotope.min.js"></script>
<script type="text/javascript" src="./scripts/jquery.smooth-scroll.min.js"></script>
<script type="text/javascript" src="./scripts/waypoints.min.js"></script>
<script type="text/javascript" src="./scripts/setup.js"></script>
</head>
<body>


<?php 
 $B=$_POST['district'];

?>

<h3 align="center"> <?php echo $B."<br>";?></h3>
<?php             
                
           if($B)
             {
 		$data = mysql_query("SELECT DISTINCT state ,district ,quality from `2009` having district='$B' ")  or die(mysql_error()); 
 	
 		while($info = mysql_fetch_array( $data )) 
 		{ $C=$info['quality'];
		Print "<table border cellpadding=5 border=2> "; 
 		Print "<br><tr>"; 
 		Print "<th>State:</th> <th>".$info['state'] . "</th> ";
	
 		Print "<th>District:</th> <th>".$info['district'] . " </th>"; 
 		Print "<th>Quality:</th> <th>".$info['quality'] . "</th> </tr>";
		Print "</table>";
		$sql=mysql_query(" SELECT * from `quality` where Type= '$C' ") or die(mysql_error());
		
		
		while($cause = mysql_fetch_array( $sql )) 
		{
		Print "<table border cellpadding=25 border=2>"; 
		Print "<br><tr>";
		Print "<th>Cause:</th>"."<th>IMPACT:</th>"."<th>REMEDIES:</th>"."</tr>";
		Print "<tr><th>".$cause['Cause'] . "</th>";
		Print "<th>".$cause['Impact'] . "</th>";	
		Print "<th>".$cause['Remedies'] . "</th></tr> "; 
		Print "</table>";
		
 		}
 		} 
	

		
 		
            }
?>
</body>
</html> 



