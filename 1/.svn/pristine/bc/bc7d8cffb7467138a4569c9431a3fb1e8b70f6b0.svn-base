<?php require("parttimejoblistbox.php");?>
	
<div class="nextpage">
		<?php if(!isset($type)):?>
        <ul class="pager">
		<?php if(! (int)$firstpage):?>
			<li><a href="<?php echo site_url().'/parttime/page/'.$pagecount.'/'.strval($page-1) ?>">&larr;上一页</a></li>
		<?php endif?>
		<?php if((int)$page < (int)$pagecount):?>
            <li><a href="<?php echo site_url().'/parttime/page/'.$pagecount.'/'.strval($page+1) ?>">下一页 &rarr;</a></li>
		<?php endif?>
		<?php endif?>
		
		<?php if(isset($type) && $type == 'place'):?>
        <ul class="pager">
		<?php if(! (int)$firstpage):?>
			<li><a href="<?php echo site_url().'/parttime/place_page/'.$pagecount.'/'.strval($page-1).'/'.$value ?>">&larr;上一页</a></li>
		<?php endif?>
		<?php if((int)$page < (int)$pagecount):?>
            <li><a href="<?php echo site_url().'/parttime/place_page/'.$pagecount.'/'.strval($page+1).'/'.$value ?>">下一页 &rarr;</a></li>
		<?php endif?>
		<?php endif?>
         <li><?php echo "第 ".$page." 页&nbsp;&nbsp;&nbsp;&nbsp;";?></li>
         <li><?php echo "共 ".$pagecount." 页";?></li>
         </ul>
</div>