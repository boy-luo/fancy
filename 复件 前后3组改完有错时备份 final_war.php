<!DOCTYPE html>
<!--  如果没有此声明，IE低版本将不能解释固定在两边的盒子 -->

<html>
<head>
<title>最后的战役（优化前）</title>
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
	
	<?php
	// 得到核心数据表的所有数据
	// 得到核心数据表的所有数据
	// 得到核心数据表的所有数据
	// $sql = "SELECT one, two, three, four, five, six, odd_even_proportion_id, odd_even_id, divide_three_id FROM data_core ";
	$sql = "SELECT one, two, three, four, five, six FROM data_core ";
	$result = mysql_query($sql);
	
	//初始化
	$datas = array();
	$i = 0;
	while($this_row = mysql_fetch_row($result))
	// while( $row = mysql_fetch_array($result))
	{
		// $method_odd_evens[$i + 1] = $this_row;
		$datas[$i] = $this_row;
		++$i;
	}
	
	// 测试用的数组
	// 单组测试
	$the_array_id = 1731;     //正在进行预测的数组的ID编号
?>

<?php
	?>
	
<script>
//自定义的显现函数
function addOneId(eleId){
	//inline：前面不换行,block:后面换行,none：不显示
	// document.getElementById(eleId).style.display='block';
	document.getElementById(eleId).onclick=function(){return 1;};
}

//自定义的屏幕坐标获取函数，弹窗提示点击处的屏幕坐标
function onclickXY(){
	//点击时弹出显示点击处的坐标
	onclick=alert("相对于屏幕的鼠标事件的横坐标："+event.screenX+"；\n 相对于屏幕的鼠标事件的横坐标："+event.screenY+"!\n");
}

function timeNow(){
	var nowTime = new Date();
	//点击时弹出显示点击处的坐标
	onclick=alert("现在时间是："+nowTime+"；\n");
}
</script>
<div id="methods">
	最后的战役（优化前）：-----------------只有进行多组比较的优化了
	<br>
	<form action="" method="post" name="testForm">
		<input type="text" name="next_id"  id="jumpId" value=<?php echo $the_array_id ++ ?> />
		<input type="submit" name="add_one_id"  id="addId" value="寻找下一组数组趋势"/>
	</form>

	<?php
	if(@ $_POST['add_one_id']){
		// $the_array_id ++;
		// $the_array_id += "addOneId(addId);";
		$the_array_id = $_POST['next_id'];
		echo $the_array_id.'-------<br>';
		// $the_array_id = @ $_POST['next_id'] ++ ;//$the_array_id;
	}
	
	//正在进行预测测试的数组
	$test_array = $datas[$the_array_id];
	
	// 要求的相同元素的个数
	$same_n = 1;
	
	// 要求查看多少组数据的趋势
	$find_n = 10;
	
	// 每组数组的元素个数
	$array_n = 6;
	
	// 多组测试
	// $test_array = $datas[0][1723];
	// $test_array = $datas[2][1723];
	// $test_array = $datas[3][1723];
	// $test_array = $datas[4][1723];
	
	
		// $test_array, $arrays_statistics_with都是前面的得到，在此直接用作参数
		// same_n_intersect_this_array( $this_array, $datas, $same_n, $array_n);
		$same_ids = same_n_intersect_this_array($test_array, $datas, $same_n, $array_n);
		$total_array = count($same_ids);
		echo '比较数组为：';
		for($j=0; $j<6; $j++){
			echo $test_array[$j].',';
		}
		echo '比较数组的--id为：'.$the_array_id.'<br>';
		echo '一共有：'.$total_array.'个这样的ID。<br>';
		echo '<br><br>';
		
		// 输出获得到的取满足相同个数的id些
		// foreach($same_ids as $key2=>$value2)
		// {
			// echo "第 ".$key2." 个满足相同个数的id编号为： ".$value2.'<br>';
		// }
		
		
		/**
			因为需要预测的数组肯定很靠后，且一定处在数组的键值之间，不必考虑其进行预测时键值超出范围的问题
			但是被找到的id些就需要考虑此问题，1.太靠前导致往前推进10组在加上前后偏移的3组--既是往前推进13组可能会超出第一个键值
				同理，往后推进10组在加上前后偏移的3组--既是往后推进13组可能会超出最后一个键值，所以需要对键值进行判断
				此处解决：需要注意的是，此处当遇到超出键值时依然是进行10加上前后偏移3组的方式统一进行，
						只不过在超出键值的地方会顺势朝着相反方向推进相差的键值数
					
			思路：10组与10组进行比较，记录相同个数大于3个的位置的个数
				进行6次这样的比较即实现前后6组的偏移
		*/
		// 得到这些id之前的数组情况，既是发现趋势-
		// --------需要当前数组的id作为参数，依次往前进行匹配，得出趋势
		foreach($same_ids as $key=>$the_id)
		{
			// echo "第 ".$key." 个满足相同个数的id编号为： ".$the_id.'<br>';
			
			// 定义变量，用于记录达到有3组数组都有3个及以上个数的相同元素
			$total = 0;
			$result = array();
			
			// echo '<div id="the_final_war">';
			
			
			// 用于统计10组的对于前后3组的匹配度计数
			for($j=0; $j<10; $j++){
					
				$same_count[$the_id][$j] = 0;
				
			}
			
			// 因为是前后3组，所以最后一组后面还多出3组
			if($the_id - $find_n - 3 >= 0)
			{
				// if($the_id + 3 < ($total_array - 1) )
				// if($the_id + 3 < ($total_array - 1) )
				if($the_id + 3 < $total_array)
				{
					/* if($i + 10 < $end_n)
					{
						echo '<div id="method_line">';
						for($j=($i-10); $j<($i+10); $j++)
						{ */
						
					// 在之前的$find_n组内寻找趋势
					// for($j=0; $j<$find_n; $j++){
					
					// 前后3组共6组
					for($j=0; $j<6; $j++){
						// echo $test_array[$j].',';
						// $this_id = $the_id - $j;
						// $this_array_id = $the_array_id - $j;
						
						// $same_numbers = array_intersect($datas[$this_array_id], $datas[$this_id]);
						// $same_numbers1 = array_intersect($datas[$the_array_id - $j], $datas[$the_id - $j]);
						// $same_n1 = count($same_numbers);
						// $same_numbers2 = array_intersect($datas[$the_array_id - $j], $datas[$the_id - $j]);
						// $same_n2 = count($same_numbers);
						// $same_numbers3 = array_intersect($datas[$the_array_id - $j], $datas[$the_id - $j]);
						// $same_n3 = count($same_numbers);
						// $same_numbers4 = array_intersect($datas[$the_array_id - $j], $datas[$the_id - $j]);
						// $same_n4 = count($same_numbers);
						// $same_numbers5 = array_intersect($datas[$the_array_id - $j], $datas[$the_id - $j]);
						// $same_n5 = count($same_numbers);
						// $same_numbers6 = array_intersect($datas[$the_array_id - $j], $datas[$the_id - $j]);
						// $same_n6 = count($same_numbers);
						// $same_numbers7 = array_intersect($datas[$the_array_id - $j], $datas[$the_id - $j]);
						// $same_n7 = count($same_numbers);
						// $same_numbers8 = array_intersect($datas[$the_array_id - $j], $datas[$the_id - $j]);
						// $same_n8 = count($same_numbers);
						// $same_numbers9 = array_intersect($datas[$the_array_id - $j], $datas[$the_id - $j]);
						// $same_n9 = count($same_numbers);
						// $same_numbers10 = array_intersect($datas[$the_array_id - $j], $datas[$the_id - $j]);
						// $same_n10 = count($same_numbers);
						
						$same_numbers = array_intersect($datas[$the_array_id], $datas[$the_id + 3 - $j]);
						$same_n[0] = count($same_numbers);
						$same_numbers = array_intersect($datas[$the_array_id - 1], $datas[$the_id + 2 - $j]);
						$same_n[1] = count($same_numbers);
						$same_numbers = array_intersect($datas[$the_array_id - 2], $datas[$the_id + 1 - $j]);
						$same_n[2] = count($same_numbers);
						$same_numbers = array_intersect($datas[$the_array_id - 3], $datas[$the_id - $j]);
						$same_n[3] = count($same_numbers);
						$same_numbers = array_intersect($datas[$the_array_id - 4], $datas[$the_id - 1 - $j]);
						$same_n[4] = count($same_numbers);
						$same_numbers = array_intersect($datas[$the_array_id - 5], $datas[$the_id - 2 - $j]);
						$same_n[5] = count($same_numbers);
						$same_numbers = array_intersect($datas[$the_array_id - 6], $datas[$the_id - 3 - $j]);
						$same_n[6] = count($same_numbers);
						$same_numbers = array_intersect($datas[$the_array_id - 7], $datas[$the_id - 4 - $j]);
						$same_n[7] = count($same_numbers);
						$same_numbers = array_intersect($datas[$the_array_id - 8], $datas[$the_id - 5 - $j]);
						$same_n[8] = count($same_numbers);
						$same_numbers = array_intersect($datas[$the_array_id - 9], $datas[$the_id - 6 - $j]);
						$same_n[9] = count($same_numbers);
						
						for($i=0; $i<10; $i++){
							if($same_n[$i] >= 3)
							{
								++ $same_count[$the_id][$i];
								// if( !in_array($result, $the_id))
								// {
									// $result
								// }
							}
						}
						
						// if($same_n >= 3)
						// {
							// ++ $total;
							// // echo '<font color="#aaggss" size="5px">相同元素个数：'.$same_n.'</font><br>';
							// // echo '<font color="#aaggss">相同元素个数：'.$same_n.'</font><br>';
						// }else{
							// // echo '相同元素个数：'.$same_n.'<br>';
						
						// }
					}
				}else{
					//超出末尾坐标，就从最后向前推进相差的个数那么多组即可
					for($j=0; $j<6; $j++){
					
						for($i=0; $i<10; $i++){
							// $same_numbers = array_intersect($datas[$the_array_id - $i], $datas[$the_id +3 - $i]);
							$same_numbers = array_intersect($datas[$the_array_id - $i], $datas[($total_array - 1) - $i]);
							// $same_n[$i] = count($same_numbers);
							// if($same_n[$i] >= 3)
							$same_n = count($same_numbers);
							if($same_n >= 3)
							{
								++ $same_count[$the_id][$i];
							}
						}
						
						// for($j=0; $j<10; $j++){
							// if($same_n[$i] >= 3)
							// {
								// ++ $same_count[$the_id][$j];
							// }
						// }
					}
				}
			}else{
				if($the_id + 3 < $total_array)
				{
					// 前后3组共6组
					for($j=0; $j<6; $j++){
						for($i=0; $i<10; $i++){
							// $same_numbers = array_intersect($datas[$the_array_id - $i], $datas[$the_id +3 - $i]);
							// $same_numbers = array_intersect($datas[$the_array_id - $i], $datas[$total_array - 1 - $i]);
							// $same_numbers = array_intersect($datas[($the_array_id - 10) + $i], $datas[$the_id - $i]);
							$same_numbers = array_intersect($datas[($the_array_id - 10) + $i], $datas[$i]);
							// $same_n[$i] = count($same_numbers);
							// if($same_n[$i] >= 3)
							$same_n = count($same_numbers);
							if($same_n >= 3)
							{
								++ $same_count[$the_id][$i];
							}
						}
					}
				}else{
					//超出末尾坐标，就从最后向前推进相差的个数那么多组即可
					for($j=0; $j<6; $j++){
					
						for($i=0; $i<10; $i++){
							// $same_numbers = array_intersect($datas[$the_array_id - $i], $datas[$the_id +3 - $i]);
							$same_numbers = array_intersect($datas[$the_array_id - $i], $datas[($total_array - 1) - $i]);
							// $same_n[$i] = count($same_numbers);
							// if($same_n[$i] >= 3)
							$same_n = count($same_numbers);
							if($same_n >= 3)
							{
								++ $same_count[$the_id][$i];
							}
						}
					}
				}
				
			}
			// echo '</div>';
			
			/* if($total >= 4)
			{
				echo '<div id="the_final_war_good">';
				// for($j=0; $j<($the_id+1); $j++){
				if($the_id - $find_n >= 0)
				{
					// if($the_id + 3 <= $total_array)
					// {
					/* if($i + 10 < $end_n)
					{
						echo '<div id="method_line">';
						for($j=($i-10); $j<($i+10); $j++)
						{ * /
					for($j=0; $j<$find_n; $j++){
					// for($j=0; $j<10; $j++){
						$same_numbers = array_intersect($datas[$the_array_id - $j], $datas[$the_id - $j]);
						$same_n = count($same_numbers);
						if($same_n >= 3)
						{
							++ $total;
							// echo '<font color="#aaggss" size="5px">相同元素个数：'.$same_n.'</font><br>';
							echo '<font color="#aaggss">相同元素个数：'.$same_n.'</font><br>';
						}else{
							echo '相同元素个数：'.$same_n.'<br>';
						}
					}
				}else{
					for($j=0; $j<($the_id+1); $j++){
						// echo $test_array[$j].',';
						// $this_id = $the_id - $j;
						// $this_array_id = $the_array_id - $j;
						// $same_numbers = array_intersect($datas[$this_array_id], $datas[$this_id]);
						$same_numbers = array_intersect($datas[$the_array_id - $j], $datas[$the_id - $j]);
						$same_n = count($same_numbers);
						if($same_n >= 3)
						{
							++ $total;
							// echo '<font color="#aaggss" size="5px">相同元素个数：'.$same_n.'</font><br>';
							echo '<font color="#aaggss">相同元素个数：'.$same_n.'</font><br>';
						}else{
							echo '相同元素个数：'.$same_n.'<br>';
						}
					}
				}
				echo '</div>';
			} */
		}
	?>
</div>	

<br>
<div id="datas">
	<!--
	-->
	<div id="method_history">
		
	</div>
	<div id="dataask">
		<br>
		<br>
		<?php
		?>
	</div>
	<div id="method_history">		
		<?php
		
		?>
		<br>
	</div>
</div>
<div id="askTable">	
</div>
</div>

<?php

?>

<?php
$timeEnded=microtime();
echo "<br><br>页面开始运行 的详细时间是：".$timestart."!<br>";
echo "页面运行完成 的详细时间是：".$timeEnded."!<br><br>";
echo "页面运行运行所用时间：".($timeEnded - $timestart)."!<br>";

?>
body结束前
</body>
</html>