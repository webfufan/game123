<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script language="javascript">
<!--
	function show(){
		window.alert('ͶƱ�ɹ�');
	}
-->
</script>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ޱ����ĵ�</title>
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


<!--��½����-->
<div class="login">
<form action="loginProcess_user.php" method="post">
<table>
 <tr><td>�˺ţ�<input type="text" name="id"></input></td></tr>
 <tr><td>���룺<input type="password" name="password"></input></td></tr>
 <tr><td><input type="submit" value="��¼">&nbsp;&nbsp;<input type="reset" value="ע��" name="registe" onclick="register.php" target = "frame2" ></td></tr>
</table>
</form>

<?
	if(!empty($_GET['errno'])){
	//���մ����ź�
	$errno = $_GET['errno'];
	if($errno == 1){
		echo "<script language=javascript>";
		echo "alert('�˺Ż�����������������룡');";
		echo "</script>";
	}
	}
?><p></p>
</div>

<!--��վͶƱ����-->
<div class="vote_web">
<center><a><font face="���Ĳ���">��ϷͶƱ</a></font></center>
<br/>
<form action="" method="post">
<!--radio�ǵ�ѡ��-->
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
��Խ����<img src="photo/2013-06-12_150848.png" width="50px" height="35px" usemap="#abc"></img>
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
<center><a><font face="���Ĳ���">��վͶƱ</a></font></center>
<br/>
<form action="" method="post">
<!--radio�ǵ�ѡ��-->
<ol><li>
�����&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="photo/2013-06-12_150848.png" width="50px" height="35px"  usemap="#abc"></img>
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
������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="photo/2013-06-12_150848.png" width="50px" height="35px" usemap="#abc"></img>
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
̫ƽ��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="photo/2013-06-12_150848.png" width="50px" height="35px" usemap="#abc"></img>
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
