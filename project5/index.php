<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Register</title>
<link rel="stylesheet" href="styles/main3.css">
</head>
<body bgcolor="white">
<div class="dark-matter">
<h1>Student Registration</h1>
<form method="post" action="index.php" name="Register" id="form" >
<table>
<tr><td>UMID:</td>
<td><input type="text" name="UMID" placeholder = "8 digit student ID"  pattern="[0-9]{8}" maxlength="8"></td></tr>
<tr><td>First Name:</td>
<td><input type="text" name="fname" placeholder="only charecters and no whitespaces allowed" pattern="[A-z]+$" maxlength="20"></td></tr>
<tr><td>Last Name:</td>
<td><input type="text" name="lname" placeholder="only charecters and no whitespaces allowed" pattern="[A-z]+$" maxlength="20"></td></tr>
<tr><td>Project Title:</td>
<td><input type="text" name="ptitle" placeholder="charecters and whitespaces allowed" pattern="[A-z]+$" maxlength="20"></td></tr>
<tr><td>Email-ID:</td>
<td><input type="text" name="email" placeholder="abcgmail.com"></td></tr>
<tr><td>Phone<br>999-999-9999:</td>
<td><input type="text" name="Phone" placeholder="must be in format" maxlength="10"></td></tr>
<tr><td>Time Slots:</td>
<td><select name="Timeslot">
<?php 
$count1 = mysql_query("select count(*) as TimeslotNum from registration where TimeSlot = '2015-09-12 06:00:00'");
$result1 = mysql_fetch_assoc($count1);
if($result1['TimeslotNum'] < 6)
{
	$cal1=	6 - $result1['TimeslotNum'];
?>	
<option value="2015-09-12 06:00:00">12/04/2015 06:00:00 PM (Seats Remaining <?php echo $cal1; ?>)</option>
<?php
}
$count2 = mysql_query("select count(*) as TimeslotNum from registration where TimeSlot = '2015-09-12 07:00:00'");
$result2 = mysql_fetch_assoc($count2);
if($result2['TimeslotNum'] < 6)
{
	$cal2=	6 - $result2['TimeslotNum'];
?>
<option value="2015-09-12 07:00:00">12/09/2015 07:00:00 PM (Seats Remaining <?php echo $cal2; ?>)</option>
<?php
}
$count3 = mysql_query("select count(*) as TimeslotNum from registration where TimeSlot = '2015-10-12 08:00:00'");
$result3 = mysql_fetch_assoc($count3);
if($result3['TimeslotNum'] < 6)
{
	$cal3=	6 - $result3['TimeslotNum'];
?>
<option value="2015-09-12 08:00:00">12/09/2015 08:00:00 PM (Seats Remaining <?php echo $cal3; ?>)</option>
<?php
}
$count4 = mysql_query("select count(*) as TimeslotNum from registration where TimeSlot= '2015-10-12 06:00:00'");
$result4 = mysql_fetch_assoc($count4);
if($result4['TimeslotNum'] < 6)
{
	$cal4=	6 - $result4['TimeslotNum'];
?>
<option value="2015-10-12 06:00:00">12/10/2015 06:00:00 PM (Seats Remaining <?php echo $cal4; ?>)</option>
<?php
}
$count5 = mysql_query("select count(*) as TimeslotNum from registration where TimeSlot= '2015-10-12 07:00:00'");
$result5 = mysql_fetch_assoc($count5);
if($result5['TimeslotNum'] < 6)
{
	$cal5=	6 - $result5['TimeslotNum'];
?>
<option value="2015-10-12 07:00:00">12/10/2015 07:00:00 PM (Seats Remaining <?php echo $cal5; ?>)</option>
<?php
}
$count6 = mysql_query("select count(*) as TimeslotNum from registration where TimeSlot= '2015-10-12 08:00:00'");
$result6 = mysql_fetch_assoc($count6);
if($result6['TimeslotNum'] < 6)
{
	$cal6=	6 - $result6['TimeslotNum'];
?>
<option value="2015-10-12 08:00:00">12/10/2015 08:00:00 PM (Seats Remaining <?php echo $cal6; ?>)</option>
<?php } ?>
</select>
<input type="submit" name="SUBMIT" value="REGISTER">
<input type="submit" name="UPDATE" value="UPDATE">
		</form>
		<a style="color:green" href="Students.php">View list of Registered Students</a>
	</body>
</html>	
 <?php
mysql_select_db("studentregistration",mysql_connect("localhost","root","1234"));  //establishing connection with username and password
if (isset($_POST['SUBMIT']))                   //post to submit
{	
    $UMIDDB = mysql_query("SELECT UMID from registration");
	while($result= mysql_fetch_assoc($UMIDDB))             //fetch the query from registration
	{	
        $resultUMID=$result['UMID'];
	
	if($_POST['UMID'] == $resultUMID)
	{		
         $bool=1;	                    //checks bool value
		break;	
		}
	}
	if(empty($bool))             //if empty then fill the database with details
	{	
        $query = "INSERT INTO registration(UMID,firstname,lastname,projecttitle,email,phone,timeslot) values ('".$_POST['UMID']."','".$_POST['fname']."','".$_POST['lname']."','".$_POST['ptitle']."','".$_POST['email']."','".$_POST['Phone']."','".$_POST['Timeslot']."')";	}
	else
	{		?>
        <script>
				window.alert("User already Registered! Please Re-enter the details and Click on Update.");
        </script>
		<?php    }
	$Output = mysql_query($query);                 //print the output in student.php
	if($Output)
	{	
         header('location:Students.php');	}
}
else if (isset($_POST['UPDATE']))
{
	$UMIDDB = mysql_query("SELECT UMID from registration");    //update the details
	while($result= mysql_fetch_assoc($UMIDDB))
	{	
        $resultUMID=$result['UMID'];
	if($_POST['UMID'] == $resultUMID)
	{	
        $query = "UPDATE registration set UMID='".$_POST['UMID']."', firstname='".$_POST['fname']."',lastname='".$_POST['lname']."',projecttitle='".$_POST['ptitle']."',email='".$_POST['email']."',phone='".$_POST['Phone']."',timeslot='".$_POST['Timeslot']."' where UMID='".$resultUMID."'";
		break;	
		}
	}
	
	if($Output)
	{	
         header('location:Students.php');	}       //print the output in student.php
}
?>
