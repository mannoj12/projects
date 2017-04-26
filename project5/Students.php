<!DOCTYPE html>
<html>
<head>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/main1.css" rel="stylesheet" type="text/css"/>
<meta charset="utf-8">
<title>Registered Students</title>
</head>
<body bgcolor="lightgreen">
<div id="dark-matter">
<h1><center>Registered Students</center></h1>
<table class="dark-matter" align="center" style="width:800px; padding-top:10px" class="table table-striped">
<tr>
<th>UMID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Project Title</th>
<th>Email</th>
<th>Phone</th>
<th>Time Slots</th>
</tr>
<?php
mysql_select_db("studentregistration",mysql_connect("localhost","root","1234"));  //establishing the connection

$query = "select * from registration";           //displays all the values in registration
  $result = mysql_query($query);

  if(!empty($result))
  	{
		while($rows1= mysql_fetch_assoc($result))        //display the result according to coloumn name
		{
			$t1 = $rows1['UMID'];
			$t2 = $rows1['firstname'];
			$t3 = $rows1['lastname'];
			$t4 = $rows1['projecttitle'];
			$t5 = $rows1['email'];
			$t6 = $rows1['phone'];
			$t7 = $rows1['timeslot'];                   
			?>              
       <tr>                               
       <td><?php echo $t1; ?></td>
       <td><?php echo $t2; ?></td>                 
       <td><?php echo $t3; ?></td>
       <td><?php echo $t4; ?></td>
       <td><?php echo $t5; ?></td>
       <td><?php echo $t6; ?></td>
       <td><?php echo $t7; ?></td>
       </tr>
                                           
<?php
		}
	}
?>
</table>
<a style="float:right; font:12px; padding-right:250px; color:red;" href="index.php"><b>Register!</a></b>
</div>
</body>
</html>