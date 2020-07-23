## File Manager Server

This app was created using PHP and Laravel. When completed, it will be able to support the client's need to upload images and videos. As the app currently stands, it is able to take in CRUD requests through its API to write to a MySQL database. This database stores the file's name, a description of the file, and the URL of where the file is being stored (still need to set up AWS S3 intergration for this value to be usable).

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

-Setup AWS S3 bucket
-Integrate AWS S3 file storing
-Refactor database and API to accomidate S3 intergration
-Integrate user accounts into database and API to allow each user to have their own list of files to use
-Write tests for API

## Instructions for Running this Project

1. Clone this repository to your machine
2. 