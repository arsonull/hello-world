package business;

import beans.User;

public interface registerBusinessInterface {
	//method used for user registration. Pass user model through from controller
	public boolean registerUser(User user);
	
}
