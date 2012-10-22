<?php
$this->Validator->addRule('Content');
$this->Validator->validate(); 
echo $this->Form->create('Content', array(
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
    <div class="title">افزودن مطلب</div>
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
echo $this->Form->input('title', array('label' => 'عنوان مطلب'));
echo $this->Form->input('slug', array('label' => 'نام مستعار'));
echo $this->Form->input('content_category_id', array('label' => 'مجموعه','empty' => '--- انتخاب مجموعه ---' ,'value' => @$this->request->named['content_category_id'], ));
?>
<div>
    <label>منتشر شده</label>
    <input type="radio" name="data[Content][published]" value="1" <?php if ($this->Form->value('Content.published') == 1) echo 'checked=""' ?> /> بله
    <input type="radio" name="data[Content][published]" value="0" <?php if ($this->Form->value('Content.published') == 0) echo 'checked=""' ?> /> خیر
</div>
<div>
    <label>صفحه نخست</label>
    <input type="radio" name="data[Content][frontpage]" value="1" <?php if ($this->Form->value('Content.frontpage') == 1) echo 'checked=""' ?> /> بله
    <input type="radio" name="data[Content][frontpage]" value="0" <?php if ($this->Form->value('Content.frontpage') == 0) echo 'checked=""' ?> /> خیر
</div>
<div>
    <label>نظردهی به مطلب</label>
    <input type="radio" name="data[Content][allow_comment]" value="1" <?php if ($this->Form->value('Content.allow_comment') == 1) echo 'checked=""' ?> /> فعال
    <input type="radio" name="data[Content][allow_comment]" value="0" <?php if ($this->Form->value('Content.allow_comment') == 0) echo 'checked=""' ?> /> غیرفعال
</div>
<div>
    <label>نمایش نظرات</label>
    <input type="radio" name="data[Content][published_comment]" value="1" <?php if ($this->Form->value('Content.published_comment') == 1) echo 'checked=""' ?> /> بلافاصله نمایش داده شوند
    <input type="radio" name="data[Content][published_comment]" value="0" <?php if ($this->Form->value('Content.published_comment') == 0) echo 'checked=""' ?> /> خیر، پس از تایید نمایش داده شوند
</div>
<?php
$this->TinyMCE->editor('advanced');
echo $this->Form->input('intro', array('label' => 'متن','id' => 'tinyElm1', 'class' => 'tinymce'));
?>
<a onclick="insertReadmore();return false;" class="btn btn-primary" style="margin-top: 10px;">ادامه مطلب</a>
<?php
echo $this->Form->end();
?>
<script>
    function insertReadmore() {
            var content = $('#tinyElm1').html();
            if (content.match(/<hr\s+id=("|')system-readmore("|')\s*\/*>/i)) {
                    alert('چنین لینکی تنها یکبار مجوز درج دارد.');
                    return false;
            } else {
                if(content == ''){
                    alert('متنی باید وارد شود تا ادامه مطلب درج گردد');
                    return;
                }
                $('#tinyElm1').tinymce().execCommand('mceInsertContent',false,'<hr id="system-readmore" />');
            }
    }
</script>