<?php
session_start();                                  //开启会话，用于获取会话中保存的验证码数据
include_once 'header.php';                        //包含header.php
if(isset($_POST['name'])){                        //如果包含了提交数据
	if($_SESSION['cfmcode']!=$_POST['cfmcode']){  //判断验证码是否匹配
		echo "<script>
		alert('验证码输入错误！')                
		window.history.go(-1)</script>";
		return;                                   //如果验证码错误则返回
	}
	$record = array(                              //构造更新数组
		'title'			=>$_POST ['title'],
		'name'			=>$_POST ['name'],
		'sex'			=>$_POST ['sex'],
		'qq'			=>$_POST ['qq'],
		'phone'			=>$_POST ['phone'],
		'email'			=>$_POST ['email'],
		'address'		=>$_POST ['address'],
		'content'		=>$_POST ['content'],
		'ip'			=>$_SERVER["REMOTE_ADDR"],
		'created_date'	=>date ( "Y-m-d H:i:s" )
	);
	$id = $db->insert('cms_message',$record);   //调用insert方法进行更新
	if($id){
		echo "<script>alert('留言成功！管理员审核才能看到！')
		window.location='message.php';</script>";
	}
}
?>
<table width="1000" border="0" cellspacing="0" cellpadding="0" class="mainBg">
  
  <tr>
    <td height="300" colspan="2" valign="top"><table width="741" border="0" align="center" cellpadding="0" cellspacing="0" >
      
      <tr>
        <td align="center" valign="top" class="paddingTB">
          
        <?php
		//查询cms_message中已经验证的留言消息
        $mlist = $db->getList("select * from cms_message where validate=1 order by id desc");
		//循环查询结果
		foreach($mlist as $list){
		?>
          <table width="700" border="0" cellpadding="0" cellspacing="0" class="guest">
            <tr>
              <!--输出留言者信息-->
              <th width="261" height="30" align="left" bgcolor="#364552">
              <span class="white">标题：</span>
			  <?php echo $list['title']?></th>
              <th width="437" align="right" bgcolor="#364552">
              <span class="white">留言者：</span>
			  <?php echo $list['name']?>&nbsp;&nbsp;
			  <?php echo $list['created_date']?>&nbsp;</th>
            </tr>
            <tr>
              <!--输出留言内容-->
              <td height="50" colspan="2" align="left" valign="top">
			  <?php echo $list['content']?>&nbsp;</td>
              </tr>
          </table>        
		<?php
		}
		?>
		<!--<table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="30" align="center" bgcolor="#274255" class="hui"><a href="#" class="hui12">下一页</a><a href="#" class="hui12">&nbsp;&nbsp;&nbsp;&nbsp;末 页</a>&nbsp;&nbsp;&nbsp;共1页&nbsp;&nbsp;&nbsp;当前第页 </td>
            </tr>
          </table>-->
          
          <form method="post" action="message.php">
        <table width="500" border="0" cellpadding="0" cellspacing="0" class="guest">
          <tr>
            <th height="40" colspan="4" align="center"><strong>留言</strong></th>
            </tr>
          <tr>
            <td width="60" height="40" align="left">标题：</td>
            <td colspan="3" align="left"><input name="title" type="text" style="width:90%"/></td>
            </tr>
          <tr>
            <td height="40" align="left">姓名：</td>
            <td width="179" align="left"><input name="name" type="text" id="name"  style="width:90%"/></td>
            <td width="68" align="left">验证码：</td>
            <td width="193" align="left"><input name="cfmcode" type="text" id="cfmcode" size="8" />
              <img src="include/key.php" width="60" height="20" /></td>
          </tr>
          <tr>
            <td height="40" align="left">性别：</td>
            <td align="left"><input name="sex" type="radio" value="M" checked />
              男
                <input type="radio" name="sex" value="F" />
                女</td>
            <td align="left">电话：</td>
            <td align="left"><input name="phone" type="text" id="phone"  style="width:76%"/></td>
          </tr>
          <tr>
            <td height="40" align="left">QQ：</td>
            <td align="left"><input type="text" name="qq"  style="width:90%"/></td>
            <td align="left">Email：</td>
            <td align="left"><input name="email" type="text" id="email"  style="width:76%"/></td>
          </tr>
          <tr>
            <td height="40" align="left">地址：</td>
            <td colspan="3" align="left"><input name="address" type="text" id="address"  style="width:90%"/></td>
            </tr>
          <tr>
            <td height="30" align="left">内容：</td>
            <td colspan="3" align="left"><textarea name="content" id="content" style="width:90%"></textarea></td>
            </tr>
          <tr>
            <td height="40" align="left">&nbsp;</td>
            <td colspan="3" align="left"><label>
              <input type="submit" name="Submit" value="　提交　" />
              &nbsp;&nbsp;
              <input type="submit" name="Submit2" value="　重置　" />
            </label></td>
            </tr>
        </table>
          </form></td>
      </tr>
    </table>
      <br /></td>
  </tr>
</table>


<?php
include_once 'footer.php';
?>
