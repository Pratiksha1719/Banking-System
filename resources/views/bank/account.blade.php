@extends('layouts.web')

@section('content')
<div class="bg-text">
    <center><label style="font-size:20px"><b>Saving Account Details</b></label></center>
    

    <div class="container inner-dv" style="background-color:white">
        <div class="row">
            <div class="col-lg-12">
                <center><label>Account Number</label></center>
                <input style="background-color:white; text-align:center" disabled class="rupees form-control" value="{{$data->account_number}}">
            </div>
        </div>
    </div>

    <div class="container inner-dv" style="background-color:white">
        <div class="row">
            <div class="col-lg-6">
                <label>Interest Rate</label>
                <input style="background-color:white" disabled class="rupees form-control" value="{{$rate}}">
            </div>
            <div class="col-lg-6">
                <label>Current Balance</label>
                <input class="form-control" style="background-color:white" name="amt" disabled value="{{$data->balance}}">
            </div>
        </div>
    </div>

    

</div>
@endsection