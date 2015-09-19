<?php
    $this->Configuration = new ConfigurationComponent;
    $this->EyPlugin = new EyPluginComponent;
?>
<!--Animations CSS-->
<link rel="stylesheet" href="../webroot/css/animate.min.css"/>

<!--Bootstrap-->
<link rel="stylesheet" href="../webroot/css/bootstrap.css"/>

<!--Owl-Carousel-->
<link rel="stylesheet" href="../webroot/css/owl-carousel.css"/>

<!--RoyalSlider + Skin-->
<link rel="stylesheet" href="../webroot/css/royalslider.css"/>
<link rel="stylesheet" href="../webroot/css/rs-default-inverted.css"/>

<!--Slider revolution settings-->
<link rel="stylesheet" href="../webroot/css/settings.css"/>

<!--Custom CSS-->
<link rel="stylesheet" href="../webroot/css/style.css"/>

<header id="header-style-1" class="dark_header">
    <div class="container">
        <nav class="navbar yamm navbar-default">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="/" class="navbar-brand">VulkaPVP</a>
            </div>

            <div id="navbar-collapse-1" class="navbar-collapse collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li class="dropdown yamm-fw<?php if($this->params['controller'] == 'pages') { ?> actived<?php } ?>">
                        <a href="<?= $this->Html->url('/') ?>"><i class="fa fa-home" title="<?= $Lang->get('HOME') ?>"></i></a>
                    </li>
                    <?php
                    if(!empty($nav)) {
                        $i = 0;
                        $count = count($nav);
                        $count2 = $count / 2;
                        foreach ($nav as $key => $value) { ?>
                            <?php if(empty($value['Navbar']['submenu'])) { ?>
                                <li <!--class="--><?php /*if($i < $count2) { echo ' pull-left'; } elseif($i >= $count2) { echo ' pull-right'; } */?><?php if($this->params['controller'] == $value['Navbar']['name']) { ?> actived<?php } ?>">
                                    <a href="<?= $value['Navbar']['url'] ?>"><?= $value['Navbar']['name'] ?></a>
                                </li>
                            <?php } else { ?>
                                <li <!--class="dropdown--><?php /*if($i < $count2) { echo ' pull-left'; } elseif($i >= $count2) { echo ' pull-right'; } */?>">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?= $value['Navbar']['name'] ?> <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <?php
                                        $submenu = json_decode($value['Navbar']['submenu']);
                                        foreach ($submenu as $k => $v) {
                                            ?>
                                            <li><a href="<?= rawurldecode($v) ?>"><?= rawurldecode(str_replace('+', ' ', $k)) ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } ?>
                            <?php
                            $i++;
                        }
                    } ?>
                    <li class="dropdown">
                            <?php if($this->Connect->connect()) { ?>
                                <a style="padding-top:6px;" href="<?= $this->Html->url(array('controller' => 'profile', 'action' => 'index', 'plugin' => null)) ?>" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><?= $this->Connect->get_pseudo() ?></a>
                            <?php } else { ?>
                                <a style="padding-top:6px;" href="#login" href="#" data-toggle="modal" data-target="#login" class="btn btn-primary"><i class="fa fa-user"></i></a>
                            <?php } ?>
                            <ul class="dropdown-menu" role="menu">
                                <?php if($this->Connect->connect()) { ?>

                                    <img class="img-rounded" src="<?= $this->Html->url(array('controller' => 'API', 'action' => 'get_head_skin/', 'plugin' => false)) ?>/<?= $this->Connect->get_pseudo() ?>/60" title="<?= $this->Connect->get_pseudo() ?>">

                                    <span class="info pull-right">
                              <?php
                              echo $this->Connect->get('money') . ' ';
                              if($this->Connect->get('money') == 1 OR $this->Connect->get('money') == 0) {
                                  echo  $this->Configuration->get_money_name(false, true);
                              } else {
                                  echo  $this->Configuration->get_money_name();
                              } ?>
                            </span>
                                    <div class="clearfix"></div>

                                    <li class="divider"></li>

                                    <a class="btn btn-primary btn-block" href="<?= $this->Html->url(array('controller' => 'profile', 'action' => 'index', 'plugin' => null)) ?>"><?= $Lang->get('PROFILE') ?></a>

                                    <?php if($this->Connect->if_admin()) { ?>
                                        <a style="color:red;" class="btn btn-primary btn-block" href="<?= $this->Html->url(array('controller' => '', 'action' => 'index', 'plugin' => 'admin')) ?>"><?= $Lang->get('ADMIN_PANEL') ?></a>
                                    <?php } elseif($this->EyPlugin->is_installed('Shop')) { ?>
                                        <a class="btn btn-primary btn-block" href="<?= $this->Html->url(array('controller' => 'shop', 'action' => 'index', 'plugin' => 'shop')) ?>"><?= $Lang->get('ADD_MONEY') ?></a>
                                    <?php } ?>

                                    <a class="btn btn-primary btn-block" href="<?= $this->Html->url(array('controller' => 'user', 'action' => 'logout', 'plugin' => null)) ?>"><?= $Lang->get('LOGOUT') ?></a>
                                <?php } else { ?>
                                    <a class="btn btn-primary btn-block" href="#" data-toggle="modal" data-target="#login"><?= $Lang->get('LOGIN') ?></a>
                                    <a class="btn btn-primary btn-block" href="#" data-toggle="modal" data-target="#register"><?= $Lang->get('REGISTER') ?></a>
                                <?php } ?>
                            </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

