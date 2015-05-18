<!DOCTYPE html>
<!--  如果没有此声明，IE低版本将不能解释固定在两边的盒子 -->
<html>
<head>
<title>我的处理数据 首页</title>
<!--  使页面的编码是utf-8，避免在浏览器输出的是乱码   -->
<meta http-equiv="Content-type" content="text/html;charset=utf-8">
<!--  包含css文件   -->
<link rel = "stylesheet" type = "text/css" href = "data.css">
<?php 
//include ("config.php");
//include ("arraydirect.php");
//include ("functions.php");

//包含统一的头部导航文件
//include ("navigation.php");
?>
</head>
<body>
<div id="bodyface">
<a name="top"></a>
<?php
//输出时间，用于计算运行时间
$timestart=microtime();
//echo $test;
?>
<?php
//----------特殊操作之用
//重置
//SetSessions();
//查看成员
//CheckSessions();
//2.14.16.18.28.31. 5.8.16.19.27.28
//8.9.11.16.21.24
//6.10.11.14.17.33..1.6.13.29.31.33..3.6.9.11.25.29...2.4.11.13.25.33
?>
<div id="out">



<?php

//包含统一的头部导航文件
include ("navigation.php");

//$test = 0063;
/*
$test[0] = 02;
$test[1] = 04;
$test[3] = 05;
$test[2] = 08;
echo $test[2];
echo $test[1];
echo $test[0];
echo $test[3];
*/

//把核心数据此内容数据库 失败----01-09 的问题
//把核心数据此内容数据库
//data_core();

// $this_array = array(2,4,1,3,6,5);
// $arrays_statistics_with = array(1,2,3,5,6,7,8);
// $a = array_intersect($this_array, $arrays_statistics_with);
// foreach($a as $key=>$value)
// {
	// echo "下标为：".$key."的数组相同的次数为：----".$value."次！<br>";
	echo "数组详细信息为：".$arrayMesage[$key]."<br><br><br>";
	echo $value."<br>";
// }
?>

 ^:^<br><br>
以下是一些常规信息：<br>
<div id="datas">
	<!--
	<div >
		左边表单：操作<br>
		<form action="" method="post" style="border=5px;" name="Selectform">
			<input type="submit" name="nextTime"  value="创建下一个保存处理结果的文件夹" />
			<input type="submit" name="nextDispose"  value="创建下一个处理结果的存储txt" />
			<input type="submit" name="ToStatistics"  value="统计历史   有5个相同和数据的数组" />
			<input type="submit" name="randData"  value="一组随机数，并验证历史" />
			<input type="submit" name="sub"  value="创建此名称的文件" /><br>
			<input type="text" name="selectWords"  value="" />输入查询的数组<br>
			<input type="submit" name="sub"  value="提交" />
		</form>
	</div>
	-->
	<div id="dataorigin">
		原始数据：<br>
		<br>
	</div>
	<div id="dataask">
		(进行预处理，把首字母相同的放到一个数组中，形成3维数组或更多维的数组
		<br>
		减少每次的比较量，如500,800组一次等还是的量很大，在config页面做了数据数组预处理
		)
		<br><br>

		<?php
		//已经运行得出结果证明，里面没有重复数据出现过
		//声明一个数组，存储各个相同数组的相同次数---避免没有相同的，所以给了一个值
		/*
		for($j=1; $j<40; $j++){
			$sameCount[$j]=0;
		}
		*/
		
		//统计各个数字历史出现时的id，并把重要信息存入数据库
		// 需要改变的地方：
		// 函数里的数据表名称1_3，正在统计的数字
		$num = 1;
		// get_num_appear_id_interval($num);
		
		echo '加密的md5的数字是123'.'<br>';
		echo "加密的md5：".md5(123).'<br>';
		echo "加密的md5：".md5(3433).'<br>';
		echo "多次加密的md5：".md5(md5(md5(md5(md5(123))))).'<br>';
		// echo md5(202cb962ac59075b964b07152d234b70).'<br>';
		
		// ---------------修改相同的个数，和函数里的数据表名称（当计算量太大时还需要修改循环条件，分次完成）--------------------------------------------
		//定义一个，避免在没有重复数据的时候后边的输出报错
		// 用于记录有重复的数组的id
		$sameCount[1]=0;
		echo "<br>循环次数----即是数据总条数为：".count($nowArray)."----<br>";
		
			//统计有$sameN个相同数据的数组
			$sameN = 2;

			//每组数据有6个数据
			$N=6;
			
			//计算数据的不同个数
			$diffrentN = $N-$sameN;

			// $arrayMesage是有数据详细信息的直接数组，在专门的页面里，是被包含到此页面直接用的
			// $nowArray是有数据的核心处理数据的直接数组，在专门的页面里，是被包含到此页面直接用的
			//调用统计函数实现统计
			// same_n_statistics($nowArray,$arrayMesage,$N,$sameN);
			
			//存入数据库作为分析
			// statistics_same_n_array($nowArray,$arrayMesage,$N);

			//输出各组相同数组的相同次数
			// sameCount记录的是有重复的数组的id
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
			
		
		echo "可以进行统计指定有几个是相同的数组<br>";
		//点击对数据进行统计，找出有一定个数相同的数组
		if(@ $_POST["ToStatistics"]){

			//统计有$sameN个相同数据的数组
			$sameN = 5;

			//每组数据有6个数据
			$N=6;
			
			//计算数据的不同个数
			$diffrentN = $N-$sameN;

			// $arrayMesage是有数据详细信息的直接数组，在专门的页面里，是被包含到此页面直接用的
			// $nowArray是有数据的核心处理数据的直接数组，在专门的页面里，是被包含到此页面直接用的
			//调用统计函数实现统计
			echo "可以进行统计指定有几个是相同的数组<br>";
			same_n_statistics($nowArray,$arrayMesage,$N,$sameN);
			
			//因为是最后一组数据的统计，所以必定为0，返回值页没有用
			// $sameCount = same_n_statistics($nowArray,$arrayMesage,$N,$sameN);

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

		<br>
		统计单个数据的历史出现总次数：-------注释了单个数据的统计<br><br>
		<?php
		/*
		
		//统计单个数据的历史出现总次数
		$CountOne=count_one_history($nowArray,33);
		$numberCount=count($CountOne);
		echo "数据个数：".$numberCount."个。<br>";
		
		for($j=1; $j<34; $j++){
			//echo $CountOne[$j];
			echo "数据：".($j)."出现的次数为：".$CountOne[$j]."次。<br>";
			
		}
		*/
		?>
	</div>
	<div id="datalast">
		上次结果：<br>
		<?php
		?>
	</div>
</div>
<?php
//数据显示区域结束
//》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》>
?>


<div id="tables">
表单：<br>

<?php
//操作表单的区域
//《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《<
?>
<div id="tableleft">
	左边表单：操作<br>
	<!--
	-->
	<form action="" method="post" style="border=5px;" name="Selectform">
		<input type="submit" name="nextTime"  value="进入下一次处理，创建下一个处理文件" />
		<input type="submit" name="nextDispose"  value="进行下一次数据处理，创建下一个处理结果的存储txt" />

		<input type="submit" name="ToStatistics"  value="统计历史   有5个相同和数据的数组" />
		<input type="submit" name="randData"  value="一组随机数，并验证历史" />
		<input type="submit" name="sub"  value="创建此名称的文件" />
		<input type="text" name="txtName"  value="" />输入要处理的txt文件名称(需要提前将文件存入指定文件夹下，其中可以包含有中文但不作处理)<br>
		<input type="text" name="txtFile"  style="width=500px"  style="height=100px" value="" />或者输入需要处理的英文文章(其中可以包含有中文但不作处理)<br>
		<input type="text" name="selectWords"  value="" />输入查询的数组<br>
		<input type="text" name="ignorWords"  value="" />输入设定要忽略的数组<br>
		<input type="text" name="topN"  value="" />输入设定要显示数组排名的前多少组<br>
		<input type="text" name="topN"  value="" />24法则及数据录入，历史重复？ 还未出现过的数组，出现数组的集中性分析<br>
		<input type="submit" name="sub"  value="提交" />
	</form>
	
</div>
<?php
//操作表单的区域结束
//》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》>
?>


<div id="tableright">
	右边表单：文件名称---------注释了文件夹遍历显示
	<?php
	//遍历现有的文件
	//声明一个变量，记录文件个数
	$fileNum = 0;
	//$dirname = './';
	$dirname = $_SESSION["data"]["folderPath"];
	echo "函数遍历文件夹！<br>";

	//调用遍历文件夹函数
	//ergodicFolder($dirname);
	?>
</div>
</div>
<br><br><br>
</div>

<!--   底部的网站声明  -->
<div id="foot">
	感谢，，，的大力支持。
	<br>
	欢迎入驻本站。
	<br>
	有需要合作请联系：QQ704863481。
	<br>

	<?php
	//输出时间，用于计算运行时间
	$timeend=microtime();
	echo "<br>页面开始运行的详细时间是：".$timestart."!<br>";
	echo "页面结束运行的详细时间是：".$timeend."!<br><br>";
	echo "页面运行的总时间是：".($timeend-$timestart)."!<br>";
	?>
</div>

<div id="">
</div>

<div border=2px>
	词频统计软件总结的心得：

	实现功能：
	1：输入文件名，或文章进行分析词频
	---文件内可以存在中文，系统会自动踢出中文
	2：可以自动分析文章内所有词汇的词频，也可以设置自己需要的词汇进行词频收索
	.....
	---缺点：输出词频时若还有和最后一个排名单词同排名的单词，不能输出，因为设定了输出个数
	---改进方法：在末尾进行继续比较，若相同则输出，若不同则停止。

	运用到的知识：
	1：提供表单：进行自定义的各种操作
	2：文件的打开与关闭，存取，
	3：正则表达式的运用，提取英文单词
	.....

	缺点：
	1：代码重复严重，如果数据重要性不高，可以改成函数操作
	若数据重要，可以改成对象操作实现封装


	感想与收获：
	工作之前没有准备，没有书写计划书，过程沿着思路去实现
	缺乏工程思想，思路和实现顺序，实现方式等没有清晰计划

	收获：1：开始工作之前书写概要计划书，再写详细计划书很有必要，
	它可以帮助理清思路，详细功能，详细实现步骤，明确每步工作
	2：发现需要用到的知识，计划选择好需要的方式，如对象或函数，或直接实现

	2：设计好需要实现的具体功能，各个功能实现的先后顺序，
	3：各个功能之间会有数据交叉现象，需要事前有清晰的计划他们之间的协作，
	否则后期多次修改会增加数倍工作量

	4：过程中会出现很多错误，修改时一定要记下修改的地方和修改的内容，
	不然后面难以恢复，从而反复修改，增加工作量，甚至难以恢复
	5：遇到问题时，出去走走，清理思路，冷静思考是很好的方法，
	对于找出解决方案，找出错误原因有极大帮助
	6：过程中多多间断的休息，可以保持头脑清醒
	但是此次任务留到下次处理，将会忘记上次的思路，基本你需要从新开工计划。。。。

	表单：按钮添加数据
	进行各种操作：
	1：自己分析总结方案
	添加方案元素
	选择方案元素
	删除数据
	查看数据
	查询某一组
	查询多组数据
	推算
	总结
	分析
	颜色标记
	勾选或拉选，或输入开始结尾的下标，选择分析数组个数
	查看各种方案分别的总结结果
	2维数组

	尾部写入文件
	读出数据---匹配数组---写入总结得出的方案

	每行5个数据
	每行颜色不同
	选择颜色
	函数实现

	横纵距离
	单双比
	出现的时间间隔，出现间隔时间的长久
	与上一组 ，和上几组的前后临近数据的差距
	周期性聚集
	聚集或分散
	对结果进行再综合进一步分析
	循环对结果的结果进行分析，选择循环次数
	写出每次的总结结果
	结果一排名形式显示


	第一步：直接复制数据到文件中
	第二部：读出数据，正则匹配，形成数组
	3，把数据组分成周期请聚拢，离散,
	4，把单个数据分成周期性出现,
	5，吧数据组单双比例得出周期性变化

	进行方案选择，然后匹配总结
	写总结结果到文件
	写匹配成功率到文件
	输出匹配结果
	输出匹配成功率
	4：匹配度，总结的成功率，效率
	结果写入文件

	//读出数据，正则匹配，形成数组的函数--参数为：文件名
	//可以定义一个长度，选择性读取一定长度的内容，默认为全部读出

	写入数据--参数：写入的文件名称，
	写入方式a，w追加还是全部替换覆盖？？需要写入的内容??


	本文件包含函数：
	读取文件到字符串；把字符串正则匹配变成数组；清除文件的数据；

	24法则及数据录入，历史重复？
	 还未出现过的数组，出现数组的集中性分析
	<?php
	//知识总结结束
	//》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》>
	?>
</div>
<br><br><br>
<!-- bodyface结束前 -->
bodyface结束前
</div>
body结束前
</body>
</html>