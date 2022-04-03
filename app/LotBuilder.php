<?php


namespace app\ParserUsadeb;


class LotBuilder
{

	public function __construct(string $path)
	{
		$xmlObject = new XmlReader($path);

		dump($xmlObject->getResault());
	}

}