<?php
/*
	Файл роутинга
	Документация: https://fatfreeframework.com/3.6/routing-engine
*/

# Обработчик ошибок. Под каждую ошибку можно вывести свой шаблон
$f3->set('ONERROR',
    function($f3) {
		/*
			ERROR.code - displays the error code (404, 500, etc.)
			ERROR.status - header and page title
			ERROR.text - error context
			ERROR.trace - stack trace
		*/
		$code = $f3->get('ERROR.code');
		
		if ( $code == 404 ) {
		
			# Задаем переменные, которые хотим передать в шаблон
			$f3->set('css', $f3->get('TMPL_CSS') );
			$f3->set('js', $f3->get('TMPL_JS') );
			$f3->set('meta', $f3->get('META') );
			$f3->set('baseurl', $f3->get('BASEURL') );
			$f3->set('ismobile', $f3->get('IS_MOBILE') );
			
			echo View::instance()->render('404.php');
		} else {
			echo 'Code: '.$f3->get('ERROR.code').'<br>Status: '.$f3->get('ERROR.status').'<br>Text: '.$f3->get('ERROR.text').'<br>Trace: '.$f3->get('ERROR.trace');
		}
    }
);

# Вывод главной страницы
$f3->route('GET /',
	function($f3) {
		# Задаем переменные, которые хотим передать в шаблон
		$f3->set('css', $f3->get('TMPL_CSS') );
		$f3->set('js', $f3->get('TMPL_JS') );
		$f3->set('meta', $f3->get('META') );
		$f3->set('baseurl', $f3->get('BASEURL') );
		$f3->set('ismobile', $f3->get('IS_MOBILE') );
		
        echo View::instance()->render('index.php');
	}
);

/*
	Основная функция роута.
	Мы получаем ссылку (пример: /thanks) и исходя из нее
	ищем нужный файл шаблона в папке /tmpl (для "/thanks"
	получится файл "thanks.php". Если линк с вложеностью 
	(пример: /order/pay), то название файла тоже должно
	повторять вложеность и разделять ее в названи файла
	точкой (для "/order/pay" получится файл "order.pay.php")
*/
$f3->route('GET /*',
    function($f3,$params) {
		# Получаем предполагаемое название файла шаблона
		$tmplPath = str_replace('/','.',$params['*']).'.php';
		
		# Если такой файл шаблона есть, то выводим его, иначе - 404
		if ( file_exists('view/'.$tmplPath) ) :
		
			# Задаем переменные, которые хотим передать в шаблон
			$f3->set('css', $f3->get('TMPL_CSS') );
			$f3->set('js', $f3->get('TMPL_JS') );
			$f3->set('meta', $f3->get('META') );
			$f3->set('baseurl', $f3->get('BASEURL') );
			$f3->set('ismobile', $f3->get('IS_MOBILE') );
		
			echo View::instance()->render($tmplPath);
		else :
			$f3->error(404);
		endif;
    }
);