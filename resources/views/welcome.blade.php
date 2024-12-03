@extends('AdminPanel.app')
@section('content')
    <div class="row mt-5" >
        {{-- <div class="col-4 bg-secondary  mr-5">
            <h1>{{ __('lang.admins') }}</h1>
            <span>{{\App\Models\Admin::count()}}</span>
        </div> --}}
        <div class="col-4 bg-secondary ">
            <h1>{{ __('lang.categories') }}</h1>
            <span>{{\App\Models\Category::count()}}</span>
        </div>
    </div>

    <div class="row mt-5 h-25">
        <div class="col-4 bg-secondary   mr-5">
            <h1>{{ __('lang.meals') }}</h1>
            <span>{{\App\Models\Meal::count()}}</span>
        </div>

        <div class="col-4 bg-secondary  ">
            <h1>{{ __('lang.dietplans') }}</h1>
            <span>{{\App\Models\DietPlan::count()}}</span>
        </div>
    </div>

    <div class="row mt-5 ">
        <div class="col-4 bg-secondary   mr-5">
            <h1>{{ __('lang.clients') }}</h1>
            <span>{{\App\Models\Client::count()}}</span>
        </div>

        <div class="col-4 bg-secondary ">
            <h1>{{ __('lang.orders') }}</h1>
            <span>{{\App\Models\ClientMeal::count()}}</span>
        </div>
    </div>
@endsection
