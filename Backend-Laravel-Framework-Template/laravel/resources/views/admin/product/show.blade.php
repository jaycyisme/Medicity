<x-app-layout>
    <x-slot name="pageHeader">
        Product Management
    </x-slot>

    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <a class="btn btn-lg btn-info" href="{{ route('product.index') }}">
                    Back
                </a>
            </div>
            <div class="card-body">
                <div class="mb-5">
                    <x-label for="name" value="Product Name" />
                    <input class="form-control" type="text" class="mb-3" value="{{ $product->name }}" disabled />

                    <div class="mb-3">
                        <x-label for="category_id" value="Category Name" />
                        <input class="form-control" type="text" value="{{ $product->category->name }}" disabled />
                    </div>

                    <div class="mb-3">
                        <x-label for="brand_id" value="Brand Name" />
                        <input class="form-control" type="text" value="{{ $product->brand->name }}" disabled />
                    </div>

                    <div class="mb-3">
                        <x-label for="speciality_id" value="Speciality Name" />
                        <input class="form-control" type="text" value="{{ $product->speciality->name }}" disabled />
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <x-label class="form-label d-flex align-items-center"
                                value="Base Price" />
                            <div class="input-group mb-0">
                                <input type="text" value="{{ $product->base_price }}"
                                    class="form-control" name="base_price" disabled >
                            </div>
                        </div>
                    </div>

                    <div class="image-file mb-3">
                        <x-label class="form-label d-flex align-items-center" value="Thumbnail" />
                        <div class="image-preview mt-3">
                            <img src="{{ asset('storage/Product/' . $product->thumbnail) }}" alt="{{ $product->name }}"
                                id="thumbnailPreview" class="img-fluid rounded shadow-sm d-block" style="width: 30%;" />
                        </div>
                    </div>

                    <div class="mb-3">
                        <x-label class="col-sm-3 col-form-label form-label-title" value="Description" />
                        <textarea class="form-control" name="description" placeholder="{{ $product->description }}" readonly style="height: 200px;"></textarea>
                    </div>

                    <div class="mb-3">
                        <x-label class="col-sm-3 col-form-label form-label-title" value="Ingredient" />
                        <textarea class="form-control" name="ingredient" placeholder="{{ $product->ingredient }}" readonly style="height: 200px;"></textarea>
                    </div>

                    <div class="mb-3">
                        <x-label class="col-sm-3 col-form-label form-label-title" value="Indication" />
                        <textarea class="form-control" name="indication" placeholder="{{ $product->indication }}" readonly style="height: 200px;"></textarea>
                    </div>

                    <div class="mb-3">
                        <x-label class="col-sm-3 col-form-label form-label-title" value="Precaution" />
                        <textarea class="form-control" name="precaution" placeholder="{{ $product->precaution }}" readonly style="height: 200px;"></textarea>
                    </div>

                    <div class="mb-3">
                        <x-label class="col-sm-3 col-form-label form-label-title" value="Usage Instruction" />
                        <textarea class="form-control" name="usage_instruction" placeholder="{{ $product->usage_instruction }}" readonly style="height: 200px;"></textarea>
                    </div>

                    <div class="mb-3">
                        <x-label class="col-sm-3 col-form-label form-label-title" value="Manufacturing Info" />
                        <textarea class="form-control" name="manufacturing_info" placeholder="{{ $product->manufacturing_info }}" readonly style="height: 200px;"></textarea>
                    </div>


                    <div class="mb-3">
                        <x-label class="form-label d-flex align-items-center" value="Product Images" />
                        <div class="image-preview mt-3 d-flex flex-wrap gap-3">
                            @foreach ($product->images as $image)
                                <img src="{{ asset('storage/Product/' . $image->image_url) }}" alt="{{ $product->name }}"
                                    id="uploadedImagePreviews" class="img-fluid rounded shadow-sm d-block" style="width: 10%;"/>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox"
                            value="" id="prescription" {{ $product->is_prescription ? 'checked' : '' }} disabled >
                        <x-label class="form-check-label" for="prescription"
                        value="Prescription" />
                    </div>
                </div>

                <div id="variants-container">
                    @foreach ($product->variants as $variantIndex => $variant)
                        <div class="variant-card mb-3">
                            <div class="card" style="width: 90%;margin: auto;">
                                <div class="card-header d-flex align-items-center justify-content-between py-3">
                                    <h5>Variants</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <x-label class="form-label d-flex align-items-center" value="Packaging Type" />
                                                <input value="{{ $variant->packagingType->name ?? null }}" type="text" class="form-control"
                                                        id="example-data-list" list="packagingType-lists" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <x-label class="form-label d-flex align-items-center" value="Size" />
                                                <input value="{{ $variant->size->name ?? null }}" type="text" class="form-control"
                                                        id="example-data-list" list="size-lists" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <x-label class="form-label d-flex align-items-center" value="Color" />
                                                <input value="{{ $variant->color->name ?? null }}" type="text" class="form-control"
                                                        id="example-data-list" list="color-lists" disabled>
                                            </div>
                                        </div>

                                        <div class="image-file mb-3">
                                            <x-label class="form-label d-flex align-items-center" value="Variant Image {{ $variantIndex + 1 }}" />
                                            <div class="image-preview mt-3">
                                                <img src="{{ asset('storage/Product/' . $variant->image_url) }}" alt="{{ $product->name }}"
                                                    id="variantImagePreview_{{ $variantIndex }}" class="img-fluid rounded shadow-sm d-block" style="width: 20%" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <x-label class="form-label d-flex align-items-center"
                                                        value="Price" />
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">VND</span>
                                                        <input value="{{ $variant->price }}" type="text" id="price"
                                                            class="form-control" placeholder="Price"
                                                            disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <x-label class="form-label d-flex align-items-center"
                                                        value="Price on sale" />
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">VND</span>
                                                        <input  value="{{ $variant->sale_price }}" type="text"
                                                            id="sale_price"
                                                            class="form-control" placeholder="Price on sale" disabled >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        value="" id="sale" {{ $variant->is_sale ? 'checked' : '' }} disabled >
                                                    <x-label class="form-check-label" for="sale"
                                                    value="Sale" />
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <x-label class="form-label d-flex align-items-center"
                                                            value="Quantity" />
                                                        <div class="input-group mb-0">
                                                            <input value="{{ $variant->quantity }}" type="text"
                                                                class="form-control" name="quantity"
                                                                placeholder="Quantity"
                                                                disabled>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <x-label class="form-label d-flex align-items-center"
                                                            value="Sale Start Time" />
                                                        <div class="input-group mb-0">
                                                            <input value="{{ $variant->sale_start_time }}" type="text"
                                                                class="form-control" name="quantity"
                                                                disabled>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <x-label class="form-label d-flex align-items-center"
                                                            value="Sale End Time" />
                                                        <div class="input-group mb-0">
                                                            <input value="{{ $variant->sale_end_time }}" type="text"
                                                                class="form-control" name="quantity"
                                                                disabled>
                                                        </div>
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
            </div>
        </div>
    </div>
</x-app-layout>
