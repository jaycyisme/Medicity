import {
    Uppy,
    Dashboard,
    XHRUpload,
    Webcam,
    RemoteSources,
    ImageEditor,
} from 'https://releases.transloadit.com/uppy/v4.9.0/uppy.min.mjs';

const uppy = new Uppy({
    debug: true,
    autoProceed: false,
})
    .use(Dashboard, {
        trigger: '#uppyModalOpener', // Nút bấm để mở modal
        inline: false, // Không hiển thị ngay, chỉ mở khi bấm trigger
        target: 'body', // Modal sẽ được gắn vào body
        showProgressDetails: true,
        closeAfterFinish: true, // Đóng modal sau khi tải lên hoàn tất
        theme: 'light', // Giao diện sáng
    })
    .use(RemoteSources, { companionUrl: 'https://companion.uppy.io' })
    .use(ImageEditor, { target: Dashboard })
    .use(Webcam, { target: Dashboard })
    .use(XHRUpload, {
        endpoint: '/system-management/clinic/upload-image-by-uppy',
        fieldName: 'images[]',
        formData: true,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
    });

uppy.on('upload-success', (file, response) => {
    console.log('Upload success:', file.name, response.body);

    // Lấy URL từ response.body.files[0].url
const uploadedFile = response.body.files.find(f => f.name === file.name);

if (uploadedFile && uploadedFile.url) {
    // Gán URL ảnh trả về vào thẻ img
    const imagePreviewContainer = document.getElementById('uploadedImagePreviews');

    // Tạo container chứa ảnh và nút xóa
    const imageContainer = document.createElement('div');
    imageContainer.className = 'image-container';
    imageContainer.style.position = 'relative';
    imageContainer.style.margin = '5px';
    imageContainer.style.display = 'inline-block';

    const newImage = document.createElement('img');
    newImage.src = uploadedFile.url;
    newImage.alt = 'Uploaded Image';
    newImage.style.width = '100px';
    newImage.style.height = '100px';
    newImage.style.objectFit = 'cover';

    // Tạo nút xóa
    const deleteButton = document.createElement('button');
    deleteButton.type = 'button';
    deleteButton.className = 'delete-btn';
    deleteButton.setAttribute('data-image', uploadedFile.image_url);
    deleteButton.style.position = 'absolute';
    deleteButton.style.top = '0';
    deleteButton.style.right = '0';
    deleteButton.style.backgroundColor = '#000000b3';
    deleteButton.style.color = 'white';
    deleteButton.style.border = 'none';
    deleteButton.style.width = '20px';
    deleteButton.style.cursor = 'pointer';
    deleteButton.innerHTML = '&times;';

    // Gắn ảnh và nút xóa vào container
    imageContainer.appendChild(newImage);
    imageContainer.appendChild(deleteButton);

    // Gắn container vào preview
    imagePreviewContainer.appendChild(imageContainer);

    // Gán URL ảnh vào hidden input để gửi lên Livewire
    const uploadedImagesInput = document.getElementById('uploadedImages');
    const currentValue = uploadedImagesInput.value;
    uploadedImagesInput.value = currentValue ? currentValue + ',' + uploadedFile.image_url : uploadedFile.image_url;

    // Kích hoạt sự kiện 'input' để Livewire nhận biết thay đổi
    uploadedImagesInput.dispatchEvent(new Event('input'));
} else {
    console.error('Không tìm thấy URL ảnh trong phản hồi từ server.');
}
});

uppy.on('complete', (result) => {
    console.log('Upload complete:', result.successful);
    // alert('Tải lên tất cả ảnh thành công!');
});
