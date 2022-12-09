@extends('templates/master')

@section('title')
@endsection

@section('content')
    <h2>Round Details</h2>

    <ul>
        <li>Date and Time: {{ $round['timestamp'] }} </li>
        <li>Round id: {{ $round['id'] }}</li>
        <li>Player's bet: {{ $round['bet'] }}</li>
        <li>Player's outcome: {{ $round['won'] ? 'Winner' : 'Loser' }}</li>
    </ul>

    <a href='/history'>Back to round history</a>
@endsection
