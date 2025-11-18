@extends('layouts.admin')
@php
    use Illuminate\Support\Str;
@endphp

@section('content')
<style>
    .search-container {
        display: flex;
        gap: 10px;
        align-items: center;
        flex-wrap: wrap;
    }

    .search-input {
        padding: 10px 15px;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        font-size: 14px;
        transition: all 0.3s ease;
        background-color: #fff;
        color: #374151;
    }

    .search-input:focus {
        outline: none;
        border-color: #4f46e5;
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
    }

    .search-input select {
        cursor: pointer;
    }

    .service-filter {
        min-width: 200px;
        padding: 10px 15px;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        font-size: 14px;
        background-color: #fff;
        color: #374151;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .service-filter:focus {
        outline: none;
        border-color: #4f46e5;
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
    }

    .reset-btn {
        padding: 10px 18px;
        background-color: #f3f4f6;
        color: #4b5563;
        border-radius: 8px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.3s ease;
        border: 1px solid #e5e7eb;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .reset-btn:hover {
        background-color: #e5e7eb;
        color: #1f2937;
        transform: translateY(-1px);
    }

    .add-btn {
        padding: 10px 20px;
        background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
        color: white;
        border-radius: 8px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 2px 4px rgba(79, 70, 229, 0.2);
    }

    .add-btn:hover {
        background: linear-gradient(135deg, #4338ca 0%, #6d28d9 100%);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(79, 70, 229, 0.3);
    }

    .badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: capitalize;
        letter-spacing: 0.3px;
    }

    .badge-service {
        background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
        color: white;
        box-shadow: 0 2px 4px rgba(79, 70, 229, 0.2);
    }

    .badge-feature {
        background-color: #10b981;
        color: white;
        box-shadow: 0 2px 4px rgba(16, 185, 129, 0.2);
    }

    .table-header {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        padding: 24px;
        border-radius: 12px;
        margin-bottom: 24px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    }

    .table-header h2 {
        font-size: 1.75rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 6px;
        letter-spacing: -0.5px;
    }

    .table-header p {
        color: #64748b;
        font-size: 0.9rem;
        margin: 0;
    }

    .table-container {
        background: white;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .data-table {
        width: 100%;
        border-collapse: collapse;
    }

    .data-table thead {
        background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
    }

    .data-table thead th {
        padding: 16px;
        text-align: left;
        font-weight: 600;
        color: white;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .data-table tbody tr {
        border-bottom: 1px solid #e5e7eb;
        transition: all 0.2s ease;
    }

    .data-table tbody tr:hover {
        background-color: #f9fafb;
    }

    .data-table tbody td {
        padding: 16px;
        color: #374151;
        font-size: 0.9rem;
    }

    .data-table tbody td:first-child {
        font-weight: 600;
        color: #6b7280;
    }

    .action-btn {
        padding: 8px 12px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 500;
        transition: all 0.2s ease;
        border: none;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .action-btn.view {
        background-color: #dbeafe;
        color: #1e40af;
    }

    .action-btn.view:hover {
        background-color: #bfdbfe;
        transform: translateY(-1px);
    }

    .action-btn.delete {
        background-color: #fee2e2;
        color: #dc2626;
    }

    .action-btn.delete:hover {
        background-color: #fecaca;
        transform: translateY(-1px);
    }

    .alert-success {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        padding: 14px 20px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-weight: 500;
        box-shadow: 0 2px 4px rgba(16, 185, 129, 0.2);
    }

    .text-center {
        text-align: center;
        padding: 40px 20px;
        color: #9ca3af;
        font-style: italic;
    }

    @media (max-width: 768px) {
        .table-header {
            padding: 16px;
        }

        .search-container {
            flex-direction: column;
            width: 100%;
        }

        .search-input,
        .service-filter {
            width: 100%;
        }

        .add-btn,
        .reset-btn {
            width: 100%;
            justify-content: center;
        }

        .data-table {
            font-size: 0.8rem;
        }

        .data-table thead th,
        .data-table tbody td {
            padding: 10px 8px;
        }
    }
</style>

<main class="main-content">
    @include('layouts.header')

    <div class="content">
        <div class="table-section">
            <div class="table-header">
                <div style="display:flex; justify-content:space-between; align-items:flex-start; flex-wrap:wrap; gap:1.5rem;">
                    <div>
                        <h2>Landing Pages</h2>
                        <p>Manage hero/section content for marketing pages.</p>
                    </div>

                    <div class="search-container">
                        <form action="{{ route('landing-pages.index') }}" method="GET" style="display:flex; gap:10px; align-items:center; flex-wrap:wrap;">
                            <select name="service_id" class="service-filter" onchange="this.form.submit()">
                                <option value="">All Services</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}" {{ $serviceId == $service->id ? 'selected' : '' }}>
                                        {{ $service->name }}
                                    </option>
                                @endforeach
                            </select>
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search titles..." class="search-input" style="width:250px;">
                            <a href="{{ route('landing-pages.index') }}" class="reset-btn">
                                <i class="fa fa-undo"></i> Reset
                            </a>
                        </form>
                        <a href="{{ route('landing-pages.create') }}" class="add-btn">
                            <i class="fa fa-plus"></i> Add Landing Page
                        </a>
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    <i class="fa fa-check-circle" style="margin-right:8px;"></i>
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Service</th>
                            <th>Header Title</th>
                            <th>Second Title</th>
                            <th>Third Title</th>
                            <th>Features</th>
                            <th>Updated</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($landingPages as $index => $page)
                            <tr>
                                <td>{{ $landingPages->firstItem() + $index }}</td>
                                <td>
                                    @php
                                        $service = $services->firstWhere('id', $page->service_id);
                                    @endphp
                                    <span class="badge badge-service">
                                        {{ $service ? $service->name : 'N/A' }}
                                    </span>
                                </td>
                                <td>
                                    <strong style="color: #1f2937;">
                                        {{ $page->header_title ? Str::limit($page->header_title, 45) : '—' }}
                                    </strong>
                                </td>
                                <td>{{ $page->second_title ? Str::limit($page->second_title, 45) : '—' }}</td>
                                <td>{{ $page->third_title ? Str::limit($page->third_title, 45) : '—' }}</td>
                                <td>
                                    <span class="badge badge-feature">
                                        <i class="fa fa-list" style="margin-right:4px;"></i>
                                        {{ collect($page->feature_blocks ?? [])->count() }} items
                                    </span>
                                </td>
                                <td>
                                    <span style="color: #6b7280; font-size: 0.85rem;">
                                        <i class="fa fa-calendar" style="margin-right:4px;"></i>
                                        {{ $page->updated_at?->format('d M Y') }}
                                    </span>
                                </td>
                                <td>
                                    <div style="display:flex; gap:8px;">
                                        <a href="{{ route('landing-pages.edit', $page) }}" class="action-btn view" data-tooltip="Edit Landing Page">
                                            <i class="fa-light fa-pen-to-square"></i>
                                            <span>Edit</span>
                                        </a>
                                        <form action="{{ route('landing-pages.destroy', $page) }}" method="POST" onsubmit="return confirm('Delete this landing page?');" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-btn delete" data-tooltip="Delete Landing Page">
                                                <i class="fa-light fa-trash"></i>
                                                <span>Delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">
                                    <div style="padding: 60px 20px;">
                                        <i class="fa fa-inbox" style="font-size: 3rem; color: #d1d5db; margin-bottom: 16px;"></i>
                                        <p style="font-size: 1.1rem; color: #9ca3af; margin: 0;">No landing pages found.</p>
                                        <p style="font-size: 0.9rem; color: #d1d5db; margin-top: 8px;">Create your first landing page to get started.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                @if($landingPages->hasPages())
                    <div style="padding: 24px; background-color: #f9fafb; border-top: 1px solid #e5e7eb;">
                        {{ $landingPages->links('partials.custom_pagination') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection

