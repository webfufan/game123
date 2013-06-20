<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
<style type="text/css">
a:link{
size:20px;
color:#000000;
text-decoration:none;
}
a:hover{
color:#00FF00;
size:25px;
text-decoration:blink;
}
a:visited{
/*size:20px;*/
color:#FF0000;
}
p 
{
border:green solid thin;

}
</style> 
</head>

<body>

<?	
	  echo "<marquee direction=left scrollamount=5 onmouseover=stop() onmouseout=start() > <strong> <img src='photo/头像.png' width=30 height=24 >".$_COOKIE['name'].",你好，你的ID是".$_COOKIE['id'].",欢迎登陆Game123！</strong></marquee>";
?>
<?
	echo"<br/><a href = 'left.php'>安全退出</a>";
?><p></p>
<!--网站投票部分-->
<div class="vote_web">
<center><a><font face="华文彩云">网站投票</a></font></center>
<br/>
<form action="" method="post">
<!--radio是单选框-->
<ol><li>
LOL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="photo/2013-06-12_150848.png" width="50px" height="35px"></li>
<li>
DOTA2&nbsp;&nbsp;&nbsp;<img src="photo/2013-06-12_150848.png" width="50px" height="35px"></li>
<li>
穿越火线<img src="photo/2013-06-12_150848.png" width="50px" height="35px"></li>
<br/></ol>
</form>

</div>
<p></p>
<center><a><font face="华文彩云">网站投票</a></font></center>
<br/>
<form action="" method="post">
<!--radio是单选框-->
<ol><li>
LOL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="photo/2013-06-12_150848.png" width="50px" height="35px"></li>
<li>
DOTA2&nbsp;&nbsp;&nbsp;<img src="photo/2013-06-12_150848.png" width="50px" height="35px"></li>
<li>
穿越火线<img src="photo/2013-06-12_150848.png" width="50px" height="35px"></li>
<br/></ol>
</form>

</div>
<p></p>
</body>
</html>

