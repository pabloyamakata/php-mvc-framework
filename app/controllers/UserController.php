<?php

    namespace App\Controllers;

    use App\Libraries\Controller;
    use App\Helpers\Helper;

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
            $user = [
                'firstname' => trim($_POST['firstname']),
                'lastname' => trim($_POST['lastname']),
                'email' => trim($_POST['email']),
                'age' => trim($_POST['age'])
            ];

            $rules = [
                'firstname' => ['required' => true, 'min' => 6, 'max' => 8],
                'lastname' => ['required' => true],
                'email' => ['required' => true, 'email' => true],
                'age' => ['required' => true],
            ];

            $this->validate($user, $rules);

            if(!$this->errors())
            {
                $this->model->create($user);

                Helper::redirect('users/create')->with('success', 'Record was created successfully');
            } else
            {
                Helper::redirect('users/create')->withErrors($this->errors());
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
                
                Helper::redirect('users/' . $id . '/edit');
            }
        }

        public function destroy($id)
        {
            $this->model->delete($id);
            Helper::redirect('users');
        }
    }
