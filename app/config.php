<?php
/*
	Конфигурационный файл
	Документация: https://fatfreeframework.com/3.6/quick-reference#SystemVariables
*/

# Debug (0 - 3)
$f3->set('DEBUG', 0);

# CACHE, 1 - ON, 0 - OFF
$f3->set('CACHE', 0);

/*
	Настройки оптимизации.
	В даном разделе можно отключить генерацию CSS кода
	из LESS, а так же включить слияние всего CSS \ JS кода
	в один файл соотвественно. При включении даной опции,
	генерируется кеш файлы для CSS и JS в каталоге "cache/".
	Файлы генерируются только 1 раз. Если кеш файл уже существует,
	то генератор не будет его обновлять, пока вы его не удалите
	из каталога "temp/". Сливаются лишь те CSS и JS файлы, что
	заданы через настройки тут: "assets/includes.php"
*/

# Компилировать LESS в CSS
$f3->set('COMPILE_LESS', 1);
# Собрать весь CSS код в один файл
$f3->set('COMBINE_CSS', 0);
# Собрать весь JS код в один файл
$f3->set('COMBINE_JS', 0);

# Часовой пояс
$f3->set('TZ', 'Europe/Moscow');

# Templates folder
$f3->set('UI', 'view/');

# Temp folder
$f3->set('TEMP', 'assets/temp/');

# Autoload classes form folders:
$f3->set('AUTOLOAD', '
	app/;
	app/core/;
');

# Каталог для логов
$f3->set('LOGS','app/logs/');

# Кем сделано
$f3->set('PACKAGE','CL9 System on Fat-Free Framework');

# Версия фреймфорка и CMS
$f3Ver = $f3->get('VERSION');
$f3->set('VERSION','F3: '.$f3Ver.'; CL9: 0.2');

# Базовый линк сайта ( без слеша в конце, пример: https://colin990.tech/page, page - подкаталог, в котором лежит система )
$f3->set('BASEURL',$f3->get('SCHEME').'://'.$f3->get('HOST').$f3->get('BASE'));

# Корневой каталог сайта на сервере
$f3->set('BASEPATH', dirname( dirname(__FILE__) ) );

# Определяет устройство с которого смотрят страницу
# Переопределяется скриптом в файле app/CL9.php
# По умолчанию - 0, десктоп
$f3->set('IS_MOBILE',0);