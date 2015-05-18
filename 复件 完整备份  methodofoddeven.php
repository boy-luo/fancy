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
?>

<div id="topface">
<div id="methods">
	<div >
		填入方法ID，得出方法的结果：<br>
		<form action="" method="post" style="border=5px;" name="Selectform">
			<input type="text" name="odd_even_id"  value="11" />奇偶奇方法ID<br>
			<input type="text" name="divide_three_id"  value="11" />除3余方法ID<br>
			<input type="submit" name="sub_method"  value="提交" />
		</form>
	</div>
<?php
	echo '-------查询获取历史全部方法的数组。'.'<br>';
	echo '输出方法出现时前后10次的方法情况-------此组数据属于的方法编号，针对的方法（奇偶或除3余）的历史所有出现的记录数组<br>';
		
	//查询获取历史全部方法的数组。
	$data_core = 'data_core';
	$method_row_name = 'odd_even_id';
	$odd_even_method_array = get_method_array($method_row_name, $data_core);
	
	//方法id
	$method_id = 11;
	if(@ $_POST["sub_method"]){
		$method_id = $_POST["odd_even_id"];
		echo "你选择的方法ID：奇偶--<br>";
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