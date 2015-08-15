<div class="listbox" style="border: 1px solid #FFA042;border-radius: 8px; margin-top: 30px;">
	<p style="font-size:22px;background:#FFA042;text-align:center;color:white;">热门校招职位</p>	
<?php require("xiaozhaojoblistbox.php");?>
</div>
	
<div class="nextpage">
        <ul class="pager">
		<?php if(! (int)$firstpage):?>
			<li><a href="<?php echo site_url().'/xiaozhao/page/'.$pagecount.'/'.strval($page-1) ?>">&larr;上一页</a></li>
		<?php endif?>
		<?php if((int)$page < (int)$pagecount):?>
            <li><a href="<?php echo site_url().'/xiaozhao/page/'.$pagecount.'/'.strval($page+1) ?>">下一页 &rarr;</a></li>
		<?php endif?>
         <li><?php echo "第 ".$page." 页&nbsp;&nbsp;&nbsp;&nbsp;";?></li>
         <li><?php echo "共 ".$pagecount." 页";?></li>
         </ul>
</div>