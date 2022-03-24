<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/shaon-hossain45/
 * @since      1.0.0
 *
 * @package    Public_Portfolio
 * @subpackage Public_Portfolio/admin
 */

//spl_autoload_register('itechpublic_newsletter_autoload');

/**
 * Autoload register
 *
 * @param  [type] $className [description]
 * @return [type]            [description]
 */
// function itechpublic_newsletter_autoload($className)
// {

//     // ClassName based path modify
//     $className = str_replace('\\', '/', strtolower($className));

//     $path      = plugin_dir_path(__FILE__);
//     $extention = '.class.php';
//     $fullpath  = $path . $className . $extention;
//     if (! file_exists($fullpath)) {
//         return false;
//     }
//     include_once $fullpath;
// }

//$newsletterObj = new admin\partials\Newsletter();

//$menuObj = new admin\partials\Menu($newsletterObj);