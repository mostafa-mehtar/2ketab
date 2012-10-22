<?php
// Add
$this->AdminForm->addToolbarItem($this->Html->tag('i','',array('class' => 'icon-refresh icon-white')),array('action' => 'sync','normalLink' => true ),array('class' => 'btn btn-success','escape' => false, 'rel' => 'tooltip','data-original-title' => 'بروزرسانی','tooltip-place' => 'bottom'));
foreach($aros as $aro_id => $aro){
    $this->AdminForm->addToolbarItem($this->Html->tag('i','',array('class' => 'icon-ok icon-white')),array('action' => 'editPermission', 'aro' => $aro_id,'type' => 'on'),array('class' => 'btn btn-success','escape' => false, 'rel' => 'tooltip','data-original-title' => $aro,'tooltip-place' => 'bottom'));
    $this->AdminForm->addToolbarItem($this->Html->tag('i','',array('class' => 'icon-remove icon-white')),array('action' => 'editPermission', 'aro' => $aro_id,'type' => 'off'),array('class' => 'btn btn-success','escape' => false, 'rel' => 'tooltip','data-original-title' => $aro,'tooltip-place' => 'bottom'));
}
//Show toolbar
$this->AdminForm->showToolbar('مدیریت سطح دسترسی');
echo $this->AdminForm->startFormTag('AclPermission');
?>
<table class="table table-bordered table-striped" id="permissions">
    <thead>
        <tr>
            <th style="width: 50px;"><?php echo $this->AdminForm->selectAll() ?></th>
            <th style="width: 150px;">تابع</th>
            <?php
            foreach($aros as $aro){
                echo $this->Html->tag('th',$aro);
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach($acos as $aco_id => $aco){
                if(substr_count($aco,'_') == 0){
                    echo '<tr class="Controller">';
                    echo $this->Html->tag('th',' - - - '.$aco,array('colspan' => 2 + count($aros)));    
                }else{
                    echo '<tr>';
                    echo $this->Html->tag('td', $this->AdminForm->checkbox($aco_id),array('id' => 'grid-align'));
                    echo $this->Html->tag('td',ltrim($aco,'_'));
                    foreach($permissions[$aco_id] as $aro_id => $permission){
                        echo '<td id="grid-align">';
                        if($permission){
                            // Published
                            echo $this->AdminForm->item(
                                $this->Html->image('tick.png'),//title
                                array('action' => 'editPermission', 'aro' => $aro_id,'type' => 'off'),// url
                                array('escape' => false)//option
                            );
                        }else{
                             // Non Published
                            echo $this->AdminForm->item(
                                $this->Html->image('publish_x.png'),
                                array('action' => 'editPermission', 'aro' => $aro_id,'type' => 'on'),
                                array('escape' => false)
                            );
                        }
                        echo '</td>';
                    }
                }
                echo '</tr>'; 
            }
        ?>
    </tbody>
</table>
<?php     echo $this->AdminForm->endFormTag();// end form tag ?>
<style>
.Controller th{
    text-align: right;
    font-weight: bold;
    cursor: pointer;
    background-color: #2C2C2C !important;
    color: #FFF;
}
</style>