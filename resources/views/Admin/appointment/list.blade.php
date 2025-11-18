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
</style>
@section('content')
<main class="main-content">
    @include('layouts.header')

    <div class="content">
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon bg-primary">
                    <i class="fa-light fa-calendar-check"></i>
                </div>
                <div class="stat-info">
                    <h4>{{ $appointments->count() }}</h4>
                    <p>Total Appointments</p>
                </div>
            </div>
        </div>

        <div class="table-section">
            <div class="table-header">
                <h2>Appointments Record</h2>
                <div class="search-container">
                    <input type="text" id="searchInput" placeholder="Search by name or email" class="search-input">
                    <a href="{{ route('appointment.list') }}" class="btn btn-secondary reset-btn">
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
                            <th>Date</th>
                            <th>Slot</th>
                            <th>Message</th>
                            <th>Services</th>
                        </tr>
                    </thead>
                    <tbody id="appointmentsTableBody">
                        @forelse($appointments as $key => $appointment)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $appointment->name }}</td>
                                <td>{{ $appointment->email }}</td>
                                <td>{{ $appointment->date }}</td>
                                <td>{{ $appointment->slot }}</td>
                                <td>{{ $appointment->message }}</td>
                                <td>
                                    @foreach($appointment->services as $service)
                                        <span class="badge badge-info" style="background-color: #4f46e5; color: white; border-radius: 9999px; padding: 4px 10px; font-size: 0.75rem; margin: 2px;">
                                            {{ $service->name }}
                                        </span>
                                    @endforeach
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No Appointments Record Found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div id="pagination-container">
                    @include('partials.custom_pagination', ['paginator' => $appointments])
                </div>
            </div>
        </div>
    </div>
</main>


<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const appointmentsTableBody = document.getElementById('appointmentsTableBody');
    const paginationContainer = document.getElementById('pagination-container');
    let searchTimeout;

    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            const searchValue = this.value;
            fetchAppointments(searchValue);
        }, 500);
    });

    function fetchAppointments(search = '') {
        const url = new URL('{{ route('appointment.search') }}', window.location.origin);
        if (search) {
            url.searchParams.append('search', search);
        }

        fetch(url)
            .then(response => response.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');

                // Update table body
                const newTableBody = doc.getElementById('appointmentsTableBody');
                appointmentsTableBody.innerHTML = newTableBody.innerHTML;

                // Update pagination
                const newPagination = doc.getElementById('pagination-container');
                paginationContainer.innerHTML = newPagination.innerHTML;
            })
            .catch(error => console.error('Error:', error));
    }
});
</script>

@endsection
