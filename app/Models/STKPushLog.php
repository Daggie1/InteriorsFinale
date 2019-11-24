<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class STKPushLog extends Model
{
    protected $table='s_t_k_push_logs';
    protected $fillable = ['content'];
}
