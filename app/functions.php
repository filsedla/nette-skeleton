<?php declare(strict_types = 1);

/**
 * Dump; die;
 *
 * @params mixed
 * @return void
 */
function dd()
{
    foreach (func_get_args() as $var) {
        dump($var);
    }
    die;
}
