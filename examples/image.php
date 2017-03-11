<?php
spl_autoload_register(
    function($class) {
        static $classes = null;
        if ($classes === null) {
            $classes = array(
                'image\\image' => '/src/Image.php',
            );
        }
        $cn = strtolower($class);
        if (isset($classes[$cn])) {
            require __DIR__ .'/..'. $classes[$cn];
        }
    },
    true,
    false
);
require __DIR__.'/../vendor/autoload.php';

$origin = __DIR__.'/../resource/cat.png';
$image = new \image\Image($origin);
$info = $image->getInfo();
$lastModifyTime = $image->getLastModifyTime();
print_r($info);
print_r($lastModifyTime);
