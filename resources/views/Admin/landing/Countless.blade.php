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

    .counts-section {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 20px;
        border: 1px solid #e5e7eb;
    }

    .counts-section h3 {
        font-size: 1.1rem;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 15px;
    }
</style>


<main class="main-content">
    @include('layouts.header')

    <div class="formContainer">
        <h2 class="section-header">Statistics Section</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.countless.save') }}" method="POST">
            @csrf

            <!-- Counts Section (Non-translatable numbers) -->
            <div class="counts-section">
                <h3>Statistics Counts (Numbers - Same for all languages)</h3>

                <div class="formtabsss">
                    <div class="form-group">
                        <label class="form-label">Clients Count</label>
                        <input type="text" class="form-control" name="happy_clients" value="{{ $stat->happy_clients ?? '' }}" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Completed Works Count</label>
                        <input type="text" class="form-control" name="tours_completed" value="{{ $stat->tours_completed ?? '' }}" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Awards Count</label>
                        <input type="text" class="form-control" name="awards" value="{{ $stat->awards ?? '' }}" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Experience (Years)</label>
                        <input type="text" class="form-control" name="experience_years" value="{{ $stat->experience_years ?? '' }}" required>
                    </div>
                </div>
            </div>

            <!-- Multilingual Labels Section -->
            <div class="multilingual-section">
                <h3 style="font-size: 1.25rem; font-weight: 600; color: #1f2937; margin-bottom: 15px;">Multilingual Labels</h3>
                <p style="color: #6b7280; margin-bottom: 20px; font-size: 0.9rem;">Manage translations for statistic labels</p>

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
                            <label class="form-label">Clients Label (Nederlands)</label>
                            <input type="text" class="form-control" name="client_label" value="{{ $stat->client_label ?? '' }}" placeholder="Happy Clients" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Completed Works Label (Nederlands)</label>
                            <input type="text" class="form-control" name="completed_label" value="{{ $stat->completed_label ?? '' }}" placeholder="Tours Completed" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Awards Label (Nederlands)</label>
                            <input type="text" class="form-control" name="awards_label" value="{{ $stat->awards_label ?? '' }}" placeholder="Awards Won" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Experience Label (Nederlands)</label>
                            <input type="text" class="form-control" name="experience_label" value="{{ $stat->experience_label ?? '' }}" placeholder="Years of Experience" required>
                        </div>
                    </div>
                </div>

                <!-- English Content -->
                <div class="tab-content" data-lang="en">
                    <div class="formtabsss">
                        <div class="form-group">
                            <label class="form-label">Clients Label (English)</label>
                            <input type="text" class="form-control" name="client_label_en" value="{{ $stat->client_label_en ?? '' }}" placeholder="Happy Clients">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Completed Works Label (English)</label>
                            <input type="text" class="form-control" name="completed_label_en" value="{{ $stat->completed_label_en ?? '' }}" placeholder="Tours Completed">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Awards Label (English)</label>
                            <input type="text" class="form-control" name="awards_label_en" value="{{ $stat->awards_label_en ?? '' }}" placeholder="Awards Won">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Experience Label (English)</label>
                            <input type="text" class="form-control" name="experience_label_en" value="{{ $stat->experience_label_en ?? '' }}" placeholder="Years of Experience">
                        </div>
                    </div>
                </div>

                <!-- French Content -->
                <div class="tab-content" data-lang="fr">
                    <div class="formtabsss">
                        <div class="form-group">
                            <label class="form-label">Clients Label (Français)</label>
                            <input type="text" class="form-control" name="client_label_fr" value="{{ $stat->client_label_fr ?? '' }}" placeholder="Clients Satisfaits">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Completed Works Label (Français)</label>
                            <input type="text" class="form-control" name="completed_label_fr" value="{{ $stat->completed_label_fr ?? '' }}" placeholder="Projets Terminés">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Awards Label (Français)</label>
                            <input type="text" class="form-control" name="awards_label_fr" value="{{ $stat->awards_label_fr ?? '' }}" placeholder="Prix Remportés">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Experience Label (Français)</label>
                            <input type="text" class="form-control" name="experience_label_fr" value="{{ $stat->experience_label_fr ?? '' }}" placeholder="Années d'Expérience">
                        </div>
                    </div>
                </div>

                <!-- German Content -->
                <div class="tab-content" data-lang="de">
                    <div class="formtabsss">
                        <div class="form-group">
                            <label class="form-label">Clients Label (Deutsch)</label>
                            <input type="text" class="form-control" name="client_label_de" value="{{ $stat->client_label_de ?? '' }}" placeholder="Zufriedene Kunden">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Completed Works Label (Deutsch)</label>
                            <input type="text" class="form-control" name="completed_label_de" value="{{ $stat->completed_label_de ?? '' }}" placeholder="Abgeschlossene Touren">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Awards Label (Deutsch)</label>
                            <input type="text" class="form-control" name="awards_label_de" value="{{ $stat->awards_label_de ?? '' }}" placeholder="Gewonnene Auszeichnungen">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Experience Label (Deutsch)</label>
                            <input type="text" class="form-control" name="experience_label_de" value="{{ $stat->experience_label_de ?? '' }}" placeholder="Jahre Erfahrung">
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
