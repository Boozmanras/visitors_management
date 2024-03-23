@extends('layouts.default')

@section('meta')
    <title>Visitors Today</title>
    <meta name="description" content="Visitors Today">
@endsection

@section('styles')

@endsection

@section('content')

<div class="container">
    <h3 class="page-title">Visitors Today</h3>
        
    <div class="card">
        <div class="card-body">
            <ul class="timeline">
                @isset($data)
                    @foreach($data as $visitor) 
                        <li class="timeline__item">
                            <div class="timeline__step">
                                <div class="timeline__step__marker timeline__step__marker--blue"></div>
                            </div>
                            <div class="timeline__time">{{ $visitor->timein }}</div>
                            <div class="timeline__content">
                                <div class="timeline__title">
                                    {{ $visitor->lastname }}, {{ $visitor->firstname }}
                                </div>
                              {{--  <ul class="timeline__points">
                                    <li>{{ $visitor->reasonforvisit }}</li>
                                </ul>--}}
                            </div>
                        </li>
                    @endforeach
                @endisset
            </ul>
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection