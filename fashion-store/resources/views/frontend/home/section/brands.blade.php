@php
$brands = \App\Models\Brand::all();
@endphp

   
{{-- <section class="client-logo-sec">
  <div class="container">
      <div class="row">
          @foreach ($brands as $brand)
              <div class="col-md-2 col-lg-2 text-center">
                  <img src="{{ asset($brand->logo) }}" class="img-logo-icon" alt="{{ $brand->name }}">
              </div>
          @endforeach
      </div>
  </div>
</section> --}}

<section class="client-logo-sec">
    <div class="container">
      
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner content_center">
              @foreach ($brands->chunk(6) as $key => $chunk)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }} ">
                  <div class="row">
                    @foreach ($chunk as $brand)
                      <div class=" col-lg-2 ">
                        <img src="{{ asset($brand->logo) }}" class="img-logo-icon" alt="{{ $brand->name }}">
                      </div>
                    @endforeach
                  </div>
                </div>
              @endforeach
            </div>
            <a class="carousel-control-prev text-dark" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next text-dark" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        
    </div>
 </section>

  
{{-- <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <img class="d-block w-100" src="..." alt="First slide">
                    </div>
                    <div class="col-lg-2">
                        <img class="d-block w-100" src="..." alt="Second slide">
                    </div>
                    <div class="col-lg-2">
                        <img class="d-block w-100" src="..." alt="Third slide">
                    </div>
                    <div class="col-lg-2">
                        <img class="d-block w-100" src="..." alt="Fourth slide">
                    </div>
                    <div class="col-lg-2">
                        <img class="d-block w-100" src="..." alt="Fifth slide">
                    </div>
                    <div class="col-lg-2">
                        <img class="d-block w-100" src="..." alt="Sixth slide">
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


 --}}
