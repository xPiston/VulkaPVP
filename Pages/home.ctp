<?php 
$this->Configuration = new ConfigurationComponent;
$this->Connect = new ConnectComponent;
$theme_config = file_get_contents(ROOT.'/app/View/Themed/Mineweb/config/config.json');
$theme_config = json_decode($theme_config, true);
?>
<link rel="stylesheet" href="/theme/Vulkapvp/rs-plugin/css/settings.css"/>
<?php if($theme_config['slider'] == "true") { ?>
<section class="slider-wrapper">
    <div class="tp-banner-container">
        <div class="tp-banner" >
            <ul>
                <?php if(!empty($search_slider)) { ?>
                    <?php $i = 0; foreach ($search_slider as $k => $v) { ?>
                <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                    <img src="<?= $v['Slider']['url_img'] ?>"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                    <div class="tp-caption <?= $v['Slider']['css_special'] ?> skewfromrightshort fadeout"
                         data-x="85"
                         data-y="224"
                         data-speed="500"
                         data-start="1200"
                         data-easing="Power4.easeOut"><h2><?= before_display($v['Slider']['title']) ?></h2>
                        <p><?= before_display($v['Slider']['subtitle']) ?></p>
                    </div>
                </li>
                        <?php $i++; } ?>
                <?php } else { ?>
                <!-- SLIDE  -->
                <li data-transition="zoomout" data-slotamount="7" data-masterspeed="1000" >
                    <!-- MAIN IMAGE -->
                    <img src="http://placehold.it/1920x500?text=Hello+World"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                    <!-- LAYERS -->
                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption largegreenbg skewfromrightshort fadeout"
                         data-x="85"
                         data-y="224"
                         data-speed="500"
                         data-start="1200"
                         data-easing="Power4.easeOut">Dev' en cours !
                    </div>
                    ...
                </li>
                ....
                <?php } ?>
            </ul>
        </div>
    </div>

</section><!-- end slider-wrapper -->
<?php } ?>
    <div class="mini-navbar mini-navbar-dark hidden-xs">
      <div class="container">
        <div class="col-sm-12">
          <?php 
          $banner_server = $this->Configuration->get('banner_server');
          if(empty($banner_server)) {
            if($Server->online()) {
              echo '<p class="text-center"><?= $Lang->banner_server($Server->banner_infos()) ?></p>';
            } else { 
              echo '<p class="text-center">'.$Lang->get('SERVER_OFF').'</p>';
            }
          } else {
            $banner_server = unserialize($banner_server);
            $server_infos = $Server->banner_infos($banner_server);
            if(!empty($server_infos['getPlayerMax'])) {
              echo '<p class="text-center">'.$Lang->banner_server($server_infos).'</p>';
            } else {
              echo '<p class="text-center">'.$Lang->get('SERVER_OFF').'</p>';
            }
          } 
          ?>
        </div>
      </div>
    </div>

    <div class="container bg">
        <div id="debug"></div>
        <div class="row">
            <?php if(!empty($search_news)) { ?>
            <ul id="items">
            <?php foreach ($search_news as $k => $v) { ?>
                <li class="col-md-4 animated fadeInUp">
                    <div>
                        <h2><?= substr($v['News']['title'], 0, 13); ?><?php if(strlen($v['News']['title']) > "13") { echo '...'; } ?></h2>
                        <?= substr($v['News']['content'], 0, 170); ?><?php if(strlen($v['News']['content']) > "170") { echo '...'; } ?>
                        <div class="btn-like">
                            <p><?= $v['News']['like'] ?> <i class="fa fa-thumbs-up"></i></p>
                        </div>
                        <div class="a-like pull-right">
                            <p><a href="<?= $this->Html->url(array('controller' => 'blog', 'action' => $v['News']['slug'])) ?>"><?= $Lang->get('READ_MORE') ?> »</a></p>
                        </div>
                    </div>
                </li>
            <?php } ?>
            </ul>
            <ol id="pagination"></ol>
            <?php } else { echo '<center><h3>'.$Lang->get('NO_NEWS').'</h3></center>'; } ?>
        </div>
        
        
    </div>
        <div class="brand-social hidden-sm hidden-xs">
            <div class="row">
                <div class="container">
                    <center>
                        <a class="btn-skype" target="_blank" href="<?= $this->Configuration->get('skype') ?>"><img src="theme/mineweb/img/skype.png"></a>
                        <a class="btn-youtube" target="_blank" href="<?= $this->Configuration->get('youtube') ?>"><img src="theme/mineweb/img/yt.png"></a>
                        <span><?= $Lang->get('JOIN_US') ?></span>
                        <a class="btn-twitter" target="_blank" href="<?= $this->Configuration->get('twitter') ?>"><img src="theme/mineweb/img/twitter.png"></a>
                        <a class="btn-facebook" target="_blank" href="<?= $this->Configuration->get('facebook') ?>"><img src="theme/mineweb/img/fb.png"></a>
                    </center>
                </div>
            </div>
        </div>

        <?= $Module->loadModules('home') ?>
<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
<script type="text/javascript" src="/theme/Vulkapvp/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
<script type="text/javascript" src="/theme/Vulkapvp/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript">
    var revapi;
    jQuery(document).ready(function() {
        revapi = jQuery('.tp-banner').revolution(
            {
                delay:9000,
                startwidth:1170,
                startheight:500,
                hideThumbs:10,
                fullWidth:"on",
                forceFullWidth:"on"
            });
    });	//ready
</script>

