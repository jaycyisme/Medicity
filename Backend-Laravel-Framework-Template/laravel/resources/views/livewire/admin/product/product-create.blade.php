<div>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h5>Create Product</h5>
                <a class="btn btn-lg btn-info" href="{{ route('product.index') }}">
                    Back
                </a>
            </div>
            <div class="card-body">
                <form class="form" wire:submit.prevent="save">
                    @csrf
                    <div class="mb-5">
                        <x-label for="name" value="Product Name" />
                        <x-input wire:model='name' type="text" class="mb-3" placeholder="Product Name..."
                            required />
                        <x-input-error for="name" />

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <x-label for="category_id" value="Category" />
                                <select wire:model='category_id' class="form-select" id="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 col-md-6">
                                <x-label for="brand_id" value="Brand" />
                                <select wire:model='brand_id' class="form-select" id="brand_id">
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="mb-3 col-md-6">
                                <x-label for="speciality_id" value="Speciality" />
                                <select wire:model='speciality_id' class="form-select" id="speciality_id">
                                    @foreach ($specialities as $speciality)
                                        <option value="{{ $speciality->id }}">{{ $speciality->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <x-label class="form-label d-flex align-items-center"
                                    value="Base Price" />
                                <div class="input-group mb-0">
                                    <input wire:model='base_price'
                                        type="text"
                                        class="form-control" name="base_price"
                                        placeholder="Base Price"
                                        required>
                                    <x-input-error for="base_price" />
                                </div>
                            </div>
                        </div>

                        <div wire:ignore class="image-file mb-3">
                            <x-label class="form-label d-flex align-items-center" value="Thumbnail" />
                            <input
                                type="file"
                                id="thumbnail"
                                class="d-none"
                                accept="image/*">
                            <x-input-error for="thumbnail" />
                            <label class="btn btn-outline-secondary" for="thumbnail">
                                <i class="ti ti-upload me-2"></i> Click to Upload
                            </label>
                            <div class="image-preview mt-3">
                                <img id="thumbnailPreview" class="img-fluid rounded shadow-sm d-block category-image-preview"/>
                            </div>

                            <input wire:model='thumbnail' type="hidden" name="thumbnail" id="thumbnail_url" />
                        </div>

                        <div class="mb-3">
                            <x-label class="col-sm-3 col-form-label form-label-title" value="Product Description" />
                            <textarea wire:model="description"
                                class="form-control"
                                name="description"
                                placeholder="Product Description..." style="height: 200px;">
                            </textarea>
                        </div>

                        <div class="mb-3">
                            <x-label class="col-sm-3 col-form-label form-label-title" value="Ingredient" />
                            <textarea wire:model="ingredient"
                                class="form-control"
                                name="ingredient"
                                placeholder="Ingredient..." style="height: 200px;"></textarea>
                        </div>

                        <div class="mb-3">
                            <x-label class="col-sm-3 col-form-label form-label-title" value="Indication" />
                            <textarea wire:model="indication"
                                class="form-control"
                                name="indication"
                                placeholder="Indication..." style="height: 200px;"></textarea>
                        </div>

                        <div class="mb-3">
                            <x-label class="col-sm-3 col-form-label form-label-title" value="Precaution" />
                            <textarea wire:model="precaution"
                                class="form-control"
                                name="precaution"
                                placeholder="Precaution..." style="height: 200px;"></textarea>
                        </div>

                        <div class="mb-3">
                            <x-label class="col-sm-3 col-form-label form-label-title" value="Usage Instruction" />
                            <textarea wire:model="usage_instruction"
                                class="form-control"
                                name="usage_instruction"
                                placeholder="Usage Instruction..." style="height: 200px;"></textarea>
                        </div>

                        <div class="mb-3">
                            <x-label class="col-sm-3 col-form-label form-label-title" value="Manufacturing Info" />
                            <textarea wire:model="manufacturing_info"
                                class="form-control"
                                name="manufacturing_info"
                                placeholder="Manufacturing Info..." style="height: 200px;"></textarea>
                        </div>

                        <div class="form-check mb-3">
                            <input wire:model="is_prescription"
                                class="form-check-input" type="checkbox"
                                value="" id="is_prescription">
                            <x-label class="form-check-label" for="is_prescription"
                                value="Prescription" />
                        </div>


                        <div wire:ignore class="mb-3">
                            <x-label class="form-label d-flex align-items-center" value="Hình ảnh sản phẩm" />
                            <label class="btn btn-outline-secondary" id="uppyModalOpener"><i class="ti ti-upload me-2"></i> Click để tải ảnh</label>
                            <div id="uppyArea"></div>
                            <x-input-error for="images" />

                            {{-- Khu vực hiển thị ảnh đã tải lên --}}
                            <div id="uploadedImagePreviews" class="mt-3 d-flex flex-wrap">

                            </div>

                            {{-- Hidden input để lưu URL ảnh --}}
                            <input type="hidden" id="uploadedImages" wire:model="images">
                        </div>
                    </div>

                    <div id="variants-container">
                        @foreach ($variants as $variantIndex => $variant)
                            <div class="variant-card mb-3">
                                <div class="card" style="width: 90%;margin: auto;">
                                    <div class="card-header d-flex align-items-center justify-content-between py-3">
                                        <h5>Biến thể sản phẩm</h5>
                                        <div class="dropdown">
                                            <a class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none"
                                                href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false"><i
                                                    class="material-icons-two-tone f-18">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a wire:click.prevent='removeVariant({{ $variantIndex }})'
                                                class="dropdown-item">Xóa</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <x-label class="form-label d-flex align-items-center" value="Packaging Type" />
                                                    <input wire:model='variants.{{ $variantIndex }}.packaging_type'
                                                            wire:change='updatePackagingType({{ $variantIndex }}, $event.target.value)'
                                                            type="text" class="form-control"
                                                            id="example-data-list" list="packaging-type-lists">
                                                    <datalist id="packaging-type-lists">
                                                        @foreach ($packaging_types as $packaging_type)
                                                            <option value="{{ $packaging_type->name }}"> </option>
                                                        @endforeach
                                                    </datalist>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <x-label class="form-label d-flex align-items-center" value="Size" />
                                                    <input wire:model='variants.{{ $variantIndex }}.size'
                                                            wire:change='updateSize({{ $variantIndex }}, $event.target.value)'
                                                            type="text" class="form-control"
                                                            id="example-data-list" list="size-lists">
                                                    <datalist id="size-lists">
                                                        @foreach ($sizes as $size)
                                                            <option value="{{ $size->name }}"> </option>
                                                        @endforeach
                                                    </datalist>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <x-label class="form-label d-flex align-items-center" value="Color" />
                                                    <input wire:model='variants.{{ $variantIndex }}.color'
                                                            wire:change='updateColor({{ $variantIndex }}, $event.target.value)'
                                                            type="text" class="form-control"
                                                            id="example-data-list" list="color-lists">
                                                    <datalist id="color-lists">
                                                        @foreach ($colors as $color)
                                                            <option value="{{ $color->name }}"> </option>
                                                        @endforeach
                                                    </datalist>
                                                </div>
                                            </div>

                                            <div wire:ignore class="image-file mb-3">
                                                <x-label class="form-label d-flex align-items-center" value="Hình ảnh biến thể {{ $variantIndex + 1 }}" />
                                                <input
                                                    type="file"
                                                    id="variant_image_{{ $variantIndex }}"
                                                    class="variant-image-upload d-none"
                                                    accept="image/*">
                                                <x-input-error for="variant_image_{{ $variantIndex }}" />
                                                <label class="btn btn-outline-secondary" for="variant_image_{{ $variantIndex }}">
                                                    <i class="ti ti-upload me-2"></i> Click to Upload
                                                </label>
                                                <div class="image-preview mt-3">
                                                    <img id="variantImagePreview_{{ $variantIndex }}" class="img-fluid rounded shadow-sm d-block category-image-preview" />
                                                </div>

                                                <input wire:model="variants.{{ $variantIndex }}.image_url" type="hidden" id="variant_image_url_{{ $variantIndex }}" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <x-label class="form-label d-flex align-items-center"
                                                        value="Price" />
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">VND</span>
                                                        <input type="text"
                                                            wire:model="variants.{{ $variantIndex }}.price"
                                                            class="form-control" placeholder="Price"
                                                            required>
                                                            <x-input-error for="variants.{{ $variantIndex }}.price" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <x-label class="form-label d-flex align-items-center"
                                                        value="Price on sale" />
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">%</span>
                                                        <input type="text"
                                                            wire:model="variants.{{ $variantIndex }}.percent"
                                                            wire:change='updateSalePrice({{$variantIndex}}, $event.target.value)'
                                                            class="form-control" placeholder="% sale">
                                                        <span class="input-group-text">VND</span>
                                                        <input type="text"
                                                            wire:model="variants.{{ $variantIndex }}.sale_price"
                                                            class="form-control" placeholder="Price on sale"
                                                            >
                                                            <x-input-error for="variants.{{ $variantIndex }}.sale_price" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        wire:model="variants.{{ $variantIndex }}.is_sale"
                                                        value="" id="sale-{{ $variantIndex }}">
                                                    <x-label class="form-check-label" for="sale-{{ $variantIndex }}"
                                                        value="Sale" />
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <x-label class="form-label d-flex align-items-center"
                                                            value="Số lượng" />
                                                        <div class="input-group mb-0">
                                                            <input type="text"
                                                                wire:model="variants.{{ $variantIndex }}.quantity"
                                                                class="form-control" name="quantity"
                                                                placeholder="Số lượng"
                                                                required>
                                                                <x-input-error for="variants.{{ $variantIndex }}.quantity" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <x-label class="form-label d-flex align-items-center"
                                                            value="Sale Start Time" />
                                                        <div class="input-group mb-0">
                                                            <input type="datetime-local"
                                                                wire:model="variants.{{ $variantIndex }}.sale_start_time"
                                                                class="form-control" name="sale_start_time"
                                                                placeholder="Sale Start Time"
                                                                >
                                                                <x-input-error for="variants.{{ $variantIndex }}.sale_start_time" />
                                                        </div>
                                                    </div><div class="col-md-3">
                                                        <x-label class="form-label d-flex align-items-center"
                                                            value="Sale End Time" />
                                                        <div class="input-group mb-0">
                                                            <input type="datetime-local"
                                                                wire:model="variants.{{ $variantIndex }}.sale_end_time"
                                                                class="form-control" name="sale_end_time"
                                                                placeholder="Sale End Time"
                                                                >
                                                                <x-input-error for="variants.{{ $variantIndex }}.sale_end_time" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mb-3 text-center">
                        <button wire:click.prevent='addVariant' class="btn btn-primary mt-3">Add Variant</button>
                    </div>


                    <div class="mb-3">
                        <x-button class="btn-primary" id="submitBtn">Create Product</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
