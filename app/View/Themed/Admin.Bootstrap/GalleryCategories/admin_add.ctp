<?php
$this->Validator->addRule('GalleryCategory');
$this->Validator->validate(); 
echo $this->Form->create('GalleryCategory', array(
    'inputDefaults' => array(
        'error' => array(
            'attributes' => array(
                'class' => 'alert-input-error',
                'id' => 'msg'
            )
        ),
    )
));
?>
<div id="toolbar-menu" class="row">
    <div class="title">افزودن مجموعه گالری</div>
    <ul id="toolbar">
        <li>
            <a onclick="$(this).parents('form').submit();" class="btn btn-success" tooltip-place="bottom" data-original-title="ذخیره" rel="tooltip" >
                <i class="icon-ok icon-white"></i><input type="submit" style="display: none;" />
            </a>
        </li>
        <li>
            <a href="<?php echo $this->Html->url(array('action' => 'index')); ?>" class="btn btn-danger" tooltip-place="bottom" data-original-title="انصراف" rel="tooltip" >
                <i class="icon-remove icon-white"></i>
            </a>
        </li>
    </ul>
</div>
<?php
echo $this->Form->input('parent_id', array('label' => 'مجموعه مرجع','empty' => '--- بدون مرجع ---'));
echo $this->Form->input('name', array('label' => 'نام مجموعه'));
echo $this->Form->input('folder_name', array('label' => 'نام پوشه برای ذخیره تصاویر'));
?>
<div>
    <label>منتشر شده</label>
    <input type="radio" name="data[GalleryCategory][published]" value="1" <?php if ($this->Form->value('GalleryCategory.published') == 1) echo 'checked=""' ?> /> بله
    <input type="radio" name="data[GalleryCategory][published]" value="0" <?php if ($this->Form->value('GalleryCategory.published') == 0) echo 'checked=""' ?> /> خیر
</div>
<?php
echo $this->Form->end();
?>
