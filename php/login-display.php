<?php
$con=mysqli_connect("localhost","root","","rusty_db_01");
$logged_user = $_SESSION['username'];

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$resultData = mysqli_query($con,"SELECT DATE_FORMAT(login_datetime,'%W - %M %d, %Y - %r') AS logindatetime FROM login_history where username='$logged_user';");

echo "<div class='table-texts'>";
echo "<table class='col-sm-12'>
<tr>
<th style=\"font-size:12px;\">DATE || TIME</th>  
    </tr>";

while($row = mysqli_fetch_array($resultData))
{
echo "<tr>";
echo "<td>" .  "<font style=\"font-size: 10px;\">" . $row['logindatetime'] . "</font>" ."</td>";
echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>