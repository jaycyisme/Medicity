<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Appointment Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .appointment-details, .payment-details {
            margin-bottom: 20px;
        }
        .appointment-details th, .appointment-details td, .payment-details th, .payment-details td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .appointment-details th, .payment-details th {
            background-color: #f8f8f8;
        }
        .footer {
            text-align: center;
            font-size: 14px;
            color: #888;
            margin-top: 20px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Appointment Confirmation</h2>
            <p>Thank you for booking an appointment with Dr. {{$appointment->doctor->name}}!</p>
        </div>

        <!-- Appointment Details -->
        <div class="appointment-details">
            <h3>Appointment Details</h3>
            <table width="100%">
                <tr>
                    <th>Appointment Code</th>
                    <td>{{ $appointment->appointment_code }}</td>
                </tr>
                <tr>
                    <th>Doctor</th>
                    <td>{{ $appointment->doctor->name }}</td>
                </tr>
                <tr>
                    <th>Specialty</th>
                    <td>{{ $appointment->speciality->name }}</td>
                </tr>
                <tr>
                    <th>Appointment Date & Time</th>
                    <td>{{ $formattedDateTime }}</td>
                </tr>
                <tr>
                    <th>Clinic</th>
                    <td>{{ $appointment->clinic ? $appointment->clinic->name : 'Not Set' }}</td>
                </tr>
                <tr>
                    <th>Service</th>
                    <td>{{ $appointment->service ? $appointment->service->name : 'Not Set' }}</td>
                </tr>
                <tr>
                    <th>Patient Name</th>
                    <td>{{ $appointment->patient_name }}</td>
                </tr>
                <tr>
                    <th>Patient Phone</th>
                    <td>{{ $appointment->patient_phone }}</td>
                </tr>
                <tr>
                    <th>Patient Email</th>
                    <td>{{ $appointment->patient_email }}</td>
                </tr>
                <tr>
                    <th>Symptoms</th>
                    <td>{{ $appointment->patient_symptoms }}</td>
                </tr>
            </table>
        </div>

        <!-- Payment Details -->
        <div class="payment-details">
            <h3>Payment Details</h3>
            <table width="100%">
                <tr>
                    <th>Price</th>
                    <td>{{ number_format($appointment->appointment_price, 0, ',', '.') }} VND</td>
                </tr>
                <tr>
                    <th>Tax</th>
                    <td>{{ number_format($appointment->appointment_tax, 0, ',', '.') }} VND</td>
                </tr>
                <tr>
                    <th>Discount</th>
                    <td>{{ number_format($appointment->appointment_discount, 0, ',', '.') }} VND</td>
                </tr>
                <tr>
                    <th>Final Price</th>
                    <td>{{ number_format($appointment->appointment_final_price, 0, ',', '.') }} VND</td>
                </tr>
            </table>
        </div>

        <div class="footer">
            <p>If you have any questions, feel free to contact us.</p>
            <a href="medicity.top" class="button" style="color: black;">Visit Our Website</a>
        </div>
    </div>
</body>
</html>
