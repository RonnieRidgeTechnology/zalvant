@extends('layouts.admin')

<style>
    /* Container for the whole section */
    .formContainer {
        background: #fff;
        padding: 2rem;
        width: 90%;
        margin: 40px auto;
        border-radius: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        border: 1px solid #e5e7eb;
    }

    /* Section heading */
    .section-header {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1e3a8a;
        margin-bottom: 2rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        position: relative;
        padding-bottom: 0.5rem;
    }

    .section-header::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        height: 3px;
        width: 60px;
        background: #3b82f6;
        border-radius: 10px;
    }

    /* Grid layout */
    .formGrid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 25px 50px;
    }

    @media (max-width: 992px) {
        .formGrid {
            grid-template-columns: 1fr;
        }
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-label {
        font-weight: 600;
        color: #374151;
        margin-bottom: 5px;
    }

    .form-control {
        border-radius: 8px;
        border: 1px solid #d1d5db;
        padding: 0.6rem 0.8rem;
        transition: all 0.3s ease;
        font-size: 0.95rem;
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

    /* Action button */
    .action-button {
        margin-top: 2rem;
        padding: 0.9rem 2rem;
        font-size: 0.95rem;
        font-weight: 600;
        border: none;
        background: linear-gradient(90deg, #2563eb, #3b82f6);
        color: #fff;
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

    .action-button:active {
        transform: translateY(0);
    }

    img {
        margin-top: 10px;
        border-radius: 6px;
        border: 1px solid #e5e7eb;
        padding: 3px;
    }

    /* Make footer-description span the whole grid */
    .form-group.col-12 {
        grid-column: 1 / -1;
    }
</style>

@section('content')
<main class="main-content">
    @include('layouts.header')

    <div class="formContainer">
        <h2 class="section-header">Website Settings</h2>

        <form action="{{ route('websetting.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="formGrid">
                <div class="form-group">
                    <label class="form-label">Logo</label>
                    <input class="form-control" type="file" name="logo">
                    @if (isset($websetting->logo))
                    <img src="{{ asset($websetting->logo) }}" alt="Logo" width="100">
                    @endif
                </div>

                <div class="form-group">
                    <label class="form-label">Favicon</label>
                    <input class="form-control" type="file" name="favicon_logo">
                    @if (isset($websetting->favicon_logo))
                    <img src="{{ asset($websetting->favicon_logo) }}" alt="Favicon" width="50">
                    @endif
                </div>

                <div class="form-group">
                    <label class="form-label">OG Image</label>
                    <input class="form-control" type="file" name="og_image">
                    @if (isset($websetting->og_image))
                    <img src="{{ asset($websetting->og_image) }}" alt="OG Image" width="120">
                    @endif
                </div>

                <div class="form-group">
                    <label class="form-label">Phone</label>
                    <input class="form-control" type="text" name="phone"
                        value="{{ old('phone', $websetting->phone ?? '') }}">
                </div>

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input class="form-control" type="email" name="email"
                        value="{{ old('email', $websetting->email ?? '') }}">
                </div>

                <div class="form-group">
                    <label class="form-label">LinkedIn</label>
                    <input class="form-control" type="url" name="linkedin"
                        value="{{ old('linkedin', $websetting->linkedin ?? '') }}">
                </div>

                <div class="form-group">
                    <label class="form-label">Instagram</label>
                    <input class="form-control" type="url" name="insta"
                        value="{{ old('insta', $websetting->insta ?? '') }}">
                </div>

                <div class="form-group">
                    <label class="form-label">Facebook</label>
                    <input class="form-control" type="url" name="facebook"
                        value="{{ old('facebook', $websetting->facebook ?? '') }}">
                </div>

                <div class="form-group">
                    <label class="form-label">Twitter</label>
                    <input class="form-control" type="url" name="twitter"
                        value="{{ old('twitter', $websetting->twitter ?? '') }}">
                </div>

                <div class="form-group">
                    <label class="form-label">TikTok</label>
                    <input class="form-control" type="url" name="tiktok"
                        value="{{ old('tiktok', $websetting->tiktok ?? '') }}">
                </div>

                <div class="form-group">
                    <label class="form-label">Available Languages</label>
                    <div style="margin-bottom: 10px;">
                        <small style="color: #6b7280;">Select languages to display on the website</small>
                    </div>
                    @php
                        $allLanguages = [
                            'nl' => '🇳🇱 Nederlands (Dutch)',
                            'en' => '🇬🇧 English',
                            'fr' => '🇫🇷 Français (French)',
                            'de' => '🇩🇪 Deutsch (German)',
                        ];
                        $selectedLanguages = [];
                        if (isset($websetting->available_languages)) {
                            $selectedLanguages = array_map('trim', explode(',', $websetting->available_languages));
                        } else {
                            $selectedLanguages = ['nl', 'en', 'fr', 'de'];
                        }
                    @endphp
                    <div style="display: flex; flex-direction: column; gap: 12px; padding: 15px; background: #f9fafb; border-radius: 8px; border: 1px solid #e5e7eb;">
                        @foreach($allLanguages as $code => $name)
                            <label style="display: flex; align-items: center; gap: 10px; cursor: {{ $code === 'nl' ? 'not-allowed' : 'pointer' }}; padding: 8px; border-radius: 6px; transition: background 0.2s; {{ $code === 'nl' ? 'opacity: 0.7; background: #e0f2fe;' : '' }}" 
                                   class="language-checkbox-label"
                                   onmouseover="if('{{ $code }}' !== 'nl') this.style.background='#f3f4f6'" 
                                   onmouseout="if('{{ $code }}' !== 'nl') this.style.background='transparent'; else this.style.background='#e0f2fe'">
                                <input type="checkbox" 
                                       class="language-checkbox" 
                                       value="{{ $code }}" 
                                       {{ in_array($code, $selectedLanguages) ? 'checked' : '' }}
                                       {{ $code === 'nl' ? 'checked disabled' : '' }}
                                       style="width: 18px; height: 18px; cursor: {{ $code === 'nl' ? 'not-allowed' : 'pointer' }}; accent-color: #3b82f6;">
                                <span style="font-size: 15px; color: #374151; font-weight: 500;">
                                    {{ $name }}
                                    @if($code === 'nl')
                                        <span style="font-size: 11px; color: #0369a1; font-weight: 700; margin-left: 5px;">(DEFAULT)</span>
                                    @endif
                                </span>
                            </label>
                        @endforeach
                    </div>
                    <input type="hidden" name="available_languages" id="languagesInput" 
                           value="{{ old('available_languages', $websetting->available_languages ?? 'nl,en,fr,de') }}">
                    <small style="color: #6b7280; display: block; margin-top: 8px;">
                        <strong>Selected:</strong> <span id="selectedLanguagesDisplay" style="color: #2563eb; font-weight: 600;">{{ $websetting->available_languages ?? 'nl,en,fr,de' }}</span>
                    </small>
                    <div style="margin-top: 8px; padding: 8px 12px; background: #dbeafe; border: 1px solid #93c5fd; border-radius: 6px; color: #1e40af; font-size: 13px;">
                        ℹ️ Dutch (Nederlands) is the default language and cannot be unselected.
                    </div>
                    <div id="languageWarning" style="display: none; margin-top: 8px; padding: 8px 12px; background: #fef2f2; border: 1px solid #fecaca; border-radius: 6px; color: #dc2626; font-size: 13px;">
                        ⚠️ At least one language must be selected for the website to function properly.
                    </div>
                </div>
                
                <div class="form-group col-12">
                    <label class="form-label">Multilingual Content</label>
                    <div style="margin-bottom: 10px;">
                        <small style="color: #6b7280;">Manage translations for Address, Copyright, and Footer Description</small>
                    </div>
                    
                    <!-- Tab Navigation -->
                    <div class="language-tabs" style="display: flex; gap: 5px; margin-bottom: 20px; border-bottom: 2px solid #e5e7eb;">
                        <button type="button" class="lang-tab active" data-lang="nl" style="padding: 12px 24px; border: none; background: none; cursor: pointer; font-weight: 600; color: #6b7280; border-bottom: 3px solid transparent; transition: all 0.3s;">
                            🇳🇱 Nederlands (Dutch)
                        </button>
                        <button type="button" class="lang-tab" data-lang="en" style="padding: 12px 24px; border: none; background: none; cursor: pointer; font-weight: 600; color: #6b7280; border-bottom: 3px solid transparent; transition: all 0.3s;">
                            🇬🇧 English
                        </button>
                        <button type="button" class="lang-tab" data-lang="fr" style="padding: 12px 24px; border: none; background: none; cursor: pointer; font-weight: 600; color: #6b7280; border-bottom: 3px solid transparent; transition: all 0.3s;">
                            🇫🇷 Français (French)
                        </button>
                        <button type="button" class="lang-tab" data-lang="de" style="padding: 12px 24px; border: none; background: none; cursor: pointer; font-weight: 600; color: #6b7280; border-bottom: 3px solid transparent; transition: all 0.3s;">
                            🇩🇪 Deutsch (German)
                        </button>
                    </div>

                    <!-- Tab Content -->
                    <div class="tab-contents">
                        <!-- Dutch (Default) Content -->
                        <div class="tab-content active" data-lang="nl" style="display: block;">
                            <div style="display: grid; gap: 20px;">
                                <div>
                                    <label class="form-label">Address (Nederlands)</label>
                                    <input class="form-control" type="text" name="address" value="{{ old('address', $websetting->address ?? '') }}" placeholder="Enter address in Dutch">
                                </div>
                                <div>
                                    <label class="form-label">Copyright (Nederlands)</label>
                                    <input class="form-control" type="text" name="copyright" value="{{ old('copyright', $websetting->copyright ?? '') }}" placeholder="Enter copyright in Dutch">
                                </div>
                                <div>
                                    <label class="form-label">Footer Description (Nederlands)</label>
                                    <textarea class="form-control" name="footer_desc" placeholder="Enter footer description in Dutch">{{ old('footer_desc', $websetting->footer_desc ?? '') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- English Content -->
                        <div class="tab-content" data-lang="en" style="display: none;">
                            <div style="display: grid; gap: 20px;">
                                <div>
                                    <label class="form-label">Address (English)</label>
                                    <input class="form-control" type="text" name="address_en" value="{{ old('address_en', $websetting->address_en ?? '') }}" placeholder="Enter address in English">
                                </div>
                                <div>
                                    <label class="form-label">Copyright (English)</label>
                                    <input class="form-control" type="text" name="copyright_en" value="{{ old('copyright_en', $websetting->copyright_en ?? '') }}" placeholder="Enter copyright in English">
                                </div>
                                <div>
                                    <label class="form-label">Footer Description (English)</label>
                                    <textarea class="form-control" name="footer_desc_en" placeholder="Enter footer description in English">{{ old('footer_desc_en', $websetting->footer_desc_en ?? '') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- French Content -->
                        <div class="tab-content" data-lang="fr" style="display: none;">
                            <div style="display: grid; gap: 20px;">
                                <div>
                                    <label class="form-label">Address (Français)</label>
                                    <input class="form-control" type="text" name="address_fr" value="{{ old('address_fr', $websetting->address_fr ?? '') }}" placeholder="Enter address in French">
                                </div>
                                <div>
                                    <label class="form-label">Copyright (Français)</label>
                                    <input class="form-control" type="text" name="copyright_fr" value="{{ old('copyright_fr', $websetting->copyright_fr ?? '') }}" placeholder="Enter copyright in French">
                                </div>
                                <div>
                                    <label class="form-label">Footer Description (Français)</label>
                                    <textarea class="form-control" name="footer_desc_fr" placeholder="Enter footer description in French">{{ old('footer_desc_fr', $websetting->footer_desc_fr ?? '') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- German Content -->
                        <div class="tab-content" data-lang="de" style="display: none;">
                            <div style="display: grid; gap: 20px;">
                                <div>
                                    <label class="form-label">Address (Deutsch)</label>
                                    <input class="form-control" type="text" name="address_de" value="{{ old('address_de', $websetting->address_de ?? '') }}" placeholder="Enter address in German">
                                </div>
                                <div>
                                    <label class="form-label">Copyright (Deutsch)</label>
                                    <input class="form-control" type="text" name="copyright_de" value="{{ old('copyright_de', $websetting->copyright_de ?? '') }}" placeholder="Enter copyright in German">
                                </div>
                                <div>
                                    <label class="form-label">Footer Description (Deutsch)</label>
                                    <textarea class="form-control" name="footer_desc_de" placeholder="Enter footer description in German">{{ old('footer_desc_de', $websetting->footer_desc_de ?? '') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <button type="submit" class="action-button">Save</button>
        </form>
    </div>
</main>

<script>
    // Handle language checkbox selection
    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('.language-checkbox');
        const hiddenInput = document.getElementById('languagesInput');
        const displaySpan = document.getElementById('selectedLanguagesDisplay');
        
        function updateLanguages() {
            const selectedLanguages = Array.from(checkboxes)
                .filter(cb => cb.checked && !cb.disabled)
                .map(cb => cb.value);
            
            // Always include Dutch (nl) as it's the default and disabled checkbox
            if (!selectedLanguages.includes('nl')) {
                selectedLanguages.unshift('nl'); // Add Dutch at the beginning
            }
            
            const selectedString = selectedLanguages.join(',');
            
            // Update hidden input
            hiddenInput.value = selectedString;
            
            // Update display
            displaySpan.textContent = selectedString;
            
            // Visual feedback - Dutch is always selected so this will always be blue
            displaySpan.style.color = '#2563eb';
        }
        
        function preventUncheckingLastLanguage(clickedCheckbox) {
            const checkedBoxes = Array.from(checkboxes).filter(cb => cb.checked);
            
            // If NO checkboxes are checked (just unchecked the last one), prevent it
            if (checkedBoxes.length === 0) {
                clickedCheckbox.checked = true; // Re-check it
                
                // Show warning message
                const warningDiv = document.getElementById('languageWarning');
                if (warningDiv) {
                    warningDiv.style.display = 'block';
                    setTimeout(() => {
                        warningDiv.style.display = 'none';
                    }, 3000);
                }
            }
        }
        
        // Add change event to all checkboxes
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                preventUncheckingLastLanguage(this);
                updateLanguages();
            });
        });
        
        // Initialize on page load
        updateLanguages();
    });

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
                    t.style.color = '#6b7280';
                    t.style.borderBottom = '3px solid transparent';
                    t.style.background = 'none';
                });

                // Add active class to clicked tab
                this.classList.add('active');
                this.style.color = '#2563eb';
                this.style.borderBottom = '3px solid #2563eb';
                this.style.background = 'rgba(37, 99, 235, 0.05)';

                // Hide all tab contents
                tabContents.forEach(content => {
                    content.style.display = 'none';
                });

                // Show target tab content
                const targetContent = document.querySelector(`.tab-content[data-lang="${targetLang}"]`);
                if (targetContent) {
                    targetContent.style.display = 'block';
                }
            });
        });

        // Initialize first tab as active
        const firstTab = document.querySelector('.lang-tab.active');
        if (firstTab) {
            firstTab.style.color = '#2563eb';
            firstTab.style.borderBottom = '3px solid #2563eb';
            firstTab.style.background = 'rgba(37, 99, 235, 0.05)';
        }
    });
</script>
@endsection