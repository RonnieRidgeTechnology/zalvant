@extends('layouts.admin')

@section('content')
<main class="main-content">
    @include('layouts.header')
    <div class="formContainer">
        <div class="appt-settings-wrapper">
            <h2 class="appt-settings-title">Appointment Settings</h2>
            <form id="appointmentSettingsForm">
                @csrf
                <div class="appt-settings-grid">
                    @foreach($settings as $setting)
                    <div class="appt-setting-item">
                        <div class="appt-setting-header">
                            <span class="appt-day-badge">{{ $setting->day }}</span>
                            <label class="appt-toggle">
                                <input type="checkbox"
                                       class="appt-status-toggle"
                                       data-id="{{ $setting->id }}"
                                       {{ $setting->status ? 'checked' : '' }}>
                                <span class="appt-toggle-slider"></span>
                            </label>
                        </div>
                    </div>
                    @endforeach
                </div>
            </form>
        </div>
    </div>
</main>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggles = document.querySelectorAll('.appt-status-toggle');

        toggles.forEach(toggle => {
            toggle.addEventListener('change', function () {
                const settingId = this.dataset.id;
                const status = this.checked ? 1 : 0;

                fetch("{{ route('appointment-settings.update') }}", {
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        id: settingId,
                        status: status
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        // Show success message
                        alert('Status updated successfully');
                    } else {
                        // Revert the toggle if update failed
                        this.checked = !this.checked;
                        alert(data.message || 'Failed to update status');
                    }
                })
                .catch(error => {
                    // Revert the toggle on error
                    this.checked = !this.checked;
                    console.error('Error:', error);
                    alert('Something went wrong!');
                });
            });
        });
    });
</script>

<style>
.appt-settings-wrapper {
    background: #fff;
    border-radius: 16px;
    padding: 2rem;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
}

.appt-settings-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: #1a1d2b;
    margin-bottom: 1.5rem;
}

.appt-settings-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 1rem;
}

.appt-setting-item {
    background: #f8fafc;
    border-radius: 12px;
    padding: 1rem;
    transition: all 0.3s ease;
}

.appt-setting-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.appt-setting-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.appt-day-badge {
    background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-weight: 600;
    font-size: 0.9rem;
    box-shadow: 0 2px 4px rgba(59, 130, 246, 0.2);
}

/* Toggle Switch Styles */
.appt-toggle {
    position: relative;
    display: inline-block;
    width: 50px;
    height: 24px;
}

.appt-toggle input {
    opacity: 0;
    width: 0;
    height: 0;
}

.appt-toggle-slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #e5e7eb;
    transition: .4s;
    border-radius: 24px;
}

.appt-toggle-slider:before {
    position: absolute;
    content: "";
    height: 18px;
    width: 18px;
    left: 3px;
    bottom: 3px;
    background-color: white;
    transition: .4s;
    border-radius: 50%;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

input:checked + .appt-toggle-slider {
    background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
}

input:checked + .appt-toggle-slider:before {
    transform: translateX(26px);
}

input:focus + .appt-toggle-slider {
    box-shadow: 0 0 1px #3b82f6;
}
</style>
@endsection