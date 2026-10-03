<div>
    <div class="content">
        <div class="container mt-5">
            <div class="row" style="margin-top: 100px;">
                <div class="col-xl-3">
                    <div class="card filter-lists" x-data="{ open: true }">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            {{-- <h4>Filter</h4> --}}
                            <button class="btn btn-sm btn-outline-primary" @click="open = !open">
                                <span x-show="open">Hide</span>
                                <span x-show="!open">Show</span>
                            </button>
                        </div>
                        <div class="filter-input">
                            <div class="position-relative input-icon">
                                <input type="text" class="form-control" wire:model="search" placeholder="Search Diseases..." />
                                <span><i class="isax isax-search-normal-1"></i></span>
                            </div>
                        </div>

                        <div class="card-body p-0" x-show="open" x-transition>
                            <!-- Lọc theo chuyên khoa -->
                            <div class="accordion-item border-bottom">
                                <div class="accordion-header">
                                    <h5>Speciality</h5>
                                </div>
                                <div class="accordion-collapse show">
                                    <div class="accordion-body pt-3">
                                        <div class="form-check">
                                            <input wire:model="specialityFilter" wire:change="filterChange" class="form-check-input" type="radio" value="">
                                            <label class="form-check-label">All</label>
                                        </div>
                                        @foreach ($specialities as $speciality)
                                            <div class="form-check">
                                                <input wire:model="specialityFilter" wire:change="filterChange" class="form-check-input" type="radio" value="{{ $speciality->id }}">
                                                <label class="form-check-label">{{ $speciality->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- Lọc theo nhóm đối tượng -->
                            <div class="accordion-item border-bottom">
                                <div class="accordion-header">
                                    <h5>Target Group</h5>
                                </div>
                                <div class="accordion-collapse show">
                                    <div class="accordion-body pt-3">
                                        <div class="form-check">
                                            <input wire:model="targetGroupFilter" wire:change="filterChange" class="form-check-input" type="radio" value="">
                                            <label class="form-check-label">All</label>
                                        </div>
                                        @foreach ($targetGroups as $targetGroup)
                                            <div class="form-check">
                                                <input wire:model="targetGroupFilter" wire:change="filterChange" class="form-check-input" type="radio" value="{{ $targetGroup->id }}">
                                                <label class="form-check-label">{{ $targetGroup->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- Lọc theo bộ phận cơ thể -->
                            <div class="accordion-item border-bottom">
                                <div class="accordion-header">
                                    <h5>Body Part</h5>
                                </div>
                                <div class="accordion-collapse show">
                                    <div class="accordion-body pt-3">
                                        <div class="form-check">
                                            <input wire:model="bodyPartFilter" wire:change="filterChange" class="form-check-input" type="radio" value="">
                                            <label class="form-check-label">All</label>
                                        </div>
                                        @foreach ($bodyParts as $bodyPart)
                                            <div class="form-check">
                                                <input wire:model="bodyPartFilter" wire:change="filterChange" class="form-check-input" type="radio" value="{{ $bodyPart->id }}">
                                                <label class="form-check-label">{{ $bodyPart->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="row">
                        @foreach ($diseases as $disease)
                            <div class="col-lg-12">
                                <div class="card doctor-list-card">
                                    <div class="d-md-flex align-items-center">
                                        <div class="card-img card-img-hover">
                                            <a href="{{ route('disease-detail', $disease->id) }}"><img src="{{ asset('storage/Disease/' . $disease->image_url) }}" alt=""></a>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="d-flex align-items-center justify-content-between border-bottom p-3">
                                                <a href="{{ route('disease-detail', $disease->id) }}" class="text-pink fw-medium fs-14">{{ $disease->targetGroup->name }}</a>
                                                <span class="badge bg-success-light d-inline-flex align-items-center">
                                                    <i class="fa-solid fa-circle fs-5 me-1"></i>
                                                    {{ $disease->specialityGroup->name }}
                                                </span>
                                            </div>
                                            <div class="p-3">
                                                <div class="doctor-info-detail pb-3">
                                                    <div class="row align-items-center gy-3">
                                                        <div class="col-sm-6">
                                                            <div>
                                                                <h6 class="d-flex align-items-center mb-1">
                                                                    <a href="{{ route('disease-detail', $disease->id) }}">{{ $disease->name }}</a>
                                                                    <i class="isax isax-tick-circle5 text-success ms-2"></i>
                                                                </h6>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div>
                                                                <p class="d-flex align-items-center mb-0 fs-14 mb-2">
                                                                    <i class="isax isax-language-circle text-dark me-2"></i>{{ $disease->seasonalGroup->name }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 mt-3">
                                                    <a href="{{ route('disease-detail', $disease->id) }}" class="btn btn-md btn-primary-gradient d-inline-flex align-items-center rounded-pill">
                                                        <i class="isax isax-calendar-1 me-2"></i>
                                                        Read More
                                                    </a>
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
    </div>
</div>
