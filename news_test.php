<?php 

$homepage = file_get_contents('http://newsapi.org/v1/sources');
$news=json_decode($homepage,true);
print_r($news);
echo "<br> <br>";
foreach($news['articles'] as $value)
{

	print_r($value['title']);
	echo "<br>";
	print_r($value['description']);
	echo "<br> <br>";

}

?>