<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\SavingAccount;
use Illuminate\Http\Request;

class BankController extends Controller
{
    //account detail
    public function account(SavingAccount $account ){
        $data = $account->getAccountData();
        $rate = $account->calculateInterest();
        return view('bank.account',compact('data','rate'));
    }

    public function deposit(SavingAccount $account){
        $action='deposit';
        $balance = $account->getAccountData()->balance;
        return view('bank.deposit',compact('action','balance'));
    }

    
    public function withdraw(SavingAccount $account){
        $action='withdraw';
        $balance = $account->getAccountData()->balance;
        return view('bank.deposit',compact('action','balance'));
    }

    //deposit amount from current balance
    public function depositStore(SavingAccount $account , Request $request){
        $accountData = $account->getDataByAccountNum($request->accountNumber);
        if($request->accountNumber == null || $request->amt == null ){
            return redirect()->back()->with('error', 'Please enter account number and amount');
        }
        if(empty($accountData)){
            return redirect()->back()->with('error', 'Account Not Found');
        }
        $newBal = $accountData->balance + $request->amt;
        $account->saveBalance($newBal, $request->accountNumber);
        return redirect()->route('index');

    }

    //withdraw amount from current balance
    public function withdrawStore(SavingAccount $account , Request $request){
        $accountData = $account->getDataByAccountNum($request->accountNumber);
        if($request->accountNumber == null || $request->amt == null ){
            return redirect()->back()->with('error', 'Please enter account number and amount');
        }
        if(empty($accountData)){
            return redirect()->back()->with('error', 'Account Not Found');
        }
        if($accountData->balance < $request->amt){
            return redirect()->back()->with('error', 'Insufficient balance');
        }
        $newBal = $accountData->balance - $request->amt ;
        $account->saveBalance($newBal, $request->accountNumber);
        return redirect()->route('index');
    }
}
