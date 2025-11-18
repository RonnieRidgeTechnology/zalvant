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

    .full-width {
        grid-column: span 2;
    }

    @media (max-width: 992px) {
        .full-width {
            grid-column: span 1;
        }
    }
</style>

<main class="main-content">
    @include('layouts.header')

    <div class="formContainer">
        <h2 class="section-header">Thank You Section</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.welcome.save') }}" method="POST">
            @csrf

            <!-- Multilingual Content Section -->
            <div class="multilingual-section">
                <h3 style="font-size: 1.25rem; font-weight: 600; color: #1f2937; margin-bottom: 15px;">Multilingual Content</h3>
                <p style="color: #6b7280; margin-bottom: 20px; font-size: 0.9rem;">Manage translations for thank you page content</p>

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
                            <label class="form-label">Thank You Title (Nederlands)</label>
                            <input type="text" class="form-control" name="thank_title" value="{{ $thank->thank_title ?? '' }}" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Button Text (Nederlands)</label>
                            <input type="text" class="form-control" name="button_text" value="{{ $thank->button_text ?? '' }}" required>
                        </div>

                        <div class="form-group full-width">
                            <label class="form-label">Subtitle (Nederlands)</label>
                            <textarea class="form-control" name="thank_subtitle" rows="3" required>{{ $thank->thank_subtitle ?? '' }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Chip 1 (Nederlands)</label>
                            <input type="text" class="form-control" name="chip_1" value="{{ $thank->chip_1 ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Chip 2 (Nederlands)</label>
                            <input type="text" class="form-control" name="chip_2" value="{{ $thank->chip_2 ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Chip 3 (Nederlands)</label>
                            <input type="text" class="form-control" name="chip_3" value="{{ $thank->chip_3 ?? '' }}">
                        </div>
                    </div>
                </div>

                <!-- English Content -->
                <div class="tab-content" data-lang="en">
                    <div class="formtabsss">
                        <div class="form-group">
                            <label class="form-label">Thank You Title (English)</label>
                            <input type="text" class="form-control" name="thank_title_en" value="{{ $thank->thank_title_en ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Button Text (English)</label>
                            <input type="text" class="form-control" name="button_text_en" value="{{ $thank->button_text_en ?? '' }}">
                        </div>

                        <div class="form-group full-width">
                            <label class="form-label">Subtitle (English)</label>
                            <textarea class="form-control" name="thank_subtitle_en" rows="3">{{ $thank->thank_subtitle_en ?? '' }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Chip 1 (English)</label>
                            <input type="text" class="form-control" name="chip_1_en" value="{{ $thank->chip_1_en ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Chip 2 (English)</label>
                            <input type="text" class="form-control" name="chip_2_en" value="{{ $thank->chip_2_en ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Chip 3 (English)</label>
                            <input type="text" class="form-control" name="chip_3_en" value="{{ $thank->chip_3_en ?? '' }}">
                        </div>
                    </div>
                </div>

                <!-- French Content -->
                <div class="tab-content" data-lang="fr">
                    <div class="formtabsss">
                        <div class="form-group">
                            <label class="form-label">Thank You Title (Français)</label>
                            <input type="text" class="form-control" name="thank_title_fr" value="{{ $thank->thank_title_fr ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Button Text (Français)</label>
                            <input type="text" class="form-control" name="button_text_fr" value="{{ $thank->button_text_fr ?? '' }}">
                        </div>

                        <div class="form-group full-width">
                            <label class="form-label">Subtitle (Français)</label>
                            <textarea class="form-control" name="thank_subtitle_fr" rows="3">{{ $thank->thank_subtitle_fr ?? '' }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Chip 1 (Français)</label>
                            <input type="text" class="form-control" name="chip_1_fr" value="{{ $thank->chip_1_fr ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Chip 2 (Français)</label>
                            <input type="text" class="form-control" name="chip_2_fr" value="{{ $thank->chip_2_fr ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Chip 3 (Français)</label>
                            <input type="text" class="form-control" name="chip_3_fr" value="{{ $thank->chip_3_fr ?? '' }}">
                        </div>
                    </div>
                </div>

                <!-- German Content -->
                <div class="tab-content" data-lang="de">
                    <div class="formtabsss">
                        <div class="form-group">
                            <label class="form-label">Thank You Title (Deutsch)</label>
                            <input type="text" class="form-control" name="thank_title_de" value="{{ $thank->thank_title_de ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Button Text (Deutsch)</label>
                            <input type="text" class="form-control" name="button_text_de" value="{{ $thank->button_text_de ?? '' }}">
                        </div>

                        <div class="form-group full-width">
                            <label class="form-label">Subtitle (Deutsch)</label>
                            <textarea class="form-control" name="thank_subtitle_de" rows="3">{{ $thank->thank_subtitle_de ?? '' }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Chip 1 (Deutsch)</label>
                            <input type="text" class="form-control" name="chip_1_de" value="{{ $thank->chip_1_de ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Chip 2 (Deutsch)</label>
                            <input type="text" class="form-control" name="chip_2_de" value="{{ $thank->chip_2_de ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Chip 3 (Deutsch)</label>
                            <input type="text" class="form-control" name="chip_3_de" value="{{ $thank->chip_3_de ?? '' }}">
                        </div>
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
