<?php

	function phpMax($string='',$file=TRUE) {
		$output = '';
		$arrStrings = explode(' ', $string);
		$tabCnt = 0;
		foreach ($arrStrings as $key => $val) {
			if (preg_match('/{/', $val)) { $tabCnt++; }
			if (preg_match('/}/', $val)) { $tabCnt--; }
			$tabs = str_repeat("\t", $tabCnt);
			$val = preg_replace('/{/', "{\n$tabs", $val);
			$val = preg_replace('/}/', "}\n$tabs", $val);
			$val = preg_replace('/^([^{}]+?);/', "$1;\n$tabs", $val);
			$output .= $val.' ';
		}
		$output = preg_replace('/\t /', "\t", $output);
		$output = preg_replace('/\n /', "\n", $output);
		$output = preg_replace('/\t}/', "}", $output);
		$output = preg_replace('/(\s*?)(public|private|protected) function/i', "\n$1$2 function", $output);
		$output = preg_replace('/(\s*?)class (.+?){/i', "\n$1class $2{", $output);
		$output = ($file) ? $output : htmlentities($output);
		$output = ($file) ? $output : preg_replace('/\t/', str_repeat('&nbsp;',8), $output);
		$output = ($file) ? $output : preg_replace('/\n/', '<br />', $output);
		return $output;
	}	

	$input = file_get_contents('index.php');

	echo phpMax($input,FALSE);
	