<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class SavingAccount extends Account{
    use HasFactory;
    public function calculateInterest()
    {
        // calculate interest rate - inheritence concept
        $data = parent::getAccountData();
        $rate = $data->balance * 0.05;
        return $rate;
    }
}
