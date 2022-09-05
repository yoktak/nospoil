@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('/CSS/comments/create.css') }}">
<div class='create'>
    <form action="/posts/{{ $post->id }}/comments" method="POST">
    {{ csrf_field() }}
        <div class='recipient'>
            <h8>送信先：{{ $post->user->name }}</h8>
            <input type='hidden' name='comment[post_id]' value='{{ $post->id }}' />
            <div class='comic'>
                <div class="d-flex flex-row">
                    <div class='px-2'>
                        {{ $post->comic->title }}
                    </div>
                    <div class='px-2'>
                        @if($post->type===0)
                            単行本
                        @else
                            雑誌
                        @endif
                    </div>
                    <div class='px-2'>
                        {{ $post->episode }}
                        @if($post->type===0)
                            巻
                        @else
                            話
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class='username'>
            <p>{{Auth::user()->name}}</p>
        </div>
        <div class='body'>
            <div class='careful'>
            <p>上記の投稿者の漫画詳細を再度確認してコメントしましょう</p>
            </div>
            <textarea name='comment[body]'></textarea>
        </div>
        <input type="submit" value="コメント"/>
    </form>
</div>
@endsection
