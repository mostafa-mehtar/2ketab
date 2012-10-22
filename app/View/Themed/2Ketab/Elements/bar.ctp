<ul class="bar">
    <li class="search">
        <div>
            <form action="<?php echo $this->Html->url(array('controller' => 'contents', 'action' => 'search')); ?>">
                <!-- the "L" value represents the icon, don't change -->
                <input type="submit" value="L" title="Click to search" class="tooltip glyph" />
                <input type="text" placeholder="What you want to search?" name="q" value="<?php echo $this->request->data('q') ?>" />
            </form>
        </div>
    </li>
    <li>
        <a href="#">
            <span class="glyph opened-chat"></span>
        </a>
    </li>
    <li>
        <a href="#">
            <span class="glyph comment"></span>
        </a>
    </li>
    <li>
        <a href="#">
            <span class="glyph settings"></span>
        </a>
    </li>
    <li>
        <a href="#" title="edit profile" class="tooltip">
            <span class="glyph user"></span>
            <span class="text">admin</span>
        </a>
    </li>
</ul>