<?php
include_once 'header.php';
?>
<table width="1000" border="0" cellspacing="0" cellpadding="0" class="mainBg">
  <tr>
    <td width="236" height="45" align="center" class="hui">欢迎使用文章管理系统！</td>
    <td width="558" class="blue"><MARQUEE scrollAmount=1 scrollDelay=40 direction=left width=558 >
      <table width="528" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="28" align="center"><img src="images/ico.gif" width="9" height="13" /></td>
          <td width="520">网站的最新资讯</td>
        </tr>
      </table>
      </MARQUEE>
    </td>
    <td width="206"><span class="hui">现在时间：2012年11月3日　星期六</span></td>
  </tr>
  <tr>
    <td height="300" rowspan="2" valign="top" class="leftBoxLine">
    <!--最新公告面板-->
     <table width="220" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="40" class="leftTitleBg">
          <img src="images/img_03.gif" width="114" height="35" /></td>
        </tr>
        <tr>
          <td height="40" style="padding-left:20px;">
          <!--网站最新公告的跑马灯效果-->
            <marquee scrollamount="1" scrolldelay="40" direction="up" width="220" 
               height="120" onmouseover="this.stop()" onmouseout="this.start()">
             <!--循环并输出最新公告-->
            <?php foreach(getNoticeList() as $list){?>
            <div class="divList">
               <a href="notice.php?id=<?php echo $list['id']?>" 
                   class="hui12" target="_blank"><?php echo $list['title']?>..</a>
             </div>
            <?php }?>
            </MARQUEE>
          </td>
        </tr>
      </table>
      
      <table width="220" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="47" class="leftTitleBg"><img src="images/img_04.gif" width="125" height="47" /></td>
        </tr>
        <tr>
          <td height="120" align="left" valign="top" class="hui" style="padding-left:10px"><br />
            mial:webmaster@domain.com<br />
            http://www.21cn.com
            </a> </td>
        </tr>
      </table></td>
    <td rowspan="2" valign="top">
    <!--从数据库表中提取栏目信息-->
	<?php foreach(getCategoryList() as $list){?>
      <!--循环显示栏目信息-->
      <table width="96%" border="0" align="center" cellpadding="0" cellspacing="0" >
        <tr>
          <!--显示栏目标题-->
          <td width="82%" height="40" align="left" class="centerTitleBg">
		        <?php echo $list['name']?>
          </td>
          <!--显示更多信息的图片-->
          <td width="18%" align="right" class="centerTitleBg">
             <a href="list.php?id=16">
             <img src="images/more.gif" width="39" height="7" border="0" />
             </a>&nbsp;&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" align="left" valign="top" class="hui">
           <table width="99%" border="0" cellpadding="0" cellspacing="0" class="news">
            </table>
            <table width="99%" border="0" cellpadding="0" cellspacing="0" class="news">
            <!--调用getArticleList显示最近的文章列表-->
             <?php foreach(getArticleList("cid=".$list['id']."|row=3") as $list){?>
              <tr>
                <td height="25" align="left">
                <!--显示文章列表链接-->
                <a href="show.php?id=<?php echo $list['id']?>" target="_blank">
				  <?php echo $list['title']?></a>&nbsp;</td>
                <td width="120" align="left">
				  <?php echo $list['pubdate']?>&nbsp;</td>
              </tr>
              <?php }?>
            </table></td>
        </tr>
      </table>
      <?php }?>
      </td>
    <td align="left" valign="top"><table width="192" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="images/img_09.gif" width="192" height="9" /></td>
      </tr>
      <tr>
        <th align="center" class="ProductLine"><form id="form1" name="form1" method="get" action="search.php">
            <p>
              本站搜索
                <br />
                <input type="text" name="keywords" id="keywords" />
                <br />
                <input type="submit" name="button" id="button" value="搜索" />
            </p>
        </form></th>
      </tr>
      <tr>
        <td><img src="images/img_10.gif" width="192" height="9" /></td>
      </tr>
    </table>      <br /></td>
  </tr>
  <tr>
    <td align="left" valign="bottom"><table width="192" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="images/img_09.gif" width="192" height="9" /></td>
      </tr>
      <tr>
        <th height="26" class="ProductLine" align="center">友情链接</th>
      </tr>
      <tr>
        <td height="100" align="left" valign="top" class="ProductLine padding"><?php foreach(getFriendLinkList() as $list){?>
          <div class="ProductList"><a href="<?php echo $list['url']?>" target="_blank"><?php echo $list['name']?></a></div>
          <?php }?></td>
      </tr>
      <tr>
        <td><img src="images/img_10.gif" width="192" height="9" /></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php 
include_once 'footer.php';
?>
