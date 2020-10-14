<main>
    <?=render('templates/_cat-menu.php', ['categories' => $categories, 'cur_category' => $_GET['category']]);?>
    <div class="container">
        <section class="lots">
            <h2><?=$page_title?></h2>
            <ul class="lots__list">
                <?php
                foreach ($goods as $good) { ?>
                    <a class="text-link" href="lot.php?id=<?=$good['id']?>">
                        <li class="lots__item lot">
                            <div class="lot__image">
                                <img src="<?=$good['img']?>" width="350" height="260" alt="<?=$good['title']?>">
                            </div>
                            <div class="lot__info">
                                <span class="lot__category"><?=$good['category']?></span>
                                <h3 class="lot__title"><?=$good['title']?></h3>
                                <div class="lot__state">
                                    <div class="lot__rate">
                                        <span class="lot__amount">Текущая цена</span>
                                        <span class="lot__cost"><?=format_price($good['current_price']);?></span>
                                    </div>
                                    <div class="lot__timer timer <?=add_timer_class($good['end_date'])?>">
                                        <?= get_time_left($good['end_date']) ?>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </a>
                <?php  }
                ?>
            </ul>
        </section>
        <?=render('templates/_pagination.php', ['pages' => $pages, 'pages_count' => $pages_count, 'cur_page' => $cur_page]) ?>
    </div>
</main>
