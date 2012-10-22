<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php
            echo SettingsController::read('Site.Name');
            echo ' - ';
            echo $title_for_layout;
            ?>
        </title>
        <?php
        echo $this->Html->meta('icon');
        echo $this->Html->meta('description', SettingsController::read('Site.Description'));
        echo $this->Html->meta('keywords', SettingsController::read('Site.Keywords'));

        echo $this->Html->css('bootstrap-rtl.min');
        echo $this->Html->css('bootstrap-responsive-rtl.min');
        echo $this->Html->css('template');
        echo $this->Html->css('box');
        echo $this->Html->script('jquery');
        echo $this->Html->script('bootstrap');
        echo $this->Html->script('init');
        echo $this->Html->script('box');
        
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <?php echo $this->Html->link($this->Html->image('logo-small.png'), array('controller' => 'dashboards','plugin' => false, 'action' => 'index', 'admin' => TRUE), array('class' => 'brand', 'escape' => false)); ?>
                    <button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                    <div class="nav-collapse">
                        <?php echo $this->element('menu'); ?>
                    </div><!--/.nav-collapse -->
                    <div class="user-info">
                        <?php echo $onlineUsersCount; ?>  حاضرین در سایت
                        <?php echo $this->Html->link('نمایش سایت', '/',array('target' => '_blank')); ?>
                        <span>سلام</span>
                        <?php echo AuthComponent::user('name'); ?>
                        <?php echo $this->Html->link('خروج', array('controller' => 'users', 'action' => 'logout', 'admin' => TRUE)); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div id="top">
                <div id="flash_message"><?php echo $this->Session->flash('auth'); ?></div>
                <div id="flash_message"><?php echo $this->Session->flash('flash', array('element' => 'message')); ?></div>
            </div>
            <div id="content"><?php echo $this->fetch('content'); ?></div>
           <!-- <div id="footer"><pre><?php echo $this->element('sql_dump'); ?></pre></div> -->
        </div>
    </body>
</html>