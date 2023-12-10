<?php

namespace App\Facades;

/**
 * AppFacade
 */
class AppFacade
{
    /**
     * 配列からキーを指定して値を取得
     * 
     * @param array  array 配列
     * @param string key   キー
     * @return mixed 値
     */
    public static function getArrayValue($array, $key)
    {
        if (array_key_exists($key, $array) == true)
        {
            return $array[$key];
        }
        else
        {
            return null;
        }
    }
}