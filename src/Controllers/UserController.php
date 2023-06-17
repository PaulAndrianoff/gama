<?php

namespace Gama\GamaPhp\Controllers;

use Gama\GamaPhp\Models\User;

class UserController
{
    public function index()
    {
        $users = (new User())->all();
        
        print_r($users);
    }

    public function show($id)
    {
        $user = (new User())->find($id);
        
        echo $user;
    }

    public function store()
    {
        // Retrieve and sanitize user input
        $name = sanitizeInput($_POST['name']);
        $email = sanitizeInput($_POST['email']);

        // Generate a random password
        $password = generateRandomString(8);

        // Create a new user
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->save();

        // Redirect or render a response
    }

    public function update($id)
    {
        // Retrieve and validate user input

        // Update the specified user
        $user = (new User())->find($id);
        $user->name = $_POST['name'];
        $user->email = $_POST['email'];
        $user->save();

        // Redirect or render a response
    }

    public function delete($id)
    {
        // Delete the specified user
        $user = (new User())->find($id);
        $user->delete();

        // Redirect or render a response
    }

    // Add more controller methods as needed
}
