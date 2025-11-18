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
        <h2 class="section-header">About Us Settings</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('about-us.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <!-- Numbers Section (No translation needed) -->
            <div class="formtabsss">
                <div class="form-group">
                    <label class="form-label">Satisfied Clients</label>
                    <input class="form-control" type="number" name="satisfied_clients" value="{{ old('satisfied_clients', $aboutUpdate->satisfied_clients ?? '') }}">
                </div>

                <div class="form-group">
                    <label class="form-label">Finished Projects</label>
                    <input class="form-control" type="number" name="finished_projects" value="{{ old('finished_projects', $aboutUpdate->finished_projects ?? '') }}">
                </div>

                <div class="form-group">
                    <label class="form-label">Years of Experience</label>
                    <input class="form-control" type="number" name="years_of_experience" value="{{ old('years_of_experience', $aboutUpdate->years_of_experience ?? '') }}">
                </div>

                <div class="form-group">
                    <label class="form-label">Skilled Experts</label>
                    <input class="form-control" type="number" name="skilled_experts" value="{{ old('skilled_experts', $aboutUpdate->skilled_experts ?? '') }}">
                </div>
            </div>

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
                            <input class="form-control" type="text" name="meta_title" value="{{ old('meta_title', $aboutUpdate->meta_title ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Keywords (Nederlands)</label>
                            <input class="form-control" type="text" name="meta_keywords" value="{{ old('meta_keywords', $aboutUpdate->meta_keywords ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Description (Nederlands)</label>
                            <textarea class="form-control" name="meta_desc">{{ old('meta_desc', $aboutUpdate->meta_desc ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Main Title (Nederlands)</label>
                            <input class="form-control" type="text" name="main_title" value="{{ old('main_title', $aboutUpdate->main_title ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Main Description (Nederlands)</label>
                            <textarea class="form-control" name="main_desc">{{ old('main_desc', $aboutUpdate->main_desc ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Journey Title (Nederlands)</label>
                            <input class="form-control" type="text" name="journey_title" value="{{ old('journey_title', $aboutUpdate->journey_title ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Journey Description (Nederlands)</label>
                            <textarea class="form-control" name="journey_desc">{{ old('journey_desc', $aboutUpdate->journey_desc ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Core Values Title (Nederlands)</label>
                            <input class="form-control" type="text" name="core_values_title" value="{{ old('core_values_title', $aboutUpdate->core_values_title ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Core Values Description (Nederlands)</label>
                    <textarea class="form-control" name="core_values_desc">{{ old('core_values_desc', $aboutUpdate->core_values_desc ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Why Choose Us Title (Nederlands)</label>
                            <input class="form-control" type="text" name="why_choose_us_title" value="{{ old('why_choose_us_title', $aboutUpdate->why_choose_us_title ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Why Choose Us Description (Nederlands)</label>
                            <textarea class="form-control" name="why_choose_us_desc">{{ old('why_choose_us_desc', $aboutUpdate->why_choose_us_desc ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- English Content -->
                <div class="tab-content" data-lang="en">
                    <div class="formtabsss">
                        <div class="form-group">
                            <label class="form-label">Meta Title (English)</label>
                            <input class="form-control" type="text" name="meta_title_en" value="{{ old('meta_title_en', $aboutUpdate->meta_title_en ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Keywords (English)</label>
                            <input class="form-control" type="text" name="meta_keywords_en" value="{{ old('meta_keywords_en', $aboutUpdate->meta_keywords_en ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Description (English)</label>
                            <textarea class="form-control" name="meta_desc_en">{{ old('meta_desc_en', $aboutUpdate->meta_desc_en ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Main Title (English)</label>
                            <input class="form-control" type="text" name="main_title_en" value="{{ old('main_title_en', $aboutUpdate->main_title_en ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Main Description (English)</label>
                            <textarea class="form-control" name="main_desc_en">{{ old('main_desc_en', $aboutUpdate->main_desc_en ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Journey Title (English)</label>
                            <input class="form-control" type="text" name="journey_title_en" value="{{ old('journey_title_en', $aboutUpdate->journey_title_en ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Journey Description (English)</label>
                            <textarea class="form-control" name="journey_desc_en">{{ old('journey_desc_en', $aboutUpdate->journey_desc_en ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Core Values Title (English)</label>
                            <input class="form-control" type="text" name="core_values_title_en" value="{{ old('core_values_title_en', $aboutUpdate->core_values_title_en ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Core Values Description (English)</label>
                            <textarea class="form-control" name="core_values_desc_en">{{ old('core_values_desc_en', $aboutUpdate->core_values_desc_en ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Why Choose Us Title (English)</label>
                            <input class="form-control" type="text" name="why_choose_us_title_en" value="{{ old('why_choose_us_title_en', $aboutUpdate->why_choose_us_title_en ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Why Choose Us Description (English)</label>
                            <textarea class="form-control" name="why_choose_us_desc_en">{{ old('why_choose_us_desc_en', $aboutUpdate->why_choose_us_desc_en ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- French Content -->
                <div class="tab-content" data-lang="fr">
                    <div class="formtabsss">
                        <div class="form-group">
                            <label class="form-label">Meta Title (Français)</label>
                            <input class="form-control" type="text" name="meta_title_fr" value="{{ old('meta_title_fr', $aboutUpdate->meta_title_fr ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Keywords (Français)</label>
                            <input class="form-control" type="text" name="meta_keywords_fr" value="{{ old('meta_keywords_fr', $aboutUpdate->meta_keywords_fr ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Description (Français)</label>
                            <textarea class="form-control" name="meta_desc_fr">{{ old('meta_desc_fr', $aboutUpdate->meta_desc_fr ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Main Title (Français)</label>
                            <input class="form-control" type="text" name="main_title_fr" value="{{ old('main_title_fr', $aboutUpdate->main_title_fr ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Main Description (Français)</label>
                            <textarea class="form-control" name="main_desc_fr">{{ old('main_desc_fr', $aboutUpdate->main_desc_fr ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Journey Title (Français)</label>
                            <input class="form-control" type="text" name="journey_title_fr" value="{{ old('journey_title_fr', $aboutUpdate->journey_title_fr ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Journey Description (Français)</label>
                            <textarea class="form-control" name="journey_desc_fr">{{ old('journey_desc_fr', $aboutUpdate->journey_desc_fr ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Core Values Title (Français)</label>
                            <input class="form-control" type="text" name="core_values_title_fr" value="{{ old('core_values_title_fr', $aboutUpdate->core_values_title_fr ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Core Values Description (Français)</label>
                            <textarea class="form-control" name="core_values_desc_fr">{{ old('core_values_desc_fr', $aboutUpdate->core_values_desc_fr ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Why Choose Us Title (Français)</label>
                            <input class="form-control" type="text" name="why_choose_us_title_fr" value="{{ old('why_choose_us_title_fr', $aboutUpdate->why_choose_us_title_fr ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Why Choose Us Description (Français)</label>
                            <textarea class="form-control" name="why_choose_us_desc_fr">{{ old('why_choose_us_desc_fr', $aboutUpdate->why_choose_us_desc_fr ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- German Content -->
                <div class="tab-content" data-lang="de">
                    <div class="formtabsss">
                        <div class="form-group">
                            <label class="form-label">Meta Title (Deutsch)</label>
                            <input class="form-control" type="text" name="meta_title_de" value="{{ old('meta_title_de', $aboutUpdate->meta_title_de ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Keywords (Deutsch)</label>
                            <input class="form-control" type="text" name="meta_keywords_de" value="{{ old('meta_keywords_de', $aboutUpdate->meta_keywords_de ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Description (Deutsch)</label>
                            <textarea class="form-control" name="meta_desc_de">{{ old('meta_desc_de', $aboutUpdate->meta_desc_de ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Main Title (Deutsch)</label>
                            <input class="form-control" type="text" name="main_title_de" value="{{ old('main_title_de', $aboutUpdate->main_title_de ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Main Description (Deutsch)</label>
                            <textarea class="form-control" name="main_desc_de">{{ old('main_desc_de', $aboutUpdate->main_desc_de ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Journey Title (Deutsch)</label>
                            <input class="form-control" type="text" name="journey_title_de" value="{{ old('journey_title_de', $aboutUpdate->journey_title_de ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Journey Description (Deutsch)</label>
                            <textarea class="form-control" name="journey_desc_de">{{ old('journey_desc_de', $aboutUpdate->journey_desc_de ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Core Values Title (Deutsch)</label>
                            <input class="form-control" type="text" name="core_values_title_de" value="{{ old('core_values_title_de', $aboutUpdate->core_values_title_de ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Core Values Description (Deutsch)</label>
                            <textarea class="form-control" name="core_values_desc_de">{{ old('core_values_desc_de', $aboutUpdate->core_values_desc_de ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Why Choose Us Title (Deutsch)</label>
                            <input class="form-control" type="text" name="why_choose_us_title_de" value="{{ old('why_choose_us_title_de', $aboutUpdate->why_choose_us_title_de ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Why Choose Us Description (Deutsch)</label>
                            <textarea class="form-control" name="why_choose_us_desc_de">{{ old('why_choose_us_desc_de', $aboutUpdate->why_choose_us_desc_de ?? '') }}</textarea>
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
