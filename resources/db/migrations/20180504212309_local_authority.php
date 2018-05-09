<?php

use Phinx\Migration\AbstractMigration;

class LocalAuthority extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('local_authority', ['id' => false, 'primary_key' => ['code']]);

        $table
            ->addColumn('code','string', ['default' => ''])
            ->addColumn('name', 'string', ['default' => ''])
            ->addColumn('url', 'string', ['default' => ''])
            ->addColumn('email_address', 'string', ['default' => ''])
            ->create();
    }
}
