<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;


    protected const AVAILABLE_STATUSES =
        [
            'Paid' => 'paid',
            'In-progress' => 'in-progress',
            'Cancelled' => 'Cancelled'
        ];


    public static function getAvailableStatuses(bool $keys = false)
    {
        return ($keys) ? array_keys(self::AVAILABLE_STATUSES) : array_values(self::AVAILABLE_STATUSES);
    }
}
