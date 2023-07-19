<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Item extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'items_for_invoice';

    public static function getSumNetAmountCurrentMonth(): array
    {
        return DB::select("SELECT SUM(net_amount) AS sumNetAmount FROM items_for_invoice WHERE YEAR(created_at) = YEAR(CURRENT_TIMESTAMP) AND MONTH(created_at) = MONTH(CURRENT_TIMESTAMP)");
    }

    public static function getSumGrossAmountCurrentMonth(): array
    {
        return DB::select("SELECT SUM(gross_amount) AS sumGrossAmount FROM items_for_invoice WHERE YEAR(created_at) = YEAR(CURRENT_TIMESTAMP) AND MONTH(created_at) = MONTH(CURRENT_TIMESTAMP)");
    }
}
