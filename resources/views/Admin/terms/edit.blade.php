@extends('layouts.admin')

<style>
    /* Language Tabs */
    .language-tabs {
        display: flex;
        gap: 10px;
        border-bottom: 2px solid #e5e7eb;
        margin-bottom: 20px;
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

    .formtabsss {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 10px 50px;
    }

    .formtabsss1 {
        width: 100%;
    }

    .formtabsss1.full-width {
        grid-column: 1 / -1;
    }
</style>

@section('content')
    <main class="main-content">
        @include('layouts.header')

        <div class="formContainer"
            style="background-color: white; padding: 1rem; width: 94%; margin: 34px auto; border-radius: 20px;">
            <form action="{{ route('terms-and-conditions.updateOrCreate') }}" method="POST">
                @csrf

                <!-- Language Tabs -->
                <div class="language-tabs">
                    <button type="button" class="tab-button active" onclick="switchTermsTab(event, 'terms-dutch')">
                        🇳🇱 Dutch (Default)
                    </button>
                    <button type="button" class="tab-button" onclick="switchTermsTab(event, 'terms-english')">
                        🇬🇧 English
                    </button>
                    <button type="button" class="tab-button" onclick="switchTermsTab(event, 'terms-french')">
                        🇫🇷 French
                    </button>
                    <button type="button" class="tab-button" onclick="switchTermsTab(event, 'terms-german')">
                        🇩🇪 German
                    </button>
                </div>

                <!-- Dutch Tab -->
                <div id="terms-dutch" class="tab-content active">
                    <div class="formtabsss">
                        <div class="form-group formtabsss1 full-width">
                            <label class="form-label">Title (Dutch)</label>
                            <input class="form-control" type="text" name="title"
                                value="{{ old('title', $termsAndCondition->title ?? '') }}">
                        </div>

                        <div class="form-group formtabsss1">
                            <label class="form-label">Meta Title (Dutch)</label>
                            <input class="form-control" type="text" name="meta_title"
                                value="{{ old('meta_title', $termsAndCondition->meta_title ?? '') }}">
                        </div>

                        <div class="form-group formtabsss1">
                            <label class="form-label">Meta Keywords (Dutch)</label>
                            <input class="form-control" type="text" name="meta_keywords"
                                value="{{ old('meta_keywords', $termsAndCondition->meta_keywords ?? '') }}">
                        </div>

                        <div class="form-group formtabsss1 full-width">
                            <label class="form-label">Meta Description (Dutch)</label>
                            <textarea class="form-control" name="meta_description"
                                rows="4">{{ old('meta_description', $termsAndCondition->meta_description ?? '') }}</textarea>
                        </div>

                        <div class="form-group formtabsss1 full-width">
                            <label class="form-label">Description (Dutch)</label>
                            <textarea class="form-control" id="description" name="description"
                                rows="10">{{ old('description', $termsAndCondition->description ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- English Tab -->
                <div id="terms-english" class="tab-content">
                    <div class="formtabsss">
                        <div class="form-group formtabsss1 full-width">
                            <label class="form-label">Title (English)</label>
                            <input class="form-control" type="text" name="title_en"
                                value="{{ old('title_en', $termsAndCondition->title_en ?? '') }}">
                        </div>

                        <div class="form-group formtabsss1">
                            <label class="form-label">Meta Title (English)</label>
                            <input class="form-control" type="text" name="meta_title_en"
                                value="{{ old('meta_title_en', $termsAndCondition->meta_title_en ?? '') }}">
                        </div>

                        <div class="form-group formtabsss1">
                            <label class="form-label">Meta Keywords (English)</label>
                            <input class="form-control" type="text" name="meta_keywords_en"
                                value="{{ old('meta_keywords_en', $termsAndCondition->meta_keywords_en ?? '') }}">
                        </div>

                        <div class="form-group formtabsss1 full-width">
                            <label class="form-label">Meta Description (English)</label>
                            <textarea class="form-control" name="meta_description_en"
                                rows="4">{{ old('meta_description_en', $termsAndCondition->meta_description_en ?? '') }}</textarea>
                        </div>

                        <div class="form-group formtabsss1 full-width">
                            <label class="form-label">Description (English)</label>
                            <textarea class="form-control" id="description_en" name="description_en"
                                rows="10">{{ old('description_en', $termsAndCondition->description_en ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- French Tab -->
                <div id="terms-french" class="tab-content">
                    <div class="formtabsss">
                        <div class="form-group formtabsss1 full-width">
                            <label class="form-label">Title (French)</label>
                            <input class="form-control" type="text" name="title_fr"
                                value="{{ old('title_fr', $termsAndCondition->title_fr ?? '') }}">
                        </div>

                        <div class="form-group formtabsss1">
                            <label class="form-label">Meta Title (French)</label>
                            <input class="form-control" type="text" name="meta_title_fr"
                                value="{{ old('meta_title_fr', $termsAndCondition->meta_title_fr ?? '') }}">
                        </div>

                        <div class="form-group formtabsss1">
                            <label class="form-label">Meta Keywords (French)</label>
                            <input class="form-control" type="text" name="meta_keywords_fr"
                                value="{{ old('meta_keywords_fr', $termsAndCondition->meta_keywords_fr ?? '') }}">
                        </div>

                        <div class="form-group formtabsss1 full-width">
                            <label class="form-label">Meta Description (French)</label>
                            <textarea class="form-control" name="meta_description_fr"
                                rows="4">{{ old('meta_description_fr', $termsAndCondition->meta_description_fr ?? '') }}</textarea>
                        </div>

                        <div class="form-group formtabsss1 full-width">
                            <label class="form-label">Description (French)</label>
                            <textarea class="form-control" id="description_fr" name="description_fr"
                                rows="10">{{ old('description_fr', $termsAndCondition->description_fr ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- German Tab -->
                <div id="terms-german" class="tab-content">
                    <div class="formtabsss">
                        <div class="form-group formtabsss1 full-width">
                            <label class="form-label">Title (German)</label>
                            <input class="form-control" type="text" name="title_de"
                                value="{{ old('title_de', $termsAndCondition->title_de ?? '') }}">
                        </div>

                        <div class="form-group formtabsss1">
                            <label class="form-label">Meta Title (German)</label>
                            <input class="form-control" type="text" name="meta_title_de"
                                value="{{ old('meta_title_de', $termsAndCondition->meta_title_de ?? '') }}">
                        </div>

                        <div class="form-group formtabsss1">
                            <label class="form-label">Meta Keywords (German)</label>
                            <input class="form-control" type="text" name="meta_keywords_de"
                                value="{{ old('meta_keywords_de', $termsAndCondition->meta_keywords_de ?? '') }}">
                        </div>

                        <div class="form-group formtabsss1 full-width">
                            <label class="form-label">Meta Description (German)</label>
                            <textarea class="form-control" name="meta_description_de"
                                rows="4">{{ old('meta_description_de', $termsAndCondition->meta_description_de ?? '') }}</textarea>
                        </div>

                        <div class="form-group formtabsss1 full-width">
                            <label class="form-label">Description (German)</label>
                            <textarea class="form-control" id="description_de" name="description_de"
                                rows="10">{{ old('description_de', $termsAndCondition->description_de ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                <button type="submit" class="action-button"
                    style="margin-top: 20px; background: #3b82f6; color: white; padding: 0.75rem 1.75rem; font-size: 0.875rem; font-weight: 600; border-radius: 8px; cursor: pointer; border: none; letter-spacing: 0.5px; box-shadow: 0 2px 4px rgba(59, 130, 246, 0.1);">Save</button>
            </form>
        </div>
    </main>
    <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description', { height: 300 });
        CKEDITOR.replace('description_en', { height: 300 });
        CKEDITOR.replace('description_fr', { height: 300 });
        CKEDITOR.replace('description_de', { height: 300 });

        function switchTermsTab(event, tabId) {
            event.preventDefault();
            
            document.querySelectorAll('.tab-content').forEach(function(content) {
                content.classList.remove('active');
            });
            
            document.querySelectorAll('.tab-button').forEach(function(button) {
                button.classList.remove('active');
            });
            
            document.getElementById(tabId).classList.add('active');
            event.target.classList.add('active');
        }
    </script>
@endsection
