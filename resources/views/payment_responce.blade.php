@extends('app')

@section('content')
    <div class="title m-b-md">
        <h3>Payment Responce</h3>
        <span>Status: {{ $STATUS }}</span><br>
        <span>Amount: {{ $TXNAMOUNT }}</span><br>
        <span>Transaction No.: {{ $TXNID }}</span><br>
        <span>Date: {{ $TXNDATE }}</span>
    </div>
@endsection
