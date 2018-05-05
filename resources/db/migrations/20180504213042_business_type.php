<?php

use Phinx\Migration\AbstractMigration;

class BusinessType extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('business_type');

        $table
            ->addColumn('type', 'string')
            ->create();
    }
}
