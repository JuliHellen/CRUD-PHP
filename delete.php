 <?php
 if(isset($_GET['id']) && ctype_digit($_GET['id'])){
 	//if is true stored in to a variable : id
     $id=$_GET['id'];

	   $db=mysqli_connect('localhost','root','','php');
	   $sql_query = sprintf("DELETE FROM users WHERE id=".$id, 
    				mysqli_real_escape_string($db,$id));

	    if (mysqli_query($db, $sql_query)){echo '<p> USER DELETED!.</p>';}
	   	mysqli_close($db);

 }else{
 	header('Location:select.php');
 }

?>
     <a href ="select.php"> Back to table </a>;

