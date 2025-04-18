
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/fonts/custom-font.js') }}"></script>
<script src="{{ asset('assets/js/pcoded.js') }}"></script>
<script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/sweetalert2.all.min.js') }}"></script>

<script src="{{ asset('assets/js/plugins/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/dashboard-finance.js') }}"></script>
<script src="{{ asset('assets/js/plugins/peity-vanilla.min.js') }}"></script>
{{-- <script src="{{ asset('assets/js/pages/membership-dashboard.js') }}"></script> --}}
<script src="{{ asset('assets/js/pages/invoice-dashboard.js') }}"></script>
<script src="{{ asset('assets/js/pages/w-chart.js') }}"></script>

<script src="{{ asset('assets/js/rte.js') }}"></script>
<script src="{{ asset('assets/js/plugins/all_plugins.js') }}"></script>
<script>
    @if (session('status'))
        Swal.fire({
            icon: 'info',
            title: 'Thông tin!',
            html: '{!! session("status") !!}'
        });
    @endif
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Successful!',
            html: '{!! session("success") !!}'
        });
    @endif
</script>

@if (Route::is('speciality.create') || Route::is('speciality.edit'))
    <script src="{{ asset('assets/js/speciality-upload-image.js') }}"></script>
@endif


@if (Route::is('clinic.create') || Route::is('clinic.edit'))
<script type="module" src="{{ asset('assets/js/clinic-uppy-upload.js') }}"></script>
<script src="{{ asset('assets/js/clinic-upload-image.js') }}"></script>
<script src="{{ asset('assets/js/clinic-remove-image.js') }}"></script>
@endif


@if (Route::is('service.create') || Route::is('service.edit'))
<script type="module" src="{{ asset('assets/js/service-uppy-upload.js') }}"></script>
<script src="{{ asset('assets/js/service-upload-image.js') }}"></script>
<script src="{{ asset('assets/js/service-remove-image.js') }}"></script>
<script>
    var editor1 = new RichTextEditor("#blog-content-editor");

    // Handler upload file
    window.rte_file_upload_handler = function(file, callback, optionalIndex, optionalFiles) {
        // Tạo form data
        const formData = new FormData();
        formData.append('upload', file);
        formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);

        // Tạo UI progress (có thể tùy chỉnh hoặc bỏ qua)
        const dialogOuter = document.createElement('div');
        dialogOuter.style.cssText = 'position:fixed;left:0;top:0;width:100%;height:100%;background:rgba(0,0,0,0.5);display:flex;align-items:center;justify-content:center;z-index:9999;';

        const dialogInner = document.createElement('div');
        dialogInner.style.cssText = 'background:white;padding:20px;border-radius:8px;';
        dialogInner.innerHTML = `
            <div>Uploading...</div>
            <div class="progress-text">0%</div>
            <div class="progress-bar" style="width:200px;height:10px;background:#eee;margin:10px 0;">
                <div class="progress" style="width:0;height:100%;background:#4CAF50;transition:width 0.3s;"></div>
            </div>
        `;

        dialogOuter.appendChild(dialogInner);
        document.body.appendChild(dialogOuter);

        // Upload ảnh
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '{{ route("upload.service.content.image") }}', true);

        xhr.upload.onprogress = function(e) {
            if (e.lengthComputable) {
                const percent = (e.loaded / e.total) * 100;
                dialogInner.querySelector('.progress-text').textContent = Math.round(percent) + '%';
                dialogInner.querySelector('.progress').style.width = percent + '%';
            }
        };

        xhr.onload = function() {
            document.body.removeChild(dialogOuter);

            if (xhr.status === 200) {
                try {
                    const response = JSON.parse(xhr.responseText);
                    if (response.url) {
                        callback(response.url);
                    } else {
                        callback(null, 'Upload failed');
                    }
                } catch (e) {
                    callback(null, 'Invalid response');
                }
            } else {
                callback(null, 'Upload failed');
            }
        };

        xhr.onerror = function() {
            document.body.removeChild(dialogOuter);
            callback(null, 'Upload failed');
        };

        xhr.send(formData);
    };

    // Event khi nội dung thay đổi
    editor1.attachEvent("change", function() {
        let content = editor1.getHTMLCode();
        window.Livewire.find(
            document.querySelector('[wire\\:id]').getAttribute('wire:id')
        ).set('description', content);
    });
</script>
@endif

@if (Route::is('category.create') || Route::is('category.edit'))
<script src="{{ asset('assets/js/category-upload-image.js') }}"></script>
@endif

@if (Route::is('brand.create') || Route::is('brand.edit'))
<script src="{{ asset('assets/js/brand-upload-image.js') }}"></script>
@endif

@if (Route::is('product.create') || Route::is('product.edit'))
{{-- Uppy Library --}}
<script type="module" src="{{ asset('assets/js/product-uppy-upload.js') }}"></script>
<script src="{{ asset('assets/js/product-upload-image.js') }}"></script>
<script src="{{ asset('assets/js/product-remove-image.js') }}"></script>
@endif

@if (Route::is('bodypart.create') || Route::is('bodypart.edit'))
<script src="{{ asset('assets/js/bodypart-upload-image.js') }}"></script>
@endif

@if (Route::is('targetgroup.create') || Route::is('targetgroup.edit'))
<script src="{{ asset('assets/js/targetgroup-upload-image.js') }}"></script>
@endif

@if (Route::is('seasonal.create') || Route::is('seasonal.edit'))
<script src="{{ asset('assets/js/seasonal-upload-image.js') }}"></script>
@endif


@if (Route::is('disease.create') || Route::is('disease.edit'))
<script src="{{ asset('assets/js/disease-upload-image.js') }}"></script>
<script>
    var editor1 = new RichTextEditor("#overview-content-editor");
    var editor2 = new RichTextEditor("#symptoms-content-editor");
    var editor3 = new RichTextEditor("#causes-content-editor");
    var editor4 = new RichTextEditor("#risk-factors-content-editor");
    var editor5 = new RichTextEditor("#diagnosis-content-editor");
    var editor6 = new RichTextEditor("#prevention-content-editor");
    var editor7 = new RichTextEditor("#treatment-content-editor");
    var editor8 = new RichTextEditor("#meal-plan-content-editor");

    // Handler upload file
    window.rte_file_upload_handler = function(file, callback, optionalIndex, optionalFiles) {
        // Tạo form data
        const formData = new FormData();
        formData.append('upload', file);
        formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);

        // Tạo UI progress (có thể tùy chỉnh hoặc bỏ qua)
        const dialogOuter = document.createElement('div');
        dialogOuter.style.cssText = 'position:fixed;left:0;top:0;width:100%;height:100%;background:rgba(0,0,0,0.5);display:flex;align-items:center;justify-content:center;z-index:9999;';

        const dialogInner = document.createElement('div');
        dialogInner.style.cssText = 'background:white;padding:20px;border-radius:8px;';
        dialogInner.innerHTML = `
            <div>Uploading...</div>
            <div class="progress-text">0%</div>
            <div class="progress-bar" style="width:200px;height:10px;background:#eee;margin:10px 0;">
                <div class="progress" style="width:0;height:100%;background:#4CAF50;transition:width 0.3s;"></div>
            </div>
        `;

        dialogOuter.appendChild(dialogInner);
        document.body.appendChild(dialogOuter);

        // Upload ảnh
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '{{ route("upload.disease.content.image") }}', true);

        xhr.upload.onprogress = function(e) {
            if (e.lengthComputable) {
                const percent = (e.loaded / e.total) * 100;
                dialogInner.querySelector('.progress-text').textContent = Math.round(percent) + '%';
                dialogInner.querySelector('.progress').style.width = percent + '%';
            }
        };

        xhr.onload = function() {
            document.body.removeChild(dialogOuter);

            if (xhr.status === 200) {
                try {
                    const response = JSON.parse(xhr.responseText);
                    if (response.url) {
                        callback(response.url);
                    } else {
                        callback(null, 'Upload failed');
                    }
                } catch (e) {
                    callback(null, 'Invalid response');
                }
            } else {
                callback(null, 'Upload failed');
            }
        };

        xhr.onerror = function() {
            document.body.removeChild(dialogOuter);
            callback(null, 'Upload failed');
        };

        xhr.send(formData);
    };

    // Event khi nội dung thay đổi
    editor1.attachEvent("change", function() {
        let content = editor1.getHTMLCode();
        window.Livewire.find(
            document.querySelector('[wire\\:id]').getAttribute('wire:id')
        ).set('overview', content);
    });
    editor2.attachEvent("change", function() {
        let content = editor2.getHTMLCode();
        window.Livewire.find(
            document.querySelector('[wire\\:id]').getAttribute('wire:id')
        ).set('symptoms', content);
    });
    editor3.attachEvent("change", function() {
        let content = editor3.getHTMLCode();
        window.Livewire.find(
            document.querySelector('[wire\\:id]').getAttribute('wire:id')
        ).set('causes', content);
    });
    editor4.attachEvent("change", function() {
        let content = editor4.getHTMLCode();
        window.Livewire.find(
            document.querySelector('[wire\\:id]').getAttribute('wire:id')
        ).set('risk_factors', content);
    });
    editor5.attachEvent("change", function() {
        let content = editor5.getHTMLCode();
        window.Livewire.find(
            document.querySelector('[wire\\:id]').getAttribute('wire:id')
        ).set('diagnosis', content);
    });
    editor6.attachEvent("change", function() {
        let content = editor6.getHTMLCode();
        window.Livewire.find(
            document.querySelector('[wire\\:id]').getAttribute('wire:id')
        ).set('prevention', content);
    });
    editor7.attachEvent("change", function() {
        let content = editor7.getHTMLCode();
        window.Livewire.find(
            document.querySelector('[wire\\:id]').getAttribute('wire:id')
        ).set('treatment', content);
    });
    editor8.attachEvent("change", function() {
        let content = editor8.getHTMLCode();
        window.Livewire.find(
            document.querySelector('[wire\\:id]').getAttribute('wire:id')
        ).set('meal_plan', content);
    });

</script>
@endif

@if (Route::is('blog.create') || Route::is('blog.edit'))
<script src="{{ asset('assets/js/blog-upload-image.js') }}"></script>
<script>
    var editor1 = new RichTextEditor("#blog-content-editor");

    // Handler upload file
    window.rte_file_upload_handler = function(file, callback, optionalIndex, optionalFiles) {
        // Tạo form data
        const formData = new FormData();
        formData.append('upload', file);
        formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);

        // Tạo UI progress (có thể tùy chỉnh hoặc bỏ qua)
        const dialogOuter = document.createElement('div');
        dialogOuter.style.cssText = 'position:fixed;left:0;top:0;width:100%;height:100%;background:rgba(0,0,0,0.5);display:flex;align-items:center;justify-content:center;z-index:9999;';

        const dialogInner = document.createElement('div');
        dialogInner.style.cssText = 'background:white;padding:20px;border-radius:8px;';
        dialogInner.innerHTML = `
            <div>Uploading...</div>
            <div class="progress-text">0%</div>
            <div class="progress-bar" style="width:200px;height:10px;background:#eee;margin:10px 0;">
                <div class="progress" style="width:0;height:100%;background:#4CAF50;transition:width 0.3s;"></div>
            </div>
        `;

        dialogOuter.appendChild(dialogInner);
        document.body.appendChild(dialogOuter);

        // Upload ảnh
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '{{ route("upload.blog.content.image") }}', true);

        xhr.upload.onprogress = function(e) {
            if (e.lengthComputable) {
                const percent = (e.loaded / e.total) * 100;
                dialogInner.querySelector('.progress-text').textContent = Math.round(percent) + '%';
                dialogInner.querySelector('.progress').style.width = percent + '%';
            }
        };

        xhr.onload = function() {
            document.body.removeChild(dialogOuter);

            if (xhr.status === 200) {
                try {
                    const response = JSON.parse(xhr.responseText);
                    if (response.url) {
                        callback(response.url);
                    } else {
                        callback(null, 'Upload failed');
                    }
                } catch (e) {
                    callback(null, 'Invalid response');
                }
            } else {
                callback(null, 'Upload failed');
            }
        };

        xhr.onerror = function() {
            document.body.removeChild(dialogOuter);
            callback(null, 'Upload failed');
        };

        xhr.send(formData);
    };

    // Event khi nội dung thay đổi
    editor1.attachEvent("change", function() {
        let content = editor1.getHTMLCode();
        window.Livewire.find(
            document.querySelector('[wire\\:id]').getAttribute('wire:id')
        ).set('content', content);
    });

</script>
@endif
