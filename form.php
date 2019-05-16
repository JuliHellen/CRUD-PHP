<form method="post" action="<?php $_PHP_SELF ?>">
<!-- <form method="post" action="update.php"> -->
	<label>User name: </label><input type="text" name="name" value="" > 
	<br/>
	<label>Gender :</label>
		<input type="radio" name="gender" value="f"> female 
	 	<input type="radio" name="gender" value="m"> male 
	 <br/>

	<label>Favorite color:</label>
	<select name="color">
	 	<option value="">Please select</option>
	 	<option value="#f00"> red </optiom>
	 	<option value="#0f0">green </option>
	 	<option value="#00f">blue</option>
	</select>
	<br/>	

	<input type="submit" name="insert" value="Insereaza in DB">
        
</form>
        
    <a href="select.php"> Afiseaza baza de date: </a>

<?php
if (isset($_POST['insert'])){
	$name = $_POST['name'];
	$color = $_POST['color'];
	$gender = $_POST['gender'];

	$db = mysqli_connect('localhost','root','','php');
    $sql_query = sprintf("INSERT INTO users (name,color,gender) VALUES  ('%s' , '%s','%s')", 
    				mysqli_real_escape_string($db,$name),
     	            mysqli_real_escape_string($db,$color),
     	            mysqli_real_escape_string($db,$gender));

    mysqli_query($db, $sql_query);
    mysqli_close($db);
    echo '<p> User added.</p>';
}
?>
