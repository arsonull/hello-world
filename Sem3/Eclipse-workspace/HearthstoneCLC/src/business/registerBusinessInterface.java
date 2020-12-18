package business;

import beans.User;

public interface RegisterBusinessInterface {
	//method used for user registration. Pass user model through from controller
	public boolean registerUser(User user);
	
}
