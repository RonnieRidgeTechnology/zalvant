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
        margin-top: 20px;
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
            <form action="{{ route('homeupdate.update') }}" method="POST">
                @csrf

                @php
                    $fields = [
                        ['key' => 'main_title', 'label' => 'Main Title'],
                        ['key' => 'main_desc', 'label' => 'Main Description', 'type' => 'textarea'],
                        ['key' => 'offer_title', 'label' => 'Offer Title'],
                        ['key' => 'offer_desc', 'label' => 'Offer Description', 'type' => 'textarea'],
                        ['key' => 'real_stories_title', 'label' => 'Real Stories Title'],
                        ['key' => 'real_stories_desc', 'label' => 'Real Stories Description', 'type' => 'textarea'],
                        ['key' => 'ai_section_title', 'label' => 'AI Section Title'],
                        ['key' => 'ai_section_desc', 'label' => 'AI Section Description', 'type' => 'textarea'],
                        ['key' => 'technology_section_title', 'label' => 'Technology Section Title'],
                        ['key' => 'technology_section_desc', 'label' => 'Technology Section Description', 'type' => 'textarea'],
                        ['key' => 'generative_ai_excellence_title', 'label' => 'Generative AI Excellence Title'],
                        ['key' => 'generative_ai_excellence_desc', 'label' => 'Generative AI Excellence Description', 'type' => 'textarea'],
                        ['key' => 'portfolio_section_title', 'label' => 'Portfolio Section Title'],
                        ['key' => 'portfolio_section_desc', 'label' => 'Portfolio Section Description', 'type' => 'textarea'],
                        ['key' => 'faq_section_title', 'label' => 'FAQ Section Title'],
                        ['key' => 'faq_section_desc', 'label' => 'FAQ Section Description', 'type' => 'textarea'],
                        ['key' => 'any_question_title', 'label' => 'Any Question Title'],
                        ['key' => 'any_question_desc', 'label' => 'Any Question Description', 'type' => 'textarea'],
                        ['key' => 'meta_title', 'label' => 'Meta Title'],
                        ['key' => 'meta_desc', 'label' => 'Meta Description', 'type' => 'textarea'],
                        ['key' => 'meta_keyword', 'label' => 'Meta Keywords'],
                    ];
                @endphp

                <!-- Language Tabs -->
                <div class="language-tabs">
                    <button type="button" class="tab-button active" onclick="switchHomeTab(event, 'home-dutch')">
                        🇳🇱 Dutch (Default)
                    </button>
                    <button type="button" class="tab-button" onclick="switchHomeTab(event, 'home-english')">
                        🇬🇧 English
                    </button>
                    <button type="button" class="tab-button" onclick="switchHomeTab(event, 'home-french')">
                        🇫🇷 French
                    </button>
                    <button type="button" class="tab-button" onclick="switchHomeTab(event, 'home-german')">
                        🇩🇪 German
                    </button>
                </div>

                <!-- Dutch Tab -->
                <div id="home-dutch" class="tab-content active">
                    <div class="formtabsss">
                        @foreach ($fields as $field)
                            <div class="form-group formtabsss1 {{ isset($field['type']) && $field['type'] === 'textarea' ? 'full-width' : '' }}">
                                <label class="form-label">{{ $field['label'] }} (Dutch)</label>
                                @if (isset($field['type']) && $field['type'] === 'textarea')
                                    <textarea class="form-control" name="{{ $field['key'] }}" rows="3">{{ old($field['key'], $homeUpdate->{$field['key']} ?? '') }}</textarea>
                                @else
                                    <input class="form-control" type="text" name="{{ $field['key'] }}"
                                        value="{{ old($field['key'], $homeUpdate->{$field['key']} ?? '') }}">
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- English Tab -->
                <div id="home-english" class="tab-content">
                    <div class="formtabsss">
                        @foreach ($fields as $field)
                            <div class="form-group formtabsss1 {{ isset($field['type']) && $field['type'] === 'textarea' ? 'full-width' : '' }}">
                                <label class="form-label">{{ $field['label'] }} (English)</label>
                                @if (isset($field['type']) && $field['type'] === 'textarea')
                                    <textarea class="form-control" name="{{ $field['key'] }}_en" rows="3">{{ old($field['key'] . '_en', $homeUpdate->{$field['key'] . '_en'} ?? '') }}</textarea>
                                @else
                                    <input class="form-control" type="text" name="{{ $field['key'] }}_en"
                                        value="{{ old($field['key'] . '_en', $homeUpdate->{$field['key'] . '_en'} ?? '') }}">
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- French Tab -->
                <div id="home-french" class="tab-content">
                    <div class="formtabsss">
                        @foreach ($fields as $field)
                            <div class="form-group formtabsss1 {{ isset($field['type']) && $field['type'] === 'textarea' ? 'full-width' : '' }}">
                                <label class="form-label">{{ $field['label'] }} (French)</label>
                                @if (isset($field['type']) && $field['type'] === 'textarea')
                                    <textarea class="form-control" name="{{ $field['key'] }}_fr" rows="3">{{ old($field['key'] . '_fr', $homeUpdate->{$field['key'] . '_fr'} ?? '') }}</textarea>
                                @else
                                    <input class="form-control" type="text" name="{{ $field['key'] }}_fr"
                                        value="{{ old($field['key'] . '_fr', $homeUpdate->{$field['key'] . '_fr'} ?? '') }}">
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- German Tab -->
                <div id="home-german" class="tab-content">
                    <div class="formtabsss">
                        @foreach ($fields as $field)
                            <div class="form-group formtabsss1 {{ isset($field['type']) && $field['type'] === 'textarea' ? 'full-width' : '' }}">
                                <label class="form-label">{{ $field['label'] }} (German)</label>
                                @if (isset($field['type']) && $field['type'] === 'textarea')
                                    <textarea class="form-control" name="{{ $field['key'] }}_de" rows="3">{{ old($field['key'] . '_de', $homeUpdate->{$field['key'] . '_de'} ?? '') }}</textarea>
                                @else
                                    <input class="form-control" type="text" name="{{ $field['key'] }}_de"
                                        value="{{ old($field['key'] . '_de', $homeUpdate->{$field['key'] . '_de'} ?? '') }}">
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="action-button">Save</button>
            </form>
        </div>
    </main>

    <script>
        function switchHomeTab(event, tabId) {
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
