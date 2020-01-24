<?php

require 'database.php';

session_start();
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
    exit;
}
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$personal = "SELECT * FROM personal WHERE user_id=".$_SESSION['user_id'];
$stmt= $pdo->prepare($personal);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="possible.js" type="text/javascript"></script>
    <script src="menu.js" type="text/javascript"></script>

</head>
<body>



<div class="container">
    <div class="background_profile"></div>
    <div class="text-absolute text-white">
        <div class="box">
            <div class="header">
                <div class="float-right">
                    <div class="user">
                        <p>John Doe</p>
                        <p>Kraków, Polska</p>
                    </div>
                    <div class="edit-btn" id="edit-btn">
                        <a href="#">Edit profile</a>
                    </div>
                    <div class="edit-btn1" id="edit-btn1">
                        <a href="#">Chat</a>
                    </div>
                    <div class="edit-btn1" id="logout">
                        <a href="#">Wyloguj</a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="menu">
                    <ul class="tabs">
                        <li>
                            <a href="#" class="active" data-name="map">
                                <svg width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M15.5,4.5C15.5,5.06 15.7,5.54 16.08,5.93C16.45,6.32 16.92,6.5 17.5,6.5C18.05,6.5 18.5,6.32 18.91,5.93C19.3,5.54 19.5,5.06 19.5,4.5C19.5,3.97 19.3,3.5 18.89,3.09C18.5,2.69 18,2.5 17.5,2.5C16.95,2.5 16.5,2.69 16.1,3.09C15.71,3.5 15.5,3.97 15.5,4.5M22,4.5C22,5.5 21.61,6.69 20.86,8.06C20.11,9.44 19.36,10.56 18.61,11.44L17.5,12.75C17.14,12.38 16.72,11.89 16.22,11.3C15.72,10.7 15.05,9.67 14.23,8.2C13.4,6.73 13,5.5 13,4.5C13,3.25 13.42,2.19 14.3,1.31C15.17,0.44 16.23,0 17.5,0C18.73,0 19.8,0.44 20.67,1.31C21.55,2.19 22,3.25 22,4.5M21,11.58V19C21,19.5 20.8,20 20.39,20.39C20,20.8 19.5,21 19,21H5C4.5,21 4,20.8 3.61,20.39C3.2,20 3,19.5 3,19V5C3,4.5 3.2,4 3.61,3.61C4,3.2 4.5,3 5,3H11.2C11.08,3.63 11,4.13 11,4.5C11,5.69 11.44,7.09 12.28,8.7C13.13,10.3 13.84,11.5 14.41,12.21C15,12.95 15.53,13.58 16.03,14.11L17.5,15.7L19,14.11C20.27,12.5 20.94,11.64 21,11.58M9,14.5V15.89H11.25C11,17 10.25,17.53 9,17.53C8.31,17.53 7.73,17.28 7.27,16.78C6.8,16.28 6.56,15.69 6.56,15C6.56,14.31 6.8,13.72 7.27,13.22C7.73,12.72 8.31,12.47 9,12.47C9.66,12.47 10.19,12.67 10.59,13.08L11.67,12.05C10.92,11.36 10.05,11 9.05,11H9C7.91,11 6.97,11.41 6.19,12.19C5.41,12.97 5,13.91 5,15C5,16.09 5.41,17.03 6.19,17.81C6.97,18.59 7.91,19 9,19C10.16,19 11.09,18.63 11.79,17.91C12.5,17.19 12.84,16.25 12.84,15.09C12.84,14.81 12.83,14.61 12.8,14.5H9Z" />
                                </svg>
                                Map
                            </a>
                        </li>
                        <li>
                            <a href="#" data-name="settings">
                                <svg width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M12,8A4,4 0 0,1 16,12A4,4 0 0,1 12,16A4,4 0 0,1 8,12A4,4 0 0,1 12,8M12,10A2,2 0 0,0 10,12A2,2 0 0,0 12,14A2,2 0 0,0 14,12A2,2 0 0,0 12,10M10,22C9.75,22 9.54,21.82 9.5,21.58L9.13,18.93C8.5,18.68 7.96,18.34 7.44,17.94L4.95,18.95C4.73,19.03 4.46,18.95 4.34,18.73L2.34,15.27C2.21,15.05 2.27,14.78 2.46,14.63L4.57,12.97L4.5,12L4.57,11L2.46,9.37C2.27,9.22 2.21,8.95 2.34,8.73L4.34,5.27C4.46,5.05 4.73,4.96 4.95,5.05L7.44,6.05C7.96,5.66 8.5,5.32 9.13,5.07L9.5,2.42C9.54,2.18 9.75,2 10,2H14C14.25,2 14.46,2.18 14.5,2.42L14.87,5.07C15.5,5.32 16.04,5.66 16.56,6.05L19.05,5.05C19.27,4.96 19.54,5.05 19.66,5.27L21.66,8.73C21.79,8.95 21.73,9.22 21.54,9.37L19.43,11L19.5,12L19.43,13L21.54,14.63C21.73,14.78 21.79,15.05 21.66,15.27L19.66,18.73C19.54,18.95 19.27,19.04 19.05,18.95L16.56,17.95C16.04,18.34 15.5,18.68 14.87,18.93L14.5,21.58C14.46,21.82 14.25,22 14,22H10M11.25,4L10.88,6.61C9.68,6.86 8.62,7.5 7.85,8.39L5.44,7.35L4.69,8.65L6.8,10.2C6.4,11.37 6.4,12.64 6.8,13.8L4.68,15.36L5.43,16.66L7.86,15.62C8.63,16.5 9.68,17.14 10.87,17.38L11.24,20H12.76L13.13,17.39C14.32,17.14 15.37,16.5 16.14,15.62L18.57,16.66L19.32,15.36L17.2,13.81C17.6,12.64 17.6,11.37 17.2,10.2L19.31,8.65L18.56,7.35L16.15,8.39C15.38,7.5 14.32,6.86 13.12,6.62L12.75,4H11.25Z"/>
                                </svg>
                                Settings
                            </a>
                        </li>
                        <li>
                            <a href="#" data-name="privacy">
                                <svg width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M12,17A2,2 0 0,0 14,15C14,13.89 13.1,13 12,13A2,2 0 0,0 10,15A2,2 0 0,0 12,17M18,8A2,2 0 0,1 20,10V20A2,2 0 0,1 18,22H6A2,2 0 0,1 4,20V10C4,8.89 4.9,8 6,8H7V6A5,5 0 0,1 12,1A5,5 0 0,1 17,6V8H18M12,3A3,3 0 0,0 9,6V8H15V6A3,3 0 0,0 12,3Z" />
                                </svg>
                                Privacy
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <svg width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12C4,13.85 4.63,15.55 5.68,16.91L16.91,5.68C15.55,4.63 13.85,4 12,4M12,20A8,8 0 0,0 20,12C20,10.15 19.37,8.45 18.32,7.09L7.09,18.32C8.45,19.37 10.15,20 12,20Z" />
                                </svg>
                                Block
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <svg width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M15.07,11.25L14.17,12.17C13.45,12.89 13,13.5 13,15H11V14.5C11,13.39 11.45,12.39 12.17,11.67L13.41,10.41C13.78,10.05 14,9.55 14,9C14,7.89 13.1,7 12,7A2,2 0 0,0 10,9H8A4,4 0 0,1 12,5A4,4 0 0,1 16,9C16,9.88 15.64,10.67 15.07,11.25M13,19H11V17H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2Z" />
                                </svg>
                                Help
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="content-right">
                    <div class="map section-content active"  id="map">

                    <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d20486.066422067626!2d19.93648643236798!3d50.0720879488346!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1zc2nFgm93bmlh!5e0!3m2!1spl!2spl!4v1579377627542!5m2!1spl!2spl"
                            width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

                    </div>
                    <div class="section-content" id="settings">
                        gsdgsg
                    </div>
                    <div class="section-content" id="privacy">
                        <div class="text">
                            sprawdz

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="edit-modal" class="modal">
    <p class="text-white menu_edit">
        Edit profile:
    </p>
    <form action="changes.php" class="text-white form_edit" id="changes_form" method="post" >
        Imie:<br>
        <input type="text" class="form_mode" name="imie" value="<?php echo $result['name']?>" required><br>
        Nazwisko:<br>
        <input type="text" class="form_mode" name="nazwisko" value="nazwisko" required><br>
        Email:<br>
        <input type="email" class="form_mode" name="email" value="email@email.com" required><br>
        Data urodzenia:<br>
        <input type="date" class="form_mode" name="data_urodzenia" value="<?php echo $result['date_of_birth']?>" required><br>
        adres:<br>
        <input type="text" class="form_mode" name="adres" value="ul. Szczepanska 2a" ><br>
        haslo:<br>
        <input type="password" class="form_mode" name="haslo" value=""  ><br>
        <input type="submit" value="Save changes" name="submit" id="edit-close" class="save_button_spec" >
    </form>
    <p id="changes_result"></p>
    <p>
        <img src = "public/img/strongman.jpeg" class="float-right resize">
    </p>


</div>
</body>
<script src="ajax_changes.js"></script>
</html>