<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
                     <div class="container">
                            <a class="navbar-brand" href="/">WarungKita</a>
                            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                                   <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavId">
                                   <ul class="nav">
                                          <li class="nav-item active">
                                                 <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                                          </li>
                                          <li class="nav-item">
                                                 <a class="nav-link" href="/warung/about">Tentang kami</a>
                                          </li>
                                          <li class="nav-item">
                                                 <a class="nav-link" href="/warung/cara">Cara memakai</a>
                                          </li>
                                          @guest
                                                 <li class="nav-item">
                                                        <a class="nav-link" href="/keranjang">Keranjang</a>
                                                 </li>
                                                 <li class="nav-item">
                                                        <a class="nav-link" href="/warung/order/list">History</a>
                                                 </li>
                                                 <li class="nav-item">
                                                        <a class="nav-link btn btn-outline-secondary" href="{{ route('login') }}">{{ __('Login') }}</a>
                                                 </li>
                                                 @else
                                                        @if(auth()->user()->role == 'Administrator') 
                                                               <li class="nav-item">
                                                                      <a class="nav-link" href="/keranjang">Keranjang</a>
                                                               </li>
                                                               <li class="nav-item">
                                                                      <a class="nav-link" href="/warung/order/list">History</a>
                                                               </li>
                                                        @endif
                                                        @if(auth()->user()->role !== 'Pelanggan') 
                                                               <li class="nav-item">
                                                                      <a class="nav-link" href="/dashboard">Dashboard</a>
                                                               </li>
                                                        @endif
                                                        @if(auth()->user()->role == 'Pelanggan') 
                                                               <li class="nav-item">
                                                                      <a class="nav-link" href="/keranjang">Keranjang</a>
                                                               </li>
                                                               <li class="nav-item">
                                                                      <a class="nav-link" href="/warung/order/list">History</a>
                                                               </li>
                                                        @endif
                                                 <li class="nav-item">
                                                        <a class="nav-link btn btn-outline-secondary" href="/warung/akun">{{Auth::user()->name}}</a>
                                                 </li>
                                          @endguest
                                   </ul>
                            </div>
                     </div>
              </nav>