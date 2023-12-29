<?php
error_reporting(0);
$id = isset($_GET['id']) ? $_GET['id'] : 'gdws';
$n = [
    'gdws' => 1182, //广东卫视
    'gdzj' => 1183, //广东珠江
    'nfws' => 1197, //大湾区卫视
    'gdms' => 1185, //广东民生
    'gdxw' => 1186, //广东新闻
    'gdjjkj' => 1196, //广东经济科教
    'gdty' => 1184, //广东体育
    'gdse' => 1200, //广东少儿
    'gdys' => 1199, //广东影视
    'jjkt' => 1187, //嘉佳卡通
    'gdgj' => 1191, //广东国际
    'gdyd' => 2463, //广东移动
    'gdzy' => 1198, //广东综艺4K
    'gdwh' => 2511, //GRTN文化频道

    'zqzh' => 1232, //肇庆综合
    'zqgg' => 2525, //肇庆公共
    'hzxw' => 2396, //惠州新闻综合
    'qyzh' => 2400, //清远综合
    'mzzh' => 2401, //梅州综合
    'hyzh' => 2402, //河源综合
    'hygg' => 2496, //河源公共
    'lpzh' => 2520, //连平台
    'yjtv1' => 2505, //阳江-1
    'yjtv2' => 2506, //阳江-2
    'hdzh' => 2404, //惠东综合
    'kpzh' => 2405, //开平综合
    'kpsh' => 2406, //开平生活
    'shzh' => 2408, //四惠新闻综合
    'gnzh' => 2414, //广宁综合
    'gbjd' => 2439, //工布江达县广播电视台
    'hzzh' => 2440, //化州综合
    'hszh' => 2441, //鹤山综合
    'ljzh' => 2445, //廉江综合
    'ydxw' => 2447, //英德新闻综合
    'qxzh' => 2448, //清新综合
    'pnzh' => 2450, //普宁综合
    'zjzh' => 2452, //紫金综合
    'lzzh' => 2455, //连州综合
    'yczh' => 2458, //阳春综合
    'fgzh' => 2460, //佛冈综合
    'hjzh' => 2462, //怀集综合
    'hytv' => 2470, //惠阳电视台
    'xyzh' => 2471, //信宜综合
    'xwzh' => 2474, //徐闻综合
    'yxzh' => 2476, //阳西综合
    'tstv' => 2479, //台山台
    'sxtv' => 2488, //遂溪台
    'xhzh' => 2490, //新会综合
    'ldzh' => 2491, //罗定综合
    'hpzh' => 2492, //和平综合
    'dytv' => 2497, //东源台
    'wczh' => 2499, //吴川综合
    'lctv' => 2503, //乐昌电视台
    'cazh' => 2523, //潮安综合
    'epzh' => 2529, //恩平综合
];
$json_url = 'https://php.17186.eu.org/gdtv/data.json';
$json_data = file_get_contents($json_url);
$data = json_decode($json_data, true);
$m3u8_url = '';
if (isset($n[$id])) {
    $pkid = $n[$id];
    foreach ($data as $item) {
        if ($item['pkid'] == $pkid) {
            $m3u8_url = $item['url'];
            break;
        }
    }
}
header("Location: $m3u8_url");
?>
