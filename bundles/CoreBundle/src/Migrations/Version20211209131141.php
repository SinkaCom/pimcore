<?php

declare(strict_types=1);

/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Commercial License (PCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 *  @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 *  @license    http://www.pimcore.org/license     GPLv3 and PCL
 */

namespace Pimcore\Bundle\CoreBundle\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;
use Pimcore\Bundle\ApplicationLoggerBundle\Handler\ApplicationLoggerDb;

/**
 * @internal
 */
class Version20211209131141 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $table = $schema->getTable(ApplicationLoggerDb::TABLE_NAME);
        if (!$table->hasIndex('maintenanceChecked')) {
            $table->addIndex(['maintenanceChecked'], 'maintenanceChecked');
        }
    }

    public function down(Schema $schema): void
    {
        $table = $schema->getTable(ApplicationLoggerDb::TABLE_NAME);
        if ($table->hasIndex('maintenanceChecked')) {
            $table->dropIndex('maintenanceChecked');
        }
    }
}
