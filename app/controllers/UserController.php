<?php

    class UserController extends Controller
    {
        public function index()
        {
            $userModel = $this->model('user');
            $users = $userModel->findAll();
            $this->view('users/index', ['users' => $users]);
        }

        public function create()
        {
            $this->view('users/create');
        }

        public function store()
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $userModel = $this->model('user');

                $user = [
                    'firstname' => $_POST['firstname'],
                    'lastname' => $_POST['lastname'],
                    'email' => $_POST['email'],
                    'age' => $_POST['age']
                ];

                $userModel->create($user);

                // Perhaps I need to redirect instead of requiring the view
                // $this->view('users/index');
            }
        }

        public function show($id)
        {
            $userModel = $this->model('user');
            $user = $userModel->find($id);
            $this->view('users/show', ['user' => $user]);
        }

        public function edit($id)
        {
            $userModel = $this->model('user');
            $user = $userModel->find($id);
            $this->view('users/edit', ['user' => $user]);
        }

        public function update($id)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $userModel = $this->model('user');

                $request = [
                    'firstname' => $_POST['firstname'],
                    'lastname' => $_POST['lastname'],
                    'email' => $_POST['email'],
                    'age' => $_POST['age']
                ];

                $userModel->update($id, $request);
                $this->view('users/show');
            }
        }

        public function destroy($id)
        {
            $userModel = $this->model('user');
            $userModel->delete($id);
            $this->view('users/index');
        }
    }
