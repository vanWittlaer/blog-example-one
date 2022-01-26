<?php declare(strict_types=1);

namespace VanWittlaer\ExampleOne\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1643116081_PromotionDiscountAddons extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1643116081;
    }

    public function update(Connection $connection): void
    {
        $sql = <<<SQL
            CREATE TABLE IF NOT EXISTS `vanwittlaer_promotion_discount_addons` (
                `id` BINARY(16) NOT NULL,
                `promotion_discount_id` BINARY(16) NULL,
                `promotion_discount_key` VARCHAR(255) NULL,
                `created_at` DATETIME(3) NOT NULL,
                `updated_at` DATETIME(3) NULL,
                PRIMARY KEY (`id`),
                CONSTRAINT `fk.vanwittlaer.exampleone.promotion_discount_id` FOREIGN KEY (`promotion_discount_id`)
                    REFERENCES `promotion_discount` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
                )
                ENGINE=InnoDB
                DEFAULT CHARSET=utf8mb4
                COLLATE=utf8mb4_unicode_ci;
SQL;

        $connection->executeStatement($sql);
    }

    public function updateDestructive(Connection $connection): void
    {
        $sql = <<<SQL
            DROP TABLE IF EXISTS `vanwittlaer_promotion_discount_addons`;
SQL;

        $connection->executeStatement($sql);
    }
}
