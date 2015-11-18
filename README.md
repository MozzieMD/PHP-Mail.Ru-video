# PHP-Mail.Ru-video
Mail.Ru video extraction class

Use:
```php
$mail = new MailRU("https://my.mail.ru/v/himym_series/video/9/92.html");
foreach( $mail->VideoUrls() as $video ) {
   echo $video->key . " " . $video->url . "<br><br>";
}
```
Outputs:

`360p`
`http://urltothevideo.mp4?params`

`720p`
`http://urltothevideo.mp4?params`

Getting video_key cookie:

```php
echo $mail->VideoKey();
```
Outputs: 
`hash`

Checking if there is only one quality url:

```php
if ($mail->IsOneQuality())
  echo "One quality only";
else
  echo "There is more than one quality";
```
### Note
To play the video you will need to make a php proxy with curl, after that get the video url and the video key cookie.
To get access to the video you will need to stream the video!