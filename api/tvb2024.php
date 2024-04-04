<?php
/*
* GeJI恩山论坛
*.php?id=0 无线新闻台[1280x720]
*.php?id=1 无线财*体育资讯台[1280x720]
*.php?id=2 无线新闻台·海外版[1920x1080]
*.php?id=3 无线财*体育资讯台·网络版[1920x1080]
*.php?id=4 事件直播1台[1280x720]
*.php?id=5 事件直播2台[1280x720]
*.php?id=6 无线新闻台[max1920x1080,min960x360,多画质多音轨DIYP不支持]
*.php?id=7 无线财*体育资讯台[max1920x1080,min960x360,多画质多音轨DIYP不支持]
*.php?id=8 事件直播1台[max1920x1080,min960x360,多画质多音轨DIYP不支持]
*.php?id=9 事件直播2台[max1920x1080,min960x360,多画质多音轨DIYP不支持]
*/
$id = $_GET['id'];
$ids = ['C','A','I-NEWS','I-FINA','NEVT1','NEVT2','C','A','NEVT1','NEVT2'];
$header[] = 'CLIENT-IP:'.$_SERVER['REMOTE_ADDR'];
$header[] = 'X-FORWARDED-FOR:'.$_SERVER['REMOTE_ADDR'];
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,'https://inews-api.tvb.com/news/checkout/live/hd/ott_'.$ids[$id].'_h264?profile=safari');
curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
$data = curl_exec($ch);
curl_close($ch);
$json = json_decode($data);
if($id == '0' || $id == '1' || $id == '4' || $id == '5') {
$url = $json->content->url->hd;
} else if($id == '2' || $id == '3') {
$url = preg_replace('/&p=(.*?)$/','&p=3000',$json->content->url->hd);
} else {
$url = preg_replace('/&p=(.*?)$/','',$json->content->url->hd);
};
header('location:'.$url);
