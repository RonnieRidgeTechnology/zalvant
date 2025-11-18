@extends('layouts.web')
@section('meta_title', $appointmentupdate->getLocalizedMetaTitle())
@section('meta_desc', $appointmentupdate->getLocalizedMetaDesc())
@section('meta_keyword', $appointmentupdate->getLocalizedMetaKeywords())
<style>
    .appt-main-wrapper {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        background: none;
        padding: 80px 0 80px 0;
    }

    .appt-card {
        display: flex;
        justify-content: center;
        align-items: center;
        background: rgba(255, 255, 255, 0.85);
        border-radius: 28px;
        box-shadow: 0 16px 48px 0 rgba(44, 54, 90, 0.18), 0 1.5px 0 #e5e7eb;
        width: 80%;
        min-height: 540px;
        overflow: hidden;
        border: 1.5px solid rgba(229, 231, 235, 0.7);
        backdrop-filter: blur(8px);
        transition: box-shadow 0.3s;
        margin: 0 auto;
    }

    .appt-card:hover {
        box-shadow: 0 24px 64px 0 rgba(44, 54, 90, 0.22), 0 1.5px 0 #e5e7eb;
    }

    .appt-col {
        flex: 1 1 0;
        padding: 54px 48px 48px 48px;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        background: transparent;
        align-items: center;
    }

    .appt-calendar-col {
        border-right: none;
        min-width: 360px;
        max-width: 440px;
        width: 100%;
    }

    .appt-section-title {
        font-size: 1.6rem;
        font-weight: 600;
        color: #1a1d2b;
        margin-bottom: 0px;
        letter-spacing: -0.5px;
    }

    .appt-calendar-controls {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 16px;
    }

    .appt-cal-btn {
        background: rgba(247, 249, 251, 0.7);
        border: none;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        font-size: 1.4rem;
        color: #23263b;
        cursor: pointer;
        transition: background 0.2s, box-shadow 0.2s, transform 0.15s;
        box-shadow: 0 2px 8px rgba(44, 54, 90, 0.06);
        outline: none;
    }

    .appt-cal-btn:hover,
    .appt-cal-btn:focus {
        background: #e5e7eb;
        transform: scale(1.08);
        box-shadow: 0 4px 16px rgba(59, 130, 246, 0.13);
    }

    .appt-month-label {
        font-weight: 700;
        font-size: 1.18rem;
        color: #23263b;
        flex: 1;
        text-align: center;
        letter-spacing: 0.01em;
    }

    .appt-calendar {
        display: grid;
        grid-template-columns: repeat(7, 44px);
        gap: 10px;
        margin-bottom: 28px;
        justify-content: start;
    }

    .appt-calendar .appt-day-label {
        font-size: 1.07rem;
        color: #5a5d6c;
        text-align: center;
        font-weight: 700;
        margin-bottom: 2px;
        grid-column: span 1;
        letter-spacing: 0.01em;
    }

    .appt-calendar .appt-date-btn {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        border: none;
        background: rgba(247, 249, 251, 0.7);
        color: #23263b;
        font-size: 1.18rem;
        font-weight: 700;
        cursor: pointer;
        transition: background 0.2s, color 0.2s, box-shadow 0.2s, transform 0.15s;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 1px 4px rgba(44, 54, 90, 0.04);
        outline: none;
    }

    .appt-calendar .appt-date-btn.selected,
    .appt-calendar .appt-date-btn:hover,
    .appt-calendar .appt-date-btn:focus {
        background: linear-gradient(90deg, #2563eb 0%, #3b82f6 100%);
        color: #fff;
        box-shadow: 0 4px 16px rgba(59, 130, 246, 0.13);
        transform: scale(1.08);
    }

    .appt-calendar .appt-date-btn:disabled {
        background: #e5e7eb;
        color: #b0b3c6;
        cursor: not-allowed;
        box-shadow: none;
    }

    .appt-divider {
        border-left: 1.5px dashed #e5e7eb;
        height: 36px;
        margin: 0 0 28px 0;
    }

    .appt-times-label {
        font-size: 1.13rem;
        color: #23263b;
        font-weight: 800;
        margin-bottom: 16px;
    }

    .appt-times {
        display: flex;
        flex-direction: column;
        gap: 18px;
        min-height: 180px;
    }

    .appt-time-btn {
        padding: 16px 0;
        border-radius: 14px;
        border: 1.5px solid #e5e7eb;
        background: rgba(247, 249, 251, 0.7);
        font-size: 1.13rem;
        color: #23263b;
        cursor: pointer;
        transition: background 0.2s, border 0.2s, color 0.2s, box-shadow 0.2s, transform 0.15s;
        width: 100%;
        text-align: center;
        box-shadow: 0 1px 4px rgba(44, 54, 90, 0.04);
        outline: none;
    }

    .appt-time-btn.selected,
    .appt-time-btn:hover,
    .appt-time-btn:focus {
        background: linear-gradient(90deg, #2563eb 0%, #3b82f6 100%);
        color: #fff;
        border: 1.5px solid #3b82f6;
        box-shadow: 0 4px 16px rgba(59, 130, 246, 0.13);
        transform: scale(1.04);
    }

    /* Modal Styles */
    .appt-modal-bg {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        background: rgba(44, 54, 90, 0.22);
        justify-content: center;
        align-items: center;
        transition: background 0.3s;
        backdrop-filter: blur(8px);
    }

    .appt-modal-bg.active {
        display: flex;
        animation: fadeIn 0.3s;
    }

    .appt-modal {
        background: rgba(255, 255, 255, 0.92);
        border-radius: 28px;
        box-shadow: 0 24px 64px 0 rgba(44, 54, 90, 0.22);
        padding: 54px 48px 48px 48px;
        min-width: 35%;
        /* max-width: 97vw; */
        position: relative;
        animation: fadeIn 0.35s cubic-bezier(.4, 0, .2, 1);
        border: 1.5px solid rgba(229, 231, 235, 0.7);
        display: flex;
        flex-direction: column;
        align-items: center;
        backdrop-filter: blur(8px);
        height: 417px;
        overflow: auto;
    }

    .Information-from {
        width: 95%;
    }

    .Information-from input {
        font-size: 13px !important;
    }

    .Information-from textarea {
        font-size: 13px !important;
    }

    .appt-modal-close {
        position: absolute;
        top: 18px;
        right: 22px;
        font-size: 2.4rem;
        color: #b0b3c6;
        cursor: pointer;
        transition: color 0.2s, transform 0.15s;
        z-index: 2;
    }

    .appt-modal-close:hover,
    .appt-modal-close:focus {
        color: #3b82f6;
        transform: scale(1.15);
    }

    .appt-form {
        display: flex;
        gap: 30px;
        margin-top: 12px;
        width: 100%;
        max-width: 420px;
        flex-wrap: wrap;
    }

    .appt-form label {
        font-size: 1rem;
        font-weight: 700;
        color: #23263b;
        margin-bottom: 2px;
    }

    .appt-form input,
    .appt-form textarea {
        width: 100%;
        padding: 10px 20px;
        border: 1.5px solid #e5e7eb;
        border-radius: 9px;
        font-size: 1.15rem;
        background: rgba(247, 249, 251, 0.7);
        margin-top: 7px;
        transition: border 0.2s, box-shadow 0.2s, background 0.2s;
        box-shadow: 0 1px 4px rgba(44, 54, 90, 0.04);
        outline: none;
    }

    .appt-form input:focus,
    .appt-form textarea:focus {
        border: 1.5px solid #3b82f6;
        background: #fff;
        box-shadow: 0 2px 8px rgba(59, 130, 246, 0.10);
    }

    .appt-submit-btn {
        width: 100%;
        padding: 18px 0;
        background: linear-gradient(90deg, #2563eb 0%, #3b82f6 100%);
        color: #fff;
        font-size: 1.22rem;
        font-weight: 500;
        border: none;
        border-radius: 14px;
        cursor: pointer;
        margin-top: 8px;
        transition: background 0.2s, box-shadow 0.2s, transform 0.15s;
        box-shadow: 0 2px 8px rgba(44, 54, 90, 0.07);
        letter-spacing: 0.01em;
    }

    .appt-submit-btn:hover,
    .appt-submit-btn:focus {
        background: linear-gradient(90deg, #1d4ed8 0%, #2563eb 100%);
        box-shadow: 0 4px 16px rgba(59, 130, 246, 0.13);
        transform: scale(1.03);
    }

    .appt-submit-btn:active {
        background: #2563eb;
    }

    .appt-confirm-modal {
        min-width: 350px;
        max-width: 97vw;
        text-align: center;
    }

    .appt-confirm-icon {
        margin-bottom: 18px;
    }

    /* Chip-style multi-select */
    .appt-multiselect-chips {
        position: relative;
        margin-top: 7px;
        user-select: none;
        min-height: 48px;
    }

    .appt-multiselect-chips .chips-container {
        display: flex;
        flex-wrap: wrap;
        gap: 9px;
        min-height: 32px;
        margin-bottom: 2px;
    }

    .appt-multiselect-chips .chip {
        background: rgba(59, 130, 246, 0.08);
        color: #2563eb;
        border-radius: 18px;
        padding: 7px 16px 7px 14px;
        font-size: 1.01rem;
        display: flex;
        align-items: center;
        gap: 7px;
        border: 1px solid #dbeafe;
        font-weight: 600;
    }

    .appt-multiselect-chips .chip-remove {
        font-size: 1.18rem;
        color: #3b82f6;
        cursor: pointer;
        margin-left: 2px;
        transition: color 0.2s;
    }

    .appt-multiselect-chips .chip-remove:hover {
        color: #ef4444;
    }

    .appt-multiselect-chips input[type="text"] {
        width: 100%;
        padding: 10px 18px;
        border: 1.5px solid #e5e7eb;
        border-radius: 9px;
        font-size: 1.13rem;
        background: rgba(247, 249, 251, 0.7);
        margin-top: 2px;
        cursor: pointer;
        transition: border 0.2s, background 0.2s;
        outline: none;
    }

    .appt-multiselect-chips input[type="text"]:focus {
        border: 1.5px solid #3b82f6;
        background: #fff;
    }

    .appt-multiselect-chips .chips-dropdown {
        display: none;
        position: absolute;
        left: 0;
        right: 0;
        top: 110%;
        background: rgba(255, 255, 255, 0.98);
        border: 1.5px solid #e5e7eb;
        border-radius: 12px;
        box-shadow: 0 8px 32px rgba(44, 54, 90, 0.13);
        z-index: 10;
        padding: 12px 0;
        animation: fadeIn 0.2s;
    }

    .appt-multiselect-chips.open .chips-dropdown {
        display: block;
    }

    .appt-multiselect-chips .chips-dropdown label {
        display: flex;
        align-items: center;
        padding: 11px 22px;
        font-size: 1rem;
        cursor: pointer;
        transition: background 0.2s;
        border-radius: 8px;
        font-weight: 400;
    }

    .appt-multiselect-chips .chips-dropdown label:hover,
    .appt-multiselect-chips .chips-dropdown label:focus {
        background: #f7f9fb;
    }

    .appt-multiselect-chips .chips-dropdown input[type="checkbox"] {
        margin-right: 12px;
        accent-color: #3b82f6;
    }

    @media (max-width: 700px) {
        .appt-card {
            min-width: unset;
            max-width: 99vw;
        }

        .appt-col {
            padding: 18px 6vw 18px 6vw;
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .appt-horizontal-card {
        max-width: 90%;
        width: 90%;
        min-height: 420px;
        margin: 0 auto;
        border-radius: 18px;
        box-shadow: 0 8px 32px rgba(44, 54, 90, 0.13);
        background: #fff;
        border: 1.5px solid #e5e7eb;
        padding: 30px;
        display: flex;
        align-items: flex-start;
        justify-content: center;
    }

    .appt-col,
    .appt-calendar-col,
    .appt-horizontal-date-picker,
    .appt-horizontal-times,
    .appt-date-list {
        width: 100% !important;
        max-width: 100% !important;
        min-width: 0 !important;
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    .appt-horizontal-date-picker {
        margin-bottom: 24px;
        margin-top: 8px;
        display: flex;
        align-items: center;
        gap: 19px;
    }

    .appt-date-arrow {
        background: #f7f9fb;
        border: none;
        border-radius: 50%;
        width: 36px;
        height: 36px;
        font-size: 1.2rem;
        color: #23263b;
        cursor: pointer;
        transition: background 0.2s;
        box-shadow: 0 2px 8px rgba(44, 54, 90, 0.06);
    }

    .appt-date-arrow:hover,
    .appt-date-arrow:focus {
        background: #e5e7eb;
    }

    .appt-date-list {
        background: #f7f9fb;
        border-radius: 12px;
        overflow-x: auto;
        display: flex;
        padding: 0 2px;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
    }

    .appt-date-item {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
        min-width: 130px;
        padding: 8px 0 6px 0;
        cursor: pointer;
        border-radius: 10px;
        margin: 0 2px;
        transition: background 0.2s, color 0.2s;
        border: 2px solid transparent;
        font-weight: 600;
        font-size: 1.01rem;
    }

    .appt-date-item.selected,
    .appt-date-item:hover {
        background: linear-gradient(90deg, #2563eb 0%, #3b82f6 100%);
        color: #fff;
        border: 2px solid #3b82f6;
    }

    .appt-date-item .appt-date-label {
        font-size: 0.95rem;
        color: #5a5d6c;
        font-weight: 500;
    }

    .appt-date-item.selected .appt-date-label,
    .appt-date-item:hover .appt-date-label {
        color: #e0e7ff;
    }

    .appt-horizontal-times {
        border-radius: 14px;
        margin-top: 8px;
        padding: 24px 0 18px 0;
    }

    .appt-time-group-label {
        font-size: 1.08rem;
        font-weight: 700;
        color: #23263b;
        margin: 12px 0 10px 0;
    }

    .appt-time-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 12px;
        margin-bottom: 10px;
    }

    .appt-horizontal-time-btn {
        padding: 10px 0;
        border-radius: 8px;
        border: 1.5px solid #e5e7eb;
        background: #fff;
        font-size: 1.01rem;
        color: #23263b;
        cursor: pointer;
        transition: background 0.2s, border 0.2s, color 0.2s, box-shadow 0.2s;
        width: 100%;
        text-align: center;
        box-shadow: 0 1px 4px rgba(44, 54, 90, 0.04);
        outline: none;
    }

    .appt-horizontal-time-btn.selected,
    .appt-horizontal-time-btn:hover,
    .appt-horizontal-time-btn:focus {
        background: linear-gradient(90deg, #2563eb 0%, #3b82f6 100%);
        color: #fff;
        border: 1.5px solid #3b82f6;
        box-shadow: 0 4px 16px rgba(59, 130, 246, 0.13);
    }

    @media (max-width: 900px) {
        .appt-horizontal-card {
            min-width: unset;
            max-width: 99vw;
        }

        .appt-horizontal-times {
            min-width: unset;
            max-width: 99vw;
        }

        .appt-date-list {
            min-width: unset;
            max-width: 99vw;
        }
    }

    .appt-date-item.disabled {
        background: #f3f4f6;
        color: #9ca3af;
        cursor: not-allowed;
        border: 2px solid #e5e7eb;
    }

    .appt-date-item.disabled .appt-date-label {
        color: #9ca3af;
    }

    .appt-date-item.disabled:hover {
        background: #f3f4f6;
        color: #9ca3af;
        border: 2px solid #e5e7eb;
        transform: none;
    }

    /* Add this to your existing styles */
    .appt-loading-spinner {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.9);
        z-index: 2000;
        justify-content: center;
        align-items: center;
        backdrop-filter: blur(4px);
    }

    .appt-loading-spinner.active {
        display: flex;
    }

    .appt-spinner {
        width: 50px;
        height: 50px;
        border: 4px solid #f3f3f3;
        border-top: 4px solid #3b82f6;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
@section('content')
    <div class="bannerlinedotabout">
        <img src="{{asset('assets/web/images/bannerlinedot.png')}}" alt="bannerlinedot">
    </div>
    <div class="bannerlinedot2about">
        <img src="{{asset('assets/web/images/bannerlinedot.png')}}" alt="bannerlinedot">
    </div>
    <div class="bannerTextMain-api-services-detail">
        <div class="about-us-api-services-detail">
            <div class="aboutus-left">
                <div class="bannerText2">
                    <h1>{{ $appointmentupdate->getLocalizedMainTitle() }}</h1>
                    <p>{{ $appointmentupdate->getLocalizedMainDesc() }}</p>
                </div>
            </div>
            <div class="servicesdetailusbanner-right servicesdetailusbanner-right-faq">
                <img style="width: 100%;" src="{{ asset($appointmentupdate->image) }}" alt="{{$appointmentupdate->image_alt}}">
            </div>
        </div>
    </div>
    <div class="appt-main-wrapper">
        <div class="appt-card appt-horizontal-card">
            <div class="appt-col appt-calendar-col">
                <div class="appt-section-title">Selecteer Datum en tijd</div>
                <div class="appt-horizontal-date-picker">
                    <button class="appt-date-arrow" id="prevWeek">&#8592;</button>
                    <div class="appt-date-list" id="dateList"></div>
                    <button class="appt-date-arrow" id="nextWeek">&#8594;</button>
                </div>
                <div class="appt-horizontal-times" id="horizontalTimeSlots"></div>
            </div>
        </div>
        <!-- Modal Popup -->
        <div class="appt-modal-bg" id="apptModalBg">
            <div class="appt-modal">
                <div class="appt-modal-close" id="apptModalClose">&times;</div>
                <div class="appt-section-title">Vul uw gegevens in</div>
                <form class="appt-form" id="apptModalForm" autocomplete="off">
                    <div class="Information-from">
                        <label>Jouw naam</label>
                        <input type="text" id="modalName" placeholder="Voer uw naam in" required />
                    </div>
                    <div class="Information-from">
                        <label>E-mail</label>
                        <input type="email" id="modalEmail" placeholder="Voer uw e-mailadres in" required />
                    </div>
                    <div class="Information-from">
                        <label>Diensten</label>
                        <div class="appt-multiselect-chips" id="servicesMultiSelect">
                            <div class="chips-container" id="chipsContainer"></div>
                            <input type="text" id="servicesInput" placeholder="Select services..." readonly />
                            <div class="chips-dropdown" id="chipsDropdown">
                                @foreach($services as $service)
                                    <label>
                                        <input style="width: 20px !important;" type="checkbox" value="{{ $service->getLocalizedName() }}">
                                        {{ $service->getLocalizedName() }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="Information-from">
                        <label>Bericht</label>
                        <textarea id="modalMsg" placeholder="Voer uw bericht in" rows="3"></textarea>

                    </div>
                    <button class="appt-submit-btn" type="submit">Boek afspraak</button>
                </form>
            </div>
        </div>
        <!-- Confirmation Popup -->
        <div class="appt-modal-bg" id="apptConfirmBg">
            <div class="appt-modal appt-confirm-modal">
                <div class="appt-modal-close" id="apptConfirmClose">&times;</div>
                <div class="appt-confirm-icon">
                    <svg width="38" height="38" viewBox="0 0 38 38" fill="none">
                        <circle cx="19" cy="19" r="19" fill="#22c55e" />
                        <path d="M11 20.5L17 26.5L28 15.5" stroke="#fff" stroke-width="3" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="appt-section-title" style="margin-bottom:8px;">Afspraak bevestigd!</div>
                <div id="apptConfirmSummary" style="color:#5a5d6c;font-size:1.05rem;margin-bottom:8px;text-align:center;">
                </div>
            </div>
        </div>
        <div class="appt-loading-spinner" id="apptLoadingSpinner">
            <div class="appt-spinner"></div>
        </div>
    </div>
    <script>
        // Add this at the beginning of your script
        const services = @json($services);

        let appointmentSettings = {};

        async function fetchAppointmentSettings() {
            try {
                const response = await fetch('/appointment-settings');
                appointmentSettings = await response.json();
                renderDateList();
            } catch (error) {
                console.error('Error fetching appointment settings:', error);
            }
        }

        const dateList = document.getElementById('dateList');
        const prevWeekBtn = document.getElementById('prevWeek');
        const nextWeekBtn = document.getElementById('nextWeek');
        const horizontalTimeSlotsDiv = document.getElementById('horizontalTimeSlots');
        let weekStart = new Date();
        weekStart.setHours(0, 0, 0, 0);

        function getWeekDates(start) {
            const dates = [];
            for (let i = 0; i < 7; i++) {
                const d = new Date(start);
                d.setDate(start.getDate() + i);
                dates.push(d);
            }
            return dates;
        }
        let selectedDate = new Date(weekStart);

        function renderDateList() {
            dateList.innerHTML = '';
            const weekDates = getWeekDates(weekStart);

            weekDates.forEach(date => {
                const dayName = date.toLocaleString('en-US', { weekday: 'long' });
                const isEnabled = appointmentSettings[dayName] === 1;

                const item = document.createElement('div');
                item.className = 'appt-date-item' +
                    (date.toDateString() === selectedDate.toDateString() ? ' selected' : '') +
                    (!isEnabled ? ' disabled' : '');

                item.innerHTML = `
                    <span>${date.toLocaleString('en-US', { month: 'short' })}, ${date.getDate()}</span>
                    <span class="appt-date-label">${date.toLocaleString('en-US', { weekday: 'short' })}</span>
                `;

                if (isEnabled) {
                    item.onclick = () => {
                        selectedDate = new Date(date);
                        renderDateList();
                        renderHorizontalTimeSlots();
                    };
                }

                dateList.appendChild(item);
            });
        }
        prevWeekBtn.onclick = () => {
            weekStart.setDate(weekStart.getDate() - 7);
            renderDateList();
            renderHorizontalTimeSlots();
        };
        nextWeekBtn.onclick = () => {
            weekStart.setDate(weekStart.getDate() + 7);
            renderDateList();
            renderHorizontalTimeSlots();
        };
        // Time slots grouped
        function renderHorizontalTimeSlots() {
            horizontalTimeSlotsDiv.innerHTML = '';
            if (!selectedDate) return;
            // Example slots
            const morning = ['07:00 AM - 08:00 AM','08:00 AM - 09:00 AM','09:00 AM - 10:00 AM', '10:00 AM - 11:00 AM', '11:00 AM - 12:00 PM'];
            const afternoon = ['12:00 PM - 01:00 PM', '01:00 PM - 02:00 PM', '02:00 PM - 03:00 PM', '03:00 PM - 04:00 PM', '04:00 PM - 05:00 PM', '05:00 PM - 06:00 PM', '06:00 PM - 07:00 PM', '07:00 PM - 08:00 PM', '08:00 PM - 09:00 PM', '09:00 PM - 10:00 PM', '10:00 PM - 11:00 PM', '11:00 PM - 12:00 AM'];
            // Morning
            const morningLabel = document.createElement('div');
            morningLabel.className = 'appt-time-group-label';
            morningLabel.textContent = 'Ochtend slot';
            horizontalTimeSlotsDiv.appendChild(morningLabel);
            const morningGrid = document.createElement('div');
            morningGrid.className = 'appt-time-grid';
            morning.forEach(time => {
                const btn = document.createElement('button');
                btn.type = 'button';
                btn.className = 'appt-horizontal-time-btn';
                btn.textContent = time;
                btn.onclick = () => {
                    document.querySelectorAll('.appt-horizontal-time-btn').forEach(b => b.classList.remove(
                        'selected'));
                    btn.classList.add('selected');
                    selectedTime = time;
                    document.getElementById('apptModalBg').classList.add('active');
                };
                morningGrid.appendChild(btn);
            });
            horizontalTimeSlotsDiv.appendChild(morningGrid);
            // Afternoon
            const afternoonLabel = document.createElement('div');
            afternoonLabel.className = 'appt-time-group-label';
            afternoonLabel.textContent = 'Middagslot';
            horizontalTimeSlotsDiv.appendChild(afternoonLabel);
            const afternoonGrid = document.createElement('div');
            afternoonGrid.className = 'appt-time-grid';
            afternoon.forEach(time => {
                const btn = document.createElement('button');
                btn.type = 'button';
                btn.className = 'appt-horizontal-time-btn';
                btn.textContent = time;
                btn.onclick = () => {
                    document.querySelectorAll('.appt-horizontal-time-btn').forEach(b => b.classList.remove(
                        'selected'));
                    btn.classList.add('selected');
                    selectedTime = time;
                    document.getElementById('apptModalBg').classList.add('active');
                };
                afternoonGrid.appendChild(btn);
            });
            horizontalTimeSlotsDiv.appendChild(afternoonGrid);
        }
        // Initial render
        document.addEventListener('DOMContentLoaded', () => {
            fetchAppointmentSettings();
            renderDateList();
            renderHorizontalTimeSlots();
        });
        // Modal logic
        const apptModalBg = document.getElementById('apptModalBg');
        const apptModalClose = document.getElementById('apptModalClose');
        apptModalClose.onclick = () => apptModalBg.classList.remove('active');
        apptModalBg.onclick = (e) => {
            if (e.target === apptModalBg) apptModalBg.classList.remove('active');
        };
        // Chip-style multi-select logic
        const servicesMultiSelect = document.getElementById('servicesMultiSelect');
        const chipsContainer = document.getElementById('chipsContainer');
        const chipsDropdown = document.getElementById('chipsDropdown');
        const servicesInput = document.getElementById('servicesInput');
        let selectedServices = [];

        function updateChips() {
            chipsContainer.innerHTML = '';
            selectedServices.forEach(service => {
                const chip = document.createElement('span');
                chip.className = 'chip';
                chip.textContent = service;
                const remove = document.createElement('span');
                remove.className = 'chip-remove';
                remove.innerHTML = '&times;';
                remove.onclick = (e) => {
                    e.stopPropagation();
                    chipsDropdown.querySelectorAll('input[type="checkbox"]').forEach(cb => {
                        if (cb.value === service) cb.checked = false;
                    });
                    selectedServices = selectedServices.filter(s => s !== service);
                    updateChips();
                };
                chip.appendChild(remove);
                chipsContainer.appendChild(chip);
            });
            servicesInput.value = selectedServices.length ? '' : '';
            servicesInput.placeholder = selectedServices.length ? '' : 'Select services...';
        }
        servicesInput.onclick = function(e) {
            servicesMultiSelect.classList.toggle('open');
        };
        servicesInput.onfocus = function() {
            servicesMultiSelect.classList.add('open');
        };
        document.addEventListener('click', function(e) {
            if (!servicesMultiSelect.contains(e.target)) {
                servicesMultiSelect.classList.remove('open');
            }
        });
        chipsDropdown.querySelectorAll('input[type="checkbox"]').forEach(cb => {
            cb.addEventListener('change', function() {
                if (cb.checked) {
                    if (!selectedServices.includes(cb.value)) selectedServices.push(cb.value);
                } else {
                    selectedServices = selectedServices.filter(s => s !== cb.value);
                }
                updateChips();
            });
        });
        updateChips();
        // Add this function to handle the appointment submission
        async function submitAppointment(formData) {
            const spinner = document.getElementById('apptLoadingSpinner');
            spinner.classList.add('active');

            try {
                const response = await fetch('/appointments', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify(formData)
                });

                if (!response.ok) {
                    throw new Error('Failed to create appointment');
                }

                const result = await response.json();
                return result;
            } catch (error) {
                console.error('Error:', error);
                throw error;
            } finally {
                spinner.classList.remove('active');
            }
        }
        // Modify your existing form submit handler
        document.getElementById('apptModalForm').onsubmit = async function(e) {
            e.preventDefault();

            const formData = {
                date: selectedDate.toISOString().split('T')[0],
                slot: selectedTime,
                name: document.getElementById('modalName').value,
                email: document.getElementById('modalEmail').value,
                message: document.getElementById('modalMsg').value,
                services: selectedServices
            };

            try {
                await submitAppointment(formData);

                // Show confirmation
                apptModalBg.classList.remove('active');
                document.getElementById('apptConfirmBg').classList.add('active');
                document.getElementById('apptConfirmSummary').innerHTML =
                    `<b>Date:</b> ${selectedDate.toLocaleDateString('en-US', { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' })}<br>
                    <b>Time:</b> ${selectedTime}<br>
                    <b>Name:</b> ${formData.name}<br>
                    <b>Email:</b> ${formData.email}<br>
                    <b>Services:</b> ${selectedServices.length ? selectedServices.join(', ') : 'None'}<br>
                    ${formData.message ? `<b>Message:</b> ${formData.message}` : ''}`;

                // Reset form
                this.reset();
                selectedServices = [];
                chipsDropdown.querySelectorAll('input[type="checkbox"]').forEach(cb => cb.checked = false);
                updateChips();
            } catch (error) {
                alert('Failed to book appointment. Please try again.');
            }
        };
        // Confirmation close
        const apptConfirmBg = document.getElementById('apptConfirmBg');
        const apptConfirmClose = document.getElementById('apptConfirmClose');
        apptConfirmClose.onclick = () => {
            apptConfirmBg.classList.remove('active');
            window.location.reload();
        };
        apptConfirmBg.onclick = (e) => {
            if (e.target === apptConfirmBg) {
                apptConfirmBg.classList.remove('active');
                window.location.reload();
            }
        };
    </script>
@endsection
