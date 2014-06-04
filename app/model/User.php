<?php
class User extends ActiveRecord\Model{
	# User Model
	# explicit table name since our table is not "books" 
	static $table_name = 'users';
}
?>