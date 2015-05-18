<!DOCTYPE html>
<!--  如果没有此声明，IE低版本将不能解释固定在两边的盒子 -->

<html>
<head>
<title>某个奇偶奇方法的历史状况 分析 方法浏览</title>
<!--  使页面的编码是utf-8，避免在浏览器输出的是乱码   -->
<meta http-equiv="Content-type" content="text/html;charset=utf-8">
<!--  包含css文件   -->
<link rel = "stylesheet" type = "text/css" href = "data.css">
<?php 
//include ("config.php");
include ("conn.php");
include ("arraydirect.php");
include ("functions.php");
include ("functionsarrayget.php");
?>
</head>


<body>
<?php
$timestart=microtime();
//包含统一的头部导航文件
//include ("navigation.php");
?>
 ^:^<br>
<a name="theTop"></a>
<?php
//方法ID
// $odd_even_id = '';
// $divide_three_id = '';
$odd_even_id = 11;
$divide_three_id = 11;
?>

<div id="topface">
<div id="methods">
	<div >
		填入方法ID，得出方法的结果：<br>
		<form action="" method="post" style="border=5px;" name="Selectform">
			<input type="text" name="odd_even_id"  value=<?php echo $odd_even_id ; ?> />奇偶奇方法ID<br>
			<input type="text" name="divide_three_id"  value=<?php echo $divide_three_id ; ?> />除3余方法ID<br>
			<input type="submit" name="sub_method"  value="提交" />
		</form>
	</div>
<?php

?>
<?php

//方法id
if(@ $_POST["sub_method"]){
	$odd_even_id = $_POST["odd_even_id"];
	// echo "你选择的方法ID：奇偶--$odd_even_id<br>";
}

//方法id
if(@ $_POST["sub_method"]){
	$divide_three_id = $_POST["divide_three_id"];
	// echo "你选择的方法ID：除3余--$divide_three_id<br>";
}
$both_method_array = get_both_odd_divide($odd_even_id, $divide_three_id);

// 输出选择的ID的奇偶奇方法的信息
//echo "奇偶方法：";
echo "奇偶奇方法：ID=$odd_even_id----";
foreach($both_method_array[0] as $key=>$value)
{
	//echo "第 ".$key." 个符合的值： ".$value.'<br>';
	echo $value."\t";
}
echo "<br>";

// 输出选择的ID的除3余方法的信息
//echo "除3余方法：";
echo "除3余方法：ID=$divide_three_id----";
//echo count($both_method_array[1])."<br>";
foreach($both_method_array[1] as $key=>$value)
{
	//echo "第 ".$key." 个符合的值： ".$value.'<br>';
	echo $value."\t";
}
echo "<br><br><br>";

//方法数组
$odd_even = $both_method_array[0];
$divide_three = $both_method_array[1];

echo '利用奇偶方法和除3余方法，找出满足方法要求的1至6位上的数据。<br>';
//利用奇偶方法和除3余方法，找出满足方法要求的1至6位上的数据
$next_arrays = both_odd_divide($odd_even, $divide_three);
	echo "<div id='location_nums'>";
if( is_array($next_arrays))
{
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
}else{
	echo '没有符合的值';
}
	echo "</div>";
echo "<br><br>";
// echo "<p>567</p>";


// echo '历史上此方法的数组数据：<br>';
echo '历史上此方法的数组：(若没有输出数组则表明历史没有出现过)';
$this_history = check_in_history($odd_even_id, $divide_three_id);
echo "<br><br>";

	echo '-------查询获取历史全部方法的数组（先是奇偶奇，再是除3余，但除3余基本没有或基本只有一组）。'.'<br>';
	echo '输出方法出现时前后10次的方法情况 <br>';
	echo ' --此组数据属于的方法编号，针对的方法（奇偶或除3余）的历史所有出现的记录数组<br>';
	
	//查询获取历史全部方法的数组。
	$data_core = 'data_core';
	$method_row_name = 'odd_even_id';
	$odd_even_method_array = get_method_array($method_row_name, $data_core);
	
	//方法id
	$method_id = 11;
	if(@ $_POST["sub_method"]){
		$method_id = $_POST["odd_even_id"];
		echo "你选择的方法ID：奇偶奇--".$_POST["odd_even_id"]."<br>";
	}
	
	//输出方法出现时前后10次的方法情况-----方法编号，方法历史出现的数组
	// print_twenty($method_id, $odd_even_method_array);
	
	// echo '-============';
	$get_infors = get_method_array_infors();
	// echo $get_infors."<br>";
	// echo $get_infors[0][0]."<br>";
	// echo $get_infors[0][1]."<br>";
	// echo $get_infors[1]."<br>";
	// echo $get_infors."<br>"
	
	//the_key_counts得到的是以方法ID作为键值的统计数组
	$the_key_counts = count_odd_even_key_method();
	// echo $the_key_counts [1];
	// echo $the_key_counts [1][];
	print_twenty_infors($method_id, $get_infors, $the_key_counts);
	
	echo '<br><br><br>除3余：';
	$method_row_name = 'divide_three_id';
	$divide_three_method_array = get_method_array($method_row_name, $data_core);
	
	//方法id
	$method_id = 11;
	if(@ $_POST["sub_method"]){
		$method_id = $_POST["divide_three_id"];
		echo "你选择的方法ID：除3余--$method_id<br>";
	}
	
	//输出方法出现时前后10次的方法情况-----方法编号，方法历史出现的数组
	print_twenty($method_id, $divide_three_method_array);
	echo '<br><br><br>';
?>
</div>

<div id="methods">
	<?php
	?>
</div>	

</div>


<br><br><br>

<?php
//操作表单的区域结束
//》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》>
?>


<?php
$timeEnded=microtime();
echo "<br><br><br>页面开始运行 的详细时间是：".$timestart."!<br>";
echo "<br>页面运行完成 的详细时间是：".$timeEnded."!<br><br>";
echo "页面运行运行所用时间：".($timeEnded - $timestart)."!<br><br>";

?>
body结束前
</body>
</html>