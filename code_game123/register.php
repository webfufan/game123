<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php  //ע��ҳ�棺
	
	$name=@$_POST['name'];
	
	$password1=@$_POST['password'];
	$password2=@$_POST['checkpassword'];
	$introduce=@$_POST['introduce'];
	$oldfilename=@$_FILES['pic_name']['name'];
	if(!($name==""&& $password1==""&& $password2==""&& $introduce=="")) //������д����Ϣ����һ���ǿ�
	{
		if($name!=""&&$password1!=""&&$password2!=""&&$introduce!="") //������Ҫ��д����Ϣ�ǿ�
		{
			$link = mysql_connect("localhost","root","131014");
			//�ж������Ƿ�ɹ�
			if (!$link) 
			{
				die('Could not connect: ' . mysql_error());
			}
			//ѡ�����ݿ�
			mysql_select_db("ourweb");
			mysql_query("set names gb2312");
			
			
			//�ж��˺��Ƿ��Ѵ���
	 		$query="select name from member where name='$name'";
			$result=mysql_query($query);
 			$num_rows = mysql_num_rows($result);
 			if ($num_rows>0)
 			{
    			echo "���˺��ѱ�ע��,�����裡";
 				echo "<script language=\"JavaScript\">\r\n"; 
        		echo " alert(\"��������˺��Ѿ�����ע��,���������룡\");\r\n"; 
				echo " history.back();"; 
        		echo "</script>"; 
        		exit; 
 			}
 			else//���˺ſ���ʹ��ʱ
			{
   				if ($password1==$password2)//����������ͬʱ
     			{
					//�����Զ��ļ���
					$rand=rand(0,1999);
					$filename=date(Ymd).$rand;
					//ͷ���ϴ�
					$oldfilename=@$_FILES['pic_name']['name'];
					echo $oldfilename;
					$filetype=substr($oldfilename,strpos($oldfilename,"."),strlen($oldfilename)-strpos($oldfilename,"."));
					if(($filetype!=".gif")&&($filetype!=".GIF")&&($filetype!=".jpg")&&($filetype!=".JPG"))
					{
						echo "<script language=\"JavaScript\">\r\n"; 
        				echo " alert(\"�ļ����ͻ��ַ����\");\r\n"; 
						echo " history.back();"; 
        				echo "</script>";
						exit;
					}
					if($_FILES['pic_name']['size']>1000000000)
					{
						echo "<script>alert('�ļ�̫�󣡲����ϴ�');</script>";
						echo "<script>history.back();</script>";
						exit;
					}
					//��ñ����ļ�����ʱ��
					$filename=$filename.$filetype;
					$savedir="upload/".$filename;
					if(move_uploaded_file($_FILES['pic_name']['tmp_name'],$savedir))
					{
						$file_name=basename($savedir);//��ȡ�����ļ����ļ���������·����
					}
					else
					{
						echo "<script language=javascript>";
						echo "alert('�����޷�������д���������\n���η���ʧ�ܣ�');";
						echo "history.back();";
						echo "</script>";
						exit;	
					}
					//�������ݿ�
 					$sql="INSERT INTO member(name, password,imagedir,introduce) VALUES ('$name','$password1','$savedir','$introduce')";  															
					mysql_query($sql,$link);
					echo "<script language=\"JavaScript\">"; 
          			echo " alert(\"ע��ɹ�����\");\r\n";
          			echo " location.replace(\"index.php\");"; 
		  			echo "</script>";
         			exit; 
				}
				else//�������벻ͬ
				{
       				echo "<script language=\"JavaScript\">\r\n"; 
        			echo " alert(\"��������������벻һ�������������룡\");\r\n"; 
        			echo " history.back();\r\n"; 
        			echo "</script>"; 
       	 			exit; 
      			}
  			}//end of ���˺ſ�����
 		}
		else //����������Ϣ������
		{
			echo "<script language=\"JavaScript\">\r\n"; 
      	 	echo " alert(\"���������Ϣ�����������������룡\");\r\n"; 
        	echo " history.back();\r\n"; 
        	echo "</script>"; 
       		exit;
		}
	}
?>


<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>ע��</title>
<style type="text/css">

.STYLE1 {
	font-family: "����";
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
      <td width="99"><span class="STYLE1">�û�����</span></td>
      <td width="271">
       <p align="left"> <input name="name" type="text" size="15" /></p>      </td>
    </tr>
    <tr>
      <td class="STYLE1">�ܡ��룺</td>
      <td>
        <p align="left"><input name="password" type="password" size="15" /></p>    </td>
    </tr>
    <tr>
      <td class="STYLE1">ȷ�����룺</td>
      <td>
        <p align="left"><input name="checkpassword" type="password" size="15" /></p>      </td>
    </tr>
    <tr>
      <td class="STYLE1">�ϴ�ͷ��</td>
      <td>
        <p align="left"><input type="file" name="pic_name" /></p></td>
    </tr>
    <tr>
      <td class="STYLE1">���˼�飺</td>
      <td>
        <p align="left"><textarea name="introduce" cols="30" rows="6"></textarea></p>      </td>
    </tr>
    <tr>
      <td height="32" colspan="2" class="STYLE1">          ��������
          <input name="Submit" type="submit" class="STYLE1" value="ע��" />
        ��������
          <input name="Submit2" type="reset" class="STYLE1" value="����" />      </td>
      </tr>
	  </form>

  </table></td>
</tr>
<tr><td height="97"><img src="images/top4.jpg" width="491" height="92" /></td>
</tr>
</table>
</center>