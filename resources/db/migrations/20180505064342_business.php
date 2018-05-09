<?php

use Phinx\Migration\AbstractMigration;

class Business extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('business');

        $table
            ->addColumn('scheme_id', 'integer',  ['signed' => false])
            ->addColumn('scheme_business_id', 'integer',  ['signed' => false])
            ->addColumn('local_authority_business_id', 'integer',  ['signed' => false])
            ->addColumn('business_type_id', 'integer',  ['signed' => false])
            ->addColumn('local_authority_id', 'integer',  ['signed' => false])
            ->addColumn('name', 'string')
            ->addColumn('address_line_1', 'string')
            ->addColumn('address_line_2', 'string')
            ->addColumn('address_line_3', 'string')
            ->addColumn('post_code', 'string')
            ->addColumn('rating', 'integer')
            ->addColumn('rating_date', 'date')
            ->addColumn('pending_rating', 'boolean')
            ->addColumn('longitude', 'decimal', ['precision' => 9, 'scale' => 6, 'signed' => true])
            ->addColumn('latitude', 'decimal', ['precision' => 9, 'scale' => 6, 'signed' => true])
            ->addIndex(['business_type_id'])
            ->addIndex(['scheme_business_id'])
            ->addIndex(['local_authority_id'])
            ->addIndex(['local_authority_business_id'])
            ->create();
    }
}
