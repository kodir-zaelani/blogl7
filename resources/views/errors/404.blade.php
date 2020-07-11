@extends('layouts.frontend')
@section('title', __('Not Found'))
@section('content')
<div class="mb-5">
    <div class="container-fluid" style="margin-top: 80px;">

            <div class="jumbotron rounded-lg shadow" style="background-color: #566479;">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="card border-0 shadow rounded-full">
                            <div class="card-body">
                                <h1>404 Not Found</h1>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center text-white mt-3 font-weight-bold" style="font-size: 24px"><a href="/" class="btn btn-primary btn-sm">Home</a></div>
                </div>
            </div>
@endsection
            