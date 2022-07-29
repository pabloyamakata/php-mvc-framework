<?php

    class UserController extends Controller
    {
        public function __construct()
        {
            $this->user = $this->model('user');
        }

        public function index()
        {
            $users = $this->user->findAll();
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
                $user = [
                    'firstname' => $_POST['firstname'],
                    'lastname' => $_POST['lastname'],
                    'email' => $_POST['email'],
                    'age' => $_POST['age']
                ];

                $this->user->create($user);

                // Perhaps I need to redirect instead of requiring the view
                // $this->view('users/index');
            }
        }

        public function show($id)
        {
            $user = $this->user->find($id);
            $this->view('users/show', ['user' => $user]);
        }

        public function edit($id)
        {
            $user = $this->user->find($id);
            $this->view('users/edit', ['user' => $user]);
        }

        public function update($id)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $request = [
                    'firstname' => $_POST['firstname'],
                    'lastname' => $_POST['lastname'],
                    'email' => $_POST['email'],
                    'age' => $_POST['age']
                ];

                $this->user->update($id, $request);
                $this->view('users/show');
            }
        }

        public function destroy($id)
        {
            $this->user->delete($id);
            $this->view('users/index');
        }
    }
