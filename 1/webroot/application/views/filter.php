<div class="search">
	<?php echo form_open_multipart("job/search"); ?>
        <input name="keyword" class="form-control" type="text" id="keyword" value="" style="width:90%; float:left; height:40px;" placeholder="顺序输入公司，职位搜索，多个关键词用空格分开。" />
        <input name="btnSearch" type="submit" value="搜&nbsp;索"  class="button small green" style="margin-left:10px; height:40px;" id="btnSearch"/>
	</form>
</div>
<div style="clear:both;"></div>
		
        <div class="filterbox" style="border:0">
            <div class="filtercontent">
                 <dl class="choose">
                    <span style="color:red; margin-right:15px;">热点地区:</span>
                    <span style="color:red">
					<a style="margin-left:10px;color:rgb(175, 75, 75);" href="<?php echo site_url().'/job/searchPlace/北京' ?>"   >北京</a>
					<a style="margin-left:10px;color:rgb(175, 75, 75);" href="<?php echo site_url().'/job/searchPlace/上海' ?>"   >上海</a> 
					<a style="margin-left:10px;color:rgb(175, 75, 75);" href="<?php echo site_url().'/job/searchPlace/杭州' ?>"   >杭州</a>
					<a style="margin-left:10px;color:rgb(175, 75, 75);" href="<?php echo site_url().'/job/searchPlace/深圳' ?>"   >深圳</a>
					<a style="margin-left:10px;color:rgb(175, 75, 75);" href="<?php echo site_url().'/job/searchPlace/广州' ?>"   >广州</a>
					
					</span>
                </dl>
                <!--dl class="choose">
                    <dt>
						<div style="color:red">热点公司:</div>
					</dt>
                    <dd>
					<a href="<?php echo site_url().'/job/index' ?>">不限</a> 
					<a href="<?php echo site_url().'/job/searchfield/IT' ?>">IT</a> 
					<!--a href="<?php echo site_url().'/job/searchCompany/谷歌' ?>">谷歌</a>
					<a href="<?php echo site_url().'/job/searchCompany/微软' ?>">微软</a>
					<a href="<?php echo site_url().'/job/searchCompany/百度' ?>">百度</a>
					<a href="<?php echo site_url().'/job/searchCompany/人人' ?>">人人</a>
					<a href="<?php echo site_url().'/job/searchCompany/搜狐' ?>">搜狐</a>
					<a href="<?php echo site_url().'/job/searchCompany/亚马逊' ?>">亚马逊</a>
					<a href="<?php echo site_url().'/job/searchCompany/新浪' ?>">新浪</a>
					<a href="<?php echo site_url().'/job/searchCompany/淘宝' ?>">淘宝</a>
					<a href="<?php echo site_url().'/job/searchCompany/搜狗' ?>">搜狗</a>
					<a href="<?php echo site_url().'/job/searchCompany/阿里巴巴' ?>">阿里巴巴</a>
					<a href="<?php echo site_url().'/job/searchCompany/网易' ?>">网易</a>
					<a href="<?php echo site_url().'/job/searchCompany/豆瓣' ?>">豆瓣</a>
					<a href="<?php echo site_url().'/job/searchCompany/360' ?>">360</a>
					<a href="<?php echo site_url().'/job/searchCompany/爱奇艺' ?>">爱奇艺</a>
					<a href="<?php echo site_url().'/job/searchCompany/58同城' ?>">58同城</a>
					<a href="<?php echo site_url().'/job/searchCompany/海豚' ?>">海豚浏览器</a>
					<a href="<?php echo site_url().'/job/searchCompany/酷6网' ?>">酷6网</a>
					<a href="<?php echo site_url().'/job/searchCompany/IBM' ?>">IBM</a>
					<a href="<?php echo site_url().'/job/searchCompany/EMC' ?>">EMC</a>
					</dd>
                </dl-->
                <!--div class="hr-line">&nbsp;</div-->               
            </div>
        </div>