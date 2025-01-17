<?php if (!class_exists('CaptchaConfiguration')) { return; }

// BotDetect PHP Captcha configuration options

return [
  /*
  |--------------------------------------------------------------------------
  | Captcha configuration for contact page
  |--------------------------------------------------------------------------
  */
  'ContactCaptcha' => [
      'UserInputID' => 'CaptchaCode',
      'CodeLength' => CaptchaRandomization::GetRandomCodeLength(4, 6),
      'ImageStyle' => ImageStyle::AncientMosaic,
  ],

  /*
  |--------------------------------------------------------------------------
  | Captcha configuration for contact page
  |--------------------------------------------------------------------------
  */
  'FaqCaptcha' => [
      'UserInputID' => 'CaptchaCode',
      'CodeLength' => CaptchaRandomization::GetRandomCodeLength(4, 6),
      'ImageStyle' => ImageStyle::AncientMosaic,
  ],

];
