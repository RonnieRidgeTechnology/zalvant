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

    .formGrid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px 30px;
    }

    @media(max-width: 992px) {
        .formGrid {
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

    .form-control,
    textarea.form-control {
        border-radius: 8px;
        border: 1px solid #d1d5db;
        padding: 0.6rem 0.8rem;
        transition: all 0.3s ease;
        font-size: 0.95rem;
        width: 100%;
    }

    .form-control:focus,
    textarea.form-control:focus {
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
        <h2 class="section-header">Hero Action Section</h2>

        <form action="{{ route('action-store') }}" method="POST">
            @csrf

            <!-- Non-translatable fields -->
            <div class="formGrid">
                <div class="form-group">
                    <label class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="phone" value="{{$action->phone}}" placeholder="+31615865040" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{$action->email}}" placeholder="info@zalvant.com" required>
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
                    <div class="form-group">
                        <label class="form-label">Eyebrow Text (Nederlands)</label>
                        <input type="text" class="form-control" name="eyebrow" value="{{$action->eyebrow}}" placeholder="Premium Transport" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Heading (Nederlands)</label>
                        <input type="text" class="form-control" name="heading" value="{{$action->heading}}" placeholder="Book a Comfortable Ride With Us" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Sub Text (Nederlands)</label>
                        <textarea class="form-control" name="sub_text" rows="3" required>{{$action->sub_text}}</textarea>
                    </div>

                    <div class="formGrid">
                        <div class="form-group">
                            <label class="form-label">Chip 1 (Nederlands)</label>
                            <input type="text" class="form-control" name="chip_one" value="{{$action->chip_one}}" placeholder="24/7 Support" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Chip 2 (Nederlands)</label>
                            <input type="text" class="form-control" name="chip_two" value="{{$action->chip_two}}" placeholder="Instant Confirmation" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Chip 3 (Nederlands)</label>
                            <input type="text" class="form-control" name="chip_three" value="{{$action->chip_three}}" placeholder="Modern Fleet" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Footer Note (Nederlands)</label>
                        <input type="text" class="form-control" name="footer_note" value="{{$action->footer_note}}" placeholder="Available 24/7 • Quick confirmations • Safe and modern fleet" required>
                    </div>
                </div>

                <!-- English Content -->
                <div class="tab-content" data-lang="en">
                    <div class="form-group">
                        <label class="form-label">Eyebrow Text (English)</label>
                        <input type="text" class="form-control" name="eyebrow_en" value="{{$action->eyebrow_en}}" placeholder="Premium Transport">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Heading (English)</label>
                        <input type="text" class="form-control" name="heading_en" value="{{$action->heading_en}}" placeholder="Book a Comfortable Ride With Us">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Sub Text (English)</label>
                        <textarea class="form-control" name="sub_text_en" rows="3">{{$action->sub_text_en}}</textarea>
                    </div>

                    <div class="formGrid">
                        <div class="form-group">
                            <label class="form-label">Chip 1 (English)</label>
                            <input type="text" class="form-control" name="chip_one_en" value="{{$action->chip_one_en}}" placeholder="24/7 Support">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Chip 2 (English)</label>
                            <input type="text" class="form-control" name="chip_two_en" value="{{$action->chip_two_en}}" placeholder="Instant Confirmation">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Chip 3 (English)</label>
                            <input type="text" class="form-control" name="chip_three_en" value="{{$action->chip_three_en}}" placeholder="Modern Fleet">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Footer Note (English)</label>
                        <input type="text" class="form-control" name="footer_note_en" value="{{$action->footer_note_en}}" placeholder="Available 24/7 • Quick confirmations • Safe and modern fleet">
                    </div>
                </div>

                <!-- French Content -->
                <div class="tab-content" data-lang="fr">
                    <div class="form-group">
                        <label class="form-label">Eyebrow Text (Français)</label>
                        <input type="text" class="form-control" name="eyebrow_fr" value="{{$action->eyebrow_fr}}" placeholder="Transport Premium">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Heading (Français)</label>
                        <input type="text" class="form-control" name="heading_fr" value="{{$action->heading_fr}}" placeholder="Réservez un trajet confortable avec nous">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Sub Text (Français)</label>
                        <textarea class="form-control" name="sub_text_fr" rows="3">{{$action->sub_text_fr}}</textarea>
                    </div>

                    <div class="formGrid">
                        <div class="form-group">
                            <label class="form-label">Chip 1 (Français)</label>
                            <input type="text" class="form-control" name="chip_one_fr" value="{{$action->chip_one_fr}}" placeholder="Support 24/7">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Chip 2 (Français)</label>
                            <input type="text" class="form-control" name="chip_two_fr" value="{{$action->chip_two_fr}}" placeholder="Confirmation Instantanée">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Chip 3 (Français)</label>
                            <input type="text" class="form-control" name="chip_three_fr" value="{{$action->chip_three_fr}}" placeholder="Flotte Moderne">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Footer Note (Français)</label>
                        <input type="text" class="form-control" name="footer_note_fr" value="{{$action->footer_note_fr}}" placeholder="Disponible 24/7 • Confirmations rapides • Flotte sûre et moderne">
                    </div>
                </div>

                <!-- German Content -->
                <div class="tab-content" data-lang="de">
                    <div class="form-group">
                        <label class="form-label">Eyebrow Text (Deutsch)</label>
                        <input type="text" class="form-control" name="eyebrow_de" value="{{$action->eyebrow_de}}" placeholder="Premium-Transport">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Heading (Deutsch)</label>
                        <input type="text" class="form-control" name="heading_de" value="{{$action->heading_de}}" placeholder="Buchen Sie eine komfortable Fahrt mit uns">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Sub Text (Deutsch)</label>
                        <textarea class="form-control" name="sub_text_de" rows="3">{{$action->sub_text_de}}</textarea>
                    </div>

                    <div class="formGrid">
                        <div class="form-group">
                            <label class="form-label">Chip 1 (Deutsch)</label>
                            <input type="text" class="form-control" name="chip_one_de" value="{{$action->chip_one_de}}" placeholder="24/7 Support">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Chip 2 (Deutsch)</label>
                            <input type="text" class="form-control" name="chip_two_de" value="{{$action->chip_two_de}}" placeholder="Sofortbestätigung">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Chip 3 (Deutsch)</label>
                            <input type="text" class="form-control" name="chip_three_de" value="{{$action->chip_three_de}}" placeholder="Moderne Flotte">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Footer Note (Deutsch)</label>
                        <input type="text" class="form-control" name="footer_note_de" value="{{$action->footer_note_de}}" placeholder="Verfügbar 24/7 • Schnelle Bestätigungen • Sichere und moderne Flotte">
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
