<?php

class Remote{

	public function CURL($url,$method,$params,$apikey)
	{
		$ch = curl_init();
		//不同请求方法的数据提交
		switch ($method){
			case "GET" :
				curl_setopt($ch, CURLOPT_HTTPGET, true);//TRUE 时会设置 HTTP 的 method 为 GET，由于默认是 GET，所以只有 method 被修改时才需要这个选项。
				break;
			case "POST":
				if(is_array($params)){
					$params = json_encode($params);
				}
				curl_setopt($ch, CURLOPT_POST, true);
				//设置提交的信息
				curl_setopt($ch, CURLOPT_POSTFIELDS,$params);//全部数据使用HTTP协议中的 "POST" 操作来发送。
				break;
			case "PUT" :
				curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, "PUT");
				if(is_array($params)){
					$params = json_encode($params);
				}
				curl_setopt($ch, CURLOPT_POSTFIELDS,$params);
				break;
			case "DELETE":
				curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
				curl_setopt($ch, CURLOPT_POSTFIELDS,$params);
				break;
		}
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //TRUE 将curl_exec()获取的信息以字符串返回，而不是直接输出。

		$header = ['api-key:'.$apikey]; //设置一个你的浏览器agent的header
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

		curl_setopt($ch, CURLOPT_HEADER, 0); //不返回response头部信息
		curl_setopt($ch, CURLINFO_HEADER_OUT, true); //TRUE 时追踪句柄的请求字符串，从 PHP 5.1.3 开始可用。这个很关键，就是允许你查看请求header

		curl_setopt($ch, CURLOPT_URL, $url);
		$data = json_decode(curl_exec($ch));
		//echo curl_getinfo($ch, CURLINFO_HEADER_OUT); //官方文档描述是“发送请求的字符串”，其实就是请求的header。这个就是直接查看请求header，因为上面允许查看
		curl_close($ch);

		return $data;
	}
}