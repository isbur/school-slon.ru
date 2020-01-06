<?php
	include('header.html');
?>

<p>Большой список ответов на вопросы есть <a href="https://vk.com/topic-403392_26466542">вКонтакте</a>.</p>

<?php
/*
$username = "vh5_site";
$password = "slon-ne-mamont";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) 
  or die("Unable to connect to MySQL");

//select a database to work with
$selected = mysql_select_db("vh5_slon",$dbhandle) 
  or die("Could not select examples");

//Set UTF-8 encoding for russian
mysql_query("SET NAMES 'utf8'");

//execute the SQL query and return records
$result = mysql_query("SELECT * FROM faq");
//fetch tha data from the database
while ($row = mysql_fetch_array($result)) {
   echo "<p class='list_item'>
   	<a><b>В".$row{'id'}.":</b> ".$row{'question'}."</a></p>
   	<div class='list_expand'>".$row{'answer'}."</div>";
}

//close the connection
mysql_close($dbhandle);
*/
?>
<?php
	include('footer.php');
?>