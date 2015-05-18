<!DOCTYPE html>
<!--  如果没有此声明，IE低版本将不能解释固定在两边的盒子 -->

<html>
<head>
<title>1-33单个数字分析 方法浏览</title>
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
		for($j=1; $j<34; $j++)
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
<div id="methods">
	方法选择区：<br>
	<br>
	1.选择奇偶比例：<br>
	<?php
		echo '奇偶比例情况共有7种。<br>';
		out_odd_even_proportion();
		echo '<br>';
	?>
	<br>
	2.选择奇偶分配方式：<br>
	<?php
		echo '奇偶情况共有64种。<br>';
		out_odd_even();
		echo '<br><br>';

	?>
	3.选择除3余数：（太多，注释了）<br>
	<?php
	// out_divide_three();
	echo '<br><br><br>';
	?>
</div>	

(进行预处理，把首字母相同的放到一个数组中，形成3维数组或更多维的数组
<br>
减少每次的比较量，如500,800组一次等还是的量很大，在config页面做了数据数组预处理

//定义一个，避免在没有重复数据的时候后边的输出报错
$sameCount[1]=0;
<br>循环次数----即是数据总条数为：<?php echo count($nowArray) ?>。<br>;
以下是一些常规信息：<br>
<div id="datas">
	<!--
	-->
	<div id="method_history">
		<br>
		<br>
		<?php
		
		echo '-------统计各个奇偶方法历史出现过的次数。'.'<br>';
		$method_odd_even_count = count_odd_even_method();
		echo '这里有方法数量：'.count($method_odd_even_count).'种。<br>';
		foreach($method_odd_even_count as $key=>$value)
		{
			echo "奇偶方法下标为：  ".$value['method_id']."  历史出现的次数为：----".$value['times']."次！<br>";
			
			//输出详细信息
			get_odd_even_by_id($value['method_id']);
				/*
					//存入记录的数据表
				$sql = "INSERT INTO counts_odd_even (id, method_id, count) VALUES ('',  ".$value['method_id'].', '.$value['times'].")";
				// $sql = "UPDATE counts_odd_even set id = ($key+1) where number = $j";
				// $sql = "UPDATE counts_odd_even set id = ($key+1) where id = ($key+2)";
				 $result = mysql_query($sql); 
			*/
		} 
		echo '<br><br>';
	?>
	</div>
	<div id="method_history">
	<?php
		echo '-------统计各个除3余方法历史出现过的次数（感觉难以人为参考）。'.'<br><br>';
/* */
		$method_divide_three_count = count_divide_three_method();
		echo '这里有方法数量：'.count($method_divide_three_count).'种。---------注释了详细信息<br>';
		// foreach($method_divide_three_count as $key=>$value)
		// {
			
			// if( !empty($value))
			// {
			
				// echo "除3余方法下标为：  ".$value['method_id']."  历史出现的次数为：----".$value['times']."次！<br>";
			// }else{
				
				// //echo "除3余方法下标为：  ".$value['method_id']."  历史出现的次数为：----".$value['times']."次！<br>";
			// }
				// /*
					// //存入记录的数据表
				// $sql = "INSERT INTO counts_divide_three (id, method_id, count) VALUES ('',  ".$value['method_id'].', '.$value['times'].")";
				// // $sql = "UPDATE counts_odd_even set id = ($key+1) where number = $j";
				// // $sql = "UPDATE counts_odd_even set id = ($key+1) where id = ($key+2)";
				 // $result = mysql_query($sql); 
				 // */
		// }
 
		echo '<br><br>';

		?>
	</div>
	<div id="method_history">
		统计单个数据的历史出现总次数：-------注释了单个数据的统计<br><br>
		<?php
		/*
		*/
		//统计单个数据的历史出现总次数
		$CountOne=count_one_history($nowArray,33);
		$numberCount=count($CountOne);
		echo "数据个数：".$numberCount."个。<br>";
		
		for($j=1; $j<34; $j++){
			//echo $CountOne[$j];
			echo "数据：".($j)."出现的次数为：".$CountOne[$j]."次。<br>";
			
		}
		
		?>
		
		<?php
		//已经运行得出结果证明，里面没有重复数据出现过
		//声明一个数组，存储各个相同数组的相同次数---避免没有相同的，所以给了一个值
		/*
		for($j=1; $j<40; $j++){
			$sameCount[$j]=0;
		}
		*/


		//点击对数据进行统计，找出有一定个数相同的数组
		if(@ $_POST["ToStatistics"]){

			//统计有$sameN个相同数据的数组
			$sameN = 5;

			//每组数据有6个数据
			$N=6;
			
			//计算数据的不同个数
			$diffrentN = $N-$sameN;

			//调用统计函数实现统计
			same_n_statistics($nowArray,$arrayMesage,$N,$sameN);

			//输出各组相同数组的相同次数
			if(count($sameCount) != 1)
			{
				foreach($sameCount as $key=>$value)
				{
					echo "下标为：".$key."的数组相同的次数为：----".$value."次！<br>";
					echo "数组详细信息为：".$arrayMesage[$key]."<br><br><br>";
					//echo $value."<br>";
				}
			}else{
				echo "抱歉。先生，现目前还没有重复".$sameN."个数据的数组！<br>";
			}
		}
		?>
		<br><br><br>
		<?php
		/*
		*/
		?>
	</div>
	<div id="datalast">
		上次结果：<br>
		<?php
		?>
	</div>
</div>

<div id="askTable">
要求的操作结果显示：<br>
<?php
	/*
	//只能统计一维数组
	$count_result = array_count_values($nowArray);
	
	foreach($count_result as $key=>$value){
		//echo "x下标：".$key."，值：".$value."次！<br>";
		//echo "数组详细信息为：".$arrayMesage[$key]."<br><br>".'</font>';
		//echo $value."<br>";
		
		foreach($count_result as $key=>$value){
			echo "x下标：".$key."，值：".$value."次！<br>";
			//echo "数组详细信息为：".$arrayMesage[$key]."<br><br>".'</font>';
			//echo $value."<br>";
		}
	}
	*/
	
//按钮操作
//《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《<

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