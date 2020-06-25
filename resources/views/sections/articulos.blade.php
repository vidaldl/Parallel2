<section id="articulos" class="blog-home3 py-5 " style="border-top: 1px solid #E1E4EA">
    <div class="container-fluid">
      <!-- Row  -->
      <div class="row justify-content-center">
        <!-- Column -->
        <div class="col-md-8 text-center">
          <h2 class="my-3">{{$contenidosection4s[0]->title}}</h2>
          <h6 class="subtitle font-weight-normal">{{$contenidosection4s[0]->tagline}}</h6>
        </div>
        <!-- Column -->
        <!-- Column -->
      </div>
      <div class="row mt-4">
        <!-- Column -->
        <div class="col-lg-6">
          <div class="card border-0 mb-4">
            <a href="#" data-toggle="modal" data-target="#modal{{ $posts[0]->id }}"><img class="card-img-top" src="{{'storage/' . $posts[0]->image}}" alt="wrappixel kit"></a>
            <div class="date-pos text-center text-white p-3 bg-success-gradiant">{{$users[0]->username}} &nbsp; &nbsp; {{$posts[0]->published_at->format('d M Y')}}</div>
            <h5 class="font-weight-medium mt-3"><a href="#" data-toggle="modal" data-target="#modal{{ $posts[0]->id }}" class="link text-decoration-none">{{$posts[0]->title}}</a></h5>
            <p class="m-t-20 lol">{{$posts[0]->tagline}}</p>
          </div>
        </div>
        <!-- Column -->
        <div class="col-lg-6">
          <div class="row">
            <!-- Column -->
            <div class="col-md-6">
              <div class="card border-0 mb-4">
                <a href="#" data-toggle="modal" data-target="#modal{{ $posts[1]->id }}"><img class="card-img-top" src="{{'storage/' . $posts[1]->image}}" alt="wrappixel kit"></a>
                <div class="date-pos text-center text-white p-3 bg-success-gradiant">{{$users[0]->username}} &nbsp; &nbsp; {{$posts[1]->published_at->format('d M Y')}}</div>
                <h6 class="font-weight-medium mt-3"><a href="#" data-toggle="modal" data-target="#modal{{ $posts[1]->id }}" class="link text-decoration-none">{{$posts[1]->title}}</a></h6>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6">
              <div class="card border-0 mb-4">
                <a href="#" data-toggle="modal" data-target="#modal{{ $posts[2]->id }}"><img class="card-img-top" src="{{'storage/' . $posts[2]->image}}" alt="wrappixel kit"></a>
                <div class="date-pos text-center text-white p-3 bg-success-gradiant">{{$users[0]->username}} &nbsp; &nbsp; {{$posts[2]->published_at->format('d M Y')}}</div>
                <h6 class="font-weight-medium mt-3"><a href="#" data-toggle="modal" data-target="#modal{{ $posts[2]->id }}" class="link text-decoration-none">{{$posts[2]->title}}</a></h6>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6">
              <div class="card border-0 mb-4">
                <a href="#" data-toggle="modal" data-target="#modal{{ $posts[3]->id }}"><img class="card-img-top" src="{{'storage/' . $posts[3]->image}}" alt="wrappixel kit"></a>
                <div class="date-pos text-center text-white p-3 bg-success-gradiant">{{$users[0]->username}} &nbsp; &nbsp; {{$posts[3]->published_at->format('d M Y')}}</div>
                <h6 class="font-weight-medium mt-3"><a href="#" data-toggle="modal" data-target="#modal{{ $posts[3]->id }}" class="link text-decoration-none">{{$posts[3]->title}}</a></h6>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6">
              <div class="card border-0 mb-4">
                <a href="#" data-toggle="modal" data-target="#modal{{ $posts[4]->id }}" ><img class="card-img-top" src="{{'storage/' . $posts[4]->image}}" alt="wrappixel kit"></a>
                <div class="date-pos text-center text-white p-3 bg-success-gradiant">{{$users[0]->username}} &nbsp; &nbsp; {{$posts[4]->published_at->format('d M Y')}}</div>
                <h6 class="font-weight-medium mt-3"><a href="#" data-toggle="modal" data-target="#modal{{ $posts[4]->id }}" class="link text-decoration-none">{{$posts[4]->title}}</a></h6>
              </div>
            </div>
            <!-- Column -->
          </div>
        </div>
        <!-- Column -->
      </div>
      <div class="row">
        <a href="{{$contenidosection4s[0]->link}}" class="btn mx-auto {{$contenidosection4s[0]->button ? '' : 'd-none'}}" style="border-radius: 0%;">Más Artículos &nbsp;<i class="fas fa-angle-down"></i></a>
        <!-- MODAL -->
        @foreach($posts as $post)
        <div class="modal fade" id="modal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="modal{{ $post->id }}" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content  super-iframe-holder">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <div class="modal-body" >
                <div class="row">
                    <div class="post-information col-md-12" style="padding: 15px">
                      <h2>{{ $post->title }}</h2>
                        <span><i class="fa fa-user"></i> <small>{{$users[0]->username}}</small></span> &nbsp;
                        <span><i class="fa fa-clock-o"></i> <small>{{$post->published_at->format('d M Y')}}</small></span> &nbsp;
                        <span><i class="fa fa-tags"></i> <small>{{$post->category->name}}</small></span> &nbsp;
                    </div>
                    <div class="col-md-6 imgModal" >
                    <img src="{{ '/storage/' . $post->image }}" style="width:100%" class="img-fluid rounded" alt="">
                  </div>
                  <div class="col-md-6 mb-3 textModal">
                    {!! $post->contenido !!}
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                  <div class="row">
                    <a href="{{$post->link}}" onclick="$('#modal{{ $post->id }}').modal('hide')" class="btn btn-sm mr-3 {{$post->button ? '' : 'd-none'}}" style="border-radius: 0px; margin-bottom: 0px;">{{$post->button}}</a>
                  </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        <!-- MODAL -->
      </div>
    </div>
</section>
