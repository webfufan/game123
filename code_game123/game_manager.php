<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ޱ����ĵ�</title>
</head>

<body>

<center>
<?php

	//����û�������޸Ŀ�水ť���ύ���ݲ�Ϊ�գ����޸����ݿ��е���Ӧ��档
	$user_id=@$_POST['Goods_id'];
	$user_grade=@$_POST['price'];
	if($user_grade!="" )
	{
		
		$id=mysql_connect("localhost","root","131014");
		mysql_select_db("game123");
		$query="UPDATE user SET user_grade=".$user_grade." WHERE user_id =".$user_id."" ;
		mysql_query($query);		
		mysql_close($id);
		echo "<script language=javascript>";
		echo "alert('�޸ĳɹ���');";
		echo "</script>";
	}
?>
	

<?php 
//���б��ľ���ѡ���ж���ת��Manager1.php ����Manager2.php

	if(@$_POST['select']=="consult_user")
	{
		header("Location:game_manager.php");
	}
	if(@$_POST['select']=="consult_admin")
	{
		header("Location:game_manager1.php");
	}
?>
	
<table width="696"  height="474" border="1" cellspacing="0" >
<td height="472" bordercolor="#33FF66" background="../supermarket/image/�������ҳ��.jpg"><p align="justify">

  <table width="720" height="473" border="0">
    <tr>
      <td height="27" rowspan="2">&nbsp;</td>
      <td height="15">&nbsp;</td>
      <td height="27" rowspan="2"><a href="admin_login.php? logout=1">�˳�</a></td>
    </tr>
    <tr>
      <td height="20">
	  <?php
	  echo "<marquee direction=left scrollamount=5 onmouseover=stop() onmouseout=start() > <strong> <img src='photo/ͷ��.png' width=30 height=24 >".$_COOKIE['name'].",��ã����ID��".$_COOKIE['id'].",��ӭ������</strong></marquee>";
	  ?>
	  
	  
	  &nbsp;</td>
    </tr>
    <tr>
      <td width="236" height="230" rowspan="2">&nbsp;</td>
      <td width="412" height="23" bgcolor="#66FFFF">
	  <form action="game_manager.php" method="post" name="form1" target="_self" id="form1">
        ��ѡ�����������<select name="select">
          <option value="consult_user">��ѯ���޸�ע���û�</option>
          <option value="consult_admin">��ѯ���޸Ĺ���Ա�˺�</option>
        </select>
		&nbsp;&nbsp;
		<input type="submit" name="Submit1" value="ȷ��" />
      </form>
	  </td>
      <td width="58" rowspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td height="234">
	  <table>
	   <tr>
		  
		  
		  <form action="game_manager.php" method="post">
            <td height="23"> &nbsp;&nbsp;�������û�ID 
              <input name="u_id" type="text" size="10"  />  
			&nbsp;
			<input type="submit" name="Submit" value="��ѯ" /></td>
		  </form>
		  </tr>
		  </table>

<?php
	//����û�����˲�ѯ��ť���Ҳ�ѯ�ı������ݲ�Ϊ�գ�����ʾ�����Ʒ�ľ�����Ϣ
	
	if(@$_POST["u_id"]!="" or @$_POST["sign"]==1)
	{
		$user_id=$_POST['u_id'];
		$id=mysql_connect("localhost","root","131014");
		mysql_select_db("game123");
		$sql="select * from user where user_id='$user_id'";
		$rs=mysql_query($sql);	
		$num_rows = mysql_num_rows($rs);
		if($num_rows>0){
			$info=mysql_fetch_array($rs,MYSQL_ASSOC);
			echo "<table  width='385' border='1' align='center'>";
       	 	echo "<tr>";
			echo "<td width='40'>ID</td>";
        	echo "<td width='60'>�û���</td>";
        	echo "<td width='40'>�û��ȼ�</td>";
        	echo "<td>�޸ĵȼ�</td>";
        	echo "</tr>";
        	echo "<tr>";
			echo "<td width='40'>".$info['user_id']."</td>";
        	echo "<td width='60'>".$info['user_name']."</td>";
       	 	echo "<td width='40'>".$info['user_grade']."</td>";
			echo "<form action='game_manager.php' method='post'><td><input name='price' type='text'  size='4'/>&nbsp;<input name='Goods_id' type='hidden' value= '".$info['user_grade']."'  /><input type='submit' name='Submit' value='�޸�' /></form>";
			echo "</table>";		

 		}
		else {
		 		echo "<script language=javascript>";
				echo "alert('�����ڸ��û���');";
				echo "history.back();";
				echo "</script>";
		 	}
		 mysql_close($id); 
	}
	else
	{
?>


 <?php
	  //���û�û�Կ�����ҳ����в�������ҳ����ʾ������Ʒ��Ϣ
	  
	$id=mysql_connect("localhost","root","131014");
	mysql_select_db("game123");
	$query="SELECT *from user " ;
	$result=mysql_query($query);
	$info=mysql_fetch_array($result);
	$totalnum=mysql_num_rows($result);
	$pagesize=2;
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
		echo "<p align='left'>&nbsp;&nbsp;����".$totalnum."���û���";
		echo "ÿҳ��ʾ".$pagesize."������".$totalpage."ҳ,��ǰΪ��".$page."ҳ��</p>";
		echo "<table width='385' border='1' >";
        echo "<tr>";
		echo "<td width='40'>ID</td>";
        echo "<td width='60'>�û���</td>";
        echo "<td width='40'>�û��ȼ�</td>";
        echo "<td>�޸ĵȼ�</td>";
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
			$sign=ceil($page/$page_num);//�����ʾ�ļ�ҳ
			if($sign==1)
			{
				for($i=1;$i<=$page_num;$i++)
				{
					echo "<a href=?page=".$i."><front color=black>[".$i."]&nbsp;</a>";
				}
				$k=$page_num*$sign+1;
				echo "<a href=?page=".$k."><front color=black>[��һҳ]&nbsp;</a>";
			}
			if($sign==ceil($totalpage/$page_num))
			{
				$k=$page_num*($sign-1);
				echo "<a href=?page=".$k."><front color=black>[��һҳ]&nbsp;</a>";
				for($i=($sign-1)*$page_num+1;$i<=$totalpage;$i++)
				{	
					echo "<a href=?page=".$i."><front color=black>[".$i."]&nbsp;</a>";
				}
			}
			if($sign<ceil($totalpage/$page_num)&&$sign>1)
			{
				$k=$page_num*($sign-1);
				echo "<a href=?page=".$k."><front color=black>[��һҳ]&nbsp;</a>";
				for($i=($sign-1)*$page_num+1;$i<=$sign*$page_num;$i++)
				{
					echo "<a href=?page=".$i."><front color=black>[".$i."]&nbsp;</a>";
				}
				$k=$i;
				echo "<a href=?page=".$k."><front color=black>[��һҳ]&nbsp;</a>";
			}
		}
				
		$query="SELECT *FROM user ORDER BY user_id ASC limit $begin,$pagesize";
		$result=mysql_query($query,$id);
		$datanum=mysql_num_rows($result);
		for($i=1;$i<=$datanum;$i++)
		{
			$info=mysql_fetch_array($result,MYSQL_ASSOC);
        	echo "<tr>";
			echo "<td width='40'>".$info['user_id']."</td>";
        	echo "<td width='60'>".$info['user_name']."</td>";
       	 	echo "<td width='40'>".$info['user_grade']."</td>";
        	echo "<form action='game_manager.php' method='post'><td><input name='price' type='text'  size='4'/>&nbsp;<input name='Goods_id' type='hidden' value='".$info['user_id']."'  /><input type='submit' name='Submit' value='�޸�' /></form>";
        	echo "</tr>";
		}
		
		
		    
		mysql_close($id);
	}
	else
	{
		echo "<br><br>�����κ��û���Ϣ��<br>";
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

</body>
</html>
