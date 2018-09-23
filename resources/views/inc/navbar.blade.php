<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Exam Cloud</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Create question</a>
              <ul class="dropdown-menu">
                <li class="text-center"><a href="/simple" class="dditem">Simple Question</a></li>
                <li class="text-center"><a href="/tf" class="dditem">True and False</a></li>
                <li class="text-center"><a href="/mcq" class="dditem">MCQ</a></li>
              </ul>
            </li>
            <li> 
               <a class="nav-link" href="/questions" > Questions</a>
            </li>
            
            
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>

      <style>
        .dropdown:hover .dropdown-menu {
          display: block;
        }

        


        </style>