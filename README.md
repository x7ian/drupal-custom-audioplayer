# Drupal Custom Audio Player with Song Lyrics

> A customized very simple audio player that features a playlist and shows the lyrics of songs.

<img src="https://raw.githubusercontent.com/x7ian/drupal-custom-audioplayer/master/images/audioplayer_playlist_w_lyrics_.png" width="450">    
    
Features two buttons, one for handling the playlist and another one to show song lyrics.

<img src="https://raw.githubusercontent.com/x7ian/drupal-custom-audioplayer/master/images/audioplayer_playlist_w_lyrics.png" width="450"> 

This module was originally intended to be used to solve a client use case who needed a player that showed the lyrics of the song that was playing. This module constitutes a good example on how to build a Views style plugin for Drupal 8.

## To install 

As usual as with any module, place the module in any of your drupal project module directories and enable using any of the available methods.
Please change the name of the folder from "drupal-custom-audioplayer" to just "audioplayer".
    
## To configure
    
First you need a content type that has the following fields:
 - A normal text field for the song title
 - another text field for the name of the singer
 - a long text  with format field for the song lyrics.
 - a file field for the song file reference, this file field must accept .mp3 files.
or you can have this four fields separated in different content types. The important aspect is to gather them in the view configuration. For this exponation we are assuming that this fields are all in a custom content type called Songs.

Next go to Structure > Views > Click on (+ Add View)
   - Give it a name
   - Set to show Content of type Song.
   - Select to create a page or a block, which ever you like.
   - Select Display Format to Audio Player.
   - No need to set Items per page and Use a Pager.
   
## Configure the View

   - Add the four fields created previusly to the view
       - Note: The field used for the audio file must be set to formater 'URL to File'
   - Go to the views Audio player format Settings at the view. 
   - Set the relation of each field with its corresponding element at the audioplayer song list record.
   - Indicate what fields from the view configuration you have customized are used for each of the simple audio player plugin values. Remember to set a field of each of the four fields title, song writer, lyrics and audio file.
   - It's important to configure the relation for all four fields

Create Block or page views according to your needs. 
Use filters, relationships and contextual values to configure more complex views according to your requirements.
Flush Drupal cache to make sure the audioplayer works properly.
