## File Manager Server

This app was created using PHP and Laravel. This server allows clients to upload files to an AWS S3 bucket, which then stores the URL's for those uploaded files into a MySQL database. The GET route will return all files saved in the MySQL database, including the S3 bucket URL's. The PUT, PATCH, and DELETE routes will only edit values stored in the MySQL database and won't impact the S3 bucket values at all.

## API Routes

| Method     | URI                | Name          | Action                                       | Middleware |
|------------|--------------------|---------------|----------------------------------------------|------------|
| GET\|HEAD  | api/media          | media.index   | App\Http\Controllers\MediaController@index   | api        |
| POST       | api/media          | media.store   | App\Http\Controllers\MediaController@store   | api        |
| GET\|HEAD  | api/media/{medium} | media.show    | App\Http\Controllers\MediaController@show    | api        |
| PUT\|PATCH | api/media/{medium} | media.update  | App\Http\Controllers\MediaController@update  | api        |
| DELETE     | api/media/{medium} | media.destroy | App\Http\Controllers\MediaController@destroy | api        |

*Note: {medium} in the URI represents the individual media file you wish to interact with and can be accessed by referring to the id number associated with it. For example, if you wanted to delete the file with an id of 10, your URI would be api/media/10.

## Todo

- Adjust DELETE route to remove a file from the S3 bucket
- Integrate user accounts into database and API to allow each user to have their own list of files
- Write tests for API

## Instructions for Running this Project in your Localhost

1. Open up your preferred CLI (I use the Windows Command Prompt)
and navigate to a file you wish to store the cloned repository
2. Clone this repository to your machine using the command:
    git clone https://github.com/jpeavler/file-manager-api.git
3. Change Directory into the new folder made by the clone:
    cd file-manager-api
4. Create the needed .env file by using command depending on your CLI and OS:
    Windows: copy .env.example .env
    Other Systems: cp .env.example .env
    Alternatively, you can edit the name of .env.example to .env or manually 
    copy the values of that file into a new file called .env
5. Generate a key in your CLI using the command:
    php artisan key:generate
6. Open up the repository in your preferred Code Editor and locate the .env file
7. Edit the value for the key DB_DATABASE in your .env file to the database name 
    we will create later. I used the value 'file_manager'
8. Edit the values for the keys AWS_ACCESS_KEY_ID, AWS_SECRET_ACCESS_KEY, AWS_DEFAULT_REGION,
    AWS_BUCKET, and AWS_URL in your .env file to values I emailed you. 
    Alternatively, you can setup your own S3 bucket and fill these values accordingly.
9. Run phpMyAdmin in your localhost using your desired method.
    I used XAMPP Control Panel since I'm on a windows device
    to run both Apache and MySQL
10. In phpMyAdmin, create a new MySQL database with the same name you picked in step 7.
    I used the value 'file_manager'
11. In your CLI, run the table migrations:
    php artisan migrate
12. Now that your server and database are setup, run the server:
    php artisan serve
13. Note the server's URL for frontend connection, mine was http://127.0.0.1:8000
    equivalent to http://localhost:8000
14. Follow steps for Frontend setup of app at: https://github.com/jpeavler/file-manager-ui