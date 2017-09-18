<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ArticlesController;
use Cake\I18n\Time;
use Cake\TestSuite\IntegrationTestCase;

use App\Model\Table\ArticlesTable;
use Cake\ORM\TableRegistry;

use Cake\I18n\FrozenTime;



/**
 * App\Controller\ArticlesController Test Case
 */
class ArticlesControllerTest extends IntegrationTestCase
{

    public $Articles;
    public $dropTables = false;

//    public $import = array('model' => 'ArticlesModel', 'records' => false, 'connection' => 'default');

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users',
        'app.articles',
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }


    public function setUp() {
        parent::setUp();
        $config = TableRegistry::exists('Articles') ? [] : ['className' => 'App\Model\Table\ArticlesTable'];
        $this->Articles = TableRegistry::get('Articles', $config);
    }

    public function tearDown() {
        unset($this->Articles);
        parent::tearDown();
    }

    /**
     * Test add method
     * @return void
     */
    public function testAdd() {
        $this->get('/articles/add');
        $this->assertRedirect('users/login?redirect=%2Farticles%2Fadd');
//        $this->markTestIncomplete('Not implemented yet.');
    }

    public function testAddPostData() {


        // Set session data
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'email' => 'rina.artskills@gamil.com',
                    'password' => 'qqqqqq',
                    'name' => 'rina-admin-gmail',
                    'role' => 'admin',
                    // other keys.
                ]
            ]
        ]);
        $this->get('/articles/add');
        $this->assertResponseOk();

        $data = [
            'id' => 2,
            'author_id' => 1,
            'perfomer_id' => 2,
            'prority' => 'urgent',
            'state' => 'created',
            'title' => 'New Test Article 2 From TestUnit added',
            'body' => 'The description of tne new test article 2 From TestUnit added',
            'perfomer_comment' => NULL,
            'created' => '2017-09-13 09:46:35', // '2017-09-12 18:28:00',
            'modified' => '2017-09-13 09:46:35',
        ];
        $this->post('/articles/add', $data);
        $this->assertResponseSuccess();

        $query = $this->Articles->find()->where(['title' => $data['title']]);
        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $this->assertEquals(1, $query->count(), 'Error. An article was not added.');

        $result = $query->hydrate(false)->toArray();
        $expected = [
            [
                'id' => 2,
                'author_id' => 1,
                'perfomer_id' => 2,
                'prority' => 'urgent',
                'state' => 'created',
                'title' => 'New Test Article 2 From TestUnit added',
                'body' => 'The description of tne new test article 2 From TestUnit added',
                'perfomer_comment' => NULL,
                'created' => (new Time('2017-09-13 09:46:35')),  // '2017-09-12 18:28:00'
                'modified' => (new Time('2017-09-13 09:46:35')),
            ]
        ];
        $this->assertEquals($expected, $result);

//        var_dump($this->Articles->find('all')->toList());
//        $this->dropTables = false; exit;
    }



    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit() {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete() {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
