

    <header class="grid_12 ">
        <h1>Form</h1>
        <div class="clear"></div><span class="divider"></span>
    </header>
    <div class="box grid_12">
        <header>
            <div class="inner">
            <div class="left title">
            <div class="right" ><a class="close"></a></div>
                <h1>فرم ثبت نام</h1>
        </header>
        <div class="box-content">
            <?php
                echo $this->Form->create('User',array(
                    'inputDefaults' =>array(
                        'div' => array('class' => 'field fullwidth col-2 error-container','type'=>'text'),
                        'error' => array('attributes'=>array('class'=>'error')),
                    ),
                ));
                echo $this->Form->input('User.fname',array('label' => 'نام'.$this->Html->tag('span','*',array('class' => 'required'))));
                echo $this->Form->input('lname',array('label' => 'نام خانوادگی'.$this->Html->tag('span','*',array('class' => 'required'))));
                echo $this->Form->input('username',array('label' => 'نام کاربری'.$this->Html->tag('span','*',array('class' => 'required'))));
                echo $this->Form->input('password', array('label' => 'رمز عبور'.$this->Html->tag('span','*',array('class' => 'required'))));
                echo $this->Form->input('email', array('label' => 'ایمیل'.$this->Html->tag('span','*',array('class' => 'required'))));
                echo $this->Form->input('city',array('label'=>'شهر'.$this->Html->tag('span','*',array('class' => 'required')),'options' => $this->Html->getCityList($cities),'showParents' => true,'empty' => '-- انتخاب کنید --'));
                echo $this->Form->input('grade', array('label' => 'مقطع تحصیلی '.$this->Html->tag('span','*',array('class' => 'required'))));
                echo $this->Form->input('major', array('label' => 'رشته '.$this->Html->tag('span','*',array('class' => 'required'))));
                echo $this->Form->input('mobile', array('label' => 'موبایل'));
                ?>
                <div class="clear"></div>
                <footer class="pane">
                     <?php echo $this->Form->submit('ثبت نام',array('div' => false,'class'=>'bt blue'));?>
                </footer>                
            <?php echo $this->Form->end( )?>
         </div>
             
         
     </div>
