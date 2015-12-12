<!DOCTYPE html>
<!--  如果没有此声明，IE低版本将不能解释固定在两边的盒子 -->

<html>
<head>
<title>单个数据历史走向分析</title>
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
// 测试提交
// 测试提交
?>
<a name="theTop"></a>
<?php
?>

<div id="topface">
<div id="methods">
	单个数字出现历史：<br>
	<?php
		
		$current_interval = 3;   // 当前间隔次数
		$current_id = 1720;
		$current = array('id' => 1720, 'interval' => 3);
		// 信息比较简略，但行数的盒子更少，方便分析
		// for($j=16; $j<31; $j++)
		// {
			$j = 1;  // 1的历史间隔走向
			if($j % 15 == 1)  // 把15个数据包含到一个大盒子里。
			{
				echo "<div class='numbers_history2'>";
			}
			$num = 1;  // 测试
			echo "<div class='number_history2'>";
				$interval = num_appear_interval($num);	 // 输出简洁的单个数字的所有历史间隔进行分析，并返回数组
			echo "</div>";	
	// foreach($interval as $the_id=>$value){
		// echo '<br>'.$the_id.'--'.$value['interval'];
	// }			
			echo "<div class='number_history2'>";
				echo '历史与本次间隔相同的各处的id：<br>';
				$key = 'interval';
				$same_interval = same_interval($interval,$current, $key);  // 获取历史各处与本间隔相同的id，用于后续处理
			
				echo '共计：'.count($same_interval).'次。<br>';
			echo "</div>";	
			
			echo "<div class='number_history2'>";
				$key = 'interval';
				$same_like_interval = same_like_interval($interval, $same_interval,$current, $key);
				echo '历史情形相同次数：'.count($same_like_interval['same']).'<br>';
				echo '历史情形相似次数：'.count($same_like_interval['like']).'<br>';
				echo '历史情形不同次数：'.count($same_like_interval['different']).'<br>';
	// foreach($same_like_interval as $the_id=>$value){
		// echo '<br>'.$the_id.'--'.$value;
	// }
			echo "</div>";	
			
			/* 
				以下一段是用当前间隔次数进行历史的相关对应的操作。
			*/

			if($j % 15 == 0)
			{
				echo "</div>";
			}	
		// }
		
	?>
</div>	

</div>

<div id="datas">
	<!--
	-->
	<div id="method_history">
		4323
	</div>
	<div id="dataask">
		2342
	</div>
	<div id="method_history">
		24
	</div>
</div>


<div id="topface">
<div id="askTable">
预留区域：<br>
<?php
	// foreach($count_result as $key=>$value){
		// // echo "x下标：".$key."，值：".$value."次！<br>";
		// // echo "数组详细信息为：".$arrayMesage[$key]."<br><br>".'</font>';
		// // echo $value."<br>";
		
		// foreach($count_result as $key=>$value){
			// echo "x下标：".$key."，值：".$value."次！<br>";
			// // echo "数组详细信息为：".$arrayMesage[$key]."<br><br>".'</font>';
			// // echo $value."<br>";
		// }
	// }
if(@ $_POST['giveUpAllSub']){

}
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