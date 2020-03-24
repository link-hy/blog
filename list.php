<?php 
include_once 'header.php';

?>
<table width="99%" border="0" cellpadding="0" cellspacing="0" class="news">
  <!--提取数据库中的特定栏目下的文章列表，每页显示10行-->
  <?php foreach(getArticleList("cid=".$_GET['id']."|row=10") as $list){?>
  <tr>
    <td height="30" align="left">
      <!--显示文章标题-->    
     <a href="show.php?id=<?php echo $list['id']?>" target="_blank">
	  <?php echo $list['title']?></a>&nbsp;</td>
    <td width="120" align="left">
      <!--显示发布日期-->
	  <?php echo $list['pubdate']?>&nbsp;</td>
  </tr>
  <?php }?>
  <tr>
     <!--显示栏目分页链接-->
    <td height="30" colspan="2" align="center" style="padding-right:20px">
	<?php echo getPagination("list.php?id=".$_GET['id']);?></td>
  </tr>
</table>
<?php 
include_once 'footer.php';
?>
