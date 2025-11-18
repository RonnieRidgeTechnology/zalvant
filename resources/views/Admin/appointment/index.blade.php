@extends('layouts.admin')

<style>
    #calendar {
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
        font-family: 'Arial', sans-serif;
    }

    .fc-event {
        cursor: pointer;
        padding: 8px;
        margin: 2px 0;
        border-radius: 4px;
        font-size: 0.9em;
        border: none !important;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .fc-event-title {
        font-weight: 600;
        color: white !important;
    }

    .fc-toolbar-title {
        font-size: 1.5em !important;
        font-weight: 600 !important;
        color: #333;
    }

    .fc-button-primary {
        background-color: #4a90e2 !important;
        border-color: #4a90e2 !important;
    }

    .fc-button-primary:hover {
        background-color: #357abd !important;
        border-color: #357abd !important;
    }

    .booking-details {
        padding: 20px;
        background: #f8f9fa;
        border-radius: 8px;
        margin-top: 15px;
    }

    .booking-details p {
        margin-bottom: 12px;
        line-height: 1.6;
        color: #444;
    }

    .booking-details strong {
        display: inline-block;
        width: 120px;
        color: #2c3e50;
        font-weight: 600;
    }

    /* Modal styles */
    .modal-overlay {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0; top: 0;
        width: 100%; height: 100%;
        background-color: rgba(0,0,0,0.5);
        justify-content: center;
        align-items: center;
    }

    .modal {
        background: white;
        border-radius: 8px;
        max-width: 600px;
        width: 90%;
        padding: 20px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .modal-header h3 {
        margin: 0;
        font-weight: 700;
        color: #333;
    }

    .close-modal {
        background: none;
        border: none;
        font-size: 1.5rem;
        cursor: pointer;
        color: #999;
    }

    .close-modal:hover {
        color: #333;
    }

    .btn-cancel {
        background-color: #ccc;
        border: none;
        padding: 8px 15px;
        border-radius: 5px;
        cursor: pointer;
        font-weight: 600;
        color: #333;
    }

    .btn-cancel:hover {
        background-color: #999;
        color: white;
    }
</style>

@section('content')
<main class="main-content">
    @include('layouts.header')
    <div class="content">
        <div class="table-section">
            <div class="table-header">
                <h2>Appointment Calendar</h2>
            </div>
            <div id="calendar"></div>
        </div>
    </div>
</main>

<!-- View Booking Modal -->
<div class="modal-overlay" id="viewBookingModal">
    <div class="modal" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
        <div class="modal-header">
            <h3 id="modalTitle">Appointment Details</h3>
            <button class="close-modal" id="closeViewModal" aria-label="Close modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="booking-details">
                <p><strong>Name:</strong> <span id="bookingName"></span></p>
                <p><strong>Email:</strong> <span id="bookingEmail"></span></p>
                <p><strong>Date:</strong> <span id="bookingDate"></span></p>
                <p><strong>Time Slot:</strong> <span id="bookingTimeSlot"></span></p>
                <p><strong>Services:</strong> <span id="bookingServices"></span></p>
                <p><strong>Message:</strong> <span id="bookingMessage"></span></p>
            </div>
            <div class="form-actions" style="text-align: right; margin-top: 20px;">
                <button type="button" class="btn-cancel" id="closeViewBtn">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.10/index.global.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.10/index.global.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@6.1.10/index.global.min.js'></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');

    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        events: '/admin/bookings/events', // Your backend endpoint that returns appointments in JSON
        eventDisplay: 'block',
        eventTimeFormat: {
            hour: '2-digit',
            minute: '2-digit',
            meridiem: true
        },
        height: 'auto',
        dayMaxEvents: true,
        allDaySlot: true,
        eventDidMount: function(info) {
            // Make sure event title text color is white for readability on colored background
            info.el.querySelector('.fc-event-title').style.color = 'white';
        },
        eventClick: function(info) {
            // Extract just the name from title which is formatted like "Monday, 2025-05-15 - John Doe"
            const fullTitle = info.event.title;
            const namePart = fullTitle.split(' - ')[1] || fullTitle;

            // Fill modal with appointment details
            document.getElementById('bookingName').textContent = namePart;
            document.getElementById('bookingEmail').textContent = info.event.extendedProps.email || '';
            document.getElementById('bookingDate').textContent = info.event.start.toLocaleDateString();
            document.getElementById('bookingTimeSlot').textContent = info.event.extendedProps.timeSlot || '';
            document.getElementById('bookingServices').textContent = info.event.extendedProps.services || '';
            document.getElementById('bookingMessage').textContent = info.event.extendedProps.message || '';

            // Show the modal
            document.getElementById('viewBookingModal').style.display = 'flex';
        }
    });

    calendar.render();

    // Modal close handlers
    document.getElementById('closeViewModal').addEventListener('click', function () {
        document.getElementById('viewBookingModal').style.display = 'none';
    });
    document.getElementById('closeViewBtn').addEventListener('click', function () {
        document.getElementById('viewBookingModal').style.display = 'none';
    });
    window.addEventListener('click', function (e) {
        if (e.target === document.getElementById('viewBookingModal')) {
            document.getElementById('viewBookingModal').style.display = 'none';
        }
    });
});
</script>
@endsection
