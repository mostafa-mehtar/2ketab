<?php
$this->Validator->addRule(array('GalleryItem' => array('title', 'gallery_category_id', )));
$this->Validator->validate(); 
echo $this->Form->create('GalleryItem', array(
    'inputDefaults' => array(
        'error' => array(
            'attributes' => array(
                'class' => 'alert-input-error',
                'id' => 'msg'
            )
        ),
    ),
    'type' => 'file'
));
?>
<div id="toolbar-menu" class="row">
    <div class="title">ویرایش تصویر</div>
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
echo $this->Form->input('title', array('label' => 'عنوان تصویر'));
echo $this->Form->input('gallery_category_id', array('label' => 'مجموعه گالری', 'empty' =>  '--- انتخاب مجموعه ---'));
echo $this->Form->input('image', array('label' => 'انتخاب فایل', 'type' => 'file'));
echo $this->Form->input('description', array('label' => 'توضیحات'));
?>
<div>
    <label>منتشر شده</label>
    <input type="radio" name="data[GalleryItem][published]" value="1" <?php if ($this->Form->value('GalleryItem.published') == 1) echo 'checked=""' ?> /> بله
    <input type="radio" name="data[GalleryItem][published]" value="0" <?php if ($this->Form->value('GalleryItem.published') == 0) echo 'checked=""' ?> /> خیر
</div>
<?php
echo $this->Form->end();
?>