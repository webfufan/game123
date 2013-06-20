<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
</head>

<body>
<center>
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
	  <?php
	  echo "<marquee direction=left scrollamount=5 onmouseover=stop() onmouseout=start() > <strong> <img src='photo/头像.png' width=30 height=24 >".$_COOKIE['name'].",你好，你的ID是".$_COOKIE['id'].",欢迎回来！</strong></marquee>";
	  ?>
	  
	  
	  &nbsp;</td>
    </tr>
    <tr>
      <td width="236" height="230" rowspan="2">&nbsp;</td>
      <td width="412" height="23" bgcolor="#66FFFF">
	  <form action="game_manager2.php" method="post" name="form1" target="_self" id="form1">
        请选择所需操作：<select name="select">
          <option value="consult">查询管理员账号</option>
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
		  
		</tr>
	</table>

		<table>
		<form action="game_manager2.php" method="post" name="form2" target="_self" id="form2">  
			<tr><td>请输入账号名：*</td><td><input type="text" name="new_name" ></input></td></tr>
			<tr><td>请输入ID &nbsp;&nbsp;：*</td><td><input type="text" name="new_id" ></input></td></tr>
			<tr><td>请输入密码 &nbsp;：*</td><td><input type="text" name="new_password" ></input></td></tr>
			<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="Submit" value="确定"></input></td></tr>
		</form>
	<?
		//如果用户点击了确定按钮且提交内容不为空，则新建一个管理员账户。
		$admin_id=@$_POST['new_id'];
		
		$id=mysql_connect("localhost","root","131014");
		mysql_select_db("game123");
		$sql="select * from admin where admin_id='$admin_id'";
		$rs=mysql_query($sql);	
		$num_rows = mysql_num_rows($rs);
		
		if($num_rows>0){
		 		echo "<script language=javascript>";
				echo "alert('用户ID重复，请重试！');";
				echo "history.back();";
				echo "</script>";
		}
		else{
			$admin_name = @$_POST['new_name'];
			$mi=@$_POST['new_password'];
			$admin_password=md5($mi);
			if($admin_password!="" )
			{
		
				"UPDATE admin SET admin_password=".$admin_password." WHERE admin_id =".$admin_id."" ;
				$query="INSERT INTO admin VALUES(".$admin_id.",".$admin_name.",".$admin_password.")";
				mysql_query($query);		
				mysql_close($id);
				//echo "<script language=javascript>";
				//echo "alert('新建成功！');";
				//echo "</script>";
			}
			else{
				echo "<script language=javascript>";
				echo "alert('请输入密码！');";
				echo "</script>";
			}
		}
		
		
		
		
		
	?>
		</table>
	  
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
