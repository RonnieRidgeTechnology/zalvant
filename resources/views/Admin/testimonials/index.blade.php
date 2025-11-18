@extends('layouts.admin')

<style>
    .image-preview-container {
        position: relative;
        display: inline-block;
        max-width: 150px;
        margin-top: 10px;
    }

    .image-preview-container img {
        width: 100%;
        height: auto;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .remove-image {
        position: absolute;
        top: -8px;
        right: -8px;
        background: red;
        color: white;
        font-size: 16px;
        width: 20px;
        height: 20px;
        text-align: center;
        line-height: 20px;
        border-radius: 50%;
        cursor: pointer;
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
                    <h2>Testimonials</h2>
                    <div class="table-actions">
                        <button class="action-button add-new">
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
                                <th>Person Name</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($testimonials as $testimonial)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $testimonial->name }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($testimonial->message, 50) }}</td>
                                    <td>
                                        <span style="padding: 2px 8px; border-radius: 20px; background-color: {{ $testimonial->status ? '#28a745' : '#6c757d' }}; color: white;">
                                            {{ $testimonial->status ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="action-btn view" 
                                                data-name="{{ $testimonial->name }}"
                                                data-message="{{ $testimonial->message }}"
                                                data-name_en="{{ $testimonial->name_en }}"
                                                data-message_en="{{ $testimonial->message_en }}"
                                                data-name_fr="{{ $testimonial->name_fr }}"
                                                data-message_fr="{{ $testimonial->message_fr }}"
                                                data-name_de="{{ $testimonial->name_de }}"
                                                data-message_de="{{ $testimonial->message_de }}">
                                                <span class="btn-content">
                                                    <i class="fa-light fa-eye"></i>
                                                    <p class="btn-text">View</p>
                                                </span>
                                            </button>

                                            <button class="action-btn edit" data-id="{{ $testimonial->id }}"
                                                data-name="{{ $testimonial->name }}"
                                                data-message="{{ $testimonial->message }}"
                                                data-name_en="{{ $testimonial->name_en }}"
                                                data-message_en="{{ $testimonial->message_en }}"
                                                data-name_fr="{{ $testimonial->name_fr }}"
                                                data-message_fr="{{ $testimonial->message_fr }}"
                                                data-name_de="{{ $testimonial->name_de }}"
                                                data-message_de="{{ $testimonial->message_de }}">
                                                <span class="btn-content">
                                                    <i class="fa-light fa-pen"></i>
                                                    <p class="btn-text">Edit</p>
                                                </span>
                                            </button>

                                            <button class="action-btn status" data-id="{{ $testimonial->id }}"
                                                data-status="{{ $testimonial->status }}">
                                                <span class="btn-content">
                                                    <i class="fa-light fa-circle-check"></i>
                                                    <p class="btn-text">Status</p>
                                                </span>
                                            </button>

                                            <button class="action-btn delete"
                                                data-id="{{ route('testimonials.destroy', $testimonial->id) }}">
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
                        @include('partials.custom_pagination', ['paginator' => $testimonials])
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- View Modal -->
    <div class="modal-overlay" id="viewModal" style="display: none;">
        <div class="modal">
            <div class="modal-header">
                <h3>Testimonial Details</h3>
                <button class="close-modal" id="closeViewModal"><i class="fa-light fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <!-- Language Tabs -->
                <div class="language-tabs">
                    <button type="button" class="tab-button active" onclick="switchViewTab(event, 'view-dutch')">
                        🇳🇱 Dutch
                    </button>
                    <button type="button" class="tab-button" onclick="switchViewTab(event, 'view-english')">
                        🇬🇧 English
                    </button>
                    <button type="button" class="tab-button" onclick="switchViewTab(event, 'view-french')">
                        🇫🇷 French
                    </button>
                    <button type="button" class="tab-button" onclick="switchViewTab(event, 'view-german')">
                        🇩🇪 German
                    </button>
                </div>

                <!-- Dutch Tab -->
                <div id="view-dutch" class="tab-content active">
                    <p><strong>Name (Dutch):</strong> <span id="viewName"></span></p>
                    <p><strong>Message (Dutch):</strong> <span id="viewMessage"></span></p>
                </div>

                <!-- English Tab -->
                <div id="view-english" class="tab-content">
                    <p><strong>Name (English):</strong> <span id="viewNameEn"></span></p>
                    <p><strong>Message (English):</strong> <span id="viewMessageEn"></span></p>
                </div>

                <!-- French Tab -->
                <div id="view-french" class="tab-content">
                    <p><strong>Name (French):</strong> <span id="viewNameFr"></span></p>
                    <p><strong>Message (French):</strong> <span id="viewMessageFr"></span></p>
                </div>

                <!-- German Tab -->
                <div id="view-german" class="tab-content">
                    <p><strong>Name (German):</strong> <span id="viewNameDe"></span></p>
                    <p><strong>Message (German):</strong> <span id="viewMessageDe"></span></p>
                </div>
            </div>
            <div class="form-actions">
                <button type="button" class="btn-cancel" id="closeViewModalButton">Close</button>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal-overlay" id="deleteModal" style="display: none;">
        <div class="modal">
            <div class="modal-header">
                <h3>Confirm Deletion</h3>
                <button class="close-modal" id="closeDeleteModal"><i class="fa-light fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this testimonial?</p>
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
    <div class="modal-overlay" id="addmodal" style="display: none;">
        <div class="modal">
            <div class="modal-header">
                <h3>Add/Edit Testimonial</h3>
                <button class="close-modal" id="closeaddmodal"><i class="fa-light fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <form class="add-form" method="POST" id="testimonialForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="POST" id="formMethod">

                    <!-- Language Tabs -->
                    <div class="language-tabs">
                        <button type="button" class="tab-button active" onclick="switchTestimonialTab(event, 'testimonial-dutch')">
                            🇳🇱 Dutch (Default)
                        </button>
                        <button type="button" class="tab-button" onclick="switchTestimonialTab(event, 'testimonial-english')">
                            🇬🇧 English
                        </button>
                        <button type="button" class="tab-button" onclick="switchTestimonialTab(event, 'testimonial-french')">
                            🇫🇷 French
                        </button>
                        <button type="button" class="tab-button" onclick="switchTestimonialTab(event, 'testimonial-german')">
                            🇩🇪 German
                        </button>
                    </div>

                    <!-- Dutch Tab -->
                    <div id="testimonial-dutch" class="tab-content active">
                        <div class="form-group">
                            <label>Name (Dutch) <span style="color: red;">*</span></label>
                            <input type="text" name="name" id="testimonialName" placeholder="Enter name in Dutch" required>
                        </div>
                        <div class="form-group">
                            <label>Message (Dutch) <span style="color: red;">*</span></label>
                            <textarea name="message" id="testimonialMessage" rows="4" placeholder="Enter message in Dutch" required></textarea>
                        </div>
                    </div>

                    <!-- English Tab -->
                    <div id="testimonial-english" class="tab-content">
                        <div class="form-group">
                            <label>Name (English)</label>
                            <input type="text" name="name_en" id="testimonialNameEn" placeholder="Enter name in English">
                        </div>
                        <div class="form-group">
                            <label>Message (English)</label>
                            <textarea name="message_en" id="testimonialMessageEn" rows="4" placeholder="Enter message in English"></textarea>
                        </div>
                    </div>

                    <!-- French Tab -->
                    <div id="testimonial-french" class="tab-content">
                        <div class="form-group">
                            <label>Name (French)</label>
                            <input type="text" name="name_fr" id="testimonialNameFr" placeholder="Enter name in French">
                        </div>
                        <div class="form-group">
                            <label>Message (French)</label>
                            <textarea name="message_fr" id="testimonialMessageFr" rows="4" placeholder="Enter message in French"></textarea>
                        </div>
                    </div>

                    <!-- German Tab -->
                    <div id="testimonial-german" class="tab-content">
                        <div class="form-group">
                            <label>Name (German)</label>
                            <input type="text" name="name_de" id="testimonialNameDe" placeholder="Enter name in German">
                        </div>
                        <div class="form-group">
                            <label>Message (German)</label>
                            <textarea name="message_de" id="testimonialMessageDe" rows="4" placeholder="Enter message in German"></textarea>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn-cancel" id="canceladd">Cancel</button>
                        <button type="submit" class="action-button">Save</button>
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
                <p>Are you sure you want to change the status?</p>
                <div class="form-actions">
                    <button type="button" class="btn-cancel" id="cancelstatus">Cancel</button>
                    <form method="POST" id="statusForm">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn-submit btn-warning">Change</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const viewModal = document.getElementById("viewModal");
            const deleteModal = document.getElementById("deleteModal");
            const addModal = document.getElementById("addmodal");
            const testimonialForm = document.getElementById("testimonialForm");
            const formMethod = document.getElementById("formMethod");
            const deleteForm = document.getElementById("deleteForm");
            const statusModal = document.getElementById("statusModal");
            const statusForm = document.getElementById("statusForm");

            // Add new
            document.querySelector(".add-new").addEventListener("click", function () {
                testimonialForm.reset();
                formMethod.value = "POST";
                var storeUrl = '{{ route("testimonials.store") }}';
                testimonialForm.action = storeUrl;
                addModal.style.display = "flex";
                
                // Reset to Dutch tab
                document.getElementById('testimonial-dutch').classList.add('active');
                document.getElementById('testimonial-english').classList.remove('active');
                document.getElementById('testimonial-french').classList.remove('active');
                document.getElementById('testimonial-german').classList.remove('active');
                
                var tabButtons = document.querySelectorAll('#addmodal .tab-button');
                tabButtons.forEach(function(btn, idx) {
                    if (idx === 0) btn.classList.add('active');
                    else btn.classList.remove('active');
                });
            });

            // Edit
            document.querySelectorAll(".action-btn.edit").forEach(function(button) {
                button.addEventListener("click", function () {
                    testimonialForm.reset();
                    
                    // Populate Dutch fields
                    document.getElementById("testimonialName").value = this.dataset.name || '';
                    document.getElementById("testimonialMessage").value = this.dataset.message || '';
                    
                    // Populate English fields
                    document.getElementById("testimonialNameEn").value = this.dataset.name_en || '';
                    document.getElementById("testimonialMessageEn").value = this.dataset.message_en || '';
                    
                    // Populate French fields
                    document.getElementById("testimonialNameFr").value = this.dataset.name_fr || '';
                    document.getElementById("testimonialMessageFr").value = this.dataset.message_fr || '';
                    
                    // Populate German fields
                    document.getElementById("testimonialNameDe").value = this.dataset.name_de || '';
                    document.getElementById("testimonialMessageDe").value = this.dataset.message_de || '';
                    
                    formMethod.value = "PUT";
                    testimonialForm.action = "/admin/testimonials/update/" + this.dataset.id;
                    addModal.style.display = "flex";
                    
                    // Reset to Dutch tab
                    document.getElementById('testimonial-dutch').classList.add('active');
                    document.getElementById('testimonial-english').classList.remove('active');
                    document.getElementById('testimonial-french').classList.remove('active');
                    document.getElementById('testimonial-german').classList.remove('active');
                    
                    var tabButtons = document.querySelectorAll('#addmodal .tab-button');
                    tabButtons.forEach(function(btn, idx) {
                        if (idx === 0) btn.classList.add('active');
                        else btn.classList.remove('active');
                    });
                });
            });

            // View
            document.querySelectorAll(".action-btn.view").forEach(function(button) {
                button.addEventListener("click", function () {
                    // Populate Dutch
                    document.getElementById("viewName").textContent = this.dataset.name || '-';
                    document.getElementById("viewMessage").textContent = this.dataset.message || '-';
                    
                    // Populate English
                    document.getElementById("viewNameEn").textContent = this.dataset.name_en || '-';
                    document.getElementById("viewMessageEn").textContent = this.dataset.message_en || '-';
                    
                    // Populate French
                    document.getElementById("viewNameFr").textContent = this.dataset.name_fr || '-';
                    document.getElementById("viewMessageFr").textContent = this.dataset.message_fr || '-';
                    
                    // Populate German
                    document.getElementById("viewNameDe").textContent = this.dataset.name_de || '-';
                    document.getElementById("viewMessageDe").textContent = this.dataset.message_de || '-';
                    
                    viewModal.style.display = "flex";
                    
                    // Reset to Dutch tab
                    document.getElementById('view-dutch').classList.add('active');
                    document.getElementById('view-english').classList.remove('active');
                    document.getElementById('view-french').classList.remove('active');
                    document.getElementById('view-german').classList.remove('active');
                    
                    var tabButtons = document.querySelectorAll('#viewModal .tab-button');
                    tabButtons.forEach(function(btn, idx) {
                        if (idx === 0) btn.classList.add('active');
                        else btn.classList.remove('active');
                    });
                });
            });

            // Delete
            document.querySelectorAll(".action-btn.delete").forEach(button => {
                button.addEventListener("click", function () {
                    deleteForm.setAttribute("action", this.dataset.id);
                    deleteModal.style.display = "flex";
                });
            });

            // Status Change
            document.querySelectorAll(".action-btn.status").forEach(button => {
                button.addEventListener("click", function () {
                    const id = this.getAttribute("data-id");
                    const currentStatus = this.getAttribute("data-status");
                    const newStatus = currentStatus === "1" ? "0" : "1";

                    statusForm.setAttribute("action", `/admin/testimonials/status/${id}/${newStatus}`);
                    statusModal.style.display = "flex";
                });
            });

            // Close modals
            document.getElementById("closeViewModal").onclick =
                document.getElementById("closeViewModalButton").onclick = function () {
                    viewModal.style.display = "none";
                };

            document.getElementById("closeDeleteModal").onclick =
                document.getElementById("cancelDelete").onclick = function () {
                    deleteModal.style.display = "none";
                };

            document.getElementById("closeaddmodal").onclick =
                document.getElementById("canceladd").onclick = function () {
                    addModal.style.display = "none";
                };

            document.getElementById("closestatusmodal").onclick =
                document.getElementById("cancelstatus").onclick = function () {
                    statusModal.style.display = "none";
                };
        });

        // Tab switching functions
        function switchTestimonialTab(event, tabId) {
            event.preventDefault();
            
            // Hide all tabs
            document.querySelectorAll('#addmodal .tab-content').forEach(function(content) {
                content.classList.remove('active');
            });
            
            // Remove active from all buttons
            document.querySelectorAll('#addmodal .tab-button').forEach(function(button) {
                button.classList.remove('active');
            });
            
            // Show selected tab
            document.getElementById(tabId).classList.add('active');
            
            // Add active to clicked button
            event.target.classList.add('active');
        }

        function switchViewTab(event, tabId) {
            event.preventDefault();
            
            // Hide all tabs
            document.querySelectorAll('#viewModal .tab-content').forEach(function(content) {
                content.classList.remove('active');
            });
            
            // Remove active from all buttons
            document.querySelectorAll('#viewModal .tab-button').forEach(function(button) {
                button.classList.remove('active');
            });
            
            // Show selected tab
            document.getElementById(tabId).classList.add('active');
            
            // Add active to clicked button
            event.target.classList.add('active');
        }
    </script>
@endsection
