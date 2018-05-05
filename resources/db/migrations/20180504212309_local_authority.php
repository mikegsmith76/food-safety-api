<?php

use Phinx\Migration\AbstractMigration;

class LocalAuthority extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('local_authority');

        $table
            ->addColumn('code','string')
            ->addColumn('name', 'string')
            ->addColumn('url', 'string')
            ->addColumn('email_address', 'string')
            ->create();
    }
}
