<?php
include('simple_html_dom.php');
$fileName="sitemap.xml";

$xml=simplexml_load_file($fileName) or die("Error: Cannot create object");
//print_r($xml);
$forsize=sizeof($xml); // 500
//echo "$forsize" . "<hr/>";
for($i=0;$i<15;$i++)
{

		$url= $xml->url[$i]->loc;
		$html = file_get_html($url);
		foreach($html->find('title') as $element) 
		{	
	   		//echo $i.$element->plaintext .'<hr>';
        	//var_dump($element);
			$arr[]=array("url" =>"$url","title" => "$element->plaintext");
		}
			$size=sizeof($arr);
    if($size==5)
	{
		echo "Storing into DB 5 records..........";
		echo "<hr/>";
//echo "$size";
// Making connection to database
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname;
		// Create connection
		$conn = new mysqli($servername, $username, $password);
		// Check connection
		if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
		} 
		echo "Connected successfully";
		echo "<hr/>";
// Create database
		$sql = "CREATE DATABASE crawler";
		if ($conn->query($sql) === TRUE) {
    		echo "Database created successfully";
			$dbname="crawler";
		} else {
    		echo "Error creating database: " . $conn->error;
		}
		echo "<hr/>";
// sql to create table
		$sqltable = "CREATE TABLE `crawler`.`titletags` ( 
		`url` VARCHAR(100) NOT NULL , 
		`title` VARCHAR(100) NOT NULL )
		ENGINE = InnoDB;";
		if ($conn->query($sqltable) === TRUE) {
    		echo "Table titletags created successfully";
		} else {
    		echo "Error creating table: " . $conn->error;
		}
		echo "<hr/>";
		for($j=0;$j<5;$j++)
		{
			$a=$arr[$j]["url"];
			$b=$arr[$j]["title"];
			//Inserting Data
				$data = "INSERT INTO `crawler`.`titletags` VALUES ('$a','$b');";
				if ($conn->query($data) === TRUE) {
    				echo "New record created successfully";
					echo "<hr/>";
				} else {
    				echo "Error: " . $data . "<br>" . $conn->error;
				}
		}
		$conn->close();
		echo"Connection Closed";
		echo "<hr/>";
		echo"<hr/>";
		unset($arr);
	$size=0;
	}

}
//print_r($arr);
?>