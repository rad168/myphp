<?php
$id = isset($_GET['id'])?$_GET['id']:'1';
$n = array('1'=>array('name'=>'tv_jxtv1','time'=>1134937650 + floor((time()-0)/3)),//ID=1,江西卫视
'2'=>array('name'=>'tv_jxtv2','time'=>1135830050 + floor((time()-0)/3)),//ID=2,江西都市
'3'=>array('name'=>'tv_jxtv3_hd','time'=>1135829380 + floor((time()-0)/3)),//ID=3,江西经视
'4'=>array('name'=>'tv_jxtv4','time'=>1135829870 + floor((time()-0)/3)),//ID=4,江西影视
'5'=>array('name'=>'tv_jxtv5','time'=>1135829830 + floor((time()-0)/3)),//ID=5,江西公共
'6'=>array('name'=>'tv_jxtv6','time'=>1135829460 + floor((time()-0)/3)),//ID=6,江西少儿
'7'=>array('name'=>'tv_jxtv7','time'=>1135830220 + floor((time()-0)/3)),//ID=7,江西新闻
'taoci'=>array('name'=>'tv_taoci','time'=>1135319220 + floor((time()-0)/3)),//ID=taoci,陶瓷频道
'8'=>array('name'=>'tv_jxtv8','time'=>1135359760 + floor((time()-0)/3)));//ID=8,移动频道
header("Content-Type:application/vnd.apple.mpegurl");
header("Content-Disposition:attachment;filename={$n[$id]['name']}.m3u8");
$times=$n[$id]['time'];
$content = "#EXTM3U\r\n";
$content .= "#EXT-X-VERSION:3\r\n";
$content .= "#EXT-X-ALLOW-CACHE:YES\r\n";
$content .= "#EXT-X-MEDIA-SEQUENCE:$times\r\n";
$content .= "#EXT-X-TARGETDURATION:3\r\n";
for ($i=0;$i<5;$i++){
	$content .= "#EXTINF:3,\r\n";
	$content .= "https://jsp-tv-live.jxtvcn.com.cn/live-jsp/{$n[$id]['name']}-{$times}.ts\r\n";
	$times++;
}
echo $content;
?>
