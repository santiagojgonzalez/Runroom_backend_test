<?php

namespace Runroom\GildedRose;

class GildedRose
{

    private $items;

    function __construct($items)
    {
        $this->items = $items;
    }

    function update_quality()
    {
        /**
         * @var Item $item
         */
        foreach ($this->items as $item) {
            if ($item->getName() != Item::AGED_BRIE && $item->getName() != Item::BACKSTAGE_PASSES_TO_A_TAFKAL80ETC_CONCERT) {
                if ($item->getQuality() > 0 && $item->getName() != Item::SULFURAS_HAND_OF_RAGNAROS) {
                    $item->reduceQuality();
                }
            } else {
                if ($item->getQuality() < 50) {
                    $item->boostQuality();
                    if ($item->getName() == Item::BACKSTAGE_PASSES_TO_A_TAFKAL80ETC_CONCERT) {
                        if ($item->getSellIn() < 11 & $item->getQuality() < 50) {
                            $item->boostQuality();
                        }
                        if ($item->getSellIn() < 6 && $item->getQuality() < 50) {
                            $item->boostQuality();
                        }
                    }
                }
            }

            if ($item->getName() != Item::SULFURAS_HAND_OF_RAGNAROS) {
                $item->reduceSellIn();
            }

            if ($item->getSellIn() < 0) {
                if ($item->getName() != Item::AGED_BRIE) {
                    if ($item->getName() != Item::BACKSTAGE_PASSES_TO_A_TAFKAL80ETC_CONCERT) {
                        if ($item->getQuality() > 0 && $item->getName() != Item::SULFURAS_HAND_OF_RAGNAROS) {
                                $item->reduceQuality();
                            }
                    } else {
                        $item->setQuality(0);
                    }
                } else {
                    if ($item->getQuality() < 50) {
                        $item->boostQuality();
                    }
                }
            }
        }
    }
}
