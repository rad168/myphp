<?php
/*
* GeJI恩山论坛
    .php?id=0 翡翠台
    .php?id=1 J2
    .php?id=2 无线新闻台[1280x720]
    .php?id=3 无线财*体育资讯台[1280x720]
    .php?id=4 无线新闻台·海外版[1920x1080]
    .php?id=5 無線新聞台·海外版360P
    .php?id=6 无线财*体育资讯台·网络版[1920x1080]
    .php?id=7 無線財經體育資訊台·海外版360P
    .php?id=8 事件直播頻道1
    .php?id=9 事件直播頻道1 360P
    .php?id=10 事件直播頻道2
    .php?id=11 事件直播頻道2 360P
*/
$id = $_GET['id'];
//$ids = ['C','A','I-NEWS','I-FINA','NEVT1','NEVT2','C','A','NEVT1','NEVT2'];
$ids = ['I-J','I-J2','C','A','I-NEWS','I-NEWS','I-FINA','I-FINA','NEVT1','NEVT1','NEVT2','NEVT2'];
$header[] = 'CLIENT-IP:127.0.0.1';
$header[] = 'X-FORWARDED-FOR:127.0.0.1';
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
?>
