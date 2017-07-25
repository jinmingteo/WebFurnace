@extends('main')

@section('title', '| Profile')

@section('content')
    {{Auth::user()-> username}}
@endsection
