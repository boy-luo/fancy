<!DOCTYPE html>
<!--  如果没有此声明，IE低版本将不能解释固定在两边的盒子 -->
<html>
<head>
<title>数据的各种处理操作</title>

<!--  使页面的编码是utf-8，避免在浏览器输出的是乱码   -->
<meta http-equiv="Content-type" content="text/html;charset=utf-8">

<!--  包含css文件   -->
<link rel = "stylesheet" type = "text/css" href = "data.css">
<?php 
	//include ("config.php");
	include ("conn.php");
	include ("arraydirect.php");
	include ("functions.php");
?>
</head>
<body>
如果有错误，很可能是文件的包含不正确，包含重复或没有包含相应文件<br>
因为包含的问价有点杂，且多次调整过，有错时正确包含需要的文件即可<br>
还可能是没有包含连接数据库的文件。

<div id="bodyface">
<a name="top"></a>
<?php
//count_n_method();
	//输出时间，用于计算运行时间
	$timestart=microtime();
	//echo $test;
?>
<div id="out">
<?php

//包含统一的头部导航文件
//include ("navigation.php");

echo '利用奇偶奇和除3余方法的ID，获得各自的方法数组。<br>';
$odd_even = array(0,1,1,0,1,0);
$divide_three = array(0,1,1,2,1,0);

//方法ID
$odd_even_id = 12;
$divide_three_id = 502;
?>
<div >
	填入方法ID，得出符合方法的数组结果：<br>
	<form action="" method="post" style="border=5px;" name="Selectform">
		<input type="text" name="odd_even_id"  value="11" />奇偶奇方法ID<br>
		<input type="text" name="divide_three_id"  value="11" />除3余方法ID<br>
		<input type="submit" name="sub_method"  value="提交" />
	</form>
</div>
<?php
// echo '-------查询获取历史全部方法的数组。'.'<br>';
// echo '输出方法出现时前后10次的方法情况-------此组数据属于的方法编号，针对的方法（奇偶或除3余）的历史所有出现的记录数组<br>';
	
// //查询获取历史全部方法的数组。
// $data_core = 'data_core';
// $method_row_name = 'odd_even_id';
// $odd_even_method_array = get_method_array($method_row_name, $data_core);

//方法id
if(@ $_POST["sub_method"]){
	$odd_even_id = $_POST["odd_even_id"];
	// echo "你选择的方法ID：奇偶--$odd_even_id<br>";
}

//输出方法出现时前后10次的方法情况-----方法编号，方法历史出现的数组
// print_twenty($odd_even_id, $odd_even_method_array);

// // echo '<br><br><br>除3余：';
// $method_row_name = 'divide_three_id';
// $divide_three_method_array = get_method_array($method_row_name, $data_core);

//方法id
if(@ $_POST["sub_method"]){
	$divide_three_id = $_POST["divide_three_id"];
	// echo "你选择的方法ID：除3余--$divide_three_id<br>";
}

$both_method_array = get_both_odd_divide($odd_even_id, $divide_three_id);

//echo "奇偶方法：";
echo "奇偶奇方法：ID=$odd_even_id----";
foreach($both_method_array[0] as $key=>$value)
{
	//echo "第 ".$key." 个符合的值： ".$value.'<br>';
	echo $value."\t";
}
echo "<br>";
//echo "除3余方法：";
echo "除3余方法：ID=$divide_three_id----";
//echo count($both_method_array[1])."<br>";
foreach($both_method_array[1] as $key=>$value)
{
	//echo "第 ".$key." 个符合的值： ".$value.'<br>';
	echo $value."\t";
}
echo "<br><br>";

//方法数组
$odd_even = $both_method_array[0];
$divide_three = $both_method_array[1];

echo '利用奇偶方法和除3余方法，找出满足方法要求的1至6位上的数据。<br>';
//利用奇偶方法和除3余方法，找出满足方法要求的1至6位上的数据
$next_arrays = both_odd_divide($odd_even, $divide_three);
	echo "<div id='location_nums'>";
foreach($next_arrays as $key1=>$value1)
{
	echo "<div id='location_num'>";
	echo "位置： ".$key1.": <br>";
	foreach($value1 as $key=>$value)
	{
		echo "第 ".$key." 个符合的值： ".$value.'<br>';
	}
	echo "</div>";
}
	echo "</div>";
echo "<br>";
// echo "<p>567</p>";


echo '历史上此方法的数组数据：<br>';
// $odd_even_id = 21;
// $divide_three_id = 422;
$this_history = check_in_history($odd_even_id, $divide_three_id);
echo "<br>";



/* 
echo '-------统计各个奇偶方法历史出现过的次数。'.'<br><br>';
$method_odd_even_count = count_odd_even_method();
echo '这里有方法数量：'.count($method_odd_even_count).'种。<br>';
foreach($method_odd_even_count as $key=>$value)
{
	echo "奇偶方法下标为：  ".$value['method_id']."  历史出现的次数为：----".$value['times']."次！<br>";
	
		/*
			//存入记录的数据表
		$sql = "INSERT INTO counts_odd_even (id, method_id, count) VALUES ('',  ".$value['method_id'].', '.$value['times'].")";
		// $sql = "UPDATE counts_odd_even set id = ($key+1) where number = $j";
		// $sql = "UPDATE counts_odd_even set id = ($key+1) where id = ($key+2)";
		 $result = mysql_query($sql); 
		 * /
}
 */

/* 
echo '-------统计各个除3余方法历史出现过的次数。'.'<br><br>';
$method_divide_three_count = count_divide_three_method();
echo '这里有方法数量：'.count($method_divide_three_count).'种。<br>';
foreach($method_divide_three_count as $key=>$value)
{
	
	if( !empty($value))
	{
	
		echo "除3余方法下标为：  ".$value['method_id']."  历史出现的次数为：----".$value['times']."次！<br>";
	}else{
		
		//echo "除3余方法下标为：  ".$value['method_id']."  历史出现的次数为：----".$value['times']."次！<br>";
	}
		/*
			//存入记录的数据表
		$sql = "INSERT INTO counts_divide_three (id, method_id, count) VALUES ('',  ".$value['method_id'].', '.$value['times'].")";
		// $sql = "UPDATE counts_odd_even set id = ($key+1) where number = $j";
		// $sql = "UPDATE counts_odd_even set id = ($key+1) where id = ($key+2)";
		 $result = mysql_query($sql); 
		 * /
}
 */
/* 

$sql = "select * from counts_odd_even  ";    
$result = mysql_query($sql); 
while( $row = mysql_fetch_row($result))
{
	//echo "奇偶方法下标为：  ".$row['method_id']."  历史出现的次数为：----".$row['times']."次！<br>";
	
	foreach($row as $key=>$value)
	{
		echo '这里有方法数量：'.count($row).'种。<br>';
	echo "奇偶方法下标为：  ".$value."  历史出现的次数为：----".$value."次！<br>";
	//echo "奇偶方法下标为：  ".$value[0]."  历史出现的次数为：----".$value[1]."次！<br>";
	//echo "奇偶方法下标为：  ".$value['method_id']."  历史出现的次数为：----".$value['times']."次！<br>";
	
	}	
	
} */
?>
<?php
/*

//统计单个数据的历史出现总次数
$CountOne=count_one_history($nowArray,33);
$numberCount=count($CountOne);
echo "每个数据历史出现次数：".$numberCount."个。<br>";

for($j=1; $j<34; $j++){
	//echo $CountOne[$j];
	echo "数据：".($j)." 历史出现的次数为：".$CountOne[$j]."次。<br>";
	
	// $sql = "INSERT INTO counts_1_number (id,number,count) VALUES ('', '$j', '$CountOne[$j]')";
	// $sql = "INSERT INTO counts_1_number (id,number,count) VALUES ('1', 2, 3)";
	// $sql = "UPDATE counts_1_number set (id,number,count) VALUES ('2', 2, 3) where id = 1";
	// $sql = "UPDATE counts_1_number set id='2' where id = 1";
	// //"INSERT INTO mytable (title, name, date) VALUES ('My title', 'My name', 'My date') ";
	// //$sql = "select * from goods_book order by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
	// //$sql = "UPDATE counts_1_number set id=1";
	// $sql = "INSERT INTO counts_1_number (id, number, count) VALUES ('', ".$j.', '.$CountOne[$j].")";
	// $sql = "UPDATE counts_1_number set id=$j where id = ($j+1)";
	
	$sql = "UPDATE counts_1_number set count = $CountOne[$j] where number = $j";
	$result = mysql_query($sql);
}
*/



//$i = 8;
//$j = 9;
//echo "<script>alert('出错啦--'+ $i + '--' + $j)</script>";
//echo "<script>alert('出错啦--')</script>";
?>
<br>
<div id="datas">
	<!--
	<div >
		左边表单：操作<br>
		<form action="" method="post" style="border=5px;" name="Selectform">
			<input type="submit" name="nextTime"  value="创建下一个保存处理结果的文件夹" />
			<input type="submit" name="nextDispose"  value="创建下一个处理结果的存储txt" />
			<input type="submit" name="ToStatistics"  value="统计历史   有5个相同和数据的数组" />
			<input type="submit" name="randData"  value="一组随机数，并验证历史" />
			<input type="submit" name="sub"  value="创建此名称的文件" /><br>
			<input type="text" name="selectWords"  value="" />输入查询的数组<br>
			<input type="submit" name="sub"  value="提交" />
		</form>
	</div>
	-->
	<div id="data_result">
		<font color="#aaggss" size="5px"> 预测得到的各个位置(1-6位置)的数据组成的结果数组：</font> <br>
		<br>
<?php	
echo "组合各个位置上的全部数据行成不完全正确的数组。<br>";
$result_array_gess = get_result_array($next_arrays);
echo "完全正确的组合成的预测的数组共有".count($result_array_gess)."组<br><br>";
/* 
echo "不完全正确的组合成的 预测的数组共有".count($result_array_gess)."组<br>";
echo "筛选得出符合方法的数组<br>";
$method_odd_even = $odd_even;
$method_divide_three = $divide_three;
$result_array_right = check_result_array_odd_even($result_array_gess, $method_odd_even, $method_divide_three);
echo "筛选后得到的符合方法的数组共有".count($result_array_right)."组<br>";
 */
foreach($result_array_gess as $key=>$value)
{
	if($value == $this_history)
	{
		//echo '<font style="font-size:19px; color:red;">按照方法得出的数组第'.$key.'组：</font>';
		echo '<font style="color:red;">按照方法得出的数组第'.$key.'组：';
		foreach($value as $key1=>$value1)
		{
			echo $value1.' . ';
		}
		echo '</font>';
		echo '<br>';
		
	}else{
		echo '按照方法得出的数组第'.$key.'组：';
		foreach($value as $key1=>$value1)
		{
			echo $value1.' . ';
		}
		echo '<br>';
	}
}
echo "<br><br><br>";	


echo '（手动打开）存入预测出来符合方法的数组<br>';
//存入预测出来符合方法的数组
//data_gess_save($result_array_gess);
echo "<br><br><br>";
?>
	</div>
	<div id="dataask">
		(进行预处理，吧首字母相同的放到一个数组中，形成3维数组或更多维的数组
		<br>
		减少每次的比较量，如500,800组一次等还是的量很大，在config页面做了数据数组预处理
		)
		<br><br>

		<?php
		//已经运行得出结果证明，里面没有重复数据出现过
		//声明一个数组，存储各个相同数组的相同次数---避免没有相同的，所以给了一个值
		/*
		for($j=1; $j<40; $j++){
			$sameCount[$j]=0;
		}
		*/

		//定义一个，避免在没有重复数据的时候后边的输出报错
		$sameCount[1]=0;
		echo "<br>循环次数----即是数据总条数为：".count($nowArray)."----<br>";

		//点击对数据进行统计，找出有一定个数相同的数组
		if(@ $_POST["ToStatistics"]){

			//统计有$sameN个相同数据的数组
			$sameN = 5;

			//每组数据有6个数据
			$N=6;
			
			//计算数据的不同个数
			$diffrentN = $N-$sameN;

			//调用统计函数实现统计
			same_n_statistics($nowArray,$arrayMesage,$N,$sameN);

			//输出各组相同数组的相同次数
			if(count($sameCount) != 1)
			{
				foreach($sameCount as $key=>$value)
				{
					echo "下标为：".$key."的数组相同的次数为：----".$value."次！<br>";
					echo "数组详细信息为：".$arrayMesage[$key]."<br><br><br>";
					//echo $value."<br>";
				}
			}else{
				echo "抱歉。先生，现目前还没有重复".$sameN."个数据的数组！<br>";
			}
		}
		?>
		<br><br><br>

		<br>
		统计单个数据的历史出现总次数：-------注释了但数据的统计<br><br>
		<?php
		/*
		
		//统计单个数据的历史出现总次数
		$CountOne=count_one_history($nowArray,33);
		$numberCount=count($CountOne);
		echo "数据个数：".$numberCount."个。<br>";
		
		for($j=1; $j<34; $j++){
			//echo $CountOne[$j];
			echo "数据：".($j)."出现的次数为：".$CountOne[$j]."次。<br>";
		}
		*/
		?>
	</div>
	<div id="datalast">
		上次结果：<br>
		<?php
		?>
	</div>
</div>
<?php
//数据显示区域结束
//》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》>
?>


<div id="tables">
表单：<br>

<?php
//操作表单的区域
//《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《<
?>


</div>
<br><br><br>
</div>

<!--   底部的网站声明  -->
<div id="foot">
	感谢，，，的大力支持。
	<br>
	欢迎入驻本站。
	<br>
	有需要合作请联系：QQ704863481。
	<br>

	<?php
	//输出时间，用于计算运行时间
	$timeend=microtime();
	echo "<br>页面开始运行的详细时间是：".$timestart."!<br>";
	echo "页面结束运行的详细时间是：".$timeend."!<br><br>";
	echo "页面运行的总时间是：".($timeend-$timestart)."!<br>";
	?>
</div>

<div id="">
</div>

<div border=2px>
	<?php
	//知识总结结束
	//》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》>
	?>
</div>
<br><br><br>
<!-- bodyface结束前 -->
bodyface结束前
</div>
body结束前
</body>
</html>