<!DOCTYPE html>
<!--  如果没有此声明，IE低版本将不能解释固定在两边的盒子 -->

<html>
<head>
<title>16-30单个数字分析 方法浏览</title>
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
	单个数字出现历史：<br>
	<?php
		/* 
		//统计各个数字历史出现时的id，并把重要信息存入数据库
		// 需要改变的地方：
		// 函数里的数据表名称1_3，正在统计的数字		
		// 信息比较详细，但行数的盒子太多，不便分析
		for($j=1; $j<34; $j++)
		{
			// if($j == 1)
			// {
				// echo "<div class='numbers_history'>";
			// }
			if($j % 8 == 1)
			{
				echo "<div class='numbers_history'>";
			}
			
			$num = $j;
			echo "<div class='number_history'>";
			
			// 信息比较详细，但行数的盒子太多，不便分析
			get_num_appear_id_interval($num);	
			
			
			// 信息比较简略，但行数的盒子更少，方便分析
			// num_appear_id_infor_core($num);	
			echo "</div>";	
			
			if($j % 8 == 0)
			{
				echo "</div>";
			}	
		} 
		*/
		
		
		
		// 信息比较简略，但行数的盒子更少，方便分析
		// for($j=1; $j<34; $j++)
		for($j=16; $j<31; $j++)
		{
			// if($j == 1)
			// {
				// echo "<div class='numbers_history'>";
			// }
			if($j % 15 == 1)
			{
				echo "<div class='numbers_history2'>";
			}
			
			$num = $j;
			echo "<div class='number_history2'>";
			
			// 信息比较详细，但行数的盒子太多，不便分析
			// get_num_appear_id_interval($num);	
			
			
			// 信息比较简略，但行数的盒子更少，方便分析
			num_appear_id_infor_core($num);	
			echo "</div>";	
			
			if($j % 15 == 0)
			{
				echo "</div>";
			}	
		}
		
		// $num = 1;
		// echo "<div class='number_history'>";
		// get_num_appear_id_interval($num);
		// echo "</div>";
		// $num = 2;
		// echo "<div class='number_history'>";
		// get_num_appear_id_interval($num);
		// echo "</div>";
		// $num = 3;
		// echo "<div class='number_history'>";
		// get_num_appear_id_interval($num);
		// echo "</div>";
		// $num = 4;
		// echo "<div class='number_history'>";
		// get_num_appear_id_interval($num);
		// echo "</div>";
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