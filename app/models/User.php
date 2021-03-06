<?php

    use Illuminate\Auth\UserTrait;
    use Illuminate\Auth\UserInterface;
    use Illuminate\Auth\Reminders\RemindableTrait;
    use Illuminate\Auth\Reminders\RemindableInterface;

    class User extends Eloquent implements UserInterface, RemindableInterface {

        use UserTrait, RemindableTrait;

        protected $fillable = array('name_first', 'name_last', 'email', 'password', 'password_temp', 'code', 'active', 'remember_token');

        /**
         * The database table used by the model.
         *
         * @var string
         */
        protected $table = 'users';

        /**
         * The attributes excluded from the model's JSON form.
         *
         * @var array
         */
        protected $hidden = array('password', 'password_temp', 'remember_token');

        public function roles()
        {
            return $this->belongsToMany('Role')->withTimestamps();
        }

        public function hasRole($name)
        {
            foreach ($this->roles as $role)
            {
                if ($role->name == $name) return true;
            }

            return false;
        }

        public function assignRole($role)
        {
            return $this->roles()->attach($role);
        }

        public function removeRole($role)
        {
            return $this->roles()->deattach($role);
        }

        public function contact_methods() {
            return $this->hasMany('contact_methods');
        }

        public function profiles()
        {
            return $this->hasMany('Profile');
        }
    }