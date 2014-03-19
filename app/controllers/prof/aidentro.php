<?php
DB::transaction(function()
{
    $newAcct = Account::create(
        'accountname' => Input::get('accountname')
    );

    $newUser = User::create([
        'username' => Input::get('username'),
        'account_id' => $newAcct->id,
    ]);

    if( !$newUser )
    {
        throw new \Exception('User not created for account');
    }
});