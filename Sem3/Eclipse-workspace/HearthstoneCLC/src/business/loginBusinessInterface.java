package business;

import beans.User;

public interface loginBusinessInterface {
	//method used for user login. Pass user model through from controller
	public User loginUser(User user);
	
}
