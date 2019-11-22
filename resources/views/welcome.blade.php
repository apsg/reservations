@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <reservation-selector :dates="['2019-01-01', '2019-01-02']"></reservation-selector>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
