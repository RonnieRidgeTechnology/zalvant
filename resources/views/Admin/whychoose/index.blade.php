@extends('layouts.admin')
@section('style')
    <style>
        .image-preview-container {
            position: relative;
            display: inline-block;
            max-width: 150px;
            margin-top: 10px;
        }

        .from-group22m textarea:focus {
            outline: none;
            background: white;
            box-shadow: none;

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
@endsection



@section('content')
    <main class="main-content">
        @include('layouts.header')
        <div class="content">
            <div class="table-section">
                <div class="table-header">
                    <h2>Why Choose Us</h2>
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
                                <th>Name</th>
                                <th>Desc</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cabinetDoors as $door)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $door->name }}</td>
                                    <td>{{ Str::limit($door->desc, 50) }}</td>
                                    <td>
                                        <span
                                            style="padding: 2px 8px;border-radius: 20px;background-color: {{ $door->status ? '#28a745' : '#6c757d' }};color: white;">
                                            {{ $door->status ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="action-btn edit" data-id="{{ $door->id }}"
                                                data-name="{{ $door->name }}" 
                                                data-desc="{{ $door->desc }}"
                                                data-name_en="{{ $door->name_en }}"
                                                data-desc_en="{{ $door->desc_en }}"
                                                data-name_fr="{{ $door->name_fr }}"
                                                data-desc_fr="{{ $door->desc_fr }}"
                                                data-name_de="{{ $door->name_de }}"
                                                data-desc_de="{{ $door->desc_de }}">
                                                <span class="btn-content">
                                                    <i class="fa-light fa-pen"></i>
                                                    <p class="btn-text">Edit</p>
                                                </span>
                                            </button>

                                            <button class="action-btn status" data-id="{{ $door->id }}"
                                                data-status="{{ $door->status }}">
                                                <span class="btn-content">
                                                    <i class="fa-light fa-circle-check"></i>
                                                    <p class="btn-text">Status</p>
                                                </span>
                                            </button>

                                            <button class="action-btn delete"
                                                data-id="{{ route('Why-choose-us.destroy', $door->id) }}">
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
                        @include('partials.custom_pagination', ['paginator' => $cabinetDoors])
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

    <!-- Add/Edit Modal -->
    <div class="modal-overlay" id="addmodal" style="display:none;">
        <div class="modal">
            <div class="modal-header">
                <h3 id="modalTitle">Add Why Choose Us</h3>
                <button class="close-modal" id="closeaddmodal"><i class="fa-light fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <form class="add-form" method="POST" id="cabinetDoorForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" id="formMethod" value="POST">

                    <!-- Language Tabs -->
                    <div class="language-tabs">
                        <button type="button" class="tab-button active" onclick="switchWhyTab(event, 'why-dutch')">
                            🇳🇱 Dutch (Default)
                        </button>
                        <button type="button" class="tab-button" onclick="switchWhyTab(event, 'why-english')">
                            🇬🇧 English
                        </button>
                        <button type="button" class="tab-button" onclick="switchWhyTab(event, 'why-french')">
                            🇫🇷 French
                        </button>
                        <button type="button" class="tab-button" onclick="switchWhyTab(event, 'why-german')">
                            🇩🇪 German
                        </button>
                    </div>

                    <!-- Dutch Tab -->
                    <div id="why-dutch" class="tab-content active">
                        <div class="form-group">
                            <label>Name (Dutch) <span style="color: red;">*</span></label>
                            <input type="text" name="name" id="doorName" placeholder="Enter name in Dutch" required>
                        </div>
                        <div class="from-group from-group22m">
                            <label style="font-size: 0.813rem; margin-bottom: 0.375rem; color: #6c757d; padding-bottom: 6px; display: block;">
                                Description (Dutch) <span style="color: red;">*</span>
                            </label>
                            <textarea
                                style="background: #f8f9fa; border: 1px solid #e9ecef; padding: 0.625rem; font-size: 0.875rem; transition: all 0.2s; width: 100%;"
                                name="desc" rows="4" id="doorDesc" placeholder="Enter description in Dutch" required></textarea>
                        </div>
                    </div>

                    <!-- English Tab -->
                    <div id="why-english" class="tab-content">
                        <div class="form-group">
                            <label>Name (English)</label>
                            <input type="text" name="name_en" id="doorNameEn" placeholder="Enter name in English">
                        </div>
                        <div class="from-group from-group22m">
                            <label style="font-size: 0.813rem; margin-bottom: 0.375rem; color: #6c757d; padding-bottom: 6px; display: block;">
                                Description (English)
                            </label>
                            <textarea
                                style="background: #f8f9fa; border: 1px solid #e9ecef; padding: 0.625rem; font-size: 0.875rem; transition: all 0.2s; width: 100%;"
                                name="desc_en" rows="4" id="doorDescEn" placeholder="Enter description in English"></textarea>
                        </div>
                    </div>

                    <!-- French Tab -->
                    <div id="why-french" class="tab-content">
                        <div class="form-group">
                            <label>Name (French)</label>
                            <input type="text" name="name_fr" id="doorNameFr" placeholder="Enter name in French">
                        </div>
                        <div class="from-group from-group22m">
                            <label style="font-size: 0.813rem; margin-bottom: 0.375rem; color: #6c757d; padding-bottom: 6px; display: block;">
                                Description (French)
                            </label>
                            <textarea
                                style="background: #f8f9fa; border: 1px solid #e9ecef; padding: 0.625rem; font-size: 0.875rem; transition: all 0.2s; width: 100%;"
                                name="desc_fr" rows="4" id="doorDescFr" placeholder="Enter description in French"></textarea>
                        </div>
                    </div>

                    <!-- German Tab -->
                    <div id="why-german" class="tab-content">
                        <div class="form-group">
                            <label>Name (German)</label>
                            <input type="text" name="name_de" id="doorNameDe" placeholder="Enter name in German">
                        </div>
                        <div class="from-group from-group22m">
                            <label style="font-size: 0.813rem; margin-bottom: 0.375rem; color: #6c757d; padding-bottom: 6px; display: block;">
                                Description (German)
                            </label>
                            <textarea
                                style="background: #f8f9fa; border: 1px solid #e9ecef; padding: 0.625rem; font-size: 0.875rem; transition: all 0.2s; width: 100%;"
                                name="desc_de" rows="4" id="doorDescDe" placeholder="Enter description in German"></textarea>
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

        const nameInput = document.getElementById("doorName");
        const descInput = document.getElementById("doorDesc");
        const methodInput = document.getElementById("formMethod");
        const modalTitle = document.getElementById("modalTitle");
        const submitBtn = document.getElementById("submitBtn");
        const previewImage = document.getElementById("previewImage");
        const imagePreviewContainer = document.getElementById("imagePreviewContainer");
        const form = document.getElementById("cabinetDoorForm");

        // Open Add Modal
        document.getElementById("openAddModal").addEventListener("click", function() {
            addModal.style.display = "flex";
            deleteModal.style.display = "none";
            statusModal.style.display = "none";
            form.reset();
            descInput.value = "";
            methodInput.value = "POST";
            var storeUrl = '{{ route("Why-choose-us.store") }}';
            form.setAttribute("action", storeUrl);
            modalTitle.textContent = "Add Why Choose Us Section";
            submitBtn.textContent = "Save";
            
            // Reset to Dutch tab
            document.getElementById('why-dutch').classList.add('active');
            document.getElementById('why-english').classList.remove('active');
            document.getElementById('why-french').classList.remove('active');
            document.getElementById('why-german').classList.remove('active');
            
            var tabButtons = document.querySelectorAll('.language-tabs .tab-button');
            tabButtons.forEach(function(btn, idx) {
                if (idx === 0) btn.classList.add('active');
                else btn.classList.remove('active');
            });
        });

        // Open Edit Modal
        document.querySelectorAll(".action-btn.edit").forEach(function(button) {
            button.addEventListener("click", function() {
                const id = this.dataset.id;

                addModal.style.display = "flex";
                deleteModal.style.display = "none";
                statusModal.style.display = "none";

                // Populate Dutch fields
                document.getElementById("doorName").value = this.dataset.name || '';
                document.getElementById("doorDesc").value = this.dataset.desc || '';
                
                // Populate English fields
                document.getElementById("doorNameEn").value = this.dataset.name_en || '';
                document.getElementById("doorDescEn").value = this.dataset.desc_en || '';
                
                // Populate French fields
                document.getElementById("doorNameFr").value = this.dataset.name_fr || '';
                document.getElementById("doorDescFr").value = this.dataset.desc_fr || '';
                
                // Populate German fields
                document.getElementById("doorNameDe").value = this.dataset.name_de || '';
                document.getElementById("doorDescDe").value = this.dataset.desc_de || '';

                methodInput.value = "PUT";
                form.setAttribute("action", `/admin/Why-choose-us/${id}`);
                modalTitle.textContent = "Edit Why Choose Us Section";
                submitBtn.textContent = "Update";
                
                // Reset to Dutch tab
                document.getElementById('why-dutch').classList.add('active');
                document.getElementById('why-english').classList.remove('active');
                document.getElementById('why-french').classList.remove('active');
                document.getElementById('why-german').classList.remove('active');
                
                var tabButtons = document.querySelectorAll('.language-tabs .tab-button');
                tabButtons.forEach(function(btn, idx) {
                    if (idx === 0) btn.classList.add('active');
                    else btn.classList.remove('active');
                });
            });
        });

        // Delete
        document.querySelectorAll(".action-btn.delete").forEach(button => {
            button.addEventListener("click", function() {
                deleteForm.setAttribute("action", this.getAttribute("data-id"));
                deleteModal.style.display = "flex";
                addModal.style.display = "none";
                statusModal.style.display = "none";
            });
        });

        // Status
        document.querySelectorAll(".action-btn.status").forEach(button => {
            button.addEventListener("click", function() {
                const id = this.dataset.id;
                const currentStatus = this.dataset.status;
                const newStatus = currentStatus === "1" ? "0" : "1";

                statusForm.setAttribute("action", `/admin/Why-choose-us/status/${id}/${newStatus}`);

                const confirmText = document.getElementById("statusConfirmText");
                const submitBtn = document.getElementById("statusSubmitBtn");

                if (currentStatus === "1") {
                    submitBtn.textContent = "Deactivate";
                    confirmText.textContent = "Are you sure you want to deactivate this category?";
                } else {
                    submitBtn.textContent = "Activate";
                    confirmText.textContent = "Are you sure you want to activate this category?";
                }

                statusModal.style.display = "flex";
                addModal.style.display = "none";
                deleteModal.style.display = "none";
            });
        });

        // Close Modals
        document.getElementById("closeDeleteModal").onclick =
            document.getElementById("cancelDelete").onclick = () => deleteModal.style.display = "none";

        document.getElementById("closeaddmodal").onclick =
            document.getElementById("canceladd").onclick = () => addModal.style.display = "none";

        document.getElementById("closestatusmodal").onclick =
            document.getElementById("cancelstatus").onclick = () => statusModal.style.display = "none";
    });

    // Tab switching function
    function switchWhyTab(event, tabId) {
        event.preventDefault();
        
        // Hide all tabs
        document.querySelectorAll('.tab-content').forEach(function(content) {
            content.classList.remove('active');
        });
        
        // Remove active from all buttons
        document.querySelectorAll('.tab-button').forEach(function(button) {
            button.classList.remove('active');
        });
        
        // Show selected tab
        document.getElementById(tabId).classList.add('active');
        
        // Add active to clicked button
        event.target.classList.add('active');
    }
</script>
@endsection
