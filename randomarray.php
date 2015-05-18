<!DOCTYPE html>
<!--  如果没有此声明，IE低版本将不能解释固定在两边的盒子 -->

<html>
<head>
<title>生成随机数组</title>
<!--  使页面的编码是utf-8，避免在浏览器输出的是乱码   -->
<meta http-equiv="Content-type" content="text/html;charset=utf-8">
<!--  包含css文件   -->
<link rel = "stylesheet" type = "text/css" href = "data.css">
<?php 
//include ("config.php");
include ("arraydirect.php");
include ("functions.php");
include ("functionsarrayget.php");
?>
</head>


<body>
<?php
//包含统一的头部导航文件
//include ("navigation.php");
?>
 ^:^<br>
<a name="theTop"></a>
<?php
//输出时间，用于计算运行时间
$timestart=microtime();
//echo $_SESSION["randThis"]."<br>";
//echo $_SESSION[$randThis]."<br>";
?>


<div id="topface">
<div id="topencourage">
	方法选择区：<br>
	1.选择除3余数：<br>
	<?php
	// for($i=0; $i<3; $i++){
		// //$countsOne["0".$i]=0;
		// for($j=0; $j<3; $j++){
			// //$countsOne["0".$j]=0;
			// echo '除3余数：';
			// for($k=0; $k<3; $k++){
				// //$countsOne["0".$j]=0;
				// echo '  .  . .'.$i,$j,$k.' .  .  .';
			// }
				// echo '<br>';
		// }
	// }
	?>
	<br>
	2.选择奇偶比例：<br>
	<?php
	/*
	echo '比例:';
	for($i=0; $i<=6; $i++){
		if($i == 3)
		{
			echo '<br>比例:';
		}
		echo ' . . . '.$i.':'.(6-$i);
	}
	*/
	?>
	
	2.选择奇偶分配方式：<br>
	<?php
	echo '奇偶:';
	/*
	for($i=0; $i<6; $i++){
		//$countsOne["0".$i]=0;
			echo '奇';
		for($j=0; $j<3; $j++){
			echo '偶';
			//$countsOne["0".$j]=0;
			//$countsOne["0".$j]=0;
			echo '  .  . . '.$i,$j' .  .  .';
			echo '  .  . . '.$i,$j' .  .  .';
			echo '<br>';
		}
	}
	*/
	?>
</div>

<div id="hint">
</div>

<div id="methods">
	方法选择区：<br>
	1.选择除3余数：<br>
	<?php
	// echo '<form action="" method="post" style="border=5px;" name="select_odd_even_proportions">';
	// for($i=0; $i<3; $i++){
		// //$countsOne["0".$i]=0;
		// for($j=0; $j<3; $j++){
			// //$countsOne["0".$j]=0;
			// //echo '除3余数：';
			// for($k=0; $k<3; $k++){
				// //$countsOne["0".$j]=0;
				// echo '<input '."style='font-size:17px; color:blanck; background:green'".'type="submit" name="odd_even_proportions"  value='."  ".$i."--".$j."--".$k.' />';
			
				// //echo '  .  . .'.$i.''.$j.$k.' .  .  .';
				// echo "\t";
			// }
		// }
		// echo '<br>';
	// }
	// echo '</form>';
	?>
	<br>
	2.选择奇偶比例：<br>
	<?php
	//<form action="" method="post" style="border=5px;" name="Selectform">
	//<input type="submit" name="nextTime"  value="创建下一个保存处理结果的文件夹" />
	
	//<br>
	?>
	<br>
	2.选择奇偶分配方式：<br>
	<?php
	// echo '奇偶情况共有64种。<br>';
	// out_odd_even();
	// echo '<br><br><br>';

	/*
	$fileName = "data.xls";
	//核心数据的所在文档
	$resulte = readAsLineArry($fileName);
	foreach($resulte as $value){
		echo $value."\t";
	}
	*/
	?>
</div>	

<div id="askTable">
要求的操作结果显示：<br>
<?php
	/*
	//只能统计一维数组
	$count_result = array_count_values($nowArray);
	
	foreach($count_result as $key=>$value){
		//echo "x下标：".$key."，值：".$value."次！<br>";
		//echo "数组详细信息为：".$arrayMesage[$key]."<br><br>".'</font>';
		//echo $value."<br>";
		
		foreach($count_result as $key=>$value){
			echo "x下标：".$key."，值：".$value."次！<br>";
			//echo "数组详细信息为：".$arrayMesage[$key]."<br><br>".'</font>';
			//echo $value."<br>";
		}
	}
	*/
	
//按钮操作
//《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《<

//点击进入下一次，重新开始处理
/*
if(@ $_POST["nextTime"]){
	echo "你点击了 创建下一个处理文件!<br>";
	$_SESSION["data"]["orderFolder"]++;
	$path= $_SESSION["data"]["folderPath"].$_SESSION["data"]["orderFolder"]."time";
	createFolder($path);
	//新的处理文档次序从0 开始计数。
	$_SESSION["data"]["orderTxt"]=0;
}
*/


//点击进行下一次数据处理----未能实现，，利用session
if(@ $_POST["randThisSave"]){
	echo "你点击了 保存此组随机数组!<br>";
	
	//$_SESSION["data"]["orderTxt"]++;
	//$fileName= "./datafolder/randarraysave.txt";
	$fileName= "./datafolder/randomsavefavor/randSaveThis".date("Y-m-d_H",time()).".txt";
	if(!file_exists($fileName)) 
	{
		createTxtDocument($fileName);
	}
	//createFolder($fileName);
	//createTxtDocument($fileName);
	for($m = 0; $m < 6; $m ++){//保存所有产生的随机数
		if($_SESSION["todayWriteThisRand"] == 1){
			//创建本次处理结果的保存的文件
			$dir = fopen($fileName,"a");
			//关闭文件
			fclose($dir);
			
			write($fileName,"以下数据的产生日期是：".date("Y-m-d_H:i:s",time())."\t \n".$randArray[$j]);
			$_SESSION["todayWriteThisRand"] ++;
		}else{
			write($fileName,$_SESSION["randThis"][$m]."\t");
		}
		//write($fileName,$_SESSION["randThis"][$m]."\t");
	}
}


//点击随机数据，并验证历史未出现过
if(@ $_POST["randData"]){
	echo "你点击了产生一组随机数据，并验证历史未出现过!<br>";
	
	//思想，逻辑
	//先循环产生不重复的6 个数
	//完了之后再进行从小到大排序
	//完后再进行按照各个数的位置实现输出
	
	//产生6个随机数
	for($j=0; $j<6; $j++){
		//产生1-33之间的随机数
		//$randArray[$j]=mt_rand(33,43);//%33+1;
		//srand(microtime);
		$randArray[$j]=rand()%33+1;
		
		//如果不是第一个，就进行判断重复
		//且进行大小排序
		if($j > 0){
		
			//验证避免重复（一组数据中的数据间有数据重复）
			//---6个数各不相同。
			for($i=0; $i<$j; $i++){
				//如果一组数据中的数据间有数据重复了
				//就重新生成随机数，直到不重复为止
				if($randArray[$j] == $randArray[$i]){
					//$randArray[$j]=mt_rand(33,43);//%33+1;
					$randArray[$j]=rand()%33+1;
					$i = -1;
				}
				//从键值为0开始，从新全部检查是否重复
				
			}
		}
	
	}
	
	
	//冒泡排序,
	//并按照各个数的位置来进行输出显示
	//保存所有产生的随机数的文件的路径
	$fileName = "./datafolder/randomsaveall/randSaveAll".date("Y-m-d_H",time()).".txt";
	echo "数据保存在文档".$fileName."中!<br><br>";
	for($j = 0; $j < 6; $j ++){
		$change = false;
		//找到最小的数放到现在的$j 这个键值下
		for($m=$j + 1; $m<6; $m++){
			if($randArray[$m] < $randArray[$j]){
				//把小的数放到前面
				$change = $randArray[$m];
				$randArray[$m] = $randArray[$j];
				$randArray[$j] = $change;
				$change = true;
			}
		}
		//$j ++
		if($change = false){
			break 1;
		}
		
		//记录已经排好序的数据
		//用session记录此组数据，便于保存验证
		$_SESSION["randThis"][$j] = $randArray[$j];
	
	
		//按照1-33的位置来输出，便于分析
		if($j == 0){
			for($i=0; $i<$randArray[$j] - 1; $i++){
				echo "&nbsp  &nbsp";
				//echo $value
			}
			echo $randArray[$j]."&nbsp ";
		}else{
			//$blank = $chek[$key] - $chek[$key - 1];
			$blank = $randArray[$j] - $randArray[$j - 1] - 1;
			//for($i=0; $i<$value; $i++){
			for($i = 0; $i < $blank; $i ++){
				echo "&nbsp  &nbsp";
				//echo $value
			}
			echo $randArray[$j]."&nbsp ";
		}
		
		//保存所有产生的随机数
		if($_SESSION["todayWriteAllRand"] == 1){
		
			//创建本次处理结果的保存的文件
			$dir = fopen($fileName,"a");
			
			//关闭文件
			fclose($dir);
			
			//调用写函数写入处理结果
			write($fileName,"以下数据的产生日期是：".date("Y-m-d_H:i:s",time())."\t".$randArray[$j]."\t");
			$_SESSION["todayWriteAllRand"] ++;
		}else{
			write($fileName,$randArray[$j]."\t");
		}
	}
	echo "<br>";
	
	//参数：历史全部数据生成的数组，产生的随机数组，历史数据的详细信息形成的数组
	$chek = have_or_no_this_array($nowArray,$randArray,$arrayMesage);
	//write($fileName,"\t \r \n".$chek.date("Y-m-d_H:i:s",time())."\t \n");
	echo $chek;
	echo "<br><br>";
}

//if(@ $_POST["ToStatistics"]){
//if(@ $_POST['ToStatisticsArray'] ||@ $_POST['countThisArray']){
if(@ $_POST['countThisArray']){

	//提交的需要统计的输入的数据
	$ArrayGetFrom = $_POST['countThisArray'];
	
	//提交的需要统计的输入的数据
	//$ArrayFrom = $_SESSION["choosedFiles"];

	//把整个文件以行为单位读入一个数组，且不需要fopen()提前打开文件
	//得到的数组的每个元素对应文件的每一行，各元素有换行符分隔开
	//把每个元素（即是每行的数据）在再进行正则匹配成单个的数字元素。
	//调用读取文件内容并存为数组的函数


	//for($m = 0; $m < count()6; $m ++){//保存所有产生的随机数
		
		//正则匹配成单个数据数组
	//	$ElementsArry = regularDocumentAsAloneArray($Array);
	//}
	
	//正则匹配成单个数据：一维数组
	$ElementsArry = regularDocumentAsAloneArray($ArrayGetFrom);
	
	//输入的数据个数不是6 的整数倍
	if(count($ElementsArry)%6 != 0){
	
		//改成script弹窗最好
		echo '<font color="#aaggss" size="10px">';
		echo "错误提示：你输入的数据个数不是6 的整数倍，检查是否输入错误！";
		echo "</font>";
	}
	
	//变成每6个数据组成的二维数组
	for($i = 0; $i < count($ElementsArry)/6; $i ++)
	{
		for($m = $i * 6; $m < $i * 6 + 6; $m ++){
			//$arrayToCount[$i][$m] = $ElementsArry[$i * 6 + $m];
			$arrayToCount[$i][$m % 6] = $ElementsArry[$m];
		}
	}
	
	//统计有$sameN个相同数据的数组
	$sameN = 4;

	//每组数据有6个数据
	$N=6;
	
	//计算数据的不同个数
	$diffrentN = $N-$sameN;
	
	//把选择的所有文件依次读取，建立数据数组
	echo '进入统计的文档数：'.count($_SESSION["choosedFiles"]).'<br><br>';
	$i = 0;
	foreach($_SESSION["choosedFiles"] as $value){
		
		echo '第'.($i + 1).'文件大小：'.filesize($value).'<br>';
		//echo '文件：'.$value."<br>";
		//$lineArray = readAsLineArry($value);
		
		//把整个$value文件读入一个数组，且不需要fopen()提前打开文件
		//得到的数组的每个元素对应文件的每一行，各元素有换行符分隔开
		$lineArray[$i] = readAsLineArry($value);
		echo "行数组的 元素个数：".count($lineArray[$i])."个。<br>";
		//$lineArray[$i] = readAsLineArry($value);
		echo '文件路径：'.$value.'。<br>';
		//echo '数组元素个数：'.count($value).'个。<br>';
		foreach($lineArray[$i] as $value1){
			echo $value1.'<br>';
			
			//正则匹配成单个数据元素的一维数组
			//一维数组
			$lineElementsArry[$i] = regularDocumentAsAloneArray($value1);
		}
		//for($m = 0; $m < count($lineArray); $m ++){//保存所有产生的随机数
		//	echo "$lineArray[$m]<br>";
		//}
		//echo "车市   车饰";
		
		//变成每6个数据组成的二维数组
		for($j = 0; $j < count($lineElementsArry[$i])/6; $j ++)
		{
			for($m = $j * 6; $m < $j * 6 + 6; $m ++){
				//$arrayToCount[$j][$m] = $ElementsArry[$j * 6 + $m];
				$arrayToCountFrom[$j][$m % 6] = $lineElementsArry[$i][$m];
				echo $arrayToCountFrom[$j][$m % 6]."\t";
			}
			echo '<br>';
		}
		
		//验证在给定中是否出现过(如果出现过，
		//就从给定的详细信息数组里取出来)；给定数组中有或内有
		//参数：(二维数组)历史全部数据生成的数组，
		//(一维数组)产生的随机数组，(一维数组)历史数据的详细信息形成的数组
		for($k = 0; $k < count($arrayToCount); $k ++)
		{
			$sameCount = have_or_no_this_array($arrayToCountFrom,$arrayToCount,$arrayToCount);
		}
		
		//输出各组相同数组的相同次数
		if(count($sameCount) != 1){
			foreach($sameCount as $key=>$value){
				echo '<font color="red" size="8px">'."下标为：".$key."的数组相同的次数为：----".$value."次！<br>";
				echo "数组详细信息为：".$arrayMesage[$key]."<br><br>".'</font>';
				//echo $value."<br>";
			}
		}else{
			echo '<font color="#aaffzz" size="5px">'."抱歉: 先生，现目前还没有重复".$sameN."个以上数据的数组！<br><br>".'</font>';
		}
		$i ++;
	}
}


if(@ $_POST['ToStatisticsArrayIn']){
	/*
		提交了文本文档
			就用session记录文档名称
			然后读取行元素数组
			然后把行元素读成单个数据的数组，并存入session
			等待后期来利用这些数据
			（js 在关闭此页面时废除session些，
			或者设置生命周期，避免使得电脑卡）
			
	*/
	
	if(count($_POST['ToStatisticsArrayIn']) >= 1){
		//用session记录选择的记录文档，便于后期检查数据
		$_SESSION["choosedFiles"] = $_POST['ToStatisticsArrayIn'];
		
		//输出提示
		echo '<font color="#aaggss" size="10px">';
		echo "你提交了".count($_POST['ToStatisticsArrayIn'])."个文件！";
		echo '</font>';
		echo '<br>';
	
	}else{
		echo '<font color="#aaggss" size="10px">';
		echo "提示：你没有提交了文件！";
		echo '</font>';
		echo '<br>';
	}
	
}

if(@ $_POST['subAll']){
	//selectAll();
}

if(@ $_POST['giveUpAllSub']){

}



//按钮操作结束
//》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》
?>
</div>

<script>
//实现全选
function selectAll(){
	//document.getElementById("timeDiv").innerHTML = out;
	document.getElementByName("ToStatisticsArrayIn");
	for(var i = 0; i < ToStatisticsArrayIn.length; i ++ ){
		ToStatisticsArrayIn[i].checked = true;
	}
}

//实现全选
function giveUpSelectAll(){
	//document.getElementById("timeDiv").innerHTML = out;
	document.getElementByName("ToStatisticsArrayIn");
	for(var i = 0; i < ToStatisticsArrayIn.length; i ++ ){
		ToStatisticsArrayIn[i].checked = fase;
	}
}
</script>


<div>
<form action="" method="post" name="Selectform">
<input type="submit" name="nextTime" style="height: 25px; color: blanck;" value = "创建下一个保存处理结果的 文件夹" />
<input type="submit" name="nextDispose"  value="创建下一个保存处理结果的 txt文档" />
<input type="submit" name="randData"  value="一组随机数，并验证历史" />
<input type="submit" name="randThisSave"  value="保存本组随机数" /><br>
<input type="text" name="countThisArray" style="height: 50px; width: 215px; color: blanck;"/>
<input type="submit" name="ToStatisticsArray"  value="输入查询的数组" /><br>
</form>
</div>
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
<input type="submit" name="randThisSave"  value="保存本组随机数" />
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
<br>
<?php
//遍历现有的文件
//声明一个变量，记录文件个数
$fileNum = 0;
//$dirname = './';
//$dirname = $_SESSION["data"]["folderPath"];
//$dirname = "E:/wamp/www/lottery/datafolder/randomsaveall";
$dirname = "./datafolder/randomsaveall";
echo "函数遍历 保存所有产生的随机数的文件夹！<br>";

//调用遍历文件夹函数
ergodicFolder($dirname);

//遍历现有的文件
//声明一个变量，记录文件个数
$fileNum = 0;
//$dirname = "E:/wamp/www/lottery/datafolder/randomsavefavor";
$dirname = "./datafolder/randomsavefavor";
echo "函数遍历 存储选取意向的随机数组的文件夹！<br>";

//调用遍历文件夹函数
ergodicFolder($dirname);
?>
</div>
</div>

<?php
$timeEnded=microtime();
echo "<br><br><br>页面开始运行 的详细时间是：".$timestart."!<br>";
echo "<br>页面运行完成 的详细时间是：".$timeEnded."!<br><br>";
echo "页面运行运行所用时间：".($timeEnded - $timestart)."!<br><br>";

?>
body结束前
</body>
</html>