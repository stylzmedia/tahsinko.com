<table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';background-color:#edf2f7;margin:0;padding:0;width:100%">
    <tbody>
    <tr>
        @php
    // dd($product->img_paths['small']);
        @endphp
        <td align="center" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'">
            <table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';margin:0;padding:0;width:100%">
                <tbody>
                <tr>
                    <td style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';padding:25px 0;text-align:center">
                        <a href="{{route('homepage')}}" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';color:#3d4852;font-size:19px;font-weight:bold;text-decoration:none;display:inline-block" target="_blank"
                           data-saferedirecturl="https://www.google.com/url?q={{$settings_g['logo'] ?? ''}}">

                           @if(isset($settings_g['logo']) && $settings_g['logo'])
                            <img src="{{$settings_g['logo'] ?? env('APP_NAME')}}" alt="{{$settings_g['title'] ?? env('APP_NAME')}}" height="50">
                        @else
                            {{$settings_g['title'] ?? ''}}
                        @endif

                           {{-- <img src="{{ asset('uploads/info/'.$logo) }}" alt="Logo" height="50"/>  --}}
                           {{--{{env('APP_NAME')}}--}}
                        </a>
                    </td>
                </tr>
                <tr>
                    <td width="100%" cellpadding="0" cellspacing="0" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';background-color:#edf2f7;border-bottom:1px solid #edf2f7;border-top:1px solid #edf2f7;margin:0;padding:0;width:100%">
                        <table align="center" width="570" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';background-color:#ffffff;border-color:#e8e5ef;border-radius:2px;border-width:1px;margin:0 auto;padding:0;width:570px">
                            <tbody>
                            <tr>
                                <td style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';max-width:100vw;padding:32px">
                                    <p>Dear {{$order->name}},</p>
                                    <p>Thank you for selecting TAHSINKO Lift Brand as your trusted partner to elevate your project building's branding presence and take it to new heights. We are thrilled to have you join our family!</p>

                                      <p>Your Journey with TAHSINKO:</p>
                                        <p>
                                            At TAHSINKO, we are dedicated to providing exceptional services and cutting-edge solutions to help your project building shine in the digital landscape. We are excited to embark on this journey together.
                                        </p>
                                      <p>What's Next:</p>
                                        <p>
                                            <b>Feedback and Communication:</b> Your satisfaction is our utmost priority. Our dedicated team is eager to hear your thoughts and gain a deep understanding of your unique needs. We will be in touch shortly to discuss your requirements in detail. Your feedback and ideas are invaluable to us.
                                        </p>

                                        <p>
                                            <b>Personalized Quote:</b> Our skilled technical team is already hard at work, crafting a tailored quote that perfectly aligns with your building's elevator goals and aspirations. You can expect to receive a comprehensive quote shortly, outlining the scope of services and the benefits you can anticipate from our partnership.

                                        </p>

                                       <p>
                                        <b>Ongoing Support:</b> Throughout our collaboration, we will provide consistent updates, clear communication, and expert guidance. Our technical experts are readily available to address any queries you may have.
                                       </p>

                                        <p>Stay Connected:</p>

                                       <p>
                                        Stay updated on industry trends, success stories, and exciting offers by following us on social media: <a href="https://www.facebook.com/tahsinkolimited/" target="_blank" rel="noopener noreferrer">TAHSINKO Lift & Escalator</a>
                                       </p>
                                       <p>
                                        We are genuinely excited to be part of your project and eagerly anticipate working closely with you to achieve extraordinary results. If you have any immediate questions or specific insights to share, please don't hesitate to reach out.
                                       </p>

                                       <p>
                                        Thank you once again for choosing TAHSINKO Elevators. Get ready to witness your brand ascend to new heights!
                                       </p>
                                        <br>
                                        <br>
                                        Best Regards,
                                        <br>
                                        TAHSINKO
                                        <br>
                                        <br>
                                        Rest assured, your success is our primary goal. Let's collaborate to create something truly remarkable!

                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="" style="text-align:center;font-weight: 800;font-size:16px;background-color:#ffffff;border-width:1px;margin:0 auto;padding:0;width:570px;font-weight: 600;">
                            Your Requested Product Details
                        </div>
                        <div class="" style="font-size: 16px;background-color: #ffffff;border-width: 1px;margin: 0 auto;padding: 0;width: 570px;font-weight: 600;">
                        <p style="padding-left: 25px;margin: 0;font-size: 15px;font-weight: 300;">Project Name: {{$order->company}}</p>
                        <p style="padding-left: 25px;margin: 0;font-size: 15px;font-weight: 300;">Project Address:{{$order->address}}</p>
                        <p style="padding-left: 25px;margin: 0;font-size: 15px;font-weight: 300;">Contact Number: {{$order->mobile}}</p>
                        </div>
                        <table align="center" width="570" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';background-color:#ffffff;border-color:#e8e5ef;border-radius:2px;border-width:1px;margin:0 auto;padding:0;width:570px">
                            <thead>
                                <tr>
                                    <th style="padding: 10px; text-align: left; border-bottom: 1px solid #ccc;">Product Title</th>
                                    <th style="padding: 10px; text-align: center; border-bottom: 1px solid #ccc;">Product Image</th>
                                    <th style="padding: 10px; text-align: center; border-bottom: 1px solid #ccc;">Stop/Opening</th>
                                    <th style="padding: 10px; text-align: center; border-bottom: 1px solid #ccc;">Capacity (Person)</th>
                                    <th style="padding: 10px; text-align: center; border-bottom: 1px solid #ccc;">Machine Room</th>
                                    <th style="padding: 10px; text-align: center; border-bottom: 1px solid #ccc;">Head Room</th>
                                    <th style="padding: 10px; text-align: center; border-bottom: 1px solid #ccc;">PIT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Example row 1 -->
                                <tr>
                                    <td style="padding: 10px; border-bottom: 1px solid #ccc;">{{ $order->product_name }}</td>
                                    <td style="padding: 10px; text-align: center; border-bottom: 1px solid #ccc;"><img src="{{ $product->img_paths['small'] }}" alt="{{ $order->product_name }}" width="50" height="auto"></td>
                                    <td style="padding: 10px; text-align: center; border-bottom: 1px solid #ccc;">{{ $order->stop_opening }}</td>
                                    <td style="padding: 10px; text-align: center; border-bottom: 1px solid #ccc;">{{ $order->capacity }}</td>
                                    <td style="padding: 10px; text-align: center; border-bottom: 1px solid #ccc;">{{ $order->machine_room }}</td>
                                    <td style="padding: 10px; text-align: center; border-bottom: 1px solid #ccc;">{{ $order->head_room }}</td>
                                    <td style="padding: 10px; text-align: center; border-bottom: 1px solid #ccc;">{{ $order->pit }}</td>
                                </tr>
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>

                    </td>
                </tr>
                <tr>
                    <td style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'">
                        <table align="center" width="570" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';margin:0 auto;padding:0;text-align:center;width:570px">
                            <tbody>
                            <tr>
                                <td align="center" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';max-width:100vw;padding:32px">
                                    <p style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';line-height:1.5em;margin-top:0;color:#b0adc5;font-size:12px;text-align:center">© {{date('Y')}} {{env('APP_NAME')}}. All rights reserved.</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
