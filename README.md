# drupal-custom-audioplayer

> A custom audio player that features a playlist and shows the lyrics of songs.
<img src="https://raw.githubusercontent.com/x7ian/drupal-custom-audioplayer/master/images/audioplayer_playlist_w_lyrics_.png" width="280">    
    
Features two buttons, one for handling the playlaist and another one to show song lyrics.

<img src="https://raw.githubusercontent.com/x7ian/drupal-custom-audioplayer/master/images/audioplayer_playlist_w_lyrics.png" width="300"> 


## To install 

Place the module in any of your project module directories and enable using any of the available methods.
    
## To configure
    
First you need a content type that has the following fields:
 - A normal text field for the song title
 - another text field for the name of the singer
 - a long text  with format field for the song lyrics.
 - a file field for the song file reference, this file field must accept .mp3 files.
or you can have this four fields separated in different content types. The important aspect is to gather them in the view configuration. For this exponation we are asuming that this fields are all in a custom content type called Songs.
 - Next go to Structure > Views > Click on (+ Add View)
   - Give it a name
   - Set to show Content of type Song.
   - Select to create a page or a block, which ever you like.
   - Select Display Format to Audio Player.
   - No need to set Items per page and Use a Pager.
   
## Configure the View
    
   - Its important to add all four fields to the view.
   - Then go to the views Audiplayer format Settings. 
   - Indicate what fields from the view configuration you have customized are used for each of the simple audioplayer plugin values. Remember to ser a field of each title, song writer, lyrics and audio file.
    
Create Block or page views according to your needs. 
Use filters, relationships and contextual values to configure more complex views according to your requirements.
Flush cache to make sure the audioplayer works properly.
