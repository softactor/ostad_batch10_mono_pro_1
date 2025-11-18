@extends('front.layout.app')
@section('title', 'About us')

@section('content')
    <h1>{{ $heading }}</h1>


    @if($day == 'Sun')
        
        Today is Sunday
    
    @elseif($day == 'Mon') 
        Today is Monday

    @elseif($day == 'Tue') 

        Today is Tuesday

    @elseif($day == 'Wed') 

        Today is Wednesday

    @elseif($day == 'Thu') 

        Today is Thursday

    @elseif($day == 'Fri') 

        Today is Friday
        
    @else 

        Today is Holiday!

    @endif
@endsection