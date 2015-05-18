<!DOCTYPE html>
<!--  如果没有此声明，IE低版本将不能解释固定在两边的盒子 -->

<html>
<head>
<title>一次性操作页面</title>
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

<div id="methods">
	操作选择区：<br>
	
<?php

	echo '-------奇偶方法存数据库'.'<br><br>';
	//编号重新从1开始，已经清除全部
	//奇偶方法存数据库
	//odd_even();
	
	
	echo '-------除3求余的所有方法存入数据库'.'<br><br>';
	//存入不全，分几次存入最好，已经清除全部
	//除3求余的所有方法存入数据库
	//devide_three();

	
	echo '-------把核心数据存入数据库'.'<br><br>';
	//把核心数据存入数据库
	//把核心数据存入数据库
	//data_core();



	echo '-------数据库中的各个奇偶方法属于哪种奇偶比，得出并存入数据库。'.'<br><br>';
	// judge_save_odd_even_proportion($i_start, $n_end);
	//judge_save_odd_even_proportion();
	

	echo '-------定有每组数据的各个数据的奇偶情况，把结果保存到对应数据在核心数据表中的相应属性值'.'<br><br>';
	//奇数偶数的判断并更新到数据库中数据组的相应属性
	//分别对每组数据的每个数据进行辨别
	//得出奇偶比例
	//得出奇偶分布顺序
	//得出除3余数
	//把得出的结果的对应编号放到数据库中数据尾部的属性里面

	//开始处理的下标
	$i_start = 1350;

	//结束处理的下标
	$n_end = 1723;
	
	//开始处理的下标
	$i_start = 0;
	$i_start = 500;
	$i_start = 1000;
	$i_start = 1500;

	//结束处理的下标
	$n_end = 500;
	$n_end = 1000;
	$n_end = 1500;
	$n_end = 1724;

	//每次增加多少，既是每次处理多少
	$asc_num = 100;

	//参数nowArray是页面的即时数据
	//odd_even_dispose($nowArray, $i_start, $n_end);

	
?>
</div>	


<div id="methods">
		<br><br>
		添加最新的数据到数据库：
		<br>
		网上复制，粘贴到excel表格，复制其中需要的核心数据，放到一个新建文件里进行一下操作：
		<br>
		读文件里的数据成以行为单位的数组；<br>
		<?php
			$fileName = 'newdatatoadd.txt';
			$string = readAsArry($fileName);	
			foreach($string as $key1=>$value1)
			{
				echo "第 ".$key1." 的值： ".$value1.'<br>';
			}
			echo '---------------------<br>';
		?>
		<br>
		<br>
		<br>
		把以行为单位的数组读成单独的数据数组（用于之后存入数据库）；<br>
		<?php
			// $new_data_array_to_add = regularDocumentArray($string);	
			// foreach($new_data_array_to_add as $key=>$value)
			// {
				// echo "第 ".$key." 的值：------ ".$value.'<br>';
				// echo "------ -------------------------<br>";
				// foreach($value as $key1=>$value1)
				// {
					// echo "第 ".$key1." 的值： ".$value1.'<br>';
				// }
			// }
			
			echo "未能实现输出用于补全excel表格的数据-------------------------失败，不知道是字体大小<br>";
			
			//用于把需要新添加的数据进行倒序存入数据库的实现
			$i = 0;
			foreach($string as $key=>$value)
			{
				$new_data_array_to_add = regularDocumentArray($value);
				
				//输出用于补全excel表格的数据
				// foreach($new_data_array_to_add as $key1=>$value1)
				// {
					// // echo "第 ".$key1." 的值： ".$value1.'<br>';
					// // echo "第 ".$key1." 的值： ".$value1.' ';
					// echo $value1.' ';
				// }
				// echo "<br> ";
				//输出用于补全excel表格的数据
				// 输出用于补全excel表格的数据-------------------------失败，不知道是字体大小
				// echo "输出用于补全excel表格的数据-------------------------失败，不知道是字体大小<br>";
				// echo $new_data_array_to_add[0].'-';
				// echo $new_data_array_to_add[1].'-';
				// echo $new_data_array_to_add[2]." ";
				// echo $new_data_array_to_add[3]." ";
				// echo $new_data_array_to_add[4]." ";
				// echo $new_data_array_to_add[6]." ";
				// echo $new_data_array_to_add[7]." ";
				// echo $new_data_array_to_add[8]." ";
				// echo $new_data_array_to_add[9]." ";
				
				
				// echo $new_data_array_to_add[0].'-';
				// echo $new_data_array_to_add[1].'-';
				// echo $new_data_array_to_add[2]." ";
				// echo $new_data_array_to_add[3]." ";
				// echo $new_data_array_to_add[4]." ";
				// echo $new_data_array_to_add[6]." ";
				// echo $new_data_array_to_add[7]." ";
				// echo $new_data_array_to_add[8]." ";
				// echo $new_data_array_to_add[9]." ";
				// echo "<font style='font-size:13;'>".$new_data_array_to_add[0].'</font >-';
				// echo $new_data_array_to_add[1].'-';
				// echo $new_data_array_to_add[2]." \t";
				// echo $new_data_array_to_add[3]." \t";
				// echo $new_data_array_to_add[4]." \t";
				// echo $new_data_array_to_add[6]." \t";
				// echo $new_data_array_to_add[7]." \t";
				// echo $new_data_array_to_add[8]." \t";
				// echo $new_data_array_to_add[9]."</font >"." \t";
				// echo "<br> ";
				
				
				//组建需要添加的新数据的数组
				for($j=0; $j<6; $j++)
				{
					$new_data_array[$i][$j] = $new_data_array_to_add[$j + 4];
					
					// if($new_data_array_to_add[$j + 4] == 01)
					// {
						// $new_data_array[$j] = 1;
					// }else
					// if($new_data_array_to_add[$j + 4] == 02)
					// {
						// $new_data_array[$j] = 2;
					// }else
					// if($new_data_array_to_add[$j + 4] == 03)
					// {
						// $new_data_array[$j] = 3;
					// }else
					// {
					// .....
					// }else
					// {
						// $new_data_array[$j] = $new_data_array_to_add[$j + 4];
					// }
				}
				
				
				//得出改组数据的奇偶比方法的ID
				// $new_data_array[7] = new_data_array_odd_even_in_proportion($new_data_array);
				
				//得出改组数据的奇偶奇，奇偶比，除3余3个方法的ID
				$method_ids = new_data_array_methods_dispose($new_data_array[$i]);
				
				
				
				// 得出改组数据的奇偶奇方法的ID
				$new_data_array[$i][6] = $method_ids[0];
				$new_data_array[$i][7] = $method_ids[1];
				$new_data_array[$i][8] = $method_ids[2];
				$i ++;
				
				
				
				//添加存入数据库------------倒序存，因为网上得到的数据是倒序的
				
				// foreach($new_data_array as $key1=>$value1)
				// {
					// // echo "第 ".$key1." 的值： ".$value1.'<br>';
					// echo "第 ".$key1." 的值： ".$value1.' ';
				// }
				// echo '<br>';
				// foreach($new_data_array as $key1=>$value1)
				// {
					// // echo "第 ".$key1." 的值： ".$value1.'<br>';
					// echo $value1.' ';
				// }
				
				// echo '<br>';
				// echo "第 ".$key." 的值：------ ".$value.'<br>';
				// echo "------ -------------------------<br>";
				// foreach($new_data_array_to_add as $key1=>$value1)
				// {
					// // echo "第 ".$key1." 的值： ".$value1.'<br>';
					// echo "第 ".$key1." 的值： ".$value1.'<br>';
				// }
				// echo '<br><br>';
			}
			
			echo "查看数组结果<br>";
			//查看数组结果
			// foreach($new_data_array as $key=>$value)
			// {
				// foreach($value as $key1=>$value1)
				// {
					// // echo "第 ".$key1." 的值： ".$value1.'<br>';
					// echo $value1.' ';
				// }
				// echo '<br><br>';
			// }
			
			
			echo "把核心数据存入数据库；------------------为了避免多次存入数据库，导致数据混乱，需要手动开启<br>";
			echo "倒序存入，添加存入数据库------------倒序存，因为网上得到的数据是倒序的<br>";
				echo  '<br><br>';
				// //倒序存入，添加存入数据库------------倒序存，因为网上得到的数据是倒序的
			$start_i = count($new_data_array)-1;
			for($j=$start_i; $j>=0; $j--)
			{
				// //倒序存入，添加存入数据库------------倒序存，因为网上得到的数据是倒序的
				// $sql = "UPDATE data_core SET odd_even_id = "." '$odd_even_id',"." divide_three_id = "." '$divide_three_id', "." odd_even_proportion_id = "." '$odd_even_proportion_id'"." WHERE id = "."'$id' ";
				// $result = mysql_query($sql);
				// $sql = "INSERT INTO data_core (id, one, two, three, four, five, six) VALUES ('', ".$nowArray[$i][0].', '.$nowArray[$i][1].', '.$nowArray[$i][2].', '.$nowArray[$i][3].', '.$nowArray[$i][4].', '.$nowArray[$i][5].")";
				
				// 测试数据的准确性
				// foreach($new_data_array[$j] as $key1=>$value1)
				// {
					// // echo "第 ".$key1." 的值： ".$value1.'<br>';
					// // echo $key1.'--'.$value1.' ';
					// echo $value1.' ';
				// }
				// echo  '<br><br>';
				
				
				
				// 把核心数据存入数据库；------------------为了避免多次存入数据库，导致数据混乱，需要手动开启
				// $sql = "INSERT INTO data_core (id, one, two, three, four, five, six, odd_even_id, odd_even_proportion_id, divide_three_id ) VALUES ('', ".$new_data_array[$j][0].', '.$new_data_array[$j][1].', '.$new_data_array[$j][2].', '.$new_data_array[$j][3].', '.$new_data_array[$j][4].', '.$new_data_array[$j][5].', '.$new_data_array[$j][6].', '.$new_data_array[$j][7].', '.$new_data_array[$j][8].")";
				// $result = mysql_query($sql);
			}
			
		?>
		<br>
		<br>
		<br>
		
		<?php
		?>
</div>

<div id="askTable">
		<br><br>
		<br>
	占位
<?php
	
?>
</div>

以下是一些常规信息：<br>
<div id="datas">
	<!--
	-->
	<div id="method_history">
		<br><br>
		<br>
	占位
	</div>
	<div id="dataask">
		<br><br>
		<br>
	占位
	</div>
	
	<div id="datalast">
		
		<?php
		?>
		<br><br>
		<br>
	占位
	</div>
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