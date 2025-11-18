@extends('layouts.admin')
@section('content')
    <!-- Main Content -->
    <main class="main-content">
        @include('layouts.header')
        <div class="content">
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon bg-primary">
                        <i class="fa-light fa-file-pen"></i>
                    </div>
                    <div class="stat-info">
                        <h4>{{$blogscount}}</h4>
                        <p>Total Blogs</p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon bg-success">
                        <i class="fa-light fa-calendar-plus"></i>
                    </div>
                    <div class="stat-info">
                        <h4>{{ $appointmentscount }}</h4>
                        <p>Total Appointments</p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon bg-info">
                        <i class="fas fa-sitemap"></i>
                    </div>
                    <div class="stat-info">
                        <h4>{{ $technologyscount }}</h4>
                        <p>Total Technologies</p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon bg-warning">
                        <i class="fa-solid fa-sliders"></i>
                    </div>
                    <div class="stat-info">
                        <h4>{{ $servicecount }}</h4>
                        <p>Total Services</p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon bg-success">
                        <i class="fa-solid fa-briefcase"></i>
                    </div>
                    <div class="stat-info">
                        <h4>{{ $portfolio }}</h4>
                        <p>Total Portfolios</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon bg-info">
                        <i class="fa-light fa-star"></i>
                    </div>
                    <div class="stat-info">
                        <h4>{{ $testimonialscount }}</h4>
                        <p>Total Testimonials</p>
                    </div>
                </div>
            </div>

            <div class="table-section">
                <div class="table-header">
                    <h2>Recent Appointments</h2>
                </div>

                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appointments as $appointment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="employee-info" style="display: flex; align-items: center; gap: 10px;">
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($appointment->name) }}&background=0D8ABC&color=fff&rounded=true&size=64"
                                                alt="{{ $appointment->name }}" style="border-radius: 50%;">
                                            <div>
                                                <h4 style="margin: 0;">{{ $appointment->name }}</h4>
                                            </div>
                                        </div>

                                    </td>
                                    <td>{{ $appointment->email }}</td>
                                    <td>{{ $appointment->date }}</td>
                                    <td>
                                        <span
                                            style="display: inline-block;padding: 4px 10px;font-size: 12px;font-weight: 600;color: #2563eb;background-color: #e0edff;border: 1px solid #bcdcff;border-radius: 999px;text-transform: capitalize;box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05); ">
                                            {{ $appointment->slot }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('appointment.list', $appointment->id) }}" class="action-btn view" data-tooltip="View Details">
                                                <span class="btn-content">
                                                    <i class="fa-light fa-eye"></i>
                                                    <p class="btn-text">View</p>
                                                </span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <!-- Add more rows with different data -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection