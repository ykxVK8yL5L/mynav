<?php
/*
使用前请注意务必设置好白名单
*/
// header('Content-Type:application/json; charset=utf-8');
// //防跨域调用
// $allow_origin = array(
// 	//域名白名单 
//     'http://192.168.1.168',
//     'https://www.5iux.cn'
// );
// header('Access-Control-Allow-Origin:'.$allow_origin);
// header('Access-Control-Allow-Methods:POST');
// header('Access-Control-Allow-Headers:x-requested-with,content-type');
// $jsonlist = file_get_contents("https://www.bing.com/HPImageArchive.aspx?format=js&idx=0&n=8");
// echo $_GET["callback"].$jsonlist;

// $url = 'http://cn.bing.com/HPImageArchive.aspx?format=js&idx=0&n=1';
// $curl = curl_init();
// curl_setopt($curl, CURLOPT_URL, $url);
// curl_setopt($curl, CURLOPT_HEADER, 0);
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
// curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
// $data = curl_exec($curl);


$url = "https://www.bing.com/HPImageArchive.aspx?format=js&idx=0&n=8";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch);
curl_close($ch);
echo $_GET["callback"].$data;





?>