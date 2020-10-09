<?php
require_once 'functions.php';
require_once 'config.php';

if (isset($db)) {
    $link = mysqli_connect($db['host'], $db['user'], $db['password'], $db['database']);
    mysqli_set_charset($link, 'utf8');

    $categories = [];
    $page_content = '';
}

// ===== Проверка подключения к базе данных
if (!$link) { // Не подключились
    $error = mysqli_connect_error();
    $page_content = render('templates/error.php', ['error' => $error]);
} else { // Подключились
    // Получаем категории товаров
    $sql = 'SELECT `category` FROM categories';
    $categories = get_array_from_db($link, $sql);
    // Получаем товары
    $sql = 'SELECT lots.id, lots.title, categories.category, lots.description, lots.img, lots.current_price, lots.price_step
            FROM lots
            JOIN categories
            ON lots.category_id = categories.id;';
    $goods = get_array_from_db($link, $sql);
}