<?php

    function addMovie($title, $cover, $year, $runtime, $storyline, $trailer, $release, $genre) {
    echo "From addMovie.php";
        include("connect.php");
        if($_FILES['cover']['type'] == "image/jpeg" || $_FILES['cover']['type'] == "images/jpg") {
        $target = "../images/{$cover['name']}";
            if(move_uploaded_file($_FILES['cover']['tmp_name'], $target)) {
                //echo "file moved";
                $orig = "../images/{$cover['name']}";
                $th_copy = "../images/TH_{$cover['name']}";
                
                if(!copy($orig, $th_copy)) {
                    echo "Failed to copy";
                }

                $image = $cover['name'];
                //$size = getimagesize($orig);
                //echo $size[1];
                $addstring = "INSERT INTO tbl_movies VALUES (NULL, '{$image}', '{$title}', '{$year}', '{$runtime}', '{$storyline}', '{$trailer}', '{$release}')"; #query-> add new movie to database
                //echo $addstring;
                $addresult = mysqli_query($link, $addstring);
                if($addresult){ 
                    $qstring = "SELECT * FROM tbl_movies ORDER BY movies_id DESC LIMIT 1"; #grab the last movie
                    $lastmovie = mysqli_query($link, $qstring); #runs the above query
                    $row = mysqli_fetch_array($lastmovie); # formats the data into an array
                    $lastID = $row['movies_id']; #takes the id from that array
                    // echo $lastID; 
                    
                $gestring = "INSERT INTO tbl_mov_genre VALUES(NULL, {$lastID}, {$genre})"; #query to insert the link for a movie into the mov_genre linking table
                $genresult = mysqli_query($link, $genstring); #runs the query

                redirect_to("admin_index.php");
                }
            }
        }
  }

 ?>
