<meta http-equiv="Content-type" content="text/html;charset=utf-8">


应用名称：实现简单的自定义操作的词频分析功能

所用语言：php

改进：
未实现：
1：输入文章，不能实现同时设置忽略词
2：输入文件名称时，不能查询系统默认的忽略词

3：统计的单词重复是会重复统计

实现功能：
1：输入文件名，或文章进行分析词频
---文件内可以存在中文，系统会自动踢出中文
2：可以自动分析文章内所有词汇的词频，也可以设置自己需要的词汇进行词频收索
3：可以设置输出词频的排名，默认为:10
4：可以设置忽略词汇，默认时系统设置忽略的词汇为介词或其他不重要词汇等
---设置忽略词汇的文章内可以存在中文，系统会自动踢出中文
---可以根据个人需求，到词汇文件中增减修改系统默认时所要忽略的词汇
5：可以区分词频是否并列排名
---缺点：输出词频时若还有和最后一个排名单词同排名的单词，不能输出，因为设定了输出个数
---改进方法：在末尾进行继续比较，若相同则输出，若不同则停止。


运用到的知识：
1：提供表单：进行自定义的各种操作
2：文件的打开与关闭，存取，
3：正则表达式的运用，提取英文单词
4：

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



<script>
</script>
<br>
<fieldset style="width:550px;">
可以默认无输入运行，也可选择性输入运行。
<form action="" method="post" style="border=5px;" name="Selectform">
<input type="text" name="txtName"  value="" />输入要处理的txt文件名称(需要提前将文件存入指定文件夹下，其中可以包含有中文但不作处理)<br>
<input type="text" name="txtFile"  style="width=500px"  style="height=100px" value="" />或者输入需要处理的英文文章(其中可以包含有中文但不作处理)<br>
<input type="text" name="selectWords"  value="" />输入查询的数组<br>
<input type="text" name="ignorWords"  value="" />输入设定要忽略的数组<br>
<input type="text" name="topN"  value="" />输入设定要显示数组排名的前多少组<br>
<input type="text" name="topN"  value="" />24法则及数据录入，历史重复？ 还未出现过的数组，出现数组的集中性分析<br>
<input type="submit" name="sub"  value="提交" />
</form>
</fieldset>
<br>

<?php
//输出时间，用于计算运行时间
echo "页面开始运行的时间是：".microtime()."!<br>";
?>
<?php

//指定文件
$filename="olddata.txt";
//把整个文件读入一个数组，且不需要fopen()提前打开文件
//得到的数组的每个元素对应文件的每一行，各元素有换行符分隔开
$readfile = file($filename);
echo "<br><br>";
foreach($readfile as $key=>$value){
	echo $key."----";
	echo $value."<br>";
}

//读取数据
echo $getFile=readData($filename);
//把数据存入数组
//$dataArry=regularArray($getFile);
//echo $dataArry[0].$dataArry[1];
echo $dataArray=readData($filename);
foreach($dataArray as $keypre=>$valuepre){
	//if($i==5){}
	echo "键值：".$keypre."：";
	echo "数值：".$valuepre."；";
}

?>

<fieldset style="width:98%;">
</fieldset>

<?php


//输出数组$arryde的各个下标和值
function print_foreach_key_value($arry){
	echo "<br><br>";
	foreach($arry as $key=>$value){
		echo $key."----";
		echo $value."<br>";
	}
}


//读出数据成为字符串--参数为：文件名
//可以定义一个长度，选择性读取一定长度的内容，默认为全部读出
//可以定义从哪里开始到哪里结束的一定长度
//var timermove = null;
//var elMove = null;
function readData($fileNames,$lenth){
	//是否设置了介词 或需要忽略的单词名单
	//存放数据的文件名称
	//$fileName="englishword.txt";
	$fileName=$fileNames;
	if(!file_exists($fileName)){
		echo "你要读取的文件".$fileName."不存在，由于php不能创建文本文档，所以请先手动创建文本文档。";
		//注意，不能创建文本文档。。。//mkdir("$fileName");
		break;
	}else{
		echo "你要读取的文件".$fileName."存在。<br>";
	}
	//以只读模式打开文件
	$dirrOpen = fopen($fileName,'r');
	//声明一个变量，用来存储读出的内容
	$file='';
	if($lenth){
		echo "你要求了取出长度为".$lenth."字节的数据！";
		rewind($dirrOpen);
		while(!feof($dirrRead)){
			$file .= fread($dirrOpen,$lenth);
		}
		return $file;
	}else{
		$i=1;
		while(!feof($dirrOpen)){
			//每次读取1024字节的数据
			//$file .= fread($dirrOpen,1024);
			//每次读取一行数据
			$lineData=fgets($dirrOpen);
			//if(@ $regularArray){
				//$dataArr[$i][$j]=regularArray($lineData);
				//这里会把一行的数据存入数组的第I行，并返回来
				$dataAr[$i]=regularArray($lineData);
				echo $dataAr[$i]."<br>";
			/* }else{
				$file .= "第".$i."组数据：".$lineData." ;<br>";
			
			} */
			$i++;
		}
		return $dataAr;
	}
	fclose($dirrOpen);
	//把全部字符转换成小写-----数字需要转换小写？？？？？？？
	//$file=strtolower($file);
	//输出结果或者return结果？？？？？？
	
	//echo $file;
}
?>


<?php
//清除文件的数据
//参数为：需要清除数据的文件名称
function clearData($fileNames){
	//需要清除数据的文件名称
	$clearFile=$fileNames;
	//以写模式打开，写入空白覆盖原文件
	$dirrWritePre = fopen($clearFile,'w') or trigger_error($clearFile."打开文件 不正确.");
	fwrite($dirrWritePre,"  ");
	fclose($dirrWritePre);
}


//不能检测到第二个单词的开始\A,  不区分大小写s
$pattern='/[a-zA-Z]+(\b)+/isx';
$pattern='/([a-zA-Z]+)(\b)+/is';
$pattern='/([a-zA-Z]+)/is';
//匹配介词，存入介词数组,写入介词文件
$i=0;



//把数据用正则表达式匹配成数组，参数：需要转换的字符串
//可以以参数传入正则表达式。---因为考虑到日期，期数编号等信息
//可以设置读取个数---设置个数，用for循环每次只读取一个
function regularArray($string){
	//正则表达式----0和9之间的数字有1个或2个,
	//1到36之间的一个数。/反斜杠为定界符
	$pattern='/[1-36]/is';
	//要么是1-9，或10-29,或30-36的数。/反斜杠为定界符
	//$pattern='/[1-9]{1}|([1-2]{1}[0-9]{1})|[3][0-6]{1}/is';
	//需要转换的字符串
	$regularString=$string;
	//把数据regularString按照正则pattern的方式存到dataArray数组中。
	if(preg_match_all($pattern,$regularString,$dataArray,PREG_SET_ORDER)){
		//$i=0;
		$j=0;
		foreach($dataArray as $key=>$value){
			//echo $key.$value;
		
			/* if($value[1]==$valuepre){
					$words[$i]=3;
					break 1;
				}else{
					//把字符串写入用于进行比较的数组里面		
					$words[$i]=$value[1];
				}
			} */
			//每组数据只有几个，但是有些组数据残缺，
			//所以要以行为单位进行,所以把此函数调用到每一行的数据读取中去最好
			//if($i%7==0){
			//$dataArr[$i][$j]= $value[1];
			$dataArr[$j]=$value[1];
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

//if($_POST['topN']<count($selecteWord)){
//输出时间，用于计算运行时间
echo "页面运行结束的时间是：".microtime().",请计算运行时间！----这好像就会时间差。<br>";

?>
<fieldset style="width:98%;">
</fieldset>