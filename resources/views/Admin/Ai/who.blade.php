@extends('layouts.admin')
@section('style')
    <style>
        .image-preview-container {
            position: relative;
            display: inline-block;
            max-width: 150px;
            margin-top: 10px;
        }

        /* Language Tab Styles - Same as Service Update */
        .language-tabs {
            display: flex;
            gap: 5px;
            margin-bottom: 20px;
            border-bottom: 2px solid #e5e7eb;
            flex-wrap: wrap;
        }

        .lang-tab {
            padding: 12px 24px;
            border: none;
            background: none;
            cursor: pointer;
            font-weight: 600;
            color: #6b7280;
            border-bottom: 3px solid transparent;
            transition: all 0.3s;
        }

        .lang-tab:hover {
            background: rgba(59, 130, 246, 0.05);
        }

        .lang-tab.active {
            color: #2563eb;
            border-bottom: 3px solid #2563eb;
            background: rgba(37, 99, 235, 0.05);
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .multilingual-section {
            background: #f9fafb;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 600;
            color: #374151;
            margin-bottom: 5px;
            display: block;
        }

        /* Form Control Styles - Same as Service Update */
        .form-control {
            border-radius: 8px;
            border: 1px solid #d1d5db;
            padding: 0.6rem 0.8rem;
            transition: all 0.3s ease;
            font-size: 0.95rem;
            width: 100%;
            background: #fff;
        }

        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
            outline: none;
        }

        textarea.form-control {
            min-height: 100px;
            resize: vertical;
        }

        /* Modal specific overrides */
        #addmodal .modal {
            max-width: 900px;
        }

        #addmodal .multilingual-section h4 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 15px;
        }

        #addmodal .multilingual-section > p {
            color: #6b7280;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }
    </style>
@endsection



@section('content')
    <main class="main-content">
        @include('layouts.header')
        <div class="content">
            <div class="table-section">
                <div class="table-header">
                    <h2>Ai Deal</h2>
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
                                <th>Image</th>
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
                                    <td>
                                        @if ($door->image)
                                            <img src="{{ asset($door->image) }}" style="max-width: 50px;">
                                        @else
                                            No Image
                                        @endif
                                    </td>
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
                                                data-name="{{ $door->name }}" data-desc="{{ $door->desc }}"
                                                data-name-en="{{ $door->name_en }}" data-desc-en="{{ $door->desc_en }}"
                                                data-name-fr="{{ $door->name_fr }}" data-desc-fr="{{ $door->desc_fr }}"
                                                data-name-de="{{ $door->name_de }}" data-desc-de="{{ $door->desc_de }}"
                                                data-image="{{ asset($door->image) }}">
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
                                                data-id="{{ route('Ai-deail.destroy', $door->id) }}">
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
        <div class="modal" style="max-width: 900px;">
            <div class="modal-header">
                <h3 id="modalTitle">Add Ai Deal</h3>
                <button class="close-modal" id="closeaddmodal"><i class="fa-light fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <form class="add-form" method="POST" id="cabinetDoorForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" id="formMethod" value="POST">

                    <div class="form-group">
                        <label class="form-label">Image</label>
                        <input type="file" name="image" accept="image/*" id="imageInput">
                        <small>Allowed: jpeg, png, jpg, gif, svg (Max: 2MB)</small>
                        <div class="image-preview-container" id="imagePreviewContainer" style="display:none;">
                            <img id="previewImage" src="" alt="Preview" style="max-width: 100px;">
                        </div>
                    </div>

                    <!-- Multilingual Content Section -->
                    <div class="multilingual-section">
                        <h4>Multilingual Content</h4>
                        <p>Manage translations for all text content</p>
                        

                        <!-- Dutch Content -->
                        <div class="tab-content active" data-lang="nl">
                            <div class="form-group">
                                <label class="form-label">Name (Nederlands)</label>
                                <input type="text" name="name" id="doorName" placeholder="Enter name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Description (Nederlands)</label>
                                <textarea name="desc" rows="4" id="doorDesc" placeholder="Enter description" class="form-control" required></textarea>
                            </div>
                        </div>

                        <!-- English Content -->
                        <div class="tab-content" data-lang="en">
                            <div class="form-group">
                                <label class="form-label">Name (English)</label>
                                <input type="text" name="name_en" id="doorNameEn" placeholder="Enter name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Description (English)</label>
                                <textarea name="desc_en" rows="4" id="doorDescEn" placeholder="Enter description" class="form-control"></textarea>
                            </div>
                        </div>

                        <!-- French Content -->
                        <div class="tab-content" data-lang="fr">
                            <div class="form-group">
                                <label class="form-label">Name (Français)</label>
                                <input type="text" name="name_fr" id="doorNameFr" placeholder="Enter name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Description (Français)</label>
                                <textarea name="desc_fr" rows="4" id="doorDescFr" placeholder="Enter description" class="form-control"></textarea>
                            </div>
                        </div>

                        <!-- German Content -->
                        <div class="tab-content" data-lang="de">
                            <div class="form-group">
                                <label class="form-label">Name (Deutsch)</label>
                                <input type="text" name="name_de" id="doorNameDe" placeholder="Enter name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Description (Deutsch)</label>
                                <textarea name="desc_de" rows="4" id="doorDescDe" placeholder="Enter description" class="form-control"></textarea>
                            </div>
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
        const nameInputEn = document.getElementById("doorNameEn");
        const descInputEn = document.getElementById("doorDescEn");
        const nameInputFr = document.getElementById("doorNameFr");
        const descInputFr = document.getElementById("doorDescFr");
        const nameInputDe = document.getElementById("doorNameDe");
        const descInputDe = document.getElementById("doorDescDe");
        const methodInput = document.getElementById("formMethod");
        const modalTitle = document.getElementById("modalTitle");
        const submitBtn = document.getElementById("submitBtn");
        const previewImage = document.getElementById("previewImage");
        const imagePreviewContainer = document.getElementById("imagePreviewContainer");
        const form = document.getElementById("cabinetDoorForm");

        // Language tab switching
        const langTabs = document.querySelectorAll('.lang-tab');
        const tabContents = document.querySelectorAll('.tab-content');

        langTabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const targetLang = this.getAttribute('data-lang');

                // Remove active class from all tabs
                langTabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');

                // Hide all tab contents
                tabContents.forEach(content => content.classList.remove('active'));

                // Show target tab content
                const targetContent = document.querySelector(`.tab-content[data-lang="${targetLang}"]`);
                if (targetContent) {
                    targetContent.classList.add('active');
                }
            });
        });

        // Open Add Modal
        document.getElementById("openAddModal").addEventListener("click", () => {
            addModal.style.display = "flex";
            deleteModal.style.display = "none";
            statusModal.style.display = "none";
            form.reset();
            descInput.value = "";
            descInputEn.value = "";
            descInputFr.value = "";
            descInputDe.value = "";
            methodInput.value = "POST";
            form.setAttribute("action", "{{ route('Ai-deail.store') }}");
            modalTitle.textContent = "Add Ai Deal Section";
            submitBtn.textContent = "Save";
            imagePreviewContainer.style.display = "none";
            previewImage.src = "";
            
            // Reset to first tab
            langTabs.forEach(t => t.classList.remove('active'));
            langTabs[0].classList.add('active');
            tabContents.forEach(content => content.classList.remove('active'));
            tabContents[0].classList.add('active');
        });

        // Open Edit Modal
        document.querySelectorAll(".action-btn.edit").forEach(button => {
            button.addEventListener("click", function() {
                const id = this.dataset.id;
                const name = this.dataset.name;
                const desc = this.dataset.desc;
                const nameEn = this.dataset.nameEn;
                const descEn = this.dataset.descEn;
                const nameFr = this.dataset.nameFr;
                const descFr = this.dataset.descFr;
                const nameDe = this.dataset.nameDe;
                const descDe = this.dataset.descDe;
                const image = this.dataset.image;

                addModal.style.display = "flex";
                deleteModal.style.display = "none";
                statusModal.style.display = "none";

                nameInput.value = name;
                descInput.value = desc;
                nameInputEn.value = nameEn || '';
                descInputEn.value = descEn || '';
                nameInputFr.value = nameFr || '';
                descInputFr.value = descFr || '';
                nameInputDe.value = nameDe || '';
                descInputDe.value = descDe || '';
                methodInput.value = "PUT";
                form.setAttribute("action", `/admin/Ai-deail/${id}`);
                modalTitle.textContent = "Edit Ai Deal Section";
                submitBtn.textContent = "Update";

                if (image) {
                    previewImage.src = image;
                    imagePreviewContainer.style.display = "block";
                } else {
                    imagePreviewContainer.style.display = "none";
                }
                
                // Reset to first tab
                langTabs.forEach(t => t.classList.remove('active'));
                langTabs[0].classList.add('active');
                tabContents.forEach(content => content.classList.remove('active'));
                tabContents[0].classList.add('active');
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

                statusForm.setAttribute("action", `/admin/Ai-deail/status/${id}/${newStatus}`);

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
</script>
@endsection
