<?php
/*!<link rel="stylesheet" type="text/css" media="screen" href="/css/minify.css.php" />*/
$files= array(
        'layout.css',
        'mobile.css',
        'site.css',
        'screen.css'
);
$output='';
foreach($files as $file){
  $output.=file_get_contents($file);
}
$output=preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $output);
$output=str_replace(': ', ':', $output);
$output=str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $output);
ob_start('ob_gzhandler');
header('Cache-Control: public');
header('Expires: '. gmdate('D, d M Y H:i:s', time() + 86400) . ' GMT');
header('Content-type: text/css');
echo($output);
?>
