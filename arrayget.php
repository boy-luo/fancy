<!DOCTYPE html>
<!--  如果没有此声明，IE低版本将不能解释固定在两边的盒子 -->

<html>
<head>
<title>制造我想要的 数组，进行写入文件或进行处理</title>
<!--  使页面的编码是utf-8，避免在浏览器输出的是乱码   -->
<meta http-equiv="Content-type" content="text/html;charset=utf-8">
<!--  包含css文件   -->
<link rel = "stylesheet" type = "text/css" href = "data.css">
<?php 
//include ("config.php");
//include ("functionsarrayget.php");
//include ("arraydirect.php");
//include ("functions.php");
?>
</head>


<body>
<?php
//包含统一的头部导航文件
include ("navigation.php");
?>
^:^<br><br>
以下是页面正文：<br>
<div id="navigationTop">
	<!-- 各个页面的导航地址按钮.<br> 
	<font color="#aaggss" size="5px"> 
	<button style="height: 40px; font-size:19px; color:blanck;" >失物招领</button>
	 -->
暂无内容。
	<!--
	-->
</div>
<br><br><br>
<?php
//由于单个数据的数组$resultArry随处都可能用到，所以拿到开始来生成。
//指定处理文件的名称

//核心数据的所在文档
$fileName = "./datafolder/datacomefrom/arrymyall.txt";

//详细信息的所在文档
//$fileName = "./datafolder/datamyall.txt";
//$fileMesageName = "./datafolder/datacomefrom/historydata.txt";
$fileMesageName = "./datafolder/databuided/datainformation.txt";

//尝试进行Word文档的处理
//$fileMesageName = "./datafolder/datainformation.doc";

//准备利用session进行文件的连续多次处理
//$fileName = $_SESSION["data"]["txt"];


//把整个文件以行为单位读入一个数组，且不需要fopen()提前打开文件
//得到的数组的每个元素对应文件的每一行，各元素有换行符分隔开
//把每个元素（即是每行的数据）在再进行正则匹配成单个的数字元素。
//调用读取文件内容并存为数组的函数

//核心数据的所在文档
$resulte = readAsLineArry($fileName);
//准备利用session进行文件的连续多次处理
//$resulte = readAsArry($_SESSION["data"]["txt"]);

//详细信息的所在文档
$arrayMesage = readAsLineArry($fileMesageName);

/*
//用于测试核对的输出
echo "<br>".$arrayMesage."<br>";
echo $resulte[0]."<br>";
echo $resulte[0]."<br>";
echo $resulte[0][1]."<br>";
echo $resulte[0][4]."<br>";
echo $resulte[0][5]."<br>";
echo $nowArray[0][1]."<br>";
echo $nowArray[1300][4]."<br>";

echo $resultArry[300]."<br>";
echo $resulte[1200]."<br>";
echo $resultArry[1700]."<br>";
echo $arrayMesage[0]."<br>";
echo $arrayMesage[300]."<br>";
echo $arrayMesage[1200]."<br>";
echo $arrayMesage[1700]."<br>";
echo $arrayMesage[1][1]."<br>";
*/

//初始化N个变量，用来存储比较的N个数字
/* for($j=0; $j<$N; $j++){
	$nowCompare[$j] = 0;
} */

//每次比较元素的个数
$N=6;
$i=0;

/*
//建立直接的数组的元素
$WriteToFileName = "./datafolder/databuided/datadirect.txt";
//ReadAsTwoDimentionArray($fileName,$Count,$WriteToFileName);
//ReadAsTwoDimentionArray($fileName,$N,$WriteToFileName);
*/

echo "读取数据来源的文档：".$fileName."<br>";
//echo "正在处理的文档：".$_SESSION["data"]["txt"]."<br>";
//之前的数组是以行为元素的，所以这里是遍历每一行，分别进行处理
//实现的到所有单个的数据，组成一个数组
//resulte是行数组，则value是每行的内容，key是所在行数-1。
foreach($resulte as $key=>$value){
	
	/*
	//首行是各列的列名称，所以不读取
	if($key == 0){
		//------新数据表的第一行也是数据
		//echo "<br>因为第一行为各列的标题，所以此处略过未进行处理。<br>";
		//continue;
	}else if($key == 1200){
		//echo "处理了".$key."行（组）数据!<br>";
		//break 1;
		//return;
	}
	if($key == 1210){
		//echo "处理了".$key."组数据!，指定行数数据组数实现失败<br>";
	}
	*/
	
	
	
	// 把每行的数据（即是每个元素）再进行正则匹配成单个的数字元素。
	// resulte是行数组，则value是每行的内容，key是行数-1。
	// 所以resultArry是每行的--各个-数据组成的数组
	$resultArry = regularDocumentAsAloneArray($value);
	/*
	//为了获得核心数据做成直接数组存入文件而做的循环
	for($j=0; $j<6; $j++){
		if($j != 0 && $j != 5){
			write("./datafolder/datadirect.txt",$resultArry[$j].",\t");
			
		}else if($j == 0){
			write("./datafolder/datadirect.txt","array(".$resultArry[$j].",\t");
			
		}else if($j == 5){
			write("./datafolder/datadirect.txt",$resultArry[$j]."),");
			
		}
	}
	*/
	
	
	//write("fileMesageName","\t");
	//echo "第".$key."行数据：";
	//遍历得到每行数据的前N个数据
	/*
	//为了做成数组详细信息（共11个元素）而做的循环
	for($j=0; $j<11; $j++){
		//保存每次的单个数组元素，遍历完就得到了全部元素数据
		//$nowArray[$i][$j] = $resultArry[$j];
		if($j != 0 && $j != 10){
			$nowArray[$i] .= "__".$resultArry[$j];
		}else if($j == 0){
			$nowArray[$i] .= "\"".$resultArry[$j];
		}else if($j == 10){
			$nowArray[$i] .= $resultArry[$j]."\"";
		}
		//write("./datafolder/datadirect.txt",$resultArry[$j].",\t");
		//echo $resultArry[$j]."   ";
		
		//写入文件数据---写入之后注释以备下次更新数据时需要重新写入内容时再次使用
		if($j == $N-1){
			//write($_SESSION["data"]["txt"],"\n");
			write($_SESSION["data"]["txt"],"\n".$resultArry[$j]);
		
		}else{
			//写到文件中去
			write($_SESSION["data"]["txt"],$resultArry[$j]."\t");
			//write($fileName,$content);
		}
		
		//写到文件中去
		//write($_SESSION["data"]["txt"],$resultArry[$j]."\t");

	}*/
	
	//从右边删除空格
	//$value = rtrim($nowArray[$i]);
	//write($fileMesageName,$nowArray[$i].",\t");
	//echo "<br>";
	//处理完以行数据后写入一个换行符
	//write("./datafolder/datadirect.doc","\t");
	//write("./datafolder/datadirect.txt","\t");
	$i++;
}

//echo "总数据条数共有(即是数组数)：".count($nowArray)."<br>";
//echo $nowArray[4][2].$resultArry[3].$resulte[23];

//echo $nowArray[0][1]."<br>";
//echo $nowArray[1300][4]."<br>";
echo $fileName."<br>";
echo $fileMesageName."<br>";
echo $resulte."<br>";
echo $arrayMesage."<br>";

//echo $resultArry."<br>";

?>

</body>