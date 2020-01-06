<?php 
	class quick_template{
		private $t_def;
		public function parse_template($subset = 'main'){
			$content = "";
			$temp_file = $this->t_def[$subset]['file'];
			if (isset($temp_file)){
				if (strlen($temp_file) > 6){
					substr($temp_file, strlen($temp_file) - 6);
				}
				if (file_exists($temp_file)) {
					$fr = fopen($temp_file, 'r');
					$content = fread($fr, filesize($temp_file));
					@fclose($fr);
				}
				else {
					$content = "<!-- Error '$temp_file' //-->";
				}
			}
			else {
				if (isset($this->t_def[$subset]['content'])) {
					$content = $this->t_def[$subset]['content'];
				}
				else {
					$content = "<!-- Error '$subset' not defined //-->";
				}
			}
			$content = preg_replace("/\%([A-Z]*)\%/e", 
			"quick_template::parse_template(strtolower('$1'))", 
			$content);
			return $content;
		}
		function __construct($temp = '') {
			if (is_array($temp)) {
				$this->t_def = $temp;
			}
		}
	}
?>