<!DOCTYPE html>
<!--  如果没有此声明，IE低版本将不能解释固定在两边的盒子 -->

<html>
<head>
<title>历史数据1-33位置排列</title>
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
	历史数据，各个方法：<br>
	<?php
	
	// 得到核心数据表的所有数据
	// 得到核心数据表的所有数据
	// 得到核心数据表的所有数据
	$sql = "SELECT one, two, three, four, five, six, odd_even_proportion_id, odd_even_id, divide_three_id FROM data_core ";// by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
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
	
	//得到所有奇偶级方法
	//得到所有奇偶级方法
	//得到所有奇偶级方法
	// 获取奇偶比的全部方法----------ID与查询结果的默认相差1，所以可以直接进行根据ID获取！！！！
	// $sql = "SELECT odd_count FROM method_odd_even_proportion ";// by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
	// $result = mysql_query($sql);
	
	// 获取奇偶奇的全部方法----------ID与查询结果的默认相差1，所以可以直接进行根据ID获取！！！！
	// $sql = "SELECT id, one, two, three, four, five, six, odd_even_id, odd_even_proportion_id, divide_three_id FROM data_core ";// by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
	$sql = "SELECT one, two, three, four, five, six FROM method_odd_even ";// by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
	$result = mysql_query($sql);
	
	//得到所有奇偶级方法
	//初始化
	$method_odd_evens = array();
	$i = 0;
	while($this_row = mysql_fetch_row($result))
	// while( $row = mysql_fetch_array($result))
	{
		// $method_odd_evens[$i + 1] = $this_row;
		$method_odd_evens[$i] = $this_row;
		++$i;
	}
	
	// 获取除3余的全部方法
	// 获取除3余的全部方法
	// 获取除3余的全部方法
	// 获取除3余的全部方法----------ID与查询结果的默认相差1，所以可以直接进行根据ID获取！！！！
	// $sql = "SELECT id, one, two, three, four, five, six, odd_even_id, odd_even_proportion_id, divide_three_id FROM data_core ";// by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
	$sql = "SELECT one, two, three, four, five, six FROM method_divide_three ";// by goods_id desc limit ". ($page-1)*$page_size .", $page_size";    
	$result = mysql_query($sql);
	
	//初始化
	$method_divide_threes = array();
	$i = 0;
	while($this_row = mysql_fetch_row($result))
	// while( $row = mysql_fetch_array($result))
	{
		// $method_odd_evens[$i + 1] = $this_row;
		$method_divide_threes[$i] = $this_row;
		++$i;
	}
	
	
	/* 
		a按1-33的位置输出
	*/
	echo '<div class="nums">';
	for($j=1; $j<34; ++$j){
			if($j<10)
			{
				echo '<span class="num">0'.$j.'</span>';
			}else{
				echo '<span class="num">'.$j.'</span>';
			}
	}
	echo '<span class="num" style="width:55px;margin-left:-2px;">奇偶比</span>';
	echo '</div>';
	foreach($datas as $key=>$value)
	{
		$k=0;
		echo '<div class="nums">';
		for($j=1; $j<34; ++$j){
			if($value[$k] == $j && $k<6){
				if($value[$k]<10)
				{
					echo '<span class="num">0'.$value[$k].'</span>';
				}else{
					echo '<span class="num">'.$value[$k].'</span>';
				}
				$k ++;
			}else{
				echo '<span class="num"></span>';
			}
		}
		echo '奇偶比：';
		echo '<span class="num">'.( 7- $value[6]).":".($value[6]-1).'</span>';
		// echo '<span class="num">奇偶比：'.( 7- $value[6]).":".($value[6]-1).'</span>';
		// echo '-----奇偶比：'.( 7- $value[6]).":".($value[6]-1).'；';
		echo '</div>';
		echo '<br>';
	}
	
	/* 
		输出显示详细信息
		原来的输出，只是加了span做间隔格式 
		2015.6.24
	*/
	foreach($datas as $key=>$value)
	{
		echo $key.'：';
		for($i=0; $i<6; ++$i){
		
			// echo $value[$i].',';
			echo '<span class="num">'.$value[$i].'</span>,';
		}
		echo '-----奇偶比：'.( 7- $value[6]).'；';
		// echo '奇偶比：'.$value[6].'；';
		// echo '奇偶比：'.$value[7].'；';
		// echo '奇偶比：'.$value[8].'；';
		
		echo '----------奇偶奇ID：'.($value[7]).'：';
		for($i=0; $i<6; ++$i){
		
			// echo $method_odd_evens[$value[7]-1][$i].',';
			echo $method_odd_evens[$value[7]-1][$i];
		}
		echo '；';
		
		
		echo '----------除3余ID：'.($value[8]).'：';
		for($i=0; $i<6; ++$i){
		
			// echo $method_divide_threes[$value[8]-1][$i].',';
			echo $method_divide_threes[$value[8]-1][$i];
		}
		echo '；<br>';
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