<?php 

   function addMovie($title, $cover, $year, $runtime, $storyline, $trailer, $release, $genre){
        // echo "from addmovie.php";
        if($_FILES['cover']['type']== "image/jpeg"||$_FILES['cover']['type']== "image/jpg"){
            $target = "../images/{$cover['title']}";
            if(move_uploaded_file($_FILES['cover']['tmp_name'], $target )){
                $orig = $target;
                $th_copy = "../images/TH_{$cover['name']}";
                if(!copy($orig, $th_copy)){
                    echo "failed to copy";
                }
                $size = getimagesize($orig);
                $uploadQuery = "gitINSERT INTO tbl_movies VALUES(NULL, )";
            }
        }
    }
?>
