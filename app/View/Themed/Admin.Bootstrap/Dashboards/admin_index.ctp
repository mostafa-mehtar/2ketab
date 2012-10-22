<div class="page-header">
    <h1>مدیریت بخش ها <small>مدیریت منو ، مطالب، گالری، اسلاید و ...</small></h1>
  </div>
<div class="row">
    <div class="span2 well" style="padding: 4px;">
        <?php echo $this->Html->image('icon-pack/48x48/File.png'); ?>
        <?php echo $this->Html->link('مدیریت مطالب', array('controller' => 'contents', 'action' => 'index', 'admin' => TRUE)); ?>
    </div>
    <div class="span2 well" style="padding: 4px;">
        <?php echo $this->Html->image('icon-pack/48x48/Folder.png'); ?>
        <?php echo $this->Html->link('مدیریت مجموعه مطالب', array('controller' => 'content_categories', 'action' => 'index', 'admin' => TRUE)); ?>
    </div>
    <div class="span2 well" style="padding: 4px;">
        <?php echo $this->Html->image('icon-pack/48x48/Balloon.png'); ?>
        <?php echo $this->Html->link('نظرات', array('controller' => 'comments', 'action' => 'index', 'admin' => TRUE)); ?>
    </div>
    <div class="span2 well" style="padding: 4px;">
        <?php echo $this->Html->image('icon-pack/48x48/Link.png'); ?>
        <?php echo $this->Html->link('مدیریت وب لینک ها', array('controller' => 'weblinks', 'action' => 'index', 'admin' => TRUE)); ?>
    </div>
    <div class="span2 well" style="padding: 4px;">
        <?php echo $this->Html->image('icon-pack/48x48/Image.png'); ?>
        <?php echo $this->Html->link('مدیریت تصاویر', array('controller' => 'gallery_items', 'action' => 'index', 'admin' => TRUE)); ?>
    </div>
    <div class="span2 well" style="padding: 4px;">
        <?php echo $this->Html->image('icon-pack/48x48/Address Book.png'); ?>
        <?php echo $this->Html->link('تماس ها', array('controller' => 'contact_details', 'action' => 'index', 'admin' => TRUE)); ?>
    </div>
    <div class="span2 well" style="padding: 4px;">
        <?php echo $this->Html->image('icon-pack/48x48/Database.png'); ?>
        <?php echo $this->Html->link('مدیریت منو', array('controller' => 'menus', 'action' => 'index', 'admin' => TRUE)); ?>
    </div>
    <div class="span2 well" style="padding: 4px;">
        <?php echo $this->Html->image('icon-pack/48x48/Image.png'); ?>
        <?php echo $this->Html->link('اسلایدر', array('controller' => 'SliderItems', 'action' => 'index', 'admin' => TRUE)); ?>
    </div>
    <?php if(GilasAclComponent::hasPermission(array('controller' => 'AclPermissions', 'action' => 'index', 'admin' => TRUE))): ?>
    <div class="span2 well" style="padding: 4px;">
        <?php echo $this->Html->image('icon-pack/48x48/Lock.png'); ?>
        <?php echo $this->Html->link('سطح دسترسی', array('controller' => 'AclPermissions', 'action' => 'index', 'admin' => TRUE)); ?>
    </div>
    <?php endif; ?>
</div>


<div class="page-header">
    <h1>لینک های متداول</h1>
  </div>
<div class="row">
    <div class="span2 well" style="padding: 4px;">
        <?php echo $this->Html->image('icon-pack/48x48/File.png'); ?>
        <?php echo $this->Html->link('افزودن مطالب', array('controller' => 'contents', 'action' => 'add', 'admin' => TRUE)); ?>
    </div>
    <div class="span2 well" style="padding: 4px;">
        <?php echo $this->Html->image('icon-pack/48x48/Folder.png'); ?>
        <?php echo $this->Html->link('افزودن مجموعه مطالب', array('controller' => 'content_categories', 'action' => 'add', 'admin' => TRUE)); ?>
    </div>
    <div class="span2 well" style="padding: 4px;">
        <?php echo $this->Html->image('icon-pack/48x48/Link.png'); ?>
        <?php echo $this->Html->link('افزودن وب لینک', array('controller' => 'weblinks', 'action' => 'add', 'admin' => TRUE)); ?>
    </div>
    <div class="span2 well" style="padding: 4px;">
        <?php echo $this->Html->image('icon-pack/48x48/Image.png'); ?>
        <?php echo $this->Html->link('افزودن تصاویر', array('controller' => 'gallery_items', 'action' => 'add', 'admin' => TRUE)); ?>
    </div>
    <div class="span2 well" style="padding: 4px;">
        <?php echo $this->Html->image('icon-pack/48x48/Address Book.png'); ?>
        <?php echo $this->Html->link('افزودن تماس', array('controller' => 'contact_details', 'action' => 'add', 'admin' => TRUE)); ?>
    </div>
    <div class="span2 well" style="padding: 4px;">
        <?php echo $this->Html->image('icon-pack/48x48/Database.png'); ?>
        <?php echo $this->Html->link('افزودن نوع منو', array('controller' => 'menus', 'action' => 'add', 'admin' => TRUE)); ?>
    </div>
    <div class="span2 well" style="padding: 4px;">
        <?php echo $this->Html->image('icon-pack/48x48/Database.png'); ?>
        <?php echo $this->Html->link('افزودن منو', array('controller' => 'menus', 'action' => 'add', 'admin' => TRUE)); ?>
    </div>
    <div class="span2 well" style="padding: 4px;">
        <?php echo $this->Html->image('icon-pack/48x48/Image.png'); ?>
        <?php echo $this->Html->link('افزودن اسلایدر', array('controller' => 'SliderItems', 'action' => 'add', 'admin' => TRUE)); ?>
    </div>
</div>

