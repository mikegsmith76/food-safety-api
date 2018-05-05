<?php


use Phinx\Migration\AbstractMigration;

class ColumnTypes extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('business');

        $table->changeColumn('scheme_id', 'integer',  ['signed' => false]);
        $table->changeColumn('scheme_business_id', 'integer',  ['signed' => false]);
        $table->changeColumn('local_authority_business_id', 'integer',  ['signed' => false]);
        $table->changeColumn('business_type_id', 'integer',  ['signed' => false]);
    }
}
