<?php
$id = isset($_GET['id'])?$_GET['id']:"xwzh";
$ids = [
        "xwzh"=>[4,"东莞新闻综合"],
        "shzx"=>[5,"东莞生活资讯"]
];
$url = "https://dgrtv.sun0769.com/index.php/online2/".$ids[$id][0];
//preg_match_all("/curr_stream.*? = \"(.*?)\"/i",get($url),$tmp);
preg_match_all("/curr_stream_hd.*? = \"(.*?)\"/i",get($url),$tmp);

if($tmp[1][1]){
        $playurl = $tmp[1][1];
}
else{
        $playurl = $tmp[1][0];
}
header("Location:"."https:".$playurl);
function get($url,$rtype=true){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, $rtype);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
}

?>
