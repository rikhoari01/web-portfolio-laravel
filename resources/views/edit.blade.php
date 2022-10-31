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
  <link rel="stylesheet" href="/css/editor-style.css">
  <link rel="stylesheet" href="/css/style.css">

  <title>This Is Me | Editor</title>
</head>

<body>
  <!-- NAVBAR -->
  <header id="header" class="header">
    <nav class="nav container">
      <a href="/" class="nav-title">
        THIS<div class="nav-subtitle">IS</div>ME
      </a>

      <!-- Theme Toggle -->
      <i class="bx bx-moon theme-toggle" id="theme-toggle"></i>
    </nav>
  </header>

  <main class="editor">
    <!-- HOME -->
    <section id="home" class="home-edit editor-section">
      <h2 class="section-title">Home Section</h2>

      <div class="home-editor container grid">
        <div class="editor-card">
          <form action="/home/edit" class="editor-form" method="POST">
            @csrf
            <h3 class="title">Main Text</h3>
            <div class="form-group">
              <label for="greeting" class="form-label">Greeting</label>
              <input type="text" name="greeting" id="greeting" class="form-input" placeholder="Greeting Message" value="{{ $greeting->content }}">
            </div>
            <div class="form-group">
              <label for="name" class="form-label">Name</label>
              <input type="text" name="name" id="name" class="form-input" placeholder="Your Name" value="{{ $name->content }}">
            </div>
            <div class="form-group">
              <label for="jobdesc" class="form-label">Job Description</label>
              <input type="text" name="jobdesc" id="jobdesc" class="form-input" placeholder="Your Job" value="{{ $jobdesc->content }}">
            </div>

            <h3 class="title">Social Media Link</h3>

            <div class="form-group">
              <label for="linkedin" class="form-label">LinkedIn</label>
              <input type="url" name="linkedin" id="linkedin" class="form-input" placeholder="Your LinkedIn Link" value="{{ $linkedin->content }}">
            </div>
            <div class="form-group">
              <label for="github" class="form-label">Github</label>
              <input type="url" name="github" id="github" class="form-input" placeholder="Your Github Link" value="{{ $github->content }}">
            </div>
            <div class="form-group">
              <label for="youtube" class="form-label">Youtube Channel</label>
              <input type="url" name="youtube" id="youtube" class="form-input" placeholder="Your Youtube Link" value="{{ $youtube->content }}">
            </div>

            <button class="button">SAVE</button>
          </form>
        </div>

        <div class="editor-card">
          <form action="/home/file/edit" class="editor-form" method="POST" enctype="multipart/form-data">
            <h3 class="title">CV and Photo</h3>
            @csrf
            <div class="form-group">
              <label for="cv" class="form-label">Your CV</label>
              <input type="file" name="cv" id="cv" class="form-input" accept=".pdf">
              <input type="text" name="old_cv" id="old_cv" value="{{ $cv->content }}" hidden>
            </div>
            <div class="form-group">
              <label for="photo" class="form-label">Your Photo</label>
              <input type="file" name="photo" id="photo" class="form-input" accept=".png">
              <input type="text" name="old_photo" id="old_photo" value="{{ $photo->content }}" hidden>
            </div>

            <button class="button">SAVE</button>
          </form>

          <h3 class="title">Photo Preview</h3>
          <div class="home-image preview">
            <img src="/img/home-img.png" alt="my-image" id="home-img">
          </div>
          <div class="img-description">
            <p>Upload PNG Format Image Without Background</p>
          </div>
        </div>
      </div>
      </div>


    </section>

    <!-- ABOUT -->
    <section id="about" class="about-edit editor-section">
      <h2 class="section-title">About Section</h2>

      <div class="about-editor container grid">
        <div class="editor-card">
          <form action="/about/edit" class="editor-form" method="POST">
            @csrf
            <h3 class="title">Description</h3>
            <div class="form-group form-area about">
              <label for="selfdesc" class="form-label">Self Description</label>
              <textarea name="selfdesc" id="selfdesc" cols="30" rows="10" class="form-input" placeholder="Write About You">{{ $selfdesc->content }}</textarea>
            </div>

            <button class="button">SAVE</button>
          </form>
        </div>

        <div class="editor-card">
          <form action="/about/file/edit" class="editor-form" method="POST" enctype="multipart/form-data">
            @csrf
            <h3 class="title">About Image</h3>
            <div class="form-group">
              <label for="about_img" class="form-label">Your Photo</label>
              <input type="file" name="about_img" id="about_img" class="form-input" accept=".png, .jpg">
              <input type="text" name="old_about_img" id="old_about_img" value="{{ $about_img->content }}" hidden>
            </div>

            <button class="button">SAVE</button>
          </form>

          <h3 class="title">Photo Preview</h3>
          <div class="preview">
            <img src="/img/about.png" alt="about-me" class="prev-about-img">
          </div>
        </div>
      </div>
      </div>


    </section>

    <!-- SKILLS -->
    <section id="skills" class="skills-edit editor-section">
      <h2 class="section-title">Skills Section</h2>

      <div class="skills-editor container">
        <div class="editor-card table-responsive">
          <h3 class="title">Skills Table</h3>
          <table class="table" id="skills-table" width="100%" cellspacing="0">
            <thead class="text-center">
              <tr>
                <th>No</th>
                <th>Skills Name</th>
                <th>Level</th>
                <th>Category</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($skills as $i => $s)
              <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $s->skill_name }}</td>
                <td>{{ $s->skill_level }}</td>
                <td>{{ $s->skill_category }}</td>
                <td>
                  <button data-id="{{ $s->id }}" class="edit-btn edit-skills"><i class="bx bx-pencil"></i> </button>
                  <button data-id="{{ $s->id }}" class="delete-btn delete-skills"><i class="bx bx-trash"></i> </button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

          <div class="table-btn">
            <button id="add-skills" class="add-btn button modal-open">Add Skills</button>
          </div>

        </div>
      </div>
    </section>

    <!-- WORKS -->
    <section id="works" class="works-edit editor-section">
      <h2 class="section-title">Works Section</h2>

      <div class="works-editor container">
        <div class="editor-card table-responsive">
          <h3 class="title">Works Table</h3>
          <table class="table" id="works-table" width="100%" cellspacing="0">
            <thead class="text-center">
              <tr>
                <th>No</th>
                <th>Title</th>
                <th>Technology</th>
                <th>Description</th>
                <th>URL</th>
                <th>Category</th>
                <th>Preview</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($works as $i => $w)
              <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $w->work_title }}</td>
                <td>{{ $w->work_tech }}</td>
                <td>{{ $w->work_desc }}</td>
                <td><a href="{{ $w->work_link }}" target="_blank" rel="noopener noreferrer">{{ $w->work_link }}</a></td>
                <td>{{ ucfirst($w->work_category) }}</td>
                <td>
                  <img src="{{ asset('/storage/' . $w->work_img) }}" alt="{{ $w->work_title }}" class="prev-works">
                </td>
                <td>
                  <button data-id="{{ $w->id }}" class="edit-btn edit-works"><i class="bx bx-pencil"></i> </button>
                  <button data-id="{{ $w->id }}" class="delete-btn delete-work"><i class="bx bx-trash"></i> </button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

          <div class="table-btn">
            <button id="add-works" class="add-btn button modal-open">Add Works</button>
          </div>

        </div>
      </div>
    </section>

    <!-- CONTACT & FOOTER -->
    <section id="home" class="home-edit editor-section">
      <h2 class="section-title">Contact & Footer Section</h2>

      <div class="home-editor container grid">
        <div class="editor-card">
          <form action="/contact/edit" class="editor-form" method="POST">
            @csrf
            <h3 class="title">Contact Info</h3>

            <div class="form-group">
              <label for="wa-number" class="form-label">Whatsapp</label>
              <input type="tel" name="wa_number" id="wa_number" class="form-input" placeholder="Your Whatsapp Number" value="{{ $wa_number->content }}">
            </div>
            <div class="form-group">
              <label for="telegram" class="form-label">Telegram</label>
              <input type="text" name="telegram" id="telegram" class="form-input" placeholder="Your Telegram Username" value="{{ $telegram->content }}">
            </div>
            <div class="form-group">
              <label for="messenger" class="form-label">Messenger</label>
              <input type="text" name="messenger" id="messenger" class="form-input" placeholder="Your Messenger Username" value="{{ $messenger->content }}">
            </div>

            <button class="button">SAVE</button>
          </form>
        </div>

        <div class="editor-card">
          <form action="/footer/edit" method="POST" class="editor-form">
            @csrf
            <h3 class="title">Social Media Link</h3>

            <div class="form-group">
              <label for="facebook" class="form-label">Facebook</label>
              <input type="url" name="facebook" id="facebook" class="form-input" placeholder="Your Facebook Link" value="{{ $facebook->content }}">
            </div>
            <div class="form-group">
              <label for="instagram" class="form-label">Instagram</label>
              <input type="url" name="instagram" id="instagram" class="form-input" placeholder="Your Instagram Link" value="{{ $instagram->content }}">
            </div>
            <div class="form-group">
              <label for="twitter" class="form-label">Twitter</label>
              <input type="url" name="twitter" id="twitter" class="form-input" placeholder="Your Twitter Link" value="{{ $twitter->content }}">
            </div>

            <button class="button">SAVE</button>
          </form>
        </div>
      </div>
      </div>


    </section>

    <!-- LOGIN INFO -->
    <section id="home" class="home-edit editor-section">
      <h2 class="section-title">Login Info</h2>

      <div class="home-editor container grid">
        <div class="editor-card">
          <form action="/user/edit" class="editor-form" method="POST">
            @csrf
            <h3 class="title">Change Login Account</h3>

            <div class="form-group">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" id="email" class="form-input" placeholder="New Email" value="">
            </div>
            <div class="form-group">
              <label for="password" class="form-label">Password</label>
              <input type="text" name="password" id="password" class="form-input" placeholder="New Password" value="">
            </div>

            <button class="button">SAVE</button>
          </form>
        </div>

        <div class="editor-card">
          <form action="/signout" method="POST" class="editor-form">
            @csrf
            <h3 class="title">Logout Button</h3>

            <button class="button">LOGOUT</button>
          </form>
        </div>
      </div>
      </div>


    </section>

  </main>

  <!-- FOOTER -->
  <footer class="footer">
    <div class="footer-editor container">

      <span class="footer-copy">Established Since 2022 | Inspired Design By <a href="https://github.com/bedimcode/" target="_blank">Bedimcode</a> And Modified By <a href="https://github.com/rikhoari01/" target="_blank">Rikhoari</a></span>
    </div>
  </footer>

  @include('modal')
  @include('sweetalert::alert')

  <!-- Javascript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="/js/jquery-custom.js"></script>
  <script src="/js/theme.js"></script>
</body>

</html>