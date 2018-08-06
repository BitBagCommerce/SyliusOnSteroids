<?php

//while (@ob_end_flush()) ;
//ob_implicit_flush(true);
//
//$count = 110 * 10 * 10 * 10;
//
//$content = '';
//$id = 17156;
//
//$content .= "INSERT INTO demo_dev.sylius_product_variant (id, product_id, tax_category_id, shipping_category_id, code, created_at, updated_at, position, version, on_hold, on_hand, tracked, width, height, depth, weight, shipping_required) VALUES ";
//
//for ($i = 1; $i <= $count; $i++) {
//
//    $p = $i - 1;
//
//    $content .= "($id, 1302, null, null, 'xx-variant-$i', '2018-08-03 01:21:21', '2018-08-03 01:21:21', $p, 1, 0, 6, 0, null, null, null, null, 1)";
//
//    if($i < $count) {
//        $content .= ",";
//    }
//
//    $id++;
//    if ($i % 1000 == 0) {
//        echo $i . PHP_EOL;
//    }
//}
//
//$content .= ";";
//
//$fp = fopen("../dump/sylius_product_variant.sql", "wb");
//fwrite($fp, $content);
//fclose($fp);
//
//echo "<br>";
//echo "<br>";
//
//
//while (@ob_end_flush()) ;
//ob_implicit_flush(true);
//
//$count = 110 * 10 * 10 * 10;
//
//$content = '';
//$id = 17156;
//
//$content .= "INSERT INTO demo_dev.sylius_product_variant_translation (id, translatable_id, name, locale) VALUES ";
//
//for ($i = 1; $i <= $count; $i++) {
//
//    $p = $i - 1;
//
//    $content .= "($id, $id, 'text', 'en_US')";
//
//    if($i < $count) {
//        $content .= ",";
//    }
//
//    $id++;
//    if ($i % 1000 == 0) {
//        echo $i . PHP_EOL;
//    }
//}
//
//$content .= ";";
//
//$fp = fopen("../dump/sylius_product_variant_translation.sql", "wb");
//fwrite($fp, $content);
//fclose($fp);
//
//echo "<br>";
//echo "<br>";
//
//
//while (@ob_end_flush()) ;
//ob_implicit_flush(true);
//
//$count = 110 * 10 * 10 * 10;
//
//$content = '';
//$id = 17156;
//
//$startA = 2304;
//$endA = 2413;
//$startB = 2414;
//$endB = 2423;
//$startC = 2424;
//$endC = 2433;
//$startD = 2434;
//$endD = 2443;
//$startE = 2444;
//$endE = 2453;
//
//$x = 1;
//
//$content .= "INSERT INTO demo_dev.sylius_product_variant_option_value (variant_id, option_value_id) VALUES ";
//
//for ($i = $id; $i <= ($count + $id); $i++) {
//    for ($j = $startA; $j <= $endA; $j++) {
//        for ($k = $startB; $k <= $endB; $k++) {
//            for ($l = $startC; $l <= $endC; $l++) {
//                for ($m = $startD; $m <= $endD; $m++) {
////                    for ($n = $startE; $n <= $endE; $n++) {
//
//                        $content .= "($i, $j),";
//
//                        $content .= "($i, $k),";
//
//                        $content .= "($i, $l),";
//
//                        $content .= "($i, $m),";
//
////                        $content .= "($i, $n),";
//
//                        if ($x % 1000 == 0) {
//                            echo $x . PHP_EOL;
//                        }
//
//                        $x++;
//                        $i++;
////                    }
//                }
//            }
//        }
//    }
//}
//
//$content = rtrim($content,",");
//
//$content .= ";";
//
//$fp = fopen("../dump/sylius_product_variant_option_value.sql", "wb");
//fwrite($fp, $content);
//fclose($fp);
//
//echo "<br>";
//echo "<br>";
//
//
//while (@ob_end_flush()) ;
//ob_implicit_flush(true);
//
//$count = 110 * 10 * 10 * 10;
//
//$content = '';
//$id = 17156;
//
//$content .= "INSERT INTO demo_dev.sylius_channel_pricing (id, product_variant_id, price, original_price, channel_code) VALUES ";
//
//for ($i = 1; $i <= $count; $i++) {
//
//    $p = $i - 1;
//
//    $content .= "($id, $id, 666, null, 'US_WEB')";
//
//    if($i < $count) {
//        $content .= ",";
//    }
//
//    $id++;
//    if ($i % 1000 == 0) {
//        echo $i . PHP_EOL;
//    }
//}
//
//$content .= ";";
//
//$fp = fopen("../dump/sylius_channel_pricing.sql", "wb");
//fwrite($fp, $content);
//fclose($fp);
//
//
//die;

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Symfony\Component\Debug\Debug;
use Symfony\Component\HttpFoundation\Request;

/*
 * Sylius front controller.
 * Dev environment.
 *
 * To develop on Sylius in Vagrant set the SYLIUS_APP_DEV_PERMITTED to a non zero value.
 * e.g. in apache, through your vhost configuration file:
 *
 *   SetEnv SYLIUS_APP_DEV_PERMITTED 1
 */
if (!getenv("SYLIUS_APP_DEV_PERMITTED") && (
        isset($_SERVER['HTTP_CLIENT_IP'])
        || isset($_SERVER['HTTP_X_FORWARDED_FOR'])
        || !(in_array(@$_SERVER['REMOTE_ADDR'], ['127.0.0.1', 'fe80::1', '::1', '113.0.0.1', '10.0.0.1'], true) || php_sapi_name() === 'cli-server')
    )) {
    header('HTTP/1.0 403 Forbidden');
    exit('You are not allowed to access this file. Check ' . basename(__FILE__) . ' for more information.');
}

/** @var \Composer\Autoload\ClassLoader $loader */
$loader = require __DIR__ . '/../vendor/autoload.php';

Debug::enable();

$kernel = new AppKernel('dev', true);

$request = Request::createFromGlobals();

$response = $kernel->handle($request);
$response->send();

$kernel->terminate($request, $response);
