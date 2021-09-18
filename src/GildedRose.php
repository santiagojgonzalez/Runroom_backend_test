<?php

namespace Runroom\GildedRose;

class GildedRose
{

    private array $items;

    function __construct(array $items)
    {
        $this->items = $items;
    }

    public function update_quality(): void
    {
        /**
         * @var Item $item
         */
        foreach ($this->items as $item) {

            switch ($item->getName()) {

                case Item::BACKSTAGE_PASSES_TO_A_TAFKAL80ETC_CONCERT:
                    $this->updateQualityBackstage($item);
                    break;

                case Item::AGED_BRIE:
                    $this->updateQualityAgedBrie($item);
                    break;

                case Item::SULFURAS_HAND_OF_RAGNAROS;
                    break;

                default:
                    $this->updateQualityDefault($item);
                    break;

            }
        }
    }


    /**
     * Item::BACKSTAGE_PASSES_TO_A_TAFKAL80ETC_CONCERT
     * @param Item $item
     */
    private function updateQualityBackstage(Item $item): void
    {
        if ($item->getQuality() < Item::QUALITY_50) {
            $item->boostQuality();
            if ($item->getSellIn() < Item::QUALITY_11 & $item->getQuality() < Item::QUALITY_50) {
                $item->boostQuality();
            }
            if ($item->getSellIn() < Item::QUALITY_6 && $item->getQuality() < Item::QUALITY_50) {
                $item->boostQuality();
            }
        }

        $item->reduceSellIn();
        if ($item->getSellIn() < Item::QUALITY_0) {
            $item->setQuality(Item::QUALITY_0);
        }
    }

    /**
     * Item::AGED_BRIE
     * @param Item $item
     */
    private function updateQualityAgedBrie(Item $item): void
    {
        if ($item->getQuality() < Item::QUALITY_50) {
            $item->boostQuality();
        }
        $item->reduceSellIn();

        if ($item->getSellIn() < Item::QUALITY_0 && $item->getQuality() < Item::QUALITY_50) {
            $item->boostQuality();
        }

    }

    /**
     * Item Default
     * @param Item $item
     */
    private function updateQualityDefault(Item $item): void
    {
        if ($item->getQuality() > Item::QUALITY_0) {
            $item->reduceQuality();
        }
        $item->reduceSellIn();

        if ($item->getSellIn() < Item::QUALITY_0 && $item->getQuality() > Item::QUALITY_0) {
            $item->reduceQuality();
        }
    }
}
