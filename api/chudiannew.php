<?php
error_reporting(0);
$id = isset($_GET['id']) ? $_GET['id'] : 'gdws';
$n = [
    'gdws' => 1182, //广东卫视
    'gdzj' => 1183, //广东珠江
    'nfws' => 1197, //大湾区卫视
    'gdms' => 1185, //广东民生
    'xwpd' => 1186, //广东新闻
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
    'zqsh' => 2525, //肇庆生活服务
    'shxwzh' => 2408, //四会新闻综合
    'gnzh' => 2414, //广宁综合
    'hjzh' => 2462, //怀集综合
    'dgxw' => 2395, //东莞新闻综合
    'dggg' => 1235, //东莞生活资讯
    'hzxw' => 2396, //惠州新闻综合
    'hyt' => 2470, //惠阳台
    'hdt' => 2404, //惠东台
    'qyzh' => 2400, //清远综合
    'mzzh' => 2401, //梅州综合
    'hyzh' => 2402, //河源综合
    'hygg' => 2496, //河源公共
    'lpt' => 2520, //连平台
    'zjt' => 2452, //紫金台
    'hpt' => 2492, //和平台
    'dyt' => 2497, //东源台
    'yjt1' => 2505, //阳江-1
    'yjt2' => 2506, //阳江-2
    'yct' => 2458, //阳春台
    'yxzh' => 2476, //阳西综合
    'kpzh' => 2405, //开平综合
    'kpsh' => 2406, //开平生活
    'hszh' => 2441, //鹤山综合
    'tst' => 2479, //台山台
    'xht' => 2490, //新会台
    'epzh' => 2529, //恩平综合
    'gbjd' => 2439, //工布江达县广播电视台
    'hzzh' => 2440, //化州综合
    'xyzh' => 2471, //信宜综合
    'ljt' => 2445, //廉江台
    'sxt' => 2488, //遂溪台
    'xwt' => 2474, //徐闻台
    'wct' => 2499, //吴川台
    'ydxwzh' => 2447, //英德新闻综合
    'qxzh' => 2448, //清新综合
    'lzzh' => 2455, //连州综合
    'fgzh' => 2460, //佛冈综合
    'pnzh' => 2450, //普宁综合
    'chzh' => 2523, //潮安综合
    'ldt' => 2491, //罗定台
    'lct' => 2503, //乐昌台
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
