@extends('layout')
@can('admin')
  {{-- Verificar permission customizada --}}
@endcan
@section('content')
Seu curso é: {{ $curso }}
@endsection