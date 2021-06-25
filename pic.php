<?php
 include('db.php');
?>
<!DOCTYPE>
<html>
<header>
 <title>PICTURE</title>
</header>
<body>
  <table>
  	<thead>
  		<tr>
  			<td>IMAGE</td>
  		</tr>
  	</thead>
  	<?php
  	   $sql = "select * from gallery where artistid =?";
  	   $result = mysqli_query($conn, $sql);

  	   while($row =mysqli_fetch_array($result))
  	   {
  	   	?>

  	   	<tr>
  	   		<td><?php echo '<img src="data:image;base64,'.base64_encode($row['entry']).'" alt="Image">';  ?></td>
  	   	</tr>

  	   	<?php

  	   }
  	?>
  </table>
</body>
</html>