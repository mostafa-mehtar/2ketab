<?php

/**
 * Menu Helper used for generating menu 
 * 
 * @package     Gilas
 * @author      Hamid
 * @copyright   2012
 * @version     0.1
 * @access      public
 */
class MenuHelper extends AppHelper {

    /**
     * Used Helpers
     *
     * @var array
     */
    public $helpers = array('Html');

    /**
     * Getting menu items for current $menuTypeID
     * 
     * @param integer $menuTypeID  : id of MenuType Model
     * @param string  $classDiv    : div class for output: if false so without div
     * @param string  $activeStyle : class attribute for active item
     * @return
     */
    public function getMenu($menuTypeID, $classDiv = false, $activeStyle = null) {
        $items = $this->requestAction(array('controller' => 'menus', 'action' => 'getMenu', 'admin' => false, $menuTypeID));
        $output = $this->__generateMenu($items, $activeStyle, 'menu');
        if(! $classDiv){
            return $output;
        }
        return $this->Html->div($classDiv, $output);
    }

    /**
     * Generate recursive menu items
     * 
     * @param array  $menus       : items
     * @param string $activeStyle : class attribute for active item
     * @return ul li tag
     */
    private function __generateMenu($menus, $activeStyle,$ulStyle = 'menu') {
        $output = null;
        if ($menus) {
            foreach ($menus as $menu) {
                $child = null;
                $class = null;
                if ($menu['children']) {
                    $child = $this->__generateMenu($menu['children'], $activeStyle, 'sub-menu');
                }
                if ($child) {
                    $class = 'parent';
                    //Add activeStyle to parent if child is active
                    if(strpos($child, $activeStyle) !== false){
                        $class .= ' '.$activeStyle;
                    }
                }
                $here = $this->request->here(false);
                
                $output .= $this->Html->tag('li', $this->Html->link($menu['Menu']['title'], $menu['Menu']['link']) . $child, array('class' => ($here == $menu['Menu']['link']) ? $activeStyle : $class));
            }
        }
        return $this->Html->tag('ul', $output,array('class' => $ulStyle));
    }

}