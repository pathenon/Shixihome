<html>
  <head>
    <script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>
    <!--script type="text/javascript" src="<?php echo base_url()?>/js/jquery-1.11.0.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url()?>/js/unslider.js"></script-->
    <style>
        .navi ul li {
float: none;
border-bottom: 1px solid #FF9933;
background-color: #FF9933;
font-size: 90%;
line-height: 25px;
margin-bottom: 0em;
padding: 0;
}
</style>
    <title></title>
  </head><?php 
          $user = $this->session->userdata("user");
          $uid = $this->session->userdata("uid");                 
  ?><?php
          if(!isset($_SESSION)){ 
                  session_start();
          }
          include_once('config.php' );
          include_once('saetv2.ex.class.php' );
          $o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
          $code_url = $o->getAuthorizeURL( WB_CALLBACK_URL );
  ?>
  <body>
    <div class="header" style="height:80px;width:100%;background-color:#FF9933;">
      <div style="width:1200px; margin-left:auto; margin-right:auto;">
        <div class="sitelogo">
          <a href=" <?php echo site_url();?>">
            <img src=" <?php echo base_url()?>/images/logo2.png" />
          </a>
        </div>
        <div style="float:left;">
          <ul class="navi" style="height:80px; width:auto;">
            <li>
            <a href=" <?php echo site_url()?>/xiaozhao/index" id="channel1">校招职位</a> 
            <span style="color:red; font-size:12px;margin-left:110px;top: 50%;margin-top: -40px;position: absolute;">new</span>
            <ul style="margin-left:-40px;">
              <li>
                <a href=" <?php echo site_url()?>/xiaozhao/searchCategory/1">研发&amp;测试</a>
              </li>
              <li>
                <a href=" <?php echo site_url()?>/xiaozhao/searchCategory/2">产品&amp;设计</a>
              </li>
              <li>
                <a href=" <?php echo site_url()?>/xiaozhao/searchCategory/3">运营&amp;市场</a>
              </li>
              <li>
                <a href=" <?php echo site_url()?>/xiaozhao/searchCategory/4">行政&amp;管理</a>
              </li>
              <li>
                <a href=" <?php echo site_url()?>/xiaozhao/searchCategory/5">金融&amp;财务</a>
              </li>
            </ul></li>
            <li>
            <a href=" <?php echo site_url()?>/xiaozhao/recommend" id="channel3">牛人内推</a> 
            <span style="color:red; font-size:12px;margin-left:100px;top: 50%;margin-top: -40px;position: absolute;">Hot</span></li>
            <li>
              <a href=" <?php echo site_url()?>/bbs/index" target="_blank" id="channel4">交流论坛</a>
            </li>
            <!--li><a href="<?php echo site_url()?>/job/experiences">趣闻面经</a></li-->
            <!--li><a href="<?php echo site_url()?>/social/browse">结伴而行</a></li-->
            <!--li><a href="<?php echo site_url()?>/job/about">关于我们</a></li-->
            <!--li><wb:follow-button uid="3909281223" type="red_1" width="67" height="24" ></wb:follow-button></li-->
          </ul>
        </div>
        <div style="float:right; height:80px; line-height:80px;"><?php if(!$user){?>
        <span>
          <a href=" <?php echo $code_url?>">
            <img src=" <?php echo base_url()?>/images/weibo2.png" />
          </a>
        </span> 
        <span style="margin-left:10px;">
          <a style="color:white;" href=" <?php echo site_url()?>/user/login">登陆</a>
        </span> 
        <span style="margin-left:20px;">
          <a style="color:white;" href=" <?php echo site_url()?>/user/register">注册</a>
        </span> <?php }?> <?php 
                                        if($user) { 
                                        ?> 
        <span>
          <a style="color:white;" href=" <?php echo site_url().'/user/account/'.$uid ?>" target="_blank">
            <?php echo $user; ?>
          </a>
        </span> 
        <span style="margin-left:20px;">
          <a style="color:white;" href=" <?php echo site_url()?>/user/logout">注销</a>
        </span> <?php }?></div>
      </div>
    </div>
    <div style="clear:both;"></div>
    <!-- JiaThis Button BEGIN -->
    <!--script type="text/javascript" src="http://v3.jiathis.com/code/jiathis_r.js?uid=1383744771011656&move=0&amp;btn=r1.gif" charset="utf-8"></script-->
    <!-- JiaThis Button END -->
  </body>
</html>
