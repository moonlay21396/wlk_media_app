<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('images/admin_image//sidebar-1.jpg')}}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="{{url('/')}}" target="_blank" class="simple-text logo-normal">
            {{-- <img src="{{asset('upload/office/'.$office->photo)}}" style="width:150px;height:100px;margin-top:-30px;" alt="Linda"> --}}
            <img src="{{asset('images/wlk.png')}}" style="width:150px;height:140px;margin-top:-30px;" alt="Linda">
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <!-- <li class="nav-item @if($url=="dashboard") active @endif">
                <a class="nav-link" href="{{url('admin')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li> -->
            <li class="nav-item @if($url=="cat") active @endif">
                <a class="nav-link" href="{{url('admin/')}}">
                    <i class="material-icons">person</i>
                    <p>Category</p>
                </a>
            </li>
            <li class="nav-item @if($url=="star") active @endif">
                <a class="nav-link" href="{{url('admin/star')}}">
                    <i class="material-icons">person</i>
                    <p>Star Manage</p>
                </a>
            </li>
            <li class="nav-item @if($url=="company") active @endif">
                <a class="nav-link" href="{{url('admin/company')}}">
                    <i class="material-icons">content_paste</i>
                    <p>Company</p>
                </a>
            </li>
            <li class="nav-item @if($url=="movie") active @endif">
                <a class="nav-link" href="{{url('admin/movie')}}">
                    <i class="material-icons">content_paste</i>
                    <p>Movie</p>
                </a>
            </li>
            {{-- <li class="nav-item @if($url=="office") active @endif">
                <a class="nav-link" href="{{url('admin/office')}}">
                    <i class="material-icons">library_books</i>
                    <p>Foundation Infomation</p>
                </a>
            </li> --}}



            {{-- <li class="nav-item @if($url=="about") active @endif">
                <a class="nav-link" href="{{url('admin/about')}}">
                    <i class="material-icons">person</i>
                    <p>Manage About</p>
                </a>
            </li> --}}
            <!-- <li class="nav-item @if($url=="client") active @endif">
                <a class="nav-link" href="{{url('admin/client')}}">
                    <i class="material-icons">person</i>
                    <p>Manage Client</p>
                </a>
            </li> -->
            {{-- <li class="nav-item @if($url=="contact") active @endif">
                <a class="nav-link" href="{{url('admin/contact')}}">
                    <i class="material-icons">content_paste</i>
                    <p>Contact</p>
                </a>
            </li> --}}
             <li class="nav-item">
                <a class="nav-link" href="{{url('/logout')}}">
                    <i class="material-icons">library_books</i>
                    <p>Logout</p>
                </a>
            </li>

            <!-- <li class="nav-item @if($url=="company_profile") active @endif">
                <a class="nav-link" href="{{url('admin/company_profile')}}">
                    <i class="material-icons">person</i>
                    <p>Manage Website</p>
                </a>
            </li>
            <li class="nav-item @if($url=="company_list") active @endif">
                <a class="nav-link" href="{{url('admin/company_list')}}">
                    <i class="material-icons">content_paste</i>
                    <p>Company List</p>
                </a>
            </li>
            <li class="nav-item @if($url=="category") active @endif">
                <a class="nav-link" href="{{url('admin/category')}}">
                    <i class="material-icons">library_books</i>
                    <p>Manage Category</p>
                </a>
            </li> -->
            <!-- <li class="nav-item @if($url=="blog") active @endif">
                <a class="nav-link" href="{{url('admin/blog')}}">
                    <i class="material-icons">bubble_chart</i>
                    <p>Manage Blog</p>
                </a>
            </li> -->
            <!-- <li class="nav-item @if($url=="feedback") active @endif">
                <a class="nav-link" href="{{url('admin/feedback')}}">
                    <i class="material-icons">location_ons</i>
                    <p>Manage Feedback</p>
                </a>
            </li> -->
            {{--<li class="nav-item ">--}}
                {{--<a class="nav-link" href="./notifications.html">--}}
                    {{--<i class="material-icons">notifications</i>--}}
                    {{--<p>Notifications</p>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item ">--}}
                {{--<a class="nav-link" href="./rtl.html">--}}
                    {{--<i class="material-icons">language</i>--}}
                    {{--<p>RTL Support</p>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item active-pro ">--}}
                {{--<a class="nav-link" href="./upgrade.html">--}}
                    {{--<i class="material-icons">unarchive</i>--}}
                    {{--<p>Upgrade to PRO</p>--}}
                {{--</a>--}}
            {{--</li>--}}
        </ul>
    </div>
</div>