<?php
error_reporting(0);
$id = isset($_GET['id'])?$_GET['id']:'fct720';
$playseek=$_GET['playseek'];
$playurl = [
    'fct720' => 'http://cdn.jdshipin.com:8880/gd仅限自用请勿二次分享240208.php?id=1350_1500',//翡翠台720
    'fct406' => 'http://cdn.jdshipin.com:8880/gd仅限自用请勿二次分享240208.php?id=1350_800',//翡翠台406
    'mzt720' => 'http://cdn.jdshipin.com:8880/gd仅限自用请勿二次分享240208.php?id=1351_1500',//明珠台720
    'asam' => 'http://cdn.jdshipin.com:8880/gd仅限自用请勿二次分享240208.php?id=1352_1500',//澳视澳门720
    'viutv' => '404.html?viu',//VIUTV
    'hoytv' => '404.html?hoytv',//hoytv
    'stzh' => 'http://cdn.jdshipin.com:8880/shantou.php',//汕头综合
    'pdmc' => 'pdbfdz',//频道名称
    'pdmc' => 'pdbfdz',//频道名称
    'pdmc' => 'pdbfdz',//频道名称
    'pdmc' => 'pdbfdz',//频道名称

     ];
date_default_timezone_set("Asia/Shanghai");
$stream = "{$playurl[$id]}";

//if($id == "fct" || $id == "mzt" || $id == "asam"){
//	$stream = "{$stream}"."?auth="."$fmmdate";
//	}

if($playseek !== null){
	$stream = "{$stream}"."&playseek="."$playseek";
	}
header('location:'.$stream);

?>
