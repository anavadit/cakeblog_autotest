<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 *
 */
class UsersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'email' => ['type' => 'string', 'length' => 128, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'password' => ['type' => 'string', 'length' => 256, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'name' => ['type' => 'string', 'length' => 64, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'role' => ['type' => 'string', 'length' => 64, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
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
    public $records/* = [
        [
            'id' => 1,
            'email' => 'rina.artskills@gmail.com',
            'password' => 'qqqqqq',
            'name' => 'rina-admin-gmail',
            'created' => '2017-09-12 16:44:00',
            'modified' => '2017-09-12 16:44:00',
            'role' => 'admin',
        ],
        [
            'id' => 2,
            'email' => 'rina.artskills@yandex.ru',
            'password' => 'qqqqqq',
            'name' => 'rina-author-yandex',
            'created' => '2017-09-12 16:44:00',
            'modified' => '2017-09-12 16:44:00',
            'role' => 'author',
        ],
    ]*/;

    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'email' => 'rina.artskills@gmail.com',
                'password' => 'qqqqqq',
                'name' => 'rina-admin-gmail',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
                'role' => 'admin',
            ],
            [
                'id' => 2,
                'email' => 'rina.artskills@yandex.ru',
                'password' => 'qqqqqq',
                'name' => 'rina-author-yandex',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
                'role' => 'author',
            ],
        ];
        parent::init();
    }
}
