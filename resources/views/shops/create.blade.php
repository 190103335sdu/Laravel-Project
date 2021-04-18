@extends('layouts.master')

@section('content')

<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>{{__('Create Your Shop')}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="container " style="margin-left: 25%; margin-top: 5%; margin-bottom: 5%">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <form method="post" action="{{route('shops.store')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{__('Name of Shop')}}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{__('Description')}}</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="description" id="" rows="6"></textarea> 
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">{{__('Send Request')}}</button>
                                   
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection