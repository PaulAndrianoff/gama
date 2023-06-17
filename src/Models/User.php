<?php

namespace Gama\GamaPhp\Models;

use Core\Database\DB;

class User extends BaseModel
{
    protected $table = 'users';

    private $id;
    private $name;
    private $email;
    private $password;

    public function find($id)
    {
        $query = DB::table($this->table)->where('id', $id)->limit(1)->get();
        return isset($query[0]) ? $query[0] : null;
    }

    public function save()
    {
        // Perform validation and other necessary operations

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            // Include other properties as needed
        ];

        DB::table($this->table)->insert($data);
    }

    public function update()
    {
        // Perform validation and other necessary operations

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            // Include other properties as needed
        ];

        DB::table($this->table)->where('id', $this->id)->update($data);
    }

    public function delete()
    {
        DB::table($this->table)->where('id', $this->id)->delete();
    }

    // Add more model methods and relationships as needed
}
