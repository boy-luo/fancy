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
//include ("config.php");
//include ("functions.php");
?>
</head>

<body>

<?php
//public class Congfiger{
class Congfiger{
	//属性
	/*
	public var $fileName;
	public var $fileMesageName;
	public var $resulte;
	public var $arrayMesage;
	public var $resultArry;
	public var $nowArray;
	*/
	
	//var $fileName;
	//var $fileMesageName;
	//private $fileName;
	public $fileName;
	public $fileMesageName;
	var $resulte;
	var $arrayMesage;
	var $resultArry;
	var $nowArray;
	
	
	//构造函数,初始化各个属性
	function __construct($fileNames = "默认参数"){
	//function Congfiger($fileNames = "meiyou"){
		//由于单个数据的数组$resultArry随处都可能用到，所以拿到开始来生成。
		//指定处理文件的名称
		//$fileName = "datamy.txt";
		//$this->$fileName = "公共界面初始化值";
		$this->fileName = $fileNames;
		$this -> fileMesageName = "公共界面初始化值";

		//由于单个数据的数组$resultArry随处都可能用到，所以拿到开始来生成。
		//指定处理文件的名称
		//$this -> fileName = "公共界面初始化值";
		//$this -> fileMesageName = "公共界面初始化值";


		//把整个文件以行为单位读入一个数组，且不需要fopen()提前打开文件
		//得到的数组的每个元素对应文件的每一行，各元素有换行符分隔开
		//把每个元素（即是每行的数据）在再进行正则匹配成单个的数字元素。
		//调用读取文件内容并存为数组的函数
		$this -> resulte = "公共界面初始化值";
		$this -> arrayMesage = "公共界面初始化值";

		/*
		把每行的数据（即是每个元素）再进行正则匹配成单个的数字元素。
		resulte是行数组，则value是每行的内容，key是行数-1。
		所以resultArry是每行的--各个-数据组成的数组
		*/
		$this -> resultArry = "公共界面初始化值";
		
		//保存每次的单个数组元素，遍历完就得到了全部元素数据
		//$nowArray[$i][$j] = "公共界面初始化值";
		$this -> nowArray = "公共界面初始化值";

	}
	
	function setfileName($fileNameSet){
		$fileName = $fileNameSet;
	}
	
	function setfileMesageName($fileMesageNameSet){
		$fileMesageName = $fileMesageNameSet;
	}
	
	function setresulte($resulteSet){
		$resulte = $resulteSet;
	}
	
	function setarrayMesage($arrayMesageSet){
		$arrayMesage = $arrayMesageSet;
	}
	
	function setresultArry($resultArrySet){
		$resultArry = $resultArrySet;
	}
	
	//function setnowArray($nowArraySet[$i][$j]){
	function setnowArray($nowArraySet,$i,$j){
		$nowArray = $nowArraySet[$i][$j];
	}
	
	function echoOneOut($resultArrySet){
		if( !is_array($resultArrySet)){
			//echo "你要求输出的内容为：".$resultArry;
			echo $resultArry;
		}else{
			foreach($resultArry as $key=>$value){
				echo $key."=>";
				echoOut($value);
			}
		}
	}
	
	function echoAllOut(){
		echo $this -> fileName."<br>";
		echo $this -> fileMesageName."<br>";
		echo $this -> resulte."<br>";
		echo $this -> arrayMesage."<br>";
		echo $this -> resultArry."<br>";
		
		if( is_array($this -> nowArray)){
			foreach($this -> nowArray as $key=>$value){
				echo $key."=>";
				echo $value."<br>";
				//echoOut($value);
			}
		}else{
			echo $this -> nowArray."<br>";
		}
	}
}

$congfigermy = new Congfiger();
//$congfigermy->echoAllOut();

echo "<br><br>";
$congfigermy->fileName = "后置测试";
//$congfigermy->echoAllOut();

//echo $arrayMesage."<br>";
//echo $resultArry."<br>";

?>
</body>