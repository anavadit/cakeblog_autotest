<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;
use Cake\Datasource\ConnectionInterface;

/**
 * ArticlesFixture
 *
 */
class ArticlesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'title' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'body' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'perfomer_comment' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'prority' => ['type' => 'string', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'author_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'perfomer_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'state' => ['type' => 'string', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'author_id' => ['type' => 'index', 'columns' => ['author_id'], 'length' => []],
            'perfomer_id' => ['type' => 'index', 'columns' => ['perfomer_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'articles_ibfk_1' => ['type' => 'foreign', 'columns' => ['author_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'articles_ibfk_2' => ['type' => 'foreign', 'columns' => ['perfomer_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $record/*s = [
        [
            'id' => 1,
            'title' => 'New Test Article 1',
            'body' => 'The decription of tne new test article 1',
            'author_id' => 1,
            'perfomer_id' => 1,
            'prority' => 'low',
            'state' => 'created',
            'created' => '2017-09-12 16:44:00',
            'modified' => '2017-09-12 16:44:00'
        ],
    ]*/;

    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'title' => 'New Test Article 1',
                'body' => 'The decription of tne new test article 1',
                'author_id' => 1,
                'perfomer_id' => 1,
                'prority' => 'low',
                'state' => 'created',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ],
        ];
        parent::init();
    }
}
