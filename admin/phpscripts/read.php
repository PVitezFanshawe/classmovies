<?php

	//Get all of something
	 function getAll($tbl){
		 include('connect.php');
		 $queryAll = "SELECT * FROM {$tbl}";
		 $runAll = mysqli_query($link, $queryAll);
		 if($runAll){  //check if object exsists
			 return $runAll;
		 }else{
			 $error = "We can't find the movies right now";
			 return $error;
		 }

		 mysqli_close($link);
	 }

function getSingle($tbl, $col, $id){
	include('connect.php');
	$querySingle = "SELECT * FROM {$tbl} WHERE {$col}= {$id}";
	$runSingle = mysqli_query($link, $querySingle);
	if($runSingle){
		return $runSingle;
	}else{
		$error = "We can't find that movie right now";
		return $error;
	}
	mysqli_close($link);
}

function filterType($tbl){
	include 'connect.php';
	$queryFilter = "SELECT * FROM tbl_movies m, tbl_genre g, tbl_mov_genre mg WHERE m.movies_id = mg.movies_id AND g.genre_id = mg.genre_id AND g.genre_id = 1"
}
?>
