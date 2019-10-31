<?php
/*
	Сайт построен и работает на базе движка CL9 System ( нескольких библиотек, взятых с 
	фреймворка F3: https://fatfreeframework.com/ и надстройки от автора Colin990 )
	
	Руководство и подробности на сайте: https://lpe.colin990.com/
*/

# Main F3 Framework Object
$f3 = require_once('app/core/Base.php');

if ((float)PCRE_VERSION<7.9)
	trigger_error('PCRE version is out of date');

# Load Сonfiguration
require_once('app/config.php');

# Load Routes
require_once('app/route.php');

# Load UI Includes
require_once('assets/includes.php');

# Run Colin System App
$CL9 = new CL9();

# META для социалок и продвижения

# Название сайта
$f3->set('META.sitename','CL9 System');

# Заголовок
$f3->set('META.title','CL9 Landing Page Engine');

# Описание
$f3->set('META.desc','Система для создания Landing Page');

# Ключевые слова
$f3->set('META.keys','Landing, Engine, Framework, System');

# Картинка для соц. сетей, размер: 1200x630px
$f3->set('META.image', $f3->get('BASEURL').'/assets/images/social.jpg');

# Run F3 System
$f3->run();

/*
	Данный код распространяется под лицензией GNU GPL v3.0
	Автор: Мазур Павел (Colin990)
	Сайт автора: https://colin990.com/
	Сайт движка: https://lpe.colin990.com/
	Почта: colin990@gmail.com
*/