<?php declare(strict_types=1);

namespace VanWittlaer\ExampleOne\DataAbstractionLayer\Entity;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;

class PromotionDiscountAddonsEntity extends Entity
{
    use EntityIdTrait;

    protected string $promotionDiscountId;

    protected ?string $promotionDiscountKey;

    /**
     * @return string
     */
    public function getPromotionDiscountId(): string
    {
        return $this->promotionDiscountId;
    }

    /**
     * @param string $promotionDiscountId
     */
    public function setPromotionDiscountId(string $promotionDiscountId): void
    {
        $this->promotionDiscountId = $promotionDiscountId;
    }

    /**
     * @return string|null
     */
    public function getPromotionDiscountKey(): ?string
    {
        return $this->promotionDiscountKey;
    }

    /**
     * @param string|null $promotionDiscountKey
     */
    public function setPromotionDiscountKey(?string $promotionDiscountKey): void
    {
        $this->promotionDiscountKey = $promotionDiscountKey;
    }
}
