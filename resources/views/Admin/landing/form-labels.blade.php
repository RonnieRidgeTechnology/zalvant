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
        min-height: 80px;
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

<main class="main-content">
    @include('layouts.header')

    <div class="formContainer">
        <h2 class="section-header">Landing Form Labels</h2>

        <form action="{{ route('landing-form-labels.update') }}" method="POST">
            @csrf

            <!-- Multilingual Content Section -->
            <div class="multilingual-section">
                <h3 style="font-size: 1.25rem; font-weight: 600; color: #1f2937; margin-bottom: 15px;">Multilingual Content</h3>
                <p style="color: #6b7280; margin-bottom: 20px; font-size: 0.9rem;">Manage translations for all form labels</p>

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
                            <label class="form-label">Required Note (Nederlands)</label>
                            <input class="form-control" type="text" name="required_note" value="{{ old('required_note', $formLabels->required_note ?? 'Velden gemarkeerd met * zijn vereist.') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Name Label (Nederlands)</label>
                            <input class="form-control" type="text" name="name_label" value="{{ old('name_label', $formLabels->name_label ?? 'Naam') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email Label (Nederlands)</label>
                            <input class="form-control" type="text" name="email_label" value="{{ old('email_label', $formLabels->email_label ?? 'E-mail') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Phone Label (Nederlands)</label>
                            <input class="form-control" type="text" name="phone_label" value="{{ old('phone_label', $formLabels->phone_label ?? 'Telefoon') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Service Label (Nederlands)</label>
                            <input class="form-control" type="text" name="service_label" value="{{ old('service_label', $formLabels->service_label ?? 'Dienst geïnteresseerd in') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Message Label (Nederlands)</label>
                            <input class="form-control" type="text" name="message_label" value="{{ old('message_label', $formLabels->message_label ?? 'Vertel ons over uw project') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Name Placeholder (Nederlands)</label>
                            <input class="form-control" type="text" name="name_placeholder" value="{{ old('name_placeholder', $formLabels->name_placeholder ?? 'Jouw naam') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email Placeholder (Nederlands)</label>
                            <input class="form-control" type="text" name="email_placeholder" value="{{ old('email_placeholder', $formLabels->email_placeholder ?? 'E-mail') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Phone Placeholder (Nederlands)</label>
                            <input class="form-control" type="text" name="phone_placeholder" value="{{ old('phone_placeholder', $formLabels->phone_placeholder ?? 'Telefoonnummer') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Service Placeholder (Nederlands)</label>
                            <input class="form-control" type="text" name="service_placeholder" value="{{ old('service_placeholder', $formLabels->service_placeholder ?? 'Selecteer een dienst') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Message Placeholder (Nederlands)</label>
                            <textarea class="form-control" name="message_placeholder">{{ old('message_placeholder', $formLabels->message_placeholder ?? 'Hoe kunnen wij u helpen?') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Submit Button (Nederlands)</label>
                            <input class="form-control" type="text" name="submit_button" value="{{ old('submit_button', $formLabels->submit_button ?? 'Bericht verzenden') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Success Message (Nederlands)</label>
                            <input class="form-control" type="text" name="success_message" value="{{ old('success_message', $formLabels->success_message ?? 'Bedankt! We nemen contact op.') }}">
                        </div>
                    </div>
                </div>

                <!-- English Content -->
                <div class="tab-content" data-lang="en">
                    <div class="formtabsss">
                        <div class="form-group">
                            <label class="form-label">Required Note (English)</label>
                            <input class="form-control" type="text" name="required_note_en" value="{{ old('required_note_en', $formLabels->required_note_en ?? 'Fields marked with * are required.') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Name Label (English)</label>
                            <input class="form-control" type="text" name="name_label_en" value="{{ old('name_label_en', $formLabels->name_label_en ?? 'Name') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email Label (English)</label>
                            <input class="form-control" type="text" name="email_label_en" value="{{ old('email_label_en', $formLabels->email_label_en ?? 'Email') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Phone Label (English)</label>
                            <input class="form-control" type="text" name="phone_label_en" value="{{ old('phone_label_en', $formLabels->phone_label_en ?? 'Phone') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Service Label (English)</label>
                            <input class="form-control" type="text" name="service_label_en" value="{{ old('service_label_en', $formLabels->service_label_en ?? 'Service interested in') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Message Label (English)</label>
                            <input class="form-control" type="text" name="message_label_en" value="{{ old('message_label_en', $formLabels->message_label_en ?? 'Tell us about your project') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Name Placeholder (English)</label>
                            <input class="form-control" type="text" name="name_placeholder_en" value="{{ old('name_placeholder_en', $formLabels->name_placeholder_en ?? 'Your name') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email Placeholder (English)</label>
                            <input class="form-control" type="text" name="email_placeholder_en" value="{{ old('email_placeholder_en', $formLabels->email_placeholder_en ?? 'Email') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Phone Placeholder (English)</label>
                            <input class="form-control" type="text" name="phone_placeholder_en" value="{{ old('phone_placeholder_en', $formLabels->phone_placeholder_en ?? 'Phone number') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Service Placeholder (English)</label>
                            <input class="form-control" type="text" name="service_placeholder_en" value="{{ old('service_placeholder_en', $formLabels->service_placeholder_en ?? 'Select a service') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Message Placeholder (English)</label>
                            <textarea class="form-control" name="message_placeholder_en">{{ old('message_placeholder_en', $formLabels->message_placeholder_en ?? 'How can we help you?') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Submit Button (English)</label>
                            <input class="form-control" type="text" name="submit_button_en" value="{{ old('submit_button_en', $formLabels->submit_button_en ?? 'Send Message') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Success Message (English)</label>
                            <input class="form-control" type="text" name="success_message_en" value="{{ old('success_message_en', $formLabels->success_message_en ?? 'Thank you! We will contact you soon.') }}">
                        </div>
                    </div>
                </div>

                <!-- French Content -->
                <div class="tab-content" data-lang="fr">
                    <div class="formtabsss">
                        <div class="form-group">
                            <label class="form-label">Required Note (Français)</label>
                            <input class="form-control" type="text" name="required_note_fr" value="{{ old('required_note_fr', $formLabels->required_note_fr ?? 'Les champs marqués * sont obligatoires.') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Name Label (Français)</label>
                            <input class="form-control" type="text" name="name_label_fr" value="{{ old('name_label_fr', $formLabels->name_label_fr ?? 'Nom') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email Label (Français)</label>
                            <input class="form-control" type="text" name="email_label_fr" value="{{ old('email_label_fr', $formLabels->email_label_fr ?? 'E-mail') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Phone Label (Français)</label>
                            <input class="form-control" type="text" name="phone_label_fr" value="{{ old('phone_label_fr', $formLabels->phone_label_fr ?? 'Téléphone') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Service Label (Français)</label>
                            <input class="form-control" type="text" name="service_label_fr" value="{{ old('service_label_fr', $formLabels->service_label_fr ?? 'Service qui vous intéresse') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Message Label (Français)</label>
                            <input class="form-control" type="text" name="message_label_fr" value="{{ old('message_label_fr', $formLabels->message_label_fr ?? 'Parlez-nous de votre projet') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Name Placeholder (Français)</label>
                            <input class="form-control" type="text" name="name_placeholder_fr" value="{{ old('name_placeholder_fr', $formLabels->name_placeholder_fr ?? 'Votre nom') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email Placeholder (Français)</label>
                            <input class="form-control" type="text" name="email_placeholder_fr" value="{{ old('email_placeholder_fr', $formLabels->email_placeholder_fr ?? 'E-mail') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Phone Placeholder (Français)</label>
                            <input class="form-control" type="text" name="phone_placeholder_fr" value="{{ old('phone_placeholder_fr', $formLabels->phone_placeholder_fr ?? 'Numéro de téléphone') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Service Placeholder (Français)</label>
                            <input class="form-control" type="text" name="service_placeholder_fr" value="{{ old('service_placeholder_fr', $formLabels->service_placeholder_fr ?? 'Sélectionnez un service') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Message Placeholder (Français)</label>
                            <textarea class="form-control" name="message_placeholder_fr">{{ old('message_placeholder_fr', $formLabels->message_placeholder_fr ?? 'Comment pouvons-nous vous aider?') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Submit Button (Français)</label>
                            <input class="form-control" type="text" name="submit_button_fr" value="{{ old('submit_button_fr', $formLabels->submit_button_fr ?? 'Envoyer le message') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Success Message (Français)</label>
                            <input class="form-control" type="text" name="success_message_fr" value="{{ old('success_message_fr', $formLabels->success_message_fr ?? 'Merci! Nous vous contacterons bientôt.') }}">
                        </div>
                    </div>
                </div>

                <!-- German Content -->
                <div class="tab-content" data-lang="de">
                    <div class="formtabsss">
                        <div class="form-group">
                            <label class="form-label">Required Note (Deutsch)</label>
                            <input class="form-control" type="text" name="required_note_de" value="{{ old('required_note_de', $formLabels->required_note_de ?? 'Felder mit * sind erforderlich.') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Name Label (Deutsch)</label>
                            <input class="form-control" type="text" name="name_label_de" value="{{ old('name_label_de', $formLabels->name_label_de ?? 'Name') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email Label (Deutsch)</label>
                            <input class="form-control" type="text" name="email_label_de" value="{{ old('email_label_de', $formLabels->email_label_de ?? 'E-Mail') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Phone Label (Deutsch)</label>
                            <input class="form-control" type="text" name="phone_label_de" value="{{ old('phone_label_de', $formLabels->phone_label_de ?? 'Telefon') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Service Label (Deutsch)</label>
                            <input class="form-control" type="text" name="service_label_de" value="{{ old('service_label_de', $formLabels->service_label_de ?? 'Interessierter Service') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Message Label (Deutsch)</label>
                            <input class="form-control" type="text" name="message_label_de" value="{{ old('message_label_de', $formLabels->message_label_de ?? 'Erzählen Sie uns von Ihrem Projekt') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Name Placeholder (Deutsch)</label>
                            <input class="form-control" type="text" name="name_placeholder_de" value="{{ old('name_placeholder_de', $formLabels->name_placeholder_de ?? 'Ihr Name') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email Placeholder (Deutsch)</label>
                            <input class="form-control" type="text" name="email_placeholder_de" value="{{ old('email_placeholder_de', $formLabels->email_placeholder_de ?? 'E-Mail') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Phone Placeholder (Deutsch)</label>
                            <input class="form-control" type="text" name="phone_placeholder_de" value="{{ old('phone_placeholder_de', $formLabels->phone_placeholder_de ?? 'Telefonnummer') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Service Placeholder (Deutsch)</label>
                            <input class="form-control" type="text" name="service_placeholder_de" value="{{ old('service_placeholder_de', $formLabels->service_placeholder_de ?? 'Wählen Sie einen Service') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Message Placeholder (Deutsch)</label>
                            <textarea class="form-control" name="message_placeholder_de">{{ old('message_placeholder_de', $formLabels->message_placeholder_de ?? 'Wie können wir Ihnen helfen?') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Submit Button (Deutsch)</label>
                            <input class="form-control" type="text" name="submit_button_de" value="{{ old('submit_button_de', $formLabels->submit_button_de ?? 'Nachricht senden') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Success Message (Deutsch)</label>
                            <input class="form-control" type="text" name="success_message_de" value="{{ old('success_message_de', $formLabels->success_message_de ?? 'Vielen Dank! Wir kontaktieren Sie bald.') }}">
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="action-button">Save Changes</button>
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

