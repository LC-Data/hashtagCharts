<?php

$hashTagSearch = $_POST["input"];

$hashTagSearch2 = $_POST["input2"];

exec("python -u /var/www/html/tweepyPy3.py $hashTagSearch $hashTagSearch2 2>&1", $results);		//Point the path in this line to your file to be executed

echo json_encode($results);

?>
