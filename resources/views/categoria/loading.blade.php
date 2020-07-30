@extends('layouts.appl', ['activePage' => 'user-management', 'titlePage' => __(' Pagina de Loadind ')])

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="semicircle">
            <div>
              <div>
                <div>
                  <div>
                    <div>
                      <div>
                        <div>
                          <div>
                            <!--  Add more nested divs here to add more semi-circles.
                                  No CSS changes needed. -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <style >
              .semicircle,
.semicircle div {
  /*  Adjust the size of the entire animation here.
      (Remove max size below to go above 300px.) */
  width: 40vw;
  height: 40vw;

  /* Adjust the speed or timing function of the animation here. */
  animation: 6s rotate infinite linear;

  /*  Max size set because slower machines
      tend to struggle with the nested animations. */

  background-repeat: no-repeat;
  border-radius: 50%;
  position: relative;
  overflow: hidden;
}

.semicircle div {
  position: absolute;
  top: 5%;
  left: 5%;
  width: 90%;
  height: 90%;
}

.semicircle:before,
.semicircle div:before {
  content: '';
  width: 100%;
  height: 50%;
  display: block;
  background: radial-gradient(transparent, transparent 65%, #000 65%, #000);
  background-size: 100% 200%;
}

@keyframes rotate {
  to {
    transform: rotate(360deg);
  }
}



/* Background. */
body {
  margin: 0;
  background: linear-gradient(#FFF, #AAA);
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  overflow: hidden;
}

          </style>
    </section>

 </section>

  @endsection
