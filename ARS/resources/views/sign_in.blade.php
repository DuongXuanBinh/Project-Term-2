@extends('layout.normal')
@section('title','Sign-In')

@section('body')
    <form action="sign-in/forgot">
        @csrf
        <div class="modal fade password-change" id="forgot" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="top: 100px">
                    <div class="modal-header">
                        <h5 class="modal-title">RESET PASSWORD</h5>
                        <button type="button" style="margin-top: -24px;padding-left: 180px" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body" style="text-align: center">
                        <label style="font-weight: normal">Enter you email: </label>
                        <input type="email" name="forgot_email">
                        <p style="margin-bottom: 0;margin-top: 10px">Please check your mail for validation code</p>
                    </div>
                    <div class="modal-footer" style="text-align: center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width: 30%">Close</button>
                        <button type="submit" class="btn btn-primary" style="width: 30%">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @if(session('signUp-notif'))
        <div class="modal fade password-change" id="notification" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="top: 100px">
                    <div class="modal-header">
                        <h5 class="modal-title" style="margin-left: 217px">NOTIFICATION</h5>
                        <button type="button" style="margin-top: -24px" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body" style="text-align: center">
                        <p style="margin-bottom: 0">{{session('signUp-notif')}}</p>
                    </div>
                    <div class="modal-footer" style="text-align: center">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="height:625px;background-image: url(front/images/ErCSon6XMAYN7jw.jpg)">
        <div class="overlay"></div>
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-12 col-md-offset-0 text-center">
                    <div class="row row-mt-15em">

                        <div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
                            <h1>Sign In</h1>
                        </div>
                        @foreach($errors->all() as $error)
                            <div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp" style="margin-bottom: 0;margin-top: 0;">
                                <h5 style="color: #ffd700;font-style: italic">{{$error}}</h5>
                            </div>
                        @endforeach
                            <form class="form-signin" action="sign-in/authorize" method="post">
                                @csrf
                                <div class=" mt-text animate-box" data-animate-effect="fadeInUp">
                                    <label for="inputEmail" class="sr-only">Email address</label>
                                    <input type="email" name="si_email" id="inputEmail" class="form-control" placeholder="Email address" value="{{old('si_email')}}" required autofocus>
                                </div>
                                <div class=" mt-text animate-box" data-animate-effect="fadeInUp">
                                    <label for="inputPassword" class="sr-only">Password</label>
                                    <input type="password" name="si_password" id="inputPassword" class="form-control" value="" placeholder="Password" required>
                                </div>
                                <div class=" mt-text animate-box" data-animate-effect="fadeInUp">
                                    <div class="checkbox mb-3">
                                        <label  style="color: white">
                                            <input type="checkbox" name="remember" value="remember-me"> Remember me
                                        </label>
                                    </div>
                                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                                    <a style="cursor: pointer" data-toggle="modal" data-target="#forgot"><p><span class=" dp_sign_up1">Forgot your password?</span></p></a>

                                    <p>Don't have account yet? Sign up <span class=" dp_sign_up">here</span></p>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="gtco-section sign_up">
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-12 mt-text">
                    <h1 class="su-text">Sign Up</h1>
                    <form action="/sign-in/register" class="form-signup" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6" style="padding-right: 0">
                                <div class="row col-md-12">
                                    <label for="su-firstname" class="">First Name</label>
                                </div>
                                <div class="row col-md-12">
                                    <input name="firstname" type="text" id="su-firstname" class="form-control" placeholder="First Name" required>
                                </div>
                            </div>
                            <div class="col-md-6" style="padding: 0">
                                <div class="row col-md-12">
                                    <label for="su-lastname" class="">Last Name</label>
                                </div>
                                <div class="row col-md-12"  style="padding-right: 0">
                                    <input name="lastname" type="text" id="su-lastname" class="form-control" placeholder="Last Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" style="padding-right: 0">
                                <div class="row col-md-12">
                                    <label for="su-phonenumber" class="su-phonenumber">Phone Number</label>
                                </div>
                                <div class="row col-md-12">
                                    <input name="phone" type="tel" pattern="^0[0-9]{9}" id="su-phonenumber" class="form-control" placeholder="Phone Number" required><svg  style="position: absolute;top: 23px;left: 277px;display: none" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#09c5a9" class="bi bi-check2 su-phonenumber" viewBox="0 0 16 16">
                                        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="col-md-6" style="padding-right: 0;padding-left: 0">
                                <div class="row col-md-12">
                                    <label for="su-creditcard" class="su-creditcard">Credit Card</label><br>
                                </div>
                                <div class="row col-md-12"  style="padding-right: 0">
                                    <input name="credit_number" type="text" pattern="[0-9]{10}" id="su-creditcard" class="form-control" placeholder="Credit Card Number" required><svg style="position: absolute;top: 23px;left: 300px;display: none" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#09c5a9" class="bi bi-check2 su-creditcard" viewBox="0 0 16 16">
                                        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <label for="su-sexs" class="">Gender</label>
                        <label for="su-age" class="">D.O.B</label><br>
                        <input name="sex" id="su-sex" list="su-sexs" class="form-control" placeholder="Gender" required>
                        <datalist id="su-sexs">
                            <option value="Male">
                            <option value="Female">
                        </datalist>
                        <input name="dob" type="date" data-toggle="datepicker" id="su-age" class="form-control" placeholder="Date Of Birth" required>


                        <label for="su-address" class="">Address</label>
                        <input name="address" type="text" id="su-address" class="form-control" placeholder="Address" required>


                        <label for="su-email" class="su-email">Email</label>
                        <input name="email" type="email" id="su-email" class="form-control" placeholder="Email Address" required><svg style="position: absolute;top: 557px;left: 838px;display: none" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#09c5a9" class="bi bi-check2 su-email" viewBox="0 0 16 16">
                            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                        </svg>

                        <label for="su-password" class="su-password">Password <i>(numbers and characters, 6 digits)</i></label>
                        <input name="password" type="password" id="su-password" pattern="[A-Za-z0-9]{6,}" class="form-control" placeholder="Password" required>

                        <label for="su-password1" class="su-password1">Confirm Password</label>
                        <input name="su_cfpassword" type="password" id="su-password1" class="form-control" placeholder="Confirm Password" required><svg style="position: absolute;top: 755px;left: 840px;display: none" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#09c5a9" class="bi bi-check2 su-password1" viewBox="0 0 16 16">
                            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/></svg>

                        <div class="policy-box">
                            <p>Your Privacy Rights — Helvetic's Privacy Policy</p>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Introduction
                                This web site (“Site”) is owned and operated by VolunteerSpot, Inc., dba, SignUp.com (referred to as “SignUp.com” herein). Signup.com has created this Privacy Policy in order to help you understand what data we collect, why we collect it, and what we do with it. This Privacy Policy applies to the information we collect when you use our “Services”, which means any website, mobile website, application or service we offer, or when you communicate with us. For information about choices we offer under this Policy, please see “Your Choices” below. We encourage you to read this Policy carefully when using our Services or transacting business with us. Any questions regarding this Policy should be directed by email to privacy@SignUp.com.

                                Information we receive about you
                                We collect information about you when you create an account, use our Services and communicate with us. We also collect information, such as usage statistics, by using cookies, server logs and similar technologies. Some of it is personally identifying, some is not.

                                Information you provide. We may collect and store any personal information from you that you enter on our Services or that is provided to us in some other manner. This includes identifying information such as your first and last name, title, email address, telephone number, address, and if you transact business with us, financial information such as your payment method (valid credit card number, type, expiration date or other financial information). We may also request non-personal information such as the activity types you organize, your location, school address, organization types you support, service hours, or we may ask you complete a survey or send us a review.
                                Information you provide about others. We collect and store personal information about other people that you provide to us through your use of our Services as a SignUp Organizer (or as a Participant signing up others) in inviting them to your SignUps or in creating Contact Lists or sending messages. We use Participant’s contact information which may include first and last name, email address and phone number to invite them to your SignUps, allow them to sign up and comment on your activities, and send follow-up communication such as confirmation and reminder messages. At your direction, the SignUp may display the names and initials of Participants who have signed up. All of your Participants may request that you delete their name from a Participant or Contact List by messaging you through the Service or by emailing support@signup.com and requesting to be removed from our database.
                                Information others share about you. We receive certain personal information about you from other users when Organizers enter your contact information or invite you to a SignUp. In addition, a SignUp Organizer may have Assistant Organizers who are able to see the SignUp’s Participant information which may contain your name, email address, phone number and answers to questions asked by the Organizer. You may request that an Organizer delete your name from a Participant or Contact List by messaging the SignUp Organizer through the Service or by emailing support@signup.com and requesting to be removed from our database.
                                Information from social network services (including Facebook). If you register or log into your account through a third-party social media service such as Facebook or Google, we will have access to some of your third-party account information from that service in authenticating your identity including your name, email address, and other information in that account, as authorized by that service. You have the ability to disable the connection between our Service and your third-party account at any time or adjust the privacy settings on those services.
                                Information we collect automatically from your use of the Service. When you use our service, we automatically receive information from the browser, computer and/or device from which you visit our Services. This information may include:
                                Login information: We collect information about your use of the platform (without limitation), your IP address, your browser type and language, access times, the content of any undeleted “Cookies” that your browser previously accepted from us, pages viewed, and the page you visited before visiting our Service.
                                Device information: We collect information about the computer or device you use to visit our Service including hardware model, operating system and version, unique device identifiers and mobile network information.
                                Location information: We collect information about the location of your computer or device each time you use our Service, or when you otherwise provide this information.
                                Information from cookies and similar technologies: We and our service providers collect information using various technologies including cookies and pixel tags which help facilitate your access to our Services and to personalize your online experience. Through the use of a cookie or similar technology, we also automatically collect information about your online activity on our Services, such as the web pages you visit and the links you click. We may also include tracking pixels in promotional or other email messages and newsletters to determine whether messages have been opened and if links in the messages have been clicked. The information we obtain from cookies and other technologies enables us to customize our Services, to deliver targeted advertisements, and to measure the overall effectiveness of our Services, content and advertising. We and third-party vendors, including Google, use first-party cookies (such as the Google Analytics cookie) and third-party cookies (such as a DoubleClick cookie) together to report how your ad impressions, other uses of ad services, and interactions with these ad impressions and ad services are related to visits to our Services. Additionally, SignUp.com or a data provider we have engaged may place or recognize a unique cookie on your browser or email to enable you to receive customized ads or content on unaffiliated websites, apps, or online services for advertising, analytics, attribution, and reporting purposes. These cookies may include IP address, browser or operating system type and version, or inferred-interest information. The cookies may reflect demographic or other data linked to data you voluntarily have submitted to SignUp.com, e.g., your email address, that we may share with a data provider solely in hashed, non-human readable form that can NOT be decoded to personally identify you.
                                Information collected by third parties. We may allow our authorized service providers, advertising companies, and ad networks, to display advertisements on our Services and/or use tracking technologies to collect information about users who view or interact with their advertisements or use the Service. Our Services do not provide or grant access to any personally identifying information to these third party advertisers. The tracking technologies allow the third parties to deliver targeted advertisements and gauge their effectiveness. Some of these third-party advertising companies may be interest-based advertising companies that may use cookies to collect non-personally identifiable information during your visit to the Service in order to help show advertisements on other websites likely to be more interesting to you.
                                How we use the information we collect
                                We may use the information we collect about you to:

                                operate our Services including delivering invitations, updates and messages, processing transactions, and personalizing Services for you.
                                share information you have voluntarily provided about yourself with your SignUp Participants in your role as a SignUp Organizer.
                                share information you have voluntarily provided about yourself with your SignUp Organizer and other Participants who have been invited to the same SignUp.
                                manage your account, respond to comments, questions and requests, and provide you with customer service.
                                monitor and analyze trends in usage of our Services.
                                send you technical notices, product updates, security alerts and support and administrative messages.
                                communicate with you by email or mobile devices about products or services that may be of interest to you either from us, our business partners or other third parties.
                                develop and display advertising tailored to your activities on our Services and other sites.
                                enforce our Terms of Service.
                                manage our business and perform functions as otherwise described to you at the time of collection.
                                How we share the information we collect
                                We may share or disclose information provided by you or that we have collected about you or your SignUps on our Services as described in the Privacy Policy or with your consent.

                                Information shared with other Participants. People invited to the same SignUp as you may be able to view the personal information you provide when signing up, or provided by the Organizer when you were given an assignment manually, including your name, initials and comments.
                                Information shared with SignUp Organizers. Primary Organizers and Assistant Organizers of your same SignUps will be able to view your personal information including name, email, phone number, activity information and service hours, comments and answers to registration questions. The lead Organizer for Campus and Organization Plans will be able to view your personal information including name, email, phone number, comments, answers to registration questions, service hour history and SignUp activity information for SignUps organized under the Plan’s License Code.
                                Information shared with authorized service providers. We may share your personal and non-personal information with our authorized service providers that perform certain services on our behalf. These services may include, but are not limited to, sending notification email messages and newsletters, processing credit card payments, providing customer service and marketing assistance, performing business and sales analysis, supporting the functionality, security, and data and technology infrastructure of our Services, and supporting contests, sweepstakes, surveys and other features offered through our Services. These service providers may have access to personal information needed to perform their functions but are not permitted to share or use such information for any other purposes.
                                Information shared with third-party applications and services. In some cases, SignUp.com allows you to share the SignUp invitation or Group Page link with certain recipients of your selection using Remind and/or other third-party services, and also allows you to publicly post the SignUp or Group Page link using Facebook, Twitter, and/or other third-party services. Please remember that the manner in which the providers of third party services use, store and disclose your information is governed by their terms of service and privacy policies, and that we will have no liability or responsibility for the privacy practices or other actions of providers of third party services. We do not automatically and publicly post information on the third party services on your behalf.
                                Information shared with business partners. We may share personal information and non-personal information with the businesses with which we partner. Except as described in this section, we will not disclose your personal information to any business partner without notifying you of our intent to share the information and giving you an opportunity to prevent your information from being shared. From time to time, we may partner with companies based on the interests of our users. These partner companies will never see your email address or any other information that could identify you or be used to contact you directly. Any exceptions to this policy of sharing your name, address or email address or other information with a partner company will be done only with your permission.
                                Information shared as aggregate data and hashed information. In an effort to understand and best serve the needs of the users of SignUp.com Services, we analyze customer demographics, SignUp activities, and behavior based on the personal information and other information provided to us. This research may be compiled and analyzed on an aggregate basis and SignUp.com may share this “Aggregate Data” with its affiliates, agents and business partners. SignUp.com may also disclose Aggregate Data in order to describe our services to current and prospective business partners, and to other third parties for other lawful purposes. We may also share information that has been “hashed.” “Hashed” information is information that has been converted to an anonymized string of characters in an effort to prevent third parties from unscrambling the anonymized string of characters to recover the underlying information. We may combine non-personal and/or hashed information we collect with additional information collected from other sources. We may combine non-personal and/or hashed information with other information collected about a user and share such with third parties for their or their partners’ advertising and/or marketing purposes. We also may share aggregated and/or non-personal and/or hashed information with third parties, including (without limitation) advisors, advertisers and investors.
                                Information shared in a merger, sale or business transfer. If SignUp.com is involved in a merger, acquisition, financing, reorganization, bankruptcy, or sale of our assets, information about you may be shared, sold, or transferred as part of that transaction. We may also share information about you with current or future corporate parents, subsidiaries, or affiliates.
                                Information shared in following the law and in protecting SignUp.com. We may disclose your information in response to subpoena or similar investigative demand, a court order, or a request for cooperation from law enforcement or other government agency; to establish or exercise our legal rights; to defend against legal claims; or as otherwise required by law. In such cases, we may raise or waive any legal objection or right available to us. We may also disclose information about you if we believe that your actions are inconsistent with our Terms of Service or related guidelines and policies, or if necessary to protect the rights, property or safety of, or prevent fraud or abuse of our company, our employees, or others.
                                We do not share your personal information with others except as indicated herein or when we inform you and give you an opportunity to opt out of having your personal information shared. Any third parties to whom we may disclose personal information may have their own privacy policies which describe how they use and disclose personal information. Those policies will govern use, handling and disclosure of your personal information once we have shared it with those third parties as described in this Policy. Please note that these entities or their servers may be located either inside or outside the United States. We will not be liable for any damages that may result from the misuse of your personal information by these companies.</p>
                        </div>
                        <div class="condition-term">
                        <input type="checkbox" id="condition" name="condition" required>
                        <label for="condition">I have read and agree with all terms</label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block btn_sign_up" type="submit">Sign up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

