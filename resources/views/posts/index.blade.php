@extends('layouts.app')
@section('content')
<div class="columns">
    @include('postSideBar')
    @if(Session::has('success_msg'))
        <div class="success_msg">{{ Session::get('success_msg') }}</div>
    @endif
    <div class="column">
        <table class="table">
            <thead>
            <td>Title</td>
            <td>Publisher</td>
            <td>Created at</td>
            </thead>
            <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->publisher }}</td>
                <td>{{ $post->created_at }}</td>
                <td><a href="{{ route('posts.edit',['id' => $post->id]) }}" class="button edit">Edit</a>
                    <a href="{{ route('posts.delete',['id' => $post->id]) }}" class="button delete">Delete</a>
                </td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('style')
    <style type="text/css">
        .success_msg {
            background-color: #CCFF90;
            color: #000000;
        }

        .is-8 {
            display: block;
            margin: 0 auto;
        }
        .button{
            padding: 0.5em 1em;
            border-radius: 3px;
            margin: 0 1em;
        }
        a.edit{
            background-color: #1E88E5;
            color: #FFFFFF;
            text-decoration: none;
        }
        a.delete{
            background-color: #EF6C00;
            color: #FFFFFF;
            text-decoration: none;
        }
    </style>
@endsection