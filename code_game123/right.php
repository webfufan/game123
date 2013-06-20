<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script language="javascript">
<!--
	function show(){
		
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

}
</style> 
</head>

<body>
<center>
<!--主题部分-->

<p>
<div class="theme"><img src="photo/duanwu.png" height="20px"><font face="华文彩云" size="+1">亲爱的你，欢迎来到game123----游戏导航网站，今天是端午节哦，记得吃粽子！</font></img></div></p>
<div class="image">
<img src="photo/2013-06-13_194235.png" usemap="#abc" border="green" width="850px" height="333"></img>
<!--映射区域-->
<map name="abc">
<area shape="rect" href="http://www.baidu.com/index.php" coords="17,60,140,186" onclick="show()" target="_blank">
</map>
</div><p></p>

<div class="image">
<img src="photo/网络.jpg" usemap="#abc1" border="green" width="850px" height="350"></img>
<!--映射区域-->
<map name="abc1">
<area shape="rect" href="#" coords="140,20,280,60" onclick="show()">
</map>
</div><p></p>

<div class="image">
<img src="photo/网页.jpg" usemap="#abc2" border="green" width="850px" height="333"></img>
<!--映射区域-->
<map name="abc2">
<area shape="rect" href="#" coords="140,20,280,60" onclick="show()">
</map>
</div><p></p>

<div class="image">
<img src="photo/单机.jpg" usemap="#abc3" border="green" width="850px" height="333"></img>
<!--映射区域-->
<map name="abc3">
<area shape="rect" href="#" coords="140,20,280,60" onclick="show()">
</map>
</div><p></p>

<div class="image">
<img src="photo/手机.jpg" usemap="#abc4" border="green" width="850px" height="333"></img>
<!--映射区域-->
<map name="abc4">
<area shape="rect" href="#" coords="140,20,280,60" onclick="show()">
</map>
</div><p></p>

<div class="bbs">

<?php
	
	$id=mysql_connect("localhost","root","131014");
	mysql_select_db("game123");
	mysql_query("set names gb2312");
	$query="SELECT *from index_num where id=1" ;
	$result=mysql_query($query);
	$info=mysql_fetch_array($result);
	$login_num=$info['logined_num']+1;
	//$query="DELETE from index_num";
	//mysql_query($query);
	$query="UPDATE index_num SET logined_num=".$login_num." WHERE id = 1";
	mysql_query($query);

	
?>

<?php
	echo "<strong>恭喜你成为本页面的第 100 名游客，留个话吧：</strong>"
	// echo "<strong>恭喜你成为本页面的第".$login_num."名游客，留个话吧：</strong>"
?>
 	 <br /><center><form method="post" action="right.php">
                  <textarea name="message" cols="200" rows="5"></textarea>
                  　　　　　　　　　　　　　　　　　　   
                &nbsp;&nbsp;&nbsp;&nbsp;
                   <input type="submit" name="Submit" value="发表留言" />
            </form></center>
<?
	
	$id=mysql_connect("localhost","root","131014");
	mysql_select_db("game123");
	mysql_query("set names gb2312");

	if($_POST!=NULL)
	{	
		$content=@$_POST['message'];
		if($content!="")
		{
			$addtime=date("Y-m-d h:i:s");
			$message=$_POST['message'];
			mysql_query("set content GBK");
			$exec="INSERT INTO index_message(login_num,content,addtime) values ('$login_num','$message','$addtime')";
			$result=mysql_query($exec);
			if($result>0)
				echo"<script>alert('留言成功！');</script>";
			else
				echo"<script>alert('留言失败！');</script>";
			mysql_close();
		}
	}
?>
<?php
	$id=mysql_connect("localhost","root","131014");
	mysql_select_db("game123",$id);
	mysql_query("set names gb2312");
	
	
	mysql_query("SET CHARACTER SET gb2312");
	
	$query="SELECT *FROM index_message ORDER BY id DESC";
	$result=mysql_query($query,$id);
	$totalnum=mysql_num_rows($result);
	$pagesize=5;
	$page=@$_GET["page"];
	if($page=="")
	{	
		$page=1;
	}
	$begin=($page-1)*$pagesize;
	$totalpage=ceil($totalnum/$pagesize);
	$page_num=5;
	
	if($totalnum>0)
	{
		$datanum=mysql_num_rows($result);
		echo "<center><p align='left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>已有".$totalnum."条留言。每页显示".$pagesize."条，共".$totalpage."页,当前为第".$page."页。</strong></p></center>";
		if($totalpage<5)
		{
			for($j=1;$j<=$totalpage;$j++)
			{
				echo "<a href=?page=".$j."><front color=black>[".$j."]&nbsp;</a>";
			}
		}
		else
		{
			$sign=ceil($page/$page_num);//标记显示哪几页
			if($sign==1)
			{
				for($i=1;$i<=$page_num;$i++)
				{
					echo "<p><a href=?page=".$i."><font color=black/>[".$i."]&nbsp;</a></p>";
				}
				$k=$page_num*$sign+1;
				echo "<a href=?page=".$k."><font color=black/>[下一页]&nbsp;</a>";
			}
			if($sign==ceil($totalpage/$page_num))
			{
				$k=$page_num*($sign-1);
				echo "<a href=?page=".$k."><front color=black>[上一页]&nbsp;</a>";
				for($i=($sign-1)*$page_num+1;$i<=$totalpage;$i++)
				{	
					echo "<a href=?page=".$i."><front color=black>[".$i."]&nbsp;</a>";
				}
			}
			if($sign<ceil($totalpage/$page_num)&&$sign>1)
			{
				$k=$page_num*($sign-1);
				echo "<a href=?page=".$k."><front color=black>[上一页]&nbsp;</a>";
				for($i=($sign-1)*$page_num+1;$i<=$sign*$page_num;$i++)
				{
					echo "<a href=?page=".$i."><front color=black>[".$i."]&nbsp;</a>";
				}
				$k=$i;
				echo "<a href=?page=".$k."><front color=black>[下一页]&nbsp;</a>";
			}
		}
		echo "<br/>----------------------------------------------------------------------------------------------------------------";		
		$query="SELECT *FROM index_message ORDER BY id DESC limit $begin,$pagesize";
		$result=mysql_query($query,$id);
		$datanum=mysql_num_rows($result);
		for($i=1;$i<=$datanum;$i++)
		{
			$info=mysql_fetch_array($result,MYSQL_ASSOC);
			echo "<br>==》游客".$info['login_num']."于".$info['addtime']."说：";
			echo "&nbsp;&nbsp;".$info['content']."<br>";
			echo "----------------------------------------------------------------------------------------------------------------";
			echo "<br>";
		}
		mysql_close($id);
	}
	else
	{
		echo "<br><br>暂无游客留言！<br>";
	}
?></div>
          <br />
</center>
</body>
</html>
