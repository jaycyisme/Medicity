document.addEventListener('DOMContentLoaded', function () {
    function setupImageUpload(inputId, previewId, hiddenInputId) {
        const imageInput = document.getElementById(inputId);
        const imagePreview = document.getElementById(previewId);
        const hiddenInput = document.getElementById(hiddenInputId); // Chỉ lấy input hidden
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

        imageInput.parentElement.appendChild(progressBar);
        imageInput.parentElement.appendChild(progressText);

        imageInput.addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const formData = new FormData();
                formData.append('upload', file);

                const xhr = new XMLHttpRequest();
                xhr.open('POST', '/system-management/speciality/upload-image', true);
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
                            hiddenInput.value = response.url; // Lưu URL vào input hidden, KHÔNG PHẢI input file
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
            }
        });
    }

    // Thiết lập upload cho ảnh chính
    setupImageUpload('main_image', 'imagePreview', 'image_url');

    // Thiết lập upload cho ảnh phụ
    setupImageUpload('sub_image_url', 'subImagePreview', 'hidden_sub_image_url');
});
