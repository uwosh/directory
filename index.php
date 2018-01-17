<!doctype html>
<html lang="eng">
  <head>
    <title>University of Wisconsin Oshkosh - Directory</title>

    <!-- Including Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <!-- Including datatables styles -->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>

    <!-- Additions of Styles -->
    <link rel="stylesheet" type="text/css" media="all" href="styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="all" href="styles/nestedStyle.css">
  </head>
  <header>
    <div class="wrapper">
      <div class="nav">
        <a class="toggle-nav">☰</a>
        <a class="toggle-quickLinks">☰</a>
        <ul class="top-nav" id="main-navigation">
          <li><a href="http://www.uwosh.edu/about-uw-oshkosh/" class="top-nav-link">About</a></li>
          <li><a href="http://www.uwosh.edu/academics/" class="top-nav-link">Academics</a></li>
          <li><a href="http://www.uwoshkoshtitans.com/landing/index" class="top-nav-link">Athletics</a></li>
          <li><a href="http://www.uwosh.edu/alumni" class="top-nav-link">Alumni</a></li>
          <li><a href="https://admissions.uwosh.edu/" class="top-nav-link">Admissions</a></li>
          <li><a href="http://www.uwosh.edu/administration/" class="top-nav-link">Administration</a></li>
          <li><a href="http://www.uwosh.edu/resources/" class="top-nav-link">Resources</a></li>
          <li><a href="http://www.uwosh.edu/calendars/" class="top-nav-link">Calendars</a></li>
          <li>
            <a href="http://www.uwosh.edu/titan-services" class="top-nav-link">Titan Services &#9662;</a>
            <ul class="titan-services">
              <li><a href="http://www.uwosh.edu/site-index" class="titanServices">Site Index</a></li>
              <li><a href="http://www.uwosh.edu/directory" class="titanServices">Directory</a></li>
              <li><a href="http://www.uwosh.edu/registrar/titanweb/" class="titanServices">Titan Web</a></li>
              <li><a href="http://www.uwosh.edu/titanapps/" class="titanServices">Titan Apps</a></li>
              <li><a href="https://titanfiles.uwosh.edu/xythoswfs/webview/xythoslogin.action" class="titanServices">Titan Files</a></li>
              <li><a href="https://my.wisconsin.edu/" class="titanServices">My UW System</a></li>
              <li><a href="http://www.uwosh.edu/d2l/" class="titanServices">Desire2Learn(D2L)</a></li>
              <li><a href="http://www.uwosh.edu/library/" class="titanServices">Polk Library</a></li>
              <li><a href="http://www.uwosh.edu/myuwo/" class="titanServices">MyUWO Portal</a></li>
              <li><a href="https://uwosh.collegiatelink.net/" class="titanServices">Student Clubs &amp; Orgs</a></li>
              <li><a href="https://uwosh.joinhandshake.com/login" class="titanServices">Handshake</a></li>
            </ul>
          </li>
        </ul>
      </div> <!-- End of "nav" -->
      <div class="logo-section">
        <div class="logoTitle">
          <div class="wordmark-wrapper">
              <a href="#"><img src="images/wordmark.png" class="wordmark" atl="University of Wisconsin wordmark linking to home page"></a>
          </div>
          <div class="directory-title">UW Oshkosh Directory</div>
          <div class="quicklinks">
            <ul>
              <li><a href="http://www.uwosh.edu/future-students/">Future Students</a></li>
              <li><a href="http://www.uwosh.edu/parents-family-friends/">Parents</a></li>
              <li><a href="http://www.uwosh.edu/alumni">Alumni</a></li>
              <li><a href="http://www.uwosh.edu/faculty-and-staff/">Faculty and Staff</a></li>
              <li><a href="http://www.uwosh.edu/current-students/">Current Students</a></li>
            </ul>
          </div> <!-- End of "quickLinks" -->
        </div> <!-- End of "logoTile" -->       
      </div> <!-- End of "logo-section" -->
    </div> <!-- End of "wrapper" -->
  </header>
  <body>
    <main class="body-wrapper">
      <!-- the directory application goes here -->

      <div class="container">
        <!-- Nav tabs -->
        <ul id="bootstrap-tabs" class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#search" role="tab">Search</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#update-information" role="tab">Updating your information</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#printed-directory" role="tab">Printed Directory</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#retired-staff" role="tab">Retired Staff</a>
          </li>
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="search" role="tabpanel">
            <div class="row">
              <div class="col-md-8">
                First name <input id="first-name-search" placeholder="Enter a first name">
                Last name <input id="last-name-search" placeholder="Enter a last name"><br />
                <ul id="bootstrap-pills" class="nav nav-pills">
                  <li class="nav-item">
                    <a class="nav-link active" id="all-pill" value="all" href="#">All</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="faculty-staff-pill" value="faculty-and-staff" href="#">Faculty and Staff</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="students-pill" value="students" href="#">Students</a>
                  </li>
                </ul>
                <div id="select-dept-dropdown" class="dropdown show department-select hidden">
                  <a class="btn btn-secondary dropdown-toggle" href="https://example.com" id="select-department-content" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" value="Select a department">
                    Select a department
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <!-- Loading in departments from the dept.txt file -->
                    <?php
                      $depts = file('depts.txt');
                      foreach( $depts as $dept ) {
                        $dept = trim($dept);
                        print "<option class='dropdown-item select-department'>";
                        print trim(preg_replace('/&/', '&amp;', $dept)) . "</option>\n";
                      }
                    ?>
                  </div>
                </div>
                <button id="search-btn" type="button" class="btn btn-primary">Search</button>
              </div>
              <div class="col-md-4">
                <p>
                  Examples:<br>
                  <b>First and Last Name:</b> Joe Smith or Smith, Joe<br />
                  <b>Email or Last Name:</b> smith or Smith<br />
                  <b>Campus Phone Number:</b> 1234
                </p>
              </div>
            </div>
            <div class="row results-row">
              <div class="col-md-12">
                <h3>Results</h3>
                <table id="directory" class="display">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Department</th>
                      <th>Mailstop</th>
                      <th>Plus 4 Zip</th>
                      <th>Office Room</th>
                      <th>Phone</th>
                      <th>Designation</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>Department</th>
                      <th>Mailstop</th>
                      <th>Plus 4 Zip</th>
                      <th>Office Room</th>
                      <th>Phone</th>
                      <th>Designation</th>
                    </tr>
                  </tfoot>
                  <tbody id="results-table">
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="update-information" role="tabpanel">
            <p>Students: <a href="http://www.uwosh.edu/registrar/titanweb/">Log into TitanWeb.</a></p>
            <p>Employees:To updated your home address, visit the <a href="https://my.wisconsin.edu">My UWSystem portal</a>; to update your departmental address, contact Rachael Kruszka in Human Resources at <a style="text-decoration:underline;" href="mailto:kruszkar@uwosh.edu?subject=Directory%20Update">kruszkar@uwosh.edu</a>.</p>
            <p>Under the Family Educational Rights and Privacy Act, students may have requested the nondisclosure of directory information. This means that the search may not reveal the names of selected students.</p>
          </div>
          <div class="tab-pane" id="printed-directory" role="tabpanel">
            <p>When it comes to sustainable practices, there are not many institutions that do it better than UW Oshkosh. In accordance with the University’s Sustainability Plan, there is a strong, growing on-campus recycling and waste reduction program. With this in mind it has been decided to forego the printed directory and instead embrace new technology.</p>
            <p>The online directory, also available in the <a style="text-decoration:underline;" href="http://m.uwosh.edu">University Mobile App</a>, is a quick and easy way to get the information you need quickly.</p>
          </div>
          <div class="tab-pane" id="retired-staff" role="tabpanel">
            <p><a href="http://www.uwosh.edu/directory/Directory_Retired_Staff_2014-15.pdf" style="text-decoration: underline">Directory of Retired Staff 2014-2015</a></p>
          </div>
        </div>
      </div> <!-- end container -->


    </main>
    <footer>
      <div class="topFooter">
        <span>The University of Wisconsin Oshkosh - Where Excellence and Opportuniy Meet.</span>
      </div> <!-- End of "portal-footer" -->
      <div class="middleFooter">
        <div class="midFooter-container">
          <div class="location-container mid-child">
            <div class="wismap">
              <a href="https://www.google.com/maps?q=University+of+Wisconsin+Oshkosh+800+Algoma+Blvd.+Oshkosh,+WI+54901&um=1&ie=UTF-8&hl=en&sa=N&tab=wl" target="_blank"><img src="images/footer/wismap-color.png"></a>
            </div> <!-- End of "wismap" -->
            <div class="address-phone">
              <p><b>Location</b></p>
              <p>
                <a href="https://www.google.com/maps?q=University+of+Wisconsin+Oshkosh+800+Algoma+Blvd.+Oshkosh,+WI+54901&um=1&ie=UTF-8&hl=en&sa=N&tab=wl" target="_blank">University of Wisconsin Oshkosh</a><br />
                <a href="https://www.google.com/maps/place/University+of+Wisconsin-Oshkosh/@44.0253186,-88.5532102,17z/data=!3m1!4b1!4m5!3m4!1s0x8803ebe40a08408b:0xb8f8ec18c1c8b267!8m2!3d44.0253186!4d-88.5510215?hl=en" target="_blank">
                  800 Algoma Blvd.<br />
                  Oshkosh, WI 54901<br />
                </a>
                <a href="#">(920) 424-1234</a>
              </p> 
            </div> <!-- End of "address-phone" -->
          </div> <!-- End of "location-container" -->
          <div class="mobileEmergency-container mid-child">
            <div class="mobile-emergency">
              <div>
                <a href="https://umc.uwosh.edu/mobile-app/"><i class="fa fa-mobile desaturate" aria-hidden="true"></i></a>
              </div>
              <div>  
                <a href="http://emergency.uwosh.edu/"><i class="fa fa-exclamation-triangle desaturate" aria-hidden="true"></i></a>
              </div>
            </div> <!-- End of "mobile-emergency" -->
            <div class="mobileEmergency-links">
              <p class="mobileEmergency-title"><b>Quick Links</b></p>
              <p><a href="https://umc.uwosh.edu/mobile-app/">Download UW Oshkosh's Mobile App</a>
              <p><a href="http://emergency.uwosh.edu/" class="emergency-p">Emergency and Safety Information</a></p>
            </div> <!-- End of "mobileEmergency-links" -->
          </div> <!-- End of mobileEmergency-container" -->
          <div class="resources-container mid-child">
            <div class="resourcesLinks">
              <p><b>Resources</b></p>
              <ul class="resources-links">
                <li><a href="http://www.uwosh.edu/resources/accessibility/">Accessibility</a></li>
                <li><a href="https://www.google.com/maps?q=University+of+Wisconsin+Oshkosh+800+Algoma+Blvd.+Oshkosh,+WI+54901&um=1&ie=UTF-8&hl=en&sa=N&tab=wl" target="_blank">Get Directions</a></li>
                <li><a href="https://umc.uwosh.edu/for-media/">Media Relations</a></li>
                <li><a href="https://hr.uwosh.edu/careers/">Work at UW Oshkosh</a></li>
              </ul>
            </div> <!-- End of "resourcesLinks" -->
          </div> <!-- End of "resources-container" -->
          <div class="accredited-container mid-child">
            <div class="accredited-uwo">
                <a href="http://www.hlcommission.org/?option=com_directory&Action=ShowBasic&instid=2030" target="_blank"><img src="images/footer/hlc.png" class="accredited"></a>
                <a href="https://www.wisconsin.edu/" target="_blank"><img src="images/footer/uw-system.png" class="uwo-system"></a>
            </div> <!-- End of "accredted-uwo" -->
          </div> <!-- End of "accredited-container" -->
        </div> <!-- End of "midFooter-container" -->
      </div> <!-- End of "middleFooter" -->
      <div class="bottomFooter">
        <div class="copyright">
          <span>&copy;<script>document.write(new Date().getFullYear())</script> UW Board of Regents</span>
        </div> <!-- End of "copyright" -->
        <div class="socialMedia-footer">
            <a href="https://www.facebook.com/uwoshkosh" target="_blank"><i class="fa fa-facebook fa-2x desaturate" aria-hidden="true" alt="Facebook logo"></i></a>
            <a href="https://twitter.com/uwoshkosh" target="_blank"><i class="fa fa-twitter fa-2x desaturate" aria-hidden="true" alt="Twitter logo"></i></a>
            <a href="https://www.instagram.com/uwoshkosh/" target="_blank"><i class="fa fa-instagram fa-2x desaturate" aria-hidden="true" alt="Instagram logo"></i></a>
            <a href="https://www.youtube.com/user/uwosh" target="_blank"><i class="fa fa-youtube-play fa-2x desaturate" aria-hidden="true" alt="YouTube logo"></i></a>
            <a href="https://www.linkedin.com/edu/school?id=19693" target="_blank"><i class="fa fa-linkedin fa-2x desaturate" aria-hidden="true" alt="LinkedIn logo"></i></a>
            <a href="https://www.pinterest.com/uwoshkosh/" target="_blank"><i class="fa fa-pinterest-p fa-2x desaturate" aria-hidden="true" alt="Pinterest logo"></i></a>
            <a href="https://www.flickr.com/photos/uwoshkosh/sets/" target="_blank"><i class="fa fa-flickr fa-2x desaturate" aria-hidden="true" alt="Flickr logo"></i></a>
        </div> <!--End of "socialMedia-Icons" -->
      </div> <!-- End of "bottomContainer" -->
    </footer>

    <!-- Including Bootstrap plugins, Popper, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script type="text/javascript" src="datatables/datatables.min.js"></script>

    <script type="text/javascript" src="js/directory.js"></script>
    <script type="text/javascript" src="js/search-ajax.js"></script>
    
  </body>
</html>