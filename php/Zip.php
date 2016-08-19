<?php
namespace CjsZip;

use ZipArchive;
use RuntimeException;
class Zip {

	public function __construct() {
		if (! class_exists('ZipArchive')) {
            throw new RuntimeException('The Zip PHP extension is not installed. Please install it and try again.');
        }
	}


	function extract($zipFile, $directory)
    {
        $archive = new ZipArchive;
        $archive->open($zipFile);
        $archive->extractTo($directory);
        $archive->close();
        return $this;
    }

}
$zipFile = __DIR__ . '/installer-master.zip';
$dir = __DIR__ . '/bbb/';
$zipObj = new \CjsZip\Zip();
$zipObj->extract($zipFile, $dir);
echo 'ok';
