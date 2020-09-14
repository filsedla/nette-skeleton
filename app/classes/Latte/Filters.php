<?php declare(strict_types = 1);

namespace App\Latte;

class Filters
{
    use \Nette\StaticClass;

    /**
     * @param string $filter
     * @param mixed $value
     * @return mixed
     */
    public static function common($filter, $value)
    {
        if (method_exists(__CLASS__, $filter)) {
            $args = func_get_args();
            array_shift($args);
            return call_user_func_array([__CLASS__, $filter], $args);
        }
    }

    /**
     * @param int $n
     * @return mixed
     */
    public static function plural($n)
    {
        $args = func_get_args();
        return $args[($n == 1) ? 1 : (($n >= 2 && $n <= 4) ? 2 : 3)];
    }

    /**
     * @param ...
     * @return string
     */
    public static function printf()
    {
        $args = func_get_args();
        $first = array_shift($args);
        return call_user_func_array('sprintf', array_merge($args, [$first]));
    }

    /**
     * @param float $value
     * @return float
     */
    public static function floor($value)
    {
        return floor($value);
    }

    /**
     * @param string $value
     * @return string
     */
    public static function bin2hex($value)
    {
        return bin2hex($value);
    }

}
