<!DOCTYPE html>
<!--  如果没有此声明，IE低版本将不能解释固定在两边的盒子 -->

<html>
<head>
<title>历史的数据（重复数据的检查等）</title>
<!--  使页面的编码是utf-8，避免在浏览器输出的是乱码   -->
<meta http-equiv="Content-type" content="text/html;charset=utf-8">
<!--  包含css文件   -->
<link rel = "stylesheet" type = "text/css" href = "data.css">
<?php 
//include ("config.php");
include ("arraydirect.php");
include ("functions.php");
?>
</head>


<body>
<?php
//输出时间，用于计算运行时间
$timestart=microtime();
echo "<br>页面开始运行的详细时间是：".$timestart."!<br><br>";
echo "<br>";
?>


<div id="topface">
<div id="topencourage">
热情与激情，鼓励着生命：<br>
<?php
$promise[0]="加油！";
$promise[1]="只有努力，才能实现，只有坚持，才能做到！";
$promise[2]="继续坚持，不断改进，相信会有意料之外的收获的！";
$promise[3]="没有奢望就没有失望！";
$promise[4]="只有向前，";
$promise[5]="只有努力，才能实现，只有坚持，才能做到！";
//$rand=rand(0,5);
//随机输出鼓励语句
$rand=rand(0,60)%6;
echo $promise[$rand];
?>
</div>

<div id="hint">
其他的提示信息栏：<br>
<br>
所有session信息：<br>
<br> 
<br>

<?php 
//按钮操作
//《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《<

/*
//点击进入下一次，重新开始处理
if(@ $_POST["nextTime"]){
	echo "你点击了 创建下一个处理文件!<br>";
	$_SESSION["data"]["orderFolder"]++;
	$path= $_SESSION["data"]["folderPath"].$_SESSION["data"]["orderFolder"]."time";
	createFolder($path);
	//新的处理文档次序从0 开始计数。
	$_SESSION["data"]["orderTxt"]=0;
}

//点击进行下一次数据处理
if(@ $_POST["nextDispose"]){
	echo "你点击了 创建下一个处理文档!<br>";
	$_SESSION["data"]["orderTxt"]++;
	$fileName= $_SESSION["data"]["folder"]."/".$_SESSION["data"]["orderTxt"]."data.txt";
	//createFolder($fileName);
	createTxtDocument($fileName);
}

*/



//按钮操作结束
//》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》
?>
</div>
</div>


<br><br><br>
<a name="theTop"></a>
<div id="navigationTop">
navigationTop身体部分的开始,网站所有页面的导航
<!-- 各个页面的导航地址按钮.<br> 
<font color="#aaggss" size="5px"> 
<button style="height: 40px; font-size:19px; color:blanck;" >失物招领</button>
 -->
 <a href="config.php" target="_blank"> 公共 数据<a>
<a href="data.php" target="_blank">
<button style="height: 40px; font-size:19px; color:blanck;" >数据处理 首页</button></a>
<a href="config.php" target="_blank">
<button style="height: 40px; font-size:19px; color:blanck;" >公用 数据</button></a>
<a href="arrayget.php" target="_blank">
<button style="height: 40px; font-size:19px; color:blanck;" >得到原始数组</button></a>
<a href="MyFace.php" target="_blank">
<!--
<a href="MyFace.php" target="_blank">
<font color="#aaggss" size="5px" font>失物招领</font></a>
-->
</div>
<br><br><br>
<div id="tables">
表单：<br>
<?php
//操作表单的区域
//《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《<
?>
<div id="tableleft">
左边表单：操作<br>
<form action="" method="post" style="border=5px;" name="Selectform">
<input type="submit" name="nextTime"  value="进入下一次处理，创建下一个处理文件" />
<input type="submit" name="nextDispose"  value="进行下一次数据处理，创建下一个处理结果的存储txt" />
<input type="submit" name="randData"  value="一组随机数，并验证历史" />
<input type="submit" name="sub"  value="创建此名称的文件" />
<input type="text" name="txtName"  value="" />输入要处理的txt文件名称(需要提前将文件存入指定文件夹下，其中可以包含有中文但不作处理)<br>
<input type="text" name="txtFile"  style="width=500px"  style="height=100px" value="" />或者输入需要处理的英文文章(其中可以包含有中文但不作处理)<br>
<input type="text" name="selectWords"  value="" />输入查询的数组<br>
<input type="text" name="ignorWords"  value="" />输入设定要忽略的数组<br>
<input type="text" name="topN"  value="" />输入设定要显示数组排名的前多少组<br>
<input type="text" name="topN"  value="" />24法则及数据录入，历史重复？ 还未出现过的数组，出现数组的集中性分析<br>
<input type="submit" name="sub"  value="提交" />
</form>
</div>
<?php
//操作表单的区域结束
//》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》>
?>


<div id="tableright">
右边表单：文件名称
<?php
//遍历现有的文件
//声明一个变量，记录文件个数
$fileNum = 0;
//$dirname = './';
$dirname = $_SESSION["data"]["folderPath"];
echo "函数遍历文件夹！<br>";
//调用遍历文件夹函数
ergodicFolder($dirname);
?>
</div>
</div>

body结束前
</body>
</html>