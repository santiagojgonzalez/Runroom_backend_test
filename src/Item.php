<?php

namespace Runroom\GildedRose;

class Item
{

    const AGED_BRIE = 'Aged Brie';
    const BACKSTAGE_PASSES_TO_A_TAFKAL80ETC_CONCERT = 'Backstage passes to a TAFKAL80ETC concert';
    const SULFURAS_HAND_OF_RAGNAROS = 'Sulfuras, Hand of Ragnaros';

    const SELLIN_0 = 0;
    const SELLIN_6 = 6;
    const SELLIN_11 = 11;

    const QUALITY_0 = 0;
    const QUALITY_50 = 50;


    public string $name;
    public int $sell_in;
    public int $quality;

    /**
     * @param string $name
     * @param int $sell_in
     * @param int $quality
     */
    function __construct(string $name, int $sell_in, int $quality)
    {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    public function __toString()
    {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getSellIn(): int
    {
        return $this->sell_in;
    }

    /**
     * @return int
     */
    public function getQuality(): int
    {
        return $this->quality;
    }

    /**
     * @param int $quality
     */
    public function setQuality(int $quality): void
    {
        $this->quality = $quality;
    }

    /**
     * Reduce Quality in 1
     */
    public function reduceQuality(): void
    {
        --$this->quality;
    }


    /**
     * Boost Quality in 1
     */
    public function boostQuality(): void
    {
        ++$this->quality;
    }

    /**
     * Reduce SellIn in 1
     */
    public function reduceSellIn(): void
    {
        --$this->sell_in;
    }
}
