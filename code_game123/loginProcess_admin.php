<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ޱ����ĵ�</title>
</head>

<body>
<?php 
	//ʵ��ҳ����ת����
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
		die("����ʧ��".mysql_errno());
	}
	mysql_query("set names utf8",$id);
	mysql_select_db("game123",$id);
	
	
	if($admin_id!="")
	{
		if($admin_id!="" &&$admin_password!="")        //������Ϣ����
		{
			
				$query="SELECT *from admin where admin_id=".$admin_id ;
			
				$result=mysql_query($query);
				$info=mysql_fetch_assoc($result);
				
				
				if($info=="")
				{
					echo "<script language=javascript>";
					echo "alert('�����ڸ��˺ţ����������룡');";
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
						//�����ת�������exit����
						exit();
					}
					else
					{
						echo "<script language=javascript>";
						echo "alert('����������������룡');";
						echo "history.back();";
						echo "</script>";
					}
				}
			}
			else
			{
						echo "<script language=javascript>";
						echo "alert('���������룡');";
						echo "history.back();";
						echo "</script>";
			}
			
	}
	else
	{
						echo "<script language=javascript>";
						echo "alert('�������˺ţ�');";
						echo "history.back();";
						echo "</script>";
	}
?>


</body>
</html>
