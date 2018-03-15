<?php

require_once('phpscripts/config.php');

  $tbl="tbl_genre";
  $genQuery = getAll($tbl);

  if(isset($_POST['submit'])) {
    $title = $_POST['title'];
    $cover = $_FILES['cover'];
    $year = $_POST['year'];
    $runtime = $_POST['runtime'];
    $storyline = $_POST['storyline'];
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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>User Login</title>
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
  <h1 class="welcomeMessage">Welcome Company Name</h1>

  <form action="admin_addMovie.php" method="post" enctype="multipart/form-data">

    <label>Movie Title:</label>
    <input type="text" value="<?php if (!empty($title)){echo $title;} ?>" name="title"><br><br>
    <label>Movie Cover:</label>
    <input type="file" value="<?php if (!empty($cover)){echo $cover;} ?>" name="cover"><br><br>
    <label>Movie Year:</label>
    <input type="text" value="<?php if (!empty($year)){echo $year;} ?>" name="year"><br><br>
    <label>Movie Runtime:</label>
    <input type="text" value="<?php if (!empty($runtime)){echo $runtime;} ?>" name="runtime"><br><br>
    <label>Movie Storyline:</label>
    <input type="text" value="<?php if (!empty($storyline)){echo $storyline;} ?>" name="storyline"><br><br>
    <label>Movie Trailer:</label>
    <input type="text" value="<?php if (!empty($trailer)){echo $trailer;} ?>" name="trailer"><br><br>
    <label>Movie Release:</label>
    <input type="text" value="<?php if (!empty($release)){echo $release;} ?>" name="release"><br><br>
    <select name="genList">
    <?php
      while($row = mysqli_fetch_array($genQuery)) {
        echo "<option value=\"{$row['genre_id']}\">{$row['genre_name']}</option>";
      }
    ?>
  </select>

    <input type="submit" name="submit" value="Add Movie" id="submit">


  </form>
</body>
</html>