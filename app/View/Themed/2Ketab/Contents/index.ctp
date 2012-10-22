<?php
if(isset($categories)){
    $lastCategory = array_pop($categories);
    foreach($categories as $category){
        $this->Html->addCrumb($category['ContentCategory']['name'],array(
            'controller' => 'contents',
            'action' => 'category',
            $category['ContentCategory']['id'].'-'.$category['ContentCategory']['name'],
        ));
    }
    $this->Html->addCrumb($lastCategory['ContentCategory']['name']);
}
if(empty($contents)){
    echo $this->Html->tag('h4','هیچ مطلبی یافت نشد');
    return;
}
?>
<?php foreach($contents as $content):?>
    <article class="entry clearfix">
        <h2 class="entry-title"><a href="<?php echo $this->Html->url(array('action' => 'view',$content['Content']['id'].'-'.$content['Content']['slug'])) ?>"><?php echo $content['Content']['title']; ?></a></h2>
        <div class="entry-meta">
			<span class="calender"><?php echo Jalali::niceShort($content['Content']['created']); ?></span>
			<span class="comments"><a href="<?php echo $this->Html->url(array('action' => 'view',$content['Content']['id'].'-'.$content['Content']['slug']))?>#comments"><?php echo $content['countComment']; ?> نظر</a></span>
			<span class="user"><a href="#"><?php echo $content['User']['name']; ?></a></span>
		</div>
        <div class="entry-body">
            <p>
                <?php echo $content['Content']['intro']; ?>
                <?php if(!empty($content['Content']['content'])): ?>
                    <a class="readmore button dark small" href="<?php echo  $this->Html->url(array('action' => 'view',$content['Content']['id'].'-'.$content['Content']['slug'])) ?>">ادامه مطلب ...</a>
                <?php endif;?>
            </p>
		</div>
    </article>
<?php endforeach;?>
<nav class="blog-nav clearfix">
    <?php 
    $url = $this->Filter->getParam();
    // set to past action, so we can paginate link to it
    $url['action'] = $pastAction;
    $this->Paginator->options(array(
        'url' => $url,
    ));
    
    ?>
	<ul>
        <?php echo $this->Paginator->prev('',array('class' => 'previous','tag' => 'li'),'',array('class' => 'previous disabled','tag' => 'li')); ?>
        <?php echo $this->Paginator->numbers(array('class' => 'page','separator' => ' ','tag' => 'li')); ?>
        <?php echo $this->Paginator->next('',array('class' => 'next','tag' => 'li'),'',array('class' => 'next disabled','tag' => 'li')); ?>
	</ul>
</nav>