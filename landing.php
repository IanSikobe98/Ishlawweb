<!DOCTYPE html>

<html lang="">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->
<head>
<title>Ishlaw</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
 <style type="text/css">
.kaplan-container {
  display: flex;
 height: 100px;
  position: relative;
  padding-top: 0px; /* Adjust the padding as needed */
  box-sizing: border-box; /* Add this line */
  margin-top: 0;
  padding-left: 150px;
    
}

.first-div,
.middle-div,
.third-div {
  flex: 2;
  padding: 10px;
  font-size: 15px;
  margin: 0;
  box-sizing: border-box; /* Add this line */
  text-overflow: ellipsis; /* Add this line */
  white-space: nowrap; /* Add this line */
}

.middle-div {
  position: relative;
  margin-left: 10px;
}

.tags-list {
  margin: 0;
  padding: 0;
  list-style-type: none;
}

.tags-list li {
  margin-bottom: 5px;
}

.tags-list li a {
  display: inline-block;
  padding: 5px 10px;
  background-color: #eee;
  text-decoration: none;
  color: #333;
}

.vertical-line {
  position: absolute;
  top: 0;
  bottom: 0;
  
  width: 2px;
  height: 120px;
  background-color: #ccc;
  content: "";
}
.left-line {
  left: 0;
  margin-right: 10px;
}

.right-line {
  right: 0;
  margin-right: 5px;
}
.change{
  font-size: 15px;
  color: black;
  font-weight: bold;
  font-style: italic;
}
.scheme{
  background-color: #005E7C;
}
.schematics {
  margin-left: 190px;
}
.colors{
  color: #005E7C;
  font-size: 30px;
}
 .carousel-container {
  position: relative;
  width: 100%;
  height: 500px;
  overflow: hidden;
  align-items: center;
}

.carousel-slides img {
  position: absolute;
  width: 100%;
  height: 100%;
  opacity: 0;
  transition: opacity 0.5s ease-in-out;
}

.carousel-dots {
  position: absolute;
  bottom: 10px;
  left: 50%;
  transform: translateX(-50%);
}

.carousel-dots .dot {
  display: inline-block;
  width: 12px; /* Increase the width */
  height: 12px; /* Increase the height */
  border-radius: 50%;
  background-color: #ccc;
  margin: 0 8px; /* Increase the margin for spacing */
  cursor: pointer;
}

.carousel-dots .dot.active {
  background-color: #555;
}

.carousel-text {
  position: absolute;
  bottom: 20px;
  left: 50%;
  transform: translateX(-50%);
  color: #fff;
  text-align: center;
  width: 100%;
}
.carousel-slides img {
  /* ... */
  opacity: 0;
  transition: opacity 0.5s ease-in-out; /* Add transition property */
}

.carousel-slides img.active {
  opacity: 1;
}
.carousel-dots .dot.active {
  background-color: #555;
}
.carousel-text .text-container {
  display: none;
}

.carousel-text .text-container.active {
  display: block;
}
.logo {
  color: black;
}
.logo span{color:#F7A804;}
.fade-in-out h1 {
  animation: fade 3s infinite;
}

@keyframes fade {
  0%, 100% { opacity: 0; }
  50% { opacity: 1; }
</style>

</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <header id="header" class=" clear"> 
    <!-- ################################################################################################ -->
    <div class="kaplan-container">
  <div class="first-div">
   <h1 class="colors"><a href="index.html"><span class="logoname">I.N. Nyaribo</span> </a>Advocates</h1>
    <!-- Content for the first div -->
  
  </div>
  
  <div class="middle-div">
<div class="vertical-line left-line"></div>
  
    <!-- Content for the middle div -->
    <ul class=" tags-list one_half first">
      <li><a class="faicon-facebook" href="#"><i class="fa fa-phone"></i></a><span class="change"> +254 20 2637 980 | +254 735 758 758</span></li>
      <li><a class="faicon-facebook" href="#"><i class="fa fa-envelope"></i></a><span class="change"> ishmael@ishlaw.co.ke</span></li>
      <li><a class="faicon-facebook" href="#"><i class="fab fa-twitter"></i></a><span class="change"> IshmaelN</span></li>
    </ul>
    
    <!-- Icons or additional content for the middle div -->

    <div class="vertical-line right-line"></div>
  </div>
  
  <div class="third-div">
    <h1 class="colors"><a href="index.html"><span class="logoname">Africa Claims</span></a> Registrars</h1>
    <!-- Content for the third div -->
  </div>
</div>
    <!-- ################################################################################################ -->
  </header>
  <nav id="mainav" class=" clear"> 
    <!-- ################################################################################################ -->
        <div class="scheme">
      
    <ul class="clear schematics">
      <li class=""><a href="index.html">Home</a></li>
      <li><a class="drop" href="#Practice">Practice areas</a>
        <ul>
          <li><a href="#Practice">Commerical Litigation</a></li>
          <li><a href="#Practice">Family law</a></li>
          <li><a href="#Practice" >Civil law</a></li>
          <li><a  href="#Practice">Criminal law</a></li>
         
        </ul>
      </li>
      
      
      <li><a href="#mission">Our Mission Statement</a></li>
      <li><a href="#testimonials">About Us</a></li>
      <li><a href="#cta">Contact Us</a></li>
       <li><a href="login.php">Staff Login</a></li>
    </ul>
  </div>    <!-- ################################################################################################ -->
  </nav>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="carousel-container">

  <div class="carousel-slides">
    <img src='images/demo/backgrounds/carousel-2.jpg' alt="Image 1">
    <img src='images/demo/backgrounds/carousel-3.jpg' alt="Image 2">
    <img src='images/demo/backgrounds/civil.jpg' alt="Image 3">
    
  </div>

  <div class="carousel-dots">
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
  </div>

  <div class="carousel-text">
    <div class="text-container ">
      <div class="fade-in-out">
  <h1 class="logoname">Corporates Governance</h1>
</div>
      

    </div>
    <div class="text-container">
        <div class="fade-in-out">
  <h1 class="logoname">Legal and regulatory compliance</h1>
</div>
    
     
    </div>
    <div class="text-container">
      <div class="fade-in-out">
   <h1 class="logo"><span>Corporate Claims mitigation</span> </h1>
</div>
      
            
    </div>
  </div>
</div>
<script type="text/javascript">
  // JavaScript variables

// JavaScript variables
// JavaScript variables
// JavaScript variables
// JavaScript variables
var slides = document.querySelectorAll('.carousel-slides img');
var dots = document.querySelectorAll('.carousel-dots .dot');
var textContainers = document.querySelectorAll('.carousel-text .text-container');
var currentSlide = 0;
var slideInterval = setInterval(nextSlide, 5000); // Auto-slide interval (5 seconds)

// Display the first slide and dot as active initially
slides[currentSlide].classList.add('active');
dots[currentSlide].classList.add('active');
textContainers[currentSlide].classList.add('active');

// Add click event listeners to dots
dots.forEach(function(dot, index) {
  dot.addEventListener('click', function() {
    pauseSlideInterval();
    goToSlide(index);
    resumeSlideInterval();
  });
});

// Function to switch to the next slide
function nextSlide() {
  pauseSlideInterval();
  goToSlide(currentSlide + 1);
  resumeSlideInterval();
}

// Function to go to a specific slide
function goToSlide(n) {
  slides[currentSlide].classList.remove('active');
  dots[currentSlide].classList.remove('active');
  textContainers[currentSlide].classList.remove('active');
  currentSlide = (n + slides.length) % slides.length;
  slides[currentSlide].classList.add('active');
  dots[currentSlide].classList.add('active');
  textContainers[currentSlide].classList.add('active');
}

// Clear the slide interval on dot click or manual navigation
function pauseSlideInterval() {
  clearInterval(slideInterval);
}

// Resume the slide interval after dot click or manual navigation
function resumeSlideInterval() {
  slideInterval = setInterval(nextSlide, 5000);
}

// Initial slide interval setup
resumeSlideInterval();


</script>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div id="Practice" class="sectiontitle">
      <h6 class="heading">Our Practice areas</h6>
      <p>Our services</p>
    </div>

    <ul class="nospace group overview">
      <li class="one_third">

        <figure><a ><img src="images/demo/backgrounds/portfolio-2.jpg" alt=""></a>
          <figcaption>

            <h6 id="try" class="heading">Commercial litigation</h6>
            <p>Our Litigation team combines legal expertise with a commitment to finding quick creative and cost effective solutions for our clients.</p>
          </figcaption>
        </figure>
      </li>
      <li class="one_third">
        <figure><a ><img src="images/demo/backgrounds/portfolio-3.jpg" alt=""></a>
          <figcaption>
            <h6 class="heading">Commercial agreements</h6>
            <p>We do commercial agreements across a number of industries. Our team's approach is to ensure
each agreement meets the clients' needs and goals.</p>
          </figcaption>
        </figure>
      </li>
      <li class="one_third">
        <figure><a ><img src="images/demo/backgrounds/portfolio-5.jpg" alt=""></a>
          <figcaption>
            <h6 class="heading">Corporate law</h6>
            <p>We provide advice to public and private companies both local and international through
our Corporate Law Department.</p>
          </figcaption>
        </figure>
      </li>
      <li class="one_third">
        <figure><a ><img src="images/demo/backgrounds/portfolio-6.jpg" alt=""></a>
          <figcaption>
            <h6 class="heading">Criminal law</h6>
            <p>I.N. Nyaribo Advocates handles select criminal matters for select clientele that vary from
customer or employee fraud in financial institutions.</p>
          </figcaption>
        </figure>
      </li>
      <li class="one_third">
        <figure><a href="#"><img src="images/demo/backgrounds/lit.jpg" alt=""></a>
          <figcaption>
            <h6 class="heading">Media law</h6>
            <p>We derive our strength and expertise from our devoted clients’ briefs in the media industry.</p>
          </figcaption>
        </figure>
      </li>
      <li class="one_third">
        <figure><a href="#"><img src="images/demo/backgrounds/family.jpg" alt=""></a>
          <figcaption>
            <h6 class="heading">Family law</h6>
            <p>The firm has handled a wide range of Divorce and matrimonial causes matters, children protection and spouse misunderstandings.</p>
          </figcaption>
        </figure>
      </li>
    </ul>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div id="why" class="sectiontitle">
      <h6 class="heading">Why choose us</h6>
      <p>Reasons to consult with us</p>
    </div>
    <div class="group center">
      <article class="one_third first"><a class="ringcon btmspace-50" href="#"><i class="fa fa-gavel"></i></a>
        <h6 class="heading">Best law practices</h6>
        <p>"Experience legal excellence with our innovative strategies and personalized approach. Our firm's best law practices ensure the highest level of success and satisfaction for our clients."</p>
      </article>
      <article class="one_third"><a class="ringcon btmspace-50" href="#"><i class="fa fa-balance-scale"></i></a>
        <h6 class="heading">Efficiency and trust</h6>
        <p>"Efficient and effective legal solutions with a focus on building long-lasting trust. Our firm is dedicated to achieving outstanding results while providing unparalleled client service and support."</p>
      </article>
      <article class="one_third"><a class="ringcon btmspace-50" href="#"><i class="far fa-smile"></i></a>
        <h6 class="heading">Results you deserve</h6>
        <p>"At our law firm, we believe you deserve exceptional results. With our expertise, personalized approach, and unwavering commitment, we'll fight tirelessly to deliver the justice you deserve."</p>
      </article>
    </div>
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper gradient">
  <section id="testimonials" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <h6 class="heading">About us</h6>
      <p>Learn more about I.N. NYARIBO & CO. ADVOCATES</p>
    </div>
    <article class=""><img src="images/demo/backgrounds/clean.jpg" alt="">
      <blockquote>I.N. Nyaribo & Co. Advocates was formed in 2003 with an objective of providing dynamic
legal services to meet the diverse needs of the society. Over the years, we have
embarked on effective and efficient client representation across the board and thus have
allowed policy makers and individual clients to achieve their goals while minimizing legal
risks. The firm engages in specialized associates and an exceptionally exciting staff full of
talent energy and dynamism. We have networking offices in the USA, Canada UK,
Malaysia & Africa.</blockquote>
      <h6 class="heading">Mr. Ishmael Nyaribo</h6>
      <em>CEO/Senior Partner</em></article>
    
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row2">
<section id="testimonials" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div id="mission" class="sectiontitle">
      <h6 class="heading">Our mission statement</h6>
          </div>
    <article class="">
      <blockquote>At I.N Nyaribo & Co. Advocates, we shall endeavor to take one matter at time. Allowing
clients opportunity to procure from us the best available mitigation services thereby
allowing them to concentrate on their business concern by embracing employee
development which will total will achieve true connection between Law and Society.</blockquote>
      <h6 class="heading">Mr. Ishmael Nyaribo</h6>
      <em>CEO/Senior Partner</em></article>
    
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper gradient">
   <section id="cta" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <h6 class="heading">Contact us today</h6>
      <p>Contact us for more details and book an appointment</p>
    </div>
    <ul class="nospace clear">
      <li class="one_third first">
        <div class="block clear"><i class="fas fa-phone"></i> <span><strong>Give us a call:</strong> +00 (123) 456 7890</span> </div>
      </li>
      <li class="one_third">
        <div class="block clear"><i class="fas fa-envelope"></i> <span><strong>Send us an e-mail:</strong> support@domain.com</span> </div>
      </li>
      <li class="one_third">
        <div class="block clear"><i class="fas fa-map-marker-alt"></i> <span><strong>Come visit us:</strong> Lange Lange Apartments,
Behind Heron Portico Hotel,
Jakaya Kikwete Road. </span> </div>
      </li>
    </ul>
    <!-- ################################################################################################ -->
  </section>
</div>

<div class="wrapper row4">
  <footer id="footer" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="one_third first">
      <h1 class="logoname">I.N. Nyaribo Advocates</h1>
      <p class="btmspace-30">Experience the power of exceptional legal representation. Our firm's innovative strategies, expertise, and personalized approach ensure outstanding results and unparalleled client satisfaction.</p>
      <ul class="faico clear">
        <li><a class="faicon-facebook" href="#"><i class="fab fa-facebook"></i></a></li>
        <li><a class="faicon-linkedin" href="#"><i class="fab fa-linkedin"></i></a></li>
        <li><a class="faicon-twitter" href="#"><i class="fab fa-twitter"></i></a></li>
       </ul>
    </div>
    <div class="one_third">
      <h6 class=" logoname">Practice areas</h6>
      <ul class="nospace linklist">
        <li>Commercial litigation</li>
        <li>Family law</li>
        <li>Civil law</li>
        <li>Criminal law</li>
      </ul>
    </div>
    <div class="one_third">
      <h2 class="logoname">Business Hours</h2>
              <div class="">
                <h4 class="logoname">Opening Days:</h4>
                <p >
                  <span>Monday – Friday : 8.00 am to 5.00 pm</span>
                  
                </p>
                <h4 class="logoname">Vacations:</h4>
                <p>
                  <span>Weekends and</span>
                  <span>All Official Holidays</span>
                </p>
     
    </div>
    <!-- ################################################################################################ -->
  </footer>
</div>

<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
 </p>
  </div>
</div>

<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>