@extends('layouts.admin')
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

    .formtabsss {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px 30px;
    }

    @media (max-width: 992px) {
        .formtabsss {
            grid-template-columns: 1fr;
        }
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

    /* Tab styles */
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

@section('content')
<main class="main-content">
    @include('layouts.header')
    <div class="formContainer">
        <h2 class="section-header">Contact Page Settings</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('contact-update.update') }}" method="POST">
            @csrf

            <!-- Multilingual Content Section -->
            <div class="multilingual-section">
                <h3 style="font-size: 1.25rem; font-weight: 600; color: #1f2937; margin-bottom: 15px;">Multilingual Content</h3>
                <p style="color: #6b7280; margin-bottom: 20px; font-size: 0.9rem;">Manage translations for all text content</p>

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
                    <div class="formtabsss">
                        <div class="form-group">
                            <label class="form-label">Page Title (Nederlands)</label>
                            <input class="form-control" type="text" name="name" value="{{ old('name', $contactUpdate->name ?? '') }}" placeholder="Contact Ons">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Page Description (Nederlands)</label>
                            <textarea class="form-control" name="desc" placeholder="Pagina beschrijving">{{ old('desc', $contactUpdate->desc ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Title (Nederlands)</label>
                            <input class="form-control" type="text" name="meta_title" value="{{ old('meta_title', $contactUpdate->meta_title ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Keywords (Nederlands)</label>
                            <input class="form-control" type="text" name="meta_keywords" value="{{ old('meta_keywords', $contactUpdate->meta_keywords ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Description (Nederlands)</label>
                            <textarea class="form-control" name="meta_description">{{ old('meta_description', $contactUpdate->meta_description ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- English Content -->
                <div class="tab-content" data-lang="en">
                    <div class="formtabsss">
                        <div class="form-group">
                            <label class="form-label">Page Title (English)</label>
                            <input class="form-control" type="text" name="name_en" value="{{ old('name_en', $contactUpdate->name_en ?? '') }}" placeholder="Contact Us">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Page Description (English)</label>
                            <textarea class="form-control" name="desc_en" placeholder="Page description">{{ old('desc_en', $contactUpdate->desc_en ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Title (English)</label>
                            <input class="form-control" type="text" name="meta_title_en" value="{{ old('meta_title_en', $contactUpdate->meta_title_en ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Keywords (English)</label>
                            <input class="form-control" type="text" name="meta_keywords_en" value="{{ old('meta_keywords_en', $contactUpdate->meta_keywords_en ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Description (English)</label>
                            <textarea class="form-control" name="meta_description_en">{{ old('meta_description_en', $contactUpdate->meta_description_en ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- French Content -->
                <div class="tab-content" data-lang="fr">
                    <div class="formtabsss">
                        <div class="form-group">
                            <label class="form-label">Page Title (Français)</label>
                            <input class="form-control" type="text" name="name_fr" value="{{ old('name_fr', $contactUpdate->name_fr ?? '') }}" placeholder="Contactez-nous">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Page Description (Français)</label>
                            <textarea class="form-control" name="desc_fr" placeholder="Description de la page">{{ old('desc_fr', $contactUpdate->desc_fr ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Title (Français)</label>
                            <input class="form-control" type="text" name="meta_title_fr" value="{{ old('meta_title_fr', $contactUpdate->meta_title_fr ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Keywords (Français)</label>
                            <input class="form-control" type="text" name="meta_keywords_fr" value="{{ old('meta_keywords_fr', $contactUpdate->meta_keywords_fr ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Description (Français)</label>
                            <textarea class="form-control" name="meta_description_fr">{{ old('meta_description_fr', $contactUpdate->meta_description_fr ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- German Content -->
                <div class="tab-content" data-lang="de">
                    <div class="formtabsss">
                        <div class="form-group">
                            <label class="form-label">Page Title (Deutsch)</label>
                            <input class="form-control" type="text" name="name_de" value="{{ old('name_de', $contactUpdate->name_de ?? '') }}" placeholder="Kontakt">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Page Description (Deutsch)</label>
                            <textarea class="form-control" name="desc_de" placeholder="Seitenbeschreibung">{{ old('desc_de', $contactUpdate->desc_de ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Title (Deutsch)</label>
                            <input class="form-control" type="text" name="meta_title_de" value="{{ old('meta_title_de', $contactUpdate->meta_title_de ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Keywords (Deutsch)</label>
                            <input class="form-control" type="text" name="meta_keywords_de" value="{{ old('meta_keywords_de', $contactUpdate->meta_keywords_de ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Description (Deutsch)</label>
                            <textarea class="form-control" name="meta_description_de">{{ old('meta_description_de', $contactUpdate->meta_description_de ?? '') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="action-button">Save</button>
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
