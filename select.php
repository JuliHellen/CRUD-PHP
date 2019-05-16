
<?php

$db=mysqli_connect('localhost','root','','php');
$sql='SELECT * FROM users';
$result=mysqli_query($db,$sql);
?>



<table border=1>
    <thead>
    <tr>
    <th> Id </th>	
    <th> Color</th>
    <th> Name</th>
    <th> Gender</th>
    <th>Edit</th>
    <th>Delete</th>
   
    </tr>
    </thead>  
<tbody>

  <?php  while($row=mysqli_fetch_array($result)){ ?>
	<tr>
<td><?php echo$row['id'];?></td>	<!-- edit/delete -->
<td><?php echo $row['color'];?> </td>  
<td><?php echo $row['name'];?></td>
<td><?php echo $row['gender'];?></td>

<td><a href="prefillingForm.php?id=<?php echo $row['id'];?>">Edit</a></td>
<td><a href="delete.php?id=<?php echo $row['id'];?>">Delete</a></td>
	<?php
}

mysqli_close($db);

    ?>
    
</tbody>  
</table>
 
