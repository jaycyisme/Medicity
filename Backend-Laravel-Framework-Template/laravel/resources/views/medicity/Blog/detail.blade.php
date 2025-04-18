<x-main-layout>
    <div class="content">
        <div class="container mt-5">

            <div class="row" style="margin-top: 100px">
                <div class="col-lg-12 col-md-12">
                    <div class="blog-view">
                        <h3 class="mb-3">{{ $blog->title }}</h3>
                        <div class="blog blog-single-post">
                            <div class="blog-image">
                                <a href="javascript:void(0);"><img alt="blog-image" src="{{ asset('storage/Blog/'.$blog->thumbnail) }}" class="img-fluid"></a>
                            </div>
                            <div class="blog-info d-md-flex align-items-center justify-content-between flex-wrap">
                                <div class="post-left">
                                    <ul>
                                        <li><span class="badge badge-dark fs-14 fw-medium">{{ $blog->blogCategory->name }}</span></li>
                                        <li><i class="isax isax-calendar"></i>{{ $blog->created_at }}</li>
                                        <li>
                                            <div class="post-author">
                                                <a href="doctor-profile.html"><img src="{{ asset('storage/Blog/'.$blog->author_image) }}" alt="Post Author"> <span>{{ $blog->author_name }}</span></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="blog-views d-flex align-items-center justify-content-md-end">
                                    <span class="badge badge-outline-dark me-2"><i class="isax isax-message-text me-1"></i>25</span>
                                    <span class="badge badge-outline-primary"><i class="isax isax-eye me-1"></i>90</span>
                                </div>
                            </div>
                            <div class="blog-content">
                                {!! $blog->content !!}
                            </div>
                        </div>
                        <h4 class="mb-3">About Author</h4>
                        <div class="about-author">
                            <div class="about-author-img">
                                <div class="author-img-wrap">
                                    <a href="#"><img class="img-fluid" alt="Darren Elder" src="{{ asset('storage/Blog/'.$blog->author_image) }}"></a>
                                </div>
                            </div>
                            <div class="author-details">
                                <p class="mb-0">{{ $blog->author_overview }}</p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </div>

    </div>
</x-main-layout>
