<style>
    .wrapper-img-banner {
        max-width: 100%;
        max-height:600px;
    }
    .img-banner{
        width: 100%;
    }
</style>
<div class="mt-5">
  <div>
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      @foreach($kontents as $index => $kontent)
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" aria-current="true" aria-label="Slide {{ $index + 1 }}"></button>
      @endforeach
    </div>
    <div class="carousel-inner">

      @foreach($kontents as $index => $kontent)
          <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
            <div class="wrapper-img-banner">
              <img src="{{ asset('storage/' . $kontent->image) }}" class="img-banner" alt="Slide {{ $index + 1 }}">
            </div>
            <div class="container">
              <div class="carousel-caption text-start">
                <h1>{{ $kontent->title }}</h1>
                <p>{{ $kontent->description }}</p>
              </div>
            </div>
          </div>
        @endforeach
    </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="container mt-5">
    <h4 class="text-center"> Kantor Unit Penyelenggara Bandar Udara</h4>
    <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consectetur accusamus nisi architecto facere temporibus, fugiat neque consequuntur dolore? Culpa fuga iusto voluptas possimus reiciendis est, tenetur debitis, numquam non distinctio doloribus consequuntur nobis perspiciatis? Itaque velit obcaecati eius dolore dicta amet corporis nisi nobis, cupiditate debitis asperiores optio repudiandae reprehenderit architecto beatae ex autem perspiciatis animi! Ea assumenda repellat ex itaque ipsa adipisci quisquam delectus dolores vitae tempore in dolorum corporis reprehenderit earum iusto molestiae illum officia, magnam eos vero! Tempore quis tenetur in temporibus recusandae deleniti libero veniam necessitatibus quos corrupti, soluta, reprehenderit sequi dolor error maxime, repudiandae delectus!</p>
  </div>
  </div>
  
</div>
