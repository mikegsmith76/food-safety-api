<?php

use Phinx\Migration\AbstractMigration;

class BusinessType extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('business_type', ['id' => false, 'primary_key' => ['id']]);

        $table
            ->addColumn('id', 'integer',  ['signed' => false])
            ->addColumn('type', 'string')
            ->create();
    }
}
