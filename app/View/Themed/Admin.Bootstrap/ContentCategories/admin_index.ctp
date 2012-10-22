<?php
// Add
$this->AdminForm->addToolbarItem($this->Html->tag('i','',array('class' => 'icon-plus icon-white')),array('action' => 'add','normalLink' => true ),array('class' => 'btn btn-success','escape' => false, 'rel' => 'tooltip','data-original-title' => 'افزودن','tooltip-place' => 'bottom'));
// Delete
$this->AdminForm->addToolbarItem($this->Html->tag('i','',array('class' => 'icon-trash icon-white')),array('action' => 'delete','confirm' => 'آیا مطمئن هستید ؟'),array('class' => 'btn btn-danger','escape' => false, 'rel' => 'tooltip','data-original-title' => 'حذف','tooltip-place' => 'bottom'));
// Edit
$this->AdminForm->addToolbarItem($this->Html->tag('i','',array('class' => 'icon-pencil icon-white')),array('action' => 'edit','method' => 'get','firstChild' => true),array('class' => 'btn btn-info','escape' => false, 'rel' => 'tooltip','data-original-title' => 'ویرایش','tooltip-place' => 'bottom'));
// Publish
$this->AdminForm->addToolbarItem($this->Html->tag('i','',array('class' => 'icon-ok icon-white')),array('action' => 'publish'),array('class' => 'btn btn-info','escape' => false, 'rel' => 'tooltip','data-original-title' => 'انتشار','tooltip-place' => 'bottom'));
// unPublish
$this->AdminForm->addToolbarItem($this->Html->tag('i','',array('class' => 'icon-remove icon-white')),array('action' => 'unPublish'),array('class' => 'btn btn-info','escape' => false, 'rel' => 'tooltip','data-original-title' => 'عدم انتشار','tooltip-place' => 'bottom'));
//Show toolbar
$this->AdminForm->showToolbar('لیست مجموعه ها');

if (!empty($contentCategories)) {
    // start form tag
    echo $this->AdminForm->startFormTag();
    ?>
    <p>&nbsp;</p>
    <table class="table table-bordered table-striped">

        <tr>
            <th><?php echo $this->AdminForm->selectAll() ?></th>
            <th>ردیف</th>
            <th>نام</th>
            <th>تعداد مطالب</th>
            <th>وضعیت انتشار</th>
        </tr>
        <?php
        //current index
        $index = $this->Filter->paginParams['limit'] * ($this->Filter->paginParams['page'] - 1);
        foreach ($contentCategories as $contentCategory):
            ?>
        <tr>
            <td id="grid-align"><?php echo $this->AdminForm->checkbox($contentCategory['ContentCategory']['id']) ?></td>
            <td id="grid-align"><?php echo ++$index; ?></td>
            <td>
            <?php 
            // name with count level in begin
            $name = $this->Html->link($contentCategory['ContentCategory']['name'],array('action' => 'edit',$contentCategory['ContentCategory']['id']));
            for($i=0;$i<$contentCategory['ContentCategory']['level'] ; $i++){
                $name = $this->Html->tag('span','|&mdash;',array('class' => 'gi')) . $name;
            }
            echo  $name;
            ?></td>
            <td id="grid-align">
            <?php 
            echo $this->Html->link(
                $contentCategory['ContentCategory']['contentCount'], 
                array('controller' => 'contents', 'action' => 'index', 'content_category_id' => $contentCategory['ContentCategory']['id']), 
                array('class' => 'btn')
            ); 
            ?>
            </td>
            <td id="grid-align">
            <?php
            if ($contentCategory['ContentCategory']['published']) {
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
        </tr>
        <?php endforeach;?>
    </table>
    <?php 
    echo $this->AdminForm->endFormTag();// end form tag
}
?>
<?php echo $this->Filter->limitAndPaginate(); ?>