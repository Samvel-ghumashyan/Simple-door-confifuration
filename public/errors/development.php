<?php

/**
 * @var $errno \dconf\ErrorHandler
 * @var $errstr \dconf\ErrorHandler
 * @var $errfile \dconf\ErrorHandler
 * @var $errline \dconf\ErrorHandler
 */

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ошибка</title>
</head>
<body>

<h1>Произошла ошибка</h1>
<p><b>Код ошибки:</b> <?= $errno ?></p>
<p><b>Текст ошибки:</b> <?= $errstr ?></p>
<p><b>Файл, в котором произошла ошибка:</b> <?= $errfile ?></p>
<p><b>Строка, в которой произошла ошибка:</b> <?= $errline ?></p>

</body>
</html>
