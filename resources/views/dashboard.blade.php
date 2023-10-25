<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ALSA CV - CV Website Boss</title>
    <!-- Ion Icons Js -->
    <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"></script>
    <!-- JS -->
    <!-- CSS -->
    <link rel="stylesheet" href="style.css" />
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;500;700&display=swap");
/* Base */
:root {
  --clr-primary: #2f61a2;
}

*,
*::after,
*::before {
  box-sizing: border-box;
  padding: 0;
  margin: 0;
  font-family: "Nunito", sans-serif;
}

html {
  scroll-behavior: smooth;
}

body {
  width: 100%;
  min-height: 100vh;
  background: radial-gradient(#111, #071a1a);
  color: #fff;
  overflow-x: hidden;
}

.container {
  width: 80%;
  margin: 0 auto;
}

.flex {
  display: flex;
  align-items: center;
  justify-content: center;
}

.header,
.section {
  width: 100%;
  padding: 40px 0;
  overflow: hidden;
}

.header::after,
.header::before,
.section::after,
.section::before {
  content: "";
  background: url(https://raw.githubusercontent.com/programmercloud/pgc-gym/main/img/blur-1.png);
  position: absolute;
  width: 400px;
  height: 400px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: contain;
  bottom: 0;
}

.header::after {
  left: -200px;
}

.header::before {
  right: -200px;
}

.mb {
  margin-bottom: 30px;
}

.mt {
  margin-top: 20px;
}

.section {
  background: #1d1f1e;
  position: relative;
  padding: 80px 0;
}

.section::after {
  left: -200px;
}

.section::before {
  width: 600px;
  right: -200px;
}

.section:nth-child(even) {
  background: #141615;
}

.section:nth-child(even)::after,
.section:nth-child(even)::before {
  display: none;
}

.primary {
  font-size: 35px;
  font-weight: 700;
}

.secondary {
  font-size: 25px;
  font-weight: 700;
}

.tertiary {
  font-size: 15px;
}
/* End Base */

/* Menu */
.menu {
  width: 100%;
  background: linear-gradient(to right, #0e0e0e 70%, #142d2a);
  padding: 12px 0;
}

.menu .container {
  justify-content: space-between;
}

.mobile-btn {
  display: none;
}

.logo {
  cursor: pointer;
}

.logo img {
  width: 80px;
  height: auto;
}

.nav {
  list-style: none;
}

.nav-item {
  display: inline-block;
  margin-right: 30px;
  font-size: 18px;
  font-weight: 400;
}

.nav-item a {
  text-decoration: none;
  color: #fff;
}

.nav-item:hover a {
  color: #2f61a2;
  transition: 0.3s linear;
}

.nav-item:last-of-type {
  margin-right: 0;
}
/* End Menu */

/* Buttons */
.btn {
  padding: 10px 28px;
  background: var(--clr-primary);
  border-radius: 40px;
  font-size: 20px;
  font-weight: 400;
  text-decoration: none;
  color: #fff;
  display: inline-block;
}

.btn:hover {
  background: #2f61a2;
  transition: 0.3s linear;
}

.btn-2 {
  font-size: 35px;
  text-decoration: none;
  color: #ccc;
  transition: 0.3s linear;
}

.btn-2:hover {
  color: #2f61a2;
}

/* End Buttons */

/* Header */
.text {
  width: 60%;
}

.visual {
  width: 40%;
}

.visual img {
  width: 100%;
}

.header h1 {
  font-size: 70px;
  font-weight: 700;
}

.header h1 span {
  color: var(--clr-primary);
}
/* End Header */

.section:nth-child(even) .visual {
  margin-right: 30px;
}

/* Trainer */
#trainer {
  text-align: center;
}

.trainer img {
  border-top-left-radius: 80px;
  border-top-right-radius: 20px;
  border-bottom-right-radius: 80px;
  border-bottom-left-radius: 20px;
  margin-bottom: 10px;
  outline: 2px solid #fff;
  padding: 14px;
}

.trainer .mb {
  margin-bottom: 10px;
}
/* End Trainer */

/* Testimonial */
#testimonial .visual img {
  width: 90%;
  display: block;
  margin-left: auto;
}

.client {
  background: #fff;
  color: #000;
  padding: 20px 10px;
  margin-right: 20px;
  text-align: center;
  border-radius: 20px;
  position: relative;
  margin-top: 20px;
}

.client img {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  position: absolute;
  top: -40px;
  left: calc(50% - 40px);
}

.client h2 {
  margin: 20px 0 10px 0;
}
/* End Testimonial */

/* Discount */
#discount {
  padding: 40px 0;
}
/* End  Discount */

/* Footer */
.footer {
  padding: 30px 0;
  border-top: 1px solid #fff;
  text-align: center;
}
/* End Footer */

/* Responsive */

@media (max-width: 768px) {
  .flex {
    flex-direction: column;
    text-align: center;
  }

  .mobile-btn {
    display: block;
    font-size: 35px;
    cursor: pointer;
    position: absolute;
    right: 20px;
    top: 12px;
  }

  .menu.active .nav-item {
    display: block;
    margin: 30px 0;
  }

  .nav,
  .menu .btn {
    display: none;
  }

  .menu.active .nav,
  .menu.active .btn {
    display: block;
  }

  .menu.active {
    padding: 30px 0;
    width: 100%;
    transition: all 0.8s ease;
  }

  .text,
  .visual {
    width: 100%;
    margin-bottom: 20px;
  }

  .text h1 {
    font-size: 45px;
  }

  .primary {
    font-size: 28px;
  }

  .secondary {
    font-size: 22px;
  }

  .tertiary {
    font-size: 14px;
  }

  .trainer {
    margin-bottom: 20px;
  }

  .client {
    margin-bottom: 50px;
  }

  #discount .visual img {
    width: 70%;
    margin-bottom: 30px;
  }
}

@media (max-width: 530px) {
  .header::after,
  .header::before,
  .section::after,
  .section::before {
    display: none;
  }

  .primary {
    font-size: 25px;
  }

  .secondary {
    font-size: 20px;
  }

  .tertiary {
    font-size: 12px;
  }

  .text h1 {
    font-size: 34px;
  }

  .btn,
  .btn-2 {
    font-size: 16px;
  }
}

/* End Responsive */

@import url("https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;500;700&display=swap");
/* Base */
:root {
  --clr-primary: #2f61a2;
}

*,
*::after,
*::before {
  box-sizing: border-box;
  padding: 0;
  margin: 0;
  font-family: "Nunito", sans-serif;
}

html {
  scroll-behavior: smooth;
}

body {
  width: 100%;
  min-height: 100vh;
  background: radial-gradient(#111, #071a1a);
  color: #fff;
  overflow-x: hidden;
}

.container {
  width: 80%;
  margin: 0 auto;
}

.flex {
  display: flex;
  align-items: center;
  justify-content: center;
}

.header,
.section {
  width: 100%;
  padding: 40px 0;
  overflow: hidden;
}

.header::after,
.header::before,
.section::after,
.section::before {
  content: "";
  background: url(https://raw.githubusercontent.com/programmercloud/pgc-gym/main/img/blur-1.png);
  position: absolute;
  width: 400px;
  height: 400px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: contain;
  bottom: 0;
}

.header::after {
  left: -200px;
}

.header::before {
  right: -200px;
}

.mb {
  margin-bottom: 30px;
}

.mt {
  margin-top: 20px;
}

.section {
  background: #1d1f1e;
  position: relative;
  padding: 80px 0;
}

.section::after {
  left: -200px;
}

.section::before {
  width: 600px;
  right: -200px;
}

.section:nth-child(even) {
  background: #141615;
}

.section:nth-child(even)::after,
.section:nth-child(even)::before {
  display: none;
}

.primary {
  font-size: 35px;
  font-weight: 700;
}

.secondary {
  font-size: 25px;
  font-weight: 700;
}

.tertiary {
  font-size: 15px;
}
/* End Base */

/* Menu */
.menu {
  width: 100%;
  background: linear-gradient(to right, #0e0e0e 70%, #142d2a);
  padding: 12px 0;
}

.menu .container {
  justify-content: space-between;
}

.mobile-btn {
  display: none;
}

.logo {
  cursor: pointer;
}

.logo img {
  width: 80px;
  height: auto;
}

.nav {
  list-style: none;
}

.nav-item {
  display: inline-block;
  margin-right: 30px;
  font-size: 18px;
  font-weight: 400;
}

.nav-item a {
  text-decoration: none;
  color: #fff;
}

.nav-item:hover a {
  color: #2f61a2;
  transition: 0.3s linear;
}

.nav-item:last-of-type {
  margin-right: 0;
}
/* End Menu */

/* Buttons */
.btn {
  padding: 10px 28px;
  background: var(--clr-primary);
  border-radius: 40px;
  font-size: 20px;
  font-weight: 400;
  text-decoration: none;
  color: #fff;
  display: inline-block;
}

.btn:hover {
  background: #2f61a2;
  transition: 0.3s linear;
}

.btn-2 {
  font-size: 35px;
  text-decoration: none;
  color: #ccc;
  transition: 0.3s linear;
}

.btn-2:hover {
  color: #2f61a2;
}

/* End Buttons */

/* Header */
.text {
  width: 60%;
}

.visual {
  width: 40%;
}

.visual img {
  width: 100%;
}

.header h1 {
  font-size: 70px;
  font-weight: 700;
}

.header h1 span {
  color: var(--clr-primary);
}
/* End Header */

.section:nth-child(even) .visual {
  margin-right: 30px;
}

/* Trainer */
#trainer {
  text-align: center;
}

.trainer img {
  border-top-left-radius: 80px;
  border-top-right-radius: 20px;
  border-bottom-right-radius: 80px;
  border-bottom-left-radius: 20px;
  margin-bottom: 10px;
  outline: 2px solid #fff;
  padding: 14px;
}

.trainer .mb {
  margin-bottom: 10px;
}
/* End Trainer */

/* Testimonial */
#testimonial .visual img {
  width: 90%;
  display: block;
  margin-left: auto;
}

.client {
  background: #fff;
  color: #000;
  padding: 20px 10px;
  margin-right: 20px;
  text-align: center;
  border-radius: 20px;
  position: relative;
  margin-top: 20px;
}

.client img {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  position: absolute;
  top: -40px;
  left: calc(50% - 40px);
}

.client h2 {
  margin: 20px 0 10px 0;
}
/* End Testimonial */

#buttonlog {
  color: white;
  text-decoration: none;
  font-size: 24px;
}

#buttonlog:hover {
  color: #2f61a2;
  text-decoration: none;
  font-size: 24px;
}

#yoii {
  list-style: none;
}

/* Footer */
.footer {
  padding: 30px 0;
  border-top: 1px solid #fff;
  text-align: center;
}
/* End Footer */

/* Responsive */

@media (max-width: 768px) {
  .flex {
    flex-direction: column;
    text-align: center;
  }

  .mobile-btn {
    display: block;
    font-size: 35px;
    cursor: pointer;
    position: absolute;
    right: 20px;
    top: 12px;
  }

  .menu.active .nav-item {
    display: block;
    margin: 30px 0;
  }

  .nav,
  .menu .btn {
    display: none;
  }

  .menu.active .nav,
  .menu.active .btn {
    display: block;
  }

  .menu.active {
    padding: 30px 0;
    width: 100%;
    transition: all 0.8s ease;
  }

  .text,
  .visual {
    width: 100%;
    margin-bottom: 20px;
  }

  .text h1 {
    font-size: 45px;
  }

  .primary {
    font-size: 28px;
  }

  .secondary {
    font-size: 22px;
  }

  .tertiary {
    font-size: 14px;
  }

  .trainer {
    margin-bottom: 20px;
  }

  .client {
    margin-bottom: 50px;
  }

  #discount .visual img {
    width: 70%;
    margin-bottom: 30px;
  }
}

@media (max-width: 530px) {
  .header::after,
  .header::before,
  .section::after,
  .section::before {
    display: none;
  }

  .primary {
    font-size: 25px;
  }

  .secondary {
    font-size: 20px;
  }

  .tertiary {
    font-size: 12px;
  }

  .text h1 {
    font-size: 34px;
  }

  .btn,
  .btn-2 {
    font-size: 16px;
  }
}

/* End Responsive */


    </style>
</head>

<body>
    <!-- Menu -->
    <div class="menu">
        <div class="container flex">
            <!-- Mobile Button -->
            <div class="mobile-btn">
                <ion-icon name="grid"></ion-icon>
            </div>
            <div class="logo">
                <img src="https://cdn.freebiesupply.com/logos/large/2x/alsa-logo-png-transparent.png" alt="" />
            </div>

            <ul class="nav">
                <li class="nav-item"><a href="#">Home</a></li>
                <li class="nav-item"><a href="#why-us">About</a></li>
                <li class="nav-item"><a href="#explore">Our Services</a></li>
                <li class="nav-item"><a href="#">Skills</a></li>
                <li class="nav-item"><a href="#">Teams</a></li>
                <li class="nav-item"><a href="#discount">Contact</a></li>
            </ul>

            <a href="file:///D:/Project%20UAS/Login.html" class="btn">Hire Me</a>
            <li id="yoii"><a id="buttonlog" class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </li>
        </div>
    </div>
    <!-- End Menu -->

    <!-- Header -->
    <header class="header">
        <div class="container flex">
            <div class="text">
                <h1 class="mb">
                    Hii! My Name is<br />
                    <span>Alsa.</span> I'm a Web Developer and entrepreneur
                </h1>

                <p class="mb">
                    Let us help you build your new Hub in the World of Work!
                    Complete your new company opening from the comfort of your home & office.
                </p>

                <a href="#" class="btn mt">Download CV</a>
            </div>

            <div class="visual">
                <img src="AlsaFoto.png" width="1000" height="500" alt="" />
            </div>
        </div>
    </header>
    <!-- End Header -->

    <!-- Why Us -->
    <div class="section" id="why-us">
        <div class="container flex">
            <div class="text">
                <h2 class="primary mb">Why do u need to know about me?</h2>
                <h3 class="secondary mb">College Student.</h3>
                <p class="tertiary">
                  Second semester student of the Gadjah Mada University Software Engineering Department 
                  Capable in engineering software, able to communicate well and be able to work together in teams
                </p>
                <br>
                <h3 class="secondary mb">Other Reason</h3>
                <p class="tertiary">
                    Because I'm beautiful and cute.
                </p>
            </div>
            <div class="visual">
                <img src="ape see.svg" alt="" />
            </div>
        </div>
    </div>
    <!-- End Why Us -->

    <!-- Explore -->
    <div class="section" id="explore">
        <div class="container flex">
            <div class="visual">
                <img src="yoii.svg" alt="" />
            </div>
            <div class="text">
                <h2 class="primary mb">
                    Explore Our Business <br />
                    Studio
                </h2>
                <p class="tertiary mb">
                    Welcome to our Business Studio! We invite you to explore the range of services and expertise we offer to help businesses thrive and succeed.
                    No matter the size or industry of your business, our Business Studio is equipped to cater to your specific needs. We strive to deliver exceptional 
                    services that help businesses thrive in an ever-evolving market. Contact us today to explore how we can collaborate to drive your business forward!
                </p>

                <a href="#" class="btn mt">Get Started Now</a>
            </div>
        </div>
    </div>
    <!-- End Explore -->

    <!-- Trainer -->
    <div class="section" id="trainer">
        <h2 class="primary mb">Skills</h2>
        <div class="container flex">
            <div class="trainer">
                <img src="iya ini.svg"  width="300" height="200" alt="" />
                <h3 class="secondary mb">Business Intelligence Analysis and Digital Marketing at NobleD Best Business Singapore</h3>
                <p class="tertiary mb">
                  Learn the concepts of data collection, data transformation, data modeling, report generation, and data visualization using BI 
                  tools such as Power BI, Tableau, or QlikView. Conduct digital marketing strategy planning based on market and competitor analysis. 
                  Digital marketing plans, audience targeting, proper use of marketing channels, and measurement of marketing results.
                </p>

                <a href="#" class="btn-2">
                    <ion-icon name="arrow-redo-circle-outline"></ion-icon>
                </a>
            </div>

            <div class="trainer">
              <img src="iya ini.svg"  width="300" height="200" alt="" />
              <h3 class="secondary mb">Product Development and Coding Bootcamp at Skilvul and Samsung</h3>
              <p class="tertiary mb">
                Compiling algorithms and flowcharts on a Miro application and then designing the application using Figma. Create application programs using HTML, 
                CSS, and Javascript programming languages.
              </p>

              <a href="#" class="btn-2">
                  <ion-icon name="arrow-redo-circle-outline"></ion-icon>
              </a>
          </div>

          <div class="trainer">
            <img src="iya ini.svg"  width="300" height="200" alt="" />
            <h3 class="secondary mb">Business Community Development Manager at Singapore ITD Units</h3>
            <p class="tertiary mb">
              Setting targets and long-terms business strategies, building relationship with domestic and foreign customers, identifying business opportunities 
              through research data, conducting business negotiations, and monitoring market developments.
            </p>

            <a href="#" class="btn-2">
                <ion-icon name="arrow-redo-circle-outline"></ion-icon>
            </a>
          </div>
        </div>
    </div>
    <!-- End Trainer -->

    <!-- Testimonial -->
    <div class="section" id="testimonial">
        <div class="container flex">
            <div class="text">
                <h2 class="primary">
                    That's What Our Super <br />
                    Teams Says
                </h2>

                <br />
                <br />
                <br />

                <div class="client">
                    <img src="https://img.freepik.com/premium-photo/young-businessman-isolated-white_53419-207.jpg" alt="" />
                    <h2 class="secondary">Excelent!</h2>
                    <p class="tertiary">
                        I'm very happy to join the Excellent Community program guided by an extraordinary team. The instructors 
                        and facilitators involved in this program are truly knowledgeable and experienced in their respective fields. 
                        They radiate positive energy and enthusiasm that is contagious, making every acvtivities session fun and rewarding.
                    </p>
                </div>
            </div>
            <div class="visual">
                <img src="mumet mba.svg" alt="" />
            </div>
        </div>
    </div>
    <!-- End Testimonial -->

    <!-- Media -->
    <ul>
      <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
      <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
      <li><a href="#"><i class="fab fa-google-plus-g" aria-hidden="true"></i></a></li>
      <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
      <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
    </ul>
    <!-- End Media -->

    <!-- Discount -->
    <div class="section" id="discount">
        <div class="container flex">
            <div class="visual">
                <img src="bayar cuyy.svg" alt="" />
            </div>
            <div class="text">
                <h2 class="primary mb">
                    Business Classes This Summer, Pay Now And Get 25% Discount
                </h2>

                <p class="tertiary mb">
                    Get the business edge you've been looking for by taking a Business Class this Summer! We offer a special 
                    offer for those of you who pay now and get a 25% discount for all available classes.
                </p>
                <p>
                    In the Summer Business Class, you will gain in-depth insight and skills needed to grow your business or advance 
                    to a career in the business world. We offer a wide range of classes designed to meet the needs of business owners, 
                    entrepreneurs and professionals looking to hone their business knowledge and skills.
                </p>
                <br>
                <a href="#" class="btn bt">Book Now</a>
            </div>
        </div>
    </div>
    <!-- End Discount -->

    <!-- Footer -->
    <footer class="footer">
        <div class="container flex">
            <p class="tertiary">
                &copy; 2023 Alsa CV. All Rights Reserved.
            </p>
        </div>
    </footer>
    <!-- End Footer -->

    <script src="script.js"></script>
    <script>
        //Js
        document.querySelector(".mobile-btn").addEventListener("click", function () {
            document.querySelector(".menu").classList.toggle("active");
        });
    </script>
</body>

</html>