<!DOCTYPE html>
<!--  如果没有此声明，IE低版本将不能解释固定在两边的盒子 -->

<html>
<head>
<title>各种统计的结果</title>
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
-----------本页面共有两个统计结果，这在前面的一个好像详细些
<br><br><br>

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
		echo '这里有方法数量：'.count($method_odd_even_count).'种。<br><br>';
		foreach($method_odd_even_count as $key=>$value)
		{
			echo "奇偶方法下标为：  ".$value['method_id']."  历史出现的次数为：----".$value['times']."次！<br>";
			
				/*
					//存入记录的数据表
				$sql = "INSERT INTO counts_odd_even (id, method_id, count) VALUES ('',  ".$value['method_id'].', '.$value['times'].")";
				// $sql = "UPDATE counts_odd_even set id = ($key+1) where number = $j";
				// $sql = "UPDATE counts_odd_even set id = ($key+1) where id = ($key+2)";
				 $result = mysql_query($sql); 
			*/
		} 
		echo '<br><br><br>';

		
		
		echo '-------统计各个除3余方法历史出现过的次数（感觉难以人为参考）。'.'<br><br>';
/* 
		$method_divide_three_count = count_divide_three_method();
		echo '这里有方法数量：'.count($method_divide_three_count).'种。<br>';
		foreach($method_divide_three_count as $key=>$value)
		{
			
			if( !empty($value))
			{
			
				echo "除3余方法下标为：  ".$value['method_id']."  历史出现的次数为：----".$value['times']."次！<br>";
			}else{
				
				//echo "除3余方法下标为：  ".$value['method_id']."  历史出现的次数为：----".$value['times']."次！<br>";
			}
				/*
					//存入记录的数据表
				$sql = "INSERT INTO counts_divide_three (id, method_id, count) VALUES ('',  ".$value['method_id'].', '.$value['times'].")";
				// $sql = "UPDATE counts_odd_even set id = ($key+1) where number = $j";
				// $sql = "UPDATE counts_odd_even set id = ($key+1) where id = ($key+2)";
				 $result = mysql_query($sql); 
				 * /
		}
 */
		echo '<br><br><br>';

		?>
	</div>
	<div id="dataask">
		<br>
		<br>
		<?php
		
		echo '-------统计各个奇偶方法历史出现过的次数。'.'<br>';
		$method_odd_even_count = count_odd_even_method();
		echo '这里有方法数量：'.count($method_odd_even_count).'种。<br><br>';
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
		<br>

		<br>
		统计奇偶比方法出现次数。<br>
		统计单个数据的历史出现总次数：-------注释了单个数据的统计<br><br>
		
		统计奇偶比方法出现次数。<br>
		<?php
		$odd_even_proportion_count = count_odd_even_proportion_method();
		for($j=1; $j<8; $j++){
			//echo $CountOne[$j];
			echo "奇偶比：".($j)."出现的次数为：".$odd_even_proportion_count[$j]."次。<br>";
			
		}
		
		echo "<br><br>	";
		echo "统计单个数据的历史出现总次数：-------注释了单个数据的统计<br><br>	";
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
	</div>
	<div id="datalast">
		占位：<br>
		<?php
		?>
	</div>
</div>


<div id="topface">
<div id="datas">
	<!--
	-->
	<div id="method_history">
		<br>
		<br>
		
	</div>
	<div id="method_history">
		<br>
		<br>
		
	
	</div>
	<div id="method_history">
		
		<br>
		<br>
		
		<?php
		/*
		*/
		?>
	</div>
	<div id="datalast">
		占位：：<br>
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