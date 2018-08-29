<?php
/**
 * Created by PhpStorm.
 * User: Ivo
 * Date: 8/29/2018
 * Time: 17:54
 */

namespace Fsearch\Facade;

class Fsearch extends \Illuminate\Support\Facades\Facade
{
    public static function getFacadeAccessor()
    {
        return 'fsearch';
    }
}
