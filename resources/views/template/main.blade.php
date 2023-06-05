@include('template.header')

<?php
  $user = Auth::guard('web')->check();
  $emp  = Auth::guard('employee')->check();
  if(Auth::guard('web')->check()){
    $user_id = Auth::guard('web')->user()->id;
    $name = Auth::user()->name;
    $level   = Auth::guard('web')->user()->level->name;
    $logout = route('logout');
  }else if(Auth::guard('employee')->check()){
    $user_id = Auth::guard('employee')->user()->id;
    $name = Auth::guard('employee')->user()->name;
    $level   = "employee";
    $logout = route('emp.logout');
  }
?>

  <!-- Side & navbar -->
  @include('template.navbar')


  <!-- Main Content -->
  <div class="main-content">
    <section class="section">

      @yield('content')
    </section>
  </div>
  <footer class="main-footer">
    <div class="footer-left">
      Copyright &copy; 2023 <div class="bullet"></div> Design By <a href="#">Mohamad Hasan Bisri</a>
    </div>
    <div class="footer-right">
      v1.0
    </div>
  </footer>

  @include('template.footer')
