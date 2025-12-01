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

    .switch {
        position: relative;
        display: inline-block;
        width: 46px;
        height: 26px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #d1d5db;
        transition: 0.3s;
        border-radius: 30px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 20px;
        width: 20px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: 0.3s;
        border-radius: 50%;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
    }

    input:checked + .slider {
        background-color: #10b981;
    }

    input:checked + .slider:before {
        transform: translateX(20px);
    }
</style>

<main class="main-content">
    @include('layouts.header')

    <div class="formContainer">
        <h2 class="section-header">{{ $type->exists ? 'Edit Landing Type' : 'Create Landing Type' }}</h2>

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

            <div class="form-group">
                <label class="form-label">Name <span style="color:#dc2626">*</span></label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $type->name) }}" required>
                @error('name')
                    <div class="error-text" style="color:#dc2626; font-size:0.85rem; margin-top:4px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Name (English)</label>
                <input type="text" name="name_en" class="form-control" value="{{ old('name_en', $type->name_en) }}">
                @error('name_en')
                    <div class="error-text" style="color:#dc2626; font-size:0.85rem; margin-top:4px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Name (French)</label>
                <input type="text" name="name_fr" class="form-control" value="{{ old('name_fr', $type->name_fr) }}">
                @error('name_fr')
                    <div class="error-text" style="color:#dc2626; font-size:0.85rem; margin-top:4px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Name (German)</label>
                <input type="text" name="name_de" class="form-control" value="{{ old('name_de', $type->name_de) }}">
                @error('name_de')
                    <div class="error-text" style="color:#dc2626; font-size:0.85rem; margin-top:4px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Display Order</label>
                <input type="number" name="order" class="form-control" min="0" value="{{ old('order', $type->order) }}" placeholder="e.g. 1">
                @error('order')
                    <div class="error-text" style="color:#dc2626; font-size:0.85rem; margin-top:4px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group" style="display:flex; align-items:center; gap:15px;">
                <div>
                    <label class="form-label" style="margin-bottom:0;">Status</label>
                    <p style="color:#6b7280; margin:4px 0 0;">Toggle to enable/disable this landing type.</p>
                </div>
                <div>
                    <input type="hidden" name="status" value="0">
                    <label class="switch">
                        <input type="checkbox" name="status" value="1" {{ old('status', $type->status ?? 1) ? 'checked' : '' }}>
                        <span class="slider round"></span>
                    </label>
                </div>
                @error('status')
                    <div class="error-text" style="color:#dc2626; font-size:0.85rem; margin-top:4px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control" value="{{ old('slug', $type->slug) }}" placeholder="Auto-generated from name if left empty">
                @error('slug')
                    <div class="error-text" style="color:#dc2626; font-size:0.85rem; margin-top:4px;">{{ $message }}</div>
                @enderror
            </div>

            <hr style="margin: 2rem 0;">
            <h3 class="section-header" style="font-size:1.1rem;">Landing Page Content</h3>

            {{-- Banner section --}}
            <div class="form-group">
                <label class="form-label">Banner Title (NL)</label>
                <input type="text" name="main_title" class="form-control" value="{{ old('main_title', $type->main_title) }}">
            </div>
            <div class="form-group">
                <label class="form-label">Banner Title (EN)</label>
                <input type="text" name="main_title_en" class="form-control" value="{{ old('main_title_en', $type->main_title_en) }}">
            </div>
            <div class="form-group">
                <label class="form-label">Banner Title (FR)</label>
                <input type="text" name="main_title_fr" class="form-control" value="{{ old('main_title_fr', $type->main_title_fr) }}">
            </div>
            <div class="form-group">
                <label class="form-label">Banner Title (DE)</label>
                <input type="text" name="main_title_de" class="form-control" value="{{ old('main_title_de', $type->main_title_de) }}">
            </div>

            <div class="form-group">
                <label class="form-label">Banner Description (NL)</label>
                <textarea name="main_desc" class="form-control" rows="2">{{ old('main_desc', $type->main_desc) }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Banner Description (EN)</label>
                <textarea name="main_desc_en" class="form-control" rows="2">{{ old('main_desc_en', $type->main_desc_en) }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Banner Description (FR)</label>
                <textarea name="main_desc_fr" class="form-control" rows="2">{{ old('main_desc_fr', $type->main_desc_fr) }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Banner Description (DE)</label>
                <textarea name="main_desc_de" class="form-control" rows="2">{{ old('main_desc_de', $type->main_desc_de) }}</textarea>
            </div>

            {{-- Offer section (cards intro) --}}
            <div class="form-group">
                <label class="form-label">Offer Section Title (NL)</label>
                <input type="text" name="offer_title" class="form-control" value="{{ old('offer_title', $type->offer_title) }}">
            </div>
            <div class="form-group">
                <label class="form-label">Offer Section Title (EN)</label>
                <input type="text" name="offer_title_en" class="form-control" value="{{ old('offer_title_en', $type->offer_title_en) }}">
            </div>
            <div class="form-group">
                <label class="form-label">Offer Section Title (FR)</label>
                <input type="text" name="offer_title_fr" class="form-control" value="{{ old('offer_title_fr', $type->offer_title_fr) }}">
            </div>
            <div class="form-group">
                <label class="form-label">Offer Section Title (DE)</label>
                <input type="text" name="offer_title_de" class="form-control" value="{{ old('offer_title_de', $type->offer_title_de) }}">
            </div>

            <div class="form-group">
                <label class="form-label">Offer Section Description (NL)</label>
                <textarea name="offer_desc" class="form-control" rows="2">{{ old('offer_desc', $type->offer_desc) }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Offer Section Description (EN)</label>
                <textarea name="offer_desc_en" class="form-control" rows="2">{{ old('offer_desc_en', $type->offer_desc_en) }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Offer Section Description (FR)</label>
                <textarea name="offer_desc_fr" class="form-control" rows="2">{{ old('offer_desc_fr', $type->offer_desc_fr) }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Offer Section Description (DE)</label>
                <textarea name="offer_desc_de" class="form-control" rows="2">{{ old('offer_desc_de', $type->offer_desc_de) }}</textarea>
            </div>

            {{-- AI Deals header --}}
            <div class="form-group">
                <label class="form-label">AI Deals Title (NL)</label>
                <input type="text" name="deal_ai_title" class="form-control" value="{{ old('deal_ai_title', $type->deal_ai_title) }}">
            </div>
            <div class="form-group">
                <label class="form-label">AI Deals Title (EN)</label>
                <input type="text" name="deal_ai_title_en" class="form-control" value="{{ old('deal_ai_title_en', $type->deal_ai_title_en) }}">
            </div>
            <div class="form-group">
                <label class="form-label">AI Deals Title (FR)</label>
                <input type="text" name="deal_ai_title_fr" class="form-control" value="{{ old('deal_ai_title_fr', $type->deal_ai_title_fr) }}">
            </div>
            <div class="form-group">
                <label class="form-label">AI Deals Title (DE)</label>
                <input type="text" name="deal_ai_title_de" class="form-control" value="{{ old('deal_ai_title_de', $type->deal_ai_title_de) }}">
            </div>

            <div class="form-group">
                <label class="form-label">AI Deals Description (NL)</label>
                <textarea name="deal_ai_desc" class="form-control" rows="2">{{ old('deal_ai_desc', $type->deal_ai_desc) }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">AI Deals Description (EN)</label>
                <textarea name="deal_ai_desc_en" class="form-control" rows="2">{{ old('deal_ai_desc_en', $type->deal_ai_desc_en) }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">AI Deals Description (FR)</label>
                <textarea name="deal_ai_desc_fr" class="form-control" rows="2">{{ old('deal_ai_desc_fr', $type->deal_ai_desc_fr) }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">AI Deals Description (DE)</label>
                <textarea name="deal_ai_desc_de" class="form-control" rows="2">{{ old('deal_ai_desc_de', $type->deal_ai_desc_de) }}</textarea>
            </div>

            {{-- Deals 1–3 --}}
            <hr style="margin: 2rem 0 1rem;">
            <h4 class="section-header" style="font-size:1rem;">AI Deals Cards (3 items)</h4>

            {{-- Deal 1 --}}
            <div class="form-group">
                <label class="form-label">Deal 1 Name (NL)</label>
                <input type="text" name="deal1_name" class="form-control" value="{{ old('deal1_name', $type->deal1_name) }}">
            </div>
            <div class="form-group">
                <label class="form-label">Deal 1 Name (EN)</label>
                <input type="text" name="deal1_name_en" class="form-control" value="{{ old('deal1_name_en', $type->deal1_name_en) }}">
            </div>
            <div class="form-group">
                <label class="form-label">Deal 1 Name (FR)</label>
                <input type="text" name="deal1_name_fr" class="form-control" value="{{ old('deal1_name_fr', $type->deal1_name_fr) }}">
            </div>
            <div class="form-group">
                <label class="form-label">Deal 1 Name (DE)</label>
                <input type="text" name="deal1_name_de" class="form-control" value="{{ old('deal1_name_de', $type->deal1_name_de) }}">
            </div>
            <div class="form-group">
                <label class="form-label">Deal 1 Description (NL)</label>
                <textarea name="deal1_desc" class="form-control" rows="2">{{ old('deal1_desc', $type->deal1_desc) }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Deal 1 Description (EN)</label>
                <textarea name="deal1_desc_en" class="form-control" rows="2">{{ old('deal1_desc_en', $type->deal1_desc_en) }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Deal 1 Description (FR)</label>
                <textarea name="deal1_desc_fr" class="form-control" rows="2">{{ old('deal1_desc_fr', $type->deal1_desc_fr) }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Deal 1 Description (DE)</label>
                <textarea name="deal1_desc_de" class="form-control" rows="2">{{ old('deal1_desc_de', $type->deal1_desc_de) }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Deal 1 Image</label>
                @if ($type->deal1_image)
                    <div style="margin-bottom:8px;">
                        <img src="{{ asset($type->deal1_image) }}" alt="Deal 1" style="max-height:60px;">
                    </div>
                @endif
                <input type="file" name="deal1_image" class="form-control" accept="image/*">
            </div>

            {{-- Deal 2 --}}
            <div class="form-group">
                <label class="form-label">Deal 2 Name (NL)</label>
                <input type="text" name="deal2_name" class="form-control" value="{{ old('deal2_name', $type->deal2_name) }}">
            </div>
            <div class="form-group">
                <label class="form-label">Deal 2 Name (EN)</label>
                <input type="text" name="deal2_name_en" class="form-control" value="{{ old('deal2_name_en', $type->deal2_name_en) }}">
            </div>
            <div class="form-group">
                <label class="form-label">Deal 2 Name (FR)</label>
                <input type="text" name="deal2_name_fr" class="form-control" value="{{ old('deal2_name_fr', $type->deal2_name_fr) }}">
            </div>
            <div class="form-group">
                <label class="form-label">Deal 2 Name (DE)</label>
                <input type="text" name="deal2_name_de" class="form-control" value="{{ old('deal2_name_de', $type->deal2_name_de) }}">
            </div>
            <div class="form-group">
                <label class="form-label">Deal 2 Description (NL)</label>
                <textarea name="deal2_desc" class="form-control" rows="2">{{ old('deal2_desc', $type->deal2_desc) }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Deal 2 Description (EN)</label>
                <textarea name="deal2_desc_en" class="form-control" rows="2">{{ old('deal2_desc_en', $type->deal2_desc_en) }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Deal 2 Description (FR)</label>
                <textarea name="deal2_desc_fr" class="form-control" rows="2">{{ old('deal2_desc_fr', $type->deal2_desc_fr) }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Deal 2 Description (DE)</label>
                <textarea name="deal2_desc_de" class="form-control" rows="2">{{ old('deal2_desc_de', $type->deal2_desc_de) }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Deal 2 Image</label>
                @if ($type->deal2_image)
                    <div style="margin-bottom:8px;">
                        <img src="{{ asset($type->deal2_image) }}" alt="Deal 2" style="max-height:60px;">
                    </div>
                @endif
                <input type="file" name="deal2_image" class="form-control" accept="image/*">
            </div>

            {{-- Deal 3 --}}
            <div class="form-group">
                <label class="form-label">Deal 3 Name (NL)</label>
                <input type="text" name="deal3_name" class="form-control" value="{{ old('deal3_name', $type->deal3_name) }}">
            </div>
            <div class="form-group">
                <label class="form-label">Deal 3 Name (EN)</label>
                <input type="text" name="deal3_name_en" class="form-control" value="{{ old('deal3_name_en', $type->deal3_name_en) }}">
            </div>
            <div class="form-group">
                <label class="form-label">Deal 3 Name (FR)</label>
                <input type="text" name="deal3_name_fr" class="form-control" value="{{ old('deal3_name_fr', $type->deal3_name_fr) }}">
            </div>
            <div class="form-group">
                <label class="form-label">Deal 3 Name (DE)</label>
                <input type="text" name="deal3_name_de" class="form-control" value="{{ old('deal3_name_de', $type->deal3_name_de) }}">
            </div>
            <div class="form-group">
                <label class="form-label">Deal 3 Description (NL)</label>
                <textarea name="deal3_desc" class="form-control" rows="2">{{ old('deal3_desc', $type->deal3_desc) }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Deal 3 Description (EN)</label>
                <textarea name="deal3_desc_en" class="form-control" rows="2">{{ old('deal3_desc_en', $type->deal3_desc_en) }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Deal 3 Description (FR)</label>
                <textarea name="deal3_desc_fr" class="form-control" rows="2">{{ old('deal3_desc_fr', $type->deal3_desc_fr) }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Deal 3 Description (DE)</label>
                <textarea name="deal3_desc_de" class="form-control" rows="2">{{ old('deal3_desc_de', $type->deal3_desc_de) }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Deal 3 Image</label>
                @if ($type->deal3_image)
                    <div style="margin-bottom:8px;">
                        <img src="{{ asset($type->deal3_image) }}" alt="Deal 3" style="max-height:60px;">
                    </div>
                @endif
                <input type="file" name="deal3_image" class="form-control" accept="image/*">
            </div>

            <button type="submit" class="action-button">
                {{ $type->exists ? 'Update Landing Type' : 'Save Landing Type' }}
            </button>
        </form>
    </div>
</main>
@endsection

