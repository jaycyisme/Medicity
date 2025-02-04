<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/fonts/custom-font.js') }}"></script>
<script src="{{ asset('assets/js/pcoded.js') }}"></script>
<script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/sweetalert2.all.min.js') }}"></script>
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
            title: 'Thành công!',
            html: '{!! session("success") !!}'
        });
    @endif
</script>



<!-- jQuery -->
<script data-cfasync="false" src="{{ asset('medicity/assets/js/email-decode.min.js"></script><script src="assets/js/jquery-3.7.1.min.js') }}" type="39fc6ea48bcbb5532402c2cb-text/javascript"></script>

<!-- Bootstrap Bundle JS -->
<script src="{{ asset('medicity/assets/js/bootstrap.bundle.min.js') }}" type="39fc6ea48bcbb5532402c2cb-text/javascript"></script>

<!-- Feather Icon JS -->
<script src="{{ asset('medicity/assets/js/feather.min.js') }}" type="39fc6ea48bcbb5532402c2cb-text/javascript"></script>

<!-- Datepicker JS -->
<script src="{{ asset('medicity/assets/js/moment.min.js') }}" type="39fc6ea48bcbb5532402c2cb-text/javascript"></script>
<script src="{{ asset('medicity/assets/js/bootstrap-datetimepicker.min.js') }}" type="39fc6ea48bcbb5532402c2cb-text/javascript"></script>

<!-- Owl Carousel JS -->
<script src="{{ asset('medicity/assets/js/owl.carousel.min.js') }}" type="39fc6ea48bcbb5532402c2cb-text/javascript"></script>

<!-- Slick JS -->
<script src="{{ asset('medicity/assets/js/slick.js') }}" type="39fc6ea48bcbb5532402c2cb-text/javascript"></script>

<!-- Animation JS -->
<script src="{{ asset('medicity/assets/js/aos.js') }}" type="39fc6ea48bcbb5532402c2cb-text/javascript"></script>

<!-- Counter JS -->
<script src="{{ asset('medicity/assets/js/counter.js') }}" type="39fc6ea48bcbb5532402c2cb-text/javascript"></script>

<!-- BacktoTop JS -->
<script src="{{ asset('medicity/assets/js/backToTop.js') }}" type="39fc6ea48bcbb5532402c2cb-text/javascript"></script>

<!-- Custom JS -->
<script src="{{ asset('medicity/assets/js/script.js') }}" type="39fc6ea48bcbb5532402c2cb-text/javascript"></script>

<script src="{{ asset('medicity/assets/js/rocket-loader.min.js') }}" data-cf-settings="39fc6ea48bcbb5532402c2cb-|49" defer></script>




@if (Route::is('chat.index'))
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pusher/8.3.0/pusher.min.js"></script>

    <script>
        $(document).ready(function() {
        $('#middle').hide(); // Ẩn phần chat khi load trang

        // Xử lý khi click vào user
        $(document).on('click', '.user-list-item', function() {
            $('.user-list-item').removeClass('active');
            $(this).addClass('active');

            let receiverId = $(this).data('id');
            let profileImage = $(this).data('avatar');
            let profileName = $(this).data('name');

            if (!receiverId) {
                console.error('Error: Missing receiver_id');
                return;
            }

            $('#middle').fadeIn();
            $('#receiver_id').val(receiverId);
            $('#chat_img').attr('src', profileImage);
            $('#chat_name').text(profileName);

            fetchMessages(receiverId);
        });

        function fetchMessages(receiverId) {
            $.ajax({
                url: `/chat/fetch/${receiverId}`,
                method: 'GET',
                success: function(response) {
                    $('#chatMessageContainer').empty();
                    response.messages.forEach(function(message) {
                        renderMessage(
                            message.message,
                            message.sender_id,
                            message.sender_name,
                            message.sender_avatar,
                            new Date(message.created_at)
                        );
                    });
                },
                error: function(xhr) {
                    console.error('Error fetching messages:', xhr.responseText);
                }
            });
        }

        function renderMessage(messageText, senderId, senderName, senderImage, createdAt) {
            let currentUserId = '{{ auth()->id() }}';
            let isSender = senderId == currentUserId;
            let messageClass = isSender ? "chats-right" : "";
            // let messageHtml = `
            //     <div class="chats ${messageClass}">
            //         <div class="chat-avatar">
            //             <img src="${senderImage}" class="dreams_chat" alt="image">
            //         </div>
            //         <div class="chat-content">
            //             <div class="chat-profile-name ${isSender ? "text-end justify-content-end" : ""}">
            //                 <h6>${senderName}<span>${createdAt.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}</span></h6>
            //             </div>
            //             <div class="message-content">
            //                 ${messageText}
            //             </div>
            //         </div>
            //     </div>
            // `;

            let messageHtml = `
                <div class="chats ${messageClass}">
                    <div class="chat-avatar">
                        <img src="{{ asset('medicity/assets/img/doctors-dashboard/profile-06.jpg') }}" class="dreams_chat" alt="image">
                    </div>
                    <div class="chat-content">
                        <div class="chat-profile-name ${isSender ? "text-end justify-content-end" : ""}">
                            <h6>${senderName}<span>${createdAt.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}</span></h6>
                        </div>
                        <div class="message-content">
                            ${messageText}
                        </div>
                    </div>
                </div>
            `;

            $('#chatMessageContainer').append(messageHtml);
            $('#chatMessageContainer').scrollTop($('#chatMessageContainer')[0].scrollHeight);
        }

        // Gửi tin nhắn
        $('#messageForm').on('submit', function(e) {
            e.preventDefault();
            let message = $('#messageInput').val().trim();
            let receiverId = $('#receiver_id').val();
            if (message === "") return;

            $.ajax({
                type: 'POST',
                url: '/chat/send',
                data: {
                    _token: $('input[name="_token"]').attr('content'),
                    message: message,
                    receiver_id: receiverId
                },
                success: function(response) {
                    $('#messageInput').val('');
                    renderMessage(message, '{{ auth()->id() }}', '{{ auth()->user()->name }}', '{{ asset('storage/' . auth()->user()->picture) }}', new Date());
                },
                error: function(xhr) {
                    console.error('Error:', xhr.responseText);
                }
            });
        });

        // Lắng nghe tin nhắn từ Pusher
        var pusher = new Pusher('29fb7bb0895d31f8fd38', { cluster: 'ap1', encrypted: true });
        var channel = pusher.subscribe('chat-channel');
        channel.bind('message-received', function(data) {
            renderMessage(data.message, data.sender_id, data.sender_name, data.sender_avatar, new Date(data.created_at));
        });
    });
    </script>
@endif

