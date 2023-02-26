# Twitter_Backend

The project details are as follows:
  1. Created a sign-in page where the new users can register by entering their first name, middle name, last name, gender, age, phone number, and their email id.
     Also let the users upload their profile image. 
     All the fields are validated and entered into the database. 
  2. Created a login page where the registered users can log in using their email address and password.
     The entered email id and the password is checked with the database record, and if matches, users was allowed to login.
  3. A database was created and within that database, two tables were created. 
     One for the user's information and other one for the storing the information of the tweets. 
  4. If the user is verified and valid, then that particular user tweets are stored in the database.
  5. For viewing the tweets, all the tweets that are stored in the database was retreived and displayed to the users.
  6. For deleting the tweets, the tweet_id and the user_id was used. 
     If the user_id matched with the corresponding tweet's user's id, then that particular tweet was deleted form the databse.
