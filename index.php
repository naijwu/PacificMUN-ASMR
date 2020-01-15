<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PacificMUN Delegate Registration</title>

    <link href="https://fonts.googleapis.com/css?family=DM+Sans:400,700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="logo-coloured.png">
    <link rel="stylesheet" href="form-style.css">
  </head>
  <body>
    <header>
      <img src="/logo.svg" alt="">
    </header>
    <div class="bar"> 
      Delegate Registration Form
    </div>
    <div class="container">
      <div class="heading">
        <h2>Delegate Registration</h2>
      </div>
      <?php
      if(isset($_GET['status'])) {
        if ($_GET['status']=="success") {
          echo <<<_END
            <div class="notification">
              You have successfully registered for PacificMUN 2020! An email confirming your application 
              has been sent to you. If you do not see it after 5 minutes, please contact IT@pacificmun.org
            </div>
_END;
        } else if ($_GET['status']=="alreadyRegistered") {
          echo <<<_END
            <div class="error">
              You've already registered. If you think this is a mistake, please email IT@pacificmun.org with 
              your name.  
            </div>
_END;
        } else if ($_GET['status']=="nullSchool") {
          echo <<<_END
            <div class="error">
              Please fill out the school input. If you do not see your school there, you must register your 
              school as a delegation.  
            </div>
_END;
        } else if ($_GET['status']=="dberror") {
          echo <<<_END
            <div class="error">
              Database Error. We greatly apologies for any and all inconveniences. Please contact IT@pacificmun.org
            </div>
_END;
        }
      }
      ?>
      <form class="asmr" action="includes/register.inc.php" method="post">
        <div class="left">
          <div class="basic-info">
            <div class="section">
              <!-- name -->
              <div class="label">
                Full Name *
              </div>
              <input type="text" name="name" value="" required>
            </div>
            <div class="section">
              <div class="label">
                Email *
              </div>
              <input type="text" name="email" value="" required>
            </div>
          </div>
          <div class="school-info">
            <div class="section">
              <!-- TODO: connect this with a choice dropdown and the school registration form -->
              <div class="label">
                School *
              </div>
              <select name="school" required>
                <option value="null">Select School</option>
                <option value="abbotsfordseniorsecondaryschool">Abbotsford Senior Secondary School</option>
                <option value="brentwoodcollege">Brentwood College</option>
                <option value="burnabymountainsecondaryschool">Burnaby Mountain Secondary School</option>
                <option value="burnabynorthsecondaryschool">Burnaby North Secondary School</option>
                <option value="carsongrahamsecondaryschool">Carson Graham Secondary School</option>
                <option value="coastmountainacademy">Coast Mountain Academy</option>
                <option value="drcharlesbestsecondary">Dr. Charles Best Secondary</option>
                <option value="elginparksecondary">Elgin Park Secondary</option>
                <option value="erichambersecondaryschool">Eric Hamber Secondary School</option>
                <option value="fraserheightssecondaryschool">Fraser Heights Secondary School</option>
                <option value="glenlyonnorfolkseniorschool">Glenlyon Norfolk Senior School</option>
                <option value="hughmcrobertssecondaryschool">Hugh McRoberts Secondary School</option>
                <option value="julesvernesecondaryschool">Jules Verne Secondary School</option>
                <option value="langleysecondary">Langley Secondary</option>
                <option value="lordbyngsecondaryschool">Lord Byng Secondary School</option>
                <option value="mountdouglassecondaryschool">Mount Douglas Secondary School</option>
                <option value="pentictonsecondary">Penticton Secondary</option>
                <option value="pacificacademy">Pacific Academy</option>
                <option value="pacificchristianschool">Pacific Christian School</option>
                <option value="greaterseattleunaffiliated">Greater Seattle Unaffiliated</option>
                <option value="semiahmoosecondary">Semiahmoo Secondary</option>
                <option value="southpointeacademy">Southpointe Academy</option>
                <option value="stellyssecondaryschool">Stelly's Secondary School</option>
                <option value="stevenstonlondonsecondaryschool">Steveston London Secondary School</option>
                <option value="stmargaretsschool">St. Margaret's School</option>
                <option value="stmichaelsuniversityschool">St. Michaels University School</option>
                <option value="stpatrickregionalsecondary">St. Patrick Regional Secondary</option>
                <option value="stratfordhall">Stratford Hall</option>
                <option value="terryfoxsecondary">Terry Fox Secondary</option>
                <option value="vancouvercollege">Vancouver College</option>
                <option value="independent">Independent</option>
              </select>
            </div>
            <div class="section">
              <div class="label">
                Grade *
              </div>
              <input type="text" name="grade" value="" required>
            </div>
          </div>
          <div class="more-info">
            <div class="section">
              <!-- DoB -->
              <div class="label">
                Date of Birth *
              </div>
              <input type="text" name="dob" value="" required>
            </div>
            <div class="section">
              <div class="label">
                Gender *
              </div>
              <input type="text" name="sex" value="" required>
            </div>
          </div>
          <div class="more-info">
            <div class="section">
              <!-- Address -->
              <div class="label">
                Address *
              </div>
              <input type="text" name="address" value="" required>
            </div>
            <div class="section">
              <!-- Address -->
              <div class="label">
                City *
              </div>
              <input type="text" name="city" value="" required>
            </div>
            <div class="section">
              <!-- Address -->
              <div class="label">
                Province/State *
              </div>
              <input type="text" name="state" value="" required>
            </div>
          </div>
          <div class="divider"></div>
          <div class="more-info">
            <div class="section">
              <!-- phone -->
              <div class="label">
                Cell Phone Number *
              </div>
              <input type="text" name="cell" value="" required>
            </div>
            <div class="section">
              <div class="label">
                Home Phone Number
              </div>
              <input type="text" name="home" value="">
            </div>
          </div>
          <div class="divider"></div>
          <div class="more-info">
            <div class="section">
              <!-- emergency contact -->
              <div class="label">
                Emergency Contact (Fullname) *
              </div>
              <input type="text" name="emergency" value="" required>
            </div>
            <div class="section">
              <div class="label">
                Relationship to Delegate *
              </div>
              <input type="text" name="emergencyrelationship" value="" required>
            </div>
          </div>
          <div class="more-info">
            <div class="section">
              <!-- emergency contact -->
              <div class="label">
                Emergency Contact Phone Number *
              </div>
              <input type="text" name="emergencyphone" value="" required>
            </div>
          </div>
          <div class="divider"></div>
          <div class="section">
            <!-- parse data by comma and new lines and also keep count of how many -->
            <div class="label">Past MUN Experience</div>
            <div class="sub-label">Leave blank if you've had no experience, otherwise please format it like this: </div>
            <div class="example">
              <div class="example-q">
                <font style="font-style:italic;">Conference & Year, Country/Staff Position, Award (if applicable)</font> <br>
                PacificMUN 2017, DISEC, United States of America <br>
                PacificMUN 2018, ECOFIN, Russian Federation, Honourable Mention <br>
                PacificMUN 2019, ECOFIN, Pakistan, Best Delegate <br>
                PacificMUN 2020, Delegate Affairs
              </div>
            </div>
            <textarea name="pastexp" rows="8" cols="80"></textarea>
          </div>
        </div>
        <div class="right">
          <div class="divider"></div>
          <div class="section">
            
            <div class="label">
                Committe & Country Preferences
            </div>
            <div class="sub-label" style="text-transform:none;letter-spacing:0.1px; padding-bottom:5px;">Please refer to the country matrix for availability and spelling. They must be spelt identical.&mdash; <a href="countrymatrix.php" target="_blank">Country Matrix</a>. For ADHOC, please input "ADHOC" for your country.</div>
          </div>
          <div class="section">
            <div class="label">
              Preference 1
            </div>
            <div class="pref">
              <div>
                <div class="sub-label">
                  Committee  *
                </div>
                <input type="text" name="committee1" value="" required>
              </div>
              <div>
                <div class="sub-label">
                  Country  *
                </div>
                <input type="text" name="country1" value="" required>
              </div>
            </div>

            <div class="label">
              Preference 2
            </div>
            <div class="pref">
              <div>
                <div class="sub-label">
                  Committee *
                </div>
                <input type="text" name="committee2" value="" required>
              </div>
              <div>
                <div class="sub-label">
                  Country *
                </div>
                <input type="text" name="country2" value="" required>
              </div>
            </div>

            <div class="label">
              Preference 3
            </div>
            <div class="pref">
              <div>
                <div class="sub-label">
                  Committee *
                </div>
                <input type="text" name="committee3" value="" required> 
              </div>
              <div>
                <div class="sub-label">
                  Country *
                </div>
                <input type="text" name="country3" value="" required>
              </div>
            </div>
          </div>
          <div class="divider"></div>
          <div class="section">
            <div class="label">Referred By</div>
            <div class="sub-label" style="text-transform:none;letter-spacing:0.1px; padding-bottom:5px;">
              Please write who referred you. Leave blank if not applicable.
            </div>
            <input type="text" name="referredby" value=""> 
          </div>
          <div class="divider"></div>
          <div class="section">
            <div class="label">Registration Type *</div>
            <div class="sub-label" style="padding-top:15px; padding-bottom:5px; ">NOTE:</div>
            <div class="sub-label" style="text-transform:none;letter-spacing:0.1px; padding-bottom:5px;">Rooming requests for Independent delegates should be sent to delegateaffairs@pacificmun.org. Hotel registration period is now over. If you have any questions, email delegateaffairs@pacificmun.org</div>
           
<!--
            <div class="radio-input">
              <input type="radio" name="deltype" value="hotel" checked>
              <label for="hotel">Hotel Delegate &mdash; $200 CAD</label>
            </div>
    -->
            <div class="radio-input">
              <input type="radio" name="deltype" value="day" checked>
              <label for="day">Day Delegate &mdash; $85 CAD</label>
            </div>
          </div>
          <div class="divider"></div>
          <div class="section">
            <div class="label">Are you paying by cheque? *</div>
            <div class="sub-label" style="padding-top:15px; padding-bottom:5px; ">NOTE:</div>
            <div class="sub-label" style="text-transform:none;letter-spacing:0.1px; padding-bottom:5px;">Payment by cheque is no longer available.</div>
            
            <div class="radio-input">
              <input type="radio" name="cheque" value="0"
                    checked>
              <label for="0">No</label>
            </div>
<!--
            <div class="radio-input">
              <input type="radio" name="cheque" value="1">
              <label for="1">Yes</label>
            </div>-->
          </div>
          <div class="section">
            <input type="submit" name="register-submit" value="Register">
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
