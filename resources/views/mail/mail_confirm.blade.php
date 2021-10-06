<p>
    登録確認メールです。<br>
    下記にアクセスして登録を完了してください。<br>
    {{url('regist/verify/'.$user->email_verify_token)}}
</p>
  
<p>
    <br>
    【登録内容】<br>
    名前：{{$user->name}}<br>
    メールアドレス：{{$user->email}}<br>
</p>



