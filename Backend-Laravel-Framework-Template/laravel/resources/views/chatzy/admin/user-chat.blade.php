<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="/chatzy/vendors/feather/feather.css">
    <link rel="stylesheet" href="/chatzy/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/chatzy/vendors/css/vendor.bundle.base.css">

    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="/chatzy/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="/chatzy/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="/chatzy/usertemplate/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    {{-- <link rel="stylesheet" href="/chatzy/css/vertical-layout-light/style.css"> --}}
    <!-- endinject -->
    <link rel="shortcut icon" href="/chatzy/images/favicon.png" />
</head>
<style>
    .chat-list {
        max-height: 500px;
        overflow-y: auto;
    }

    .chat-item {
        display: flex;
        align-items: center;
        padding: 10px;
        cursor: pointer;
    }

    .chat-item:hover {
        background-color: #f5f5f5;
    }

    .avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .chat-details {
        flex: 1;
    }

    .chat-title {
        display: flex;
        align-items: center;
        padding: 10px;
    }

    .chat-message {
        display: flex;
        margin-bottom: 10px;
    }

    .message-avatar {
        margin-right: 10px;
    }

    .message-content {
        background-color: #f2f2f2;
        padding: 10px;
        border-radius: 10px;
    }

    .chat-message.sender p {
        color: white;
    }

    .sender .message-content {
        background-color: #dcf8c6;
    }

    .card-footer {
        padding: 10px;
    }

    .chat-window {
        max-height: 500px;
        overflow-y: auto;
    }

    .chat-message-container {
        min-height: 400px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #ffffff;
        ;
        margin-bottom: 10px;
    }

    .chat-message.sender {
        margin-bottom: 10px;
        text-align: left;
    }

    .chat-message.receiver {
        margin-bottom: 10px;
        text-align: right;
    }

    .list-group-item.active {
        z-index: 2;
        color: #fff;
        background-color: #4B49AC;
        border-color: #4B49AC;
    }

    .chat-message {
        display: flex;
        align-items: center;
        margin: 10px 0;
    }

    .chat-message .message-avatar img {
        width: 40px;
        height: 40px;
    }

    .chat-message .message-content {
        display: inline-block;
        padding: 10px;
        border-radius: 5px;
        background-color: #f1f1f1;
        margin: 0 10px;
        max-width: 70%;
    }

    .chat-message.sender .message-content {
        background-color: #d1e7dd;
        /* Example color for sender */
        text-align: right;
        margin-left: auto;
        /* Align right */
    }

    .chat-message.sender {
        flex-direction: row-reverse;
    }

    .chat-message .timestamp {
        font-size: 0.8em;
        color: #888;
    }

    .chat-message.sender.timestamp {
        font-size: 0.8em;
    }

    .chat-message.sender .timestamp {
        margin-right: 10px;
        color: white;

    }

    .profile_card {
        display: flex;
        align-items: center;
        padding: 15px;
        margin: 10px 0;
        background-color: #f8f9fa;
        /* Light background color */
        border-radius: 10px;
        /* Rounded corners */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Subtle shadow */
        transition: transform 0.2s;
        /* Animation for hover effect */
    }

    .profile_card:hover {
        transform: translateY(-5px);
        /* Lift the card on hover */
    }

    .profile_img {
        width: 60px;
        /* Avatar size */
        height: 60px;
        margin-right: 15px;
        border: 2px solid #007bff;
        /* Border color matching badge */
    }

    .chat-details {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .profile_name {
        font-size: 1.1em;
        /* Slightly larger font size */
        font-weight: bold;
        color: #343a40;
        /* Darker text color */
        margin-bottom: 5px;
    }

    .badge-primary {
        background-color: #007bff;
        /* Badge background color */
        color: #fff;
        /* Badge text color */
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 0.9em;
        align-self: flex-start;
        /* Align the badge to the start */
    }


    .chat-list .chat-item {
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .chat-list .chat-item:hover {
        background-color: #f8f9fa;
    }

    .chat-window {
        background-color: #f4f6f8;
        border-radius: 0 0 5px 5px;
    }

    .chat-message-container {
        padding: 15px;
    }

    .chat-message {
        display: flex;
        margin-bottom: 15px;
    }

    .chat-message .message-avatar img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .chat-message .message-content {
        max-width: 70%;
        background-color: #e9ecef;
        border-radius: 15px;
        padding: 10px 15px;
        position: relative;
    }

    .chat-message.sender .message-content {
        background-color: #007bff;
        color: #fff;
        align-self: flex-end;
    }

    .chat-message .timestamp {
        font-size: 0.8rem;
        color: #6c;
    }

    .chat-item.active {
        background-color: #f0f0f0;
        font-weight: bold;
    }
</style>

<body>

    <div class="">
        <x-main-layout>
            <div class="content">
				<div class="container mt-5">

					<div class="row" style="margin-top: 100px;">
                        <!-- Profile Sidebar -->
                            @include('layouts.app.patient-sidebar')
                        <!-- /Profile Sidebar -->
                            <div class="col-lg-8 col-xl-9 container-fluid page-body-wrapper">
                                <div class="main-panel" style="width: 100%;">
                                    <div class="content-wrapper">
                                        <div class="row">
                                            <div class="col-md-12 grid-margin">
                                                <div class="row">
                                                    <div class="col-md-12 grid-margin">
                                                        <div class="row">
                                                            <!-- Left column: Chat list -->
                                                            <div class="col-md-4 col-lg-3">
                                                                <div class="card shadow-sm">
                                                                    <div class="card-header bg-primary text-white">
                                                                        <h4 class="mb-0">Doctors</h4> <!-- Đổi tên tiêu đề -->
                                                                    </div>
                                                                    <div class="list-group chat-list" id="chatList" style="max-height: 500px; overflow-y: auto;">
                                                                        <ul class="list-group list-group-flush">
                                                                            @foreach ($users as $user)
                                                                                <li class="list-group-item d-flex align-items-center chat-item" data-avatar="{{ asset('storage/' . $user->profile_photo_path) }}">
                                                                                    <img src="@if(isset($user->profile_photo_path)){{ asset('storage/'.$user->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }}@endif" class="profile_img rounded-circle mr-3" style="width: 40px; height: 40px;" alt="User Avatar">
                                                                                    <div class="profile_info">
                                                                                        <span class="profile_name font-weight-bold">{{ $user->name }}</span>
                                                                                        <span class="id" style="display: none;">{{ $user->id }}</span>
                                                                                    </div>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Right column: Chat area -->
                                                            <div class="col-md-8 col-lg-9">
                                                                <div class="card shadow-sm">
                                                                    <div class="card-header bg-primary text-white">
                                                                        <div class="d-flex align-items-center">
                                                                            {{-- @if ($selectedDoctor)
                                                                                <img id="chat_img" src="@if(isset($appointment->doctor->profile_photo_path)){{ asset('storage/'.$appointment->doctor->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }}@endif" class="rounded-circle mr-3" alt="Profile Picture" style="width: 40px; height: 40px;">
                                                                            @endif --}}
                                                                            <h4 class="mb-0" id="chat_name">{{ isset($selectedDoctor) ? 'Chatting with ' . $selectedDoctor->name : 'Please select a doctor to chat' }}</h4>
                                                                        </div>
                                                                    </div>

                                                                    <div class="card-body chat-window"
                                                                        style="height: 400px; overflow-y: auto;">
                                                                        <div class="chat-message-container" id="chatMessageContainer">
                                                                            <!-- Chat messages will be dynamically loaded here -->
                                                                        </div>
                                                                    </div>

                                                                    <div class="card-footer">
                                                                        <form id="messageForm" method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="receiver_id" id="receiver_id">
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Type your message here..."
                                                                                    id="messageInput" name="message">
                                                                                <button class="btn btn-primary" type="submit"
                                                                                    id="sendMessageButton">Send</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




                                        </div>

                                        <div class="col-12 grid-margin stretch-card">
                                            <div class="card">

                                            </div>
                                        </div>
                                    </div>
                                    <!-- main-panel ends -->
                                </div>
                                <!-- page-body-wrapper ends -->
                            </div>
                    </div>

                </div>

            </div>
        </x-main-layout>
        <script src="{{ asset('/build/assets/app-D1ylovWN.js') }}"></script>

        <!-- container-scroller -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- plugins:js -->
        <script src="/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="/chatzy/vendors/chart.js/Chart.min.js"></script>
        <script src="/chatzy/vendors/datatables.net/jquery.dataTables.js"></script>
        <script src="/chatzy/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
        <script src="/chatzy/js/dataTables.select.min.js"></script>

        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="/chatzy/js/off-canvas.js"></script>
        <script src="/chatzy/js/hoverable-collapse.js"></script>
        <script src="/chatzy/js/template.js"></script>
        <script src="/chatzy/js/settings.js"></script>
        <script src="/chatzy/js/todolist.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="/chatzy/js/dashboard.js"></script>
        <script src="/chatzy/js/Chart.roundedBarCharts.js"></script>
        <!-- End custom js for this page-->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- JavaScript to handle profile card click -->

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pusher/7.0.3/pusher.min.js"></script>
        <script>
            // Lắng nghe tin nhắn mới từ Pusher
            var pusher = new Pusher('29fb7bb0895d31f8fd38', {
                cluster: 'ap1',
                encrypted: true
            });

            var channel = pusher.subscribe('admin-messages');

            channel.bind('admin-message', function(data) {
                console.log('Message received:', data);

                let loggedUserId = '{{ Auth::id() }}'; // ID của user hiện tại
                let isSender = parseInt(data.sender_id) === parseInt(loggedUserId);
                let receiverId = $('#receiver_id').val(); // ID của người đang chat

                // Nếu tin nhắn do chính người gửi gửi đi, không hiển thị lại nữa
                if (isSender) {
                    console.log("Tin nhắn do chính người gửi gửi đi, bỏ qua.");
                    return;
                }

                // Kiểm tra xem sender có profile_photo_path hay không
                let senderImage = data.admin.profile_photo_path && data.admin.profile_photo_path.trim() !== ""
                    ? "/storage/profile-photos/" + data.admin.profile_photo_path
                    : "{{ asset('assets/images/user/avatar-1.jpg') }}";

                // Nếu đang chat với người gửi tin nhắn thì hiển thị tin nhắn ngay lập tức
                if (parseInt(receiverId) === parseInt(data.sender_id)) {
                    let messageText = data.message;
                    let senderName = data.admin.name;
                    let messageTime = new Date(data.created_at).toLocaleTimeString([], {
                        hour: '2-digit',
                        minute: '2-digit'
                    });

                    let messageHtml = `
                        <div class="chat-message receiver">
                            <div class="message-content">
                                <p><strong>${senderName}:</strong> ${messageText}</p>
                                <div class="timestamp">${messageTime}</div>
                            </div>
                        </div>`;

                    // Hiển thị tin nhắn mới ngay lập tức
                    $('#chatMessageContainer').append(messageHtml);
                    $('#chatMessageContainer').scrollTop($('#chatMessageContainer')[0].scrollHeight);
                }
            });
        </script>

        <script>
            $(document).ready(function () {
                let selectedDoctorId = "{{ isset($selectedDoctor) ? $selectedDoctor->id : '' }}";
                let selectedDoctorName = "{{ isset($selectedDoctor) ? $selectedDoctor->name : '' }}";
                let selectedDoctorAvatar = "{{ isset($selectedDoctor) && $selectedDoctor->profile_photo_path ? asset('storage/profile-photos/' . $selectedDoctor->profile_photo_path) : asset('assets/images/user/avatar-1.jpg') }}";

                function loadMessages(doctorId, doctorName, doctorAvatar) {
                    $('#receiver_id').val(doctorId);
                    $('#chat_name').text('Chatting with ' + doctorName);
                    $('#chat_img').attr('src', doctorAvatar);
                    $('#chatMessageContainer').empty(); // Xóa tin nhắn cũ trước khi tải mới

                    $.ajax({
                        url: '{{ route('fetchMessages') }}',
                        method: 'GET',
                        data: { receiver_id: doctorId },
                        success: function(response) {
                            response.messages.forEach(function(message) {
                                let isSender = parseInt(message.sender_id) === {{ Auth::id() }};
                                let messageTime = new Date(message.created_at).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

                                let senderAvatar = isSender
                                    ? "{{ $LoggedUserInfo->profile_photo_path ? asset('storage/profile-photos/' . $LoggedUserInfo->profile_photo_path) : asset('assets/images/user/avatar-1.jpg') }}"
                                    : doctorAvatar;

                                let senderName = isSender ? 'You' : doctorName;

                                let messageHtml = `
                                    <div class="chat-message ${isSender ? 'sender' : 'receiver'}">
                                        <div class="message-content">
                                            <p><strong>${senderName}:</strong> ${message.message}</p>
                                            <div class="timestamp">${messageTime}</div>
                                        </div>
                                    </div>`;

                                $('#chatMessageContainer').append(messageHtml);
                            });

                            $('#chatMessageContainer').scrollTop($('#chatMessageContainer')[0].scrollHeight);
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching messages:', error);
                        }
                    });
                }

                // Nếu có bác sĩ được chọn khi vào trang, tự động tải tin nhắn
                if (selectedDoctorId) {
                    loadMessages(selectedDoctorId, selectedDoctorName, selectedDoctorAvatar);
                } else {
                    // Nếu chưa chọn bác sĩ, hiển thị thông báo và avatar mặc định
                    $('#chat_name').text('Please select a doctor to chat');
                    $('#chat_img').attr('src', '{{ asset("assets/images/user/avatar-1.jpg") }}');
                }

                // Xử lý khi chọn bác sĩ từ danh sách bên trái
                $(document).on('click', '.chat-item', function () {
                    let doctorId = $(this).find('.id').text();
                    let doctorName = $(this).find('.profile_name').text();
                    let doctorAvatar = $(this).data('avatar') || '{{ asset("assets/images/user/avatar-1.jpg") }}';

                    $('.chat-item').removeClass('active'); // Xóa class active khỏi các mục khác
                    $(this).addClass('active'); // Thêm class active vào mục được chọn

                    loadMessages(doctorId, doctorName, doctorAvatar); // Tải lại tin nhắn của người được chọn
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                // Function to handle chat item click
                function handleChatItemClick() {
                    // Remove the active class from all chat items
                    $('.chat-item').removeClass('active');

                    // Add the active class to the clicked chat item
                    $(this).addClass('active');

                    let profileImage = $(this).find('.profile_img').attr('src');
                    let profileName = $(this).find('.profile_name').text();
                    let receiverId = $(this).find('.id').text();

                    // Set receiver details in the chat area
                    $('#receiver_id').val(receiverId);
                    $('#chat_img').attr('src', profileImage);
                    $('#chat_name').text('Chatting with ' + profileName);

                    // Fetch chat messages for the selected user
                    $.ajax({
                        url: '{{ route('fetchMessages') }}',
                        method: 'GET',
                        data: {
                            receiver_id: receiverId
                        },
                        success: function(response) {
                            console.log("Messages response:", response);

                            // Kiểm tra nếu response không chứa messages hoặc messages rỗng
                            if (!response.messages || response.messages.length === 0) {
                                console.warn("No messages found for this conversation.");
                                return;
                            }

                            $('#chatMessageContainer').empty(); // Xóa tin nhắn cũ trước khi hiển thị

                            response.messages.forEach(function(message) {
                                console.log("Processing message:", message);

                                let loggedAdminId = {!! json_encode(Auth::id()) !!}; // Lấy ID của admin đang đăng nhập
                                let isSender = parseInt(message.sender_id) === parseInt(loggedAdminId);
                                let userAvatar = isSender ? "{{ Storage::url($LoggedUserInfo->picture) }}" : profileImage;
                                let userName = isSender ? '{{ $LoggedUserInfo->name }}' : profileName;

                                let messageTime = new Date(message.created_at).toLocaleTimeString([], {
                                    hour: '2-digit',
                                    minute: '2-digit'
                                });

                                let messageHtml = `
                                    <div class="chat-message ${isSender ? 'sender' : 'receiver'}">
                                        <div class="message-content">
                                            <p><strong>${userName}:</strong> ${message.message}</p>
                                            <div class="timestamp">${messageTime}</div>
                                        </div>
                                    </div>`;

                                $('#chatMessageContainer').append(messageHtml);
                            });

                            // Cuộn xuống tin nhắn mới nhất
                            $('#chatMessageContainer').scrollTop($('#chatMessageContainer')[0].scrollHeight);
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching messages:', error);
                        }
                    });

                }

                // Attach the click event to chat items
                $(document).on('click', '.chat-item', handleChatItemClick);

                // Event listener for sending a message
                $('#messageForm').on('submit', function(e) {
                    e.preventDefault();

                    let message = $('#messageInput').val().trim();
                    let receiverId = $('#receiver_id').val();

                    if (message === "") {
                        alert("Message cannot be empty.");
                        return;
                    }

                    $.ajax({
                        type: 'POST',
                        url: '{{ route('sendMessage') }}',
                        data: {
                            _token: $('input[name="_token"]').val(),
                            message: message,
                            receiver_id: receiverId
                        },
                        beforeSend: function() {
                            // Disable the send button and change its text to "Sending..."
                            $('#sendMessageButton').text('Sending...').attr('disabled', true);
                        },
                        success: function(response) {
                            if (response.success) {
                                toastr.success(response.message, "Success");
                                $('#messageInput').val(''); // Clear the input

                                let userAvatar =
                                    '{{ asset('storage/' . $LoggedUserInfo->picture) }}';
                                let userName = '{{ $LoggedUserInfo->name }}';

                                let messageTime = new Date().toLocaleTimeString([], {
                                    hour: '2-digit',
                                    minute: '2-digit'
                                });

                                let messageHtml = `
                        <div class="chat-message sender">
                            <div class="message-content">
                                <p><strong>${userName}:</strong> ${message}</p>
                                <div class="timestamp">${messageTime}</div>
                            </div>
                        </div>`;

                                $('#chatMessageContainer').append(messageHtml);
                                $('#chatMessageContainer').scrollTop($('#chatMessageContainer')[0]
                                    .scrollHeight);
                            } else {
                                toastr.error(response.message, "Error");
                            }
                        },
                        error: function(xhr) {
                            console.error('Error:', xhr.responseJSON.message);
                            toastr.error('Failed to send message', "Error");
                        },
                        complete: function() {
                            // Re-enable the send button and change its text back to "Send"
                            $('#sendMessageButton').text('Send').attr('disabled', false);
                        }
                    });
                });
            });
        </script>


</body>

</html>
