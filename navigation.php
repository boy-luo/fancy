
<!DOCTYPE html>
<!--  如果没有此声明，IE低版本将不能解释固定在两边的盒子 -->
<html>
<head>
<!--  使页面的编码是utf-8，避免在浏览器输出的是乱码   -->
<meta http-equiv="Content-type" content="text/html;charset=utf-8">
<!--  包含css文件   -->
<link rel = "stylesheet" type = "text/css" href = "data.css">
<?php 
//include ("config.php");

//包含直接数据页面文件
include ("arraydirect.php");

//编号函数文件
include ("functions.php");
include ("functionsarrayget.php");

//包含数据库连接文件
include ("conn.php");
?>
</head>
<body>
<div id="topface">
	<div id="topencourage">
		热情与激情，鼓励着生命：<br>
		<?php
		//在直接和数据里面
		echo $promise[$rand];
		?>
	</div>
	<div id="hint">
	其他的提示信息栏：<br>
	<br>
	所有session信息：<br>
	<?php
	CheckSessions();
	?>
	<br>
	<br>
	<?php 
	//》》》》》》》》》》》》》》》》》》》》》》》》》》》》》》
	?>
	</div>
</div>
<br><br><br>
<div id="navigationTop">
	统一的头部导航文件：<br>
	主要的界面：首页，产生随机数，公共数据，（各种处理操作尽量分离到不同界面，避免功能复杂影响界面工作效率）<br>
	准备添加的界面：除3余数，奇偶比，等原始数据界面，生成他们的界面<br>
	准备添加的界面：测试的数据界面，新功能测试界面，选择各种方法的界面--综合各种方法实现数据认为预测<br>
	准备添加的界面：公用大数据，公用小数据（如：鼓励语句等）<br>
	<!-- 各个页面的导航地址按钮.<br> 
	<font color="#aaggss" size="5px"> 
	<button style="height: 40px; font-size:19px; color:blanck;" >失物招领</button>
	<a href="randomarray.php" target="_blank">随机 数组</a>
	 -->
	 
	<a href="data.php" target="_blank">
	<button style="height: 40px; font-size:19px; color:blanck;" >数据处理首页</button></a>
	
	<a href="final_war_pre2015-7-1same3-5num.php" target="_blank">
	<button style="height: 40px; font-size:19px; color:blanck;" >2015-7-1有3-5个相同final_war_pre.php最后的战役（优化前）</button></a>
	
	<a href="final_war_pre2015-6-30.php" target="_blank">
	<button style="height: 40px; font-size:19px; color:blanck;" >最后的战役（优化前）final_war_pre2015-6-30</button></a>
	
	<a href="history_data_1_33.php" target="_blank">
	<button style="height: 40px; font-size:19px; color:blanck;" >历史数据1-33位置排列</button></a>
	
	<a href="final_war_pre.php" target="_blank">
	<button style="height: 40px; font-size:19px; color:blanck;" >最后的战役（优化前）</button></a>

	
	<a href="final_war.php" target="_blank">
	<button style="height: 40px; font-size:19px; color:blanck;" >最后的战役（优化后）</button></a>

	
	<a href="methodofnumber1.php" target="_blank">
	<button style="height: 40px; font-size:19px; color:blanck;" >△ 单个数字历史出现 1-15</button></a>

	
	<a href="methodofnumber2.php" target="_blank">
	<button style="height: 40px; font-size:19px; color:blanck;" >△ 单个数字历史出现 16-30</button></a>

	
	<a href="methodofnumber3.php" target="_blank">
	<button style="height: 40px; font-size:19px; color:blanck;" >△ 单个数字历史出现 31-33</button></a>

	
	<a href="methodofoddeven.php" target="_blank">
	<button style="height: 40px; font-size:19px; color:blanck;" >△ 选择某个奇偶奇，查看他的历史状况</button></a>

	
	<a href="methods.php" target="_blank">
	<button style="height: 40px; font-size:19px; color:blanck;" >△ 方法浏览(奇偶奇，奇偶比，除3余等)</button></a>

	
	<a href="methodofnumber.php" target="_blank">
	<button style="height: 40px; font-size:19px; color:blanck;" >△ 单个数字历史出现 方法浏览(1-33)</button></a>

	
	
	<a href="history_data_method_infors.php" target="_blank">
	<button style="height: 40px; font-size:19px; color:blanck;" >△ 全部历史数据及其方法信息</button></a>

	
	<a href="counts.php" target="_blank">
	<button style="height: 40px; font-size:19px; color:blanck;" >= 各种统计结果浏览</button></a>

	<a href="datadispose.php" target="_blank">
	<button style="height: 40px; font-size:19px; color:blanck;" >各种数据处理操作(各个位置的预测数字组成的数组)</button></a>
	
	

	<a href="methodsresult.php" target="_blank">
	<button style="height: 40px; font-size:19px; color:blanck;" >选择的方法</button></a>
	<a href="randomarray.php" target="_blank">
	<button style="height: 40px; font-size:19px; color:blanck;" >生成随机数组</button></a>
	
	
	<a href="resultdata.php" target="_blank">
	<button style="height: 40px; font-size:19px; color:blanck;" >（预测结果数组---未做，在操作页面的）</button></a>
	
	<br><br>
	
	<a href="onetimeset.php" target="_blank">
	<button style="height: 40px; font-size:19px; color:blanck;" >临时存入数据库等一次性操作</button></a>
	
	<a href="arrayget.php" target="_blank">
	<button style="height: 40px; font-size:19px; color:blanck;" >把文档数据建立成数组</button></a>
	
	<a href="configarray.php" target="_blank"> 
	<button style="height: 40px; font-size:19px; color:blanck;" >数组的核心数据输出显示</button><a>
	
	<a href="config.php" target="_blank"> 
	<button style="height: 40px; font-size:19px; color:blanck;" >数组的详细信息输出显示</button><a>

	<a href="arraydirect.php" target="_blank">
	<button style="height: 40px; font-size:19px; color:blanck;" >即用数组(无输出显示，而且不方便经常更新)</button></a>
	
	<a href="debate.php" target="_blank">
	<button style="height: 40px; font-size:19px; color:blanck;" >好像是开始时的文件处理</button></a>

	<a href="fillsdispose.php" target="_blank">
	<button style="height: 40px; font-size:19px; color:blanck;" >最先开始做时的数据文档文件处理</button></a>

	<!--
	<a href="MyFace.php" target="_blank">
	<font color="#aaggss" size="5px" font>失物招领</font></a>
	-->
</div>
<br><br><br>
</body>
</html>