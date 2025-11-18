@extends('layouts.admin')
<style>
    .custom-switch {
        position: relative;
        display: inline-block;
        width: 45px;
        height: 24px;
    }

    .custom-switch-input {
        display: none;
    }

    .custom-switch-label {
        position: absolute;
        top: 0;
        left: 0;
        width: 45px;
        height: 24px;
        background-color: #ccc;
        border-radius: 34px;
        cursor: pointer;
        transition: 0.4s;
    }

    .custom-switch-label:before {
        content: "";
        position: absolute;
        width: 20px;
        height: 20px;
        left: 2px;
        bottom: 2px;
        background-color: white;
        border-radius: 50%;
        transition: 0.4s;
    }

    .custom-switch-input:checked + .custom-switch-label {
        background-color: #2196F3;
    }

    .custom-switch-input:checked + .custom-switch-label:before {
        transform: translateX(21px);
    }

    .custom-switch-input:disabled + .custom-switch-label {
        opacity: 0.6;
        cursor: not-allowed;
    }
</style>
@section('content')
    <main class="main-content">
        @include('layouts.header')
        <div class="content">
            <div style="width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;">
                <div style="display: flex; flex-wrap: wrap; margin-right: -15px; margin-left: -15px;">
                    <div style="flex: 0 0 100%; max-width: 100%;">
                        <h4 style="margin-bottom: 1.5rem;">Blog Comments</h4>
                    </div>
                    @forelse($comments as $comment)
                        <div style="flex: 0 0 33.333333%; max-width: 33.333333%; padding: 0 15px; margin-bottom: 1.5rem;" class="comment-card">
                            <div style="border: 1px solid rgba(0,0,0,.125); border-radius: 0.25rem; height: 100%;">
                                <div
                                    style="padding: 0.75rem 1.25rem; background-color: rgba(0,0,0,.03); border-bottom: 1px solid rgba(0,0,0,.125); display: flex; justify-content: space-between; align-items: center;">
                                    <h5 style="margin: 0;">{{ $comment->blog->title ?? 'N/A' }}</h5>
                                    <div style="display: flex; align-items: center;">

                                        <button
                                            style="padding: 0.25rem 0.5rem; font-size: 0.875rem; line-height: 1.5; border-radius: 0.2rem; color: #fff; background-color: #dc3545; border: 1px solid #dc3545;"
                                            class="delete-comment" data-id="{{ $comment->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                <div style="padding: 1.25rem;">
                                    <div style="margin-bottom: 0.5rem;">
                                        <strong>Name:</strong> {{ $comment->name }}
                                    </div>
                                    <div style="margin-bottom: 0.5rem;">
                                        <strong>Email:</strong> {{ $comment->email }}
                                    </div>
                                    <div style="margin-bottom: 0.5rem;">
                                        <strong>Comment:</strong>
                                        <p style="margin: 0;">{{ Str::limit($comment->comment, 100) }}</p>
                                    </div>
                                    <div style="color: #6c757d; margin-top: 0.5rem;">
                                        <small>{{ $comment->created_at->format('d M, Y') }}</small>
                                    </div>

                                    <!-- Replies Section -->
                                    @if($comment->replies->count() > 0)
                                        <div style="margin-top: 1rem; padding-top: 1rem; border-top: 1px solid #dee2e6;">
                                            <h6 style="margin-bottom: 0.5rem;">Replies ({{ $comment->replies->count() }})</h6>
                                            @foreach($comment->replies as $reply)
                                                <div style="margin-left: 1rem; padding: 0.5rem; background-color: #f8f9fa; border-radius: 0.25rem; margin-bottom: 0.5rem;">
                                                    <div style="margin-bottom: 0.25rem;">
                                                        <strong>{{ $reply->name }}</strong>
                                                        <small style="color: #6c757d; margin-left: 0.5rem;">{{ $reply->created_at->format('d M, Y') }}</small>
                                                    </div>
                                                    <p style="margin: 0;">{{ $reply->message }}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div style="flex: 0 0 100%; max-width: 100%;">
                            <div
                                style="padding: 0.75rem 1.25rem; margin-bottom: 1rem; border: 1px solid transparent; border-radius: 0.25rem; color: #0c5460; background-color: #d1ecf1; border-color: #bee5eb;">
                                No comments found
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            document.querySelectorAll('.delete-comment').forEach(button => {
                button.addEventListener('click', async function () {
                    const commentId = this.dataset.id;
                    const commentCard = this.closest('.comment-card');

                    if (confirm('Are you sure you want to delete this comment?')) {
                        this.disabled = true;

                        try {
                            const response = await fetch(`/admin/comments/${commentId}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': token,
                                    'Accept': 'application/json'
                                }
                            });

                            if (response.ok) {
                                commentCard.style.opacity = '0';
                                setTimeout(() => {
                                    commentCard.remove();
                                    if (document.querySelectorAll('.comment-card').length === 0) {
                                        location.reload();
                                    }
                                }, 400);
                                alert('Comment deleted successfully');
                            } else {
                                alert('Error deleting comment');
                            }
                        } catch (error) {
                            console.error('Error:', error);
                            alert('Error deleting comment');
                        } finally {
                            this.disabled = false;
                        }
                    }
                });
            });
        });
    </script>

@endsection
