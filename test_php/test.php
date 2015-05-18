<!DOCTYPE html>
<!--  如果没有此声明，IE低版本将不能解释固定在两边的盒子 -->

<html>
<head>
<title>用于简单功能的测试 的页面</title>
<!--  使页面的编码是utf-8，避免在浏览器输出的是乱码   -->
<meta http-equiv="Content-type" content="text/html;charset=utf-8">
<!--  包含css文件   -->
<link rel = "stylesheet" type = "text/css" href = "../data.css">
<?php 
//include ("config.php");
//include ("functions.php");
include ("../data.class.php");
//include ("arraydirect.php");
?>
</head>

<body>
<?php
//包含统一的头部导航文件
include ("../navigation.php");
include ("test2.php");
?>
 ^:^<br><br>

<?php
if(@ $_POST["sub"]){
	$testinfor = '现在是测试页面进行提交后--------重新赋值后。'.'<br>';
}
if(@ $_POST["sub2"]){
	echo '现在是没有对包含页面的数据进行处理的提交。'.'<br>';
}
echo $testinfor.'<br>';

//$congfigermy->echoAllOut();
//echo $arrayMesage."<br>";
//echo $resultArry."<br>";


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
<form action="" method="post" style="border=5px;" name="Selectform">
	<input type="submit" name="sub"  value="提交" />
	<input type="submit" name="sub2"  value="测试提交不处理包含页面的值" />
	<br>
	<br>
	<br>
	<input type="submit" name="nextTime"  value="进入下一次处理，创建下一个处理文件" />
	<input type="submit" name="sub1"  value="创建此名称的文件" />
	<input type="text" name="txtName"  value="" />输入要处理的txt文件名称(需要提前将文件存入指定文件夹下，其中可以包含有中文但不作处理)<br>
	<input type="text" name="txtFile"  style="width=500px"  style="height=100px" value="" />或者输入需要处理的英文文章(其中可以包含有中文但不作处理)<br>
	<input type="text" name="selectWords"  value="" />输入查询的数组<br>
	<input type="text" name="topN"  value="" />24法则及数据录入，历史重复？ 还未出现过的数组，出现数组的集中性分析<br>
	
</form>
<div id="tables">
<div id="topface">


</div>
</div>
body结束前
</body>