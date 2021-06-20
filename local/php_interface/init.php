<?

$includePath = __DIR__.'/include/';
$files = [
    'constant.php',
    'functions.php',
    'handlers.php',
];
foreach ($files as $file)
    if (file_exists($includePath.$file))
        include $includePath.$file;






