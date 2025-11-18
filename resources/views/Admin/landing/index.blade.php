@extends('layouts.admin')

<style>
    .search-container {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .search-input {
        padding: 8px 15px;
        border: 1px solid #e2e8f0;
        border-radius: 6px;
        width: 300px;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .search-input:focus {
        outline: none;
        border-color: #4f46e5;
        box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.1);
    }

    .reset-btn {
        padding: 8px 15px;
        background-color: #f3f4f6;
        color: #4b5563;
        border-radius: 6px;
        text-decoration: none;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .reset-btn:hover {
        background-color: #e5e7eb;
    }

    .badge {
        background-color: #4f46e5;
        color: white;
        border-radius: 9999px;
        padding: 4px 10px;
        font-size: 0.75rem;
        margin: 2px;
    }
</style>

@section('content')
    <main class="main-content">
        @include('layouts.header')
        <div class="content">
            <div class="table-section">
                <div class="table-header">
                    <h2>Landing Form</h2>
                    <div class="search-container">
                        <input type="text" id="searchInput" placeholder="Search by name or email" class="search-input">
                        <a href="{{ route('landing.index') }}" class="btn btn-secondary reset-btn">
                            <i class="fa fa-undo"></i> Reset
                        </a>
                    </div>
                </div>

                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Service</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="contactsTableBody">
                            @forelse($contacts as $key => $contact)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>
                                        <span class="badge">
                                            {{ $contact->service_id ?? 'N/A' }}
                                        </span>
                                    </td>
                                    <td>{{ $contact->message ?? 'N/A' }}</td>
                                    <td>
                                        <form action="{{ route('landing.delete', $contact->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="action-btn delete" data-tooltip="Delete Record">
                                                <span class="btn-content">
                                                    <i class="fa-light fa-trash"></i>
                                                    <p class="btn-text">Delete</p>
                                                </span></button>
                                        </form>
                                        <button
                                            class="action-btn view"
                                            data-tooltip="View Details"
                                            data-name="{{ $contact->name }}"
                                            data-email="{{ $contact->email }}"
                                            data-phone="{{ $contact->phone }}"
                                            data-service="{{ $contact->service_id ?? 'N/A' }}"
                                            data-message="{{ $contact->message ?? 'N/A' }}"
                                        >
                                            <span class="btn-content">
                                                <i class="fa-light fa-eye"></i>
                                                <p class="btn-text">View</p>
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">No Contact Records Found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div id="pagination-container">
                        @include('partials.custom_pagination', ['paginator' => $contacts])
                    </div>
                </div>
            </div>
        </div>
    </main>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchInput');
        const contactsTableBody = document.getElementById('contactsTableBody');
        const paginationContainer = document.getElementById('pagination-container');
        let searchTimeout;

        // ✅ Typing ke sath live search
        searchInput.addEventListener('input', function () {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                const searchValue = this.value;
                fetchContacts(searchValue);
            }, 500);
        });

        // ✅ Enter press handle karo
        searchInput.addEventListener('keydown', function (e) {
            if (e.key === 'Enter') {
                e.preventDefault(); // page reload rokne ke liye
                fetchContacts(this.value);
            }
        });

        function fetchContacts(search = '') {
            const url = new URL('{{ route('landing.search') }}', window.location.origin);
            if (search) {
                url.searchParams.append('search', search);
            }

            fetch(url)
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');

                    const newTableBody = doc.getElementById('contactsTableBody');
                    contactsTableBody.innerHTML = newTableBody.innerHTML;

                    const newPagination = doc.getElementById('pagination-container');
                    paginationContainer.innerHTML = newPagination.innerHTML;
                })
                .catch(error => console.error('Error:', error));
        }

        // ===== Modal logic =====
        const modal = document.getElementById('contactDetailModal');
        const modalContent = document.getElementById('modalContent');
        const closeModalBtn = document.getElementById('closeModalBtn');

        document.getElementById('contactsTableBody').addEventListener('click', function(e) {
            if (e.target.closest('.action-btn.view')) {
                const btn = e.target.closest('.action-btn.view');
                const name = btn.getAttribute('data-name');
                const email = btn.getAttribute('data-email');
                const phone = btn.getAttribute('data-phone');
                const service = btn.getAttribute('data-service');
                const message = btn.getAttribute('data-message');

                modalContent.innerHTML = `
                    <p><strong>Name:</strong> ${name}</p>
                    <p><strong>Email:</strong> ${email}</p>
                    <p><strong>Phone:</strong> ${phone}</p>
                    <p><strong>Service:</strong> ${service}</p>
                    <p><strong>Message:</strong> ${message}</p>
                `;
                modal.style.display = 'flex';
            }
        });

        closeModalBtn.addEventListener('click', function() {
            modal.style.display = 'none';
        });

        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });
    });
</script>

    <!-- Contact Detail Modal -->
    <div id="contactDetailModal" class="modal" style="display:none; position:fixed; top: 17%; left: 35%; width:100vw; height:100vh; background: none; align-items:center; justify-content:center; z-index:9999;">
        <div style="background:#fff; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.116); padding:30px; border-radius:8px; min-width:350px; max-width:90vw; position:relative;">
            <button id="closeModalBtn" style="position:absolute; top:10px; right:10px; background:none; border:none; font-size:20px; cursor:pointer;">&times;</button>
            <h3>Contact Details</h3>
            <div id="modalContent">
                <!-- Details will be injected here -->
            </div>
        </div>
    </div>
@endsection