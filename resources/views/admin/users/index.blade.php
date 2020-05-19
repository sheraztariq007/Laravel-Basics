@extends('layouts.app')

@section('content')
<div class="container">
    <h1> Well come to users page</h1>
    
    @if(session('status'))
    <div class="alert alert-info">
        {{session('status')}}
        
    </div>
    
    
    @endif
    
    <table class="table">
        
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
            </tr>
        </thead>
        @foreach($model as $user) 
        <tr>
            <td> <a href="{{route('user.edit',['user'=>$user->id])}}">{{$user->name}}</a></td>
            <td> {{$user->email}}</td>
            <td> {{implode(',',$user->roles()->get()->pluck('name')->toArray())}}</td>
        </tr>
        @endforeach
        
    </table>
   
   {{$model->links()}}
</div>
@endsection