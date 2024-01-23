<?php

namespace App\Models;

class PageLayout
{
    public static function admin($content)
    {
        return "pages/admin/$content.php";
    }

    public static function user($content)
    {
        return "pages/user/$content.php";
    }

    public static function shared($content)
    {
        return "pages/shared/$content.php";
    }
}
