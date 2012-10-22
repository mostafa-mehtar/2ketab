<?php
    echo $this->Elfinder->loadLibs();
    echo $this->Elfinder->loadFinder('http://'.$_SERVER['HTTP_HOST'].Configure::read('App.url').$this->here);
?>
<div id="finder">elFinder</div>