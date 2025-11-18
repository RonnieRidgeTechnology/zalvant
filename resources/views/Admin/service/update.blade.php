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
        <h2 class="section-header">Service Page Settings</h2>

        <form action="{{ route('service-update.update') }}" method="POST">
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
                            <label class="form-label">Meta Title (Nederlands)</label>
                            <input class="form-control" type="text" name="meta_title" value="{{ old('meta_title', $serviceUpdate->meta_title ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Description (Nederlands)</label>
                            <input class="form-control" type="text" name="meta_desc" value="{{ old('meta_desc', $serviceUpdate->meta_desc ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Keywords (Nederlands)</label>
                            <input class="form-control" type="text" name="meta_keyword" value="{{ old('meta_keyword', $serviceUpdate->meta_keyword ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Main Title (Nederlands)</label>
                            <input class="form-control" type="text" name="main_title" value="{{ old('main_title', $serviceUpdate->main_title ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Main Description (Nederlands)</label>
                    <textarea class="form-control" name="main_desc">{{ old('main_desc', $serviceUpdate->main_desc ?? '') }}</textarea>
                </div>
                        <div class="form-group">
                            <label class="form-label">Offer Title (Nederlands)</label>
                    <input class="form-control" type="text" name="offer_title" value="{{ old('offer_title', $serviceUpdate->offer_title ?? '') }}">
                </div>
                        <div class="form-group">
                            <label class="form-label">Offer Description (Nederlands)</label>
                    <textarea class="form-control" name="offer_desc">{{ old('offer_desc', $serviceUpdate->offer_desc ?? '') }}</textarea>
                </div>
                        <div class="form-group">
                            <label class="form-label">Technology Title (Nederlands)</label>
                    <input class="form-control" type="text" name="technology_title" value="{{ old('technology_title', $serviceUpdate->technology_title ?? '') }}">
                </div>
                        <div class="form-group">
                            <label class="form-label">Technology Description (Nederlands)</label>
                    <textarea class="form-control" name="technology_desc">{{ old('technology_desc', $serviceUpdate->technology_desc ?? '') }}</textarea>
                </div>
                        <div class="form-group">
                            <label class="form-label">Deal AI Title (Nederlands)</label>
                    <input class="form-control" type="text" name="deal_ai_title" value="{{ old('deal_ai_title', $serviceUpdate->deal_ai_title ?? '') }}">
                </div>
                        <div class="form-group">
                            <label class="form-label">Deal AI Description (Nederlands)</label>
                    <textarea class="form-control" name="deal_ai_desc">{{ old('deal_ai_desc', $serviceUpdate->deal_ai_desc ?? '') }}</textarea>
                </div>
                        <div class="form-group">
                            <label class="form-label">Any Question Title (Nederlands)</label>
                    <input class="form-control" type="text" name="any_question_title" value="{{ old('any_question_title', $serviceUpdate->any_question_title ?? '') }}">
                </div>
                        <div class="form-group">
                            <label class="form-label">Any Question Description (Nederlands)</label>
                    <textarea class="form-control" name="any_question_desc">{{ old('any_question_desc', $serviceUpdate->any_question_desc ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- English Content -->
                <div class="tab-content" data-lang="en">
                    <div class="formtabsss">
                        <div class="form-group">
                            <label class="form-label">Meta Title (English)</label>
                            <input class="form-control" type="text" name="meta_title_en" value="{{ old('meta_title_en', $serviceUpdate->meta_title_en ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Description (English)</label>
                            <input class="form-control" type="text" name="meta_desc_en" value="{{ old('meta_desc_en', $serviceUpdate->meta_desc_en ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Keywords (English)</label>
                            <input class="form-control" type="text" name="meta_keyword_en" value="{{ old('meta_keyword_en', $serviceUpdate->meta_keyword_en ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Main Title (English)</label>
                            <input class="form-control" type="text" name="main_title_en" value="{{ old('main_title_en', $serviceUpdate->main_title_en ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Main Description (English)</label>
                            <textarea class="form-control" name="main_desc_en">{{ old('main_desc_en', $serviceUpdate->main_desc_en ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Offer Title (English)</label>
                            <input class="form-control" type="text" name="offer_title_en" value="{{ old('offer_title_en', $serviceUpdate->offer_title_en ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Offer Description (English)</label>
                            <textarea class="form-control" name="offer_desc_en">{{ old('offer_desc_en', $serviceUpdate->offer_desc_en ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Technology Title (English)</label>
                            <input class="form-control" type="text" name="technology_title_en" value="{{ old('technology_title_en', $serviceUpdate->technology_title_en ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Technology Description (English)</label>
                            <textarea class="form-control" name="technology_desc_en">{{ old('technology_desc_en', $serviceUpdate->technology_desc_en ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Deal AI Title (English)</label>
                            <input class="form-control" type="text" name="deal_ai_title_en" value="{{ old('deal_ai_title_en', $serviceUpdate->deal_ai_title_en ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Deal AI Description (English)</label>
                            <textarea class="form-control" name="deal_ai_desc_en">{{ old('deal_ai_desc_en', $serviceUpdate->deal_ai_desc_en ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Any Question Title (English)</label>
                            <input class="form-control" type="text" name="any_question_title_en" value="{{ old('any_question_title_en', $serviceUpdate->any_question_title_en ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Any Question Description (English)</label>
                            <textarea class="form-control" name="any_question_desc_en">{{ old('any_question_desc_en', $serviceUpdate->any_question_desc_en ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- French Content -->
                <div class="tab-content" data-lang="fr">
                    <div class="formtabsss">
                        <div class="form-group">
                            <label class="form-label">Meta Title (Français)</label>
                            <input class="form-control" type="text" name="meta_title_fr" value="{{ old('meta_title_fr', $serviceUpdate->meta_title_fr ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Description (Français)</label>
                            <input class="form-control" type="text" name="meta_desc_fr" value="{{ old('meta_desc_fr', $serviceUpdate->meta_desc_fr ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Keywords (Français)</label>
                            <input class="form-control" type="text" name="meta_keyword_fr" value="{{ old('meta_keyword_fr', $serviceUpdate->meta_keyword_fr ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Main Title (Français)</label>
                            <input class="form-control" type="text" name="main_title_fr" value="{{ old('main_title_fr', $serviceUpdate->main_title_fr ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Main Description (Français)</label>
                            <textarea class="form-control" name="main_desc_fr">{{ old('main_desc_fr', $serviceUpdate->main_desc_fr ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Offer Title (Français)</label>
                            <input class="form-control" type="text" name="offer_title_fr" value="{{ old('offer_title_fr', $serviceUpdate->offer_title_fr ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Offer Description (Français)</label>
                            <textarea class="form-control" name="offer_desc_fr">{{ old('offer_desc_fr', $serviceUpdate->offer_desc_fr ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Technology Title (Français)</label>
                            <input class="form-control" type="text" name="technology_title_fr" value="{{ old('technology_title_fr', $serviceUpdate->technology_title_fr ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Technology Description (Français)</label>
                            <textarea class="form-control" name="technology_desc_fr">{{ old('technology_desc_fr', $serviceUpdate->technology_desc_fr ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Deal AI Title (Français)</label>
                            <input class="form-control" type="text" name="deal_ai_title_fr" value="{{ old('deal_ai_title_fr', $serviceUpdate->deal_ai_title_fr ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Deal AI Description (Français)</label>
                            <textarea class="form-control" name="deal_ai_desc_fr">{{ old('deal_ai_desc_fr', $serviceUpdate->deal_ai_desc_fr ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Any Question Title (Français)</label>
                            <input class="form-control" type="text" name="any_question_title_fr" value="{{ old('any_question_title_fr', $serviceUpdate->any_question_title_fr ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Any Question Description (Français)</label>
                            <textarea class="form-control" name="any_question_desc_fr">{{ old('any_question_desc_fr', $serviceUpdate->any_question_desc_fr ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- German Content -->
                <div class="tab-content" data-lang="de">
                    <div class="formtabsss">
                        <div class="form-group">
                            <label class="form-label">Meta Title (Deutsch)</label>
                            <input class="form-control" type="text" name="meta_title_de" value="{{ old('meta_title_de', $serviceUpdate->meta_title_de ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Description (Deutsch)</label>
                            <input class="form-control" type="text" name="meta_desc_de" value="{{ old('meta_desc_de', $serviceUpdate->meta_desc_de ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Keywords (Deutsch)</label>
                            <input class="form-control" type="text" name="meta_keyword_de" value="{{ old('meta_keyword_de', $serviceUpdate->meta_keyword_de ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Main Title (Deutsch)</label>
                            <input class="form-control" type="text" name="main_title_de" value="{{ old('main_title_de', $serviceUpdate->main_title_de ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Main Description (Deutsch)</label>
                            <textarea class="form-control" name="main_desc_de">{{ old('main_desc_de', $serviceUpdate->main_desc_de ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Offer Title (Deutsch)</label>
                            <input class="form-control" type="text" name="offer_title_de" value="{{ old('offer_title_de', $serviceUpdate->offer_title_de ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Offer Description (Deutsch)</label>
                            <textarea class="form-control" name="offer_desc_de">{{ old('offer_desc_de', $serviceUpdate->offer_desc_de ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Technology Title (Deutsch)</label>
                            <input class="form-control" type="text" name="technology_title_de" value="{{ old('technology_title_de', $serviceUpdate->technology_title_de ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Technology Description (Deutsch)</label>
                            <textarea class="form-control" name="technology_desc_de">{{ old('technology_desc_de', $serviceUpdate->technology_desc_de ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Deal AI Title (Deutsch)</label>
                            <input class="form-control" type="text" name="deal_ai_title_de" value="{{ old('deal_ai_title_de', $serviceUpdate->deal_ai_title_de ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Deal AI Description (Deutsch)</label>
                            <textarea class="form-control" name="deal_ai_desc_de">{{ old('deal_ai_desc_de', $serviceUpdate->deal_ai_desc_de ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Any Question Title (Deutsch)</label>
                            <input class="form-control" type="text" name="any_question_title_de" value="{{ old('any_question_title_de', $serviceUpdate->any_question_title_de ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Any Question Description (Deutsch)</label>
                            <textarea class="form-control" name="any_question_desc_de">{{ old('any_question_desc_de', $serviceUpdate->any_question_desc_de ?? '') }}</textarea>
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
