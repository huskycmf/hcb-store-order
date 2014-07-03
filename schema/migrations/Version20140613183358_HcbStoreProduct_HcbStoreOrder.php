<?php
namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

class Version20140613183358_HcbStoreProduct_HcbStoreOrder extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql("CREATE TABLE `store_order_has_product_selection` (
                          `store_order_id` INT UNSIGNED NOT NULL,
                          `store_product_selection_id` INT UNSIGNED NOT NULL,
                          `count` INT UNSIGNED NOT NULL DEFAULT 1,
                          PRIMARY KEY (`store_order_id`, `store_product_selection_id`),
                          INDEX `fk_store_order_has_store_product_selection_store_product_se_idx`
                                (`store_product_selection_id` ASC),
                          INDEX `fk_store_order_has_store_product_selection_store_order1_idx`
                                (`store_order_id` ASC),
                          CONSTRAINT `fk_store_order_has_store_product_selection_store_order1`
                            FOREIGN KEY (`store_order_id`)
                            REFERENCES `store_order` (`id`)
                            ON DELETE CASCADE
                            ON UPDATE CASCADE,
                          CONSTRAINT `fk_store_order_has_store_product_selection_store_product_sele1`
                            FOREIGN KEY (`store_product_selection_id`)
                            REFERENCES `store_product_selection` (`id`)
                            ON DELETE NO ACTION
                            ON UPDATE NO ACTION)
                        ENGINE = InnoDB");
    }

    public function down(Schema $schema)
    {
        $schema->dropTable('store_order_has_product_selection');
    }
}
