






<!DOCTYPE html>
<html lang="en">

<head>
  <title>OurHealth</title>
  @include('includes.header')
</head>

<body>
    {{$data = 'App\models\User'::where('id','=',Session::get('loginId'))->first();}}
    @include('includes.navbar')


  <!-- ======= Hero Section ======= -->
  @if(Session::has('loginId'))
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      
      @if ($data->profil=="Patient")
        <h1>Welcome Mr.{{ $data->nom .' '. $data->prenom }}</h1>
        <h2> To your {{$data->profil}} Interface </h2>
        <a href="/dashboardP" class="btn-get-started scrollto">Dashboard</a>
      @elseif($data->profil=="Doctor") 
        <h1>Welcome Dr.{{ $data->nom .' '. $data->prenom }}</h1>
        <h2> To your {{$data->profil}} Interface </h2>
        <a href="/dashboardD" class="btn-get-started scrollto">Dashboard</a>
      @elseif($data->profil=="Admin")
        <h1>Welcome Admin.{{ $data->nom .' '. $data->prenom }}</h1>
        <h2> To your {{$data->profil}} Interface </h2>
        <a href="/dashboardA" class="btn-get-started scrollto">Dashboard</a>

      @endif
    </div>
  </section><!-- End Hero -->
  
  @else
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>Welcome to OurHealth Plateform</h1>
      <h2>Interactive Plateform between Sick Patients and Doctors</h2>
      <a href="{{ Route('inscription') }}" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section><!-- End Hero -->
  @endif



  <main id="main">

    <!-- ======= About Us Section ======= -->
    <br><br><br><br><br><br><br><br><br><br>
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>
              “What is the importance of a computer application in terms of communication and information retrieval in enhancing the relationship between the sick patient and the doctor and any other hospital structure?“
              </p>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              In this platform, we will try to offer some answers to this problem with a view to making the “service Patient-Doctor relationship more enlightened, more dynamic and beneficial for both parties.
            </p>
            <a href="#" class="btn-learn-more">Learn More</a>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->


    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Services</h2>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-heartbeat"></i></div>
              <h4><a href="">Heart disease</a></h4>
              <p>Your <strong>OurHealth</strong> platform is the perfect solution</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-pills"></i></div>
              <h4><a href="">Effective medicine</a></h4>
              <p>Your <strong>OurHealth</strong> platform is the perfect solution</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-hospital-user"></i></div>
              <h4><a href="">Disease diagnosis</a></h4>
              <p>Your <strong>OurHealth</strong> platform is the perfect solution</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-dna"></i></div>
              <h4><a href="">Urgency</a></h4>
              <p>Your <strong>OurHealth</strong> platform is the perfect solution</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-wheelchair"></i></div>
              <h4><a href="">Physical disability</a></h4>
                <p>Your <strong>OurHealth</strong> platform is the perfect solution</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-notes-medical"></i></div>
              <h4><a href="">First aid</a></h4>
               <p>Your <strong>OurHealth</strong> platform is the perfect solution</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Appointment Section ======= -->
        
    <!-- End Appointment Section -->

    <!-- ======= Departments Section ======= -->
    <section id="departments" class="departments">
      <div class="container">

        <div class="section-title">
          <h2>Departments</h2>
        </div>

        <div class="row">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Cardiology</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Neurology</a>
              </li>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Pediatrics</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Optometry</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Cardiology</h3>
                    <p class="fst-italic">Cardiology is a branch of medicine that deals with the disorders of the heart as well as some parts of the cardiovascular system</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/departments-1.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Neurology</h3>
                    <p class="fst-italic">
                    Neurology is a branch of medicine dealing with disorders of the nervous system</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/departments-2.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Pediatrics</h3>
                    <p class="fst-italic">Paediatrics is the branch of medicine that involves the medical care of infants, children, and adolescents</p>
                    </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/departments-4.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-5">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Optometry</h3>
                    <p class="fst-italic">Optometry is a specialized health care profession that involves examining the eyes and related structures for defects or abnormalities</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/departments-5.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Departments Section -->


   <!-- ======= Team Section ======= -->
   <section id="team" class="team section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Team</h2>
      </div>

      <div class="row">

        <div class="col-lg-6">
          <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
            <div class="pic"><img src="{{ asset('assets/img/team/CV.jpg') }}" width="200" height="200" style="border-radius: 50%" class="img-fluid" alt="Responsive image"></div>
            <div class="member-info"><br>
              <h4> Abdellatif Satir</h4>
              <span> Chief Executive Officer</span>
              <p> Development Manager (Front-End, Back-End)</p>
              <div class="social">
                <a href=""><i class="ri-twitter-fill"></i></a>
                <a href=""><i class="ri-facebook-fill"></i></a>
                <a href=""><i class="ri-instagram-fill"></i></a>
                <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6 mt-4 mt-lg-0">
          <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="200">
            <div class="pic"><img src="{{ asset('assets/img/team/CV2.png') }}" width="230" height="230" style="border-radius: 50%" class="img-fluid" alt="Responsive image"></div>
            <div class="member-info"><br>
              <h4> Yassine El Amrani</h4>
              <span> Chief Executive Officer</span>
              <p> Development Manager (Front-End, Back-End)</p>
              <div class="social">
                <a href=""><i class="ri-twitter-fill"></i></a>
                <a href=""><i class="ri-facebook-fill"></i></a>
                <a href=""><i class="ri-instagram-fill"></i></a>
                <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- End Team Section -->

    <!-- ======= Gallery Section ======= -->
    <!-- End Gallery Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
        </div>
      </div>

      <div class="container">
        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p></p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p></p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p></p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->


  <!-- ======= Footer ======= -->
  @include('includes.footer')
  @include('includes.scripts')

</body>
</html>