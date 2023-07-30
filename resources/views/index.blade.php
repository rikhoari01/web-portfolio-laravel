<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- FAVICON -->
    <link rel="shortcut icon" href="/img/favicon.png" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
    <link rel="stylesheet" href="/css/style.css">

    <title>This Is Me | My Portfolio | Abdurikho Min Khoiri</title>
</head>

<body>
    <!-- NAVBAR -->
    <header id="header" class="header">
        <nav class="nav container">
            <a href="/" class="nav-title">
                THIS<div class="nav-subtitle">IS</div>ME
            </a>

            <div class="nav-menu">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="#home" class="nav-link active-link">
                            <i class="bx bx-home-alt"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#about" class="nav-link">
                            <i class="bx bx-user"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#skills" class="nav-link">
                            <i class="bx bx-book"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#works" class="nav-link">
                            <i class="bx bx-task"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="nav-link">
                            <i class='bx bxs-message-rounded-dots'></i>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Theme Toggle -->
            <i class="bx bx-moon theme-toggle" id="theme-toggle"></i>
        </nav>
    </header>

    <main class="main">
        <!-- HOME -->
        <section id="home" class="home section">
            <div class="home-container container grid">
                <div class="home-data">
                    <span class="greeting">{{ $greeting->content }}</span>
                    <h1 class="myname">{{ $name->content }}</h1>
                    <h3 class="myjob">{{ $jobdesc->content }}</h3>

                    <div class="home-buttons">
                        <a href="{{ $cv->content }}" class="button button-transparent">Download CV</a>
                        <a href="#about" class="button">About Me</a>
                    </div>
                </div>

                <div class="home-image">
                    <img src="{{ $photo->content }}" alt="my-image">
                </div>

                <div class="home-social">
                    <a href="{{ $linkedin->content }}" class="social-link" target="_blank">
                        <i class="bx bxl-linkedin-square"></i>
                    </a>
                    <a href="{{ $github->content }}" class="social-link" target="_blank">
                        <i class='bx bxl-github'></i>
                    </a>
                    <a href="{{ $youtube->content }}" class="social-link" target="_blank">
                        <i class="bx bxl-youtube"></i>
                    </a>
                </div>

                <a href="#about" class="scroll-down">
                    <i class="bx bx-mouse icon"></i>
                    <span class="name">Scroll Down</span>
                </a>
            </div>
        </section>

        <!-- ABOUT -->
        <section id="about" class="about section">
            <h2 class="section-title">About Me</h2>
            <span class="section-subtitle">Who Am I</span>

            <div class="about-container container grid">
                <img src="{{ $about_img->content }}" alt="about-me" class="about-img">

                <div class="about-data">
                    <div class="about-info">
                        <div class="about-card">
                            <i class="bx bx-award icon"></i>
                            <h3 class="title">Experience</h3>
                            @php
                            $firstExp  = new DateTime("2022-01-01");
                            $today     = new DateTime();
                            $interval  = $today->diff($firstExp);
                            @endphp
                            <span class="description">{{ $interval->format('%y') }} Years Working</span>
                        </div>
                        <div class="about-card">
                            <i class="bx bx-briefcase-alt icon"></i>
                            <h3 class="title">Completed</h3>
                            <span class="description">{{ $worksCount }} Projects</span>
                        </div>
                        <div class="about-card">
                            <i class="bx bx-support icon"></i>
                            <h3 class="title">Support</h3>
                            <span class="description">Online 24/7</span>
                        </div>
                    </div>

                    <p class="about-description">{{ $selfdesc->content }}</p>

                    <a href="#contact" class="button">Contact Me</a>
                </div>
            </div>
        </section>

        <!-- SKILLS -->
        <section id="skills" class="skills section">
            <h2 class="section-title">My Abilities</h2>
            <span class="section-subtitle">What Can I Do</span>

            <div class="skills-container container grid">
                <div class="skills-card">
                    <div class="title">Frontend Development</div>
                    <div class="skills-content">
                        <div class="skills-group">
                            @foreach($frontend as $f)
                            <div class="skills-data">
                                <i class="bx bxs-badge-check"></i>
                                <div>
                                    <h3 class="name">{{ $f->skill_name }}</h3>
                                    <span class="level">{{ $f->skill_level }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="skills-card">
                    <div class="title">Backend Development</div>
                    <div class="skills-content">
                        <div class="skills-group">
                            @foreach($backend as $b)
                            <div class="skills-data">
                                <i class="bx bxs-badge-check"></i>
                                <div>
                                    <h3 class="name">{{ $b->skill_name }}</h3>
                                    <span class="level">{{ $b->skill_level }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="skills-card">
                    <div class="title">Mastered Tools</div>
                    <div class="skills-content">
                        <div class="skills-group">
                            @foreach($tools as $t)
                            <div class="skills-data">
                                <i class="bx bxs-badge-check"></i>
                                <div>
                                    <h3 class="name">{{ $t->skill_name }}</h3>
                                    <span class="level">{{ $t->skill_level }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="skills-card">
                    <div class="title">Other Skills</div>
                    <div class="skills-content">
                        <div class="skills-group">
                            @foreach($others as $o)
                            <div class="skills-data">
                                <i class="bx bxs-badge-check"></i>
                                <div>
                                    <h3 class="name">{{ $o->skill_name }}</h3>
                                    <span class="level">{{ $o->skill_level }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- WORKS -->
        <section id="works" class="work section">
            <h2 class="section-title">My Portfolio</h2>
            <span class="section-subtitle">My Recent Work</span>

            <div class="works-filter">
                <span class="works-item active-works" data-filter="all">All</span>
                <span class="works-item" data-filter=".web">Web</span>
                <span class="works-item" data-filter=".app">App</span>
                <span class="works-item" data-filter=".other">Other</span>
            </div>

            <div class="works-container container grid">
                @foreach($works as $w)
                <div class="works-card mix {{ $w->work_category }}">
                    <img src="{{ $w->work_img }}" alt="{{ $w->work_title }}" class="works-img">

                    <h3 class="title">{{ $w->title }}</h3>

                    <button data-id="{{ $w->id }}" class="works-button">
                        Detail <i class="bx bx-right-arrow-alt icon"></i>
                    </button>
                </div>
                @endforeach
            </div>

        </section>

        <!-- CONTACT -->
        <section id="contact" class="contact section">
            <h2 class="section-title">Contact Me</h2>
            <span class="section-subtitle">Get In Touch</span>

            <div class="contact-container container grid">
                <div class="contact-content">
                    <h3 class="contact-title">Talk To Me</h3>

                    <div class="contact-info">
                        <div class="contact-card">
                            <i class="bx bxl-whatsapp contact-icon"></i>
                            <h3 class="title">Whatsapp</h3>
                            <span class="description">+62 {{ $wa_number->content }}</span>

                            <a href="https://wa.me/62{{ $wa_number->content }}/" class="contact-button" target="_blank">Chat Me <i class="bx bx-right-arrow-alt icon"></i></a>
                        </div>

                        <div class="contact-card">
                            <i class="bx bxl-telegram contact-icon"></i>
                            <h3 class="title">Telegram</h3>
                            <span class="description">{{ '@' . $telegram->content }}</span>

                            <a href="https://t.me/{{ $telegram->content }}" class="contact-button" target="_blank">Chat Me <i class="bx bx-right-arrow-alt icon"></i></a>
                        </div>

                        <div class="contact-card">
                            <i class="bx bxl-messenger contact-icon"></i>
                            <h3 class="title">Messenger</h3>
                            <span class="description">{{ '@' . $messenger->content }}</span>

                            <a href="https://m.me/{{ $messenger->content }}" class="contact-button" target="_blank">Chat Me <i class="bx bx-right-arrow-alt icon"></i></a>
                        </div>
                    </div>
                </div>

                <div class="contact-content">
                    <h3 class="contact-title">Send Me an Email</h3>

                    <form action="" class="contact-form">
                        <div class="form-group">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-input" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-input" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-input" placeholder="Your Email Subject">
                        </div>
                        <div class="form-group form-area">
                            <label for="message" class="form-label">Message</label>
                            <textarea name="message" id="message" cols="30" rows="10" class="form-input" placeholder="Your Message"></textarea>
                        </div>

                        <button class="button">Send Email</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-container container">
            <h1 class="footer-title">THIS IS ME</h1>

            <ul class="footer-list">
                <li>
                    <a href="#about" class="footer-link">About</a>
                </li>
                <li>
                    <a href="#skills" class="footer-link">Skills</a>
                </li>
                <li>
                    <a href="#contact" class="footer-link">Contact</a>
                </li>
            </ul>

            <ul class="footer-social">
                <a href="{{ $facebook->content }}" target="_blank" class="footer-social-link">
                    <i class="bx bxl-facebook"></i>
                </a>
                <a href="{{ $instagram->content }}" target="_blank" class="footer-social-link">
                    <i class="bx bxl-instagram"></i>
                </a>
                <a href="{{ $twitter->content }}" target="_blank" class="footer-social-link">
                    <i class="bx bxl-twitter"></i>
                </a>
            </ul>

            <span class="footer-copy">Established Since 2022 | Inspired Design By <a href="https://github.com/bedimcode/" target="_blank">Bedimcode</a> And Modified By <a href="https://github.com/rikhoari01/" target="_blank">Rikhoari</a></span>
        </div>
    </footer>

    <!-- MODAL -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <i class="bx bx-x modal-close"></i>

            <h3 class="modal-title"></h3>

            <img src="" alt="" class="preview-img">

            <ul class="modal-list">
                <li class="modal-item">
                    <i class="bx bx-check modal-icon"></i>
                    <p class="modal-info">
                        Description :
                    <span class="work-desc"></span>
                    </p>
                </li>
                <li class="modal-item">
                    <i class="bx bx-check modal-icon"></i>
                    <p class="modal-info">
                        Technology :
                    <span class="work-tech"></span>
                    </p>
                </li>
                <li class="modal-item">
                    <i class="bx bx-check modal-icon"></i>
                    <p class="modal-info">
                        Category :
                    <p class="work-category"></p>
                    </p>
                </li>
            </ul>

            <a href="" class="demo-button button">DEMO</a>
        </div>
    </div>

    <!-- Javascript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/js/scrollreveal.min.js"></script>
    <script src="/js/mixitup.min.js"></script>
    <script src="/js/jquery-custom.js"></script>
    <script src="/js/theme.js"></script>
    <script src="/js/main.js"></script>

</body>

</html>