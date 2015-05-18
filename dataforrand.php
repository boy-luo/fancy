<?php
session_start();
?>
<!DOCTYPE html>
<!--  如果没有此声明，IE低版本将不能解释固定在两边的盒子 -->

<html>
<head>
<title>处理我的数据</title>
<!--  使页面的编码是utf-8，避免在浏览器输出的是乱码   -->
<meta http-equiv="Content-type" content="text/html;charset=utf-8">
<!--  包含css文件   -->
<link rel = "stylesheet" type = "text/css" href = "data.css">
<?php 
include ("config.php");
include ("functions.php");
?>
</head>


<body>
<div id="bodyface">
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


<?php
//输出时间，用于计算运行时间
$timestart=microtime();
echo "<br>页面开始运行的详细时间是：".$timestart."!<br><br>";
echo $test;
?>


<?php
//session的判断建立
//《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《<

//注册session数组，保存需要的各种信息
//注册session数组，保存第几次处理信息，用于创建每次的处理文件夹
if(!isset($_SESSION["data"]["orderFolder"])){
	//注册session数组中的order，保存第几次处理信息，用于创建每次的处理文件夹
	$_SESSION["data"]["orderFolder"]=1;
	//保存当前正在处理第几个文档
	$_SESSION["data"]["orderTxt"]=1;
	//注册session数组中的folder，保存第几次处理信息，用于创建每次的处理文件夹
	//保存文件夹存储路径--当前文件夹路径下的dataFolder文件夹。
	$_SESSION["data"]["folderPath"]="./datafolder/";
	//保存当前正在处理的第几个文件夹
	$_SESSION["data"]["folder"]="No folder even now！";
	//保存当前正在处理的第几个文档
	$_SESSION["data"]["txt"]="No txt even now！";
	echo "这是第".$_SESSION["data"]["orderFolder"]."次处理!";
}else{
	//重置文件数据，用于增加新变量后，或者反复测试而使用
	//unset($_SESSION["data"]["orderFolder"]);
	//$_SESSION["data"]["folderPath"]="./dataFolder/";
	
	//unset($_SESSION["order"]); 
	//当前文件夹的名称
	$_SESSION["data"]["folder"]=$_SESSION["data"]["folderPath"].$_SESSION["data"]["orderFolder"]."time";
	//当前处理文档的名称
	$_SESSION["data"]["txt"]=$_SESSION["data"]["folder"]."/".$_SESSION["data"]["orderTxt"]."data.txt";
	echo "<br>";  //#6a5acd    #191970
	echo "<font color='#4b0082' size='5px'><b>上次处理到文件夹：".$_SESSION["data"]["folder"]."了!<br>";
	echo "这是第".$_SESSION["data"]["orderFolder"]."次处理!<br>";
	echo "正在处理文件".$_SESSION["data"]["folder"]."中的".$_SESSION["data"]["txt"]."文档!<b></font><br>";
}

//按钮操作结束
//》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》>
?>


<div id="out">

<div id="topface">
<div id="topencourage">
热情与激情，鼓励着生命：<br>
<?php
$promise[0]="加油！";
$promise[1]="只有努力，才能实现，只有坚持，才能做到！";
$promise[2]="继续坚持，不断改进，相信会有意料之外的收获的！";
$promise[3]="没有奢望就没有失望！";
$promise[4]="只有向前，";
$promise[5]="只有努力，才能实现，只有坚持，才能做到！";
//$rand=rand(0,5);
$rand=rand(0,60)%6;
//echo $rand;
echo $promise[$rand];
?>
</div>

<div id="hint">
其他的提示信息栏：<br>
<br>
所有session信息：<br>
<br>
<br>
<?php
//重置
//setSessions();
//查看成员
//sessions();
?>

<?php 
//按钮操作
//《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《<

//点击进入下一次，重新开始处理
if(@ $_POST["nextTime"]){
	echo "你点击了 创建下一个处理文件!<br>";
	$_SESSION["data"]["orderFolder"]++;
	$path= $_SESSION["data"]["folderPath"].$_SESSION["data"]["orderFolder"]."time";
	createFolder($path);
	//新的处理文档次序从0 开始计数。
	$_SESSION["data"]["orderTxt"]=0;
}

//点击进行下一次数据处理
if(@ $_POST["nextDispose"]){
	echo "你点击了 创建下一个处理文档!<br>";
	$_SESSION["data"]["orderTxt"]++;
	$fileName= $_SESSION["data"]["folder"]."/".$_SESSION["data"]["orderTxt"]."data.txt";
	//createFolder($fileName);
	createTxtDocument($fileName);
}


//点击随机数据，并验证历史未出现过
if(@ $_POST["randData"]){
	echo "你点击了产生一组随机数据，并验证历史未出现过!<br>";
	echo "产生的一组随机数据:";
	//产生6个随机数
	for($j=0; $j<6; $j++){
		//产生1-33之间的随机数
		$randArray[$j]=rand()%33+1;
		//验证避免重复（一组数据中的数据间有数据重复）---6个数各不相同。
		for($i=0; $i<$j; $i++){
			//如果一组数据中的数据间有数据重复了就重新生成随机数，直到不重复为止
			while($randArray[$j] == $randArray[$i]){
				$randArray[$j]=rand()%33+1;
			}
		}
		echo $randArray[$j]."\t";
	}
	echo "<br>";
	//参数：历史全部数据生成的数组，产生的随机数组，历史数据的详细信息形成的数组
	$chek = have_or_no_this_array($nowArray,$randArray,$resulte);
	echo $chek."<br>";
	
/* 
	$randArray = array(04,05,11,12,30,32);
	$chek = have_or_no_this_array($nowArray,$randArray,$resulte);
	echo $chek."<br>";
	$randArray = array(10,11,12,13,26,28);
	$chek = have_or_no_this_array($nowArray,$randArray,$resulte);
	echo $chek."<br>"; */
	echo "<br>";
}
//按钮操作结束
//》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》
?>
</div>
</div>

<?php
//数据显示区域
//《《《《《《《《《《《《《《《《《《《《《《《《《《《《《《
?>
<div id="datas">
<div id="dataorigin">
原始数据：<br>

<br>
单个数据的统计结果：<br>
</div>


<div id="dataask">
要求的数据：<br>
写入的换行符不能直接在txt中实现，认为写入的却不能读出,为什么？？、
<br>
进行预处理，吧首字母相同的放到一个数组中，形成3维数组或更多维的数组
<br>
减少每次的比较量，如500,800组一次等还是的量
现在在处理更新后的历史全部数据（量很大，在config页面做了数据数组预处理）
<br>

<?php
//已经运行得出结果证明，里面没有重复数据出现过
//声明一个数组，存储各个相同数组的相同次数---避免没有相同的，所以给了一个值
/*
for($j=1; $j<40; $j++){
	$sameCount[$j]=0;
}
*/

//定义一个，避免在没有重复数据的时候后边的输出报错
$sameCount[1]=0;

//循环N次比较，行数++就好了
//for($j=0; $j<count($nowArray); $j++){
echo "<br>循环次数即是数据总条数为：".count($nowArray)."----<br>";
/*
//统计6个数据相同的数组count6
echo "统计有6个数据全部相同的数组.<br>";
$N=6;	
for($j=0; $j<count($nowArray); $j++){
	//第几行的1-6个数据与后面所有行的1-6个数据比较
	//$i=0;
	$k = $j+1;
	//为了避免首次计数时出现未定义情况，所以定义一个每次的公用计数器
	//$sameCount[1] = 1;
	while($k<count($nowArray)){
		//比较每个数组的$N个元素
		for($i=0; $i<$N; $i++){
			//if($k>=count($nowArray)){
			if($k>=count($nowArray)){
				//echo "总数据条数(即是数组数)：".count($nowArray)."<br>";
				break 1;
			}
			
			//先判断结束，或判断是否进行下一次
			if($nowArray[$j][$i] != $nowArray[$k][$i])
			{	
				//echo "两组数据不等！<br>";
				//因为for里面$i会++，所以$i此处赋值-1。
				//$i=-1;
				$k++;
				//continue;
				//与下一组数据进行比较
				break 1;
			}else if($i!=$N){
				//echo $i."进行下一次比较！<br>";
				$k++;
				continue;
			}else{
				//统计出现相同的次数（缺点：会被反复统计，因为统计后没有没替换）
				if($sameCount[$j+1]){
					++$sameCount[$j+1];
				}else{
					$sameCount[$j+1] = 1;
				}
				//$sameCount[$j+1] += $sameCount[1];
				//遍历输出整行的所有元素，即是详细信息
				echo $arrayMesage[$j]."\t 和<br>".$arrayMesage[$k]."\t 是相同的<br><br>";
				$i=-1;
				$k++;
				//continue;
			}
		}
	}
}
*/

///*
//统计sameN个数据相同,$diffrentN个不同的数组count5
/*
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
			初始化与下一组数组有的相同数据个数为0
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
*/

$sameN = 5;
$diffrentN = 6-$sameN;
//每组数据有6个数据
$N=6;
//echo $nowArray[0][1]."<br>";
//echo $nowArray[1300][4]."<br>";
echo "统计有 $sameN 个数据相同的数组.<br>";
/*
echo $resulte[0]."<br>";
echo $resultArry[300]."<br>";
echo $resulte[1200]."<br>";
echo $resulte[1200][0]."<br>";
echo $resulte[1200][3]."<br>";
echo $resulte[1200][5]."<br>";
echo $resultArry[1700]."<br>";
echo $arrayMesage[0]."<br>";
echo $arrayMesage[300]."<br>";
echo $arrayMesage[1200]."<br>";
echo $arrayMesage[1700]."<br>";
*/

//for($j=0; $j<count($nowArray); $j++){
$times=count($nowArray);
for($j=0; $j<$times; $j++){
	//第几行的1-6个数据与后面所有行的1-6个数据比较
	$k = $j;
	//为了避免首次计数时出现未定义情况，
	//所以定义一个每组数据找到的满足要求的
	//数据个数的数组个数的公用计数器
	$thisEchoTime = 0;
	
	//for($k=0; $k<count($nowArray); $k++){
	while($k<count($nowArray)-1){
		$k++;
		//用于记录与每组数据的不同数据的个数
		//用于判断是否超出了允许的不同数据的个数
		$thisDiffrent = 0;
		//比较每个数组的$N（6）个元素
		for($i=0; $i<$N; $i++){
			//if($k>=count($nowArray) || $thisDiffrent>$diffrentN){
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
							$sameCount[$j] = 1;
							//遍历输出整行的所有元素，即是详细信息
							//echo $arrayMesage[$j]."\t <br>--------和<br>".$arrayMesage[$k]."\t 有".($N-$thisDiffrent)."个是相同的数据。<br>";
							echo "<br><br><br>下面一组找到了有".$sameN."个相同数据的：<br>".$arrayMesage[$j]."<br>".$arrayMesage[$k]."<br>";
							write($_SESSION["data"]["txt"],"\r\r\r <br><br><br>下面一组找到了有".$sameN."个相同数据的：<br>".$arrayMesage[$j]."<br>".$arrayMesage[$k]."<br> \r");
						}else{
							$sameCount[$j] ++;
							//echo "\t <br>--------和<br>".$arrayMesage[$k]."\t 有".($N-$thisDiffrent)."个是相同的数据。<br>";
							echo $arrayMesage[$k]."<br>";
							write($_SESSION["data"]["txt"],$arrayMesage[$k]."<br> \r");
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
						$sameCount[$j] = 1;
						//遍历输出整行的所有元素，即是详细信息
						//echo $arrayMesage[$j]."\t <br>--------和<br>".$arrayMesage[$k]."\t 有".($N-$thisDiffrent)."个是相同的<br>";
						echo "<br><br><br>下面一组找到了有".$sameN."个相同数据的：<br>".$arrayMesage[$j]."<br>".$arrayMesage[$k]."<br>";
						write($_SESSION["data"]["txt"],"\r\r\r <br><br><br>下面一组找到了有".$sameN."个相同数据的：<br>".$arrayMesage[$j]."<br>".$arrayMesage[$k]."<br> \r");
					}else{
						$sameCount[$j] ++;
						//echo "\t <br>--------和<br>".$arrayMesage[$k]."\t 有".($N-$thisDiffrent)."个是相同的<br>";
						echo $arrayMesage[$k]."<br>";
						write($_SESSION["data"]["txt"],$arrayMesage[$k]."<br> \r");
						
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
					break 1;
				}
			}
		}
	}
}
//*/


//输出各组相同数组的相同次数
if(count($sameCount) != 1){
	foreach($sameCount as $key=>$value){
		echo "下标为：".$key."的数组相同的次数为：----".$value."次！<br>";
		echo "数组详细信息为：".$resulte[$key]."<br>";
		//echo $value."<br>";
	}
}else{
	echo "抱歉。先生，现目前还没有重复数据！<br>";
}
?>

<br><br><br>
<?php
//统计单个数据的历史出现总次数
echo "统计单个数据的历史出现总次数<br>";
$CountOne=count_one_history($nowArray,33);
$numberCount=count($CountOne);
echo "数据个数：".$numberCount."个。<br>";
/*
foreach($CountOne as $key=>$value){
	echo "数据：".$key."出现的次数为：".$value."次。<br>";
}
*/
for($j=1; $j<34; $j++){
	//echo $CountOne[$j];
	echo "数据：".($j)."出现的次数为：".$CountOne[$j]."次。<br>";

}
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
<form action="" method="post" style="border=5px;" name="Selectform">
<input type="submit" name="nextTime"  value="进入下一次处理，创建下一个处理文件" />
<input type="submit" name="nextDispose"  value="进行下一次数据处理，创建下一个处理结果的存储txt" />
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
右边表单：文件名称
<?php
//遍历现有的文件
//声明一个变量，记录文件个数
$fileNum = 0;
//$dirname = './';
$dirname = $_SESSION["data"]["folderPath"];
echo "函数遍历文件夹！<br>";
//调用遍历文件夹函数
ergodicFolder($dirname);
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
<!-- bodyface结束前 -->
bodyface结束前
</div>
body结束前
</body>
</html>