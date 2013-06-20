<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
</head>

<body>
<?php 
	//实现页面跳转功能
	$tag=@$_GET['logout'];
	if($tag==1)
	{
		setCOOKIE("name","");
		setCOOKIE("id","");
	}
	//$url=@$_POST['admintype'];	
	$admin_id=$_POST['id'];
	$admin_password=$_POST['password'];

	
	$id=mysql_connect("localhost","root","131014");
	if(!$id){
		die("连接失败".mysql_errno());
	}
	mysql_query("set names utf8",$id);
	mysql_select_db("game123",$id);
	
	
	if($admin_id!="")
	{
		if($admin_id!="" &&$admin_password!="")        //输入信息完整
		{
			
				$query="SELECT *from admin where admin_id=".$admin_id ;
			
				$result=mysql_query($query);
				$info=mysql_fetch_assoc($result);
				
				
				if($info=="")
				{
					echo "<script language=javascript>";
					echo "alert('不存在该账号，请重新输入！');";
					echo "history.back();";
					echo "</script>";
				}
				else
				{
					$mima=md5($admin_password);
					if($info['admin_password']==$mima)
					{
						setCOOKIE("name",$info['admin_name']);
						setCOOKIE("id",$info['admin_id']);
						header("Location:game_manager.php");
						//如果跳转，最好用exit结束
						exit();
					}
					else
					{
						echo "<script language=javascript>";
						echo "alert('密码错误，请重新输入！');";
						echo "history.back();";
						echo "</script>";
					}
				}
			}
			else
			{
						echo "<script language=javascript>";
						echo "alert('请输入密码！');";
						echo "history.back();";
						echo "</script>";
			}
			
	}
	else
	{
						echo "<script language=javascript>";
						echo "alert('请输入账号！');";
						echo "history.back();";
						echo "</script>";
	}
?>


</body>
</html>
