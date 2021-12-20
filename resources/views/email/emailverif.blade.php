<!DOCTYPE html>
<html>
  <head>
    <title>Welcome Email</title>
  </head>
  <body>
    <h2>Welcome to the Omkost</h2>
    <br/>
    Your registered this email on Omkost Site. Please click on the below link to verify your email account.
    <br/>
    <a href="{{url('user/verify', $userVerify->token, $userVerify->id)}}">Verify Email</a>
  </body>
</html>