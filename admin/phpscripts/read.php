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

?>
