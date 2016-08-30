<?php

namespace App\Libraries;

class CacheBuster
{
    /**
     * Return md5 of the file if exist
     *
     * @param $path
     *
     * @return string
     */
    public static function url($path)
    {
        if (file_exists(public_path($path))) {
            $path .= sprintf('?md5=%s', md5_file(public_path($path)));
        }

        return $path;
    }
}
