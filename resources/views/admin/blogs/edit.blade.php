@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Page</h1>
    
    <form action="{{route('blog.update',['blog'=>$model->id])}}" method="POST">
        {{method_field('PUT')}}
                @include('admin.blogs.partials.fields');

        
    </form>
    
</div>
@endsection