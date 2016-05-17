<?php
header('Content-type:text/html;charset=utf8')；
//1.curl初始化
$ch = curl_init();

//2.设置选项，包括URL
curl_setopt($ch,CURLOPT_URL,"http://geek.csdn.net/news/detail/73803");  //指定请求的URL
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); //设置为1表示稍后执行的curl_exec函数的返回是URL的返回字符串，而不是把返回字符串定向到标准输出并返回TRUE；
curl_setopt($ch,CURLOPT_HEADER,0);  //设置为0表示不返回HTTP头部信息。

//3.执行并获取HTML文档内容
$output = curl_exec($ch);
if($output === false ){
	echo "CURL Error:".curl_error($ch);
}
else{
	if(preg_match("/<dl class=\"header  bor\">.*<span>(.*)<\/span>.*<\/dl>/isU", $output, $matches)){
		echo $matches[1];
}else{
	print "A match was not found.";
	}


//$info = curl_getinfo($ch);  访问返回的服务器信息
//echo "<pre>";
//print_r($info);
}

//4.释放curl句柄
curl_close($ch);
?>