<!DOCTYPE html>
<!--  如果没有此声明，IE低版本将不能解释固定在两边的盒子 -->

<html>
<head>
<title>最后的战役（优化后）</title>
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
//自定义的显现函数-----------失败，报废
function addOneId(eleId){
	//inline：前面不换行,block:后面换行,none：不显示
	// document.getElementById(eleId).style.display='block';
	document.getElementById(eleId).onclick=function(){return 1;};
}

</script>
<div id="methods">
	最后的战役（优化后）：-----------------已经进行多组比较的优化了
	<br>
	<form action="" method="post" name="testForm">
		<input type="text" name="next_id"  id="jumpId" value=<?php echo $the_array_id ++ ?> />
		<input type="submit" name="add_one_id"  id="addId" value="寻找下一组数组趋势---失败，报废"/>
	</form>

	<?php
		// if(@ $_POST['add_one_id']){
			// // $the_array_id ++;
			// // $the_array_id += "addOneId(addId);";
			// $the_array_id = $_POST['next_id'];
			// echo $the_array_id.'-------<br>';
			// // $the_array_id = @ $_POST['next_id'] ++ ;//$the_array_id;
		// }
		
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
					
				// 每组前 $find_n（暂定为10）组都进行趋势分析，所以定义10的变量存放分析结果（既是次数）
				$same_count[$the_id][$j] = 0;
				
			}
			
			// 因为是前后3组，所以最后一组后面还多出3组
			//如果没有超出第一个坐标（既是0键值）
			if($the_id - $find_n - 3 >= 0)
			{
				// if($the_id + 3 < ($total_array - 1) )
				// if($the_id + 3 < ($total_array - 1) )
				
				//如果没有超出末尾坐标
				if($the_id + 3 < $total_array)
				// if($the_id + 3 < $total_array)
				{
					// 前后3组共6组，所以进行6次，每次进行10的比较
					for($j=0; $j<6; $j++){
						
						// 10组间进行趋势分析（既是数组相同元素个数统计---利用数组交集实现统计）
						for($i=0; $i<10; $i++){
							// $same_numbers = array_intersect($datas[$the_array_id - $i], $datas[$the_id +3 - $i]);
							// $same_numbers = array_intersect($datas[$the_array_id - $i], $datas[$total_array - 1 - $i]);
							// $same_numbers = array_intersect($datas[($the_array_id - 10) + $i], $datas[$the_id - $i]);
							
							// 从后面往前面比较----
							// -------导致记录混乱，次序颠倒了，注意记录次序即可
							// $same_numbers = array_intersect($datas[($the_array_id - 10) + $i], $datas[($the_id - 10) + $i]);
							$same_numbers = array_intersect($datas[$the_array_id - $i], $datas[($the_id + 3) - $i]);
							// $same_n[$i] = count($same_numbers);
							// if($same_n[$i] >= 3)
							$same_n = count($same_numbers);
							if($same_n >= 3)
							{
								// 因为是从上往下输出，所以次序就是这样了
								++ $same_count[$the_id][9 - $i];
							}
						}
					}
					
				//否则，如果没有超出首坐标，但超出了末尾坐标，就从最后向前推进相差的个数那么多组即可
				// 此时从后向前比较会更容易
				}else{
				
					// 前后3组共6组，所以进行6次，每次进行10的比较
					for($j=0; $j<6; $j++){
						
						// 10组间进行趋势分析（既是数组相同元素个数统计---利用数组交集实现统计）
						// 此时没有超出首坐标，但超出了末尾坐标，从后向前比较会更容易
						for($i=0; $i<10; $i++){
						
							// 从后面往前面比较----
							// -------导致记录混乱，次序颠倒了，注意记录次序即可
							// $same_numbers = array_intersect($datas[$the_array_id - $i], $datas[$the_id +3 - $i]);
							$same_numbers = array_intersect($datas[$the_array_id - $i], $datas[($total_array - 1) - $i]);
							// $same_n[$i] = count($same_numbers);
							// if($same_n[$i] >= 3)
							$same_n = count($same_numbers);
							if($same_n >= 3)
							{
							
								// 从后面往前面比较----
								// -------导致记录混乱，次序颠倒了，注意记录次序即可
								++ $same_count[$the_id][10 - $i];
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
			
			//否则，如果超出首坐标，但没有超出了末尾坐标，就从最前向后推进相差的个数那么多组即可
			// 此时从前向后比较会更容易	
			}else{
			
				
				//如果没有超出末尾坐标
				if($the_id + 3 < $total_array)
				{
					// 前后3组共6组
					// 前后3组共6组，所以进行6次，每次进行10的比较
					for($j=0; $j<6; $j++){
					
					
						// 10组间进行趋势分析（既是数组相同元素个数统计---利用数组交集实现统计）
						// 此时超出首坐标，但没有超出了末尾坐标，从前向后比较会更容易
						for($i=0; $i<10; $i++){
							// $same_numbers = array_intersect($datas[$the_array_id - $i], $datas[$the_id +3 - $i]);
							// $same_numbers = array_intersect($datas[$the_array_id - $i], $datas[$total_array - 1 - $i]);
							// $same_numbers = array_intersect($datas[($the_array_id - 10) + $i], $datas[$the_id - $i]);
							
							// 此时超出首坐标，但没有超出了末尾坐标，从前向后比较会更容易
							$same_numbers = array_intersect($datas[($the_array_id - 10) + $i], $datas[0 + $i]);
							// $same_n[$i] = count($same_numbers);
							// if($same_n[$i] >= 3)
							$same_n = count($same_numbers);
							
							// 从前面往后面比较----
							// -------导致记录混乱，次序颠倒了，注意记录次序即可
							if($same_n >= 3)
							{
								// 从前面往后面比较----
								// -------导致记录混乱，次序颠倒了，注意记录次序即可
								++ $same_count[$the_id][$i];
							}
						}
					}
					
				// 这里好像有点多余，因为，不可能同时超出前面首坐标，也超出后面的尾坐标--
				// ------仅此一处，此处的上一处的if判断可以不要，但无大碍
				}/* else{
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
				} */
				
			}
			// echo '</div>';
			
			
			// if( is_array($same_count[$the_id]))
			// {
			// foreach($same_count[$the_id] as $key2=>$value2)
			// {
				// echo "id为".$the_id.'的第'.$key2.'的数组的偏移后趋势为： '.$value2.'<br>';
			// }
			// }
			
			
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
		if( is_array($same_count))
		{
			// foreach($same_count[$the_id] as $id_key=>$count_array)
			foreach($same_count as $id_key=>$count_array)
			{
				$values_count = array_count_values($count_array);
				if( is_array($count_array) && $values_count[0] <= 7)
				{
						echo '<div id="method_line">';
					echo "当前 id为：".$id_key.'。<br>';
					foreach($count_array as $key1=>$the_count)
					{
						if($the_count >= 3)
						{
							// ++ $total;
							// echo '<font color="#aaggss" size="5px">相同元素个数：'.$same_n.'</font><br>';
							echo '<font color="#aaggss">第'.$key1.'的数组的偏移后趋势为： '.$the_count.'</font><br>';
							// echo '<font color="#aaggss">相同元素个数：'.$same_n.'</font><br>';
						}else{
							echo '第'.$key1.'的数组的偏移后趋势为： '.$the_count.'<br>';
							// echo '相同元素个数：'.$same_n.'<br>';
						}
						// echo "id为".$id_key.'的第'.$key1.'的数组的偏移后趋势为： '.$the_count.'<br>';
					}
					echo '<br><br>';
				echo '</div>';
				}
			}
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