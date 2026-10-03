<ul class="breadcrumb">
    @if(!request()->is('/'))<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>@endif
    @if(request()->is('ho-so-ca-nhan/*'))<li class="breadcrumb-item">Profile</li>@endif
    @if(request()->is('quan-tri-he-thong/*'))<li class="breadcrumb-item">System Management</li>@endif
    @if(request()->is('quan-tri-he-thong/quyen*'))<li class="breadcrumb-item">Role</li>@endif
</ul>
