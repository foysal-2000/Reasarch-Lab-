<nav id="sidebar">
    <div class="sidebar_blog_1">
       <div class="sidebar-header">
          <div class="logo_section">
             <a href="index.html"><img class="logo_icon img-responsive" src="backend/images/logo/logo_icon.png" alt="#" /></a>
          </div>
       </div>
       <div class="sidebar_user_info">
          <div class="icon_setting"></div>
          <div class="user_profle_side">
             <div class="user_img"><img class="img-responsive" src="backend/images/layout_img/user_img.jpg" alt="#" /></div>
             <div class="user_info">
                <h6>John David</h6>
                <p><span class="online_animation"></span> Online</p>
             </div>
          </div>
       </div>
    </div>
    <div class="sidebar_blog_2">
       <h4>General</h4>
       <ul class="list-unstyled components">
          <li class="active">
             <a href="{{route('backend.master')}}"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>
          </li>
          <li>
            <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fa-solid fa-users"> </i> <span>Current Student</span></a>
            <ul class="collapse list-unstyled" id="element">
                <li><a href="{{ route('backend.student.create') }}"> <span>Create</span></a></li>
                <li><a href="{{ route('backend.student.index') }}"> <span>Index</span></a></li>
            </ul>
        </li>
        <li>
            <a href="#almuni" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa-solid fa-graduation-cap"></i><span>Alumni Student</span></a>
            <ul class="collapse list-unstyled" id="almuni">
                <li><a href="{{ route('backend.almuni.create') }}"> <span>Create</span></a></li>
                <li><a href="{{ route('backend.almuni.index') }}"> <span>Index</span></a></li>
            </ul>
        </li>
        <li>
            <a href="#supervisor" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fas fa-chalkboard-teacher"></i> <span>Supervisor</span></a>
            <ul class="collapse list-unstyled" id="supervisor">
                <li><a href="{{ route('backend.supervisor.create') }}"> <span>Create</span></a></li>
                <li><a href="{{ route('backend.supervisor.index') }}"> <span>Index</span></a></li>
            </ul>
        </li>
        <li>
            <a href="#carousel" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fa-regular fa-image"></i> <span>Carousel</span></a>
            <ul class="collapse list-unstyled" id="carousel">
                <li><a href="{{ route('backend.carousel.create') }}"> <span>Create</span></a></li>
                <li><a href="{{ route('backend.carousel.index') }}"> <span>Index</span></a></li>
            </ul>
        </li>
        <li>
            <a href="#publication" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fa-solid fa-book"></i> <span>Publication</span></a>
            <ul class="collapse list-unstyled" id="publication">
                <li><a href="{{ route('backend.publication.create') }}"> <span>Create</span></a></li>
                <li><a href="{{ route('backend.publication.index') }}"> <span>Index</span></a></li>
            </ul>
        </li>
        <li>
            <a href="{{route('backend.role.index')}}"  aria-expanded="false" class="nav-link"> <i class="fa-solid fa-user"></i> <span>Role Management</span></a>
        </li>
       </ul>
    </div>
 </nav>
