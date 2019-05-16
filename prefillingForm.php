


  <?php

 	if ($_GET['id'] != ""){
 		$db=mysqli_connect('localhost','root','','php');

 		$sql_query ="SELECT * FROM users WHERE id=".$_GET['id'];

        $result=mysqli_query($db,$sql_query);
        while($row=mysqli_fetch_array($result)){
	
 ?> 
<!-- $_PHP_SELF = la submit codul se va executa in pagina curenta -->
<form method="post" action="<?php $_PHP_SELF ?>">
	User name: <input type="text" name="name" value="<?php
     echo htmlspecialchars($row['name']);?>" > <br/>

	
	Gender :
	 <input type="radio" name="gender" value="f" <?php
       //verificare daca este setat gender f
      if($row['gender'] == 'f'){
      	echo 'checked';
      }

	 ?>> female 
	 <input type="radio" name="gender" value="m" <?php
       if($row['gender']=='m'){
       	echo 'checked';
       }
	 ?>> male <br/>
	


	Favorite color:
	 <select name="color">
	 	<option value="">Please select</option>
	 	<option value="#f00" <?php
         if($row['color'] == '#f00'){
         	echo 'selected';
         }
	 	?>> red </optiom>
	 	<option value="#0f0" <?php
          if($row['color'] == "#0f0"){
          	echo 'selected';
          }
	 	?>>green </option>
	 	<option value="#00f" <?php
          if($row['color'] == "#00f"){
          	echo 'selected';
          }
	 	?>>blue</option>
	 </select><br/>	
<?php
}
}
?>


	    <input type="submit" name="update" value="Update">
        
</form>



       <a href="select.php"> Afiseaza baza de date: </a>


<!--  UPDATE -->
<?php
if (isset($_POST['update'])){
	$id=$_GET['id'];
	$name = $_POST['name'];
	$color = $_POST['color'];
	$gender = $_POST['gender'];

	$db=mysqli_connect('localhost','root','','php');
	$sql_query = sprintf("UPDATE users SET  name='".$name."' , color='".$color."', gender='".$gender."' WHERE id=".$id,
         	  mysqli_real_escape_string($db,$name),
         	  mysqli_real_escape_string($db,$color),
         	  mysqli_real_escape_string($db,$gender),
         	  mysqli_real_escape_string($db,$id));

         if (mysqli_query($db,$sql_query)){
         		 echo '<p> USER UPDATED. </p>';
	         mysqli_close($db);
	         header('Location: select.php');
         }
           
}


?>