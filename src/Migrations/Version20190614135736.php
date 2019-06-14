<?php

namespace Pimcore\Bundle\DataHubBundle\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Pimcore\Migrations\Migration\AbstractPimcoreMigration;

class Version20190614135736 extends AbstractPimcoreMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql('ALTER TABLE `plugin_datahub_workspaces_asset` DROP COLUMN `write`;');
        $this->addSql('ALTER TABLE `plugin_datahub_workspaces_object` DROP COLUMN `write`;');

        $this->addSql('ALTER TABLE `plugin_datahub_workspaces_asset` ADD COLUMN `create` TINYINT(1) UNSIGNED NULL DEFAULT \'0\' AFTER `configuration`;');
        $this->addSql('ALTER TABLE `plugin_datahub_workspaces_object` ADD COLUMN `create` TINYINT(1) UNSIGNED NULL DEFAULT \'0\' AFTER `configuration`;');

        $this->addSql('ALTER TABLE `plugin_datahub_workspaces_asset` ADD COLUMN `update` TINYINT(1) UNSIGNED NULL DEFAULT \'0\' AFTER `read`;');
        $this->addSql('ALTER TABLE `plugin_datahub_workspaces_object` ADD COLUMN `update` TINYINT(1) UNSIGNED NULL DEFAULT \'0\' AFTER `read`;');

        $this->addSql('ALTER TABLE `plugin_datahub_workspaces_asset` ADD COLUMN `delete` TINYINT(1) UNSIGNED NULL DEFAULT \'0\' AFTER `update`;');
        $this->addSql('ALTER TABLE `plugin_datahub_workspaces_object` ADD COLUMN `delete` TINYINT(1) UNSIGNED NULL DEFAULT \'0\' AFTER `update`;');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // not needed
    }
}
