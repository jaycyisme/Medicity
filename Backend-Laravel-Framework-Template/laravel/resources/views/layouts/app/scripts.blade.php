
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
@if (Route::is('dashboard') && Auth::user()->hasRole('Quản trị viên'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        const startDateInput = document.getElementById('start-date');
        const endDateInput = document.getElementById('end-date');

        function fetchRevenueData(start = null, end = null) {
            let url = '/api/appointment-revenue';
            if (start && end) {
            url += `?start_date=${start}&end_date=${end}`;
            }

            fetch(url)
            .then(res => res.json())
            .then(data => {
                document.querySelector('.card-body h3').innerHTML = `$${data.totalRevenue.toFixed(2)}`;
                updateChart(data.monthlyRevenue);
            });
        }

        function updateChart(data) {
            chart.updateSeries([{ data }]);
        }

        startDateInput.addEventListener('change', () => {
            if (startDateInput.value && endDateInput.value) {
            fetchRevenueData(startDateInput.value, endDateInput.value);
            }
        });

        endDateInput.addEventListener('change', () => {
            if (startDateInput.value && endDateInput.value) {
            fetchRevenueData(startDateInput.value, endDateInput.value);
            }
        });

        // Initial chart load
        fetchRevenueData();
        });
    </script>

    <script>
        let chart;

        document.addEventListener('DOMContentLoaded', function () {
        initChart();
        fetchRevenueData();

        document.getElementById('start-date').addEventListener('change', handleDateChange);
        document.getElementById('end-date').addEventListener('change', handleDateChange);
        });

        function handleDateChange() {
        const start = document.getElementById('start-date').value;
        const end = document.getElementById('end-date').value;
        if (start && end) {
            fetchRevenueData(start, end);
        }
        }

        function initChart() {
        const options = {
            chart: {
            type: 'area',
            height: 230,
            toolbar: { show: false }
            },
            colors: ['#0d6efd'],
            fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                type: 'vertical',
                inverseColors: false,
                opacityFrom: 0.5,
                opacityTo: 0
            }
            },
            dataLabels: { enabled: false },
            stroke: { width: 1 },
            grid: { strokeDashArray: 4 },
            series: [{
            name: 'Monthly Revenue',
            data: Array(12).fill(0)
            }],
            xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            labels: { hideOverlappingLabels: true },
            axisBorder: { show: false },
            axisTicks: { show: false }
            }
        };
        chart = new ApexCharts(document.querySelector('#customer-rate-graph'), options);
        chart.render();
        }

        function fetchRevenueData(start = null, end = null) {
        let url = '/api/appointment-revenue';
        if (start && end) {
            url += `?start_date=${start}&end_date=${end}`;
        }

        fetch(url)
            .then(res => res.json())
            .then(data => {
            document.getElementById('total-revenue').innerText = `$${data.totalRevenue.toFixed(2)}`;
            if (chart && data.monthlyRevenue) {
                chart.updateSeries([{ name: 'Monthly Revenue', data: data.monthlyRevenue }]);
            }
            })
            .catch(() => {
            //   alert('Failed to load revenue data.');
            });
        }
    </script>


    <script>
        let chart_reports;

        document.addEventListener('DOMContentLoaded', function () {
        initOrderChart();        // Khởi tạo biểu đồ
        fetchOrderRevenue();     // Lấy dữ liệu mặc định

        // Gắn sự kiện chọn ngày
        document.getElementById('order-start').addEventListener('change', handleDateFilter);
        document.getElementById('order-end').addEventListener('change', handleDateFilter);
        });

        function handleDateFilter() {
        const start = document.getElementById('order-start').value;
        const end = document.getElementById('order-end').value;
        if (start && end) fetchOrderRevenue(start, end);
        }

        function initOrderChart() {
        const options = {
            chart: {
            type: 'area',
            height: 250,
            toolbar: { show: false }
            },
            colors: ['#1DE9B6'],
            fill: {
            type: 'gradient',
            gradient: {
                type: 'vertical',
                shadeIntensity: 0.5,
                gradientToColors: ['#1DC4E9']
            }
            },
            dataLabels: { enabled: false },
            stroke: { width: 1 },
            grid: { strokeDashArray: 4 },
            series: [{
            name: "Monthly Revenue",
            data: Array(12).fill(0)
            }],
            xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            labels: { hideOverlappingLabels: true },
            axisBorder: { show: false },
            axisTicks: { show: false }
            }
        };

        chart_reports = new ApexCharts(document.querySelector('#reports-chart'), options);
        chart_reports.render();
        }

        function fetchOrderRevenue(start = null, end = null) {
        let url = '/api/order-revenue';
        if (start && end) {
            url += `?start_date=${start}&end_date=${end}`;
        }

        fetch(url)
            .then(res => res.json())
            .then(data => {
            document.getElementById('order-total').innerText = `$ ${data.totalRevenue.toFixed(2)}`;
            chart_reports.updateSeries([{ name: 'Monthly Revenue', data: data.monthlyRevenue }]);
            })
            .catch(() => alert('Failed to load order revenue data.'));
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
        fetch('/api/total-revenue-summary')
            .then(res => res.json())
            .then(data => {
            document.getElementById('daily-revenue').innerText = `$${data.daily.toFixed(2)}`;
            document.getElementById('monthly-revenue').innerText = `$${data.monthly.toFixed(2)}`;
            document.getElementById('yearly-revenue').innerText = `$${data.yearly.toFixed(2)}`;
            })
            .catch(() => {
            alert('Failed to load revenue summary.');
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
        fetch('/api/weekly-revenue')
            .then(res => res.json())
            .then(data => {
            for (const [day, total] of Object.entries(data)) {
                const targetId = `earnings-${day.toLowerCase()}`; // eg. earnings-mon
                const earningBlock = document.querySelector(`#${targetId} h3.mb-0.text-white`);
                if (earningBlock) {
                earningBlock.innerText = total.toLocaleString('en-US', {
                    style: 'currency',
                    currency: 'USD'
                });
                }
            }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
        fetch('/api/total-counts')
            .then(res => res.json())
            .then(data => {
            document.getElementById('total-orders').innerText = data.orders;
            document.getElementById('total-appointments').innerText = data.appointments;
            })
            .catch(() => console.warn("Could not fetch order & appointment counts."));
        });
    </script>

    <script>
        let chart_total_sales;

        document.addEventListener('DOMContentLoaded', function () {
        fetch('/api/order-type-revenue')
            .then(res => res.json())
            .then(data => {
            // Cập nhật số liệu tổng
            document.getElementById('total-sales-value').innerText = `$ ${data.total.toFixed(2)}`;
            document.getElementById('online-sales-value').innerText = `$ ${data.online.toFixed(2)}`;
            document.getElementById('instore-sales-value').innerText = `$ ${data.instore.toFixed(2)}`;

            // Khởi tạo hoặc cập nhật chart
            if (chart_total_sales) {
                chart_total_sales.updateSeries([
                { name: "Online", data: data.monthly.online },
                { name: "In-store", data: data.monthly.instore }
                ]);
            } else {
                const options_total_sales = {
                chart: {
                    type: 'line',
                    height: 265,
                    toolbar: { show: false }
                },
                colors: ['#0d6efd','#748892'],
                dataLabels: { enabled: false },
                stroke: { width: 2 },
                grid: { strokeDashArray: 4 },
                series: [
                    { name: "Online", data: data.monthly.online },
                    { name: "In-store", data: data.monthly.instore }
                ],
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    labels: { hideOverlappingLabels: true },
                    axisBorder: { show: false },
                    axisTicks: { show: false }
                },
                responsive: [{
                    breakpoint: 1182,
                    options: { chart: { height: 230 } }
                }]
                };

                chart_total_sales = new ApexCharts(
                document.querySelector('#total-sales-chart'),
                options_total_sales
                );
                chart_total_sales.render();
            }
            })
            .catch(() => console.warn("Failed to fetch sales data"));
        });
    </script>

    <script>
        var options_performance = {
        chart: {
            height: 250,
            type: 'donut'
        },
        series: [27, 23, 20, 17],
        colors: ['#04A9F5', '#F4C22B', '#1DE9B6', '#04A9F5'],
        labels: ['Total income', 'Total rent', 'Download', 'Views'],
        fill: {
            opacity: [1, 1, 1, 0.3]
        },
        legend: {
            show: false
        },
        plotOptions: {
            pie: {
            donut: {
                size: '65%',
                labels: {
                show: true,
                name: {
                    show: true
                },
                value: {
                    show: true
                }
                }
            }
            }
        },
        dataLabels: {
            enabled: false
        },
        responsive: [
            {
            breakpoint: 575,
            options: {
                chart: {
                height: 250
                },
                plotOptions: {
                pie: {
                    donut: {
                    size: '65%',
                    labels: {
                        show: false
                    }
                    }
                }
                }
            }
            },
            {
            breakpoint: 1182,
            options: {
                chart: {
                height: 190
                },
            }
            }
        ]
        };
        var chart_performance = new ApexCharts(document.querySelector('#performance-chart'), options_performance);
        chart_performance.render();
    </script>

    <script>
        var options_overview_bar = {
        chart: { type: 'bar', height: 150, sparkline: { enabled: true } },
        colors: ['#F44236', '#04A9F5', '#673ab7', '#1DE9B6', '#F4C22B', '#3EBFEA'],
        plotOptions: { bar: { borderRadius: 2, columnWidth: '80%', distributed: true} },
        series: [
            {
            data: [10, 30, 40, 20, 60, 50]
            }
        ],
        xaxis: { crosshairs: { width: 1 } },
        tooltip: {
            fixed: { enabled: false },
            x: { show: false },
            y: {
            title: {
                formatter: function (seriesName) {
                return '';
                }
            }
            },
            marker: { show: false }
        }
        };
        var chart_overview_bar = new ApexCharts(document.querySelector('#overview-bar-chart'), options_overview_bar);
        chart_overview_bar.render();
    </script>
@endif

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
