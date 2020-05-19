@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Page</h1>
    
    <form action="{{route('page.update',['page'=>$model->id])}}" method="POST">
        {{method_field('PUT')}}
                @include('admin.pages.partials.fields');

        
    </form>
    
</div>
@endsection