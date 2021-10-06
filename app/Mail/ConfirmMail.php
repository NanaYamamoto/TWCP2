<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        // 引数で受け取ったデータを変数にセット
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('chyhyy76@gmail.com') //送信元
            ->subject('新規登録確認メール') //メールタイトル
            ->view('mail.mail_confirm') //メール内容
            ->with(['user' => $this->user]); // withオプションでセットしたデータをテンプレートへ受け渡す
    }
}
