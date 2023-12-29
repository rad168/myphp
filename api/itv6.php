<?php
$id = isset($_GET['id'])?$_GET['id']:'6000000006000320630';
$cid = isset($_GET['cid'])?$_GET['cid']:'wasusyt';
$arr = ['2','3','4','5','6','7','12','13','14','16','19','20','21','22','23','24','25','82','83','84','85','86','87','88','89','90','91','92','93','94','95','96','97','98','99'];
$ip = $arr[array_rand($arr)];
$m3u8 = "http://[2409:8087:7001:20:1000::{$ip}]:6610/000000001000/{$id}/index.m3u8?channel-id={$cid}&Contentid={$id}&livemode=1&stbId=3&HlsProfileId=";
header("Content-Type: application/vnd.apple.mpegURL");
header('location:'.$m3u8);
?>
