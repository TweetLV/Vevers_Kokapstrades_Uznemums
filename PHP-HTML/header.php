<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="​SIA &amp;quot;Uzņē​muma nosaukums&amp;quot;">
    <meta name="description" content="">
    <title>Sākums</title>
    <link rel="stylesheet" href="../CSS/nicepage.css" media="screen">
    <link rel="stylesheet" href="../CSS/Sakums.css" media="screen">
    <script class="u-script" type="text/javascript" src="../JavaScript/jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../JavaScript/nicepage.js" defer=""></script>

    <meta name="generator" content="Nicepage 5.9.6, nicepage.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <meta data-intl-tel-input-cdn-path="intlTelInput/">
</head>
<?php
require("connect_db.php");

session_start();

$Admins = $savienojums->query("SELECT * FROM lietotaji WHERE admins = true and lietotajvards = '" . $_SESSION['username'] . "' ");
?>


<body class="u-body u-stick-footer u-xl-mode" data-lang="en">
    <header class="u-clearfix u-gradient u-header u-sticky u-sticky-0e9a u-header" id="sec-c0ab">
        <div class="u-clearfix u-sheet u-sheet-1">
            <a href="index.php" class="u-image u-logo u-image-1" data-image-width="454" data-image-height="101"
                title="Home">
                <img src="../Atteli/logo.png" class="u-logo-image u-logo-image-1">
            </a>
            <nav class="u-menu u-menu-one-level u-offcanvas u-menu-1" data-responsive-from="MD">
                <div class="menu-collapse"
                    style="font-size: 1.25rem; letter-spacing: 0px; font-weight: 700; text-transform: uppercase;">
                    <a class="u-button-style u-custom-active-border-color u-custom-border u-custom-border-color u-custom-border-radius u-custom-borders u-custom-hover-border-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base"
                        href="#">
                        <svg class="u-svg-link" viewBox="0 0 24 24">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use>
                        </svg>
                        <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px"
                            xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <rect y="1" width="16" height="2"></rect>
                                <rect y="7" width="16" height="2"></rect>
                                <rect y="13" width="16" height="2"></rect>
                            </g>
                        </svg>
                    </a>
                </div>
                <div class="u-custom-menu u-nav-container">
                    <ul class="u-nav u-spacing-30 u-unstyled u-nav-1">
                        <li class="u-nav-item"><a
                                class="u-border-2 u-border-active-palette-1-base u-border-grey-90 u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-4 u-text-custom-color-3 u-text-hover-custom-color-4"
                                href="index.php" style="padding: 20px 8px;">Sākums</a>
                        </li>
                        <li class="u-nav-item"><a
                                class="u-border-2 u-border-active-palette-1-base u-border-grey-90 u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-4 u-text-custom-color-3 u-text-hover-custom-color-4"
                                href="parmums.php" style="padding: 20px 8px;">Par Mums</a>
                        </li>
                        <li class="u-nav-item"><a
                                class="u-border-2 u-border-active-palette-1-base u-border-grey-90 u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-4 u-text-custom-color-3 u-text-hover-custom-color-4"
                                href="Kontakti.php" style="padding: 20px 8px;">Kontakti</a>
                            <?php
                            if ($Admins)
                                if ($Admins->num_rows > 0) {

                                    echo '</li><li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-grey-90 u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-4 u-text-custom-color-3 u-text-hover-custom-color-4" href="admins.php" style="padding: 20px 8px;">Admin panelis <i class="fas fa-cog"></i></a>';
                                }
                            ?>
                        </li>
                        <li class="u-nav-item"><a
                                class="u-border-2 u-border-active-palette-1-base u-border-grey-90 u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-4 u-text-custom-color-3 u-text-hover-custom-color-4"
                                style="padding: 20px 8px;" href="logout.php">
                                <?= $_SESSION['username']; ?> <i class="fas fa-power-off"></i>
                                
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="u-custom-menu u-nav-container-collapse">
                    <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                        <div class="u-inner-container-layout u-sidenav-overflow">
                            <div class="u-menu-close"></div>
                            <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                                <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                        href="index.php">Sākums</a>
                                </li>
                                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="parmums.php">Par
                                        Mums</a>
                                </li>
                                <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                        href="Kontakti.php">Kontakti</a>
                                </li>
                                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="logout.php">user</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
                </div>
            </nav>
        </div>
    </header>

</html>