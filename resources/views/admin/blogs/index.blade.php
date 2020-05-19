@extends('layouts.app')

@section('content')
<div class="container">
    <h1> Well come to pages page</h1>
    
     @if(session('status'))
    <div class="alert alert-info">
        {{session('status')}}
        
    </div>
    
    
    @endif
    
    <a href="{{route('blog.create')}}" class="btn btn-success"> + Create Blog</a>
    <table class="table">
        
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Slug</th>
                <th>Published</th>
                <th>Actions</th>
            </tr>
        </thead>
        @foreach($model as $post) 
        <tr>
            <td> <a href="{{route('blog.edit',['blog'=>$post->id])}}">{{$post->title}}</a></td>
            <td> {{$post->user()->first()->name}}</td>
            <td> {{$post->slug}}</td>
            <td> {{$post->published_at}}</td>
            <td> 
            <form action="{{route('blog.destroy', $post)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Delete</button>
                     </form>
            </td>

        </tr>
        @endforeach
        
    </table>
    
    {{$model->links()}}
</div>

<form id="delete-form" action="" method="Post">
    {{method_field('DELETE') }}
    
    {!! csrf_field() !!}
    
</form>

@endsection