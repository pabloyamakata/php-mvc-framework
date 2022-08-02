<?php

    class UserController extends Controller
    {
        public function __construct()
        {
            $this->model = $this->model('user');
        }

        public function index()
        {
            $users = $this->model->findAll();
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
                    'firstname' => trim($_POST['firstname']),
                    'lastname' => trim($_POST['lastname']),
                    'email' => trim($_POST['email']),
                    'age' => trim($_POST['age'])
                ];

                $this->model->create($user);

                redirect('homecontroller/index');
            }
        }

        public function show($id)
        {
            $user = $this->model->find($id);
            $this->view('users/show', ['user' => $user]);
        }

        public function edit($id)
        {
            $user = $this->model->find($id);
            $this->view('users/edit', ['user' => $user]);
        }

        public function update($id)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $request = [
                    'firstname' => trim($_POST['firstname']),
                    'lastname' => trim($_POST['lastname']),
                    'email' => trim($_POST['email']),
                    'age' => trim($_POST['age'])
                ];

                $this->model->update($id, $request);
                $this->view('users/show');
            }
        }

        public function destroy($id)
        {
            $this->model->delete($id);
            $this->view('users/index');
        }
    }
