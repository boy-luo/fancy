
<?php

//链接数据库
//include ("conn.php");


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
				echo $i."进行下一次比较！<br>";
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


//除3求余的所有方法---例如：0,2,0,0，0,0
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
		$sql = "INSERT INTO data_core (id, one, two, three, four, five, six) VALUE ('', ".$nowArray[$i][0].', '.$nowArray[$i][1].', '.$nowArray[$i][2].', '.$nowArray[$i][3].', '.$nowArray[$i][4].', '.$nowArray[$i][5].")";
		//"INSERT INTO mytable (title, name, date) VALUES ('My title', 'My name', 'My date') ";
		//$sql = "select * from goods_book order by goods_id desc limit ". ($page-0)*$page_size .", $page_size";    
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
							// 这里存入了奇偶表里面了？？ method_odd_even
							// 数据库里面的方法都是对的，知识我不知道哪里把代码改错了
							// 删除了部分代码的
							$sql = "INSERT INTO method_devide_three (id, one, two, three, four, five, six) VALUE ('', ".$i.', '.$j.', '.$k.', '.$l.', '.$m.', '.$n.")";
							//"INSERT INTO mytable (title, name, date) VALUES ('My title', 'My name', 'My date') ";
							//$sql = "select * from goods_book order by goods_id desc limit ". ($page-0)*$page_size .", $page_size";    
							$result = mysql_query($sql);
						}
					}
				}
			}
		}
	}
}



//奇数偶数的所有方法---例如：奇偶奇奇偶奇
function odd_even()
{
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
							// 当时是直接由除3余方法改来的
							$sql = "INSERT INTO method_odd_even (id, one, two, three, four, five, six) VALUE ('', ".$i.', '.$j.', '.$k.', '.$l.', '.$m.', '.$n.")";
							//"INSERT INTO mytable (title, name, date) VALUES ('My title', 'My name', 'My date') ";
							//$sql = "select * from goods_book order by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
							$result = mysql_query($sql);
						}
					}
				}
			}
		}
	}
}


//奇数偶数的所有方法---例如：奇偶奇奇偶奇
function odd_even111()
{
	//include ("conn.php");
	$i = 1;
	$j = 1;
	$k = 1;
	$l = 1;
	$m = 1;
	$n = 1;
	for($n=1; $n<65; $n++)
	{
		if($n == 3)
		{
			//因为是从1开始的，所以都是以3结束
			$m = $m + $n%3;
			$l = $l + $m%3;
			$k = $k + $l%3;
			$j = $j + $k%3;
			$i = $i + $j%3;
			$n = 0;
		}
		//$n ++;
		$sql = "INSERT INTO odd_even (id, one, two, three, four, five, six) VALUE ('', ".$i.', '.$j.', '.$k.', '.$l.', '.$m.', '.$n.")";
		//"INSERT INTO mytable (title, name, date) VALUES ('My title', 'My name', 'My date') ";
		//$sql = "select * from goods_book order by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
		$result = mysql_query($sql);
	}
}

//奇数偶数的所有方法---例如：奇偶奇奇偶奇
function odd_even_out()
{
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
			/*
			
		if($n % 2 == 0)
		{
			//因为是从1开始的，所以都是以3结束
			$m = $m + $n%3;
			$l = $l + $m%3;
			$k = $k + $l%3;
			$j = $j + $k%3;
			$i = $i + $j%3;
			$n = 0;
		}
		*/
		if($n % 2 == 1 && $n != 1) 
		{
			//
			$m = $m + $n%2;
			$l = $l + $m%2;
			$k = $k + $l%2;
			$j = $j + $k%2;
			$i = $i + $j%2;
			$n = 0;
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
			//echo "<button style='height: 40px; font-size:19px; color:blanck;' >$out</button>";
			//echo $out;
		/*
		if($i % 2 == 0)
		{
			echo '偶：';
		}else{
			echo '奇：';
		}
		
			if($j % 2 == 0)
			{
								$i ++;
				echo '偶：';
			}else{
				echo '奇：';
			}
			
				if($k % 2 == 0)
				{
								$j ++;
					echo '偶：';
				}else{
					echo '奇：';
				}
				
					if($l % 2 == 0)
					{
								$k ++;
						echo '偶：';
					}else{
						echo '奇：';
					}
					
						if($m % 2 == 0)
						{
								$l ++;
							echo '偶：';
						}else{
							echo '奇：';
						}
						
							if($n % 2 == 0)
							{
								$m ++;
								echo '偶：'."...\t";
							}else{
								echo '奇：'."...\t";
							}
		*/
		
		
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
							//$sql = "INSERT INTO method_odd_even (id, one, two, three, four, five, six) VALUE ('', ".$i.', '.$j.', '.$k.', '.$l.', '.$m.', '.$n.")";
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
			$is_eve = $array[$i][$j] % 2;
			
			//如果是偶数
			if( $is_eve == 0)
			{
				//偶数计数器加1
				$even_numb ++;
				
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
		/*
		$sql = "UPDATE data_core SET odd_even_id = "." '$odd_even_id',"." divide_three_id = "." '$divide_three_id', "." odd_even_proportion_id = "." '$odd_even_proportion_id'"." WHERE id = '1' ";
		$sql = "UPDATE data_core SET odd_even_id = "." '$odd_even_id',"." divide_three_id = "." '$divide_three_id', "." odd_even_proportion_id = "." '$odd_even_proportion_id'"." WHERE id = "."'$id' ";
		$sql = "UPDATE data_core SET odd_even_id = 3,"." divide_three_id = 4, "." odd_even_proportion_id = 5"." WHERE id = 1 ";
		$sql = "UPDATE data_core SET odd_even_id = '3',"." divide_three_id = '4', "." odd_even_proportion_id = '5'"." WHERE id = '1' ";
		$sql = "UPDATE data_core SET odd_even_id = '3', divide_three_id = '4', odd_even_proportion_id = '5' WHERE id = '1' ";
		$sql = "UPDATE data_core SET odd_even_id = 3, divide_three_id = 4, odd_even_proportion_id = 5 WHERE id = 1 ";
		$sql = "UPDATE data_core SET one = 350 WHERE id = '1' ";
		$sql = "UPDATE data_core SET one = '35',two = '23' WHERE id = '1' ";
		$sql = "UPDATE data_core SET one = 350 WHERE id = '$id' ";
		$sql = "UPDATE data_core SET odd_even_id = '3', divide_three_id = '4', odd_even_proportion_id = '5' WHERE id = '1' ";
		$sql = "UPDATE data_core SET odd_even_id = '3', divide_three_id = '4' WHERE id = '1' ";
		*/
		$sql = "UPDATE data_core SET odd_even_id = "." '$odd_even_id',"." divide_three_id = "." '$divide_three_id', "." odd_even_proportion_id = "." '$odd_even_proportion_id'"." WHERE id = "."'$id' ";
		//$sql = "UPDATE data_core SET odd_even_id = '3' WHERE id = '1' ";
		//$sql = "insert data_core SET odd_even_id = "." '$odd_even_id',"." odd_even_proportion_id = "." '$odd_even_proportion_id',"." divide_three_id = "." '$divide_three_id' "." WHERE id = '$i+1' ";
		//$sql = "INSERT INTO data_core (id, one, two, three, four, five, six) VALUE ('', ".$nowArray[$i][0].', '.$nowArray[$i][1].', '.$nowArray[$i][2].', '.$nowArray[$i][3].', '.$nowArray[$i][4].', '.$nowArray[$i][5].")";
			
		//$sql = "INSERT INTO method_odd_even (odd_even_id, odd_even_proportion_id, two, three, four, five, six) VALUE ('', ".$i.', '.$j.', '.$k.', '.$l.', '.$m.', '.$n.")";
		//$sql = "INSERT INTO method_odd_even (id, one, two, three, four, five, six) VALUE ('', ".$i.', '.$j.', '.$k.', '.$l.', '.$m.', '.$n.")";
		//"INSERT INTO mytable (title, name, date) VALUES ('My title', 'My name', 'My date') ";
		//$sql = "select * from goods_book order by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
		$result = mysql_query($sql);
		//echo 'cunl -=0=';
		
	}
	return true;
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
	foreach($arry as $key=>$value){
		echo $key."----";
		echo $value."<br>";
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