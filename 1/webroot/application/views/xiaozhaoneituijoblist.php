<!--div class="listbox" style="border:0;padding-top:10px;">
<script type="text/javascript">
/*960*90，创建于2014-5-27*/
var cpro_id = "u1569320";
</script>
<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
</div-->
<div class="listbox" style="border: 1px solid #66CCFF;border-radius: 8px; margin-top: 30px;">
	<p style="font-size:22px;background:#66CCFF;text-align:center;color:white;">热门内推职位</p>
<?php require("xiaozhaojoblistbox.php");?>
</div>
	
<div class="nextpage">
        <ul class="pager">
		<?php if(! (int)$firstpage):?>
			<li><a href="<?php echo site_url().'/xiaozhao/recommend_page/'.$pagecount.'/'.strval($page-1) ?>">&larr;上一页</a></li>
		<?php endif?>
		<?php if((int)$page < (int)$pagecount):?>
            <li><a href="<?php echo site_url().'/xiaozhao/recommend_page/'.$pagecount.'/'.strval($page+1) ?>">下一页 &rarr;</a></li>
		<?php endif?>
         <li><?php echo "第 ".$page." 页&nbsp;&nbsp;&nbsp;&nbsp;";?></li>
         <li><?php echo "共 ".$pagecount." 页";?></li>
         </ul>
</div>