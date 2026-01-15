<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Appointment Confirmation</title>
</head>

<body style="font-family: Arial, sans-serif; background:#f4f7fb; padding:0; margin:0;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f7fb; padding: 30px 0;">
        <tr>
            <td align="center">

                <!-- Card -->
                <table width="600" cellpadding="0" cellspacing="0"
                    style="background:#ffffff; border-radius: 6px; overflow:hidden;">

                    <!-- Logo -->
                    <!-- Header -->
                    <tr>
                        <td style="padding:20px 30px;">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <!-- LOGO LEFT -->
                                    <td width="50%" align="left" style="vertical-align:middle;">
                                       <a href="https://diagnoedgelabs.com/" target="_blank">
                                         <img src="https://diagnoedgelabs.com/assets/images/logo/diagno-logo.png"
                                            width="150" alt="Diagnoedge Logo" style="display:block;">
                                       </a>
                                    </td>

                                    <!-- CONTACT INFO RIGHT -->
                                    <td width="50%" align="right" style="vertical-align:middle;">
                                        <table cellpadding="0" cellspacing="0"
                                            style="font-size:14px; color:#334155; text-align:right;">
                                            <tr>
                                                <td>📍 Baltana, Zirakpur</td>
                                            </tr>

                                            <tr>
                                                <td><a href="tel:+91 98765 12345" target="_blank">📞 +91 98765 12345</a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="mailto:info@diagnoedgelabs.com" target="_blank">✉️ info@diagnoedgelabs.com</a></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>


                    <!-- Green Header -->
                    <tr>
                        <td style="background:#4CAF50; padding:25px; color:#ffffff;">
                            <span style="font-size:22px; font-weight:bold;">
                                Hello {{ $appointment->fullname }},
                            </span>
                            <br>
                            <span style="font-size:18px;">
                                This is your booking confirmation!
                            </span>
                        </td>
                    </tr>



                    <!-- Details Box -->
                    <tr>
                        <td style="padding:25px 30px ">
                            <table width="100%" cellpadding="8" cellspacing="0"
                                style=" border:1px solid #d0d7e6; border-radius:6px; font-size:14px; color:#334155; border-collapse:collapse;">

                                <!-- Header Row -->
                                <tr style="background:#e8eef9; font-weight:bold; color:#2e3f5a;">
                                    <td style="border-bottom:1px solid #d0d7e6; font-size:18px; text-transform: uppercase;" colspan="3">PATIENT'S INFORMATION</td>

                                </tr>
                                <!-- Row 2 -->
                                <tr>

                                    <td style="border-bottom:1px solid #d0d7e6;">Phone</td>
                                    <td style="border-bottom:1px solid #d0d7e6;">{{ $appointment->phone }}</td>
                                </tr>

                                <!-- Header Row -->
                                <tr style="background:#e8eef9; font-weight:bold; color:#2e3f5a;">
                                    <td style="border-bottom:1px solid #d0d7e6;">Email</td>
                                    <td style="border-bottom:1px solid #d0d7e6;">{{ $appointment->email }}</td>
                                </tr>
                               

                                <!-- Row 1 -->
                                <tr >
                                    <td style="border-bottom:1px solid #d0d7e6;">Package / Test</td>
                                    <td style="border-bottom:1px solid #d0d7e6;">{{ $appointment->selectdepartment }}
                                    </td>
                                </tr>

                                <!-- Header Row -->
                                <tr style="background:#e8eef9; font-weight:bold; color:#2e3f5a;">
                                    <td style="border-bottom:1px solid #d0d7e6;">Appointment Date</td>
                                    <td style="border-bottom:1px solid #d0d7e6;">
                                        {{ \Carbon\Carbon::parse($appointment->appointmentdate)->format('d M, Y') }}
                                    </td>
                                </tr>





                            </table>
                        </td>


                    </tr>
                    <!-- Main Message -->
                    <tr>
                        <td style="padding:25px 30px; color:#51627a; font-size:15px; line-height:1.7;">
                            We look forward to welcoming you for your test/appointment on
                            <strong>{{ \Carbon\Carbon::parse($appointment->appointmentdate)->format('d M, Y') }}</strong>.
                            <br><br>
                            Our team is committed to ensuring your experience is comfortable, smooth, and reliable.
                            If you have any questions before your visit, feel free to contact us anytime.
                            <br><br>
                            Thanks & Best Regards,<br>
                            <strong>Team Diagnoedge</strong>
                        </td>
                    </tr>
                    <!-- Contact Button -->
                    <tr>
                        <td align="center" style="padding-bottom:25px;">
                            <a href="https://diagnoedgelabs.com/contact-us" style="background:#4CAF50; color:#ffffff; padding:12px 25px; border-radius:4px;
                                       text-decoration:none; font-size:14px; display:inline-block;" target="_blank">
                                Contact Us
                            </a>
                        </td>
                    </tr>

                   

                    <!-- Footer -->
                    <tr>
                        <td align="center" style="background:#f4f7fb; padding:20px; color:#9aa3b5; font-size:12px;">
                            © {{ date('Y') }} Diagnoedge Diagnostics — Reliable • Accurate • Trustworthy
                        </td>
                    </tr>

                </table>
                <!-- End Card -->

            </td>
        </tr>
    </table>
</body>

</html>