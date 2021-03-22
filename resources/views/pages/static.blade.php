@extends('bookView')

@section('content')
    @component('partials.hero')
        {{ $book->title }}
    @endcomponent

    @include('partials.nav')
@endsection