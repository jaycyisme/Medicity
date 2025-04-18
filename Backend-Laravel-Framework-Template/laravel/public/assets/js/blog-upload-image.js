document.addEventListener('DOMContentLoaded', function () {
    function setupImageUpload(inputId, previewId, urlFieldId, apiEndpoint, variantIndex = null) {
        const imageInput = document.getElementById(inputId);
        const imagePreview = document.getElementById(previewId);
        const imageUrlField = document.getElementById(urlFieldId);
        const progressBar = document.createElement('div');
        const progressText = document.createElement('span');

        // Tạo thanh tiến trình
        progressBar.style.width = '0%';
        progressBar.style.height = '5px';
        progressBar.style.backgroundColor = '#007bff';
        progressBar.style.marginTop = '10px';
        progressBar.style.transition = 'width 0.3s ease';

        progressText.style.display = 'block';
        progressText.style.marginTop = '5px';
        progressText.style.fontSize = '14px';
        progressText.style.color = '#04A9F5';

        if (imageInput.parentElement) {
            imageInput.parentElement.appendChild(progressBar);
            imageInput.parentElement.appendChild(progressText);
        } else {
            console.error(`Parent element for '${inputId}' not found.`);
            return;
        }

        imageInput.addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const formData = new FormData();
                formData.append('upload', file);

                if (variantIndex !== null) {
                    formData.append('variantIndex', variantIndex);
                }

                const xhr = new XMLHttpRequest();
                xhr.open('POST', apiEndpoint, true);
                xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

                // Lắng nghe sự kiện progress
                xhr.upload.addEventListener('progress', function (e) {
                    if (e.lengthComputable) {
                        const percentComplete = Math.round((e.loaded / e.total) * 100);
                        progressBar.style.width = percentComplete + '%';
                        progressText.textContent = `Uploading: ${percentComplete}%`;
                    }
                });

                // Xử lý thành công
                xhr.onload = function () {
                    if (xhr.status === 200) {
                        const response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            imagePreview.src = URL.createObjectURL(file);
                            imagePreview.style.display = 'block';
                            imageUrlField.value = response.url;

                            // Kích hoạt sự kiện 'input' để Livewire nhận biết thay đổi
                            imageUrlField.dispatchEvent(new Event('input'));

                            progressText.textContent = 'Upload complete!';
                            setTimeout(() => {
                                progressBar.style.width = '0%';
                                progressText.textContent = '';
                            }, 1000);
                        } else {
                            alert(response.error || 'Lỗi khi upload ảnh.');
                        }
                    } else {
                        alert('Không thể tải lên ảnh. Vui lòng thử lại.');
                    }
                };

                // Xử lý lỗi
                xhr.onerror = function () {
                    alert('Có lỗi xảy ra trong quá trình tải lên.');
                    progressBar.style.width = '0%';
                    progressText.textContent = '';
                };

                xhr.send(formData);
            } else {
                // Nếu không có file, ẩn imgPreview
                imagePreview.style.display = 'none';
            }
        });
    }

    // Cài đặt upload cho từng trường
    setupImageUpload('thumbnail', 'thumbnailPreview', 'thumbnail_url', '/system-management/blog/upload-image');
    setupImageUpload('author_image', 'authorImagePreview', 'author_image_url', '/system-management/author/upload-image');

    // Cài đặt upload hình ảnh cho biến thể sản phẩm theo index
    function setupVariantImageUpload(index) {
        const inputId = `variant_image_${index}`;
        const previewId = `variantImagePreview_${index}`;
        const urlFieldId = `variant_image_url_${index}`;
        setupImageUpload(inputId, previewId, urlFieldId, '/quan-tri-he-thong/san-pham/tai-len-hinh-anh', index);
    }
    // Cài đặt upload cho các trường hiện có
    document.querySelectorAll('.variant-image-upload').forEach((element, index) => {
        setupVariantImageUpload(index);
    });

    // Theo dõi sự kiện thêm mới biến thể
    window.addEventListener('variant-added', function (event) {
        setTimeout(() => {
            setupVariantImageUpload(event.detail.index);
        }, 100); // Chờ 100ms để đảm bảo DOM đã render
    });
});
