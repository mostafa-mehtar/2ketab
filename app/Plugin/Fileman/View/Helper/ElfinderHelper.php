<?php 
App::uses('AppHelper', 'View/Helper');
class ElfinderHelper extends AppHelper {
    public $helpers = array('Js', 'Html');
     
    function loadLibs() {
        return $this->Html->css(array("Fileman.elfinder.min","Fileman.theme","jquery-ui-1.8.18.custom")).$this->Html->script(array("jquery","jquery-ui-1.8.18.custom.min","Fileman.elfinder.min","Fileman.i18n/elfinder.fa","Fileman.proxy/elFinderSupportVer1"));
    }
      
    function loadFinder($url){
        $code = "$(document).ready(function(){  
                    var f = $('#finder').elfinder({
                        url : '".$url."',
                        lang: 'fa',
                        transport : new elFinderSupportVer1(),
                        docked : false
                    }).elfinder('instance');    
                }); "; 
        return $this->Html->scriptBlock($code);
    } 
} 
?>