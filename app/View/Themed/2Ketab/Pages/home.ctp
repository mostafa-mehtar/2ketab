<?php
$this->set('title_for_layout','اتحادیه محصولات فرهنگی مشهد');
echo $this->requestAction(array('controller' => 'Contents', 'action' => 'home'),array('return'));
?>