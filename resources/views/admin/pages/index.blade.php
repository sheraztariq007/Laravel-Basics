@extends('layouts.app')

@section('content')
<div class="container">
    <h1> Well come to pages page</h1>
    
     @if(session('status'))
    <div class="alert alert-info">
        {{session('status')}}
        
    </div>
    
    
    @endif
    
    <a href="{{route('page.create')}}" class="btn btn-success"> + Create Page</a>
    <table class="table">
        
        <thead>
            <tr>
                <th>Title</th>
                <th>Url</th>
                <th>Actions</th>
            </tr>
        </thead>
        @foreach($pages as $page) 
        <tr>
            <td> <a href="{{route('page.edit',['page'=>$page->id])}}">{{$page->title}}</a></td>
            <td> {{$page->url}}</td>
            <td> <form action="{{route('page.destroy', ['page'=>$page->id])}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Delete</button>
                     </form>
            </td>
        </tr>
        @endforeach
        
    </table>
    
    {{$pages->links()}}
</div>
@endsection