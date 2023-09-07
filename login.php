<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/css/bootstrap.css">
  <link href="signin.css" rel="stylesheet">
  <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>
    
  <title>LOGIN</title>
</head>
<body>
<body class="text-center">
    <main class="form-signin w-100 m-auto">
      <form method="post" action="check_login2.php" class="loginForm">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
        <div class="form-floating">
          <input type="text" class="form-control" id="id" placeholder="ID" name="id">
          <label for="id">ID</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="pw" placeholder="Password" name="pw">
          <label for="floatingPassword">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        
      </form>
      <div class="col align-self-center" style="margin-top: 5px;">
          <button type="button" onclick="location.href='signup.php'" class="w-100 btn btn-dark" type="button">회원가입</button>
      </div>
      <div class="col align-self-center" style="margin-top: 5px;">
          <button type="button" onclick="location.href='qna_list.php'" class="w-100 btn btn-dark" type="button">문의하기</button>
      </div>
</button>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="/js/bootstrap.js"></script>
</body>
</html>

