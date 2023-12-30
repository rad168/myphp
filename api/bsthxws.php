<?php
/*
*作者：清樱
*鸣谢：(以下排名不分先后)
*      代码框架参考 @友善的肥羊 => https://www.right.com.cn/forum/forum.php?mod=viewthread&tid=8291436
*      id部分参考 [url=home.php?mod=space&uid=462]@guoma[/url] => https://www.right.com.cn/forum/forum.php?mod=viewthread&tid=8303446
*      兼容灵感来源 @silverchs => https://www.right.com.cn/forum/forum.php?mod=viewthread&tid=8303741
*      域名匹配参考 @zxjung => https://www.right.com.cn/forum/data/attachment/forum/202309/01/014915mrmrrlfz6dfzrf1f.png
*      diyp回看参考 @可酷可乐 => https://www.right.com.cn/forum/forum.php?mod=viewthread&tid=4120300
*      原版回看参考 @zeroshuo => https://www.right.com.cn/forum/forum.php?mod=viewthread&tid=8271557&page=1&authorid=752586
*      php云部署参考 @fanmingming => https://github.com/fanmingming/myphp
*      部分内置域名参考 @友善的肥羊/@fanmingming
*平台：
*      php在线测试 @bytelang.com => https://www.bytelang.com/build/php7/editor/
*      php云部署 @vercel.com => https://vercel.com/
*      代码托管 @github.com => https://github.com/
*      智能AI @豆包 => https://www.doubao.com/
*
*本代码仅作研究与学习交流使用。不得用于非法用途,由此造成的一切后果由使用者自行承担！
*转载请注明出处,同时保留代码的完整性。
*/
//设置默认时区
date_default_timezone_set("Asia/Shanghai");
//定义内置$ip_arr数组
$ip_arr = [
//        '58.216.22.221/liveplay-kk.rtxapp.com',
//        'fjbciptv.live.bestvcdn.com.cn',
//        'live-gitv-xj-yh.189smarthome.com',
//        'ts-gitv-hb-yh.189smarthome.com',
        '58.216.22.206/liveplay-kk.rtxapp.com',
];//其中live也可换成ts
//$ip参数引入
$ip = empty($_GET['ip']) ? "0" : trim($_GET['ip']);//为空时默认为0,否则处理两边的空白符(如有)
//$ip参数预处理(只是为了原生兼容自定义源标签)
if (preg_match('/^\?.*|^\$.*/', $ip)) {//处理ip=\?.*或ip=\$.*的情况
        $ip = '0';
} else if (preg_match('/\?.*|\$.*/', $ip)) {//处理ip=.*\?.*或ip=.*\$.*的情况
        $ip = preg_replace('/\?.*|\$.*/', '', $ip);
}
//$ip参数合法性判断
if (isset($ip_arr[$ip])) {
//        $ip = $ip_arr[$ip];//$ip_arr数组中已定义,取数组中对应的值
        $ip = $ip_arr[array_rand($ip_arr)];//$ip_arr数组中已定义,取数组中对应的值
} else if (!preg_match("/[a-zA-Z]/i",$ip)) {
        $ip = "$ip/liveplay-kk.rtxapp.com";//$ip_arr数组中未定义且不含字母,当作ip地址
}
//定义内置$id_arr数组
$id_arr = [
        'cctv1' => 'cctv1hd8m/8000000',//CCTV1
        'cctv2' => 'cctv2hd8m/8000000',//CCTV2
        'cctv3' => 'cctv38m/8000000',//CCTV3
        'cctv4' => 'cctv4hd8m/8000000',//CCTV4
        'cctv5' => 'cctv58m/8000000',//CCTV5
        'cctv6' => 'cctv6hd8m/8000000',//CCTV6
        'cctv7' => 'cctv7hd8m/8000000',//CCTV7
        'cctv8' => 'cctv8hd8m/8000000',//CCTV8
        'cctv9' => 'cctv9hd8m/8000000',//CCTV9
        'cctv10' => 'cctv10hd8m/8000000',//CCTV10
        'cctv11' => 'cctv11hd8m/8000000',//CCTV11
        'cctv12' => 'cctv12hd8m/8000000',//CCTV12
        'cctv13' => 'cctv13xwhd8m/8000000',//CCTV13
        'cctv14' => 'cctvsehd8m/8000000',//CCTV14
        'cctv15' => 'cctv15hd8m/8000000',//CCTV15
        'cctv16' => 'cctv16hd8m/8000000',//CCTV16
        'cctv164k' => 'cctv16hd4k/15000000',//CCTV16
        'cctv17' => 'cctv17hd8m/8000000',//CCTV17
        'cctv5p' => 'cctv5phd8m/8000000',//CCTV5+
        'cctv5p2' => 'cctv5hd8m/8000000',//CCTV5+
        'cctv4k' => 'cctv4k/15000000',//CCTV4K
        'cgtn' => 'ottcctvnews/1300000',//CGTN
        'zgjy1' => 'zgjy1t8m/8000000',//中国教育1台
        'zgjy2' => 'cetv2/2500000',//中国教育2台
        'zgjy4' => 'zgjy4hd8m/8000000',//中国教育4台
        'gxws' => 'gxwshd8m/8000000',//广西卫视
        'gdws' => 'gdwshd8m/8000000',//广东卫视
        'szws' => 'szwshd8m/8000000',//深圳卫视
        'hainan' => 'hainanwshd8m/8000000',//海南卫视
        'ssws' => 'sswshd8m/8000000',//三沙卫视
        'ynws' => 'ynwshd8m/8000000',//云南卫视
        'gzws' => 'gzwshd8m/8000000',//贵州卫视
        'dnws' => 'dnwshd8m/8000000',//东南卫视
        'xmws' => 'xmws/1300000',//厦门卫视
        'jxws' => 'jxws8m/8000000',//江西卫视
        'ahws' => 'ahwshd8m/8000000',//安徽卫视
        'hunan' => 'hunanwshd8m/8000000',//湖南卫视
        'hubei' => 'hubeiws8m/8000000',//湖北卫视
        'hnws' => 'hnwshd8m/8000000',//河南卫视
        'hbws' => 'hbwshd8m/8000000',//河北卫视
        'cqws' => 'cqws8m/8000000',//重庆卫视
        'scws' => 'scwshd/8000000',//四川卫视
        'zjws' => 'zjwshd8m/8000000',//浙江卫视
        'jsws' => 'jswshd8m/8000000',//江苏卫视
        'dfws' => 'dfwshd8m/8000000',//东方卫视
        'zqpd' => 'zqpd8m/8000000',//东方卫视
        'sdws' => 'sdws8m/8000000',//山东卫视
        'bjws' => 'bjwshd8m/8000000',//北京卫视
        'tjws' => 'tjwshd8m/8000000',//天津卫视
        'lnws' => 'lnwshd8m/8000000',//辽宁卫视
        'jlws' => 'jlwshd8m/8000000',//吉林卫视
        'hljws' => 'hljwshd8m/8000000',//黑龙江卫视
        'sxws' => 'sxws/1300000',//陕西卫视
        'shanxi' => 'shanxiws/1300000',//山西卫视
        'gsws' => 'gswshd8m/8000000',//甘肃卫视
        'nxws' => 'nxws/1300000',//宁夏卫视
        'qhws' => 'qhws/1300000',//青海卫视
        'xzws' => 'xzws/2500000',//西藏卫视
        'xjws' => 'xjws/1300000',//新疆卫视
        'btws' => 'btws/1300000',//兵团卫视
        'nmgws' => 'nmgws/1300000',//内蒙古卫视
        'kbws' => 'kbws/2500000',//康巴卫视
        'kkse' => 'kkse8m/8000000',//卡酷少儿
        'jykt' => 'jykt/1300000',//金鹰卡通
        'hhxd' => 'hhxd8m/8000000',//哈哈炫动
        'jjkt' => 'jjkt/1300000',//嘉佳卡通
        'zgtq' => 'zgqx/1300000',//中国天气
        'cftx' => 'cftx/2500000',//财富天下
        'cpd' => 'cpdhdavs8m/8000000',//茶频道
        'klcd' => 'klcd8m/8000000',//快乐垂钓
        'hxjc' => 'hxjc8m/8000000',//欢笑剧场4K
        'hxjc4k' => 'hxjc4k/15000000',//欢笑剧场4K
        'dsjc' => 'dsjc8m/8000000',//都市剧场
        'dmxc' => 'dmxc8m/8000000',//动漫秀场
        'leyou' => 'qjshd8m/8000000',//乐游
        'yxfy' => 'yxfy8m/8000000',//游戏风云
        'jbty' => 'jbtyhd8m/8000000',//劲爆体育
        'mlzq' => 'mlyyhd8m/8000000',//魅力足球
        'xsj' => 'xsjhd8m/8000000',//新视觉
        'fztd' => 'fztd8m/8000000',//法治天地
        'jsxt' => 'jingsepd8m/8000000',//金色学堂
        'qcxj' => 'qcxjhd8m/8000000',//七彩戏剧
        'shss' => 'shss8m/8000000',//生活时尚
        'dfcj' => 'dfcjhd8m/8000000',//东方财经
        'xgyy' => 'xgyy8m/8000000',//星光影院
        'dzjc' => 'dzjc8m/8000000',//谍战剧场
        'hyyy' => 'hyyy8m/8000000',//华语影院
        'qqdp' => 'qqdp8m/8000000',//全球大片
        'rmjc' => 'rmjc8m/8000000',//热门剧场
        'qcdm' => 'qcdm8m/8000000',//青春动漫
        'bbdh' => 'bbdh8m/8000000',//宝宝动画
        'djtt' => 'djtt8m/8000000',//电竞天堂
        'rmzy' => 'rmzy8m/8000000',//热门综艺
        'jkys' => 'jkys8m/8000000',//健康养生
        'xqjx' => 'xqjx8m/8000000',//戏曲精选
        'bbkt' => 'bbkt8m/8000000',//百变课堂
        'ktxjx' => 'ktxjx8m/8000000',//看天下精选
        'dfys' => 'dfyshd8m/8000000',//东方影视
        'jsrw' => 'jspdhd/4000000',//纪实人文
        'jyjs' => 'jyjs8m/8000000',//金鹰纪实
        'bjjskj' => 'dajs8m/8000000',//北京纪实科教
        'wxty' => 'wxtyhd8m/8000000',//五星体育
        'dycj' => 'dycjhd8m/8000000',//第一财经
        'hxws' => 'hxwshd4m/4000000',//海峡卫视
        'dfgw' => 'dfgwsxhd8m/8000000',//东方购物
        'fjdsj' => 'fjdsjhd4m/4000000',//福建电视剧
        'fjjy' => 'fjjypdhd4m/4000000',//福建教育
        'fjjj' => 'fjjjshhd4m/4000000',//福建经济
        'fjly' => 'fjlyhd4m/4000000',//福建旅游
        'fjse' => 'fjsehd4m/4000000',//福建少儿
        'fjwt' => 'fjtyhd4m/4000000',//福建文体
        'fjgg' => 'fjgghd4m/4000000',//福建乡村振兴公共
        'fjxw' => 'fjxwhd8m/8000000',//福建新闻
        'fjzh' => 'fjzhhd4m/4000000',//福建综合
        'pudong' => 'hhse/2500000',//浦东电视台
        'shics' => 'icshd8m/8000000',//上海ICS
        'shds' => 'dshd8m/8000000',//上海都市
        'shjy' => 'setvhd/8000000',//上海教育
        'shxwzh' => 'xwzhhd8m/8000000',//上海新闻综合
        'xzzy' => 'xzwszy/2500000',//西藏藏语
        'kzkt1' => 'kkyinj/1300000',//空中课堂一年级
        'kzkt2' => 'kkernj/1300000',//空中课堂二年级
        'kzkt3' => 'kksannj/1300000',//空中课堂三年级
        'kzkt4' => 'kksinj/1300000',//空中课堂四年级
        'kzkt5' => 'kkwunj/1300000',//空中课堂五年级
        'kzkt6' => 'kkliunj/1300000',//空中课堂六年级
        'kzkt7' => 'kkqinj/1300000',//空中课堂七年级
        'kzkt8' => 'kkbanj/1300000',//空中课堂八年级
        'kzkt9' => 'kkjiunj/1300000',//空中课堂九年级
        'kzktg1' => 'kkgaoyinj/1300000',//空中课堂高一
        'kzktg2' => 'kkgaoernj/1300000',//空中课堂高二
        'kzktg3' => 'kkgaosannj/1300000',//空中课堂高三
];
//$id参数引入
//$id = empty($_GET['id']) ? "dfyshd8m/8000000" : trim($_GET['id']);//为空时默认为cctv1,否则处理两边的空白符(如有)
$id = "hxwshd4m/4000000";
//$id参数预处理(只是为了原生兼容自定义源标签)
if (preg_match('/^\?.*|^\$.*/', $id)) {//处理id=\?.*或id=\$.*的情况
        $id = 'cctv1';
} else if (preg_match('/\?.*|\$.*/', $id)) {//处理id=.*\?.*或id=.*\$.*的情况
        $id = preg_replace('/\?.*|\$.*/', '', $id);
}
//$id参数合法性判断
if (isset($id_arr[$id])) {
        $id = $id_arr[$id];//$id_arr数组中已定义,取数组中对应的值
}
//拼接地址前半部分
$url = "http://{$ip}/live/program/live/{$id}/";
//$playseek参数引入
$playseek = $_GET['playseek']??'';
//$starttime参数引入
$starttime = $_GET['starttime']??'';
//$endtime参数引入
$endtime = $_GET['endtime']??'';
//$playseek和$starttime参数判空
if (empty($playseek) && empty($starttime)) {
        //获取时间戳前9位
        $s_t = substr(time(),0,9)-17;//取前9位,即取到十秒位,回退70秒
        //生成m3u8列表前5行
        $m3u8 = "#EXTM3U".PHP_EOL."#EXT-X-VERSION:3".PHP_EOL."#EXT-X-TARGETDURATION:10".PHP_EOL."#EXT-X-MEDIA-SEQUENCE:{$s_t}".PHP_EOL;
        //生成m3u8列表后6行
        for ($i = 0; $i < 5; $i++, $s_t++) {
                $time = $s_t.'0';//将$s_t补到秒位,存到$time参数中
                $date = date('YmdH', $time);//$time转换成年月日时的格式,如2023091920,存到$date参数中
                $m3u8 .= "#EXTINF:10," .PHP_EOL .$url .$date ."/" .$s_t .".ts" .PHP_EOL;//生成m3u8列表后2行
        }
} else {
        if (empty($starttime)) {//$starttime空但$playseek不空
                //$playseek切割
                $t_arr=explode('-',$playseek);
                //转成时间戳
                $starttime = strtotime($t_arr[0]);
                $endtime = strtotime($t_arr[1]);
        }
         //取时间戳前9位
        $s_t = substr($starttime,0,9);
        $e_t = substr($endtime,0,9);
        //生成m3u8列表前4行
        $m3u8 = "#EXTM3U".PHP_EOL."#EXT-X-VERSION:3".PHP_EOL."#EXT-X-TARGETDURATION:10".PHP_EOL."#EXT-X-MEDIA-SEQUENCE:{$s_t}".PHP_EOL;
        //生成m3u8列表后面的行
        for (; $s_t < $e_t; $s_t++) {
                $time = $s_t.'0';//将$s_t补到秒位,存到$time参数中
                $date = date('YmdH', $time);//$time转换成年月日时的格式,如2023091920,存到$date参数中
                $m3u8 .= "#EXTINF:10," .PHP_EOL .$url .$date ."/" .$s_t .".ts" .PHP_EOL;//生成m3u8列表后2行
        }
        //加上结束标志
        $m3u8 .= "#EXT-X-ENDLIST";
}
//设置HTTP响应头,指定媒体响应类型为苹果HLS流媒体格式文件
header("Content-Type: application/vnd.apple.mpegURL");
//在浏览器中打开,默认文件名为index.m3u8
header("Content-Disposition: inline; filename=mnf.m3u8");
//输出拼接好后的m3u8列表
echo $m3u8;
?>
