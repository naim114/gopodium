@extends('layouts.main')

@section('page-title', trans('app.main.help.faq'))

@section('content')
    <div style="height: 50px"></div>
    @include('main.partial.faq')
@endsection
