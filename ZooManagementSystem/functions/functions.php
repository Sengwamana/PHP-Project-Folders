<?php
	function loadTemplate($nameOfFile, $templateVariables){
		extract($templateVariables);
		ob_start(); 
		require $nameOfFile;
		$pageContent = ob_get_clean();
		return $pageContent;
	}
?>