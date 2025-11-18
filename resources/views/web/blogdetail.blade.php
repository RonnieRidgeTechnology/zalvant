@extends('layouts.web')
<style>
    .body-contect3 {
    top: 42px !important;
}
</style>
@section('meta_title', $blog->getLocalizedMetaTitle())
@section('meta_desc', $blog->getLocalizedMetaDesc())
@section('meta_keyword', $blog->getLocalizedMetaKeyword())
@section('content')
    <div class="service-banner2" style="padding-bottom: 16%;">
        <div class="banner-text">
            <h1 class="banner-title">{{ $blogupdate->getLocalizedMainTitle() }}</h1>
            <p class="banner-des">{{ $blogupdate->getLocalizedMainDesc() }}</p>
        </div>
      <div class="banner-images">
           
             <div class="orbit-section">
     <div class="border1">
            <img src="{{ asset('assets/web/images/Vue.js_Logo_2 1.png') }}" class="vue small-icon" alt="Vue.js_Logo_2">
            <img src="{{ asset('assets/web/images/Node.js_logo_2015 1.png') }}" class=" small-icon node"
                alt="Vue.js_Logo_2">
            <img src="{{ asset('assets/web/images/physics 2.png') }}" class="react small-icon" alt="Vue.js_Logo_2">
        </div>
        <div class="border2">
            <img src="{{ asset('assets/web/images/sass 1.png') }}" class="small-icon sass" alt="Vue.js_Logo_2">
            <img src="{{ asset('assets/web/images/NET_Core_Logo 1.png') }}" class="small-icon net" alt="Vue.js_Logo_2">
            <img src="{{ asset('assets/web/images/Angular_full_color_logo 1.png') }}" class="small-icon angular"
                alt="Vue.js_Logo_2">
        </div>
        <div class="border3">
            <img src="{{ asset('assets/web/images/php 2.png') }}" class=" small-icon php" alt="php 2">
            <img src="{{ asset('assets/web/images/python 1.png') }}" class=" small-icon python" alt="python 1">
            <img src="{{ asset('assets/web/images/java 1.png') }}" class=" small-icon java" alt="java 1">
        </div>
        <div class="border4">
        </div>
        <div class="center-circle">
            <img src="https://zalvant.com/assets/web/images/Group_1000006059-removebg-preview.png" alt="img29">
        </div>
    </div>
        </div>
    </div>
    <div class="body-contect3">
        <div class="mainBlog">
            <div class="blogleft">
                <div class="blogsDetails">
                    <div class="constantly">
                        <div class="evolvingImage">

                            <img src="{{ asset('uploads/blogs/' . $blog->image) }}" alt="{{$blog->image_alt}}">
                        </div>
                        <span>{{ \Carbon\Carbon::parse($blog->created_at)->format('F d, Y') }} / {{ $blog->category ? $blog->category->getLocalizedTitle() : 'N/A' }}</span>
                        <h1>{{ $blog->getLocalizedTitle() }}</h1>
                        <p>{!! $blog->getLocalizedDesc() !!}</p>


                    </div>
                    <div class="commentssectioin">
                        <div class="commenttitle">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-message">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M8 9h8" />
                                    <path d="M8 13h6" />
                                    <path
                                        d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" />
                                </svg>
                            </div>
                            <h1>{{ $blog->comments->count() }} {{ $blog->comments->count() > 1 ? __('web.blog.comments') : __('web.blog.comment') }}</h1>
                        </div>

                        @foreach($blog->comments->where('status', 1) as $comment)
                        <div class="commentimagemainall">
                            <div class="commentimage">
                                <div class="avatar-circle">
                                    {{ strtoupper(substr($comment->name, 0, 2)) }}
                                </div>
                            </div>
                            <div class="adipiscingmain">
                                <div class="adipiscing">
                                    <div class="titleDate">
                                        <span>{{ $comment->created_at->format('F d, Y') }}</span>
                                        <h1>{{ $comment->name }}</h1>
                                    </div>
                                    <div class="gnissim">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-plus reply-btn"
                                            data-comment-id="{{ $comment->id }}">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 5l0 14" />
                                            <path d="M5 12l14 0" />
                                        </svg>
                                        <h3>{{ __('web.blog.reply_to') }}</h3>
                                    </div>
                                </div>
                                <p>{{ $comment->comment }}</p>

                                <!-- Reply Form (Hidden by default) -->
                                <div class="reply-form" id="reply-form-{{ $comment->id }}" style="display: none;">
                                    <form action="{{ route('comments.reply') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                        <div class="formnameEmail">
                                            <div class="blogcommentForm-input blogcommentForm-input2">
                                                <input type="text" name="name" placeholder="{{ __('web.blog.your_name') }}" required>
                                            </div>
                                            <div class="blogcommentForm-input blogcommentForm-input2">
                                                <input type="email" name="email" placeholder="{{ __('web.blog.your_email') }}" required>
                                            </div>
                                        </div>
                                        <div class="blogcommentForm-textarea">
                                            <textarea name="message" placeholder="{{ __('web.blog.your_reply') }}" required></textarea>
                                        </div>
                                        <button type="submit" class="reply-submit">{{ __('web.blog.submit_reply') }}</button>
                                    </form>
                                </div>

                                <!-- Replies -->
                                @foreach($comment->replies as $reply)
                                <div class="commentimagemainall commentimagemainall2">
                                    <div class="commentimage">
                                        <div class="avatar-circle">
                                            {{ strtoupper(substr($reply->name, 0, 2)) }}
                                        </div>
                                    </div>
                                    <div class="adipiscingmain">
                                        <div class="adipiscing">
                                            <div class="titleDate">
                                                <span>{{ $reply->created_at->format('F d, Y') }}</span>
                                                <h1>{{ $reply->name }}</h1>
                                            </div>
                                        </div>
                                        <p>{{ $reply->message }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="commenttitle2">
                        <h1>{{ __('web.blog.leave_reply') }}</h1>
                        <p>{{ __('web.blog.email_not_published') }}</p>
                    </div>
                    <div class="blogcommentForm">
                        <form action="{{ route('comments.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                            <div class="blogcommentForm-textarea">
                                <textarea name="comment" placeholder="{{ __('web.blog.your_comment') }}" required></textarea>
                            </div>
                            <div class="formnameEmail">
                                <div class="blogcommentForm-input blogcommentForm-input2">
                                    <input type="text" name="name" placeholder="{{ __('web.blog.your_name') }}" required>
                                </div>
                                <div class="blogcommentForm-input blogcommentForm-input2">
                                    <input type="email" name="email" placeholder="{{ __('web.blog.your_email') }}" required>
                                </div>
                            </div>
                            <div class="blogcommentForm-input">
                                <input type="url" name="website" placeholder="{{ __('web.blog.website') }}">
                            </div>
                            <div class="blogfromsubmit" style="margin-bottom: 50px;">
                                <button type="submit">{{ __('web.blog.post_submit') }}
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
                            </div>
                        </form>
                    </div>
                </div>
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
                                    <img src="{{ asset('uploads/blogs/' . $blog->thumbnail) }}" alt="{{$blog->thumbnail_alt}}">
                                </div>
                            </a>
                                <a style="color:black;" href="{{ route('blog.details', $item->slug) }}">
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
                            <a href="{{ route('blog', ['category' => $category->slug, 'q' => $search ?? '']) }}">
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
.avatar-circle {
    width: 50px;
    height: 50px;
    background-color: #2196F3;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: bold;
    font-size: 18px;
}

.reply-form {
    margin-top: 15px;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 5px;
}

.reply-submit {
    background: #2196F3;
    color: white;
    border: none;
    padding: 8px 15px;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 10px;
}

.reply-submit:hover {
    background: #1976D2;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle reply button clicks
    document.querySelectorAll('.reply-btn').forEach(button => {
        button.addEventListener('click', function() {
            const commentId = this.dataset.commentId;
            const replyForm = document.getElementById(`reply-form-${commentId}`);
            replyForm.style.display = replyForm.style.display === 'none' ? 'block' : 'none';
        });
    });

    const searchInput = document.querySelector('.blogserch input');
    const blogCards = document.querySelectorAll('.blogcardd');

    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();

        blogCards.forEach(card => {
            const title = card.querySelector('h1').textContent.toLowerCase();
            const desc = card.querySelector('p').textContent.toLowerCase();

            if (title.includes(searchTerm) || desc.includes(searchTerm)) {
                card.style.opacity = '1';
                card.style.filter = 'none';
            } else {
                card.style.opacity = '0.5';
                card.style.filter = 'blur(2px)';
            }
        });
    });
});
</script>
