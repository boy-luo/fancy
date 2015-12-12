
<?php

//链接数据库
//include ("conn.php");

	/* 	
		输入my之后就会有全部的提示，以下是几个实例
		//影响的行数
		mysql_affected_rows();
		//插入的id
		mysql_insert_id();
		//??
		mysql_list_tables();
		mssql_num_fields();
		//列名称？？
		mssql_field_name();
		
		
	
		//数据库查询结果集的访问，处理
		echo count(mysql_num_rows($count_result)).'数据记录行的个数---------90=-0-=-0=-0<br>';
		echo count(mysql_num_fields($count_result)).'数据记录列的个数---------90=-0-=-0=-0<br>';
		
		echo count(mysql_fetch_row($count_result)).'结果的一条结果记录---------90=-0-=-0=-0<br>';
		echo count(mysql_fetch_array($count_result)).'结果的 每一行  作为一个数组---------90=-0-=-0=-0<br>';
		echo count(mysql_fetch_assoc($count_result)).'结果的一条结果记录做成一个关联数组返回---------90=-0-=-0=-0<br>';
		
		echo count(mysql_fetch_object($count_result)).'结果作为一个对象返回---------90=-0-=-0=-0<br>';
		
		
		mysql里面有自动的优化机制功能，有空可以练习了解一下
	 */	
		

/* 
函数功能表如下（倒序）：



//统计单个数据的历史出现总次数
//只可以统计二维数组
function count_one_history($arrayToCount,$numberCount)

是否出现过,验证在给定数组中
//验证在给定数组中是否出现过(如果出现过，就从给定的详细信息数组里取出来)；给定数组中有或内有
//参数：历史全部数据生成的数组，产生的随机数组，历史数据的详细信息形成的数组
function have_or_no_this_array($arrayOld,$array,$resulte)



//只要数据，便于进行各种数据操作
//正则匹配，找出数字
//把数据用正则表达式匹配成数组，参数：需要转换的字符串
//可以以参数传入正则表达式。---因为考虑到日期，期数编号等信息
//可以改进：设置读取个数---设置个数，用for循环每次只读取一个
function regular_data_array($string)


//匹配数组的全部信息，包括日期等
//正则匹配，找出数字
//把数据用正则表达式匹配成数组，参数：需要转换的字符串
//可以以参数传入正则表达式。---因为考虑到日期，期数编号等信息
//可以改进：设置读取个数---设置个数，用for循环每次只读取一个
function regularDocumentArray($string)


//遍历文件夹，输出遍历结果
function ergodicFolder($path)


//查看有哪些session成员
function sessions()


//重置session成员的值
function SetSessions()


//建立文档文件，先判断文档文件是否存在
function createTxtDocument($fileName)


//建立文件夹或文件，先判断文件夹是否存在
function createFolder($path)


//只清除文件的数据,但不删除文件
//参数为：需要清除数据的文件名称
function clearData($fileName)


//输出数组$arryde的各个下标和值
function print_foreach_key_value($arry)


//读取文件$fileName内的全部内容到一个数组，并返回数组
function readAsArry($fileName)


//读取文件$fileName内的全部内容，以字符串返回
function readDocument($fileName)


//向文件$fileName中以末尾追加的形式写入内容$content
function write($fileName,$content)


//检查文件$fileName是否存在
function checkDocument($fileName)


//遍历给定数组
function ergodic_array($string)


//实现分页输出显示的函数
function out_page_put($page,$page_size)


//统计sameN个数据相同,$diffrentN个不同的数组count5
思路：
准备工作：
	定义要找与数组数据有 几个 以上相同个数的数组--个数
	并说明要与数组的多少个数据比较
开始比较：
	循环取出每组数据，与它后面的所有数据进行比较
	初始化每组数据所找到的有相同个数满足要求的数据的数组
	循环与它后面的所有数据进行比较：
		如果不是在和最后一组数据进行比较
			则与下一组数据进行比较
			初始化与下一组数组共有的相同数据个数为0
			循环与数组的6个数据进行分别的比较
					//如不相同的个数已经超出允许的个数
					//----则（退出一层）退出与此组数据的每个数据的比较与下一组数据进行比较
					//如果是
				如果不相同
					不相同数据的个数加1，
						如不相同的个数已经超出允许的个数
							----则（退出一层）退出与此组数据的每个数据的比较
							----与下一组数据进行比较
						如果没有超出个数
							如果不是最后一个数据
								则与下一个数据进行比较
							否则
								判断是输出第几次找到合理数组
								并进行合理输出
								然后与下一组数据进行比较
				如果现在这两个正在比较的数据是相同的
					如果不是最后一个数据
						则与下一个数据进行比较
					否则
						判断是输出第几次找到合理数组
						并进行合理输出
						然后与下一组数据进行比较		

						
		欠缺：
			只是对应位置上的数据相同才能被找到
			比如
				1,3,5,8,9
				1,2,3,8,9
				这样的不会被找到
			
			没有让每一个数据
			与其它的每一个数据进行比较
			
			运行时间有待提升
			
		收获：
			找到了很多有5个相同的数据组
			当然由缺点导致还有很多没有被找到
			
			需要改进

//实现统计历史次数的函数
function same_n_statistics($page,$page_size)





*/
?>


<?php

	
function out_files_information(){
	echo "<br>";  //#6a5acd    #191970
	echo "<font color='#4b0082' size='5px'><b>上次处理到文件夹：".$_SESSION["data"]["folder"]."了!<br>";
	echo "这是第".$_SESSION["data"]["orderFolder"]."次处理数据!<br>";
	echo "正在处理文件"."中的".$_SESSION["data"]["txt"]."文档!<b></font><br>";
	echo "上一组随机数为：";
	foreach($_SESSION["randThis"] as $value)
	{
		echo $value."\t";
	}
	echo "   ！<br><br>";
}


//统计单个数据的历史出现总次数
//只可以统计二维数组
function count_one_history($arrayToCount,$numberCount){
	//每组数据统计前N个
	$N = 6;
	
	//初始化各个统计量----由于有01和1的区别，所以总的数据个数要多9个
	// /*
	//初始化1-33的频次初始值
	for($j=1; $j<34; $j++){
		$countsOne[$j]=0;
	}
	
	//初始化01-09的频次初始值
	for($j=1; $j<10; $j++){
		$countsOne["0".$j]=0;
	}
	
	// */
	//定义一个变量用于接受并传递每个数据
	$element=0;
	
	/*
	echo 'csdn-]]]]-'.$arrayToCount[0][1].'<br>';
	echo 'csdn---'.$arrayToCount[0][2].'<br>';
	echo 'csdn---'.$arrayToCount[0][3].'<br>';
	echo '----]]]-'.$arrayToCount[1][0].'<br>';
	echo '----]]]-'.$arrayToCount[1][1].'<br><br><br>';
	*/
	
	//for($j=0; $j<count($arrayCount); $j++){
	foreach($arrayToCount as $key=>$value)
	{
		//echo $key."键值<br>";
		//echo $value[1]." ".$value[2]."值<br>";
		//echo "<br>";
		//与每个数组的$N个元素进行比较
		/*
		for($i=0; $i<$N; $i++)
		{
			//$arrayToCount[$i];
			//定义一个变量用于接受并传递每个数据
			$element=$value[$i];
			//echo 'cs---'.$value[$i].'<br>';
			//echo $value[1]."值<br>";
		}
		*/
		//echo '结束---'.'<br>';
		for($i=0; $i<$N; $i++)
		{
			//$arrayToCount[$i];
			//定义一个变量用于接受并传递每个数据
			$element=$value[$i];
			//echo 'cs---'.$value[$i].'<br>';
			//echo 'csdn---'.$element.'<br>';
			++$countsOne[$element];
			//echo $value[1]."值<br>";
		}
	}
	
	//合并01-09和1-9的统计结果，然后清空01-09的统计值
	for($j=1; $j<10; $j++){
		$countsOne[$j] += $countsOne["0".$j];
		$countsOne["0".$j] = 0;
	}
	return $countsOne;
}


//验证在给定中是否出现过(如果出现过，
//就从给定的详细信息数组里取出来)；给定数组中有或内有
//参数：(二维数组)历史全部数据生成的数组，
//(一维数组)产生的随机数组，(一维数组)历史数据的详细信息形成的数组
function have_or_no_this_array($arrayOld,$array,$resulteArrayFrom){
	//echo $resulteArrayFrom;
	$valueReturn = "比较结果为：";
	//foreach($string as $key=>$value){

	//每次循环N次比较，然后行数++，再重复进行比较就好了
	$N=count($array);
	
	//记录历史中重复出现的次数
	$sameCount=0;
	for($j=0; $j<count($arrayOld); $j++){
	//foreach($string as $key=>$value){
	
		//与每个数组的$N个元素进行比较
		for($i=0; $i<$N; $i++){
			/* if($k>=count($nowArray)){
				//echo "总数据条数(即是数组数)：".count($nowArray)."<br>";
				break 1;
			} */
			
			//先判断结束，或判断是否进行下一次
			if($arrayOld[$j][$i] != $array[$i])
			{	
				//进入与下一行的比较
				break 1;
				//echo "两组数据不等！<br>";
				
				//因为for里面$i会++，所以$i此处赋值-1。
				//$i=-1;
				//$k++;
				//continue;
			}else if($i<$N-1){
				//echo $i."进行下一次比较！<br>";
				continue;
			}else{
			
				//统计出现相同的次数
				$sameCount++;
				
				//把出现过的历史记录保存下来，后面作为参数返回
				$valueReturn .= "下标：".($j+1)."---".$resulteArrayFrom[$j+1]."<br>";
				
				//进入与下一行的比较
				break 1;
				
				//遍历输出整行的所有元素，即是详细信息
				//注意：$resultArry是主界面的全局数组，存放着所有的行数据
				//echo $resultArry[$j]."\t 和<br>".$resultArry[$k]."\t 是相同的<br><br>";
				//$i=-1;
				//$k++;
				//continue;
			}
		}
	}
	$valueReturn .= "出现过的次数为：".$sameCount."次!<br>";
	return $valueReturn;
}
?>


<?php

//实现统计历史次数的函数
//参数：进行统计的数组，给出满足要求的数组的详细信息的数组，
//每个数组元素有几个数据元素，需要统计有几个相同数据的数组
function same_n_statistics($nowArray,$arrayMesage,$N,$sameElements){
	echo "统计有 $sameElements 个以上的数据相同的数组.<br>";
	$sameN = $sameElements;
	$diffrentN = $N-$sameN;
	
	//每组数据有$N个数据元素
	
	//用一个变量，避免在for里面每次都对数组进行元素个数的统计
	$ArrayElements=count($nowArray);
	// $ArrayElements=900;
	for($j=0; $j<$ArrayElements; $j++){
		
		//第几行的1-6个数据与后面所有行的1-6个数据比较
		$k = $j;
		
		//为了避免首次计数时出现未定义情况，
		//所以定义一个每组数据找到的满足要求的
		//数据个数的数组个数的公用计数器
		$thisEchoTime = 0;
		
		//for($k=0; $k<count($nowArray); $k++){
		while($k<$ArrayElements-1){
			$k++;
			//用于记录与每组数据的不同数据的个数
			//用于判断是否超出了允许的不同数据的个数
			$thisDiffrent = 0;
			//比较每个数组的$N（6）个元素
			for($i=0; $i<$N; $i++){
				//if($thisDiffrent>$diffrentN || $k>=count($nowArray)){
				//如果与本组数据的不同数据量已经超出了
				//则与下一组数据进行比较。
				/*
				可以注释 2个
					if($thisDiffrent>$diffrentN){
					//echo "总数据条数(即是数组数)：".count($nowArray)."<br>";
					//$k++;
					//continue;
					break 1;
				}
				
				//这一组的比较结束了，进行下一组的比较
				if($k>=count($nowArray)){
					//echo "总数据条数(即是数组数)：".count($nowArray)."<br>";
					//$k++;
					//continue;
					break 2;
				}
				*/

				//如果正在比较的两个数据不相同
				//先判断是结束一层循环，还是进行下一次比较
				if($nowArray[$j][$i] != $nowArray[$k][$i])
				{
					$thisDiffrent++;
					
					//如果已经有超出允许的不同数据的个数，
					//则与下一组数据进行比较
					if($thisDiffrent > $diffrentN)
					{
						break 1;
					
					//如果没有超出允许的数据的个数
					}else{
						
						//如果比较的不是第六个
						//则继续与下一组数据进行比较
						if($i < $N-1){
							continue;
						
						//否则就是第6个数据了，
						//依之前的判断是已经有符合要求的相同的数据个数了
						//则进行相同组数的统计与判断
						}else{
						
							//用于统计输出次数的变量
							++$thisEchoTime;
							
							//如果是第一次输出，
							//说明是目前的唯一一组符合相同个数要求的数据
							//否则说明不止找到了此一组数据符合要求，之前已经有了
							if($thisEchoTime==1){
								$sameCount[$j] = 2;
								
								//遍历输出整行的所有元素，即是详细信息
								//echo $arrayMesage[$j]."\t <br>--------和<br>".$arrayMesage[$k]."\t 有".($N-$thisDiffrent)."个是相同的数据。<br>";
								echo "<br><br><br>下面一组找到了有".($N - $diffrentN)."个相同数据的：<br>".$arrayMesage[$j]."<br>".$arrayMesage[$k]."<br>";
								write($_SESSION["data"]["txt"],"\r\r\r <br>下面一组找到了有".($N - $diffrentN)."个相同数据的：\r <br>".$arrayMesage[$j]."\r <br>".$arrayMesage[$k]."\r <br>");
							}else{
								$sameCount[$j] ++;
								echo $arrayMesage[$k]."<br>";
								write($_SESSION["data"]["txt"],$arrayMesage[$k]."\r <br>");
							}
							break 1;
						}
					}
				
				//如果正在比较的两个数据相同
				}else{
					if($i < $N-1){
						
						//echo $i."进行下一次比较！<br>";
						continue;
					}else{
						
						//用于统计输出次数的变量
						++$thisEchoTime;
						
						//统计出现相同的次数（缺点：会被反复统计，因为统计后没有没替换）
						if($thisEchoTime==1){
							$sameCount[$j] = 2;
							
							//遍历输出整行的所有元素，即是详细信息
							echo "<br><br><br>下面一组找到了有".($N - $diffrentN)."个相同数据的：<br>".$arrayMesage[$j]."<br>".$arrayMesage[$k]."<br>";
							
							//保存所有的产生的数据，
							//用于以后分析检查可靠性
							write($_SESSION["data"]["txt"],"\r\r\r <br>下面一组找到了有".($N - $diffrentN)."个相同数据的：\r <br>".$arrayMesage[$j]."\r <br>".$arrayMesage[$k]."\r <br>");
						}else{
							$sameCount[$j] ++;
							//echo "\t <br>--------和<br>".$arrayMesage[$k]."\t 有".($N-$thisDiffrent)."个是相同的<br>";
							echo $arrayMesage[$k]."<br>";
							
							//保存所有的产生的数据，
							//用于以后分析检查可靠性
							write($_SESSION["data"]["txt"],$arrayMesage[$k]."\r <br>");
							
							/*
							//写入文件数据---写入之后注释以备下次更新数据时需要重新写入内容时再次使用
							if($j == $N-1){
							//write($_SESSION["data"]["txt"],"\n");
							write($_SESSION["data"]["txt"],"\n".$resultArry[$j]);
						
							}else{
							//写到文件中去
							write($_SESSION["data"]["txt"],$resultArry[$j]."\t");
							//write($fileName,$content);
							}
							*/
							//写到文件中去
							//write($_SESSION["data"]["txt"],$resultArry[$j]."\t");
							//write($_SESSION["data"]["txt"],$arrayMesage[$k]."<br> \t");

						}
						
						//跳出一层循环，进行与下一组数据进行比较
						break 1;
					}
				}
			}
		}
	}
	//因为是最后一组数据的统计，所以必定为0，返回值页没有用
	// return $sameCount;
}


//统计各个数字历史出现时的id，并把重要信息存入数据库
// 需要改变的地方：
// 函数里的数据表名称1_3，正在统计的数字
// function get_num_appear_id_interval---($num){
function get_num_appear_id_interval($num){
	
	/* // $sql = "SELECT one, two, three, four, five, six FROM method_odd_even WHERE id = $i ";// by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
	$sql = "SELECT one, two, three, four, five, six FROM method_odd_even ";// by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
	// foreach($row as $key=>$value){
			
		// }
	}
	 */
	 
	//正在处理的数字
	// $num = 1;
	
	//查询结果是以数字下标建立的数字
	// $sql = "select * from data_core";
	// $sql = "SELECT id, one, two, three, four, five, six, odd_even_id, odd_even_proportion_id, divide_three_id FROM data_core where ,,,||,||,||";// by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
	$sql = "SELECT id, one, two, three, four, five, six, odd_even_id, odd_even_proportion_id, divide_three_id FROM data_core ";// by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
	
	/* // $sql = "INSERT INTO 1_3 (id, appear_id, count, one, two, three, four, five, six) VALUES ('', ".$j.', 1,'.$nowArray[$j][0].', '.$nowArray[$j][1].', '.$nowArray[$j][2].', '.$nowArray[$j][3].', '.$nowArray[$j][4].', '.$nowArray[$j][5].")";
	// $sql = "INSERT INTO 1_3 (id, num, appear_id, this_interval, odd_even_id, odd_even_proportion_id, divide_three_id) VALUES ('', ".$num.', '.$row['id'].', '.$this_interval.', '.$row['odd_even_id'].', '.$row['odd_even_proportion_id'].', '.$row['divide_three_id'].', '.$row[].', '.$row[].")";
	$sql = "INSERT INTO 1_3 (id, num, appear_id, this_interval, odd_even_id, odd_even_proportion_id, divide_three_id) VALUES ('', ".$num.', '.$row['id'].', '.$this_interval.', '.$row['odd_even_id'].', '.$row['odd_even_proportion_id'].', '.$row['divide_three_id'].")";
	 */
	$result = mysql_query($sql);
	
	//记录上一组数组的编号
	$pre_id = 1;
	
	//记录间隔期数
	$this_interval = 0;
	$this_id = 0;
	
	$i = 0;
	while($this_row = mysql_fetch_row($result))
	// while( $row = mysql_fetch_array($result))
	{
		$row = $this_row;
		// while($i<25)
		// {
		// $row = mysql_fetch_array($result);
		// echo '678687<br>';
		// $row = mysql_fetch_row($result);
		// $i ++;
		
		//记录当前组数组的编号
		$this_id = $row[0];
		// //echo '-00-=-9800====='.$row.'<br>';
		// // if(in_array($num, $row))
		// if($num == $row['one'] || $num == $row['two'] || $num == $row['three'] || $num == $row['four'] || $num == $row['five'] || $num == $row['six'])
		
			// echo '-=-=-=-';
		//判断是否有这个数
		if($num == $row[1] || $num == $row[2] || $num == $row[3] || $num == $row[4] || $num == $row[5] || $num == $row[6])
		{
			//计算间隔期数
			$this_interval = $this_id - $pre_id;
			// $pre_id = $row['id'];
			
			//更新记录作为下一组数组的‘上一组数组的编号’
			$pre_id = $this_id;
			if($this_interval < 8)
			{
				echo $num."：".$this_id."--间隔：".$this_interval."<br>";
			
			}else if($this_interval > 15){
				echo "<br><br>";
				echo "<font style='color:red;'>".$num."：".$this_id."--间隔：".$this_interval."</font><br>";
				// '奇偶比：'.$row[8].'奇偶奇：'.$row[7].'除3余：'.$row[9]."</font><br>";
			
			}else{
				echo "<br><br>";
				echo "<font style='color:blue;'>".$num."：".$this_id."--间隔：".$this_interval."</font><br>";
				// '奇偶比：'.$row[8].'奇偶奇：'.$row[7].'除3余：'.$row[9]."</font><br>";
			
			}
			//存入对应的数据表
			// $sql = "INSERT INTO 1_3 (id, appear_id, count, one, two, three, four, five, six) VALUES ('', ".$j.', 1,'.$nowArray[$j][0].', '.$nowArray[$j][1].', '.$nowArray[$j][2].', '.$nowArray[$j][3].', '.$nowArray[$j][4].', '.$nowArray[$j][5].")";
			// $sql = "INSERT INTO 1_3 (id, num, appear_id, this_interval, odd_even_id, odd_even_proportion_id, divide_three_id) VALUES ('', ".$num.', '.$row['id'].', '.$this_interval.', '.$row['odd_even_id'].', '.$row['odd_even_proportion_id'].', '.$row['divide_three_id'].', '.$row[].', '.$row[].")";
			// $sql = "INSERT INTO 1_3 (id, num, appear_id, this_interval, odd_even_id, odd_even_proportion_id, divide_three_id, one, two, three, four, five, six) VALUES ('', ".$num.', '.$row['id'].', '.$this_interval.', '.$row['odd_even_id'].', '.$row['odd_even_proportion_id'].', '.$row['divide_three_id'].")";
			// $sql = "INSERT INTO 1_3 (id, num, appear_id, one, two, three, four, five, six, this_interval, odd_even_id, odd_even_proportion_id, divide_three_id) VALUES ('', ".$num.', '.$row[0].", $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], ".$this_interval.', '.$row[7].', '.$row[8].', '.$row[9].")";
			
			
			// $sql = "INSERT INTO 1_3 (id, num, appear_id, one, two, three, four, five, six, this_interval, odd_even_id, odd_even_proportion_id, divide_three_id) VALUES ('', ".$num.', '.$row[0].", $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], ".$this_interval.', '.$row[7].', '.$row[8].', '.$row[9].")";
			// echo $sql;
			// $result = mysql_query($sql);
			
			
			// $sql = "INSERT INTO 1_3 (id, num, appear_id, one, two, three, four, five, six) VALUES ('', ".$num.', '.$row[0].", $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], ".$this_interval.")";
			// echo $sql;
			// $result = mysql_query($sql);
			// echo '-=-=-=-';
		}
			// echo '-=-=-=-';
		
		//输出测试
		// echo count($row)."<br>";
		// echo $row[0]."<br>";
		// echo $row[1]."<br>";
		// echo $row[2]."<br><br>";
		
		//测试
		// echo $i."<br><br>";
		// $i ++;
		
		// foreach($row as $key=>$value){
			// //$valueReturn .= $value." ";
			// //echo $key."----";
			// //echo $value."\t";
			// echo $key.'-->'.$value."<br>";
		// }
	}
}
	
	

// -------------此函数未用----未实现功能
//统计各个数字历史出现时的id，并把重要信息输出：数字，ID，间隔，奇偶情况等方法的信息
// 需要改变的地方：
// 正在统计的数字
// -------------此函数未用----未实现功能
function get_num_appear_infors($num){
	
	//正在处理的数字
	// $num = 1;
	
	//查询结果是以数字下标建立的数字
	// $sql = "select * from data_core";
	// $sql = "SELECT id, one, two, three, four, five, six, odd_even_id, odd_even_proportion_id, divide_three_id FROM data_core where ,,,||,||,||";// by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
	$sql = "SELECT id, one, two, three, four, five, six, odd_even_id, odd_even_proportion_id, divide_three_id FROM data_core ";// by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
	
	/* // $sql = "INSERT INTO 1_3 (id, appear_id, count, one, two, three, four, five, six) VALUES ('', ".$j.', 1,'.$nowArray[$j][0].', '.$nowArray[$j][1].', '.$nowArray[$j][2].', '.$nowArray[$j][3].', '.$nowArray[$j][4].', '.$nowArray[$j][5].")";
	// $sql = "INSERT INTO 1_3 (id, num, appear_id, this_interval, odd_even_id, odd_even_proportion_id, divide_three_id) VALUES ('', ".$num.', '.$row['id'].', '.$this_interval.', '.$row['odd_even_id'].', '.$row['odd_even_proportion_id'].', '.$row['divide_three_id'].', '.$row[].', '.$row[].")";
	$sql = "INSERT INTO 1_3 (id, num, appear_id, this_interval, odd_even_id, odd_even_proportion_id, divide_three_id) VALUES ('', ".$num.', '.$row['id'].', '.$this_interval.', '.$row['odd_even_id'].', '.$row['odd_even_proportion_id'].', '.$row['divide_three_id'].")";
	 */
	$result = mysql_query($sql);
	
	//获取奇偶比例的全部方法
	// $sql = "SELECT id, one, two, three, four, five, six, odd_even_id, odd_even_proportion_id, divide_three_id FROM data_core ";// by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
	// $sql = "SELECT odd_count FROM method_odd_even_proportion ";// by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
	// $result = mysql_query($sql);
	
	// // 获取奇偶奇的全部方法
	// // $sql = "SELECT id, one, two, three, four, five, six, odd_even_id, odd_even_proportion_id, divide_three_id FROM data_core ";// by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
	// $sql = "SELECT one, two, three, four, five, six FROM method_odd_even ";// by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
	// $result = mysql_query($sql);
	
	// // 获取除3余的全部方法
	// // $sql = "SELECT id, one, two, three, four, five, six, odd_even_id, odd_even_proportion_id, divide_three_id FROM data_core ";// by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
	// $sql = "SELECT one, two, three, four, five, six FROM method_divide_three ";// by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
	// $result = mysql_query($sql);
	
	//记录上一组数组的编号
	$pre_id = 1;
	
	//记录间隔期数
	$this_interval = 0;
	$this_id = 0;
	
	$i = 0;
	while($this_row = mysql_fetch_row($result))
	// while( $row = mysql_fetch_array($result))
	{
		$row = $this_row;
		// while($i<25)
		// {
		// $row = mysql_fetch_array($result);
		// echo '678687<br>';
		// $row = mysql_fetch_row($result);
		// $i ++;
		
		//记录当前组数组的编号
		$this_id = $row[0];
		// //echo '-00-=-9800====='.$row.'<br>';
		// // if(in_array($num, $row))
		// if($num == $row['one'] || $num == $row['two'] || $num == $row['three'] || $num == $row['four'] || $num == $row['five'] || $num == $row['six'])
		
			// echo '-=-=-=-';
		//判断是否有这个数
		if($num == $row[1] || $num == $row[2] || $num == $row[3] || $num == $row[4] || $num == $row[5] || $num == $row[6])
		{
			//计算间隔期数
			$this_interval = $this_id - $pre_id;
			// $pre_id = $row['id'];
			
			//更新记录作为下一组数组的‘上一组数组的编号’
			$pre_id = $this_id;
			if($this_interval < 8)
			{
				echo $num."：".$this_id."--间隔：".$this_interval."<br>";
			
			}else if($this_interval > 15){
				echo "<br><br>";
				echo "<font style='color:red;'>".$num."：".$this_id."--间隔：".$this_interval.
				'奇偶比：'.$row[8].'奇偶奇：'.$row[7].'除3余：'.$row[9]."</font><br>";
			
			}else{
				echo "<br><br>";
				echo "<font style='color:blue;'>".$num."：".$this_id."--间隔：".$this_interval.
				'奇偶比：'.$row[8].'奇偶奇：'.$row[7].'除3余：'.$row[9]."</font><br>";
			
			}
			//存入对应的数据表
			// $sql = "INSERT INTO 1_3 (id, appear_id, count, one, two, three, four, five, six) VALUES ('', ".$j.', 1,'.$nowArray[$j][0].', '.$nowArray[$j][1].', '.$nowArray[$j][2].', '.$nowArray[$j][3].', '.$nowArray[$j][4].', '.$nowArray[$j][5].")";
			// $sql = "INSERT INTO 1_3 (id, num, appear_id, this_interval, odd_even_id, odd_even_proportion_id, divide_three_id) VALUES ('', ".$num.', '.$row['id'].', '.$this_interval.', '.$row['odd_even_id'].', '.$row['odd_even_proportion_id'].', '.$row['divide_three_id'].', '.$row[].', '.$row[].")";
			// $sql = "INSERT INTO 1_3 (id, num, appear_id, this_interval, odd_even_id, odd_even_proportion_id, divide_three_id, one, two, three, four, five, six) VALUES ('', ".$num.', '.$row['id'].', '.$this_interval.', '.$row['odd_even_id'].', '.$row['odd_even_proportion_id'].', '.$row['divide_three_id'].")";
			// $sql = "INSERT INTO 1_3 (id, num, appear_id, one, two, three, four, five, six, this_interval, odd_even_id, odd_even_proportion_id, divide_three_id) VALUES ('', ".$num.', '.$row[0].", $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], ".$this_interval.', '.$row[7].', '.$row[8].', '.$row[9].")";
			
			
			// $sql = "INSERT INTO 1_3 (id, num, appear_id, one, two, three, four, five, six, this_interval, odd_even_id, odd_even_proportion_id, divide_three_id) VALUES ('', ".$num.', '.$row[0].", $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], ".$this_interval.', '.$row[7].', '.$row[8].', '.$row[9].")";
			// echo $sql;
			// $result = mysql_query($sql);
			
			
			// $sql = "INSERT INTO 1_3 (id, num, appear_id, one, two, three, four, five, six) VALUES ('', ".$num.', '.$row[0].", $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], ".$this_interval.")";
			// echo $sql;
			// $result = mysql_query($sql);
			// echo '-=-=-=-';
		}
			// echo '-=-=-=-';
		
		//输出测试
		// echo count($row)."<br>";
		// echo $row[0]."<br>";
		// echo $row[1]."<br>";
		// echo $row[2]."<br><br>";
		
		//测试
		// echo $i."<br><br>";
		// $i ++;
		
		// foreach($row as $key=>$value){
			// //$valueReturn .= $value." ";
			// //echo $key."----";
			// //echo $value."\t";
			// echo $key.'-->'.$value."<br>";
		// }
	}
}
	
	

//统计各个数字历史出现时的id，并把重要信息存入数据库
// 需要改变的地方：
// 函数里的数据表名称1_3，正在统计的数字
function num_appear_id_infor_core($num){
	
	/* // $sql = "SELECT one, two, three, four, five, six FROM method_odd_even WHERE id = $i ";// by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
	$sql = "SELECT one, two, three, four, five, six FROM method_odd_even ";// by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
	// foreach($row as $key=>$value){
			
		// }
	}
	 */
	 
	//正在处理的数字
	// $num = 1;
	
	//查询结果是以数字下标建立的数字
	// $sql = "select * from data_core";
	// $sql = "SELECT id, one, two, three, four, five, six, odd_even_id, odd_even_proportion_id, divide_three_id FROM data_core where ,,,||,||,||";// by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
	$sql = "SELECT id, one, two, three, four, five, six, odd_even_id, odd_even_proportion_id, divide_three_id FROM data_core ";// by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
	
	/* // $sql = "INSERT INTO 1_3 (id, appear_id, count, one, two, three, four, five, six) VALUES ('', ".$j.', 1,'.$nowArray[$j][0].', '.$nowArray[$j][1].', '.$nowArray[$j][2].', '.$nowArray[$j][3].', '.$nowArray[$j][4].', '.$nowArray[$j][5].")";
	// $sql = "INSERT INTO 1_3 (id, num, appear_id, this_interval, odd_even_id, odd_even_proportion_id, divide_three_id) VALUES ('', ".$num.', '.$row['id'].', '.$this_interval.', '.$row['odd_even_id'].', '.$row['odd_even_proportion_id'].', '.$row['divide_three_id'].', '.$row[].', '.$row[].")";
	$sql = "INSERT INTO 1_3 (id, num, appear_id, this_interval, odd_even_id, odd_even_proportion_id, divide_three_id) VALUES ('', ".$num.', '.$row['id'].', '.$this_interval.', '.$row['odd_even_id'].', '.$row['odd_even_proportion_id'].', '.$row['divide_three_id'].")";
	 */
	$result = mysql_query($sql);
	// echo count($result)."<br>";
	// echo mysql_num_rows($result).'数据记录行的个数---------90=-0-=-0=-0<br>';
	
	//记录上一组数组的编号
	$pre_id = 1;
	
	//记录间隔期数
	$this_interval = 0;
	$this_id = 0;
	
	$i = 0;
	while($this_row = mysql_fetch_row($result))
	// while( $row = mysql_fetch_array($result))
	{
		$row = $this_row;
		// while($i<25)
		// {
		// $row = mysql_fetch_array($result);
		// echo '678687<br>';
		// $row = mysql_fetch_row($result);
		
		
		//记录当前组数组的编号
		$this_id = $row[0];
		// //echo '-00-=-9800====='.$row.'<br>';
		// // if(in_array($num, $row))
		// if($num == $row['one'] || $num == $row['two'] || $num == $row['three'] || $num == $row['four'] || $num == $row['five'] || $num == $row['six'])
		
			// echo '-=-=-=-';
		//判断是否有这个数
		if($num == $row[1] || $num == $row[2] || $num == $row[3] || $num == $row[4] || $num == $row[5] || $num == $row[6])
		{
			//计算间隔期数
			$this_interval = $this_id - $pre_id - 1;
			// $pre_id = $row['id'];
			
			//更新记录作为下一组数组的‘上一组数组的编号’
			$pre_id = $this_id;
			if($this_interval < 8)
			{
				// echo $num."：".$this_id."-间隔：".$this_interval."<br>";
				echo $num.""."间隔：".$this_interval."<br>";
			
			}else if($this_interval > 15){
				echo "<br><br>";
				// echo "<font style='color:red;'>".$num."：".$this_id."-间隔：".$this_interval."</font><br>";
				echo "<font style='color:red;'>".$num.""."间隔：".$this_interval."</font><br>";
			
			}else{
				echo "<br><br>";
				// echo "<font style='color:blue;'>".$num."：".$this_id."-间隔：".$this_interval."</font><br>";
				echo "<font style='color:blue;'>".$num.""."间隔：".$this_interval."</font><br>";
			
			}
			//存入对应的数据表
			// $sql = "INSERT INTO 1_3 (id, appear_id, count, one, two, three, four, five, six) VALUES ('', ".$j.', 1,'.$nowArray[$j][0].', '.$nowArray[$j][1].', '.$nowArray[$j][2].', '.$nowArray[$j][3].', '.$nowArray[$j][4].', '.$nowArray[$j][5].")";
			// $sql = "INSERT INTO 1_3 (id, num, appear_id, this_interval, odd_even_id, odd_even_proportion_id, divide_three_id) VALUES ('', ".$num.', '.$row['id'].', '.$this_interval.', '.$row['odd_even_id'].', '.$row['odd_even_proportion_id'].', '.$row['divide_three_id'].', '.$row[].', '.$row[].")";
			// $sql = "INSERT INTO 1_3 (id, num, appear_id, this_interval, odd_even_id, odd_even_proportion_id, divide_three_id, one, two, three, four, five, six) VALUES ('', ".$num.', '.$row['id'].', '.$this_interval.', '.$row['odd_even_id'].', '.$row['odd_even_proportion_id'].', '.$row['divide_three_id'].")";
			// $sql = "INSERT INTO 1_3 (id, num, appear_id, one, two, three, four, five, six, this_interval, odd_even_id, odd_even_proportion_id, divide_three_id) VALUES ('', ".$num.', '.$row[0].", $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], ".$this_interval.', '.$row[7].', '.$row[8].', '.$row[9].")";
			
			
			// $sql = "INSERT INTO 1_3 (id, num, appear_id, one, two, three, four, five, six, this_interval, odd_even_id, odd_even_proportion_id, divide_three_id) VALUES ('', ".$num.', '.$row[0].", $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], ".$this_interval.', '.$row[7].', '.$row[8].', '.$row[9].")";
			// echo $sql;
			// $result = mysql_query($sql);
			
			
			// $sql = "INSERT INTO 1_3 (id, num, appear_id, one, two, three, four, five, six) VALUES ('', ".$num.', '.$row[0].", $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], ".$this_interval.")";
			// echo $sql;
			// $result = mysql_query($sql);
			// echo '-=-=-=-';
		}else if($i == mysql_num_rows($result)-1){
			
			//计算间隔期数
			$this_interval = $this_id - $pre_id;
			echo "<font style='color:green;'>"."最后这".$this_interval."次没出</font><br>";
			
		}
		++ $i;
	}
}


/* 
	输出简洁的单个数字的所有历史间隔进行分析，
	并返回数组
	2015.7.14
 */
function num_appear_interval($num){
	$sql = "SELECT id, one, two, three, four, five, six, odd_even_id, odd_even_proportion_id, divide_three_id FROM data_core ";// by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
	$result = mysql_query($sql);
	$pre_id = 1;    //记录上一组数组的编号
	$this_interval = 0;  //记录间隔期数
	$this_id = 0;
	
	echo $num.""."的出现间隔分析："."<br>";
	$i = 0;
	$interval_i = 0;
	while($this_row = mysql_fetch_row($result))
	{
		$row = $this_row;
		//记录当前组数组的编号
		$this_id = $row[0];
		
		//判断是否有这个数
		if($num == $row[1] || $num == $row[2] || $num == $row[3] || $num == $row[4] || $num == $row[5] || $num == $row[6])
		{
			//计算间隔期数
			$interval[$this_id]['interval'] = $this_id - $pre_id - 1;  // 用于作为数组进行后续其他的操作
			$interval_list[]=array('id'=>$this_id, 'interval'=>$interval[$this_id]['interval']);
			
			$this_interval = $this_id - $pre_id - 1;
			
			//更新记录作为下一组数组的‘上一组数组的编号’
			$pre_id = $this_id;
			if($this_interval < 8)
			{
				echo "".$this_interval."<br>";
			}else if($this_interval > 15){
				echo "<br><br>";
				echo "<font style='color:red;'>"."".$this_interval."</font><br>";
			}else{
				echo "<br><br>";
				echo "<font style='color:blue;'>"."".$this_interval."</font><br>";
			}
		}else if($i == mysql_num_rows($result)-1){
			
			//计算间隔期数
			$interval[$this_id]['interval'] = $this_id - $pre_id - 1;  // 用于作为数组进行后续其他的操作
			$interval_list[]=array('id'=>$this_id, 'interval'=>$interval[$this_id]['interval']);
			
			//计算间隔期数
			$this_interval = $this_id - $pre_id;
			echo "<font style='color:green;'>"." ".$this_interval."次没出</font><br>";
		}
		++ $interval_i;
		++ $i;
	}
	$interval['list'] = $interval_list;
	return $interval;
}

/* 
	给定id和间隔的数组，一个当前的id和当前这个数字的间隔，返回与本次间隔相同的地方的id和间隔。
	参数：整个所有数据的数组 $interval_arr--二维，当前组的数据 $current_interval--一维，数组二维的键值 $key--变量
	2015.7.16
*/
function same_interval($interval_arr,$current_interval, $key){
	$same_inter = array();
	$same_i = 0;
	
	$intervals = $interval_arr['list'];  // 为了能查看前4次的间隔次数情况，专门记录了一个
	$inter_list_id = 0;   // 作为下标
	
	foreach($interval_arr as $the_id=>$value){
		// if($value['interval'] == $current_interval['interval']){
		if($value[$key] == $current_interval[$key]){
			// $same_inter['same_like'] = ''
			$same_inter[$the_id][$key] = $value[$key];   // 返回与当前正在处理的数组
			
			$same_inter[$same_i][$key] = $value[$key];   // 用于前4组的比较
			$same_i ++;
			echo "".$the_id."<br>";
			
			// if($inter_list_id > 5){
				echo $same_inter[$the_id][$key].'-';
				for($i=1; $i<5; $i++) // 输出各处前4次的情况进行查看
				{
					echo $intervals[$inter_list_id-$i][$key].'-';
				}
				echo "<br>";
			// }
			$inter_list_id ++;
		}
	}
	
			// for($i=1; $i<5; $i++) // 输出各处前4次的情况进行查看
			// {
				// echo $interval_arr[$current_interval['id']-$i][$key].'<br>';
			// }
			// echo '----<br><br>';
			
	// foreach($same_inter as $the_id=>$value){
		// echo '#'.$the_id.'--'.$value[$key];
	// }
	return $same_inter;
}

/* 
	给定历史间隔与此次间隔相同的数组，总结历史各处与本次间隔相同的地方的之前4组的间隔情况，
	是否与此次的对应的前4组间隔是否相似
	参数：当前数字的所有历史间隔的数组，历史间隔相同的id数组--二维，当前正在预测的组的id和间隔--一维，数组的二维的键值名称--变量。
	2015.7.17
 */
function same_like_interval($interval_arr, $same_interval_arr,$current_interval, $key){
	$same_inter = array();
	// foreach($same_interval_arr as $the_id=>$value){
		// echo '<br>'.$the_id.'--'.$value[$key];
	// }
	foreach($same_interval_arr as $the_id=>$value){
		$same_count = 0;
		for($i=1; $i<5; $i++)
		{
			echo $interval_arr[$the_id-$i][$key].'-'.$interval_arr[($current_interval['id']-$i)][$key].'<br>';
			// echo $interval_arr[($current_interval['id']-$i)][$key].'<br>';
			if($interval_arr[$the_id-$i][$key] == $interval_arr[($current_interval['id']-$i)][$key]){
				$same_count ++;
			}
			$interval_str .=  $interval_arr[($current_interval['id']-$i)][$key];
		}
		echo $same_count;
		if($same_count > 2){
			// echo $same_count;
			$same_like_inter_count['same'][$the_id][$key] = $value[$key];
			$same_like_inter_count['same_string'] .= $value[$key].'<br>';  // 拼接字符串用于视图输出到一个盒子查看
			
		}else if($same_count == 2){
			$same_like_inter_count['like'][$the_id][$key] = $value[$key];
			$same_like_inter_count['like_string'] .= $value[$key].'<br>';
		}else if($same_count < 2){
			$same_like_inter_count['different'][$the_id][$key] = $value[$key];
			$same_like_inter_count['different_string'] .= $value[$key].'<br>';
		}
	}
	
	return $same_like_inter_count;
}
	

// ---------------修改函数内部制定的相同的个数，和函数里的数据表名称（当计算量太大时还需要修改循环条件，分次完成）--------------------------------------------
	
	// 注意： 参数$N是表示数组有几个元素，而不是需要的相同元素的个数
	// 注意： 参数$N是表示数组有几个元素，而不是需要的相同元素的个数
	// 注意： 参数$N是表示数组有几个元素，而不是需要的相同元素的个数
	// 注意： 参数$N是表示数组有几个元素，而不是需要的相同元素的个数
	
		// 不管每次处理多少数组，都应该与它之后的所有数组都进行比较---
		// -------这其中本来还有一个遗漏就是与本组有相同的数组些之后彼此还要重复比较
		// 但是这不可避免，因为只要不是要求每个数字都相同的话，那么她相同的可能就又很多种，因为可能是不同的另外的几个数相同
// ----------把他们写入对应的数据库表中，2015.2.2（做单个数据的出现id分析之前）
//实现统计历史次数的函数--------------把他们写入对应的数据库表中，2015.2.2（做单个数据的出现id分析之前）
//参数：进行统计的数组，给出满足要求的数组的详细信息的数组，
//每个数组元素有几个数据元素，需要统计有几个相同数据的数组
function statistics_same_n_array($nowArray,$arrayMesage,$N){
	
	// 注意： 参数$N是表示数组有几个元素，而不是需要的相同元素的个数
	// 注意： 参数$N是表示数组有几个元素，而不是需要的相同元素的个数
	// 注意： 参数$N是表示数组有几个元素，而不是需要的相同元素的个数
	// 注意： 参数$N是表示数组有几个元素，而不是需要的相同元素的个数
	
	//统计有$sameN个相同数据的数组
	//统计有$sameN个相同数据的数组
	//统计有$sameN个相同数据的数组
	
	
	//统计有$sameN个相同数据的数组
	$sameN = 2;
	
	//每组数据有$N个数据元素,有$diffrentN个元素不同
	$diffrentN = $N-$sameN;
	echo "统计有 $sameN 个以上的数据相同的数组.<br>";
	
	//每组数据有$N个数据元素
	
	//用一个变量，避免在for里面每次都对数组进行元素个数的统计
	$ArrayElements=count($nowArray);
	$ArrayElements=900;
	$ArrayElements=1723;
	
	// counts_2_same
	// 添加记录相同的属性，并添加一个数组记录相同的几个数，用于插入数据库
	// 不知道为什么，间隔的记录数无法插入或更新
	for($j=900; $j<$ArrayElements; $j++){
		
		//第几行的1-6个数据与后面所有行的1-6个数据比较
		$k = $j;
		
		//为了避免首次计数时出现未定义情况，
		//所以定义一个每组数据找到的满足要求的
		//数据个数的数组个数的公用计数器
		$thisEchoTime = 0;
		
		//for($k=0; $k<count($nowArray); $k++){
		// 不管每次处理多少数组，都应该与它之后的所有数组都进行比较---
		// -------这其中本来还有一个遗漏就是与本组有相同的数组些之后彼此还要重复比较
		// 但是这不可避免，因为只要不是要求每个数字都相同的话，那么她相同的可能就又很多种，因为可能是不同的另外的几个数相同
		$the_n = count($nowArray);
		while($k<$the_n-1){
			$k++;
			//用于记录与每组数据的不同数据的个数
			//用于判断是否超出了允许的不同数据的个数
			$thisDiffrent = 0;
			//比较每个数组的$N（6）个元素
			for($i=0; $i<$N; $i++){
				
				//如果正在比较的两个数据不相同
				//先判断是结束一层循环，还是进行下一次比较
				if($nowArray[$j][$i] != $nowArray[$k][$i])
				{
					$thisDiffrent++;
					
					//如果已经有超出允许的不同数据的个数，
					//则与下一组数据进行比较
					if($thisDiffrent > $diffrentN)
					{
						break 1;
					
					//如果没有超出允许的数据的个数
					}else{
						
						//如果比较的不是第六个
						//则继续与下一组数据进行比较
						if($i < $N-1){
							continue;
						
						//否则就是第6个数据了，
						//依之前的判断是已经有符合要求的相同的数据个数了
						//则进行相同组数的统计与判断
						}else{
						
							//用于统计输出次数的变量
							++$thisEchoTime;
							
							//如果是第一次输出，
							//说明是目前的唯一一组符合相同个数要求的数据
							//否则说明不止找到了此一组数据符合要求，之前已经有了
							if($thisEchoTime==1){
								$sameCount[$j] = 0;
								$sameCount[$j] = 2;
								
								//遍历输出整行的所有元素，即是详细信息
								//echo $arrayMesage[$j]."\t <br>--------和<br>".$arrayMesage[$k]."\t 有".($N-$thisDiffrent)."个是相同的数据。<br>";
								echo "<br><br><br>下面一组找到了有".($N - $diffrentN)."个相同数据的：<br>".$arrayMesage[$j]."<br>".$arrayMesage[$k]."<br>";
								
								//因为是第一次，所以要存两组数据
								$sql = "INSERT INTO counts_2_same (id, appear_id, count, one, two, three, four, five, six) VALUES ('', ".$j.', 1,'.$nowArray[$j][0].', '.$nowArray[$j][1].', '.$nowArray[$j][2].', '.$nowArray[$j][3].', '.$nowArray[$j][4].', '.$nowArray[$j][5].")";
								$result = mysql_query($sql);
								
								$this_interval = $k-$j;
								// $sql = "INSERT INTO counts_2_same (id, appear_id, count, one, two, three, four, five, six, this_interval) VALUES ('', ".$k.','.$sameCount[$j].','.$nowArray[$k][0].', '.$nowArray[$k][1].', '.$nowArray[$k][2].', '.$nowArray[$k][3].', '.$nowArray[$k][4].', '.$nowArray[$k][5].', '.$this_interval.")";
								$sql = "INSERT INTO counts_2_same (id, appear_id, count, one, two, three, four, five, six) VALUES ('', ".$k.','.$sameCount[$j].','.$nowArray[$k][0].', '.$nowArray[$k][1].', '.$nowArray[$k][2].', '.$nowArray[$k][3].', '.$nowArray[$k][4].', '.$nowArray[$k][5].")";
								$result = mysql_query($sql);
		
								// $sql = "INSERT INTO counts_2_same (this_interval) VALUE (".($k-$j).") WHERE id=$k";
								// $sql = "UPDATE counts_2_same SET this_interval =".($k-$j)." WHERE appear_id=$k AND count=$sameCount[$j] AND one=".$nowArray[$k][0]." AND two=".$nowArray[$k][1]." AND three=".$nowArray[$k][2]." AND four=".$nowArray[$k][3]." AND five=".$nowArray[$k][4]." AND six=".$nowArray[$k][5];
								//与上一句等价
								// $sql = "UPDATE counts_2_same SET this_interval = ($k-$j) WHERE id='$k'";
								
								// $sql = "UPDATE counts_2_same SET this_interval =".($k-$j)." WHERE appear_id=$k"; 
								// $result = mysql_query($sql);$result = mysql_query($sql);
								
								// write($_SESSION["data"]["txt"],"\r\r\r <br>下面一组找到了有".($N - $diffrentN)."个相同数据的：\r <br>".$arrayMesage[$j]."\r <br>".$arrayMesage[$k]."\r <br>");
							}else{
								$sameCount[$j] ++;
								echo $arrayMesage[$k]."<br>";
								
								
								$sql = "INSERT INTO counts_2_same (id, appear_id, count, one, two, three, four, five, six) VALUES ('', ".$k.','.$sameCount[$j].','.$nowArray[$k][0].', '.$nowArray[$k][1].', '.$nowArray[$k][2].', '.$nowArray[$k][3].', '.$nowArray[$k][4].', '.$nowArray[$k][5].")";
								$result = mysql_query($sql);
								
								// write($_SESSION["data"]["txt"],$arrayMesage[$k]."\r <br>");
							}
							break 1;
						}
					}
				
				//如果正在比较的两个数据相同
				}else{
					if($i < $N-1){
						
						//echo $i."进行下一次比较！<br>";
						continue;
					}else{
						
						//用于统计输出次数的变量
						++$thisEchoTime;
						
						//统计出现相同的次数（缺点：会被反复统计，因为统计后没有没替换）
						if($thisEchoTime==1){
							$sameCount[$j] = 0;
							$sameCount[$j] = 2;
							
							//遍历输出整行的所有元素，即是详细信息
							echo "<br><br><br>下面一组找到了有".($N - $diffrentN)."个相同数据的：<br>".$arrayMesage[$j]."<br>".$arrayMesage[$k]."<br>";
							
							
							//因为是第一次，所以要存两组数据
							$sql = "INSERT INTO counts_2_same (id, appear_id, count, one, two, three, four, five, six) VALUES ('', ".$j.', 1,'.$nowArray[$j][0].', '.$nowArray[$j][1].', '.$nowArray[$j][2].', '.$nowArray[$j][3].', '.$nowArray[$j][4].', '.$nowArray[$j][5].")";
							$result = mysql_query($sql);
							
							$this_interval = $k-$j;
							// $sql = "INSERT INTO counts_2_same (id, appear_id, count, one, two, three, four, five, six, this_interval) VALUES ('', ".$k.','.$sameCount[$j].','.$nowArray[$k][0].', '.$nowArray[$k][1].', '.$nowArray[$k][2].', '.$nowArray[$k][3].', '.$nowArray[$k][4].', '.$nowArray[$k][5].', '.$this_interval.")";
							$sql = "INSERT INTO counts_2_same (id, appear_id, count, one, two, three, four, five, six) VALUES ('', ".$k.','.$sameCount[$j].','.$nowArray[$k][0].', '.$nowArray[$k][1].', '.$nowArray[$k][2].', '.$nowArray[$k][3].', '.$nowArray[$k][4].', '.$nowArray[$k][5].")";
							$result = mysql_query($sql);
							
							// $sql = "INSERT INTO counts_2_same (this_interval) VALUE (".($k-$j).") WHERE id=$k";
							// $sql = "UPDATE counts_2_same SET this_interval =".($k-$j)." WHERE appear_id=$k AND count=$sameCount[$j] AND one=".$nowArray[$k][0]." AND two=".$nowArray[$k][1]." AND three=".$nowArray[$k][2]." AND four=".$nowArray[$k][3]." AND five=".$nowArray[$k][4]." AND six=".$nowArray[$k][5];
							//与上一句等价
							// $sql = "UPDATE counts_2_same SET this_interval = ($k-$j) WHERE id='$k'";
							
							// $sql = "UPDATE counts_2_same SET this_interval =".($k-$j)." WHERE appear_id=$k"; 
							// $result = mysql_query($sql);
								
							//保存所有的产生的数据，
							//用于以后分析检查可靠性
							// write($_SESSION["data"]["txt"],"\r\r\r <br>下面一组找到了有".($N - $diffrentN)."个相同数据的：\r <br>".$arrayMesage[$j]."\r <br>".$arrayMesage[$k]."\r <br>");
						}else{
							$sameCount[$j] ++;
							//echo "\t <br>--------和<br>".$arrayMesage[$k]."\t 有".($N-$thisDiffrent)."个是相同的<br>";
							echo $arrayMesage[$k]."<br>";
							
							
							$sql = "INSERT INTO counts_2_same (id, appear_id, count, one, two, three, four, five, six) VALUES ('', ".$k.','.$sameCount[$j].','.$nowArray[$k][0].', '.$nowArray[$k][1].', '.$nowArray[$k][2].', '.$nowArray[$k][3].', '.$nowArray[$k][4].', '.$nowArray[$k][5].")";
							$result = mysql_query($sql);
							
							//保存所有的产生的数据，
							//用于以后分析检查可靠性
							// write($_SESSION["data"]["txt"],$arrayMesage[$k]."\r <br>");
							
						}
						
						//跳出一层循环，进行与下一组数据进行比较
						break 1;
					}
				}
			}
		}
	}
	// return $sameCount;
}




// -------------------未完成，且报废了，直接利用数组交集得出相同个数，满足要求就立即输出趋势的分析结果-------------------------------------------------------------
// -------------------用于找到与制定数组有制定个数的相同数的id信息

	// 注意： 参数$N是表示数组有几个元素，而不是需要的相同元素的个数
	// 注意： 参数$N是表示数组有几个元素，而不是需要的相同元素的个数
	// 注意： 参数$N是表示数组有几个元素，而不是需要的相同元素的个数
	// 注意： 参数$N是表示数组有几个元素，而不是需要的相同元素的个数

// -------------------未完成，且报废了，直接利用数组交集得出相同个数，满足要求就立即输出趋势的分析结果-------------------------------------------------------------
// 需要比较的数组，将要进行比较的数组组成的二维数组，每个数组的元素个数（为以后移用其他的分析考虑的）
function same_n_with_this_array( $this_array, $arrays_statistics_with, $same_n, $array_n){
	
	// 注意： 参数$N是表示数组有几个元素，而不是需要的相同元素的个数
	// 注意： 参数$N是表示数组有几个元素，而不是需要的相同元素的个数
	// 注意： 参数$N是表示数组有几个元素，而不是需要的相同元素的个数
	// 注意： 参数$N是表示数组有几个元素，而不是需要的相同元素的个数
	
	//每组数据有$N个数据元素
	$N = $array_n;
	
	//统计有$sameN个相同数据的数组
	$sameN = $same_n;
	
	// 统计有 $sameN 个以上的数据相同的数组
	$diffrentN = $N-$sameN;
	echo "统计有 $sameN 个以上的数据相同的数组.<br>";
	
	
	//用一个变量，避免在for里面每次都对数组进行元素个数的统计
	// 由于数据量太大，处理能力不足，而指定一个较小的数作为循环次数
	$ArrayElements=count($arrays_statistics_with);
	// $ArrayElements=900;
	// $ArrayElements=1723;
	echo "一共有".$ArrayElements."组数组。<br>";
	
	// 初始化一个变量，用于记录满足要求的数组id编号
	$ids = array();
	
	// 添加记录相同的属性，并添加一个数组记录相同的几个数，用于插入数据库
	// 不知道为什么，间隔的记录数无法插入或更新
	for($j=0; $j<$ArrayElements; $j++){
		
		//第几行的1-6个数据与后面所有行的1-6个数据比较
		// $k = $j;
		
		//为了避免首次计数时出现未定义情况，
		//所以定义一个每组数据找到的满足要求的
		//数据个数的数组个数的公用计数器
		$thisEchoTime = 0;
		
		//for($k=0; $k<count($arrays_statistics_with); $k++){
		// while($k<$ArrayElements-1){
			// $k++;
			
			//用于记录与每组数据的不同数据的个数
			//用于判断是否超出了允许的不同数据的个数
			$thisDiffrent = 0;
			//比较每个数组的$N（6）个元素
			for($i=0; $i<$N; $i++){
				
				//如果正在比较的两个数据不相同
				//先判断是结束一层循环，还是进行下一次比较------------因为考虑到不等的情况更多，所以把不等判断拿到了前面来。
				// ------因为考虑到不等的情况更多，所以把不等判断拿到了前面来。
				if($arrays_statistics_with[$j][$i] != $this_array[$i])
				{
					$thisDiffrent++;
					
					//如果已经有超出允许的不同数据的个数，
					//则与下一组数据进行比较
					if($thisDiffrent > $diffrentN)
					{
						break 1;
					
					//如果没有超出允许的数据的个数
					}/* else{
						
						//如果比较的不是第六个
						//则继续与下一组数据进行比较
						if($i < $N-1){
							continue;
						
						//否则就是第6个数据了，
						//依之前的判断是已经有符合要求的相同的数据个数了
						//则进行相同组数的统计与判断
						}else{
						
							//用于统计输出次数的变量
							++$thisEchoTime;
							
							//如果是第一次输出，
							//说明是目前的唯一一组符合相同个数要求的数据
							//否则说明不止找到了此一组数据符合要求，之前已经有了
							if($thisEchoTime==1){
								$sameCount[$j] = 0;
								$sameCount[$j] = 2;
								
								//遍历输出整行的所有元素，即是详细信息
								//echo $arrayMesage[$j]."\t <br>--------和<br>".$arrayMesage[$k]."\t 有".($N-$thisDiffrent)."个是相同的数据。<br>";
								// echo "<br><br><br>下面一组找到了有".($N - $diffrentN)."个相同数据的：<br>".$arrayMesage[$j]."<br>".$arrayMesage[$k]."<br>";
								echo "原数组：<br>";
								for($m=0; $m<$N; $m++){
									echo $this_array[$m];
								}
								echo "<br>下面一组找到了有".($N - $diffrentN)."个相同数据的：<br>".$j."<br>";
								for($m=0; $m<$N; $m++){
									echo $arrays_statistics_with[$j][$m];
								}
								//因为是第一次，所以要存两组数据
								// -----------
								// $sql = "INSERT INTO counts_2_same (id, appear_id, count, one, two, three, four, five, six) VALUES ('', ".$j.', 1,'.$nowArray[$j][0].', '.$nowArray[$j][1].', '.$nowArray[$j][2].', '.$nowArray[$j][3].', '.$nowArray[$j][4].', '.$nowArray[$j][5].")";
								// $result = mysql_query($sql);
								
								$this_interval = $k-$j;
								// $sql = "INSERT INTO counts_2_same (id, appear_id, count, one, two, three, four, five, six, this_interval) VALUES ('', ".$k.','.$sameCount[$j].','.$nowArray[$k][0].', '.$nowArray[$k][1].', '.$nowArray[$k][2].', '.$nowArray[$k][3].', '.$nowArray[$k][4].', '.$nowArray[$k][5].', '.$this_interval.")";
								
								// -----------
								// $sql = "INSERT INTO counts_2_same (id, appear_id, count, one, two, three, four, five, six) VALUES ('', ".$k.','.$sameCount[$j].','.$nowArray[$k][0].', '.$nowArray[$k][1].', '.$nowArray[$k][2].', '.$nowArray[$k][3].', '.$nowArray[$k][4].', '.$nowArray[$k][5].")";
								// $result = mysql_query($sql);
		
								// $sql = "INSERT INTO counts_2_same (this_interval) VALUE (".($k-$j).") WHERE id=$k";
								// $sql = "UPDATE counts_2_same SET this_interval =".($k-$j)." WHERE appear_id=$k AND count=$sameCount[$j] AND one=".$nowArray[$k][0]." AND two=".$nowArray[$k][1]." AND three=".$nowArray[$k][2]." AND four=".$nowArray[$k][3]." AND five=".$nowArray[$k][4]." AND six=".$nowArray[$k][5];
								//与上一句等价
								// $sql = "UPDATE counts_2_same SET this_interval = ($k-$j) WHERE id='$k'";
								
								// $sql = "UPDATE counts_2_same SET this_interval =".($k-$j)." WHERE appear_id=$k"; 
								// $result = mysql_query($sql);$result = mysql_query($sql);
								
								// write($_SESSION["data"]["txt"],"\r\r\r <br>下面一组找到了有".($N - $diffrentN)."个相同数据的：\r <br>".$arrayMesage[$j]."\r <br>".$arrayMesage[$k]."\r <br>");
							}else{
								$sameCount[$j] ++;
								// echo $arrayMesage[$k]."<br>";
								
								echo "<br>下面一组找到了有".($N - $diffrentN)."个相同数据的：<br>".$j."<br>";
								for($m=0; $m<$N; $m++){
									echo $arrays_statistics_with[$j][$m];
								}
								
								// -----------
								// $sql = "INSERT INTO counts_2_same (id, appear_id, count, one, two, three, four, five, six) VALUES ('', ".$k.','.$sameCount[$j].','.$nowArray[$k][0].', '.$nowArray[$k][1].', '.$nowArray[$k][2].', '.$nowArray[$k][3].', '.$nowArray[$k][4].', '.$nowArray[$k][5].")";
								// $result = mysql_query($sql);
								
								// write($_SESSION["data"]["txt"],$arrayMesage[$k]."\r <br>");
							}
							break 1;
						}
					} */
				
				//如果正在比较的两个数据相同
				}else{
					
					// 这里的判断有点多余了-----因为for循环有判断
					if($i < $N-1){
						
						//echo $i."进行下一次比较！<br>";
						continue;
					}else{
						
						//用于统计输出次数的变量
						++$thisEchoTime;
						
						//统计出现相同的次数（缺点：会被反复统计，因为统计后没有没替换）
						if($thisEchoTime==1){
							$sameCount[$j] = 0;
							$sameCount[$j] = 2;
							
							//遍历输出整行的所有元素，即是详细信息
							// echo "<br><br><br>下面一组找到了有".($N - $diffrentN)."个相同数据的：<br>".$arrayMesage[$j]."<br>".$arrayMesage[$k]."<br>";
							
								echo "<br>下面一组找到了有".($N - $diffrentN)."个相同数据的：<br>".$j."<br>";
								for($m=0; $m<$N; $m++){
									echo $arrays_statistics_with[$j][$m];
								}
							
							//因为是第一次，所以要存两组数据
								// -----------
							// $sql = "INSERT INTO counts_2_same (id, appear_id, count, one, two, three, four, five, six) VALUES ('', ".$j.', 1,'.$nowArray[$j][0].', '.$nowArray[$j][1].', '.$nowArray[$j][2].', '.$nowArray[$j][3].', '.$nowArray[$j][4].', '.$nowArray[$j][5].")";
							// $result = mysql_query($sql);
							
							$this_interval = $k-$j;
							// $sql = "INSERT INTO counts_2_same (id, appear_id, count, one, two, three, four, five, six, this_interval) VALUES ('', ".$k.','.$sameCount[$j].','.$nowArray[$k][0].', '.$nowArray[$k][1].', '.$nowArray[$k][2].', '.$nowArray[$k][3].', '.$nowArray[$k][4].', '.$nowArray[$k][5].', '.$this_interval.")";
							
							
							// -----------
							// $sql = "INSERT INTO counts_2_same (id, appear_id, count, one, two, three, four, five, six) VALUES ('', ".$k.','.$sameCount[$j].','.$nowArray[$k][0].', '.$nowArray[$k][1].', '.$nowArray[$k][2].', '.$nowArray[$k][3].', '.$nowArray[$k][4].', '.$nowArray[$k][5].")";
							// $result = mysql_query($sql);
							
							// $sql = "INSERT INTO counts_2_same (this_interval) VALUE (".($k-$j).") WHERE id=$k";
							// $sql = "UPDATE counts_2_same SET this_interval =".($k-$j)." WHERE appear_id=$k AND count=$sameCount[$j] AND one=".$nowArray[$k][0]." AND two=".$nowArray[$k][1]." AND three=".$nowArray[$k][2]." AND four=".$nowArray[$k][3]." AND five=".$nowArray[$k][4]." AND six=".$nowArray[$k][5];
							//与上一句等价
							// $sql = "UPDATE counts_2_same SET this_interval = ($k-$j) WHERE id='$k'";
							
							// $sql = "UPDATE counts_2_same SET this_interval =".($k-$j)." WHERE appear_id=$k"; 
							// $result = mysql_query($sql);
								
							//保存所有的产生的数据，
							//用于以后分析检查可靠性
							// write($_SESSION["data"]["txt"],"\r\r\r <br>下面一组找到了有".($N - $diffrentN)."个相同数据的：\r <br>".$arrayMesage[$j]."\r <br>".$arrayMesage[$k]."\r <br>");
						}else{
							$sameCount[$j] ++;
							//echo "\t <br>--------和<br>".$arrayMesage[$k]."\t 有".($N-$thisDiffrent)."个是相同的<br>";
							// echo $arrayMesage[$k]."<br>";
							
								echo "<br>下面一组找到了有".($N - $diffrentN)."个相同数据的：<br>".$j."<br>";
								for($m=0; $m<$N; $m++){
									echo $arrays_statistics_with[$j][$m];
								}
							
								// -----------
							// $sql = "INSERT INTO counts_2_same (id, appear_id, count, one, two, three, four, five, six) VALUES ('', ".$k.','.$sameCount[$j].','.$nowArray[$k][0].', '.$nowArray[$k][1].', '.$nowArray[$k][2].', '.$nowArray[$k][3].', '.$nowArray[$k][4].', '.$nowArray[$k][5].")";
							// $result = mysql_query($sql);
							
							//保存所有的产生的数据，
							//用于以后分析检查可靠性
							// write($_SESSION["data"]["txt"],$arrayMesage[$k]."\r <br>");
							
						}
						
						//跳出一层循环，进行与下一组数据进行比较
						break 1;
					}
				}
			}
		// }
	}
	// return $sameCount;
}


// 利用数组交集函数，得到数组元素的相同个数
function same_n_intersect_this_array( $this_array, $arrays_statistics_with, $same_n, $array_n)
{
	
	//每组数据有$N个数据元素
	$N = $array_n;
	
	//统计有$sameN个相同数据的数组
	$sameN = $same_n;
	
	// 统计有 $sameN 个以上的数据相同的数组
	$diffrentN = $N-$sameN;
	echo "统计有 $sameN 个以上的数据相同的数组.<br>";
	
	
	//用一个变量，避免在for里面每次都对数组进行元素个数的统计
	// 由于数据量太大，处理能力不足，而指定一个较小的数作为循环次数
	$ArrayElements=count($arrays_statistics_with);
	// $ArrayElements=900;
	// $ArrayElements=1723;
	echo "一共有".$ArrayElements."组数组。<br>";
	
	// 初始化一个变量，用于记录满足要求的数组id编号
	$ids = array();
	$id_i = 0;
	
	// 添加记录相同的属性，并添加一个数组记录相同的几个数，用于插入数据库
	// 不知道为什么，间隔的记录数无法插入或更新
	for($j=0; $j<$ArrayElements; $j++){
		$same_numbers = array_intersect($this_array, $arrays_statistics_with[$j]);
		$same_n = count($same_numbers);
		if($same_n >= $sameN)
		{
			// 只关心是否瞒住相同个数的要求，不关心到底有几个相同
			$ids[$id_i] = $j;
			// $ids[$id_i] = $same_n;
			++ $id_i;
		}
	}
	return $ids;
	
}







// -----------------------暂时报废-----未实现多组测试
// 统计每个数字出现的id，写入数据库
function test_same_n_intersect_this_array( $this_array, $arrays_statistics_with, $same_n, $array_n){
	$total_i = 0;
	foreach($same_ids as $key=>$the_id)
	{
		// echo "第 ".$key." 个满足相同个数的id编号为： ".$the_id.'<br>';
		
		// 定义变量，用于记录达到有3组数组都有3个及以上个数的相同元素
		$total = 0;
		// $total = array();
		
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
				if($same_n >= 3)
				{
					// ++ $total[$total_i];
					++ $total;
					// echo '<font color="#aaggss" size="5px">相同元素个数：'.$same_n.'</font><br>';
					// echo '<font color="#aaggss">相同元素个数：'.$same_n.'</font><br>';
				}else{
					// echo '相同元素个数：'.$same_n.'<br>';
				
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
					// ++ $total[$total_i];
					++ $total;
					// echo '<font color="#aaggss" size="5px">相同元素个数：'.$same_n.'</font><br>';
					// echo '<font color="#aaggss">相同元素个数：'.$same_n.'</font><br>';
				}else{
					// echo '相同元素个数：'.$same_n.'<br>';
				}
			}
		}
		// ++ $total_i;
		if($total >= 4)
		{
			$ok_id[$ok_id_i] = $the_id;
		}
	}
	return $ok_id;
}



// 统计每个数字出现的id，写入数据库
function Statistics_each_numb($nowArray,$arrayMesage,$N,$sameElements){
	echo "统计有 $sameElements 个以上的数据相同的数组.<br>";
	$sameN = $sameElements;
	$diffrentN = $N-$sameN;
	
	//每组数据有$N个数据元素
	
	//用一个变量，避免在for里面每次都对数组进行元素个数的统计
	$ArrayElements=count($nowArray);
	for($j=0; $j<$ArrayElements; $j++){
		
		//第几行的1-6个数据与后面所有行的1-6个数据比较
		$k = $j;
		
		//为了避免首次计数时出现未定义情况，
		//所以定义一个每组数据找到的满足要求的
		//数据个数的数组个数的公用计数器
		$thisEchoTime = 0;
		
		//for($k=0; $k<count($nowArray); $k++){
		while($k<$ArrayElements-1){
			$k++;
			//用于记录与每组数据的不同数据的个数
			//用于判断是否超出了允许的不同数据的个数
			$thisDiffrent = 0;
			//比较每个数组的$N（6）个元素
			for($i=0; $i<$N; $i++){
			
				//如果正在比较的两个数据不相同
				//先判断是结束一层循环，还是进行下一次比较
				if($nowArray[$j][$i] != $nowArray[$k][$i])
				{
					$thisDiffrent++;
					
					//如果已经有超出允许的不同数据的个数，
					//则与下一组数据进行比较
					if($thisDiffrent > $diffrentN)
					{
						break 1;
					
					//如果没有超出允许的数据的个数
					}else{
						
						//如果比较的不是第六个
						//则继续与下一组数据进行比较
						if($i < $N-1){
							continue;
						
						//否则就是第6个数据了，
						//依之前的判断是已经有符合要求的相同的数据个数了
						//则进行相同组数的统计与判断
						}else{
						
							//用于统计输出次数的变量
							++$thisEchoTime;
							
							//如果是第一次输出，
							//说明是目前的唯一一组符合相同个数要求的数据
							//否则说明不止找到了此一组数据符合要求，之前已经有了
							if($thisEchoTime==1){
								$sameCount[$j] = 2;
								
								//遍历输出整行的所有元素，即是详细信息
								//echo $arrayMesage[$j]."\t <br>--------和<br>".$arrayMesage[$k]."\t 有".($N-$thisDiffrent)."个是相同的数据。<br>";
								echo "<br><br><br>下面一组找到了有".($N - $diffrentN)."个相同数据的：<br>".$arrayMesage[$j]."<br>".$arrayMesage[$k]."<br>";
								write($_SESSION["data"]["txt"],"\r\r\r <br>下面一组找到了有".($N - $diffrentN)."个相同数据的：\r <br>".$arrayMesage[$j]."\r <br>".$arrayMesage[$k]."\r <br>");
							}else{
								$sameCount[$j] ++;
								echo $arrayMesage[$k]."<br>";
								write($_SESSION["data"]["txt"],$arrayMesage[$k]."\r <br>");
							}
							break 1;
						}
					}
				
				//如果正在比较的两个数据相同
				}else{
					if($i < $N-1){
						
						//echo $i."进行下一次比较！<br>";
						continue;
					}else{
						
						//用于统计输出次数的变量
						++$thisEchoTime;
						
						//统计出现相同的次数（缺点：会被反复统计，因为统计后没有没替换）
						if($thisEchoTime==1){
							$sameCount[$j] = 2;
							
							//遍历输出整行的所有元素，即是详细信息
							echo "<br><br><br>下面一组找到了有".($N - $diffrentN)."个相同数据的：<br>".$arrayMesage[$j]."<br>".$arrayMesage[$k]."<br>";
							
							//保存所有的产生的数据，
							//用于以后分析检查可靠性
							write($_SESSION["data"]["txt"],"\r\r\r <br>下面一组找到了有".($N - $diffrentN)."个相同数据的：\r <br>".$arrayMesage[$j]."\r <br>".$arrayMesage[$k]."\r <br>");
						}else{
							$sameCount[$j] ++;
							//echo "\t <br>--------和<br>".$arrayMesage[$k]."\t 有".($N-$thisDiffrent)."个是相同的<br>";
							echo $arrayMesage[$k]."<br>";
							
							//保存所有的产生的数据，
							//用于以后分析检查可靠性
							write($_SESSION["data"]["txt"],$arrayMesage[$k]."\r <br>");
						}
						
						//跳出一层循环，进行与下一组数据进行比较
						break 1;
					}
				}
			}
		}
	}
}




//实现分页输出显示的函数
function out_page_put($page,$page_size){
	//$sql = "select * from table order by id desc limit ". ($page-1)*$page_size .", $page_size";    
	$sql = "select * from goods_book order by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
	$result = mysql_query($sql);    
	while($row = mysql_fetch_array($result)){  
		?>
		<div id="left">
		<tr bgcolor="green">
		<td width="22%" height="200" style="text-align:right">
		<img src="20140929180339775IMG20140312026.jpg"  alt="点击查看大图" width="200" height="200" border="6px" 
		onmouseout="this.src='20140929180339775IMG20140312026.jpg';"  
		onmouseover="this.src='20140929180337731IMG20140312008.jpg';" />
		<!--
		<img src="20140929180339775IMG20140312026.jpg"  alt="点击查看大图" width="200" height="200" border="6px" 
		onmouseover="this.src='20140929180339775IMG20140312026.jpg';this.width='210';this.height='210';" 
		onmouseout="this.src='20140929180339775IMG20140312026.jpg';this.width='200';this.height='200';" />
		-->
		<img src="20140929180339775IMG20140312026.jpg"  alt="点击查看大图" width="200" height="200" border="6px" 
		onmouseover=<?php "pictureBrowse();"?>; 
		onmouseout="this.src='20140929180339775IMG20140312026.jpg';this.width='200';this.height='200';" />
		
		<!--
		<img src="20140929180339775IMG20140312026.jpg" alt="产品 小图" width="200" height="200" border="0" />
		
		-->
		</td>
		<br>
		
		<?php
		//var_dump($row);
		//print_r($row);
		//echo $row;
		echo "物品名称：".$row["goods_name"]."！"."<br>";
		echo "物品价格：".$row["goods_price"]."元！"."<br>";
		echo "物品持有人：".$row["goods_hoster"]."店主"."<br>";
		echo "<br>"; 
		?>
		<!--	</tr>    -->
		</div> 
		<?php
	}
}
?>

<?php
//遍历比较给定的数组，返回相同的元素及其相同的次数
function ergodic_array_get_same_n($array){
	$valueReturn = "遍历比较给定的数组，结果为：";
	$i=0;
	$j=0;
	$k = 0;
	$N=6;

	$sameCount[0]="若无其他元素，则表示没有重复出现过相同的元素！";

	//循环N次比较，行数++就好了
	for($j=0; $j<count($nowArray); $j++){
		//第几行的1-6个数据与后面所有行的1-6个数据比较
		$k = $j+1;
		//比较每个数组的$N个元素
		for($i=0; $i<$N; $i++){
			if($k>=count($nowArray)){
				//echo "总数据条数(即是数组数)：".count($nowArray)."<br>";
				break 1;
			}
			
			//先判断结束，或判断是否进行下一次
			if($nowArray[$j][$i] != $nowArray[$k][$i])
			{
				//因为for里面$i会++，所以$i此处赋值-1。
				$i=-1;
				$k++;
			}else if($i!=$N){
				echo $i."进行下一次比较！<br>--------返回值没有修改。";
			}else{
				$sameCount[$j]++;
				echo $resultArry[$j]."\t 和<br>";
				echo $resultArry[$k]."\t 是相同的<br><br>";
				$i=-1;
				$k++;
			}
		}
	}
	return $valueReturn;
}


//核心数据存入数据库
function data_core()
{
	//include ("conn.php");
	//include ("arraydirect.php");
	for($i=1601; $i<1723; $i++)
	{
	/*
		for($j=0; $j<6; $j++)
		{
			echo $nowArray[$i][$j].'<br>';
		}
		*/
		$sql = "INSERT INTO data_core (id, one, two, three, four, five, six) VALUES ('', ".$nowArray[$i][0].', '.$nowArray[$i][1].', '.$nowArray[$i][2].', '.$nowArray[$i][3].', '.$nowArray[$i][4].', '.$nowArray[$i][5].")";
		$result = mysql_query($sql);
		
	}
}


//核心数据存入数据库
function new_data_core_save($new_data_array)
{
	//include ("conn.php");
	//include ("arraydirect.php");
	for($i=0; $i<count($new_data_array); $i++)
	{
	/*
		for($j=0; $j<6; $j++)
		{
			echo $new_data_array[$i][$j].'<br>';
		}
		*/
		$sql = "INSERT INTO data_core (id, one, two, three, four, five, six) VALUES ('', ".$new_data_array[$i][0].', '.$new_data_array[$i][1].', '.$new_data_array[$i][2].', '.$new_data_array[$i][3].', '.$new_data_array[$i][4].', '.$new_data_array[$i][5].")";
		$result = mysql_query($sql);
		
	}
}


//核心数据存入数据库
function data_gess_save($data_gess_array)
{
	//include ("conn.php");
	//include ("arraydirect.php");
	for($i=0; $i<count($data_gess_array); $i++)
	{
	/*
		for($j=0; $j<6; $j++)
		{
			echo $nowArray[$i][$j].'<br>';
		}
		*/
		$sql = "INSERT INTO data_gess_arrays (id, one, two, three, four, five, six) VALUES ('', ".$data_gess_array[$i][0].', '.$data_gess_array[$i][1].', '.$data_gess_array[$i][2].', '.$data_gess_array[$i][3].', '.$data_gess_array[$i][4].', '.$data_gess_array[$i][5].")";
		$result = mysql_query($sql);
		
	}
}


//除3求余的所有方法---例如：0,2,0,0，0,0
function devide_three()
{
	//include ("conn.php");
	for($i=0; $i<3; $i++)
	{
		//$i = 0;
		for($j=0; $j<3; $j++)
		{
			for($k=0; $k<3; $k++)
			{
				for($l=0; $l<3; $l++)
				{
					for($m=0; $m<3; $m++)
					{
						for($n=0; $n<3; $n++)
						{
							$sql = "INSERT INTO method_odd_even (id, one, two, three, four, five, six) VALUES ('', ".$i.', '.$j.', '.$k.', '.$l.', '.$m.', '.$n.")";
							$result = mysql_query($sql);
						}
					}
				}
			}
		}
	}
}


//统计某个ID历史出现了多少次
function count_n_method()
{
	$sql = "select id from data_core where odd_even_id = 4";
	$result = mysql_query($sql);
	while( $row = mysql_fetch_row($result))
	{
		//echo '-00-=-9800====='.$row.'<br>';
			echo count($row)."<br>";
		foreach($row as $value){
			//$valueReturn .= $value." ";
			//echo $key."----";
			//echo $value."\t";
			echo $value."<br>";
		}
	
	}
	
	// for($i=1; $i<65; $i++)
	// {
		// echo '-00-=------'.$result.'<br>';
		// //$row["goods_name"]
	// }
}


//统计奇偶比的各个方法的历史次数
function count_odd_even_proportion_method()
{
	for($i=1; $i<8; $i++)
	{
		$sql = "select id from data_core where odd_even_proportion_id = $i";
		$result = mysql_query($sql);
		
		// $odd_even_proportion[$i] = count($result);
		// echo count($result).'<br>';
		// echo $result.'<br>';
		// echo $result[0].'<br>';
		// echo $result[1].'<br>';
		$the_count = 0;
		while( $row = mysql_fetch_row($result))
		{
			$the_count ++; 
			//echo '-00-=-9800====='.$row.'<br>';
				// echo count($row)."<br>";
			// foreach($row as $value){
				// // $valueReturn .= $value." ";
				// // echo $key."----";
				// // echo $value."\t";
				// echo $value."<br>";
			// }
		
		}
		
		$odd_even_proportion[$i] = $the_count;
	}
	// for($i=1; $i<65; $i++)
	// {
		// echo '-00-=------'.$result.'<br>';
		// //$row["goods_name"]
	// }
	return $odd_even_proportion;
}


//统计有 哪些方法重复出现过，在历史中各出现过多少次
// 并把结果更新，或存入数据库相应的统计表中
function count_odd_even_method()
{
	/* 	echo count(mysql_fetch_array($count_result)).'结果条数---------90=-0-=-0=-0<br>';
		echo count(mysql_num_rows($count_result)).'数据记录行的个数---------90=-0-=-0=-0<br>';
		echo count(mysql_num_fields($count_result)).'数据记录列的个数---------90=-0-=-0=-0<br>';
		
		echo count(mysql_fetch_row($count_result)).'结果的一条结果记录---------90=-0-=-0=-0<br>';
		echo count(mysql_fetch_array($count_result)).'结果的 每一行  作为一个数组---------90=-0-=-0=-0<br>';
		echo count(mysql_fetch_assoc($count_result)).'结果的一条结果记录做成一个关联数组返回---------90=-0-=-0=-0<br>';
	 */	
		
	for($i=1; $i<65; $i++)
	{
		$sql = "select id from data_core where odd_even_id = $i";
		//$result = mysql_query($sql);
		$count_result =  mysql_query($sql);
		
		//计数器初始化值
		$count_num = 0;
		while( $row = mysql_fetch_row($count_result))
		{
			$count_num ++;
		}
		
		$count_odd_even[$i]['method_id'] = $i;
		$count_odd_even[$i]['times'] = $count_num;
		//echo '方法数据库编号为：'.$i.' 的历史出现次数：'.$count_num.'<br>';
		//echo "<br><br><br>";
		
		//此处还没有降序排列，最好不存入数据库库
		// $sql = "INSERT INTO counts_odd_even (id, method_id, count) VALUES ('',  ".$i.', '.$count_num.")";
		// $sql = "UPDATE counts_odd_even set count = $CountOne[$j] where number = $j";
		// $result = mysql_query($sql);

	}
	
	//降序排列处理---冒泡排序
	for($i=1; $i<65; $i++)
	{
		for($j = ($i+1); $j<65; $j++)
		{
			if($count_odd_even[$i]['times'] < $count_odd_even[$j]['times'])
			{
				$cunt = $count_odd_even[$i];
				$count_odd_even[$i] = $count_odd_even[$j];
				$count_odd_even[$j] = $cunt;
			}
			
		}
	}
	return $count_odd_even;
}




//统计有 哪些方法重复出现过，在历史中各出现过多少次
// 并把 方法id作为下标，次数作为值，返回数组
function count_odd_even_key_method()
{
	/* 	echo count(mysql_fetch_array($count_result)).'结果条数---------90=-0-=-0=-0<br>';
		echo count(mysql_num_rows($count_result)).'数据记录行的个数---------90=-0-=-0=-0<br>';
		echo count(mysql_num_fields($count_result)).'数据记录列的个数---------90=-0-=-0=-0<br>';
		
		echo count(mysql_fetch_row($count_result)).'结果的一条结果记录---------90=-0-=-0=-0<br>';
		echo count(mysql_fetch_array($count_result)).'结果的 每一行  作为一个数组---------90=-0-=-0=-0<br>';
		echo count(mysql_fetch_assoc($count_result)).'结果的一条结果记录做成一个关联数组返回---------90=-0-=-0=-0<br>';
	 */	
		
	for($i=1; $i<65; $i++)
	{
		$sql = "select id from data_core where odd_even_id = $i";
		//$result = mysql_query($sql);
		$count_result =  mysql_query($sql);
		
		//计数器初始化值
		$count_num = 0;
		while( $row = mysql_fetch_row($count_result))
		{
			$count_num ++;
		}
		
		// $count_odd_even[$i]['method_id'] = $i;
		// $count_odd_even[$i]['times'] = $count_num;
		// $count_odd_even['method_id']['times'] = $count_num;
		
		// 此时是以放放风id做下标，所以不能再做预排序
		// $count_odd_even[$i]['times'] = $count_num;
		$count_odd_even[$i] = $count_num;
		
		//echo '方法数据库编号为：'.$i.' 的历史出现次数：'.$count_num.'<br>';
		//echo "<br><br><br>";
		
		//此处还没有降序排列，最好不存入数据库库
		// $sql = "INSERT INTO counts_odd_even (id, method_id, count) VALUES ('',  ".$i.', '.$count_num.")";
		// $sql = "UPDATE counts_odd_even set count = $CountOne[$j] where number = $j";
		// $result = mysql_query($sql);

	}
	
	// //降序排列处理---冒泡排序
	// for($i=1; $i<65; $i++)
	// {
		// for($j = ($i+1); $j<65; $j++)
		// {
			// // if($count_odd_even[$i]['times'] < $count_odd_even[$j]['times'])
			// // {
				// // $cunt = $count_odd_even[$i];
				// // $count_odd_even[$i] = $count_odd_even[$j];
				// // $count_odd_even[$j] = $cunt;
			// // }
			// if($count_odd_even[$i]['times'] < $count_odd_even[$j]['times'])
			// {
				// $cunt = $count_odd_even[$i];
				// $count_odd_even[$i] = $count_odd_even[$j];
				// $count_odd_even[$j] = $cunt;
			// }
			
		// }
	// }
	return $count_odd_even;
}



//统计有 哪些方法重复出现过，在历史中各出现过多少次
// 并把结果更新，或存入数据库相应的统计表中
function count_divide_three_method()
{
	/* 	
		echo count(mysql_num_rows($count_result)).'数据记录行的个数---------90=-0-=-0=-0<br>';
		echo count(mysql_num_fields($count_result)).'数据记录列的个数---------90=-0-=-0=-0<br>';
		
		echo count(mysql_fetch_row($count_result)).'结果的一条结果记录---------90=-0-=-0=-0<br>';
		echo count(mysql_fetch_array($count_result)).'结果的 每一行  作为一个数组---------90=-0-=-0=-0<br>';
		echo count(mysql_fetch_assoc($count_result)).'结果的一条结果记录做成一个关联数组返回---------90=-0-=-0=-0<br>';
		
		echo count(mysql_fetch_object($count_result)).'结果作为一个对象返回---------90=-0-=-0=-0<br>';
	 */	
		
	for($i=1; $i<730; $i++)
	{
		$sql = "select id from data_core where divide_three_id = $i";
		//$result = mysql_query($sql);
		$count_result =  mysql_query($sql);
		
		//计数器初始化值
		$count_num = 0;
		while( $row = mysql_fetch_row($count_result))
		{
			$count_num ++;
		}
		
		$count_odd_even[$i]['method_id'] = $i;
		$count_odd_even[$i]['times'] = $count_num;
		//echo '方法数据库编号为：'.$i.' 的历史出现次数：'.$count_num.'<br>';
		//echo "<br><br><br>";
		
		//此处还没有降序排列，最好不存入数据库库
		// $sql = "INSERT INTO counts_odd_even (id, method_id, count) VALUES ('',  ".$i.', '.$count_num.")";
		// $sql = "UPDATE counts_odd_even set count = $CountOne[$j] where number = $j";
		// $result = mysql_query($sql);

	}
	
	//降序排列处理---冒泡排序
	for($i=1; $i<730; $i++)
	{
		for($j = ($i+1); $j<730; $j++)
		{
			if($count_odd_even[$i]['times'] < $count_odd_even[$j]['times'])
			{
				$cunt = $count_odd_even[$i];
				$count_odd_even[$i] = $count_odd_even[$j];
				$count_odd_even[$j] = $cunt;
			}
			
		}
	}
	return $count_odd_even;
}


// 这是正确的方法---当时用的
//奇数偶数的所有方法---例如：奇偶奇奇偶奇
function odd_even()
{
	//include ("conn.php");
	for($i=0; $i<2; $i++)
	{
		for($j=0; $j<2; $j++)
		{
			for($k=0; $k<2; $k++)
			{
				for($l=0; $l<2; $l++)
				{
					for($m=0; $m<2; $m++)
					{
						for($n=0; $n<2; $n++)
						{
							// 当时是直接由除3余方法改来的
							$sql = "INSERT INTO method_odd_even (id, one, two, three, four, five, six) VALUES ('', ".$i.', '.$j.', '.$k.', '.$l.', '.$m.', '.$n.")";
							$result = mysql_query($sql);
						}
					}
				}
			}
		}
	}
}


//输出除3余方法
function out_divide_three()
{
	$sql = "SELECT id, one, two, three, four, five, six FROM method_divide_three ";// by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
	$result = mysql_query($sql);
	
		echo "除3余方法：<br>";
	while( $row = mysql_fetch_row($result))
	{
		//echo "奇偶奇方法：ID=$odd_even_id----";
		echo '<input '."style='font-size:17px; color:blanck; background:green'".'type="button" name="odd_even_proportions"  value='."$row[1]：$row[2]：$row[3]：$row[4]：$row[5]：$row[6]"."....ID=$row[0] />";
			
		echo " \t";
		
		// $i = 0;
		// foreach($row as $value){
			// $method_array[0][$i] = $value;
			// $i ++;
			// //echo $key."----";
			// //echo $value."\t";
		// }
		//echo "<br>";
	
	}	
}


//输出奇偶比例方法
function out_odd_even_proportion()
{
	$sql = "SELECT id, odd_count, even_count FROM method_odd_even_proportion";// by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
	$result = mysql_query($sql);
	
		echo "奇偶比：<br>";
	while( $row = mysql_fetch_row($result))
	{
		//echo "奇偶奇方法：ID=$odd_even_id----";
		echo '<input '."style='font-size:17px; color:blanck; background:green'".'type="button" name="odd_even_proportions"  value='."$row[1]：$row[2]"."....ID=$row[0] />";
			
		echo " \t";
		
		// $i = 0;
		// foreach($row as $value){
			// $method_array[0][$i] = $value;
			// $i ++;
			// //echo $key."----";
			// //echo $value."\t";
		// }
		//echo "<br>";
	
	}	
}

//输出奇偶奇方法
function out_odd_even()
{
	// 换行计数器
	$enter = 0;
	//echo '<form action="" method="post" style="border=5px;" name="select_odd_even_proportions">';
	
	//include ("conn.php");
	for($i=1; $i<3; $i++)
	{
		//$i = 1;
		for($j=1; $j<3; $j++)
		{
			for($k=1; $k<3; $k++)
			{
				for($l=1; $l<3; $l++)
				{
					for($m=1; $m<3; $m++)
					{
						for($n=1; $n<3; $n++)
						{
					
							$enter ++ ;
							if($enter % 5 == 0)
							{
								echo '<br>';
							}
							
							//用于辅助输出的遍历
							$out = '';
							
							if($i % 2 ==  0)
							{
								$out .= '偶：';
							}else{
								$out .= '奇：';
							}
							
								if($j % 2 ==  0)
								{
									//				$i ++;
									$out .= '偶：';
								}else{
									$out .= '奇：';
								}
								
									if($k % 2 ==  0)
									{
										//			$j ++;
										$out .= '偶：';
									}else{
										$out .= '奇：';
									}
									
										if($l % 2 ==  0)
										{
											//		$k ++;
											$out .= '偶：';
										}else{
											$out .= '奇：';
										}
										
											if($m % 2 ==  0)
											{
												//	$l ++;
												$out .= '偶：';
											}else{
												$out .= '奇：';
											}
											
							if($n % 2 ==  0)
							{
								//$m ++;
								$out .= '偶';
								//	echo "<button style='font-size:17px; color:blanck; background:green' >$out</button>";
							
								//echo '<input '."style='font-size:17px; color:blanck; background:green'".'type="submit" name="odd_even_proportions"  value='."  ".$out.  'ID： />';	
								echo '<input '."style='font-size:17px; color:blanck; background:green'".'type="button" name="odd_even_proportions"  value='."  ".$out.  'ID： />';	
								echo "..\t";
							}else{
								$out .= '奇';
							
								//echo '<input '."style='font-size:17px; color:blanck; background:green'".'type="submit" name="odd_even_proportions"  value='."  ".$out.  'ID： />';	
								echo '<input '."style='font-size:17px; color:blanck; background:green'".'type="button" name="odd_even_proportions"  value='."  ".$out.  'ID： />';	
								//	echo "<button style='font-size:17px; color:blanck; background:green' >$out</button>";
								echo "..\t";
							}
		
						}
					}
				}
			}
		}
	}
	// echo '</form>';
}


//挑选方法方法的预测出来的数组
function check_result_array_in_methods($the_result_array)
{
	//方法方法的预测出来的数组
}


//输出预测后的可能的数组,并返回数组
function get_result_array($result_array)
{
	
	//结果数组的下标变量
	$array_i = 0;
	// echo '我觉得还是continue的问题。';
	// echo '我觉得还是continue的问题。<br>';
	//注意：当初是以位置给出各个位置的数，所以$result_array的下标从1开始。
	for($i=0; $i<count($result_array[1]); $i++)
	{
		$this[0] = $result_array[1][$i];
		for($j=0; $j<count($result_array[2]); $j++)
		{
		
		if($result_array[2][$j] > $this[0])
		{
			$this[1] = $result_array[2][$j];
		}else{
			++ $j;
			while($result_array[2][$j] < $this[0]  && $j < count($result_array[2]))
			{
				++ $j;
			}
			if($j<count($result_array[2]))
			{
				$this[1] = $result_array[2][$j];
			}else{
				break 1;
			}
			
			//$j++;
		}
		
			for($k=0; $k<count($result_array[3]); $k++)
			{
		if($result_array[3][$k] > $this[1])
		{
			$this[2] = $result_array[3][$k];
		}else{
			++ $k;
			while($k < count($result_array[3]) && $result_array[3][$k] < $this[1])
			{
				++ $k;
			}
			if($k<count($result_array[3]))
			{
				$this[2] = $result_array[3][$k];
			}else{
				break 1;
			}
			
		}	
				for($l=0; $l<count($result_array[4]); $l++)
				{
		if($result_array[4][$l] > $this[2])
		{
			$this[3] = $result_array[4][$l];
		}else{
			++ $l;
			while($l < count($result_array[4]) && $result_array[4][$l] < $this[2])
			{
				++ $l;
			}
			if($l<count($result_array[4]))
			{
				$this[3] = $result_array[4][$l];
			}else{
				break 1;
			}
			
		}			
					for($m=0; $m<count($result_array[5]); $m++)
					{
		if($result_array[5][$m] > $this[3])
		{
			$this[4] = $result_array[5][$m];
		}else{
			
			++ $m;
			while($m < count($result_array[5]) && $result_array[5][$m] < $this[3])
			{
				++ $m;
			}
			if($m<count($result_array[5]))
			{
				$this[4] = $result_array[5][$m];
			}else{
				break 1;
			}
			
		}
						for($n=0; $n<count($result_array[6]); $n++)
						{
		if($result_array[6][$n] > $this[4])
		{
			$this[5] = $result_array[6][$n];
			
			$result_arrays[$array_i] = $this;
			$array_i ++;
		}else{
			
			++ $n;
			while($n < count($result_array[6]) && $result_array[6][$n] < $this[4])
			{
				++ $n;
			}
			if($n<count($result_array[6]))
			{
				$this[5] = $result_array[6][$n];
				$result_arrays[$array_i] = $this;
				$array_i ++;
			}else{
				break 1;
			}
			
		}				
						
						}}}}}}
	// //注意：当初是以位置给出各个位置的数，所以下标从1开始。
	// foreach($result_array[1] as $key1=>$value1)
	// {
		// $this[0] = $value1;
	// foreach($result_array[2] as $key2=>$value2)
	// {
		// if($value2 > $value1)
		// {
			// $this[1] = $value2;
		// }else{
			// continue;
		// }
	// foreach($result_array[3] as $key3=>$value3)
	// {
		// if($value3 > $value2)
		// {
			// $this[2] = $value3;
		// }else{
			// continue;
		// }
	// foreach($result_array[4] as $key4=>$value4)
	// {
		// if($value4 > $value3)
		// {
			// $this[3] = $value4;
		// }else{
			// continue;
		// }
	// foreach($result_array[5] as $key5=>$value5)
	// {
		// if($value5 > $value4)
		// {
			// $this[4] = $value5;
		// }else{
			// continue;
		// }
	// foreach($result_array[6] as $key6=>$value6)
	// {
		// if($value6 > $value5)
		// {
			// $this[5] = $value6;
			
			// $result_array[$j] = $this;
			// $j ++;
		// }else{
			// //$this[5] = 0;
			// continue;
		// }
	// }
	// }
	// }
	// }
	// }
	// }
	return $result_arrays;
}

// 这是错的
//奇数偶数的所有方法---例如：奇偶奇奇偶奇
function odd_even11111()
{
// 这是错的
	//include ("conn.php");
	$i = 1;
	$j = 1;
	$k = 1;
	$l = 1;
	$m = 1;
	$n = 1;
	for($p=1; $p<65; $p++)
	{
		if($n == 3)
		{
			//因为是从1开始的，所以都是以3结束
			$m = $m + $n%3;
			$l = $l + $m%3;
			$k = $k + $l%3;
			$j = $j + $k%3;
			$i = $i + $j%3;
			
			// 这是错的
			// 不知道哪里错了，单数数据库又是对的-----------
			// 对的，因为上面是用的p计数器------错的
			// 这里有错，n导致无限循环，，数据库要重新写
			// ？？？？？ 统计了一个P循环变量
			// 问题：每次n=3，但奇数还是都是奇数，导致计数错误
			// 但是数据库id好像是对的的？？
			// 对的，因为上面是用的p计数器-----错的
			$n = 0;
		}
		$sql = "INSERT INTO odd_even (id, one, two, three, four, five, six) VALUES ('', ".$i.', '.$j.', '.$k.', '.$l.', '.$m.', '.$n.")";
		//"INSERT INTO mytable (title, name, date) VALUES ('My title', 'My name', 'My date') ";
		//$sql = "select * from goods_book order by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
		$result = mysql_query($sql);
		$n ++;
	}
}
/* 

//利用奇偶方法和除3余方法，找出满足方法要求的1至6位上的数据
function both_odd_divide($odd_even, $divide_three)
{
	for($i=1; $i<6; $i++)
	{
		//辅助1至6位满足方法的数据下标键值
		$j = 0;
			echo $data_num.'-=-\-=\-<br>';
		//初始化被验证是否满足方法的数字变量
		if($j != 0 )
		{
			//验证此数是否符合方法
			//$data_num = $result_array[$i][$j] + 3;
		}else{
			//验证此数是否符合方法
			$data_num = $divide_three[$i];
		}
			echo $data_num.'-=-\-=\-<br>';
			
		//while( $data_num < (34 - (6 - $i -1)))
		// while( $data_num < (34 - 5 + $i))
		// while( $j < (34 - 5 + $i))
		 while( $j < 12)
		 {
			while($data_num % 2 != $odd_even[$i] && $data_num < (34 - 5 + $i))
			{
				//odd_even重新写入数据库
				$data_num += 3;
				//echo $data_num.'<br>';
			}
			
			$result_array[$i][$j] = $data_num;
			echo $data_num.'<br>';
			$j ++;
		 }
		
		//验证此数是否符合方法
		$data_num = $data_num + 3;
	}
			$result_array = 3;
	return $result_array;
}

 */

//利用奇偶方法和除3余方法的id，找出他们各自的的方法数组
function get_both_odd_divide($odd_even_id, $divide_three_id)
{
	$sql = "SELECT one, two, three, four, five, six FROM method_odd_even WHERE id = $odd_even_id ";// by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
	//$sql = "INSERT INTO data_gess_arrays (id, one, two, three, four, five, six) VALUES ('', ".$data_gess_array[$i][0].', '.$data_gess_array[$i][1].', '.$data_gess_array[$i][2].', '.$data_gess_array[$i][3].', '.$data_gess_array[$i][4].', '.$data_gess_array[$i][5].")";
	$result_odd_even = mysql_query($sql);
	
	$sql = "SELECT one, two, three, four, five, six FROM method_divide_three WHERE id = $divide_three_id";// by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
	$result_divide_three = mysql_query($sql);
	
		//echo '-00-=-9800====='.$result_odd_even.'<br>';
	while( $row = mysql_fetch_row($result_odd_even))
	{
		//echo "奇偶奇方法：ID=$odd_even_id----";
		$i = 0;
		foreach($row as $value){
			$method_array[0][$i] = $value;
			$i ++;
			//echo $key."----";
			//echo $value."\t";
		}
		//echo "<br>";
	
	}	
	while( $row = mysql_fetch_row($result_divide_three))
	{
		//echo "除3余方法：ID=$divide_three_id----";
		$i = 0;
		foreach($row as $value){
			$method_array[1][$i] = $value;
			$i ++;
			//echo $key."----";
			//echo $value."\t";
		}
		//echo "<br>";
	
	}	
	return $method_array;
}

//利用奇偶方法和除3余方法，找出满足方法要求的1至6位上的数据
function both_odd_divide($odd_even, $divide_three)
{
	for($i=1; $i<7; $i++)
	{
		//辅助1至6位满足方法的数据下标键值
		$j = 0;
			//echo $data_num.'-=-\-=\-<br>';
		
		/*
			除3余首个不是0，则在第一个位置可以是他
			否则不可以是它，就肯定是3
			如果不是在第一个位置，则肯定是除3余的首个值加上整数个3---------------好像又问题因为每个位置的余数不同
		*/
		//初始化被验证是否满足方法的数字变量
		/* if($i != 0 )
		{
			//验证此数是否符合方法
			$data_num = $divide_three[$i] + 3 * $i;
		}else if($i == 0 && $divide_three[0] != 0)
		{
			//验证此数是否符合方法
			$data_num = $divide_three[0] ;
		}else if($i == 0 ){
			//验证此数是否符合方法
			$data_num = 3 ;
		}else {
			echo '出错了。';
		} */
		
		
		if($divide_three[$i-1] != 0 )
		{
			//验证此数是否符合方法
			$data_num = $divide_three[$i-1];
		}else {	//验证此数是否符合方法
			$data_num = 3;
		}
		
		/* //验证此数是否符合方法
		if($i == 1 && $divide_three[$i-1] != 0 )
		{
			//验证此数是否符合方法
			$data_num = $divide_three[$i-1];
		if($i == 1 && $divide_three[$i-1] == 0 )
		
			//验证此数是否符合方法
			$data_num = 3;
		}else if($i != 1 && $divide_three[$i-1] != 0 ){
		
			//验证此数是否符合方法---(其实是大于第一个位置的最小的数，只是这里去判断太难了，没做）
			//$data_num = $result_array[1][0]/3 + $divide_three[$i-1];
		}else($i != 1 && $divide_three[$i-1] == 0 ){	
			//验证此数是否符合方法
			//$data_num = $result_array[1][0]/3 + $divide_three[$i-1];
		}
		 */
			//echo $data_num.'-=-\-=\-<br>';
			
		//while( $data_num < (34 - (6 - $i -1)))
		// while( $data_num < (34 - 5 + $i))
		// while( $j < (34 - 5 + $i))
		 while( $j < 12  && $data_num < (34 - 5 + $i))
		 {
			while($data_num % 2 != $odd_even[$i-1] && $data_num < (34 - 5 + $i))
			{
				//odd_even重新写入数据库
				$data_num += 3;
				//echo $data_num.'<br>';
			}
			if($data_num < (34 - 5 + $i))
			{
				$result_array[$i][$j] = $data_num;
				//echo $data_num.'-=-='.$j.'<br>';
			
			}
			//echo $data_num.'-=-='.$j.'<br>';
			$data_num += 3;
			$j ++;
		 }
	}
	return $result_array;
}


//利用奇偶方法和除3余方法，找出满足方法要求的1至6位上的数据
function both_odd_divide1($odd_even, $divide_three)
{
	for($i=1; $i<7; $i++)
	{
		//辅助1至6位满足方法的数据下标键值
		$j = 0;
			//echo $data_num.'-=-\-=\-<br>';
		
		/*
			除3余首个不是0，则在第一个位置可以是他
			否则不可以是它，就肯定是3
			如果不是在第一个位置，则肯定是除3余的首个值加上整数个3---------------好像又问题因为每个位置的余数不同
		*/
		//初始化被验证是否满足方法的数字变量
		/* if($i != 0 )
		{
			//验证此数是否符合方法
			$data_num = $divide_three[$i] + 3 * $i;
		}else if($i == 0 && $divide_three[0] != 0)
		{
			//验证此数是否符合方法
			$data_num = $divide_three[0] ;
		}else if($i == 0 ){
			//验证此数是否符合方法
			$data_num = 3 ;
		}else {
			echo '出错了。';
		} */
		if($divide_three[$i-1] != 0 )
		{
			//验证此数是否符合方法
			$data_num = $divide_three[$i];
		}else {	//验证此数是否符合方法
			$data_num = 3;
		}
			//echo $data_num.'-=-\-=\-<br>';
			
		//while( $data_num < (34 - (6 - $i -1)))
		// while( $data_num < (34 - 5 + $i))
		// while( $j < (34 - 5 + $i))
		
		$result_array[0][0] = 0;
		$j = 0;
		$k = 0;
		while( $j < 12  && $data_num < (34 - 5 + $i))
		{
			while($data_num % 2 != $odd_even[$i-1] && $data_num < (34 - 5 + $i))
			{
				//odd_even重新写入数据库
				$data_num += 3;
				//echo $data_num.'<br>';
			}
			if($data_num < (34 - 5 + $i) && $k > 1 && $data_num > $result_array[$i][$k-1])
			{
				$result_array[$i][$k] = $data_num;
				$k ++;
			
				//echo $data_num.'-=-='.$j.'<br>';
			
			}
			//echo $data_num.'-=-='.$j.'<br>';
			$data_num += 3;	
			$j ++;
		 }
	}
	return $result_array;
}


//验证历史
function check_in_history($odd_even_id, $divide_three_id)
{
	$sql = "SELECT id, one, two, three, four, five, six FROM data_core WHERE odd_even_id = $odd_even_id AND divide_three_id = $divide_three_id";// by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
	//$sql = "INSERT INTO data_gess_arrays (id, one, two, three, four, five, six) VALUES ('', ".$data_gess_array[$i][0].', '.$data_gess_array[$i][1].', '.$data_gess_array[$i][2].', '.$data_gess_array[$i][3].', '.$data_gess_array[$i][4].', '.$data_gess_array[$i][5].")";
	$result = mysql_query($sql);
	//$history_array = mysql_fetch_array($result);
	$this_history = '';
	// if( $row = mysql_fetch_row($result))
	// if( $row = mysql_fetch_row($result)){
		// echo '历史上还没有出现过此方法组合。';
	// }
	if(empty($result)){
		echo '历史上还没有出现过此方法组合。';
	}else{
		while( $row = mysql_fetch_row($result))
		{
			//echo '-00-=-9800====='.$row.'<br>';
			//echo count($row)."<br>";
			$i = 0;
			foreach($row as $value){
				//$valueReturn .= $value." ";
				//echo $key."----";
				//echo $value."\t";
				//echo $value."<br>";
				if($i != 0)
				{
					echo $value."\t";
					$this_history[$i-1] = $value;
					$i ++;
				}else{
					echo "编号为：".$value."，数据为：\t";
					$i ++;
				}
			}	
		}
	}
	// if( mysql_fetch_row($result)){
		// echo '历史上还没有出现过此方法组合。';
	// }
	return $this_history;
}


//得到指定列在指定表的全部记录
function get_method_array($method_id_name, $table_name)
{
	
	//$sql = "INSERT INTO method_odd_even (id, one, two, three, four, five, six) VALUES ('', ".$i.', '.$j.', '.$k.', '.$l.', '.$m.', '.$n.")";
	//"INSERT INTO mytable (title, name, date) VALUES ('My title', 'My name', 'My date') ";
	$sql = "select $method_id_name from $table_name";    
	$result = mysql_query($sql);
	
	$i = 0;
	while( $row = mysql_fetch_row($result))
	{
		// $method_array[$i] = $row;
		// echo $row;
		// echo $row[0];
		// echo $row[1];
		// echo $row;
		//echo $row.'-=\-=\-\=';
		 foreach($row as $key=>$value)
		{
			//echo '这里有方法数量：'.count($row).'种。<br>';
			//echo "奇偶方法下标为：  ".$key."  历史出现的次数为：----".$value."次！<br>";
			
			$method_array[$i] = $value;
			$i ++;
		} /**/	
		
	}
	return $method_array;
}


// 得到指定列在指定表的全部相关的指定的信息
// function get_method_array_infors($method_id_name, $table_name)
function get_method_array_infors()
{
	
	//$sql = "INSERT INTO method_odd_even (id, one, two, three, four, five, six) VALUES ('', ".$i.', '.$j.', '.$k.', '.$l.', '.$m.', '.$n.")";
	//"INSERT INTO mytable (title, name, date) VALUES ('My title', 'My name', 'My date') ";
	
	// $sql = "select id,$method_id_name from $table_name";    
	// $sql = "select id, odd_even_id, odd_even_proportion_id, divide_three_id from $table_name";    
	$sql = "SELECT id, one, two, three, four, five, six, odd_even_id, odd_even_proportion_id, divide_three_id FROM data_core ";// by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
	$result = mysql_query($sql);
	
	$i = 0;
	while( $row = mysql_fetch_row($result))
	{
		$method_array[$i] = $row;
		$i ++;
		//echo $row.'-=\-=\-\=';
		
		
		// foreach($row as $key=>$value)
		// {
			// //echo '这里有方法数量：'.count($row).'种。<br>';
			// //echo "奇偶方法下标为：  ".$key."  历史出现的次数为：----".$value."次！<br>";
			
			// $method_array[$i] = $value;
			// $i ++;
		// } /**/	
		
	}
	return $method_array;
}



//输出方法出现时前后10次的方法情况-------此组数据属于的方法编号，针对的方法（奇偶或除3余）的历史所有出现的记录数组
function print_twenty($method_id, $method_array)
{
	$end_n = count($method_array);
	//echo '-=\-\=-\='.$end_n;
	
	for($i=0; $i<$end_n; $i++)
	{
		//辅助1至6位满足方法的数据下标键值
		//$j = 0;
		//echo '-=\-\=-\=';
		if($method_array[$i] ==  $method_id)
		{
			
			if($i - 10 > 0)
			{
				if($i + 10 < $end_n)
				{
					echo '<div id="method_line">';
					for($j=($i-10); $j<($i+10); $j++)
					{
						if($j == $i)
						{
							//echo "<font font-size:19px; color:blue;>$method_array[$j]</font><br>";
							//echo "<font  color='blue'>$method_array[$j]</font><br>";
							echo "<button><font size='3' color='blue'>$method_array[$j]</font></button><br>";
						}else{
							echo "$method_array[$j]<br>";
						
						}
					}
					echo '</div>';
					echo '-';
				}else{
					echo '<div id="method_line">';
					for($j=($i-10); $j<$end_n; $j++)
					{
						if($j == $i)
						{
							echo "<button><font size='3' color='blue'>$method_array[$j]</font></button><br>";
						}else{
							echo "$method_array[$j]<br>";
						
						}
					}
					echo '</div>';
					echo '-';
					
				}
			}else{
				if($i + 10 < $end_n)
				{
					echo '<div id="method_line">';
					for($j=0; $j<($i+10); $j++)
					{
						if($j == $i)
						{
							echo "<button><font size='3' color='blue'>$method_array[$j]</font></button><br>";
						}else{
							echo "$method_array[$j]<br>";
						
						}
					}
					echo '</div>';
					echo '-';
				}else{
					echo '<div id="method_line">';
					for($j=0; $j<$end_n; $j++)
					{
						if($j == $i)
						{
							echo "<button><font size='3' color='blue'>$method_array[$j]</font></button><br>";
						}else{
							echo "$method_array[$j]<br>";
						
						}
					}
					echo '</div>';
					echo '-';
					
				}
			}
			
		}
	}
}


// 输出指定ID 的方法在历史出现次数统计数组中的信息
// 调用有点不方便，因为有输出了一次中文的奇偶奇方法，而且只有有了数组和ID，直接一个echo就实现了
function print_odd_even_count_by_id($method_id, $method_odd_even_count)
{
	echo '历史出现次数：'.$method_odd_even_count[$method_id].'<br>';
	//输出详细信息
	get_odd_even_by_id($method_id);
}

/* 

//输出方法出现时前后10次的方法情况-----
// --此组数据属于的方法编号，针对的方法（奇偶或除3余）的历史所有出现的记录数组
// 添加了一个历史出现次数统计的数组
function print_twenty_infors($method_id, $method_array,$method_odd_even_count)
{
	$end_n = count($method_array);
	//echo '-=\-\=-\='.$end_n;
	
	for($i=0; $i<$end_n; $i++)
	{
		//辅助1至6位满足方法的数据下标键值
		//$j = 0;
		//echo '-=\-\=-\=';
		
		
		// 7是输出奇偶奇，8是奇偶比，9是除3余
		if($method_array[$i][7] ==  $method_id)
		{
			// echo $method_array[$i][7].'-=-=-=';
			// $odd_even_string = get_odd_even_by_id($method_array[$j][7]);
			
			if($i - 10 > 0)
			{
				if($i + 10 < $end_n)
				{
					echo '<div id="method_line">';
					for($j=($i-10); $j<($i+10); $j++)
					{
						// if($j == $i)
						// {
							// //echo "<font font-size:19px; color:blue;>$method_array[$j]</font><br>";
							// //echo "<font  color='blue'>$method_array[$j]</font><br>";
							
							// // echo "<button><font size='3' color='blue'>$method_array[$j]</font></button><br>";
							// echo "<button><font size='3' color='blue'>$method_array[$j][0], $method_array[$j][7], $method_array[$j][8], $method_array[$j][9] </font></button><br>";
						// }else{
							// // echo "$method_array[$j]<br>";
							// echo "$method_array[$j][0], $method_array[$j][7], $method_array[$j][8], $method_array[$j][9] <br>";
						
						// }
						
						if($j == $i)
						{
							//echo "<font font-size:19px; color:blue;>$method_array[$j]</font><br>";
							//echo "<font  color='blue'>$method_array[$j]</font><br>";
							
							// echo "<button><font size='3' color='blue'>$method_array[$j]</font></button><br>";
							echo "<button><font size='3' color='blue'>".$method_array[$j][0].",".$method_array[$j][7].",".$method_array[$j][8].",".$method_array[$j][9] ." </font></button><br>";
						}else{
							// echo "$method_array[$j]<br>";
							echo $method_array[$j][0].",".$method_array[$j][7].",".$method_array[$j][8].",".$method_array[$j][9] ."<br>";
						
						}
						$odd_even_string = get_odd_even_by_id($method_array[$j][7]);
					}
					echo '</div>';
					echo '-';
				}else{
					echo '<div id="method_line">';
					for($j=($i-10); $j<$end_n; $j++)
					{
						// if($j == $i)
						// {
							// //echo "<font font-size:19px; color:blue;>$method_array[$j]</font><br>";
							// //echo "<font  color='blue'>$method_array[$j]</font><br>";
							
							// // echo "<button><font size='3' color='blue'>$method_array[$j]</font></button><br>";
							// echo "<button><font size='3' color='blue'>$method_array[$j][0], $method_array[$j][7], $method_array[$j][8], $method_array[$j][9] </font></button><br>";
						// }else{
							// // echo "$method_array[$j]<br>";
							// echo "$method_array[$j][0], $method_array[$j][7], $method_array[$j][8], $method_array[$j][9] <br>";
						
						// }
						
						if($j == $i)
						{
							//echo "<font font-size:19px; color:blue;>$method_array[$j]</font><br>";
							//echo "<font  color='blue'>$method_array[$j]</font><br>";
							
							// echo "<button><font size='3' color='blue'>$method_array[$j]</font></button><br>";
							echo "<button><font size='3' color='blue'>".$method_array[$j][0].",".$method_array[$j][7].",".$method_array[$j][8].",".$method_array[$j][9] ." </font></button><br>";
						}else{
							// echo "$method_array[$j]<br>";
							echo $method_array[$j][0].",".$method_array[$j][7].",".$method_array[$j][8].",".$method_array[$j][9] ."<br>";
						
						}
						$odd_even_string = get_odd_even_by_id($method_array[$j][7]);
					}
					echo '</div>';
					echo '-';
					
				}
			}else{
				if($i + 10 < $end_n)
				{
					echo '<div id="method_line">';
					for($j=0; $j<($i+10); $j++)
					{
						// if($j == $i)
						// {
							// //echo "<font font-size:19px; color:blue;>$method_array[$j]</font><br>";
							// //echo "<font  color='blue'>$method_array[$j]</font><br>";
							
							// // echo "<button><font size='3' color='blue'>$method_array[$j]</font></button><br>";
							// echo "<button><font size='3' color='blue'>$method_array[$j][0], $method_array[$j][7], $method_array[$j][8], $method_array[$j][9] </font></button><br>";
						// }else{
							// // echo "$method_array[$j]<br>";
							// echo "$method_array[$j][0], $method_array[$j][7], $method_array[$j][8], $method_array[$j][9] <br>";
						
						// }
						
						if($j == $i)
						{
							//echo "<font font-size:19px; color:blue;>$method_array[$j]</font><br>";
							//echo "<font  color='blue'>$method_array[$j]</font><br>";
							
							// echo "<button><font size='3' color='blue'>$method_array[$j]</font></button><br>";
							echo "<button><font size='3' color='blue'>".$method_array[$j][0].",".$method_array[$j][7].",".$method_array[$j][8].",".$method_array[$j][9] ." </font></button><br>";
						}else{
							// echo "$method_array[$j]<br>";
							echo $method_array[$j][0].",".$method_array[$j][7].",".$method_array[$j][8].",".$method_array[$j][9] ."<br>";
						
						}
						$odd_even_string = get_odd_even_by_id($method_array[$j][7]);
					}
					echo '</div>';
					echo '-';
				}else{
					echo '<div id="method_line">';
					for($j=0; $j<$end_n; $j++)
					{
						// if($j == $i)
						// {
							// //echo "<font font-size:19px; color:blue;>$method_array[$j]</font><br>";
							// //echo "<font  color='blue'>$method_array[$j]</font><br>";
							
							// // echo "<button><font size='3' color='blue'>$method_array[$j]</font></button><br>";
							// echo "<button><font size='3' color='blue'>$method_array[$j][0], $method_array[$j][7], $method_array[$j][8], $method_array[$j][9] </font></button><br>";
						// }else{
							// // echo "$method_array[$j]<br>";
							// echo "$method_array[$j][0], $method_array[$j][7], $method_array[$j][8], $method_array[$j][9] <br>";
						
						// }
						
						// get_odd_even_by_id($odd_even_id);
						
						if($j == $i)
						{
							//echo "<font font-size:19px; color:blue;>$method_array[$j]</font><br>";
							//echo "<font  color='blue'>$method_array[$j]</font><br>";
							
							// echo "<button><font size='3' color='blue'>$method_array[$j]</font></button><br>";
							echo "<button><font size='3' color='blue'>".$method_array[$j][0].",".$method_array[$j][7].",".$method_array[$j][8].",".$method_array[$j][9] ." </font></button><br>";
						}else{
							// echo "$method_array[$j]<br>";
							echo $method_array[$j][0].",".$method_array[$j][7].",".$method_array[$j][8].",".$method_array[$j][9] ."<br>";
						
						}
						$odd_even_string = get_odd_even_by_id($method_array[$j][7]);
					}
					echo '</div>';
					echo '-';
					
				}
			}
			
		}
	}
} */




//输出方法出现时前后10次的方法情况-----
// --此组数据属于的方法编号，针对的方法（奇偶或除3余）的历史所有出现的记录数组

// 添加了一个历史出现次数统计的数组--------------==
function print_twenty_infors($method_id, $method_array,$method_odd_even_count)
{
	$end_n = count($method_array);
	//echo '-=\-\=-\='.$end_n;
	
	// echo '<div id="method_history_id1">';
	// // $out = '测试';
	// // echo $out;
	// echo '</div>';
	
	
			$out_ids = '';
			$pre_id = 1;
	for($i=0; $i<$end_n; $i++)
	{
		// if($i == $end_n - 1)
		// {
			// echo "<script>document.getElementById('method_history_id1').innerHTML = ".$out.";";
			
			// echo "</script>";
		// }
		//辅助1至6位满足方法的数据下标键值
		//$j = 0;
		//echo '-=\-\=-\=';
		
		// 7是输出奇偶奇，8是奇偶比，9是除3余
		if($method_array[$i][7] ==  $method_id)
		{
			// echo "<script>document.getElementById('method_history_id').value .= ".$method_array[$i][0].";";
			// echo "<script>var the_id_div = document.getElementById('method_history_id').value + ".$method_array[$i][0].";";
			// echo "<script>var the_id_div = document.getElementById('method_history_id').value;";
			
			// $out .= "get_value()"."<br>".$i;
			// echo "<script>var the_id_div = document.getElementById('method_history_id');";
			
			// echo "<script>function get_value(){ return document.getElementById('method_history_id').value;}";
			// echo "the_id_div.innerHTML = the_id_div.value + <br> +".$method_array[$i][0].";";
			// echo "the_id_div.innerHTML = the_id_div.value + ".$method_array[$i][0].";";
			// echo "the_id_div.innerHTML = the_id_div.value + ".$i.";";
			// echo "the_id_div.innerHTML = the_id_div.value + <br>8768;";
			
			// echo "var string = the_id_div.value;";
			// echo 'var string = string +"<br />";';
			// echo 'var string = string +"<br />";';
			// echo "var string = '8768';";
			// echo "var string = the_id_div.value + '8768';";
			// echo "the_id_div.innerHTML = the_id_div.value + '8768';";
			
			// echo "the_id_div.innerHTML = string;";
			// echo "the_id_div.innerHTML = 769867986".";";
			// echo "the_id_div.innerHTML = 769867986";
			// echo "<script>document.getElementById('method_history_id').value = 789899;";
			
			// echo "</script>";
			$out_ids .= ($i+1)."-间隔：".(($i+1)-$pre_id)."<br>";
			$pre_id = $i+1;
			// $out .= "get_value()"."<br>".$i;
			// $out = "<script>get_value();</script>"."<br>".$i;
			/* 
				<script>
				//实现全选
				function selectAll(){
					//document.getElementById("timeDiv").innerHTML = out;
					document.getElementByName("ToStatisticsArrayIn");
					for(var i = 0; i < ToStatisticsArrayIn.length; i ++ ){
						ToStatisticsArrayIn[i].checked = true;
					}
				} */
			// echo $method_array[$i][7].'-=-=-=';
			// $odd_even_string = get_odd_even_by_id($method_array[$j][7]);
			
			if($i - 10 > 0)
			{
				if($i + 10 < $end_n)
				{
					echo '<div id="method_line">';
					for($j=($i-10); $j<($i+10); $j++)
					{
						// if($j == $i)
						// {
							// //echo "<font font-size:19px; color:blue;>$method_array[$j]</font> ";
							// //echo "<font  color='blue'>$method_array[$j]</font> ";
							
							// // echo "<button><font size='3' color='blue'>$method_array[$j]</font></button> ";
							// echo "<button><font size='3' color='blue'>$method_array[$j][0], $method_array[$j][7], $method_array[$j][8], $method_array[$j][9] </font></button> ";
						// }else{
							// // echo "$method_array[$j] ";
							// echo "$method_array[$j][0], $method_array[$j][7], $method_array[$j][8], $method_array[$j][9]  ";
						
						// }
						
						if($j == $i)
						{
							//echo "<font font-size:19px; color:blue;>$method_array[$j]</font> ";
							//echo "<font  color='blue'>$method_array[$j]</font> ";
							
							// echo "<button><font size='3' color='blue'>$method_array[$j]</font></button> ";
							echo "<button><font size='3' color='blue'>".$method_array[$j][0].",".$method_array[$j][7].",".$method_array[$j][8].",".$method_array[$j][9] ." </font></button> ";
						}else{
							// echo "$method_array[$j] ";
							echo $method_array[$j][0].",".$method_array[$j][7].",".$method_array[$j][8].",".$method_array[$j][9] ." ";
						
						}
						// echo '奇偶奇方法在历史出现次数：'.$method_odd_even_count[$method_array[$j][7]].'<br><br>';
						echo '奇偶奇方法在历史出现次数：'.$method_odd_even_count[$method_array[$j][7]].'<br>';
						$odd_even_string = get_odd_even_by_id($method_array[$j][7]);
						// echo '奇偶奇方法在历史出现次数：'.'<br><br>';
						echo '<br>';
					}
					echo '</div>';
					echo '-';
				}else{
					echo '<div id="method_line">';
					for($j=($i-10); $j<$end_n; $j++)
					{
						// if($j == $i)
						// {
							// //echo "<font font-size:19px; color:blue;>$method_array[$j]</font> ";
							// //echo "<font  color='blue'>$method_array[$j]</font> ";
							
							// // echo "<button><font size='3' color='blue'>$method_array[$j]</font></button> ";
							// echo "<button><font size='3' color='blue'>$method_array[$j][0], $method_array[$j][7], $method_array[$j][8], $method_array[$j][9] </font></button> ";
						// }else{
							// // echo "$method_array[$j] ";
							// echo "$method_array[$j][0], $method_array[$j][7], $method_array[$j][8], $method_array[$j][9]  ";
						
						// }
						
						if($j == $i)
						{
							//echo "<font font-size:19px; color:blue;>$method_array[$j]</font> ";
							//echo "<font  color='blue'>$method_array[$j]</font> ";
							
							// echo "<button><font size='3' color='blue'>$method_array[$j]</font></button> ";
							echo "<button><font size='3' color='blue'>".$method_array[$j][0].",".$method_array[$j][7].",".$method_array[$j][8].",".$method_array[$j][9] ." </font></button> ";
						}else{
							// echo "$method_array[$j] ";
							echo $method_array[$j][0].",".$method_array[$j][7].",".$method_array[$j][8].",".$method_array[$j][9] ." ";
						
						}
						// echo '奇偶奇方法在历史出现次数：'.$method_odd_even_count[$method_array[$j][7]].'<br><br>';
						echo '奇偶奇方法在历史出现次数：'.$method_odd_even_count[$method_array[$j][7]].'<br>';
						$odd_even_string = get_odd_even_by_id($method_array[$j][7]);
						// echo '奇偶奇方法在历史出现次数：'.'<br><br>';
						echo '<br>';
					}
					echo '</div>';
					echo '-';
					
				}
			}else{
				if($i + 10 < $end_n)
				{
					echo '<div id="method_line">';
					for($j=0; $j<($i+10); $j++)
					{
						// if($j == $i)
						// {
							// //echo "<font font-size:19px; color:blue;>$method_array[$j]</font> ";
							// //echo "<font  color='blue'>$method_array[$j]</font> ";
							
							// // echo "<button><font size='3' color='blue'>$method_array[$j]</font></button> ";
							// echo "<button><font size='3' color='blue'>$method_array[$j][0], $method_array[$j][7], $method_array[$j][8], $method_array[$j][9] </font></button> ";
						// }else{
							// // echo "$method_array[$j] ";
							// echo "$method_array[$j][0], $method_array[$j][7], $method_array[$j][8], $method_array[$j][9]  ";
						
						// }
						
						if($j == $i)
						{
							//echo "<font font-size:19px; color:blue;>$method_array[$j]</font> ";
							//echo "<font  color='blue'>$method_array[$j]</font> ";
							
							// echo "<button><font size='3' color='blue'>$method_array[$j]</font></button> ";
							echo "<button><font size='3' color='blue'>".$method_array[$j][0].",".$method_array[$j][7].",".$method_array[$j][8].",".$method_array[$j][9] ." </font></button> ";
						}else{
							// echo "$method_array[$j] ";
							echo $method_array[$j][0].",".$method_array[$j][7].",".$method_array[$j][8].",".$method_array[$j][9] ." ";
						
						}
						// echo '奇偶奇方法在历史出现次数：'.$method_odd_even_count[$method_array[$j][7]].'<br><br>';
						echo '奇偶奇方法在历史出现次数：'.$method_odd_even_count[$method_array[$j][7]].'<br>';
						$odd_even_string = get_odd_even_by_id($method_array[$j][7]);
						// echo '奇偶奇方法在历史出现次数：'.'<br><br>';
						echo '<br>';
					}
					echo '</div>';
					echo '-';
				}else{
					echo '<div id="method_line">';
					for($j=0; $j<$end_n; $j++)
					{
						// if($j == $i)
						// {
							// //echo "<font font-size:19px; color:blue;>$method_array[$j]</font> ";
							// //echo "<font  color='blue'>$method_array[$j]</font> ";
							
							// // echo "<button><font size='3' color='blue'>$method_array[$j]</font></button> ";
							// echo "<button><font size='3' color='blue'>$method_array[$j][0], $method_array[$j][7], $method_array[$j][8], $method_array[$j][9] </font></button> ";
						// }else{
							// // echo "$method_array[$j] ";
							// echo "$method_array[$j][0], $method_array[$j][7], $method_array[$j][8], $method_array[$j][9]  ";
						
						// }
						
						// get_odd_even_by_id($odd_even_id);
						
						if($j == $i)
						{
							//echo "<font font-size:19px; color:blue;>$method_array[$j]</font> ";
							//echo "<font  color='blue'>$method_array[$j]</font> ";
							
							// echo "<button><font size='3' color='blue'>$method_array[$j]</font></button> ";
							echo "<button><font size='3' color='blue'>".$method_array[$j][0].",".$method_array[$j][7].",".$method_array[$j][8].",".$method_array[$j][9] ." </font></button> ";
						}else{
							// echo "$method_array[$j] ";
							echo $method_array[$j][0].",".$method_array[$j][7].",".$method_array[$j][8].",".$method_array[$j][9] ." ";
						
						}
						// echo '奇偶奇方法在历史出现次数：'.$method_odd_even_count[$method_array[$j][7]].'<br><br>';
						echo '奇偶奇方法在历史出现次数：'.$method_odd_even_count[$method_array[$j][7]].'<br>';
						$odd_even_string = get_odd_even_by_id($method_array[$j][7]);
						// echo '奇偶奇方法在历史出现次数：'.'<br><br>';
						echo '<br>';
					}
					echo '</div>';
					echo '-';
					
				}
			}
			
		}
		
	}
	echo '<div id="method_history_id">';
	// for($i=0; $i<$end_n; $i++)
	// {
		// //辅助1至6位满足方法的数据下标键值
		// //$j = 0;
		// //echo '-=\-\=-\=';
		
		// // 7是输出奇偶奇，8是奇偶比，9是除3余
		// if($method_array[$i][7] ==  $method_id)
		// {
			// echo $i."<br>";
		// }
	// }
	// $out = '测试';
	// echo $out;
	echo $out_ids;
	echo '</div>';
}

//用奇偶奇方法id获得奇偶奇信息
function get_odd_even_by_id($odd_even_id)
{
	$sql = "SELECT one, two, three, four, five, six, odd_even_proportion FROM method_odd_even where id = $odd_even_id";// by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
	$result = mysql_query($sql);
	
	//以字符串返回
	$method_infor_string = '';
	$i = 0;
		echo "---------------";
	while( $row = mysql_fetch_row($result))
	{
		// $method_infor_string[$i] = $row;
		// $i ++;
		// echo $row.'-=\-=\-\=';
		// echo $row[0].'-=\-=\-\=';
		// echo $row[1].'-=\-=\-\=';
		
		
		foreach($row as $key=>$value)
		{
			//echo '这里有方法数量：'.count($row).'种。<br>';
			//echo "奇偶方法下标为：  ".$key."  历史出现的次数为：----".$value."次！<br>";
			// echo $value.'，---';
			
			if($key != 6)
			{
				if($value == 1)
				{
					echo '奇,';				
				}else{
					echo '偶,';	
				}
			}
			// echo $value.'，';
			// $method_infor_string[$i] .= $value."，";
			$method_infor_string .= $value."，";
			$i ++;
		} /**/	
		echo "----奇偶比：".$row[6].'<br>';
	}
	return $method_infor_string;
}


// 这是错的
//奇数偶数的所有方法---例如：奇偶奇奇偶奇
function odd_even_out11111()
{
// 这是错的
	//include ("conn.php");
	$i = 1;
	$j = 1;
	$k = 1;
	$l = 1;
	$m = 1;
	$n = 2;
	$out = '奇：奇：奇：奇：奇：奇：';
	//echo "<button style='font-size:17px; color:blanck; background:green' >$out</button>";
	echo '<form action="" method="post" style="border=5px;" name="select_odd_even_proportions">';
	
		echo '<input '."style='font-size:17px; color:blanck; background:green'".'type="submit" name="odd_even_proportions"  value='."  ".$out.  ' />'.'... ';
					
		for($n=2; $n<65; $n++)
		{
			if($n % 2 == 1 && $n != 1) 
			{
			
// 这是错的
			// 同上：
			
			// 这里有错，n导致无限循环，，数据库要重新写
			// ？？？？？ 统计了一个P循环变量
			// 问题：每次n=3，但奇数还是都是奇数，导致计数错误
			// 但是数据库id好像是对的的？？
				//
				$m = $m + $n%2;
				$l = $l + $m%2;
				$k = $k + $l%2;
				$j = $j + $k%2;
				$i = $i + $j%2;
				//$n = 0;
			}
			
			if($n % 5 == 0)
			{
				echo '<br>';
			}
			
			//用于辅助输出的遍历
			$out = '';
			
			if($i % 2 ==  0)
			{
				$out .= '偶：';
			}else{
				$out .= '奇：';
			}
			
				if($j % 2 ==  0)
				{
					//				$i ++;
					$out .= '偶：';
				}else{
					$out .= '奇：';
				}
				
					if($k % 2 ==  0)
					{
						//			$j ++;
						$out .= '偶：';
					}else{
						$out .= '奇：';
					}
					
						if($l % 2 ==  0)
						{
							//		$k ++;
							$out .= '偶：';
						}else{
							$out .= '奇：';
						}
						
							if($m % 2 ==  0)
							{
								//	$l ++;
								$out .= '偶：';
							}else{
								$out .= '奇：';
							}
							
			if($n % 2 ==  0)
			{
				//$m ++;
				$out .= '偶：';
				//	echo "<button style='font-size:17px; color:blanck; background:green' >$out</button>";
			
				echo '<input '."style='font-size:17px; color:blanck; background:green'".'type="submit" name="odd_even_proportions"  value='."  ".$out.  ' />';	
				echo "...\t";
			}else{
				$out .= '奇：';
			
				echo '<input '."style='font-size:17px; color:blanck; background:green'".'type="submit" name="odd_even_proportions"  value='."  ".$out.  ' />';	
				//	echo "<button style='font-size:17px; color:blanck; background:green' >$out</button>";
				echo "...\t";
			}
		}
	echo '</form>';
	
}



//奇数偶数的所有方法存入数据库---例如：奇偶奇奇偶奇
function odd_even_out1()
{
	//include ("conn.php");
	for($i=1; $i<3; $i++)
	{
		if($i % 2 == 0)
		{
			echo '偶：';
		}else{
			echo '奇：';
		}
		for($j=1; $j<3; $j++)
		{
			if($j % 2 == 0)
			{
				echo '偶：';
			}else{
				echo '奇：';
			}
			for($k=1; $k<3; $k++)
			{
				if($k % 2 == 0)
				{
					echo '偶：';
				}else{
					echo '奇：';
				}
				for($l=1; $l<3; $l++)
				{
					if($l % 2 == 0)
					{
						echo '偶：';
					}else{
						echo '奇：';
					}
					for($m=1; $m<3; $m++)
					{
						if($m % 2 == 0)
						{
							echo '偶：';
						}else{
							echo '奇：';
						}
						for($n=1; $n<3; $n++)
						{
							if($n % 2 == 0)
							{
								echo '偶：'."...\t";
							}else{
								echo '奇：';
							}
								//echo "\t \n \r";
							//$sql = "INSERT INTO method_odd_even (id, one, two, three, four, five, six) VALUES ('', ".$i.', '.$j.', '.$k.', '.$l.', '.$m.', '.$n.")";
							//"INSERT INTO mytable (title, name, date) VALUES ('My title', 'My name', 'My date') ";
							//$sql = "select * from goods_book order by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
							//$result = mysql_query($sql);
						}
					}
					//echo '<br>';
				}
			}
		}
	}
	
}


//筛选出符合方法的数组
function check_result_array_odd_even($result_array, $method_odd_even, $method_divide_three)
{
	$i = 0;
	$right_result = '';
	foreach($result_array as $value){
		$right_result[$i] = check_array_odd_even($value, $method_odd_even, $method_divide_three);
		$i ++;
	}
	return $right_result;
}


//验证一个数组是否符合给定方法
function check_array_odd_even($array, $method_odd_even, $method_divide_three)
{
	$j = 0;
	foreach($array as $value){
		if($value % 2 == $method_odd_even[$j] && $value % 3 == $method_divide_three[$j])
		{
			$right_result[$j] = $value;
			//echo '符合方法<br>';
			$j ++;
		}else{
			$wrong_result = '';
			
			//如果有不符合的直接返回空
			return $wrong_result;
		}
	}
			//echo '<br><br><br>';
	return $right_result;
}


//奇偶方法的奇偶比例属性判断，并存入属性
function judge_save_odd_even_proportion()
{
	// $sql = "SELECT one, two, three, four, five, six FROM method_odd_even WHERE id = $i ";// by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
	$sql = "SELECT one, two, three, four, five, six FROM method_odd_even ";// by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
	$result = mysql_query($sql);
	//echo count($result).'-----';
	$i = 1;
	$odd_count = 0;
	//while($row= mysql_fetch_array($result))
	while($row = mysql_fetch_row($result))
	{
		//$array[$i] = $row;
		for($j=0; $j<6; $j++) 
		{
			if($row[$j] == 1)
			{
				$odd_count ++;
			}
			//echo $row[$j].'--';
		}
		//echo $odd_count.'==';
		//$sql = "INSERT INTO method_odd_even (odd_even_proportion) VALUE ($odd_count)  WHERE id = $i";
		//$sql = "UPDATE method_odd_even SET odd_even_id = "." '$odd_even_id' WHERE id = "."'$id' ";
		
		//$sql = "UPDATE method_odd_even SET odd_even_proportion = "." '$odd_count' WHERE id = "."'($i+1)' ";
		$sql = "UPDATE method_odd_even SET odd_even_proportion = "." $odd_count WHERE id = "."'$i' ";
		$result_this = mysql_query($sql);
		
		//echo count($row).'-----';
		//echo $row[0].'-----';
		$odd_count = 0;
		$i ++;
		// foreach($row as $key=>$value){
			
		// }
	}
}




//奇偶方法的奇偶比例属性判断，并存入属性
function new_data_array_odd_even_in_proportion($new_data_array)
{
	//记录奇数的个数
	$odd_count = 0;
	for($j=0; $j<6; $j++) 
	{
		if($new_data_array[$j] == 1)
		{
			$odd_count ++;
		}
		//echo $row[$j].'--';
	}
	
	// $sql = "UPDATE method_odd_even SET odd_even_proportion = "." $odd_count WHERE id = "."'$i' ";
	// $result_this = mysql_query($sql);
	
	//echo count($row).'-----';
	//echo $row[0].'-----';
	// $odd_count = 0;	
	return $odd_count;
}


//奇数偶数的判断并更新到数据库中数据组的相应属性
//分别对每组数据的每个数据进行辨别
//得出奇偶比例
//得出奇偶分布顺序
//得出除3余数
//把得出的结果的对应编号放到数据库中数据尾部的属性里面
function odd_even_dispose($array, $i_start, $n_end)
{
	//包含数据库连接文件
	//include ("conn.php");
	
	//每次对100组数据进行统计
	for($i=$i_start; $i<$n_end; $i++)             //循环计数器可以用变量？？？？？？？
	{
		//初始化相关辅助的数据变量
		//奇偶
		//方法的数据库编号
		$odd_even_id = 1;
		//方法的数据库编号计算的辅助变量
		$odd_even_numb = 32;   //2的5次方
		
		//奇偶比例(proportion:比例)
		//方法的数据库编号
		$odd_even_proportion_id = 1;
		//方法的数据库编号计算的辅助变量
		//$odd_numb = 0;   //奇数个数
		$even_numb = 0;   //偶数个数
		
		//除3余
		//方法的数据库编号
		$divide_three_id = 1;
		//方法的数据库编号计算的辅助变量
		$divide_three_numb = 243;   //3的5次方
		
		
		//对每组的6个进行处理辨别
		for($j=0; $j<6; $j++)
		{
			//奇偶处理
			$is_even = $array[$i][$j] % 2;
			
			//如果是偶数
			if( $is_even == 0)
			{
				//偶数计数器加1，用于得到奇偶比例
				$even_numb ++;
				
			}else{
				//方法的数据库编号变化
				$odd_even_id += $odd_even_numb;
				
			}
			
			//方法的数据库编号计算的辅助变量
			$odd_even_numb /= 2;   //除2
	
			//除3余处理
			$divide_three = $array[$i][$j] % 3;
			if( $divide_three == 0)
			{
				//等于0时无处理
			}else if( $divide_three == 1){
			
				//方法的数据库编号
				$divide_three_id += $divide_three_numb;
			}else if( $divide_three == 2){
			
				//方法的数据库编号
				$divide_three_id += 2 * $divide_three_numb;
			}else{
				echo "<script>alert('出错啦--第'+ $i + '组--第' + $j + '个数据处理时。')</script>";
			}
			
			//方法的数据库编号计算的辅助变量
			$divide_three_numb /= 3;   //除3
		}
		
		//奇偶比例的id
		$odd_even_proportion_id = $even_numb + 1;
		//echo $i.'==='.$i_start;
		$id = $i + 1;
		
		//保存处理结果
		$sql = "UPDATE data_core SET odd_even_id = "." '$odd_even_id',"." divide_three_id = "." '$divide_three_id', "." odd_even_proportion_id = "." '$odd_even_proportion_id'"." WHERE id = "."'$id' ";
		
		//更新单一属性应该可以一次性完成很多，更快捷
		$sql = "UPDATE data_core SET odd_even_id = "." '$odd_even_id' WHERE id = "."'$id' ";
		$result = mysql_query($sql);
		//echo 'cunl -=0=';
		
	}
	return true;
}



// 得出新添加的数据的奇偶奇方法的ID，并返回
// function new_data_array_odd_even_dispose($new_data_array)
function new_data_array_methods_dispose($new_data_array)
{
	//包含数据库连接文件
	//include ("conn.php");
	
	//每次对100组数据进行统计
	// for($i=$i_start; $i<$n_end; $i++)             //循环计数器可以用变量？？？？？？？
	// {
		//初始化相关辅助的数据变量
		//奇偶
		//方法的数据库编号
		$odd_even_id = 1;
		//方法的数据库编号计算的辅助变量
		$odd_even_numb = 32;   //2的5次方
		
		//奇偶比例(proportion:比例)
		//方法的数据库编号
		$odd_even_proportion_id = 1;
		
		//方法的数据库编号计算的辅助变量
		//$odd_numb = 0;   //奇数个数
		$even_numb = 0;   //偶数个数
		
		//除3余
		//方法的数据库编号
		$divide_three_id = 1;
		
		//方法的数据库编号计算的辅助变量
		$divide_three_numb = 243;   //3的5次方
		
		
		//对每组的6个进行处理辨别
		for($j=0; $j<6; $j++)
		{
			//奇偶处理
			// $is_even = $new_data_array[$i][$j] % 2;
			$is_even = $new_data_array[$j] % 2;
			
			//如果是偶数
			if( $is_even == 0)
			{
				//偶数计数器加1，用于得到奇偶比例
				$even_numb ++;
				
			}else{
				//方法的数据库编号变化
				$odd_even_id += $odd_even_numb;
				
			}
			
			//方法的数据库编号计算的辅助变量
			$odd_even_numb /= 2;   //除2
	
			//除3余处理
			// $divide_three = $new_data_array[$i][$j] % 3;
			$divide_three = $new_data_array[$j] % 3;
			if( $divide_three == 0)
			{
				//等于0时无处理
			}else if( $divide_three == 1){
			
				//方法的数据库编号
				$divide_three_id += $divide_three_numb;
			}else if( $divide_three == 2){
			
				//方法的数据库编号
				$divide_three_id += 2 * $divide_three_numb;
			}else{
				// echo "<script>alert('出错啦--第'+ $i + '组--第' + $j + '个数据处理时。')</script>";
				echo "<script>alert('出错啦,在得出数组的3个方法ID处理时。')</script>";
			}
			
			//方法的数据库编号计算的辅助变量
			$divide_three_numb /= 3;   //除3
		}
		
		//奇偶比例的id
		$odd_even_proportion_id = $even_numb + 1;
		//echo $i.'==='.$i_start;
		// $id = $i + 1;
		
		//保存处理结果
		// $sql = "UPDATE data_core SET odd_even_id = "." '$odd_even_id',"." divide_three_id = "." '$divide_three_id', "." odd_even_proportion_id = "." '$odd_even_proportion_id'"." WHERE id = "."'$id' ";
		$methods_results[0] = $odd_even_id;
		$methods_results[1] = $odd_even_proportion_id;
		$methods_results[2] = $divide_three_id;
		//更新单一属性应该可以一次性完成很多，更快捷
		// $sql = "UPDATE data_core SET odd_even_id = "." '$odd_even_id' WHERE id = "."'$id' ";
		
		// $result = mysql_query($sql);
		//echo 'cunl -=0=';
		
	// }
	// return true;
	return $methods_results;
}

//遍历给定数组
function ergodic_array($array){
	$valueReturn = "数组内容：";
	//foreach($string as $key=>$value){
	foreach($array as $value){
		$valueReturn .= $value." ";
		//echo $key."----";
		//echo $value."\t";
		//echo $value."<br>";
	}
	return $valueReturn;
}


//向文件$fileName中以末尾追加的形式写入内容$content
function write($fileName,$content){
	checkdocument($fileName);
	$dirrWrite = fopen($fileName,'a') or trigger_error($fileName."打开文件失败！<br>");
	//fwrite($dirrWrite,$content."\n");
	fwrite($dirrWrite,$content."\t");
	fclose($dirrWrite);
}


//读取文件$fileName内的全部内容，以字符串返回
function readDocument($fileName){
	checkdocument($fileName);
	//声明一个变量，存储读取文件的结果
	$file='';
	$dirrRead = fopen($fileName,'a') or trigger_error($fileName."打开文件失败！<br>");
	while(!feof($dirrRead)){
		//每次最多读取1024字节---一行的字数
		$file .= fread($dirrRead,1024);
	}
	fclose($dirrRead);
	return $file;
}

//以行为单位的方式读取文件$fileName内的全部内容到一个数组，并返回数组
function readAsArry($fileName){
	checkdocument($fileName);
	//把整个文件读入一个数组，且不需要fopen()提前打开文件
	//得到的数组的每个元素对应文件的每一行，各元素有换行符分隔开
	//file:系统函数，不用打开，直接以行为单位读成数组
	$getfile = file($fileName);
	return $getfile;
}


//输出数组$arryde的各个下标和值
function print_foreach_key_value($arry){
	echo "<br><br>";
	foreach($arry as $only_this_key=>$only_this_value){
		echo '键值：'.$only_this_key."----";
		echo '值：'.$only_this_value."<br>";
	}
}



//输出二维数组$arryde的各个下标和值
function print_foreach_twice_key_value($arry){
	echo "<br><br>";
	foreach($arry as $only_this_key=>$only_this_array){
		echo '数组键值：'.$only_this_key."----";
		// echo '值：'.$only_this_value."<br>";
		foreach($only_this_array as $only_this_key2=>$only_this_value2){
			echo '元素键值：'.$only_this_key2."----";
			echo '值：'.$only_this_value2."<br>";
		}
	}
}


//只清除文件的数据,但不删除文件
//参数为：需要清除数据的文件名称
function clearData($fileName){
	//判断需要清除数据的文件是否存在
	checkdocument($fileName);
	//以写模式打开，写入空白覆盖原文件
	$dirrWritePre = fopen($fileName,'w') or trigger_error($fileName."打开文件 不正确.");
	//写入一个空白，覆盖原有内容
	fwrite($dirrWritePre,"  ");
	fclose($dirrWritePre);
}


//检查文件$fileName是否存在
function checkDocument($fileName){
	if(!file_exists($fileName)){
		echo "对不起，不存在文件".$fileName."!<br>";
		//注意，不能创建文本文档。。。//mkdir("$fileName");
		//return false;
		return;
	}else{
		//echo "存在文件".$fileName."！<br>";
	}
}


//建立文件夹或文件，先判断文件夹是否存在
function createFolder($path){
	if(!file_exists($path)) 
	{ 
		//检查是否有该文件夹，如果没有就创建，并给予最高权限 
		mkdir("$path");
		echo "文件夹：".$path."创建成功！<br>";
	}else{
		echo "对不起，文件夹：$path已经存在，请改换文件名！<br>";
		echo "文件夹创建失败，请检查程序代码，判断逻辑！<br>";
		//return FALSE;
	}
}

//建立文档文件，先判断文档文件是否存在
function createTxtDocument($fileName){
	//判断需要清除数据的文件是否存在
	checkdocument($fileName);
	//以写模式打开，写入空白覆盖原文件
	$dirrWritePre = fopen($fileName,'a') or trigger_error($fileName."打开文件 不正确.");
	//写入一个空白，覆盖原有内容
	fwrite($dirrWritePre,"时间为：".date("Y-m-d H:i:s",time())."的时候建立的文档! \n");
	echo "恭喜你哦，创建文档文件成功！";
	fclose($dirrWritePre);
	
	/* if(!file_exists($path)) 
	{ 
		//检查是否有该文件夹，如果没有就创建，并给予最高权限 
		mkdir("$path");
		echo "文件夹：".$path."创建成功！<br>";
	}else{
		echo "对不起，文件夹：$path已经存在，请改换文件名！<br>";
		echo "文件夹创建失败，请检查程序代码，判断逻辑！<br>";
		//return FALSE;
	} */
}


//重置session成员的值
function SetSessions(){	
	//注册session数组中的order，保存第几次处理信息，用于创建每次的处理文件夹
	$_SESSION["data"]["orderFolder"]=1;
	//保存当前正在处理第几个文档
	$_SESSION["data"]["orderTxt"]=1;
	//注册session数组中的folder，保存第几次处理信息，用于创建每次的处理文件夹
	//保存文件夹存储路径--当前文件夹路径下的dataFolder文件夹。
	$_SESSION["data"]["folderPath"]="./dataFolder/";
	//保存当前正在处理的第几个文档
	$_SESSION["data"]["folder"]="No folder even now！";
	//保存当前正在处理的第几个文档
	$_SESSION["data"]["txt"]="No txt even now！";
}


//查看有哪些session成员
function CheckSessions(){	
	foreach($_SESSION as $key=>$value){
		//有的session不是数组，直接输出
		echo $key."：<br>";
		if(is_array($value))
		//有的session是数组，遍历出来
		foreach($value as $key1=>$value1){
			echo $key1."：<br>";
			echo $value1."<br><br>";
		}else{
			echo $value."<br><br>";
		}
	}
}



//遍历文件夹，输出遍历结果
function ergodicFolder($path){
	if(!file_exists($path)) 
	{ 
		//检查是否有该文件夹，如果没有就创建，并给予最高权限 
		//mkdir("$path");
		echo "文件夹：$path不存在！<br>";
	}else{
		echo "已经找到了文件夹：".$path."文件，遍历结果如下：<br>";
		echo "文件名称 \t --文件大小 \t --文件类型 \t --文件最后修改时间 \t\n<br> ";
		
		$dir_handle =  opendir($path);
		
		//声明一个变量，记录文件个数
		$fileNum = 0;
		//<input type="checkbox" name="Classifycheckbox" value="显示全部物品" checked />显示全部物品
		echo "<form id='form_Classifycheckbox' name='form_Classifycheckbox' method='post'>";
		
		//遍历指定目录
		while($file = readdir($dir_handle)){
		
			//文件中通常有两个文件，名称是.和 ..
			//这里排除不处理这两个文件
			if($file == "." || $file == ".."){
				continue;
			}
			$fileNum++;
			$dirFile[$fileNum] = $path."/".$file;
			//echo "<label><input type='checkbox' name='Classifycheckbox' value='显示全部物品' />";
			//echo '<label><input type="checkbox" name="ToStatisticsArrayIn[]" value = "$dirFile[$fileNum]" />';
			echo '<label><input type="checkbox" name="ToStatisticsArrayIn[]" value = '.$dirFile[$fileNum].' checked />';
			//echo "<label><input type='checkbox' name='ToStatisticsArrayIn' value = $dirFile[$fileNum] />";
			//echo $dirFile[$fileNum]."<br>";
			echo $dirFile[$fileNum]."\t".filesize($dirFile[$fileNum])."\t".filetype($dirFile[$fileNum])."\t".date("Y/n/t",filemtime($dirFile[$fileNum]))."<br>";
			echo "</label>";
		}
		echo '<input type="submit" name="sub"  value="提交" />'."    \t \t \t";
		//echo '<input type="submit" name="subAll"   value="全选" />';
		//echo '<input type="submit" name="giveUpAllSub"  value="反选" /><br>';
		//action="selectAll()"
		echo "</form>";
		closedir($dir_handle);
		echo "共有文件个数：".$fileNum."个！<br>";
		echo "<br><br><br>";
		//return FALSE;
	}
}

?>

<script>
//实现全选
function selectAll(){
	//document.getElementById("timeDiv").innerHTML = out;
	document.getElementByName("ToStatisticsArrayIn");
	for(var i = 0; i < ToStatisticsArrayIn.length; i ++ ){
		ToStatisticsArrayIn[i].checked = true;
	}
}

//实现全选
function giveUpSelectAll(){
	//document.getElementById("timeDiv").innerHTML = out;
	document.getElementByName("ToStatisticsArrayIn");
	for(var i = 0; i < ToStatisticsArrayIn.length; i ++ ){
		ToStatisticsArrayIn[i].checked = fase;
	}
}

//页面加载完成后自动触发的事件
window.onload=function(){
	//var promptMess=prompt("prompt：实现用户输入的弹出框。");
	//alert("你输入的是："+promptMess);
	
	//调用自定义的隐藏函数，setTimeout只运行一次
	//setTimeout("hide('divHide')",2000);
	//setTimeout("display('divHide')",2000);
	//清除setTimeout函数
	//var timer = setTimeout("hide(divHide)",3000);
	//clearTimeout(timer);

	//循环执行隐藏与显示
	//setInterval("hide('divHide')",1000);
	//setInterval("display('divHide')",1000);

	/* //用innerHTML写入信息---已经实现
	document.getElementById("moveDiv").innerHTML="<p>innerHTML终于实现啦！</p>";
	* /
	//移动图片的实现调用，做好参数准备
	elMove = document.getElementById("moveDiv");
	//timeNew = document.getElementById("timeDiv");
	//右移其实位置横坐标
	elMove.style.left = '-100px';
	//timeNew.style.left = '-100px';
	//移动图片的实现调用
	moveRight(); 
	//timeFresh();
}
*/
</script>


<?php
//匹配数组的全部信息，包括日期等
//正则匹配，找出数字
//把数据用正则表达式匹配成数组，参数：需要转换的字符串
//可以以参数传入正则表达式。---因为考虑到日期，期数编号等信息
//可以改进：设置读取个数---设置个数，用for循环每次只读取一个
function regularDocumentArray($string){
	//正则表达式----0和9之间的数字有1个或2个,
	//1到36之间的一个数。/反斜杠为定界符
	//$pattern='/[1-36]+/is';
	//考虑到日期是很长的，所以做成下面的匹配表达式
	//i:匹配对象不区分大小写；
	//s:匹配将字符串视作单行 ，即是换行符视作普通字符看待
	$pattern='/[0-9]+/is';
	//要么是1-9，或10-29,或30-36的数。/反斜杠为定界符
	//$pattern='/[1-9]{1}|([1-2]{1}[0-9]{1})|[3][0-6]{1}/is';
	//需要转换的字符串
	$regularString=$string;
	//把数据regularString按照正则pattern的方式存到dataArray数组中。
	//PREG_PATTERN_ORDER：是preg_match_all()函数的默认值，对结果排序使
	//[0]元素为全部匹配的数组，[1]元素为第一个括号中的子模式所匹配的字符串组成的数组，依此类推的
	//PREG_SET_ORDER: 对结果排序，使[0]元素为第一组匹配项的数组，
	//[1]为第二组匹配项的数组，依此类推
	// $dataArray 是这里为匹配成的数组结果取的数组名称，不是原有的数组！！！！！！！！！！！！！！
	// $dataArray 是这里为匹配成的数组结果取的数组名称，不是原有的数组！！！！！！！！！！！！！！
	// $dataArray 是这里为匹配成的数组结果取的数组名称，不是原有的数组！！！！！！！！！！！！！！
	if(preg_match_all($pattern,$regularString,$dataArray,PREG_SET_ORDER)){
		//$i=0;
		$j=0;
		foreach($dataArray as $key=>$value){
			//echo $key.$value;
			//每组数据只有几个，但是有些组数据残缺，
			//所以要以行为单位进行,所以把此函数调用到每一行的数据读取中去最好
			//if($i%7==0){
			//$dataArr[$i][$j]= $value[1];
			/* foreach($value as $key1=>$value1){
			echo $key1.'和'.$value1."<br>";
			} */
			$dataArr[$j]=$value[0];
			$j++;
			//$i++;
		}
		//每次数据遍历后面加上换行
		//$dataArr[$j]=$value[1];
		$j=0;
		//把数组返回
		//echo "测试".$dataArr[5];
		//return "测试".$dataArr;
		return $dataArr;
	}else{
		echo "数字匹配失败！<br>";	
	}
}


//只要数据，便于进行各种数据操作
//正则匹配，找出数字
//把数据用正则表达式匹配成数组，参数：需要转换的字符串
//可以以参数传入正则表达式。---因为考虑到日期，期数编号等信息
//可以改进：设置读取个数---设置个数，用for循环每次只读取一个
function regular_data_array($string){
	//1到36之间的一个数。/反斜杠为定界符
	$pattern='/[1-36]/is';
	//正则表达式----0和9之间的数字有1个或2个
	//$pattern='/[0-9]{1,2}/is';
	//要么是1-9，或10-29,或30-36的数。/反斜杠为定界符
	//$pattern='/[1-9]{1}|([1-2]{1}[0-9]{1})|[3][0-6]{1}/is';
	//需要转换的字符串
	$regularString=$string;
	//把数据regularString按照正则pattern的方式存到dataArray数组中。
	//PREG_SET_ORDER 的作用：读取得到的数组中下标为0的元素为整个结果，下标为1的元素为值
	if(preg_match_all($pattern,$regularString,$dataArray,PREG_SET_ORDER)){
		//$i=0;
		$j=0;
		$k=1;
		//foreach($dataArray as $key=>$value){
		foreach($dataArray as $value){
			//echo $value[0];
			
			//每组数据只有几个，但是有些组数据残缺，
			//所以要以行为单位进行,所以把此函数调用到每一行的数据读取中去最好
			//if($i%7==0){
			//$dataArr[$i][$j]= $value[1];
			//$dataArr[$j]=$value[1];
			$dataArr[$j]=$value[0];
			$j++;
			//$i++;
		}
		//每次数据遍历后面加上换行
		//$dataArr[$j]=$value[1];
		$j=0;
		//把数组返回
		return $dataArray;
	}else{
		echo "介词匹配失败！<br>";	
	}
}


//比较源数据自身是否有重复数据
/* function repeatFind(){
	if(!file_exists()) 
	{ 
		//检查是否有该文件夹，如果没有就创建，并给予最高权限 
		mkdir("$path");
		echo "文件夹：$path创建成功！<br>";
	}else{
		echo "对不起，文件夹：$path已经存在，请改换文件名！<br>";
		return FALSE;
	}
	for(){
		for(){
		}
	
	}
} */

?>