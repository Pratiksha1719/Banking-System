<?php

namespace App\Models;

use App\Interfaces\InterestCal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $table = 'accounts';

    public static function getAccountData()
    {
        return self::first();
    }
    public static function getDataByAccountNum($accNum)
    {
        return self::where('account_number', $accNum)->first();
    }

    public static function saveBalance($balanace, $accNum)
    {
        return self::where('account_number', $accNum)->update(['balance' => $balanace]);
    }
}
