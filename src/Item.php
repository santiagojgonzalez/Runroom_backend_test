<?php

namespace Runroom\GildedRose;

class Item {

    const AGED_BRIE = 'Aged Brie';
    const BACKSTAGE_PASSES_TO_A_TAFKAL80ETC_CONCERT = 'Backstage passes to a TAFKAL80ETC concert';
    const SULFURAS_HAND_OF_RAGNAROS = 'Sulfuras, Hand of Ragnaros';

    public $name;
    public $sell_in;
    public $quality;

    function __construct($name, $sell_in, $quality) {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    public function __toString() {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }

}
