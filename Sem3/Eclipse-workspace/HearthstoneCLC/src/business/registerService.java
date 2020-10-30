package business;

import java.sql.DriverManager;

import javax.ejb.Local;
import javax.ejb.Stateless;
import javax.inject.Inject;
import dao.registerDataAccessInterface;
import beans.User;

@Stateless
@Local(registerBusinessInterface.class)
public class registerService implements registerBusinessInterface {

	@Inject
	registerDataAccessInterface<User> service;
	
	public boolean registerUser(User user) {
		System.out.println("Entered registerUser() in registerService");
		java.sql.Connection conn = null;
	    String url = "jdbc:mysql://localhost:3306/HearthstoneAPI";
	    String username = "root";
	    String password = "root";

	    try {
	    	//Connect to database
	    	conn = DriverManager.getConnection(url, username, password);
	    	//boolean that returns whether the register process was a success or not
	    	boolean registerCompletion = service.registerNewUser(user, conn);
			System.out.println("RegisterCompletion: " + registerCompletion);

			conn.close();
			
	    	if(registerCompletion == true){		    	
		    	return true;
	    	}else {
	    		return false;
	    	}
	    	
	    }catch(Exception e) {
	    	e.printStackTrace();
	    	return false;
	    }
    	
	}
	




}
