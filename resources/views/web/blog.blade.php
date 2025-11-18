@extends('layouts.web')
<style>
    .banner {
    margin-top: 20px;
}

.banner-header {
    border-top-right-radius: 80px;
    border-top-left-radius: 80px;
    background: linear-gradient(to bottom, rgba(0, 102, 234, 1), rgba(3, 0, 80, 0));
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: auto;
    text-align: center;
    color: white;
    padding: 80px;
}

.contact-banner .banner-header {
    padding: 80px 250px !important;
}

.banner-header .banner-title {
    font-size: 48px;
    margin: 0;
}

.banner-header .banner-des {
    line-height: 30px;
    font-size: 18px;
}

.banner-btns {
    display: flex;
    gap: 20px;
}

.avatar-group {
    display: flex;
    align-items: center;
}

.avatar {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    border: 2px solid #fff;
    object-fit: cover;
    margin-left: -16px;
    box-shadow: 0 0 0 1px #ddd;
    background-color: #f0f0f0;
}
</style>
@section('meta_title', $blogupdate->getLocalizedMetaTitle())
@section('meta_desc', $blogupdate->getLocalizedMetaDesc())
@section('meta_keyword', $blogupdate->getLocalizedMetaKeywords())
@section('content')
    <!--<div class="service-banner2" style="padding-bottom: 16%;">-->
    <!--    <div class="banner-text">-->
    <!--        <h1 class="banner-title">{{ $blogupdate->main_title }}</h1>-->
    <!--        <p class="banner-des">{{ $blogupdate->main_desc }}</p>-->
    <!--    </div>-->
    <!--    <div class="banner-images">-->
    <!--        <div class="aboutbannerright">-->
    <!--            <img src="{{ asset('assets/web/images/Rectangle 12351.png') }}" alt="">-->
    <!--            <div class="circel2">-->
    <!--                <div class="circel1"></div>-->
    <!--                <div class="circel4"></div>-->
    <!--                <div class="allimagesIcons">-->
    <!--                    <div class="iconsimageaboout iconsimageaboout1">-->
    <!--                        <img src="{{ asset('assets/web/images/Group 29.png') }}" alt="">-->
    <!--                    </div>-->
    <!--                    <div class="iconsimageaboout iconsimageaboout2">-->
    <!--                        <img src="{{ asset('assets/web/images/Group 29.png') }}" alt="">-->
    <!--                    </div>-->
    <!--                    <div class="iconsimageaboout iconsimageaboout3">-->
    <!--                        <img src="{{ asset('assets/web/images/Group 29.png') }}" alt="">-->
    <!--                    </div>-->
    <!--                    <div class="iconsimageaboout iconsimageaboout4">-->
    <!--                        <img src="{{ asset('assets/web/images/Group 29.png') }}" alt="">-->
    <!--                    </div>-->
    <!--                    <div class="iconsimageaboout iconsimageaboout5">-->
    <!--                        <img src="{{ asset('assets/web/images/Group 29.png') }}" alt="">-->
    <!--                    </div>-->
    <!--                    <div class="iconsimageaboout iconsimageaboout6">-->
    <!--                        <img src="{{ asset('assets/web/images/Group 29.png') }}" alt="">-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="aboutmlogo">-->
    <!--                <img src="{{ asset('assets/web/images/bmlogo.png') }}" alt="">-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <div class="banner">
        <div class="banner-header">
            <h1 class="banner-title">{{ __('web.blog.banner_title') }}</h1>
            <p class="banner-des">{{ __('web.blog.banner_desc') }}</p>
        </div>
    </div>
    <div class="body-contect3">
        <div class="mainBlog">
            <div class="blogleft">
                @if($blogs->count() > 0)
                    @foreach ($blogs as $blog)
                        <a href="{{ route('blog.details', $blog->slug) }}">
                            <div class="blogcardd">
                                <div class="blogimg">
                                    <img src="{{ asset('uploads/blogs/' . $blog->thumbnail) }}" alt="{{$blog->thumbnail_alt}}">
                                </div>
                                <div class="blogmaintext">
                                    <div class="blogtimecomment">
                                        <div class="icontextcomment">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-message">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M8 9h8" />
                                                <path d="M8 13h6" />
                                                <path
                                                    d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" />
                                            </svg>
                                            @if ($blog->comments->count() > 0)
                                                <p>{{ $blog->comments->count() }}
                                                    {{ $blog->comments->count() > 1 ? __('web.blog.comments') : __('web.blog.comment') }}</p>
                                            @else
                                                <p>{{ __('web.blog.no_comments') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="blogtext">
                                        <h1>{{ $blog->getLocalizedTitle() }}</h1>
                                        <p>{!! Str::limit($blog->getLocalizedDesc(), 100) !!}</p>
                                        <div class="blogbtns">
                                            <a href="{{ route('blog.details', $blog->slug) }}">
                                                <button>{{ __('web.blog.read_more') }}
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-right">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M5 12l14 0" />
                                                        <path d="M13 18l6 -6" />
                                                        <path d="M13 6l6 6" />
                                                    </svg>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @else
                    <h1>{{ __('web.blog.no_blogs_found') }}</h1>
                @endif
            </div>
            <div>
                @include('partials.custom_pagination', ['paginator' => $blogs])
            </div>
            <div class="blogright">
                <div class="blogserch">
                    <form action="{{ route('blog') }}" method="GET">
                        <input type="text" name="q" id="search" placeholder="{{ __('web.blog.search_placeholder') }}"
                            value="{{ $search ?? '' }}">
                        <input type="hidden" name="category" value="{{ $category_slug ?? '' }}">
                        <button type="submit">{{ __('web.blog.search_button') }}</button>
                    </form>
                </div>
                <div class="recentPosts-main">
                    <h1>{{ __('web.blog.recent_posts') }}</h1>
                    <div class="recentMain">
                        @foreach ($recent_blogs as $item)
                            <div class="recentPosts">
                                <a href="{{ route('blog.details', $item->slug) }}">
                                    <div class="recentPosts-image">
                                        <img src="{{ asset('uploads/blogs/' . $item->thumbnail) }}" alt="">
                                    </div>
                                </a>
                                <a style="color: black;" href="{{ route('blog.details', $item->slug) }}">
                                    <div class="recentPosts-text">
                                        <h3>{{ Str::limit($item->getLocalizedTitle(), 50) }}</h3>
                                        <p>{{ \Carbon\Carbon::parse($item->created_at)->format('F d, Y') }}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="recentPosts-main">
                    <h1>{{ __('web.blog.categories') }}</h1>
                    <ul>
                        @foreach ($categories as $category)
                            <li>
                                <a href="{{ route('blog', ['category' => $category->slug, 'q' => $search]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M9 6l6 6l-6 6" />
                                    </svg>
                                    {{ $category->getLocalizedTitle() }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="recentPosts-main">
                    <h1>{{ __('web.blog.tag_clouds') }}</h1>
                    <div class="alltagsblog">
                        @foreach ($all_tags as $tag => $count)
                            <a href="">
                                {{ ucfirst($tag) }} <small>({{ $count }})</small>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .blogcardd {
        transition: all 0.3s ease;
    }

    .blogserch form {
        display: flex;
        gap: 10px;
    }

    .blogserch input {
        flex: 1;
        padding: 8px 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .blogserch button {
        padding: 8px 16px;
        background: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .blogserch button:hover {
        background: #0056b3;
    }
</style>


<style>
    .blogcardd {
        transition: all 0.3s ease;
        margin-bottom: 20px;
    }

    .blogserch form {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
    }

    .blogserch input {
        flex: 1;
        padding: 8px 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .blogserch button {
        padding: 8px 16px;
        background: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .blogserch button:hover {
        background: #0056b3;
    }
</style>