<!-- SEZIONE FOOTER  -->

<footer class="footer_area text-sm-center text-md-left">
    <div class="container">
       <div class="row">
          <div class="col-md-3 col-sm-6 font-weight-bold">
             <div class="single_ftr">
                <h4 class="sf_title footcust ">{{__('ui.contacts')}}</h4>
                <ul>
                   <li>Via Retrò, 01 - 1000, Rockabilly</li>
                   <li>(+39) 123456624</li>
                   <li>Contact@presto.it</li>
                  
                </ul>
             </div>
          </div> <!--  End Col -->
          
          <div class="col-md-3 col-sm-6 font-weight-bold">
             <div class="single_ftr">
                <h4 class="sf_title footcust ">{{__('ui.informations')}}</h4>
                <ul>
                   <li><a href="#">About Us</a></li>
                   <li><a href="#">Privacy Policy</a></li>
                   <li><a href="#">Terms & Conditions</a></li>
                   <li><a href="#">Contact Us</a></li>
                </ul>
             </div>
          </div> <!--  End Col -->
          
          <div class="col-md-3 col-sm-6 font-weight-bold">
             <div class="single_ftr">
                <h4 class="sf_title footcust">{{__('ui.services')}}</h4>
                <ul>
                  <li><a href="{{route('revisor.request')}}">{{__('ui.workWithUs')}}</a></li>
                  
                </ul>
             </div>
          </div> <!--  End Col -->	
          
          <div class="col-md-3 col-sm-6 font-weight-bold">
             <div class="single_ftr">
                <h4 class="sf_title footcust ">Newsletter</h4>
                <div class="newsletter_form">
                   <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, molestiae repudiandae maxime nisi eius doloribus officiis suscipit dolore. </p>
                   <form method="post" class="form-inline">				
                      <input name="EMAIL" id="email" placeholder="esempio@presto.it" class="form-control bg-light rounded" type="email">
                      <button type="submit" class="btn btn-default bg-dark"><i class="fa fa-search text-white"></i></button>
                   </form>
                </div>
             </div>
          </div> <!--  End Col -->
          
       </div>
    </div>
 
 
    <div class="ftr_btm_area">
       <div class="container">
          <div class="row">
             <div class="col-sm-4">
                <div class="ftr_social_icon">
                   <ul>
                      <li><a href="#" class="social1"><i class="fab fa-facebook-f social1"></i></a></li>
                      <li><a href="#" class="social2"><i class="fab fa-google social2"></i></a></li>
                      <li><a href="#" class="social3"><i class="fab fa-linkedin-in social3 "></i></a></li>
                      <li><a href="#" class="social4"><i class="fab fa-youtube social4"></i></a></li>
                      
                   </ul>
                </div>
             </div>
             <div class="col-sm-4 font-weight-bold">
                <p class="copyright_text text-center">© 2020 Copyright | Designed by Team404</p>
             </div>
             <div class="col-sm-4 ftr_social_icon text-center">
                <ul>
               <li>
                  @include('layouts._locale', ['lang' => 'it', 'nation' => 'it'])
                   </li>
                   <li>
                       @include('layouts._locale', ['lang' => 'en', 'nation' => 'gb'])
                   </li>
                   <li>
                       @include('layouts._locale', ['lang' => 'es', 'nation' => 'es'])
                   </li>
                  </ul>
             </div>
          </div>
       </div>
    </div>
 </footer>
 