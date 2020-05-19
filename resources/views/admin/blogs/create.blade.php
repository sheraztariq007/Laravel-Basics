@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New</h1>
    
    <form action="{{route('blog.store')}}" method="POST">
        
        @include('admin.blogs.partials.fields');
        
        
    </form>
    
</div>
@endsection