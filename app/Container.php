<?php
namespace App;

class Container
{
    /**
* @var array
*/
    protected $items = [];

    /**
*
* @param array $items
*/
    public function __construct($items = [])
    {
        $this->items = $items;
    }

    /**
*
* @param string $item
* @return bool
*/
    public function has($item)
    {
        return in_array($item, $this->items);
    }

    /**
*
* @return string
*/
    public function takeOne()
    {
        return array_shift($this->items);
    }

    /**
*
* @param string $letter
* @return array
*/
    public function startsWith($letter)
    {
        return array_filter($this->items, function ($item) use ($letter) {
            return stripos($item, $letter) === 0;
        });
    }
}
