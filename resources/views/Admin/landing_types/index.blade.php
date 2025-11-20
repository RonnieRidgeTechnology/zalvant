@extends('layouts.admin')

@php
    use Illuminate\Support\Str;
@endphp

@section('content')
<main class="main-content">
    @include('layouts.header')

    <div class="content">
        <div class="table-section">
            <div class="table-header" style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:1rem;">
                <div>
                    <h2 style="margin-bottom:4px;">Landing Types</h2>
                    <p style="color:#6b7280; margin:0;">Manage landing page categories/types.</p>
                </div>

                <div style="display:flex; gap:10px;">
                    <a href="{{ route('landing-types.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Add Landing Type
                    </a>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success" style="margin-bottom:15px;">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($types as $index => $type)
                            <tr>
                                <td>{{ $types->firstItem() + $index }}</td>
                                <td>{{ $type->name }}</td>
                                <td>
                                    <code style="background:#f3f4f6;padding:4px 8px;border-radius:4px;font-size:0.85rem;">
                                        {{ $type->slug }}
                                    </code>
                                </td>
                                <td>
                                    <form action="{{ route('landing-types.toggle-status', $type) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" style="border:none; border-radius:999px; padding:4px 12px; font-size:0.85rem; font-weight:600; cursor:pointer; color:#fff; background-color:{{ $type->status ? '#10b981' : '#ef4444' }};">
                                            {{ $type->status ? 'Active' : 'Inactive' }}
                                        </button>
                                    </form>
                                </td>
                                <td>{{ $type->created_at?->format('d M Y') }}</td>
                                <td>
                                    <div style="display:flex; gap:8px;">
                                        <a href="{{ route('landing-types.edit', $type) }}" class="action-btn view">
                                            <i class="fa-light fa-pen-to-square"></i>
                                            <span>Edit</span>
                                        </a>
                                        <form action="{{ route('landing-types.destroy', $type) }}" method="POST" onsubmit="return confirm('Delete this landing type?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="action-btn delete">
                                                <i class="fa-light fa-trash"></i>
                                                <span>Delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No landing types found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                @if($types->hasPages())
                    <div style="margin-top:20px;">
                        {{ $types->links('partials.custom_pagination') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection

