<?php

namespace app\ParserUsadeb;


/**
 * Class XmlReader
 * @package Parser
 */
class XmlReader
{
	/**
	 * результат обработки файла
	 * @var array
	 */
	private array $resault = [];
	private string $path;

	public function __construct(string $path)
	{
		$this->path = $path;
		$this->getSpaceAsArray();
	}

	public function getResault(): array
	{
		return $this->resault;
	}


	/**
	 * возвращает площади участков в виде XML Object;
	 * @return false|\SimpleXMLElement|string|null
	 */
	private function getXmlObject()
	{
		return simplexml_load_file($this->path);
	}

	/**
	 * получаем набор строк из xml
	 * @return \SimpleXMLElement
	 */
	private function getRowsFromXmlObject(): \SimpleXMLElement
	{
		return $this->getXmlObject()->sheetData->row;
	}

	/**
	 * возвращает площядь для текущего участка
	 * @param $item
	 * @return string
	 */
	private function getSpaseAsString($item): string
	{
		return (string)$item->c->v;
	}

	private function getSpaceAsArray()
	{
		$xmlElements = $this->getRowsFromXmlObject();

		foreach ($xmlElements as $item) {
			$this->resault[] = $this->getSpaseAsString($item);
		}

	}

}