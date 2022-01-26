<?php declare(strict_types=1);

namespace VanWittlaer\ExampleOne\DataAbstractionLayer\Entity;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

class PromotionDiscountAddonsCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return PromotionDiscountAddonsEntity::class;
    }
}
