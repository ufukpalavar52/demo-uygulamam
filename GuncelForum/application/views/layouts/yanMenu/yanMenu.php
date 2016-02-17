<?php
$progDiller = $this->ProgVtys_model->getProgdil(); 
?>
<div id='cssmenu'>  
    <p class="gizle">
        <button id="gizle"  type="button" class="btn btn-info btn-xs" data-toggle="offcanvas">İçerik <i class="glyphicon glyphicon-minus-sign"></i></button>
    </p>  
    <ul id="yanmenu">
        <li><a href='#'><span>Yazarlarımız</span></a></li>
        <li class='has-sub'><a href='#'><span>Programlama Dilleri</span> </a>
            <ul>
                <?php foreach ($progDiller as $progdil): ?>
                <li class='has-sub'><a href='#'><span><?= $progdil->prog_dil_adi ?></span></a>
                    <ul>
                        
                        <li class='last'><a href='#'><span>Dersler</span></a></li>
                        <li class='last'><a href='#'><span>Yazılar</span></a></li>
                        <li class='last'><a href='#'><span>Sorular</span></a></li>
                        
                    </ul>
                </li>
                <?php endforeach; ?>
            </ul>
        </li>
        <li class='has-sub'><a href='#'><span>Veritabanı</span></a>
            <ul>
                <li class='has-sub'><a href='#'><span>MSSQL</span></a>
                    <ul>
                        
                        <li class='last'><a href='#'><span>Dersler</span></a></li>
                        <li class='last'><a href='#'><span>Yazılar</span></a></li>
                        <li class='last'><a href='#'><span>Sorular</span></a></li>
                        
                    </ul>
                </li>
                <li class='has-sub'><a href='#'><span>MySQL</span></a>
                    <ul>
                        <li class='last'><a href='#'><span>Dersler</span></a></li>
                        <li class='last'><a href='#'><span>Yazılar</span></a></li>
                        <li class='last'><a href='#'><span>Sorular</span></a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href='#'><span>Makaleler</span></a></li>
        <li class='last'><a href='#'><span>Forum</span></a></li>
    </ul>
</div>