
@extends('template.homeLogin')

@section('title','Gadai')

@section('container')
<form action="{{ url('gadai/add')}}">
    <input type="submit" class="btn btn-primary" value="Request">
</form>

@endsection