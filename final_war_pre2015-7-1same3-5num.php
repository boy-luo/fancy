<!DOCTYPE html>
<!--  如果没有此声明，IE低版本将不能解释固定在两边的盒子 -->

<html>
<head>
<title>2015-7-1有3-5个相同final_war_pre.php</title>
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
本页面查看历史中有3-5（人为手动设置）个相同的历史的各处：<br>
<a name="theTop"></a>
<?php
//输出时间，用于计算运行时间
$timestart=microtime();
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
?>
<div id="methods">
	最后的战役（优化前）：-----------------只有进行多组比较的优化了
	<br>
	<?php
	// 测试用的数组
	// 单组测试
	$the_array_id = 1724;     //正在进行预测的数组的ID编号
	
	//正在进行预测测试的数组
	$test_array = $datas[$the_array_id];
	
	// 要求的相同元素的个数
	$same_n = 5;
	
	// 要求查看多少组数据的趋势
	$find_n = 10;
	
	// 每组数组的元素个数
	$array_n = 6;
	
	// 多组测试
	// $test_array = $datas[0][1723];
	// $test_array = $datas[2][1723];
	// $test_array = $datas[3][1723];
	// $test_array = $datas[4][1723];
	
	/* 
		查询出有指定个数的相同数的历史组，此处用于后面去查看它之前的10组中有3个以上相同的数组有3组以上的地方。
	*/
		// $test_array, $arrays_statistics_with都是前面的得到，在此直接用作参数
		// same_n_intersect_this_array( $this_array, $datas, $same_n, $array_n);
		$same_ids = same_n_intersect_this_array($test_array, $datas, $same_n, $array_n);
		echo '<font size=5 color="green">正在比较的数组的数据为：';
		for($j=0; $j<6; $j++){
			echo $test_array[$j].',';
		}
		echo '<br>';
		echo '正在挖掘的数组的id为：'.$the_array_id.'<br>';
		echo '在历史数组中与它有 '.$same_n.' 个相同的数的数组一共有：'.count($same_ids).'个。<br>';
		echo '期望被预测的数组：';
		for($j=0; $j<6; $j++){
			echo $datas[$the_array_id+1][$j].',';
		}
		echo '</font>';
		echo '<br><br>';
		
		
		foreach($same_ids as $key=>$the_id)   // 历史的每处的id
		{
			// for($j=0; $j<$find_n; $j++){      // 每处的前10处
			for($j=0; $j<$find_n+5; $j++){      // 每处的后5处，和前10处
					$k=0;
					// echo '<div class="nums" style="margin-top:3px;">';
					// echo '<div class="nums" style="padding-top:3px;">';
					echo '<div class="nums">';
					if($j==9){
						echo '+++++++++++++++++++++';
					}
					for($i=1; $i<34; ++$i){
						if($k<6  && $datas[($the_id - 9) + $j][$k] == $i){
							if($datas[($the_id - 9) + $j][$k]<10)
							{
								echo '<span class="num">0'.$datas[($the_id - 9) + $j][$k].'</span>';  // 从前面的第9组开始。
							}else{
								echo '<span class="num">'.$datas[($the_id - 9) + $j][$k].'</span>';
							}
							$k ++;
						}else{
							echo '<span class="num"></span>';
						}
					}
					echo '奇偶比：';
					echo '<span class="num">'.( 7- $datas[($the_id - 9) + $j][6]).":".($datas[($the_id - 9) + $j][6]-1).'</span>';
					// echo '<span class="num">奇偶比：'.( 7- $value[6]).":".($value[6]-1).'</span>';
					// echo '-----奇偶比：'.( 7- $value[6]).":".($value[6]-1).'；';
					echo '</div>';
					// echo '<br>';
			}
			echo '<div  style="width:900px;height=45px; border:solid 4px;float:left;"></div>';
		}
		
		// $the_id = $the_array_id;
		// for($j=0; $j<$find_n; $j++){      // 输出正在预测出的前10组----不用专门输出，上面的最后一组就是的。
			// $k=0;
			// // echo '<div class="nums" style="margin-top:3px;">';
			// // echo '<div class="nums" style="padding-top:3px;">';
			// echo '<div class="nums">';
			// for($i=1; $i<34; ++$i){
				// if($datas[($the_id - 9) + $j][$k] == $i && $k<6){
					// if($datas[($the_id - 9) + $j][$k]<10)
					// {
						// echo '<span class="num">0'.$datas[($the_id - 9) + $j][$k].'</span>';
					// }else{
						// echo '<span class="num">'.$datas[($the_id - 9) + $j][$k].'</span>';
					// }
					// $k ++;
				// }else{
					// echo '<span class="num"></span>';
				// }
			// }
			// echo '奇偶比：';
			// echo '<span class="num">'.( 7- $datas[($the_id - 9) + $j][6]).":".($datas[($the_id - 9) + $j][6]-1).'</span>';
			// // echo '<span class="num">奇偶比：'.( 7- $value[6]).":".($value[6]-1).'</span>';
			// // echo '-----奇偶比：'.( 7- $value[6]).":".($value[6]-1).'；';
			// echo '</div>';
			// // echo '<br>';
		// }
		// echo '<div  style="width:900px;height=45px; border:solid 4px;float:left;"></div>';
		
		
		// 用于后面得到较满意地方的合并数组最为键值使用
		$conbin_i = 0;
		
		echo '现在正在挖掘的是：历史与之有相同元素，且每组由3个以上相同的数，切在前9次以内至少有4组这样的数组的情况:';
		echo '<br><br>';
		// 得到这些id之前的数组情况，既是发现趋势-
		// --------需要当前数组的id作为参数，依次往前进行匹配，得出趋势		
		foreach($same_ids as $key=>$the_id)
		{
			// echo "第 ".$key." 个满足相同个数的id编号为： ".$the_id.'<br>';
			
			// 定义变量，用于记录达到有3组数组都有3个及以上个数的相同元素
			$total = 0;
			if($the_id - $find_n >= 0)
			{
				for($j=0; $j<$find_n; $j++){
					$same_numbers = array_intersect($datas[$the_array_id - $j], $datas[$the_id - $j]);
					$same_n = count($same_numbers);
					if($same_n >= 3)
					{
						++ $total;
					}else{
						echo '相同元素个数：'.$same_n.'<br>';
					}
				}
			}else{
			
				// 通过控制循环次数 $j 避免超出键值范围
				for($j=0; $j<($the_id+1); $j++){
					// 通过控制循环次数 $j 避免超出键值范围
					$same_numbers = array_intersect($datas[$the_array_id - $j], $datas[$the_id - $j]);
					$same_n = count($same_numbers);
					if($same_n >= 3)
					{
						++ $total;
						// echo '<font color="#aaggss" size="5px">相同元素个数：'.$same_n.'</font><br>';
						// echo '<font color="#aaggss">相同元素个数：'.$same_n.'</font><br>';
					}else{
						// echo '相同元素个数：'.$same_n.'<br>';
					}
				}
			}
			
					
			// 如果有4组以上都有满足上面要求的相同元素个数，就输出查看，其它的暂时不查看。
			// if($total >= 4)
			if($total >= 0)   // 因为是找出的3-5个相同，所以这里不用要求，直接输出即可。
			{
				echo '<div id="the_final_war_good">';
				echo '当前 id为：'.$the_id.'<br><br>';
				// for($j=0; $j<($the_id+1); $j++){
				if($the_id - $find_n >= 0)
				{
					for($j=0; $j<$find_n; $j++){
						
						// 定义变量，用于记录达到有3组数组都有3个及以上个数的相同元素
						// $total = 0;
						
						// 这是倒序输出的，所以用这里是 需要 同时修改后面的输出样式，同时修改正在预测的突出显示编号
						// $same_numbers = array_intersect($datas[$the_array_id - $j], $datas[$the_id - $j]);
						
						// 这是按顺序输出的
						// $same_numbers = array_intersect($datas[($the_array_id - 10) + $j], $datas[($the_id - 10) + $j]);
						$same_numbers = array_intersect($datas[($the_array_id - 9) + $j], $datas[($the_id - 9) + $j]);  //比较各处其前9期。
						$same_n = count($same_numbers);
						
						
						if($j == ($find_n - 1))
						{
							echo '-------------<br>';
							echo '<font color="#aaggss">相同元素个数：'.$same_n.'</font><br>';
							foreach( $datas[($the_id - 9) + $j] as $key1=>$the_number)      // 输出历史各处与本组对于的数组。
							{                                                               // 输出历史各处与本组对于的数组。
								echo $the_number.',';                                       // 输出历史各处与本组对于的数组。
							}
							echo '<br>';
							foreach( $same_numbers as $key1=>$the_number)     // 输出相同的数据。
							{                                                 // 输出相同的数据。
								echo $the_number.',';                         // 输出相同的数据。
							}
							echo '<br>';
							echo '-------------<br>';
							
							// 输出被预测的下一组
							echo '预测的下一组：<br>';
							// echo '<font color="#aaggss">相同元素个数：'.$same_n.'</font><br>';
							foreach( $datas[($the_id - 9) + $j + 1] as $key1=>$the_number)      // 输出历史各处与本组对于的数组。
							{                                                               // 输出历史各处与本组对于的数组。
								echo $the_number.',';                                       // 输出历史各处与本组对于的数组。
							}
							echo '<br>';
							$same_numbers = array_intersect($datas[$the_array_id+1], $datas[($the_id - 9) + $j+1]);  // 获取下一期的相同的数。
							$same_n = count($same_numbers);
							echo '<br>';
							echo '<font color="#aaggss">相同元素个数：'.$same_n.'</font><br>';
							foreach( $same_numbers as $key1=>$the_number)     // 输出相同的数据。
							{                                                 // 输出相同的数据。
								echo $the_number.',';                         // 输出相同的数据。
							}
							echo '<br>';
							// foreach( $same_numbers as $key1=>$the_number)     // 输出相同的数据。
							// {                                                 // 输出相同的数据。
								// echo $the_number.',';                         // 输出相同的数据。
							// }
							// echo '<br>';
							echo '-------------<br>';
						}else if($same_n >= 3){
							// ++ $total;
							// echo '<font color="#aaggss" size="5px">相同元素个数：'.$same_n.'</font><br>';
							echo '<font color="#aaggss">相同元素个数：'.$same_n.'</font><br>';
							foreach( $datas[($the_id - 9) + $j] as $key1=>$the_number)      // 输出被比较的数组数据。
							{                                                               // 输出被比较的数组数据。
								echo $the_number.',';                                       // 输出被比较的数组数据。
							}
							echo '<br><br>';
						}else{
							echo '相同元素个数：'.$same_n.'<br>';
							foreach( $datas[($the_id - 9) + $j] as $key1=>$the_number)      //输出被比较的数组数据。
							{                                                               //输出被比较的数组数据。
								// echo "第 ".$key2." 个符合的值： ".$value2.'<br>';        //输出被比较的数组数据。
								echo $the_number.',';                                       //输出被比较的数组数据。
							}
							echo '<br><br>';
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
				
				// 合并之后的5组，以便后面用于输出查看共同出现了哪些
				$conbin_array[$conbin_i] = array();
				for($j=0; $j<5; $j++){
					// $conbin_array[$conbin_i] += $datas[$the_id + 1 + $j];
					$conbin_array[$conbin_i] = array_merge($conbin_array[$conbin_i], $datas[$the_id + 1 + $j]);
				}
				echo '</div>';
				
				++ $conbin_i;
			}
		}
		
		echo '<div id="the_final_war_good">';
			echo '这是当前正在预测的后5组 与各个 5组的并集 的相同元素的情况。：'.'<br><br>';
			echo '一共才33个，每5组就30个，去掉重复，大约还有24-25个左右，所以重复十几二十个很正常。'.'<br><br>';
			// 合并之后的5组，看看共同出现了哪些
			$this_conbin_array = array();
			for($j=0; $j<5; $j++){
				// $this_conbin_array += $datas[$the_array_id + 1 + $j];
				$this_conbin_array = array_merge($this_conbin_array, $datas[$the_array_id + 1 + $j]);
			}
			
			foreach($conbin_array as $key=>$the_array)
			{
				$same_numbers = array_intersect($this_conbin_array, $the_array);
				$same_n = count($same_numbers);
				
				echo '与第'.$key."处的共同元素有：".$same_n." 个。".'<br>';
				foreach($same_numbers as $key1=>$the_number)
				{
					// echo "第 ".$key2." 个符合的值： ".$value2.'<br>';
					echo $the_number.',';
				}
				echo '<br><br>';
			}
		echo '</div>';
	?>
	<hr>
	<br>
	<div style='width:900px;border:solid 1px;float:left;'>
	<?php
		echo '<font size=5 color="green">正在比较的数组的数据为：';
		for($j=0; $j<6; $j++){
			echo $test_array[$j].',';
		}
		echo '<br>';
		echo '正在挖掘的数组的id为：'.$the_array_id.'<br>';
		echo '在历史数组中与它有 '.$same_n.' 个相同的数的数组一共有：'.count($same_ids).'个。<br>';
		echo '期望被预测的数组：';
		for($j=0; $j<6; $j++){
			echo $datas[$the_array_id+1][$j].',';
		}
		echo '</font>';
		echo '<br><br>';
	?>
	</div>
</div>	

<br>
<div id="datas">
	<div id="">
	<?php
		echo '<font size=5 color="green">正在比较的数组的数据为：';
		for($j=0; $j<6; $j++){
			echo $test_array[$j].',';
		}
		echo '<br>';
		echo '正在挖掘的数组的id为：'.$the_array_id.'<br>';
		echo '在历史数组中与它有 '.$same_n.' 个相同的数的数组一共有：'.count($same_ids).'个。<br>';
		echo '期望被预测的数组：';
		for($j=0; $j<6; $j++){
			echo $datas[$the_array_id+1][$j].',';
		}
		echo '</font>';
		echo '<br><br>';
	?>
	</div>
	<!--
	-->
	<div id="method_history">
		正在进行预测测试的数组 在各处的交集数据：
		
		正在进行预测测试的数组 在各处的并集数据：
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