<?php

use Phalcon\Mvc\Controller;

class LoginController extends Controller
{
    public function indexAction()
    {

    }

    public function startAction()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        /** @var Users $user */
        $user = Users::findFirst([
            "email = :email: AND password = :password:",
            'bind' => [
                'email'    => $email,
                'password' => sha1($password),
            ]
        ]);

        if($user){
            $this->registerSession($user);

            $this->dispatcher->forward([
                'controller' => 'index',
                'action' => 'index'
            ]);

            return;
        }

        $message = 'Wrong email/password';

        $this->view->success = false;
        
        $this->view->message = $message;
    }

    public function endAction(){
        $this->session->remove('auth');

        $this->dispatcher->forward([
            'controller' => 'index',
            'action'     => 'index',
        ]);
    }

    private function registerSession(Users $user): void {
        $this->session->set('auth', [
            'id'    => $user->id,
            'name'  => $user->name,
            'password' => $user->password
        ]);
    }

    public function logoutAction(){
        $this->session->destroy();
        return $this->response->redirect('/');
    }
}