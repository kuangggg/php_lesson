<?php
//一般原型模式和工厂模式结合创建大量相同类型的对象

class Sea
{
	private $nav = 0;

	function __construct($nav)
	{
		$this->nav = $nav;
	}
}

class EarthSea extends Sea
{

}


class TerrainFactory
{
	private $sea;

	function __construct(Sea $sea)
	{
		$this->sea = $sea;
	}

	public function getSea()
	{
		return clone $this->sea;
	}
}

$factory = new TerrainFactory(new EarthSea(-1));

var_dump($factory->getSea());