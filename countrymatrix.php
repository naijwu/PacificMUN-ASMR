<?php

    $reservedc = "green;"; // darkorange
    $confirmedc = "#9d1111;";
    $availablec = "green;";

    date_default_timezone_set('America/Los_Angeles');

?>
<html>
    <head>
        <title>PacificMUN 2020 &mdash; Country Matrix</title>
        <meta name="title" content="PacificMUN 2020 — Country Matrix">
        <meta name="description" content="View the country matrix for the 14 diverse committees that PacificMUN offers.">

        <link href="https://fonts.googleapis.com/css?family=DM+Sans:400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="countrymatrix.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body>
        <header>
        <img src="/logo.svg" alt="">
        </header>
        <div class="bar">
            Country Matrix &mdash; Last Updated <?php $today = date("h:i:s A"); echo $today; ?>
        </div>
        <div class="legend">
            <div class="item">
                <div class="colour green"></div>
                <div class="rep">
                    Available
                </div>
            </div>
            <div class="item">
                <div class="colour red"></div>
                <div class="rep">
                    Unavailable
                </div>
            </div>
        </div>
        <div class="ohhboy">
            <div class="tabs">
                <div class="open active" onclick="openMatrix(event,'DISEC');">DISEC</div>
                <div class="open" onclick="openMatrix(event,'WHO');">WHO</div>
                <div class="open" onclick="openMatrix(event,'ECOFIN');">ECOFIN</div>
                <div class="open" onclick="openMatrix(event,'UNODC');">UNODC</div>
                <div class="open" onclick="openMatrix(event,'UNICEF');">UNICEF</div>
                <div class="open" onclick="openMatrix(event,'UNWOMEN');">UN WOMEN</div>
                <div class="open" onclick="openMatrix(event,'EU');">EU</div>
                <div class="open" onclick="openMatrix(event,'ASEAN');">ASEAN</div>
                <div class="open" onclick="openMatrix(event,'SV');">SV</div>
                <div class="open" onclick="openMatrix(event,'JCC');">JCC</div>
                <div class="open" onclick="openMatrix(event,'UNSC');">UNSC</div>
                <div class="open" onclick="openMatrix(event,'IPC');">IPC</div>
                <div class="open" onclick="openMatrix(event,'ADHOC');">ADHOC</div>
            </div>
            <div class="container">
                <section id="DISEC" class="tabcontent">
                    <table>
                        <tr>
                            <th>Disarmament and International Security Committee &mdash; General Assembly</th>
                        </tr>
                        <?php 
                            require_once 'includes/dbh.inc.php';

                            $sql = "SELECT delegation, reservedby, confirmedby FROM DISEC";
                            $result = $conn->query($sql);
                            
                            if ($result-> num_rows > 0) {
                                while ($row = $result-> fetch_assoc()) {

                                    // if is reserved
                                    if( (strlen($row['reservedby']) > 1) && (strlen($row['confirmedby']) <= 1) ) {

                                        echo '<tr><td style="background-color:'. $reservedc .'">' . $row['delegation'] . '</td></tr>';
                                    } else if(strlen($row['confirmedby']) > 1) {
                                        // if is assigned/confirmed

                                        echo '<tr><td style="background-color:'. $confirmedc .'">' . $row['delegation'] . '</td></tr>';
                                    }  else {

                                        echo '<tr><td style="background-color:'. $availablec .'">' . $row['delegation'] . '</td></tr>';
                                    }

                                }
                                echo '</table>';
                            } else {
                                echo 'PACIFIC ASMR SYS ERROR: NO DATA :(';
                            }

                            ?>
                    </table>
                </section>
                <section id="WHO" class="tabcontent">
                    <table>
                        <tr>
                            <th>World Health Organization &mdash; General Assembly</th>
                        </tr>
                        <?php 

                            $sql = "SELECT delegation, reservedby, confirmedby FROM WHO";
                            $result = $conn->query($sql);
                            
                            if ($result-> num_rows > 0) {
                                while ($row = $result-> fetch_assoc()) {

                                    // if is reserved
                                    if( (strlen($row['reservedby']) > 1) && (strlen($row['confirmedby']) <= 1) ) {

                                        echo '<tr><td style="background-color:'. $reservedc .'">' . $row['delegation'] . '</td></tr>';
                                    } else if(strlen($row['confirmedby']) > 1) {
                                        // if is assigned/confirmed

                                        echo '<tr><td style="background-color:'. $confirmedc .'">' . $row['delegation'] . '</td></tr>';
                                    }  else {

                                        echo '<tr><td style="background-color:'. $availablec .'">' . $row['delegation'] . '</td></tr>';
                                    }

                                }
                                echo '</table>';
                            } else {
                                echo 'PACIFIC ASMR SYS ERROR: NO DATA :(';
                            }

                            ?>
                    </table>
                </section>
                <section id="ECOFIN" class="tabcontent">
                    <table>
                        <tr>
                            <th>Economic and Financial Affairs Council &mdash; General Assembly</th>
                        </tr>
                        <?php 
                            $sql = "SELECT delegation, reservedby, confirmedby FROM ECOFIN";
                            $result = $conn->query($sql);
                            
                            if ($result-> num_rows > 0) {
                                while ($row = $result-> fetch_assoc()) {

                                    // if is reserved
                                    if( (strlen($row['reservedby']) > 1) && (strlen($row['confirmedby']) <= 1) ) {

                                        echo '<tr><td style="background-color:'. $reservedc .'">' . $row['delegation'] . '</td></tr>';
                                    } else if(strlen($row['confirmedby']) > 1) {
                                        // if is assigned/confirmed

                                        echo '<tr><td style="background-color:'. $confirmedc .'">' . $row['delegation'] . '</td></tr>';
                                    }  else {

                                        echo '<tr><td style="background-color:'. $availablec .'">' . $row['delegation'] . '</td></tr>';
                                    }

                                }
                                echo '</table>';
                            } else {
                                echo 'PACIFIC ASMR SYS ERROR: NO DATA :(';
                            }

                            ?>
                    </table>
                </section>
                <section id="UNODC" class="tabcontent">
                    <table>
                        <tr>
                            <th>United Nations Office of Drugs and Crimes &mdash; Specialized</th>
                        </tr>
                        <?php 
                            $sql = "SELECT delegation, reservedby, confirmedby FROM UNODC";
                            $result = $conn->query($sql);
                            
                            if ($result-> num_rows > 0) {
                                while ($row = $result-> fetch_assoc()) {

                                    // if is reserved
                                    if( (strlen($row['reservedby']) > 1) && (strlen($row['confirmedby']) <= 1) ) {

                                        echo '<tr><td style="background-color:'. $reservedc .'">' . $row['delegation'] . '</td></tr>';
                                    } else if(strlen($row['confirmedby']) > 1) {
                                        // if is assigned/confirmed

                                        echo '<tr><td style="background-color:'. $confirmedc .'">' . $row['delegation'] . '</td></tr>';
                                    }  else {

                                        echo '<tr><td style="background-color:'. $availablec .'">' . $row['delegation'] . '</td></tr>';
                                    }

                                }
                                echo '</table>';
                            } else {
                                echo 'PACIFIC ASMR SYS ERROR: NO DATA :(';
                            }

                            ?>
                    </table>
                </section>
                <!--
                <section id="UNEP" class="tabcontent">
                    <table>
                        <tr>
                            <th>United Nations Environmental Programme &mdash; Specialized</th>
                        </tr>
                        <?php 

                            $sql = "SELECT delegation, reservedby, confirmedby FROM UNEP";
                            $result = $conn->query($sql);
                            
                            if ($result-> num_rows > 0) {
                                while ($row = $result-> fetch_assoc()) {

                                    // if is reserved
                                    if( (strlen($row['reservedby']) > 1) && (strlen($row['confirmedby']) <= 1) ) {

                                        echo '<tr><td style="background-color:'. $reservedc .'">' . $row['delegation'] . '</td></tr>';
                                    } else if(strlen($row['confirmedby']) > 1) {
                                        // if is assigned/confirmed

                                        echo '<tr><td style="background-color:'. $confirmedc .'">' . $row['delegation'] . '</td></tr>';
                                    }  else {

                                        echo '<tr><td style="background-color:'. $availablec .'">' . $row['delegation'] . '</td></tr>';
                                    }

                                }
                                echo '</table>';
                            } else {
                                echo 'PACIFIC ASMR SYS ERROR: NO DATA :(';
                            }

                            ?>
                    </table>
                </section>
                -->
                <section id="UNICEF" class="tabcontent">
                    <table>
                        <tr>
                            <th>United Nations Children's Fund &mdash; Specialized</th>
                        </tr>
                        <?php 

                            $sql = "SELECT delegation, reservedby, confirmedby FROM UNICEF";
                            $result = $conn->query($sql);
                            
                            if ($result-> num_rows > 0) {
                                while ($row = $result-> fetch_assoc()) {

                                    // if is reserved
                                    if( (strlen($row['reservedby']) > 1) && (strlen($row['confirmedby']) <= 1) ) {

                                        echo '<tr><td style="background-color:'. $reservedc .'">' . $row['delegation'] . '</td></tr>';
                                    } else if(strlen($row['confirmedby']) > 1) {
                                        // if is assigned/confirmed

                                        echo '<tr><td style="background-color:'. $confirmedc .'">' . $row['delegation'] . '</td></tr>';
                                    }  else {

                                        echo '<tr><td style="background-color:'. $availablec .'">' . $row['delegation'] . '</td></tr>';
                                    }

                                }
                                echo '</table>';
                            } else {
                                echo 'PACIFIC ASMR SYS ERROR: NO DATA :(';
                            }

                            ?>
                    </table>
                </section>
                <section id="UNWOMEN" class="tabcontent">
                    <table>
                        <tr>
                            <th>United Nations Entity for Empowerment of Women &mdash; Specialized</th>
                        </tr>
                        <?php 

                            $sql = "SELECT delegation, reservedby, confirmedby FROM UNWOMEN";
                            $result = $conn->query($sql);
                            
                            if ($result-> num_rows > 0) {
                                while ($row = $result-> fetch_assoc()) {

                                    // if is reserved
                                    if( (strlen($row['reservedby']) > 1) && (strlen($row['confirmedby']) <= 1) ) {

                                        echo '<tr><td style="background-color:'. $reservedc .'">' . $row['delegation'] . '</td></tr>';
                                    } else if(strlen($row['confirmedby']) > 1) {
                                        // if is assigned/confirmed

                                        echo '<tr><td style="background-color:'. $confirmedc .'">' . $row['delegation'] . '</td></tr>';
                                    }  else {

                                        // if is open
                                        echo '<tr><td style="background-color:'. $availablec .'">' . $row['delegation'] . '</td></tr>';
                                    }

                                }
                                echo '</table>';
                            } else {
                                echo 'PACIFIC ASMR SYS ERROR: NO DATA :(';
                            }

                            ?>
                    </table>
                </section>
                <section id="EU" class="tabcontent">
                    <table>
                        <tr>
                            <th>European Union &mdash; Regional Bodies</th>
                        </tr>
                        <?php 

                            $sql = "SELECT delegation, reservedby, confirmedby FROM EU";
                            $result = $conn->query($sql);
                            
                            if ($result-> num_rows > 0) {
                                while ($row = $result-> fetch_assoc()) {

                                    // if is reserved
                                    if( (strlen($row['reservedby']) > 1) && (strlen($row['confirmedby']) <= 1) ) {

                                        echo '<tr><td style="background-color:'. $reservedc .'">' . $row['delegation'] . '</td></tr>';
                                    } else if(strlen($row['confirmedby']) > 1) {
                                        // if is assigned/confirmed

                                        echo '<tr><td style="background-color:'. $confirmedc .'">' . $row['delegation'] . '</td></tr>';
                                    }  else {

                                        // if is open
                                        echo '<tr><td style="background-color:'. $availablec .'">' . $row['delegation'] . '</td></tr>';
                                    }

                                }
                                echo '</table>';
                            } else {
                                echo 'PACIFIC ASMR SYS ERROR: NO DATA :(';
                            }

                            ?>
                    </table>
                </section>
                <section id="ASEAN" class="tabcontent">
                    <h2>
                        ASEAN &mdash; Regional Bodies
                    </h2>
                    <table>
                        <?php 

                            $sql = "SELECT delegation, reservedby, confirmedby FROM ASEAN";
                            $result = $conn->query($sql);
                            
                            if ($result-> num_rows > 0) {
                                while ($row = $result-> fetch_assoc()) {

                                    // if is reserved
                                    if( (strlen($row['reservedby']) > 1) && (strlen($row['confirmedby']) <= 1) ) {

                                        echo '<tr><td style="background-color:'. $reservedc .'">' . $row['delegation'] . '</td></tr>';
                                    } else if(strlen($row['confirmedby']) > 1) {
                                        // if is assigned/confirmed

                                        echo '<tr><td style="background-color:'. $confirmedc .'">' . $row['delegation'] . '</td></tr>';
                                    }  else {

                                        // if is open
                                        echo '<tr><td style="background-color:'. $availablec .'">' . $row['delegation'] . '</td></tr>';
                                    }

                                }
                                echo '</table>';
                            } else {
                                echo 'PACIFIC ASMR SYS ERROR: NO DATA :(';
                            }

                            ?>
                    </table>
                </section>
                <section id="SV" class="tabcontent">
                    <h2>
                        Silicon Valley &mdash; Regional Bodies
                    </h2>
                    <table>
                        <?php 

                            $sql = "SELECT delegation, corporation, role, reservedby, confirmedby FROM SV";
                            $result = $conn->query($sql);
                            
                            if ($result-> num_rows > 0) {
                                while ($row = $result-> fetch_assoc()) {

                                    // if is reserved
                                    if( (strlen($row['reservedby']) > 1) && (strlen($row['confirmedby']) <= 1) ) {

                                        echo '<tr><td style="background-color:'. $reservedc .'">' . $row['delegation'] . '</td><td style="background-color:'. $reservedc .'">' . $row['corporation'] . '</td><td style="background-color:'. $reservedc .'">' . $row['role'] . '</td></tr>';
                                    } else if(strlen($row['confirmedby']) > 1) {
                                        // if is assigned/confirmed

                                        echo '<tr><td style="background-color:'. $confirmedc .'">' . $row['delegation'] . '</td><td style="background-color:'. $confirmedc .'">' . $row['corporation'] . '</td><td style="background-color:'. $confirmedc .'">' . $row['role'] . '</td></tr>';
                                    }  else {

                                        // if is open
                                        echo '<tr><td style="background-color:'. $availablec .'">' . $row['delegation'] . '</td><td style="background-color:'. $availablec .'">' . $row['corporation'] . '</td><td style="background-color:'. $availablec .'">' . $row['role'] . '</td></tr>';
                                    }

                                }
                                echo '</table>';
                            } else {
                                echo 'PACIFIC ASMR SYS ERROR: NO DATA :(';
                            }

                            ?>
                    </table>
                </section>
                <section id="JCC" class="tabcontent">
                    <h2>
                        Joint Crisis Committee &mdash; Advanced
                    </h2>
                    <table>
                        <?php 

                            $sql = "SELECT delegation, bloc, reservedby, confirmedby FROM JCC";
                            $result = $conn->query($sql);
                            
                            if ($result-> num_rows > 0) {
                                while ($row = $result-> fetch_assoc()) {

                                    // if is reserved
                                    if( (strlen($row['reservedby']) > 1) && (strlen($row['confirmedby']) <= 1) ) {

                                        echo '<tr><td style="background-color:'. $reservedc .'">' . $row['delegation'] . '</td><td style="background-color:'. $reservedc .'">' . $row['bloc'] . '</td></tr>';
                                    } else if(strlen($row['confirmedby']) > 1) {
                                        // if is assigned/confirmed

                                        echo '<tr><td style="background-color:'. $confirmedc .'">' . $row['delegation'] . '</td><td style="background-color:'. $confirmedc .'">' . $row['bloc'] . '</td></tr>';
                                    }  else {

                                        // if is open
                                        echo '<tr><td style="background-color:'. $availablec .'">' . $row['delegation'] . '</td><td style="background-color:'. $availablec .'">' . $row['bloc'] . '</td></tr>';
                                    }

                                }
                                echo '</table>';
                            } else {
                                echo 'PACIFIC ASMR SYS ERROR: NO DATA :(';
                            }

                            ?>
                    </table>
                </section>
                <section id="UNSC" class="tabcontent">
                    <table>
                        <tr>
                            <th>United Nations Security Council &mdash; Advanced</th>
                        </tr>
                        <?php 

                            $sql = "SELECT delegation, reservedby, confirmedby FROM UNSC";
                            $result = $conn->query($sql);
                            
                            if ($result-> num_rows > 0) {
                                while ($row = $result-> fetch_assoc()) {

                                    // if is reserved
                                    if( (strlen($row['reservedby']) > 1) && (strlen($row['confirmedby']) <= 1) ) {

                                        if( ($row['delegation'] == 'United States of America') || ($row['delegation'] == 'China') || ($row['delegation'] == 'France') || ($row['delegation'] == 'Russian Federation') || ($row['delegation'] == 'United Kingdom') ) {

                                            echo '<tr><td style="background-color:'. $reservedc .'; font-weight:bold; text-transform:uppercase;">' . $row['delegation'] . '</td></tr>';
                                        } else {
                                            echo '<tr><td style="background-color:'. $reservedc .'">' . $row['delegation'] . '</td></tr>';
                                        }

                                    } else if(strlen($row['confirmedby']) > 1) {
                                        // if is assigned/confirmed

                                        if( ($row['delegation'] == 'United States of America') || ($row['delegation'] == 'China') || ($row['delegation'] == 'France') || ($row['delegation'] == 'Russian Federation') || ($row['delegation'] == 'United Kingdom') ) {

                                            echo '<tr><td style="background-color:'. $confirmedc .'; font-weight:bold; text-transform:uppercase;">' . $row['delegation'] . '</td></tr>';
                                        } else {
                                            echo '<tr><td style="background-color:'. $confirmedc .'">' . $row['delegation'] . '</td></tr>';
                                        }
                                    }  else { 

                                        // if is open

                                        if( ($row['delegation'] == 'United States of America') || ($row['delegation'] == 'China') || ($row['delegation'] == 'France') || ($row['delegation'] == 'Russian Federation') || ($row['delegation'] == 'United Kingdom') ) {

                                            echo '<tr><td style="background-color:'. $availablec .'; font-weight:bold; padding-top:15px; padding-bottom:15px; text-transform:uppercase;">' . $row['delegation'] . '</td></tr>';
                                        } else {
                                            echo '<tr><td style="background-color:'. $availablec .'">' . $row['delegation'] . '</td></tr>';
                                        }
                                    }

                                }
                                echo '</table>';
                            } else {
                                echo 'PACIFIC ASMR SYS ERROR: NO DATA :(';
                            }

                            ?>
                    </table>
                </section>
                <section id="IPC" class="tabcontent">
                    <table>
                        <tr>
                            <th>International Press Corps</th>
                        </tr>
                        <?php 

                            $sql = "SELECT delegation, reservedby, confirmedby FROM IPC";
                            $result = $conn->query($sql);
                            
                            if ($result-> num_rows > 0) {
                                while ($row = $result-> fetch_assoc()) {

                                    // if is reserved
                                    if( (strlen($row['reservedby']) > 1) && (strlen($row['confirmedby']) <= 1) ) {

                                        echo '<tr><td style="background-color:'. $reservedc .'">' . $row['delegation'] . '</td></tr>';
                                    } else if(strlen($row['confirmedby']) > 1) {
                                        // if is assigned/confirmed

                                        echo '<tr><td style="background-color:'. $confirmedc .'">' . $row['delegation'] . '</td></tr>';
                                    }  else {

                                        // if is open
                                        echo '<tr><td style="background-color:'. $availablec .'">' . $row['delegation'] . '</td></tr>';
                                    }

                                }
                                echo '</table>';
                            } else {
                                echo 'PACIFIC ASMR SYS ERROR: NO DATA :(';
                            }

                            $conn-> close();

                            ?>
                    </table>
                </section>
                <section id="ADHOC" class="tabcontent">
                    <h2>ADHOC</h2>
                    <form action="countrymatrix.php" method="POST">
                        <label for="username">Username</label>
                        <input type="text" name="username">
                        <label for="password">Password</label>
                        <input type="password" name="password">
                        <input type="submit" value="Login">
                    </form>
                </section>
            </div>
        </div>


        
        <script>
            function openMatrix(evt, commName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("open");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(commName).style.display = "table";
                evt.currentTarget.className += " active";
            }
        </script>
    </body>
</html>