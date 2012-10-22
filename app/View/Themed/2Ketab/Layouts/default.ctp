<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Admantium - Admin Control Panel</title>
        
        <!-- CSSs -->
        <?php 
        echo $this->Html->css(array(
            'reset', '960', 'icons', 'tipsy', 'formalize',
            'prettyPhoto', 'jquery-ui-1.8.18.custom', 'chosen', 'ui.spinner', 'jquery.jqplot.min',
            'fullcalendar', 'jquery.miniColors', 'elrte.min', 'elfinder', 'main',
        )); 
        echo $this->Html->script(array(
            'jquery', 'jquery-ui-1.8.18.custom.min', 'jquery.tipsy', 'jquery.formalize.min', 'jquery.modal',
            'prefixfree.min', 'jquery.prettyPhoto', 'autogrowtextarea', 'jquery.easing.1.3', 'jquery.fileinput',
            'chosen.jquery.min', 'ui.checkBox', 'ui.spinner.min', 'jquery.loading', 'jquery.path',
            'jquery.miniColors.min', 'jquery.maskedinput-1.3.min', 'jquery-ui-timepicker-addon', 'elrte.min', 'elfinder.min',
            'jquery.validate.min', 'jquery.metadata', 'main', 'demo',
        )); 
        ?>
    </head>
    <body>
        <!-- wrapper -->
        <div id="wrapper">
            <header>
                <div class="container_12">
                    <div class="grid_12">
                        <?php echo $this->element('menu'); ?>
                        <?php echo $this->element('bar'); ?>
                    </div>                
                </div>
            </header>

            <section id="main">
                <div class="container_12">
                        <?php echo $this->element('header'); ?>
                    <div id="content">
                        <?php echo $this->element('breadcrumb'); ?>
                        <div class="main-box"><?php echo $this->fetch('content'); ?></div>
                    </div>
                </div>
            </section>
        </div>
        <!-- /wrapper -->

        <footer><?php echo $this->element('footer'); ?></footer>
    </body>
</html>
