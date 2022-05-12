<div class="container-fluid">
    <?php foreach ($list as $val):;?>
    <div class="d-flex flex-column">
        <div class="col">
            <div class="card-header"><h3 class="text-left font-weight-light my-2"><?=$val['name']?></h3></div>
        </div>
        <div class="col">
            <?php $im = base64_encode($val['image']);?>
            <img src="data:image/jpeg;base64,<?=$im?>" align="left" width="200" height="200" hspace="10px" />
            <p><?=$val['description']?></p>
            <b>Цена: <?=$val['price']?></b>
        </div>
    </div>
    <hr class="dropdown-divider">
    <?php endforeach;?>

    <nav aria-label="Page pagination example">
        <ul class="pagination justify-content-center">
            <?php if ($pagination->page > 1):?>
                <li class="page-item">
                    <a class="page-link" href="/categories/<?=$category?>/<?=$pagination->page-1?>"><?='Назад'?></a>
                </li>
            <?php endif;?>

            <?php $i=1;

            while($i<=$pagination->amount):?>
                <li class="page-item">
                    <a class="page-link" href="/categories/<?=$category?>/<?=$i?>"><?=$i?></a>
                </li>
                <?php $i++; endwhile;?>

            <?php if ($pagination->page < $pagination->amount):?>
                <li class="page-item">
                    <a class="page-link" href="/categories/<?=$category?>/<?=$pagination->page+1?>"><?='Вперёд'?></a>
                </li>
            <?php endif;?>
        </ul>
    </nav>
</div>