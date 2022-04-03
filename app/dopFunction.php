<?php


function GetArraySpace (): void
{
	global $arrayObjLot, $xml_file_space, $files_path;
	$num_current_lot = num_first_lot;

	foreach ($xml_file_space->sheetData->row as $item) {

		$itemSpace = (string)$item->c->v; // площядь для ткущего участка
		$new_Lot = new Lot($num_current_lot, $itemSpace); // создаем объект участка


		$xml = simplexml_load_file(dir_svg . '/'. $files_path[$num_current_lot]);
		$path = GetPathLot($xml);

		$new_Lot->SetPath($path);// Устанавливаем разметку для учасков


		$arrayObjLot[$num_current_lot] = $new_Lot;
		$num_current_lot++;

	}
}

/*Получем склееную разметку из файла */
function GetPathLot ($XmlObj) {
  $pathRes = '';
  
	foreach ($XmlObj->path as $path):
		$i = 0;
		if($i) $pathRes .= $path['d'];
		else $pathRes .= " " . $path['d'];
		$i++;
	endforeach;

  return $pathRes;
}

/*Выводим на экран итоговый текст для копирования */
function PrintResultString () {
  global $arrayObjLot; 

  $curent_num_lot = num_first_lot;

  $xmlStrig = 'var paths = {' . "<br>";

  foreach ($arrayObjLot as $objLot) :

    $xmlStrig .= $objLot->GetResObj();    

  endforeach;

  $xmlStrig .= '}';

  $xmlStrig .= '<br>';
  $xmlStrig .= '<br>';
  $xmlStrig .= '<br>';
  $xmlStrig .= 'console.log(JSON.stringify(paths));';


  return $xmlStrig;
}

