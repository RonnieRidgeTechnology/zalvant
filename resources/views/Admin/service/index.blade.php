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



    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #333;
    }

    .required {
        color: #dc3545;
        margin-left: 4px;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        transition: border-color 0.3s;
    }

    .form-control:focus {
        border-color: #007bff;
        outline: none;
        box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.25);
    }

    .form-text {
        display: block;
        margin-top: 5px;
        font-size: 12px;
    }

    .image-preview {
        margin-top: 10px;
    }

    .image-preview img {
        max-width: 150px;
        max-height: 150px;
        border-radius: 4px;
        border: 1px solid #ddd;
    }

    .tech-input-group {
        display: flex;
        gap: 10px;
        align-items: center;
        margin-bottom: 10px;
    }

    .tech-input-group input[type="text"] {
        flex: 1;
    }

    .tech-input-group input[type="file"] {
        flex: 1;
    }

    .btn-remove {
        background: #dc3545;
        color: white;
        border: none;
        padding: 8px 12px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-remove:hover {
        background: #c82333;
    }

    .btn-add-tech {
        background: #28a745;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
        margin-top: 10px;
    }

    .btn-add-tech:hover {
        background: #218838;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 20px;
    }

    .btn-cancel {
        background: #6c757d;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-cancel:hover {
        background: #5a6268;
    }

    .btn-submit {
        background: #007bff;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-submit:hover {
        background: #0056b3;
    }

    .custom-multiselect {
        position: relative;
        width: 100%;
    }

    .select-box {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 10px;
        cursor: pointer;
        background: white;
        position: relative;
    }

    .selected {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
    }

    .tag {
        background: #e9ecef;
        padding: 5px 10px;
        border-radius: 3px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .remove-tag {
        cursor: pointer;
        color: #666;
    }

    .remove-tag:hover {
        color: #dc3545;
    }

    .placeholder {
        color: #6c757d;
    }

    .arrow {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        color: #666;
    }

    .options-container {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: white;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin-top: 5px;
        max-height: 200px;
        overflow-y: auto;
        z-index: 1000;
    }

    .option {
        padding: 8px 10px;
        cursor: pointer;
    }

    .option:hover {
        background: #f8f9fa;
    }

    .option label {
        cursor: pointer;
        display: block;
        width: 100%;
    }

    .badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background-color: #042954;
        color: #fff;
        padding: 6px 12px;
        border-radius: 999px;
        font-size: 13px;
        font-weight: 500;
        margin: 4px 6px 4px 0;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    /* Language Tab Styles */
    .language-tabs {
        display: flex;
        gap: 5px;
        margin: 20px 0;
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

    .tab-content-view {
        display: none;
    }

    .tab-content-view.active {
        display: block;
    }

    .lang-tab-view {
        padding: 12px 24px;
        border: none;
        background: none;
        cursor: pointer;
        font-weight: 600;
        color: #6b7280;
        border-bottom: 3px solid transparent;
        transition: all 0.3s;
    }

    .lang-tab-view:hover {
        background: rgba(59, 130, 246, 0.05);
    }

    .lang-tab-view.active {
        color: #2563eb;
        border-bottom: 3px solid #2563eb;
        background: rgba(37, 99, 235, 0.05);
    }

    .section-divider {
        margin: 30px 0;
        border-bottom: 2px solid #e5e7eb;
        padding-bottom: 10px;
    }

    .section-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 15px;
    }

    .universal-fields {
        background: #f9fafb;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .grid-2col {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
    }

    @media (max-width: 768px) {
        .grid-2col {
            grid-template-columns: 1fr;
        }
    }
</style>


@section('content')
<div class="main-content">
    @include('layouts.header')
    <div class="content">
        <div class="table-section">
            <div class="table-header">
                <h2>Services</h2>
                <div class="table-actions">
                    <button class="action-button add-new" onclick="openAddModal()">
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
                            <th>Service Name</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $service->name }}</td>
                            <td>{{ $service->type }}</td>
                            <td>
                                <span
                                    style="padding: 2px 8px;border-radius: 20px;background-color: {{ $service->status ? '#28a745' : '#6c757d' }};color: white;">
                                    {{ $service->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button class="action-btn edit" data-toggle="modal" data-target="#addmodal"
                                        data-id="{{ $service->slug }}"
                                        data-type="{{ $service->type }}"
                                        data-orderby="{{ $service->order_by }}"
                                        data-hero_image="{{ asset($service->hero_image) }}"
                                        data-icon="{{ asset($service->icon) }}"
                                        data-image1="{{ asset($service->image1) }}"
                                        data-image2="{{ asset($service->image2) }}"
                                        data-technologies="{{ $service->serviceTechnologies->pluck('technology.id')->toJson() }}"
                                        data-hero_title="{{ $service->hero_title }}"
                                        data-hero_description="{{ $service->hero_description }}"
                                        data-technology_title="{{ $service->name }}"
                                        data-technology_description="{{ $service->description }}"
                                        data-title1="{{ $service->title1 }}"
                                        data-description1="{{ $service->description1 }}"
                                        data-title2="{{ $service->title2 }}"
                                        data-description2="{{ $service->description2 }}"
                                        data-portfolio_title="{{ $service->portfolio_title }}"
                                        data-portfolio_description="{{ $service->portfolio_description }}"
                                        data-meta_title="{{ $service->meta_title }}"
                                        data-meta_description="{{ $service->meta_description }}"
                                        data-meta_keywords="{{ $service->meta_keywords }}"
                                        data-hero_title_en="{{ $service->hero_title_en }}"
                                        data-hero_description_en="{{ $service->hero_description_en }}"
                                        data-name_en="{{ $service->name_en }}"
                                        data-description_en="{{ $service->description_en }}"
                                        data-title1_en="{{ $service->title1_en }}"
                                        data-description1_en="{{ $service->description1_en }}"
                                        data-title2_en="{{ $service->title2_en }}"
                                        data-description2_en="{{ $service->description2_en }}"
                                        data-portfolio_title_en="{{ $service->portfolio_title_en }}"
                                        data-portfolio_description_en="{{ $service->portfolio_description_en }}"
                                        data-meta_title_en="{{ $service->meta_title_en }}"
                                        data-meta_description_en="{{ $service->meta_description_en }}"
                                        data-meta_keywords_en="{{ $service->meta_keywords_en }}"
                                        data-hero_title_fr="{{ $service->hero_title_fr }}"
                                        data-hero_description_fr="{{ $service->hero_description_fr }}"
                                        data-name_fr="{{ $service->name_fr }}"
                                        data-description_fr="{{ $service->description_fr }}"
                                        data-title1_fr="{{ $service->title1_fr }}"
                                        data-description1_fr="{{ $service->description1_fr }}"
                                        data-title2_fr="{{ $service->title2_fr }}"
                                        data-description2_fr="{{ $service->description2_fr }}"
                                        data-portfolio_title_fr="{{ $service->portfolio_title_fr }}"
                                        data-portfolio_description_fr="{{ $service->portfolio_description_fr }}"
                                        data-meta_title_fr="{{ $service->meta_title_fr }}"
                                        data-meta_description_fr="{{ $service->meta_description_fr }}"
                                        data-meta_keywords_fr="{{ $service->meta_keywords_fr }}"
                                        data-hero_title_de="{{ $service->hero_title_de }}"
                                        data-hero_description_de="{{ $service->hero_description_de }}"
                                        data-name_de="{{ $service->name_de }}"
                                        data-description_de="{{ $service->description_de }}"
                                        data-title1_de="{{ $service->title1_de }}"
                                        data-description1_de="{{ $service->description1_de }}"
                                        data-title2_de="{{ $service->title2_de }}"
                                        data-description2_de="{{ $service->description2_de }}"
                                        data-portfolio_title_de="{{ $service->portfolio_title_de }}"
                                        data-portfolio_description_de="{{ $service->portfolio_description_de }}"
                                        data-meta_title_de="{{ $service->meta_title_de }}"
                                        data-meta_description_de="{{ $service->meta_description_de }}"
                                        data-meta_keywords_de="{{ $service->meta_keywords_de }}">
                                        <span class="btn-content">
                                            <i class="fa-light fa-pen"></i>
                                            <p class="btn-text">Edit</p>
                                        </span>
                                    </button>

                                    <button class="action-btn delete" data-toggle="modal" data-target="#deleteModal"
                                        data-id="{{ route('services.destroy', $service->slug) }}">
                                        <span class="btn-content">
                                            <i class="fa-light fa-trash"></i>
                                            <p class="btn-text">Delete</p>
                                        </span>
                                    </button>

                                    <button class="action-btn view" data-toggle="modal" data-target="#viewModal"
                                        data-type="{{ $service->type }}"
                                        data-orderby="{{ $service->order_by }}"
                                        data-hero_image="{{ asset($service->hero_image) }}"
                                        data-icon="{{ asset($service->icon) }}"
                                        data-image1="{{ asset($service->image1) }}"
                                        data-image2="{{ asset($service->image2) }}"
                                        data-technologies="{{ $service->serviceTechnologies->map(function ($st) {
                                return ['id' => $st->technology->id, 'name' => $st->technology->name]; })->toJson() }}"
                                        data-hero_title="{{ $service->hero_title }}"
                                        data-hero_description="{{ $service->hero_description }}"
                                        data-technology_title="{{ $service->name }}"
                                        data-technology_description="{{ $service->description }}"
                                        data-title1="{{ $service->title1 }}"
                                        data-description1="{{ $service->description1 }}"
                                        data-title2="{{ $service->title2 }}"
                                        data-description2="{{ $service->description2 }}"
                                        data-portfolio_title="{{ $service->portfolio_title }}"
                                        data-portfolio_description="{{ $service->portfolio_description }}"
                                        data-meta_title="{{ $service->meta_title }}"
                                        data-meta_description="{{ $service->meta_description }}"
                                        data-meta_keywords="{{ $service->meta_keywords }}"
                                        data-hero_title_en="{{ $service->hero_title_en }}"
                                        data-hero_description_en="{{ $service->hero_description_en }}"
                                        data-name_en="{{ $service->name_en }}"
                                        data-description_en="{{ $service->description_en }}"
                                        data-title1_en="{{ $service->title1_en }}"
                                        data-description1_en="{{ $service->description1_en }}"
                                        data-title2_en="{{ $service->title2_en }}"
                                        data-description2_en="{{ $service->description2_en }}"
                                        data-portfolio_title_en="{{ $service->portfolio_title_en }}"
                                        data-portfolio_description_en="{{ $service->portfolio_description_en }}"
                                        data-meta_title_en="{{ $service->meta_title_en }}"
                                        data-meta_description_en="{{ $service->meta_description_en }}"
                                        data-meta_keywords_en="{{ $service->meta_keywords_en }}"
                                        data-hero_title_fr="{{ $service->hero_title_fr }}"
                                        data-hero_description_fr="{{ $service->hero_description_fr }}"
                                        data-name_fr="{{ $service->name_fr }}"
                                        data-description_fr="{{ $service->description_fr }}"
                                        data-title1_fr="{{ $service->title1_fr }}"
                                        data-description1_fr="{{ $service->description1_fr }}"
                                        data-title2_fr="{{ $service->title2_fr }}"
                                        data-description2_fr="{{ $service->description2_fr }}"
                                        data-portfolio_title_fr="{{ $service->portfolio_title_fr }}"
                                        data-portfolio_description_fr="{{ $service->portfolio_description_fr }}"
                                        data-meta_title_fr="{{ $service->meta_title_fr }}"
                                        data-meta_description_fr="{{ $service->meta_description_fr }}"
                                        data-meta_keywords_fr="{{ $service->meta_keywords_fr }}"
                                        data-hero_title_de="{{ $service->hero_title_de }}"
                                        data-hero_description_de="{{ $service->hero_description_de }}"
                                        data-name_de="{{ $service->name_de }}"
                                        data-description_de="{{ $service->description_de }}"
                                        data-title1_de="{{ $service->title1_de }}"
                                        data-description1_de="{{ $service->description1_de }}"
                                        data-title2_de="{{ $service->title2_de }}"
                                        data-description2_de="{{ $service->description2_de }}"
                                        data-portfolio_title_de="{{ $service->portfolio_title_de }}"
                                        data-portfolio_description_de="{{ $service->portfolio_description_de }}"
                                        data-meta_title_de="{{ $service->meta_title_de }}"
                                        data-meta_description_de="{{ $service->meta_description_de }}"
                                        data-meta_keywords_de="{{ $service->meta_keywords_de }}">
                                        <span class="btn-content">
                                            <i class="fa-light fa-eye"></i>
                                            <p class="btn-text">View</p>
                                        </span>
                                    </button>
                                    <button class="action-btn status" data-id="{{ $service->id }}"
                                        data-status="{{ $service->status }}">
                                        <span class="btn-content">
                                            <i class="fa-light fa-circle-check"></i>
                                            <p class="btn-text">Status</p>
                                        </span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    @include('partials.custom_pagination', ['paginator' => $services])
                </div>
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
    <div class="modal-overlay" id="viewModal">
        <div class="modal" style="width: 90%; max-width: 1400px; max-height: 90vh; overflow-y: auto;">
            <div class="modal-header" style="margin-bottom: 20px;">
                <h3 style="margin: 0;">Service Details</h3>
                <button class="close-modal" id="closeViewModal"
                    style="padding: 10px; background: transparent; border: none;">
                    <i class="fa-light fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body" style="padding: 0px 25px 25px;">
                <!-- Universal Information -->
                <div class="universal-fields" style="margin-bottom: 20px;">
                    <h4 class="section-title">📸 Universal Settings</h4>
                    <div class="grid-2col">
                        <p style="margin: 10px 0;"><strong>Type:</strong> <span id="viewType"></span></p>
                        <p style="margin: 10px 0;"><strong>Order:</strong> <span id="viewOrderBy"></span></p>
                    </div>
                    <div class="grid-2col" style="margin-top: 15px;">
                        <div>
                            <strong>Hero Image:</strong><br>
                            <img id="viewHeroImage" src="" style="max-width: 150px; margin-top: 10px;">
                        </div>
                        <div>
                            <strong>Icon:</strong><br>
                            <img id="viewTechnologyImage" src="" style="max-width: 150px; margin-top: 10px;">
                        </div>
                        <div>
                            <strong>Image 1:</strong><br>
                            <img id="viewImage1" src="" style="max-width: 150px; margin-top: 10px;">
                        </div>
                        <div>
                            <strong>Image 2:</strong><br>
                            <img id="viewImage2" src="" style="max-width: 150px; margin-top: 10px;">
                        </div>
                    </div>
                    <div style="margin-top: 15px;">
                        <strong>Technologies:</strong>
                        <div id="viewTechnologiesList" style="margin-top: 10px; display: flex; flex-wrap: wrap; gap: 5px;">
                            <!-- Technologies will be populated here -->
                        </div>
                    </div>
                </div>

                <div class="section-divider"></div>

                <!-- Multilingual Content -->
                <h4 class="section-title">🌐 Multilingual Content</h4>

                <!-- Language Tabs -->
                <div class="language-tabs">
                    <button type="button" class="lang-tab-view active" data-lang="nl">🇳🇱 Nederlands</button>
                    <button type="button" class="lang-tab-view" data-lang="en">🇬🇧 English</button>
                    <button type="button" class="lang-tab-view" data-lang="fr">🇫🇷 Français</button>
                    <button type="button" class="lang-tab-view" data-lang="de">🇩🇪 Deutsch</button>
                </div>

                <!-- Dutch Content -->
                <div class="tab-content-view active" data-lang="nl">
                    <div class="grid-2col">
                        <p style="margin: 10px 0;"><strong>Hero Title:</strong> <span id="viewHeroTitle"></span></p>
                        <p style="margin: 10px 0;"><strong>Service Name:</strong> <span id="viewTechnologyTitle"></span></p>
                        <p style="margin: 10px 0;"><strong>Hero Description:</strong> <span id="viewHeroDescription"></span></p>
                        <p style="margin: 10px 0;"><strong>Service Description:</strong> <span id="viewTechnologyDescription"></span></p>
                        <p style="margin: 10px 0;"><strong>Portfolio Title:</strong> <span id="viewPortfolioTitle"></span></p>
                        <p style="margin: 10px 0;"><strong>Portfolio Description:</strong> <span id="viewPortfolioDescription"></span></p>
                        <p style="margin: 10px 0;"><strong>Title 1:</strong> <span id="viewTitle1"></span></p>
                        <p style="margin: 10px 0;"><strong>Description 1:</strong> <span id="viewDescription1"></span></p>
                        <p style="margin: 10px 0;"><strong>Title 2:</strong> <span id="viewTitle2"></span></p>
                        <p style="margin: 10px 0;"><strong>Description 2:</strong> <span id="viewDescription2"></span></p>
                        <p style="margin: 10px 0;"><strong>Meta Title:</strong> <span id="viewMetaTitle"></span></p>
                        <p style="margin: 10px 0;"><strong>Meta Description:</strong> <span id="viewMetaDescription"></span></p>
                        <p style="margin: 10px 0; grid-column: 1 / -1;"><strong>Meta Keywords:</strong> <span id="viewMetaKeywords"></span></p>
                    </div>
                </div>

                <!-- English Content -->
                <div class="tab-content-view" data-lang="en">
                    <div class="grid-2col">
                        <p style="margin: 10px 0;"><strong>Hero Title:</strong> <span id="viewHeroTitleEn"></span></p>
                        <p style="margin: 10px 0;"><strong>Service Name:</strong> <span id="viewNameEn"></span></p>
                        <p style="margin: 10px 0;"><strong>Hero Description:</strong> <span id="viewHeroDescriptionEn"></span></p>
                        <p style="margin: 10px 0;"><strong>Service Description:</strong> <span id="viewDescriptionEn"></span></p>
                        <p style="margin: 10px 0;"><strong>Portfolio Title:</strong> <span id="viewPortfolioTitleEn"></span></p>
                        <p style="margin: 10px 0;"><strong>Portfolio Description:</strong> <span id="viewPortfolioDescriptionEn"></span></p>
                        <p style="margin: 10px 0;"><strong>Title 1:</strong> <span id="viewTitle1En"></span></p>
                        <p style="margin: 10px 0;"><strong>Description 1:</strong> <span id="viewDescription1En"></span></p>
                        <p style="margin: 10px 0;"><strong>Title 2:</strong> <span id="viewTitle2En"></span></p>
                        <p style="margin: 10px 0;"><strong>Description 2:</strong> <span id="viewDescription2En"></span></p>
                        <p style="margin: 10px 0;"><strong>Meta Title:</strong> <span id="viewMetaTitleEn"></span></p>
                        <p style="margin: 10px 0;"><strong>Meta Description:</strong> <span id="viewMetaDescriptionEn"></span></p>
                        <p style="margin: 10px 0; grid-column: 1 / -1;"><strong>Meta Keywords:</strong> <span id="viewMetaKeywordsEn"></span></p>
                    </div>
                </div>

                <!-- French Content -->
                <div class="tab-content-view" data-lang="fr">
                    <div class="grid-2col">
                        <p style="margin: 10px 0;"><strong>Hero Title:</strong> <span id="viewHeroTitleFr"></span></p>
                        <p style="margin: 10px 0;"><strong>Service Name:</strong> <span id="viewNameFr"></span></p>
                        <p style="margin: 10px 0;"><strong>Hero Description:</strong> <span id="viewHeroDescriptionFr"></span></p>
                        <p style="margin: 10px 0;"><strong>Service Description:</strong> <span id="viewDescriptionFr"></span></p>
                        <p style="margin: 10px 0;"><strong>Portfolio Title:</strong> <span id="viewPortfolioTitleFr"></span></p>
                        <p style="margin: 10px 0;"><strong>Portfolio Description:</strong> <span id="viewPortfolioDescriptionFr"></span></p>
                        <p style="margin: 10px 0;"><strong>Title 1:</strong> <span id="viewTitle1Fr"></span></p>
                        <p style="margin: 10px 0;"><strong>Description 1:</strong> <span id="viewDescription1Fr"></span></p>
                        <p style="margin: 10px 0;"><strong>Title 2:</strong> <span id="viewTitle2Fr"></span></p>
                        <p style="margin: 10px 0;"><strong>Description 2:</strong> <span id="viewDescription2Fr"></span></p>
                        <p style="margin: 10px 0;"><strong>Meta Title:</strong> <span id="viewMetaTitleFr"></span></p>
                        <p style="margin: 10px 0;"><strong>Meta Description:</strong> <span id="viewMetaDescriptionFr"></span></p>
                        <p style="margin: 10px 0; grid-column: 1 / -1;"><strong>Meta Keywords:</strong> <span id="viewMetaKeywordsFr"></span></p>
                    </div>
                </div>

                <!-- German Content -->
                <div class="tab-content-view" data-lang="de">
                    <div class="grid-2col">
                        <p style="margin: 10px 0;"><strong>Hero Title:</strong> <span id="viewHeroTitleDe"></span></p>
                        <p style="margin: 10px 0;"><strong>Service Name:</strong> <span id="viewNameDe"></span></p>
                        <p style="margin: 10px 0;"><strong>Hero Description:</strong> <span id="viewHeroDescriptionDe"></span></p>
                        <p style="margin: 10px 0;"><strong>Service Description:</strong> <span id="viewDescriptionDe"></span></p>
                        <p style="margin: 10px 0;"><strong>Portfolio Title:</strong> <span id="viewPortfolioTitleDe"></span></p>
                        <p style="margin: 10px 0;"><strong>Portfolio Description:</strong> <span id="viewPortfolioDescriptionDe"></span></p>
                        <p style="margin: 10px 0;"><strong>Title 1:</strong> <span id="viewTitle1De"></span></p>
                        <p style="margin: 10px 0;"><strong>Description 1:</strong> <span id="viewDescription1De"></span></p>
                        <p style="margin: 10px 0;"><strong>Title 2:</strong> <span id="viewTitle2De"></span></p>
                        <p style="margin: 10px 0;"><strong>Description 2:</strong> <span id="viewDescription2De"></span></p>
                        <p style="margin: 10px 0;"><strong>Meta Title:</strong> <span id="viewMetaTitleDe"></span></p>
                        <p style="margin: 10px 0;"><strong>Meta Description:</strong> <span id="viewMetaDescriptionDe"></span></p>
                        <p style="margin: 10px 0; grid-column: 1 / -1;"><strong>Meta Keywords:</strong> <span id="viewMetaKeywordsDe"></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-overlay" id="deleteModal">
        <div class="modal">
            <div class="modal-header">
                <h3>Confirm Deletion</h3>
                <button class="close-modal" id="closeDeleteModal"><i class="fa-light fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this service?</p>
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
    <div class="modal-overlay" id="addmodal">
        <div class="modal" style="width: 90%; max-width: 1400px; max-height: 90vh; overflow-y: auto;">
            <div class="modal-header">
                <h3 id="modalTitle">Add New Service</h3>
                <button class="close-modal" id="closeaddmodal"><i class="fa-light fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <form class="add-form" method="POST" id="serviceForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="POST" id="formMethod">

                    <!-- UNIVERSAL FIELDS SECTION (No Translation Needed) -->
                    <div class="universal-fields">
                        <h4 class="section-title">📸 Universal Settings (Same for all languages)</h4>

                        <div class="grid-2col">
                            <div class="form-group">
                                <label for="type">Service Type <span class="required">*</span></label>
                                <select name="type" id="type" class="form-control" required>
                                    <option value="">Select Type</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="order_by">Order By <span class="required">*</span></label>
                                <input type="number" name="order_by" id="order_by" class="form-control" required min="1" placeholder="Display order">
                            </div>

                            <div class="form-group">
                                <label for="hero_image">Hero Image <span class="required">*</span></label>
                                <input type="file" name="hero_image" id="hero_image" class="form-control" accept="image/*">
                                <small class="form-text text-muted">Banner image (1920x1080px)</small>
                                <div class="image-preview" id="heroImagePreview"></div>
                            </div>

                            <div class="form-group">
                                <label for="technology_image">Icon <span class="required">*</span></label>
                                <input type="file" name="icon" id="technology_image" class="form-control" accept="image/*">
                                <small class="form-text text-muted">Service icon image</small>
                                <div class="image-preview" id="technologyImagePreview"></div>
                            </div>

                            <div class="form-group">
                                <label for="image1">Image 1 <span class="required">*</span></label>
                                <input type="file" name="image1" id="image1" class="form-control" accept="image/*">
                                <small class="form-text text-muted">Content section 1 image</small>
                                <div class="image-preview" id="image1Preview"></div>
                            </div>

                            <div class="form-group">
                                <label for="image2">Image 2 <span class="required">*</span></label>
                                <input type="file" name="image2" id="image2" class="form-control" accept="image/*">
                                <small class="form-text text-muted">Content section 2 image</small>
                                <div class="image-preview" id="image2Preview"></div>
                            </div>
                        </div>

                        <div class="form-group" style="margin-top: 15px;">
                            <label for="technologies">Technologies <span class="required">*</span></label>
                            <div class="custom-multiselect">
                                <div class="select-box" onclick="toggleOptions(event)">
                                    <div class="selected"></div>
                                    <div class="placeholder">Select technologies</div>
                                    <div class="arrow">&#9662;</div>
                                </div>
                                <div class="options-container">
                                    @foreach ($technologies as $technology)
                                    <div class="option">
                                        <input type="checkbox" id="technology{{ $technology->id }}"
                                            value="{{ $technology->id }}" onchange="updateSelected()"
                                            style="display: none;">
                                        <label for="technology{{ $technology->id }}">{{ $technology->name }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <input type="hidden" name="technologies" id="selected-technologies">
                        </div>
                    </div>

                    <div class="section-divider"></div>

                    <!-- MULTILINGUAL CONTENT SECTION -->
                    <h4 class="section-title">🌐 Multilingual Content</h4>
                    <p style="color: #6b7280; margin-bottom: 10px;">Manage translations for all text content</p>

                    <!-- Language Tabs -->
                    <div class="language-tabs">
                        <button type="button" class="lang-tab active" data-lang="nl">🇳🇱 Nederlands</button>
                        <button type="button" class="lang-tab" data-lang="en">🇬🇧 English</button>
                        <button type="button" class="lang-tab" data-lang="fr">🇫🇷 Français</button>
                        <button type="button" class="lang-tab" data-lang="de">🇩🇪 Deutsch</button>
                    </div>

                    <!-- Dutch Tab Content -->
                    <div class="tab-content active" data-lang="nl">
                        <div class="grid-2col">
                            <div class="form-group">
                                <label>Hero Title (Nederlands) <span class="required">*</span></label>
                                <input type="text" name="hero_title" id="hero_title" class="form-control" required placeholder="Hero titel">
                            </div>
                            <div class="form-group">
                                <label>Service Name (Nederlands) <span class="required">*</span></label>
                                <input type="text" name="name" id="technology_title" class="form-control" required placeholder="Service naam">
                            </div>
                            <div class="form-group">
                                <label>Hero Description (Nederlands) <span class="required">*</span></label>
                                <textarea name="hero_description" id="hero_description" class="form-control" required placeholder="Hero beschrijving" rows="2"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Service Description (Nederlands) <span class="required">*</span></label>
                                <textarea name="description" id="technology_description" class="form-control" required placeholder="Service beschrijving" rows="2"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Portfolio Title (Nederlands)</label>
                                <input type="text" name="portfolio_title" id="portfolio_title" class="form-control" placeholder="Portfolio titel">
                            </div>
                            <div class="form-group">
                                <label>Portfolio Description (Nederlands)</label>
                                <textarea name="portfolio_description" id="portfolio_description" class="form-control" placeholder="Portfolio beschrijving" rows="2"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Title 1 (Nederlands) <span class="required">*</span></label>
                                <input type="text" name="title1" id="title1" class="form-control" required placeholder="Titel 1">
                            </div>
                            <div class="form-group">
                                <label>Description 1 (Nederlands) <span class="required">*</span></label>
                                <textarea name="description1" id="description1" class="form-control" required placeholder="Beschrijving 1" rows="2"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Title 2 (Nederlands) <span class="required">*</span></label>
                                <input type="text" name="title2" id="title2" class="form-control" required placeholder="Titel 2">
                            </div>
                            <div class="form-group">
                                <label>Description 2 (Nederlands) <span class="required">*</span></label>
                                <textarea name="description2" id="description2" class="form-control" required placeholder="Beschrijving 2" rows="2"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Meta Title (Nederlands)</label>
                                <input type="text" name="meta_title" id="meta_title" class="form-control" placeholder="Meta titel">
                            </div>
                            <div class="form-group">
                                <label>Meta Description (Nederlands)</label>
                                <textarea name="meta_description" id="meta_description" class="form-control" placeholder="Meta beschrijving" rows="2"></textarea>
                            </div>
                            <div class="form-group" style="grid-column: 1 / -1;">
                                <label>Meta Keywords (Nederlands)</label>
                                <input type="text" name="meta_keywords" id="meta_keywords" class="form-control" placeholder="Meta sleutelwoorden (komma gescheiden)">
                            </div>
                        </div>
                    </div>

                    <!-- English Tab Content -->
                    <div class="tab-content" data-lang="en">
                        <div class="grid-2col">
                            <div class="form-group">
                                <label>Hero Title (English)</label>
                                <input type="text" name="hero_title_en" id="hero_title_en" class="form-control" placeholder="Hero title">
                            </div>
                            <div class="form-group">
                                <label>Service Name (English)</label>
                                <input type="text" name="name_en" id="name_en" class="form-control" placeholder="Service name">
                            </div>
                            <div class="form-group">
                                <label>Hero Description (English)</label>
                                <textarea name="hero_description_en" id="hero_description_en" class="form-control" placeholder="Hero description" rows="2"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Service Description (English)</label>
                                <textarea name="description_en" id="description_en" class="form-control" placeholder="Service description" rows="2"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Portfolio Title (English)</label>
                                <input type="text" name="portfolio_title_en" id="portfolio_title_en" class="form-control" placeholder="Portfolio title">
                            </div>
                            <div class="form-group">
                                <label>Portfolio Description (English)</label>
                                <textarea name="portfolio_description_en" id="portfolio_description_en" class="form-control" placeholder="Portfolio description" rows="2"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Title 1 (English)</label>
                                <input type="text" name="title1_en" id="title1_en" class="form-control" placeholder="Title 1">
                            </div>
                            <div class="form-group">
                                <label>Description 1 (English)</label>
                                <textarea name="description1_en" id="description1_en" class="form-control" placeholder="Description 1" rows="2"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Title 2 (English)</label>
                                <input type="text" name="title2_en" id="title2_en" class="form-control" placeholder="Title 2">
                            </div>
                            <div class="form-group">
                                <label>Description 2 (English)</label>
                                <textarea name="description2_en" id="description2_en" class="form-control" placeholder="Description 2" rows="2"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Meta Title (English)</label>
                                <input type="text" name="meta_title_en" id="meta_title_en" class="form-control" placeholder="Meta title">
                            </div>
                            <div class="form-group">
                                <label>Meta Description (English)</label>
                                <textarea name="meta_description_en" id="meta_description_en" class="form-control" placeholder="Meta description" rows="2"></textarea>
                            </div>
                            <div class="form-group" style="grid-column: 1 / -1;">
                                <label>Meta Keywords (English)</label>
                                <input type="text" name="meta_keywords_en" id="meta_keywords_en" class="form-control" placeholder="Meta keywords (comma separated)">
                            </div>
                        </div>
                    </div>

                    <!-- French Tab Content -->
                    <div class="tab-content" data-lang="fr">
                        <div class="grid-2col">
                            <div class="form-group">
                                <label>Hero Title (Français)</label>
                                <input type="text" name="hero_title_fr" id="hero_title_fr" class="form-control" placeholder="Titre hero">
                            </div>
                            <div class="form-group">
                                <label>Service Name (Français)</label>
                                <input type="text" name="name_fr" id="name_fr" class="form-control" placeholder="Nom du service">
                            </div>
                            <div class="form-group">
                                <label>Hero Description (Français)</label>
                                <textarea name="hero_description_fr" id="hero_description_fr" class="form-control" placeholder="Description hero" rows="2"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Service Description (Français)</label>
                                <textarea name="description_fr" id="description_fr" class="form-control" placeholder="Description du service" rows="2"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Portfolio Title (Français)</label>
                                <input type="text" name="portfolio_title_fr" id="portfolio_title_fr" class="form-control" placeholder="Titre du portfolio">
                            </div>
                            <div class="form-group">
                                <label>Portfolio Description (Français)</label>
                                <textarea name="portfolio_description_fr" id="portfolio_description_fr" class="form-control" placeholder="Description du portfolio" rows="2"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Title 1 (Français)</label>
                                <input type="text" name="title1_fr" id="title1_fr" class="form-control" placeholder="Titre 1">
                            </div>
                            <div class="form-group">
                                <label>Description 1 (Français)</label>
                                <textarea name="description1_fr" id="description1_fr" class="form-control" placeholder="Description 1" rows="2"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Title 2 (Français)</label>
                                <input type="text" name="title2_fr" id="title2_fr" class="form-control" placeholder="Titre 2">
                            </div>
                            <div class="form-group">
                                <label>Description 2 (Français)</label>
                                <textarea name="description2_fr" id="description2_fr" class="form-control" placeholder="Description 2" rows="2"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Meta Title (Français)</label>
                                <input type="text" name="meta_title_fr" id="meta_title_fr" class="form-control" placeholder="Meta titre">
                            </div>
                            <div class="form-group">
                                <label>Meta Description (Français)</label>
                                <textarea name="meta_description_fr" id="meta_description_fr" class="form-control" placeholder="Meta description" rows="2"></textarea>
                            </div>
                            <div class="form-group" style="grid-column: 1 / -1;">
                                <label>Meta Keywords (Français)</label>
                                <input type="text" name="meta_keywords_fr" id="meta_keywords_fr" class="form-control" placeholder="Meta mots-clés (séparés par des virgules)">
                            </div>
                        </div>
                    </div>

                    <!-- German Tab Content -->
                    <div class="tab-content" data-lang="de">
                        <div class="grid-2col">
                            <div class="form-group">
                                <label>Hero Title (Deutsch)</label>
                                <input type="text" name="hero_title_de" id="hero_title_de" class="form-control" placeholder="Hero Titel">
                            </div>
                            <div class="form-group">
                                <label>Service Name (Deutsch)</label>
                                <input type="text" name="name_de" id="name_de" class="form-control" placeholder="Service Name">
                            </div>
                            <div class="form-group">
                                <label>Hero Description (Deutsch)</label>
                                <textarea name="hero_description_de" id="hero_description_de" class="form-control" placeholder="Hero Beschreibung" rows="2"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Service Description (Deutsch)</label>
                                <textarea name="description_de" id="description_de" class="form-control" placeholder="Service Beschreibung" rows="2"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Portfolio Title (Deutsch)</label>
                                <input type="text" name="portfolio_title_de" id="portfolio_title_de" class="form-control" placeholder="Portfolio Titel">
                            </div>
                            <div class="form-group">
                                <label>Portfolio Description (Deutsch)</label>
                                <textarea name="portfolio_description_de" id="portfolio_description_de" class="form-control" placeholder="Portfolio Beschreibung" rows="2"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Title 1 (Deutsch)</label>
                                <input type="text" name="title1_de" id="title1_de" class="form-control" placeholder="Titel 1">
                            </div>
                            <div class="form-group">
                                <label>Description 1 (Deutsch)</label>
                                <textarea name="description1_de" id="description1_de" class="form-control" placeholder="Beschreibung 1" rows="2"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Title 2 (Deutsch)</label>
                                <input type="text" name="title2_de" id="title2_de" class="form-control" placeholder="Titel 2">
                            </div>
                            <div class="form-group">
                                <label>Description 2 (Deutsch)</label>
                                <textarea name="description2_de" id="description2_de" class="form-control" placeholder="Beschreibung 2" rows="2"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Meta Title (Deutsch)</label>
                                <input type="text" name="meta_title_de" id="meta_title_de" class="form-control" placeholder="Meta Titel">
                            </div>
                            <div class="form-group">
                                <label>Meta Description (Deutsch)</label>
                                <textarea name="meta_description_de" id="meta_description_de" class="form-control" placeholder="Meta Beschreibung" rows="2"></textarea>
                            </div>
                            <div class="form-group" style="grid-column: 1 / -1;">
                                <label>Meta Keywords (Deutsch)</label>
                                <input type="text" name="meta_keywords_de" id="meta_keywords_de" class="form-control" placeholder="Meta Schlüsselwörter (durch Kommas getrennt)">
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn-cancel" id="canceladd">Cancel</button>
                        <button type="submit" class="btn-submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    let fieldCounter = 1;

    function addField() {
        fieldCounter++;
        const container = document.getElementById('technology-container');
        if (container) {
            const newField = document.createElement('div');
            newField.classList.add('technology-fields');
            newField.id = `technology-${fieldCounter}`;

            newField.innerHTML = `
                    <div class="tech-input-group">
                        <input type="text" name="tech_title[]" placeholder="Enter technology title"
                               class="technology-title" required maxlength="50">
                        <input type="file" name="tech_image[]" class="technology-image" accept="image/*" required>
                        <button type="button" class="btn-remove" onclick="removeField('technology-${fieldCounter}')">
                            <i class="fa-light fa-trash"></i>
                        </button>
                    </div>
                    <div class="tech-image-preview"></div>
                `;
            container.appendChild(newField);
        }
    }

    function removeField(fieldId) {
        const field = document.getElementById(fieldId);
        if (field) field.remove();
    }

    document.addEventListener("DOMContentLoaded", function() {
        const deleteModal = document.getElementById("deleteModal");
        const deleteForm = document.getElementById("deleteForm");
        const addModal = document.getElementById("addmodal");
        const form = document.getElementById("serviceForm");
        const formMethod = document.getElementById("formMethod");
        const submitButton = form?.querySelector(".btn-submit");

        // Delete button handlers
        document.querySelectorAll(".action-btn.delete").forEach(button => {
            button.addEventListener("click", function() {
                if (deleteForm) {
                    deleteForm.setAttribute("action", this.getAttribute("data-id"));
                }
                if (deleteModal) {
                    deleteModal.style.display = "flex";
                }
            });
        });

        const closeDeleteModal = document.getElementById("closeDeleteModal");
        const cancelDelete = document.getElementById("cancelDelete");
        if (closeDeleteModal && cancelDelete) {
            closeDeleteModal.onclick = cancelDelete.onclick = () => {
                if (deleteModal) {
                    deleteModal.style.display = "none";
                }
            };
        }

        // Edit button handlers
        document.querySelectorAll(".action-btn.edit").forEach(button => {
            button.addEventListener("click", function() {
                // Reset form first
                if (form) {
                    form.reset();
                }

                // Populate form fields with old values
                const heroTitle = document.getElementById("hero_title");
                const heroDescription = document.getElementById("hero_description");
                const techTitle = document.getElementById("technology_title");
                const techDescription = document.getElementById("technology_description");
                const title1 = document.getElementById("title1");
                const description1 = document.getElementById("description1");
                const orderBy = document.getElementById("order_by");
                const title2 = document.getElementById("title2");
                const description2 = document.getElementById("description2");
                const portfolio_title = document.getElementById("portfolio_title");
                const portfolio_description = document.getElementById("portfolio_description");
                const metaTitle = document.getElementById("meta_title");
                const metaDescription = document.getElementById("meta_description");
                const metaKeywords = document.getElementById("meta_keywords");

                // Populate Dutch (Default) fields
                if (heroTitle) heroTitle.value = this.dataset.hero_title || '';
                if (heroDescription) heroDescription.value = this.dataset.hero_description || '';
                if (techTitle) techTitle.value = this.dataset.technology_title || '';
                if (techDescription) techDescription.value = this.dataset.technology_description || '';
                if (title1) title1.value = this.dataset.title1 || '';
                if (description1) description1.value = this.dataset.description1 || '';
                if (orderBy) orderBy.value = this.dataset.orderby || '';
                if (title2) title2.value = this.dataset.title2 || '';
                if (description2) description2.value = this.dataset.description2 || '';
                if (metaTitle) metaTitle.value = this.dataset.meta_title || '';
                if (metaDescription) metaDescription.value = this.dataset.meta_description || '';
                if (metaKeywords) metaKeywords.value = this.dataset.meta_keywords || '';
                if (portfolio_title) portfolio_title.value = this.dataset.portfolio_title || '';
                if (portfolio_description) portfolio_description.value = this.dataset.portfolio_description || '';

                // Populate English fields
                const heroTitleEn = document.getElementById("hero_title_en");
                const heroDescriptionEn = document.getElementById("hero_description_en");
                const nameEn = document.getElementById("name_en");
                const descriptionEn = document.getElementById("description_en");
                const title1En = document.getElementById("title1_en");
                const description1En = document.getElementById("description1_en");
                const title2En = document.getElementById("title2_en");
                const description2En = document.getElementById("description2_en");
                const portfolioTitleEn = document.getElementById("portfolio_title_en");
                const portfolioDescriptionEn = document.getElementById("portfolio_description_en");
                const metaTitleEn = document.getElementById("meta_title_en");
                const metaDescriptionEn = document.getElementById("meta_description_en");
                const metaKeywordsEn = document.getElementById("meta_keywords_en");

                if (heroTitleEn) heroTitleEn.value = this.dataset.hero_title_en || '';
                if (heroDescriptionEn) heroDescriptionEn.value = this.dataset.hero_description_en || '';
                if (nameEn) nameEn.value = this.dataset.name_en || '';
                if (descriptionEn) descriptionEn.value = this.dataset.description_en || '';
                if (title1En) title1En.value = this.dataset.title1_en || '';
                if (description1En) description1En.value = this.dataset.description1_en || '';
                if (title2En) title2En.value = this.dataset.title2_en || '';
                if (description2En) description2En.value = this.dataset.description2_en || '';
                if (portfolioTitleEn) portfolioTitleEn.value = this.dataset.portfolio_title_en || '';
                if (portfolioDescriptionEn) portfolioDescriptionEn.value = this.dataset.portfolio_description_en || '';
                if (metaTitleEn) metaTitleEn.value = this.dataset.meta_title_en || '';
                if (metaDescriptionEn) metaDescriptionEn.value = this.dataset.meta_description_en || '';
                if (metaKeywordsEn) metaKeywordsEn.value = this.dataset.meta_keywords_en || '';

                // Populate French fields
                const heroTitleFr = document.getElementById("hero_title_fr");
                const heroDescriptionFr = document.getElementById("hero_description_fr");
                const nameFr = document.getElementById("name_fr");
                const descriptionFr = document.getElementById("description_fr");
                const title1Fr = document.getElementById("title1_fr");
                const description1Fr = document.getElementById("description1_fr");
                const title2Fr = document.getElementById("title2_fr");
                const description2Fr = document.getElementById("description2_fr");
                const portfolioTitleFr = document.getElementById("portfolio_title_fr");
                const portfolioDescriptionFr = document.getElementById("portfolio_description_fr");
                const metaTitleFr = document.getElementById("meta_title_fr");
                const metaDescriptionFr = document.getElementById("meta_description_fr");
                const metaKeywordsFr = document.getElementById("meta_keywords_fr");

                if (heroTitleFr) heroTitleFr.value = this.dataset.hero_title_fr || '';
                if (heroDescriptionFr) heroDescriptionFr.value = this.dataset.hero_description_fr || '';
                if (nameFr) nameFr.value = this.dataset.name_fr || '';
                if (descriptionFr) descriptionFr.value = this.dataset.description_fr || '';
                if (title1Fr) title1Fr.value = this.dataset.title1_fr || '';
                if (description1Fr) description1Fr.value = this.dataset.description1_fr || '';
                if (title2Fr) title2Fr.value = this.dataset.title2_fr || '';
                if (description2Fr) description2Fr.value = this.dataset.description2_fr || '';
                if (portfolioTitleFr) portfolioTitleFr.value = this.dataset.portfolio_title_fr || '';
                if (portfolioDescriptionFr) portfolioDescriptionFr.value = this.dataset.portfolio_description_fr || '';
                if (metaTitleFr) metaTitleFr.value = this.dataset.meta_title_fr || '';
                if (metaDescriptionFr) metaDescriptionFr.value = this.dataset.meta_description_fr || '';
                if (metaKeywordsFr) metaKeywordsFr.value = this.dataset.meta_keywords_fr || '';

                // Populate German fields
                const heroTitleDe = document.getElementById("hero_title_de");
                const heroDescriptionDe = document.getElementById("hero_description_de");
                const nameDe = document.getElementById("name_de");
                const descriptionDe = document.getElementById("description_de");
                const title1De = document.getElementById("title1_de");
                const description1De = document.getElementById("description1_de");
                const title2De = document.getElementById("title2_de");
                const description2De = document.getElementById("description2_de");
                const portfolioTitleDe = document.getElementById("portfolio_title_de");
                const portfolioDescriptionDe = document.getElementById("portfolio_description_de");
                const metaTitleDe = document.getElementById("meta_title_de");
                const metaDescriptionDe = document.getElementById("meta_description_de");
                const metaKeywordsDe = document.getElementById("meta_keywords_de");

                if (heroTitleDe) heroTitleDe.value = this.dataset.hero_title_de || '';
                if (heroDescriptionDe) heroDescriptionDe.value = this.dataset.hero_description_de || '';
                if (nameDe) nameDe.value = this.dataset.name_de || '';
                if (descriptionDe) descriptionDe.value = this.dataset.description_de || '';
                if (title1De) title1De.value = this.dataset.title1_de || '';
                if (description1De) description1De.value = this.dataset.description1_de || '';
                if (title2De) title2De.value = this.dataset.title2_de || '';
                if (description2De) description2De.value = this.dataset.description2_de || '';
                if (portfolioTitleDe) portfolioTitleDe.value = this.dataset.portfolio_title_de || '';
                if (portfolioDescriptionDe) portfolioDescriptionDe.value = this.dataset.portfolio_description_de || '';
                if (metaTitleDe) metaTitleDe.value = this.dataset.meta_title_de || '';
                if (metaDescriptionDe) metaDescriptionDe.value = this.dataset.meta_description_de || '';
                if (metaKeywordsDe) metaKeywordsDe.value = this.dataset.meta_keywords_de || '';

                // Set the type select field
                const typeSelect = document.getElementById("type");
                if (typeSelect) typeSelect.value = this.dataset.type || '';

                // Show existing images
                if (this.dataset.hero_image) {
                    const heroImageContainer = document.getElementById("hero_image")
                        ?.parentElement;
                    if (heroImageContainer) {
                        const existingPreview = heroImageContainer.querySelector('img');
                        if (existingPreview) existingPreview.remove();

                        const heroImagePreview = document.createElement('img');
                        heroImagePreview.src = this.dataset.hero_image;
                        heroImagePreview.style.width = '100px';
                        heroImagePreview.style.marginTop = '10px';
                        heroImageContainer.appendChild(heroImagePreview);
                    }
                }
                if (this.dataset.icon) {
                    const iconContainer = document.getElementById("technology_image")
                        ?.parentElement;
                    if (iconContainer) {
                        const existingPreview = iconContainer.querySelector('img');
                        if (existingPreview) existingPreview.remove();

                        const iconPreview = document.createElement('img');
                        iconPreview.src = this.dataset.icon;
                        iconPreview.style.width = '100px';
                        iconPreview.style.marginTop = '10px';
                        iconContainer.appendChild(iconPreview);
                    }
                }

                // if (this.dataset.hover_icon) {
                //     const hoverIconContainer = document.getElementById("hover_icon")
                //         ?.parentElement;
                //     if (hoverIconContainer) {
                //         const existingPreview = hoverIconContainer.querySelector('img');
                //         if (existingPreview) existingPreview.remove();

                //         const hoverIconPreview = document.createElement('img');
                //         hoverIconPreview.src = this.dataset.hover_icon;
                //         hoverIconPreview.style.width = '100px';
                //         hoverIconPreview.style.marginTop = '10px';
                //         hoverIconContainer.appendChild(hoverIconPreview);
                //     }
                // }

                if (this.dataset.image1) {
                    const image1Container = document.getElementById("image1")?.parentElement;
                    if (image1Container) {
                        const existingPreview = image1Container.querySelector('img');
                        if (existingPreview) existingPreview.remove();

                        const image1Preview = document.createElement('img');
                        image1Preview.src = this.dataset.image1;
                        image1Preview.style.width = '100px';
                        image1Preview.style.marginTop = '10px';
                        image1Container.appendChild(image1Preview);
                    }
                }

                if (this.dataset.image2) {
                    const image2Container = document.getElementById("image2")?.parentElement;
                    if (image2Container) {
                        const existingPreview = image2Container.querySelector('img');
                        if (existingPreview) existingPreview.remove();

                        const image2Preview = document.createElement('img');
                        image2Preview.src = this.dataset.image2;
                        image2Preview.style.width = '100px';
                        image2Preview.style.marginTop = '10px';
                        image2Container.appendChild(image2Preview);
                    }
                }

                // Handle technologies
                try {
                    const selectedTechnologies = JSON.parse(this.dataset.technologies || '[]');
                    console.log('Selected Technologies:', selectedTechnologies);

                    // Reset all checkboxes
                    document.querySelectorAll('.options-container input[type="checkbox"]')
                        .forEach(checkbox => {
                            checkbox.checked = false;
                        });

                    // Check the boxes for selected technologies
                    selectedTechnologies.forEach(techId => {
                        const checkbox = document.querySelector(
                            `.options-container input[type="checkbox"][value="${techId}"]`
                        );
                        if (checkbox) {
                            checkbox.checked = true;
                        }
                    });

                    // Update the selected technologies display and hidden input
                    updateSelected();
                } catch (e) {
                    console.error('Error parsing technologies:', e);
                }

                // Set form action and method
                if (form) {
                    form.setAttribute("action", `{{ route('services.update', ':slug') }}`
                        .replace(':slug', this.dataset.id));
                }
                if (formMethod) {
                    formMethod.value = "PUT";
                }
                if (submitButton) {
                    submitButton.textContent = "Update";
                }
                if (addModal) {
                    addModal.style.display = "flex";
                }
            });
        });

        // Close modal handlers
        const closeAddModal = document.getElementById("closeaddmodal");
        const cancelAdd = document.getElementById("canceladd");
        if (closeAddModal && cancelAdd) {
            closeAddModal.onclick = cancelAdd.onclick = () => {
                if (form) {
                    form.reset();
                    form.setAttribute("action", "{{ route('services.store') }}");
                }
                if (formMethod) {
                    formMethod.value = "POST";
                }
                if (submitButton) {
                    submitButton.textContent = "Save";
                }
                if (addModal) {
                    addModal.style.display = "none";
                }

                // Clear image previews
                document.querySelectorAll('.form-group img').forEach(img => img.remove());

                // Reset technologies
                const techContainer = document.getElementById("technology-container");
                if (techContainer) {
                    techContainer.innerHTML = `
                            <div class="technology-fields" id="technology-1">
                                <div class="tech-input-group">
                                    <input type="text" name="tech_title[]" placeholder="Enter technology title"
                                           class="technology-title" required>
                                    <input type="file" name="tech_image[]" class="technology-image" required>
                                    <button type="button" class="btn-remove" onclick="removeField('technology-1')">
                                        <i class="fa-light fa-trash"></i>
                                    </button>
                                </div>
                                <div class="tech-image-preview"></div>
                            </div>
                        `;
                    fieldCounter = 1;
                }
            };
        }

        // View button handlers
        document.querySelectorAll(".action-btn.view").forEach(button => {
            button.addEventListener("click", function() {
                // Universal Settings
                document.getElementById("viewType").textContent = this.dataset.type ? this.dataset.type.charAt(0).toUpperCase() + this.dataset.type.slice(1) : '';
                document.getElementById("viewOrderBy").textContent = this.dataset.orderby || '';
                document.getElementById("viewHeroImage").src = this.dataset.hero_image || '';
                document.getElementById("viewTechnologyImage").src = this.dataset.icon || '';
                document.getElementById("viewImage1").src = this.dataset.image1 || '';
                document.getElementById("viewImage2").src = this.dataset.image2 || '';

                // Dutch (Default) Content
                document.getElementById("viewHeroTitle").textContent = this.dataset.hero_title || '';
                document.getElementById("viewHeroDescription").textContent = this.dataset.hero_description || '';
                document.getElementById("viewTechnologyTitle").textContent = this.dataset.technology_title || '';
                document.getElementById("viewTechnologyDescription").textContent = this.dataset.technology_description || '';
                document.getElementById("viewTitle1").textContent = this.dataset.title1 || '';
                document.getElementById("viewDescription1").textContent = this.dataset.description1 || '';
                document.getElementById("viewTitle2").textContent = this.dataset.title2 || '';
                document.getElementById("viewDescription2").textContent = this.dataset.description2 || '';
                document.getElementById("viewPortfolioTitle").textContent = this.dataset.portfolio_title || '';
                document.getElementById("viewPortfolioDescription").textContent = this.dataset.portfolio_description || '';
                document.getElementById("viewMetaTitle").textContent = this.dataset.meta_title || '';
                document.getElementById("viewMetaDescription").textContent = this.dataset.meta_description || '';
                document.getElementById("viewMetaKeywords").textContent = this.dataset.meta_keywords || '';

                // English Content
                document.getElementById("viewHeroTitleEn").textContent = this.dataset.hero_title_en || '-';
                document.getElementById("viewHeroDescriptionEn").textContent = this.dataset.hero_description_en || '-';
                document.getElementById("viewNameEn").textContent = this.dataset.name_en || '-';
                document.getElementById("viewDescriptionEn").textContent = this.dataset.description_en || '-';
                document.getElementById("viewTitle1En").textContent = this.dataset.title1_en || '-';
                document.getElementById("viewDescription1En").textContent = this.dataset.description1_en || '-';
                document.getElementById("viewTitle2En").textContent = this.dataset.title2_en || '-';
                document.getElementById("viewDescription2En").textContent = this.dataset.description2_en || '-';
                document.getElementById("viewPortfolioTitleEn").textContent = this.dataset.portfolio_title_en || '-';
                document.getElementById("viewPortfolioDescriptionEn").textContent = this.dataset.portfolio_description_en || '-';
                document.getElementById("viewMetaTitleEn").textContent = this.dataset.meta_title_en || '-';
                document.getElementById("viewMetaDescriptionEn").textContent = this.dataset.meta_description_en || '-';
                document.getElementById("viewMetaKeywordsEn").textContent = this.dataset.meta_keywords_en || '-';

                // French Content
                document.getElementById("viewHeroTitleFr").textContent = this.dataset.hero_title_fr || '-';
                document.getElementById("viewHeroDescriptionFr").textContent = this.dataset.hero_description_fr || '-';
                document.getElementById("viewNameFr").textContent = this.dataset.name_fr || '-';
                document.getElementById("viewDescriptionFr").textContent = this.dataset.description_fr || '-';
                document.getElementById("viewTitle1Fr").textContent = this.dataset.title1_fr || '-';
                document.getElementById("viewDescription1Fr").textContent = this.dataset.description1_fr || '-';
                document.getElementById("viewTitle2Fr").textContent = this.dataset.title2_fr || '-';
                document.getElementById("viewDescription2Fr").textContent = this.dataset.description2_fr || '-';
                document.getElementById("viewPortfolioTitleFr").textContent = this.dataset.portfolio_title_fr || '-';
                document.getElementById("viewPortfolioDescriptionFr").textContent = this.dataset.portfolio_description_fr || '-';
                document.getElementById("viewMetaTitleFr").textContent = this.dataset.meta_title_fr || '-';
                document.getElementById("viewMetaDescriptionFr").textContent = this.dataset.meta_description_fr || '-';
                document.getElementById("viewMetaKeywordsFr").textContent = this.dataset.meta_keywords_fr || '-';

                // German Content
                document.getElementById("viewHeroTitleDe").textContent = this.dataset.hero_title_de || '-';
                document.getElementById("viewHeroDescriptionDe").textContent = this.dataset.hero_description_de || '-';
                document.getElementById("viewNameDe").textContent = this.dataset.name_de || '-';
                document.getElementById("viewDescriptionDe").textContent = this.dataset.description_de || '-';
                document.getElementById("viewTitle1De").textContent = this.dataset.title1_de || '-';
                document.getElementById("viewDescription1De").textContent = this.dataset.description1_de || '-';
                document.getElementById("viewTitle2De").textContent = this.dataset.title2_de || '-';
                document.getElementById("viewDescription2De").textContent = this.dataset.description2_de || '-';
                document.getElementById("viewPortfolioTitleDe").textContent = this.dataset.portfolio_title_de || '-';
                document.getElementById("viewPortfolioDescriptionDe").textContent = this.dataset.portfolio_description_de || '-';
                document.getElementById("viewMetaTitleDe").textContent = this.dataset.meta_title_de || '-';
                document.getElementById("viewMetaDescriptionDe").textContent = this.dataset.meta_description_de || '-';
                document.getElementById("viewMetaKeywordsDe").textContent = this.dataset.meta_keywords_de || '-';

                // Handle technologies
                const techContainer = document.getElementById("viewTechnologiesList");
                if (techContainer) {
                    techContainer.innerHTML = '';
                    try {
                        const technologies = JSON.parse(this.dataset.technologies || '[]');
                        if (Array.isArray(technologies)) {
                            technologies.forEach(tech => {
                                const techBadge = document.createElement('span');
                                techBadge.className = 'badge';
                                techBadge.textContent = tech.name;
                                techContainer.appendChild(techBadge);
                            });
                        }
                    } catch (e) {
                        console.error('Error parsing technologies:', e);
                        techContainer.innerHTML = '<span class="text-muted">Error loading technologies</span>';
                    }
                }

                const viewModal = document.getElementById("viewModal");
                if (viewModal) {
                    viewModal.style.display = "flex";
                }
            });
        });
    });

    // Language tab switching functionality for Edit Modal
    document.querySelectorAll('.lang-tab').forEach(tab => {
        tab.addEventListener('click', function() {
            const targetLang = this.getAttribute('data-lang');
            
            // Remove active from all tabs
            document.querySelectorAll('.lang-tab').forEach(t => t.classList.remove('active'));
            
            // Add active to clicked tab
            this.classList.add('active');
            
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.remove('active');
            });
            
            // Show target tab content
            const targetContent = document.querySelector(`.tab-content[data-lang="${targetLang}"]`);
            if (targetContent) {
                targetContent.classList.add('active');
            }
        });
    });

    // Language tab switching functionality for View Modal
    document.querySelectorAll('.lang-tab-view').forEach(tab => {
        tab.addEventListener('click', function() {
            const targetLang = this.getAttribute('data-lang');
            
            // Remove active from all view tabs
            document.querySelectorAll('.lang-tab-view').forEach(t => t.classList.remove('active'));
            
            // Add active to clicked tab
            this.classList.add('active');
            
            // Hide all view tab contents
            document.querySelectorAll('.tab-content-view').forEach(content => {
                content.classList.remove('active');
            });
            
            // Show target view tab content
            const targetContent = document.querySelector(`.tab-content-view[data-lang="${targetLang}"]`);
            if (targetContent) {
                targetContent.classList.add('active');
            }
        });
    });

    function toggleOptions(e) {
        const container = document.querySelector('.options-container');
        if (container && !e.target.classList.contains('remove-tag')) {
            container.style.display = container.style.display === 'block' ? 'none' : 'block';
        }
    }

    function updateSelected() {
        const selectedDiv = document.querySelector('.selected');
        const placeholder = document.querySelector('.placeholder');
        const checkboxes = document.querySelectorAll('.options-container input[type="checkbox"]:checked');
        const selectedTechnologies = [];

        if (selectedDiv && placeholder) {
            selectedDiv.innerHTML = '';

            if (checkboxes.length > 0) {
                placeholder.style.display = 'none';
            } else {
                placeholder.style.display = 'block';
            }

            checkboxes.forEach(checkbox => {
                const tag = document.createElement('div');
                tag.className = 'tag';
                tag.innerHTML = `${checkbox.nextElementSibling.textContent}
                                   <span class="remove-tag" onclick="removeTag('${checkbox.id}')">&times;</span>`;
                selectedDiv.appendChild(tag);
                selectedTechnologies.push(parseInt(checkbox.value));
            });

            const selectedTechnologiesInput = document.getElementById('selected-technologies');
            if (selectedTechnologiesInput) {
                selectedTechnologiesInput.value = JSON.stringify(selectedTechnologies);
            }
        }
    }

    function removeTag(id) {
        const checkbox = document.getElementById(id);
        if (checkbox) {
            checkbox.checked = false;
            updateSelected();
        }
    }

    window.addEventListener('click', function(e) {
        const selectBox = document.querySelector('.select-box');
        const optionsContainer = document.querySelector('.options-container');
        if (selectBox && optionsContainer && !selectBox.contains(e.target) && !optionsContainer.contains(e
                .target)) {
            optionsContainer.style.display = 'none';
        }
    });

    // Add form submit handler to ensure proper data formatting
    document.getElementById('serviceForm').addEventListener('submit', function(e) {
        const technologiesInput = document.getElementById('selected-technologies');
        if (technologiesInput) {
            const currentValue = technologiesInput.value;
            if (currentValue && !currentValue.startsWith('[')) {
                technologiesInput.value = JSON.stringify([parseInt(currentValue)]);
            }
        }
    });

    // Function to open add modal
    function openAddModal() {
        const addModal = document.getElementById("addmodal");
        const form = document.getElementById("serviceForm");
        const formMethod = document.getElementById("formMethod");
        const submitButton = form?.querySelector(".btn-submit");

        // Reset form
        if (form) {
            form.reset();
            form.setAttribute("action", "{{ route('services.store') }}");
        }
        if (formMethod) {
            formMethod.value = "POST";
        }
        if (submitButton) {
            submitButton.textContent = "Save";
        }
        if (addModal) {
            addModal.style.display = "flex";
        }

        // Clear image previews
        document.querySelectorAll('.form-group img').forEach(img => img.remove());

        // Reset technologies
        document.querySelectorAll('.options-container input[type="checkbox"]').forEach(checkbox => {
            checkbox.checked = false;
        });
        updateSelected();
    }

    // Close view modal
    document.getElementById("closeViewModal").addEventListener("click", function() {
        document.getElementById("viewModal").style.display = "none";
    });

    // Close add modal
    document.getElementById("closeaddmodal").addEventListener("click", function() {
        document.getElementById("addmodal").style.display = "none";
    });

    // Close delete modal
    document.getElementById("closeDeleteModal").addEventListener("click", function() {
        document.getElementById("deleteModal").style.display = "none";
    });

    // Cancel add button
    document.getElementById("canceladd").addEventListener("click", function() {
        document.getElementById("addmodal").style.display = "none";
    });

    // Cancel delete button
    document.getElementById("cancelDelete").addEventListener("click", function() {
        document.getElementById("deleteModal").style.display = "none";
    });

    // Image preview functionality
    function handleImagePreview(input, previewId) {
        const preview = document.getElementById(previewId);
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = `<img src="${e.target.result}" style="max-width: 150px; margin-top: 10px;">`;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Add image preview listeners
    document.getElementById('hero_image').addEventListener('change', function() {
        handleImagePreview(this, 'heroImagePreview');
    });

    document.getElementById('technology_image').addEventListener('change', function() {
        handleImagePreview(this, 'technologyImagePreview');
    });

    // document.getElementById('hover_icon').addEventListener('change', function() {
    //     handleImagePreview(this, 'hoverIconPreview');
    // });

    document.getElementById('image1').addEventListener('change', function() {
        handleImagePreview(this, 'image1Preview');
    });

    document.getElementById('image2').addEventListener('change', function() {
        handleImagePreview(this, 'image2Preview');
    });

    // Close modals when clicking outside
    window.addEventListener('click', function(e) {
        const addModal = document.getElementById("addmodal");
        const viewModal = document.getElementById("viewModal");
        const deleteModal = document.getElementById("deleteModal");

        if (e.target === addModal) {
            addModal.style.display = "none";
        }
        if (e.target === viewModal) {
            viewModal.style.display = "none";
        }
        if (e.target === deleteModal) {
            deleteModal.style.display = "none";
        }
    });
    // OPEN Status Modal
    document.querySelectorAll(".action-btn.status").forEach(button => {
        button.addEventListener("click", function() {
            const id = this.getAttribute("data-id");
            const currentStatus = this.getAttribute("data-status");
            const newStatus = currentStatus === "1" ? "0" : "1";

            statusForm.setAttribute("action", `/admin/service/status/${id}/${newStatus}`);
            statusModal.style.display = "flex";
            addModal.style.display = "none";
            deleteModal.style.display = "none";
        });
        document.getElementById("closestatusmodal").onclick =
            document.getElementById("cancelstatus").onclick = () => statusModal.style.display = "none";
    });
</script>
@endsection