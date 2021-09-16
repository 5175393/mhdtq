<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';
$kw = isset($_GET['kw']) ? $_GET['kw'] : '';
$c = isset($_GET['c']) ? $_GET['c'] : '';
$sss = curl_get("https://175dt.com/search?id=".$id."&kw=".$kw."&c=".$c."");
echo $sss;

function curl_get($url , $timeout = 15) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);    // 要求结果为字符串且输出到屏幕上
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); //允许302跳转
    curl_setopt($ch, CURLOPT_MAXREDIRS, 5);  //允许跳转次数
    curl_setopt($ch, CURLOPT_HEADER, FALSE); // 不要http header 加快效率
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.62 Safari/537.36');
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout); //超时时间
	
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'cookie: __gads=ID=488d3c8eea139dad-22107caaffc50071:T=1613118746:RT=1613118746:S=ALNI_MbMjYwbN9ET360wb7xKE_qPAk6lTA; Hm_lvt_11140cdd470880852de059c73f9ddc35=1613531231,1614308109,1614355392,1614382353; gadsTest=test; Hm_lpvt_11140cdd470880852de059c73f9ddc35=1614382356',
		'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36',
		'sec-fetch-dest: empty',
		'sec-fetch-mode: cors',
		'sec-fetch-site: same-origin',
		'x-requested-with: XMLHttpRequest',
	));
	
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}
