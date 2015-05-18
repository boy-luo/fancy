<?php 

//链接数据库
$conn = @ mysql_connect("localhost","root","")or die ("数据库连接页的连接错误<br>");      //建立链接
$mysql=mysql_select_db("lottery",$conn); 
mysql_query("SET NAMES 'utf8'");           //使用中文编码；

/*
function htmtocode($content)
{
	$content = str_replace("\n","<br>",str_replace(" ","&nbsp;",$content));
	//$content=str_replace(" ","&nbsp;",$content);
	return $content;
}
*/

//htmtocode($conn);
/*
$content="sdd    aa
assss";
echo htmtocode($content);
*/
?>
