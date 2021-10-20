<?php
require_once('db-config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inbox</title>
</head>
<body>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">INBOX</h1>
    </div>

    <form action="inbox-display.php" method="post">

                        <?php
                        $hostname = "localhost";
						$username = "root";
						$password = "";
						$databaseName = "rusty_db_01";

						$connect = mysqli_connect($hostname, $username, $password, $databaseName);

                        $tablequery = "SELECT table_name FROM information_schema.tables WHERE table_type = 'base table' AND table_schema='rusty_db_01'";
						                                               
						$result = mysqli_query($connect, $tablequery);
						$options = "";
						while($row = mysqli_fetch_array($result))
						{
							$fetchedTable= $row['table_name'];
							$options = $options."<option value=$fetchedTable>$fetchedTable</option>";                            
						}

                        ?>

                        <select id="ft_tables2" name="ft_tables2" data-flip="false">
                         <option>Choose Table</option>					       	
						             <?php echo $options ?>
						</select>

                        <input type="submit" id="submit" name="submit" value="Go!"> 

    </form>
    
</body>
</html>