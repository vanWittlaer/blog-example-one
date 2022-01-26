<?php declare(strict_types=1);

namespace VanWittlaer\ExampleOne\DataAbstractionLayer\Entity;

use Shopware\Core\Checkout\Promotion\Aggregate\PromotionDiscount\PromotionDiscountDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class PromotionDiscountAddonsDefinition extends EntityDefinition
{
    public const ENTITY_NAME = 'vanwittlaer_promotion_discount_addons';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    public function getEntityClass(): string
    {
        return PromotionDiscountAddonsEntity::class;
    }

    public function getCollectionClass(): string
    {
        return PromotionDiscountAddonsCollection::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new Required(), new PrimaryKey()),
            (new FkField(
                'promotion_discount_id',
                'promotionDiscountId',
                PromotionDiscountDefinition::class
            ))->addFlags(new Required()),
            (new StringField('promotion_discount_key', 'promotionDiscountKey')),
            (new OneToOneAssociationField(
                'promotionDiscount',
                'promotion_discount_id',
                'id',
                PromotionDiscountDefinition::class,
                false
            )),
        ]);
    }
}
