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

        <form action="{{ $formAction }}" method="POST">
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

            <button type="submit" class="action-button">
                {{ $type->exists ? 'Update Landing Type' : 'Save Landing Type' }}
            </button>
        </form>
    </div>
</main>
@endsection

