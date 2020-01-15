<?php
    session_start();

    $reservedc = "darkorange;"; // darkorange
    $confirmedc = "#9d1111;";
    $availablec = "green;";

    if(!($_SESSION['token'] == true)) {
echo<<<_END
<html>
    <head>
        <title>PacificMUN 2020 &mdash; DAC Panel</title>
        <meta name="title" content="PacificMUN 2020 — DA Control Panel">
        <meta name="description" content=" ">

        <link href="https://fonts.googleapis.com/css?family=DM+Sans:400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="dacpanel.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body>
        <header>
        <img src="/logo.svg" alt="">
        </header>
        <div class="bar">
            DA Control Panel &mdash; All Data Last Updated: 
_END;
            $today = date("h:i:s A");
            echo($today); 
echo<<<_END
        </div>
        <div class="form-container">
            <form class="dacplogin" action="includes/dacpanel.inc.php" method="post">
                <h3>DAC Panel</h3>
                <h4>
                    Username:
                </h4>
                <input type="text" name="dacuser">
                <h4>
                    Password:
                </h4>
                <input type="password" name="dacpass">
                <input type="submit" name="dacpanel-login" value="login">
            </form>
        </div>
    </body>
<html>
_END;
    } else {
echo<<<_END

<html>
    <head>
        <title>PacificMUN 2020 &mdash; DAC Panel</title>
        <meta name="title" content="PacificMUN 2020 — DA Control Panel">
        <meta name="description" content=" ">

        <link href="https://fonts.googleapis.com/css?family=DM+Sans:400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="dacpanel.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body>
        <header>
        <img src="/logo.svg" alt="">
        </header>
        <div class="bar">
            DA Control Panel &mdash; All Data Last Updated: 
_END;
            $today = date("h:i:s A");
            echo($today); 
echo<<<_END
            &mdash;&nbsp;<a href="includes/daclogout.inc.php">Log Out</a>
        </div>
        <div class="legend">
            <div class="item">
                <div class="rep">
                    Country Matrix
                </div>
            </div>
        </div>
    <div class="ohhboy">
        <div class="tabs">
            <div class="open active" onclick="openMatrix(event,'DISEC');">DISEC</div>
            <div class="open" onclick="openMatrix(event,'WHO');">WHO</div>
            <div class="open" onclick="openMatrix(event,'ECOFIN');">ECOFIN</div>
            <div class="open" onclick="openMatrix(event,'UNODC');">UNODC</div>
            <div class="open" onclick="openMatrix(event,'UNEP');">UNEP</div>
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
                <h2>
                    Disarmament and International Security Committee &mdash; General Assembly
                </h2>
                <table>
                    <tr>
                        <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Delegation</td>
                        <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Power Ranking</td>
                        <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Reserved By</td>
                        <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Assigned To</td>
                    </tr>
_END;
                        require_once 'includes/dbh.inc.php';

                        $sql = "SELECT delegation, powerranking, reservedby, confirmedby FROM DISEC";
                        $result = $conn->query($sql);
                        
                        if ($result-> num_rows > 0) {
                            while ($row = $result-> fetch_assoc()) {
                                echo '<tr><td>' . $row['delegation'] . '</td><td>' . $row['powerranking'] . '</td><td>' . $row['reservedby'] . '</td><td>' . $row['confirmedby'] . '</td></tr>';
                            }
                            echo '</table>';
                        } else {
                            echo 'PACIFIC ASMR SYS ERROR: NO DATA :(';
                        }
echo<<<_END
                </table>
            </section>
            <section id="WHO" class="tabcontent">
                <h2>
                    World Health Organization &mdash; General Assembly
                </h2>
                <table>
                <tr>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Delegation</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Power Ranking</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Reserved By</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Assigned To</td>
                </tr>
_END;
                    require_once 'includes/dbh.inc.php';

                    $sql = "SELECT delegation, powerranking, reservedby, confirmedby FROM WHO";
                    $result = $conn->query($sql);
                    
                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            echo '<tr><td>' . $row['delegation'] . '</td><td>' . $row['powerranking'] . '</td><td>' . $row['reservedby'] . '</td><td>' . $row['confirmedby'] . '</td></tr>';
                        }
                        echo '</table>';
                    } else {
                        echo 'PACIFIC ASMR SYS ERROR: NO DATA :(';
                    }
echo<<<_END
                </table>
            </section>
            <section id="ECOFIN" class="tabcontent">
                <h2>
                    Economic and Financial Affairs Council &mdash; General Assembly
                </h2>
                <table>
                <tr>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Delegation</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Power Ranking</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Reserved By</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Assigned To</td>
                </tr>
_END;
                    require_once 'includes/dbh.inc.php';

                    $sql = "SELECT delegation, powerranking, reservedby, confirmedby FROM ECOFIN";
                    $result = $conn->query($sql);
                    
                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            echo '<tr><td>' . $row['delegation'] . '</td><td>' . $row['powerranking'] . '</td><td>' . $row['reservedby'] . '</td><td>' . $row['confirmedby'] . '</td></tr>';
                        }
                        echo '</table>';
                    } else {
                        echo 'PACIFIC ASMR SYS ERROR: NO DATA :(';
                    }
echo<<<_END
                </table>
            </section>
            <section id="UNODC" class="tabcontent">
                <h2>
                    United Nations Office of Drugs and Crimes &mdash; Specialized
                </h2>
                <table>
                <tr>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Delegation</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Power Ranking</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Reserved By</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Assigned To</td>
                </tr>
_END;
                    require_once 'includes/dbh.inc.php';

                    $sql = "SELECT delegation, powerranking, reservedby, confirmedby FROM UNODC";
                    $result = $conn->query($sql);
                    
                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            echo '<tr><td>' . $row['delegation'] . '</td><td>' . $row['powerranking'] . '</td><td>' . $row['reservedby'] . '</td><td>' . $row['confirmedby'] . '</td></tr>';
                        }
                        echo '</table>';
                    } else {
                        echo 'PACIFIC ASMR SYS ERROR: NO DATA :(';
                    }
echo<<<_END
                </table>
            </section>
            <section id="UNEP" class="tabcontent">
                <h2>
                    United Nations Environmental Programme &mdash; Specialized
                </h2>
                <table>
                <tr>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Delegation</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Power Ranking</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Reserved By</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Assigned To</td>
                </tr>
_END;
                    require_once 'includes/dbh.inc.php';

                    $sql = "SELECT delegation, powerranking, reservedby, confirmedby FROM UNEP";
                    $result = $conn->query($sql);
                    
                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            echo '<tr><td>' . $row['delegation'] . '</td><td>' . $row['powerranking'] . '</td><td>' . $row['reservedby'] . '</td><td>' . $row['confirmedby'] . '</td></tr>';
                        }
                        echo '</table>';
                    } else {
                        echo 'PACIFIC ASMR SYS ERROR: NO DATA :(';
                    }
echo<<<_END
                </table>
            </section>
            <section id="UNICEF" class="tabcontent">
                <h2>
                    United Nations Children's Fund &mdash; Specialized
                </h2>
                <table>
                <tr>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Delegation</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Power Ranking</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Reserved By</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Assigned To</td>
                </tr>
_END;
                    require_once 'includes/dbh.inc.php';

                    $sql = "SELECT delegation, powerranking, reservedby, confirmedby FROM UNICEF";
                    $result = $conn->query($sql);
                    
                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            echo '<tr><td>' . $row['delegation'] . '</td><td>' . $row['powerranking'] . '</td><td>' . $row['reservedby'] . '</td><td>' . $row['confirmedby'] . '</td></tr>';
                        }
                        echo '</table>';
                    } else {
                        echo 'PACIFIC ASMR SYS ERROR: NO DATA :(';
                    }
echo<<<_END
                </table>
            </section>
            <section id="UNWOMEN" class="tabcontent">
                <h2>
                    United Nations Entity for Empowerment of Women &mdash; Specialized
                </h2>
                <table>
                <tr>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Delegation</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Power Ranking</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Reserved By</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Assigned To</td>
                </tr>
_END;
                    require_once 'includes/dbh.inc.php';

                    $sql = "SELECT delegation, powerranking, reservedby, confirmedby FROM UNWOMEN";
                    $result = $conn->query($sql);
                    
                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            echo '<tr><td>' . $row['delegation'] . '</td><td>' . $row['powerranking'] . '</td><td>' . $row['reservedby'] . '</td><td>' . $row['confirmedby'] . '</td></tr>';
                        }
                        echo '</table>';
                    } else {
                        echo 'PACIFIC ASMR SYS ERROR: NO DATA :(';
                    }
echo<<<_END
                </table>
            </section>
            <section id="EU" class="tabcontent">
                <h2>
                    European Union &mdash; Regional Bodies
                </h2>
                <table>
                <tr>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Delegation</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Power Ranking</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Reserved By</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Assigned To</td>
                </tr>
_END;
                    require_once 'includes/dbh.inc.php';

                    $sql = "SELECT delegation, powerranking, reservedby, confirmedby FROM EU";
                    $result = $conn->query($sql);
                    
                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            echo '<tr><td>' . $row['delegation'] . '</td><td>' . $row['powerranking'] . '</td><td>' . $row['reservedby'] . '</td><td>' . $row['confirmedby'] . '</td></tr>';
                        }
                        echo '</table>';
                    } else {
                        echo 'PACIFIC ASMR SYS ERROR: NO DATA :(';
                    }
echo<<<_END
                </table>
            </section>
            <section id="ASEAN" class="tabcontent">
                <h2>
                    ASEAN &mdash; Regional Bodies
                </h2>
                <table>
                <tr>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Delegation</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Power Ranking</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Reserved By</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Assigned To</td>
                </tr>
_END;
                    require_once 'includes/dbh.inc.php';

                    $sql = "SELECT delegation, powerranking, reservedby, confirmedby FROM ASEAN";
                    $result = $conn->query($sql);
                    
                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            echo '<tr><td>' . $row['delegation'] . '</td><td>' . $row['powerranking'] . '</td><td>' . $row['reservedby'] . '</td><td>' . $row['confirmedby'] . '</td></tr>';
                        }
                        echo '</table>';
                    } else {
                        echo 'PACIFIC ASMR SYS ERROR: NO DATA :(';
                    }
echo<<<_END
                </table>
            </section>
            <section id="SV" class="tabcontent">
                <h2>
                    Silicon Valley &mdash; Regional Bodies
                </h2>
                <table>
                <tr>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Delegation</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Corporation</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Role</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Power Ranking</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Reserved By</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Assigned To</td>
                </tr>
_END;
                    require_once 'includes/dbh.inc.php';

                    $sql = "SELECT delegation, corporation, role, powerranking, reservedby, confirmedby FROM SV";
                    $result = $conn->query($sql);
                    
                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            echo '<tr><td>' . $row['delegation'] . '</td><td>' . $row['corporation'] . '</td><td>' . $row['role'] . '</td><td>' . $row['powerranking'] . '</td><td>' . $row['reservedby'] . '</td><td>' . $row['confirmedby'] . '</td></tr>';
                        }
                        echo '</table>';
                    } else {
                        echo 'PACIFIC ASMR SYS ERROR: NO DATA :(';
                    }
echo<<<_END
                </table>
            </section>
            <section id="JCC" class="tabcontent">
                <h2>
                    Joint Crisis Committee &mdash; Advanced
                </h2>
                <table>
                <tr>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Delegation</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Bloc</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Power Ranking</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Reserved By</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Assigned To</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Delegate Email</td>
                </tr>
_END;
                    require_once 'includes/dbh.inc.php';

                    $sql = "SELECT delegation, bloc, powerranking, reservedby, confirmedby, email FROM JCC";
                    $result = $conn->query($sql);
                    
                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            echo '<tr><td>' . $row['delegation'] . '</td><td>' . $row['bloc'] . '</td><td>' . $row['powerranking'] . '</td><td>' . $row['reservedby'] . '</td><td>' . $row['confirmedby'] . '</td><td>' . $row['email'] . '</td></tr>';
                        }
                        echo '</table>';
                    } else {
                        echo 'PACIFIC ASMR SYS ERROR: NO DATA :(';
                    }
echo<<<_END
                </table>
            </section>
            <section id="UNSC" class="tabcontent">
                <h2>
                    United Nations Security Council &mdash; Advanced
                </h2>
                <table>
                <tr>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Delegation</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Power Ranking</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Reserved By</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Assigned To</td>
                </tr>
_END;
                    require_once 'includes/dbh.inc.php';

                    $sql = "SELECT delegation, powerranking, reservedby, confirmedby FROM UNSC";
                    $result = $conn->query($sql);
                    
                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            echo '<tr><td>' . $row['delegation'] . '</td><td>' . $row['powerranking'] . '</td><td>' . $row['reservedby'] . '</td><td>' . $row['confirmedby'] . '</td></tr>';
                        }
                        echo '</table>';
                    } else {
                        echo 'PACIFIC ASMR SYS ERROR: NO DATA :(';
                    }
echo<<<_END
                </table>
            </section>
            <section id="IPC" class="tabcontent">
                <h2>
                    International Press Corps
                </h2>
                <table>
                <tr>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Delegation</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Power Ranking</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Reserved By</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Assigned To</td>
                </tr>
_END;
                    require_once 'includes/dbh.inc.php';

                    $sql = "SELECT delegation, powerranking, reservedby, confirmedby FROM IPC";
                    $result = $conn->query($sql);
                    
                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            echo '<tr><td>' . $row['delegation'] . '</td><td>' . $row['powerranking'] . '</td><td>' . $row['reservedby'] . '</td><td>' . $row['confirmedby'] . '</td></tr>';
                        }
                        echo '</table>';
                    } else {
                        echo 'PACIFIC ASMR SYS ERROR: NO DATA :(';
                    }
echo<<<_END
                </table>
            </section>
            <section id="ADHOC" class="tabcontent">
                <h2>
                    ADHOC (X & Y)
                </h2>
                <table>
                <tr>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Delegation</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">ADHOC Type</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Power Ranking</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Reserved By</td>
                    <td style="font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Assigned To</td>
                </tr>
_END;
                    require_once 'includes/dbh.inc.php';

                    $sql = "SELECT delegation, type, powerranking, reservedby, confirmedby FROM ADHOC";
                    $result = $conn->query($sql);
                    
                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            echo '<tr><td>' . $row['delegation'] . '</td><td>' . $row['type'] . '</td><td>' . $row['powerranking'] . '</td><td>' . $row['reservedby'] . '</td><td>' . $row['confirmedby'] . '</td></tr>';
                        }
                        echo '</table>';
                    } else {
                        echo 'PACIFIC ASMR SYS ERROR: NO DATA :(';
                    }
echo<<<_END
                </table>
            </section>
        </div>
    </div>
    <div class="legend">
        <div class="item">
            <div class="rep">
                Edit Country Assignments & Reservations
            </div>
        </div>
    </div>
    <div class="thisonesforellen">
        <form class="assignment-form" method="post" action="includes/assign.inc.php">
            <h3>Manually Assign Delegates Their Country</h3>
            <p style="color:white;">
                Ideal use of this feature: Confirm/Lock in the delegates that are currently just reserving the country so 
                the Country Matrix looks populated (before the date the system locks-in the reservations)<br><br>
                Be careful/make sure your assignments are final! Once locked in, an automatic email will be sent to the 
                delegate of their country assignment.  At all costs, avoid locking in/assigning a 
                delegate to a country that is already confirmed. 
                If the country your delegates get assigned to already had been reserved by another delegate by the 
                system, that bumped delegate will be assigned again.
            </p>
            <h4>Committee of assignment</h4>
              <select name="commts">
                <option value="DISEC">DISEC</option>
                <option value="WHO">WHO</option>
                <option value="ECOFIN">ECOFIN</option>
                <option value="UNODC">UNODC</option>
                <option value="UNEP">UNEP</option>
                <option value="UNICEF">UNICEF</option>
                <option value="UNWOMEN">UNWOMEN</option>
                <option value="EU">EU</option>
                <option value="ASEAN">ASEAN</option>
                <option value="SV">SV</option>
                <option value="JCC">JCC</option>
                <option value="UNSC">UNSC</option>
                <option value="IPC">IPC</option>
                <option value="ADHOC">ADHOC</option>
              </select>
            <h4>Country (Delegation) to assign (make sure name is spelt exactly as in the country matrix above, and that it's not already confirmed):</h4>
            <input type="text" name="countryts">
            <h4>Delegate name (make sure name is spelt exactly as in the del list below. Alternatively, leaving it blank will remove confirmee -- but dont do that unless completely necessary!):</h4>
            <input type="text" name="delts">
            <input type="submit" name="assignment-submit" value="Submit Assignment">
        </form>
        <form class="assignment-form" method="post" action="includes/reserve.inc.php">
            <h3>Manually Assign Reserve Their Country</h3>
            <p style="color:white;">
                Remove or add country reservations <br><br> you can leave reservee delegate name empty to remove reservations
                <br><br>
                Do not reserve a country that has already been reserved
            </p>
            <h4>Committee of reservation</h4>
              <select name="commts">
                <option value="DISEC">DISEC</option>
                <option value="WHO">WHO</option>
                <option value="ECOFIN">ECOFIN</option>
                <option value="UNODC">UNODC</option>
                <option value="UNEP">UNEP</option>
                <option value="UNICEF">UNICEF</option>
                <option value="UNWOMEN">UNWOMEN</option>
                <option value="EU">EU</option>
                <option value="ASEAN">ASEAN</option>
                <option value="SV">SV</option>
                <option value="JCC">JCC</option>
                <option value="UNSC">UNSC</option>
                <option value="IPC">IPC</option>
                <option value="ADHOC">ADHOC</option>
              </select>
            <h4>Country (Delegation) to reserve (make sure name is spelt exactly as in the country matrix above, and that it's not already confirmed):</h4>
            <input type="text" name="countryts">
            <h4>Delegate name (make sure name is spelt exactly as in the del list below. Alternatively, leaving it blank will remove reservee:</h4>
            <input type="text" name="delts">
            <input type="submit" name="reservation-submit" value="Submit Reservation">
        </form>
    </div>

    <div class="legend">
        <div class="item">
            <div class="rep">
                Registered Delegates List
            </div>
        </div>
        <p style="color:white;">
            For certain columns, 0 = false and 1 = true
        </p>
    </div>
    <div class="dellist">
        <div class="dellist-inner">
        <table>
        <tr>
            <td style="background:rgba(0,0,0,0.6);font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">ID</td>
            <td style="background:rgba(0,0,0,0.6);font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Full Name</td>
            <td style="background:rgba(0,0,0,0.6);font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Email</td>
            <td style="background:rgba(0,0,0,0.6);font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">School</td>
            <td style="background:rgba(0,0,0,0.6);font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Grade</td>
            <td style="background:rgba(0,0,0,0.6);font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Date of Birth</td>
            <td style="background:rgba(0,0,0,0.6);font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Gender</td>
            <td style="background:rgba(0,0,0,0.6);font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Address</td>
            <td style="background:rgba(0,0,0,0.6);font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Cellphone</td>
            <td style="background:rgba(0,0,0,0.6);font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Homephone</td>
            <td style="background:rgba(0,0,0,0.6);font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">EC Name</td>
            <td style="background:rgba(0,0,0,0.6);font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">EC Relationship</td>
            <td style="background:rgba(0,0,0,0.6);font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">EC Phone #</td>
            <td style="background:rgba(0,0,0,0.6);font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Past Exp</td>
            <td style="background:rgba(0,0,0,0.6);font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Skillcap</td>
            <td style="background:rgba(0,0,0,0.6);font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Comm Pref 1</td>
            <td style="background:rgba(0,0,0,0.6);font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Country Pref 1</td>
            <td style="background:rgba(0,0,0,0.6);font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Comm Pref 2</td>
            <td style="background:rgba(0,0,0,0.6);font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Country Pref 2</td>
            <td style="background:rgba(0,0,0,0.6);font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Comm Pref 3</td>
            <td style="background:rgba(0,0,0,0.6);font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Country Pref 3</td>
            <td style="background:rgba(0,0,0,0.6);font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">is Day Del</td>
            <td style="background:rgba(0,0,0,0.6);font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">has paid?</td>
            <td style="background:rgba(0,0,0,0.6);font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">is Assigned</td>
            <td style="background:rgba(0,0,0,0.6);font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">pay by Cheque?</td>
            <td style="background:rgba(0,0,0,0.6);font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Confirmed Comm</td>
            <td style="background:rgba(0,0,0,0.6);font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Confirmed Country</td>
            <td style="background:rgba(0,0,0,0.6);font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Reg Timestamp</td>
            <td style="background:rgba(0,0,0,0.6);font-weight:700; text-transform:uppercase; letter-spacing:0.4px;padding-top:10px;padding-bottom:10px;">Referred By</td>
        </tr>
_END;
            require_once 'includes/dbh.inc.php';

            $sql = "SELECT * FROM DelReg ORDER BY id ASC";
            $result = $conn->query($sql);
            
            if ($result-> num_rows > 0) {
                while ($row = $result-> fetch_assoc()) {
                    echo '<tr><td>' . $row['id'] . '</td><td>' . $row['fullname'] . '</td><td>' . $row['email'] . '</td><td>' . $row['school'] . '</td><td>' . 
                    $row['grade'] . '</td><td>' . $row['dob'] . '</td><td>' . $row['gender'] . '</td><td>' . $row['address'] . '</td><td>' . $row['cellphone'] . 
                    '</td><td>' . $row['homephone'] . '</td><td>' . $row['ecname'] . '</td><td>' . $row['ecrelationship'] . '</td><td>' . $row['ecphone'] . 
                    '</td><td>' . $row['pastexp'] . '</td><td>' . $row['skillcap'] . '</td><td>' . $row['commp1'] . '</td><td>' . $row['countryp1'] . '</td><td>' . 
                    $row['commp2'] . '</td><td>' . $row['countryp2'] . '</td><td>' . $row['commp3'] . '</td><td>' . $row['countryp3'] . '</td><td>' . 
                    $row['isdaydel'] . '</td><td>' . $row['ispaid'] . '</td><td>' . $row['isassigned'] . '</td><td>' . $row['ispaybycheque'] . '</td><td>' . 
                    $row['confirmedcomm'] . '</td><td>' . $row['confirmedcountry'] . '</td><td>' . $row['timestamp'] . '</td><td>' . $row['referredby'] . '</td></tr>';
                }
                echo '</table>';
            } else {
                echo 'PACIFIC ASMR SYS ERROR: NO DATA IN USERS!!!! UR ACTUALLY DONE FOR MAN UR SYSTEM BROKE OR SOMETHING!!! :( :( :( :(';
            }

            $conn-> close();
echo<<<_END
        </table>
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
_END;

    }

?>