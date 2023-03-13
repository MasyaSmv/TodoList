<?php

use App\App\App;
use App\Models\Work;

/**
 * @param $url
 * @return void
 */
function redirect($url)
{
    header("Location: /{$url}");
}

/**
 * @param $viewName
 * @param $context
 * @return void
 */
function view($viewName, $context = [])
{
    extract($context, EXTR_OVERWRITE);
    $filePath = str_replace('.', '/', $viewName);

    return require "./../views/{$filePath}.php";
}

/**
 * @param $table
 * @return array|void
 */
function checkIdWork($table)
{
    if (!isset($_GET['id'])) {
        require "views/404.php";
        exit(0);
    }

    $id = trim(strip_tags($_GET['id']));

    $work = App::get('DB')->first($table, Work::class, $id);

    if (empty($work)) {
        require "views/404.php";
        exit(0);
    }

    return [$work[0], $id];
}