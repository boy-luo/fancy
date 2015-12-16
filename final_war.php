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
	$the_array_id = 1730;     //正在进行预测的数组的ID编号
?>
-----------------我认为趋势都是6，肯定有错
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
		<input type="text" name="next_id"  id="jumpId" value=<?php echo $the_array_id ?> />
		<input type="submit" name="add_one_id"  id="addId" value="寻找下一组数组趋势---失败，报废"/>
	</form>

	<?php
		if(@ $_POST['next_id']){
			// $the_array_id ++;
			// $the_array_id += "addOneId(addId);";
			$the_array_id = $_POST['next_id'];
			echo $the_array_id.'：这个ID的下一期是正在被预测。<br>';
			// $the_array_id = @ $_POST['next_id'] ++ ;//$the_array_id;
		}
		
		//正在进行预测测试的数组
		$test_array = $datas[$the_array_id];
		
		// 要求的相同元素的个数
		$find_same_n = 4;
		
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
		// same_n_intersect_this_array( $this_array, $datas, $find_same_n, $array_n);
		$same_ids = same_n_intersect_this_array($test_array, $datas, $find_same_n, $array_n);
		$same_ids_count = count($same_ids);
		
		$total_array = count($datas);
		echo '比较数组为：';
		for($j=0; $j<6; $j++){
			echo $test_array[$j].',';
		}
		echo '比较数组的--id为：'.$the_array_id.'<br>';
		 echo "<font style='font-size:13;'>";
		echo '一共有：'.$same_ids_count.'个这样的ID。<br><br>';
		 echo "</font>";
		 
		echo '由于要求的相同元素个数太少，且在比较过程中实质是要求的是6个当中任意的几个元素组合都可以
				所以很多地方相邻数组与之有满足个数的相同元素，但这几个元素组合是彼此不同的，导致临近处多次进行 10组间的比较
				由此导致很多的趋势有几乎相同的结果
				。<br>';
		echo '处理方式：不能排除，因为他们有不同的相同元素，需要这些综合在一起才是最好的预测；
				只是那个重复的趋势的位置可以只考虑一次，主要看在这几个不同的相同元素的组合下，有什么不同情况信息。
				而且，只要增加要求的相同元素的个数到4-5个时，这种情况将会很少。';
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
					
			思路：对历史上满足于当前测试组有满足相同元素个数的id编号位置的数组，
					用一个10层的循环，实现两个10组间各自对应的两组进行交集，得出相同元素个数，如果相同个数大于3个，则该组的计数器加1
					10组与10组进行比较，记录相同个数大于3个的位置的个数，
					进行6次这样的比较，即可实现前10组 的前后3组（共6组）偏移 的相同元素个数的统计
		*/
		// 得到这些id之前的数组情况，既是发现趋势-
		// --------需要当前数组的id作为参数，依次往前进行匹配，得出趋势
		foreach($same_ids as $key=>$the_id)
		{
			// echo "第 ".$key." 个满足相同个数的id编号为： ".$the_id.'<br>';
			
			// 定义变量，用于记录达到有3组数组都有3个及以上个数的相同元素
			$total = 0;
			$result = array();
			
			// 用于统计10组的对于前后3组的匹配度计数
			for($j=0; $j<10; $j++){
					
				// 每组前 $find_n（暂定为10）组都进行趋势分析，所以定义10的变量存放分析结果（既是次数）
				$same_count[$the_id][$j] = 0;
				
			}
			
			// 要求交集中至少要有的相同元素的个数，满足了才记录，否则算是没有太大关联，不增加记录数
			$same_at_least = 3;
			
			// 因为是前后3组，所以最后一组后面还多出3组
			//如果没有超出第一个坐标（既是0键值）
			if($the_id - $find_n - 3 >= 0)
			{
				//如果没有超出末尾坐标
				if($the_id + 3 < $total_array)
				{
					// 前后3组共6组，所以进行6次，每次进行10的比较
					for($j=0; $j<6; $j++){
						
						// 10组间进行趋势分析（既是数组相同元素个数统计---利用数组交集实现统计）
						for($i=0; $i<10; $i++){
							
							// 从后面往前面比较----
							// -------导致记录混乱，次序颠倒了，注意记录次序即可
							// $same_numbers = array_intersect($datas[($the_array_id - 10) + $i], $datas[($the_id - 10) + $i]);
							if(($the_array_id - $i) != (($the_id + 3) - $i))
							{
								$same_numbers = array_intersect($datas[$the_array_id - $i], $datas[($the_id + 3) - $j - $i]);
							}
							// 计算相同元素的个数
							$same_n = count($same_numbers);
							
							// 如果相同个数大于3个，则该组的计数器加1
							if($same_n >= $same_at_least)
							{
								// 因为是从上往下输出，所以次序就是这样了
								++ $same_count[$the_id][9 - $i];
							}
						}
					}
					// foreach($same_count[$the_id] as $key2=>$value2)
					// {
						// echo "id为".$the_id.'的第'.$key2.'的数----： '.$value2.'<br>';
						// // foreach($same_count[$the_id] as $key2=>$value2)
						// // {
							// // echo "id为".$the_id.'的第'.$key2.'的数组的偏移后趋势为： '.$value2.'<br>';
						// // }
					// }
					
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
							$same_numbers = array_intersect($datas[$the_array_id - $i], $datas[($total_array - 1) - $j - $i]);
							// echo (($total_array - 1) - $j - $i).'-=-<br>';
							// echo ($total_array).'-----<br>';
							// $same_n[$i] = count($same_numbers);
							// if($same_n[$i] >= 3)
							$same_n = count($same_numbers);
							if($same_n >= $same_at_least)
							{
							
								// 从后面往前面比较----
								// -------导致记录混乱，次序颠倒了，注意记录次序即可
								++ $same_count[$the_id][9 - $i];
							echo  $the_id.'-====='.(9 - $i).'----'.$same_count[$the_id][9 - $i].'-------<br>';
							}
						}
						
						
						// 看看当前id编号处，如果有3组以上 在偏移数组中找到了有满足相同元素个数的数组，
						// 则记录下来，用于？？？？？
						//    -----记录用的报了名不应该是这个，且后面有自己判断是否有3个以上的处理，这里不用判断记录
						//   这里应该是没用的了
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
							
							// 此时超出首坐标，但没有超出了末尾坐标，从前向后比较会更容易
							$same_numbers = array_intersect($datas[($the_array_id - 9) + $i], $datas[0  + $j + $i]);
							// $same_n[$i] = count($same_numbers);
							// if($same_n[$i] >= 3)
							$same_n = count($same_numbers);
							
							// 从前面往后面比较----
							// -------导致记录混乱，次序颠倒了，注意记录次序即可
							if($same_n >= $same_at_least)
							{
								// 从前面往后面比较----
								// -------导致记录混乱，次序颠倒了，注意记录次序即可
								++ $same_count[$the_id][$i];
							}
						}
					}
					
				// 这里好像有点多余，因为，不可能同时超出前面首坐标，也超出后面的尾坐标--
				// ------仅此一处，此处的上一处的if判断可以不要，但无大碍
				}				
			}
			// if( is_array($same_count[$the_id]))
			// {
			// foreach($same_count[$the_id] as $key2=>$value2)
			// {
				// echo "id为".$the_id.'的第'.$key2.'的数组的偏移后趋势为： '.$value2.'<br>';
			// }
			// }
		}
		
		echo '<div id="the_magic">';
		$same_ids = same_n_intersect_this_array($test_array, $datas, $same_n, $array_n);
		echo '比较数组为：';
		for($j=0; $j<6; $j++){
			echo $test_array[$j].',';
		}
		echo '比较数组的--id为：'.$the_array_id.'<br>';
		echo '一共有：'.count($same_ids).'个这样的ID。<br>';
		echo '<br><br>';
		
		// 输出获得到的取满足相同个数的id些
		// foreach($same_ids as $key2=>$value2)
		// {
			// echo "第 ".$key2." 个满足相同个数的id编号为： ".$value2.'<br>';
		// }
		
		
		// 用于后面得到较满意地方的合并数组最为键值使用
		$conbin_i = 0;
			echo '此处要求，必须要 会找到四组以上拥有满足相同元素的个数的10组 才在这里输出。<br>';
			echo '所以与下面的输出数量可能不相同，因下面的输出要求 数目而异。<br>';
			echo '------不知道为什么，改了 要求的数目还是输出不同----因为要求的相同元素个数的不同？？
					不应该啊，多个元素相同，那少个元素相同应该包含有 多个的地方啊，，，，，。<br>';
		// 得到这些id之前的数组情况，既是发现趋势-
		// --------需要当前数组的id作为参数，依次往前进行匹配，得出趋势		
		
		// 记录筛选条件，用于输出
		$the_request = '';
		
		//每组最少要有的相同元素个数
		$this_same_at_least = 3;
		$the_request .= '每组最少要有'.$this_same_at_least.'个相同元素个数；';
		
		// 每个10组间要求要有满足相同元素个数的最少组数
		$group_least = 4;
		$the_request .= '每个10组间要求要有'.$group_least.'组满足相同元素个数的组才在此输出显示；<br>';
		$the_request .= '要求找到与当前测试组有'.$find_same_n.'个以上相同元素的历史ID；<br>';
		$the_request .= '一共有'.$same_ids_count.'组满足有'.$find_same_n.'个相同元素个数的历史ID：<br>';
		echo '<br><br>';
		echo $the_request;
		
		foreach($same_ids as $key=>$the_id)
		{
			// echo "第 ".$key." 个满足相同个数的id编号为： ".$the_id.'<br>';
			
			// 定义变量，用于记录达到有3组数组都有3个及以上个数的相同元素
			$total = 0;
			
			// echo '<div id="the_final_war">';
			if($the_id - $find_n >= 0)
			{
				/* if($i + 10 < $end_n)
				{
					echo '<div id="method_line">';
					for($j=($i-10); $j<($i+10); $j++)
					{ */
				for($j=0; $j<$find_n; $j++){
					// echo $test_array[$j].',';
					// $this_id = $the_id - $j;
					// $this_array_id = $the_array_id - $j;
					// $same_numbers = array_intersect($datas[$this_array_id], $datas[$this_id]);
					$same_numbers = array_intersect($datas[$the_array_id - $j], $datas[$the_id - $j]);
					$same_n = count($same_numbers);
					if($same_n >= $this_same_at_least)
					{
						++ $total;
						// echo '<font color="#aaggss" size="5px">相同元素个数：'.$same_n.'</font><br>';
						// echo '<font color="#aaggss">相同元素个数：'.$same_n.'</font><br>';
					}else{
						// echo '相同元素个数：'.$same_n.'<br>';
					
					}
				}
			}else{
			
				// 通过控制循环次数 $j 避免超出键值范围
				for($j=0; $j<($the_id+1); $j++){
					// echo $test_array[$j].',';
					// $this_id = $the_id - $j;
					// $this_array_id = $the_array_id - $j;
					// $same_numbers = array_intersect($datas[$this_array_id], $datas[$this_id]);
					
					// 通过控制循环次数 $j 避免超出键值范围
					$same_numbers = array_intersect($datas[$the_array_id - $j], $datas[$the_id - $j]);
					$same_n = count($same_numbers);
					if($same_n >= $this_same_at_least)
					{
						++ $total;
						// echo '<font color="#aaggss" size="5px">相同元素个数：'.$same_n.'</font><br>';
						// echo '<font color="#aaggss">相同元素个数：'.$same_n.'</font><br>';
					}else{
						// echo '相同元素个数：'.$same_n.'<br>';
					}
				}
			}
			// echo '</div>';
			
			// echo '此处要求，必须要 会找到四组以上拥有满足相同元素的个数的10组 才在这里输出。<br>';
			// 如果有4组以上都有满足要求的相同元素个数，就输出查看
			
			if($total >= $group_least)
			{
				echo '<div id="the_final_war_good">';
				// echo $the_request;
				echo '当前 id为：'.$the_id.'<br><br>';
				$the_quest = '';
				// for($j=0; $j<($the_id+1); $j++){
				if($the_id - $find_n >= 0)
				{
					for($j=0; $j<$find_n; $j++){
					// for($j=0; $j<10; $j++){
					
						// 定义变量，用于记录达到有3组数组都有3个及以上个数的相同元素
						// $total = 0;
						
						// 这是倒序输出的，所以用这里是 需要 同时修改后面的输出样式，同时修改正在预测的突出显示编号
						// $same_numbers = array_intersect($datas[$the_array_id - $j], $datas[$the_id - $j]);
						
						// 这是按顺序输出的
						// $same_numbers = array_intersect($datas[($the_array_id - 10) + $j], $datas[($the_id - 10) + $j]);
						$same_numbers = array_intersect($datas[($the_array_id - 9) + $j], $datas[($the_id - 9) + $j]);
						$same_n = count($same_numbers);
						
						if($j == ($find_n - 1))
						{
							echo '-------------<br><br>';
							echo '<font color="#aaggss">相同元素个数：'.$same_n.'</font><br>';
							echo '-------------<br><br>';
						}else if($same_n >= 3){
							// ++ $total;
							// echo '<font color="#aaggss" size="5px">相同元素个数：'.$same_n.'</font><br>';
							echo '<font color="#aaggss">相同元素个数：'.$same_n.'</font><br>';
						}else{
							echo '相同元素个数：'.$same_n.'<br>';
							// $the_quest .= '相同元素个数：'.$same_n.'个；';
						}
					}
				}else{
					for($j=0; $j<($the_id+1); $j++){
						$same_numbers = array_intersect($datas[$the_array_id - $j], $datas[$the_id - $j]);
						$same_n = count($same_numbers);
						if($same_n >= 3)
						{
							++ $total;
							echo '<font color="#aaggss">相同元素个数：'.$same_n.'</font><br>';
						}else{
							echo '相同元素个数：'.$same_n.'<br>';
						}
					}
				}
				
				// 合并之后的5组，看看共同出现了哪些
				$conbin_array[$conbin_i] = array();
				for($j=0; $j<5; $j++){
					$conbin_array[$conbin_i] = array_merge($conbin_array[$conbin_i], $datas[$the_id + 1 + $j]);
				}
				echo '</div>';
				++ $conbin_i;
			}
		}
		echo '</div>';

		// 测试差集----不能用差集，不符合这里的需要
		// $diffrent_array[0] = array(2,3,5,7,8);
		// $diffrent_array[1] = array(2,4,5,8,9);
			// 求差集
			// $diffrent_array = array_diff($diffrent_array[0], $diffrent_array[1]);
			// echo '+++++';
		// foreach($diffrent_array as $key1=>$the_number)
		// {
			// echo $the_number.',';
		// }
		
						
		// 如果得到结果数组，就遍历输出
		if( is_array($same_count))
		{
			// 用于后面得到较满意地方的合并数组最为键值使用
			$conbin_i = 0;
			echo '<div id="the_magic">';

			// $same_count与这一期有满足相同个数的各个id处的情况，
			// $count_array是每个id的前10组--每组得到的与其前后6组的相同个数形成的数组
			foreach($same_count as $id_key=>$count_this_array)
			{
				echo '<div id="the_magic">';
				$values_count = array_count_values($count_this_array);
				// if( is_array($count_this_array) && $values_count[0] <= 7)
				if( is_array($count_this_array) )
				{
					echo '<div id="method_line">';
						echo "当前 id为：".$id_key.'，id：'.$the_array_id.'的下一组数据正在预测。<br>';
						echo "当前 要求交集有".$same_at_least."个以上".'。<br><br>';
						foreach($count_this_array as $key1=>$the_count)
						{
							// echo "当前 id为：".($id_key - $key1).'。<br>';
							if($the_count >= 3)
							{
								// echo '<font color="#aaggss">第'.$key1.'：的数组的偏移后趋势为： '.$the_count.'</font><br>';
								echo '<font color="#aaggss">第'.$key1.'组，在历史前后6组中，满足要求：的组数有： '.$the_count.'组</font><br>';
								// echo '<font color="#aaggss">相同元素个数：'.$same_n.'</font><br>';
							}else{
								// echo '第'.$key1.'：的数组的偏移后趋势为： '.$the_count.'(前后6组中，找到有3个以上相同元素的组数)<br>';
								echo '第'.$key1.'组，在历史前后6组中，满足要求的组数有： '.$the_count.'组<br>';
								// echo '相同元素个数：'.$same_n.'<br>';
							}
							// echo "id为".$id_key.'的第'.$key1.'的数组的偏移后趋势为： '.$the_count.'<br>';
						}
						echo '<br><br>';
					echo '</div>';
					echo '<div id="method_line">';
					
					// 合并之后的5组，看看共同出现了哪些
					// 初始化交集数组
					$conbin_array[$conbin_i] = array();
					
					// 初始化差集数组
					// $diffrent_array[$conbin_i] = $datas[$id_key + 1];
					$diffrent_array[$conbin_i] = array();
					for($j=0; $j<5; $j++){
						$conbin_array[$conbin_i] = array_merge($conbin_array[$conbin_i], $datas[$id_key + 1 + $j]);
						// $conbin_array[$conbin_i] = array_merge($conbin_array[$conbin_i], $datas[$id_key + 1 + $j]);
						
						// 求差集----错的，不能用
						//  ----不能用差集，不符合这里的需要，只返回数组1里面的不同的值，数组2 中的丢失了。
						// $diffrent_array[$conbin_i] = array_diff($diffrent_array[$conbin_i], $datas[$id_key + 1 + $j]);
						
						// 查看分别与后面5组数组的 交集情况
						$same_numbers = array_intersect($datas[$id_key + 1 + $j], $datas[$the_array_id]);
						$same_n = count($same_numbers);
						echo "与此组的共同元素有：".$same_n." 个。".'';
						foreach($same_numbers as $key1=>$the_number)
						{
							echo $the_number.',';
						}
						echo '<br>';
						
						// $same_n = count($diffrent_array[$conbin_i]);
						// echo "此5组数组的 差集 元素有：".$same_n." 个。".'';
						// foreach($diffrent_array[$conbin_i] as $key1=>$the_number)
						// {
							// echo $the_number.',';
						// }
						// echo " ".'<br><br>';
						echo '<br>';
					}
					
					$same_n = count($diffrent_array[$conbin_i]);
					echo "此5组数组的 差集 元素有：".$same_n." 个。".'';
					foreach($diffrent_array[$conbin_i] as $key1=>$the_number)
					{
						echo $the_number.',';
					}
					echo '<br>';
					
					// 查看与5组数组并集后的 交集情况
					$same_numbers = array_intersect($conbin_array[$conbin_i], $datas[$the_array_id]);
					$same_numbers = array_unique($same_numbers);
					$same_n = count($same_numbers);
					echo "与此5组数组的并集的共同元素有：".$same_n." 个。".'';
					foreach($same_numbers as $key1=>$the_number)
					{
						echo $the_number.',';
					}
					// echo " ".'<br><br>';
					echo '<br><br>';
					echo '</div>';
						
					++ $conbin_i;
				}
					echo '</div>';
			}
			echo '</div>'; 
			
		}
		
		// 合并之后的5组，看看共同出现了哪些
		$this_conbin_array = array();
		for($j=0; $j<5; $j++){
			$this_conbin_array = $this_conbin_array+$datas[$the_array_id + 1 + $j];
		}
		echo '<div id="the_magic">';
			echo '正在进行分析的数组'.$the_array_id .'，数据为：<font color="#aaggss" size="5px">';
			for($j=0; $j<6; $j++){
				echo $datas[$the_array_id ][$j].',';
			}
			echo '</font><br>';
			echo '数组的下一组ID为'.($the_array_id + 1).'，数据为：<font color="#aaggss" size="5px">';
			for($j=0; $j<6; $j++){
				echo $datas[$the_array_id + 1][$j].',';
			}
			echo '</font><br><br>';
			
			// 全部5组交集
			echo '各个5组组合成的数据 分别与其他的全部5组数组组合成的并集数组进行交集-
					---看看这些并集间的的交集元素（既是与后面5组交集各自找到了1-2个交集元素）<br><br>';
			echo '5组数据 分别与全部5组数组组合成的并集数组进行交集----？？？？<br><br>';
			echo '因为是测试阶段，所以直接测试 目标组与整个5组的并集的 交集和差集情况<br><br>';
			
			echo '可以考虑 让目标组与整个前后5组或更多组的并集 进行交集和差集情况<br><br>';

			// 作为循环条件
			$array_counts = count($conbin_array);
			
			// 记录交集元素，初始化记录交集的数组为第一组数组
			$intersect_numbers = $conbin_array[0];

			for($j=0; $j<$array_counts; $j++)
			{
				echo '<div id="method_line">';
				// $conbin_array[$conbin_i] = array_merge($conbin_array[$conbin_i], $datas[$the_id + 1 + $j]);
				$conbin_array[$j] = array_unique($conbin_array[$j]);
				$same_n = count($conbin_array[$j]);
				// echo "共同元素有：".$same_n." 个。".'<br>';
				echo "此并集数组的元素有：".$same_n." 个。（具体位置ID可以在上面的输出中去查看。）".'<br>';
				
				// 输出5组数组并集里的全部元素
				// 一个变量用于适当时候换行
				$out_i = 0;
				foreach($conbin_array[$j] as $key11=>$the_number11)
				{
					echo $the_number11.',';
					if($out_i == 15){ echo '<br>';}
					++ $out_i;
				}
				 echo '<br><br>';
				$same_numbers = array_intersect($conbin_array[$j], $datas[$the_array_id]);
				$same_n = count($same_numbers);
				echo "与此组的共同元素有：".$same_n." 个。".'<br>';
				foreach($same_numbers as $key1=>$the_number)
				{
					echo $the_number.',';
				}
				echo '<br>';
				
				$same_numbers1 = array_intersect($conbin_array[$j], $datas[$the_array_id+1]);
				$same_n = count($same_numbers1);
				echo "<font style='font-size:13; color:red;'>与正在预测的下一组数组有：".$same_n." 个(有些是重复的)。</font>".'<br>';
				if($same_n == 6){ echo "这可能是本组自己——————————————————"; }
				foreach($same_numbers1 as $key2=>$the_number2)
				{
					echo $the_number2.',';
				}
				echo '<br>';
				
				echo '<div id="method_line">';
				// 元素值的个数
				// 统计数组内各个值出现过的次数
				// $values_count = array_count_values($count_this_array);
				$values_count = array_count_values($conbin_array[$j]);
				foreach($values_count as $id_key=>$count_this_array)
				{	
							// echo "差集结果：".$id_key.'--'.$count_this_array.'。<br>';
					// if($values_count[$count_this_array] >= 2)
					if($values_count[$id_key] >= 2)
					// if( is_array($count_this_array) && $values_count['0'] <= 7)
					{
							echo "差集结果   $$$$$$$$$：".$count_this_array.'。<br>';
					}
				}	
				echo '</div>';	
					
				// // 元素值的个数
				// foreach($conbin_array[$j] as $id_key=>$count_this_array)
				// {
					// // 统计数组内各个值出现过的次数
					// $values_count = array_count_values($count_this_array);
					
					// // 如果前后偏移3组中 找到0组（既是没有找到）与之有要求的相同元素个数的数组 的组数超过7组
					// // 既是还不到3组找到了与之有要求的相同元素个数的数组，就不用输出（说明像是性很低）
					// //  	-------但后期可以利用起来，因为这正说明了变化的不规律性
					// // print_r($values_count);
					// if( is_array($count_this_array) && @ $values_count[0] <= 7)
					// // if( is_array($count_this_array) && $values_count['0'] <= 7)
					// {
						// echo '<div id="method_line">';
							// echo "当前 id为：".$id_key.'。<br>';
					// }
				// }
				
				
				echo '<br><br><br>';
				echo '差集与交集综合！！！？？<br>';
				echo '<br><br>';
				echo '</div>';	
			}
			
			echo '<div id="the_magic">';
			for($j=0; $j<$array_counts; $j++)
			{
				echo '<div id="method_line">';
				// 记录交集元素，初始化记录交集的数组为第一组数组
				// $intersect_numbers = $conbin_array[$j];
				// for($i=0; $i<$array_counts; $i++)
				for($i=$j+1; $i<$array_counts; $i++)
				{
					// 记录交集元素，初始化记录交集的数组为第一组数组
					// $intersect_numbers = $conbin_array[$j];
					
					if($i != $j)
					{
						$intersect_numbers = array_intersect($conbin_array[$j], $conbin_array[$i]);
						$same_n = count($intersect_numbers);
						
						// echo "共同元素有：".$same_n." 个。".'<br>';
						echo $j.'与'.$i."共同元素有：".$same_n." 个。".'<br>';
						foreach($intersect_numbers as $key1=>$the_number)
						{
							// echo "第 ".$key2." 个符合的值： ".$value2.'<br>';
							echo $the_number.',';
						}
						
						
						if( is_array($count_this_array) && @ $values_count[0] <= 7)
						// if( is_array($count_this_array) && $values_count['0'] <= 7)
						{
						
						}
					}
					echo '<br><br>';
				}
				echo '</div>';	
			}
			echo '</div>';	
		echo '</div>';	
		
		
		
		
		// echo '<div id="the_magic">';
		echo '剔除一组不够，因为多数值出现在少数组里面，或许也可以进行差集的获取---------11,12,20是基本都出现了的，只是11没能出现而已，这已经很不错了！！！！3个就有两个';
		echo '---11,12,20是基本都出现了的，只是11没能出现而已，这已经很不错了！！！！3个就有两个';
		// echo '</div>';
		
		echo '<div id="method_line">';
		
			echo "<font style='font-size:13;'>";
			echo '总共有：'.$same_ids_count.'个满足相同元素个数的ID。<br><br>';
			echo "</font>";
			
			// 全部5组中剔除任意1-2组后的交集
			echo '全部5组中剔除任意1-2组后的交集的<br><br>';
			// foreach($conbin_array as $key=>$the_array)
			
			// 作为循环条件
			$array_counts = count($conbin_array);
			
			// $intersect_numbers = array();
			for($k=0; $k<$array_counts; $k++)
			{
				// 记录交集元素
				$intersect_numbers = $conbin_array[0];
				
				echo "剔除第".$k."组后共同元素情况".'：<br>';
				for($j=0; $j<$array_counts; $j++)
				{
					// echo 'id:'.$key.'--';
					if( $j != $k)
					{
						foreach($conbin_array[$j] as $key11=>$the_number11)
						{
							// echo "第 ".$key2." 个符合的值： ".$value2.'<br>';
							// echo 'id:'.$key.'---'.$the_number11.',';
							echo $the_number11.',';
						}
						// echo '<br><br><br><br>';
						echo '<br>';
						$intersect_numbers = array_intersect($intersect_numbers, $conbin_array[$j]);
						$same_n = count($intersect_numbers);
						
						// echo "共同元素有：".$same_n." 个。".'<br>';
						echo "共同元素有：".$same_n." 个。".'<br>';
						foreach($intersect_numbers as $key1=>$the_number)
						{
							// echo "第 ".$key2." 个符合的值： ".$value2.'<br>';
							echo $the_number.',';
						}
						// echo '<br><br>';
						echo '<br><br>';
					}
				}
				echo '<br><br><br><br>';
				
				// echo "剔除第".$k."组后共同元素有：".$same_n." 个。".'-----------------------------------------';
				// foreach($intersect_numbers as $key1=>$the_number)
				// {
					// // echo "第 ".$key2." 个符合的值： ".$value2.'<br>';
					// echo $the_number.',';
				// }
				// // echo '<br><br>';
				// echo '<br>';
			}
		echo '</div>';	
		
		
		
		
		echo '<div id="method_line">';
			echo '共有'.$same_ids_count.'处。<br>';
			foreach($conbin_array as $key=>$the_array)
			{
			echo '第'.($key+1).'处，以下是处理结果：<br>';
				foreach($the_array as $key11=>$the_number11)
				{
					// echo "第 ".$key2." 个符合的值： ".$value2.'<br>';
					// echo 'id:'.$key.'---'.$the_number11.',';
					echo $the_number11.',';
				}
				echo '<br><br><br><br>';
				$same_numbers = array_intersect($this_conbin_array, $the_array);
				$same_n = count($same_numbers);
				
				// echo "共同元素有：".$same_n." 个。".'<br>';
				echo "共同元素有：".$same_n." 个。".'<br>';
				foreach($same_numbers as $key1=>$the_number)
				{
					// echo "第 ".$key2." 个符合的值： ".$value2.'<br>';
					echo $the_number.',';
				}
				echo '<br><br>';
			}
			
			
			
		echo '</div>';
		
		
		
		echo '<div id="the_magic">';
		echo '遇到过的问题，解决。。<br>';
		echo '-----------怎么会有 -3 ？？？？是输出‘----’符号的原因。<br>';
		echo '----本组数据自己怎么不见了？因为是与自己之后的数组中找与自己有相同元素的 数组，所以没有自己<br>';
		echo '<br><br><br>';
		
		
		
		echo '结论：只是后面第5组进行交集时，综合在一起基本得到4-5个！！！！！。<br>';
		echo '结论：后面5组成功组合后进行交集时，一次基本可以得到4-5个！！！！！！！。<br><br>';
		
		echo '现在的问题：需要多进行机组测试才行-------多组验证效果明显！！！！。<br>';
		echo '---多组验证效果明显！！！！。<br><br>';
		
		echo '现在的问题：验证结果不错，可是怎么来得到这个交集呢？？，既是怎么进行预测。<br>';
		echo '----相互交集尝试-----找出都几个 5组都有的元素，，刚开始会很少，但逐次提出其中1组，逐次剔除其中2-4组，会得到一个较为一致的组合。<br>';
		echo '----刚开始会很少，但逐次提出其中1组，逐次剔除其中2-4组，会得到一个较为一致的组合。<br><br>';
		
		echo '剔除一组不够，因为多数值出现在少数组里面，或许也可以进行差集的获取---------11,12,20是基本都出现了的，只是11没能出现而已，这已经很不错了！！！！3个就有两个<br>';
		echo '---11,12,20是基本都出现了的，只是11没能出现而已，这已经很不错了！！！！3个就有两个<br><br>';
	
		
		echo '总结：既然与后面的5组间，只有1-2个重复，那么久可以排除这 其他的5组内出现的，然后综合。<br><br>';
		echo '总结：注意，各个5组 重复的数字不同，可能几个五组组合 在一起就有了 全部6个元素。<br><br>';
		echo '解决：只看当前测试的后一期或两期，看看与其他的 5组的重复，如果几乎不重复，就可以排除这出现的几个-----由所有5组的结果交集得到。<br><br>';
		echo '解决：只看当前测试的后一期或两期，看看与其他的 5组的重复，如果几个 5组的重复，组合在一起就有了这6个，则可以由此推出6个了！！！。<br><br>';
		echo '人为确定大致的奇偶比例！！！！！----------yea。<br>';
		echo '-------------确认一下组合5组是否正确----------------。<br>';
		echo '-问题：正在预测的数组的合并出错----另外：对后续的1，，1,2分别进行交集，基本都可以得出4-5个，所以交集可能会有很多元素，还是需要排除，但是可以适当增加 那些5组变成6,7,8组等---------------。<br>';
		echo '-问题：但是可以适当增加 那些5组变成6,7,8组等-，但这同时也会正价交集内元素的个数，但可以尝试一下--------------。<br>';
		echo '-阴差阳错：结合数组的 5组也只是1组而已！！！！！！！--------------。<br><br>';
		echo '下一个问题：这些组应该怎么交集才可以得到这几个元素呢？？这里是拿结果在进行交集，验证得出能够得到这几个元素而已？？？？-。<br>';
		echo '<br><br><br>';
		
		echo '</div>';
		
		
		
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