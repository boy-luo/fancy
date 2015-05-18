<!DOCTYPE html>
<!--  如果没有此声明，IE低版本将不能解释固定在两边的盒子 -->

<html>
<head>
<title>测试页面的辅助页面</title>
<!--  使页面的编码是utf-8，避免在浏览器输出的是乱码   -->
<meta http-equiv="Content-type" content="text/html;charset=utf-8">
<!--  包含css文件   -->
<link rel = "stylesheet" type = "text/css" href = "../data.css">
<?php 
//include ("config.php");
//include ("functions.php");
//include ("../data.class.php");
//include ("arraydirect.php");
?>
</head>

<body>
<?php
//包含统一的头部导航文件
//include ("../navigation.php");
?>
 ^:^<br><br>

<div id="tables">
<div id="topface">
<?php
echo '本页面作为 用于简单功能的 测试  的辅助页面（如公共数据的测试）。'."<br>";
$testinfor = '现在是辅助页面给变量的-------初始值。';
$test = '测试占位符。';
//echo $resultArry."<br>";

//$congfigermy->fileName = "跨页面设置值 测试";
//$congfigermy->echoAllOut();

/*
echo $resulte."<br>";
echo $arrayMesage."<br>";
echo $resultArry."<br>";
*/

/*  
foreach($nowArray as $key=>$value){
	echo $key." 直接把数据建立成数组 ".$value."<br>";
}


//遍历输出历史数据详情
foreach($arrayMesage as $key=>$value){
	echo $key." 直接把数据 详细信息建立成数组 ".$value."<br>";
}
*/
?>
</div>
</div>
body结束前
</body>