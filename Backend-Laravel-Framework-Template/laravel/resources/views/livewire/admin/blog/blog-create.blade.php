<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between py-3">
            <h5>Create New Blog</h5>
            <a class="btn btn-lg btn-info" href="{{ route('blog.index') }}">
                Back
            </a>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="save">
                @csrf
                @if (session()->has('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Notice!</strong> {{ session('status') }}.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="mb-5">
                    <x-label for="title" value="Title" />
                    <x-input wire:model='title' type="text" class="mb-3" id="title" placeholder="Title..." required />
                    <x-input-error for="title" />

                    <div wire:ignore class="image-file mt-3 mb-3">
                        <x-label class="form-label d-flex align-items-center" value="Image" />
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
                        <x-label for="blogcategory" value="Blog Category" />
                        <select wire:model="blog_category_id" class="form-select" id="blogcategory">
                            @foreach ($blogcategories as $blogcategory)
                                <option value="{{ $blogcategory->id }}">{{ $blogcategory->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div wire:ignore class="row">
                        <div class="col-sm-12">
                          <div class="card">
                            <div class="card-header">
                              <h5>Content</h5>
                            </div>
                            <div class="card-body">
                                <textarea wire:model="content" id="blog-content-editor" name="blog-content" cols="50" rows="4"></textarea>
                            </div>
                          </div>
                        </div>
                    </div>

                    <x-label for="author_name" value="Author Name" />
                    <x-input wire:model='author_name' type="text" class="mb-3" id="author_name" placeholder="Doctor Name..." required />
                    <x-input-error for="author_name" />

                    <div wire:ignore class="image-file mt-3 mb-3">
                        <x-label class="form-label d-flex align-items-center" value="Doctor Image" />
                        <input
                            type="file"
                            id="author_image"
                            class="d-none"
                            accept="image/*">
                        <x-input-error for="author_image" />
                        <label class="btn btn-outline-secondary" for="author_image">
                            <i class="ti ti-upload me-2"></i> Click to Upload
                        </label>
                        <div class="image-preview mt-3">
                            <img id="authorImagePreview" class="img-fluid rounded shadow-sm d-block category-image-preview"/>
                        </div>

                        <input wire:model='author_image' type="hidden" name="author_image" id="author_image_url" />
                    </div>

                    <x-label for="author_overview" value="Author Overview" />
                    <x-input wire:model='author_overview' type="text" class="mb-3" id="author_overview" placeholder="Author Overview..." required />
                    <x-input-error for="author_overview" />
                </div>

                <div class="mb-3">
                    <x-button class="btn-primary">Create Blog</x-button>
                </div>
            </form>
        </div>
    </div>
</div>
