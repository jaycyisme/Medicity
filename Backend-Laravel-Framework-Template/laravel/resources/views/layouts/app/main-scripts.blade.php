<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/fonts/custom-font.js') }}"></script>
{{-- <script src="{{ asset('assets/js/pcoded.js') }}"></script> --}}
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
            title: 'Successful!',
            html: '{!! session("success") !!}'
        });
    @endif
    @if (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            html: '{!! session("error") !!}'
        });
    @endif
</script>
<!-- jQuery -->
{{-- <script data-cfasync="false" src="{{ asset('medicity/assets/js/email-decode.min.js') }}"></script> --}}
<script src="{{ asset('medicity/assets/js/jquery-3.7.1.min.js') }}" type="39fc6ea48bcbb5532402c2cb-text/javascript"></script>

<!-- Bootstrap Bundle JS -->
<script src="{{ asset('medicity/assets/js/bootstrap.bundle.min.js') }}" type="b8706841ed0b36cd9642eea8-text/javascript"></script>
<!-- Feather Icon JS -->
<script src="{{ asset('medicity/assets/js/feather.min.js') }}"></script>

<!-- Datepicker JS -->
<script src="{{ asset('medicity/assets/js/moment.min.js') }}"></script>
<script src="{{ asset('medicity/assets/js/bootstrap-datetimepicker.min.js') }}"></script>

<!-- Owl Carousel JS -->
<script src="{{ asset('medicity/assets/js/owl.carousel.min.js') }}"></script>

<!-- Apexchart JS -->
<script src="{{ asset('medicity/assets/plugins/apex/apexcharts.min.js') }}" ></script>
<script src="{{ asset('medicity/assets/plugins/apex/chart-data.js') }}" ></script>

<!-- Circle Progress JS -->
<script src="{{ asset('medicity/assets/js/circle-progress.min.js') }}" ></script>

<!-- Slick JS -->
<script src="{{ asset('medicity/assets/js/slick.js') }}"></script>

<!-- Animation JS -->
<script src="{{ asset('medicity/assets/js/aos.js') }}"></script>

<!-- Counter JS -->
{{-- <script src="{{ asset('medicity/assets/js/counter.js') }}"></script> --}}

<!-- BacktoTop JS -->
<script src="{{ asset('medicity/assets/js/backToTop.js') }}"></script>
<script src="{{ asset('medicity/assets/js/theme-script.js') }}"></script>

<!-- Fancybox JS -->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script>
    $(document).ready(function() {
        $('[data-fancybox="gallery"]').fancybox({
            loop: true,
            buttons: ["zoom", "slideShow", "fullScreen", "thumbs", "close"],
            transitionEffect: "slide"
        });
    });
</script>

<!-- Custom JS -->
<script src="{{ asset('medicity/assets/js/script.js') }}"></script>

{{-- <script src="{{ asset('medicity/assets/js/rocket-loader.min.js') }}" data-cf-settings="39fc6ea48bcbb5532402c2cb-|49" defer></script> --}}




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

@if (Route::is('appointment-info'))
    <script type="module" src="{{ asset('assets/js/booking-uppy-upload.js') }}"></script>
@endif

@if (Route::is('weight-loss-calculator'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const nextButtons = document.querySelectorAll('.next_btns');
            const prevButtons = document.querySelectorAll('.prev_btns');
            const fieldsets = document.querySelectorAll('fieldset');
            let currentFieldset = 0;

            // Hide all fieldsets except the first one
            function showFieldset(index) {
                fieldsets.forEach((fieldset, i) => {
                    if (i === index) {
                        fieldset.style.display = 'block';
                    } else {
                        fieldset.style.display = 'none';
                    }
                });
            }

            // Event listener for next buttons
            nextButtons.forEach(button => {
                button.addEventListener('click', function() {
                    if (currentFieldset < fieldsets.length - 1) {
                        currentFieldset++;
                        showFieldset(currentFieldset);
                    }
                });
            });

            // Event listener for prev buttons
            prevButtons.forEach(button => {
                button.addEventListener('click', function() {
                    if (currentFieldset > 0) {
                        currentFieldset--;
                        showFieldset(currentFieldset);
                    }
                });
            });

            // Initialize by showing the first fieldset
            showFieldset(currentFieldset);
        });
    </script>

    <script src="{{ asset('assets/js/plugins/wNumb.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/nouislider.min.js') }}"></script>
    <script>
        (function () {
          // init slider
          var slider = document.getElementById('pc-no_ui_slider-1');

          noUiSlider.create(slider, {
            start: [18],
            step: 1,
            range: {
              min: [15],
              max: [120]
            },
            format: wNumb({
              decimals: 0
            })
          });

          // init slider input
          var sliderInput = document.getElementById('pc-no_ui_slider-1-input');

          slider.noUiSlider.on('update', function (values, handle) {
            sliderInput.value = values[handle];
          });

          sliderInput.addEventListener('change', function () {
            slider.noUiSlider.set(this.value);
          });
        })();
        (function () {
          // init slider
          var slider = document.getElementById('pc-no_ui_slider-2');

          noUiSlider.create(slider, {
            start: [60],
            step: 1,
            range: {
              min: [60],
              max: [272]
            },
            format: wNumb({
              decimals: 0
            })
          });

          // init slider input
          var sliderInput = document.getElementById('pc-no_ui_slider-2-input');

          slider.noUiSlider.on('update', function (values, handle) {
            sliderInput.value = values[handle];
          });

          sliderInput.addEventListener('change', function () {
            slider.noUiSlider.set(this.value);
          });
        })();
        (function () {
          // init slider
          var slider = document.getElementById('pc-no_ui_slider-3');

          noUiSlider.create(slider, {
            start: [23],
            step: 1,
            range: {
              min: [23],
              max: [227]
            },
            format: wNumb({
              decimals: 0
            })
          });

          // init slider input
          var sliderInput = document.getElementById('pc-no_ui_slider-3-input');

          slider.noUiSlider.on('update', function (values, handle) {
            sliderInput.value = values[handle];
          });

          sliderInput.addEventListener('change', function () {
            slider.noUiSlider.set(this.value);
          });
        })();
        (function () {
          // init slider
          var slider = document.getElementById('pc-no_ui_slider-weigh');

          noUiSlider.create(slider, {
            start: [23],
            step: 1,
            range: {
              min: [23],
              max: [227]
            },
            format: wNumb({
              decimals: 0
            })
          });

          // init slider input
          var sliderInput = document.getElementById('pc-no_ui_slider-weigh-input');

          slider.noUiSlider.on('update', function (values, handle) {
            sliderInput.value = values[handle];
          });

          sliderInput.addEventListener('change', function () {
            slider.noUiSlider.set(this.value);
          });
        })();
        (function () {
          // init slider
          var slider = document.getElementById('pc-no_ui_slider-meals');

          noUiSlider.create(slider, {
            start: [1],
            step: 1,
            range: {
              min: [1],
              max: [8]
            },
            format: wNumb({
              decimals: 0
            })
          });

          // init slider input
          var sliderInput = document.getElementById('pc-no_ui_slider-meals-input');

          slider.noUiSlider.on('update', function (values, handle) {
            sliderInput.value = values[handle];
          });

          sliderInput.addEventListener('change', function () {
            slider.noUiSlider.set(this.value);
          });
        })();
        (function () {
          // init slider
          var slider = document.getElementById('pc-no_ui_slider-3');

          noUiSlider.create(slider, {
            start: [20, 80],
            connect: true,
            direction: 'rtl',
            tooltips: [
              true,
              wNumb({
                decimals: 1
              })
            ],
            range: {
              min: [0],
              '10%': [10, 10],
              '50%': [80, 50],
              '80%': 150,
              max: 200
            }
          });

          // init slider input
          var sliderInput0 = document.getElementById('pc-no_ui_slider-3-input');
          var sliderInput1 = document.getElementById('pc-no_ui_slider-3.1-input');
          var sliderInputs = [sliderInput1, sliderInput0];

          slider.noUiSlider.on('update', function (values, handle) {
            sliderInputs[handle].value = values[handle];
          });
        })();
        (function () {
          var slider = document.getElementById('pc-no_ui_slider-input-select');

          // Append the option elements
          for (var i = -20; i <= 40; i++) {
            var option = document.createElement('option');
            option.text = i;
            option.value = i;

            slider.appendChild(option);
          }

          // init slider
          var html5Slider = document.getElementById('pc-no_ui_slider-4');

          noUiSlider.create(html5Slider, {
            start: [10, 30],
            connect: true,
            range: {
              min: -20,
              max: 40
            }
          });

          // init slider input
          var inputNumber = document.getElementById('pc-no_ui_slider-input-number');

          html5Slider.noUiSlider.on('update', function (values, handle) {
            var value = values[handle];

            if (handle) {
              inputNumber.value = value;
            } else {
              slider.value = Math.round(value);
            }
          });

          slider.addEventListener('change', function () {
            html5Slider.noUiSlider.set([this.value, null]);
          });

          inputNumber.addEventListener('change', function () {
            html5Slider.noUiSlider.set([null, this.value]);
          });
        })();
        (function () {
          // init slider
          var slider = document.getElementById('pc-no_ui_slider-5');

          noUiSlider.create(slider, {
            start: 20,
            range: {
              min: 0,
              max: 100
            },
            pips: {
              mode: 'values',
              values: [20, 80],
              density: 4
            }
          });

          var sliderInput = document.getElementById('pc-no_ui_slider-5-input');

          slider.noUiSlider.on('update', function (values, handle) {
            sliderInput.value = values[handle];
          });

          sliderInput.addEventListener('change', function () {
            slider.noUiSlider.set(this.value);
          });

          slider.noUiSlider.on('change', function (values, handle) {
            if (values[handle] < 20) {
              slider.noUiSlider.set(20);
            } else if (values[handle] > 80) {
              slider.noUiSlider.set(80);
            }
          });
        })();
        (function () {
          var verticalSlider = document.getElementById('pc-no_ui_slider-6');
          noUiSlider.create(verticalSlider, {
            orientation: 'vertical',
            start: 0,
            range: {
              min: [0, 1],
              max: 1
            },
            format: wNumb({
              decimals: 0
            })
          });
          verticalSlider.noUiSlider.on('update', function (values, handle) {
            if (values[handle] === '1') {
              verticalSlider.classList.add('off');
            } else {
              verticalSlider.classList.remove('off');
            }
          });
          var sliderInput = document.getElementById('pc-no_ui_slider-6-input');
          verticalSlider.noUiSlider.on('update', function (values, handle) {
            sliderInput.value = values[handle];
          });
          sliderInput.addEventListener('change', function () {
            verticalSlider.noUiSlider.set(this.value);
          });
        })();
        (function () {
          function timestamp(str) {
            return new Date(str).getTime();
          }
          var weekdays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

          var months = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
          ];

          function nth(d) {
            if (d > 3 && d < 21) return 'th';
            switch (d % 10) {
              case 1:
                return 'st';
              case 2:
                return 'nd';
              case 3:
                return 'rd';
              default:
                return 'th';
            }
          }

          function formatDate(date) {
            return (
              weekdays[date.getDay()] + ', ' + date.getDate() + nth(date.getDate()) + ' ' + months[date.getMonth()] + ' ' + date.getFullYear()
            );
          }
          var dateSlider = document.getElementById('pc-no_ui_slider-9');
          noUiSlider.create(dateSlider, {
            range: {
              min: timestamp('2010'),
              max: timestamp('2016')
            },
            step: 7 * 24 * 60 * 60 * 1000,
            start: [timestamp('2011'), timestamp('2015')],
            format: wNumb({
              decimals: 0
            })
          });

          var sliderInput0 = document.getElementById('event-start');
          var sliderInput1 = document.getElementById('event-end');
          var sliderInputs = [sliderInput1, sliderInput0];

          dateSlider.noUiSlider.on('update', function (values, handle) {
            sliderInputs[handle].value = formatDate(new Date(+values[handle]));
          });
        })();
        (function () {
          var pipsSlider = document.getElementById('pc-no_ui_slider-10');
          noUiSlider.create(pipsSlider, {
            range: {
              min: 0,
              max: 100
            },
            start: [50],
            pips: {
              mode: 'count',
              values: 5
            }
          });
          var pips = pipsSlider.querySelectorAll('.noUi-value');

          function clickOnPip() {
            var value = Number(this.getAttribute('data-value'));
            pipsSlider.noUiSlider.set(value);
          }
          for (var i = 0; i < pips.length; i++) {
            pips[i].style.cursor = 'pointer';
            pips[i].addEventListener('click', clickOnPip);
          }
          var sliderInput = document.getElementById('pc-no_ui_slider-10-input');
          pipsSlider.noUiSlider.on('update', function (values, handle) {
            sliderInput.value = values[handle];
          });
        })();
    </script>
@endif

@if (Route::is('doctor.request'))
<script>
    let appointmentId;
    let actionType;

    function setAppointmentId(id, action) {
        appointmentId = id;
        actionType = action;
        document.getElementById('appointment_id').value = id;
    }

    function confirmAction() {
        if (!appointmentId) return;

        let url = actionType === 'accept'
            ? `/doctor/appointment/${appointmentId}/accept`
            : `/doctor/appointment/${appointmentId}/decline`;

        // Redirect to the correct route
        window.location.href = url;
    }
</script>
@endif

@if (Route::is('prescription') || Route::is('prescription.edit'))
<script src="{{ asset('assets/js/prescription-upload-image.js') }}"></script>
@endif

@if (Route::is('weight-loss-calculator'))
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const nextBtns = document.querySelectorAll('.next_btns');
        const prevBtns = document.querySelectorAll('.prev_btns');
        const fieldsets = document.querySelectorAll('fieldset');
        const steps = document.querySelectorAll('#progressbar2 li');

        let currentStep = 0;

        function updateForm(step) {
            // Ẩn tất cả fieldset
            fieldsets.forEach(f => f.style.display = 'none');
            // Hiện fieldset hiện tại
            fieldsets[step].style.display = 'block';

            // Cập nhật class "progress-active"
            steps.forEach((stepEl, index) => {
                if (index <= step) {
                    stepEl.classList.add('progress-active');
                } else {
                    stepEl.classList.remove('progress-active');
                }
            });
        }

        nextBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                if (currentStep < fieldsets.length - 1) {
                    currentStep++;
                    updateForm(currentStep);
                }
            });
        });

        prevBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                if (currentStep > 0) {
                    currentStep--;
                    updateForm(currentStep);
                }
            });
        });

        // Khởi tạo ban đầu
        updateForm(currentStep);
    });
</script>
@endif
