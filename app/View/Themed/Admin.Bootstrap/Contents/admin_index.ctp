<?php
// Add
$this->AdminForm->addToolbarItem($this->Html->tag('i','',array('class' => 'icon-plus icon-white')),array('action' => 'add','content_category_id' => @$this->request->named['content_category_id'],'normalLink' => true ),array('class' => 'btn btn-success','escape' => false, 'rel' => 'tooltip','data-original-title' => 'افزودن','tooltip-place' => 'bottom'));
// Delete
$this->AdminForm->addToolbarItem($this->Html->tag('i','',array('class' => 'icon-trash icon-white')),array('action' => 'delete','confirm' => 'آیا مطمئن هستید ؟'),array('class' => 'btn btn-danger','escape' => false, 'rel' => 'tooltip','data-original-title' => 'حذف','tooltip-place' => 'bottom'));
// Edit
$this->AdminForm->addToolbarItem($this->Html->tag('i','',array('class' => 'icon-pencil icon-white')),array('action' => 'edit','method' => 'get','firstChild' => true),array('class' => 'btn btn-info','escape' => false, 'rel' => 'tooltip','data-original-title' => 'ویرایش','tooltip-place' => 'bottom'));
//Order Down but show arraw up, because we fetch content DESC from table
$this->AdminForm->addToolbarItem($this->Html->tag('i','',array('class' => 'icon-arrow-up icon-white')),array('action' => 'move','type' => 'Down'),array('class' => 'btn btn-info','escape' => false, 'rel' => 'tooltip','data-original-title' => 'حرکت به بالا','tooltip-place' => 'bottom'));
//Order Up but show arraw down, because we fetch content DESC from table
$this->AdminForm->addToolbarItem($this->Html->tag('i','',array('class' => 'icon-arrow-down icon-white')),array('action' => 'move','type' => 'Up'),array('class' => 'btn btn-info','escape' => false, 'rel' => 'tooltip','data-original-title' => 'حرکت به پایین','tooltip-place' => 'bottom'));
// Publish
$this->AdminForm->addToolbarItem($this->Html->tag('i','',array('class' => 'icon-ok icon-white')),array('action' => 'publish'),array('class' => 'btn btn-info','escape' => false, 'rel' => 'tooltip','data-original-title' => 'انتشار','tooltip-place' => 'bottom'));
// unPublish
$this->AdminForm->addToolbarItem($this->Html->tag('i','',array('class' => 'icon-remove icon-white')),array('action' => 'unPublish'),array('class' => 'btn btn-info','escape' => false, 'rel' => 'tooltip','data-original-title' => 'عدم انتشار','tooltip-place' => 'bottom'));
//Show toolbar
$this->AdminForm->showToolbar('لیست مطالب');

//Filtering
// we use action in options for rewriting action attr without querystring
echo $this->Filter->create('Content',array('action' => 'index'));
echo $this->Filter->input('title',array('label' => 'عنوان'));
echo $this->Filter->input('published',array(
    'label' => 'وضعیت',
    'options' => array('' => '','0' => 'منتشر نشده', '1' => 'منتشر شده'))
);
echo $this->Filter->input('frontpage',array(
    'label' => 'صفحه نخست',
    'options' => array('' => '','0' => 'عدم نمایش', '1' => 'نمایش'))
);
echo $this->Filter->input('allow_comment',array(
    'label' => 'قابلیت نظر دهی',
    'options' => array('' => '','0' => 'ندارد', '1' => 'دارد'))
);
echo $this->Filter->input('content_category_id',array(
    'label' => 'مجموعه',
    'options' => $contentCategories,
    'empty' => ''
    )
);
echo $this->Filter->end();

if (!empty($contents)) {
    // start form tag
    echo $this->AdminForm->startFormTag();
    ?>
    <table class="table table-bordered table-striped">

        <tr>
            <th><?php echo $this->AdminForm->selectAll(); ?></th>
            <th>ردیف</th>
            <th><?php echo $this->Paginator->sort('Content.title','عنوان') ?></th>
            <th><?php echo $this->Paginator->sort('ContentCategory.name','مجموعه') ?></th>
            <th><?php echo $this->Paginator->sort('Content.published','منتشر شده') ?></th>
            <th><?php echo $this->Paginator->sort('Content.frontpage','صفحه نخست') ?></th>
            <th><?php echo $this->Paginator->sort('Content.allow_comment','نظر دهی') ?></th>
            <th><?php echo $this->Paginator->sort('User.name','نویسنده') ?></th>
            <th><?php echo $this->Paginator->sort('Content.modified','آخرین ویرایش') ?></th>
            <th>نظرات</th>
            <th class="ordering-col">ترتیب</th>
        </tr>
        <?php
        //current index
        $index = $this->Filter->paginParams['limit'] * ($this->Filter->paginParams['page'] - 1);
        
        foreach ($contents as $content):
            ?>
            <tr>
                <td id="grid-align"><?php echo $this->AdminForm->checkbox($content['Content']['id']) ?></td>
                <td><?php echo ++$index; ?></td>
                <td><?php echo $this->Html->link($content['Content']['title'],array('action' => 'edit', $content['Content']['id'])); ?></td>
                <td id="grid-align"><?php echo $this->Html->link($content['ContentCategory']['name'],array('controller' => 'ContentCategories', 'action' => 'edit', $content['ContentCategory']['id'])); ?></td>
                <td id="grid-align">
                <?php
                if ($content['Content']['published']) {
                    // Published
                    echo $this->AdminForm->item(
                        $this->Html->image('tick.png'),//title
                        array('action' => 'unPublish'),// url
                        array('escape' => false)//option
                    );
                } else {
                    // Non Published
                    echo $this->AdminForm->item(
                        $this->Html->image('publish_x.png'),
                        array('action' => 'publish'),
                        array('escape' => false)
                    );
                }
                ?>
                </td>
                <td id="grid-align">
                <?php
                if ($content['Content']['frontpage']) {
                    // in frontpage
                    echo $this->AdminForm->item(
                        $this->Html->image('tick.png'),//title
                        array('action' => 'removeFromFrontPage'),// url
                        array('escape' => false)//option
                    );
                } else {
                    // not in frontpage
                    echo $this->AdminForm->item(
                        $this->Html->image('publish_x.png'),
                        array('action' => 'addToFrontpage'),
                        array('escape' => false)
                    );
                }
                ?>
                </td>
                <td id="grid-align">
                <?php
                if ($content['Content']['allow_comment']) {
                    // comment allowed
                    echo $this->AdminForm->item(
                        $this->Html->image('tick.png'),//title
                        array('action' => 'disallowComment'),// url
                        array('escape' => false)//option
                    );
                } else {
                    // comment disallowed
                    echo $this->AdminForm->item(
                        $this->Html->image('publish_x.png'),
                        array('action' => 'allowComment'),
                        array('escape' => false)
                    );
                }
                ?>
                </td>
                <td id="grid-align"><?php echo $content['User']['name']; ?></td>
                <td id="grid-align"><?php echo Jalali::niceShort($content['Content']['modified']); ?></td>
                <td id="grid-align"> 
                <?php 
                echo $this->Html->link(
                    $content['Content']['commentCount'], 
                    ($content['Content']['commentCount'])?array('controller' => 'comments', 'action' => 'view', $content['Content']['id']):'#', 
                    array('class' => 'btn')
                ); 
                ?>
                </td>
                <td>
                <?php
                //Order Up but show arraw down, because we fetch content DESC from table
                if(!empty($content['Content']['hasLeft'])){
                   echo $this->AdminForm->item(
                        $this->Html->tag('i','',array('class' => 'icon-arrow-down icon-white')),
                        array('action' => 'move','type' => 'Up'),
                        array('class' => 'btn btn-info','style' => 'float:left','escape' => false)
                    );
                } 
                
                //Order Down but show arraw up, because we fetch content DESC from table
                if(!empty($content['Content']['hasRight'])){ 
                    echo $this->AdminForm->item(
                        $this->Html->tag('i','',array('class' => 'icon-arrow-up icon-white')),
                        array('action' => 'move','type' => 'Down'),
                        array('class' => 'btn btn-info','style' => 'float:right','escape' => false)
                    );
                }
                ?>
                </td>
            </tr>
            <?php
        endforeach;
        ?>
    </table>
    <?php
    echo $this->AdminForm->endFormTag();// end form tag
}
?>
<?php echo $this->Filter->limitAndPaginate(); ?>