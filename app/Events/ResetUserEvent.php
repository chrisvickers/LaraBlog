<?php namespace App\Events;

use App\Events\Event;
use App\User;
use Mail;
use Uuid;

use Illuminate\Queue\SerializesModels;

class ResetUserEvent extends Event {

	use SerializesModels;

    /**
     * @param User $user
     */
	public function __construct(User $user)
	{
		$this->user = $user;
	}


    public function reset($userID)
    {
        $user = $this->user->find($userID);
        if(isset($user))
        {
            $uuid = Uuid::generate();
            $user->reset_password_code = $uuid->string;
            $user->save();


            Mail::send('admin.emails.reset', array('user' => $user), function($message) use ($user)
            {
                $message->to($user->email, $user->name)->subject('LaraBlog - Password Reset');
            });
        }
        return false;
    }

}
