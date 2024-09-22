@extends('layouts.admin')

@section('content')
    <div style="text-align: center">
        <h1>
            <span class="">
                <h1 class="">
                    <span class="fw-300 display-2 fw-500 keep-print-font pt-4 l-h-n m-0 fw-900"> {{$code}}</span>
                    <small class="fw-200 display-4 keep-print-font pt-4 l-h-n m-0 ">
                        {{$msg}}
                    </small>
                </h1>
                <a href="{{ url()->previous() }}" class="btn btn-outline-success" >Back</a>
            </span>
        </h1>
    </div>
@endsection
