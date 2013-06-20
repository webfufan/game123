<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script language="javascript">
<!--
	function show(){
		window.alert('投票成功');
	}
-->
</script>
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

}td img {display: block;}body {
	background-image: url();
	background-repeat: no-repeat;
}

</style> 
</head>

<body>


<!--登陆部分-->
<div class="login">
<form action="loginProcess_user.php" method="post">
<table>
 <tr><td>账号：<input type="text" name="id"></input></td></tr>
 <tr><td>密码：<input type="password" name="password"></input></td></tr>
 <tr><td><input type="submit" value="登录">&nbsp;&nbsp;<input type="reset" value="注册" name="registe" onclick="register.php" target = "frame2" ></td></tr>
</table>
</form>

<?
	if(!empty($_GET['errno'])){
	//接收错误信号
	$errno = $_GET['errno'];
	if($errno == 1){
		echo "<script language=javascript>";
		echo "alert('账号或密码错误，请重新输入！');";
		echo "</script>";
	}
	}
?><p></p>
</div>

<!--网站投票部分-->
<div class="vote_web">
<center><a><font face="华文彩云">游戏投票</a></font></center>
<br/>
<form action="" method="post">
<!--radio是单选框-->
<ol><li>
LOL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="photo/2013-06-12_150848.png" width="50px" height="35px"  usemap="#abc"></img>
<map name="abc">
<area shape="rect" href="#" coords="0,0,50,30" onclick="show()"/>
<?
	
	$id=mysql_connect("localhost","root","131014");
	mysql_select_db("game123");
	mysql_query("set names gb2312");
	$query="SELECT *from web where game_id=1" ;
	$result=mysql_query($query);
	$info=mysql_fetch_array($result);
	$game_num=$info['game_num']+1;
	$query="DELETE from index_num";
	mysql_query($query);
	$query="UPDATE web SET game_num=".$game_num." WHERE game_id =1";
		mysql_query($query);			
	echo $game_num;
	mysql_close($id);

?>
</map>
</li>
<li>
DOTA2&nbsp;&nbsp;&nbsp;<img src="photo/2013-06-12_150848.png" width="50px" height="35px" usemap="#abc"></img>
<map name="abc">
<area shape="rect" href="#" coords="0,0,50,30" onclick="show()"/>
<?
	
	$id=mysql_connect("localhost","root","131014");
	mysql_select_db("game123");
	mysql_query("set names gb2312");
	$query="SELECT *from web where game_id=2" ;
	$result=mysql_query($query);
	$info=mysql_fetch_array($result);
	$game_num=$info['game_num']+1;
	$query="DELETE from index_num";
	mysql_query($query);
	$query="UPDATE web SET game_num=".$game_num." WHERE game_id =2";
		mysql_query($query);			
	echo $game_num;
	mysql_close($id);

?>
</map></li>
<li>
穿越火线<img src="photo/2013-06-12_150848.png" width="50px" height="35px" usemap="#abc"></img>
<map name="abc">
<area shape="rect" href="#" coords="0,0,50,30" onclick="show()"/>
<?
	
	$id=mysql_connect("localhost","root","131014");
	mysql_select_db("game123");
	mysql_query("set names gb2312");
	$query="SELECT *from web where game_id=3" ;
	$result=mysql_query($query);
	$info=mysql_fetch_array($result);
	$game_num=$info['game_num']+1;
	$query="DELETE from index_num";
	mysql_query($query);
	$query="UPDATE web SET game_num=".$game_num." WHERE game_id =3";
		mysql_query($query);			
	echo $game_num;
	mysql_close($id);

?>
</map></li>
<br/></ol>
</form>

</div>
<p></p>
<center><a><font face="华文彩云">网站投票</a></font></center>
<br/>
<form action="" method="post">
<!--radio是单选框-->
<ol><li>
玩家网&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="photo/2013-06-12_150848.png" width="50px" height="35px"  usemap="#abc"></img>
<map name="abc">
<area shape="rect" href="#" coords="0,0,50,30" onclick="show()"/>
<?
	
	$id=mysql_connect("localhost","root","131014");
	mysql_select_db("game123");
	mysql_query("set names gb2312");
	$query="SELECT *from web where game_id=1" ;
	$result=mysql_query($query);
	$info=mysql_fetch_array($result);
	$game_num=$info['game_num']+1;
	$query="DELETE from index_num";
	mysql_query($query);
	$query="UPDATE web SET game_num=".$game_num." WHERE game_id =1";
		mysql_query($query);			
	echo $game_num;
	mysql_close($id);

?>
</map>
</li>
<li>
多玩网&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="photo/2013-06-12_150848.png" width="50px" height="35px" usemap="#abc"></img>
<map name="abc">
<area shape="rect" href="#" coords="0,0,50,30" onclick="show()"/>
<?
	
	$id=mysql_connect("localhost","root","131014");
	mysql_select_db("game123");
	mysql_query("set names gb2312");
	$query="SELECT *from web where game_id=2" ;
	$result=mysql_query($query);
	$info=mysql_fetch_array($result);
	$game_num=$info['game_num']+1;
	$query="DELETE from index_num";
	mysql_query($query);
	$query="UPDATE web SET game_num=".$game_num." WHERE game_id =2";
		mysql_query($query);			
	echo $game_num;
	mysql_close($id);

?>
</map></li>
<li>
太平洋&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="photo/2013-06-12_150848.png" width="50px" height="35px" usemap="#abc"></img>
<map name="abc">
<area shape="rect" href="#" coords="0,0,50,30" onclick="show()"/>
<?
	
	$id=mysql_connect("localhost","root","131014");
	mysql_select_db("game123");
	mysql_query("set names gb2312");
	$query="SELECT *from web where game_id=3" ;
	$result=mysql_query($query);
	$info=mysql_fetch_array($result);
	$game_num=$info['game_num']+1;
	$query="DELETE from index_num";
	mysql_query($query);
	$query="UPDATE web SET game_num=".$game_num." WHERE game_id =3";
		mysql_query($query);			
	echo $game_num;
	mysql_close($id);

?>
</map></li>
<br/></ol>
</form>

</div>

<p></p>
</body>
</html>
