<?php
include 'db.php';

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Solvpath App</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
   <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>
<body>
  
<div class="container">
  <h1>List of Registered Users</h1>
  <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
            	<th>Sr No</th>
                <th> Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Company Name</th>
                <th>Address</th>
                <th>Website</th>
                <th>CRM</th>
                <th>Industry</th>
                <th>Support Tickets</th>
                
            </tr>
        </thead>
        <tbody>
        	<?php
        	if ($result->num_rows > 0) 
{
    $i = 1;
    while($row = $result->fetch_assoc()) 
    { ?>
        
        	<tr>
        		<td><?php echo $i; ?></td>
                <td><?php echo $row["first_name"].' '.$row["last_name"]; ?></td>
                <td><?php echo $row["emails"]; ?></td>
                <td><?php echo $row["phone"]; ?></td>
                <td><?php echo $row["company_name"]; ?></td>
                <td><?php echo $row["address_line_1"].' '.$row["address_line_2"].' '.$row["city"].','.$row["state"].'-'.$row["zip_code"]; ?></td>
                <td><?php echo $row["main_website"]; ?></td>
                <td><?php echo $row["current_crm"]; ?></td>
                <td><?php echo $row["industry"]; ?></td>
                <td><?php echo $row["monthly_support_tickets"]; ?></td>

                
            </tr>

    <?php
    $i = $i+1;
}

}
        	?>
        </tbody>
    </table>

</div>
<script>
$(document).ready(function(){
	new DataTable('#example');
	});
</script>
</body>
</html>