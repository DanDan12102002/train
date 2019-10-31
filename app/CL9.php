<?php
/*
	CL9 System
	Основной класс подсистемы
*/
class CL9 {
	/*
		Запуск стандартных функций,
		которые выполняются каждый раз
	*/
	function __construct() {
		
		$f3 = Base::instance();
		
		# Если включена опция, то компилируем LESS в CSS
		if ( $f3->get('COMPILE_LESS') ) :
			$this->AutoCompileLess( $f3->get('BASEPATH').'/assets/less/template.less', $f3->get('BASEPATH').'/assets/css/template.css');
		endif;
		
		# Получаем CSS для шаблона
		$css = $this->getCSS();
		$f3->set('TMPL_CSS',$css);
		
		# Получаем JS для шаблона
		$js = $this->getJS();
		$f3->set('TMPL_JS',$js);
		
		# Скрипт для определения устройства
		$deviceDetect = new Mobile_Detect;
		
		if( $deviceDetect->isMobile() && !$deviceDetect->isTablet() ){
			$f3->set('IS_MOBILE',1);
		}
		
		return;
	}
	
	/*
		Функция компилирует с LESS кода - CSS код
	*/
	function AutoCompileLess($inputFile, $outputFile) {
	
		$Less = new Lessc;
		$newCache = array();
		
		$newCache = $Less->cachedCompile($inputFile,1);
		
		if ( $newCache['compiled'] ) {
			file_put_contents($outputFile, $newCache['compiled']);
		}
	  
	}
	
	/*
		Функция возвращает массив с линками на CSS файлы.
		Если в конфиге включено объединение файлов в один,
		то скрипт генерирует CSS кеш файл и возвращает линк
		на него (так же в виде массива)
	*/
	function getCSS() {
		$f3 = Base::instance();
		$css = array();
		
		# Если в конфиге включено сливание кода в 1 файл
		if ( $f3->get('COMBINE_CSS') ) :
			# Если в списке есть ссылки на файлы
			if ( count( $f3->get('UI_CSS_FILES') ) ) :
			
				# Если кеш файл существует, то возвращаем его, НЕ ГЕНЕРИРУЕМ НОВЫЙ
				if ( file_exists( $f3->get('BASEPATH').'/assets/temp/template.css' ) ) :
					$css[] = $f3->get('BASEURL').'/assets/temp/template.css';
					return $css;
				endif;
			
				$cssCode = '';
				$cssCacheFile = fopen($f3->get('BASEPATH').'/assets/temp/template.css', "w");
				
				# Если произошла ошибка, не сливаем код
				if ( !$cssCacheFile ) :
					# Перебираем список, проверяем есть ли файл и добавляем его в массив
					foreach( $f3->get('UI_CSS_FILES') as $cssFile ) :
						if ( file_exists( $f3->get('BASEPATH').'/'.$cssFile ) ) :
							$css[] = $f3->get('BASEURL').'/'.$cssFile;
						endif;
					endforeach;
				
				# Если кеш файл есть \ создан, то пишем в него
				else :
					# Перебираем список, проверяем есть ли файл и берем с него код в общую переменную
					foreach( $f3->get('UI_CSS_FILES') as $cssFile ) :
						if ( file_exists( $f3->get('BASEPATH').'/'.$cssFile ) ) :
							$cssCode .= file_get_contents( $f3->get('BASEURL').'/'.$cssFile )."\n\n\n";
						endif;
					endforeach;
					
					# Записываем весь CSS код в один кеш файл
					fwrite($cssCacheFile, $cssCode);
					fclose($cssCacheFile);
					
					# Записываем в массив линк на кеш файл, вместо списка с разделенными файлами
					$css[] = $f3->get('BASEURL').'/assets/temp/template.css';
				endif;
			endif;
			
		# Если сливать код не нужно, выводим все файлы отдельно
		else :
			# Если в списке есть ссылки на файлы
			if ( count( $f3->get('UI_CSS_FILES') ) ) :
				# Перебираем список, проверяем есть ли файл и добавляем его в массив
				foreach( $f3->get('UI_CSS_FILES') as $cssFile ) :
					if ( file_exists( $f3->get('BASEPATH').'/'.$cssFile ) ) :
						$css[] = $f3->get('BASEURL').'/'.$cssFile;
					endif;
				endforeach;
			endif;
		endif;
		
		return $css;
	}
	
	/*
		Функция возвращает массив с линками на JS файлы
		Если в конфиге включено объединение файлов в один,
		то скрипт генерирует JS кеш файл и возвращает линк
		на него (так же в виде массива)
	*/
	function getJS() {
		$f3 = Base::instance();
		$js = array();
		
		# Если в конфиге включено сливание кода в 1 файл
		if ( $f3->get('COMBINE_JS') ) :
			# Если в списке есть ссылки на файлы
			if ( count( $f3->get('UI_JS_FILES') ) ) :
			
				# Если кеш файл существует, то возвращаем его, НЕ ГЕНЕРИРУЕМ НОВЫЙ
				if ( file_exists( $f3->get('BASEPATH').'/assets/temp/script.js' ) ) :
					$js[] = $f3->get('BASEURL').'/assets/temp/script.js';
					return $js;
				endif;
			
				$jsCode = '';
				$jsCacheFile = fopen($f3->get('BASEPATH').'/assets/temp/script.js', "w");
				
				# Если произошла ошибка, не сливаем код
				if ( !$jsCacheFile ) :
					# Перебираем список, проверяем есть ли файл и добавляем его в массив
					foreach( $f3->get('UI_JS_FILES') as $jsFile ) :
						if ( file_exists( $f3->get('BASEPATH').'/'.$jsFile ) ) :
							$js[] = $f3->get('BASEURL').'/'.$jsFile;
						endif;
					endforeach;
				
				# Если кеш файл есть \ создан, то пишем в него
				else :
					# Перебираем список, проверяем есть ли файл и берем с него код в общую переменную
					foreach( $f3->get('UI_JS_FILES') as $jsFile ) :
						if ( file_exists( $f3->get('BASEPATH').'/'.$jsFile ) ) :
							$jsCode .= file_get_contents( $f3->get('BASEURL').'/'.$jsFile )."\n\n\n";
						endif;
					endforeach;
					
					# Записываем весь JS код в один кеш файл
					fwrite($jsCacheFile, $jsCode);
					fclose($jsCacheFile);
					
					# Записываем в массив линк на кеш файл, вместо списка с разделенными файлами
					$js[] = $f3->get('BASEURL').'/assets/temp/script.js';
				endif;
			endif;
			
		# Если сливать код не нужно, выводим все файлы отдельно
		else :
			# Если в списке есть ссылки на файлы
			if ( count( $f3->get('UI_JS_FILES') ) ) :
				# Перебираем список, проверяем есть ли файл и добавляем его в массив
				foreach( $f3->get('UI_JS_FILES') as $jsFile ) :
					if ( file_exists( $f3->get('BASEPATH').'/'.$jsFile ) ) :
						$js[] = $f3->get('BASEURL').'/'.$jsFile;
					endif;
				endforeach;
			endif;
		endif;
		
		return $js;
	}
}