document.addEventListener('DOMContentLoaded', function () {
    // Lắng nghe sự kiện click trên nút xóa
    document.getElementById('uploadedImagePreviews').addEventListener('click', function (event) {
        if (event.target.classList.contains('delete-btn')) {
            const imageContainer = event.target.closest('.image-container');
            const imageUrl = event.target.getAttribute('data-image');

            // Gửi yêu cầu xóa ảnh qua API
            fetch(`/system-management/clinic/remove-image`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({ image_url: imageUrl }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Xóa ảnh khỏi giao diện
                    imageContainer.remove();

                    // Cập nhật giá trị của input hidden
                    const uploadedImagesInput = document.getElementById('uploadedImages');
                    const updatedImages = uploadedImagesInput.value
                        .split(',')
                        .filter(image => image !== imageUrl)
                        .join(',');
                    uploadedImagesInput.value = updatedImages;

                    // Kích hoạt sự kiện 'input' để Livewire nhận biết thay đổi
                    uploadedImagesInput.dispatchEvent(new Event('input'));
                } else {
                    alert('Xóa ảnh không thành công: ' + data.error);
                }
            })
            .catch(error => {
                console.error('Lỗi khi xóa ảnh:', error);
                alert('Đã xảy ra lỗi. Vui lòng thử lại.');
            });
        }
    });
});
