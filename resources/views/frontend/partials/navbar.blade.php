      <nav id="menu" class="menu">
          <ul id="tiny">
            <li class="active"><a href="{{url('')}}">Home</a>

            </li>
            <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Create question</a>
              <ul class="dropdown-menu">
                <li class="text-center"><a href="/tf" class="dditem">True and False</a></li>
                <li class="text-center"><a href="/mcq" class="dditem">MCQ</a></li>
              </ul>
            </li> -->
            <!-- <li> 
               <a class="nav-link" href="/questions" > Questions</a>
            </li> -->

            <li>
              <a class="nav-link" href="{{url('adminsec')}}" > Admin Panel</a>
            </li>
            @if(!Auth::check())
                    <li> 
               <a class="nav-link" href="/login" > login</a>
            </li>  
              <li> 
               <a class="nav-link" href="/register" > register</a>
            </li>    
            @else
                          <li> 

               <a class="nav-link" href="/logout" > logout</a>
            </li>    

            @endif

          </ul>
        </nav>