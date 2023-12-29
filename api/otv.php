<?php
date_default_timezone_set('Asia/Shanghai');
//$id=$_GET['id'];

$id = isset($_GET['id'])?$_GET['id']:'channel43029/2300';
$sid = isset($_GET['sid'])?$_GET['sid']:'4309';
$py = isset($_GET['py'])?$_GET['py']:'0';

$timestamp = intval((time() - 180) / 6 + 0);

$stream = "http://{$sid}-txt.otvstream.otvcloud.com/otv/skcc/review/{$id}/";

$current = "#EXTM3U" . PHP_EOL;
$current .= "#EXT-X-VERSION:3" . PHP_EOL;
$current .= "#EXT-X-TARGETDURATION:6" . PHP_EOL;
$current .= "#EXT-X-MEDIA-SEQUENCE:{$timestamp}" . PHP_EOL;
for ($i = 0; $i < 5; $i++) {
    $current .= "#EXTINF:6.000000," . PHP_EOL;
    $current .= $stream . date("Ymd",time()-180) . "/" . date("Ymd",time()-180) . "T" . date("His",$timestamp*6+$py) . ".ts?starttime=2024" . PHP_EOL;
    $timestamp = $timestamp + 1;
}

header("Content-Type: application/vnd.apple.mpegurl");
header("Content-Disposition: inline; filename=index.m3u8");
echo $current;

?>
