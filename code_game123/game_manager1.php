<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
</head>

<body>

<center>
<?php 
//由列表框的具体选择判断跳转到Manager1.php 还是Manager2.php

	if(@$_POST['select']=="consult")
	{
		header("Location:game_manager1.php");
		exit();
	}
	if(@$_POST['select']=="create")
	{
		header("Location:game_manager2.php");
		exit();
	}
?>
	
<table width="696"  height="474" border="1" cellspacing="0" >
<td height="472" bordercolor="#33FF66" background="../supermarket/image/经理管理页面.jpg"><p align="justify">

  <table width="720" height="473" border="0">
    <tr>
      <td height="27" rowspan="2">&nbsp;</td>
      <td height="15">&nbsp;</td>
      <td height="27" rowspan="2"><a href="admin_login.php? logout=1">退出</a></td>
    </tr>
    <tr>
      <td height="20">
	  <?php
	  echo "<marquee direction=left scrollamount=5 onmouseover=stop() onmouseout=start() > <strong> <img src='photo/头像.png' width=30 height=24 >".$_COOKIE['name'].",你好，你的ID是".$_COOKIE['id'].",欢迎回来！</strong></marquee>";
	  ?>
	  
	  
	  &nbsp;</td>
    </tr>
    <tr>
      <td width="236" height="230" rowspan="2">&nbsp;</td>
      <td width="412" height="23" bgcolor="#66FFFF">
	  <form action="game_manager1.php" method="post" name="form1" target="_self" id="form1">
        请选择所需操作：<select name="select">
          <option value="consult" selected="selected">查询管理员账号</option>
          <option value="create">新建管理员</option>
        </select>
		&nbsp;&nbsp;
		<input type="submit" name="Submit1" value="确定" />
      </form>
	  </td>
      <td width="58" rowspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td height="234">
	  <table>
	   <tr>
		  
		  
		  <form action="game_manager1.php" method="post">
            <td height="23"> &nbsp;&nbsp;请输入管理员ID 
              <input name="a_id" type="text" size="10"  />  
			&nbsp;
			<input type="submit" name="Submit" value="查询" /></td>
		  </form>
		  </tr>
		  </table>
<?php

	//如果用户点击了修改密码按钮且提交内容不为空，则修改数据库中的相应库存。
	$admin_id=@$_POST['Goods_id'];
	$mi=@$_POST['price'];
	$admin_password=md5($mi);
	if($admin_password!="" )
	{
		
		$id=mysql_connect("localhost","root","131014");
		mysql_select_db("game123");
		$query="UPDATE admin SET admin_password=".$admin_password." WHERE admin_id =".$admin_id."";
		mysql_query($query);		
		mysql_close($id);
		//echo "<script language=javascript>";
		//echo "alert('修改成功！');";
		//echo "</script>";
	}
?>
	
<?php
	//如果用户点击了查询按钮，且查询文本框内容不为空，则显示相关商品的具体信息
	
	if(@$_POST["a_id"]!="" or @$_POST["sign"]==1)
	{
		$admin_id=$_POST['a_id'];
		$id=mysql_connect("localhost","root","131014");
		mysql_select_db("game123");
		$sql="select * from admin where admin_id='$admin_id'";
		$rs=mysql_query($sql);	
		$num_rows = mysql_num_rows($rs);
		if($num_rows>0){
			$info=mysql_fetch_array($rs,MYSQL_ASSOC);
			echo "<table  width='385' border='1' align='center'>";
       	 	echo "<tr>";
			echo "<td width='40'>ID</td>";
        	echo "<td width='60'>管理员账号</td>";
        	echo "<td width='40'>管理员密码</td>";
        	echo "<td>修改密码</td>";
        	echo "</tr>";
        	echo "<tr>";
			echo "<td width='40'>".$info['admin_id']."</td>";
        	echo "<td width='60'>".$info['admin_name']."</td>";
       	 	echo "<td width='40'>".$info['admin_password']."</td>";
			echo "<form action='game_manager1.php' method='post'><td><input name='price' type='text'  size='4'/>&nbsp;<input name='Goods_id' type='hidden' value='".$info['admin_password']."'  /><input type='submit' name='Submit' value='修改' /></form>";
			echo "</table>";		

 		}
		else {
		 		echo "<script language=javascript>";
				echo "alert('不存在该用户！');";
				echo "history.back();";
				echo "</script>";
		 	}
		 mysql_close($id); 
	}
	else
	{
?>


 <?php
	  //若用户没对库存管理页面进行操作，则页面显示所有商品信息
	  
	$id=mysql_connect("localhost","root","131014");
	mysql_select_db("game123");
	$query="SELECT *from admin " ;
	$result=mysql_query($query);
	$info=mysql_fetch_array($result);
	$totalnum=mysql_num_rows($result);
	$pagesize=1;
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
		echo "<p align='left'>&nbsp;&nbsp;共有".$totalnum."个用户。";
		echo "每页显示".$pagesize."条，共".$totalpage."页,当前为第".$page."页。</p>";
		echo "<table width='385' border='1' >";
        echo "<tr>";
		echo "<td width='40'>ID</td>";
        echo "<td width='60'>管理员账号</td>";
        echo "<td width='40'>管理员密码</td>";
        echo "<td>修改密码</td>";
        echo "</tr>";
		


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
					echo "<a href=?page=".$i."><front color=black>[".$i."]&nbsp;</a>";
				}
				$k=$page_num*$sign+1;
				echo "<a href=?page=".$k."><front color=black>[下一页]&nbsp;</a>";
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
				
		$query="SELECT *FROM admin ORDER BY admin_id ASC limit $begin,$pagesize";
		$result=mysql_query($query,$id);
		$datanum=mysql_num_rows($result);
		for($i=1;$i<=$datanum;$i++)
		{
			$info=mysql_fetch_array($result,MYSQL_ASSOC);
        	echo "<tr>";
			echo "<td width='40'>".$info['admin_id']."</td>";
        	echo "<td width='60'>".$info['admin_name']."</td>";
       	 	echo "<td width='40'>".$info['admin_password']."</td>";
			echo "<form action='game_manager1.php' method='post'><td><input name='price' type='text'  size='4'/>&nbsp;<input name='Goods_id' type='hidden' value='".$info['admin_id']."'  /><input type='submit' name='Submit' value='修改' /></form>";
        	echo "</tr>";
		}
		
		
		    
		mysql_close($id);
	}
	else
	{
		echo "<br><br>暂无任何用户信息！<br>";
	}
	echo "</table>";
	}
	
?>
	  
	  </td>
    </tr>
    
    <tr>
      <td height="140" colspan="3">&nbsp;</td>
      </tr>
  </table></td>
</p>

</table>
</center>
</body>
</html>
