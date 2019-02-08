@extends('layouts.blog')

@section('content')
<div id="content" class="site-content">
    <div id="blog-wrapper">
        <div class="blog-holder center-relative">

            @if(empty($posts['items']))
                <h2>@lang('No posts.')</h2>
            @endif

            @if (! empty($posts['items']))
                @foreach ($posts['items'] as $index => $post)
                    <article id="post-1" class="blog-item-holder {{ $index == 0 ? 'featured-post' : '' }}">
                        <div class="entry-content relative">
                            <div class="content-1170 center-relative">
                                @if (! empty($post['labels']))
                                <div class="cat-links">
                                    <ul>
                                        @foreach($post['labels'] as $label)
                                        <li>
                                            <a href="#">{{ $label }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <div class="entry-date published">{{ \Carbon\Carbon::parse($post['published'])->diffForHumans() }}</div>
                                <h2 class="entry-title">
                                    <a href="{{ route('blog.show', $post['id']) }}">{{ $post['title'] }}</a>
                                </h2>
                                @if ($index == 0)
                                    <div class="excerpt">
                                        {{ $post['content'] }}
                                    </div>
                                @endif
                                <div class="clear"></div>
                            </div>
                        </div>
                    </article>
                @endforeach
            @endif

        </div>
        <div class="clear"></div>
        {{--<div class="block load-more-holder">LOAD MORE ENTRIES</div>--}}
    </div>

    <div class="featured-image-holder">
        <div class="featured-post-image" style="background-image: url({{ asset('demo-images/featured-image.jpg') }})"></div>

    </div>
    <div class="clear"></div>
</div>
@endsection
