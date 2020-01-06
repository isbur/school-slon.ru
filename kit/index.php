<?php 
	include_once 'php/quicktemplate.php';
	//include_once 'php/getip.php';
	if (!isset($_GET['file'])) {
		$file='index.html';
	}
	else {
		$file=$_GET['file'];
		//if (!eregi("^[^./][^/]*$", $file)) {echo('Сработала защита от взлома');die();}
	}
	$albom = "";
	$albomfill = "";
	if (isset($_GET['photoalbom'])) {
		$albom = $_GET['photoalbom'];
		if (!(is_dir("photo/$albom")))
		{
			$albomfill = "<p class = \"contheader\">Такого альбома не существует!</p>";
		}
		else
		{
			$i = 1;
			if (file_exists("photo/$albom/small/$i.jpg"))
			{
				if (file_exists("photo/$albom/description.html"))
				{
					$fr = fopen("photo/$albom/description.html", 'r');
					$albomfill = fread($fr, filesize("photo/$albom/description.html"));
					@fclose($fr);
				}
				$albomfill = "$albomfill\n<ul>";
				while(file_exists("photo/$albom/small/$i.jpg"))
				{
					$albomfill = "$albomfill\n<li class = \"lialb\"><a class = \"aalbom\" href = \"/photo/$albom/big/$i.jpg\" rel=\"lightbox[$albom]\"><img src = \"/photo/$albom/small/$i.jpg\"></a></li>";
					$i++;
				}
				$albomfill = "$albomfill\n<div class =\"hook\">&nbsp;</div></ul>";
			}
			else
			{
				$albomfill = "<p class = \"contheader\">В альбоме пока нет фотографий!</p>";
			}
		}
	}
	$titlename = 'Сайт математической школы Слон';
	$dir = 'files';
	$menu = 'menu.html';
	$template = 'template';
	$lg = 'ru';
	if (isset($_GET['lang'])) {
		if ($_GET['lang'] == 'en') {
			$dir = "en$dir";
			$lg = 'en';
		}
	}
	//Template vieu without content
	$temp_arr = array('main' => array('file' => "$template/index.html"),
	'title' => array('content' => "$titlename"),
	'href' => array('file' => "$template/$href"),
	'path' => array('content' => 'template/'),
	'albom' => array('content' => "$albomfill")
	);
	//Add content
	if (file_exists("$dir/$file"))
	{
		$temp_arr['content'] = array('file' => "$dir/$file");
	}
	else
	{
		$temp_arr['content'] = array('file' => "$dir/404.html");
	}
	//Parse template and add blocks
	$engine = new quick_template($temp_arr);
	echo $engine->parse_template();
	
	
	/*$tip = getrip();
	$fr = fopen('php_files/ip.txt', 'w+');
	if ($fr) {
		$tarr = array();
		$tm = 0;
		$tb = false;
		$m = 0;
		while(!feof($fr)) {
			fscanf($fr, "%d.%d.%d.%d %d", &$tv[0], &$tv[1], &$tv[2], &$tv[3], &$tv[4]);
	$fw = fopen('php_files/ip2.txt', 'w+');
			fprintf($fw, "%d.%d.%d.%d %d\n", $tv[0], $tv[1], $tv[2], $tv[3], $tv[4]);
			if ($tstr == $tip && !$tb)
			{
				$tint++;
				$tb = true;
			}
			$tarr[$m][0] = $tstr;
			$tarr[$m][1] = $tint;
			$m++;
			
		}
		fprintf($fw, "%d\n", $m);
		for ($i = 0; $i < $m; $i++) {
			fprintf($fr, "%s %d\n", $tarr[$i][0], $tarr[$i][1]);
		}
		if (!$tb){
			fprintf($fr, "%s 1\n", $tip);
		}
		fclose($fr);
		fclose($fw);
	}*/
?>