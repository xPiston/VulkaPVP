<?php
    $this->Configuration = new ConfigurationComponent;
    $this->EyPlugin = new EyPluginComponent;
?>
<header id="header-style-1" class="dark_header affix-top">
    <div class="container">
        <nav class="navbar yamm navbar-default">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="/" class="navbar-brand"><img src="/theme/Vulkapvp/img/logo.png" alt="Logo" style="
    width: 25%;
"></a>
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
                                <li <?php /*if($i < $count2) { echo ' pull-left'; } elseif($i >= $count2) { echo ' pull-right'; } */?><?php if($this->params['controller'] == $value['Navbar']['name']) { ?> actived<?php } ?>">
                                    <a href="<?= $value['Navbar']['url'] ?>"><?= $value['Navbar']['name'] ?></a>
                                </li>
                            <?php } else { ?>
                                <li class="dropdown <?php /*if($i < $count2) { echo ' pull-left'; } elseif($i >= $count2) { echo ' pull-right'; } */?>">
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
                                <a href="<?= $this->Html->url(array('controller' => 'profile', 'action' => 'index', 'plugin' => null)) ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <?= $this->Connect->get_pseudo() ?> <span class="caret"></span></a>
                            <?php } else { ?>
                                <a href="#login" data-toggle="modal dropdown" data-target="#login" class="dropdown-toggle"><i class="fa fa-user"></i><span class="caret"></span></a>
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

                                    <li><a href="<?= $this->Html->url(array('controller' => 'profile', 'action' => 'index', 'plugin' => null)) ?>"><?= $Lang->get('PROFILE') ?></a></li>

                                    <?php if($this->Connect->if_admin()) { ?>
                                        <li><a style="color:red;"  href="<?= $this->Html->url(array('controller' => '', 'action' => 'index', 'plugin' => 'admin')) ?>"><?= $Lang->get('ADMIN_PANEL') ?></a></li>
                                    <?php } elseif($this->EyPlugin->is_installed('Shop')) { ?>
                                        <li><a href="<?= $this->Html->url(array('controller' => 'shop', 'action' => 'index', 'plugin' => 'shop')) ?>"><?= $Lang->get('ADD_MONEY') ?></a></li>
                                    <?php } ?>

                                    <li><a href="<?= $this->Html->url(array('controller' => 'user', 'action' => 'logout', 'plugin' => null)) ?>"><?= $Lang->get('LOGOUT') ?></a></li>
                                <?php } else { ?>
                                    <li><a href="#" data-toggle="modal" data-target="#login"><?= $Lang->get('LOGIN') ?></a></li>
                                   <li><a href="#" data-toggle="modal" data-target="#register"><?= $Lang->get('REGISTER') ?></a></li>
                                <?php } ?>
                            </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

