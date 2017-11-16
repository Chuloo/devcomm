<?php

namespace App\Repositories\User;

use App\User;
use App\Repositories\User\UserContract;
use App\Utilities\SetModelProperties;

class EloquentUserRepository implements UserContract {
	public function findOne($id) {
		return User::find($id);
	}

	public function findAll() {
		return User::all();
	}

	public function create($request) {
		$user = new User;
		$smp = new SetModelProperties();
		$smp->setProps($user, $request);
		$user->password = bcrypt($request->password);
		$user->save();
		return $user;
	}

	public function edit($id, $request) {
		$user = $this->findOne($id);
		$smp = new SetModelProperties();
		$smp->setProps($user, $request);
		$user->save();
		return $user;
	}

	public function remove($id) {
		$user = $this->findOne($id);
		return $user->delete();
	}
}