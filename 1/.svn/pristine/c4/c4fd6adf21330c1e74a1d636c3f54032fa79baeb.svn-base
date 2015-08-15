<?php require("joblistbox.php");?>
	
<div class="nextpage">
        <ul class="pager">
		<?php if(! (int)$firstpage):?>
			<li><a href="<?php echo site_url().'/job/page/'.$pagecount.'/'.strval($page-1) ?>">&larr;上一页</a></li>
		<?php endif?>
		<?php if((int)$page < (int)$pagecount):?>
            <li><a href="<?php echo site_url().'/job/page/'.$pagecount.'/'.strval($page+1) ?>">下一页 &rarr;</a></li>
		<?php endif?>
         <li><?php echo "第 ".$page." 页&nbsp;&nbsp;&nbsp;&nbsp;";?></li>
         <li><?php echo "共 ".$pagecount." 页";?></li>
         </ul>
</div>