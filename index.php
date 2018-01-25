<?php
  // ini_set('display errors',1);
  // error_reporting(E_ALL);

  require_once('admin/phpscripts/config.php');
  $tbl = 'tbl_movies';
  $getMovies = getAll($tbl);


 ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome to the Finest Selection of Blu-rays on the internets!</title>
</head>
<body>
  <?php
  include('includes/nav.html');

  if(!is_string($getMovies)){
    while($row = mysqli_fetch_array($getMovies)){
      echo "<img src=\"images/{$row['movies_cover']}\" alt=\"{$row['movies_title']}\">";
    }
  }else{
    echo "<p class= \" error\">{$getMovies}</p>";
  }

  include('includes/footer.html');

   ?>
</body>
</html>
