    @extends('layouts.admin')

    <style>
        .image-preview {
            margin-top: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .image-preview img {
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .image-preview p {
            margin-bottom: 5px;
            color: #666;
        }

        .tags-input-container {
            width: 100%;
        }

        .tags-input-wrapper {
            border: 1px solid #ddd;
            padding: 8px;
            border-radius: 4px;
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            min-height: 42px;
            background: #fff;
        }

        .tags-list {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .tag-badge {
            background-color: #e9ecef;
            border-radius: 4px;
            padding: 4px 8px;
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 14px;
        }

        .tag-badge .remove-tag {
            cursor: pointer;
            color: #666;
            font-size: 12px;
            display: flex;
            align-items: center;
            padding: 2px;
        }

        .tag-badge .remove-tag:hover {
            color: #dc3545;
        }

        .tag-input-field {
            border: none;
            outline: none;
            flex: 1;
            min-width: 120px;
            font-size: 14px;
        }

        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .toggle-label {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .toggle-label:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        .status-toggle:checked+.toggle-label {
            background-color: #2196F3;
        }

        .status-toggle:checked+.toggle-label:before {
            transform: translateX(26px);
        }

        .status-toggle:focus+.toggle-label {
            box-shadow: 0 0 1px #2196F3;
        }

        /* Language Tabs */
        .language-tabs {
            display: flex;
            gap: 10px;
            border-bottom: 2px solid #e5e7eb;
            margin-bottom: 20px;
        }

        .tab-button {
            padding: 12px 24px;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            color: #6b7280;
            border-bottom: 2px solid transparent;
            margin-bottom: -2px;
            transition: all 0.3s ease;
        }

        .tab-button:hover {
            color: #3b82f6;
        }

        .tab-button.active {
            color: #3b82f6;
            border-bottom-color: #3b82f6;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .form-section {
            margin-bottom: 30px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .form-section h4 {
            margin-bottom: 20px;
            color: #333;
            font-weight: 600;
        }
    </style>
    <style>
        .action-btn.view-comments {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
        }

        .action-btn.view-comments:hover {
            background-color: #45a049;
        }
    </style>


    @section('content')
    <main class="main-content">
        @include('layouts.header')
        <div class="content">
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon bg-primary">
                        <i class="fa-light fa-newspaper"></i>
                    </div>
                    <div class="stat-info">
                        <h4>{{ $blogs->count() }}</h4>
                        <p>Total Blogs</p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon bg-success">
                        <i class="fa-light fa-folder"></i>
                    </div>
                    <div class="stat-info">
                        <h4>{{ $categories->count() }}</h4>
                        <p>Categories</p>
                    </div>
                </div>
            </div>

            <div class="table-section">
                <div class="table-header">
                    <h2>Blog Management</h2>
                    <div class="table-actions">
                        <button class="action-button add-new">
                            <i class="fa-light fa-plus"></i>
                            <span>Add New Blog</span>
                        </button>
                    </div>
                </div>

                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Thumbnail</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Tags</th>
                                <th>Comments</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                            <tr data-blog-id="{{ $blog->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset('uploads/blogs/' . $blog->thumbnail) }}"
                                        alt="{{ $blog->title }}" style="width: 50px; height: 50px; object-fit: cover;">
                                </td>
                                <td>
                                    <div class="blog-info">
                                        <h4>{{ $blog->title }}</h4>
                                        <span>{!! Str::limit($blog->desc, 50) !!}</span>
                                    </div>
                                </td>
                                <td>{{ $blog->category->title ?? 'N/A' }}</td>
                                <td>
                                    @if ($blog->tags)
                                    @foreach ($blog->tags as $tag)
                                    <span
                                        style="display: inline-block; background: #e1f5fe; color: #0288d1; padding: 2px 8px; border-radius: 12px; font-size: 12px; margin: 2px;">{{ $tag }}</span>
                                    @endforeach
                                    @else
                                    <span style="color: #6c757d;">N/A</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($blog->comments)
                                    <span
                                        style="display: inline-block; background: #e1f5fe; color: green; padding: 2px 8px; border-radius: 12px; font-size: 12px; margin: 2px;">{{ $blog->comments->count() }}</span>
                                    @else
                                    <span style="color: #6c757d;">N/A</span>
                                    @endif
                                </td>
                                <td>
                                    <span
                                        style="padding: 2px 8px;border-radius: 20px;background-color: {{ $blog->status ? '#28a745' : '#6c757d' }};color: white;">
                                        {{ $blog->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('comments.index', $blog->id) }}" class="action-btn comments" data-tooltip="View Comments">
                                            <span class="btn-content">
                                                <i class="fa-light fa-comments"></i>
                                                <p class="btn-text">Comments</p>
                                            </span>
                                        </a>
                                        <button class="action-btn view"
                                            data-id="{{ $blog->id }}"
                                            data-category="{{ $blog->category->title ?? 'N/A' }}"
                                            data-status="{{ $blog->status }}"
                                            data-image="{{ $blog->image }}"
                                            data-thumbnail="{{ $blog->thumbnail }}"
                                            data-image_alt="{{ $blog->image_alt }}"
                                            data-thumbnail_alt="{{ $blog->thumbnail_alt }}"
                                            data-tags="{{ json_encode($blog->tags) }}"
                                            data-title="{{ $blog->title }}"
                                            data-desc="{{ htmlspecialchars($blog->desc) }}"
                                            data-meta_title="{{ $blog->meta_title }}"
                                            data-meta_desc="{{ $blog->meta_desc }}"
                                            data-meta_keyword="{{ $blog->meta_keyword }}"
                                            data-title_en="{{ $blog->title_en }}"
                                            data-desc_en="{{ htmlspecialchars($blog->desc_en) }}"
                                            data-meta_title_en="{{ $blog->meta_title_en }}"
                                            data-meta_desc_en="{{ $blog->meta_desc_en }}"
                                            data-meta_keyword_en="{{ $blog->meta_keyword_en }}"
                                            data-title_fr="{{ $blog->title_fr }}"
                                            data-desc_fr="{{ htmlspecialchars($blog->desc_fr) }}"
                                            data-meta_title_fr="{{ $blog->meta_title_fr }}"
                                            data-meta_desc_fr="{{ $blog->meta_desc_fr }}"
                                            data-meta_keyword_fr="{{ $blog->meta_keyword_fr }}"
                                            data-title_de="{{ $blog->title_de }}"
                                            data-desc_de="{{ htmlspecialchars($blog->desc_de) }}"
                                            data-meta_title_de="{{ $blog->meta_title_de }}"
                                            data-meta_desc_de="{{ $blog->meta_desc_de }}"
                                            data-meta_keyword_de="{{ $blog->meta_keyword_de }}"
                                            data-tooltip="View Blog">
                                            <span class="btn-content">
                                                <i class="fa-light fa-eye"></i>
                                                <p class="btn-text">View</p>
                                            </span>
                                        </button>

                                        <button class="action-btn edit"
                                            data-id="{{ $blog->id }}"
                                            data-blogcategories_id="{{ $blog->blogcategories_id }}"
                                            data-image="{{ $blog->image }}"
                                            data-thumbnail="{{ $blog->thumbnail }}"
                                            data-image_alt="{{ $blog->image_alt }}"
                                            data-thumbnail_alt="{{ $blog->thumbnail_alt }}"
                                            data-tags="{{ json_encode($blog->tags) }}"
                                            data-title="{{ $blog->title }}"
                                            data-desc="{{ htmlspecialchars($blog->desc) }}"
                                            data-meta_title="{{ $blog->meta_title }}"
                                            data-meta_desc="{{ $blog->meta_desc }}"
                                            data-meta_keyword="{{ $blog->meta_keyword }}"
                                            data-title_en="{{ $blog->title_en }}"
                                            data-desc_en="{{ htmlspecialchars($blog->desc_en) }}"
                                            data-meta_title_en="{{ $blog->meta_title_en }}"
                                            data-meta_desc_en="{{ $blog->meta_desc_en }}"
                                            data-meta_keyword_en="{{ $blog->meta_keyword_en }}"
                                            data-title_fr="{{ $blog->title_fr }}"
                                            data-desc_fr="{{ htmlspecialchars($blog->desc_fr) }}"
                                            data-meta_title_fr="{{ $blog->meta_title_fr }}"
                                            data-meta_desc_fr="{{ $blog->meta_desc_fr }}"
                                            data-meta_keyword_fr="{{ $blog->meta_keyword_fr }}"
                                            data-title_de="{{ $blog->title_de }}"
                                            data-desc_de="{{ htmlspecialchars($blog->desc_de) }}"
                                            data-meta_title_de="{{ $blog->meta_title_de }}"
                                            data-meta_desc_de="{{ $blog->meta_desc_de }}"
                                            data-meta_keyword_de="{{ $blog->meta_keyword_de }}"
                                            data-tooltip="Edit Blog">
                                            <span class="btn-content">
                                                <i class="fa-light fa-pen"></i>
                                                <p class="btn-text">Edit</p>
                                            </span>
                                        </button>

                                        <button class="action-btn status" data-id="{{ $blog->id }}"
                                            data-status="{{ $blog->status }}">
                                            <span class="btn-content">
                                                <i class="fa-light fa-circle-check"></i>
                                                <p class="btn-text">Status</p>
                                            </span>
                                        </button>
                                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-btn delete" data-tooltip="Delete Blog">
                                                <span class="btn-content">
                                                    <i class="fa-light fa-trash"></i>
                                                    <p class="btn-text">Delete</p>
                                                </span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        @include('partials.custom_pagination', ['paginator' => $blogs])
                    </div>
                </div>
            </div>
        </div>

        <!-- Blog Modal -->
        <div class="modal-overlay">
            <div class="modal" style="width: 90%; max-width: 1200px;">
                <div class="modal-header">
                    <div class="header-content">
                        <h3 class="modal-title">Add New Blog</h3>
                        <button class="close-modal">
                            <i class="fa-light fa-xmark"></i>
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    <form class="add-form" id="blogForm" method="POST" action="{{ route('blogs.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="blogId" name="id">
                        <input type="hidden" name="_method" value="POST">

                        <!-- Universal Settings Section -->
                        <div class="form-section">
                            <h4>Universal Settings</h4>

                            <div class="form-group">
                                <label>Category <span style="color: red;">*</span></label>
                                <div class="custom-select">
                                    <select name="blogcategories_id" required>
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                        @if ($category->status == 1)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label>Featured Image <span style="color: red;">*</span></label>
                                    <input type="file" name="image" accept="image/*" required>
                                </div>
                                <div class="form-group">
                                    <label>Thumbnail <span style="color: red;">*</span></label>
                                    <input type="file" name="thumbnail" accept="image/*" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label>Featured Image Alt <span style="color: red;">*</span></label>
                                    <input type="text" name="image_alt" placeholder="Enter featured image alt" required>
                                </div>
                                <div class="form-group">
                                    <label>Thumbnail Alt <span style="color: red;">*</span></label>
                                    <input type="text" name="thumbnail_alt" placeholder="Enter thumbnail alt" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Tags</label>
                                <div class="tags-input-container">
                                    <input type="hidden" name="tags" id="tagsInput">
                                    <div class="tags-input-wrapper">
                                        <div class="tags-list"></div>
                                        <input type="text" class="tag-input-field"
                                            placeholder="Enter tags and press Enter">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Multilingual Content Section -->
                        <div class="form-section">
                            <h4>Multilingual Content</h4>

                            <!-- Language Tabs -->
                            <div class="language-tabs">
                                <button type="button" class="tab-button active" onclick="switchBlogTab(event, 'blog-dutch')">
                                    🇳🇱 Dutch (Default)
                                </button>
                                <button type="button" class="tab-button" onclick="switchBlogTab(event, 'blog-english')">
                                    🇬🇧 English
                                </button>
                                <button type="button" class="tab-button" onclick="switchBlogTab(event, 'blog-french')">
                                    🇫🇷 French
                                </button>
                                <button type="button" class="tab-button" onclick="switchBlogTab(event, 'blog-german')">
                                    🇩🇪 German
                                </button>
                            </div>

                            <!-- Dutch Tab -->
                            <div id="blog-dutch" class="tab-content active">
                                <div class="form-group">
                                    <label>Title (Dutch) <span style="color: red;">*</span></label>
                                    <input type="text" name="title" id="title" placeholder="Enter blog title in Dutch" required>
                                </div>

                                <div class="form-group">
                                    <label>Description (Dutch) <span style="color: red;">*</span></label>
                                    <textarea name="desc" id="desc" placeholder="Enter blog description in Dutch" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Meta Title (Dutch) <span style="color: red;">*</span></label>
                                    <input type="text" name="meta_title" id="meta_title" placeholder="Enter meta title in Dutch" required>
                                </div>

                                <div class="form-group">
                                    <label>Meta Description (Dutch) <span style="color: red;">*</span></label>
                                    <textarea name="meta_desc" id="meta_desc" placeholder="Enter meta description in Dutch" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Meta Keywords (Dutch) <span style="color: red;">*</span></label>
                                    <input type="text" name="meta_keyword" id="meta_keyword" placeholder="Enter meta keywords in Dutch" required>
                                </div>
                            </div>

                            <!-- English Tab -->
                            <div id="blog-english" class="tab-content">
                                <div class="form-group">
                                    <label>Title (English)</label>
                                    <input type="text" name="title_en" id="title_en" placeholder="Enter blog title in English">
                                </div>

                                <div class="form-group">
                                    <label>Description (English)</label>
                                    <textarea name="desc_en" id="desc_en" placeholder="Enter blog description in English"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Meta Title (English)</label>
                                    <input type="text" name="meta_title_en" id="meta_title_en" placeholder="Enter meta title in English">
                                </div>

                                <div class="form-group">
                                    <label>Meta Description (English)</label>
                                    <textarea name="meta_desc_en" id="meta_desc_en" placeholder="Enter meta description in English"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Meta Keywords (English)</label>
                                    <input type="text" name="meta_keyword_en" id="meta_keyword_en" placeholder="Enter meta keywords in English">
                                </div>
                            </div>

                            <!-- French Tab -->
                            <div id="blog-french" class="tab-content">
                                <div class="form-group">
                                    <label>Title (French)</label>
                                    <input type="text" name="title_fr" id="title_fr" placeholder="Enter blog title in French">
                                </div>

                                <div class="form-group">
                                    <label>Description (French)</label>
                                    <textarea name="desc_fr" id="desc_fr" placeholder="Enter blog description in French"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Meta Title (French)</label>
                                    <input type="text" name="meta_title_fr" id="meta_title_fr" placeholder="Enter meta title in French">
                                </div>

                                <div class="form-group">
                                    <label>Meta Description (French)</label>
                                    <textarea name="meta_desc_fr" id="meta_desc_fr" placeholder="Enter meta description in French"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Meta Keywords (French)</label>
                                    <input type="text" name="meta_keyword_fr" id="meta_keyword_fr" placeholder="Enter meta keywords in French">
                                </div>
                            </div>

                            <!-- German Tab -->
                            <div id="blog-german" class="tab-content">
                                <div class="form-group">
                                    <label>Title (German)</label>
                                    <input type="text" name="title_de" id="title_de" placeholder="Enter blog title in German">
                                </div>

                                <div class="form-group">
                                    <label>Description (German)</label>
                                    <textarea name="desc_de" id="desc_de" placeholder="Enter blog description in German"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Meta Title (German)</label>
                                    <input type="text" name="meta_title_de" id="meta_title_de" placeholder="Enter meta title in German">
                                </div>

                                <div class="form-group">
                                    <label>Meta Description (German)</label>
                                    <textarea name="meta_desc_de" id="meta_desc_de" placeholder="Enter meta description in German"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Meta Keywords (German)</label>
                                    <input type="text" name="meta_keyword_de" id="meta_keyword_de" placeholder="Enter meta keywords in German">
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn-cancel">Cancel</button>
                            <button type="submit" class="action-button" id="submitButton">Add Blog</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <!-- Delete Modal -->
    <div class="modal-overlay" id="deleteModal" style="display:none;">
        <div class="modal" style="width: 500px; max-width: 90%;">
            <div class="modal-header">
                <h3>Confirm Deletion</h3>
                <button class="close-modal" id="closeDeleteModal"><i class="fa-light fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this section?</p>
                <div class="form-actions">
                    <button type="button" class="btn-cancel" id="cancelDelete">Cancel</button>
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-submit btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Status Modal -->
    <div class="modal-overlay" id="statusModal" style="display:none;">
        <div class="modal" style="width: 500px; max-width: 90%;">
            <div class="modal-header">
                <h3>Change Status</h3>
                <button class="close-modal" id="closestatusmodal"><i class="fa-light fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <p id="statusConfirmText">Are you sure you want to change the status?</p>
                <div class="form-actions">
                    <button type="button" class="btn-cancel" id="cancelstatus">Cancel</button>
                    <form method="POST" id="statusForm">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn-submit btn-warning" id="statusSubmitBtn">Change</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- View Modal -->
    <div class="modal-overlay" id="viewModal" style="display:none;">
        <div class="modal" style="width: 90%; max-width: 1200px;">
            <div class="modal-header">
                <h3>Blog Details</h3>
                <button class="close-modal" id="closeViewModal"><i class="fa-light fa-xmark"></i></button>
            </div>
            <div class="modal-body" style="padding-top: 20px;">
                <!-- Universal Settings Section -->
                <div class="form-section" style="background: #f8f9fa; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                    <h4 style="margin-bottom: 15px;">Universal Settings</h4>
                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px;">
                        <div>
                            <strong>Category:</strong>
                            <div id="viewCategory" style="margin-top: 5px;"></div>
                        </div>
                        <div>
                            <strong>Status:</strong>
                            <div id="viewStatus" style="margin-top: 5px;"></div>
                        </div>
                        <div>
                            <strong>Featured Image:</strong><br>
                            <img id="viewImage" src="#" alt="Featured Image" style="max-width: 200px; margin-top: 10px; border-radius: 4px;">
                        </div>
                        <div>
                            <strong>Thumbnail:</strong><br>
                            <img id="viewThumbnail" src="#" alt="Thumbnail" style="max-width: 200px; margin-top: 10px; border-radius: 4px;">
                        </div>
                        <div>
                            <strong>Featured Image Alt:</strong>
                            <div id="viewImageAlt" style="margin-top: 5px;"></div>
                        </div>
                        <div>
                            <strong>Thumbnail Alt:</strong>
                            <div id="viewThumbnailAlt" style="margin-top: 5px;"></div>
                        </div>
                        <div style="grid-column: 1 / -1;">
                            <strong>Tags:</strong>
                            <div id="viewTags" style="margin-top: 10px;"></div>
                        </div>
                    </div>
                </div>

                <!-- Multilingual Content Section -->
                <div class="form-section" style="background: #f8f9fa; padding: 15px; border-radius: 8px;">
                    <h4 style="margin-bottom: 15px;">Multilingual Content</h4>

                    <!-- Language Tabs -->
                    <div class="language-tabs">
                        <button type="button" class="tab-button active" onclick="switchViewBlogTab(event, 'view-blog-dutch')">
                            🇳🇱 Dutch
                        </button>
                        <button type="button" class="tab-button" onclick="switchViewBlogTab(event, 'view-blog-english')">
                            🇬🇧 English
                        </button>
                        <button type="button" class="tab-button" onclick="switchViewBlogTab(event, 'view-blog-french')">
                            🇫🇷 French
                        </button>
                        <button type="button" class="tab-button" onclick="switchViewBlogTab(event, 'view-blog-german')">
                            🇩🇪 German
                        </button>
                    </div>

                    <!-- Dutch Tab -->
                    <div id="view-blog-dutch" class="tab-content active">
                        <div style="display: grid; grid-template-columns: 1fr; gap: 15px;">
                            <div><strong>Title:</strong>
                                <div id="viewTitle"></div>
                            </div>
                            <div><strong>Description:</strong>
                                <div id="viewDesc" style="max-height: 300px; overflow-y: auto;"></div>
                            </div>
                            <div><strong>Meta Title:</strong>
                                <div id="viewMetaTitle"></div>
                            </div>
                            <div><strong>Meta Description:</strong>
                                <div id="viewMetaDesc"></div>
                            </div>
                            <div><strong>Meta Keywords:</strong>
                                <div id="viewMetaKeyword"></div>
                            </div>
                        </div>
                    </div>

                    <!-- English Tab -->
                    <div id="view-blog-english" class="tab-content">
                        <div style="display: grid; grid-template-columns: 1fr; gap: 15px;">
                            <div><strong>Title (English):</strong>
                                <div id="viewTitleEn"></div>
                            </div>
                            <div><strong>Description (English):</strong>
                                <div id="viewDescEn" style="max-height: 300px; overflow-y: auto;"></div>
                            </div>
                            <div><strong>Meta Title (English):</strong>
                                <div id="viewMetaTitleEn"></div>
                            </div>
                            <div><strong>Meta Description (English):</strong>
                                <div id="viewMetaDescEn"></div>
                            </div>
                            <div><strong>Meta Keywords (English):</strong>
                                <div id="viewMetaKeywordEn"></div>
                            </div>
                        </div>
                    </div>

                    <!-- French Tab -->
                    <div id="view-blog-french" class="tab-content">
                        <div style="display: grid; grid-template-columns: 1fr; gap: 15px;">
                            <div><strong>Title (French):</strong>
                                <div id="viewTitleFr"></div>
                            </div>
                            <div><strong>Description (French):</strong>
                                <div id="viewDescFr" style="max-height: 300px; overflow-y: auto;"></div>
                            </div>
                            <div><strong>Meta Title (French):</strong>
                                <div id="viewMetaTitleFr"></div>
                            </div>
                            <div><strong>Meta Description (French):</strong>
                                <div id="viewMetaDescFr"></div>
                            </div>
                            <div><strong>Meta Keywords (French):</strong>
                                <div id="viewMetaKeywordFr"></div>
                            </div>
                        </div>
                    </div>

                    <!-- German Tab -->
                    <div id="view-blog-german" class="tab-content">
                        <div style="display: grid; grid-template-columns: 1fr; gap: 15px;">
                            <div><strong>Title (German):</strong>
                                <div id="viewTitleDe"></div>
                            </div>
                            <div><strong>Description (German):</strong>
                                <div id="viewDescDe" style="max-height: 300px; overflow-y: auto;"></div>
                            </div>
                            <div><strong>Meta Title (German):</strong>
                                <div id="viewMetaTitleDe"></div>
                            </div>
                            <div><strong>Meta Description (German):</strong>
                                <div id="viewMetaDescDe"></div>
                            </div>
                            <div><strong>Meta Keywords (German):</strong>
                                <div id="viewMetaKeywordDe"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (window.CKEDITOR) {
                CKEDITOR.replace('desc');
                CKEDITOR.replace('desc_en');
                CKEDITOR.replace('desc_fr');
                CKEDITOR.replace('desc_de');
            }
        });

        if (window.CKEDITOR) {
            for (var instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
        }

        const addButtonBlog = document.querySelector('.add-new');
        const modalOverlayBlog = document.querySelector('.modal-overlay');
        const closeModalBlog = document.querySelector('.close-modal');
        const cancelButtonBlog = document.querySelector('.btn-cancel');
        const modalBlog = document.querySelector('.modal');
        const modalTitleBlog = document.querySelector('.modal-title');
        const submitButton = document.querySelector('#submitButton');
        const blogForm = document.querySelector('#blogForm');

        // Helper to decode HTML entities
        function decodeHtml(html) {
            if (!html) return '';
            const txt = document.createElement('textarea');
            txt.innerHTML = html;
            return txt.value;
        }

        // Add button - opens modal in add mode
        addButtonBlog.addEventListener('click', function() {
            modalOverlayBlog.classList.add('active');
            document.body.style.overflow = 'hidden';
            
            modalTitleBlog.textContent = 'Add New Blog';
            submitButton.textContent = 'Add Blog';
            var storeUrl = '{{ route("blogs.store") }}';
            blogForm.action = storeUrl;
            blogForm.querySelector('input[name="_method"]').value = 'POST';
            
            blogForm.reset();
            
            if (window.CKEDITOR) {
                if (CKEDITOR.instances['desc']) CKEDITOR.instances['desc'].setData('');
                if (CKEDITOR.instances['desc_en']) CKEDITOR.instances['desc_en'].setData('');
                if (CKEDITOR.instances['desc_fr']) CKEDITOR.instances['desc_fr'].setData('');
                if (CKEDITOR.instances['desc_de']) CKEDITOR.instances['desc_de'].setData('');
            }
            
            document.querySelector('.tags-list').innerHTML = '';
            document.querySelector('#tagsInput').value = '[]';
            window.tags = [];
            
            document.querySelectorAll('.image-preview').forEach(function(preview) {
                preview.remove();
            });
            
            blogForm.querySelector('input[name="image"]').setAttribute('required', 'required');
            blogForm.querySelector('input[name="thumbnail"]').setAttribute('required', 'required');
            
            document.getElementById('blog-dutch').classList.add('active');
            document.getElementById('blog-english').classList.remove('active');
            document.getElementById('blog-french').classList.remove('active');
            document.getElementById('blog-german').classList.remove('active');
            
            var tabButtons = modalBlog.querySelectorAll('.tab-button');
            tabButtons.forEach(function(btn, idx) {
                if (idx === 0) btn.classList.add('active');
                else btn.classList.remove('active');
            });
        });

        // Edit button - opens modal with data
        document.querySelectorAll('.action-btn.edit').forEach(function(editButton) {
            editButton.addEventListener('click', function(e) {
                e.preventDefault();
                
                modalOverlayBlog.classList.add('active');
                document.body.style.overflow = 'hidden';
                
                modalTitleBlog.textContent = 'Edit Blog';
                submitButton.textContent = 'Update Blog';
                blogForm.action = '/admin/blogs/' + this.getAttribute('data-id');
                blogForm.querySelector('input[name="_method"]').value = 'PUT';
                
                var imageInput = blogForm.querySelector('input[name="image"]');
                var thumbnailInput = blogForm.querySelector('input[name="thumbnail"]');
                imageInput.removeAttribute('required');
                thumbnailInput.removeAttribute('required');
                
                document.getElementById('blog-dutch').classList.add('active');
                document.getElementById('blog-english').classList.remove('active');
                document.getElementById('blog-french').classList.remove('active');
                document.getElementById('blog-german').classList.remove('active');
                
                var tabButtons = modalBlog.querySelectorAll('.tab-button');
                tabButtons.forEach(function(btn, idx) {
                    if (idx === 0) btn.classList.add('active');
                    else btn.classList.remove('active');
                });
                
                document.querySelector('select[name="blogcategories_id"]').value = this.getAttribute('data-blogcategories_id') || '';
                document.querySelector('input[name="image_alt"]').value = this.getAttribute('data-image_alt') || '';
                document.querySelector('input[name="thumbnail_alt"]').value = this.getAttribute('data-thumbnail_alt') || '';
                
                document.querySelector('input[name="title"]').value = this.getAttribute('data-title') || '';
                document.querySelector('input[name="meta_title"]').value = this.getAttribute('data-meta_title') || '';
                document.querySelector('textarea[name="meta_desc"]').value = this.getAttribute('data-meta_desc') || '';
                document.querySelector('input[name="meta_keyword"]').value = this.getAttribute('data-meta_keyword') || '';
                
                document.querySelector('input[name="title_en"]').value = this.getAttribute('data-title_en') || '';
                document.querySelector('input[name="meta_title_en"]').value = this.getAttribute('data-meta_title_en') || '';
                document.querySelector('textarea[name="meta_desc_en"]').value = this.getAttribute('data-meta_desc_en') || '';
                document.querySelector('input[name="meta_keyword_en"]').value = this.getAttribute('data-meta_keyword_en') || '';
                
                document.querySelector('input[name="title_fr"]').value = this.getAttribute('data-title_fr') || '';
                document.querySelector('input[name="meta_title_fr"]').value = this.getAttribute('data-meta_title_fr') || '';
                document.querySelector('textarea[name="meta_desc_fr"]').value = this.getAttribute('data-meta_desc_fr') || '';
                document.querySelector('input[name="meta_keyword_fr"]').value = this.getAttribute('data-meta_keyword_fr') || '';
                
                document.querySelector('input[name="title_de"]').value = this.getAttribute('data-title_de') || '';
                document.querySelector('input[name="meta_title_de"]').value = this.getAttribute('data-meta_title_de') || '';
                document.querySelector('textarea[name="meta_desc_de"]').value = this.getAttribute('data-meta_desc_de') || '';
                document.querySelector('input[name="meta_keyword_de"]').value = this.getAttribute('data-meta_keyword_de') || '';
                
                var buttonThis = this;
                setTimeout(function() {
                    if (window.CKEDITOR) {
                        if (CKEDITOR.instances['desc']) {
                            CKEDITOR.instances['desc'].setData(decodeHtml(buttonThis.getAttribute('data-desc')));
                        }
                        if (CKEDITOR.instances['desc_en']) {
                            CKEDITOR.instances['desc_en'].setData(decodeHtml(buttonThis.getAttribute('data-desc_en')));
                        }
                        if (CKEDITOR.instances['desc_fr']) {
                            CKEDITOR.instances['desc_fr'].setData(decodeHtml(buttonThis.getAttribute('data-desc_fr')));
                        }
                        if (CKEDITOR.instances['desc_de']) {
                            CKEDITOR.instances['desc_de'].setData(decodeHtml(buttonThis.getAttribute('data-desc_de')));
                        }
                    }
                }, 300);
                
                document.querySelectorAll('.image-preview').forEach(function(preview) {
                    preview.remove();
                });
                
                if (this.getAttribute('data-image')) {
                    var imagePreview = document.createElement('div');
                    imagePreview.className = 'image-preview';
                    imagePreview.innerHTML = '<p>Current Image:</p><img src="/uploads/blogs/' + this.getAttribute('data-image') + '" style="max-width: 200px; margin-top: 10px; border-radius: 4px;">';
                    imageInput.parentElement.appendChild(imagePreview);
                }
                
                if (this.getAttribute('data-thumbnail')) {
                    var thumbnailPreview = document.createElement('div');
                    thumbnailPreview.className = 'image-preview';
                    thumbnailPreview.innerHTML = '<p>Current Thumbnail:</p><img src="/uploads/blogs/' + this.getAttribute('data-thumbnail') + '" style="max-width: 200px; margin-top: 10px; border-radius: 4px;">';
                    thumbnailInput.parentElement.appendChild(thumbnailPreview);
                }
                
                var tags = JSON.parse(this.getAttribute('data-tags') || '[]');
                var tagsContainer = document.querySelector('.tags-list');
                var hiddenTagsInput = document.querySelector('#tagsInput');
                
                tagsContainer.innerHTML = '';
                window.tags = tags;
                
                tags.forEach(function(tag) {
                    var tagElement = document.createElement('span');
                    tagElement.className = 'tag-badge';
                    tagElement.innerHTML = tag + '<span class="remove-tag"><i class="fa-light fa-xmark"></i></span>';
                    tagElement.querySelector('.remove-tag').addEventListener('click', function() {
                        window.tags = window.tags.filter(function(t) {
                            return t !== tag;
                        });
                        hiddenTagsInput.value = JSON.stringify(window.tags);
                        tagElement.remove();
                    });
                    tagsContainer.appendChild(tagElement);
                });
                
                hiddenTagsInput.value = JSON.stringify(window.tags);
            });
        });

        // View button functionality
        document.querySelectorAll('.action-btn.view').forEach(viewButton => {
            viewButton.addEventListener('click', function(e) {
                e.preventDefault();

                // Get all data from button attributes
                const blogData = {
                    id: this.getAttribute('data-id'),
                    category: this.getAttribute('data-category'),
                    status: this.getAttribute('data-status'),
                    image: this.getAttribute('data-image'),
                    thumbnail: this.getAttribute('data-thumbnail'),
                    image_alt: this.getAttribute('data-image_alt'),
                    thumbnail_alt: this.getAttribute('data-thumbnail_alt'),
                    tags: JSON.parse(this.getAttribute('data-tags') || '[]'),
                    // Dutch
                    title: this.getAttribute('data-title'),
                    desc: this.getAttribute('data-desc'),
                    meta_title: this.getAttribute('data-meta_title'),
                    meta_desc: this.getAttribute('data-meta_desc'),
                    meta_keyword: this.getAttribute('data-meta_keyword'),
                    // English
                    title_en: this.getAttribute('data-title_en'),
                    desc_en: this.getAttribute('data-desc_en'),
                    meta_title_en: this.getAttribute('data-meta_title_en'),
                    meta_desc_en: this.getAttribute('data-meta_desc_en'),
                    meta_keyword_en: this.getAttribute('data-meta_keyword_en'),
                    // French
                    title_fr: this.getAttribute('data-title_fr'),
                    desc_fr: this.getAttribute('data-desc_fr'),
                    meta_title_fr: this.getAttribute('data-meta_title_fr'),
                    meta_desc_fr: this.getAttribute('data-meta_desc_fr'),
                    meta_keyword_fr: this.getAttribute('data-meta_keyword_fr'),
                    // German
                    title_de: this.getAttribute('data-title_de'),
                    desc_de: this.getAttribute('data-desc_de'),
                    meta_title_de: this.getAttribute('data-meta_title_de'),
                    meta_desc_de: this.getAttribute('data-meta_desc_de'),
                    meta_keyword_de: this.getAttribute('data-meta_keyword_de'),
                };

                openViewModal(blogData);
            });
        });

        // Function to open view modal
        function openViewModal(blogData) {
            const viewModal = document.getElementById('viewModal');

            // Helper to decode HTML entities
            const decodeHtml = (html) => {
                const txt = document.createElement('textarea');
                txt.innerHTML = html;
                return txt.value;
            };

            // Universal Settings
            document.getElementById('viewCategory').textContent = blogData.category || 'N/A';
            document.getElementById('viewStatus').innerHTML = blogData.status == 1 ?
                '<span style="color: green;">Active</span>' :
                '<span style="color: red;">Inactive</span>';
            document.getElementById('viewImage').src = `/uploads/blogs/${blogData.image}`;
            document.getElementById('viewThumbnail').src = `/uploads/blogs/${blogData.thumbnail}`;
            document.getElementById('viewImageAlt').textContent = blogData.image_alt || '-';
            document.getElementById('viewThumbnailAlt').textContent = blogData.thumbnail_alt || '-';

            // Tags
            const tagsContainer = document.getElementById('viewTags');
            if (blogData.tags && blogData.tags.length > 0) {
                tagsContainer.innerHTML = blogData.tags.map(tag =>
                    `<span style="display: inline-block; background: #e1f5fe; color: #0288d1; padding: 4px 12px; border-radius: 12px; font-size: 12px; margin: 2px;">${tag}</span>`
                ).join('');
            } else {
                tagsContainer.textContent = 'No tags';
            }

            // Dutch Content
            document.getElementById('viewTitle').textContent = blogData.title || '-';
            document.getElementById('viewDesc').innerHTML = decodeHtml(blogData.desc || '-');
            document.getElementById('viewMetaTitle').textContent = blogData.meta_title || '-';
            document.getElementById('viewMetaDesc').textContent = blogData.meta_desc || '-';
            document.getElementById('viewMetaKeyword').textContent = blogData.meta_keyword || '-';

            // English Content
            document.getElementById('viewTitleEn').textContent = blogData.title_en || '-';
            document.getElementById('viewDescEn').innerHTML = decodeHtml(blogData.desc_en || '-');
            document.getElementById('viewMetaTitleEn').textContent = blogData.meta_title_en || '-';
            document.getElementById('viewMetaDescEn').textContent = blogData.meta_desc_en || '-';
            document.getElementById('viewMetaKeywordEn').textContent = blogData.meta_keyword_en || '-';

            // French Content
            document.getElementById('viewTitleFr').textContent = blogData.title_fr || '-';
            document.getElementById('viewDescFr').innerHTML = decodeHtml(blogData.desc_fr || '-');
            document.getElementById('viewMetaTitleFr').textContent = blogData.meta_title_fr || '-';
            document.getElementById('viewMetaDescFr').textContent = blogData.meta_desc_fr || '-';
            document.getElementById('viewMetaKeywordFr').textContent = blogData.meta_keyword_fr || '-';

            // German Content
            document.getElementById('viewTitleDe').textContent = blogData.title_de || '-';
            document.getElementById('viewDescDe').innerHTML = decodeHtml(blogData.desc_de || '-');
            document.getElementById('viewMetaTitleDe').textContent = blogData.meta_title_de || '-';
            document.getElementById('viewMetaDescDe').textContent = blogData.meta_desc_de || '-';
            document.getElementById('viewMetaKeywordDe').textContent = blogData.meta_keyword_de || '-';

            // Show modal
            viewModal.style.display = 'flex';
        }

        // Close view modal
        document.getElementById('closeViewModal').addEventListener('click', () => {
            document.getElementById('viewModal').style.display = 'none';
        });

        // Close view modal when clicking outside
        document.getElementById('viewModal').addEventListener('click', (e) => {
            if (e.target === document.getElementById('viewModal')) {
                document.getElementById('viewModal').style.display = 'none';
            }
        });

        function closeModalFunc() {
            modalOverlayBlog.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        closeModalBlog.addEventListener('click', closeModalFunc);
        cancelButtonBlog.addEventListener('click', closeModalFunc);

        modalOverlayBlog.addEventListener('click', (e) => {
            if (e.target === modalOverlayBlog) {
                closeModalFunc();
            }
        });

        // Prevent modal close when clicking inside the modal
        modalBlog.addEventListener('click', (e) => {
            e.stopPropagation();
        });

        // Delete confirmation
        document.querySelectorAll('.action-btn.delete').forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                const deleteForm = document.getElementById('deleteForm');
                const deleteModal = document.getElementById('deleteModal');
                const closeDeleteModal = document.getElementById('closeDeleteModal');
                const cancelDelete = document.getElementById('cancelDelete');

                // Set the form action to the delete URL
                deleteForm.action = button.closest('form').action;

                // Show the modal
                deleteModal.style.display = 'flex';

                // Close modal when clicking close button
                closeDeleteModal.onclick = () => {
                    deleteModal.style.display = 'none';
                };

                // Close modal when clicking cancel button
                cancelDelete.onclick = () => {
                    deleteModal.style.display = 'none';
                };

                // Close modal when clicking outside
                deleteModal.onclick = (e) => {
                    if (e.target === deleteModal) {
                        deleteModal.style.display = 'none';
                    }
                };
            });
        });

        // Tags Input Functionality
        document.addEventListener('DOMContentLoaded', function() {
            const tagsContainer = document.querySelector('.tags-list');
            const tagInput = document.querySelector('.tag-input-field');
            const hiddenTagsInput = document.querySelector('#tagsInput');
            window.tags = []; // Change to window.tags to make it globally accessible

            function updateTags() {
                tagsContainer.innerHTML = '';
                window.tags.forEach(tag => {
                    const tagElement = document.createElement('span');
                    tagElement.className = 'tag-badge';
                    tagElement.innerHTML = `
                        ${tag}
                        <span class="remove-tag">
                            <i class="fa-light fa-xmark"></i>
                        </span>
                    `;

                    tagElement.querySelector('.remove-tag').addEventListener('click', () => {
                        window.tags = window.tags.filter(t => t !== tag);
                        updateTags();
                        updateHiddenInput();
                    });

                    tagsContainer.appendChild(tagElement);
                });
            }

            function updateHiddenInput() {
                hiddenTagsInput.value = JSON.stringify(window.tags);
            }

            tagInput.addEventListener('keydown', (e) => {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    const tag = tagInput.value.trim();

                    if (tag && !window.tags.includes(tag)) {
                        window.tags.push(tag);
                        updateTags();
                        updateHiddenInput();
                        tagInput.value = '';
                    }
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleSwitches = document.querySelectorAll('.status-toggle');

            toggleSwitches.forEach(toggleSwitch => {
                toggleSwitch.addEventListener('change', function() {
                    const blogId = this.getAttribute('data-blog-id');

                    fetch(`/admin/blogs/${blogId}/toggle-status`, {
                            method: 'PATCH',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').content,
                                'Accept': 'application/json',
                                'Content-Type': 'application/json'
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Update the switch state based on the response
                                this.checked = data.status;
                            } else {
                                // If not successful, revert the toggle
                                this.checked = !this.checked;
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            // Revert the toggle if there was an error
                            this.checked = !this.checked;
                            alert('Error updating status. Please try again.');
                        });
                });
            });
        });

        // OPEN Status Modal
        document.querySelectorAll(".action-btn.status").forEach(button => {
            button.addEventListener("click", function() {
                const id = this.getAttribute("data-id");
                const currentStatus = this.getAttribute("data-status");
                const newStatus = currentStatus === "1" ? "0" : "1";

                const statusForm = document.getElementById("statusForm");
                const statusModal = document.getElementById("statusModal");
                const addModal = document.querySelector('.modal-overlay');
                const deleteModal = document.getElementById('deleteModal');

                statusForm.setAttribute("action", `/admin/blogs/status/${id}/${newStatus}`);

                // Update modal content
                const submitBtn = document.getElementById("statusSubmitBtn");
                const confirmText = document.getElementById("statusConfirmText");

                if (currentStatus === "1") {
                    submitBtn.textContent = "Deactivate";
                    confirmText.textContent =
                        "Are you sure you want to deactivate this category?";
                } else {
                    submitBtn.textContent = "Activate";
                    confirmText.textContent =
                        "Are you sure you want to activate this category?";
                }

                // Show status modal
                statusModal.style.display = "flex";

                // Hide other modals
                if (addModal) addModal.style.display = "none";
                if (deleteModal) deleteModal.style.display = "none";
            });
        });
        document.getElementById("closestatusmodal").onclick =
            document.getElementById("cancelstatus").onclick = () => {
                const statusModal = document.getElementById("statusModal");
                if (statusModal) statusModal.style.display = "none";
            };

        // Language tab switching function for Edit Modal
        function switchBlogTab(event, tabId) {
            event.preventDefault();

            // Get the modal context
            const modal = event.target.closest('.modal');

            if (!modal) {
                console.error('Modal not found for tab switching');
                return;
            }

            // Hide all tab contents in this modal
            const tabContents = modal.querySelectorAll('.tab-content');
            tabContents.forEach(content => {
                content.classList.remove('active');
            });

            // Remove active class from all buttons in this modal
            const tabButtons = modal.querySelectorAll('.tab-button');
            tabButtons.forEach(button => {
                button.classList.remove('active');
            });

            // Show selected tab content
            const targetTab = document.getElementById(tabId);
            if (targetTab) {
                targetTab.classList.add('active');
            }

            // Add active class to clicked button
            event.target.classList.add('active');
        }

        // Language tab switching function for View Modal
        function switchViewBlogTab(event, tabId) {
            event.preventDefault();

            // Get the modal context
            const modal = event.target.closest('.modal');

            if (!modal) {
                console.error('Modal not found for view tab switching');
                return;
            }

            // Hide all tab contents in this modal
            const tabContents = modal.querySelectorAll('.tab-content');
            tabContents.forEach(content => {
                content.classList.remove('active');
            });

            // Remove active class from all buttons in this modal
            const tabButtons = modal.querySelectorAll('.tab-button');
            tabButtons.forEach(button => {
                button.classList.remove('active');
            });

            // Show selected tab content
            const targetTab = document.getElementById(tabId);
            if (targetTab) {
                targetTab.classList.add('active');
            }

            // Add active class to clicked button
            event.target.classList.add('active');
        }
    </script>
    @endsection