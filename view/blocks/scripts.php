<?php
	# Подключаем JS файлы
	if ( count($js) ) :
		foreach ( $js as $url ) :
			echo '<script src="'.$url.'?t='.date('U').'"></script>';
		endforeach;
	endif;
?>