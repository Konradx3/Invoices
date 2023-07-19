<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Invoice extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'invoices';

    protected const AVAILABLE_STATUSES =
        [
            'Paid' => 'paid',
            'In-progress' => 'in-progress',
            'Cancelled' => 'cancelled',
        ];

    protected const PAYMENT_METHOD =
        [
            'Cash' => 'cash',
            'Transfer7' => 'transfer7',
            'Transfer14' => 'transfer14',
        ];

    public static function getAvailableStatuses(bool $keys = false)
    {
        return ($keys) ? array_keys(self::AVAILABLE_STATUSES) : array_values(self::AVAILABLE_STATUSES);
    }

    public static function getAvailablePaymentMethod(bool $keys = false)
    {
        return ($keys) ? array_keys(self::PAYMENT_METHOD) : array_values(self::PAYMENT_METHOD);
    }

    public static function getInvoiceData()
    {
        return DB::table('invoices')->get();
    }

    public static function getCountInvoicesCurrentMonth(): array
    {
        return DB::select("SELECT COUNT(*) AS count FROM invoices WHERE YEAR(created_at) = YEAR(CURRENT_TIMESTAMP) AND MONTH(created_at) = MONTH(CURRENT_TIMESTAMP)");
    }

    public static function findInvoicesInProgress()
    {
        return DB::table('invoices')->where('status', 'in-progress')->count();
    }

}
