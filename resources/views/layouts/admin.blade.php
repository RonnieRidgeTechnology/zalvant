<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zalvant Admin Panel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favi.jpg') }}">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/all.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        :root {
            --primary: #ff9800;
            --secondary: #fff;
            --text: #495057;
            --dark-blue: #042954;
            --light-bg: #f8fafc;
            --border: #e2e8f0;
            --sidebar-width: 220px;
            --header-height: 65px;
        }

        .dashboard {
            display: flex;
            min-height: 100vh;
            background: #f5f7fbb5;
        }

        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background: var(--dark-blue);
            border: none;
            height: 100vh;
            position: fixed;
            overflow-y: auto;
        }

        .brand {
            height: var(--header-height);
            display: flex;
            align-items: center;
            padding: 0 1.5rem;
            background: transparent;
            border: none;
        }

        .brand-logo {
            font-size: 1.5rem;
            font-weight: 600;
            color: white;
            text-decoration: none;
        }

        .nav-section {
            padding: 0.5rem 0;
            border: none;
        }

        .nav-header {
            padding: 0 1.5rem;
            font-size: 0.75rem;
            font-weight: 500;
            color: #64748b;
            margin: 1rem 0 0.5rem;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 0.5rem 1.5rem;
            color: #94a3b8;
            text-decoration: none;
            font-size: 0.84rem;
            font-weight: 400;
            transition: all 0.2s ease;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.05);
            color: white;
        }

        .nav-link i {
            width: 1.25rem;
            font-size: 1rem;
            margin-right: 0.75rem;
            font-weight: 300;
        }

        .nav-link .arrow {
            margin-left: auto;
            font-size: 0.75rem;
            opacity: 0.5;
        }

        .sub-nav {
            background: #051F3E;
            display: none;
        }

        .sub-nav.active {
            display: block;
            padding: 10px 0px;
        }


        .nav-item.active>.nav-link {
            background: rgba(255, 255, 255, 0.05);
            color: white;
        }

        .nav-item.active>.nav-link .arrow {
            transform: rotate(90deg);
            opacity: 1;
            color: var(--primary);
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            flex: 1;
        }

        /* Header */
        .header {
            height: var(--header-height);
            background: white;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            padding: 0 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .search-wrapper {
            width: 300px;
        }

        .search-bar {
            background: var(--light-bg);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 0.5rem 1rem;
            display: flex;
            align-items: center;
        }

        .search-bar input {
            border: none;
            background: none;
            outline: none;
            font-size: 0.875rem;
            width: 100%;
            color: var(--text);
        }

        .search-shortcuts {
            display: flex;
            gap: 4px;
            margin-left: auto;
            padding-left: 12px;
            border-left: 1px solid var(--border);
        }

        .search-shortcuts span {
            background: #e9ecef;
            color: #6c757d;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 500;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .notification {
            position: relative;
            cursor: pointer;
        }

        .notification-badge {
            position: absolute;
            top: -16px;
            right: -16px;
            background: #ff4757;
            color: white;
            border-radius: 30px;
            padding: 2px 7px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .notification-dropdown {
            position: absolute;
            top: calc(100% + 10px);
            right: -10px;
            width: 320px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }

        .notification.active .notification-dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .notification-header {
            padding: 10px 1.5rem;
            background: #ff4757;
            color: white;
            border-radius: 12px 12px 0 0;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .notification-body {
            max-height: 360px;
            overflow-y: auto;
        }

        .notification-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #f1f5f9;
            transition: background 0.2s ease;
        }

        .notification-item:hover {
            background: #f8fafc;
        }

        .notification-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .notification-icon.success {
            background: rgba(16, 185, 129, 0.1);
            color: #10b981;
        }

        .notification-icon.warning {
            background: rgba(245, 158, 11, 0.1);
            color: #f59e0b;
        }

        .notification-icon.info {
            background: rgba(59, 130, 246, 0.1);
            color: #3b82f6;
        }

        .notification-content {
            flex: 1;
        }

        .notification-title {
            font-weight: 500;
            color: #1e293b;
            margin-bottom: 0.25rem;
        }

        .notification-time {
            font-size: 0.75rem;
            color: #64748b;
        }

        /* Content Area */
        .content {
            padding: 2rem;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .stat-icon {
            width: 52px;
            height: 52px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        .bg-primary {
            background: var(--primary);
        }

        .bg-success {
            background: #10b981;
        }

        .bg-warning {
            background: #f59e0b;
        }

        .bg-info {
            background: #3b82f6;
        }

        .stat-info h4 {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--text);
            margin-bottom: 0.25rem;
        }

        .stat-info p {
            font-size: 0.82rem;
            color: #64748b;
            margin: 0;
        }

        .stat-icon i {
            font-size: 1.5rem;
            font-weight: 300;
        }

        .table-section {
            background: var(--secondary);
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-top: 2rem;
        }

        .table-header {
            padding: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--border);
        }

        .table-header h2 {
            font-size: 1.2rem;
            color: var(--text);
            font-weight: 600;
        }

        .table-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .table-filter select {
            padding: 0.5rem 2rem 0.5rem 1rem;
            border: 1px solid var(--border);
            border-radius: 4px;
            font-size: 0.9rem;
            color: var(--text);
            background: var(--light-bg);
            cursor: pointer;
            outline: none;
        }

        .export-btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: opacity 0.2s;
        }

        .export-btn:hover {
            opacity: 0.9;
        }

        .table-container {
            overflow-x: auto;
        }

        .data-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 0.5rem;
        }

        .data-table th {
            background: transparent;
            padding: 0.75rem 1rem;
            font-size: 0.75rem;
            font-weight: 600;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-align: left;
        }

        .data-table td {
            background: white;
            padding: 1rem;
            font-size: 0.875rem;
            color: var(--text);
        }

        .employee-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .employee-info img {
            width: 36px;
            height: 36px;
            border-radius: 6px;
            object-fit: cover;
        }

        .employee-info h4 {
            font-size: 0.9rem;
            margin-bottom: 0.25rem;
        }

        .employee-info span {
            font-size: 0.8rem;
            color: #6c757d;
        }

        .status-badge {
            padding: 0.375rem 0.75rem;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .status-badge.paid {
            background: rgba(16, 185, 129, 0.1);
            color: #10b981;
        }

        .status-badge.due {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
        }

        .activity-info {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #6c757d;
            font-size: 0.9rem;
        }

        .performance-bar {
            background: #f1f3f5;
            height: 6px;
            border-radius: 3px;
            overflow: hidden;
            width: 120px;
        }

        .performance-bar .progress {
            height: 100%;
            background: linear-gradient(90deg, var(--primary), #4895ef);
            border-radius: 3px;
            transition: width 0.5s ease;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .action-btn {
            position: relative;
            width: 34px;
            height: 34px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            overflow: hidden;
            transition: all 0.3s ease;
            background: transparent;
        }

        .btn-content {
            position: relative;
            display: flex;
            align-items: center;
            width: 100%;
            height: 100%;
        }

        .btn-content i {
            position: absolute;
            left: 10px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .btn-text {
            position: absolute;
            left: 32px;
            font-size: 13px;
            font-weight: 500;
            margin: 0;
            opacity: 0;
            white-space: nowrap;
            transition: all 0.3s ease;
        }

        /* Edit Button */
        .action-btn.edit {
            background: rgba(25, 118, 210, 0.05);
            color: #1976d2;
            border: 1px solid rgba(25, 118, 210, 0.1);
        }

        .action-btn.edit:hover {
            background: #1976d2;
            width: 73px;
        }

        /* Status Button */
        .action-btn.status {
            background: rgba(244, 196, 124, 0.2);
            color: #f0a500;
            border: 1px solid rgba(244, 196, 124, 0.3);
        }

        .action-btn.status:hover {
            background: #f0a500;
            width: 80px;
        }

        /* View Button */
        .action-btn.view {
            background: rgba(76, 175, 80, 0.05);
            color: #4CAF50;
            border: 1px solid rgba(76, 175, 80, 0.1);
        }

        .action-btn.view:hover {
            background: #4CAF50;
            width: 73px;
        }

        /* Delete Button */
        .action-btn.delete {
            background: rgba(244, 67, 54, 0.05);
            color: #f44336;
            border: 1px solid rgba(244, 67, 54, 0.1);
        }

        .action-btn.delete:hover {
            background: #f44336;
            width: 80px;
        }

        /* Common Hover Effects */
        .action-btn:hover {
            color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transform: translateY(-1px);
        }

        .action-btn:hover .btn-text {
            opacity: 1;
        }

        /* Active State */
        .action-btn:active {
            transform: translateY(1px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Tooltip */
        .action-btn::before {
            content: attr(data-tooltip);
            position: absolute;
            top: -40px;
            left: 50%;
            transform: translateX(-50%);
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
            color: white;
            background: rgba(0, 0, 0, 0.8);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            white-space: nowrap;
            z-index: 1000;
        }

        .action-btn::after {
            content: '';
            position: absolute;
            top: -12px;
            left: 50%;
            transform: translateX(-50%);
            border: 6px solid transparent;
            border-top-color: rgba(0, 0, 0, 0.8);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .action-btn:hover::before,
        .action-btn:hover::after {
            opacity: 1;
            visibility: visible;
        }

        /* Animation for new items */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .action-buttons {
            animation: slideIn 0.3s ease;
        }

        /* Updated Table Styles */
        .data-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            font-size: 0.875rem;
        }

        .data-table th {
            background: transparent;
            padding: 0.75rem 1rem;
            font-weight: 500;
            color: #6c757d;
            border-bottom: 2px solid #e9ecef;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .data-table td {
            padding: 0.75rem 1rem;
            border-bottom: 1px solid #f1f3f5;
            vertical-align: middle;
        }

        .data-table tr:hover {
            background: #f8f9fa;
        }

        /* Custom Dropdown */
        .custom-dropdown {
            position: relative;
            min-width: 160px;
        }

        .dropdown-trigger {
            width: 100%;
            padding: 0.5rem 1rem;
            background: white;
            border: 1px solid #e9ecef;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            font-size: 0.875rem;
            color: var(--text);
            transition: all 0.2s;
        }

        .dropdown-trigger:hover {
            border-color: var(--primary);
        }

        .dropdown-menu {
            position: absolute;
            top: calc(100% + 5px);
            left: 0;
            width: 100%;
            background: white;
            border-radius: 6px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s;
            z-index: 100;
        }

        .custom-dropdown.active .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-item {
            padding: 0.5rem 1rem;
            cursor: pointer;
            transition: all 0.2s;
        }

        .dropdown-item:hover {
            background: #f8f9fa;
            color: black;
        }

        .dropdown-item.active {
            background: #e9ecef;
            color: black;
        }

        /* Modern Button Design */
        .action-button {
            position: relative;
            padding: 0.75rem 1.75rem;
            font-size: 0.875rem;
            font-weight: 600;
            border: none;
            background: #3b82f6;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.625rem;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(59, 130, 246, 0.1);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .action-button i {
            font-size: 1rem;
            transition: transform 0.3s ease;
        }

        /* Primary Button */
        .action-button.primary {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
        }

        /* Hover Effects */
        .action-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(59, 130, 246, 0.2);
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
        }

        .action-button:hover i {
            transform: translateX(3px);
        }

        /* Active State */
        .action-button:active {
            transform: translateY(1px);
            box-shadow: 0 4px 8px rgba(59, 130, 246, 0.15);
        }

        /* Secondary Button */
        .action-button.secondary {
            background: white;
            color: #3b82f6;
            border: 2px solid #3b82f6;
        }

        .action-button.secondary:hover {
            background: rgba(59, 130, 246, 0.1);
            border-color: #2563eb;
            color: #2563eb;
        }

        /* Loading State */
        .action-button.loading {
            pointer-events: none;
            opacity: 0.8;
        }

        .action-button.loading::after {
            content: '';
            position: absolute;
            width: 1rem;
            height: 1rem;
            top: 50%;
            left: 50%;
            margin-left: -0.5rem;
            margin-top: -0.5rem;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 0.6s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Sidebar Dropdown Enhancement */
        .nav-link .arrow {
            font-size: 14px;
            opacity: 0.5;
            transition: all 0.3s ease;
        }

        .nav-item.active>.nav-link .arrow {
            transform: rotate(90deg);
            opacity: 1;
            color: var(--primary);
        }

        .sub-nav .nav-link {
            padding-left: 3rem;
            font-size: 0.75rem;
            opacity: 0.8;
        }

        .sub-nav .nav-link:hover {
            opacity: 1;
            background: rgba(59, 125, 221, 0.05);
            color: white;
        }

        /* Custom Scrollbar for Sidebar */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: #f8f9fa;
            margin: 4px 0;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: #e0e4e8;
            border-radius: 3px;
            transition: all 0.3s ease;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: #cbd2d9;
        }

        /* Hide scrollbar when not hovering (optional) */
        .sidebar:not(:hover)::-webkit-scrollbar-thumb {
            opacity: 0;
        }

        /* Ensure smooth scrolling */
        .sidebar {
            scroll-behavior: smooth;
            -webkit-overflow-scrolling: touch;
        }

        /* Add padding to prevent content overlap with scrollbar */
        .nav-section:last-child {
            margin-bottom: 1rem;
        }

        /* Modal Styles */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal {
            max-height: 85vh;
            overflow-y: auto;
            background: linear-gradient(to bottom, #ffffff 0%, #fafbfc 100%);
            border-radius: 16px;
            width: 85%;
            max-width: 550px;
        }

        .modal-overlay.active {
            display: flex;
        }

        .modal-overlay.active .modal {
            transform: translateY(0);
            opacity: 1;
        }

        .modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: white;
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .header-content {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .close-modal {
            background: none;
            border: none;
            width: 32px;
            height: 32px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
            color: #6c757d;
        }

        .close-modal i {
            font-size: 18px;
        }

        .close-modal:hover {
            background: #f1f3f5;
            color: #dc3545;
        }

        .modal-body {
            padding: 1.5rem 1.5rem 1.5rem 1.75rem;
        }

        /* Form Styles */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text);
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.625rem;
            border: 1px solid var(--border);
            border-radius: 6px;
            font-size: 0.875rem;
            transition: all 0.2s;
            background: #f8f9fa;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary);
            background: white;
            box-shadow: 0 0 0 4px rgba(59, 125, 221, 0.1);
        }

        .form-group textarea {
            height: 100px;
            resize: vertical;
        }

        .form-actions {
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border);
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
        }

        .btn-submit,
        .btn-cancel {
            position: relative;
            padding: 0.75rem 1.75rem;
            font-size: 0.875rem;
            font-weight: 500;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.625rem;
            transition: all 0.3s ease;
        }

        .btn-submit {
            background: var(--primary);
            color: white;
            box-shadow: 0 2px 4px rgba(255, 152, 0, 0.2);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 152, 0, 0.3);
        }

        .btn-cancel {
            background: #f1f5f9;
            color: #64748b;
        }

        .btn-cancel:hover {
            background: #fee2e2;
            color: #ef4444;
            transform: translateY(-2px);
        }

        .btn-submit:active,
        .btn-cancel:active {
            transform: translateY(0);
        }

        /* Add New Button Style */
        .action-button.add-new {
            background: linear-gradient(135deg, #4CAF50, #45a049);
            margin-left: 1rem;
        }

        .action-button.add-new:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        /* Enhanced Modal Styles */
        .modal {
            max-height: 85vh;
            overflow-y: auto;
            background: linear-gradient(to bottom, #ffffff 0%, #fafbfc 100%);
            border-radius: 16px;
            width: 85%;
            max-width: 550px;
        }

        .modal-header {
            background: white;
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .modal-header h3 {
            font-size: 1.15rem;
            color: var(--text);
            font-weight: 600;
        }

        .modal-body {
            padding: 1.5rem;
        }

        /* Custom Form Select */
        .custom-select {
            position: relative;
        }

        .select-trigger {
            width: 100%;
            padding: 0.625rem;
            border: 1px solid var(--border);
            border-radius: 6px;
            background: #f8f9fa;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            font-size: 0.875rem;
            color: var(--text);
            transition: all 0.2s;
        }

        .select-trigger i {
            font-size: 0.75rem;
            transition: transform 0.2s;
        }

        .select-trigger.active i {
            transform: rotate(180deg);
        }

        .select-menu {
            position: absolute;
            top: calc(100% + 5px);
            left: 0;
            width: 100%;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s;
            z-index: 100;
            border: 1px solid var(--border);
        }

        .select-menu.active {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .select-option {
            padding: 0.625rem 1rem;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 0.875rem;
        }

        .select-option:hover {
            background: #f8f9fa;
            color: var(--primary);
        }

        .select-option.selected {
            background: rgba(59, 125, 221, 0.1);
            color: var(--primary);
        }

        /* Enhanced Form Styles */
        .form-group label {
            font-size: 0.813rem;
            margin-bottom: 0.375rem;
            color: #6c757d;
        }

        .form-group input,
        .form-group textarea {
            background: #f8f9fa;
            border: 1px solid #e9ecef;
            padding: 0.625rem;
            font-size: 0.875rem;
            transition: all 0.2s;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .select-trigger:focus {
            background: white;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(59, 125, 221, 0.1);
        }

        /* Modal Scrollbar Styles */
        .modal::-webkit-scrollbar {
            width: 6px;
        }

        .modal::-webkit-scrollbar-track {
            background: #f8f9fa;
            border-radius: 8px;
        }

        .modal::-webkit-scrollbar-thumb {
            background: #e0e4e8;
            border-radius: 8px;
            border: 2px solid #f8f9fa;
        }

        .modal::-webkit-scrollbar-thumb:hover {
            background: #cbd2d9;
        }

        /* Ensure modal content doesn't touch scrollbar */
        .modal {
            padding-right: 4px;
        }

        .modal-body {
            padding: 1.5rem 1.5rem 1.5rem 1.75rem;
        }

        /* Enhance Select Menu Scrollbar when content is too long */
        .select-menu {
            max-height: 200px;
            overflow-y: auto;
        }

        .select-menu::-webkit-scrollbar {
            width: 4px;
        }

        .select-menu::-webkit-scrollbar-track {
            background: transparent;
        }

        .select-menu::-webkit-scrollbar-thumb {
            background: #e0e4e8;
            border-radius: 4px;
        }

        .select-menu::-webkit-scrollbar-thumb:hover {
            background: #cbd2d9;
        }

        .user-profile {
            position: relative;
        }

        .profile-trigger {
            display: flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
        }

        .profile-trigger img {
            border-radius: 50%;
        }

        .profile-trigger i {
            font-size: 12px;
            color: #6c757d;
            transition: transform 0.2s;
        }

        .user-profile.active .profile-trigger i {
            transform: rotate(180deg);
        }

        .profile-dropdown {
            position: absolute;
            top: calc(100% + 8px);
            right: 0;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 180px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.2s;
        }

        .user-profile.active .profile-dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0.75rem 1rem;
            color: var(--text);
            text-decoration: none;
            transition: all 0.2s;
        }

        .dropdown-item:first-child {
            border-radius: 8px 8px 0 0;
        }

        .dropdown-item:last-child {
            border-radius: 0 0 8px 8px;
        }

        .dropdown-item i {
            transition: all 0.35s linear;
            font-size: 1rem;
            opacity: 0.7;
        }

        .dropdown-item:hover {
            background: var(--light-bg);
            color: black;
        }

        .dropdown-item:hover i {
            opacity: 1;
        }
    </style>
</head>

<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="brand" style="hight:150px;width:150px;>
                <a href="{{ route('dashboard') }}" class="brand-logo">
                    <img style="hight:100%;width:100%;" src="{{asset('images/Zalvant.png')}}"alt="Zalvant">
                </a>
            </div>

            <div class="nav-section">
                <div class="nav-header">Main</div>
                <div class="nav-item active">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="fa-light fa-house"></i>
                        <span>Dashboard</span>
                    </a>
                </div>
            </div>
            <div class="nav-section">
                <div class="nav-header">Management</div>

                <a href="{{ route('contact.list') }}" class="nav-link">
                    <i class="fa-light fa-list-ul"></i>
                    <span>Contact List</span>
                </a>
                <a href="{{ route('faqs.index') }}" class="nav-link">
                    <i class="fa-light fa-table-list"></i>
                    <span>Faqs</span>
                </a>
                <a href="{{ route('testimonials.index') }}" class="nav-link">
                    <i class="fa-light fa-sitemap"></i>
                    <span>Testimonials</span>
                </a>
                <a href="{{ route('Ai-deail.index') }}" class="nav-link">
                    <i class="fa-light fa-box-open"></i>
                    <span>Ai deals</span>
                </a>
                <a href="{{ route('Coure-value.index') }}" class="nav-link">
                    <i class="fa-light fa-bars"></i>
                    <span>Core Values</span>
                </a>
                <a href="{{ route('Why-choose-us.index') }}" class="nav-link">
                    <i class="fa-light fa-clone"></i>
                    <span>Why Choose Us</span>
                </a>
                <!-- <a href="{{ route('landing-pages.index') }}" class="nav-link">
                    <i class="fa-light fa-clone"></i>
                    <span>Landing Pages</span>
                </a> -->
                <a href="{{ route('new-technology.index') }}" class="nav-link">
                    <i class="fa-light fa-circle-plus"></i>
                    <span>Add Technology</span>
                </a>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-file-lines"></i>
                        <span>Landing</span>
                        <i class="fa-light fa-angle-right arrow"></i>
                    </a>
                    <div class="sub-nav">
                        <a href="{{ route('landing.index') }}" class="nav-link">
                            <i class="fa-light fa-browser"></i>
                            <span>Landing form</span>
                        </a>
                        <a href="{{ route('landing-form-labels.edit') }}" class="nav-link">
                            <i class="fa-light fa-text"></i>
                            <span>Form Labels</span>
                        </a>
                        <a href="{{ route('actions.index') }}" class="nav-link">
                            <i class="fa-solid fa-bolt"></i>
                            <span>Action</span>
                        </a>
                        <a href="{{ route('action-countless') }}" class="nav-link">
                            <i class="fa-solid fa-hourglass-start"></i>
                            <span>Statistics</span>
                        </a>
                        <a href="{{ route('landing-form-labels.edit') }}" class="nav-link">
                            <i class="fa-light fa-text"></i>
                            <span>Form Labels</span>
                        </a>
                        <a href="{{ route('admin.banner') }}" class="nav-link">
                            <i class="fa-solid fa-image"></i>
                            <span>Banner</span>
                        </a>
                        <a href="{{ route('admin.welcome') }}" class="nav-link">
                            <i class="fa-solid fa-circle-check"></i>
                            <span>Thank You Page</span>
                        </a>
                    </div>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-light fa-building"></i>
                        <span>Services</span>
                        <i class="fa-light fa-angle-right arrow"></i>
                    </a>
                    <div class="sub-nav">
                        <a href="{{ route('landing-types.index') }}" class="nav-link">
                            <i class="fa-light fa-sliders"></i>
                            <span>Types</span>
                        </a>
                        <a href="{{ route('admin.service') }}" class="nav-link">
                            <i class="fa-light fa-sliders"></i>
                            <span>Services</span>
                        </a>
                        <a href="{{ route('service-update.edit') }}" class="nav-link">
                            <i class="fa-light fa-file-pen"></i>
                            <span>Service Update</span>
                        </a>
                    </div>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-briefcase"></i>
                        <span>Portfolio</span>
                        <i class="fa-light fa-angle-right arrow"></i>
                    </a>
                    <div class="sub-nav">
                        <a href="{{ route('admin.portfolio') }}" class="nav-link">
                            <i class="fa-solid fa-briefcase"></i>
                            <span>Portfolios</span>
                        </a>
                        <a href="{{ route('portfolio-update.edit') }}" class="nav-link">
                            <i class="fa-light fa-file-pen"></i>
                            <span>Portfolio Update</span>
                        </a>
                    </div>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-light fa-file-lines"></i>
                        <span>Blogs</span>
                        <i class="fa-light fa-angle-right arrow"></i>
                    </a>
                    <div class="sub-nav">
                        <a href="{{ route('blog-categories.index') }}" class="nav-link">
                            <i class="fa-light fa-list-tree"></i>
                            <span>Blog Category</span>
                        </a>
                        <a href="{{ route('blogs.index') }}" class="nav-link">
                            <i class="fa-light fa-file-lines"></i>
                            <span>Blogs</span>
                        </a>
                        <a href="{{ route('blog.update.edit') }}" class="nav-link">
                            <i class="fa-light fa-file-pen"></i>
                            <span>Blog update</span>
                        </a>
                    </div>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-light fa-calendar-days"></i>
                        <span>Appointments</span>
                        <i class="fa-light fa-angle-right arrow"></i>
                    </a>
                    <div class="sub-nav">
                        <a href="{{ route('appointment.index') }}" class="nav-link">
                            <i class="fa-light fa-calendar-check"></i>
                            <span>Appointment Calendar</span>
                        </a>
                        <a href="{{ route('appointment.list') }}" class="nav-link">
                            <i class="fa-light fa-list-ul"></i>
                            <span>Appointment List</span>
                        </a>
                        <a href="{{ route('appointment-settings.index') }}" class="nav-link">
                            <i class="fa-solid fa-sliders"></i>
                            <span>Appointment Setting</span>
                        </a>
                        <a href="{{ route('appointment-update.edit') }}" class="nav-link">
                            <i class="fa-light fa-file-pen"></i>
                            <span>Appointment update</span>
                        </a>
                    </div>
                </div>

                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-light fa-file-lines"></i>
                        <span>Other Updates</span>
                        <i class="fa-light fa-angle-right arrow"></i>
                    </a>
                    <div class="sub-nav">
                        <a href="{{ route('about-us.edit') }}" class="nav-link">
                            <i class="fa-light fa-file-pen"></i>
                            <span>About Update</span>
                        </a>
                        <a href="{{ route('homeupdate.edit') }}" class="nav-link">
                            <i class="fa-light fa-file-pen"></i>
                            <span>Home Update</span>
                        </a>
                        <a href="{{ route('contact-update.edit') }}" class="nav-link">
                            <i class="fa-light fa-file-pen"></i>
                            <span>Contact Update</span>
                        </a>
                        <a href="{{ route('privacy-policy.edit') }}" class="nav-link">
                            <i class="fa-light fa-file-pen"></i>
                            <span>Privacy Policy</span>
                        </a>
                        <a href="{{ route('terms-and-conditions.edit') }}" class="nav-link">
                            <i class="fa-light fa-file-pen"></i>
                            <span>Terms and Conditions</span>
                        </a>

                    </div>
                </div>

            </div>

            <div class="nav-section">
                <div class="nav-header">Settings</div>
                <div class="nav-item">
                    <a href="{{ route('websetting.edit') }}" class="nav-link">
                        <i class="fas fa-cog"></i>
                        <span>General Settings</span>
                    </a>
                </div>
            </div>
        </aside>
        @yield('content')


    </div>

    <!-- Add Modal HTML at the end of body but before closing body tag -->
    {{-- <div class="modal-overlay">
        <div class="modal">
            <div class="modal-header">
                <div class="header-content">
                    <h3>Add New Employee</h3>
                    <button class="close-modal">
                        <i class="fa-light fa-xmark"></i>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <form class="add-form">
                    <div class="form-row">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" placeholder="Enter first name">
                        </div>
                        <img src="http://royalcelebration.azeetechnology.com/wp-content/uploads/2025/02/DSC07885-1-scaled.jpg"
                            alt="">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" placeholder="Enter last name">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" placeholder="Enter email address">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="tel" placeholder="Enter phone number">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Department</label>
                            <div class="custom-select">
                                <div class="select-trigger">
                                    <span>Select Department</span>
                                    <i class="fa-light fa-chevron-down"></i>
                                </div>
                                <div class="select-menu">
                                    <div class="select-option" data-value="">Select Department</div>
                                    <div class="select-option" data-value="development">Development</div>
                                    <div class="select-option" data-value="design">Design</div>
                                    <div class="select-option" data-value="marketing">Marketing</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Position</label>
                            <div class="custom-select">
                                <div class="select-trigger">
                                    <span>Select Position</span>
                                    <i class="fa-light fa-chevron-down"></i>
                                </div>
                                <div class="select-menu">
                                    <div class="select-option" data-value="">Select Position</div>
                                    <div class="select-option" data-value="manager">Manager</div>
                                    <div class="select-option" data-value="developer">Developer</div>
                                    <div class="select-option" data-value="designer">Designer</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <textarea placeholder="Enter full address"></textarea>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn-cancel">Cancel</button>
                        <button type="submit" class="btn-submit">Add Employee</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
    @if (session('success') || $errors->any())
        <script>
            function showToast(message, type = 'success') {
                const toast = document.createElement('div');
                toast.className = `toast ${type}`;
                toast.innerHTML = `
                                        <span>${message}</span>
                                        <button class="close-btn" onclick="this.parentElement.remove()">×</button>
                                    `;
                document.body.appendChild(toast);
                setTimeout(() => toast.remove(), 3000);
            }

            // Trigger success toast
            @if (session('success'))
                showToast("{{ session('success') }}", "success");
            @endif

            // Trigger error toast
            @if ($errors->any())
                showToast("{{ $errors->first() }}", "error");
            @endif
        </script>

        <style>
            .toast {
                position: fixed;
                top: 20px;
                left: 50%;
                transform: translateX(-50%);
                min-width: 400px;
                padding: 15px 20px;
                color: #fff;
                border-radius: 8px;
                z-index: 9999;
                display: flex;
                justify-content: space-between;
                align-items: center;
                animation: fadeIn 0.3s ease, fadeOut 0.3s ease 2.7s;
            }

            .toast.success {
                background-color: #28a745;
            }

            .toast.error {
                background-color: #dc3545;
            }

            .toast .close-btn {
                background: none;
                border: none;
                color: #fff;
                font-size: 18px;
                margin-left: 15px;
                cursor: pointer;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                    top: 0;
                }

                to {
                    opacity: 1;
                    top: 20px;
                }
            }

            @keyframes fadeOut {
                from {
                    opacity: 1;
                    top: 20px;
                }

                to {
                    opacity: 0;
                    top: 0;
                }
            }
        </style>
    @endif
    @yield('script')
    <script>
        // Toggle sub-navigation
        document.querySelectorAll('.nav-item').forEach(item => {
            const link = item.querySelector('.nav-link');
            const subNav = item.querySelector('.sub-nav');

            if (subNav) {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    item.classList.toggle('active');
                    subNav.classList.toggle('active');
                });
            }
        });

        // Dropdown functionality
        document.querySelectorAll('.custom-dropdown').forEach(dropdown => {
            const trigger = dropdown.querySelector('.dropdown-trigger');
            const menu = dropdown.querySelector('.dropdown-menu');
            const items = dropdown.querySelectorAll('.dropdown-item');
            const triggerText = trigger.querySelector('span');

            trigger.addEventListener('click', () => {
                dropdown.classList.toggle('active');
            });

            items.forEach(item => {
                item.addEventListener('click', () => {
                    triggerText.textContent = item.textContent;
                    items.forEach(i => i.classList.remove('active'));
                    item.classList.add('active');
                    dropdown.classList.remove('active');
                });
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', (e) => {
                if (!dropdown.contains(e.target)) {
                    dropdown.classList.remove('active');
                }
            });
        });

        // Modal functionality
        const addButton = document.querySelector('.add-new');
        const modalOverlay = document.querySelector('.modal-overlay');
        const closeModal = document.querySelector('.close-modal');
        const cancelButton = document.querySelector('.btn-cancel');
        const modal = document.querySelector('.modal');

        function openModal() {
            modalOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeModalFunc() {
            modalOverlay.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        addButton.addEventListener('click', openModal);
        closeModal.addEventListener('click', closeModalFunc);
        cancelButton.addEventListener('click', closeModalFunc);

        modalOverlay.addEventListener('click', (e) => {
            if (e.target === modalOverlay) {
                closeModalFunc();
            }
        });

        // Prevent modal close when clicking inside the modal
        modal.addEventListener('click', (e) => {
            e.stopPropagation();
        });

        // Custom Select Functionality
        document.querySelectorAll('.custom-select').forEach(select => {
            const trigger = select.querySelector('.select-trigger');
            const menu = select.querySelector('.select-menu');
            const options = select.querySelectorAll('.select-option');
            const triggerText = trigger.querySelector('span');

            trigger.addEventListener('click', (e) => {
                e.stopPropagation();
                trigger.classList.toggle('active');
                menu.classList.toggle('active');
            });

            options.forEach(option => {
                option.addEventListener('click', () => {
                    triggerText.textContent = option.textContent;
                    options.forEach(opt => opt.classList.remove('selected'));
                    option.classList.add('selected');
                    trigger.classList.remove('active');
                    menu.classList.remove('active');
                });
            });

            document.addEventListener('click', () => {
                trigger.classList.remove('active');
                menu.classList.remove('active');
            });
        });

        // User Profile Dropdown
        const userProfile = document.querySelector('.user-profile');
        const profileTrigger = userProfile.querySelector('.profile-trigger');

        profileTrigger.addEventListener('click', (e) => {
            e.stopPropagation();
            userProfile.classList.toggle('active');
        });

        // Close profile dropdown when clicking outside
        document.addEventListener('click', () => {
            userProfile.classList.remove('active');
        });

        // Add this JavaScript for the glow effect
        document.querySelectorAll('.action-button').forEach(button => {
            button.addEventListener('mousemove', e => {
                const rect = button.getBoundingClientRect();
                const x = ((e.clientX - rect.left) / rect.width) * 100;
                const y = ((e.clientY - rect.top) / rect.height) * 100;
                button.style.setProperty('--x', `${x}%`);
                button.style.setProperty('--y', `${y}%`);
            });
        });

        // Notification Dropdown
        const notification = document.querySelector('.notification');
        const notificationIcon = notification.querySelector('i');

        notificationIcon.addEventListener('click', (e) => {
            e.stopPropagation();
            notification.classList.toggle('active');
        });

        // Close notification dropdown when clicking outside
        document.addEventListener('click', () => {
            notification.classList.remove('active');
        });
    </script>
    <script>
        function showToast(message, type = 'success') {
            const toast = document.createElement('div');
            toast.className = `toast ${type}`;
            toast.innerHTML = `
                <span>${message}</span>
                <button class="close-btn" onclick="this.parentElement.remove()">×</button>
            `;
            document.body.appendChild(toast);

            setTimeout(() => {
                toast.remove();
            }, 3000); // 3 seconds
        }
    </script>

</body>

</html>