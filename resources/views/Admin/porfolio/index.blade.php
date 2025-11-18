@extends('layouts.admin')
@section('head')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".action-btn.edit").forEach(button => {
            button.addEventListener("click", function(e) {
                e.preventDefault();
                e.stopPropagation();

                // Show modal first
                const addModal = document.getElementById("addmodal");
                if (addModal) {
                    addModal.style.display = "flex";
                }

                // Reset form
                const form = document.getElementById("serviceForm");
                if (!form) return;
                form.reset();

                // Update modal title
                const modalTitle = document.getElementById("modalTitle");
                if (modalTitle) {
                    modalTitle.textContent = "Edit Portfolio";
                }

                // Get all data attributes safely
                const data = {
                    main_title: this.getAttribute('data-main_title'),
                    main_description: this.getAttribute('data-main_description'),
                    main_image: this.getAttribute('data-main_image'),
                    banner_image: this.getAttribute('data-banner_image'),
                    meta_title: this.getAttribute('data-meta_title'),
                    meta_description: this.getAttribute('data-meta_description'),
                    meta_keywords: this.getAttribute('data-meta_keywords'),
                    main_image_alt: this.getAttribute('data-main_image_alt'),
                    banner_image_alt: this.getAttribute('data-banner_image_alt'),
                    home_page_order: this.getAttribute('data-home_page_order'),
                    // English
                    main_title_en: this.getAttribute('data-main_title_en'),
                    main_description_en: this.getAttribute('data-main_description_en'),
                    meta_title_en: this.getAttribute('data-meta_title_en'),
                    meta_description_en: this.getAttribute('data-meta_description_en'),
                    meta_keywords_en: this.getAttribute('data-meta_keywords_en'),
                    // French
                    main_title_fr: this.getAttribute('data-main_title_fr'),
                    main_description_fr: this.getAttribute('data-main_description_fr'),
                    meta_title_fr: this.getAttribute('data-meta_title_fr'),
                    meta_description_fr: this.getAttribute('data-meta_description_fr'),
                    meta_keywords_fr: this.getAttribute('data-meta_keywords_fr'),
                    // German
                    main_title_de: this.getAttribute('data-main_title_de'),
                    main_description_de: this.getAttribute('data-main_description_de'),
                    meta_title_de: this.getAttribute('data-meta_title_de'),
                    meta_description_de: this.getAttribute('data-meta_description_de'),
                    meta_keywords_de: this.getAttribute('data-meta_keywords_de'),
                    technologies: this.getAttribute('data-technologies'),
                    service: this.getAttribute('data-service'),
                    id: this.getAttribute('data-id')
                };

                // Dutch (Default)
                const mainTitle = document.getElementById("main_title");
                const mainDescription = document.getElementById("main_description");
                const metaTitle = document.getElementById("meta_title");
                const metaDescription = document.getElementById("meta_description");
                const metaKeywords = document.getElementById("meta_keywords");
                if (mainTitle) mainTitle.value = data.main_title || '';
                if (mainDescription) mainDescription.value = data.main_description || '';
                if (metaTitle) metaTitle.value = data.meta_title || '';
                if (metaDescription) metaDescription.value = data.meta_description || '';
                if (metaKeywords) metaKeywords.value = data.meta_keywords || '';

                // English
                const mainTitleEn = document.getElementById("main_title_en");
                const mainDescriptionEn = document.getElementById("main_description_en");
                const metaTitleEn = document.getElementById("meta_title_en");
                const metaDescriptionEn = document.getElementById("meta_description_en");
                const metaKeywordsEn = document.getElementById("meta_keywords_en");
                if (mainTitleEn) mainTitleEn.value = data.main_title_en || '';
                if (mainDescriptionEn) mainDescriptionEn.value = data.main_description_en || '';
                if (metaTitleEn) metaTitleEn.value = data.meta_title_en || '';
                if (metaDescriptionEn) metaDescriptionEn.value = data.meta_description_en || '';
                if (metaKeywordsEn) metaKeywordsEn.value = data.meta_keywords_en || '';

                // French
                const mainTitleFr = document.getElementById("main_title_fr");
                const mainDescriptionFr = document.getElementById("main_description_fr");
                const metaTitleFr = document.getElementById("meta_title_fr");
                const metaDescriptionFr = document.getElementById("meta_description_fr");
                const metaKeywordsFr = document.getElementById("meta_keywords_fr");
                if (mainTitleFr) mainTitleFr.value = data.main_title_fr || '';
                if (mainDescriptionFr) mainDescriptionFr.value = data.main_description_fr || '';
                if (metaTitleFr) metaTitleFr.value = data.meta_title_fr || '';
                if (metaDescriptionFr) metaDescriptionFr.value = data.meta_description_fr || '';
                if (metaKeywordsFr) metaKeywordsFr.value = data.meta_keywords_fr || '';

                // German
                const mainTitleDe = document.getElementById("main_title_de");
                const mainDescriptionDe = document.getElementById("main_description_de");
                const metaTitleDe = document.getElementById("meta_title_de");
                const metaDescriptionDe = document.getElementById("meta_description_de");
                const metaKeywordsDe = document.getElementById("meta_keywords_de");
                if (mainTitleDe) mainTitleDe.value = data.main_title_de || '';
                if (mainDescriptionDe) mainDescriptionDe.value = data.main_description_de || '';
                if (metaTitleDe) metaTitleDe.value = data.meta_title_de || '';
                if (metaDescriptionDe) metaDescriptionDe.value = data.meta_description_de || '';
                if (metaKeywordsDe) metaKeywordsDe.value = data.meta_keywords_de || '';

                // Universal settings
                const mainImageAlt = document.getElementById("main_image_alt");
                const bannerImageAlt = document.getElementById("banner_image_alt");
                const homePageOrder = document.getElementById("home_page_order");
                if (mainImageAlt) mainImageAlt.value = data.main_image_alt || '';
                if (bannerImageAlt) bannerImageAlt.value = data.banner_image_alt || '';
                if (homePageOrder) homePageOrder.value = data.home_page_order || '';

                // Hero Image
                if (data.hero_image) {
                    const heroImageContainer = document.getElementById("hero_image")
                        .parentElement;
                    if (heroImageContainer) {
                        const existingPreview = heroImageContainer.querySelector('img');
                        if (existingPreview) existingPreview.remove();

                        const heroImagePreview = document.createElement('img');
                        heroImagePreview.src = data.hero_image;
                        heroImagePreview.style.width = '100px';
                        heroImagePreview.style.marginTop = '10px';
                        heroImageContainer.appendChild(heroImagePreview);
                    }
                }

                // Main Image
                if (data.main_image) {
                    const mainImageContainer = document.getElementById("main_image")
                        .parentElement;
                    if (mainImageContainer) {
                        const existingPreview = mainImageContainer.querySelector('img');
                        if (existingPreview) existingPreview.remove();

                        const mainImagePreview = document.createElement('img');
                        mainImagePreview.src = data.main_image;
                        mainImagePreview.style.width = '100px';
                        mainImagePreview.style.marginTop = '10px';
                        mainImageContainer.appendChild(mainImagePreview);
                    }
                }

                // Banner Image
                if (data.banner_image) {
                    const bannerImageContainer = document.getElementById("bennerimage")
                        .parentElement;
                    if (bannerImageContainer) {
                        const existingPreview = bannerImageContainer.querySelector('img');
                        if (existingPreview) existingPreview.remove();

                        const bannerImagePreview = document.createElement('img');
                        bannerImagePreview.src = data.banner_image;
                        bannerImagePreview.style.width = '100px';
                        bannerImagePreview.style.marginTop = '10px';
                        bannerImageContainer.appendChild(bannerImagePreview);
                    }
                }

                // Services
                try {
                    if (data.service) {
                        const selectedServices = JSON.parse(data.service);

                        // Reset all checkboxes
                        document.querySelectorAll('.options-container input[type="checkbox"]')
                            .forEach(checkbox => {
                                checkbox.checked = false;
                            });

                        // Check the boxes for selected services
                        selectedServices.forEach(service => {
                            const checkbox = document.querySelector(
                                `.options-container input[type="checkbox"][value="${service.id}"]`
                            );
                            if (checkbox) {
                                checkbox.checked = true;
                            }
                        });

                        // Update the selected services display and hidden input
                        updateSelected();
                    }
                } catch (e) {
                    console.error('Error parsing services:', e);
                }

                // Technologies
                try {
                    if (data.technologies) {
                        const selectedTechnologies = JSON.parse(data.technologies);

                        // Reset all checkboxes
                        document.querySelectorAll('.tech-options input[type="checkbox"]')
                            .forEach(checkbox => {
                                checkbox.checked = false;
                            });

                        // Check the boxes for selected technologies
                        if (Array.isArray(selectedTechnologies)) {
                            selectedTechnologies.forEach(tech => {
                                if (tech && tech.id) {
                                    const checkbox = document.querySelector(
                                        `.tech-options input[type="checkbox"][value="${tech.id}"]`
                                    );
                                    if (checkbox) {
                                        checkbox.checked = true;
                                    }
                                }
                            });
                        }

                        // Update the selected technologies display and hidden input
                        const selectedTechInput = document.getElementById(
                            'selected-technologies');
                        if (selectedTechInput) {
                            const techIds = Array.isArray(selectedTechnologies) ?
                                selectedTechnologies.map(tech => tech.id).filter(id => id) : [];
                            selectedTechInput.value = JSON.stringify(techIds);
                        }
                        updateSelectedTech();
                    } else {
                        // If no technologies, set empty array
                        const selectedTechInput = document.getElementById(
                            'selected-technologies');
                        if (selectedTechInput) {
                            selectedTechInput.value = '[]';
                        }
                    }
                } catch (e) {
                    console.error('Error parsing technologies:', e);
                    // Set empty array on error
                    const selectedTechInput = document.getElementById('selected-technologies');
                    if (selectedTechInput) {
                        selectedTechInput.value = '[]';
                    }
                }

                // Additional Images
                const additionalImagesContainer = document.getElementById(
                    "additional-images-container");
                if (additionalImagesContainer && data.additional_images) {
                    try {
                        const additionalImages = JSON.parse(data.additional_images);

                        // Clear existing content
                        additionalImagesContainer.innerHTML = '';

                        // Add each image with remove button
                        additionalImages.forEach(item => {
                            additionalImagesContainer.innerHTML += `
                    <div class="additional-image-fields">
                        <div class="tech-input-group">
                           <img src="${assetBaseUrl}${item}" alt="Additional Image" style="width:100px;height:100px;margin-left:5px;">
                           <button type="button" class="btn-remove" onclick="deleteimage('${item}')">
                           <i class="fa-light fa-trash"></i>
                           </button>
                         </div>
                    </div>
                `;
                        });

                        // Add file input for new images
                        additionalImagesContainer.innerHTML += `
                            <div class="additional-image-fields">
                                <div class="tech-input-group">
                                    <input type="file" name="additional_images[]" class="form-control" accept="image/*" multiple>
                                </div>
                            </div>
                        `;

                        // Add hidden input for existing images
                        additionalImagesContainer.innerHTML += `
                            <input type="hidden" name="existing_images" value='${JSON.stringify(additionalImages)}'>
                        `;
                    } catch (e) {
                        console.error('Error parsing additional images:', e);
                        // Add empty file input if there's an error
                        additionalImagesContainer.innerHTML = `
                            <div class="additional-image-fields">
                                <div class="tech-input-group">
                                    <input type="file" name="additional_images[]" class="form-control" accept="image/*" multiple>
                                </div>
                            </div>
                        `;
                    }
                } else {
                    // If no additional images, add empty file input
                    additionalImagesContainer.innerHTML = `
                        <div class="additional-image-fields">
                            <div class="tech-input-group">
                                <input type="file" name="additional_images[]" class="form-control" accept="image/*" multiple>
                            </div>
                        </div>
                    `;
                }

                // Update form action and method
                if (data.id) {
                    form.setAttribute("action", `{{ route('portfolio.update', ':slug') }}`
                        .replace(':slug', data.id));
                }
                const formMethod = document.getElementById("formMethod");
                if (formMethod) formMethod.value = "PUT";
                const submitButton = form.querySelector(".btn-submit");
                if (submitButton) submitButton.textContent = "Update";
            });
        });
    });
</script>
@endsection
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

    .pdf-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: #d32f2f;
        text-decoration: none;
        font-weight: 500;
        background-color: #fbe9e7;
        padding: 5px 10px;
        border-radius: 4px;
        transition: background-color 0.3s, color 0.3s;
    }

    .pdf-link:hover {
        background-color: #ffcccb;
        color: #b71c1c;
    }

    .pdf-link i {
        font-size: 16px;
    }

    .no-pdf {
        display: inline-block;
        padding: 4px 10px;
        background-color: #e0e0e0;
        color: #616161;
        font-size: 13px;
        border-radius: 4px;
    }

    .custom-multiselect {
        width: 350px;
        position: relative;
        font-family: 'Poppins', sans-serif;
        width: 100%;
    }

    .select-box {
        min-height: 50px;
        border: 1px solid #ccc;
        padding: 8px 12px;
        background: #fff;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 5px;
        position: relative;
        overflow: hidden;
    }

    .select-box:hover {
        border-color: #888;
    }

    .selected {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
        flex: 1;
    }

    .placeholder {
        color: #aaa;
        font-size: 14px;
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
    }

    .tag {
        background: #007BFF;
        color: #fff;
        padding: 5px 8px;
        border-radius: 12px;
        font-size: 12px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .tag .remove-tag {
        background: #fff;
        color: #007BFF;
        border-radius: 50%;
        width: 16px;
        height: 16px;
        text-align: center;
        line-height: 14px;
        font-size: 14px;
        cursor: pointer;
    }

    .options-container {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: #fff;
        border: 1px solid #ccc;
        max-height: 200px;
        overflow-y: auto;
        display: none;
        z-index: 20;
    }

    .option {
        padding: 10px;
        align-items: center;
    }

    .option label {
        margin-left: 8px;
        cursor: pointer;
    }

    .option:hover {
        background-color: #f5f5f5;
    }

    .arrow {
        margin-left: auto;
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

    .selected-tech {
        display: flex;
        flex-wrap: nowrap;
        gap: 5px;
        overflow-x: auto;
        padding: 2px;
        min-height: 30px;
        align-items: center;
    }

    .selected-tech .tag {
        flex: 0 0 auto;
        white-space: nowrap;
        background: #007BFF;
        color: #fff;
        padding: 5px 8px;
        border-radius: 12px;
        font-size: 12px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .selected-tech .tag .remove-tag {
        background: #fff;
        color: #007BFF;
        border-radius: 50%;
        width: 16px;
        height: 16px;
        text-align: center;
        line-height: 14px;
        font-size: 14px;
        cursor: pointer;
    }

    .select-box {
        min-height: 50px;
        border: 1px solid #ccc;
        padding: 8px 12px;
        background: #fff;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 5px;
        position: relative;
        overflow: hidden;
    }

    .select-box:hover {
        border-color: #888;
    }

    .placeholder {
        color: #aaa;
        font-size: 14px;
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
    }

    .arrow {
        margin-left: auto;
        color: #666;
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

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .form-grid-full {
        grid-column: 1 / -1;
    }
</style>

@section('content')
<div class="main-content">
    @include('layouts.header')
    <div class="content">
        <div class="table-section">
            <div class="table-header">
                <h2>Portfolios</h2>
                <div class="table-actions">
                    <button id="addNewBtn" class="action-button add-new" data-toggle="modal" data-target="#addmodal">
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
                            <th>Portfolio Name</th>
                            <th>Technologies</th>
                            <th>Service</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($portfolios as $portfolio)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ Str::limit($portfolio->main_title,50)  }}</td>
                            <td>
                                @foreach ($portfolio->portfolioTechnologies as $technology)
                                @php
                                $technology = $technology->technology;
                                @endphp
                                <span class="badge">{{ $technology->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($portfolio->services as $service)
                                <span class="badge bg-primary">{{ $service->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <div class="d-flex flex-wrap gap-2">

                                    <img src="{{ asset($portfolio->banner_image) }}" alt="Additional Image"
                                        class="img-thumbnail"
                                        style="width: 50px; height: 50px; object-fit: cover;">
                                </div>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button class="action-btn edit" data-toggle="modal" data-target="#addmodal"
                                        data-id="{{ $portfolio->slug }}"
                                        data-main_title="{{ $portfolio->main_title }}"
                                        data-main_description="{{ $portfolio->main_description }}"
                                        data-main_image="{{ asset($portfolio->main_image) }}"
                                        data-banner_image="{{ asset($portfolio->banner_image) }}"
                                        data-meta_title="{{ $portfolio->meta_title }}"
                                        data-meta_description="{{ $portfolio->meta_description }}"
                                        data-meta_keywords="{{ $portfolio->meta_keywords }}"
                                        data-main_image_alt="{{ $portfolio->main_image_alt }}"
                                        data-banner_image_alt="{{ $portfolio->banner_image_alt }}"
                                        data-home_page_order="{{ $portfolio->home_page_order }}"
                                        data-main_title_en="{{ $portfolio->main_title_en }}"
                                        data-main_description_en="{{ $portfolio->main_description_en }}"
                                        data-meta_title_en="{{ $portfolio->meta_title_en }}"
                                        data-meta_description_en="{{ $portfolio->meta_description_en }}"
                                        data-meta_keywords_en="{{ $portfolio->meta_keywords_en }}"
                                        data-main_title_fr="{{ $portfolio->main_title_fr }}"
                                        data-main_description_fr="{{ $portfolio->main_description_fr }}"
                                        data-meta_title_fr="{{ $portfolio->meta_title_fr }}"
                                        data-meta_description_fr="{{ $portfolio->meta_description_fr }}"
                                        data-meta_keywords_fr="{{ $portfolio->meta_keywords_fr }}"
                                        data-main_title_de="{{ $portfolio->main_title_de }}"
                                        data-main_description_de="{{ $portfolio->main_description_de }}"
                                        data-meta_title_de="{{ $portfolio->meta_title_de }}"
                                        data-meta_description_de="{{ $portfolio->meta_description_de }}"
                                        data-meta_keywords_de="{{ $portfolio->meta_keywords_de }}"
                                        data-technologies="{{ json_encode($portfolio->portfolioTechnologies->map(function ($pt) {return ['id' => $pt->technology->id, 'name' => $pt->technology->name];})) }}"
                                        data-service="{{ json_encode($portfolio->services) }}">
                                        <span class="btn-content">
                                            <i class="fa-light fa-pen"></i>
                                            <p class="btn-text">Edit</p>
                                        </span>
                                    </button>

                                    <button class="action-btn view" data-toggle="modal" data-target="#viewModal"
                                        data-main_title="{{ $portfolio->main_title }}"
                                        data-main_description="{{ $portfolio->main_description }}"
                                        data-main_image="{{ asset($portfolio->main_image) }}"
                                        data-banner_image="{{ asset($portfolio->banner_image) }}"
                                        data-meta_title="{{ $portfolio->meta_title }}"
                                        data-meta_description="{{ $portfolio->meta_description }}"
                                        data-meta_keywords="{{ $portfolio->meta_keywords }}"
                                        data-main_title_en="{{ $portfolio->main_title_en }}"
                                        data-main_description_en="{{ $portfolio->main_description_en }}"
                                        data-meta_title_en="{{ $portfolio->meta_title_en }}"
                                        data-meta_description_en="{{ $portfolio->meta_description_en }}"
                                        data-meta_keywords_en="{{ $portfolio->meta_keywords_en }}"
                                        data-main_title_fr="{{ $portfolio->main_title_fr }}"
                                        data-main_description_fr="{{ $portfolio->main_description_fr }}"
                                        data-meta_title_fr="{{ $portfolio->meta_title_fr }}"
                                        data-meta_description_fr="{{ $portfolio->meta_description_fr }}"
                                        data-meta_keywords_fr="{{ $portfolio->meta_keywords_fr }}"
                                        data-main_title_de="{{ $portfolio->main_title_de }}"
                                        data-main_description_de="{{ $portfolio->main_description_de }}"
                                        data-meta_title_de="{{ $portfolio->meta_title_de }}"
                                        data-meta_description_de="{{ $portfolio->meta_description_de }}"
                                        data-meta_keywords_de="{{ $portfolio->meta_keywords_de }}"
                                        data-technologies="{{ json_encode($portfolio->portfolioTechnologies->map(function ($pt) {return ['id' => $pt->technology->id, 'name' => $pt->technology->name];})) }}"
                                        data-service="{{ json_encode($portfolio->services) }}"
                                        data-home_page_order="{{ $portfolio->home_page_order }}">
                                        <span class="btn-content">
                                            <i class="fa-light fa-eye"></i>
                                            <p class="btn-text">View</p>
                                        </span>
                                    </button>

                                    <button class="action-btn delete" data-toggle="modal" data-target="#deleteModal"
                                        data-id="{{ route('portfolio.destroy', $portfolio->slug) }}">
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
                    @include('partials.custom_pagination', ['paginator' => $portfolios])
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
                <p>Are you sure you want to delete this portfolios?</p>
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
    <div class="modal-overlay" id="viewModal">
        <div class="modal" style="width: 80%; max-width: 1000px;">
            <div class="modal-header">
                <h3>Portfolio Details</h3>
                <button class="close-modal" id="closeViewModal">
                    <i class="fa-light fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body" style="padding-top: 20px;">
                <!-- Universal Settings Section -->
                <div class="form-section" style="background: #f8f9fa; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                    <h4 style="margin-bottom: 15px;">Universal Settings</h4>
                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px;">
                        <div>
                            <strong>Main Image:</strong><br>
                            <img id="viewMainImage" src="#" alt="Main Image" style="max-width: 150px; margin-top: 10px; border-radius: 4px;">
                        </div>
                        <div>
                            <strong>Banner Image:</strong><br>
                            <img id="viewBannerImage" src="#" alt="Banner Image" style="max-width: 150px; margin-top: 10px; border-radius: 4px;">
                        </div>
                        <div>
                            <strong>Home Page Order:</strong>
                            <div id="viewHomePageOrder" style="margin-top: 5px;"></div>
                        </div>
                    </div>
                </div>

                <!-- Multilingual Content Section -->
                <div class="form-section" style="background: #f8f9fa; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                    <h4 style="margin-bottom: 15px;">Multilingual Content</h4>
                    
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
                        <div style="display: grid; grid-template-columns: 1fr; gap: 15px;">
                            <div><strong>Main Title:</strong> <div id="viewMainTitle"></div></div>
                            <div><strong>Main Description:</strong> <div id="viewMainDescription"></div></div>
                            <div><strong>Meta Title:</strong> <div id="viewMetaTitle"></div></div>
                            <div><strong>Meta Description:</strong> <div id="viewMetaDescription"></div></div>
                            <div><strong>Meta Keywords:</strong> <div id="viewMetaKeywords"></div></div>
                        </div>
                    </div>

                    <!-- English Tab -->
                    <div id="view-english" class="tab-content">
                        <div style="display: grid; grid-template-columns: 1fr; gap: 15px;">
                            <div><strong>Main Title (English):</strong> <div id="viewMainTitleEn"></div></div>
                            <div><strong>Main Description (English):</strong> <div id="viewMainDescriptionEn"></div></div>
                            <div><strong>Meta Title (English):</strong> <div id="viewMetaTitleEn"></div></div>
                            <div><strong>Meta Description (English):</strong> <div id="viewMetaDescriptionEn"></div></div>
                            <div><strong>Meta Keywords (English):</strong> <div id="viewMetaKeywordsEn"></div></div>
                        </div>
                    </div>

                    <!-- French Tab -->
                    <div id="view-french" class="tab-content">
                        <div style="display: grid; grid-template-columns: 1fr; gap: 15px;">
                            <div><strong>Main Title (French):</strong> <div id="viewMainTitleFr"></div></div>
                            <div><strong>Main Description (French):</strong> <div id="viewMainDescriptionFr"></div></div>
                            <div><strong>Meta Title (French):</strong> <div id="viewMetaTitleFr"></div></div>
                            <div><strong>Meta Description (French):</strong> <div id="viewMetaDescriptionFr"></div></div>
                            <div><strong>Meta Keywords (French):</strong> <div id="viewMetaKeywordsFr"></div></div>
                        </div>
                    </div>

                    <!-- German Tab -->
                    <div id="view-german" class="tab-content">
                        <div style="display: grid; grid-template-columns: 1fr; gap: 15px;">
                            <div><strong>Main Title (German):</strong> <div id="viewMainTitleDe"></div></div>
                            <div><strong>Main Description (German):</strong> <div id="viewMainDescriptionDe"></div></div>
                            <div><strong>Meta Title (German):</strong> <div id="viewMetaTitleDe"></div></div>
                            <div><strong>Meta Description (German):</strong> <div id="viewMetaDescriptionDe"></div></div>
                            <div><strong>Meta Keywords (German):</strong> <div id="viewMetaKeywordsDe"></div></div>
                        </div>
                    </div>
                </div>

                <!-- Services & Technologies Section -->
                <div class="form-section" style="background: #f8f9fa; padding: 15px; border-radius: 8px;">
                    <h4 style="margin-bottom: 15px;">Services & Technologies</h4>
                    <div style="margin-bottom: 15px;">
                        <strong>Technologies:</strong>
                        <div id="viewTechnologiesList" style="margin-top: 10px;"></div>
                    </div>
                    <div>
                        <strong>Services:</strong>
                        <div id="viewService" style="margin-top: 10px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-overlay" id="addmodal">
        <div class="modal" style="width: 80%; max-width: 1200px;">
            <div class="modal-header">
                <h3 id="modalTitle">Add New Portfolio</h3>
                <button class="close-modal" id="closeaddmodal"><i class="fa-light fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form class="add-form" method="POST" id="serviceForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="POST" id="formMethod">

                    <div class="form-section">
                        <h4>Universal Settings</h4>
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="main_image">Main Image <span>*</span></label>
                                <input type="file" name="main_image" id="main_image" class="form-control"
                                    accept="image/*">
                                <small class="form-text text-muted">Recommended size: 1920x1080px</small>
                                <div class="image-preview" id="mainImagePreview"></div>
                            </div>

                            <div class="form-group">
                                <label for="banner_image">Banner Image <span>*</span></label>
                                <input type="file" name="banner_image" id="bennerimage" class="form-control"
                                    accept="image/*">
                                <small class="form-text text-muted">Recommended size: 1920x1080px</small>
                                <div class="image-preview" id="bannerImagePreview"></div>
                            </div>

                            <div class="form-group">
                                <label for="main_image_alt">Main Image Alt Text</label>
                                <input type="text" name="main_image_alt" id="main_image_alt" class="form-control" placeholder="Enter main image alt text" maxlength="150">
                            </div>

                            <div class="form-group">
                                <label for="banner_image_alt">Banner Image Alt Text</label>
                                <input type="text" name="banner_image_alt" id="banner_image_alt" class="form-control" placeholder="Enter banner image alt text" maxlength="150">
                            </div>

                            <div class="form-group form-grid-full">
                                <label for="home_page_order">Home Page Order</label>
                                <input type="number" name="home_page_order" id="home_page_order" class="form-control"
                                    placeholder="Enter order number" min="0">
                                <small class="form-text text-muted">Lower numbers will appear first on the home page</small>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h4>Multilingual Content</h4>
                        
                        <!-- Language Tabs -->
                        <div class="language-tabs">
                            <button type="button" class="tab-button active" onclick="switchPortfolioTab(event, 'dutch')">
                                🇳🇱 Dutch (Default)
                            </button>
                            <button type="button" class="tab-button" onclick="switchPortfolioTab(event, 'english')">
                                🇬🇧 English
                            </button>
                            <button type="button" class="tab-button" onclick="switchPortfolioTab(event, 'french')">
                                🇫🇷 French
                            </button>
                            <button type="button" class="tab-button" onclick="switchPortfolioTab(event, 'german')">
                                🇩🇪 German
                            </button>
                        </div>

                        <!-- Dutch Tab -->
                        <div id="dutch" class="tab-content active">
                            <div class="form-grid">
                                <div class="form-group">
                                    <label for="main_title">Main Title <span class="required">*</span></label>
                                    <input type="text" name="main_title" id="main_title" class="form-control" required
                                        placeholder="Enter main title">
                                </div>

                                <div class="form-group">
                                    <label for="meta_title">Meta Title</label>
                                    <input type="text" name="meta_title" id="meta_title" class="form-control"
                                        placeholder="Enter meta title">
                                </div>

                                <div class="form-group form-grid-full">
                                    <label for="main_description">Main Description <span class="required">*</span></label>
                                    <textarea name="main_description" id="main_description" class="form-control" required
                                        placeholder="Enter main description" rows="3"></textarea>
                                </div>

                                <div class="form-group form-grid-full">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea name="meta_description" id="meta_description" class="form-control"
                                        placeholder="Enter meta description" rows="2"></textarea>
                                </div>

                                <div class="form-group form-grid-full">
                                    <label for="meta_keywords">Meta Keywords</label>
                                    <input type="text" name="meta_keywords" id="meta_keywords" class="form-control"
                                        placeholder="Enter meta keywords (comma separated)">
                                </div>
                            </div>
                        </div>

                        <!-- English Tab -->
                        <div id="english" class="tab-content">
                            <div class="form-grid">
                                <div class="form-group">
                                    <label for="main_title_en">Main Title (English)</label>
                                    <input type="text" name="main_title_en" id="main_title_en" class="form-control"
                                        placeholder="Enter main title in English">
                                </div>

                                <div class="form-group">
                                    <label for="meta_title_en">Meta Title (English)</label>
                                    <input type="text" name="meta_title_en" id="meta_title_en" class="form-control"
                                        placeholder="Enter meta title in English">
                                </div>

                                <div class="form-group form-grid-full">
                                    <label for="main_description_en">Main Description (English)</label>
                                    <textarea name="main_description_en" id="main_description_en" class="form-control"
                                        placeholder="Enter main description in English" rows="3"></textarea>
                                </div>

                                <div class="form-group form-grid-full">
                                    <label for="meta_description_en">Meta Description (English)</label>
                                    <textarea name="meta_description_en" id="meta_description_en" class="form-control"
                                        placeholder="Enter meta description in English" rows="2"></textarea>
                                </div>

                                <div class="form-group form-grid-full">
                                    <label for="meta_keywords_en">Meta Keywords (English)</label>
                                    <input type="text" name="meta_keywords_en" id="meta_keywords_en" class="form-control"
                                        placeholder="Enter meta keywords in English">
                                </div>
                            </div>
                        </div>

                        <!-- French Tab -->
                        <div id="french" class="tab-content">
                            <div class="form-grid">
                                <div class="form-group">
                                    <label for="main_title_fr">Main Title (French)</label>
                                    <input type="text" name="main_title_fr" id="main_title_fr" class="form-control"
                                        placeholder="Enter main title in French">
                                </div>

                                <div class="form-group">
                                    <label for="meta_title_fr">Meta Title (French)</label>
                                    <input type="text" name="meta_title_fr" id="meta_title_fr" class="form-control"
                                        placeholder="Enter meta title in French">
                                </div>

                                <div class="form-group form-grid-full">
                                    <label for="main_description_fr">Main Description (French)</label>
                                    <textarea name="main_description_fr" id="main_description_fr" class="form-control"
                                        placeholder="Enter main description in French" rows="3"></textarea>
                                </div>

                                <div class="form-group form-grid-full">
                                    <label for="meta_description_fr">Meta Description (French)</label>
                                    <textarea name="meta_description_fr" id="meta_description_fr" class="form-control"
                                        placeholder="Enter meta description in French" rows="2"></textarea>
                                </div>

                                <div class="form-group form-grid-full">
                                    <label for="meta_keywords_fr">Meta Keywords (French)</label>
                                    <input type="text" name="meta_keywords_fr" id="meta_keywords_fr" class="form-control"
                                        placeholder="Enter meta keywords in French">
                                </div>
                            </div>
                        </div>

                        <!-- German Tab -->
                        <div id="german" class="tab-content">
                            <div class="form-grid">
                                <div class="form-group">
                                    <label for="main_title_de">Main Title (German)</label>
                                    <input type="text" name="main_title_de" id="main_title_de" class="form-control"
                                        placeholder="Enter main title in German">
                                </div>

                                <div class="form-group">
                                    <label for="meta_title_de">Meta Title (German)</label>
                                    <input type="text" name="meta_title_de" id="meta_title_de" class="form-control"
                                        placeholder="Enter meta title in German">
                                </div>

                                <div class="form-group form-grid-full">
                                    <label for="main_description_de">Main Description (German)</label>
                                    <textarea name="main_description_de" id="main_description_de" class="form-control"
                                        placeholder="Enter main description in German" rows="3"></textarea>
                                </div>

                                <div class="form-group form-grid-full">
                                    <label for="meta_description_de">Meta Description (German)</label>
                                    <textarea name="meta_description_de" id="meta_description_de" class="form-control"
                                        placeholder="Enter meta description in German" rows="2"></textarea>
                                </div>

                                <div class="form-group form-grid-full">
                                    <label for="meta_keywords_de">Meta Keywords (German)</label>
                                    <input type="text" name="meta_keywords_de" id="meta_keywords_de" class="form-control"
                                        placeholder="Enter meta keywords in German">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h4>Services & Technologies</h4>
                        <div class="form-group">
                            <label for="services">Select Services <span class="required">*</span></label>
                            <div class="custom-multiselect">
                                <div class="select-box" onclick="toggleOptions(event)">
                                    <div class="selected"></div>
                                    <div class="placeholder">Select services</div>
                                    <div class="arrow">&#9662;</div>
                                </div>
                                <div class="options-container">
                                    @foreach ($services as $service)
                                    <div class="option">
                                        <input type="checkbox" id="service{{ $service->id }}"
                                            value="{{ $service->id }}" onchange="updateSelected()"
                                            style="display: none;">
                                        <label for="service{{ $service->id }}">{{ $service->name }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <input type="hidden" name="services" id="selected-services">
                            <small class="form-text text-muted">Select at least one service</small>
                        </div>

                        <div class="form-group">
                            <label for="technology">Technologies</label>
                            <div class="custom-multiselect">
                                <div class="select-box" onclick="toggleTechOptions(event)">
                                    <div class="selected-tech"></div>
                                    <div class="placeholder">Select technologies</div>
                                    <div class="arrow">&#9662;</div>
                                </div>
                                <div class="options-container tech-options" style="display: none;">
                                    @foreach ($technologies as $tech)
                                    <div class="option">
                                        <input type="checkbox" id="tech{{ $tech->id }}"
                                            value="{{ $tech->id }}" onchange="updateSelectedTech()"
                                            style="display: none;">
                                        <label for="tech{{ $tech->id }}">{{ $tech->name }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <input type="hidden" name="technologies" id="selected-technologies">
                            <small class="form-text text-muted">Select technologies (optional)</small>
                        </div>
                    </div>

                    {{-- <div class="form-section">
                            <h4>Additional Images</h4>
                            <div class="form-group">
                                <label for="additional_images">Additional Images</label>
                                <div id="additional-images-container">
                                    <div class="additional-image-fields" id="additional-image-1">
                                        <div class="tech-input-group">
                                            <input type="file" name="additional_images[]" class="form-control"
                                                accept="image/*">
                                            <button type="button" class="btn-remove"
                                                onclick="removeAdditionalImage('additional-image-1')">
                                                <i class="fa-light fa-trash"></i>
                                            </button>
                                        </div>
                                        <div class="image-preview"></div>
                                    </div>
                                </div>
                                <button type="button" class="btn-add-tech" onclick="addAdditionalImage()">
                                    <i class="fa-light fa-plus"></i> Add More Images
                                </button>
                                <small class="form-text text-muted">Add additional images for the portfolio</small>
                            </div>
                        </div> --}}

                    <div class="form-actions">
                        <button type="button" class="btn-cancel" id="canceladd">Cancel</button>
                        <button type="submit" class="btn-submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    // Declare all variables once at the top
    window.fieldCounter = 1; // Make it global
    window.techIndex = 1; // Make it global
    window.additionalImageCounter = 1; // Make it global
    window.assetBaseUrl = "{{ asset('') }}"; // Make it global

    document.addEventListener("DOMContentLoaded", function() {
        const deleteModal = document.getElementById("deleteModal");
        const deleteForm = document.getElementById("deleteForm");
        const addNewBtn = document.getElementById("addNewBtn");
        const addModal = document.getElementById("addmodal");
        const form = document.getElementById("serviceForm");
        const formMethod = document.getElementById("formMethod");
        const submitButton = form?.querySelector(".btn-submit");

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

        addNewBtn.onclick = function() {
            addModal.style.display = "flex";
            form.reset();
            document.getElementById("modalTitle").textContent = "Add New Portfolio";
            formMethod.value = "POST";
            submitButton.textContent = "Save";

            // Reset all fields
            document.querySelectorAll(".image-preview").forEach(preview => {
                preview.innerHTML = '';
            });

            // Reset image previews
            const mainImageContainer = document.getElementById("main_image")?.parentElement;
            if (mainImageContainer) {
                const mainPreview = mainImageContainer.querySelector('img');
                if (mainPreview) mainPreview.remove();
            }

            const bannerImageContainer = document.getElementById("bennerimage")?.parentElement;
            if (bannerImageContainer) {
                const bannerPreview = bannerImageContainer.querySelector('img');
                if (bannerPreview) bannerPreview.remove();
            }

            // Reset services selection
            document.querySelectorAll('.options-container input[type="checkbox"]').forEach(checkbox => {
                checkbox.checked = false;
            });
            updateSelected();

            // Reset technologies selection
            document.querySelectorAll('.tech-options input[type="checkbox"]').forEach(checkbox => {
                checkbox.checked = false;
            });
            updateSelectedTech();

            // Reset form action
            form.setAttribute("action", "{{ route('portfolio.store') }}");
        };

        document.querySelectorAll(".action-btn.edit").forEach(button => {
            button.addEventListener("click", function(e) {
                e.preventDefault();
                e.stopPropagation();

                // Show modal first
                const addModal = document.getElementById("addmodal");
                if (addModal) {
                    addModal.style.display = "flex";
                }

                // Reset form
                const form = document.getElementById("serviceForm");
                if (!form) return;
                form.reset();

                // Update modal title
                const modalTitle = document.getElementById("modalTitle");
                if (modalTitle) {
                    modalTitle.textContent = "Edit Portfolio";
                }

                // Get all data attributes safely (MULTILINGUAL VERSION)
                const data = {
                    main_title: this.getAttribute('data-main_title'),
                    main_description: this.getAttribute('data-main_description'),
                    main_image: this.getAttribute('data-main_image'),
                    banner_image: this.getAttribute('data-banner_image'),
                    meta_title: this.getAttribute('data-meta_title'),
                    meta_description: this.getAttribute('data-meta_description'),
                    meta_keywords: this.getAttribute('data-meta_keywords'),
                    main_image_alt: this.getAttribute('data-main_image_alt'),
                    banner_image_alt: this.getAttribute('data-banner_image_alt'),
                    home_page_order: this.getAttribute('data-home_page_order'),
                    // English
                    main_title_en: this.getAttribute('data-main_title_en'),
                    main_description_en: this.getAttribute('data-main_description_en'),
                    meta_title_en: this.getAttribute('data-meta_title_en'),
                    meta_description_en: this.getAttribute('data-meta_description_en'),
                    meta_keywords_en: this.getAttribute('data-meta_keywords_en'),
                    // French
                    main_title_fr: this.getAttribute('data-main_title_fr'),
                    main_description_fr: this.getAttribute('data-main_description_fr'),
                    meta_title_fr: this.getAttribute('data-meta_title_fr'),
                    meta_description_fr: this.getAttribute('data-meta_description_fr'),
                    meta_keywords_fr: this.getAttribute('data-meta_keywords_fr'),
                    // German
                    main_title_de: this.getAttribute('data-main_title_de'),
                    main_description_de: this.getAttribute('data-main_description_de'),
                    meta_title_de: this.getAttribute('data-meta_title_de'),
                    meta_description_de: this.getAttribute('data-meta_description_de'),
                    meta_keywords_de: this.getAttribute('data-meta_keywords_de'),
                    technologies: this.getAttribute('data-technologies'),
                    service: this.getAttribute('data-service'),
                    id: this.getAttribute('data-id')
                };

                // Dutch (Default)
                const mainTitle = document.getElementById("main_title");
                const mainDescription = document.getElementById("main_description");
                const metaTitle = document.getElementById("meta_title");
                const metaDescription = document.getElementById("meta_description");
                const metaKeywords = document.getElementById("meta_keywords");
                if (mainTitle) mainTitle.value = data.main_title || '';
                if (mainDescription) mainDescription.value = data.main_description || '';
                if (metaTitle) metaTitle.value = data.meta_title || '';
                if (metaDescription) metaDescription.value = data.meta_description || '';
                if (metaKeywords) metaKeywords.value = data.meta_keywords || '';

                // English
                const mainTitleEn = document.getElementById("main_title_en");
                const mainDescriptionEn = document.getElementById("main_description_en");
                const metaTitleEn = document.getElementById("meta_title_en");
                const metaDescriptionEn = document.getElementById("meta_description_en");
                const metaKeywordsEn = document.getElementById("meta_keywords_en");
                if (mainTitleEn) mainTitleEn.value = data.main_title_en || '';
                if (mainDescriptionEn) mainDescriptionEn.value = data.main_description_en || '';
                if (metaTitleEn) metaTitleEn.value = data.meta_title_en || '';
                if (metaDescriptionEn) metaDescriptionEn.value = data.meta_description_en || '';
                if (metaKeywordsEn) metaKeywordsEn.value = data.meta_keywords_en || '';

                // French
                const mainTitleFr = document.getElementById("main_title_fr");
                const mainDescriptionFr = document.getElementById("main_description_fr");
                const metaTitleFr = document.getElementById("meta_title_fr");
                const metaDescriptionFr = document.getElementById("meta_description_fr");
                const metaKeywordsFr = document.getElementById("meta_keywords_fr");
                if (mainTitleFr) mainTitleFr.value = data.main_title_fr || '';
                if (mainDescriptionFr) mainDescriptionFr.value = data.main_description_fr || '';
                if (metaTitleFr) metaTitleFr.value = data.meta_title_fr || '';
                if (metaDescriptionFr) metaDescriptionFr.value = data.meta_description_fr || '';
                if (metaKeywordsFr) metaKeywordsFr.value = data.meta_keywords_fr || '';

                // German
                const mainTitleDe = document.getElementById("main_title_de");
                const mainDescriptionDe = document.getElementById("main_description_de");
                const metaTitleDe = document.getElementById("meta_title_de");
                const metaDescriptionDe = document.getElementById("meta_description_de");
                const metaKeywordsDe = document.getElementById("meta_keywords_de");
                if (mainTitleDe) mainTitleDe.value = data.main_title_de || '';
                if (mainDescriptionDe) mainDescriptionDe.value = data.main_description_de || '';
                if (metaTitleDe) metaTitleDe.value = data.meta_title_de || '';
                if (metaDescriptionDe) metaDescriptionDe.value = data.meta_description_de || '';
                if (metaKeywordsDe) metaKeywordsDe.value = data.meta_keywords_de || '';

                // Universal settings
                const mainImageAlt = document.getElementById("main_image_alt");
                const bannerImageAlt = document.getElementById("banner_image_alt");
                const homePageOrder = document.getElementById("home_page_order");
                if (mainImageAlt) mainImageAlt.value = data.main_image_alt || '';
                if (bannerImageAlt) bannerImageAlt.value = data.banner_image_alt || '';
                if (homePageOrder) homePageOrder.value = data.home_page_order || '';

                // Main Image
                if (data.main_image) {
                    const mainImageContainer = document.getElementById("main_image")
                        .parentElement;
                    if (mainImageContainer) {
                        const existingPreview = mainImageContainer.querySelector('img');
                        if (existingPreview) existingPreview.remove();

                        const mainImagePreview = document.createElement('img');
                        mainImagePreview.src = data.main_image;
                        mainImagePreview.style.width = '100px';
                        mainImagePreview.style.marginTop = '10px';
                        mainImageContainer.appendChild(mainImagePreview);
                    }
                }

                // Banner Image
                if (data.banner_image) {
                    const bannerImageContainer = document.getElementById("bennerimage")
                        .parentElement;
                    if (bannerImageContainer) {
                        const existingPreview = bannerImageContainer.querySelector('img');
                        if (existingPreview) existingPreview.remove();

                        const bannerImagePreview = document.createElement('img');
                        bannerImagePreview.src = data.banner_image;
                        bannerImagePreview.style.width = '100px';
                        bannerImagePreview.style.marginTop = '10px';
                        bannerImageContainer.appendChild(bannerImagePreview);
                    }
                }

                // Services
                try {
                    if (data.service) {
                        const selectedServices = JSON.parse(data.service);

                        // Reset all checkboxes
                        document.querySelectorAll('.options-container input[type="checkbox"]')
                            .forEach(checkbox => {
                                checkbox.checked = false;
                            });

                        // Check the boxes for selected services
                        selectedServices.forEach(service => {
                            const checkbox = document.querySelector(
                                `.options-container input[type="checkbox"][value="${service.id}"]`
                            );
                            if (checkbox) {
                                checkbox.checked = true;
                            }
                        });

                        // Update the selected services display and hidden input
                        updateSelected();
                    }
                } catch (e) {
                    console.error('Error parsing services:', e);
                }

                // Technologies
                try {
                    if (data.technologies) {
                        const selectedTechnologies = JSON.parse(data.technologies);

                        // Reset all checkboxes
                        document.querySelectorAll('.tech-options input[type="checkbox"]')
                            .forEach(checkbox => {
                                checkbox.checked = false;
                            });

                        // Check the boxes for selected technologies
                        if (Array.isArray(selectedTechnologies)) {
                            selectedTechnologies.forEach(tech => {
                                if (tech && tech.id) {
                                    const checkbox = document.querySelector(
                                        `.tech-options input[type="checkbox"][value="${tech.id}"]`
                                    );
                                    if (checkbox) {
                                        checkbox.checked = true;
                                    }
                                }
                            });
                        }

                        // Update the selected technologies display and hidden input
                        const selectedTechInput = document.getElementById(
                            'selected-technologies');
                        if (selectedTechInput) {
                            const techIds = Array.isArray(selectedTechnologies) ?
                                selectedTechnologies.map(tech => tech.id).filter(id => id) : [];
                            selectedTechInput.value = JSON.stringify(techIds);
                        }
                        updateSelectedTech();
                    } else {
                        // If no technologies, set empty array
                        const selectedTechInput = document.getElementById(
                            'selected-technologies');
                        if (selectedTechInput) {
                            selectedTechInput.value = '[]';
                        }
                    }
                } catch (e) {
                    console.error('Error parsing technologies:', e);
                    // Set empty array on error
                    const selectedTechInput = document.getElementById('selected-technologies');
                    if (selectedTechInput) {
                        selectedTechInput.value = '[]';
                    }
                }

                //     // Additional Images
                //     const additionalImagesContainer = document.getElementById(
                //         "additional-images-container");
                //     if (additionalImagesContainer && data.additional_images) {
                //         try {
                //             const additionalImages = JSON.parse(data.additional_images);

                //             // Clear existing content
                //             additionalImagesContainer.innerHTML = '';

                //             // Add each image with remove button
                //             additionalImages.forEach(item => {
                //                 additionalImagesContainer.innerHTML += `
                //     <div class="additional-image-fields">
                //         <div class="tech-input-group">
                //            <img src="${assetBaseUrl}${item}" alt="Additional Image" style="width:100px;height:100px;margin-left:5px;">
                //            <button type="button" class="btn-remove" onclick="deleteimage('${item}')">
                //            <i class="fa-light fa-trash"></i>
                //            </button>
                //          </div>
                //     </div>
                // `;
                //             });

                //             // Add file input for new images
                //             additionalImagesContainer.innerHTML += `
                //             <div class="additional-image-fields">
                //                 <div class="tech-input-group">
                //                     <input type="file" name="additional_images[]" class="form-control" accept="image/*" multiple>
                //                 </div>
                //             </div>
                //         `;

                //             // Add hidden input for existing images
                //             additionalImagesContainer.innerHTML += `
                //             <input type="hidden" name="existing_images" value='${JSON.stringify(additionalImages)}'>
                //         `;
                //         } catch (e) {
                //             console.error('Error parsing additional images:', e);
                //             // Add empty file input if there's an error
                //             additionalImagesContainer.innerHTML = `
                //             <div class="additional-image-fields">
                //                 <div class="tech-input-group">
                //                     <input type="file" name="additional_images[]" class="form-control" accept="image/*" multiple>
                //                 </div>
                //             </div>
                //         `;
                //         }
                //     } else {
                //         // If no additional images, add empty file input
                //         additionalImagesContainer.innerHTML = `
                //         <div class="additional-image-fields">
                //             <div class="tech-input-group">
                //                 <input type="file" name="additional_images[]" class="form-control" accept="image/*" multiple>
                //             </div>
                //         </div>
                //     `;
                //     }

                // Update form action and method
                if (data.id) {
                    form.setAttribute("action", `{{ route('portfolio.update', ':slug') }}`
                        .replace(':slug', data.id));
                }
                const formMethod = document.getElementById("formMethod");
                if (formMethod) formMethod.value = "PUT";
                const submitButton = form.querySelector(".btn-submit");
                if (submitButton) submitButton.textContent = "Update";
            });
        });
        const closeAddModal = document.getElementById("closeaddmodal");
        closeAddModal.onclick = () => {
            if (addModal) {
                addModal.style.display = "none";
                document.getElementById("serviceForm").reset();
            }
        };
        const cancelAdd = document.getElementById("canceladd");
        if (closeAddModal && cancelAdd) {
            closeAddModal.onclick = cancelAdd.onclick = () => {
                if (form) {
                    form.reset();
                    form.setAttribute("action", "{{ route('portfolio.store') }}");
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

                // Remove image previews
                document.querySelectorAll('.form-group img').forEach(img => img.remove());

                // Reset services selection
                document.querySelectorAll('.options-container input[type="checkbox"]').forEach(checkbox => {
                    checkbox.checked = false;
                });
                updateSelected();

                // Reset technologies selection
                document.querySelectorAll('.tech-options input[type="checkbox"]').forEach(checkbox => {
                    checkbox.checked = false;
                });
                updateSelectedTech();
            };
        }

        document.querySelectorAll(".action-btn.view").forEach(button => {
            button.addEventListener("click", function() {
                // Universal Settings
                const viewMainImage = document.getElementById("viewMainImage");
                const viewBannerImage = document.getElementById("viewBannerImage");
                const viewHomePageOrder = document.getElementById("viewHomePageOrder");
                
                if (viewMainImage) viewMainImage.src = this.dataset.main_image || '#';
                if (viewBannerImage) viewBannerImage.src = this.dataset.banner_image || '#';
                if (viewHomePageOrder) viewHomePageOrder.textContent = this.dataset.home_page_order || 'Not set';

                // Dutch
                const viewMainTitle = document.getElementById("viewMainTitle");
                const viewMainDescription = document.getElementById("viewMainDescription");
                const viewMetaTitle = document.getElementById("viewMetaTitle");
                const viewMetaDescription = document.getElementById("viewMetaDescription");
                const viewMetaKeywords = document.getElementById("viewMetaKeywords");
                
                if (viewMainTitle) viewMainTitle.textContent = this.dataset.main_title || '-';
                if (viewMainDescription) viewMainDescription.textContent = this.dataset.main_description || '-';
                if (viewMetaTitle) viewMetaTitle.textContent = this.dataset.meta_title || '-';
                if (viewMetaDescription) viewMetaDescription.textContent = this.dataset.meta_description || '-';
                if (viewMetaKeywords) viewMetaKeywords.textContent = this.dataset.meta_keywords || '-';

                // English
                const viewMainTitleEn = document.getElementById("viewMainTitleEn");
                const viewMainDescriptionEn = document.getElementById("viewMainDescriptionEn");
                const viewMetaTitleEn = document.getElementById("viewMetaTitleEn");
                const viewMetaDescriptionEn = document.getElementById("viewMetaDescriptionEn");
                const viewMetaKeywordsEn = document.getElementById("viewMetaKeywordsEn");
                
                if (viewMainTitleEn) viewMainTitleEn.textContent = this.dataset.main_title_en || '-';
                if (viewMainDescriptionEn) viewMainDescriptionEn.textContent = this.dataset.main_description_en || '-';
                if (viewMetaTitleEn) viewMetaTitleEn.textContent = this.dataset.meta_title_en || '-';
                if (viewMetaDescriptionEn) viewMetaDescriptionEn.textContent = this.dataset.meta_description_en || '-';
                if (viewMetaKeywordsEn) viewMetaKeywordsEn.textContent = this.dataset.meta_keywords_en || '-';

                // French
                const viewMainTitleFr = document.getElementById("viewMainTitleFr");
                const viewMainDescriptionFr = document.getElementById("viewMainDescriptionFr");
                const viewMetaTitleFr = document.getElementById("viewMetaTitleFr");
                const viewMetaDescriptionFr = document.getElementById("viewMetaDescriptionFr");
                const viewMetaKeywordsFr = document.getElementById("viewMetaKeywordsFr");
                
                if (viewMainTitleFr) viewMainTitleFr.textContent = this.dataset.main_title_fr || '-';
                if (viewMainDescriptionFr) viewMainDescriptionFr.textContent = this.dataset.main_description_fr || '-';
                if (viewMetaTitleFr) viewMetaTitleFr.textContent = this.dataset.meta_title_fr || '-';
                if (viewMetaDescriptionFr) viewMetaDescriptionFr.textContent = this.dataset.meta_description_fr || '-';
                if (viewMetaKeywordsFr) viewMetaKeywordsFr.textContent = this.dataset.meta_keywords_fr || '-';

                // German
                const viewMainTitleDe = document.getElementById("viewMainTitleDe");
                const viewMainDescriptionDe = document.getElementById("viewMainDescriptionDe");
                const viewMetaTitleDe = document.getElementById("viewMetaTitleDe");
                const viewMetaDescriptionDe = document.getElementById("viewMetaDescriptionDe");
                const viewMetaKeywordsDe = document.getElementById("viewMetaKeywordsDe");
                
                if (viewMainTitleDe) viewMainTitleDe.textContent = this.dataset.main_title_de || '-';
                if (viewMainDescriptionDe) viewMainDescriptionDe.textContent = this.dataset.main_description_de || '-';
                if (viewMetaTitleDe) viewMetaTitleDe.textContent = this.dataset.meta_title_de || '-';
                if (viewMetaDescriptionDe) viewMetaDescriptionDe.textContent = this.dataset.meta_description_de || '-';
                if (viewMetaKeywordsDe) viewMetaKeywordsDe.textContent = this.dataset.meta_keywords_de || '-';
                const additionalImagesContainer = document.getElementById(
                    "viewAdditionalImages");

                if (additionalImagesContainer) {
                    additionalImagesContainer.innerHTML = '';
                    try {
                        const additionalImages = JSON.parse(this.dataset.additional_images ||
                            '[]');

                        if (additionalImages && additionalImages.length > 0) {
                            additionalImages.forEach(item => {
                                additionalImagesContainer.innerHTML += `
                                    <div class="additional-image-fields">
                                        <div class="tech-input-group">
                                            <img src="${assetBaseUrl}${item}" alt="Additional Image" style="width:100px;height:100px;margin-left:5px;">
                                        </div>
                                    </div>`;
                            });
                        } else {
                            additionalImagesContainer.innerHTML =
                                '<p class="text-muted">No additional images</p>';
                        }
                    } catch (e) {
                        console.error('Error parsing additional images:', e);
                        additionalImagesContainer.innerHTML =
                            '<p class="text-muted">Error loading images</p>';
                    }
                }

                // Services
                const serviceContainer = document.getElementById("viewService");
                if (serviceContainer) {
                    serviceContainer.innerHTML = '';
                    try {
                        const services = JSON.parse(this.dataset.service || '[]');
                        if (services && services.length > 0) {
                            services.forEach(service => {
                                serviceContainer.innerHTML += `<span class="badge">${service.name}</span>`;
                            });
                        } else {
                            serviceContainer.innerHTML = '<span style="color: #999;">No services selected</span>';
                        }
                    } catch (e) {
                        console.error('Error parsing services:', e);
                        serviceContainer.innerHTML = '<span style="color: #999;">Error loading services</span>';
                    }
                }

                // Technologies
                const techContainer = document.getElementById("viewTechnologiesList");
                if (techContainer) {
                    techContainer.innerHTML = '';
                    try {
                        const technologies = JSON.parse(this.dataset.technologies || '[]');
                        if (Array.isArray(technologies) && technologies.length > 0) {
                            technologies.forEach(tech => {
                                if (tech && tech.name) {
                                    techContainer.innerHTML += `<span class="badge">${tech.name}</span>`;
                                }
                            });
                        } else {
                            techContainer.innerHTML = '<span style="color: #999;">No technologies selected</span>';
                        }
                    } catch (e) {
                        console.error('Error parsing technologies:', e);
                        techContainer.innerHTML = '<span style="color: #999;">Error loading technologies</span>';
                    }
                }

                const viewModal = document.getElementById("viewModal");
                if (viewModal) {
                    viewModal.style.display = "flex";
                }
            });
        });

        const closeViewModal = document.getElementById("closeViewModal");
        if (closeViewModal) {
            closeViewModal.onclick = () => {
                const viewModal = document.getElementById("viewModal");
                if (viewModal) {
                    viewModal.style.display = "none";
                }
            };
        }

        const addTechnologyBtn = document.getElementById('addTechnologyBtn');
        if (addTechnologyBtn) {
            addTechnologyBtn.addEventListener('click', function() {
                const section = document.getElementById('technology-section');
                if (section) {
                    const newTech = document.createElement('div');
                    newTech.classList.add('technology-item');
                    newTech.innerHTML = `
                        <input type="text" name="technology[${window.techIndex}][title]" placeholder="Technology Title" required>
                        <input type="file" name="technology[${window.techIndex}][image]" accept="image/*" required>
                    `;
                    section.appendChild(newTech);
                    window.techIndex++;
                }
            });
        }
    });

    function addField() {
        window.fieldCounter++;
        const container = document.getElementById('technology-container');
        if (container) {
            const newField = document.createElement('div');
            newField.classList.add('technology-fields');
            newField.id = `technology-${window.fieldCounter}`;

            newField.innerHTML = `
                <div class="tech-input-group">
                    <input type="text" name="technologies[${window.fieldCounter - 1}][title]" placeholder="Enter technology title" class="technology-title">
                    <input type="file" name="technologies[${window.fieldCounter - 1}][image]" class="technology-image" accept="image/*">
                    <button type="button" class="btn-remove" onclick="removeField('technology-${window.fieldCounter}')">
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

    function toggleOptions(e) {
        const container = e.currentTarget.nextElementSibling;
        if (container && !e.target.classList.contains('remove-tag')) {
            container.style.display = container.style.display === 'block' ? 'none' : 'block';
        }
    }

    function updateSelected() {
        const selectBox = document.querySelector('.select-box:not([onclick*="toggleTechOptions"])');
        const selectedDiv = selectBox.querySelector('.selected');
        const placeholder = selectBox.querySelector('.placeholder');
        const checkboxes = selectBox.nextElementSibling.querySelectorAll('input[type="checkbox"]:checked');
        const selectedServices = [];

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
                selectedServices.push(parseInt(checkbox.value));
            });

            const selectedServicesInput = document.getElementById('selected-services');
            if (selectedServicesInput) {
                selectedServicesInput.value = JSON.stringify(selectedServices);
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

    function addAdditionalImage() {
        window.additionalImageCounter++;
        const container = document.getElementById('additional-images-container');
        if (container) {
            const newField = document.createElement('div');
            newField.classList.add('additional-image-fields');
            newField.id = `additional-image-${window.additionalImageCounter}`;

            newField.innerHTML = `
                <div class="tech-input-group">
                    <input type="file" name="additional_images[]" class="form-control" accept="image/*">
                    <button type="button" class="btn-remove" onclick="removeAdditionalImage('additional-image-${window.additionalImageCounter}')">
                        <i class="fa-light fa-trash"></i>
                    </button>
                </div>
                <div class="image-preview"></div>
            `;
            container.appendChild(newField);
        }
    }

    function removeAdditionalImage(fieldId) {
        const field = document.getElementById(fieldId);
        if (field) field.remove();
    }

    function removeOldImage(key) {
        const element = document.getElementById('old-image-' + key);
        if (element) {
            element.remove();
        }
    }

    function deleteimage(imagePath) {
        if (confirm('Are you sure you want to delete this image?')) {
            // Make AJAX call to delete the image using fetch
            fetch("{{ route('portfolio.deleteImage') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        image_path: imagePath
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Find and remove only the specific image container
                        const imageContainers = document.querySelectorAll('.additional-image-fields');
                        imageContainers.forEach(container => {
                            const img = container.querySelector('img');
                            if (img && img.src.includes(imagePath)) {
                                container.remove();
                            }
                        });

                        // Update the hidden input with remaining images
                        const additionalImagesContainer = document.getElementById("additional-images-container");
                        const existingImagesInput = additionalImagesContainer.querySelector(
                            'input[name="existing_images"]');
                        if (existingImagesInput && data.remaining_images) {
                            existingImagesInput.value = JSON.stringify(data.remaining_images);
                        }
                    } else {
                        console.error('Error deleting image:', data.message);
                        alert('Error deleting image: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error deleting image. Please try again.');
                });
        }
    }

    // Add form submit handler to ensure proper data formatting
    document.getElementById('serviceForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        const servicesInput = document.getElementById('selected-services');
        const technologiesInput = document.getElementById('selected-technologies');

        // Handle services
        if (servicesInput) {
            let servicesValue = servicesInput.value;
            if (!servicesValue) {
                servicesValue = '[]';
            } else if (!servicesValue.startsWith('[')) {
                servicesValue = JSON.stringify([parseInt(servicesValue)]);
            }
            servicesInput.value = servicesValue;
        }

        // Handle technologies
        if (technologiesInput) {
            let techValue = technologiesInput.value;
            if (!techValue) {
                techValue = '[]';
            } else if (!techValue.startsWith('[')) {
                techValue = JSON.stringify([parseInt(techValue)]);
            }
            technologiesInput.value = techValue;
        }

        // Handle additional images
        const additionalImagesContainer = document.getElementById('additional-images-container');
        if (additionalImagesContainer) {
            const fileInputs = additionalImagesContainer.querySelectorAll('input[type="file"]');
            const existingImagesInput = additionalImagesContainer.querySelector(
                'input[name="existing_images"]');

            // If there are no file inputs with files, remove them
            let hasFiles = false;
            fileInputs.forEach(input => {
                if (input.files.length > 0) {
                    hasFiles = true;
                }
            });

            if (!hasFiles) {
                fileInputs.forEach(input => {
                    input.remove();
                });
            }

            // If there are no existing images, remove the hidden input
            if (existingImagesInput && (!existingImagesInput.value || existingImagesInput.value === '[]')) {
                existingImagesInput.remove();
            }
        }

        // Log form data for debugging
        const formData = new FormData(this);
        console.log('Form Data:');
        for (let pair of formData.entries()) {
            console.log(pair[0] + ': ' + pair[1]);
        }

        // Submit the form
        this.submit();
    });

    function toggleTechOptions(e) {
        e.stopPropagation();
        const container = e.currentTarget.nextElementSibling;
        if (container) {
            container.style.display = container.style.display === 'block' ? 'none' : 'block';
        }
    }

    function updateSelectedTech() {
        const selectBox = document.querySelector('.select-box[onclick*="toggleTechOptions"]');
        const selectedDiv = selectBox.querySelector('.selected-tech');
        const placeholder = selectBox.querySelector('.placeholder');
        const checkboxes = selectBox.nextElementSibling.querySelectorAll('input[type="checkbox"]:checked');
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
                               <span class="remove-tag" onclick="removeTechTag('${checkbox.id}')">&times;</span>`;
                selectedDiv.appendChild(tag);
                selectedTechnologies.push(parseInt(checkbox.value));
            });

            const selectedTechInput = document.getElementById('selected-technologies');
            if (selectedTechInput) {
                selectedTechInput.value = JSON.stringify(selectedTechnologies);
            }
        }
    }

    function removeTechTag(id) {
        const checkbox = document.getElementById(id);
        if (checkbox) {
            checkbox.checked = false;
            updateSelectedTech();
        }
    }

    // Add click event listener for closing dropdowns
    document.addEventListener('click', function(e) {
        const serviceSelectBox = document.querySelector('.select-box:not([onclick*="toggleTechOptions"])');
        const serviceOptions = serviceSelectBox?.nextElementSibling;
        const techSelectBox = document.querySelector('.select-box[onclick*="toggleTechOptions"]');
        const techOptions = techSelectBox?.nextElementSibling;

        if (serviceOptions && serviceSelectBox) {
            if (!serviceSelectBox.contains(e.target) && !serviceOptions.contains(e.target)) {
                serviceOptions.style.display = 'none';
            }
        }

        if (techOptions && techSelectBox) {
            if (!techSelectBox.contains(e.target) && !techOptions.contains(e.target)) {
                techOptions.style.display = 'none';
            }
        }
    });

    // Language tab switching function for edit modal
    function switchPortfolioTab(event, tabId) {
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

    // Language tab switching function for view modal
    function switchViewTab(event, tabId) {
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