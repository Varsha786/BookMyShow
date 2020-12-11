# BookMyShow

## Idea
A online Movie ticket booking system like **BookMyShow** with interface to select movie from different genres of movies on availble date time.
A graphical seating plan **(audi1.php,audi2.php,audi3.php)** to select from available seats based upon user prefernce.
It also sends booking details with seat No to user through email and sms.
It is modular website by creating  common pages (e.g.  headers,footers,javascript and css links)
and these common pages are included whereever required with PHP include statments.


### Sequence of files and there use

1. Frontend: css-> for bootstrap files</br>
             dist-> jquery validation files</br>
   connections: connections.php (all css and javascript files link)</br>
   Fight seating Plan (made with buttons using loops):: to display arrangement of seats . </br>
            ~audi1.php</br>
            ~audi2.php</br>
            ~audi3.php</br>
            
2. When the user starts **index.php** form where user can log in which runs  **userlogin.php** and creates a session and stores the user email in session.
later this session email is used to send confirmation mails.

@@ When user makes a booking</br>

~ **virtual bill** is shown to user</br>
~ After that **sms** and **email** is sent to user on mobile seats and time of flight with other needed instructions. </br>

4. Files used for mailing are **class.phpmailer.php** and **class.smtp.php**. Mails are sent after the user has made booking to the registered email and mobile No.</br>

5. Admin account is set from where acoount  can be activated or blocked and same will be notified to user through email.</br>
   Admin files: **admin_login.php**</br>
   Other files:</br>
    ~**changepassword.php**: utility function to change pasword.</br>
    ~**deletemovies.php**: utility function to delete movies related details.</br>
    ~**deleteshows.php**: utility function to delete shows related details.</br>
    ~**bookTickets.php**: utility function to create the booking and generate eBill details.</br>
           

           

           
