<?
use Umino\ScanDir;
include_once __DIR__.'/include/core/scandir.php';
$files = (new ScanDir())->scan(__DIR__.'/include',['php']);
foreach ($files as $file)
    if (file_exists($file))
        include_once $file;






