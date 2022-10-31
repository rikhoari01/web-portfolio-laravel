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

      <title>This Is Me | Editor Login</title>
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

      <main class="login">
            <section id="login" class="login section">
                  <h2 class="section-title">LOGIN</h2>
                  <span class="section-subtitle">Sign In to Your Account</span>

                  <div class="login-container container grid">
                        <div class="login-card">
                              <form action="/signin" method="POST" class="login-form">
                                    @csrf
                                    @if(session()->has('loginErr'))
                                    <p class="danger">{{ session('loginErr') }}</p>
                                    @endif
                                    <div class="form-group">
                                          <label for="email" class="form-label">Email</label>
                                          <input type="email" name="email" id="email" class="form-input" placeholder="Your Email">
                                    </div>
                                    <div class="form-group">
                                          <label for="subject" class="form-label">Password</label>
                                          <input type="password" name="password" id="password" class="form-input" placeholder="Your Password">
                                    </div>

                                    <button class="button">LOGIN</button>
                              </form>
                        </div>
                  </div>
            </section>

      </main>

      <!-- Javascript -->
      <script src="/js/theme.js"></script>
</body>

</html>