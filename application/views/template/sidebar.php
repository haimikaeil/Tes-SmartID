<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse" style="position: fixed;">
        <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <?php foreach ($menu as $key => $c): ?>
                <?php if ($key == 2): ?>
                <li class="heading">
                    <h3 class="uppercase">Menu Master</h3>
                </li>      
                <?php endif ?>

                <?php if ($key == 3): ?>
                <li class="heading">
                    <h3 class="uppercase">Menu Utama</h3>
                </li>      
                <?php endif ?>

                <?php  foreach ($c as $keys => $s): $active = '';?>
                    <?php 
                        $url = site_url($s->link);

                        if ($this->uri->segment(1) == $s->link || $this->uri->segment(1).'/'.$this->uri->segment(2) == $s->link):
                            $active = 'active';
                        endif 
                    ?>
                    <li class="nav-item start <?=$active. @$parent?>">
                        <a href="<?= $url ?>" class="nav-link">
                            <i class="<?=$s->icon?>"></i>
                            <span class="title"><?=$s->nama?></span>
                        </a>
                    </li>    
                <?php endforeach ?>
                
              
            <?php endforeach ?>
            
        </ul>
    </div>
</div>