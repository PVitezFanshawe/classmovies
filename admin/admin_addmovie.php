<?php
	require_once('phpscripts/config.php');
	$tbl="tbl_genre";
	$genQuery = getAll($tbl);
	
	//confirm_logged_in();


	if(isset($_POST['submit'])){
		$title = $_POST['title'];
		$cover = $_FILES['cover'];
		$year = $_POST['year'];
		$runtime = $_POST['runtime'];
		$storytine = $_POST['storyline'];
		$trailer = $_POST['trailer'];
		$release = $_POST['release'];
		$genre = $_POST['genList'];
		$uploadMovie = addMovie($title, $cover, $year, $runtime, $storyline, $trailer, $release, $genre);
		$message = $uploadMovie;
		// echo $cover['name'];
		// echo $cover['type'];
		// echo $cover['size'];
		// echo $cover['tmp_name'];

	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome to your admin panel login</title>
</head>
<body>
	<?php if(!empty($message)){ echo $message;} ?>

	
	<form action="admin_addmovie.php" method="post" enctype="mltipart/form-data">
		<label>Movie Title:</label>
		<input type="text" name="title" value="<?php if(!empty($title)){echo $title;}  ?>">
		<br>
		<label>Movie Cover Image:</label>
		<input type="file" name="cover" value="">
		<br>
		<label>Movie Year:</label>
		<input type="text" name="year" value="<?php if(!empty($year)){echo $year;}  ?>">
		<br>
		<label>Movie Runtime:</label>
		<input type="text" name="runtime" value="<?php if(!empty($runtime)){echo $runtime;}  ?>">
		<br>
		<label>Movie Storyline:</label>
		<input type="text" name="storyline" value="<?php if(!empty($storyline)){echo $storyline;}  ?>">
		<br>
		<label>Movie Trailer:</label>
		<input type="text" name="trailer" value="<?php if(!empty($trailer)){echo $trailer;}  ?>">
		<br>
		<label>Movie Release:</label>
		<input type="text" name="release" value="<?php if(!empty($release)){echo $release;}  ?>">
		<br>
		<?php 
			while($row = mysqli_fetch_array($getQuery)){
				echo "<option value=\"{$row['genre_id']}\">{$row['genre_name']}</option>";
			}
		
		?>
		<label>Genre:</label>
		<input type="text">
		<input type="submit" name="submit" value="Show me the money">
	</form>

</body>
</html>