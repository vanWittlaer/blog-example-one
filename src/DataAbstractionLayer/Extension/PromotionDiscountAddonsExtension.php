<?php declare(strict_types=1);

namespace VanWittlaer\ExampleOne\DataAbstractionLayer\Extension;

use Shopware\Core\Checkout\Promotion\Aggregate\PromotionDiscount\PromotionDiscountDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\CascadeDelete;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use VanWittlaer\ExampleOne\DataAbstractionLayer\Entity\PromotionDiscountAddonsDefinition;

class PromotionDiscountAddonsExtension extends EntityExtension
{
    public function getDefinitionClass(): string
    {
        return PromotionDiscountDefinition::class;
    }

    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            (new OneToOneAssociationField(
                'addons',
                'id',
                'promotion_discount_id',
                PromotionDiscountAddonsDefinition::class
            ))->addFlags(new CascadeDelete())
        );
    }
}
