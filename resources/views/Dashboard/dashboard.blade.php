<!DOCTYPE html>
<html lang="en">
 {{--- Auth User ---}}
<head>
    <meta charset="UTF-8">
    <title>Sporthub</title>
    <link rel="preload" href="{{ asset('css/dashboard.css') }}" as="style">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <!-- <div class="sidebar">
      <div class="logo-details">
          <div class="logo_name">SportHub</div>
          <i class='bx bx-menu' id="btn" ></i>
      </div>
      <ul class="nav-list">
        <li>
          <a href="#">
            <i class='bx bx-grid-alt'></i>
            <span class="links_name">Dashboard</span>
          </a>
          <span class="tooltip">Dashboard</span>
        </li>
        <li>
        <a href="#">
          <i class='bx bx-user' ></i>
          <span class="links_name">User</span>
        </a>
        <span class="tooltip">User</span>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-chat' ></i>
          <span class="links_name">Messages</span>
        </a>
        <span class="tooltip">Messages</span>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-pie-chart-alt-2' ></i>
          <span class="links_name">Analytics</span>
        </a>
        <span class="tooltip">Analytics</span>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-folder' ></i>
          <span class="links_name">File Manager</span>
        </a>
        <span class="tooltip">Files</span>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-cart-alt' ></i>
          <span class="links_name">Order</span>
        </a>
        <span class="tooltip">Order</span>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-heart' ></i>
          <span class="links_name">Saved</span>
        </a>
        <span class="tooltip">Saved</span>
      </li>
      <li>
        <a href="#">
        <i class='bx bx-cog' ></i>
          <span class="links_name">Setting</span>
        </a>
        <span class="tooltip">Setting</span>
      </li>
      <li class="profile">
          <div class="profile-details">
            <div class="name_job">
              <div href="#" class="name">Salir</div>
            </div>
          </div>
          <form action"logout" method="POST"> 
          @csrf 
          <a href="#" onclick="this.closest('form').submit()" class='exit' id="log_out" ></a> </form>
      </li>
      </ul>
    </div> -->

  <main>

    <article class="principalbox">
      <p class="title">Mis Torneos</p>
        <div class="box">
          <div class="minibox">
            <p class="tournament">Torneo 1</p>
            <p class="description">Organizador:</p>
            <p class="description">Equipo:</p>
            <p class="description">Rol:</p>
          </div>
          <div class="minibox">
            <p class="tournament">Torneo 2</p>
            <p class="description">Organizador:</p>
            <p class="description">Equipo:</p>
            <p class="description">Rol:</p>
          </div>
        </div>
    </article>
    <article class="principalbox">
      <p class="title">Mis equipos</p>
        <div class="box">
        <div class="minibox">
            <p class="tournament">Equipo 2</p>
            <p class="description">Organizador:</p>
            <p class="description">Capitan:</p>
            <p class="description">Torneo:</p>
          </div>
          <div class="minibox">
            <p class="tournament">Equipo 2</p>
            <p class="description">Organizador:</p>
            <p class="description">Capitan:</p>
            <p class="description">Torneo:</p>
          </div>
        </div>
    </article>
    <article class="three">Próximos partidos</article>

  </main>
  
  
</body>
  
  <script src="{{ asset('js/dashboard.js') }}"></script>

</html>
