<?php
$id = isset($_GET['id'])?$_GET['id']:'fszh';
$n = [
    "fszh" => 3,//佛山综合
    "fsys" => 4,//佛山影视
    "fsgg" => 2,//佛山公共
    "fsnh" => 5,//佛山南海
    "fssd" => 6,//佛山顺德
    "fsgm" => 7,//佛山高明
    "fsss" => 8,//佛山三水
    ];
$h = [
    'APPKEY: xinmem3.0',
    'VERSION: 4.0.9',
    'PLATFORM: ANDROID',
    'SIGN: b2350fe63e26fbf872b424dece22bd1b',
    ];
$ch = curl_init('https://xmapi.fstv.com.cn/appapi/tv/indexaes');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
$data = curl_exec($ch);
curl_close($ch);
$d = json_decode($data);
for($i=0;$i<count($d->data->channel);$i++){
   if($n[$id] == $d->data->channel[$i]->id)
   $str = $d->data->channel[$i]->stream;
   $key='ptfcaxhmslc4Kyrnj$lWwmkcvdze2cub';
   $iv='352e7f4773ef5c30';
   $playurl =  openssl_decrypt(base64_decode($str),'AES-256-CBC',$key,OPENSSL_RAW_DATA,$iv);
   };
header('Location:'.$playurl);
//echo $playurl;
