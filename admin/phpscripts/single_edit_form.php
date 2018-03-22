<?php
	function single_edit($tbl, $col, $id) {
        $result = getSingle($tbl, $col, $id);
        $getResult = mysqli_fetch_array($result);
        // echo mysqli_num_fields($result);
        echo "<form action=\"phpscripts/editall.php\" method=\"POST\">";
        echo "<input hidden name=\"tbl\" value=\"{$tbl}\">";
        echo "<input hidden name=\"col\" value=\"{$col}\">";
        echo "<input hidden name=\"id\" value=\"{$id}\">";
        for($i=0; $i<mysqli_num_fields($result); $i++){ #loops for each result
            $dataType = mysqli_fetch_field_direct($result, $i); #gives access to the properties of the data (varChar, text, etc.)
            $fieldname =$dataType -> name;
           // echo $fieldname;
            $fieldtype = $dataType -> type;
            // echo $fieldtype;

            if ($fieldname != $col) {
                echo "<label>{$fieldname}</label><br>";
                if($fieldtype != "252"){
                    echo "<input type=\"text\" name=\"{$fieldname}\" value=\"{$getResult[$i]}\"> <br>";
                
                }else {
               echo "<textarea name=\"{$fieldname}\">{$getResult[$i]}</textarea><br>";
                }
            }
        
        }
        echo "<input type=\"submit\" name=\"submit\" value=\"Save Content\">"; 
        echo "</form>";
       
    }

?>
