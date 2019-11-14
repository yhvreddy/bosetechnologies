<head>
    <title></title>
    <style>
        .contactUs__bg{
            background-color: #ffffff;
            height: auto;
        }
        .address__track{
            width: 100%;
            border-right: 1px solid #666;
            box-sizing: border-box;
        }
        h2[title="contactUs"]{
            display: block;
            font-size: 36px;
            font-weight: 500;
            font-style: italic;
            color: #1a1a1b;
            line-height: 2;
            text-transform: capitalize;
        }
        .address__container p{
            margin:0;
        }
        .address__container .address, .address__container .mail{
            color: #1a1a1b;
        }
        .address__container .mail span{
            color: #5ad0ab; /* #64c3e0; */
        }
        .address__socIcons{
            display: block;
            list-style: none;
            margin-top: 20px;
        }
        .address__socIcons li{
            display: inline-block;
            width: 40px;
            height: 40px;
            text-align: center;
            font-size: 20px;
            color: #000;
            background-color: #fff;
            border-radius: 50%;
            padding: 1% 2%;
            margin: 2%;
        }
        .address__socIcons li i{
            color: #5ad0ab;
        }
        /*.address__socIcons li:nth-child(2) i{
            color: #1c66de;
        }
        .address__socIcons li:nth-child(3) i{
            color: #fb00ff;
        }
        .address__socIcons li:last-child i{
            color: #1c66de;s
        }*/

        /* form styles */
        .contactus__form{
            padding: 1% s4%;
            margin: 2%;
            box-sizing: border-box;
        }
        .contactFieldBg{
            width: 100%;
            border-radius: 5px;
            border: 1px solid #e7e7e7;
        }
        .contactName input, .contactMail input{
            height: 30px;
            color: #ababab;
            background-color: transparent;
            border: 0;
        }
        .contactMessage textarea{
            width: 100%;
            height: 150px;
            /*min-height: 150px;
            max-height: 150px;*/
            resize: none;
            color: #1a1a1b;
            background-color: transparent;
            border: 0;
        }
        .contactus__form button.sendMsg{
            text-transform: capitalize;
            color: #fff;
            background-color: #5ad0ab;
            margin: 0 auto;
            margin-bottom: 20px;
        }
        .mail span{
            color: #007bff !important;
        }
    </style>
</head>
<body>
<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="icon_house_alt"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Concat Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->

<!-- Video Area Start -->
<!--<div class="hami--video--area section-padding-100-0">
    <div class="container">
        <div class="row">
            <!-- Section Heading
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2>We are here</h2>
                    <p>We are implenting Cyber Free World thorugh motivating training classes & Penetration Testing. Onsite Training Classes are provided with fully live setup lab using your devices. IT Security is the mandatory thing in present world, we provide hands on experience in our workshop from scratch. Not only training we are here to prevent & protect your Digital World near to 100%. BOSE TECHNOLOGIES is Information Security Consultation organisation where we provide WAPT, VAPT, NAPT, DIGITAL FORENSIC Services.</p>
                </div>
            </div>
        </div>

        <!-- Video Content Area
        <div class="row align-items-center">
            <div class="col-12 col-md-6">
                <div class="video-content-area pr-3 mb-100">
                    <img src="<?/*=base_url()*/?>assets/img/bg-img/4.jpg" alt="">
                    <a href="https://www.youtube.com/watch?v=L78r7YD-kNw" class="video-play-btn"><i class="fa fa-play"></i></a>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="video-text pl-md-3 mb-100">
                    <h2>Are you ready for <br>Cyber War ?</h2>
                    <!-- Description
                    <div class="video-desc mb-50">
                        <h6><i class="icon_check"></i>Wars are a tragic part of our history and will almost certainly be a tragic part of our future.Since the establishment of the United Nations, wars of aggression have been outlawed and multilateral conventions refer to armed conflict instead of war. But the wars of the future won't be like the wars of our past. Alongside traditional warfare, our future will include cyberwarfare, remotely fighting our enemies through the use of a new class of weapons, including computer viruse and programs to alter the enemy's ability to operate. And not only is cyberwarfare not covered by existing legal frameworks, but the question of what exactly constitutes cyberwarfare is still highly debated. So, how can we deal with cyberwarfar if we can't even agree on what it means? One way forward is to envision situations where new international laws may be needed. Imagine a new kind of assassin, one that could perpetrate a crime without firing a single shot or even being in the same country. For example, an individual working for the government uses a wireless device to send a signal to another foreign leader's pacemaker. This device directs the pacemaker to malfunction, ultimately resulting in the foreign leader's death. Would this cyber assassination constitute an act of war? </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->
<!-- Video Area End -->
<!-- Contact Us conternt-->
<div class="container-fluid contactUs__bg">
    <div class="container">
        <div class="row">
            <div class="col-12 p-0s">
                <div class="row">
                    <!-- Contact Us Details-->
                    <div class="col-12 col-sm-6 col-md-6 col-lg-5 col-xl-5">
                        <h3 title="contactUs">Contact with us:</h3>
                        <div class="address__container address__track">
                            <p class="address">Hyderabad, India</p>
                            <p class="mail">Mobile : <span> +91 7799322016</span></p>
                            <p class="mail">E-Mail : <span> admin@bosetechnologies.com</span></p>
                            <ul class="address__socIcons">
                                <li><a href="https://www.facebook.com/bosetechnologiesindia" target="_blank"> <i class="fa fa-facebook-f" aria-hidden="true"></i></a></li>
                                <li><a href="https://twitter.com/bosetech1" target="_blank"> <i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="https://www.instagram.com/bosetechnologies/" target="_blank"> <i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <!-- <li><a href="#" target="_blank"> <i class="fa fa-linkedin" aria-hidden="true"></i></a></li> -->
                            </ul>
                        </div>
                    </div>

                    <!-- Contact Us Form-->
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <h3 title="contactUs">Send Details:</h3>
                        <form class="contactus__form" id="contactForm" method="post" action="#">
                            <span id="SentStatusMessage" style="text-align: center"></span>
                            <div class="contactFieldBg contactName mt-4 mr-2 mb-4 ml-2">
                                <input type="text" id="uname" required name="contactName" placeholder="Your Name" class="pt-3 pr-2 pb-3 pl-2">
                            </div>
                            <div class="contactFieldBg contactMail  mt-4 mr-2 mb-4 ml-2">
                                <input type="email" id="email" required name="contactEmail" placeholder="Your E-Mails" class="pt-3 pr-2 pb-3 pl-2">
                            </div>
                            <div class="contactFieldBg contactMessage  mt-4 mr-2 mb-4 ml-2">
                                <textarea id="message" required placeholder="Your Message" rows="8" name="ContactNote" class="p-2"></textarea>
                            </div>
                            <button type="submit" id="submit" class="btn btn-default sendMsg ml-2">send message</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 p-0">
            <div class="map" style="height: 450px;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7612.569324584741!2d78.43960212207891!3d17.446084237507815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb90e76b6662c5%3A0x9ad96c95b077cb8e!2sSanjeeva%20Reddy%20Nagar%2C%20Hyderabad%2C%20Telangana%20500038!5e0!3m2!1sen!2sin!4v1573673020989!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
        </div>
    </div>
</div>


</body>