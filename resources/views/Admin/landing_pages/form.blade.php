@extends('layouts.admin')

@php
    $languageLabels = [
        'nl' => '🇳🇱 Nederlands',
        'en' => '🇬🇧 English',
        'fr' => '🇫🇷 Français',
        'de' => '🇩🇪 Deutsch',
    ];

    $oldFeatures = old('features');
    $prefilledFeatures = $oldFeatures ?? collect($landingPage->feature_blocks ?? [])->map(function ($feature) {
        $feature['icon_existing'] = $feature['icon'] ?? null;
        return $feature;
    })->toArray();
@endphp

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
        font-size: 1.4rem;
        font-weight: 700;
        color: #1e3a8a;
        margin-bottom: 1.5rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .language-tabs {
        display: flex;
        gap: 5px;
        margin-bottom: 20px;
        border-bottom: 2px solid #e5e7eb;
        flex-wrap: wrap;
    }
    .lang-tab {
        padding: 10px 18px;
        border: none;
        background: none;
        cursor: pointer;
        font-weight: 600;
        color: #6b7280;
        border-bottom: 3px solid transparent;
        transition: all 0.3s;
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
        min-height: 120px;
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
    .feature-builder {
        background: #f9fafb;
        border-radius: 16px;
        padding: 20px;
        margin-top: 30px;
        border: 1px solid #e5e7eb;
    }
    .feature-card {
        background: #fff;
        border-radius: 14px;
        border: 1px solid #e5e7eb;
        padding: 20px;
        margin-bottom: 20px;
        position: relative;
    }
    .remove-feature-btn {
        position: absolute;
        top: 14px;
        right: 14px;
        border: none;
        background: transparent;
        color: #ef4444;
        font-size: 18px;
        cursor: pointer;
    }
    .add-feature-btn {
        border: 1px dashed #2563eb;
        background: rgba(37, 99, 235, 0.08);
        color: #1d4ed8;
        padding: 0.75rem 1.5rem;
        border-radius: 10px;
        font-weight: 600;
        cursor: pointer;
        width: 100%;
        margin-top: 10px;
    }
    .preview-image {
        margin-top: 10px;
        max-width: 220px;
        border-radius: 12px;
        border: 1px solid #e5e7eb;
    }
    .current-icon-preview {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-top: 10px;
    }
    .current-icon-preview img {
        max-width: 140px;
        border-radius: 10px;
        border: 1px solid #e5e7eb;
        padding: 6px;
        background: #fff;
    }
    .current-icon-preview small {
        color: #6b7280;
    }
    .error-text {
        font-size: 0.85rem;
        color: #dc2626;
        margin-top: 4px;
    }
</style>

<main class="main-content">
    @include('layouts.header')

    <div class="formContainer"
         id="landingPageForm"
         data-locales='@json($locales)'
         data-language-labels='@json($languageLabels)'
         data-storage='{{ asset('storage') }}'
         data-features='@json($prefilledFeatures)'>
        <h2 class="section-header">{{ $landingPage->exists ? 'Edit Landing Page' : 'Create Landing Page' }}</h2>

        @if ($errors->any())
            <div class="alert alert-danger" style="margin-bottom: 20px;">
                <strong>Please fix the highlighted errors.</strong>
            </div>
        @endif

        <form action="{{ $formAction }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($formMethod === 'PUT')
                @method('PUT')
            @endif

            <!-- Type and Slug (Required, No Language Tabs) -->
            <div class="form-group" style="margin-bottom: 30px; padding-bottom: 20px; border-bottom: 2px solid #e5e7eb;">
                <div class="formtabsss">
                    <div class="form-group">
                        <label class="form-label">Type <span style="color: #dc2626;">*</span></label>
                        <input type="text" name="type" class="form-control" 
                               value="{{ old('type', $landingPage->type) }}" 
                               placeholder="e.g., Web Development, Mobile App" required>
                        @error('type')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                        <small style="color: #6b7280; font-size: 0.85rem; margin-top: 4px; display: block;">
                            Unique identifier for this landing page type
                        </small>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Slug</label>
                        <input type="text" name="slug" class="form-control" 
                               value="{{ old('slug', $landingPage->slug) }}" 
                               placeholder="Auto-generated from type if left empty">
                        @error('slug')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                        <small style="color: #6b7280; font-size: 0.85rem; margin-top: 4px; display: block;">
                            URL-friendly version (auto-generated if empty)
                        </small>
                    </div>
                </div>
            </div>

            <!-- Service Selection (Multiple, Required, No Language Tabs) -->
            <div class="form-group" style="margin-bottom: 30px; padding-bottom: 20px; border-bottom: 2px solid #e5e7eb;">
                <label class="form-label">Services <span style="color: #dc2626;">*</span></label>
                <select name="service_ids[]" class="form-control" multiple required 
                        style="min-height: 120px; padding: 10px;">
                    @foreach($services as $service)
                        <option value="{{ $service->id }}" 
                                {{ in_array($service->id, old('service_ids', $landingPage->services->pluck('id')->toArray() ?? [])) ? 'selected' : '' }}>
                            {{ $service->name }}
                        </option>
                    @endforeach
                </select>
                @error('service_ids')
                    <div class="error-text">{{ $message }}</div>
                @enderror
                @error('service_ids.*')
                    <div class="error-text">{{ $message }}</div>
                @enderror
                <small style="color: #6b7280; font-size: 0.85rem; margin-top: 4px; display: block;">
                    Hold Ctrl (Windows) or Cmd (Mac) to select multiple services
                </small>
            </div>

            <div class="multilingual-section">
                <div class="language-tabs">
                    @foreach($locales as $locale)
                        <button type="button" class="lang-tab {{ $loop->first ? 'active' : '' }}" data-lang="{{ $locale }}">
                            {{ $languageLabels[$locale] }}
                        </button>
                    @endforeach
                </div>

                @foreach($locales as $locale)
                    @php
                        $suffix = $locale === 'nl' ? '' : "_{$locale}";
                    @endphp
                    <div class="tab-content {{ $loop->first ? 'active' : '' }}" data-lang="{{ $locale }}">
                        <h3 style="font-weight:600; color:#1f2937; margin-bottom:15px;">
                            Multilingual Content — {{ $languageLabels[$locale] }}
                        </h3>

                        <div class="formtabsss">
                            <div class="form-group">
                                <label class="form-label">Header Title</label>
                                <input class="form-control" type="text" name="header_title{{ $suffix }}"
                                       value="{{ old('header_title' . $suffix, $landingPage->{'header_title' . $suffix}) }}">
                                @error('header_title' . $suffix)
                                    <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">Header Description</label>
                                <textarea class="form-control" name="header_desc{{ $suffix }}">{{ old('header_desc' . $suffix, $landingPage->{'header_desc' . $suffix}) }}</textarea>
                                @error('header_desc' . $suffix)
                                    <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">Second Title</label>
                                <input class="form-control" type="text" name="second_title{{ $suffix }}"
                                       value="{{ old('second_title' . $suffix, $landingPage->{'second_title' . $suffix}) }}">
                                @error('second_title' . $suffix)
                                    <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">Second Description</label>
                                <textarea class="form-control" name="second_desc{{ $suffix }}">{{ old('second_desc' . $suffix, $landingPage->{'second_desc' . $suffix}) }}</textarea>
                                @error('second_desc' . $suffix)
                                    <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">Third Title</label>
                                <input class="form-control" type="text" name="third_title{{ $suffix }}"
                                       value="{{ old('third_title' . $suffix, $landingPage->{'third_title' . $suffix}) }}">
                                @error('third_title' . $suffix)
                                    <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">Third Description</label>
                                <textarea class="form-control" name="third_desc{{ $suffix }}">{{ old('third_desc' . $suffix, $landingPage->{'third_desc' . $suffix}) }}</textarea>
                                @error('third_desc' . $suffix)
                                    <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="form-group" style="margin-top:25px;">
                <label class="form-label">Featured File / Image</label>
                <input type="file" name="file" class="form-control">
                @error('file')
                    <div class="error-text">{{ $message }}</div>
                @enderror

                @if($landingPage->file)
                    <img src="{{ asset($landingPage->file) }}" class="preview-image" alt="Preview">
                @endif
            </div>

            <div class="feature-builder">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:15px;">
                    <h3 style="margin:0; font-weight:600;">Feature Highlights</h3>
                    <small style="color:#6b7280;">Icon + multilingual title & description</small>
                </div>

                <div id="featureList"></div>
                <button type="button" id="addFeatureBtn" class="add-feature-btn">+ Add Feature</button>
            </div>

            <button type="submit" class="action-button">
                {{ $landingPage->exists ? 'Update Landing Page' : 'Save Landing Page' }}
            </button>
        </form>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Language tabs
        const tabs = document.querySelectorAll('.lang-tab');
        const contents = document.querySelectorAll('.tab-content');
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                tabs.forEach(t => t.classList.remove('active'));
                contents.forEach(c => c.classList.remove('active'));

                tab.classList.add('active');
                const target = document.querySelector(`.tab-content[data-lang="${tab.dataset.lang}"]`);
                target.classList.add('active');
            });
        });

        // Feature builder
        const configEl = document.getElementById('landingPageForm');
        const locales = JSON.parse(configEl.dataset.locales || '[]');
        const localeLabels = JSON.parse(configEl.dataset.languageLabels || '{}');
        const storageBaseUrl = configEl.dataset.storage || '';
        const featureList = document.getElementById('featureList');
        const addFeatureBtn = document.getElementById('addFeatureBtn');
        const existingFeatures = JSON.parse(configEl.dataset.features || '[]');
        let featureIndex = 0;

        const encodePath = (path) => {
            if (!path) return '';
            return path.split('/').map(segment => encodeURIComponent(segment)).join('/');
        };

        const escapeHtml = (value = '') => {
            return String(value ?? '')
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&#039;');
        };

        const createField = (index, locale, type, value = '') => {
            const label = type === 'title' ? 'Title' : 'Description';
            const fieldName = `features[${index}][${type}][${locale}]`;
            if (type === 'title') {
                return `
                    <div class="form-group">
                        <label class="form-label">${label} (${localeLabels[locale]})</label>
                        <input class="form-control" type="text" name="${fieldName}" value="${escapeHtml(value)}">
                    </div>
                `;
            }

            return `
                <div class="form-group">
                    <label class="form-label">${label} (${localeLabels[locale]})</label>
                    <textarea class="form-control" name="${fieldName}">${escapeHtml(value)}</textarea>
                </div>
            `;
        };

        const renderFeature = (data = null) => {
            const wrapper = document.createElement('div');
            wrapper.classList.add('feature-card');
            wrapper.dataset.index = featureIndex;

            const existingIcon = data?.icon_existing ?? data?.icon ?? null;
            const iconValueForInput = escapeHtml(existingIcon ?? '');
            const titleValues = data?.title ?? {};
            const descValues = data?.desc ?? {};

            let localeFields = '';
            locales.forEach(locale => {
                localeFields += `
                    <div class="formtabsss" style="margin-top:10px;">
                        ${createField(featureIndex, locale, 'title', titleValues[locale] ?? '')}
                        ${createField(featureIndex, locale, 'desc', descValues[locale] ?? '')}
                    </div>
                `;
            });

            wrapper.innerHTML = `
                <button type="button" class="remove-feature-btn" title="Remove Feature">&times;</button>
                <div class="form-group">
                    <label class="form-label">Icon (upload image / SVG)</label>
                    <input class="form-control" type="file" name="features[${featureIndex}][icon]" accept=".png,.jpg,.jpeg,.svg,.webp,.avif">
                    <input type="hidden" name="features[${featureIndex}][icon_existing]" value="${iconValueForInput}">
                    ${existingIcon ? `
                        <div class="current-icon-preview">
                            <img src="${storageBaseUrl}/${encodePath(existingIcon)}" alt="Feature Icon Preview">
                            <small>Current icon is kept unless you upload a new one.</small>
                        </div>
                    ` : ''}
                </div>
                ${localeFields}
            `;

            wrapper.querySelector('.remove-feature-btn').addEventListener('click', () => {
                wrapper.remove();
            });

            featureList.appendChild(wrapper);
            featureIndex++;
        };

        addFeatureBtn.addEventListener('click', () => renderFeature());

        if (existingFeatures && existingFeatures.length) {
            existingFeatures.forEach(feature => renderFeature(feature));
        } else {
            renderFeature();
        }

        // Auto-generate slug from type
        const typeInput = document.querySelector('input[name="type"]');
        const slugInput = document.querySelector('input[name="slug"]');
        
        if (typeInput && slugInput) {
            typeInput.addEventListener('input', function() {
                if (!slugInput.value || slugInput.dataset.autoGenerated === 'true') {
                    const slug = this.value
                        .toLowerCase()
                        .trim()
                        .replace(/[^\w\s-]/g, '')
                        .replace(/[\s_-]+/g, '-')
                        .replace(/^-+|-+$/g, '');
                    slugInput.value = slug;
                    slugInput.dataset.autoGenerated = 'true';
                }
            });

            slugInput.addEventListener('input', function() {
                if (this.value) {
                    this.dataset.autoGenerated = 'false';
                }
            });
        }
    });
</script>
@endsection

