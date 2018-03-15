<?php
    require_once('phpscripts/config.php');

    $result = multiReturns(6);
    list($add, $multiply) = multiReturns(123);
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>OH BOY</title>
</head>
<body>
	<?php
        echo "result 1: {$result[0]}<br>";
        echo "result 2: {$result[1]}<br>";
        echo "result 1: {$add}<br>";
        echo "result 2: {$multiply}<br>";
    ?>
</body>
</html>