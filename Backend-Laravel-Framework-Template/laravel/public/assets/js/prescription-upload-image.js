document.addEventListener('DOMContentLoaded', function () {
    const imageInput = document.getElementById('main_image');
    const imagePreview = document.getElementById('imagePreview');
    const imageUrlField = document.getElementById('image_url');
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
            xhr.open('POST', '/quan-tri-he-thong/don-thuoc/tai-len-hinh-anh', true);
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
                        imageUrlField.value = response.url;
                        progressText.textContent = 'Upload complete!';
                        setTimeout(() => {
                            progressBar.style.width = '0%';
                            progressText.textContent = '';
                        }, 1000);
                    } else {
                        alert(response.error || 'Upload Error.');
                    }
                } else {
                    alert('Unable to upload photo. Please try again..');
                }
            };

            // Xử lý lỗi
            xhr.onerror = function () {
                alert('An error occurred during upload.');
                progressBar.style.width = '0%';
                progressText.textContent = '';
            };

            xhr.send(formData);
        }
    });
});
