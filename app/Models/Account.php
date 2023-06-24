<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountMeta extends Base
{
    protected $table = 'accounts';

    protected $fillable = [
        'name', 'email', 'value'
    ];
}
