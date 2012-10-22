<ul class="nav">
    <li><?php echo $this->Html->link('تنظیمات', array('controller' => 'settings', 'action' => 'index', 'admin' => TRUE)); ?></li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">مطالب
            <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
            <li><?php echo $this->Html->link('مدیریت مطالب', array('controller' => 'contents','plugin' => false, 'action' => 'index', 'admin' => TRUE)); ?></li>
            <li><?php echo $this->Html->link('مدیریت مجموعه مطالب', array('controller' => 'content_categories','plugin' => false, 'action' => 'index', 'admin' => TRUE), array('class' => 'active')); ?></li>
        </ul>
    </li>
    <li><?php echo $this->Html->link('نظرات', array('controller' => 'comments','plugin' => false, 'action' => 'index', 'admin' => TRUE)); ?></li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">وب لینک ها
            <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
            <li><?php echo $this->Html->link('مدیریت وب لینک ها', array('controller' => 'weblinks','plugin' => false, 'action' => 'index', 'admin' => TRUE)); ?></li>
            <li><?php echo $this->Html->link('مدیریت مجموعه وب لینک', array('controller' => 'weblink_categories','plugin' => false, 'action' => 'index', 'admin' => TRUE), array('class' => 'active')); ?></li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">گالری تصاویر
            <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
            <li><?php echo $this->Html->link('مدیریت تصاویر', array('controller' => 'gallery_items','plugin' => false, 'action' => 'index', 'admin' => TRUE)); ?></li>
            <li><?php echo $this->Html->link('مدیریت مجموعه گالری تصاویر', array('controller' => 'gallery_categories','plugin' => false, 'action' => 'index', 'admin' => TRUE), array('class' => 'active')); ?></li>
        </ul>
    </li>
    <li><?php echo $this->Html->link('تماس ها', array('controller' => 'contact_details','plugin' => false, 'action' => 'index', 'admin' => TRUE)); ?></li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">منو
            <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
            <li><?php echo $this->Html->link('مدیریت نوع منو', array('controller' => 'menuTypes', 'action' => 'index', 'admin' => TRUE,'plugin' => false)); ?></li>
            
            <?php
            $menus = $this->requestAction(array('controller' => 'menuTypes','action' => 'getTypes','admin' => TRUE,'plugin' => false));
            if($menus){
                echo $this->Html->tag('li','',array('class' => 'divider'));
                foreach($menus as $menuId => $menu){
                    echo '<li>';
                    echo $this->Html->link($menu, array('controller' => 'menus','plugin' => false, 'action' => 'index', 'admin' => TRUE,'menu_type_id' => $menuId));
                    echo '</li>';
                }
            }
            ?>
            <li class="divider"></li>
            <li><?php echo $this->Html->link('مدیریت منو', array('controller' => 'menus','plugin' => false, 'action' => 'index', 'admin' => TRUE)); ?></li>
        </ul>
    </li>
    <li><?php echo $this->Html->link('اسلایدر', array('controller' => 'SliderItems','plugin' => false, 'action' => 'index', 'admin' => TRUE)); ?></li>
</ul>