@extends('layouts.admin')

<style>
    .pagination {
        display: flex;
        justify-content: center;
        padding: 15px 0;
        list-style: none;
        gap: 5px;
    }

    .pagination li {
        display: inline-block;
    }

    .pagination li a,
    .pagination li span {
        padding: 8px 12px;
        border: 1px solid #dee2e6;
        border-radius: 4px;
        text-decoration: none;
        color: #333;
        background-color: #fff;
        transition: all 0.3s ease-in-out;
    }

    .pagination li a:hover {
        background-color: #f0f0f0;
    }

    .pagination li.active span {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
    }

    .pagination li.disabled span {
        color: #ccc;
        cursor: not-allowed;
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
</style>

@section('content')
    <main class="main-content">
        @include('layouts.header')
        <div class="content">
            <div class="table-section">
                <div class="table-header">
                    <h2>Blog Categories</h2>
                    <div class="table-actions">
                        <button class="action-button add-new" id="openAddModal">
                            <i class="fa-light fa-plus"></i>
                            <span>Add New</span>
                        </button>
                    </div>
                </div>

                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->title }}</td>
                                    <td>
                                        <span
                                            style="padding: 2px 8px;border-radius: 20px;background-color: {{ $category->status ? '#28a745' : '#6c757d' }};color: white;">
                                            {{ $category->status ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="action-btn edit" data-id="{{ $category->id }}"
                                                data-title="{{ $category->title }}"
                                                data-title_en="{{ $category->title_en }}"
                                                data-title_fr="{{ $category->title_fr }}"
                                                data-title_de="{{ $category->title_de }}">
                                                <span class="btn-content">
                                                    <i class="fa-light fa-pen"></i>
                                                    <p class="btn-text">Edit</p>
                                                </span>
                                            </button>

                                            <button class="action-btn status" data-id="{{ $category->id }}"
                                                data-status="{{ $category->status }}">
                                                <span class="btn-content">
                                                    <i class="fa-light fa-circle-check"></i>
                                                    <p class="btn-text">Status</p>
                                                </span>
                                            </button>

                                            <button class="action-btn delete"
                                                data-id="{{ route('blog-categories.destroy', $category->id) }}">
                                                <span class="btn-content">
                                                    <i class="fa-light fa-trash"></i>
                                                    <p class="btn-text">Delete</p>
                                                </span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        @include('partials.custom_pagination', ['paginator' => $categories])
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Delete Modal -->
    <div class="modal-overlay" id="deleteModal" style="display:none;">
        <div class="modal">
            <div class="modal-header">
                <h3>Confirm Deletion</h3>
                <button class="close-modal" id="closeDeleteModal"><i class="fa-light fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this category?</p>
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

    <!-- Add/Edit Modal -->
    <div class="modal-overlay" id="addmodal" style="display:none;">
        <div class="modal">
            <div class="modal-header">
                <h3 id="modalTitle">Add Blog Category</h3>
                <button class="close-modal" id="closeaddmodal"><i class="fa-light fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <form class="add-form" method="POST" id="categoryForm">
                    @csrf
                    <input type="hidden" name="_method" id="formMethod" value="POST">

                    <!-- Language Tabs -->
                    <div class="language-tabs">
                        <button type="button" class="tab-button active" onclick="switchCategoryTab(event, 'cat-dutch')">
                            🇳🇱 Dutch (Default)
                        </button>
                        <button type="button" class="tab-button" onclick="switchCategoryTab(event, 'cat-english')">
                            🇬🇧 English
                        </button>
                        <button type="button" class="tab-button" onclick="switchCategoryTab(event, 'cat-french')">
                            🇫🇷 French
                        </button>
                        <button type="button" class="tab-button" onclick="switchCategoryTab(event, 'cat-german')">
                            🇩🇪 German
                        </button>
                    </div>

                    <!-- Dutch Tab -->
                    <div id="cat-dutch" class="tab-content active">
                        <div class="form-group">
                            <label>Title (Dutch) <span style="color: red;">*</span></label>
                            <input type="text" name="title" id="categoryTitle" placeholder="Enter category title in Dutch" required>
                        </div>
                    </div>

                    <!-- English Tab -->
                    <div id="cat-english" class="tab-content">
                        <div class="form-group">
                            <label>Title (English)</label>
                            <input type="text" name="title_en" id="categoryTitleEn" placeholder="Enter category title in English">
                        </div>
                    </div>

                    <!-- French Tab -->
                    <div id="cat-french" class="tab-content">
                        <div class="form-group">
                            <label>Title (French)</label>
                            <input type="text" name="title_fr" id="categoryTitleFr" placeholder="Enter category title in French">
                        </div>
                    </div>

                    <!-- German Tab -->
                    <div id="cat-german" class="tab-content">
                        <div class="form-group">
                            <label>Title (German)</label>
                            <input type="text" name="title_de" id="categoryTitleDe" placeholder="Enter category title in German">
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn-cancel" id="canceladd">Cancel</button>
                        <button type="submit" class="action-button" id="submitBtn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Status Modal -->
    <div class="modal-overlay" id="statusModal" style="display:none;">
        <div class="modal">
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
@endsection

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const deleteModal = document.getElementById("deleteModal");
            const addModal = document.getElementById("addmodal");
            const statusModal = document.getElementById("statusModal");

            const deleteForm = document.getElementById("deleteForm");
            const statusForm = document.getElementById("statusForm");

            const titleInput = document.getElementById("categoryTitle");
            const methodInput = document.getElementById("formMethod");
            const modalTitle = document.getElementById("modalTitle");
            const submitBtn = document.getElementById("submitBtn");
            const form = document.getElementById("categoryForm");

            // OPEN Add Modal
            document.getElementById("openAddModal").addEventListener("click", () => {
                addModal.style.display = "flex";
                deleteModal.style.display = "none";
                statusModal.style.display = "none";
                form.reset();
                methodInput.value = "POST";
                form.setAttribute("action", "{{ route('blog-categories.store') }}");
                modalTitle.textContent = "Add Blog Category";
                submitBtn.textContent = "Save";
            });

            // OPEN Edit Modal
            document.querySelectorAll(".action-btn.edit").forEach(button => {
                button.addEventListener("click", function() {
                    const id = this.getAttribute("data-id");
                    const title = this.getAttribute("data-title");
                    const titleEn = this.getAttribute("data-title_en");
                    const titleFr = this.getAttribute("data-title_fr");
                    const titleDe = this.getAttribute("data-title_de");

                    addModal.style.display = "flex";
                    deleteModal.style.display = "none";
                    statusModal.style.display = "none";

                    // Populate Dutch
                    titleInput.value = title || '';
                    
                    // Populate English
                    const titleEnInput = document.getElementById("categoryTitleEn");
                    if (titleEnInput) titleEnInput.value = titleEn || '';
                    
                    // Populate French
                    const titleFrInput = document.getElementById("categoryTitleFr");
                    if (titleFrInput) titleFrInput.value = titleFr || '';
                    
                    // Populate German
                    const titleDeInput = document.getElementById("categoryTitleDe");
                    if (titleDeInput) titleDeInput.value = titleDe || '';

                    methodInput.value = "PUT";
                    form.setAttribute("action", `/admin/blog-categories/${id}`);
                    modalTitle.textContent = "Edit Blog Category";
                    submitBtn.textContent = "Update";
                });
            });

            // OPEN Delete Modal
            document.querySelectorAll(".action-btn.delete").forEach(button => {
                button.addEventListener("click", function() {
                    deleteForm.setAttribute("action", this.getAttribute("data-id"));
                    deleteModal.style.display = "flex";
                    addModal.style.display = "none";
                    statusModal.style.display = "none";
                });
            });

            // OPEN Status Modal
            document.querySelectorAll(".action-btn.status").forEach(button => {
                button.addEventListener("click", function() {
                    const id = this.getAttribute("data-id");
                    const currentStatus = this.getAttribute("data-status");
                    const newStatus = currentStatus === "1" ? "0" : "1";

                    // Set form action
                    statusForm.setAttribute("action",
                        `/admin/blog-categories/status/${id}/${newStatus}`);

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
                    addModal.style.display = "none";
                    deleteModal.style.display = "none";
                });
            });


            // CLOSE modals
            document.getElementById("closeDeleteModal").onclick =
                document.getElementById("cancelDelete").onclick = () => deleteModal.style.display = "none";

            document.getElementById("closeaddmodal").onclick =
                document.getElementById("canceladd").onclick = () => addModal.style.display = "none";

            document.getElementById("closestatusmodal").onclick =
                document.getElementById("cancelstatus").onclick = () => statusModal.style.display = "none";
        });

        // Language tab switching function
        function switchCategoryTab(event, tabId) {
            // Hide all tab contents
            const tabContents = document.querySelectorAll('.tab-content');
            tabContents.forEach(content => {
                content.classList.remove('active');
            });

            // Remove active class from all buttons
            const tabButtons = document.querySelectorAll('.tab-button');
            tabButtons.forEach(button => {
                button.classList.remove('active');
            });

            // Show selected tab content
            document.getElementById(tabId).classList.add('active');

            // Add active class to clicked button
            event.target.classList.add('active');
        }
    </script>
@endsection
