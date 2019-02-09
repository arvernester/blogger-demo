@extends('layouts.blog')

@push('opengraph')
    <meta property="og:title" content="{{ $page['title'] }}" />
    <meta property="og:description" content="{{ substr($page['excerpt'], 0, 160) }}" />
    <meta property="og:url" content="{{ url()->current() }}">
@endpush

@section('content')
    <div id="content" class="site-content center-relative">
        <div class="single-post-wrapper content-1070 center-relative">

            <article class="center-relative">
                <h1 class="entry-title">
                    {{ $page['title'] }}
                </h1>
                <div class="post-info content-660 center-relative">
                    <div class="entry-date published">{{ $page['author']['displayName'] }}</div>
                    <div class="entry-date published">{{ \Carbon\Carbon::parse($page['published'])->diffForHumans() }}</div>
                    <div class="clear"></div>
                </div>

                <div class="entry-content">
                    <div class="content-wrap content-660 center-relative">
                        {!! $page['content'] !!}
                    </div>
                </div>
                <div class="clear"></div>
            </article>
        </div>
    </div>
@endsection
