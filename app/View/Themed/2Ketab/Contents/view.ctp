<?php
$this->Validator->chooseForm('comment-form');
$this->Validator->addRule('Comment');
$this->Validator->validate();

foreach ($categories as $category) {
    $this->Html->addCrumb($category['ContentCategory']['name'], array(
        'controller' => 'contents',
        'action' => 'category',
        $category['ContentCategory']['id'] . '-' . $category['ContentCategory']['name'],
    ));
}
$this->Html->addCrumb($content['Content']['title']);
$this->set('title_for_layout',$content['Content']['title']);
?>
<article class="entry clearfix">
    <h2 class="entry-title"><a href="<?php echo $this->Html->url(array('action' => 'view',$content['Content']['id'].'-'.$content['Content']['slug'])) ?>"><?php echo $content['Content']['title']; ?></a></h2>
    <div class="entry-meta">
		<span class="calender"><?php echo Jalali::niceShort($content['Content']['created']); ?></span>
		<span class="comments"><a href="#comments"><?php echo count($comments); ?> نظر</a></span>
		<span class="user"><a href="#"><?php echo $content['User']['name']; ?></a></span>
	</div>
    <div class="entry-body">
        <p><?php echo $content['Content']['intro'].$content['Content']['content']; ?></p>
	</div>
</article>
<?php if (!empty($comments)): ?>
<section class="clearfix" id="comments">
    <h4 class="title"><?php echo count($comments); ?> نظر</h4>
    <ul class="comment-list">
        <?php foreach ($comments as $comment): ?>
            <li class="comment clearfix">
                <?php echo $this->Html->image('comment-avatar.jpg',array('class' => 'avatar', 'alt' => $comment['Comment']['name'])) ?>
                <article><span class="arrow"></span>
    				<div class="comment-meta">
    					<h4 class="author"><a target="_blank" href="<?php echo $comment['Comment']['website'] ?>"><?php echo $comment['Comment']['name'] ?></a></h4>
    					<p class="date"><?php echo Jalali::niceShort($comment['Comment']['created']) ?></p>
    				</div>
    
    				<div class="comment-body">
    					<p><?php echo $comment['Comment']['content'] ?></p>
    				</div>
    
    			</article>
            </li>
        <?php endforeach; ?>
    </ul>
</section>
<?php endif; ?>

<?php if ($content['Content']['allow_comment']): ?>
<?php echo $this->Session->flash('comment');?>
<section class="clearfix" id="comment-reply">
	<h4 class="title">ارسال نظر</h4>
    <?php echo $this->Form->create('Comment',array('id' => 'comment-form', 'class' => 'form')); ?>
		<p class="input-block">
			<label for="name"><strong>نام</strong> (required)</label>
            <?php echo $this->Form->input('name', array('label' => false, 'div' => false)); ?>
		</p>
		<p class="input-block">
			<label for="email"><strong>پست الکترونیک</strong> (required)</label>
            <?php echo $this->Form->input('email', array('label' => false, 'div' => false)); ?>
		</p>
		<p class="input-block">
			<label for="website"><strong>وبسایت</strong> </label>
            <?php echo $this->Form->input('website', array('label' => false, 'div' => false)); ?>
		</p>
		<p class="textarea-block">
			<label for="content"><strong>متن</strong> (required)</label>
            <?php echo $this->Form->input('content', array('label' => false, 'div' => false)); ?>
		</p>
        <?php echo $this->Form->end('ارسال'); ?>
</section>
<?php endif; ?>