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
        gap: 10px 50px;
    }

    .formtabsss1 {
        width: 100%;
    }

    .formtabsss1.full-width {
        grid-column: 1 / -1;
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
    }

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
</style>

@section('content')
    <main class="main-content">
        @include('layouts.header')

        <div class="formContainer">
            <form action="{{ route('appointment-update.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Universal Settings -->
                <div class="formtabsss" style="margin-bottom: 30px;">
                    <div class="form-group formtabsss1 full-width">
                        <label class="form-label">Image</label>
                        <input class="form-control" type="file" name="image">
                        @if (isset($appointmentUpdate->image))
                            <img src="{{ asset($appointmentUpdate->image) }}" alt="Image" width="100" style="margin-top: 10px;">
                        @endif  
                    </div>
                    <div class="form-group formtabsss1 full-width">
    <label class="form-label">Image Alt Text</label>
    <input class="form-control" type="text" name="image_alt" 
           value="{{ old('image_alt', $appointmentUpdate->image_alt ?? '') }}">
                    </div>
                </div>

                <!-- Language Tabs -->
                <div class="language-tabs">
                    <button type="button" class="tab-button active" onclick="switchAppointmentTab(event, 'appointment-dutch')">
                        🇳🇱 Dutch (Default)
                    </button>
                    <button type="button" class="tab-button" onclick="switchAppointmentTab(event, 'appointment-english')">
                        🇬🇧 English
                    </button>
                    <button type="button" class="tab-button" onclick="switchAppointmentTab(event, 'appointment-french')">
                        🇫🇷 French
                    </button>
                    <button type="button" class="tab-button" onclick="switchAppointmentTab(event, 'appointment-german')">
                        🇩🇪 German
                    </button>
                </div>

                <!-- Dutch Tab -->
                <div id="appointment-dutch" class="tab-content active">
                    <div class="formtabsss">
                        <div class="form-group formtabsss1 full-width">
                            <label class="form-label">Main Title (Dutch)</label>
                            <input class="form-control" type="text" name="main_title"
                                   value="{{ old('main_title', $appointmentUpdate->main_title ?? '') }}">
</div>

                        <div class="form-group formtabsss1 full-width">
                            <label class="form-label">Main Description (Dutch)</label>
                            <textarea class="form-control" name="main_desc" rows="4">{{ old('main_desc', $appointmentUpdate->main_desc ?? '') }}</textarea>
                        </div>

                    <div class="form-group formtabsss1">
                            <label class="form-label">Meta Title (Dutch)</label>
                        <input class="form-control" type="text" name="meta_title"
                               value="{{ old('meta_title', $appointmentUpdate->meta_title ?? '') }}">
                    </div>

                    <div class="form-group formtabsss1">
                            <label class="form-label">Meta Keywords (Dutch)</label>
                            <input class="form-control" type="text" name="meta_keywords"
                                   value="{{ old('meta_keywords', $appointmentUpdate->meta_keywords ?? '') }}">
                        </div>

                        <div class="form-group formtabsss1 full-width">
                            <label class="form-label">Meta Description (Dutch)</label>
                            <textarea class="form-control" name="meta_desc" rows="3">{{ old('meta_desc', $appointmentUpdate->meta_desc ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- English Tab -->
                <div id="appointment-english" class="tab-content">
                    <div class="formtabsss">
                        <div class="form-group formtabsss1 full-width">
                            <label class="form-label">Main Title (English)</label>
                            <input class="form-control" type="text" name="main_title_en"
                                   value="{{ old('main_title_en', $appointmentUpdate->main_title_en ?? '') }}">
                        </div>

                        <div class="form-group formtabsss1 full-width">
                            <label class="form-label">Main Description (English)</label>
                            <textarea class="form-control" name="main_desc_en" rows="4">{{ old('main_desc_en', $appointmentUpdate->main_desc_en ?? '') }}</textarea>
                        </div>

                        <div class="form-group formtabsss1">
                            <label class="form-label">Meta Title (English)</label>
                            <input class="form-control" type="text" name="meta_title_en"
                                   value="{{ old('meta_title_en', $appointmentUpdate->meta_title_en ?? '') }}">
                        </div>

                        <div class="form-group formtabsss1">
                            <label class="form-label">Meta Keywords (English)</label>
                            <input class="form-control" type="text" name="meta_keywords_en"
                                   value="{{ old('meta_keywords_en', $appointmentUpdate->meta_keywords_en ?? '') }}">
                        </div>

                        <div class="form-group formtabsss1 full-width">
                            <label class="form-label">Meta Description (English)</label>
                            <textarea class="form-control" name="meta_desc_en" rows="3">{{ old('meta_desc_en', $appointmentUpdate->meta_desc_en ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- French Tab -->
                <div id="appointment-french" class="tab-content">
                    <div class="formtabsss">
                        <div class="form-group formtabsss1 full-width">
                            <label class="form-label">Main Title (French)</label>
                            <input class="form-control" type="text" name="main_title_fr"
                                   value="{{ old('main_title_fr', $appointmentUpdate->main_title_fr ?? '') }}">
                        </div>

                        <div class="form-group formtabsss1 full-width">
                            <label class="form-label">Main Description (French)</label>
                            <textarea class="form-control" name="main_desc_fr" rows="4">{{ old('main_desc_fr', $appointmentUpdate->main_desc_fr ?? '') }}</textarea>
                        </div>

                        <div class="form-group formtabsss1">
                            <label class="form-label">Meta Title (French)</label>
                            <input class="form-control" type="text" name="meta_title_fr"
                                   value="{{ old('meta_title_fr', $appointmentUpdate->meta_title_fr ?? '') }}">
                        </div>

                        <div class="form-group formtabsss1">
                            <label class="form-label">Meta Keywords (French)</label>
                            <input class="form-control" type="text" name="meta_keywords_fr"
                                   value="{{ old('meta_keywords_fr', $appointmentUpdate->meta_keywords_fr ?? '') }}">
                        </div>

                        <div class="form-group formtabsss1 full-width">
                            <label class="form-label">Meta Description (French)</label>
                            <textarea class="form-control" name="meta_desc_fr" rows="3">{{ old('meta_desc_fr', $appointmentUpdate->meta_desc_fr ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- German Tab -->
                <div id="appointment-german" class="tab-content">
                    <div class="formtabsss">
                        <div class="form-group formtabsss1 full-width">
                            <label class="form-label">Main Title (German)</label>
                            <input class="form-control" type="text" name="main_title_de"
                                   value="{{ old('main_title_de', $appointmentUpdate->main_title_de ?? '') }}">
                        </div>

                        <div class="form-group formtabsss1 full-width">
                            <label class="form-label">Main Description (German)</label>
                            <textarea class="form-control" name="main_desc_de" rows="4">{{ old('main_desc_de', $appointmentUpdate->main_desc_de ?? '') }}</textarea>
                        </div>

                        <div class="form-group formtabsss1">
                            <label class="form-label">Meta Title (German)</label>
                            <input class="form-control" type="text" name="meta_title_de"
                                   value="{{ old('meta_title_de', $appointmentUpdate->meta_title_de ?? '') }}">
                    </div>

                    <div class="form-group formtabsss1">
                            <label class="form-label">Meta Keywords (German)</label>
                            <input class="form-control" type="text" name="meta_keywords_de"
                                   value="{{ old('meta_keywords_de', $appointmentUpdate->meta_keywords_de ?? '') }}">
                        </div>

                        <div class="form-group formtabsss1 full-width">
                            <label class="form-label">Meta Description (German)</label>
                            <textarea class="form-control" name="meta_desc_de" rows="3">{{ old('meta_desc_de', $appointmentUpdate->meta_desc_de ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                <button type="submit" class="action-button" style="margin-top: 20px;">Save</button>
            </form>
        </div>
    </main>

    <script>
        function switchAppointmentTab(event, tabId) {
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
