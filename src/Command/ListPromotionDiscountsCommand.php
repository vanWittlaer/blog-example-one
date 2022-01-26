<?php declare(strict_types=1);

namespace VanWittlaer\ExampleOne\Command;

use Shopware\Core\Checkout\Promotion\Aggregate\PromotionDiscount\PromotionDiscountEntity;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use VanWittlaer\ExampleOne\DataAbstractionLayer\Entity\PromotionDiscountAddonsEntity;

class ListPromotionDiscountsCommand extends Command
{
    protected static $defaultName = 'vw:list:promotion-discounts';

    protected EntityRepositoryInterface $promotionDiscountRepository;

    public function __construct(EntityRepositoryInterface $promotionDiscountRepository, string $name = null)
    {
        parent::__construct($name);

        $this->promotionDiscountRepository = $promotionDiscountRepository;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $promotionDiscountCollection = $this->promotionDiscountRepository
            ->search(new Criteria(), Context::createDefaultContext())
            ->getEntities();

        $table = new Table($output);
        $table->setHeaders(['Key', 'Type', 'Value']);

        /** @var PromotionDiscountEntity $promotionDiscountEntity */
        foreach ($promotionDiscountCollection as $promotionDiscountEntity) {

            /** @var PromotionDiscountAddonsEntity $addons */
            $addons = $promotionDiscountEntity->getExtension('addons');

            $table->addRow([
                ($addons !== null) ? $addons->get('promotionDiscountKey') : '',
                $promotionDiscountEntity->getType(),
                $promotionDiscountEntity->getValue(),
            ]);
        }

        $table->render();

        return 0;
    }

}
