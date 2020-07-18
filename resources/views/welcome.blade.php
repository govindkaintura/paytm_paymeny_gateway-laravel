@extends('app')

@section('content')
    <div class="album text-muted">
        <div class="container">
            <div class="row">
                <form action="{{ route('payment') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Pay via Paytm</button>
                </form>
            </div>
        </div>
    </div>
@endsection
