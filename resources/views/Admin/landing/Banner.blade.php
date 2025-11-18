@extends('layouts.admin')

@section('content')

<style>
    .formContainer {
        background-color: white;
        padding: 2rem;
        width: 94%;
        margin: 34px auto;
        border-radius: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        border: 1px solid #e5e7eb;
    }

    .section-header {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1e3a8a;
        margin-bottom: 2rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        font-weight: 600;
        color: #374151;
        margin-bottom: 5px;
        display: block;
    }

    .form-control {
        border-radius: 8px;
        border: 1px solid #d1d5db;
        padding: 0.6rem 0.8rem;
        transition: all 0.3s ease;
        font-size: 0.95rem;
        width: 100%;
    }

    .form-control:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        outline: none;
    }

    textarea.form-control {
        min-height: 100px;
        resize: vertical;
    }

    .action-button {
        margin-top: 2rem;
        padding: 0.9rem 2rem;
        font-size: 0.95rem;
        font-weight: 600;
        border: none;
        background: linear-gradient(90deg, #2563eb, #3b82f6);
        color: white;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 3px 6px rgba(59, 130, 246, 0.3);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .action-button:hover {
        background: linear-gradient(90deg, #1d4ed8, #2563eb);
        transform: translateY(-2px);
    }

    /* Tab styles - Same as Service Update */
    .language-tabs {
        display: flex;
        gap: 5px;
        margin-bottom: 20px;
        border-bottom: 2px solid #e5e7eb;
        flex-wrap: wrap;
    }

    .lang-tab {
        padding: 12px 24px;
        border: none;
        background: none;
        cursor: pointer;
        font-weight: 600;
        color: #6b7280;
        border-bottom: 3px solid transparent;
        transition: all 0.3s;
    }

    .lang-tab:hover {
        background: rgba(59, 130, 246, 0.05);
    }

    .lang-tab.active {
        color: #2563eb;
        border-bottom: 3px solid #2563eb;
        background: rgba(37, 99, 235, 0.05);
    }

    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
    }

    .multilingual-section {
        background: #f9fafb;
        padding: 20px;
        border-radius: 8px;
        margin-top: 30px;
    }
</style>

<main class="main-content">
    @include('layouts.header')

    <div class="formContainer">
        <h2 class="section-header">Banner Content Section</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.banner.save') }}" method="POST">
            @csrf

            <!-- Multilingual Content Section -->
            <div class="multilingual-section">
                <h3 style="font-size: 1.25rem; font-weight: 600; color: #1f2937; margin-bottom: 15px;">Multilingual Content</h3>
                <p style="color: #6b7280; margin-bottom: 20px; font-size: 0.9rem;">Manage translations for banner content</p>

                <!-- Tab Navigation -->
                <div class="language-tabs">
                    <button type="button" class="lang-tab active" data-lang="nl">
                        🇳🇱 Nederlands (Dutch)
                    </button>
                    <button type="button" class="lang-tab" data-lang="en">
                        🇬🇧 English
                    </button>
                    <button type="button" class="lang-tab" data-lang="fr">
                        🇫🇷 Français (French)
                    </button>
                    <button type="button" class="lang-tab" data-lang="de">
                        🇩🇪 Deutsch (German)
                    </button>
                </div>

                <!-- Dutch Content -->
                <div class="tab-content active" data-lang="nl">
                    <div class="form-group">
                        <label class="form-label">Banner Head Title (Nederlands)</label>
                        <input type="text" class="form-control" name="banner_head_title" value="{{ $banner->banner_head_title ?? '' }}" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Banner Head Paragraph (Nederlands)</label>
                        <textarea class="form-control" name="banner_head_para" rows="4" required>{{ $banner->banner_head_para ?? '' }}</textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Banner Footer Title (Nederlands)</label>
                        <input type="text" class="form-control" name="banner_footer_title" value="{{ $banner->banner_footer_title ?? '' }}" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Banner Footer Paragraph (Nederlands)</label>
                        <textarea class="form-control" name="banner_footer_para" rows="3" required>{{ $banner->banner_footer_para ?? '' }}</textarea>
                    </div>
                </div>

                <!-- English Content -->
                <div class="tab-content" data-lang="en">
                    <div class="form-group">
                        <label class="form-label">Banner Head Title (English)</label>
                        <input type="text" class="form-control" name="banner_head_title_en" value="{{ $banner->banner_head_title_en ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Banner Head Paragraph (English)</label>
                        <textarea class="form-control" name="banner_head_para_en" rows="4">{{ $banner->banner_head_para_en ?? '' }}</textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Banner Footer Title (English)</label>
                        <input type="text" class="form-control" name="banner_footer_title_en" value="{{ $banner->banner_footer_title_en ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Banner Footer Paragraph (English)</label>
                        <textarea class="form-control" name="banner_footer_para_en" rows="3">{{ $banner->banner_footer_para_en ?? '' }}</textarea>
                    </div>
                </div>

                <!-- French Content -->
                <div class="tab-content" data-lang="fr">
                    <div class="form-group">
                        <label class="form-label">Banner Head Title (Français)</label>
                        <input type="text" class="form-control" name="banner_head_title_fr" value="{{ $banner->banner_head_title_fr ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Banner Head Paragraph (Français)</label>
                        <textarea class="form-control" name="banner_head_para_fr" rows="4">{{ $banner->banner_head_para_fr ?? '' }}</textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Banner Footer Title (Français)</label>
                        <input type="text" class="form-control" name="banner_footer_title_fr" value="{{ $banner->banner_footer_title_fr ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Banner Footer Paragraph (Français)</label>
                        <textarea class="form-control" name="banner_footer_para_fr" rows="3">{{ $banner->banner_footer_para_fr ?? '' }}</textarea>
                    </div>
                </div>

                <!-- German Content -->
                <div class="tab-content" data-lang="de">
                    <div class="form-group">
                        <label class="form-label">Banner Head Title (Deutsch)</label>
                        <input type="text" class="form-control" name="banner_head_title_de" value="{{ $banner->banner_head_title_de ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Banner Head Paragraph (Deutsch)</label>
                        <textarea class="form-control" name="banner_head_para_de" rows="4">{{ $banner->banner_head_para_de ?? '' }}</textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Banner Footer Title (Deutsch)</label>
                        <input type="text" class="form-control" name="banner_footer_title_de" value="{{ $banner->banner_footer_title_de ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Banner Footer Paragraph (Deutsch)</label>
                        <textarea class="form-control" name="banner_footer_para_de" rows="3">{{ $banner->banner_footer_para_de ?? '' }}</textarea>
                    </div>
                </div>
            </div>

            <button class="action-button" type="submit">Save Changes</button>
        </form>

    </div>
</main>

<script>
    // Tab switching functionality
    document.addEventListener('DOMContentLoaded', function() {
        const langTabs = document.querySelectorAll('.lang-tab');
        const tabContents = document.querySelectorAll('.tab-content');

        langTabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const targetLang = this.getAttribute('data-lang');

                // Remove active class from all tabs
                langTabs.forEach(t => {
                    t.classList.remove('active');
                });

                // Add active class to clicked tab
                this.classList.add('active');

                // Hide all tab contents
                tabContents.forEach(content => {
                    content.classList.remove('active');
                });

                // Show target tab content
                const targetContent = document.querySelector(`.tab-content[data-lang="${targetLang}"]`);
                if (targetContent) {
                    targetContent.classList.add('active');
                }
            });
        });
    });
</script>

@endsection
