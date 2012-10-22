<?php
if(empty($this->passedArgs['elmID'])){
    echo 'اشکال در بازیابی';
    return;
}
?>
<div id="searchPostDiv">
    <div>
        <form class="form-inline" onsubmit="$.get('<?php echo $this->Html->url() ?>',{'q':$('#searchPostText').val()},function(data){$('#searchPostDiv').parent().html(data);});return false;">
        <label class="inline">عنوان</label>
        <input id="searchPostText" type="text" value="<?php echo @$this->request->query['q'] ?>"/>
        <input type="submit" value="جستجو"class="btn" />
        </form>
    </div>
    <?php
    if(empty($categories)){
        echo 'هیچ مجموعه ای یافت نشد';
        return;
    }
    ?>
    <table class="table table-bordered table-striped table-min-padding">
        <thead>
            <tr>
                <th>ردیف</th>
                <th>عنوان</th>
            </tr>
        </thead>
        <?php foreach($categories as $category):?>
        <tr>
            <td><?php echo $category['ContentCategory']['id'] ?></td>
            <td><a onclick="$('#<?php echo $this->passedArgs['elmID'] ?>').val('<?php echo '/contents/category/'.$category['ContentCategory']['id'].'-'.$category['ContentCategory']['name']; ?>');$.modal.close();"><?php echo $category['ContentCategory']['name'] ?></a></td>
        </tr>
        <?php endforeach;?>
    </table>
    <?php
    $onclick ="$.get('" . $this->Filter->getUrl(true) . "/page:'+$(this).text(),function(data){\$('#searchPostDiv').parent().html(data);});return false;";
    $ul = '<ul>'.
          $this->Paginator->numbers(array('class' => 'page','tag' => 'li','currentClass' => 'active','separator' => ' ', 'href' => '#', 'onclick' => $onclick )).
          '</ul>';
    $span = $this->Html->tag('span',$this->Paginator->counter('صفحه {:page} از {:pages}'),array('class' => 'pages'));
    echo $this->Html->div('pagination',$ul . $span);
    ?>
</div>