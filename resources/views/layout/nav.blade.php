<nav class="navbar navbar-expand-lg bg-warning">
    <div class="container-fluid">
      <a class="navbar-brand" href="  ">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          {{-- <li class="nav-item">
            <a class="nav-link" href="#">Lọc theo danh mục</a>
          </li> --}}
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Danh mục
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('book-cate',['cate_id'=>'1'])}}">Tiểu thuyết</a></li>
              <li><a class="dropdown-item" href="{{route('book-cate',['cate_id'=>'2'])}}">Trinh thám</a></li>
              <li><a class="dropdown-item" href="{{route('book-cate',['cate_id'=>'3'])}}">Công nghệ thông tin</a></li>
              <li><a class="dropdown-item" href="{{route('book-cate',['cate_id'=>'4'])}}">Kinh tế</a></li>
              <li><a class="dropdown-item" href="{{route('book-cate',['cate_id'=>'5'])}}">Văn học</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>