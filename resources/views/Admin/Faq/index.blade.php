@extends('layouts.admin')

<style>
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
                <h2>FAQs</h2>
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
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($faqs as $faq)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $faq->question }}</td>
                                <td>{{ Str::limit($faq->answer, 50) }}</td>
                                <td>
                                    <span style="padding: 2px 8px;border-radius: 20px;background-color: {{ $faq->status ? '#28a745' : '#6c757d' }};color: white;">
                                        {{ $faq->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="action-btn edit"
                                            data-id="{{ $faq->id }}"
                                            data-question="{{ $faq->question }}"
                                            data-answer="{{ $faq->answer }}"
                                            data-question_en="{{ $faq->question_en }}"
                                            data-answer_en="{{ $faq->answer_en }}"
                                            data-question_fr="{{ $faq->question_fr }}"
                                            data-answer_fr="{{ $faq->answer_fr }}"
                                            data-question_de="{{ $faq->question_de }}"
                                            data-answer_de="{{ $faq->answer_de }}">
                                            <span class="btn-content">
                                                <i class="fa-light fa-pen"></i>
                                                <p class="btn-text">Edit</p>
                                            </span>
                                        </button>

                                        <button class="action-btn status"
                                            data-id="{{ $faq->id }}"
                                            data-status="{{ $faq->status == 1 ? 0 : 1 }}">
                                            <span class="btn-content">
                                                <i class="fa-light fa-circle-check"></i>
                                                <p class="btn-text">Status</p>
                                            </span>
                                        </button>
                                        <button class="action-btn delete" data-id="{{ route('faq.destroy', $faq->id) }}">
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
                    @include('partials.custom_pagination', ['paginator' => $faqs])

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
            <p>Are you sure you want to delete this FAQ?</p>
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
            <h3 id="modalTitle">Add FAQ</h3>
            <button class="close-modal" id="closeaddmodal"><i class="fa-light fa-xmark"></i></button>
        </div>
        <div class="modal-body">
            <form class="add-form" method="POST" id="faqForm">
                @csrf
                <input type="hidden" name="_method" id="formMethod" value="POST">

                <!-- Language Tabs -->
                <div class="language-tabs">
                    <button type="button" class="tab-button active" onclick="switchFaqTab(event, 'faq-dutch')">
                        🇳🇱 Dutch (Default)
                    </button>
                    <button type="button" class="tab-button" onclick="switchFaqTab(event, 'faq-english')">
                        🇬🇧 English
                    </button>
                    <button type="button" class="tab-button" onclick="switchFaqTab(event, 'faq-french')">
                        🇫🇷 French
                    </button>
                    <button type="button" class="tab-button" onclick="switchFaqTab(event, 'faq-german')">
                        🇩🇪 German
                    </button>
                </div>

                <!-- Dutch Tab -->
                <div id="faq-dutch" class="tab-content active">
                    <div class="form-group">
                        <label>Question (Dutch) <span style="color: red;">*</span></label>
                        <input type="text" name="question" id="faqQuestion" required>
                    </div>

                    <div class="form-group">
                        <label>Answer (Dutch) <span style="color: red;">*</span></label>
                        <textarea name="answer" id="faqAnswer" rows="4" required></textarea>
                    </div>
                </div>

                <!-- English Tab -->
                <div id="faq-english" class="tab-content">
                    <div class="form-group">
                        <label>Question (English)</label>
                        <input type="text" name="question_en" id="faqQuestionEn">
                    </div>

                    <div class="form-group">
                        <label>Answer (English)</label>
                        <textarea name="answer_en" id="faqAnswerEn" rows="4"></textarea>
                    </div>
                </div>

                <!-- French Tab -->
                <div id="faq-french" class="tab-content">
                    <div class="form-group">
                        <label>Question (French)</label>
                        <input type="text" name="question_fr" id="faqQuestionFr">
                    </div>

                    <div class="form-group">
                        <label>Answer (French)</label>
                        <textarea name="answer_fr" id="faqAnswerFr" rows="4"></textarea>
                    </div>
                </div>

                <!-- German Tab -->
                <div id="faq-german" class="tab-content">
                    <div class="form-group">
                        <label>Question (German)</label>
                        <input type="text" name="question_de" id="faqQuestionDe">
                    </div>

                    <div class="form-group">
                        <label>Answer (German)</label>
                        <textarea name="answer_de" id="faqAnswerDe" rows="4"></textarea>
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
        const form = document.getElementById("faqForm");
        const methodInput = document.getElementById("formMethod");
        const modalTitle = document.getElementById("modalTitle");
        const submitBtn = document.getElementById("submitBtn");

        // Add Modal
        document.getElementById("openAddModal").addEventListener("click", function() {
            addModal.style.display = "flex";
            form.reset();
            methodInput.value = "POST";
            var storeUrl = '{{ route("faq.store") }}';
            form.setAttribute("action", storeUrl);
            modalTitle.textContent = "Add FAQ";
            submitBtn.textContent = "Save";
            
            // Reset to Dutch tab
            document.getElementById('faq-dutch').classList.add('active');
            document.getElementById('faq-english').classList.remove('active');
            document.getElementById('faq-french').classList.remove('active');
            document.getElementById('faq-german').classList.remove('active');
            
            var tabButtons = document.querySelectorAll('.language-tabs .tab-button');
            tabButtons.forEach(function(btn, idx) {
                if (idx === 0) btn.classList.add('active');
                else btn.classList.remove('active');
            });
        });

        // Edit Modal
        document.querySelectorAll(".action-btn.edit").forEach(function(button) {
            button.addEventListener("click", function () {
                var id = this.dataset.id;

                addModal.style.display = "flex";
                
                // Populate Dutch fields
                document.getElementById("faqQuestion").value = this.dataset.question || '';
                document.getElementById("faqAnswer").value = this.dataset.answer || '';
                
                // Populate English fields
                document.getElementById("faqQuestionEn").value = this.dataset.question_en || '';
                document.getElementById("faqAnswerEn").value = this.dataset.answer_en || '';
                
                // Populate French fields
                document.getElementById("faqQuestionFr").value = this.dataset.question_fr || '';
                document.getElementById("faqAnswerFr").value = this.dataset.answer_fr || '';
                
                // Populate German fields
                document.getElementById("faqQuestionDe").value = this.dataset.question_de || '';
                document.getElementById("faqAnswerDe").value = this.dataset.answer_de || '';

                methodInput.value = "PUT";
                form.setAttribute("action", '/admin/faqs/' + id);
                modalTitle.textContent = "Edit FAQ";
                submitBtn.textContent = "Update";
                
                // Reset to Dutch tab
                document.getElementById('faq-dutch').classList.add('active');
                document.getElementById('faq-english').classList.remove('active');
                document.getElementById('faq-french').classList.remove('active');
                document.getElementById('faq-german').classList.remove('active');
                
                var tabButtons = document.querySelectorAll('.language-tabs .tab-button');
                tabButtons.forEach(function(btn, idx) {
                    if (idx === 0) btn.classList.add('active');
                    else btn.classList.remove('active');
                });
            });
        });

        // Delete Modal
        document.querySelectorAll(".action-btn.delete").forEach(button => {
            button.addEventListener("click", function () {
                deleteForm.setAttribute("action", this.dataset.id);
                deleteModal.style.display = "flex";
            });
        });

        // Status Modal
        document.querySelectorAll(".action-btn.status").forEach(button => {
            button.addEventListener("click", function () {
                const id = this.dataset.id;
                const status = this.dataset.status;
                statusForm.setAttribute("action", `/admin/faq/status/${id}/${status}`);
                statusModal.style.display = "flex";
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
    function switchFaqTab(event, tabId) {
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
