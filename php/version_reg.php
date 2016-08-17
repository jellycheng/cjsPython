<?php
$input = "v1.0.2";
$Stability_regex = '[-|_|\.]{0,1}([R|r][C|c]|pl|a|alpha|[B|b][E|e][T|t][A|a]|b|B|patch|stable|p|[D|d][E|e][V|v]|[D|d])\.{0,1}(\d*)';
$regex = '/^' .
            'v?' .
            '(?:(\d+)[-|\.])?' .
            '(?:(\d+)[-|\.])?' .
            '(?:(\d+)\.)?' .
            '(?:(\d+))?' .
            '(?:' . $Stability_regex. ')?' .
            '$/';
if (!preg_match($regex, $input, $matches)) {
    echo "不匹配".PHP_EOL;
} else {
	var_export($matches);
	/**
	array (
		  0 => 'v1.0.2',
		  1 => '1',
		  2 => '0',
		  3 => '',
		  4 => '2',
		)
	*/
}
