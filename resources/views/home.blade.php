@extends('layouts.auths')
@section('title','Home')

@section('content')

@if(Auth::user()->role=="member" )
<h3>HELLO MEMBER</h3>
@endif

@if(Auth::user()->role=="admin" )
<h3>YOHOO ADMIN</h3>
@endif


@endsection
