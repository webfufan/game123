<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php  //注册页面：
	
	$name=@$_POST['name'];
	
	$password1=@$_POST['password'];
	$password2=@$_POST['checkpassword'];
	$introduce=@$_POST['introduce'];
	$oldfilename=@$_FILES['pic_name']['name'];
	if(!($name==""&& $password1==""&& $password2==""&& $introduce=="")) //所需填写的信息中有一个非空
	{
		if($name!=""&&$password1!=""&&$password2!=""&&$introduce!="") //当所有要填写的信息非空
		{
			$link = mysql_connect("localhost","root","131014");
			//判断连接是否成功
			if (!$link) 
			{
				die('Could not connect: ' . mysql_error());
			}
			//选择数据库
			mysql_select_db("ourweb");
			mysql_query("set names gb2312");
			
			
			//判断账号是否已存在
	 		$query="select name from member where name='$name'";
			$result=mysql_query($query);
 			$num_rows = mysql_num_rows($result);
 			if ($num_rows>0)
 			{
    			echo "该账号已被注册,请重设！";
 				echo "<script language=\"JavaScript\">\r\n"; 
        		echo " alert(\"您输入的账号已经有人注册,请重新输入！\");\r\n"; 
				echo " history.back();"; 
        		echo "</script>"; 
        		exit; 
 			}
 			else//该账号可以使用时
			{
   				if ($password1==$password2)//两个密码相同时
     			{
					//生成自动文件名
					$rand=rand(0,1999);
					$filename=date(Ymd).$rand;
					//头像上传
					$oldfilename=@$_FILES['pic_name']['name'];
					echo $oldfilename;
					$filetype=substr($oldfilename,strpos($oldfilename,"."),strlen($oldfilename)-strpos($oldfilename,"."));
					if(($filetype!=".gif")&&($filetype!=".GIF")&&($filetype!=".jpg")&&($filetype!=".JPG"))
					{
						echo "<script language=\"JavaScript\">\r\n"; 
        				echo " alert(\"文件类型或地址错误！\");\r\n"; 
						echo " history.back();"; 
        				echo "</script>";
						exit;
					}
					if($_FILES['pic_name']['size']>1000000000)
					{
						echo "<script>alert('文件太大！不能上传');</script>";
						echo "<script>history.back();</script>";
						exit;
					}
					//获得保存文件的临时名
					$filename=$filename.$filetype;
					$savedir="upload/".$filename;
					if(move_uploaded_file($_FILES['pic_name']['tmp_name'],$savedir))
					{
						$file_name=basename($savedir);//获取保存文件的文件名（不含路径）
					}
					else
					{
						echo "<script language=javascript>";
						echo "alert('错误，无法将附件写入服务器！\n本次发布失败！');";
						echo "history.back();";
						echo "</script>";
						exit;	
					}
					//存入数据库
 					$sql="INSERT INTO member(name, password,imagedir,introduce) VALUES ('$name','$password1','$savedir','$introduce')";  															
					mysql_query($sql,$link);
					echo "<script language=\"JavaScript\">"; 
          			echo " alert(\"注册成功！！\");\r\n";
          			echo " location.replace(\"index.php\");"; 
		  			echo "</script>";
         			exit; 
				}
				else//两个密码不同
				{
       				echo "<script language=\"JavaScript\">\r\n"; 
        			echo " alert(\"您输入的两次密码不一样，请重新输入！\");\r\n"; 
        			echo " history.back();\r\n"; 
        			echo "</script>"; 
       	 			exit; 
      			}
  			}//end of 该账号可以用
 		}
		else //如果填入的信息不完整
		{
			echo "<script language=\"JavaScript\">\r\n"; 
      	 	echo " alert(\"您输入的信息不完整，请重新输入！\");\r\n"; 
        	echo " history.back();\r\n"; 
        	echo "</script>"; 
       		exit;
		}
	}
?>


<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>注册</title>
<style type="text/css">

.STYLE1 {
	font-family: "宋体";
	font-weight: bold;
	font-size: large;
}
</style>
</head>

<body >


<center>
<table width="496" border="1" cellspacing="0" bordercolor="#33FF66">
<tr><td width="513"><img src="images/Top1.jpg" width="488" height="117" /></td>
</tr>

<tr>
  <td  height="280"><table width="491" height="273" border="1" align="left" cellspacing="0">
   <form enctype="multipart/form-data" action="register.php" method="post" name="form1">
   	<tr>
      <td width="99"><span class="STYLE1">用户名：</span></td>
      <td width="271">
       <p align="left"> <input name="name" type="text" size="15" /></p>      </td>
    </tr>
    <tr>
      <td class="STYLE1">密　码：</td>
      <td>
        <p align="left"><input name="password" type="password" size="15" /></p>    </td>
    </tr>
    <tr>
      <td class="STYLE1">确认密码：</td>
      <td>
        <p align="left"><input name="checkpassword" type="password" size="15" /></p>      </td>
    </tr>
    <tr>
      <td class="STYLE1">上传头像：</td>
      <td>
        <p align="left"><input type="file" name="pic_name" /></p></td>
    </tr>
    <tr>
      <td class="STYLE1">个人简介：</td>
      <td>
        <p align="left"><textarea name="introduce" cols="30" rows="6"></textarea></p>      </td>
    </tr>
    <tr>
      <td height="32" colspan="2" class="STYLE1">          　　　　
          <input name="Submit" type="submit" class="STYLE1" value="注册" />
        　　　　
          <input name="Submit2" type="reset" class="STYLE1" value="重置" />      </td>
      </tr>
	  </form>

  </table></td>
</tr>
<tr><td height="97"><img src="images/top4.jpg" width="491" height="92" /></td>
</tr>
</table>
</center>