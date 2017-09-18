<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 *
 */
class ArticlesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
//        $this->paginate = [
//            'contain' => ['Authors', 'Perfomers']
//        ];

//        $articles = $this->Articles->find('all', [
//            'contain' => [
//                'Authors',
//                'Perfomers'
//            ]
//        ]);

        $usersModel = $this->loadModel('Users');
//        $users = $usersModel->find('all');
//        $this->set(compact('users'));

        $this->set('usersModel', $usersModel);
        $this->set('loggedUser', $this->Auth->user());

        $articles = $this->paginate($this->Articles, [
            'contain' => ['Authors', 'Perfomers'],
            'order' => [
                'Articles.prority' => 'ASC',
                'Articles.created' => 'DESC'
            ],
            'paramType' => 'querystring',
            'limit' => 2
        ]);
        $this->set(compact('articles'));
        $this->set('_serialize', ['articles']);
    }

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => []
        ]);

        $usersModel = $this->loadModel('Users');
        $this->set('usersModel', $usersModel);

        $oAuthor = $usersModel->find()
            ->where(['id' => $article->author_id])
            ->first();

        $oPerfomer = $usersModel->find()
            ->where(['id' => $article->perfomer_id])
            ->first();

        $this->set('oAuthor', $oAuthor);
        $this->set('oPerfomer', $oPerfomer);

        $this->set('article', $article);
        $this->set('_serialize', ['article']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {

            $data = $this->request->getData();
            $data['author_id'] = $this->Auth->user()['id'];
            $article = $this->Articles->patchEntity($article, $data);

            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }

//        $users = $this->Articles->Users->find('list');
//        $this->set(compact('article', 'users'));

        $usersModel = $this->loadModel('Users');
        $this->set('usersModel', $usersModel);

        $this->set('article', $article);
        $this->set('_serialize', ['article']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => []
        ]);
        if (($this->Auth->user()['id'] != $article->perfomer_id) &&
            ($this->Auth->user()['id'] != $article->author_id)) {
            $this->Flash->error(__('You are not allowed to edit the task #'.$article->id));
            $this->redirect(['action' => 'index']);
        }

        if ($this->request->is(['post', 'put'])) {
            $data = $this->request->getData();
            if (isset($data['author_id'])) {
                unset($data['author_id']);
            }

            $article = $this->Articles->patchEntity($article, $data);
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }

//        $users = $this->Articles->Users->find('list');
//        $this->set(compact('article', 'users'));

        $usersModel = $this->loadModel('Users');
        $this->set('usersModel', $usersModel);

        $this->set('article', $article);
        $this->set('_serialize', ['article']);
        $this->set('user', $this->Auth->user());
    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $article = $this->Articles->get($id);

        // Удалить задачу может только автор:
        if ($this->Auth->user()['id'] == $article->author_id) {
            $this->request->allowMethod(['post', 'delete']);
            if ($this->Articles->delete($article)) {
                $this->Flash->success(__('The article has been deleted.'));
            } else {
                $this->Flash->error(__('The article could not be deleted. Please, try again.'));
            }
        } else {
            $this->Flash->error(__('You are not allowed to delete the task #'.$article->id));
        }

        return $this->redirect(['action' => 'index']);
    }


}
