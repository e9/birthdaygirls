<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/statics/css/metro-bootstrap.css">
<link rel="stylesheet" href="/statics/css/birthdaygirls.css">
{{--
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="/statics/js/metro.min.js"></script>
<script src="//imsky.github.io/holder/holder.js"></script>
--}}
<title>バースデーガール｜{{{@$subtitle}}}</title>
<meta name="keywords" content="AV,AV女優,誕生日,18禁,fc2,xvideo,dmm">
@if(isset($description))<meta name="description" content="{{{ $description }}}">@endif
<meta name="author" content="birthdaygirls">
<meta property="og:title" content="バースデーガール｜今日が誕生日のAV女優を毎日、紹介" />
<meta property="og:type" content="website" />
@if(isset($description))<meta property="og:description" content="{{{ $description }}}" />@endif
<meta property="og:url" content="http://birthdaygirls.info{{{ $root or '' }}}" />
<meta property="og:image" content="http://birthdaygirls.info/statics/img/ogp.jpg" />
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-47921751-1', 'birthdaygirls.info');
  ga('send', 'pageview');

</script>
</head>
<body class="metro">

<div class="navigation-bar bg-black">
    <div class="navigation-bar-content container">
        <a href="{{{ $root or '/' }}}" class="element brand input-element">バースデーガールズ <small>今日が誕生日のAV女優を毎日、紹介</small></a>
        @if (Request::is('/') || Request::is('dmm'))
        <div class="element input-element place-right">@include('girl.social')</div>
        @endif
    </div>
</div>

<div class="container grid">
@yield('content')
</div>

<div class="footer bg-black">
  <div class="container grid">
    <div class="row">
      <div class="span6">
        <p class="fg-white">ハッピーバースデーの気持ちでオナニーしよう。<br>&copy;バースデーガール</p>
      </div>
      <div class="span3 offset3">
      @if (@$root == '/dmm')
        <p class="text-right"><a href="https://affiliate.dmm.com/api/"><img src="http://pics.dmm.com/af/web_service/r18_88_35.gif" width="88" height="35" alt="WEB SERVICE BY DMM.R18" /></a></p>
      @else
        <p class="text-right"><a class="button danger" href="/dmm">DMM動画埋め込み版<br>バースデーガールへ</a></p>
      @endif
      </div>
    </div>
  </div>
</div>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=354198088051463";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<script type="text/javascript" src="http://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>

</body>
</html>
