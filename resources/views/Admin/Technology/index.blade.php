@extends('layouts.admin')

<style>
    .image-preview-container {
        position: relative;
        display: inline-block;
        max-width: 150px;
        margin-top: 10px;
    }
</style>
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
</style>


@section('content')
<main class="main-content">
    @include('layouts.header')
    <div class="content">
        <div class="table-section">
            <div class="table-header">
                <h2>Technologies</h2>
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
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cabinetDoors as $door)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if($door->image)
                                        <img src="{{ asset($door->image) }}" style="max-width: 50px;">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td>{{ $door->name }}</td>
                                <td>
                                    <span style="padding: 2px 8px;border-radius: 20px;background-color: {{ $door->status ? '#28a745' : '#6c757d' }};color: white;">
                                        {{ $door->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="action-btn edit"
                                            data-id="{{ $door->id }}"
                                            data-name="{{ $door->name }}"
                                            data-image="{{ asset($door->image) }}">
                                            <span class="btn-content">
                                                <i class="fa-light fa-pen"></i>
                                                <p class="btn-text">Edit</p>
                                            </span>
                                        </button>

                                        <button class="action-btn status"
                                            data-id="{{ $door->id }}"
                                            data-status="{{ $door->status }}">
                                            <span class="btn-content">
                                                <i class="fa-light fa-circle-check"></i>
                                                <p class="btn-text">Status</p>
                                            </span>
                                        </button>

                                        <button class="action-btn delete" data-id="{{ route('technology.destroy', $door->id) }}">
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
            <h3 id="modalTitle">Add Technology Section</h3>
            <button class="close-modal" id="closeaddmodal"><i class="fa-light fa-xmark"></i></button>
        </div>
        <div class="modal-body">
            <form class="add-form" method="POST" id="cabinetDoorForm" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" id="formMethod" value="POST">

                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" accept="image/*" id="imageInput">
                    <small>Allowed: jpeg, png, jpg, gif, svg (Max: 2MB)</small>
                    <div class="image-preview-container" id="imagePreviewContainer" style="display:none;">
                        <img id="previewImage" src="" alt="Preview" style="max-width: 100px;">
                    </div>
                </div>

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="doorName" placeholder="Enter name" required>
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
        const deleteModal = document.getElementById("deleteModal");
        const addModal = document.getElementById("addmodal");
        const statusModal = document.getElementById("statusModal");

        const deleteForm = document.getElementById("deleteForm");
        const statusForm = document.getElementById("statusForm");

        const nameInput = document.getElementById("doorName");
        const methodInput = document.getElementById("formMethod");
        const modalTitle = document.getElementById("modalTitle");
        const submitBtn = document.getElementById("submitBtn");
        const previewImage = document.getElementById("previewImage");
        const imagePreviewContainer = document.getElementById("imagePreviewContainer");
        const form = document.getElementById("cabinetDoorForm");

        // OPEN Add Modal
        document.getElementById("openAddModal").addEventListener("click", () => {
            addModal.style.display = "flex";
            deleteModal.style.display = "none";
            statusModal.style.display = "none";
            form.reset();
            methodInput.value = "POST";
            form.setAttribute("action", "{{ route('technology.store') }}");
            modalTitle.textContent = "Add Technology Section";
            submitBtn.textContent = "Save";
            imagePreviewContainer.style.display = "none";
            previewImage.src = "";
        });

        // OPEN Edit Modal
        document.querySelectorAll(".action-btn.edit").forEach(button => {
            button.addEventListener("click", function () {
                const id = this.getAttribute("data-id");
                const name = this.getAttribute("data-name");
                const image = this.getAttribute("data-image");

                addModal.style.display = "flex";
                deleteModal.style.display = "none";
                statusModal.style.display = "none";

                nameInput.value = name;
                methodInput.value = "PUT";
                form.setAttribute("action", `/admin/technology/${id}`);
                modalTitle.textContent = "Edit Technology Section";
                submitBtn.textContent = "Update";

                if (image) {
                    previewImage.src = image;
                    imagePreviewContainer.style.display = "block";
                } else {
                    imagePreviewContainer.style.display = "none";
                }
            });
        });

        // OPEN Delete Modal
        document.querySelectorAll(".action-btn.delete").forEach(button => {
            button.addEventListener("click", function () {
                deleteForm.setAttribute("action", this.getAttribute("data-id"));
                deleteModal.style.display = "flex";
                addModal.style.display = "none";
                statusModal.style.display = "none";
            });
        });

        // OPEN Status Modal
        document.querySelectorAll(".action-btn.status").forEach(button => {
            button.addEventListener("click", function () {
                const id = this.getAttribute("data-id");
                const currentStatus = this.getAttribute("data-status");
                const newStatus = currentStatus === "1" ? "0" : "1";

                statusForm.setAttribute("action", `/admin/technology/status/${id}/${newStatus}`);
                statusModal.style.display = "flex";
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
</script>
@endsection
