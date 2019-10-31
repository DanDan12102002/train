<?php
	/*
		Основные переменные шаблона:
		$meta - массив с метаданными (задается в основном index файле системы)
		$baseurl - основной линк сайта
		$css - массив ссылок на CSS файлы
		$js - массив ссылок на JS файлы
		$ismobile - мобильное устройтво или нет (1 \ 0)
	*/
?>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />

<title><?php echo $meta['title']; ?></title>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="title" content="<?php echo $meta['title']; ?>" />
<meta name="description" content="<?php echo $meta['desc']; ?>" />
 <meta name="keywords" content="<?php echo $meta['keys']; ?>"> 
<link rel="image_src" href="<?php echo $meta['image']; ?>" />

<meta property="og:locale" content="ru_RU"/>
<meta property="og:type" content="website"/>
<meta property="og:title" content="<?php echo $meta['title']; ?>"/>
<meta property="og:description" content="<?php echo $meta['desc']; ?>"/>
<meta property="og:image" content="<?php echo $meta['image']; ?>"/>
<meta property="og:url" content="<?php echo $baseurl; ?>"/>
<meta property="og:site_name" content="<?php echo $meta['sitename']; ?>"/>

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo $meta['title']; ?>">
<meta name="twitter:description" content="<?php echo $meta['desc']; ?>">
<meta name="twitter:image" content="<?php echo $meta['image']; ?>">

<meta itemprop="name" content="<?php echo $meta['title']; ?>"/>
<meta itemprop="description" content="<?php echo $meta['desc']; ?>"/>
<meta itemprop="image" content="<?php echo $meta['image']; ?>"/>

<?php
	# Подключаем CSS файлы
	if ( count($css) ) :
		foreach ( $css as $url ) :
			echo '<link rel="stylesheet" href="'.$url.'?t='.date('U').'" type="text/css">'; 
		endforeach;
	endif;
?>