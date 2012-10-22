<?php
$this->Validator->addRule(array('Weblink'=>array('weblink_category_id', 'title')));
$this->Validator->validate(); 
echo $this->Form->create('Weblink', array(
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
    <div class="title">افزودن وب لینک</div>
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
echo $this->Form->input('weblink_category_id', array(
    'label' => 'مجموعه', 
    'value' => @$this->request->named['category_id'],
    'empty' => '--- انتخاب مجموعه ---'
    )
);
echo $this->Form->input('title', array('label' => 'عنوان'));
echo $this->Form->input('description', array('label' => 'توضیحات'));
echo $this->Form->input('address', array('label' => 'آدرس وب'));
?>
<div>
    <label>منتشر شده</label>
    <input type="radio" name="data[Content][published]" value="1" <?php if ($this->Form->value('Content.published') == 1) echo 'checked=""' ?> /> بله
    <input type="radio" name="data[Content][published]" value="0" <?php if ($this->Form->value('Content.published') == 0) echo 'checked=""' ?> /> خیر
</div>
<?php echo $this->Form->end(); ?>