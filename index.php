<?php
require_once 'vendor/autoload.php';

require 'app/dopFunction.php';


use app\ParserUsadeb\LotBuilder;
use Shuchkin\SimpleXLSX;


/* Изменяемые параметры  -- start*/
	const num_first_lot = 1; // Порядковый номер первого участка
	const file_space = 'sheet1.xml'; // имя файла с площадьми участков
	const dir_svg = 'xml'; // имя папки с разметкой участков

	$path = 'space/' . file_space;


	CONST FIELDS = [];


	$bulder = new LotBuilder($path);



$xlmxFile = 'space/spase.xlsx';

//if ( $xlsx = SimpleXLSX::parseFile($xlmxFile) ) {
//  $rows = [];
//	foreach ( $xlsx->rows() as  $value ) {
    
//    $rows[$value[0]] = $value[1];
   
//	}
//  dump($rows);
//	dump($xlsx->rows());
//} else {
//	echo SimpleXLSX::parseError();
//}


$arrayObjLot = []; // Инициализироуем массив всех участков в виде объектов


/* Получаем массив файлов с разметкой  -- start */
	$files = scandir(dir_svg); // формируем массив из наименовайни файлов с разметкой участков
	array_shift($files); // удалем 1-ый лишний элемент в начале массива (.)
	natsort($files); // сортируем по имени файлов (значения массива)
	$files_path = array_values($files); // переопределяем ключи массива для отсортированного массива
/* Получаем массив файлов с разметкой -- end */

//PR($files_path);


$resStr = PrintResultString();


echo $resStr;

