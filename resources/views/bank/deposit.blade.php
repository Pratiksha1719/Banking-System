@extends('layouts.web')

@section('content')
<?php
($action == 'deposit') ? $routeName = route('bank.deposit.store') : $routeName = route('bank.withdraw.store');

?>

<div class="bg-text">
    <form method="post" id="bankForm" action="{{$routeName}}">
        @csrf
        <center><label style="font-size:20px"><b>Saving Account - {{ strtoupper($action)}}</b></label></center>
        <input type="hidden" value="{{$action}}" class="action" name="action" id="action">
    
        <div class="container inner-dv" style="background-color:white">
            <!-- Display success message if present -->
            @if (\Session::has('success'))
            <div class="alert alert-success">
                {!! \Session::get('success') !!}
            </div>
            @endif

            <!-- Display error message if present -->
            @if (\Session::has('error'))
            <div class="alert alert-danger">
                {!! \Session::get('error') !!}
            </div>
            @endif
            <div class="row">
                <div class="col-lg-11">
                    <label>Enter Account Number</label>
                    <input class="form-control accountNumber" placeholder="Enter account number" id="accountNumber" name="accountNumber" type="text" required>
                </div>
            </div><br>
            <label stylee="color:black">Enter amount for withdraw</label>
            <div class="row">
                <div class="col-lg-2">
                    <input style="background-color:white" disabled class="rupees form-control" value="₹">
                </div>
                <div class="col-lg-9">
                    <input class="form-control" placeholder ="Enter amount" name="amt" type="number" min ="0" oninput="this.value = Math.abs(this.value)" required> 
                </div>
            </div>

        </div><br>
        <button type="button" onclick="formSubmit()" style="float:right; margin-right:10%" class="btn btn-outline-light form-submit">{{strtoupper($action)}}</button>
        <br>
    </form>
</div>

<div class="cb-bg-text">
    <form method="post">
        <center><label style="font-size:20px"><b>Current Balance</b></label></center>
        <center><label style="font-size:20px"><b>₹{{$balance}}</b></label></center>

    </form>
</div>
<script>
    function formSubmit() {
        document.getElementById("bankForm").submit();
    }
</script>

@endsection