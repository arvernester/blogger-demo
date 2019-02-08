@extends('layouts.blog')

@section('content')
<div id="content" class="site-content center-relative">
    <div class="single-post-wrapper content-1070 center-relative">

        <article class="center-relative">
            <h1 class="entry-title">
                {{ $post['title'] }}
            </h1>
            <div class="post-info content-660 center-relative">
                @if (!empty($post['labels']))
                <div class="cat-links">
                    <ul>
                        @foreach($post['labels'] as $label)
                        <li><a href="#">{{ $label }}</a></li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="entry-date published">{{ $post['author']['displayName'] }}</div>
                <div class="entry-date published">{{ \Carbon\Carbon::parse($post['published'])->diffForHumans() }}</div>
                <div class="clear"></div>
            </div>

            <div class="entry-content">
                <div class="content-wrap content-660 center-relative">
                    {!! $post['content'] !!}
                </div>
            </div>
            <div class="clear"></div>
        </article>
    </div>
</div>
@endsection
