<!DOCTYPE html>
<!--  如果没有此声明，IE低版本将不能解释固定在两边的盒子 -->

<html>
<head>
<title>公用数据的核心数组数据</title>
<!--  使页面的编码是utf-8，避免在浏览器输出的是乱码   -->
<meta http-equiv="Content-type" content="text/html;charset=utf-8">
<!--  包含css文件   -->
<link rel = "stylesheet" type = "text/css" href = "data.css">
<?php 
//include ("config.php");
//include ("functions.php");
include ("data.class.php");
//include ("arraydirect.php");
?>
</head>

<body>
<?php
//包含统一的头部导航文件
include ("navigation.php");
?>
 ^:^<br><br>

<div id="tables">
<div id="topface">
<?php
$congfigermy = new Congfiger();
$congfigermy->fileName = "跨页面设置值 测试";
//$congfigermy->echoAllOut();
//echo $arrayMesage."<br>";
//echo $resultArry."<br>";

/*
//由于单个数据的数组$resultArry随处都可能用到，所以拿到开始来生成。
//指定处理文件的名称
$fileName = "公共界面初始化值";
$fileMesageName = "公共界面初始化值";


//把整个文件以行为单位读入一个数组，且不需要fopen()提前打开文件
//得到的数组的每个元素对应文件的每一行，各元素有换行符分隔开
//把每个元素（即是每行的数据）在再进行正则匹配成单个的数字元素。
//调用读取文件内容并存为数组的函数
$resulte = "公共界面初始化值";
$arrayMesage = "公共界面初始化值";

/*
把每行的数据（即是每个元素）再进行正则匹配成单个的数字元素。
resulte是行数组，则value是每行的内容，key是行数-1。
所以resultArry是每行的--各个-数据组成的数组
* /
$resultArry = "公共界面初始化值";

//保存每次的单个数组元素，遍历完就得到了全部元素数据
//$nowArray[$i][$j] = "公共界面初始化值";

*/

/*
echo $fileName."<br>";
echo $fileMesageName."<br>";
echo $resulte."<br>";
echo $arrayMesage."<br>";
echo $resultArry."<br>";
*/

/*  
foreach($nowArray as $key=>$value){
	echo $key." 直接把数据建立成数组 ".$value."<br>";
}
*/

echo '数据总条数：'.count($nowArray)."<br><br>";

//遍历输出历史数据详情
foreach($nowArray as $key=>$array){
	echo $key." 历史数据的核心数组数据：   ";
	foreach($array as $value_key=>$value){
		echo $value." .    ";
	}
	//echo $key." 历史数据的核心数组数据： ".$value."<br>";
	echo "<br>";
}
?>
</div>
</div>
body结束前
</body>