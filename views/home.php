<!-- views/img/prueba_evento.svg -->


<div class="container" data-spy="scroll" data-target=".navbar" data-offset="50" style="z-index: 1;">

<div id="section1" class="container" style="padding-top:40px;padding-bottom:30px">

<div class="card-columns">



<?php

foreach ($showsList as $show)
{  
?>
    <a href='/utn/tpfinallab4/event/showDetail/?showid=<?=$show->getIdShow()?>'>
        <div class="card">
            <img class="card-img-top" src="/utn/tpfinallab4/views/img/prueba_evento.svg" alt="Card image">
            <div class="card-img-overlay">
                <h6 class="card-title"><?=$show->getShowName()?></h6>

            </div>
        </div>
    </a>
<?php
}
?>

</div>
</div>
</div>






