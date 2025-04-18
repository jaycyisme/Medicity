<div>
    <div class="content">
        <div class="container mt-5">

            <div class="row" style="margin-top: 100px">
                <div class="col-lg-8">

                    <div class="row blog-grid-row">
                        @foreach ($blogs as $blog)
                            <div class="col-md-6 col-sm-12">

                                <!-- Blog Post -->
                                <div class="blog grid-blog">
                                    <div class="blog-image">
                                        <a href="{{ route('blog-detail', $blog->id) }}"><img class="img-fluid" src="{{ asset('storage/Blog/'.$blog->thumbnail) }}" alt="Post Image"></a>
                                        <span class="badge badge-cyan category-slug">{{ $blog->blogCategory->name }}</span>
                                    </div>
                                    <div class="blog-content">
                                        <ul class="entry-meta meta-item">
                                            <li>
                                                <div class="post-author">
                                                    <a href="doctor-profile.html"><img src="{{ asset('storage/Blog/'.$blog->author_image) }}" alt="Post Author"><span>Arthur Hetzel</span></a>
                                                </div>
                                            </li>
                                            <li><i class="isax isax-calendar-1 me-1"></i>{{ $blog->created_at }}</li>
                                        </ul>
                                        <h3 class="blog-title"><a href="{{ route('blog-detail', $blog->id) }}">{{ $blog->title }}</a></h3>
                                    </div>
                                </div>
                                <!-- /Blog Post -->

                            </div>
                        @endforeach
                    </div>

                    {{-- {!! $blogs->onEachSide(2)->links() !!} --}}

                </div>

                <!-- Blog Sidebar -->
                <div class="col-lg-4 sidebar-right">

                    <!-- Search -->
                    <div class="card search-widget">
                        <div class="card-body">
                            <div class="input-group">
                                <x-input type="text" id="search" name="search" wire:model.live="search" placeholder="Search..." />
                            </div>
                        </div>
                    </div>
                    <!-- /Search -->

                    <!-- Latest Posts -->
                    <div class="card post-widget">
                        <div class="card-body">
                            <h5 class="mb-3">Latest News</h5>
                            <ul class="latest-posts">
                                @foreach ($latestBlogs as $blog)
                                    <li>
                                        <div class="post-thumb">
                                            <a href="{{ route('blog-detail', $blog->id) }}">
                                                <img class="img-fluid" src="{{ asset('storage/Blog/'.$blog->thumbnail) }}" alt="blog-image">
                                            </a>
                                        </div>
                                        <div class="post-info">
                                            <p>{{ $blog->created_at }}</p>
                                            <h4>
                                                <a href="{{ route('blog-detail', $blog->id) }}">{{ $blog->title }}</a>
                                            </h4>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- /Latest Posts -->

                    <!-- Categories -->
                    <div class="card category-widget">
                        <div class="card-body">
                            <h5 class="mb-3">Categories</h5>
                            <ul class="categories">
                    
                                {{-- Nút All --}}
                                <li>
                                    <a href="#" wire:click.prevent="filterByCategory(null)">
                                        All <span>({{ \App\Models\Blog::count() }})</span>
                                    </a>
                                </li>
                    
                                {{-- Các danh mục --}}
                                @foreach ($blogCategories as $category)
                                    <li>
                                        <a href="#" wire:click.prevent="filterByCategory({{ $category->id }})" class="{{ $categoryFilter === $category->id ? 'active' : '' }}">
                                            {{ $category->name }} <span>({{ $category->blogs->count() }})</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- /Categories -->

                </div>
                <!-- /Blog Sidebar -->

            </div>
        </div>
    </div>
</div>
