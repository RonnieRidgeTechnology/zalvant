@extends('layouts.admin')

<style>
    .formContainer {
        background-color: white;
        padding: 1rem;
        width: 94%;
        margin: 34px auto;
        border-radius: 20px;
    }

    .formtabsss {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .action-button {
        position: relative;
        padding: 0.75rem 1.75rem;
        font-size: 0.875rem;
        font-weight: 600;
        border: none;
        background: #3b82f6;
        color: white;
        border-radius: 8px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 0.625rem;
        transition: all 0.3s ease;
        box-shadow: 0 2px 4px rgba(59, 130, 246, 0.1);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-top: 20px;
    }

    /* Tab System */
    .language-tabs {
        display: flex;
        gap: 10px;
        border-bottom: 2px solid #e5e7eb;
        margin-bottom: 30px;
    }

    .tab-button {
        padding: 12px 24px;
        background: none;
        border: none;
        cursor: pointer;
        font-size: 14px;
        font-weight: 600;
        color: #6b7280;
        border-bottom: 2px solid transparent;
        margin-bottom: -2px;
        transition: all 0.3s ease;
    }

    .tab-button:hover {
        color: #3b82f6;
    }

    .tab-button.active {
        color: #3b82f6;
        border-bottom-color: #3b82f6;
    }

    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
    }

    .form-section-title {
        font-size: 18px;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 1px solid #e5e7eb;
    }
</style>

@section('content')
<main class="main-content">
    @include('layouts.header')
    <div class="formContainer">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('blog-update.update') }}" method="POST">
            @csrf

            <h2 class="form-section-title">Blog Page Content</h2>

            <!-- Language Tabs -->
            <div class="language-tabs">
                <button type="button" class="tab-button active" onclick="switchTab(event, 'dutch')">
                    🇳🇱 Dutch (Default)
                </button>
                <button type="button" class="tab-button" onclick="switchTab(event, 'english')">
                    🇬🇧 English
                </button>
                <button type="button" class="tab-button" onclick="switchTab(event, 'french')">
                    🇫🇷 French
                </button>
                <button type="button" class="tab-button" onclick="switchTab(event, 'german')">
                    🇩🇪 German
                </button>
            </div>

            <!-- Dutch Tab -->
            <div id="dutch" class="tab-content active">
                <div class="formtabsss">
                    <div class="form-group">
                        <label class="form-label">Main Title</label>
                        <input class="form-control" type="text" name="main_title" value="{{ old('main_title', $blogUpdate->main_title ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Meta Title</label>
                        <input class="form-control" type="text" name="meta_title" value="{{ old('meta_title', $blogUpdate->meta_title ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Main Description</label>
                        <textarea class="form-control" name="main_desc" rows="3">{{ old('main_desc', $blogUpdate->main_desc ?? '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Meta Description</label>
                        <textarea class="form-control" name="meta_desc" rows="3">{{ old('meta_desc', $blogUpdate->meta_desc ?? '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Meta Keywords</label>
                        <input class="form-control" type="text" name="meta_keywords" value="{{ old('meta_keywords', $blogUpdate->meta_keywords ?? '') }}">
                    </div>
                </div>
            </div>

            <!-- English Tab -->
            <div id="english" class="tab-content">
                <div class="formtabsss">
                    <div class="form-group">
                        <label class="form-label">Main Title (English)</label>
                        <input class="form-control" type="text" name="main_title_en" value="{{ old('main_title_en', $blogUpdate->main_title_en ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Meta Title (English)</label>
                        <input class="form-control" type="text" name="meta_title_en" value="{{ old('meta_title_en', $blogUpdate->meta_title_en ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Main Description (English)</label>
                        <textarea class="form-control" name="main_desc_en" rows="3">{{ old('main_desc_en', $blogUpdate->main_desc_en ?? '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Meta Description (English)</label>
                        <textarea class="form-control" name="meta_desc_en" rows="3">{{ old('meta_desc_en', $blogUpdate->meta_desc_en ?? '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Meta Keywords (English)</label>
                        <input class="form-control" type="text" name="meta_keywords_en" value="{{ old('meta_keywords_en', $blogUpdate->meta_keywords_en ?? '') }}">
                    </div>
                </div>
            </div>

            <!-- French Tab -->
            <div id="french" class="tab-content">
                <div class="formtabsss">
                    <div class="form-group">
                        <label class="form-label">Main Title (French)</label>
                        <input class="form-control" type="text" name="main_title_fr" value="{{ old('main_title_fr', $blogUpdate->main_title_fr ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Meta Title (French)</label>
                        <input class="form-control" type="text" name="meta_title_fr" value="{{ old('meta_title_fr', $blogUpdate->meta_title_fr ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Main Description (French)</label>
                        <textarea class="form-control" name="main_desc_fr" rows="3">{{ old('main_desc_fr', $blogUpdate->main_desc_fr ?? '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Meta Description (French)</label>
                        <textarea class="form-control" name="meta_desc_fr" rows="3">{{ old('meta_desc_fr', $blogUpdate->meta_desc_fr ?? '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Meta Keywords (French)</label>
                        <input class="form-control" type="text" name="meta_keywords_fr" value="{{ old('meta_keywords_fr', $blogUpdate->meta_keywords_fr ?? '') }}">
                    </div>
                </div>
            </div>

            <!-- German Tab -->
            <div id="german" class="tab-content">
                <div class="formtabsss">
                    <div class="form-group">
                        <label class="form-label">Main Title (German)</label>
                        <input class="form-control" type="text" name="main_title_de" value="{{ old('main_title_de', $blogUpdate->main_title_de ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Meta Title (German)</label>
                        <input class="form-control" type="text" name="meta_title_de" value="{{ old('meta_title_de', $blogUpdate->meta_title_de ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Main Description (German)</label>
                        <textarea class="form-control" name="main_desc_de" rows="3">{{ old('main_desc_de', $blogUpdate->main_desc_de ?? '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Meta Description (German)</label>
                        <textarea class="form-control" name="meta_desc_de" rows="3">{{ old('meta_desc_de', $blogUpdate->meta_desc_de ?? '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Meta Keywords (German)</label>
                        <input class="form-control" type="text" name="meta_keywords_de" value="{{ old('meta_keywords_de', $blogUpdate->meta_keywords_de ?? '') }}">
                    </div>
                </div>
            </div>

            <button type="submit" class="action-button">Save Blog Update</button>
        </form>
    </div>
</main>

<script>
function switchTab(event, tabId) {
    // Hide all tab contents
    const tabContents = document.querySelectorAll('.tab-content');
    tabContents.forEach(content => {
        content.classList.remove('active');
    });

    // Remove active class from all buttons
    const tabButtons = document.querySelectorAll('.tab-button');
    tabButtons.forEach(button => {
        button.classList.remove('active');
    });

    // Show selected tab content
    document.getElementById(tabId).classList.add('active');

    // Add active class to clicked button
    event.target.classList.add('active');
}
</script>
@endsection