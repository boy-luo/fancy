
<?php

//检查文件$fileName是否存在
function checkDocumentconfiger($fileName){
	if(!file_exists($fileName)){
		echo "对不起，不存在文件".$fileName."!<br>";
		//注意，不能创建文本文档。。。//mkdir("$fileName");
		return false;
	}else{
		//echo "存在文件".$fileName."！<br>";
	}
}


//以行为单位的方式读取文件$fileName内的全部内容到一个数组，并返回数组
function readAsLineArry($fileName){
	checkdocumentconfiger($fileName);
	
	//把整个文件读入一个数组，且不需要fopen()提前打开文件
	//得到的数组的每个元素对应文件的每一行，各元素有换行符分隔开
	//file:系统函数，不用打开，直接以行为单位读成数组
	$getfile = file($fileName);
	return $getfile;
}

/*
$dirrWrite = fopen($fileName,'a') or trigger_error($fileName."打开文件失败！<br>");
	//fwrite($dirrWrite,$content."\n");
	$getfile = fgets($dirrWrite,600);
	fclose($dirrWrite);
*/


//匹配数组的全部信息，包括日期等
//正则匹配，找出数字
//把数据用正则表达式匹配成数组，参数：需要转换的字符串
//可以以参数传入正则表达式。---因为考虑到日期，期数编号等信息
//可以改进：设置读取个数---设置个数，用for循环每次只读取一个
function regularDocumentAsAloneArray($regularString){

	//正则表达式----0和9之间的数字有1个或2个,
	//1到36之间的一个数。/反斜杠为定界符
	//$pattern='/[1-36]+/is';
	//考虑到日期是很长的，所以做成下面的匹配表达式
	//i:匹配对象不区分大小写；
	//s:匹配将字符串视作单行 ，即是换行符视作普通字符看待
	
	//匹配数字
	$pattern='/[0-9]+/is';
	//$pattern='/[0-9]+\-{0,3}[0-9]+\-{0,3}[0-9]+/is';
	//$pattern='/[0-9]{0,5}\-{0,3}[0-9]{0,5}\-{0,3}[0-9]{0,5}/is';
	//要么是1-9，或10-29,或30-36的数。/反斜杠为定界符
	//$pattern='/[1-9]{1}|([1-2]{1}[0-9]{1})|[3][0-6]{1}/is';
	
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


//(初始是为了建立数组详细信息的数组而写的，
//因为想要利用已有的数据做成直接的数组,所以需要明确每个元素)
//读文件，把数据做成一维数组，写入指定的文件
//把一行数据利用特定的无关符号（比如下划线)连接成一个元素
function ReadAsOneDimentionArray($ReadFileName,$Elements,$WriteToFileName){
	
	//计数器，用于建立数组的每个元素
	$i = 0;
	
	//数据的所在文档
	$resulte = readAsLineArry($ReadFileName);
	
	//之前的数组是以行为元素的，所以这里是遍历每一行，分别进行处理
	//实现的到所有单个的数据，组成一个数组
	//resulte是行数组，则value是每行的内容，key是所在行数-1。
	foreach($resulte as $key=>$value){
		
		//遍历得到每行数据的前N个数据
		//为了做成数组详细信息（共11个元素）而做的循环
		for($j=0; $j<$Elements; $j++){
			//保存每次的单个数组元素，遍历完就得到了全部元素数据
			if($j != 0 && $j != $Elements - 1){
				$nowArray[$i] .= "__".$resultArry[$j];
			}else if($j == 0){
				$nowArray[$i] .= "\"".$resultArry[$j];
			}else if($j == $Elements - 1){
				$nowArray[$i] .= $resultArry[$j]."\"";
			}
		}
		//从右边删除空格
		$nowArray[$i] = rtrim($nowArray[$i]);
		
		//把每个元素写进文档，并添加每个元素末尾的都好“,”。
		write($WriteToFileName,$nowArray[$i].",\t");
		
		//处理完以行数据后写入一个换行符
		write($WriteToFileName,"\t");
		
		//进行建立下一个元素
		$i ++;
	}
	return $nowArray;
}


//(初始是为了建立数组核心数据的数组而写的)
//读文件，把数据做成二维数组，写入指定的文件
function ReadAsTwoDimentionArray($ReadFileName,$Elements,$WriteToFileName){
	//数据的所在文档
	$resulte = readAsLineArry($ReadFileName);

	//需要读取元素的个数
	$N = $Elements;
	//$i=0;
	
	//之前的数组是以行为元素的，所以这里是遍历每一行，分别进行处理
	//实现的到所有单个的数据，组成一个数组
	//resulte是行数组，则value是每行的内容，key是所在行数-1。
	foreach($resulte as $key=>$value){
		
		// 把每行的数据（即是每个元素）再进行正则匹配成单个的数字元素。
		// resulte是行数组，则value是每行的内容，key是行数-1。
		// 所以resultArry是每行的--各个-数据组成的数组
		$resultArry = regularDocumentAsAloneArray($value);
		
		//为了获得核心数据做成直接数组存入文件而做的循环
		for($j=0; $j<$N; $j++){
			if($j != 0 && $j != $N - 1){
				write($WriteToFileName,$resultArry[$j].",\t");
				
			}else if($j == 0){
				write($WriteToFileName,"array(".$resultArry[$j].",\t");
				
			}else if($j == $N - 1){
				write($WriteToFileName,$resultArry[$j]."),");
			}
		}
	}
	return $resultArry;
}




?>


