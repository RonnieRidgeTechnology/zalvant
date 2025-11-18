<header class="header">
    <div class="search-wrapper" style="position: relative;">
        <div class="search-bar">
            <i class="fa-light fa-search"></i>
            <input type="text" id="search-input" placeholder="Search anything...">
            <div class="search-shortcuts"><span>⌘</span><span>K</span></div>
        </div>

        <div id="search-dropdown" class="search-dropdown" style="display: none;">
            <div class="search-dropdown-inner">
                @php
                    $searchRoutes = [
                        ['route' => 'websetting.edit', 'icon' => 'fas fa-cog', 'title' => 'General Settings'],
                        ['route' => 'new-technology.index', 'icon' => 'fa-light fa-circle-plus', 'title' => 'Add Technology'],
                        ['route' => 'faqs.index', 'icon' => 'fa-light fa-table-list', 'title' => 'Faqs'],
                        ['route' => 'testimonials.index', 'icon' => 'fa-light fa-sitemap', 'title' => 'Testimonials'],
                        ['route' => 'about-us.edit', 'icon' => 'fa-light fa-file-pen', 'title' => 'About Update'],
                        ['route' => 'contact-update.edit', 'icon' => 'fa-light fa-file-pen', 'title' => 'Contact Update'],
                        ['route' => 'service-update.edit', 'icon' => 'fa-light fa-file-pen', 'title' => 'Service Update'],
                        ['route' => 'Ai-deail.index', 'icon' => 'fa-light fa-box-open', 'title' => 'AI Deals'],
                        ['route' => 'Coure-value.index', 'icon' => 'fa-light fa-bars', 'title' => 'Core Values'],
                        ['route' => 'Why-choose-us.index', 'icon' => 'fa-light fa-clone', 'title' => 'Why Choose Us'],
                        ['route' => 'admin.service', 'icon' => 'fa-light fa-sliders', 'title' => 'Service'],
                        ['route' => 'admin.portfolio', 'icon' => 'fa-solid fa-briefcase', 'title' => 'Portfolio'],
                        ['route' => 'homeupdate.edit', 'icon' => 'fa-light fa-house', 'title' => 'Home Update'],
                        ['route' => 'dashboard', 'icon' => 'fa-light fa-house-user', 'title' => 'Dashboard'],
                        ['route' => 'blog.update.edit', 'icon' => 'fa-light fa-file-pen', 'title' => 'Blog Update'],
                        ['route' => 'blog-categories.index', 'icon' => 'fa-light fa-list-tree', 'title' => 'Blog Category'],
                        ['route' => 'blogs.index', 'icon' => 'fa-light fa-file-lines', 'title' => 'Blogs'],
                        ['route' => 'portfolio-update.edit', 'icon' => 'fa-light fa-file-pen', 'title' => 'Portfolio Update'],
                        ['route' => 'appointment-update.edit', 'icon' => 'fa-light fa-file-pen', 'title' => 'Appointment Update'],
                        ['route' => 'appointment-settings.index', 'icon' => 'fa-solid fa-sliders', 'title' => 'Appointment Setting'],
                        ['route' => 'appointment.index', 'icon' => 'fa-light fa-calendar-check', 'title' => 'Appointment Calendar'],
                        ['route' => 'appointment.list', 'icon' => 'fa-light fa-list-ul', 'title' => 'Appointment List'],
                        ['route' => 'privacy-policy.edit', 'icon' => 'fa-light fa-file-pen', 'title' => 'Privacy Policy'],
                        ['route' => 'terms-and-conditions.edit', 'icon' => 'fa-light fa-file-pen', 'title' => 'Terms and Conditions'],
                    ];
                @endphp

                @foreach ($searchRoutes as $item)
                    <a href="{{ route($item['route']) }}" class="search-item" data-title="{{ $item['title'] }}">
                        <i class="{{ $item['icon'] }}"></i> {{ $item['title'] }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="header-right">
        <div class="user-profile">
            @php
                $user = Auth::user();
                $initials = collect(explode(' ', $user->name))->map(fn($n) => strtoupper($n[0]))->implode('');
                $colors = ['#f44336','#e91e63','#9c27b0','#3f51b5','#03a9f4','#009688','#4caf50','#ff9800','#795548'];
                $bgColor = $colors[crc32($user->email) % count($colors)];
                $profilePath = public_path('uploads/adminprofile/' . $user->profile);
            @endphp

            <div class="profile-trigger" style="display: flex; align-items: center; gap: 10px;">
                <i class="fa-light fa-chevron-down"></i>
                @if ($user->profile && file_exists($profilePath))
                    <img src="{{ asset('uploads/adminprofile/' . $user->profile) }}" alt="{{ $user->name }}"
                         width="50" height="50"
                         style="border-radius: 50%; object-fit: cover; border: 2px solid #ddd;">
                @else
                    <div style="width: 50px;height: 50px;border-radius: 50%;background-color: {{ $bgColor }};
                                display: flex;align-items: center;justify-content: center;
                                font-weight: bold;color: #fff;font-size: 18px;border: 2px solid #ddd;">
                        {{ $initials }}
                    </div>
                @endif
            </div>

            <div class="profile-dropdown">
                <a href="{{ route('profile.show') }}" class="dropdown-item"><i class="fa-light fa-user"></i><span>Profile</span></a>
                <a href="{{ route('logout') }}" class="dropdown-item"><i class="fa-light fa-right-from-bracket"></i><span>Logout</span></a>
            </div>
        </div>
    </div>
</header>

<style>
    .search-bar {
        display: flex;
        align-items: center;
        gap: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        padding: 8px 12px;
        background: #fff;
    }

    .search-bar input {
        border: none;
        outline: none;
        flex: 1;
    }

    .search-shortcuts {
        background: #f0f0f0;
        padding: 2px 6px;
        border-radius: 4px;
        font-size: 12px;
        font-family: monospace;
        display: flex;
        gap: 2px;
    }

    .search-dropdown {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        max-height: 300px;
        z-index: 1000;
        backdrop-filter: blur(10px);
        background-color: rgba(255, 255, 255, 0.7);
        border: 1px solid #ccc;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .search-dropdown-inner {
        max-height: 300px;
        overflow-y: auto;
    }

    .search-item {
        display: flex;
        align-items: center;
        padding: 12px 16px;
        gap: 12px;
        text-decoration: none;
        color: #222;
        font-weight: 500;
        font-size: 15px;
        transition: background 0.3s ease, transform 0.2s ease;
    }

    .search-item:hover {
        background-color: rgba(240, 240, 240, 0.8);
        transform: scale(1.02);
        color: #000;
    }

    .profile-dropdown {
        display: none;
        position: absolute;
        top: 100%;
        right: 0;
        background: white;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 6px;
        min-width: 200px;
        z-index: 1000;
    }

    .user-profile.active .profile-dropdown {
        display: block;
    }

    .dropdown-item {
        padding: 10px 16px;
        display: flex;
        gap: 10px;
        color: #333;
        text-decoration: none;
    }

    .dropdown-item:hover {
        background: #f4f4f4;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const userProfile = document.querySelector('.user-profile');
        const profileTrigger = userProfile?.querySelector('.profile-trigger');
        const searchInput = document.getElementById('search-input');
        const dropdown = document.getElementById('search-dropdown');
        const searchItems = dropdown.querySelectorAll('.search-item');

        profileTrigger?.addEventListener('click', (e) => {
            e.stopPropagation();
            userProfile.classList.toggle('active');
        });

        document.addEventListener('keydown', function (event) {
            if ((event.ctrlKey || event.metaKey) && event.key.toLowerCase() === 'k') {
                event.preventDefault();
                dropdown.style.display = 'block';
                searchInput.focus();
            }
        });

        searchInput.addEventListener('input', function () {
            const value = this.value.toLowerCase().trim();
            let hasMatch = false;

            searchItems.forEach(item => {
                const title = item.dataset.title.toLowerCase();
                if (title.includes(value)) {
                    item.style.display = 'flex';
                    hasMatch = true;
                } else {
                    item.style.display = 'none';
                }
            });

            dropdown.style.display = hasMatch ? 'block' : 'none';
        });

        searchInput.addEventListener('click', () => {
            dropdown.style.display = 'block';
        });

        document.addEventListener('click', (e) => {
            if (!userProfile?.contains(e.target)) userProfile?.classList.remove('active');
            if (!dropdown.contains(e.target) && !searchInput.contains(e.target)) dropdown.style.display = 'none';
        });
    });
</script>
