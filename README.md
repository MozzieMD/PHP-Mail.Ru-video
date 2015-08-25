# PHP-Mail.Ru-video
Mail.Ru video extraction class

Use:
```php
$mail = new MailRU("https://my.mail.ru/v/himym_series/video/9/92.html");
foreach( $mail->VideoUrls() as $video ) {
   echo $video->key . "<br>" . $video->url . "<br><br>";
}
```

Getting video_key cookie:

```php
echo $mail->VideoKey();
```

Checking if there is only one quality url:

```php
if ($mail->IsOneQuality())
  echo "One quality only";
else
  echo "There is more than one quality";
```
