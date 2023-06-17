<?php

namespace Gama\GamaPhp\Models;

use Core\Database\DB;

class BaseModel
{
    protected $table;

    public function all()
    {
        return DB::table($this->table)->get();
    }

    // Add more common methods as needed
}
