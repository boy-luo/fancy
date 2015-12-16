<!DOCTYPE html>
<!--  如果没有此声明，IE低版本将不能解释固定在两边的盒子 -->
<html>
<head>
<title>进行新方法统计2015.10.17之后</title>
<meta http-equiv="Content-type" content="text/html;charset=utf-8">
<link rel = "stylesheet" type = "text/css" href = "data.css">
<?php 
include ("conn.php");
include ("arraydirect.php");
include ("functions.php");
include ("functionsarrayget.php");
?>
</head>


<body>
思路解释：
	统计：<br>
		在各组数据和它下一组，统计各个数之后各个单个数出现的次数，借此推荐最可能在他之后出现的数有哪几个<br>
		（几个数也用这种方法？祝贺太多了）<br>
		统计各个数与它一起出现的单个数各为多少次，借此给出最可能与它一起出现的数是哪几个<br>
	综合：<br>
		把以上给出的可能那个的那些数的重复次数最多的数作为预测结果，首先是当前的数在它之后最可能出现的数，然后是在最可能出现的数中最可能一起出现的数。最终选出可能次数最多的几个数（暂定此法）<br>
	2015.10.17。<br><br>
下一步：<br>
	$MinCount<3表示最少的冷号只找3个就行(因为主要参考热号)<br>
		------>可以分析一下冷号一般是第几冷，把历史冷号的排序进行统计 找出频率最多(如一般是出现第3冷的好)，<br>
		同理，热号也进行这样的分析 <br>
		此类分析担忧：热号经常是出现第几热，<br>
		但是冷号一般出现第几冷不与其一致，就是热号是第几热的时候冷号可能不稳定 <br>
		但可以先试一下 在看看一般最热的时候一般又是第几最冷的 <br>
		还有担忧就是最热由于太多 可能有事平均 或者太热的组合太多 不那么理想<br>

-----------------------------------------------------------------------------------------------------------------------------------------------------------

<?php
$timestart=microtime();
?>
<div id="methods">
	获取历史数据，并进行以上方法的统计：<br>
	<?php
	
	// 得到核心数据表的所有数据
	$sql = "SELECT one, two, three, four, five, six, odd_even_proportion_id, odd_even_id, divide_three_id FROM data_core ";// by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
	$sql = "SELECT one, two, three, four, five, six FROM data_core ";// by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
	$result = mysql_query($sql);
	
	//初始化结果数组
	// a$i-$表示同组里$j与$i一起出现的次数
	// b$i-$表示前一组中出现$i后下一组中出现$j的次数。
	for($i=1; $i<34; ++$i){
		$k = $i;
		for($j=1; $j<34; ++$j){
			$k ++;
			if($k < 34)
			{
				$keyA = 'a-'.$i.'-'.$k;  // $i为1-32，$k为2-33，实现没有'a-1-1'.'a-2-2'....和'a-33-33',注意：1-3也是3-1。
				$count["$keyA"] = 0;
			}
			$keyB = 'b-'.$i.'-'.$j;  // $i为1-32，$j为1-33，$i使得没有'b-33-33',所有末尾补上
			$count["$keyB"] = 0;
		}
	}

	// 统计过程中，关于是统计前几组中出现的和后几种中出现的描述可能有不当，但是意思应该都是一个意思：既是某组中出现某些数字后，其下一组出现了哪些，下下一组出现了哪些，但是为了方便避免变量的定义使用的worning，可能会在代码中以当前组的前几组中出现的数的方式进行。
	//初始化
	$datas = array(0);
	$i = 0;
	$count_keys = 1700;  // 统计到$count_keys，之后的数据用于验证结果准确性，目前好像有1760组
	while($this_row = mysql_fetch_row($result))
	{
		$datas[$i] = $this_row;

		// 解释：1670之后的数据作为最后最后的验证数据，为了提高验证质量，所以不把他们进行统计，因为真正要进行预测的数据是没有的，不肯能被进行统计的。
		// a$i-$j表示同组里$j与$i一起出现的次数
		// b$i-$j表示前一组中出现$i后下一组中出现$j的次数。
		if($i<$count_keys){

			// 调整部分数据库中数据没有按从小到大排序的数组
			// 调整部分数据库中数据没有按从小到大排序的数组
			/*if($datas[$i][0]>$datas[$i][1] ||$datas[$i][3]>$datas[$i][4] || $datas[$i][0]>$datas[$i][2] || $datas[$i][2]>$datas[$i][3] || $datas[$i][0]>$datas[$i][3] || $datas[$i][1]>$datas[$i][2] || $datas[$i][1]>$datas[$i][3]){
				// $sql = "update one, two, three, four, five, six, odd_even_proportion_id, odd_even_id, divide_three_id FROM data_core ";// by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
				for($k=0; $k<5; $k++){
					for($j=$k+1; $j<6; $j++){
						if($datas[$i][$k] > $datas[$i][$j]){
							$te = $datas[$i][$k];
							$datas[$i][$k] = $datas[$i][$j];
							$datas[$i][$j] = $te;
						}
					}
				}

				$sql = "UPDATE data_core SET one=".(int) $datas[$i][0].", two=".(int) $datas[$i][1].", three=".(int) $datas[$i][2].", four=".(int) $datas[$i][3].", five=".(int) $datas[$i][4].", six=".(int) $datas[$i][5]." WHERE id=($i+1)";
				mysql_query($sql);
			}*/

			// 进行各种统计
			for($k=0; $k<6; $k++){

				// 统计在同一组中与某个数一起出现的次数
				if($k < 5)
				{
					for($j=$k+1; $j<6; $j++){
						$keyA = 'a-'.$datas[$i][$k].'-'.$datas[$i][$j];
						$count["$keyA"] ++;  // 统计同组的
					}
				}

				// 统计在某个数出现后的下一组中某个数出现的次数，如1-4
				// 并统计在当前组之后连续3组中各个数关联出现的次数，如1-22-23
				if($i >0){  // 从第2组开始才有上一组，所以才统计
					for($j=0; $j<6; $j++){

						// 统计在某个数出现后的下一组中某个数出现的次数，如1-4
						$keyB = 'b-'.$datas[$i-1][$k].'-'.$datas[$i][$j];
						$count["$keyB"] ++; 
						
						if($i >1){   // 从第3组开始才有上上一组和上一组，所以才开始统计此方法

							// 统计在当前组之前连续3组中各个数关联出现的次数，如1-22-23
							for($l=0; $l<6; $l++){
								$keyC = 'c-'.$datas[$i-2][$k].'-'.$datas[$i-1][$j].'-'.$datas[$i][$l];
								if( ! isset($count["$keyC"])){
									$count["$keyC"] = 1; 
								}else {
									$count["$keyC"] ++; 
								}

								// 再以数组的形式记录重复一次结果
								$keyC2 = 'c-'.$datas[$i-2][$k].'-'.$datas[$i-1][$j];
								$countC2["$keyC2"][$datas[$i][$l]] = $count["$keyC"];    // 用第二种方式记录统计结果

								// if($i >2){   // 从第4组开始才有上上上一组,上上一组和上一组，所以才开始统计
								// 	// 统计在当前组之后连续3组中各个数关联出现的次数，如1-22-23
								// 	for($m=0; $m<6; $m++){
								// 		$keyD = 'c-'.$datas[$i-3][$m].'-'.$datas[$i-2][$l].'-'.$datas[$i-1][$j].'-'.$datas[$i][$k];
								// 		if( ! isset($count["$keyD"])){
								// 			$count["$keyD"] = 1; 
								// 		}else {
								// 			$count["$keyD"] ++; 
								// 		}
								// 	}
								// }

							}
						}
					}
				}
			}
		}
		++$i;
	}

	// // 输出查看统计结果
	// $countAll = 0;
	// foreach ($count as $key => $value) {
	// 	$countAll += $value;         
	// 	if($value >70)  echo '大于70：'.$key.'--->'.$value."<br>";
	// 	if($value < 30)  echo  '---小于30：'.$key.'--->'.$value."<br>";
	// }

	$forecast_key = $count_keys-1;  // 对统计数组之后用于验证的数组都进验证
	while (isset($datas[$forecast_key])) {

		// 开始预测
		// 初始化一个空数组，开始结合当前数组和上一组数组进行针对下一组进行预测的权重统计(利用前两组的数据进行预测)
		$forecast = array();  // 预测结果
		for ($i=1; $i < 34; $i++) { 
			$forecast[$i] = 0;
		}

		// 定义当前组数组和上一组数组
		$current_pre = $datas[$forecast_key-1];   // 这组数据的上一组数据
		$current = $datas[$forecast_key];   // 当前的这组数据，要预测的是这组数据的下一组数据
		// 根据当前组和上一组，统计他们之后的 1-33 在这两组的数组的所有组合后出现过的次数最为权重，借此用来预测！！
		for ($i=0; $i < 6; $i++) { 
			for ($j=0; $j < 6; $j++) { 
				$key = 'c-'.$current_pre[$i].'-'.$current[$j] ;
				for ($k=1; $k < 34; $k++) { 
					$forecast[$k] += $countC2[$key][$k];
				}
			}
		}

		$forecastMax_arr = array();  // 把上面计算统计出来的依据当前两组数据得出的下一组中 1-33 的权重进行排序
		$numMax = array();   // 存放自己想要的权重排在前几的数，既是预测选取结果
		$numMin = array();   // 存放自己想要的最冷的几个数，既是预测的最冷的号码
		$MinCount = 0; // 找出最冷的$MinCount个关联
		$top = 8;  // 对$top个数进行排序
		for ($i=0; $i < $top; $i++) {  // 选出频次前$top个的数
			$tempMax = 0; // 用于寻找当前最大的数
			$tempMin = 33; // 用于寻找当前最小的数
			for ($j=0; $j < 33; $j++) {    
				// // 每次在33个数中去找出下一个最大的数
				// if ($tempMax < $forecast[$j+1] && ! in_array(($j+1), $numMax)) {
				// 	$tempMax = $forecast[$j+1].'----'.($j+1);
				// 	$tempMax_n = $j+1;
				// }
				// else 
				if ($tempMin > $forecast[$j+1] && ! in_array(($j+1), $numMin)) {
				// if ($tempMin > $forecast[$j+1] && ! in_array(($j+1), $numMin) && $MinCount<3) {
				// $MinCount<3表示最少的冷号只找3个就行(因为主要参考热号)
				// else去找次数出现最少的，即是冷号(用于结合最冷的和最热的进行判断)
					$tempMin = $forecast[$j+1].'--'.($j+1);
					$tempMin_n = $j+1;
					$MinCount ++; // 只寻找最后最小的$MinCount个数而已
				}
			}
			// $forecastMax_arr[] = $tempMax;
			// $numMax[] = $tempMax_n;  // 用于上面排序时判断是否已经被选出过
			$forecastMin_arr[] = $tempMin;
			$numMin[] = $tempMin_n;  // 用于上面排序时判断是否已经被选出过
		}

		echo "经过排序后的1-33的权重：";
		var_dump($forecastMax_arr);  // 经过排序后的1-33的权重
		// var_dump($forecastMin_arr);  // 经过排序后的1-33的权重

		// 进行交集处理，验证预测结果的准确率
		$result = array_intersect($numMax,$datas[$forecast_key +1]);

		// 查看预测结果准确率
		echo '准确率：'.count($result)."   !!!<br>";
		// echo '预测的数组下标：'.($forecast_key +1);
		// echo '验证的数组原真实数据：';
		// var_dump($datas[$forecast_key +1]);
		// echo "权重最大的前几个数：";
		// var_dump($numMax);

		$forecast_key ++;  // 进入下一组预测
	}

$n = 6;
$m = 6;
// $i = $n-1;
// $j = $m-1;
// $arr[$i][$j] = 1;
// for($i = $n-1; $i>=0; --$i){
//     for($j = $m-1; $j>=0; --$j){
    	
//         if($i = $n-1 && $j = $m-1){
//            $arr[$i][$j] = 1;
//         }else{
//         	$arr[$i][$j] = 0;
//         }

//         if($i < $n-1){
//             $arr[$i][$j] += $arr[$i+1][$j];
//         }
        
//         if($j < $m-1){
//             $arr[$i][$j] += $arr[$i][$j+1];
//         }
//         echo "$j  $i<br>";         
//     }
// }
// $i = $n-1;
// $j = $m-1;
$arr[$i][$j] = 1;
for($i = 0; $i<$n; $i++){
    // for($j = 0; $j<$m; $j++){

        if($i = $n-1 && $j = $m-1){
           $arr[$i][$j] = 1;
        }else{
        	$arr[$i][$j] = 0;
        }

        if($i < $n-1){
            $arr[$i][$j] += $arr[$i+1][$j];
        }
        
        if($j < $m-1){
            $arr[$i][$j] += $arr[$i][$j+1];
        }
        echo "$j  $i<br>";         
    // }
}
echo $arr[0][0];

	?>
</div>	

<br><br><br>

<?php
	// 运行时间
	$timeEnded=microtime();
	echo "<br><br><br>页面开始运行 的详细时间是：".$timestart."!<br>";
	echo "<br>页面运行完成 的详细时间是：".$timeEnded."!<br><br>";
	echo "页面运行运行所用时间：".($timeEnded - $timestart)."!<br><br>";
?>
body结束前
</body>
</html>