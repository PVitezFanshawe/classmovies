<?php
	function single_edit($tbl, $col, $id) {
        $result = getSingle($tbl, $col, $id);
        $getResult = mysqli_fetch_array($result);
        //echo mysqli_num_fields($result);
        for($i=0; $i<mysqli_num_fields($result); $i++){ #loops for each result
            $dataType = mysqli_fetch_field_direct($result, $i); #gives access to the properties of the data (varChar, text, etc.)
            $fieldname =$dataType -> name;
            echo $fieldname;
            $fieldtype = $dataType -> type;
            echo $fieldtype;
        }

    }

?>
